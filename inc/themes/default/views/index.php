<?php if (!defined('APP_VERSION')) die("Yo, what's up?"); ?>
<!doctype html>
<html lang="<?= ACTIVE_LANG ?>">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<meta name="google-site-verification" content="AN5xN4tCwPP5YgkmLFTp-1zSAmuMMOUeB2UE5FgnLBk" />
        <meta name="description" content="<?= site_settings("site_description") ?>">
        <meta name="keywords" content="<?= site_settings("site_keywords") ?>">

        <!-- mobile responsive meta -->
        <meta property="og:title" content="Aumente suas vendas no Instagram de forma inteligente.">
        <meta property="og:site_name" content="Coach Social">
        <meta property="og:url" content="https://coachsocial.com.br">
        <meta property="og:type" content="website">
        <meta property="og:description" content="Quer saber como ter sucesso no Instagram? Acesse agora e confira!" />
        <meta property="fb:admins" content="coachsocialapp">
        <meta property="og:image" content="https://coachsocial.com.br/inc/themes/default/assets/images/capa-facebook-og.png">
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="800">
        <meta property="og:image:height" content="600">
        
             <link rel="icon" href="<?= site_settings("logomark") ? site_settings("logomark") : active_theme_url() . "/assets/images/favicon.ico"?>" type="image/x-icon">
        <link rel="shortcut icon" href="<?= site_settings("logomark") ? site_settings("logomark") : active_theme_url() . "/assets/images/favicon.ico"?>" type="image/x-icon">
        <link rel="manifest" href="<?= site_settings("logomark") ? site_settings("logomark") : active_theme_url() . "/assets/theme/img/favicon/manifest.json"?>">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" type="text/css" href="<?= active_theme_url() . "/assets/theme/css/style.css"?>">
        <link rel="stylesheet" type="text/css" href="<?= active_theme_url() . "/assets/theme/css/responsive.css"?>">

        <?php require_once APPPATH . '/views/fragments/google-analytics.fragment.php';?>
       
       <title><?= site_settings("site_name") ?></title>       
    </head>

<body>

<div class="preloader"><div class="spinner"></div></div><!-- /.preloader -->

                           

<header class="header home-page-one">
    <nav class="navbar navbar-default header-navigation stricky">
        <div class="container clearfix">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="<?= active_theme_url() . "/assets/theme/img/logo.png"?>" Title="Logotipo Coach Social" alt="Logotipo Site Coach Social" class="default-logo" />
                    <img src="<?= active_theme_url() . "/assets/theme/img/logo-2.png"?>" Title="Logotipo Alternativa Coach Social" alt="Logotipo Alternativa Site Coach Social" class="stick-logo" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse main-navigation mainmenu one-page-scroll-menu" id="main-nav-bar">

                <ul class="nav navbar-nav navigation-box">
                    <li class="scrollToLink current"> <a href="#banner">Início</a> </li>
                    <li class="scrollToLink"> <a href="#features">O Sistema</a> </li>
                    <li class="scrollToLink"> <a href="#how-it-works">Benefícios</a> </li>
                    <li class="scrollToLink"> <a href="#pricing">Planos</a> </li>
                    <li class="scrollToLink"> <a href="<?= APPURL . "/login" ?>">Login</a> </li>
                    <li class="show-mobile"> <a href="<?= APPURL . "/signup" ?>">Cadastre-se</a> </li>
                </ul>
                
            </div><!-- /.navbar-collapse -->
            <div class="right-side-box">
                <a href="<?= APPURL . "/signup" ?>" class="sign-btn">Cadastre-se</a>
            </div><!-- /.right-side-box -->
        </div><!-- /.container -->
    </nav>   
</header><!-- /.header -->

<section class="banner-static" id="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner-content">
                    <h3>Interaja individualmente com seu Público Alvo no Instagram</h3>
                    <p>Tenha uma interação automatizada e com uma segmentação totalmente individual para seu négocio.</p>
                    <a href="<?= APPURL . "/signup" ?>" class="thm-btn"><span>Cadastre-se Grátis</span></a><!--
                    --><a href="#features" class="thm-btn borderd"><span>Conheça Mais</span></a>
                </div><!-- /.banner-content -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-6">
                <div class="banner-moc-box clearfix">
                    <img src="<?= active_theme_url() . "/assets/theme/img/celular-capa.png"?>" title="Celular Capa" alt="Celular Capa Coach Social" class="pull-right" />
                </div><!-- /.banner-moc-box -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.banner-static -->


