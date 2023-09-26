<h1>[Open Source] Noodle Framework - Compativel com PHP 8.2 - Melhor, mais veloz e mais seguro que laravel.</h1> 

<p align="center">
  <img src="http://img.shields.io/static/v1?label=License&message=MIT&color=green&style=for-the-badge"/>
   <img src="http://img.shields.io/static/v1?label=STATUS&message=Desenvolvimento&color=GREY&style=for-the-badge"/>
</p>

-> Status do Projeto: Desenvolvimento

### Tópicos 

:small_blue_diamond: [Descrição do projeto](#descrição-do-projeto)

:small_blue_diamond: [Funcionalidades](#funcionalidades)

:small_blue_diamond: [Deploy da Aplicação](#deploy-da-aplicação-dash)

:small_blue_diamond: [Pré-requisitos](#pré-requisitos)

:small_blue_diamond: [Como rodar a aplicação](#como-rodar-a-aplicação-arrow_forward)

## Descrição do projeto 

<p align="justify">
  Framework leve e extremamente potente para se extrair da melhor forma o php 8.2, baseado em MVC muitos já vão estar familizados! 
</p>

## Funcionalidades

:heavy_check_mark: Página Externa para acesso ao cliente (Site institucional, e-commerce, vai da ideia da projeto).  

:heavy_check_mark: Dashboard interno já estruturado para você escalar mediante suas nececidades, com uma arquitetura MVC basta você se preocupar em Controller, Views, Moldes e Rotas e seu sistema sempre estará 100%!

:heavy_check_mark: Responsivo para todo o tipo de tela, e também nas proporções corretas para se fazer um webviews mobile dele.  

:heavy_check_mark: Extensões diversas adormecidas esperando a necessidade do usuário como chars, models, fullcalendar, entre outras  

## Pré-requisitos

:warning: [PHP 8.0.1](https://php.net/) 
:warning: [Maria DB 10.3.35](https://mariadb.org/)

## Como rodar a aplicação :arrow_forward:

No terminal, clone o projeto: 

```
sudo git clone git@github.com:murilloggomes/noodle-open-source-framework-php-82.git
```

run: "cd" no caminho da pasta do projeto (que deve ser baixa na pasta raiz realmente da aplicação)

## Como rodar os testes
```
Mudar configurações Banco de Dados /app/config/db.config.php;
```
```
define("DB_HOST", "localhost");
define("DB_NAME", "base_noodle");
define("DB_USER", "user_noodle");
define("DB_PASS", "senha_noodle");
define("DB_ENCODING", "utf8");

define("TABLE_PREFIX", "mg_");

// Set table names without prefix
define("TABLE_USERS", "users");
define("TABLE_LOGS", "logs");
define("TABLE_GENERAL_DATA", "general_data");
define("TABLE_OPTIONS", "options");
define("TABLE_PRODUTOS", "produtos");
define("TABLE_CATEGORIAS", "categorias");
```

## Casos de Uso

Depois disso pode ir direto pro login e acessar com o usuário e senha que você cadastrou ou rodar o script sql:


## Contribuições

[Buy Me A Coffee](https://www.buymeacoffee.com/murilloggo)

<img src="https://user-images.githubusercontent.com/67968960/270708300-9df8faa5-07bb-471c-b242-9d0d9449623c.png" font-size='width:250px !important'></img>

