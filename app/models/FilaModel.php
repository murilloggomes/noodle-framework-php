<?php 
	/**
	 * User Model
	 *
	 * @version 1.0
	 * @author Onelab <hello@onelab.co> 
	 * 
	 */
	
	class FilaModel extends DataEntry
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
		
			    public function select($uniqid, $type = "id")
	    {
	    	
	    	$col = $type;	    	

	    	if ($col) {
		    	$query = DB::table(TABLE_PREFIX.TABLE_FUNIL)
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
          "id" => "",
					"processo" => "",
					"nome" => "",
          "responsavel_funil" => "",
					"ativo" => "",
					"ordem" => "",
					"descricao" => "",
					"cor" => "",
	    		"exibe_empresa" => "",
	    		"exibe_pessoa" => "",
					"criador" => "",
					"data_criacao" => date("Y-m-d H:i:s"),
					"ultima_edicao" => date("Y-m-d H:i:s"),
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_FUNIL)
		    	->insert(array(
		    	"id" => null,
					"processo" => $this->get("processo"),
			  	"nome" => $this->get("nome"),
          "responsavel_funil" => $this->get("responsavel_funil"),
					"ativo" => $this->get("ativo"),
					"descricao" => $this->get("descricao"),
					"ordem" => $this->get("ordem"),
					"cor" => $this->get("cor"),
	    		"exibe_empresa" => $this->get("exibe_empresa"),
	    		"exibe_pessoa" => $this->get("exibe_pessoa"),
	    		"criador" => $this->get("criador"),
					"data_criacao" => $this->get("data_criacao"),
					"ultima_edicao" => $this->get("ultima_edicao"),

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

	    	$id = DB::table(TABLE_PREFIX.TABLE_FUNIL)
	    		->where("id", "=", $this->get("id"))
		    	->update(array(
					"processo" => $this->get("processo"),
					"nome" => $this->get("nome"),
          "responsavel_funil" => $this->get("responsavel_funil"),
					"ativo" => $this->get("ativo"),
					"descricao" => $this->get("descricao"),
					"ordem" => $this->get("ordem"),
					"cor" => $this->get("cor"),
	    		"exibe_empresa" => $this->get("exibe_empresa"),
	    		"exibe_pessoa" => $this->get("exibe_pessoa"),
	    		"criador" => $this->get("criador"),
					"data_criacao" => $this->get("data_criacao"),
					"ultima_edicao" => $this->get("ultima_edicao"),
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

	    	DB::table(TABLE_PREFIX.TABLE_FUNIL)->where("id", "=", $this->get("id"))->delete();
	    	$this->is_available = false;
	    	return true;
	    }
	   
	}
?>