<section class="app-features" id="features">
    <div class="container">
        <div class="sec-title text-center">
            <h2>Benefícios do Coach Social</h2>
            <p>Conheça como ganhar seguidores e curtidas de forma totalmente natural e segmentada. <br /> O Coach Social se preocupa principalmente em atingir o cliente certo para você.</p>
        </div><!-- /.sec-title -->
        <div class="app-features-carousel owl-theme owl-carousel">
            <div class="item">
                <div class="single-app-features text-center">
                    <i class="flaticon-team"></i>
                    <h3>Interação Automática</h3>
                    <p>Interaja com seu público alvo com as funções: <br /> seguir, curtir, comentar e desseguir. </p>
                    <div class="line"></div><!-- /.line -->
                </div><!-- /.single-app-features -->
            </div><!-- /.item -->           
            <div class="item">
                <div class="single-app-features text-center">
                    <i class="flaticon-clock"></i>
                    <h3>Agendamento de Postagem</h3>
                    <p>Programe Posts, Stories ou Album para ser postado automaticamente no dia e horário escolhido por você. </p>
                    <div class="line"></div><!-- /.line -->
                </div><!-- /.single-app-features -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-app-features text-center">
                    <i class="flaticon-origami"></i>
                    <h3>Direct Automático (DM)</h3>
                    <p>Engaje seus seguidores com mensagens diretas automáticas e personalizadas.</p>
                    <div class="line"></div><!-- /.line -->
                </div><!-- /.single-app-features -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-app-features text-center">
                    <i class="flaticon-search"></i>
                    <h3>Relatórios</h3>
                    <p>Relatórios precisos para que você tenha uma boa tomada de decisão em seu perfil.</p>
                    <div class="line"></div><!-- /.line -->
                </div><!-- /.single-app-features -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-app-features text-center">
                    <i class="flaticon-support"></i>
                    <h3>Suporte Ágil</h3>
                    <p>Caso tenha algum problema ou dúvida, contamos com uma equipe totalmente preparada para entrar em ação.</p>
                    <div class="line"></div><!-- /.line -->
                </div><!-- /.single-app-features -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-app-features text-center">
                    <i class="flaticon-target"></i>
                    <h3>Segmentação de Público</h3>
                    <p>Filtre e encontre seu público-alvo por meio de: <br /> hashtags, gênero e localização. </p>
                    <div class="line"></div><!-- /.line -->
                </div><!-- /.single-app-features -->
            </div><!-- /.item -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.app-features -->

<section class="how-app-work-section" id="how-it-works">
    <div class="container">
        
        <div class="row">
            <div class="col-md-6 how-app-work-slider-content">          
                <img src="<?= active_theme_url() . "/assets/theme/img/circulo-fundo.png"?>" class="circled-img" Title="Circulo Sessão Como Funciona" alt="Circulo utilizado na sessão como funciona do site"/>
                <div class="how-app-work-slider-wrapper">
                    <div class="how-app-work-screen-mobile-image"></div>
                    <!--Slider-->
                    <ul class="slider">
                        <li class="slide-item">
                            <img src="<?= active_theme_url() . "/assets/theme/img/tela-cadastro.png"?>" Title="Tela de Cadastro do Coach Social" alt="Tela Cadastro Sistema Coach Social"/>
                        </li>
                        <li class="slide-item">
                            <img src="<?= active_theme_url() . "/assets/theme/img/tela-cadastro-instagram.png"?>" Title="Tela de Cadastro no Instagram" alt="Tela Cadastro Instagram Sistema Coach Social"/>
                        </li>
                        <li class="slide-item">
                            <img src="<?= active_theme_url() . "/assets/theme/img/tela-configuracao.png"?>" Title="Tela de Configuração do Sistema" alt="Tela Configuração Sistema Coach Social"/>
                        </li>
                        <li class="slide-item">
                            <img src="<?= active_theme_url() . "/assets/theme/img/tela-relatorio.png"?>" Title="Tela de Relatórios" alt="Tela Relatórios Coach Social"/>
                        </li>
                    </ul>
                </div><!-- /.how-app-work-slider-wrapper -->
                
            </div><!-- /.col-md-6 -->
            <div class="col-md-6">
                <div class="how-app-work-content-wrap">
                    
                    <div class="how-app-work-content" id="how-app-work-slider-pager">
                        <a href="#" class="pager-item active" data-slide-index="0"><div class="single-how-app-work ">
                            <div class="icon-box">
                                <div class="inner">
                                    <i class="flaticon-document"></i>
                                </div><!-- /.inner -->
                            </div><!-- /.icon-box -->
                            <div class="text-box">
                                <h4>Cadastre-se no site</h4>
                                <p>Faça o cadastro em nosso site <br /> e simples e bem rápido.</p>
                            </div><!-- /.text-box -->
                        </div></a><!-- /.single-how-app-work -->
                        <a href="#" class="pager-item" data-slide-index="1"><div class="single-how-app-work">
                            <div class="icon-box">
                                <div class="inner">
                                    <i class="flaticon-instagram"></i>
                                </div><!-- /.inner -->
                            </div><!-- /.icon-box -->
                            <div class="text-box">
                                <h4>Conecte sua conta do Instagram.</h4>
                                <p>Acesse sua conta do Instagram<br />  para começar a utilizar.</p>
                            </div><!-- /.text-box -->
                        </div></a><!-- /.single-how-app-work -->
                        <a href="#" class="pager-item" data-slide-index="2"><div class="single-how-app-work ">
                            <div class="icon-box">
                                <div class="inner">
                                    <i class="flaticon-config"></i>
                                </div><!-- /.inner -->
                            </div><!-- /.icon-box -->
                            <div class="text-box">
                                <h4>Configurar Público-Alvo</h4>
                                <p>Selecione o seu público alvo e<br />  a forma de interagir com ele.</p>
                            </div><!-- /.text-box -->
                        </div></a><!-- /.single-how-app-work -->            
                    <a href="#" class="pager-item" data-slide-index="3"><div class="single-how-app-work ">
                            <div class="icon-box">
                                <div class="inner">
                                    <i class="flaticon-relax"></i>
                                </div><!-- /.inner -->
                            </div><!-- /.icon-box -->
                            <div class="text-box">
                                <h4>Relaxe</h4>
                                <p>Agora é só aproveitar<br />  e conferir os resultados.</p>
                            </div><!-- /.text-box -->
                        </div></a><!-- /.single-how-app-work -->
                    </div><!-- /.how-app-work-content -->
                    <a href="<?= APPURL . "/signup" ?>" class="download-btn active">
                        <i class="fab flaticon-document"></i>
                        <spam class="inner"><span class="avail">Cadastre-se</span> <span class="store-name">E tenha 7 dias Grátis!</span></span>
                    </a>                    
                </div><!-- /.how-app-work-content-wrap -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.how-app-work-section -->

