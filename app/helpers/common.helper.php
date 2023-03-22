<?php



 function tarefa($id){
    
   $tarefa = Controller::model("Tarefa");
   $tarefa->select($id,"id");
    
    $retornoTarefa = array(
       "nome" => $tarefa->get("nome"),
       "valor" => $tarefa->get("valor_proposta"),
       "data" => $tarefa->get("data_criacao"),
   ); 
   
   return $retornoTarefa; 
  }
  
  function dados_usuario($id){
    
   $Usuario = Controller::model("User");
   $Usuario->select($id,"id");
   
   $retornoUsuario = array(
       "email" => $Usuario->get("email"),
       "nome" => $Usuario->get("firstname"),
   ); 
    
   return $retornoUsuario; 
  } 
  



 function email_usuarios($id){
    
   $Usuario = Controller::model("User");
   $Usuario->select($id,"id");
    
   return $Usuario->get("email"); 
  }




function etapa($id){
    
   $etapas = Controller::model("Fila");
   $etapas->select($id,"id");
   
   $retornoEtapas = array(
       "nome" => $etapas->get("nome"),
       "processo" => $etapas->get("processo"),
       "responsavel" => $etapas->get("responsavel_funil"),
   ); 
    
   return $retornoEtapas; 
  }
  
function funil($id){
    
   $Funil = Controller::model("Processo");
   $Funil->select($id,"id");
    
    $retornoFunil = array(
       "nome" => $Funil->get("nome"),
       "responsavel" => $Funil->get("responsavel"),
   ); 
   
   return $retornoFunil; 
  }  



	function etapas($id){
		$etapas = Controller::model("Filas");
    $etapas->where(DB::raw("processo = '$id'"))
		      ->orderBy("ordem", "ASC")
          ->fetchData();
		
		$arrayEtapas = null;
		foreach($etapas->getDataAs("Fila") as $e){
			
			$arrayEtapas[] = array(
			  "id" => $e->get("id"),
				"ativo" => $e->get("ativo"),
				"processo" => $e->get("processo"),
				"nome" => $e->get("nome"),
				"fila" => $e->get("fila"),
				"responsavel" => $e->get("responsavel_funil"),
				"descricao" => $e->get("descricao"),
				"cor" => $e->get("cor"),
				"tipo" => $e->get("tipo_funil"),
				"data_criacao" => $e->get("data_criacao"),
				"exibe_empresa" => $e->get("exibe_empresa"),
				"exibe_pessoa" => $e->get("exibe_pessoa"),
				"ordem" => $e->get("ordem"),
			);
			
		}
      return $arrayEtapas; 
  }


	function tarefas($id,$id_dono,$tipo_conta,$responsavel_etapa){
	
    $idLike = '"'.$id_dono.'"';
    
    $decode_resp_etapa = json_decode($responsavel_etapa,true);
    
    if($tipo_conta <= 2 ){
      $query = "fila = '$id'";
    } else if(in_array($id_dono,$decode_resp_etapa)){
      $query = "fila = '$id'";
    } else {
      $query = "fila = '$id' AND (criador = '$id_dono' OR responsavel LIKE '%$idLike%' ) ";
    }
		$Funil = Controller::model("Tarefas");
    $Funil->where(DB::raw("$query"))
		      ->orderBy("ultima_edicao", "DESC")
          ->fetchData();
		
		$arrayFila = null;
		foreach($Funil->getDataAs("Tarefa") as $f){
			
			$arrayFila[] = array(
			  "id" => $f->get("id"),
				"nome" => $f->get("nome"),
				"cliente" => $f->get("cliente"),
				"fila" => $f->get("fila"),
				"responsavel" => $f->get("responsavel"),
				"data_criacao" => $f->get("data_criacao"),
        "data_previsao" => $f->get("data_previsao"),
				"valor" => $f->get("valor_proposta"),
				"cor" => $f->get("cor"),
				"tag" => $f->get("tag"),
				"atividade" => $f->get("atividade"),
				"status" => $f->get("status_oportunidade"),
			);
		}
      return $arrayFila; 
  }



