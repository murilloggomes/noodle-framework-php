
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
      
        <link href="<?= APPURL. "/assets/css/vendor/quill.core.css" ?>" rel="stylesheet" type="text/css" />
        <link href="<?= APPURL . "/assets/css/vendor/quill.snow.css" ?>" rel="stylesheet" type="text/css" />
      
        <link rel="stylesheet" href="<?= APPURL . "/assets/css/scrollbar.min.css"?>">
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
			 
	
			 <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
						 <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">
			
        <link href="<?= APPURL . "/assets/css/custom.task.css"?>" rel="stylesheet" type="text/css"/> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" integrity="sha512-WEQNv9d3+sqyHjrqUZobDhFARZDko2wpWdfcpv44lsypsSuMO0kHGd3MQ8rrsBn/Qa39VojphdU6CMkpJUmDVw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
			
			<style>
			.image-source-link {
	color: #98C3D1;
}

.mfp-with-zoom .mfp-container,
.mfp-with-zoom.mfp-bg {
	opacity: 0;
	-webkit-backface-visibility: hidden;
	/* ideally, transition speed should match zoom duration */
	-webkit-transition: all 0.3s ease-out; 
	-moz-transition: all 0.3s ease-out; 
	-o-transition: all 0.3s ease-out; 
	transition: all 0.3s ease-out;
}

.mfp-with-zoom.mfp-ready .mfp-container {
		opacity: 1;
}
.mfp-with-zoom.mfp-ready.mfp-bg {
		opacity: 0.8;
}

.mfp-with-zoom.mfp-removing .mfp-container, 
.mfp-with-zoom.mfp-removing.mfp-bg {
	opacity: 0;
}
			</style>
			
      </head>

        <body class="loading" data-layout-color="<?= custom($AuthUser->get("id"), "modo_tema") == "" ? "light" : custom($AuthUser->get("id"), "modo_tema") ?>" data-leftbar-theme="<?= custom($AuthUser->get("id"), "cor_menu") == "" ? "default" : custom($AuthUser->get("id"), "cor_menu") ?>" data-layout-mode="<?= custom($AuthUser->get("id"), "largura_tema") == "" ? "fixed" : custom($AuthUser->get("id"), "largura_tema") ?>" data-rightbar-onstart="true">
      
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->            
            <?php require(APPPATH.'/views/fragments/siteconfig/topbar.fragment.php'); ?> 
        
           <?php require(APPPATH.'/views/fragments/siteconfig/navigation.fragment.php'); ?>
           <?php require(APPPATH.'/views/fragments/siteconfig/modal.fragment.php'); ?>
         
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->            
            <?php require(APPPATH.'/views/fragments/oportunidade.fragment.php'); ?>
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


        <script src="<?= APPURL . "/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"?>"></script>
        <script src="<?= APPURL . "/assets/js/vendor/jquery-jvectormap-world-mill-en.js"?>"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- third party js ends -->
        <!-- dragula js-->

        <!-- demo js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>  
        <script src="<?= APPURL. "/assets/js/vendor/quill.min.js" ?>" ></script>
        <script  src="<?= APPURL.  "/assets/js/pages/demo.quilljs.js"?>"> </script>
        <script src="<?= APPURL . "/assets/js/custom/custom-funil.js"?>"></script>
          

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
        <script src="<?= APPURL . "/assets/js/custom/custom-js.js"?>"></script>  
<!--         <script src="<?= APPURL . "/assets/js/js-mult/main.js"?>"></script> -->
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="<?= APPURL . "/assets/js/js-mult/select2.min.js"?>"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
					<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>
										<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
										<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
						
					
        <!-- end demo js-->
          
