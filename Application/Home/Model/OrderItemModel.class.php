<?php
namespace Home\Model;
use Think\Model;
class OrderItemModel extends Model {
	
	public function getOrderItem($orderId) {
		$orderItem = M('orderItem');
		$query = "order_id = '".$orderId."'";
		//echo $query;
		$result = $orderItem->where($query)->select();
		if($result && !is_null($result)) {
			return $result;
		}
		else {
			return false;
		}
	}
}
?>