<?php

require_once("framework/MetaClasss.php");

abstract class BaseArguments extends MetaClass {
  
  public function __construct() {
  }

  abstract public function getArguments();

}

?>