<div class="separator no-border mt135 full-width"></div><!-- /.separator no-border mt135 -->

<section class="features-style-one">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="feature-style-content">
                    <i class="flaticon-tools"></i>
                    <h3>Como o Coach Social faz você ganhar seguidores e curtidas no Instagram?</h3>
                    <p>O Coach Social nasceu para facilitar a vida de empreendedores, celebridades, formadores de opinião, entre outros. Criamos uma ferramenta com o objetivo principal de alcançar o público-alvo dos nossos clientes, de acordo com os seus desejos e necessidades. O nosso sistema vai te ajudar a ganhar seguidores no Instagram da forma mais completa possível, fazendo com que seu perfil interaja com outras pessoas baseados em três filtros: Localização, Hashtag e Perfil Semelhante.</p>                   
                </div><!-- /.feature-style-content -->
            </div><!-- /.col-md-6 -->   
            <div class="col-md-6">
                <img src="<?= active_theme_url() . "/assets/theme/img/seguidores-no-instagram.png"?>" class="has-dropshadow" Title="Ganhe Seguidores no Instagram" alt="Ganhar Seguidores Instagram Naturalmente Segmentado" />
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.features-style-one -->

<div class="separator no-border mt135 full-width"></div><!-- /.separator no-border mt135 -->

<section class="features-style-one">
    <div class="container"> 
        <div class="row">
            <div class="col-md-6 pull-right">
                <div class="feature-style-content pt70 pl40">
                    <i class="flaticon-responsive-design-symbol"></i>
                    <h3>Pensado exatamente no que você precisa para crescer</h3>
                    <p>Nosso painel é simples, intuitivo e exatamente pensado <br /> com as funções que você precisa para atrair seguidores <br /> e conseguir mais clientes.</p>                   
                </div><!-- /.feature-style-content -->
            </div><!-- /.col-md-6 -->           
            <div class="col-md-6 clearfix pull-left">
                <img src="<?= active_theme_url() . "/assets/theme/img/curtidas-no-instagram.png"?>" class="pull-right" Title="Ganhe Curtidas no Instagram" alt="Ganhar Curtidas Instagram Segmentadas" />
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->    
    </div><!-- /.container -->
</section><!-- /.features-style-one -->

<div class="separator no-border mb90 full-width"></div><!-- /.separator no-border mb135 -->

<section class="video-box">
    <div class="container text-center">
        <a href="https://www.youtube.com/watch?v=G6E-YyAMsOg" class="video-popup video-btn hvr-pulse"><i class="fa fa-play"></i></a>
    </div><!-- /.container text-center -->
</section><!-- /.video-box -->

