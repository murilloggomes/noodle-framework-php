$(".btn-perfil").on("click", function(e){
	e.preventDefault();
	
var url =  document.baseURI;	
var nome = $(".nome-usuario").val();
var cpf = $(".cpf-usuario").val();
var telefone = $(".telefone-usuario").val();	
var celular = $(".celular-usuario").val();
var biografia = $(".biografia-usuario").val();
var email = $(".email-usuario").val();
var empresa = $(".empresa-usuario").val();
var cargo = $(".cargo-usuario").val();
var equipe = $(".equipe-usuario").val();
var facebook = $(".facebook-usuario").val();
var instagram = $(".instagram-usuario").val();
var linkedin = $(".linkedin-usuario").val();
	
		$.ajax({
			url: url,
			type: "POST",
			dataType: "jsonp",
			data: {
					action: "salvarPerfil",
					nome: nome,
					cpf: cpf,
					telefone: telefone,
					celular: celular,
					biografia: biografia,
					email: email,
				  empresa: empresa,
				  cargo: cargo,
				  equipe: equipe,
				  facebook: facebook,
				  instagram: instagram,
				  linkedin: linkedin,
			},  
			   error: function(resp) {
					  console.log(resp);
						console.log("deu erro");  
          },
			
				 success: function(resp) {
					 console.log(resp);
					 console.log("deu certo")
								Swal.fire({
									position: 'center',
									icon: 'success',
									title: 'Dados salvos com sucesso!',
									showConfirmButton: false,
									timer: 2500
								})
						}
		});							
							 								
});