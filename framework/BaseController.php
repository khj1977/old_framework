// The author of this code is Hwi Jun KIM a.k.a pcaffeine

<?php

require_once("framework/MetaClass.php");

// This is just a base class. Therefore, most code is implmented by
// application controller.
abstract class BaseController extends MetaClass {

  public function __construct() {
    parent::__construct();
  }

}

?>
