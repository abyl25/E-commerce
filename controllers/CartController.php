<?php

class CartController {

	public function actionIndex() {
		$categories = [];
		$categories = Category::getCategoriesList();

		$productsInCart = false;
		$productsInCart = Cart::getProducts();

		if ($productsInCart) {
			$productsIds = array_keys($productsInCart);
			$products = Product::getProductsByIds($productsIds);

			$totalPrice = Cart::getTotalPrice($products);
		}

		require_once(ROOT . "/views/cart/index.php");
		return true;
	}

	public function actionAdd($id) {
		echo "called add action in cart controller! ";
		Cart::addProduct($id);

		$referer = $_SERVER['HTTP_REFERER'];
		echo $referer;
		header("Location: $referer");
		return true;
	}

	public function actionAddAjax($id) {
		echo "called add AJAX action in cart controller!<br>";
		Cart::addProduct($id);
		return true;
	}

	public function actionDelete($id) {
		Cart::deleteProduct($id);
		header("Location: /cart/");
		return true;
	}

	public function actionCheckOut() {
		
		$productsInCart = Cart::getProducts();
		if ($productsInCart === false) {
			header("Location: /");
		}

		$categories = [];
		$categories = Category::getCategoriesList();
		
		// get total price
        $productsIds = array_keys($productsInCart);
        $products = Product::getProductsByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);

        $totalQuantity = Cart::countItems();

        $userName = false;
        $userPhone = false;
        $userComment = false;

        $result = false;

        // is authenticated
        if (!User::isGuest()) {
        	$userId = User::checkLoggedIn();
        	$user = User::getUserById($userId);
            $userName = $user['name'];
        } else {
        	$userId = false;
        }
        
        // 	
		if (isset($_POST['submit'])) {
			$userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
    		
    		$errors = [];
            if (!User::checkName($userName)) {
            	$errors[] = 'Неправильное имя';
            }
            if (!User::checkPhone($userPhone)) {
            	$errors[] = 'Неправильный телефон';
            }

            if ($errors == false) {
        		// 
                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

                if ($result) {
                    // 
                    //                 
                    $adminEmail = 'abylay.tastanbekov@nu.edu.kz';
                    $message = '<a href=""></a>';
                    $subject = 'new order!';
                    mail($adminEmail, $subject, $message);

                    // 
                    Cart::clear();
                }
            }
		} 

		require_once(ROOT . "/views/cart/checkout.php");
		return true;
	} 

}