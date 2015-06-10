<?php
namespace Home\Model;
use Think\Model;
class ProductModel extends Model {
	
	public function retrieveProduct($id) {
		$product = M('product');
		
		$query = "id=".$id;
		//dump($query);
		$result = $product->where($query)->find();
		if($result && !is_null($result)) {
			return $result;
		}
		else {
			return false;
		}
	}
	
	public function getCategory($str) {
		$category = explode(",", $str);
		if($category) {
			return $category;
		}
	}
	
	public function getListByMount($mount) {
		$query = "mount= '".$mount."'";
		//echo $query;
		$product = M('product');
		$result = $product->where($query)->select();
		//dump($result);
		if($result && !is_null($result)) {
			return $result;
		}
		else {
			return false;
		}
	}
	
	public function addProductToCart($productId) {
		if(isset($_SESSION['cart'][$productId])) {
			$_SESSION['cart'][$productId]++;
		}
		else {
			$_SESSION['cart'][$productId] = 1;
		}
		//dump($_SESSION['cart']);
	}
	
	public function getTopProduct($productIds) {
		$num = count($productIds);
		//dump($num);
		$products = array();
		if($num) {
			for($i = 0; $i < count($productIds); $i++) {
				$result = $this->retrieveProduct($productIds[$i]);
				$products[$i] = $result;
				//dump($products);
			}
			return $products;
		}
		else {
			return false;
		}
	}
	
	public function searchProductByWord($word) {
		$product = M('product');
		//$word = str_replace(' ', ',', $word);
		//$words = explode(',', $word);
		$result = array();
		$where['brand'] = array('like', '%'.$word.'%');
		$where['product_name'] = array('like', '%'.$word.'%');
		$where['model'] = array('like', '%'.$word.'%');
		$where['category'] = array('like', '%'.$word.'%');
		$where['mount'] = array('like', '%'.$word.'%');
		$where['_logic'] = 'or';
		$map['_complex'] = $where;
		$result[] = $product->where($map)->select();
		if($result && !is_null($result)) {
			return $result;
		}
		else {
			return false;
		}
	}
	
	public function searchProductByType($data) {
		$result = array();
		$list = array();
		if(isset($data['mount'])) {
			if($data['mount'] == '0') {
				$where['mount'] = array('like', '%_%');
			}
			else{
				$where['mount'] = array('like', '%'.$data['mount'].'%');
			}
			
			if(isset($data['type'])) {
				$num = count($data['type']);
				$where['category'] = array();
				for($i = 0; $i < $num; $i++) {
					$where['category'][] = array('like', '%'.$data['type'][$i].'%');
				}
				if($num > 1) {
					$where['category'][] = 'and';
				}
				//$where['category'] = array(array('like', $data['type'][0]), array('like', $data['type'][$i]), 'and');
				//$where['category'] = array(array('like', $data['type'][0]), array('like', $data['type'][1]), 'and');
				$where['_logic'] = 'and';
				$map['_complex'] = $where;
				$product = M('product');
				$result = $product->where($map)->order('price asc')->select();
				if($result && !is_null($result)) {
					$num = count($result);
					for($i = 0; $i < $num; $i++) {
						$id = $result[$i]['id'];
						$result[$i]['product_link'] = U('Product/view', array('productId'=>$id));
					}
					return $result;
				}
				else {
					return false;
				}
			}
			
		}
	}
	
	public function searchProductData($data, $status, $query) {
		$list = array();
		if($status == '1') {
			$list['status'] = '1';
			$list['info'] = 'success';
			$list['query'] = $query;
			//$list['query'] = 
		} 
		for($i = 0; $i < count($data); $i++) {
			//$id = $data[$i]['id'];
			//$data[$i]['product_link'] = U('Product/view', array('productId', $id));
			//$data[$i]['product_link'] = 
			$list['products'][] = $data[$i];
		}
		return $list;
	}
	
	/*
	public function updateCartTotal() {
		$products = I('session.cart');
		$total = array();
		foreach($products as $key => $value) {
			$result = $this->retrieveProduct($key);
			if($result && !is_null($result)) {
				$price = $result['price'];
			}
			$total['total_price'] = $total['total_price'] + ($price * $value);
			$total['total_qty'] = $total['total_qty'] + $value;
		}
		$_SESSION['cart']['total_price'] = $total['total_price'];
		$_SESSION['cart']['total_qty'] = $total['total_qty'];
	}
	*/
}
?>