<div class="separator no-border mb115 full-width"></div><!-- /.separator no-border mb135 -->

<section class="intigration-section">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="intigration-content">
                    <h3>Tenha o máximo do seu Instagram em um só local</h3>
                    <p>Com a Coach Social você economiza tempo e otimiza a gestão de perfis nas redes sociais! Siga, Curta, Comente, Dessiga, Envie DM e Programe Postagens, tudo isso com analise métricas e relatórios para uma melhor tomada de decisão.</p>
                </div><!-- /.intigration-content -->
            </div><!-- /.col-md-5 -->
            <div class="col-md-7">
                <div class="intigration-img-box text-right">
                    <img src="<?= active_theme_url() . "/assets/theme/img/seguir.png"?>" Title="Siga Pessoas interessadas em seu negócio" alt="Seguir Pessoas Segmentadas Negócio"/>
                    <img src="<?= active_theme_url() . "/assets/theme/img/dm.png"?>" Title="Enviar Direct Messenger para todos os seu seguidores" alt="Enviar Direct Messenger Todos Seguidores"/>
                    <img src="<?= active_theme_url() . "/assets/theme/img/comentar.png"?>" Title="Comentar as fotos de pessoas interessadas em seu negócio" alt="Comentar Fotos Pessoas Segmentadas Negócio"/>
                    <img src="<?= active_theme_url() . "/assets/theme/img/desseguir.png"?>" Title="Desseguir pessoas" alt="Desseguir Pessoas Baseado Filtros"/>
                    <img src="<?= active_theme_url() . "/assets/theme/img/curtir.png"?>" Title="Curtir Pessoas" alt="Curtir Pessoas Segmentadas Negócio"/>
                </div><!-- /.intigration-img-box -->
            </div><!-- /.col-md-7 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.intigration-section -->

<div class="separator no-border mb135 full-width"></div><!-- /.separator no-border mb135 -->

