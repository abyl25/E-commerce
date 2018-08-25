<?php

class Router {

	private $routes;

    public function __construct() {
    	//
        $routesPath = ROOT . '/config/routes.php';

        // 
        $this->routes = include($routesPath);
    }

    private function getURI() {
    	if (!empty($_SERVER['REQUEST_URI'])) { 
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run() {

    	// 
        $uri = $this->getURI();
        // echo "URI: " . $uri . "<br>";

        // 
        foreach ($this->routes as $uriPattern => $path) {
        	if (preg_match("~$uriPattern~", $uri)) {  // 
        		echo "<br>";

        		//
        		$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

        		// 
        		$segments = explode("/", $internalRoute);        		
        		$controllerName = array_shift($segments).'Controller';
        		$controllerName = ucfirst($controllerName);
        		// echo "Controller: " . $controllerName . "<br>";

        		$actionName = 'action' . ucfirst(array_shift($segments));
        		// echo "Action: " . $actionName . "<br>";

        		$parameters = $segments;
        		// print_r($parameters);
        		// echo "<br>";

    			// 
    			$controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
    			if (file_exists($controllerFile)) {
    				include_once($controllerFile);
    			}

    			// 
    			$controllerObject = new $controllerName();
    			$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                
    			if ($result) {
    				break;
    			}

        	}
        }
    }

}    