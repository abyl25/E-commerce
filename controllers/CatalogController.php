<?php

class CatalogController {

	public function actionIndex() {
		$categories = [];
		$categories = Category::getCategoriesList();

		$latestProducts = [];
		$latestProducts = Product::getLatestProducts();

		require_once(ROOT . '/views/catalog/index.php');
		return true;
	}

	public function actionCategory($catId, $page = 1) {
		$categories = [];
		$categories = Category::getCategoriesList();

		$categoryProducts = [];
		$categoryProducts = Product::getProductsListByCategory($catId, $page);

		$total = Product::getTotalProductsInCategory($catId);
		$pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

		require_once(ROOT . '/views/catalog/category.php');
		return true;
	}
}