<section class="pricing-section" id="pricing">
    <div class="container">
        <div class="sec-title text-center">
            <h2>Planos</h2>
            <p>Escolha o plano que mais for adequado para você.</p>
        </div><!-- /.sec-title -->
        <ul class="list-inline text-center switch-toggler-list" role="tablist" id="switch-toggle-tab">
            <li class="month active"><a href="#" >Mensal</a></li>
            <li>
                <!-- Rounded switch -->
                <label class="switch on">
                    <span class="slider round"></span>
                </label>
            </li>
            <li class="year"><a href="#">Anual</a></li>
        </ul><!-- /.list-inline -->
        <div class="tabed-content">
            <div id="month">
                <div class="row pricing-row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-pricing text-center">
                            <div class="inner">
                                <h3 class="title">Social</h3><!-- /.title -->
                                <p class="price">R$69</p><!-- /.price -->
                                <p class="price-label">1 Conta do Instagram</p><!-- /.label -->
                                <ul class="list-item">
                                    <li><i class="fa fa-check"></i> 200 MB de Núvem Própria</li>
                                    <li><i class="fa fa-check"></i> Programar Postagem</li>
                                    <li><i class="fa fa-check"></i> Módulos de Interação</li>
                                    <li><i class="fas fa-times"></i> Integração com Núvem</li>
                                    <li><i class="fas fa-times"></i> Consultoria Mensal</li>
                                </ul><!-- /.list-item -->
                                <a href="<?= APPURL . "/signup" ?>" class="thm-btn borderd"><span>Experimente Grátis</span></a>
                            </div><!-- /.inner -->
                        </div><!-- /.single-pricing -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-pricing text-center popular">
                            <div class="inner">
                                <h3 class="title">Coach</h3><!-- /.title -->
                                <p class="price">R$89</p><!-- /.price -->
                                <p class="price-label">1 Conta do Instagram</p><!-- /.label -->
                                <ul class="list-item">
                                    <li><i class="fa fa-check"></i> 300 MB de Núvem Própria</li>
                                    <li><i class="fa fa-check"></i> Programar Postagem</li>
                                    <li><i class="fa fa-check"></i> Módulos de Interação</li>
                                    <li><i class="fas fa-check"></i> Integração com Núvem</li>
                                    <li><i class="fas fa-check"></i> Consultoria Mensal</li>
                                </ul><!-- /.list-item -->
                                <a href="<?= APPURL . "/renew?package=1" ?>" class="thm-btn borderd"><span>Assine Agora</span></a>
                            </div><!-- /.inner -->
                        </div><!-- /.single-pricing -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-pricing text-center">
                            <div class="inner">
                                <h3 class="title">Agências</h3><!-- /.title -->
                                <p class="price">Orçamento</p><!-- /.price -->
                                <p class="price-label">A Combinar</p><!-- /.label -->
                                <ul class="list-item">
                                    <li><i class="fa fa-check"></i> Tamanho de Núvem a Combinar</li>
                                    <li><i class="fa fa-check"></i> Programar Postagem</li>
                                    <li><i class="fa fa-check"></i> Módulos de Interação</li>
                                    <li><i class="fas fa-check"></i> Integração com Núvem</li>
                                    <li><i class="fas fa-check"></i> Consultoria Mensal</li>
                                </ul><!-- /.list-item -->
                                <a href="#" class="thm-btn borderd"><span>Fazer Orçamento</span></a>
                            </div><!-- /.inner -->
                        </div><!-- /.single-pricing -->
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div><!-- /#month -->
            <div id="year">
                <div class="row pricing-row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-pricing text-center">
                            <div class="inner">
                                <h3 class="title">Social</h3><!-- /.title -->
                                <p class="price">R$715</p><!-- /.price -->
                                <p class="info">Desconto de R$ 102,00</p><!-- /.price info -->
                                <p class="price-label">1 Conta do Instagram</p><!-- /.label -->
                                <ul class="list-item">
                                    <li><i class="fa fa-check"></i> 200 MB de Núvem Própria</li>
                                    <li><i class="fa fa-check"></i> Programar Postagem</li>
                                    <li><i class="fa fa-check"></i> Módulos de Interação</li>
                                    <li><i class="fas fa-times"></i> Integração com Núvem</li>
                                    <li><i class="fas fa-times"></i> Consultoria Mensal</li>
                                </ul><!-- /.list-item -->
                                <a href="<?= APPURL . "/signup" ?>" class="thm-btn borderd"><span>Experimente Grátis</span></a>
                            </div><!-- /.inner -->
                        </div><!-- /.single-pricing -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-pricing text-center popular">
                            <div class="inner">
                                <h3 class="title">Coach</h3><!-- /.title -->
                                <p class="price">R$910</p><!-- /.price -->
                                <p class="info">Desconto de R$ 158,00</p><!-- /.price info -->
                                <p class="price-label">1 Conta do Instagram</p><!-- /.label -->
                                <ul class="list-item">
                                    <li><i class="fa fa-check"></i> 300 MB de Núvem </li>
                                    <li><i class="fa fa-check"></i> Programar Postagem</li>
                                    <li><i class="fa fa-check"></i> Módulos de Interação</li>
                                    <li><i class="fas fa-check"></i> Integração com Núvem</li>
                                    <li><i class="fas fa-check"></i> Consultoria Mensal</li>
                                    <li><i class="fas fa-check"></i> 2x Mais Engajamento</li>
                                </ul><!-- /.list-item -->
                                <a href="<?= APPURL . "/renew?package=1" ?>" class="thm-btn borderd"><span>Assine Agora</span></a>
                            </div><!-- /.inner -->
                        </div><!-- /.single-pricing -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-pricing text-center">
                            <div class="inner">
                                <h3 class="title">Agências</h3><!-- /.title -->
                                <p class="price">Orçamento</p><!-- /.price -->
                                <p class="info">Desconto a combinar</p><!-- /.price info -->
                                <p class="price-label">A Combinar</p><!-- /.label -->
                                <ul class="list-item">
                                    <li><i class="fa fa-check"></i> Tamanho de Núvem a Combinar</li>
                                    <li><i class="fa fa-check"></i> Programar Postagem</li>
                                    <li><i class="fa fa-check"></i> Módulos de Interação</li>
                                    <li><i class="fas fa-check"></i> Integração com Núvem</li>
                                    <li><i class="fas fa-check"></i> Consultoria Mensal</li>
                                </ul><!-- /.list-item -->
                                <a href="#" class="thm-btn borderd"><span>Fazer Orçamento</span></a>
                            </div><!-- /.inner -->
                        </div><!-- /.single-pricing -->
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div><!-- /#year -->
        </div><!-- /.tabed-content -->
    </div><!-- /.container -->
</section><!-- /.pricing-section -->

<div class="separator no-border mb100 full-width"></div><!-- /.separator no-border mb135 -->

