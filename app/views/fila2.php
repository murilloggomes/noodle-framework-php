<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?= site_settings("site_name") ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= APPURL . "/assets/images/logo/peep-icon.png"?>">

        <!-- third party css -->
        <link href="<?= APPURL . "/assets/css/vendor/jquery-jvectormap-1.2.2.css"?>" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <!-- App css -->
        <link rel="stylesheet" type="text/css" href="../../../inc/themes/default/assets/theme/plugins/fontawesomme-5/css/fontawesome-all.css">
        <link href="<?= APPURL . "/assets/css/icons.min.css"?>" rel="stylesheet" type="text/css" />
        <link href="<?= APPURL . "/assets/css/funil.css"?>" rel="stylesheet" type="text/css" />
        <link href="<?= APPURL . "/assets/css/app.min.css"?>" rel="stylesheet" type="text/css" id="app-style"/>        
        <link rel="stylesheet" href="<?= APPURL . "/assets/css/scrollbar.min.css"?>">
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <link href="<?= APPURL . "/assets/css/custom.task.css"?>" rel="stylesheet" type="text/css"/>
        <link href="<?= APPURL . "/assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css"?>" rel="stylesheet" type="text/css" />
      
      </head>
        <body  class="loading" data-layout-color="<?= custom($AuthUser->get("id"), "modo_tema") == "" ? "light" : custom($AuthUser->get("id"), "modo_tema") ?>" data-leftbar-theme="<?= custom($AuthUser->get("id"), "cor_menu") == "" ? "default" : custom($AuthUser->get("id"), "cor_menu") ?>" data-layout-mode="<?= custom($AuthUser->get("id"), "largura_tema") == "" ? "fixed" : custom($AuthUser->get("id"), "largura_tema") ?>" data-rightbar-onstart="true">
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->            
           <?php require(APPPATH.'/views/fragments/siteconfig/topbar-tasks.fragment.php'); ?>
           <?php require(APPPATH.'/views/fragments/siteconfig/navigation.fragment.php'); ?>]
           <?php require(APPPATH.'/views/fragments/siteconfig/modal.fragment.php'); ?>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->    
          
            <?php require(APPPATH.'/views/fragments/fila2.fragment.php'); ?>
          
            <?php require(APPPATH.'/views/fragments/siteconfig/footer.fragment.php'); ?>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
        <!-- Right Sidebar -->
        <?php require(APPPATH.'/views/fragments/siteconfig/navigation-right.fragment.php'); ?>
        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->
        
        <!-- bundle -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="<?= APPURL . "/assets/js/vendor.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/app.min.js"?>"></script>

        <!-- demo js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>  
        <script src="<?= APPURL . "/assets/js/custom/custom-funil.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/custom/drag.js"?>"></script>
          
        <script src="<?= APPURL . "/assets/js/custom/custom-js.js"?>"></script>  
<!--         <script src="<?= APPURL . "/assets/js/js-mult/main.js"?>"></script> -->
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="<?= APPURL . "/assets/js/js-mult/select2.min.js"?>"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="<?= APPURL . "/assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"?>"></script>
        <!-- end demo js-->
          

   
      </body>

</html>