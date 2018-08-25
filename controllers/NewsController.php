<?php

include_once ROOT . '/models/News.php';

class NewsController {

	public function actionIndex() {
		$newsList = [];
		$newsList = News::getNewsList();
		// echo "ROOT: " . ROOT;
		
		require_once(ROOT . '/views/news/index.php');
		return true;
	}

	public function actionView($id) {
		$newsItem = News::getNewsItemById($id);

		return true;
	}

}