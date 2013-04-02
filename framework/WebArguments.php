<?php

require_once("framework/MetaClass.php");

class WebArguments extends MetaClass {

  public function __construct() {
  }

  public function getArguments() {
    return array_merge($_POST, $_GET);
  }

}

?>