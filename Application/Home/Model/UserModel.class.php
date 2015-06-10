<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	
	protected $_map = array(
		'name' => 'user_name',
		'password1' => 'user_passwd',
		'mail' => 'email',
	);
	
	protected $_validate = array(
		array('user_name', '', 'This user name has been occupied.', 0, 'unique', 1),
		array('user_name', '(^[A-Za-z0-9_-]{6,20}$)', 'User name needs to contain 6 to 20 characters.'),
		array('user_name', '(^[A-Za-z]+[A-Za-z0-9_-]+[A-Za-z0-9]$)', 'User name only accepts letters, numbers, _ and -'),
		array('user_passwd', 'password2', 'Retype password not confirm.', 0, 'confirm'),
		array('user_passwd', '(^[\s|\S]{6,20}$)', 'Password should between 6 to 20 characters'),
		array('email', '', 'This email has been used.', 0, 'unique', 1),
		array('email', '/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/', 'Invalid email address.'),
		
	);
	
	protected $_auto = array(
		array('user_passwd', 'md5', 3, 'function'),
		array('last_time', 'time', 3, 'function'),
		array('last_ip', 'get_client_ip', 3, 'function'),
	);
	
	public function checkExistence($userName, $passwd) {
		$info = array();
		
		$query = 'user_name = "'.$userName.'"';
		//echo $query;
		
		$result = M('user')->where($query)->select();
		//dump($result);
		
		if(!isset($result)) {
			$info['status'] = '0';
			$info['info'] = 'Login Failure. Username not exist.';
			return $info;
		}
		
		else {
			$passwd = md5($passwd);	
			$query = 'user_name = "'.$userName.'" AND user_passwd="'.$passwd.'"';
			//echo $query;
			$result = M('user')->where($query)->select();
			//dump($result);
		
			if(isset($result)) {
				if(count($result) > 0) {
					$info['status'] = '1';
					$info['info'] = 'Login Successfully.';
				}
				$userId = $result[0]['id'];
				$info['id'] = $userId;
			}
			else {
				$info['status'] = '0';
				$info['info'] = 'Login Failure. Wrong password.';
			}
			return $info;
		}
	}
	
	public function checkUserExistence($userName) {
		$user = D('user');
		$query = "user_name = '".$userName."'";
		$result = $user->where($query)->find();
		if($result && !is_null($result)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function checkEmailExistence($email) {
		$user = M('user');
		$query = "email = '".$email."'";
		$result = $user->where($query)->find();
		if($result && !is_null($result)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function validUser($userName, $userId) {
		if(isset($userName) && isset($userId)) {
			$_SESSION['valid_user'] = $userName;
			$_SESSION['user_id'] = $userId;
		}
		else {
			return false;
		}
	}
	
	public function loginUpdate($userId) {
		$user = M('user');
		$time = time();
		//$user->last_time = $time;
		$ip = get_client_ip();
		//$user->last_ip = $ip;
		//$user->id = $userId;
		$data['id'] = $userId;
		$data['last_time'] = $time;
		$data['last_ip'] = $ip;
		$user->create($data);
		//$result = $user->where()->save();
		$result = $user->save();
		return $result;
	}
	
	public function getIp() {
		if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
			$ip = getenv("HTTP_CLIENT_IP");
		}
		else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		}
		else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
			$ip = getenv("REMOTE_ADDR");
		}
		else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		else {
			$ip = "unknown";
		}
		//solve the localhost problem, showing a ipv6 address
		if($ip == '::1') {
			$ip = '127.0.0.1';
		}
		return $ip;
	}
	
	public function checkValidUser() {
		if(isset($_SESSION['valid_user']) && isset($_SESSION['user_id'])) {
			$validUser['user_name'] =  $_SESSION['valid_user'];
			$validUser['user_id'] =  $_SESSION['user_id'];
			return $validUser;
		}
		else {
			return false;
		}
	}
	
	public function getValidUser() {
		$userInfo['user_name'] = $_SESSION['valid_user'];
		$userInfo['user_id'] = $_SESSION['user_id'];
		return $userInfo;
	}
	
}
?>