function clienteTask($id) {
	$Cliente = Controller::model("Clientes");
	$Cliente->where(DB::raw("id = '$id'"))
          ->fetchData();
	
	$arrayCliente = null;
	
	foreach($Cliente->getDataAs("Cliente") as $c) {
		$arrayCliente[] = array(
		"id" => $c->get("id"),
		"nome" => $c->get("nome"),
		"email" => $c->get("email"),
		"telefone" => $c->get("telefone"),
		"cidade" => $c->get("cidade"),
		"uf" => $c->get("uf"),
		);
	}
	return $arrayCliente;
}

	function tagsTask ($id){
		
		$Tags = Controller::model("Tags");
    $Tags->where(DB::raw("id = '$id'"))
		      ->orderBy("nome", "ASC")
          ->fetchData();
		
		$arrayTag = null;
		foreach($Tags->getDataAs("Tag") as $t){
			
			$arrayTag[] = array(
			  "id" => $t->get("id"),
				"nome" => $t->get("nome"),
				"cor" => $t->get("cor"),
				"descricao" => $t->get("descricao"),
			);
			
		}
      return $arrayTag; 
  }

	function atividadeTask ($id){
		
		$Atividades = Controller::model("Atividades");
    $Atividades->where(DB::raw("id = '$id'"))
		      ->orderBy("titulo", "ASC")
          ->fetchData();
		
		$arrayAtividade = null;
		foreach($Atividades->getDataAs("Atividade") as $a){
			
			$arrayAtividade[] = array(
			  "id" => $a->get("id"),
				"titulo" => $a->get("titulo"),
				"descricao" => $a->get("descricao"),
			);
			
		}
      return $arrayAtividade; 
  }

function motivos($id) {

	$motivos = Controller::model("Motivos");
	$motivos->where(DB::raw("id = '$id'"))
					->orderBy("motivo", "ASC")
					->fetchData();
	
	$arrayMotivo = null;
	foreach($Motivos->getDataAs("Motivo") as $m) {
		
		$arrayMotivo[] = array(
		"id" => $m->get("id"),
		"motivo" => $m->get("motivo"),
		"descricao" => $m->get("descricao"),
		"cor" => $m->get("cor"),
		);
		
	}
	
	return $arrayMotivo;
}





function consultarId($model, $id)
	{

	$dados = Controller::model($model, $id);
 
	return $dados->get("nome");

	}

function encrypt($valor){
	  $cipher_method = 'aes-128-ctr';
		$enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);  
		$enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));  
		$crypted_token = openssl_encrypt($valor, $cipher_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
	
	  return $crypted_token;
	
}

