<?php 
	/**
	 * User Model
	 *
	 * @version 1.0
	 * @author Onelab <hello@onelab.co> 
	 * 
	 */
	
	class UserModel extends DataEntry
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
		    	$query = DB::table(TABLE_PREFIX.TABLE_USERS)
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
	    		"account_type" => "vendedor",
	    		"email" => uniqid()."@horus.com.br",
	    		"username" => "user_".uniqid(),
	    		"password" => uniqid(),
	    		"firstname" => "",
					"biografia" => "",
					"cargo" => "",
	    		"settings" => "{}",
	    		"is_active" => "1",
					"empresa" => "",
	    		"date" => date("Y-m-d H:i:s"),
				  "data" => '{}',
					"avatar" => '',	
          "phone" => "",
					"telefone" => "",
          "office" => "",
          "team" => "",
					"p_filiais" => "",
					"p_usuarios" => "",
					"p_departamentos" => "",
          "permissoes_paginas" => '["1"]',
					"instagram" => "",
					"linkedin" => "",
					"facebook" => "",
          "cpf/cnpj" => "",
          "owner" => "",
          "start_pw" => "",
					"motivo" => "",
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_USERS)
		    	->insert(array(
		    		"id" => null,
		    		"account_type" => $this->get("account_type"),
		    		"email" => $this->get("email"),
		    		"username" => $this->get("username"),
		    		"password" => $this->get("password"),
		    		"firstname" => $this->get("firstname"),
						"biografia" => $this->get("biografia"),
						"cargo" => $this->get("cargo"),
		    		"settings" => $this->get("settings"),
		    		"is_active" => $this->get("is_active"),
		    		"date" => $this->get("date"),
            "data" => $this->get("data"),
						"empresa" => $this->get("empresa"),
            "avatar" => $this->get("avatar"),	
            "phone" => $this->get("phone"),
						"telefone" => $this->get("telefone"),
            "office" => $this->get("office"),
            "team" => $this->get("team"),
						"p_filiais" => $this->get("p_filiais"),
					  "p_usuarios" => $this->get("p_usuarios"),
						"p_departamentos" => $this->get("p_departamentos"),
            "permissoes_paginas" => $this->get("permissoes_paginas"),
						"instagram" => $this->get("instagram"),
						"linkedin" => $this->get("linkedin"),
						"facebook" => $this->get("facebook"),
            "cpf/cnpj" => $this->get("cpf/cnpj"),
            "owner" => $this->get("owner"),
            "start_pw" => $this->get("start_pw"),
						"motivo" => $this->get("motivo"),
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

	    	$id = DB::table(TABLE_PREFIX.TABLE_USERS)
	    		->where("id", "=", $this->get("id"))
		    	->update(array(
		    	"account_type" => $this->get("account_type"),
		    	"email" => $this->get("email"),
		    	"username" => $this->get("username"),
		    	"password" => $this->get("password"),
		    	"firstname" => $this->get("firstname"),
					"biografia" => $this->get("biografia"),
					"cargo" => $this->get("cargo"),
		    	"settings" => $this->get("settings"),
		    	"is_active" => $this->get("is_active"),
		    	"date" => $this->get("date"),
					"data" => $this->get("data"),
					"empresa" => $this->get("empresa"),
					"avatar" => $this->get("avatar"),
					"phone" => $this->get("phone"),
					"telefone" => $this->get("telefone"),
					"office" => $this->get("office"),
					"team" => $this->get("team"),
					"p_filiais" => $this->get("p_filiais"),
					"p_usuarios" => $this->get("p_usuarios"),
					"p_departamentos" => $this->get("p_departamentos"),
          "permissoes_paginas" => $this->get("permissoes_paginas"),
					"instagram" => $this->get("instagram"),
					"facebook" => $this->get("facebook"),
					"linkedin" => $this->get("linkedin"),
					"cpf/cnpj" => $this->get("cpf/cnpj"),
					"owner" => $this->get("owner"),
          "start_pw" => $this->get("start_pw"),
					"motivo" => $this->get("motivo"),
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

	    	DB::table(TABLE_PREFIX.TABLE_USERS)->where("id", "=", $this->get("id"))->delete();
	    	$this->is_available = false;
	    	return true;
	    }


	    /**
	     * Check if account has administrative privilages
	     * @return boolean 
	     */
	    public function isDesenvolvedor()
	    {
	    	if ($this->isAvailable() && in_array($this->get("account_type"), array("1"))) {
	    		return true;
	    	}

	    	return false;
	    }

		public function isAdmin()
	    {
	    	if ($this->isAvailable() && in_array($this->get("account_type"), array("2","1"))) {
	    		return true;
	    	}

	    	return false;
	    }
		
		
			public function isAdministrativo()
	    {
	    	if ($this->isAvailable() && in_array($this->get("account_type"), array("1","2","3","6","7"))) {
	    		return true;
	    	}

	    	return false;
	    }
		
			 /**
	     * Check if account has administrative privilages
	     * @return boolean 
	     */
	    public function isFunctionary()
	    {
	    	if ($this->isAvailable() && in_array($this->get("account_type"), array("8","2","9","5","4","1"))) {
	    		return true;
	    	}

	    	return false;
	    }


	    /**
	     * Checks if this user can edit another user's data
	     * 
	     * @param  UserModel $User Another user
	     * @return boolean          
	     */
	    public function canEdit(UserModel $User)
	    {	
	    		  
    		if ($this->get("account_type") == "8" || $this->get("account_type") == "9" || $this->get("account_type") == "1"){
    			return true;    				
    		}
	    	
	    	return false;
	    }	    


	    /**
	     * get date-time format preference
	     * @return null|string 
	     */
	    public function getDateTimeFormat()
	    {
	    	if (!$this->isAvailable()) {
	    		return null;
	    	}

	    	$date_format = $this->get("preferences.dateformat");
	    	$time_format = $this->get("preferences.timeformat") == "24"
	    	             ? "H:i" : "h:i A";
	    	return $date_format . " " . $time_format;
		}
		
		/**
	     * get phone format preference
	     * @return null|string 
	     */
	    public function getNumberFormat($info)
	    {
	    	if (!$this->isAvailable()) {
	    		return null;
	    	}

			return preg_replace("/[^0-9]/", "", $info);	    	
	    }


	    /**
	     * Check if user's (primary) email is verified or not
	     * @return boolean 
	     */
	    public function isEmailVerified()
	    {
	    	if (!$this->isAvailable()) {
	    		return false;
	    	}

	    	if ($this->get("data.email_verification_hash")) {
	    		return false;
	    	}

	    	return true;
	    }


	    /**
	     * Send verification email to the user
	     * @param  boolean $force_new Create a new hash if it's true
	     * @return [bool]                  
	     */
	    public function sendVerificationEmail($force_new = false)
	    {
	    	if (!$this->isAvailable()) {
	    		return false;
	    	}

	    	$hash = $this->get("data.email_verification_hash");

	    	if (!$hash || $force_new) {
	    		$hash = sha1(uniqid(readableRandomString(10), true));
	    	}


	    	// Get site settings
	    	$site_settings = \Controller::model("GeneralData", "settings");
	    	

	    	// Send mail
	    	$mail = new \Email;
	    	$mail->addAddress($this->get("email"));
	    	$mail->Subject = __("{site_name} Account Activation", [
	    		"{site_name}" => $site_settings->get("data.site_name")
	    	]);

	    	$body = "<p>" . __("Hi %s", htmlchars($this->get("firstname"))) . ", </p>"
                  . "<p>" . __("Please verify the email address {email} belongs to you. To do so, simply click the button below.", ["{email}" => "<strong>" . $this->get("email") . "</strong>"])
                  . "<div style='margin-top: 30px; font-size: 14px; color: #9b9b9b'>"
                  . "<a style='display: inline-block; background-color: #3b7cff; color: #fff; font-size: 14px; line-height: 24px; text-decoration: none; padding: 6px 12px; border-radius: 4px;' href='".APPURL."/verification/email/".$this->get("id").".".$hash."'>".__("Verify Email")."</a>"
                  . "</div>";
            $mail->sendmail($body);

	    	// Save (new) hash
	    	$this->set("data.email_verification_hash", $hash)
	    	     ->save();

	    	return true;
	    }


	    /**
	     * Set the user's (primary) email address as verified
	     */
	    public function setEmailAsVerified()
	    {
	    	if (!$this->isAvailable()) {
	    		return false;
	    	}

	    	$data = json_decode($this->get("data"));
	    	if (isset($data->email_verification_hash)) {
		    	unset($data->email_verification_hash);
		    	$this->set("data", json_encode($data))
		    	     ->update();
	    	}

	    	return true;
	    }
	}
?>