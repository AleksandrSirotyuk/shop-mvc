<?php
class Cart{

	public function AddProduct($id){
		$productsInCart = array();
		if(isset($_SESSION['products']))
			$productsInCart = $_SESSION['products'];
		if(array_key_exists($id, $productsInCart))
			$productsInCart[$id]++;
		else
			$productsInCart[$id] = 1;
		$_SESSION['products'] = $productsInCart;
	}
	public function GetProducts(){
		if(isset($_SESSION['products']))
			return $_SESSION['products'];
		return false;
	}
	public function DeleteProduct($id){
		if(isset($_SESSION['products'][$id])){
			unset($_SESSION['products'][$id]);
			return true;
		}
		else 
			return false;
		}
	public function ReduceProduct($id){
		if( (array_key_exists($id, $_SESSION['products'])) && ($_SESSION['products'][$id]>1)){
			$_SESSION['products'][$id]--;
			return true;
		}
		else{
			unset($_SESSION['products'][$id]);
			return false;
		}
	}
}
?>