<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title><?= site_settings("site_name") ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= APPURL . "/assets/images/favicon.ico"?>">
        <link href="<?= APPURL . "/assets/css/vendor/jquery-jvectormap-1.2.2.css"?>" rel="stylesheet" type="text/css" />
        <link href="<?= APPURL . "/assets/css/icons.min.css"?>" rel="stylesheet" type="text/css" />
        <link href="<?= APPURL . "/assets/css/app.min.css"?>" rel="stylesheet" type="text/css" id="app-style"/>
        <link href="<?= APPURL . "/assets/css/dashboard.css"?>" rel="stylesheet" type="text/css" />
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">        
        <link rel="stylesheet" href="<?= APPURL . "/assets/css/scrollbar.min.css"?>">
    </head>
<!-- END: Head-->
<?php foreach($GraficoEdit->getDataAs("Chart") as $ChartS): ?>
<body onload="ajaxChartEditar(<?= $ChartS->get("tipo_grafico") ?>)"   class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">

  
  
  
  
          <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->            
            <?php require(APPPATH.'/views/fragments/siteconfig/navigation.fragment.php'); ?>
            <?php require(APPPATH.'/views/fragments/siteconfig/topbar.fragment.php'); ?>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->            
            <?php require(APPPATH.'/views/fragments/dashboard-unico.fragment.php'); ?>
            <?php require(APPPATH.'/views/fragments/siteconfig/footer.fragment.php'); ?>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <?php require(APPPATH.'/views/fragments/siteconfig/navigation-right.fragment.php'); ?>
        <div class="rightbar-overlay"></div>
  <!-- Require da Página -->

  <!-- FIM FOOTER -->
  <!-- bundle -->
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
        <script src="<?= APPURL . "/assets/js/vendor.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/chart.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/custom/custom-dashboard.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/custom/chart-criacao.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/app.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/jquery-jvectormap-world-mill-en.js"?>"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        <script src="<?= APPURL . "/assets/js/js-mult/main.js"?>"></script>
        <!-- third party js ends -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
  <script>
  
        $(document).ready(function() {
          $("#datepicker").datepicker();
          $(".select2").select2();
        });
 </script>
   </body>
<?php endforeach; ?>
</html>
