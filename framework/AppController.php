// The author of this code is Hwi Jun KIM a.k.a pcaffeine

require_once("framework/BaseController.php");
require_once("framework/LoginState.php");

<?php

class AppController extends BaseController {

  public function __construct() {
    $className = $this->getClassName();
    $pattern = "/Pub/";
    // When the name of controller is XXXPubController. action can be invoked
    // without login.
    if (preg_match($pattern, $className) != 0) {
      return;
    }

    if (!$this->loginState()->isLoggedin()) {
      throw new Exception("AppController::__construct(): login has not been done.");
    }
  }

}

?>

