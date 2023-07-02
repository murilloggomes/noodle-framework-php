$(function(){
	
	
$("body").on('click','.botaoModalProdutos',function(){
			$(".js-example-basic-multiple").select2();
			var id = $(this).data("value");

			$.ajax({
				url: document.baseURI,
				type: "POST",
				dataType: "jsonp",
				data: {
					action: "modalProdutos",      
					id: id,	
				},
				error: function(resp) {   
					console.log(resp);
				},
				success: function(resp) {		
					console.log(resp);
					$("#idProduto").val(resp.id);
					$("#nomeProduto").val(resp.nome);		
					$("#skuProduto").val(resp.sku);
					$("#qntProduto").val(resp.qnt);	
					$("#precoProduto").val(resp.preco);	
		
					resp.categoria.forEach(option => {
						$("#categoriasProduto").select2("trigger", "select", {data: { id: option.id, text: option.text }});
					  })
					
				
				}
			});
	});
	
});