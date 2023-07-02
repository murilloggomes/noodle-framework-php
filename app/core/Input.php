<?php
	/**
	 * Obter valor de entrada (obter, postar, solicitar, sessão, cookie)
	 *	
	 * 
	 */
	class Input
	{

		public function __construct(){
		}


		/**
		 * Entradas de sessão
		 * @param  string  $method 		Nome do método (obter | post | request | session | cookie)
		 * @param  string  $input_name 	nome do input
		 * @param  int|bool  $index   	índice na matriz de entrada de tratar como $trim
		 * @param  boolean $trim      	cortar valor de entrada (se for string) ou não
		 * @return              
		 */
		public static function getInput($method, $input_name, $index = true, $trim = true)
		{
			if(!in_array($method, array("get", "post", "request", "cookie", "session")))
				throw new \Exception('Invalid method!');

			$input = null;

			$method = "_".strtoupper($method);
			if (isset($GLOBALS[$method][$input_name]))
				$input = $GLOBALS[$method][$input_name];

			if (is_array($input) && is_int($index)){
				if ($index >= 0) {
					if (isset($input[$index])) {
						$input = $input[$index];
					} else {
						throw new \Exception('Index is not exists!');
					}
				} else {
					throw new \Exception('Invalid index');
				}
			}


			if (!is_array($input) || !is_int($index)) 
				$trim = (bool)$index;


			if (is_string($input) && $trim) 
				$input =  trim($input);

			return $input;
		}



		public static function __callStatic($name, $arguments) 
		{	
			$name = strtolower($name);

			if($name == "req")
				$name = "request";

	        if (in_array($name, array("get", "post", "request", "cookie", "session"))) {
	        	array_unshift($arguments, $name);
	            return call_user_func_array(array('Input', 'getInput'), $arguments);
	        } else {
	        	throw new \Exception('Invalid method');
	        }
	    }


	    public function __call($name, $arguments) 
		{	
			$name = strtolower($name);

			if($name == "req")
				$name = "request";

	        if (in_array($name, array("get", "post", "request", "cookie", "session"))) {
	        	array_unshift($arguments, $name);
	            return call_user_func_array(array('Input', 'getInput'), $arguments);
	        } else {
	        	throw new \Exception('Invalid method');
	        }
	    }

	}
?>