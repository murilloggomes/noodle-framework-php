<html class="loading" lang="pt-BR" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
        <meta charset="utf-8" />
        <title><?= site_settings("site_name") ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">       
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= APPURL . "/assets/images/logo/peep-icon.png"?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="<?= APPURL . "/assets/css/vendor/jquery-jvectormap-1.2.2.css"?>" rel="stylesheet" type="text/css" />
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="<?= APPURL . "/assets/css/icons.min.css"?>" rel="stylesheet" type="text/css" />
        <link href="<?= APPURL . "/assets/css/app.min.css"?>" rel="stylesheet" type="text/css" id="app-style"/>
			  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
     
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">				
        <link rel="stylesheet" href="<?= APPURL . "/assets/css/scrollbar.min.css"?>">        
  
<style>

			.chosen-container{
	width:100% !important;
	} 
	
/* 	  * {
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
  }
 */
			</style>			
</head>
<!-- END: Head-->
	

 <body   class="loading" data-layout-color="<?= custom($AuthUser->get("id"), "modo_tema") == "" ? "light" : custom($AuthUser->get("id"), "modo_tema") ?>" data-leftbar-theme="<?= custom($AuthUser->get("id"), "cor_menu") == "" ? "default" : custom($AuthUser->get("id"), "cor_menu") ?>" data-layout-mode="<?= custom($AuthUser->get("id"), "largura_tema") == "" ? "fixed" : custom($AuthUser->get("id"), "largura_tema") ?>" data-rightbar-onstart="true">

 <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->            
            <?php require(APPPATH.'/views/fragments/siteconfig/navigation.fragment.php'); ?>
            <?php require(APPPATH.'/views/fragments/siteconfig/topbar.fragment.php'); ?>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== --> 
					  <?php require(APPPATH.'/views/fragments/siteconfig/modal.fragment.php'); ?>
            <?php require(APPPATH.'/views/fragments/clientes.fragment.php'); ?>
					
            <?php require(APPPATH.'/views/fragments/siteconfig/footer.fragment.php'); ?>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

  <!-- END: Footer-->
  <!-- BEGIN VENDOR JS-->  
  <script src="../../../app-assets/js/vendors.min.js"></script>
  <script src="../../../app-assets/js/plugins.js"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="../../../app-assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
  <script src="../../../app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../../app-assets/vendors/select2/select2.full.min.js"></script>
  <script src="../../../app-assets/vendors/jquery-validation/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="../../../app-assets/js/scripts/form-select2.min.js"></script>
  <script src="../../../app-assets/js/scripts/media-gallery-page.min.js"></script>
  <script src="../../../app-assets/js/scripts/media-gallery-page.js"></script>
  <script src="../../../app-assets/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN THEME  JS-->
  <script src="../../../app-assets/js/search.min.js"></script>
  <!-- END THEME  JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->
</body>


</html>