<?php
namespace Admin\Model;
use Think\Model;
class ProductModel extends Model {
	
	protected $_auto = array(
		array('update_time', 'time', 3, 'function'),
	);
	
	public function retrieveProduct($word, $type) {
		$product = M('product');
		//dump($word);
		//dump($type);
		
		if($type == 'id') {
			$query = "id=".$word;
			echo $query;
			$result = $product->where($query)->find();
			if($result && (!is_null($result))) {
				return $result;
			}
			else {
				return false;
			}
		}
		
		if($type == 'product_name') {
			//$query = "product_name LIKE ".$word;
			//echo $query;
			$query = '%'.$word.'%';
			echo $query;
			$where['product_name']=array('like', $query);
			$result = $product->where($where)->select();
			//$result = $product->where($query)->select();
			if($result && (!is_null($result))) {
				return $result;
			}
			else {
				return false;
			}
		}
	}
}
?>