function decrypt($valor){
	list($valor, $enc_iv) = explode("::", $valor);  
      $cipher_method = 'aes-128-ctr';
      $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
      $token = openssl_decrypt($valor, $cipher_method, $enc_key, 0, hex2bin($enc_iv));
	
    return $token;	
}

 function encrypt_decrypt($action, $string)
{
  $output = false;
 
  $encrypt_method = "AES-256-CBC";
  $secret_key = 'storgetec';
  $secret_iv = 'storgetec';
 
  // hash
  $key = hash('sha256', $secret_key);
 
  // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a
  // warning
  $iv = substr(hash('sha256', $secret_iv), 0, 16);
 
  if ($action == 'encrypt')
  {
    $output = openssl_encrypt($string , $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
  }
  else
  {
    if ($action == 'decrypt')
    {
      $output = openssl_decrypt(base64_decode($string ), $encrypt_method, $key, 0, $iv);
    }
  }
 
  return $output;
}

function htmlchars($string = "")
{
    return htmlspecialchars($string, ENT_QUOTES, "UTF-8");
}

 function custom($auth = false, $coluna = false){	 
	 
   $Customizacao = Controller::model("ConfigTema");
	 $Customizacao->select($auth, "usuario");
	 $configRetorno = $Customizacao->get($coluna);
   
	 
   return $configRetorno;
 } 


function acessoPag($uri,$permissoesPagina){
  
  $idPagina = 0;
  $paginas = Controller::model("Paginas");
  $paginas->orderBy("id", "DESC")
        ->where(DB::raw(" status = '1' AND uri LIKE '%$uri'"))
        ->limit(1)
        ->fetchData();
  
   foreach($paginas->getDataAs("Pagina") as $pag){
    $idPagina = $pag->get("id");
   }
   $decodePaginaPermissao = json_decode($permissoesPagina,true);

   if(in_array($idPagina,$decodePaginaPermissao) != true){
   return  header("Location: ".APPURL."/dashboard");
    exit;
   }

}

function logs($id_user,$situacao,$pagina,$detalhes){
    $Log = Controller::model("Log");   
    $Log->set("id_user",$id_user)
        ->set("situacao",$situacao)
        ->set("pagina",$pagina)
        ->set("detalhes",$detalhes);
    $Log->save();
  
}

function truncate_string($string = "", $max_length = 50, $ellipsis = "...", $trim = true)
{
    $max_length = (int)$max_length;
    if ($max_length < 1) {
        $max_length = 50;
    }

    if (!is_string($string)) {
        $string = "";
    }

    if ($trim) {
        $string = trim($string);
    }

    if (!is_string($ellipsis)) {
        $ellipsis = "...";
    }

    $string_length = mb_strlen($string);
    $ellipsis_length = mb_strlen($ellipsis);
    if($string_length > $max_length){
        if ($ellipsis_length >= $max_length) {
            $string = mb_substr($ellipsis, 0, $max_length);
        } else {
            $string = mb_substr($string, 0, $max_length - $ellipsis_length)
                    . $ellipsis;
        }
    }

    return $string;
}

/* Get current time */
   function getTime(){
      return microtime(TRUE);
   }
    
   /* Calculate start time */
   function startExec(){     
     $time = getTime();
     return $time;
   }
    
   /*
    * Calculate end time of the script,
    * execution time and returns results
    */
   function endExec($timeStart){           
      $finalTime = getTime();
      $execTime = $finalTime - $timeStart;
      return number_format($execTime, 2) . ' s';
   }

/**
 * Create SEO friendly url slug from string
 * @param  string $string
 * @return string
 */
function url_slug($string = "")
{
    if (!is_string($string)) {
        $string = "";
    }

    $s = trim(mb_strtolower($string));

    // Replace azeri characters
    $s = str_replace(
        array("ü", "ö", "ğ", "ı", "ə", "ç", "ş"),
        array("u", "o", "g", "i", "e", "c", "s"),
        $s);

    // Replace cyrilic characters
    $cyr = array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м',
                 'н','о','п','р','с','т','у', 'ф','х','ц','ч','ш','щ','ъ',
                 'ы','ь', 'э', 'ю','я');
    $lat = array('a','b','v','g','d','e','io','zh','z','i','y','k','l',
                 'm','n','o','p','r','s','t','u', 'f', 'h', 'ts', 'ch',
                 'sh', 'sht', 'a', 'i', 'y', 'e','yu', 'ya');
    $s = str_replace($cyr, $lat, $s);

    // Replace all other characters
    $s = preg_replace("/[^a-z0-9]/", "-", $s);

    // Replace consistent dashes
    $s = preg_replace("/-{2,}/", "-", $s);

    return trim($s, "-");
}


/**
 * Delete file or folder (with content)
 * @param string $path Path to file or folder
 */
function delete($path)
{
    if (is_dir($path) === true) {
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file) {
            delete(realpath($path) . '/' . $file);
        }

        return rmdir($path);
    } else if (is_file($path) === true) {
        return unlink($path);
    }

    return false;
}


/**
 * Format price
 * @param  decimal $price
 * @param  boolean $zdc Defines the currency mod. TRUE for zero decimal
 *                      currencies, FALSE for regular currencies
 * @return string
 */


