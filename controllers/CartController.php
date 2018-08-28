<?php

include ROOT.'/models/Cart.php';
include ROOT.'/models/Product.php';

class CartController{

	public function actionIndex(){
		$price = 0;

		$cart = new Cart();
		$product = new Product();
		if(isset($_SESSION['products'])){
			$productsInCart = $cart->GetProducts();
			if(array_sum($productsInCart) > 0){
				$product_keys = array_keys($productsInCart);
				for($i=0; $i<count($productsInCart); $i++)
					$getProduct[$i] = $product->GetProductById($product_keys[$i]);
			}
	}
		include ROOT.'/views/cart/index.php';
	}

	public function actionAdd($id){
		$cart = new Cart();
		$cart->AddProduct($id);
		
		$referrer = $_SERVER['HTTP_REFERER']; ?>
		<script type="text/javascript">
			location.replace("<?php echo $referrer ?>"); 
		</script>
		<?php
	}

	public function actionDelete($id){
		$cart = new Cart();
		$cart->DeleteProduct($id);
		$referrer = $_SERVER['HTTP_REFERER']; ?>
		<script type="text/javascript">
			location.replace("<?php echo $referrer ?>"); 
		</script>
		<?php
	}

	public function actionReduce($id){
		$cart = new Cart();
		$cart->ReduceProduct($id);
		$referrer = $_SERVER['HTTP_REFERER']; ?>
		<script type="text/javascript">
			location.replace("<?php echo $referrer ?>"); 
		</script>
		<?php
	}
}
?>