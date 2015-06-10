<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {
	
	public function addOrder() {
		$user = D('user');
		if(!$user->checkValidUser()) {
			$this->redirect('User/login', '', 3, 'You have not login yet. Please sign IN first.');
			die();
		}
		$userInfo = $user->getValidUser();
		$data['user_id'] = $userInfo['user_id'];
		
		if(isset($_SESSION['cart'])) {
			$items = I('session.cart');
		}
		else {
			$this->redirect('Product/viewCart', '', 3, 'Your shopping cart is empty.');
			die();
		}
		
		$order = D('order');
		$total = $order->getTotalInfo($items);
		//dump($total);
		
		$data['total_price'] = $total['total_price'];
		$data['total_qty'] = $total['total_qty'];
		$data['place_date'] = date("Y-m-d H:i:s", time());
		
		if(!$order->create($data)) {
			$this->redirect('Product/viewCart', '', 3, $order->getError());
			die();
		}
		else {
			$insertId = $order->add();
			if($insertId) {
				//dump($insertId);
			}
		}
		
		$singles = $order->getItemsInfo($insertId, $items);
		//dump($singles);
		$orderItem = D('orderItem');
		$result = $orderItem->addAll($singles);
		$url = 'view/orderId/'.$insertId;
		if($result && !is_null($result)) {
			unset($_SESSION['cart']);
			$this->success('Order successfully placed. Thank you!', $url, 3);
		}
	}
	
	public function orderList() {
		//$this->show('Controller: Order - orderList');
		$title = "Kiddos Lens - My Orders";
		
		$user = D('user');
		if(!$user->checkValidUser()) {
			$this->redirect('User/login', '', 3, 'You have not login yet. Please sign IN first.');
			die();
		}
		$userInfo = $user->getValidUser();
		$userId = $userInfo['user_id'];
		$name = $userInfo['user_name'];
		
		$order = D('order');
		$result = $order->getOrderList($userId);
		//dump($result);
		$this->assign('title', $title);
		$this->assign('name', $name);
		$this->assign('list', $result);
		$this->display();
	}
	
	public function view($orderId) {
		//$this->show('Controller: Order - view');
		$title = 'Kiddos Lens - Order id:'. $orderId;
		
		$user = D('user');
		if(!$user->checkValidUser()) {
			$this->redirect('User/login', '', 3, 'You have not login yet. Please sign IN first.');
			die();
		}
		$userInfo = $user->getValidUser();
		$userId = $userInfo['user_id'];
		$userName = $userInfo['user_name'];
		
		$orderItem = D('orderItem');
		$order = D('order');
		$result = $orderItem->getOrderItem($orderId);
		$result2 = $order->getSingleOrder($orderId);
		if($result) {
			$result3 = $order->getItemInfo($result, $orderId);
		}
		if($result2 && $result3) {
			$this->assign('title', $title);
			$this->assign('name', $userName);
			$this->assign('order', $result2);
			$this->assign('list', $result3);
			//dump($result2);
			//dump($result3);
			$this->display();
		}
		else {
			$this->redirect('Product/orderList', '', 3, 'Failure to retrieve items for this order.');
			die();
		}
	}
	
	public function directOrder($productId) {
		$title = 'Kiddos Lens - Direct order: Review';
		
		$user = D('user');
		if(!$user->checkValidUser()) {
			$this->redirect('User/login', '', 3, 'You have not login yet. Please sign IN first.');
			die();
		}
		$userInfo = $user->getValidUser();
		$data['user_id'] = $userInfo['user_id'];
		$name = $userInfo['user_name'];
		
		$product = D('product');
		$result = $product->retrieveProduct($productId);
		if(!$result) {
			$this->show('Order error.');
		}
		
		if(IS_POST) {
			$qty = I('post.qty');
			$result['qty'] = $qty;
		}
		
		else {
				$result['qty'] = 1;
		}
		
		$result['total_amount'] = $result['price'] * $result['qty'];
		$result['total_amount'] = sprintf("%s.00", $result['total_amount']);
		
		if(isset($_SESSION['direct'])) {
			$_SESSION['direct']['id'] = $productId;
			$_SESSION['direct']['qty'] = $qty;
		}
		else {
			$_SESSION['direct']['id'] = $productId;
			$_SESSION['direct']['qty'] = $qty;
		}
		
		$this->assign('title', $title);
		$this->assign('name', $name);
		$this->assign('data', $result);
		$this->display();
	}
	
	public function review($type) {
		$user = D('user');
		$product = D('product');
		$order = D('order');
		$direct = false;
		
		if(!$user->checkValidUser()) {
			$this->redirect('User/login', '', 3, 'You have not login yet. Please sign IN first.');
			die();
		}
		
		$userInfo = $user->getValidUser();
		$data['user_id'] = $userInfo['user_id'];
		$name = $userInfo['user_name'];
		
		if($type == '1') {
			if(isset($_SESSION['cart'])) {
				$productIds = I('session.cart');
			}
			//dump($items);
			$output = $order->getOrderReview($productIds);
			if($output) {
				$total = $order->getReviewTotal($output);
			}
			else {
				$this->show('Product data error.');
				die();
			}
		}
		
		if($type == '2') {
			$direct = true;
			$data = I('session.direct');
			//dump($_SESSION);
			$qty = $data['qty'];
			if(!isset($data)) {
				$this->show('Product data error.');
				die();
			}
			else {
				$result = $product->retrieveProduct($data['id']);
				if($result) {
					$output[0]['id'] = $data['id'];
					$output[0]['product_name'] = $result['brand']." ".$result['product_name'];
					$output[0]['price'] = $result['price'];
					$output[0]['qty'] = $qty;
					$total = $order->getReviewTotal($output);
				}
			}
		}
		
		$this->assign('direct', $direct);
		$this->assign('total', $total);
		$this->assign('name', $name);
		$this->assign('output', $output);
		$this->display();
	}
}
?>