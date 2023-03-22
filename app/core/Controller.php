<?php
/**
 * Controller
 */
class Controller
{   
    /**
     * Assosiative array
     * Key: will be converted to variable for view
     * Value: value of the variable with name Key
     * @var array
     */
    protected $variables;

    /**
     * JSON output response holder
     * @var \stdClass
     */
    protected $resp;

    /**
     * Initialize variables
     * @param array $variables  [description]
     */
    public function __construct($variables = array())
    {
        $this->variables = array();
        $this->resp = new stdClass;
    }


    /**
     * Get model
     * @param  string|array $name name of model
     * @param  array|string $args Array of arguments for model constructor
     * @return null|mixed       
     */
    public static function model($name, $args=array())
    {
        if (is_array($name)) {
            if (count($name) != 2) {
                throw new Exception('Invalid parameter');
            }

            $file = $name[0];
            $class = $name[1];
        } else {
            $file = APPPATH."/models/".$name."Model.php";
            $class = $name."Model";
        }

        if (file_exists($file)) {
            require_once $file;

            if (!is_array($args)) {
                $args = array($args);
            }

            $reflector = new ReflectionClass($class);
            return $reflector->newInstanceArgs($args);
        }

        return null;
    }

    /**
     * View
     * @param  string $view name of view file
     * @param  string $context 
     * @return void       
     */
    public function view($view, $context = "app")
    {
        foreach ($this->variables as $key => $value) {
            ${$key} = $value;
        }

        switch ($context) {
            case "app":
                $path = APPPATH."/views/".$view.".php";
                break;

            case "site":
                $path = active_theme("path") . "/views/" . $view .".php";
                break;

            default: 
                $path = $view;
        }


        require_once $path;
    }
  
    /**
     * Create database connection
     * @return App 
     */
    public function dbSantri()
    {
        // Define MYDB connection string as described in tnsnames.ora
        define("MYDB","(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 200.252.18.135)(PORT = 1521)))(CONNECT_DATA=(SERVICE_NAME = SANTRIPDB)))");
        // Connect to database      
        $conn = oci_pconnect("BANCOWEB","H8T9L1",MYDB,"utf8");  
      
        // Through error if not connected      
        if (!$conn) {
            $e = oci_error();
           return trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }        
        return $conn;
    }
  
  
    public function dbAnalise()
    {      
        $mysqli = new mysqli("localhost", "usuario_analise","F{#Dwnk1qWn<;rT","banco_analise"); 
        $mysqli->set_charset('utf8mb4');
      
        return $mysqli;
    } 
  
  public function dbLogistica()
    {      
        $mysqli = new mysqli("localhost", "usuario_logistica","1aquiCB|Ny#(Mxl","banco_logistica"); 
        $mysqli->set_charset('utf8mb4');
      
        return $mysqli;
    } 
  

      public function dbSolar()
    {      
        $mysqli = new mysqli("localhost", "usuario_solar","!YnG;uGHT^ct{!6","banco_solar"); 
        $mysqli->set_charset('utf8mb4');
      
        return $mysqli;
    } 

  
  
    /**
     * Create database connection
     * @return App 
     */
    public function toast($msg, $type = "success")
    {
        $toast = "<script>setTimeout(function() {
                M.toast({
                  html: '".$msg."'
                })
              }, 600)</script>";        
        return $toast;
    }

  
    /**
     * Set new variable for view.
     * @param string $name  Name of the variable.
     * @param mixed $value 
     */
    public function setVariable($name, $value)
    {
        $this->variables[$name] = $value;
        return $this;
    }


    /**
     * Get variable
     * @param  string $name Name of the varaible.
     * @return mixed       
     */
    public function getVariable($name)
    {
        return isset($this->variables[$name]) ? $this->variables[$name] : null;
    }


    /**
     * Print json(or jsonp) string and exit;
     * @return void 
     */
    protected function jsonecho($resp = null)
    {
        if (is_null($resp)) {
            $resp = $this->resp;
        }
        
        echo Input::get("callback") ? 
                Input::get("callback")."(".json_encode($resp).")" : 
                    json_encode($resp);
        exit;
    }
}
