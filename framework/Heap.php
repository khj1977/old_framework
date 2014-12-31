// The author of this code is Hwi Jun KIM a.k.a pcaffeine

require_once("framework/MetaClass.php");
require_once("framework/BaseCleaner.php");
require_once("framework/GeneralFactory.php");

// This class requires factry to make instance retained by heap.
class Heap extends MetaClass {

  // container is stack but implemented by array.
  protected $container;
  protected $ptr;
  protected $cleaner;
  protected $factory;

  public function __construct() {
    parent::__construct();
  }

  protected function init() {
    $this->container = array();
    $this->ptr = 0;

    // default one which do nothing.
    $this->cleaner = new BaseCleaner();
    $this->factory = null;
  }

  public function setFactory($className) {
    $this->factory = new GeneralFactory($className);

    return $this;
  }

  public function pop() {
    $n = count($this->container);
    if ($this->ptr > $n) {
      // throw new Exception("Heap::pop(): invalid ptr: " . $this->ptr . " " . $n);
      $this->grow();
    }

    // debug
    // Is there the following function?
    $toReturn = array_pop($this->container);
    $this->ptr = $this->ptr - 1;
    // end of debug

    return $toReturn;
  }

  public function push($object) {
    // debug
    // Is there the following funtion?
    $this->clenaer->clean($object);
    array_push($this->container, $object);
    $this->ptr = $this->ptr + 1;
    // end of debug

    return $this;
  }

  public function setCleaner($cleaner) {
    $this->cleaner = $clenaer;
  }

  protected function grow() {
    $n = 1000;
    for($i = 0; $i < 1000; ++$i) {
      $object = $this->factory->generateInstance();
      array_push($this->container, $object);
    }

    return $this;
  }

}