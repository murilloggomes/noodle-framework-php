<!DOCTYPE html>
    <html lang="pt-BR">

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
        <link href="<?= APPURL . "/assets/css/dashboard.css"?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?= APPURL . "/assets/css/scrollbar.min.css"?>">  

		</head>
		<!-- END: Head-->
		<body  class="loading" data-layout-color="<?= custom($AuthUser->get("id"), "modo_tema") == "" ? "light" : custom($AuthUser->get("id"), "modo_tema") ?>" data-leftbar-theme="<?= custom($AuthUser->get("id"), "cor_menu") == "" ? "default" : custom($AuthUser->get("id"), "cor_menu") ?>" data-layout-mode="<?= custom($AuthUser->get("id"), "largura_tema") == "" ? "fixed" : custom($AuthUser->get("id"), "largura_tema") ?>" data-rightbar-onstart="true">
	
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->            
            <?php require(APPPATH.'/views/fragments/siteconfig/navigation.fragment.php'); ?>
            <?php require(APPPATH.'/views/fragments/siteconfig/topbar.fragment.php'); ?>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->            
            <?php require(APPPATH.'/views/fragments/relatorio-santri.fragment.php'); ?>
					  <?php require(APPPATH.'/views/fragments/siteconfig/modal.fragment.php'); ?>
            <?php require(APPPATH.'/views/fragments/siteconfig/footer.fragment.php'); ?>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <?php require(APPPATH.'/views/fragments/siteconfig/navigation-right.fragment.php'); ?>
        <div class="rightbar-overlay"></div>

        <!-- bundle -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
			<script src="<?= APPURL . "/assets/js/vendor.min.js"?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
			
        <script src="<?= APPURL . "/assets/js/vendor/chart.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/custom/custom-js.js"?>"></script>
			  <script src="<?= APPURL . "/assets/js/custom/relatorio.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/app.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/jquery-jvectormap-world-mill-en.js"?>"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
			<script src="//cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
			
			<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
			<script>

				
					$(document).ready( function () {
						$("#datepicker").datepicker();
						
						
					});

        </script>
  <!-- END PAGE LEVEL JS-->
</body>


</html>