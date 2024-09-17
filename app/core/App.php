<?php

class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        require_once '../app/routes.php'; // Include routes.php which has all the routes

        $route = '';

        if (isset($url[0])) { // Check if there is a controller name
            $route = $url[0]; // Start with the controller name
        }

        if (isset($url[1])) { // Check if there is a method name
            $route .= '/' . $url[1]; // Append the method name to the route.
        }

        if (isset($routes[$route])) {
            $this->controller = $routes[$route]['controller']; // Get the correct controller
            $this->method = $routes[$route]['method'];
            $this->params = array_slice($url, 2);
        } else {
            // Handle 404 or route not found
            echo "404 - Route Not Found";
            return; // Stop further execution
        }

        require_once '../app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller; // Create an object from that controller name

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [''];
    }
}

?>
