<h1 style="text-align: -webkit-center !important;text-align-last: center !important">[Open Source] - Noodle Framework MVC - Compativel com PHP 8+</h1> 

<p align="center">
  <img src="http://img.shields.io/static/v1?label=License&message=MIT&color=green&style=for-the-badge"/>
   <img src="http://img.shields.io/static/v1?label=STATUS&message=Desenvolvimento&color=GREY&style=for-the-badge"/>
</p>
<img src="https://github.com/murilloggomes/noodle-framework-php/assets/67968960/5a3f43e8-ad46-4e75-8587-e2a2c5f858b6" />

<h2>[Status do Projeto] - ### Desenvolvimento ### - Atualizações todas as semanas !</h2>
      

### PARTE 01: 
:small_blue_diamond: [Descrição do projeto](#descrição-do-projeto)
:small_blue_diamond: [Funcionalidades](#funcionalidades) 
### Parte 02:
:small_blue_diamond: [Pré-requisitos](#pré-requisitos)
:small_blue_diamond: [Deploy da Aplicação](#deploy-da-aplicação-dash)
### Rodando a aplicação:
:small_blue_diamond: [Como rodar a aplicação](#como-rodar-a-aplicação-arrow_forward)


## Descrição do do FrameWork 

<p align="justify">
  Framework leve e extremamente potente para se extrair da melhor forma o php 8.2. Arquitetado em MVC o qual muitos já vão estar familiarizados. 
</p>

## Funcionalidades

:heavy_check_mark: Página Externa para acesso do cliente (Site institucional, E-Commerce, Consulta de Propostas ou Orçamentos, Agendamendo de serviços ou entregas... indo do planejamento estratégico do projeto.).  

:heavy_check_mark: Dashboard interno já estruturado para você escalar mediante suas nececidades, com gráficos, componentes atualizados para tratamento de processos de vários tipos, desde vendas, análise de compras e receitas, indicadores de departamentos para tomada de gestão, devendo se preocupar apenas com a dinâmica da arquitetura MVC lembrando sempre de abastecer o conhecimento nas Routes, Views, Controllers e Models, que a equipe SparteLtda sempre estára atualizando a ferramenta a medida que for sendo necessario mais funcionalidades para sanar necessidades de vocês e/ou seus clentes!

:heavy_check_mark: Responsivo para todo o tipo de tela, totalmente preparado para se tornar um aplicativo WebView para celulares, podendo ser inserido nas lojas de APP como Apple Store e Play Store, sem nenhum impedimento técnico.  

:heavy_check_mark: Componentes totalmente atualizados e de alta usabilidade como chars, datatable, fullcalendary, phpmailer, simpleimage, php-encryption, moment, ionCube, router, qr-code, pix, monolog, aws, mpdf, google auth, entre outros interessantes que vocês irão precisar para cada projeto distinto.

## Pré-requisitos

:warning: [PHP 8.0.1](https://php.net/) 
:warning: [Maria DB 10.3.35](https://mariadb.org/)

## Como rodar a aplicação :arrow_forward:

No terminal, clone o projeto: 

```
sudo git clone git@github.com:murilloggomes/noodle-open-source-framework-php-82.git
```

run: "cd" no caminho da pasta do projeto (que deve ser baixado na pasta raiz real da aplicação)

## Como vincular o banco de dados corretamente
```
cd /app/config/db.config.php;
```
```
define("DB_HOST", "localhost"); -> Host do banco de dados, geralmente localhost ou 127.0.0.1
define("DB_NAME", "nome_banco"); -> Nome do banco criado por vocês, poderá ser qualquer nome.
define("DB_USER", "usuario_banco"); -> Usuário do banco padrão ou então um usuário criado com privilégios apenas para esse banco.
define("DB_PASS", "senha_banco"); -> Senha do usuário a cima.
define("DB_ENCODING", "utf8mb4_general_ci"); -> Estilo de encoding do banco 
```

## Casos de Uso

Depois disso pode ir direto pro login e acessar com o usuário e senha que você cadastrou ou rodar o script sql:
```
Usuário: noodle@spartechltda.com.br | Senha: @noodle123
```

Após isso se aventurar na contrução de páginas utilizando o MVC, com as routes chamando os controller e os controller chamando as views. Os dados do banco sempre serão chamados dos Models por uma estrutura muito simples como:

## Uso do SQL Controller
```
Linha1: $User = Controller::model("User", $IdUser);
```
```
Linha2: $nome = $User->get("nome");
```
```
Ou então inserir informações assim:
```
```  
Linha1: $User = Controller::model("User", $IdUser);
``` 
```  
Linha2: $User->set("nome", "SpartechLtda");
```
```  
Linha3: $User->save();
``` 
Com isso trouxemos em uma váriavel o valor do nome dentro do banco user, e na segunda opção troxemos e setamos um novo valor para aquele nome daquele $IdUser de uma maneira muito simples e sem precisar tocar em nenhum momento em query. Tudo rápido fácil e totalmente seguro!

## Dicas e ideias, deixe em nosso comentário do fórum
<a href="https://github.com/murilloggomes/noodle-framework-php/discussions/1">Fórum de discussão</a>

## Contribuições
<p align="center" style="position:block">
  <img src="https://user-images.githubusercontent.com/67968960/270708300-9df8faa5-07bb-471c-b242-9d0d9449623c.png" style="width:150px !important"></img>
</p> 
<p align="center">
  <a href="https://www.buymeacoffee.com/murilloggo">Buy Me A Coffee</a>
</p>
