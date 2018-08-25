<?php

abstract class AdminBase {

	public static function checkAdmin() {
		$userId = 0;
		$userId = User::checkLoggedIn();

		$user = User::getUserById($userId);
		if ($user['role'] === "admin") {
			// echo $user['name'] . " is Admin of website";
			return true;
		}

		die("Access denied. You are not admin!");
	}
}