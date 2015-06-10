<?php
namespace Home\Model;
use Think\Model;
class UserProfileModel extends Model {
	
	protected $_validate = array(
		array('first_name', '/[A-Za-z]/', 'First name should be English characters.'),
		array('last_name', '/[A-Za-z]/', 'Last name should be English characters.'),
		array('title', array('mr', 'miss', 'mrs'), 'Invalid title.', 0, 'in'),
		array('city', '/[A-Za-z]/', 'City name should be English characters.'),
		array('province', array('AB', 'BC', 'MB', 'NB', 'NL', 'NS', 'ON', 'PE', 'QC', 'SK'), 'Invalid Canadian province.', 0, 'in'),
		array('postal_code', '(^[A-Za-z]+[0-9]+[A-Za-z]+[0-9]+[A-Za-z]+[0-9]$)', 'Invalid postal code.'),
		array('phone', '/[0-9]/', 'Invalid phone number.'),
		array('credit_card_type', array('MA', 'VI'), 'Invalid credit card type.', 0, 'in'),
		array('create_card_number', '/[0-9]/', 'Invalid credit card number.'),
	);
	
	protected $_auto = array(
		array('edit_time', 'time', 3, 'function'),
	);
	
	public function checkProfileInitial($userId) {
		$profile = M('userProfile');
		$query = "user_id= ".$userId;
		$data = $profile->where($query)->find();
		//dump($data);
		if(is_null($data)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function getProfileInfo($userId) {
		$profile = M('userProfile');
		$query = "user_id= ".$userId;
		//echo $query;
		$data = $profile->where($query)->find();
		//dump($data);
		if(is_null($data)) {
			return false;
		}
		
		switch($data['credit_card_type']) {
			case 'MA': $data['credit_card_type'] = 'Master Card'; break;
			case 'VI': $data['credit_card_type'] = 'Visa Card'; break;
		}
		
		switch($data['title']) {
			case 'mr': $data['title'] = 'Mr.'; break;
			case 'miss': $data['title'] = 'Miss'; break;
			case 'mrs': $data['title'] = 'Mrs.'; break;
		}
		
		return $data;
	}
	
}
?>