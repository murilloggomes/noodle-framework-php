<?php 
	/**
	 * User Model
	 *
	 * @version 1.0
	 * @author Onelab <hello@onelab.co> 
	 * 
	 */
	
	class LogOportunidadeModel extends DataEntry
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
		    	$query = DB::table(TABLE_PREFIX.TABLE_OPORTUNIDADE)
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
          "descricao_acao" => "",
	    		"novo" => "",
          "tipo_acao" => "",
	    		"id_origem" => "",	    		
					"id_destino" => "",
	    		"id_oportunidade" => "",
          "authuser" => "",
					"data" => date("Y-m-d H:i:s"),
          "posicao" => "",
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_OPORTUNIDADE)
		    	->insert(array(
		    		"id" => null,
		    		"descricao_acao" => $this->get("descricao_acao"),
            "novo" => $this->get("novo"),
            "tipo_acao" => $this->get("tipo_acao"),
						"id_origem" => $this->get("id_origem"),
						"id_destino" => $this->get("id_destino"),
		    		"id_oportunidade" => $this->get("id_oportunidade"),
						"authuser" => $this->get("authuser"),
            "data" => $this->get("data"),
            "posicao" => $this->get("posicao"),
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_OPORTUNIDADE)
	    		->where("id", "=", $this->get("id"))
		    	->update(array(
            "descricao_acao" => $this->get("descricao_acao"),
		      	"novo" => $this->get("novo"),
            "tipo_acao" => $this->get("tipo_acao"),
						"id_origem" => $this->get("id_origem"),
						"id_destino" => $this->get("id_destino"),
		    		"id_oportunidade" => $this->get("id_oportunidade"),
						"authuser" => $this->get("authuser"),
            "data" => $this->get("data"),
            "posicao" => $this->get("posicao"),
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

	    	DB::table(TABLE_PREFIX.TABLE_OPORTUNIDADE)->where("id", "=", $this->get("id"))->delete();
	    	$this->is_available = false;
	    	return true;
	    }   
	   
	}
?>