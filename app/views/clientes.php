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
					<?php require(APPPATH.'/views/fragments/cliente.fragment.php'); ?>
					
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
      <script src="<?= APPURL . "/assets/js/usuario.js"?>"></script>
			<script src="<?= APPURL . "/assets/js/core.js"?>"></script>
			<script src="<?= APPURL . "/assets/js/custom/chosen.js"?>"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
      <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.jsdelivr.net/gh/brunoalbim/devtools-detect/index.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
        <!-- third party js ends -->
      
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
       <script>

	function removerCliente(id){

				 var url = document.baseURI;	
			$.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "remover",
							id: id,
          
          },
          error: function(resp) {
            console.log(resp);
            sweet('center','error',resp.msg,true,10000);
          },
          success: function(resp) {	
						sweet('top-end','success',resp.msg,false,2500);
						setTimeout(function(){
						var url_atual = window.location.origin;
						window.location.replace(url_atual + "/clientes");
					},2500);
						
          }			
      });
}			 
         
         
	 $(".cepField").on("blur", function cep() { 
	
	var cep = $(this).val();
	var url = document.baseURI;	
  
		 $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "searchCep",
							cep: cep,
          },
          error: function(resp) {
              console.log(resp);
          },
          success: function(resp) {
						console.log(resp.bairro);
						$(".estadoField").val("");
						$(".logradouroField").val("");
						$(".bairroField").val("");
						$(".localidadeField").val("");
            $(".estadoField").val(resp.uf).change();
						$(".logradouroField").val(resp.logradouro);
						$(".bairroField").val(resp.bairro);
						$(".localidadeField").val(resp.localidade); 
          }
      })
	});
				 
	 $(".abrirModal").on("click", function(){
	
	var idInformacao = $(this).data("value");
		console.log(idInformacao);
	$.ajax({
		url: document.baseURI,
			type: "POST",
			dataType: 'jsonp',
			data: {
				action: "abrirModal",
				id: idInformacao
			},
			error: function(resp) {
				console.log("Erro Ajax");
				console.log(resp);
			},
			success: function(resp) {
								console.log(resp.telefone);
				var nome = resp.nome;
				var tipo_cliente = resp.tipo_cliente;
				var cnpj = resp.cnpj;
				var telefone = resp.telefone;
				var email = resp.email;
				var cep = resp.cep;
				var endereco = resp.endereco;
				var bairro = resp.bairro;
				var cidade = resp.cidade;
				var uf = resp.uf;
				
			  if(cnpj != null){
				var cnpjFormatado =   (cnpj);
				 } else {
					 cnpjFormatado = "";
				 }
				
				  if(telefone != null){
				var telFormatado = formatTel(telefone);
				 } else {
					 telFormatado = "";
				 }
				
				  if(cep != null){
				var cepFormatado = formatCep(cep);
				 } else {
					 cepFormatado = "";
				 }

			
				console.log(uf);
				$("#idConta").val(idInformacao);			
        $("#status").val(resp.status);			
				$("#nomeCompleto").val(nome);
				$("#tipo_cliente").val(tipo_cliente);
				$("#cnpj").val(cnpjFormatado);
				$("#telefoneConta").val(telFormatado);
				$("#emailConta").val(email);
				$("#cep").val(cepFormatado);
				$("#endereco").val(endereco);				
				$("#bairro").val(bairro);	
				$("#cidade").val(cidade);	
				$("#estadoField").val(uf);	
				$(".select2").select2({
            dropdownParent: $(".userGeral")
         });
			}
	});
});
				 
				 

				 
	 
 $(".salvarCliente").on("click", function(e){
		e.preventDefault();
	var idInformacao = $("#idConta").val();
  var status =	$("#status").val();	
	var nome = $("#nomeCompleto").val();
	var tipo = $("#tipo_cliente").val();
	var email = $("#emailConta").val();
	var endereco =	$("#endereco").val();				
	var bairro =	$("#bairro").val();	
	var cidade =	$("#cidade").val();	
	var uf =	$("#estadoField").val();	
			 
	var cep =	$("#cep").val();
	var cepS = cep.replace(/\D/g, '');
	var telefone =	$("#telefoneConta").val();
	var telefoneS = telefone.replace(/\D/g, '');		 
	var cnpj =	$("#cnpj").val();
	var cnpjS = cnpj.replace(/\D/g, '');		
			 
		console.log(cnpjS);	 
			 
		console.log(idInformacao);
	$.ajax({
		url: document.baseURI,
			type: "POST",
			dataType: 'jsonp',
			data: {
				action: "save",
				id: idInformacao,
        status:status,
				nome: nome,
				tipo: tipo,
				email: email,
				endereco: endereco,
				bairro: bairro,
				cidade: cidade,
				uf: uf,
				cepS: cepS,
				telefoneS: telefoneS,
				cnpjS: cnpjS,
			},
			error: function(resp) {
				console.log("Erro Ajax");
				console.log(resp);
			},
			success: function(resp) {
		   console.log(resp);
			 $(".select2").select2({});
				
			if(resp.novo == 1){
				$.alert({
    title: 'Cliente!',
    content: 'Editado com sucesso!',
});
			}	else if(resp.novo == 2){
	$.alert({
    title: 'Cliente!',
    content: 'Inserido com sucesso!',
});	
								}

			}
	});
});			 
				 
             
				 
				 
				 
         $(document).ready( function () {
					 $("#datepicker").datepicker();
					 
    $('#clientes').DataTable({
       responsive: true,
        order: [0, 'ASC'],
        lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"] ],   
				pageLength: 10,
				language: {
 					url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json'
				},
    });
} );
      </script>
        
      </body>
</html>