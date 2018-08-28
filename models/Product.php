<?php

class Product{

	public function GetLatestProducts($amount, $page = 1){
		$offset = $amount*($page-1);
		$products= R::getAll( 'SELECT * FROM product WHERE product.status = 1 
			ORDER BY product.id DESC LIMIT ? OFFSET ? ', array($amount, $offset));
		return $products;
	}

	public function GetProductById($id){
		$product= R::getRow('SELECT * FROM product WHERE id='.$id);
		return $product;
	}

	public function GetProductsByCategory($categoryId){
		$productsByCategory= R::getAll('SELECT * FROM product WHERE product.status=1 AND category_id='.$categoryId);
		return $productsByCategory;
	}

	public function GetAmountOfProducts(){
		$amountOfProducts =  R::count('product', 'status=1');
		return $amountOfProducts;
	}

	public function GetAmountOfRecommendedProducts(){
		$amountOfRecommendedProducts =  R::count('product', 'status=1 AND is_recommended=1');
		return $amountOfRecommendedProducts;
	}

	public function GetRecommendedProducts(){
		$recommededProducts = R::getAll( 'SELECT * FROM product WHERE product.status = 1 AND product.is_recommended = 1');
		return $recommededProducts;
	}
}