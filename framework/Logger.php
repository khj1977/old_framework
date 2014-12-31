// The author of this code is Hwi Jun KIM a.k.a pcaffeine

<?php

require_once("framework/MetaClass.php");

class Logger extends MetaClass {

    const INFO = "info";
    const WARN = "warn";
    const ERROR = "error";

    public function __construct() {

    }

    public function log($level, $rawMessage) {
        $message = date_format("Y-m-d H:i:s:u") . " " . $rawMessage;

        $stream = fopen($this->getPath(), "a");
        if ($stream === FALSE) {
            throw new Exception();
        }
        fwrite($stream, $message);
        $fclose($stream);
    }

    protected function getPath() {

    }

}

?>