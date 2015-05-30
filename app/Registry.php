<?php
namespace App;

class Registry {
    private $vars = array();
    private static $_instance = null;

    public function __construct() {}
    public function __clone() {}

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __get($name) {
        return $this->vars[$name];
    }

    public function __set($name, $value) {
        $this->vars[$name] = $value;
    }

} 