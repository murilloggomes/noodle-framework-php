<?php 
	/**
	 * User Model
	 *
	 * @version 1.0
	 * @author Onelab <hello@onelab.co> 
	 * 
	 */
	
	class TarefaModel extends DataEntry
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
		    	$query = DB::table(TABLE_PREFIX.TABLE_TAREFAS)
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
					"nome" => "",
	    		"fila" => "",
					"cliente" => "",
          "responsavel" => "",	
					"valor_proposta" => "",
					"descricao" => "",	
					"cor" => "",
					"tag" => "",
					"status_oportunidade" => "",
					"motivo_perda" => "",
					"descricao_perda" => "",
					"data_previsao" => "",
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_TAREFAS)
		    	->insert(array(
		    	"id" => null,
			  	"nome" => $this->get("nome"),
		    	"fila" => $this->get("fila"),
					"cliente" => $this->get("cliente"),
          "responsavel" => $this->get("responsavel"),
					"valor_proposta" => $this->get("valor_proposta"),
					"descricao" => $this->get("descricao"),		
					"cor" => $this->get("cor"),
					"tag" => $this->get("tag"),
					"status_oportunidade" => $this->get("status_oportunidade"),
					"motivo_perda" => $this->get("motivo_perda"),
					"descricao_perda" => $this->get("descricao_perda"),
					"data_previsao" => $this->get("data_previsao"),	
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_TAREFAS)
	    		->where("id", "=", $this->get("id"))
		    	->update(array(
					"nome" => $this->get("nome"),
		    	"fila" => $this->get("fila"),
					"cliente" => $this->get("cliente"),
          "responsavel" => $this->get("responsavel"),
				  "valor_proposta" => $this->get("valor_proposta"),
					"descricao" => $this->get("descricao"),		
					"cor" => $this->get("cor"),
					"tag" => $this->get("tag"),
					"status_oportunidade" => $this->get("status_oportunidade"),
					"motivo_perda" => $this->get("motivo_perda"),
					"descricao_perda" => $this->get("descricao_perda"),
					"data_previsao" => $this->get("data_previsao"),	
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

	    	DB::table(TABLE_PREFIX.TABLE_TAREFAS)->where("id", "=", $this->get("id"))->delete();
	    	$this->is_available = false;
	    	return true;
	    }
	   
	}
?>