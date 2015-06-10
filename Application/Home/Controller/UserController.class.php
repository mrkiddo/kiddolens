<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	
    public function login(){
		
        //$this->show('Home: UserController - login');
		$hint = array();
		$title = 'Kiddos Lens - Member: Login';
		$hint['info'] = 'You can login here.';
		
		if(IS_AJAX) {
			$data = I('post.');
			//console.log($data);
			//$result['status'] = '1';
			$user = D('User');
			
			if($data['type'] == '1') {
				$result = $user->checkUserExistence($data['value']);
				if($result) {
					$info['status'] = '1';
				}
				else {
					$info['status'] = '0';
					$info['msg'] = 'This user Name not exists. Please try again.';
				}
				$this->ajaxReturn($info);
			}
			
			if($data['type'] == '2') {
				$userName = $data['usern'];
				$passwd = $data['passwd'];
				$result = $user->checkExistence($userName, $passwd);
				if($result['status'] == '1') {
					$info['status'] = '1';
				}
				else {
					$info['status'] = '0';
					$info['msg'] = 'User name and password not match. Please try again.';
				}
				
				$this->ajaxReturn($info);
			}
		}
		
		if(IS_POST) {
			$data = I('post.');
			//dump($data);
			$userName = $data['username'];
			$passwd = $data['password'];
			//$user = M('User');
			//dump($user->select());
			$user = D('User');
			//dump($user);
			$msg = $user->checkExistence($userName, $passwd);
			//dump($msg);
			if($msg['status'] == '1') {
				$userId = $msg['id'];
				$user->validUser($userName, $userId);
				//dump($_SESSION['valid_user']);
				$update = $user->loginUpdate($userId);
				//dump($update);
				if($update) {
					$profile = D('userProfile');
					$flag = $profile->checkProfileInitial($userId);
					if($flag) {
						$this->success($msg['info'], 'addProfile', 3);
					}
					else {
						$this->success($msg['info'], 'viewProfile', 3);
					}
				}
				else {
					$hint['info'] = 'Datebase error. Please try again.';
					$this->assign('hint', $hint);
					$this->display();
				}
			}
			if($msg['status'] != '1') {
				$hint['info'] = $msg['info'];
				$this->assign('hint', $hint);
				$this->display();
			}
		}
		
		else {
			$this->assign('title', $title);
			$this->assign('hint', $hint);
			$this->display();
		}
    }
	
	public function register() {
		
		//$this->show('Home: UserController - register');
		
		$title = 'Kiddos Lens - Member: Register';
		$message['hint'] = 'Fill out the form to register as a member.';
		
		if(IS_AJAX) {
			$data = I('post.');
			$info = array();
			
			if($data['type'] == 'username') {
				$userName = $data['value'];
				$user = D('user');
				$result = $user->checkUserExistence($userName);
				if($result) {
					$info['status'] = '0';
					$info['msg'] = 'This user name has been occupied. Please try another one.';
				}
				else {
					$info['status'] = '1';
					$info['msg'] = 'Fill out the form to register as a member.';
				}
				$this->ajaxReturn($info);
			}
			
			if($data['type'] == 'email') {
				$email = $data['value'];
				$user = D('user');
				$result = $user->checkEmailExistence($email);
				if($result) {
					$info['status'] = '0';
					$info['msg'] = 'This e-mail address has existed. Please try another one.';
				}
				else {
					$info['status'] = '1';
					$info['msg'] = 'Fill out the form to register as a member.';
				}
				$this->ajaxReturn($info);
			}
		}
		
		if(IS_POST) {
			
			$user = D('User');
			
			//obtain post data
			/*
			$data['user_name'] = I('post.name');
			$data['user_passwd'] = I('post.password1');
			$data['password2'] = I('post.password2');
			$data['email'] = I('post.mail');
			*/
			$data = I('post.');
			
			$data['last_time'] = date("Y/m/d H:i");
			$data['last_ip'] = $user->getIp();
			
			//valid and create data model
			//if data invalid, show error message
			if(!$user->create($data)) {
				//exit($user->getError());
				$message['hint'] = $user->getError();
				$this->assign('title', $title);
				$this->assign('message', $message);
				$this->display();
			}
			//otherwise add data to database
			//and redirect to login page
			else {
				$insertId = $user->add();
				if($insertId) {
					$this->show('Register successfully.');
					$this->success('Register successfully.', 'login', 3);
				}
			}
		}
		
		else {
			$this->assign('title', $title);
			$this->assign('message', $message);
			$this->display();
		}
		
	}
	
	public function logout() {
		//$this->show('Home: UserController - logout');
		$old_user['valid_user'] = $_SESSION['valid_user'];
		$old_user['user_id'] = $_SESSION['user_id'];
		unset($_SESSION['valid_user']);
		unset($_SESSION['user_id']);
		$result_dest = session_destroy();
		if(!empty($old_user)) {
			if($result_dest) {
				//$str = 'logoutSuccess';
				$this->success('Sign out successfully.', 'login', 3);
			}
			else {
				//$str = 'logoutError';
				$this->show('Sign out failure.');
			}
		}
		else {
			//$str = 'noLogin';
			$this->redirect('login', 3, 'Please sign IN first.');
		}
	}
	
	public function addProfile() {
		
		//$this->show('Home: UserController - addProfile');
		
		$title = 'Kiddos Lens - Member: New Profile';
		$message['hint'] = 'Submit your infomation for orders and shipments.';
		
		$user = D('user');
		$result = $user->checkValidUser();
		if(!$result) {
			$this->redirect('User/login', '', 3, 'You have not login yet. Please sign IN first.');
			//$this->success('Please Sign IN first.', 'login', 3);
			//die();
		}
		
		$userInfo = $user->getValidUser();
		$message['user_name'] = $userInfo['user_name']; 
		
		$userProfile = D('userProfile');
		if(!$userProfile->checkProfileInitial($result['user_id'])) {
			$this->redirect('User/viewProfile', '', 3, 'Retrieving your profile...');
		}
		
		if(IS_POST) {
			$data = I('post.');
			$data['user_id'] = $result['user_id'];
			//dump($data['user_id']);
			if(!$userProfile->create($data)) {
				//exit($user->getError());
				$message['hint'] = $userProfile->getError();
				//$this->show($message);
				$this->assign('title', $title);
				$this->assign('message', $message);
				$this->display();
			}
			else {
				$flag = $userProfile->add();
				//dump($flag);
				if($flag) {
					$this->show('Add profile successfully.');
					$this->success('Add profile successfully.', 'viewProfile', 3);
				}
			}
		}
		
		else {
			$this->assign('title', $title);
			$this->assign('message', $message);
			$this->display();
		}
	}
	
	public function viewProfile() {
		//$this->show('Home: UserController - viewProfile');
		
		$title = "Kiddos Lens - My Profile";
		
		$user = D('user');
		$result = $user->checkValidUser();
		if(!$result) {
			$this->redirect('User/login', '', 3, 'You have not login yet. Please sign IN first.');
		}
		
		$userInfo = $user->getValidUser();
		$userName = $userInfo['user_name']; 
		$userId = $userInfo['user_id'];
		
		$userProfile = D('userProfile');
		if($userProfile->checkProfileInitial($result['user_id'])) {
			$this->redirect('User/addProfile', '', 3, 'No profile information can be retrieved. Please add your profile first.');
		}
				
		$profile = D('userProfile');
		$info = $profile->getProfileInfo($userId);
		if($info) {
			//dump($info);
			
			$this->assign('title', $title);
			$this->assign('name', $userName);
			$this->assign('list', $info);
			$this->display();
		}
		else {
			$this->show('Profile retrieve error.');
		}
	}
}
?>