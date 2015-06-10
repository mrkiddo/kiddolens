<?php
namespace Home\Model;
use Think\Model;
class OrderModel extends Model {
	
	public function getTotalInfo($data) {
		$total = array();
		foreach($data as $key => $value) {
			$product = D('product');
			$result = $product->retrieveProduct($key);
			if($result && !is_null($result)) {
				$price = $result['price'];
				$total['total_price'] = $total['total_price'] + $price * $value;
				$total['total_qty'] = $total['total_qty'] + $value;
			}
		}
		return $total;
	}
	
	public function getItemsInfo($orderId, $data) {
		$singles = array();
		$index = 0;
		foreach($data as $key => $value) {
			$product = D('product');
			$result = $product->retrieveProduct($key);
			if($result && !is_null($result)) {
				$price = $result['price'];
				$singles[$index]['price'] = $price;
				$singles[$index]['product_id'] = $key;
				$singles[$index]['qty'] = $value;
				$singles[$index]['order_id'] = $orderId;
			}
			$index++;
		}
		$index = 0;
		return $singles;
	}
	
	public function getOrderList($userId) {
		$order = M('order');
		$query = 'user_id='.$userId;
		$result = $order->where($query)->select();
		if($result && !is_null($result)) {
			return $result;
		}
		else {
			return false;
		}
	}
	
	public function getItemInfo($data, $orderId) {
		$index = 0;
		$productId = array();
		$info = array();
		for($i = 0; $i < count($data); $i++) {
			$productId[$i] = $data[$i]['product_id'];
		}
		for($i = 0; $i < count($productId); $i++) {
			$id = $productId[$i];
			$product = M('product');
			$item = M('orderItem');
			$query1 = 'id='.$id;
			$query2 = "order_id = '".$orderId."' and product_id = '".$id."'";
			$result = $product->where($query1)->find();
			$item = $item->where($query2)->find();
			$qty = $item['qty'];
			if($result && !is_null($result) && $qty && !is_null($qty)) {
				$info[$i] = $result;
				$info[$i]['qty'] = $qty;
			}
		}
		return $info;
	}
	
	public function getSingleOrder($orderId) {
		$order = M('order');
		$query = 'id='.$orderId;
		$result = $order->where($query)->find();
		if($result && !is_null($result)) {
			return $result;
		}
		else {
			return false;
		}
	}
	
	public function getOrderReview($productIds) {
		if(isset($productIds) && $productIds) {
			$product = D('product');
			$index = 0;
			$output = array();
			$total = array();
			foreach($productIds as $key => $value) {
				$result = $product->retrieveProduct($key);
				$output[$index]['id'] = $result['id'];
				$output[$index]['product_name'] = $result['brand']." ".$result['product_name'];
				$output[$index]['price'] = $result['price'];
				$output[$index]['qty'] = $value;
				$index++;
			}
			$index = 0;
			return $output;
		}
		else {
			return false;
		}
	}
	
	public function getReviewTotal($data) {
		$total = array();
		for($i = 0; $i < count($data); $i++) {
			$total['total_qty'] = $total['total_qty'] + $data[$i]['qty'];
			$total['total_price'] = $total['total_price'] + $data[$i]['qty'] * $data[$i]['price'];
		}
		return $total;
	}
	
}
?>