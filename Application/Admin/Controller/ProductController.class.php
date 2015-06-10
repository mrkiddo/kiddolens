<?php
namespace Admin\Controller;
use Think\Controller;
class ProductController extends Controller {
	
	public function lookup() {
		$this->show('Controller: Product - lookup');
		
		if(IS_POST) {
			$data = I('post.');
			//dump($data);
			$keyword = $data['keyword'];
			$type = $data['type'];
			$product = D('product');
			/*
			switch($type) {
				case 'id': 
			}
			*/
			//dump($keyword);
			$result = $product->retrieveProduct($keyword, $type);
			if($result) {
				dump($result);
			}
			else {
				echo "NO item found.";
			}
		}
		
		else {
			$this->display();
		}
	}
	
    public function add(){
        $this->show('Controller: Product - add');
		//$this->display();
		
		if(IS_POST) {
			$data = I('post.');
			//dump($data);
			$data['category'] = implode(",", $data['cat']);
			//dump($data);
			
			$product = D('product');
			if(!$product->create($data)) {
				$this->show('Error');
				$this->show($this->getError());
			}
			else {
				$insertId = $product->add();
				if($insertId) {
					$this->show('New product added.');
					$this->success('New product added.', U("Index/index"), 3);
				}
			}
		}
		
		else {
			$this->display();
		}
    }
	
	
}
?>