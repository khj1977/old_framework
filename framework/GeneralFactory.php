<?php

require_once("framework/MetaClass.php");

class GeneralFactory extends MetaClass {

  protected $className;

  public function __construct($className) {
    parent::__construct();

    $this->className = $className;
  }

  public function generateInstance() {
    $className = $this->className
    $instance = new $className();

    return $instance;
  }

}

?>