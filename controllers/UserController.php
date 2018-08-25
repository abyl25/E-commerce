<?php

class UserController {
	
	public function actionRegister() {
		$name = '';
		$email = '';
		$password = '';
		$result = false;

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$errors = false;
			
			if (!User::checkName($name)) {
				$errors[] = 'Name should be greater than 3 chars'; 
			}
			if (!User::checkEmail($email)) {
				$errors[] = 'Invalid email. Try again!';
			}
			if (!User::checkPassword($password)) {
				$errors[] = 'Password should be greater than 6 chars'; 	
			}
			if (User::checkEmailExists($email)) {
				$errors[] = 'Email already taken'; 	
			}
			if ($errors == false) {
				$result = User::register($name, $email, $password);
			}
		}

		require_once(ROOT . '/views/user/register.php');

		return true;
	}

	public function actionLogin() {
		$email = false;
        $password = false;

        if (isset($_POST['submit'])) {
        	$email = $_POST['email'];
        	$password = $_POST['password'];

        	$errors = false;

        	if (!User::checkEmail($email)) {
        		$errors[] = 'Invalid email. Try again!';
        	}
        	if (!User::checkPassword($password)) {
				$errors[] = 'Password should be greater than 6 chars'; 	
			}

			$userId = User::checkUserData($email, $password);
			if ($userId == false) {
				$errors[] = 'Incorrect email or password';
			} else {
				User::auth($userId);
				header("Location: /cabinet/");
			}
        }

        require_once(ROOT . '/views/user/login.php');
        return true;
	}

	public function actionLogout() {
        session_start();      
        unset($_SESSION["user"]);       
        header("Location: /");
    }
}