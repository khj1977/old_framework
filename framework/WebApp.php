// The author of this code is Hwi Jun KIM a.k.a pcaffeine

<?php

require_once("framework/BaseApp.php");
require_once("framework/Dispatcher.php");

class WebApp extends BaseApp {

  public function __construct() {
  }

  public function run() {
    $dispatcher = new Dispatcher();

    try {
      $viewVals = $dispatcher->dispatch();
    }
    catch(Exception $ex) {
      // debug
      // Do something with respect to exception
      // end of debug
      exit;
    }

    $viewPath = $dispatcher->getViewPath();
    require_once($viewPath);
  }

}

?>
