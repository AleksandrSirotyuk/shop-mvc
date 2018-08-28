<?php

include ROOT.'/models/Category.php';
include ROOT.'/models/Product.php';
class SiteController{

	public function actionIndex(){
		$categories = new Category();
		$categoriesList = $categories->GetCategoriesList();
		$products = new Product();
		$latestProducts = $products->GetLatestProducts(5);
		$amountOfRecommendedProducts = $products->GetAmountOfRecommendedProducts();
		$recommededProducts = $products->GetRecommendedProducts();
		require ROOT.'/views/site/index.php';
		return true;
	}
	
}
?>
