<?php

return [
	// Product
	'product/([0-9]+)' => 'product/view/$1',  // actionView в ProductController
	
	// Catalog
	'catalog' => 'catalog/index',
	
	// Product category:
	'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
	'category/([0-9]+)' => 'catalog/category/$1',

	// Cart:
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController    
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAddAjax в CartController
    'cart/checkout' => 'cart/checkout',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart' => 'cart/index', // actionIndex в CartController

	// User:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',	

    // Admin Product controller:    
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
	
	// Admin Category controller:    
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',
    
    // Order controller:    
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',

	// Admin panel
    'admin' => 'admin/index',

    // About
    'contacts' => 'site/contact',
    'about' => 'site/about',

	// Index page
	'index.php' => 'site/index',
	'' => 'site/index' // actionIndex в SiteController
];