<?php 
	/**
	 * User Model
	 *
	 * @version 1.0
	 * @author Onelab <hello@onelab.co> 
	 * 
	 */
	
	class LogDragModel extends DataEntry
	{	

	   

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
		    	$query = DB::table(TABLE_PREFIX.TABLE_DRAG)
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
	    		"id_origem_funil" => "",	    		
					"id_destino_funil" => "",
					"id_tarefa" => "",
          "authuser" => "",
	    		"data" => date("Y-m-d H:i:s"),
          "usuarios_envolvidos" => "",
          "email_disparado" => "",
					
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_DRAG)
		    	->insert(array(
		    		"id" => null,
						"id_origem_funil" => $this->get("id_origem_funil"),
						"id_destino_funil" => $this->get("id_destino_funil"),
						"id_tarefa" => $this->get("id_tarefa"),
		    		"authuser" => $this->get("authuser"),
            "data" => $this->get("data"),
            "usuarios_envolvidos" => $this->get("usuarios_envolvidos"),
            "email_disparado" => $this->get("email_disparado"),
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_DRAG)
	    		->where("id", "=", $this->get("id"))
		    	->update(array(
		      	"id_origem_funil" => $this->get("id_origem_funil"),
						"id_destino_funil" => $this->get("id_destino_funil"),
						"id_tarefa" => $this->get("id_tarefa"),
		    		"authuser" => $this->get("authuser"),
            "data" => $this->get("data"),
            "usuarios_envolvidos" => $this->get("usuarios_envolvidos"),
            "email_disparado" => $this->get("email_disparado"),	
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

	    	DB::table(TABLE_PREFIX.TABLE_DRAG)->where("id", "=", $this->get("id"))->delete();
	    	$this->is_available = false;
	    	return true;
	    }   
	   
	}
?>