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
     
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">				
        <link rel="stylesheet" href="<?= APPURL . "/assets/css/scrollbar.min.css"?>">        
  
<style>

			.chosen-container{
	width:100% !important;
	} 
	
	  * {
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
  }

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
            <?php require(APPPATH.'/views/fragments/solar.fragment.php'); ?>
					
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
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
        <script src="<?= APPURL . "/assets/js/vendor.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/app.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/custom/custom-js.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/jquery-jvectormap-world-mill-en.js"?>"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script> 
      <script src="<?= APPURL . "/assets/js/custom/relatorio-solar.js"?>"></script>
      <script src="<?= APPURL . "/assets/js/custom/custom-script.js"?>"></script> 
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
      <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.jsdelivr.net/gh/brunoalbim/devtools-detect/index.js"></script>
   
        <!-- third party js ends -->
      
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
       <script>
	
				 
				 
// 				 function mensagem(text) {
//       alert('Conteúdo protegido pela nossa politica de privacidade.');
//       return false;
//     }

//     function bloquearCopia(Event) {
//       var Event = Event ? Event : window.event;
//       var tecla = (Event.keyCode) ? Event.keyCode : Event.which;
//       if (sessionStorage.getItem("ultimaTecla") === "17" && tecla === 85) {
//         Event.preventDefault();
//         window.location = "https://"+ document.baseURI +"/login";
//       }
//       sessionStorage.setItem("ultimaTecla", tecla);
//     }

// $(document).keypress(bloquearCopia);
// $(document).keydown(bloquearCopia);
// $(document).contextmenu(mensagem);
				 
				 if (window.devtools.isOpen === true) {
      window.location = "https://"+ document.baseURI +"/login";
    }
  	window.addEventListener('devtoolschange', event => {
      if (event.detail.isOpen === true) {
        window.location = "https://"+ document.baseURI +"/login";
      }
  	});
				 
				 
				   window.onload = function () {
                  $(".select2").select2({
                    dropdownParent: $(".userGeral")
                  });
   
    }
				 
                 
             
         
         $(document).ready( function () {
					 $("#datepicker").datepicker();

} );
      </script>
        
      </body>
</html>