<section class="testimonials-style-one">
    <div class="container">
        <!-- <img src="img/testimonials-bg.png" class="testi-thumb" alt="" /> -->
        <div class="title">
            <div class="row">
                <div class="col-md-5"></div><!-- /.col-md-5 -->
                <div class="col-md-7">
                    <h3>Depoimento de Usuários</h3>
                </div><!-- /.col-md-7 -->
            </div><!-- /.row -->
        </div><!-- /.title -->
        <div id="testimonials-slider-pager">
            <a href="#" class="pager-item active" data-slide-index="0"><img src="<?= active_theme_url() . "/assets/theme/img/emerson-rodrigues-min.png"?>" Title="Emerson Rodrigues" alt="Emerson Rodrigues Afiliado Politico Miniatura"/></a>
            <a href="#" class="pager-item" data-slide-index="1"><img src="<?= active_theme_url() . "/assets/theme/img/ramon-alvarenga-min.png"?>" Title="Ramon Alvarenga" alt="Ramon Alvarenga Músico Pagode Menos é Mais Miniatura"/></a>
            <a href="#" class="pager-item" data-slide-index="2"><img src="<?= active_theme_url() . "/assets/theme/img/kim-viegas-min.png"?>" Title="Kim Viegas" alt="Kim Viegas Tatuador Miniatura"/></a>
            <a href="#" class="pager-item" data-slide-index="3"><img src="<?= active_theme_url() . "/assets/theme/img/canvas-tabacaria-min.png"?>" Title="Canvas Tabacaria" alt="Canvas Tabacaria Brasília Miniatura"/></a>
            <a href="#" class="pager-item" data-slide-index="4"><img src="<?= active_theme_url() . "/assets/theme/img/eduardo-rodrigues-min.png"?>" Title="Eduardo Rodrigues" alt="Eduardo Rodrigues Social Media Miniatura"/></a>
            <a href="#" class="pager-item" data-slide-index="5"><img src="<?= active_theme_url() . "/assets/theme/img/parsear-min.png"?>" Title="Parsear Miniatura" alt="Parsear Agencia Marketing Digital Miniatura"/></a>
        </div><!-- /#testimonials-slider-pager -->
        <div class="testimonials-slider">
            <!--Slider-->
            <ul class="slider">
                <li class="slide-item">
                    <div class="single-testimonial">
                        <div class="img-box">
                            <img src="<?= active_theme_url() . "/assets/theme/img/emerson-politica.png"?>" Title="Emerson Rodrigues" alt="Emerson Rodrigues Afiliado Politic"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <img src="<?= active_theme_url() . "/assets/theme/img/testi-qoute.png"?>" Title="Comentário Emerson Rodrigues" alt="Comentário Emerson"/>
                            <p>Há momentos como os quais estão sendo vividos hoje em que a interação com o eleitorado e a administração de campanhas se tornam cada vez menos ágil, e foi aí que eu vim conhecer o Coach Social, que me proporcionou uma interação muito mais próxima de meus seguidores e dos interessados em campanhas políticas.</p>
                            <h3>Emerson Rodrigues</h3>
                            <span>Afiliado Político</span>
                        </div><!-- /.text-box -->
                    </div><!-- /.single-testimonial -->
                </li>
                <li class="slide-item">
                    <div class="single-testimonial">
                        <div class="img-box">
                            <img src="<?= active_theme_url() . "/assets/theme/img/ramon-musico.png"?>" Title="Ramon Músico" alt="Ramon Alvarenga Músico"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <img src="<?= active_theme_url() . "/assets/theme/img/testi-qoute.png"?>" Title="Comentário Ramon Alvarenga" alt="Comentário Ramon"/>
                            <p>Coisa de outro mundo! Comecei a usar o Coach Social só para ver como seria e hoje triplicamos nosso público nos pagodes. Deu uma visibilidade incrível para nosso trabalho, só tenho a agradecer a essa rapaziada.</p>
                            <h3>Ramon Alvarenga</h3>
                            <span>Músico</span>
                        </div><!-- /.text-box -->
                    </div><!-- /.single-testimonial -->
                </li>
                <li class="slide-item">
                    <div class="single-testimonial">
                        <div class="img-box">
                            <img src="<?= active_theme_url() . "/assets/theme/img/kim-tatuador.png"?>" Title="Kim Viegas Tatuador" alt="Kim Tatuador"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <img src="<?= active_theme_url() . "/assets/theme/img/testi-qoute.png"?>" Title="Comentário Kim" alt="Comentário Kim Tatuador"/>
                            <p>Ferramenta muito útil e fácil de usar. Excelente para gerenciar com cuidado minha conta social! 👏🏼👏🏼👏🏼</p>
                            <h3>Kim Viegas</h3>
                            <span>Tatuador</span>
                        </div><!-- /.text-box -->
                    </div><!-- /.single-testimonial -->
                </li>
                <li class="slide-item">
                    <div class="single-testimonial">
                        <div class="img-box">
                            <img src="<?= active_theme_url() . "/assets/theme/img/canvas-tabacaria.png"?>" Title="Canvas Tabacaria" alt="Canvas Tabacária Logotipo"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <img src="<?= active_theme_url() . "/assets/theme/img/testi-qoute.png"?>" Title="Comentário Canvas" alt="Comentário Canvas"/>
                            <p>Por meio do Coach Social encontramos vários revendedores para nossos produtos. Só tenho a agradecer por a cada dia aumentar mais ainda a Família!🙏🏽🙏🏽</p>
                            <h3>Canvas</h3>
                            <span>Tabacaria</span>
                        </div><!-- /.text-box -->
                    </div><!-- /.single-testimonial -->
                </li>
                <li class="slide-item">
                    <div class="single-testimonial">
                        <div class="img-box">
                            <img src="<?= active_theme_url() . "/assets/theme/img/eduardo-social.png"?>" Title="Foto Eduardo" alt="Eduardo Rodrigues Social Media"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <img src="<?= active_theme_url() . "/assets/theme/img/testi-qoute.png"?>" Title="Comentário Eduardo" alt="Comentário Eduardo Rodrigues"/>
                            <p>Atuando com marketing digital a dois anos, foi gratificante como profissional de mídias digitais ter conhecido o Coach Social. Utilizo em todos meus clientes e nos meus projetos pessoais e o retorno do engajamento é incomparável. Sem seguidores fantasmas, economizo um enorme tempo com a automação, que me permite focar em outros aspectos importantes.</p>
                            <h3>Eduardo Rodrigues</h3>
                            <span>Social Media</span>
                        </div><!-- /.text-box -->
                    </div><!-- /.single-testimonial -->
                </li>
                <li class="slide-item">
                    <div class="single-testimonial">
                        <div class="img-box">
                            <img src="<?= active_theme_url() . "/assets/theme/img/parsear-agencia.png"?>" Title="arsear Logotipo" alt="Logotipo Parsear Agência Digital"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <img src="<?= active_theme_url() . "/assets/theme/img/testi-qoute.png"?>" Title="Comentário Parsear" alt="Comentário Parsear Agência Marketing Digital"/>
                            <p>Qualidade e competência são duas palavras que traduzem a base dos materiais e do atendimento que a empresa emprega nos serviços que realiza.</p>
                            <h3>Parsear</h3>
                            <span>Agência Digital</span>
                        </div><!-- /.text-box -->
                    </div><!-- /.single-testimonial -->
                </li>
            </ul>
        </div><!-- /.testimonials-slider -->
    </div><!-- /.container -->
