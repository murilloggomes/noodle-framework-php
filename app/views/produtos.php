<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <title>Produtos | Teste PHP</title>
        <meta name="viewport" content="width=device-width, user-scalable=no">
				<meta http-equip="X-UA-Compatible" content="ie=edge">
        <meta content="Teste ARQMED em MVC PHP 8.2" name="description" />
        <meta content="Murillo Gomes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= APPURL . "/assets/images/favicon.ico"?>">

        <!-- third party css -->
        <link href="<?= APPURL . "/assets/css/vendor/dataTables.bootstrap5.css"?>" rel="stylesheet" type="text/css" />
        <link href="<?= APPURL . "/assets/css/vendor/responsive.bootstrap5.css"?>" rel="stylesheet" type="text/css" />
        <link href="<?= APPURL . "/assets/css/vendor/buttons.bootstrap5.css"?>" rel="stylesheet" type="text/css" />
        <link href="<?= APPURL . "/assets/css/vendor/select.bootstrap5.css"?>" rel="stylesheet" type="text/css" />
        <link href="<?= APPURL . "/assets/css/vendor/fixedHeader.bootstrap5.css"?>" rel="stylesheet" type="text/css" />
        <link href="<?= APPURL . "/assets/css/vendor/fixedColumns.bootstrap5.css"?>" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="<?= APPURL . "/assets/css/icons.min.css"?>" rel="stylesheet" type="text/css" />
        <link href="<?= APPURL . "/assets/css/app.min.css"?>" rel="stylesheet" type="text/css" id="app-style"/>

    </head>

    <body class="loading" data-layout-color="light" data-leftbar-theme="default" data-layout-mode="largura_tema" data-rightbar-onstart="true">
			
        <!-- Begin page -->
        <div class="wrapper">
					
       			<!-- ========== Left navigation Start ======== -->
						<?php require(APPPATH.'/views/fragments/siteconfig/navigation.fragment.php'); ?>
						<!-- ========== Left navigation END ========== -->
					
						<!-- ========== Left navigation Start ======== -->
						<?php require(APPPATH.'/views/fragments/siteconfig/topbar.fragment.php'); ?>
						<!-- ========== Left navigation END ========== -->
					
           
            <!-- ================ Start Page Content here ================ -->    
					
            <div class="content-page">     
							
						 <?php require(APPPATH.'/views/fragments/produtos.fragment.php'); ?>
             <?php require(APPPATH.'/views/fragments/modals/modal-produtos.fragment.php'); ?>
             <?php require(APPPATH.'/views/fragments/siteconfig/footer.fragment.php'); ?>

            </div>
            
            <!-- =================== End Page content ==================== -->
					
        </div>
        <!-- END page -->

        <!-- bundle -->
        <script src="<?= APPURL . "/assets/js/vendor.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/app.min.js"?>"></script>

        <!-- third party js -->
        <script src="<?= APPURL . "/assets/js/vendor/jquery.dataTables.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/dataTables.bootstrap5.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/dataTables.responsive.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/responsive.bootstrap5.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/dataTables.buttons.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/buttons.bootstrap5.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/buttons.html5.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/buttons.flash.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/buttons.print.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/dataTables.keyTable.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/dataTables.select.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/fixedColumns.bootstrap5.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/fixedHeader.bootstrap5.min.js"?>"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="<?= APPURL . "/assets/js/pages/demo.datatable-init.js"?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- end demo js-->
				<script src="<?= APPURL . "/assets/js/custom/custom.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/custom/modal-produtos.js"?>"></script>
    </body>
</html>
