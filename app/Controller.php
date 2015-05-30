<?php

namespace App;

abstract class Controller {
    protected $_registry;
    protected $_manager;

    public function __construct($registry) {
        $this->_registry = $registry;
        $this->_manager = $registry->entityManager;
    }

    public function render($params = array()) {
        $viewPath = FULL_PATH . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "view" . DIRECTORY_SEPARATOR . $this->_registry->controller . DIRECTORY_SEPARATOR . $this->_registry->action . ".php" ;
        if (!is_file($viewPath)) {
            die('Invalid view');
        }
        include_once($viewPath);
    }

    abstract function indexAction();
}