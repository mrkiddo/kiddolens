<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    
	public function index(){
        //$this->show('Controller: Index - index');
		$title = "Kiddos Lens - Home";
		$message = array();
		
		$user = D('user');
		$result = $user->checkValidUser();
		if($result) {
			$userInfo = $user->getValidUser();
			$message['user_name'] = $userInfo['user_name'];
		}
		
		$this->assign('title', $title);
		$this->assign('name', $message['user_name']);
		$this->display();
    }
}