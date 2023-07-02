<?php
/**
 * Special version of htmlspecialchars
 * @param  string $string
 * @return string
 */
function htmlchars($string = "")
{
    return htmlspecialchars($string, ENT_QUOTES, "UTF-8");
}



/**
 * Truncate string
 * @param  string  $string
 * @param  integer $max_length Max length of result
 * @param  string  $ellipsis
 * @param  boolean $trim
 * @return string
 */
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
     * Save (new|edit) user
     * @return void
     */
    function InfoProduto($id)
    {
      $InfoProduto = Controller::model("Product", $id);               
       
      
      return $InfoProduto;
    }

/**
 * Format price
 * @param  decimal $price
 * @param  boolean $zdc Defines the currency mod. TRUE for zero decimal
 *                      currencies, FALSE for regular currencies
 * @return string
 */
function format_price($valor, $zdc = false){
  $numero = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
	$valor = (float) $valor;
	$valor = number_format($valor, 2, '.', '');
       
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
            $cpf_cnpj_formatado = "Verificar CPF/CNPJ informado ". $cpf_cnpj;
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

       return $resposta["nome"];        
    }

    /**
     * Save (new|edit) user
     * @return void
     */
    function cep($cep) {

        try{
        $cep = preg_replace("/[^0-9]/", "", $cep);
        $url = "http://viacep.com.br/ws/".$cep."/xml/";

        $xml = simplexml_load_file($url);
        }  catch (\Exception $e) {

            return __("Preencha com um CEP válido");
        }
        
        $cep = [];
      
        $cep["logradouro"] = $xml->logradouro[0];
        $cep["localidade"] = $xml->localidade[0];
        $cep["uf"] = $xml->uf[0];
        $cep["bairro"] = $xml->bairro[0];     

        return $cep;
    }


/**
 * Validates proxy address
 * @param  string  $proxy [description]
 * @return boolean        [description]
 */
function checkState($uf)
{

  $states = [
      "Acre" => "ac",
      "Alagoas" => "al",
      "Amapá" => "ap",
      "Amazonas" => "am",
      "Bahia" => "ba",
      "Ceará" => "ce",
      "Distrito Federal" => "df",
      "Espírito Santo" => "es",
      "Goiás" => "go",
      "Maranhão" => "ma",
      "Mato Grosso" => "mt",
      "Mato Grosso do Sul" => "ms",
      "Minas Gerais" => "mg",
      "Pará" => "pa",
      "Paraíba" => "pb",
      "Paraná" => "pr",
      "Pernambuco" => "pe",
      "Piauí" => "pi",
      "Rio de Janeiro" => "rj",
      "Rio Grande do Norte" => "rn",
      "Rio Grande so Sul" => "rs",
      "Rondonia" => "ro",
      "Roraima" => "rr",
      "Santa Catarina" => "sc",
      "São Paulo" => "sp",
      "Sergipe" => "se",
      "Tocantins" => "to",
  ];

  $state = array_search($uf, $states);

  return $state;
}

/**
 * Validates proxy address
 * @param  string  $proxy [description]
 * @return boolean        [description]
 */
function checkUf($state)
{

  $states = [
      "ac" => "Acre",
      "al" => "Alagoas",
      "ap" => "Amapá",
      "am" => "Amazonas",
      "ba" => "Bahia",
      "ce" => "Ceará",
      "df" => "Distrito Federal",
      "es" => "Espírito Santo",
      "go" => "Goiás",
      "ma" => "Maranhão",
      "Mato Grosso" => "mt",
      "Mato Grosso do Sul" => "ms",
      "Minas Gerais" => "mg",
      "Pará" => "pa",
      "Paraíba" => "pb",
      "Paraná" => "pr",
      "Pernambuco" => "pe",
      "Piauí" => "pi",
      "Rio de Janeiro" => "rj",
      "Rio Grande do Norte" => "rn",
      "Rio Grande so Sul" => "rs",
      "Rondonia" => "ro",
      "Roraima" => "rr",
      "Santa Catarina" => "sc",
      "São Paulo" => "sp",
      "Sergipe" => "se",
      "Tocantins" => "to",
  ];

  $state = array_search($state, $states);

  return $state;
}


/**
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
 * Add a new option or update if it exists
 * @param string  $option_name  Name of the option
 * @param string|int  $option_value Value of the option
 */
function save_option($option_name, $option_value)
{
    if (!is_string($option_name)) {
        // Option name must be string
        return false;
    }

    if ($option_value === false || $option_value === null) {
        $option_value = "";
    }

    // Save to the database
    $opt = \Controller::model("Option", $option_name);
    $opt->set("option_name", $option_name)
        ->set("option_value", $option_value)
        ->save();

    return true;
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
    if (!is_string($option_name)) {
        // Option name must be string
        return $default_value;
    }

    $opt = \Controller::model("Option", $option_name);
    if (!$opt->isAvailable()) {
        return $default_value;
    }

    // Return the value
    return $opt->get("option_value");
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

function formatar($tipo = "", $string, $size = 10)
{
    $string = preg_replace("[^0-9]", "", $string);
    
    switch ($tipo)
    {
        case 'fone':
            if($size === 10){
             $string = '(' . substr($string, 0, 2) . ') ' . substr($string, 2, 4) 
             . '-' . substr($string, 6);
         }else
         if($size === 11){
             $string = '(' . substr($string, 0, 2) . ') ' . substr($string, 2, 1) . " " . substr($string, 3, 4)
             . '-' . substr($string, 7);
         }
         break;
        case 'cep':
            $string = substr($string, 0, 2) . "." .substr($string, 2, 3) . '-' . substr($string, 5, 3);
         break;
        case 'cpf':
				 if($size === 11){
            $string = substr($string, 0, 3) . '.' . substr($string, 3, 3) . 
                '.' . substr($string, 6, 3) . '-' . substr($string, 9, 2);
					 } else
         if($size === 14){
              $string = substr($string, 0, 2) . '.' . substr($string, 2, 3) . 
                '.' . substr($string, 5, 3) . '/' . 
                substr($string, 8, 4) . '-' . substr($string, 12, 2);
         }
         break;
        case 'cnpj':
            $string = substr($string, 0, 2) . '.' . substr($string, 2, 3) . 
                '.' . substr($string, 5, 3) . '/' . 
                substr($string, 8, 4) . '-' . substr($string, 12, 2);
         break;
        case 'rg':
            $string = substr($string, 0, 2) . '.' . substr($string, 2, 3) . 
                '.' . substr($string, 5, 3);
         break;
        default:
         $string = 'É ncessário definir um tipo(fone, cep, cpg, cnpj, rg)';
         
    }
    return $string;
}
