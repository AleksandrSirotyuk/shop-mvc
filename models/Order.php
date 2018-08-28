<?php 
class Order{
	public function GetDataById($id){
		$data = R::getRow('SELECT * FROM users WHERE id='.$id);
		return $data;
	}
	public function SaveOrder($user_name, $user_phone, $user_comment, $user_id, $products){
		$products = json_encode($products);
		R::exec( 'INSERT INTO product_order 
			SET user_name=?, user_phone=?, user_comment=?, user_id=?, products=?', 
			array($user_name, $user_phone, $user_comment, $user_id, $products) );
	}
}