<?php

include ROOT.'/models/Category.php';
include ROOT.'/models/Product.php';
include ROOT.'/components/Pagination.php';

class CatalogController{

	public function actionIndex($page = 1){
		$showByDefault = 6;
		$categories = new Category();
		$categoriesList = $categories->GetCategoriesList();
		$products = new Product();
		$latestProducts = $products->GetLatestProducts($showByDefault, $page);
		$amount = $products->GetAmountOfProducts();
		$pagination = new Pagination($amount, $page, $showByDefault,'page-');
		require ROOT.'/views/catalog/index.php';
		return true;
	}

	public function actionCategory($categoryId){
		$categories = new Category();
		$categoriesList = $categories->GetCategoriesList();
		$products = new Product();
		$productsByCategory = $products->GetProductsByCategory($categoryId);
		require ROOT.'/views/catalog/category.php';
		return true;
	}
	
}
?>
