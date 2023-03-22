<html class="loading" lang="pt-BR" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="PeeP é um painel de indicador totalmente adaptável ao seu meio corporativo.">
  <meta name="keywords" content="Peep, painel de indicadores, indicadores, gestão, metas, dashboard de indicadores, indicadores de desempenho">
  <meta name="author" content="Murillo Gomes">
  <title>Página Padrão | TEMPLATE</title>
  <link rel="apple-touch-icon" href="../../../app-assets/images/favicon/apple-touch-icon-152x152.png">
  <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/favicon/favicon-32x32.png">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- BEGIN: VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/vendors.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
  <!-- END: VENDOR CSS-->
  <!-- BEGIN: Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-modern-menu-template/materialize.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-modern-menu-template/style.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/page-users.css">
  <!-- END: Page Level CSS-->
  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/custom/custom.css">
  <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">


  <?php require_once(APPPATH.'/views/fragments/siteconfig/topbar.fragment.php'); ?>

  <?php require_once(APPPATH.'/views/fragments/siteconfig/search-box.fragment.php'); ?>

   <?php 
    $Nav = new stdClass;
    $Nav->activeMenuFather = "index";    
    $Nav->activeMenuFirst = "index";      
    require_once(APPPATH.'/views/fragments/siteconfig/navigation.fragment.php');
  ?>

  <?php require_once(APPPATH.'/views/fragments/siteconfig/pagemain.fragment.php'); ?>

  <?php require_once(APPPATH.'/views/fragments/siteconfig/footer.fragment.php'); ?>

  <!-- END: Footer-->
  <!-- BEGIN VENDOR JS-->
  <script src="../../../app-assets/js/vendors.min.js"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="../../../app-assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
  <script src="../../../app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN THEME  JS-->
  <script src="../../../app-assets/js/plugins.js"></script>
  <script src="../../../app-assets/js/search.js"></script>
  <script src="../../../app-assets/js/custom/custom-script.js"></script>
  <script src="../../../app-assets/js/scripts/customizer.js"></script>
  <!-- END THEME  JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="../../../app-assets/js/scripts/page-users.js"></script>
  <!-- END PAGE LEVEL JS-->
</body>


</html>