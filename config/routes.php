<?php
return array(
	'product/([0-9]+)' => 'product/view/$1',
	'category/([0-9]+)' => 'catalog/category/$1',
	'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
	'catalog/page-([0-9]+)' => 'catalog/index/$1',
	'catalog' => 'catalog/index',
	'user/registration' => 'user/register',
	'user/login' => 'user/login',
	'user/logout' => 'user/logout',
	'cabinet' => 'cabinet/index',
	'cabinet/edit' => 'cabinet/edit',
	'feedback' => 'feedback/index',
	'cart/add/([0-9]+)' => 'cart/add/$1',
	'cart/delete/([0-9]+)' => 'cart/delete/$1',
	'cart/reduce/([0-9]+)' => 'cart/reduce/$1',
	'order' => 'order/index',
	'cart' => 'cart/index',
	'admin' => 'admin/index',
	'' => 'site/index' //actionIndex в NewsCotroller
); 
