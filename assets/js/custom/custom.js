$(function(){
	
	var tableProdutos = $('#tabelaPrincipalProdutos').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: document.baseURI,	
			type: 'POST',	
			data: {
				action: 'dadosTabelaProdutos',
			},
			deferRender: true,
		},	
	});

	var tableCategorias = $('#tabelaPrincipalCategorias').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: document.baseURI,	
			type: 'POST',	
			data: {
				action: 'dadosTabelaCategoria',
			},
			deferRender: true,
		},	
	});

	$("body").on("click",".deletar", function(){
		var tabela = $(this).data("id");
		var dado = $(this).data("value");
		$.ajax({
			url: document.baseURI,
			type: "POST",
			dataType: "jsonp",
			data: {
				action: "deletar",
				tabela: tabela,      
				dado: dado,	
			}, beforeSend: function() {	
				if (confirm("Deseja realmente excluir?") == false) {
				return false;
				}
			},
			error: function(resp) {   
				console.log(resp);
			},
			success: function(resp) {			
				console.log(resp);
				location.reload();
			}
		});

	});

});