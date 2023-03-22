        

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
 <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script>
         $(function() {		
	
	var table;
	
	$(document).ready(function(){		
		
		table =	dadosTabelaUsuario();
		$.fn.dataTable.ext.errMode = 'none';
	});
	
	$('#logs').on('keyup', function () {
    $('#logs').search(this.value).draw();
	});	

});


function dadosTabelaUsuario(paramentro1 = null,paramentro2 = null,paramentro3 = null){	
console.log(paramentro1);
	console.log(paramentro2);
	console.log(paramentro3);
		$('#logs').DataTable( {	
			  destroy:true,
			  responsive: true,
			 	processing: true,
        serverSide: true,	
			  stateSave: true, 
				stateDuration: 20,
				paging: true,				
				pagingType: 'full_numbers',
				searching: true,
	   		bSort: true,
			  order: [6, 'DESC'],
        lengthMenu: [ [15, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"] ],   
				pageLength: 15,
				ordering: true,
				language: {
 					url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json'
				},
			dom: 'Blfrtip',
// 						 buttons: [
// 							 'print',
//             {
//                 extend:    'copyHtml5',
//                 text:      '<i class="fa fa-files-o"></i>',
//                 titleAttr: 'Copy'
//             },
//             {
//                 extend:    'excelHtml5',
//                 text:      '<i class="fa fa-file-excel-o"></i>',
//                 titleAttr: 'Excel'
//             },
//             {
//                 extend:    'csvHtml5',
//                 text:      '<i class="fa fa-file-text-o"></i>',
//                 titleAttr: 'CSV'
//             },
//             {
//                 extend:    'pdfHtml5',
//                 text:      '<i class="fa fa-file-pdf-o"></i>',
//                 titleAttr: 'PDF'
//             }
//         ],
				ajax: {
					url: document.baseURI,	
					type: 'POST',	
					data: {
						action: 'otimizar',
						cache: false,
        contentType: false,
						paramentro1:paramentro1,
						paramentro2:paramentro2,
						paramentro3:paramentro3
					}
				},			
				deferRender: true,
		});		
}
         
// 				setTimeout(function() {
// 			 $(".chosen-select").chosen(); 
// 			}, 2500)
				 
				 
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
				 
// 				 if (window.devtools.isOpen === true) {
//       window.location = document.baseURI +"/login";
//     }
//   	window.addEventListener('devtoolschange', event => {
//       if (event.detail.isOpen === true) {
//         window.location = document.baseURI +"/login";
//       }
//   	});
				 
				 
// 				   window.onload = function () {
//                   $(".select2").select2({
//                     dropdownParent: $(".userGeral")
//                   });
   
//     }
				 
                 
             
         
//          $(document).ready( function () {
// 					 console.log("dfoi");
// 					 $("#datepicker").datepicker();

// } );
      </script>
<style>
	
	@media(max-width:600px) {
  
.wrapper {
	height: 100%;
  width: 150%;
  overflow: auto;
}
}
.wrapper {
  overflow: auto;
}
	
	
	   {
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
            <!-- ========== Left Sidebar Start ========== -->            
        <div class="wrapper" >
            <?php require(APPPATH.'/views/fragments/siteconfig/navigation.fragment.php'); ?>
            <?php require(APPPATH.'/views/fragments/siteconfig/topbar.fragment.php'); ?>
          <div class="content-page">
	<div class="content">
		<div class="container-fluid">
					
					
					  <?php //require(APPPATH.'/views/fragments/siteconfig/modal.fragment.php'); ?>
					
            <?php require(APPPATH.'/views/fragments/logs.fragment.php'); ?>
			

           </div>
 </div>
</div>

            <?php require(APPPATH.'/views/fragments/siteconfig/footer.fragment.php'); ?>
        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <?php require(APPPATH.'/views/fragments/siteconfig/navigation-right.fragment.php'); ?>
        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
       
		   	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="<?= APPURL . "/assets/js/vendor.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/app.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/custom/custom-js.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/jquery-jvectormap-world-mill-en.js"?>"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script> 

				<script src="<?= APPURL . "/assets/js/custom/custom-script.js"?>"></script> 
				<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
				<script src="https://cdn.jsdelivr.net/gh/brunoalbim/devtools-detect/index.js"></script>
				<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
   
        <!-- third party js ends -->
      
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
     
        
      </body>
</html>