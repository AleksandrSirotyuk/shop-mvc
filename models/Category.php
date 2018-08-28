<?php

class Category{

	public function GetCategoriesList(){
		$categories= R::getAll( 'SELECT * FROM category ORDER BY sort_order ASC' );
		return $categories;
	}
}
?>