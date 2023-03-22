<?php 
	/**
	 * Centro de Custo Model
	 *
	 * @version 1.0
	 * @author Onelab <hello@onelab.co> 
	 * 
	 */
	
	class ConfigAtividadeModel extends DataEntry
	{	
		/**
		 * Extend parents constructor and select entry
		 * @param mixed $uniqid Value of the unique identifier
		 */
	    public function __construct($uniqid=0)
	    {
	        parent::__construct();
	        $this->select($uniqid);
	    }



	    /**
	     * Select entry with uniqid
	     * @param  int|string $uniqid Value of the any unique field
	     * @return self       
	     */
	    public function select($uniqid)
	    {
	    	if (is_int($uniqid) || ctype_digit($uniqid)) {
	    		$col = $uniqid > 0 ? "id" : null;
	    	} else {
	    		$col = "nome";
	    	}

	    	if ($col) {
		    	$query = DB::table(TABLE_PREFIX.TABLE_CONFIG_ATIVIDADES)
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
	    		"status" => "1",
	    		"nome" => "",
					"descricao" => "",
					"icone" => "",
	    		"data_criacao" => date("Y-m-d H:i:s"),
	    		"criador" => "",
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_CONFIG_ATIVIDADES)
		    	->insert(array(
		    		"id" => null,
		    		"status" => $this->get("status"),
		    		"nome" => $this->get("nome"),
						"descricao" => $this->get("descricao"),
						"icone" => $this->get("icone"),
		    		"data_criacao" => $this->get("data_criacao"),
		    		"criador" => $this->get("criador"),
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_CONFIG_ATIVIDADES)
	    		->where("id", "=", $this->get("id"))
		    	->update(array(
		    		"status" => $this->get("status"),
		    		"nome" => $this->get("nome"),
						"descricao" => $this->get("descricao"),
						"icone" => $this->get("icone"),
		    		"data_criacao" => $this->get("data_criacao"),
		    		"criador" => $this->get("criador"),
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

	    	DB::table(TABLE_PREFIX.TABLE_CONFIG_ATIVIDADES)->where("id", "=", $this->get("id"))->delete();
	    	$this->is_available = false;
	    	return true;
	    }   
	   
	}
?>