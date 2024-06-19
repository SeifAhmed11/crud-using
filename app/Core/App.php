<?php

class App 
{
    // Default controller
    protected $controller = "HomeController";
    // Default method
    protected $action = "index";
    // Params
    protected $params = [];

    public function __construct()
    {
        $this->prepareURL();
        $this->render();
    }

    /**
     * Extract controller, method, and parameters from the URL
     */
    private function prepareURL()
    {
        $url = $_SERVER['REQUEST_URI'];
        if (!empty($url) && $url !== "/") {
            // Trim and parse URL to get path only
            $url = trim(parse_url($url, PHP_URL_PATH), "/");
            $url = explode('/', $url);

            // Define controller
            $this->controller = isset($url[0]) && !empty($url[0]) ? ucwords($url[0]) . "Controller" : "HomeController";

            // Define method
            $this->action = isset($url[1]) ? $url[1] : "index";

            // Define parameters
            unset($url[0], $url[1]);
            $this->params = !empty($url) ? array_values($url) : [];
        } else {
            // Redirect to the default controller if URL is empty or root
            $this->controller = "HomeController";
            $this->action = "index";
            $this->params = [];
        }
    }

    private function render()
    {
        // Check if controller exists
        if (class_exists($this->controller)) {
            $controller = new $this->controller;

            // Check if method exists
            if (method_exists($controller, $this->action)) {
                call_user_func_array([$controller, $this->action], $this->params);
            } else {
                echo "Method: " . $this->action . " does not exist.";
                // Optionally, load an error view
                // View::load('error');
            }
        } else {
            echo "Class: " . $this->controller . " not found.";
            // Optionally, load an error view
            // View::load('error');
        }
    }
}

?>
