<?php 
	/**
	 * User Model
	 *
	 * @version 1.0
	 * @author Onelab <hello@onelab.co> 
	 * 
	 */
	
	class AtividadeModel extends DataEntry
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
		    	$query = DB::table(TABLE_PREFIX.TABLE_ATIVIDADES)
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
	    		"tipo_atividade" => "",
	    		"responsavel" => "",	    		
					"titulo" => "",
					"descricao" => "",
					"data_inicio" => "",
					"data_conclusao" => "",
	    		"data_criacao" => date("Y-m-d H:i:s"),
					"duracao" => "",
					"id_tarefa" => "",
					
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_ATIVIDADES)
		    	->insert(array(
		    		"id" => null,
		    		"tipo_atividade" => $this->get("tipo_atividade"),
						"responsavel" => $this->get("responsavel"),
		    		"titulo" => $this->get("titulo"),
						"descricao" => $this->get("descricao"),
						"data_inicio" => $this->get("data_inicio"),
		    		"data_conclusao" => $this->get("data_conclusao"),
						"data_criacao" => $this->get("data_criacao"),
						"duracao" => $this->get("duracao"),
		    		"id_tarefa" => $this->get("id_tarefa"),
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_ATIVIDADES)
	    		->where("id", "=", $this->get("id"))
		    	->update(array(
		      	"tipo_atividade" => $this->get("tipo_atividade"),
						"responsavel" => $this->get("responsavel"),
		    		"titulo" => $this->get("titulo"),
						"descricao" => $this->get("descricao"),
						"data_inicio" => $this->get("data_inicio"),
		    		"data_conclusao" => $this->get("data_conclusao"),
						"data_criacao" => $this->get("data_criacao"),
						"duracao" => $this->get("duracao"),
		    		"id_tarefa" => $this->get("id_tarefa"),		
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

	    	DB::table(TABLE_PREFIX.TABLE_ATIVIDADES)->where("id", "=", $this->get("id"))->delete();
	    	$this->is_available = false;
	    	return true;
	    }   
	   
	}
?>