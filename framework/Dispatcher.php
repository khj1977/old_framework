// The author of this code is Hwi Jun KIM a.k.a pcaffeine

<?php

require_once("MetaClass.php");
require_once("WebRouter.php");
require_once("CliRouter.php");

class Dispatcher extends MetaClass {

  protected $module;
  protected $controller;
  protected $action;

  public function __construct() {
  }

  public function dispatch() {
    $env = TheWorld::instance()->isCli();
    if ($env === "cli") {
      $router = new CliRouter();
    }
    else {
      $router = new WebRouter();
    }

    $arguments = TheWorld::instance()->arguments->getArguments();
    // assume all vals in $route are urldecoded.
    $route = $router->getRoute($arguments);

    $this->module = urldecode($route["m"]);
    $this->controller = urldecode($route["c"]);
    $this->action = urldecode($route["a"]);

    $basePath = TheWorld::instance()->base_path;
    $controllerPath = $basePath . sprintf("/app/%s/controllers/%sController",
                                          $this->module,
                                          ucwords($this->controller)
      );
    $controllerPath = realpath($controllerPath);
    if ($controllerPath === false) {
      throw new KException("Dispatcher::dispatch(): invalid path: with module and controller" . $this->module . " " . $this->controller);
    }
    $controllerClassName = $this->controller . "Controller";
    $controller = new $controllerClassName();

    $actionName = $this->action;

    return $controller->$actionName();
  }

  public function getViewPath() {
    $viewPath = $basePath . sprintf("/app/%s/views/%s/%s",
                                          $this->module,
                                          $this->controller,
                                          $this->action
      );

    $realPath = realpath($viewPath);
    if ($realPath === false) {
      throw new Exception("Dispatcher::getViewPath(): invalid path to include view: " . $viewPath);
    }

    return $realPath;
  }

}

?>
