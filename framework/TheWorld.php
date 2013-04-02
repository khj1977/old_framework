// The author of this code is Hwi Jun KIM a.k.a pcaffeine

require_once("framework/MetaClass.php");
require_once("framework/WebArguments.php");
require_once("framework/CliArguments.php");
require_once("framework/MySession.php");
require_once("framework/NullSession.php");

class TheWorld extends MetaClass {

  // container will retain logger, db-connection, etc
  // protected $container;
  static protected $instance = null;

  static public function instance() {
    if (TheWorld::instance === null) {
      TheWorld::instance = new TheWorld();
    }

    return TheWorld::instance();
  }

  protected function __construct() {
    // $this->container = array();

    $this->initialize();
  }

  public function initialize() {
    if (!$this->isCli()) {
      $this->arguments = new WebArguments();
      $this->session = new NullSession();
    }
    else {
      $this->arguments = new CliArguments();
      $this->session = new MySession();
    }



  }

  /*
  public function __get($key) {
    return $this->container($key);
  }

  public function __set($key, $val) {
    $this->container[$key] = $val;
  }
  */

  // debug
  public function isCli() {
  }
  // end of debug

}