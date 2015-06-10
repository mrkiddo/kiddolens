<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends Controller {
	
	public function view($productId) {
		//dump($productId);
		$name = false;
		
		$user = D('user');
		$result = $user->checkValidUser();
		if($result) {
			$userInfo = $user->getValidUser();
			$name = $userInfo['user_name']; 
		}
		
		$product = D('product');
		$result = $product->retrieveProduct($productId);
		if($result) {
			//dump($result);
			$category = $product->getCategory($result['category']);
			$result['category'] = $category;		
			$this->assign('product', $result);
			$this->assign('name', $name);
			$this->display();
		}
		else {
			$this->show('Retrieve data error.');
		}
	}
	
	public function category($mount, $type) {
		
		$product = D('product');
		
		//dump($mount);
		//dump($type);
		
		$message = array();
		
		if($type == '0') {
			if(!(strrpos($mount, "e-") === false)) {
				$mount = "E-Mount Lens";
				$message['status'] = '1';
				$ids = array('1', '2', '3');
			}
			else {
				$mount = "A-Mount Lens";
				$message['status'] = '0';
				$ids = array('4', '5', '6');
			}
			$message['type'] = $mount;
			
			$topProducts = $product->getTopProduct($ids);
			
			//dump($topProducts);
			
			$title = 'Kiddos Lens - '.$mount;
			$this->assign('title', $title);
			$this->assign('message', $message);
			$this->assign('top', $topProducts);
			$this->display(T('Product/cate_mount'));
			
		}
	}
	
	public function addCart($productId) {
		//$this->show('Controller: Product - addCart');
		//dump($productId);
		
		if(IS_AJAX) {
			$user = D('user');
			$message = array();
			$result = $user->checkValidUser();
			if(!$result) {
				$message['status'] = '0';
				$message['info'] = 'Please login first.';
				$this->ajaxReturn($message);
			}
			else {
				$product = D('product');
				$product->addProductToCart($productId);
				$message['status'] = '1';
				$message['info'] = 'Added to cart. Thank you!';
				$this->ajaxReturn($message);
			}
		}
		
		$user = D('user');
		$result = $user->checkValidUser();
		if(!$result) {
			$this->redirect('User/login', '', 3, 'Please Sign IN first.');
			die();
		}
		
		$product = D('product');
		$product->addProductToCart($productId);
		//$product->updateCartTotal();
		$this->redirect('Product/view', array('productId' => $productId), 3, 'Add to cart already.');
	}
	
	public function viewCart() {
		//$this->show('Controller: Product - addCart');
		//dump($productId);
		
		if(IS_AJAX) {
			$data = I('post.');
			$action = $data['type'];
			$message = array();
			if($action == 'edit')  {
				$id = $data['id'];
				$value = $data['qty'];
				if($value == 0) {
					unset($_SESSION['cart'][$id]);
					$message['status'] = '0';
					$message['info'] = 'item deleted';
				}
				else {
					$_SESSION['cart'][$id] = $value;
					$message['status'] = '1';
					$message['info'] = 'item edited';
				}
				$this->ajaxReturn($message);
			}
			if($action == 'delete') {
				$id = $data['id'];
				unset($_SESSION['cart'][$id]);
				$message['status'] = '1';
				$message['info'] = 'item deleted';
				$this->ajaxReturn($message);
			}
		}
		
		$user = D('user');
		$product = D('product');
		
		$result = $user->checkValidUser();
		if(!$result) {
			$this->redirect('User/login', '', 3, 'Please Sign IN first.');
			die();
		}
		$userInfo = $user->getValidUser();
		$name = $userInfo['user_name']; 
		
		if(IS_POST) {
			$data = I('post.');
			//dump($data);
			foreach($data as $key => $value) {
				if($value == 0) {
					unset($_SESSION['cart'][$key]);
				}
				else {
					$_SESSION['cart'][$key] = $value;
				}
			}
			//$product->updateCartTotal();
			//dump($_SESSION['cart']);
		}
		
		$productIds = I('session.cart');
		
		if(count($productIds) > 0) {
			$index = 0;
			$output = array();
			foreach($productIds as $key => $value) {
				$result = $product->retrieveProduct($key);
				$output[$index]['id'] = $result['id'];
				$output[$index]['product_name'] = $result['brand']." ".$result['product_name'];
				$output[$index]['price'] = $result['price'];
				$output[$index]['qty'] = $value;
				$index++;
			}
			$index = 0;
			//dump($output);
		}
		else {
			$output = false;
		}
		
		$title = "Kiddos Lens - My Cart";
		
		$this->assign('name', $name);
		$this->assign('products', $output);
		$this->assign('title', $title);
		$this->display();
	}
	
	public function search() {
		
		/*
		$user = D('user');
		$name = false;
		$result = $user->checkValidUser();
		if($result) {
			$userInfo = $user->getValidUser();
			$name = $userInfo['user_name']; 
		}
		*/
		
		/*
		$product = D('product');
		$data['mount'] = 'e-mount';
		$data['type'] = array('zoom');
		$result = $product->searchProductByType($data);
		//dump($result);
		$result = $product->searchProductData($result, '1');
		//dump($result);
		*/
		
		
		if(IS_AJAX) {
			$data = I('post.');
			//dump($data);
			$query['mount'] = $data['mount'];
			$query['type'] = $data['type'];
			$product = D('product');
			$result = $product->searchProductByType($data);
			if($result) {
				$result = $product->searchProductData($result, '1', $query);
				$this->ajaxReturn($result);
			}
		}
		
		if(IS_POST) {
			$data = I('post.');
			//dump($data);
			$word = $data['searchword'];
			$product = D('product');
			$result = $product->searchProductByWord($word);
			//dump($result);
			if($result) {
				$result = $product->searchProductData($result, '1');
				//$this->ajaxReturn($result);
			}
			else {
			}
		}
		
		
		$this->assign('name', $name);
		$this->display();
	}
}
?>