</section><!-- /.testimonials-style-one -->

<div class="separator no-border mb135 full-width"></div><!-- /.separator no-border mb135 -->
<footer class="footer">
    <div class="subscribe-section">
        <div class="container">
            <div class="sec-title text-center">
                <h2>Assine para receber conteúdo sobre Marketing Digital</h2>
                <p>Entre com seu e-mail abaixo para enviarmos conteúdo de como tirar o máximo de aproveitamento de seu perfil no Instagram.</p>
            </div><!-- /.sec-title -->
            <form action="<?= active_theme_url() . "/assets/theme/inc/mailchimp/subscribe.php"?>" class="subscribe-form mailchimp-form clearfix">
                <div class="left-content pull-left clearfix">
                    <i class="far fa-envelope"></i>
                    <input type="text" name="email" placeholder="exemplo@gmail.com" />
                    <div class="result"></div><!-- /.result -->
                </div><!-- /.left-content -->
                <div class="right-content pull-right">
                    <button class="thm-btn" type="submit"><span>Assine agora</span></button>
                </div><!-- /.right-content -->

            </form><!-- /.subscribe-form -->
        </div><!-- /.container -->
    </div><!-- /.subscribe-section -->
    <div class="footer-widget-wrapper">
        <div class="container">
            <div class="row masonary-layout">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget about-widget">
                        <a href="/"><img style="width:80%" src="<?= active_theme_url() . "/assets/theme/img/logo.png"?>" title="Logoripo Rodapé" alt="Logotipo Localizado Rodapé Coach Social"/></a>
                        <p>Fique sempre atento as nossas novidades por meio de nossos canais sociais, acompanhe de perto e faça parte dessa revolução!</p>
                        <div class="social">
                            <a href="https://facebook.com.br/coachsocialapp" class="fab fa-facebook-f"></a><!--
                            --><a href="https://twitter.com/coachsocialapp" class="fab fa-twitter"></a><!--
                            --><a href="#" class="fab fa-google-plus-g"></a><!--
                            --><a href="https://instagram.com.br/coachsocialapp" class="fab fa-instagram"></a>
                        </div><!-- /.social -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget contact-widget">
                        <div class="title">
                            <h3>Contato</h3>
                        </div><!-- /.title -->                      
                        <p><span>E-mail:</span> contato@coachsocial.com.br</p>
                        <p><span>Sede:</span> Brasília, DF - Brasil</p>
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget links-widget">
                        <div class="title">
                            <h3>Link Rápidos</h3>
                        </div><!-- /.title -->
                        <ul class="list-inline link-list">                          
                            <li><a href="<?= APPURL . "/signup" ?>">Cadastre-se</a></li><!--
                            --><li><a href="#">Contato</a></li><!--
                            --><li><a href="#">Sitemap</a></li><!--
                            --><li><a href="<?= APPURL . "/manual" ?>">FAQ</a></li>
                        </ul><!-- /.link-list -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget tweets-widget">
                        <div class="title">
                            <h3>Tweets</h3>
                        </div><!-- /.title -->
                        <div class="tweets-carousel owl-theme owl-carousel">
                            <div class="item">
                                <div class="single-tweet">
                                    <p><i class="fab fa-twitter"></i>O sistema automatizado que oferece comodidade, segurança e traduz para os clientes o significado de "poupar tempo".</p>
                                    <a href="#">@CoachSocialApp</a>
                                </div><!-- /.single-tweet -->
                            </div><!-- /.item -->
                            <div class="item">
                                <div class="single-tweet">
                                    <p><i class="fab fa-twitter"></i>Comprometido em levar a melhor experiencia do marketing nas mídias sociais, viemos ao mercado mostrar que é possível ter reconhecimento digital de forma automatizada e ao mesmo tempo natural.</p>
                                    <a href="#">@CoachSocialApp</a>
                                </div><!-- /.single-tweet -->
                            </div><!-- /.item -->
                            <div class="item">
                                <div class="single-tweet">
                                    <p><i class="fab fa-twitter"></i>Ganhar seguidores e Curtidas no Instagram de Forma totalmente Natural.</p>
                                    <a href="#">@CoachSocialApp</a>
                                </div><!-- /.single-tweet -->
                            </div><!-- /.item -->
                            <div class="item">
                                <div class="single-tweet">
                                    <p><i class="fab fa-twitter"></i>Seguidores e Curtidas no Instagram totalmente reais e segmentadas.</p>
                                    <a href="#">@CoachSocialApp</a>
                                </div><!-- /.single-tweet -->
                            </div><!-- /.item -->
                        </div><!-- /.tweets-carousel -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-widget-wrapper -->
    <div class="footer-bottom">
        <div class="container">
            <div class="pull-left left-content">
                <p>© 2018 - Coach Social <span class="sep">|</span> <a href="#">Termos de Uso</a> <span class="sep">|</span> <a href="#">Sitemap</a></p>
            </div><!-- /.pull-left left-content -->
            <div class="pull-right right-content">
                <p>Todos os Direitos Reservados.</p>
            </div><!-- /.pull-right -->
        </div><!-- /.container -->
    </div><!-- /.footer-bottom -->
