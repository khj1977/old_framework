<?php

class PreClassLoader {

  public function __consturct() {
  }

  public function load() {
    $dir = "framework/";

    $files = array(
      "TheWorld.php"
      "Config.php",
      );

    foreach($files as $file) {
      $path = $dir . "/" . $file;
      require_once($path);
    }

  }

}

?>