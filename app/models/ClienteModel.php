<?php
	/**
	 * User Model
	 *
	 * @version 1.0
	 * @author Onelab <hello@onelab.co>
	 *
	 */

	class ClienteModel extends DataEntry
	{
		/**
		 * Extend parents constructor and select entry
		 * @param mixed $uniqid Value of the unique identifier
		 */
	    public function __construct($uniqid=0, $col = "id")
	    {
	        parent::__construct();
	        $this->select($uniqid, $col = "id");
	    }



	    /**
	     * Select entry with uniqid
	     * @param  int|string $uniqid Value of the any unique field
	     * @return self       
	     */
	    public function select($uniqid, $col = "id")
	    {
	    	
	    	if ($col) {
		    	$query = DB::table(TABLE_PREFIX.TABLE_CLIENT)
			    	      ->where($col, "=", $uniqid)
			    	      ->limit(1)
			    	      ->select("*");
		    	if ($query->count() == 1) {
		    		$resp = $query->get();
		    		$r = $resp[0];

		    		foreach ($r as $field => $value)
		    			$this->set($field, $value);

		    		$this->is_available = true;
		    	} else {
		    		$this->data = array();
		    		$this->is_available = false;
		    	}
	    	}

	    	return $this;
	    }


	    /**
	     * Extend default values
	     * @return self
	     */
	    public function extendDefaults()
	    {
	    	$defaults = array(
					"cod_santri" => "",
          "status" => "",
	    		"tipo_cliente" => "",
	    		"nome" => "",
	    		"uf" => "",
					"email" => "",
	    		"cidade" => "",
	    		"endereco" => "",
					"bairro" => "",
	    		"cep" => "",
	    		"telefone" => "",
	    		"owner" => "",
	    		"data" => date("Y-m-d H:i:s"),
					"cnpj" => "",
					"ultima_edicao" => date("Y-m-d H:i:s"),
					"ultimo_editor" => "",
	    	);


	    	foreach ($defaults as $field => $value) {
	    		if (is_null($this->get($field)))
	    			$this->set($field, $value);
	    	}
	    }


	    /**
	     * Insert Data as new entry
	     */
	    public function insert()
	    {
	    	if ($this->isAvailable())
	    		return false;

	    	$this->extendDefaults();

	    	$id = DB::table(TABLE_PREFIX.TABLE_CLIENT)
		    	->insert(array(
		    		"id" => null,
						"cod_santri" => $this->get("cod_santri"),
            "status" => $this->get("status"),
		    		"tipo_cliente" => $this->get("tipo_cliente"),
		    		"nome" => $this->get("nome"),
		    		"uf" => $this->get("uf"),
		    		"cidade" => $this->get("cidade"),
						"email" => $this->get("email"),
		    		"endereco" => $this->get("endereco"),
						"bairro" => $this->get("bairro"),
		    		"cep" => $this->get("cep"),
		    		"telefone" => $this->get("telefone"),
		    		"owner" => $this->get("owner"),
		    		"data" => $this->get("data"),
						"cnpj" => $this->get("cnpj"),
						"ultima_edicao" => $this->get("ultima_edicao"),
						"ultimo_editor" => $this->get("ultimo_editor"),
						
		    	));

	    	$this->set("id", $id);
	    	$this->markAsAvailable();
	    	return $this->get("id");
	    }


	    /**
	     * Update selected entry with Data
	     */
	    public function update()
	    {
	    	if (!$this->isAvailable())
	    		return false;

	    	$this->extendDefaults();

	    	$id = DB::table(TABLE_PREFIX.TABLE_CLIENT)
	    		->where("id", "=", $this->get("id"))
		    	->update(array(
						"cod_santri" => $this->get("cod_santri"),
            "status" => $this->get("status"),
		    		"tipo_cliente" => $this->get("tipo_cliente"),
		    		"nome" => $this->get("nome"),
		    		"uf" => $this->get("uf"),
		    		"cidade" => $this->get("cidade"),
						"email" => $this->get("email"),
		    		"endereco" => $this->get("endereco"),
						"bairro" => $this->get("bairro"),
		    		"cep" => $this->get("cep"),
		    		"telefone" => $this->get("telefone"),
		    		"owner" => $this->get("owner"),
		    		"data" => $this->get("data"),
						"cnpj" => $this->get("cnpj"),
						"ultima_edicao" => $this->get("ultima_edicao"),
						"ultimo_editor" => $this->get("ultimo_editor"),
		    	));

	    	return $this;
	    }


	    /**
		 * Remove selected entry from database
		 */
	    public function delete()
	    {
	    	if(!$this->isAvailable())
	    		return false;

	    	DB::table(TABLE_PREFIX.TABLE_CLIENT)->where("id", "=", $this->get("id"))->delete();
	    	$this->is_available = false;
	    	return true;
	    }


	    /**
	     * get date-time format preference
	     * @return null|string
	     */
	    public function getDateTimeFormat()
	    {
	    	if (!$this->isAvailable()) {
	    		return null;
	    	}

	    	$date_format = $this->get("preferences.dateformat");
	    	$time_format = $this->get("preferences.timeformat") == "24"
	    	             ? "H:i" : "h:i A";
	    	return $date_format . " " . $time_format;
	    }
	}
?>
