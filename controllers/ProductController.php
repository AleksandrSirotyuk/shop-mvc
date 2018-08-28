<?php

require ROOT.'/models/Product.php';
require ROOT.'/models/Category.php';

class ProductController{

	public function actionView($id){
		$categories = new Category();
		$categoriesList = $categories->GetCategoriesList();
		$product = new Product();
		$getProduct = $product->GetProductById($id);
		require ROOT.'/views/product/view.php';
		return true;
	}
	
}