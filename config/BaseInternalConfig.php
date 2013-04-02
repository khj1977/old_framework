<?php

require_once("framework/MetaClass.php");

class BaseInternalConfig extends MetaClass {

  protected $container;

  public function __construct() {
    parent::__construct();
  }

  public function __get($key) {
    if (array_key_exists($key, $this->container)) {
      return false;
    }

    return $this->container[$key];
  }

  public function __set($key, $val) {
    $this->container[$key] = $val;

    return $this;
  }

}

?>
