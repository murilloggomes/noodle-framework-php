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

App::addRoute("GET|POST", "/relatorio-tiino/?", "RelatorioTiino");

// Users
App::addRoute("GET|POST", "/users/?", "Users");
App::addRoute("GET|POST", "/relatorio/solar/?", "Solar");

// Indicadores
App::addRoute("GET|POST", "/indicadores/?", "Indicadores");
App::addRoute("GET|POST", "/cron/adicao/produto/?", "CronAdicaoProdutoSantri");
App::addRoute("GET|POST", "/cron/estoque/produto/?", "CronEstoqueSantri");

// Indicadores Adição de Dados
App::addRoute("GET|POST", "/indicadores/dados/?", "IndicadoresDados");

// Indicadores Configurações
App::addRoute("GET|POST", "/indicadores/config/?", "IndicadoresConfig");

// Logs
App::addRoute("GET|POST", "/logs/?", "Logs");

// Edit User
App::addRoute("GET|POST", "/users/[i:id]/?", "User");

App::addRoute("GET|POST", "/oportunidade/[i:id]/?", "Oportunidade");



// Dashboard
App::addRoute("GET|POST", "/dashboard/?", "Dashboard");
// Dashboard
App::addRoute("GET|POST", "/dashboard/[i:id]/?", "Dashboard");

// Página de Configurações
App::addRoute("GET|POST", "/config/?", "Config");

// API Santri
App::addRoute("GET|POST", "/perfil/?", "Perfil");

// API Santri
App::addRoute("GET|POST", "/santri/?", "Santri");

// Email verification
App::addRoute("GET|POST", "/verification/email/[i:id].[a:hash]?/?", "EmailVerification");

// Configurações de Contas
App::addRoute("GET|POST", "/config/conta/?", "ContaConfig");

// Configurações da Contabilidade
App::addRoute("GET|POST", "/config/contabilidade/?", "ContabilidadeConfig");

// Configurações do Financeiro
App::addRoute("GET|POST", "/config/financeiro/?", "FinanceiroConfig");

// Configurações do Produto
App::addRoute("GET|POST", "/config/produto/?", "ProdutoConfig");

// Configurações de Empresa
App::addRoute("GET|POST", "/config/empresa-config/?", "EmpresaConfig");

// Clientes
App::addRoute("GET|POST", "/clientes/?", "Clientes");

// Clientes Edit
App::addRoute("GET|POST", "/clientes/edit/[i:id]/?", "ClientesEdit");

// Clientes Edit New
App::addRoute("GET|POST", "/clientes/edit/new/?", "ClientesEdit");



//funil 
//App::addRoute("GET|POST", "/funil/?", "Funil");
App::addRoute("GET|POST", "/fila/?", "Fila");
App::addRoute("GET|POST", "/funil/new/?", "Funil");

//Processos / Funil 
App::addRoute("GET|POST", "/processos/?", "Processos");
App::addRoute("GET|POST", "/processos/[i:id]/?", "Fila2");
App::addRoute("GET|POST", "/processos2/[i:id]/?", "Fila");

// Email verification
App::addRoute("GET|POST", "/sessao/?", "Sessao");

// Configuração do Tema
App::addRoute("GET|POST", "/config/tema/?", "ConfigTema");
App::addRoute("GET|POST", "/notificacao/peep/?", "Notificacao");
App::addRoute("GET|POST", "/notificacao/?", "Notificacao");

App::addRoute("GET|POST", "/relatorio/santri/?", "RelatorioSantri");


App::addRoute("GET|POST", "/teste/?", "Teste");

App::addRoute("GET|POST", "/feed/?", "Feed");
App::addRoute("GET|POST", "/cron/email/?", "CronEmail");