function format_price($price, $zdc = false){
    if (!is_numeric($price)) {
        // Not a number, retunr as is
        return $price;
    }

    if ($zdc) {
        // Round the price until zero decimal precision
        return round($price);
    } else {
        $price = number_format($price, 2, ".", "");
        $parts = explode(".", $price, 2);
        return $parts[0]  . $parts[1] ;
    }
}

function formatarPreco($valor){
	
	
	
	$numero = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
	$valor = (float) $valor;
	$valor = number_format($valor, 2, '.', '');
	
	
	if ($valor == 0){
	 return "Sem limite tiino";
	}
	
	
	return $numero->formatCurrency($valor, 'BRL');
}

/**
 * Get an array of timezones
 * @return array
 */
function getTimezones()
{
    $timezoneIdentifiers = DateTimeZone::listIdentifiers();
    $utcTime = new DateTime('now', new DateTimeZone('UTC'));

    $tempTimezones = array();
    foreach ($timezoneIdentifiers as $timezoneIdentifier) {
        $currentTimezone = new DateTimeZone($timezoneIdentifier);

        $tempTimezones[] = array(
            'offset' => (int)$currentTimezone->getOffset($utcTime),
            'identifier' => $timezoneIdentifier
        );
    }

    // Sort the array by offset,identifier ascending
    usort($tempTimezones, function($a, $b) {
        return ($a['offset'] == $b['offset'])
            ? strcmp($a['identifier'], $b['identifier'])
            : $a['offset'] - $b['offset'];
    });

    $timezoneList = array();
    foreach ($tempTimezones as $tz) {
        $sign = ($tz['offset'] > 0) ? '+' : '-';
        $offset = gmdate('H:i', abs($tz['offset']));
        $timezoneList[$tz['identifier']] = '(UTC ' . $sign . $offset . ') ' .
            $tz['identifier'];
    }

    return $timezoneList;
}

/**
 * Validate date
 * @param  string  $date   date string
 * @param  string  $format
 * @return boolean
 */
