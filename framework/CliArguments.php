<?php

require_once("framework/MetaClass");

class CliArguments extends BaseArguments {

  protected $argv;

  public function __construct($argv) {
    parent::__construct();

    $this->argv = $argv;
  }

  public function getArguments() {
    return $this->argv;
  }

}

?>