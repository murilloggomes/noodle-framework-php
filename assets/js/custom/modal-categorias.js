$(function(){
	
	
$("body").on('click','.botaoModalCategorias',function(){
			
			var id = $(this).data("value");

			$.ajax({
				url: document.baseURI,
				type: "POST",
				dataType: "jsonp",
				data: {
					action: "modalCategorias",      
					id: id,	
				},
				error: function(resp) {   
					console.log(resp);
				},
				success: function(resp) {		
					console.log(resp);
					$("#idCategoria").val(resp.id);
					$("#nomeCategoria").val(resp.nome);						
				}
			});
	});
	
});