</footer><!-- /.footer -->

<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fas fa-angle-up"></span></div>

<script src="<?= active_theme_url() . "/assets/theme/js/jquery.js"?>"></script>

<script type="text/javascript"src="<?= active_theme_url() . "/assets/theme/js/bootstrap.min.js"?>"></script>
<script type="text/javascript" src="<?= active_theme_url() . "/assets/theme/js/bootstrap-select.min.js"?>"></script>
<script type="text/javascript" src="<?= active_theme_url() . "/assets/theme/js/jquery.validate.min.js"?>"></script>
<script type="text/javascript" src="<?= active_theme_url() . "/assets/theme/js/owl.carousel.min.js"?>"></script>
<script type="text/javascript" src="<?= active_theme_url() . "/assets/theme/js/isotope.js"?>"></script>
<script type="text/javascript" src="<?= active_theme_url() . "/assets/theme/js/jquery.magnific-popup.min.js"?>"></script>
<script type="text/javascript" src="<?= active_theme_url() . "/assets/theme/js/waypoints.min.js"?>"></script>
<script type="text/javascript" src="<?= active_theme_url() . "/assets/theme/js/jquery.counterup.min.js"?>"></script>
<script type="text/javascript" src="<?= active_theme_url() . "/assets/theme/js/wow.min.js"?>"></script>
<script type="text/javascript" src="<?= active_theme_url() . "/assets/theme/js/jquery.easing.min.js"?>"></script>
<script type="text/javascript" src="<?= active_theme_url() . "/assets/theme/js/swiper.min.js"?>"></script>
<script type="text/javascript" src="<?= active_theme_url() . "/assets/theme/js/jquery.bxslider.min.js"?>"></script>
<script type="text/javascript" src="<?= active_theme_url() . "/assets/theme/js/custom.js"?>"></script>

</body>
</html>