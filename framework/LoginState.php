<?php

require_once("framework/MetaClass.php");
require_once("framework/Session.php");

class LoginState extends MetaClass {

  public function __construct() {
  }

  public function login() {
    $world = TheWorld::instance();
    $world->session->set($world->config->login_sess_key, "true");
  }

  public function logout() {
    $world = TheWorld::instance();
    $world->session->set($world->config->login_sess_key, "false");
  }

}

?>