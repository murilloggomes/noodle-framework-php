<?php 

	class PaginaModel extends DataEntry
	{	

      public function __construct($uniqid=0, $col = "id")
	    {
	        parent::__construct();
	        $this->select($uniqid, $col = "id");
	    }


	    public function select($uniqid, $col = "id")
	    {
	    	
	    	if ($col) {
		    	$query = DB::table(TABLE_PREFIX.TABLE_PAGINAS)
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
	    		"uri" => "",
          "nome" => "",	
	    		"criador" => "",	    		
	    		"data_criacao" => date("Y-m-d H:i:s"),
	    		"editor" => "",
					"data_edicao" => date("Y-m-d H:i:s"),
					"status" => "",				
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_PAGINAS)
		    	->insert(array(
		    		"id" => null,
            "nome" => $this->get("nome"),
		    		"uri" => $this->get("uri"),
		    		"criador" => $this->get("criador"),
		    		"data_criacao" => $this->get("data_criacao"),
						"editor" => $this->get("editor"),					
						"data_edicao" => $this->get("data_edicao"),
		    		"status" => $this->get("status"),		    	 		
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_PAGINAS)
	    		->where("id", "=", $this->get("id"))
		    	->update(array(
            "nome" => $this->get("nome"),
		    		"uri" => $this->get("uri"),
		    		"criador" => $this->get("criador"),
		    		"data_criacao" => $this->get("data_criacao"),
						"editor" => $this->get("editor"),					
						"data_edicao" => $this->get("data_edicao"),
		    		"status" => $this->get("status"),			
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

	    	DB::table(TABLE_PREFIX.TABLE_PAGINAS)->where("id", "=", $this->get("id"))->delete();
	    	$this->is_available = false;
	    	return true;
	    }   
	   
	}
?>