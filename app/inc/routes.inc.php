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
 * Theme Routes
 */

// Index (Landing Page)
//
// Replace "Index" with "Login" to completely disable Landing page
// After this change, Login page will be your default landing page
//
// This is useful in case of self use, or having different
// landing page in different address. For ex: you can install the script
// to subdirectory or subdomain of your wordpress website.
App::addRoute("GET|POST", "/", "Login");
App::addRoute("GET|POST", "/".$langslug."?/?", "Login");

// Login
App::addRoute("GET|POST", "/".$langslug."?/login/?", "Login");

// Signup
//
//  Remove or comment following line to completely
//  disable signup page. This might be useful in case
//  of self use of the script
App::addRoute("GET|POST", "/".$langslug."?/signup/?", "Signup");

// Logout
App::addRoute("GET", "/".$langslug."?/logout/?", "Logout");

// Recovery
App::addRoute("GET|POST", "/".$langslug."?/recovery/?", "Recovery");
App::addRoute("GET|POST", "/".$langslug."?/recovery/[i:id].[a:hash]/?", "PasswordReset");
App::addRoute("GET|POST", "/".$langslug."?/novaSenha/?", "novaSenha");


/**
 * App Routes
 */

// Settings
$settings_pages = [
  "site", "logotype", "other", "experimental",
  "google-analytics", "google-drive", "dropbox", "onedrive", "paypal", "stripe", "facebook", "recaptcha",
  "proxy",

  "notifications", "smtp"
];
App::addRoute("GET|POST", "/settings/[".implode("|", $settings_pages).":page]?/?", "Settings");

// Users
App::addRoute("GET|POST", "/users/?", "Users");




