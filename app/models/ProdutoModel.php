<?php 
	/**
	 * User Model
	 *
	 * @version 1.0
	 * @author Onelab <hello@onelab.co> 
	 * 
	 */
	
	class ProdutoModel extends DataEntry
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
		    	$query = DB::table(TABLE_PREFIX.TABLE_PRODUTOS)
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
	    		"sku" => "0",
          "sistema" => "1",
					"cod_original" => "0",
					"foto_check" => "0",
	    		"status" => "1",
					"disponivel" => "1",
	    		"destaque" => "0",
	    		"categoria" => "",
	    		"nome" => "",
	    		"marca" => "",
					"cor" => "0",
	    		"peso" => "0",
	    		"altura" => "0",
	    		"largura" => "0",
					"comprimento" => "0",
					"estoque" => "{}",
					"descricao" => "",
					"estoque_minimo" => "",	
					"email_estoque_minimo" => "",	
					"criador" => "",	
					"psd" => "",	
					"status_email" => "",	
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_PRODUTOS)
		    	->insert(array(
		    		"id" => null,
		    		"sku" => $this->get("sku"),
            "sistema" => $this->get("sistema"),
						"cod_original" => $this->get("cod_original"),
						"foto_check" => $this->get("foto_check"),
		    		"status" => $this->get("status"),
						"disponivel" => $this->get("disponivel"),
		    		"destaque" => $this->get("destaque"),
		    		"categoria" => $this->get("categoria"),
		    		"nome" => $this->get("nome"),
		    		"marca" => $this->get("marca"),
						"cor" => $this->get("cor"),
		    		"peso" => $this->get("peso"),
		    		"altura" => $this->get("altura"),
		    		"largura" => $this->get("largura"),
						"comprimento" => $this->get("comprimento"),
						"estoque" => $this->get("estoque"),
						"descricao" => $this->get("descricao"),
						"estoque_minimo" => $this->get("estoque_minimo"),
						"email_estoque_minimo" => $this->get("email_estoque_minimo"),
						"criador" => $this->get("criador"),
						"psd" => $this->get("psd"),
						"status_email" => $this->get("status_email")
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_PRODUTOS)
	    		->where("id", "=", $this->get("id"))
		    	->update(array(
		    		"sku" => $this->get("sku"),
               "sistema" => $this->get("sistema"),
						"cod_original" => $this->get("cod_original"),
						"foto_check" => $this->get("foto_check"),
		    		"status" => $this->get("status"),
						"disponivel" => $this->get("disponivel"),
		    		"destaque" => $this->get("destaque"),
		    		"categoria" => $this->get("categoria"),
		    		"nome" => $this->get("nome"),
		    		"marca" => $this->get("marca"),
						"cor" => $this->get("cor"),
		    		"peso" => $this->get("peso"),
		    		"altura" => $this->get("altura"),
		    		"largura" => $this->get("largura"),
						"comprimento" => $this->get("comprimento"),
						"estoque" => $this->get("estoque"),
						"descricao" => $this->get("descricao"),
						"estoque_minimo" => $this->get("estoque_minimo"),
						"email_estoque_minimo" => $this->get("email_estoque_minimo"),
						"criador" => $this->get("criador"),
						"psd" => $this->get("psd"),
						"status_email" => $this->get("status_email")
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

	    	DB::table(TABLE_PREFIX.TABLE_PRODUTOS)->where("id", "=", $this->get("id"))->delete();
	    	$this->is_available = false;
	    	return true;
	    }

	}
?>