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

  public function initializeWeb() {
    $this->arguments = new WebArguments();
    $this->session = new NullSession();
  }

  public function initializeCli($argv) {
    $this->arguments = new CliArguments($argv);
    $this->session = new MySession();
  }

  public function isCli() {
    if ($_ENV["PHP_IS_FRAMEWORK_WEB"]) {
      return true;
    }

    return false;
  }

}