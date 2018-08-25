<?php

class CabinetController {

	public function actionIndex() {

		$userId = User::checkLoggedIn();
		$user = User::getUserById($userId);		

		require_once(ROOT . '/views/cabinet/index.php');		
		return true;
	}

	public function actionEdit() {
		$userId = User::checkLoggedIn();
		$user = User::getUserById($userId);

		$name = $user['name'];
		$password = $user['password'];
		$result = false;

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$password = $_POST['password'];

			$errors = false;

			if (!User::checkName($name)) {
				$errors[] = 'Name should be greater than 3 chars';
			}
			if (!User::checkPassword($password)) {
				$errors[] = 'Password should be greater than 6 chars';
			}

			if ($errors == false) {
				$result = User::edit($userId, $name, $password);
			}
		}

		require_once(ROOT . '/views/cabinet/edit.php');		
		return true;
	}
}