function isValidDate($date, $format = 'Y-m-d H:i:s')
{
    $d = \DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

/**
 * Check if FFMPEG and FFPROBE extensions are installed
 * @return boolean
 */
function isVideoExtenstionsLoaded()
{
    \InstagramAPI\Utils::$ffmpegBin = FFMPEGBIN;
    \InstagramAPI\Utils::$ffprobeBin = FFPROBEBIN;

    if (\InstagramAPI\Utils::checkFFPROBE()) {
        try {
            InstagramAPI\Media\Video\FFmpeg::factory();
            return true;
        } catch (\Exception $e) {
            // FFMPEG not found/installed
            // Do nothing here, false value will be returned
        }
    }

    return false;
}


/**
 * textInitials
 * @param  string  $text
 * @param  integer $length result length
 * @return string
 */
function textInitials($text, $length=1)
{
    $text = (string)$text;
    $length = (int)$length;

    if (mb_strlen($text) < $length || $length < 1) {
        return $text;
    }

    $parts = explode(" ", $text);
    foreach ($parts as &$p) {
        if (trim($p) == "") {
            unset($p);
        }
    }

    if (count($parts) >= $length) {
        $res = "";
        for ($i = 0; $i < $length; $i++) {
            $res .= mb_substr($parts[$i], 0, 1);
        }
    } else {
        if ($length == 1) {
            $res =  mb_substr($text, 0, 1);
        } else if ($length == 2) {
            $res =  mb_substr($text, 0, 1).mb_substr($text, -1, 1);
        } else {
            $res =  mb_substr($text, 0, $length);
        }
    }

    return $res;
}

/**
 * Generate human readable random text
 * @param  integer $length length of the returned string
 * @return string          Random string
 */
function readableRandomString($length = 6)
{
    $string     = '';
    $vowels     = array("a","e","i","o","u");
    $consonants = array(
        'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm',
        'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'
    );
    // Seed it
    srand((double) microtime() * 1000000);
    $max = $length/2;
    for ($i = 1; $i <= $max; $i++)
    {
        $string .= $consonants[rand(0,19)];
        $string .= $vowels[rand(0,4)];
    }
    return $string;
}

/**
 * Convert size in byte to human readable text
 *
 * @param  integer  $size      size in bytes
 * @param  integer $precision
 * @return string|bool
 */
function readableFileSize($size, $precision = 2) {
    if ($size < 0) {
        $size = 0;
    }

    $units = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    $step = 1024;
    $i = 0;

    $max = count($units) - 1;

    while (($size / $step) > 0.9) {
        $size = $size / $step;
        $i++;

        if ($i > $max) {
            return false;
        }
    }

    return round($size, $precision). $units[$i];
}

/**
 * Convert numbers to human readable formats (Ex: 3K, 3.4M)
 * @param  integer $numbers Number to convert
 * @return string
 */
function readableNumber($numbers, $precision = 2)
{
   $readable = ["",  "K", "M", "B"];
   $index = 0;

   while($numbers > 1000){
      $numbers /= 1000;
      $index++;
   }
   return round($numbers, $precision) ." ". $readable[$index];
}

/**
 * Get integrations settings 
 * @return string
 */
function integrations($field = null)
{
    return general_data("integrations", $field);
}

/**
 * Save (new|edit) user
 * @return void
 */
function cnpj($cnpj) {          

		$ch = curl_init("https://www.receitaws.com.br/v1/cnpj/".$cnpj);

		curl_setopt_array($ch, [

				// Equivalente ao -X:
				CURLOPT_CUSTOMREQUEST => 'GET',

				// Permite obter o resultado
				CURLOPT_RETURNTRANSFER => 1,
		]);

		$resposta = json_decode(curl_exec($ch), true);

		curl_close($ch);

		if(is_null($resposta["nome"])){
		 return "CNPJ INEXISTENTE";
		}
	 $cnpj = [];
	
	 $cnpj = [
		 "razao" => $resposta["nome"],
		 "fantasia" => $resposta["fantasia"],
		 "fundacao" => $resposta["data_situacao"],
	 ];
	
	 return $cnpj;        
}

function formata_cpf_cnpj($cpf_cnpj){
    /*
        Pega qualquer CPF e CNPJ e formata

        CPF: 000.000.000-00
        CNPJ: 00.000.000/0000-00
    */

    ## Retirando tudo que não for número.
    $cpf_cnpj = preg_replace("/[^0-9]/", "", $cpf_cnpj);
    $tipo_dado = NULL;
    if(strlen($cpf_cnpj)==11){
        $tipo_dado = "cpf";
    }
    if(strlen($cpf_cnpj)==14){
        $tipo_dado = "cnpj";
    }
    switch($tipo_dado){
        default:
            $cpf_cnpj_formatado = "Não foi possível definir tipo de dado";
        break;

        case "cpf":
            $bloco_1 = substr($cpf_cnpj,0,3);
            $bloco_2 = substr($cpf_cnpj,3,3);
            $bloco_3 = substr($cpf_cnpj,6,3);
            $dig_verificador = substr($cpf_cnpj,-2);
            $cpf_cnpj_formatado = $bloco_1.".".$bloco_2.".".$bloco_3."-".$dig_verificador;
        break;

        case "cnpj":
            $bloco_1 = substr($cpf_cnpj,0,2);
            $bloco_2 = substr($cpf_cnpj,2,3);
            $bloco_3 = substr($cpf_cnpj,5,3);
            $bloco_4 = substr($cpf_cnpj,8,4);
            $digito_verificador = substr($cpf_cnpj,-2);
            $cpf_cnpj_formatado = $bloco_1.".".$bloco_2.".".$bloco_3."/".$bloco_4."-".$digito_verificador;
        break;
    }
    return $cpf_cnpj_formatado;
}

/*
 * Get data from general data
 * @param  string $name  data identifier
 * @param  string $field
 * @return string
 */
function general_data($name, $field = null)
{
    if (!is_string($name)) {
        return null;
    }

    if (!isset($GLOBALS["General_Data"]) || !is_array($GLOBALS["General_Data"])) {
        $GLOBALS["General_Data"] = array();
    }

    if (isset($GLOBALS["General_Data"][$name])) {
        $settings = $GLOBALS["General_Data"][$name];
    } else {
        $settings = Controller::model("GeneralData", $name);
        $GLOBALS["General_Data"][$name] = $settings;
    }

    if (is_string($field)) {
        return htmlchars($settings->get("data.".$field));
    }

    return $settings;
}

/**
 * Get settings
 * @return string
 */
function site_settings($field = null)
{
    return general_data("settings", $field);
}

/**
 * Check if the $currency is the zero decimal currency
 * @param  string  $currency Currency to be checked
 * @return boolean
 */
function isZeroDecimalCurrency($currency)
{
    if (!is_string($currency)) {
        return false;
    }

    $zero_decimal_currencies = [
        "BIF", "CLP", "DJF", "GNF", "JPY", "KMF", "KRW",
        "MGA", "PYG", "RWF", "VND", "VUV", "XAF", "XOF", "XPF",

        "HUF", "TWD"
    ];

    return in_array(strtoupper($currency), $zero_decimal_currencies);
}


/**
 * Get the value of the given option
 * @param  string  $option_name
 * @param  boolean $default_value If option is not available,
 *                                then return $default_value
 * @return [mixed]                Either option value or $default_value
 */
function get_option($option_name, $default_value = false)
{  
    // Return the value
    return "default";
}


/**
 * Get/Set option values [code, shortcode, name, localname] for the ACTIVE_LANG
 * @param  string $option Name of the option
 * @param  string|null $value  value of the option to set. If null don't update the value
 * @return string|null         Value of the option or null (if not found)
 */
function active_lang($option, $value = null)
{
    $options = ["code", "shortcode", "name", "localname"];

    if (!in_array($option, $options)) {
        // Invalid option name
        return null;
    }

    if (!defined('ACTIVE_LANG')) {
        // Active lang is not defined,
        // It's too early to call this function yet
        return null;
    }

    if (is_null($value)) {
        if (Config::get("active_lang_".$option)) {
            // Found the required value
            return Config::get("active_lang_".$option);
        }

        // Search for the value of the option
        foreach (Config::get("applangs") as $al) {
            if ($al["code"] == ACTIVE_LANG) {
                // found, break loop
                foreach ($al as $key => $value) {
                    Config::set("active_lang_".$key, $value);
                }
                break;
            }
        }

        // Return the option value.

        // If the option is not found in the foreach loop above
        // then NULL value will be returned automatically. See Config::get()
        return Config::get("active_lang_".$option);
    } else {
        Config::set("active_lang_".$option, $value);
        return Config::get("active_lang_".$option);
    }
}


/**
     * Save (new|edit) user
     * @return void
     */
function cep($cep)
{
$Cep = preg_replace("/[^0-9]/", "", $cep);
$url = "https://viacep.com.br/ws/". $Cep ."/json/";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$viacep = curl_exec($curl);
$retorno = json_decode( $viacep, true );
	
	$retorno = [
			"logradouro" => $retorno['logradouro'],
			"localidade" => $retorno['localidade'],
			"uf" => $retorno['uf'],
			"bairro" => $retorno['bairro']			
		];

	return $retorno;
}


	function consultarEquipe($id)
	{

	$Equipe = Controller::model("CentroCusto", $id);

	return $Equipe->get("nome");

	}
	
	function nomeCriador($id)
	{

	$Criador = Controller::model("User", $id);

	return $Criador->get("firstname");

	}
	
	function consultarUnidade($id)
	{

	$Unidade = Controller::model("UnidadeNegocio", $id);

	return $Unidade->get("nome");

	}
