<?php 
	/**
	 * User Model
	 *
	 * @version 1.0
	 * @author Onelab <hello@onelab.co> 
	 * 
	 */
	
	class ConfigTemaModel extends DataEntry
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
		    	$query = DB::table(TABLE_PREFIX.TABLE_CONFIG_TEMA)
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
					"usuario" => "",
	    		"modo_tema" => "",
          "largura_tela" => "",
					"cor_menu" => "1",
	    		"tamanho_menu" => "",	    
					"data_alteracao" => ""
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_CONFIG_TEMA)
		    	->insert(array(
		    	"id" => null,
			  	"usuario" => $this->get("usuario"),
		    	"modo_tema" => $this->get("modo_tema"),
          "largura_tela" => $this->get("largura_tela"),
					"cor_menu" => $this->get("cor_menu"),
	    		"tamanho_menu" => $this->get("tamanho_menu"),
	    		"data_alteracao" => $this->get("data_alteracao")	    	
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_CONFIG_TEMA)
	    		->where("id", "=", $this->get("id"))
		    	->update(array(
					"usuario" => $this->get("usuario"),
		    	"modo_tema" => $this->get("modo_tema"),
          "largura_tela" => $this->get("largura_tela"),
					"cor_menu" => $this->get("cor_menu"),
	    		"tamanho_menu" => $this->get("tamanho_menu"),
	    		"data_alteracao" => $this->get("data_alteracao")	
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

	    	DB::table(TABLE_PREFIX.TABLE_CONFIG_TEMA)->where("id", "=", $this->get("id"))->delete();
	    	$this->is_available = false;
	    	return true;
	    }
	   
	}
?>