<?php
// Language slug
//
// Will be used theme routes
$langs = [];
foreach (Config::get("applangs") as $l) {
    if (!in_array($l["code"], $langs)) {
        $langs[] = $l["code"];
    }

    if (!in_array($l["shortcode"], $langs)) {
        $langs[] = $l["shortcode"];
    }
}
$langslug = $langs ? "[".implode("|", $langs).":lang]" : "";



/**
 * Routa MVC
**/

// Index (Pagina /)
App::addRoute("GET|POST", "/index/?", "Index");

//login
App::addRoute("GET|POST", "/", "Login");
App::addRoute("GET|POST", "/".$langslug."?/?", "Login");
App::addRoute("GET|POST", "/".$langslug."?/login/?", "Login");

// Logout
App::addRoute("GET", "/logout/?", "Logout");
App::addRoute("GET", "/".$langslug."?/logout/?", "Logout");

// Settings
$settings_pages = [
    "site", "logotype", "other", "experimental",
    "google-analytics", "google-drive", "dropbox", "onedrive", "paypal", "stripe", "facebook", "recaptcha",
    "proxy",
  
    "notifications", "smtp"
  ];
  App::addRoute("GET|POST", "/settings/[".implode("|", $settings_pages).":page]?/?", "Settings");

// Produtos
App::addRoute("GET|POST", "/produtos/?", "Produtos");

// Categorias
App::addRoute("GET|POST", "/categorias/?", "Categorias");

// Rotas simples e praticas para serem aprimoradas com níveis de permissão de usuários ou grupos de controles posteriores.




