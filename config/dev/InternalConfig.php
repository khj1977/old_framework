<?php

class InternalConfig extends BaseInternalConfig {

  public function __construct() {
    parent::__construct();
  }

  public function __construct() {
    $this->setContent();
  }

  public function setContent() {
    $this->container = array(
      "login_sess_key" => "is_logged_in"
      );

    return $this;
   }
      
  }

}

?>

