<?php 
	/**
	 * User Model
	 *
	 * @version 1.0
	 * @author Onelab <hello@onelab.co> 
	 * 
	 */
	
	class LogAtividadeModel extends DataEntry
	{	

	   

	    public function __construct($uniqid=0)
	    {
	        parent::__construct();
	        $this->select($uniqid);
	    }

			    public function select($uniqid, $type = "id")
	    {
	    	
	    	$col = $type;	    	

	    	if ($col) {
		    	$query = DB::table(TABLE_PREFIX.TABLE_LOGS_ATIVIDADES)
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
	    		"status" => "",
	    		"criador" => "",	    		
					"id_atividade" => "",
	    		"data_criacao" => "",
					"data_conclusao" => "",
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_LOGS_ATIVIDADES)
		    	->insert(array(
		    		"id" => null,
		    		"status" => $this->get("status"),
						"criador" => $this->get("criador"),
						"id_atividade" => $this->get("id_atividade"),
		    		"data_criacao" => $this->get("data_criacao"),
						"data_conclusao" => $this->get("data_conclusao"),
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_LOGS_ATIVIDADES)
	    		->where("id", "=", $this->get("id"))
		    	->update(array(
		      	"status" => $this->get("status"),
						"criador" => $this->get("criador"),
						"id_atividade" => $this->get("id_atividade"),
		    		"data_criacao" => $this->get("data_criacao"),
						"data_conclusao" => $this->get("data_conclusao"),
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

	    	DB::table(TABLE_PREFIX.TABLE_LOGS_ATIVIDADES)->where("id", "=", $this->get("id"))->delete();
	    	$this->is_available = false;
	    	return true;
	    }   
	   
	}
?>