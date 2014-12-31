// The author of this code is Hwi Jun KIM a.k.a pcaffeine

require_once("framework/MetaClass.php");

abstract public class BaseCache extends MetaClass {

  public function __construct() {
    parent::__construct();
  }

  abstract pubilc function get($Key);

  abstract public function set($key, $val);

}
