<?php
namespace App;


class Router {
    const CONTROLLER = "students";
    const ACTION = "indexAction";

    protected $_registry;
    protected $_path;

    public function __construct(Registry $registry) {
        $this->_registry = $registry;
    }

    public function delegate() {
        $controller = Router::CONTROLLER;
        $action = Router::ACTION;

        if (isset($_REQUEST["r"]) || !empty($_REQUEST["r"])) {
            $route = array_shift($_REQUEST);
            $parts = explode("/", $route);
            $controller = array_shift($parts);
            if (!empty($parts)) {
                $action = array_shift($parts) . "Action";
            } else {
                $action = Router::ACTION;
            }
        }

        $params = $_REQUEST;

        $controllerPath = $this->_path . $controller . "Controller.php";

        if (!is_file($controllerPath)) {
            die ("Invalid controller name!");
        }

        include_once($controllerPath);

        $this->_registry->controller = $controller;
        $this->_registry->action = substr($action, 0, strpos($action, "Action"));

        $class = "App\\Controller\\" . $controller . "Controller";
        $controller = new $class($this->_registry);

        if (!method_exists($controller, $action)) {
            die ("Invalid controller action!");
        }

        $ref_function = new \ReflectionMethod($controller, $action);

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (count($params) != $ref_function->getNumberOfRequiredParameters()) {
                die ("Invalid count action parameters!");
            }
            call_user_func_array(array($controller, $action), $params);
        }  elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            call_user_func(array($controller, $action), $params);
        }


    }

    public function setPath($path) {
        $path = FULL_PATH . DIRECTORY_SEPARATOR . trim(preg_replace("|[/]|", DIRECTORY_SEPARATOR, $path),"/\\");
        $path .= DIRECTORY_SEPARATOR;
        if (is_dir($path) == false) {
            die('Invalid controller path: `' . $path . '`');
        }
        $this->_path =  $path;
    }

    public static  function createUrl($arr) {
        $url = "index.php?r=" .  array_shift($arr);
        foreach($arr as $key => $val) {
            $url .= "&" . $key . "=" . $val;
        }
        return $url;
    }
} 