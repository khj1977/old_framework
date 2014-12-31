// The author of this code is Hwi Jun KIM a.k.a pcaffeine

require_once("framework/PreClassLoader.php");

abstract class MetaClass {

  protected $container;

  public function __construct() {
    $this->container = array();

    $classLoader = new PreClassLoader();
    $classLoader->load();
  }

  public function getClassName() {
    return get_class($this);
  }

  public function __get($key) {
    if (!array_exists($key, $this->container)) {
      return false;
    }

    return $this->container[$propName];
  }

  public function __set($propName, $val) {
    $this->container[$propName] = $val;

    return $this;
  }


}