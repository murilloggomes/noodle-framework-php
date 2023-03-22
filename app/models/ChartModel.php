<?php 
	/**
	 * User Model
	 *
	 * @version 1.0
	 * @author Onelab <hello@onelab.co> 
	 * 
	 */
	
	class ChartModel extends DataEntry
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
		    	$query = DB::table(TABLE_PREFIX.TABLE_CHARTS)
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
	    		"tipo_grafico" => "",
					"tipo_filtro" => "",
          "indicador" => "",
					"status" => "1",
	    		"eixox" => "",
	    		"eixoy" => "",
	    		"omitir_usuarios" => "",
	    		"usuarios_selecionados" => "null",      
          "date_inicio" => "",
					"date_fim" => "",
					"cor" => "",
					"usuario_criador" => "",
					"usuario_alteracao" => "",
					"compartilhado" => "",
					"usuarios_compartilhamento" => "",
					"permite_edicao" => ""
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_CHARTS)
		    	->insert(array(
		    	"id" => null,
			  	"nome" => $this->get("nome"),
					"tipo_grafico" => $this->get("tipo_grafico"),	
		    	"tipo_filtro" => $this->get("tipo_filtro"),
          "indicador" => $this->get("indicador"),
					"status" => $this->get("status"),
	    		"eixox" => $this->get("eixox"),
	    		"eixoy" => $this->get("eixoy"),
	    		"omitir_usuarios" => $this->get("omitir_usuarios"),
	    		"usuarios_selecionados" => $this->get("usuarios_selecionados"),
          "date_inicio" => $this->get("date_inicio"),
					"date_fim" => $this->get("date_fim"),
					"cor" => $this->get("cor"),
	    		"usuario_criador" => $this->get("usuario_criador"),
          "usuario_alteracao" => $this->get("usuario_alteracao"),
					"compartilhado" => $this->get("compartilhado"),
					"usuarios_compartilhamento" => $this->get("usuarios_compartilhamento"),
					"permite_edicao" => $this->get("permite_edicao")
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_CHARTS)
	    		->where("id", "=", $this->get("id"))
		    	->update(array(
					"nome" => $this->get("nome"),
	    	  "tipo_grafico" => $this->get("tipo_grafico"),
					"tipo_filtro" => $this->get("tipo_filtro"),
          "indicador" => $this->get("indicador"),
					"status" => $this->get("status"),
	    		"eixox" => $this->get("eixox"),
	    		"eixoy" => $this->get("eixoy"),
	    		"omitir_usuarios" => $this->get("omitir_usuarios"),
	    		"usuarios_selecionados" => $this->get("usuarios_selecionados"),
          "date_inicio" => $this->get("date_inicio"),
					"date_fim" => $this->get("date_fim"),
					"cor" => $this->get("cor"),
	    		"usuario_criador" => $this->get("usuario_criador"),
          "usuario_alteracao" => $this->get("usuario_alteracao"),
					"compartilhado" => $this->get("compartilhado"),
					"usuarios_compartilhamento" => $this->get("usuarios_compartilhamento"),
					"permite_edicao" => $this->get("permite_edicao")
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

	    	DB::table(TABLE_PREFIX.TABLE_CHARTS)->where("id", "=", $this->get("id"))->delete();
	    	$this->is_available = false;
	    	return true;
	    }
	   
	}
?>