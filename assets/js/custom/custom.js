$(function(){


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

	$(".configTema").on("change", function(){

		var valoresCampos = [];

		setTimeout(function(){
			$(".configTema").each(function() {
				var coluna = $(this).data("target");
				var valor = $(this).val();

				if ($(this).is(':checked')){

					var c = {};
					c.valor = valor;
					c.coluna = coluna;

					valoresCampos.push(c);
				}
			});

			$.ajax({
				url: window.origin + "/config/tema",
				type: "POST",
				dataType: "jsonp",
				data: {
					action: "salvarConfigTema",
					valores: valoresCampos,
				},
				error: function(resp) {
					console.log(resp);
				},
				success: function(resp) {
					console.log(resp);
				}
			});
		}, 300);

	});

});