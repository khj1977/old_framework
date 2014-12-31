// The author of this code is Hwi Jun KIM a.k.a pcaffeine

<?php

require_once("framework/MetaClass.php");
require_once("framework/TheWorld.php");

class MySession extends MetaClass {

  // protected $container;
  protected $suffix;

  public function __construct() {
    parent::__construct();

    session_start();

    $this->clear();
    $this->suffix = TheWorld::instance()->config->session_suffix;
  }

  /*
  public function __get($key) {
    return $this->container[$this->getKey($key)];
  }

  public function __set($key, $val) {
    $key = $this->getKey($key);
    $this->container[$key] = $val;

    return $this;
  }
  */

  public function clear() {
    $this->container = array();

    return $this;
  }

  protected function getKey($key) {
    return $this->suffix . "-" . $key;
  }

}

?>