<script>
  
  
  $(function() {
		$( "#divAtividade" ).toggle();
    exibiEditorNota();
});
  
  function editorNotas(){
	  var valorDaDiv = $(".ql-editor").html();



						
						           $.ajax({
          url: document.baseURI,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "salvarNota",
						  texto:valorDaDiv,
         
			
          },
          error: function(resp) {
             console.log(resp);  
						console.log("deu erro");  
          },
          success: function(resp) {
console.log(resp);
            $(".ql-editor").empty();
          if(resp.result == 1){
            var divNota = "";
                divNota += '<div style="background:#eef2f7 ; border-color:#1d232b26!important" class="card border-primary border">';
                divNota += '<div  class="card-body">';
                divNota += resp.texto;
                divNota += "</div>";
                divNota += '<div class="col-12 sm-12 md-12 lg-12">';
                
                if(resp.dias == 0){
                   divNota += '<span class="d-none d-sm-inline">Hoje</span></br>'; 
                } else {
                  divNota += '<span class="d-none d-sm-inline">'+ resp.dias +' dias atrás.</span></br>'; 
                }
                divNota += '<b>'+ resp.data +'</b>';
                divNota += '<b style="float: right;" >'+ resp.criador +'</b>';
                divNota += "</div>";
                divNota += "</div>";
            $("#notaPrint").prepend(divNota );
            
            
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Nota inserida com sucesso!',
                showConfirmButton: false,
                timer: 2000
              })
            
            
          }  
            
						
      
          }
      });
						


          }
      
    
    
 

  function exibiEditorNota(){
  $( ".ql-toolbar" ).toggle();
  $( "#snow-editor" ).toggle();
  $( "#botaoEditor" ).toggle();
}   
  
  
  
  
  
       $('.dropify').dropify({
    messages: {
        'default': 'Arraste e solte um arquivo aqui ou clique',
        'replace': 'Arraste e solte ou clique para substituir',
        'remove':  'Remover',
        'error':   'Ops, aconteceu algo errado.'
    }
}); 
	
	function tabelaArquivos(){

						$('#tabelaArquivos').DataTable({
							 responsive: true,
							retrieve: true,
              paging: false,
						  order: [0, 'DESC'],
							lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"] ],   
							pageLength: 10,
							language: {
								url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json'
								},
						});
		
	}				
	
	
	
	
	function tabelaAtividade(){
		
		
						$('#tabelaAtividade').DataTable({
							 responsive: true,
							retrieve: true,
    paging: false,
								order: [0, 'DESC'],
								lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"] ],   
								pageLength: 10,
								language: {
									url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json'
								},
						});
		
	}
	
		function toogleAtividade(){
		
		console.log("asdasd");
			 $( "#divAtividade" ).toggle();
		
		
	}
	
	
	
		function modalAtividade(id){
			
			 $( "#divAtividade" ).toggle();
								           $.ajax({
          url: document.baseURI,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "modalAtividade",
						  id:id,
         
			
          },
          error: function(resp) {
             console.log(resp);  
						console.log("deu erro");  
          },
          success: function(resp) {
console.log(resp);
        
            $("#usuario").val(resp.responsavel);
						$("#titulo").val(resp.titulo);
						$("#descricao").val(resp.descricao);
						$("#inicio").val(resp.data_inicio);
						$("#fim").val(resp.data_conclusao);
						$("#duracao").val(resp.duracao);
						$("#statusATIVIDADE").val(resp.status);
						$("#idAtividade").val(resp.id);
						
						
             $(".select2").select2({});
						
      
          }
      });
		
			
			
		
	}
  
 			function removerArquivo(id){
		
				
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Deseja realmente excluir?',
  text: "Posteriormente não sera possivel recuperar os dados!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Deletar!',
  cancelButtonText: 'Cancelar!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire(
			
		  $.ajax({
          url: document.baseURI,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "removerArquivo",
						  id:id,
         
          },
          error: function(resp) {
             console.log(resp);  
						console.log("deu erro");  
          },
          success: function(resp) {
console.log(resp);
        
     					Swal.fire({
  title: '<strong>Arquivo ' + resp.titulo + ' excluido com sucesso!</strong>',
  icon: 'success',
  html:
    'Para visualizar a tabela atualizada ' +
    '<a href="'+ window.location +'">Clique aqui</a> ' +
    '.',
  showCloseButton: true,
  showCancelButton: false,
  focusConfirm: false,
  confirmButtonText:
    'OK!',
  
 
})
      
          }
      }),1
			
      
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelado',
      'Nenhum dado deletado!',
      'error'
    )
  }
})
				

	} 
  
  
  
  
	
			function removerAtividade(id){
		
				
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Deseja realmente excluir?',
  text: "Posteriormente não sera possivel recuperar os dados!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Deletar!',
  cancelButtonText: 'Cancelar!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire(
			
		  $.ajax({
          url: document.baseURI,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "removerAtividade",
						  id:id,
         
          },
          error: function(resp) {
             console.log(resp);  
						console.log("deu erro");  
          },
          success: function(resp) {
console.log(resp);
        
     					Swal.fire({
  title: '<strong>Atividade ' + resp.titulo + ' excluida com sucesso!</strong>',
  icon: 'success',
  html:
    'Para visualizar a tabela atualizada ' +
    '<a href="'+ window.location +'">Clique aqui</a> ' +
    '.',
  showCloseButton: true,
  showCancelButton: false,
  focusConfirm: false,
  confirmButtonText:
    'OK!',
  
 
})
      
          }
      }),1
			
      
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelado',
      'Nenhum dado deletado!',
      'error'
    )
  }
})
				

	}
	
	
	
	
			function salvarAtividade(){
				 var selectUsuario = document.getElementById("usuario");
         var responsavel = selectUsuario.options[selectUsuario.selectedIndex].value;
				
				 var selectStatus = document.getElementById("statusATIVIDADE");
         var status = selectStatus.options[selectStatus.selectedIndex].value;
				
					var titulo =	$("#titulo").val();
					var descricao = $("#descricao").val();
					var id =	$("#idAtividade").val();
				
				if(status == "" || responsavel == "" || titulo == "" || descricao == ""){
					
Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Verifique se todos os campos foram preenchidos!',
  footer: 'Horus S/A'
})
					 
						return false;
					 }

	   $.ajax({
          url: document.baseURI,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "salvarAtividade",
						  id:id,
							titulo:titulo,
							descricao:descricao,
							status:status,
							responsavel:responsavel,
						
         
			
          },
          error: function(resp) {
             console.log(resp);  
						console.log("deu erro");  
          },
          success: function(resp) {
console.log(resp);
					//	$( "#divAtividade" ).toggle();
						$("#usuario").val(resp.responsavel);
						$("#titulo").val(resp.titulo);
						$("#descricao").val(resp.descricao);
						$("#inicio").val(resp.data_inicio);
						$("#fim").val(resp.data_conclusao);
						$("#duracao").val(resp.duracao);
						$("#statusATIVIDADE").val(resp.status);
						$("#idAtividade").val(resp.id);
        
						
					Swal.fire({
  title: '<strong>Atividade ' + resp.titulo + ' salva com sucesso!</strong>',
  icon: 'success',
  html:
    'Para visualizar a tabela atualizada ' +
    '<a href="'+ window.location +'">Clique aqui</a> ' +
    '.',
  showCloseButton: true,
  showCancelButton: false,
  focusConfirm: false,
  confirmButtonText:
    'OK!',
  
 
})	
						

          }
      });
		
			
			
		
	}
	

	
	
          </script>
   
      </body>

</html>