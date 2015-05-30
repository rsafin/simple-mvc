<?php

namespace App;

abstract class Model {

    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        } else
        {
            return null;
        }
    }

    public function __set($name, $value){
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    public function setArguments($args) {
        foreach($args as $key => $arg) {
            $this->__set($key, $arg);
        }
    }
} 