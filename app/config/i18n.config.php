<?php
$langs = [];

// Portuguese (Brazil)
$langs[] = [
    "code" => "pt-BR",
    "shortcode" => "pt-BR",
    "name" => "Portuguese (Brazil)",
    "localname" => "Português (Brasil)"
];

// US English
$langs[] = [
    "code" => "en-US",
    "shortcode" => "en",
    "name" => "English",
    "localname" => "English"
];

Config::set("applangs", $langs);
Config::set("default_applang", "pt-BR");
