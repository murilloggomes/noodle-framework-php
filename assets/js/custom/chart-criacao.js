var NextPost = {};
$(function(){
    var retorno = 1;
});


function link(id){
	console.log("entrou");
window.location = "/dashboard/" + id;
}

function modal(retorno){
	if(retorno == 1){
		$('#myModal').attr('hidden', true);
	}else{
		$('#myModal').attr('hidden', false);
	}
}

function sucesso (titulo) {
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: titulo,
  showConfirmButton: false,
  timer: 3000
})
}

function erro (titulo) {
Swal.fire({
  position: 'center',
  icon: 'error',
  title: titulo,
  showConfirmButton: true,
})
}


    $('.chartDuplo').attr('hidden', true); 
    $('#cores').attr('hidden', true);
    $("#fecharData").hide();
    $('#datainicio').attr('hidden', true);
    $('.dataComeco').prop( "disabled", true );
    $('#datafim').attr('hidden', true);
    $('.dataFinal').prop( "disabled", true );
    $('.usuariosSelecionados').prop( "disabled", true );
    $('.omitir').prop( "disabled", true );
    $('#usuarioFiltro').attr('hidden', true);
    $('#tipoFiltro').prop( "disabled", true );
    $('#divTipo').attr('hidden', true);







function indicador(){
	
		  var SelectIndicador = document.getElementById("indicador");
      var Indicador = SelectIndicador.options[SelectIndicador.selectedIndex].value;
	
	if(Indicador == 1){
		$('#tipoFiltro').prop( "disabled", false );
    $('#divTipo').attr('hidden', false);
		$('.chartDuplo').attr('hidden', true); 
		
			var elX = $("#eixoX");
 			elX.empty(); 

		elX.append($("<option selected disabled></option>")
						 .attr("value", '').text("Selecione "));
		elX.append($("<option></option>")
						 .attr("value", 1).text("Responsável"));
		elX.append($("<option></option>")
						 .attr("value", 2).text("Filial Responsável"));
// 		elX.append($("<option></option>")
// 						 .attr("value", 3).text("Meses"));
		
		
		 	var $el = $("#eixoY");
 			$el.empty(); 

		$el.append($("<option selected disabled></option>")
						 .attr("value", '').text("Selecione "));
		$el.append($("<option></option>")
						 .attr("value", 1).text("Orçamentos Aprovado"));
		$el.append($("<option></option>")
						 .attr("value", 2).text("Orçamentos Aguardando"));
		$el.append($("<option></option>")
						 .attr("value", 3).text("Orçamentos Reprovado"));
		$el.append($("<option></option>")
						 .attr("value", 4).text("Orçamentos Vencido"));
		$el.append($("<option></option>")
						 .attr("value", 5).text("Todos Orçamentos"));
	
		
		 }else if(Indicador == 2){
	  $('#tipoFiltro').prop( "disabled", true );
    $('#divTipo').attr('hidden', true);
			$('.chartDuplo').attr('hidden', false); 
			 
			 
		var elX = $("#eixoX");
 			elX.empty(); 

		elX.append($("<option selected disabled></option>")
						 .attr("value", '').text("Selecione "));
		elX.append($("<option></option>")
						 .attr("value", 2).text("Filial Responsável"));
// 			 elX.append($("<option></option>")
// 						 .attr("value", 3).text("Meses"));
			 
		 	var $el = $("#eixoY");
 			$el.empty(); 


	  $el.append($("<option selected disabled></option>")
						 .attr("value", '').text("Selecione "));
		$el.append($("<option></option>")
						 .attr("value", 1).text("Aprovado "));
		$el.append($("<option></option>")
						 .attr("value", 2).text("Em análise "));
		$el.append($("<option></option>")
						 .attr("value", 3).text("Reprovado/Vencido "));
		$el.append($("<option></option>")
						 .attr("value", 5).text("Aguardando Ação "));
		$el.append($("<option></option>")
						 .attr("value", 6).text("Separado p/ Envio "));
		$el.append($("<option></option>")
						 .attr("value", 7).text("Entregue em Parte "));
		$el.append($("<option></option>")
						 .attr("value", 8).text("Despachado "));
		$el.append($("<option></option>")
						 .attr("value", 9).text("Despachado em Partes "));
		$el.append($("<option></option>")
						 .attr("value", 10).text("Em Serapação "));
		$el.append($("<option></option>")
						 .attr("value", 11).text("Entrega Realizada "));
		$el.append($("<option></option>")
						 .attr("value", 12).text("Todos"));

							}
	
}






 function addFiltro(){
$(".selectFiltro").toggle();
	return false;
 }



function fecharData(){
    $("#select-filtros").val("0");
  	$("#fecharData").hide();
	  $('#datainicio').attr('hidden', true);
    $('.dataComeco').prop( "disabled", true );
    $('#datafim').attr('hidden', true);
    $('.dataFinal').prop( "disabled", true );
    ajaxChart();
}

function fecharUser(){
    $("#select-filtros").val("0");
    $('.usuariosSelecionados').prop( "disabled", true );
    $('.omitir').prop( "disabled", true );
    $('#usuarioFiltro').attr('hidden', true);
	  ajaxChart();
}

$("#select-filtros").on("change", function(){	
	
	if ($(this).val() == "1"){
	 $(".selectFiltro").toggle();
		$("#fecharData").show();
 		$('#datainicio').attr('hidden', false);
 		$('.dataComeco').prop( "disabled", false );
    $('#datafim').attr('hidden', false);
     $('.dataFinal').prop( "disabled", false );

		$("#select-filtros").data("id", 0);
	}else if($(this).val() == "2"){
		$(".selectFiltro").toggle();
		//$(".select2").select2({});
    $('.usuariosSelecionados').prop( "disabled", false );
    $('.omitir').prop( "disabled", false );
    $('#usuarioFiltro').attr('hidden', false);
	 }
});

$("#eixoX").on("change", function(){	
 if ($(this).val() == "2"){
	console.log("entrou filtro");
	  var $el = $("#select-filtros");
 		$el.empty(); 
	  $el.append($("<option></option>")
						 .attr("value",'' ).text("Selecione"));
		$el.append($("<option></option>")
						 .attr("value", 1).text("Data"));
    $('.usuariosSelecionados').prop( "disabled", true );
	 
} else if($(this).val() == "1"){
	  var $el = $("#select-filtros");
 			$el.empty(); 
	  $el.append($("<option></option>")
						 .attr("value",'' ).text("Selecione"));
		  $el.append($("<option></option>")
						 .attr("value", 1).text("Data"));
		$el.append($("<option></option>")
						 .attr("value", 2).text("Exceções Usuários"));
    $('.usuariosSelecionados').prop( "disabled", false );
	
	}
});




			$('.tamanhoGrafico div').on("click", function(){
         retorno = $(this).attr('value');				
    	});
function ajaxChart() {

			var url = document.baseURI;
	
		  var selectY = document.getElementById("eixoY");
      var YpX = selectY.options[selectY.selectedIndex].value;
	
			var selectX = document.getElementById("eixoX");
      var XpY = selectX.options[selectX.selectedIndex].value;
	
    	var selectTipo = document.getElementById("tipoFiltro");
      var Tipo = selectTipo.options[selectTipo.selectedIndex].value;
	
	    var selectOmitir = document.getElementById("omitir");
      var Omitir = selectOmitir.options[selectOmitir.selectedIndex].value;
	
	    var SelectIndicador = document.getElementById("indicador");
      var Indicador = SelectIndicador.options[SelectIndicador.selectedIndex].value;
	
      var dataI = document.getElementById("dataComeco");
      if(!dataI.disabled){
	    var DataInicio = $("#dataComeco").val();
			}
	
	    var dataF = document.getElementById("dataFinal");
      if(!dataF.disabled){
    	var DataFim = $("#dataFinal").val();
			}
	
	    var UsuariosS = document.getElementById("usuariosSelecionado");
      if(!UsuariosS.disabled){
	    var Usuarios = $("#usuariosSelecionado").val();
			}


		if(YpX != "" && XpY != "" && Indicador != "" ){
	
		

			
	  $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "Chart",
              XpY: XpY,
				  		YpX:YpX,
						  Omitir:Omitir,
						  Indicador:Indicador,
						  DataInicio:DataInicio,
						  DataFim:DataFim,
						  Usuarios:Usuarios,
						  Tipo:Tipo,
						  retorno:retorno
          },
          error: function(resp) {
						console.log(resp);  
          },
          success: function(resp) {
         console.log(resp);
						if(resp.nulo === 1){
							Swal.fire({
								position: 'top-end',
								icon: 'error',
								title: 'Sem dados para os filtros selecionados',
								showConfirmButton: false,
								timer: 2500
							})
						}
						
// 				   var ARx = resp.EixoX;
// 						console.log(ARx);
//           var X = [] ;
// 					$.each(resp.EixoX, function(key,value) {
// 					X = X.concat(value.eixox);
//  					});
						
// 					var ARy = resp.EixoY;
//           var Y = [] ;
// 					$.each(resp.EixoY, function(key,value) {
// 					Y = Y.concat(value.eixoy);
//  					});
						
// 					var totalt = [] ;
// 					$.each(resp.Valor, function(key,value) {
//           totalt = totalt.concat(value.Total);
//  					});
						
// 						let total = 0;
// 						for (var i = 0; i < totalt.length; i++) {
// 							total += parseFloat(totalt[i])
// 						}
						
// 			     if(retorno == 1){
// 						CriacaoChartColuna(X,Y);
// 							}else if(retorno == 2 ) {
// 						CriacaoChartRosca(X,Y);				
// 							} else if(retorno == 3 ) {
// 						CriacaoChartLollipop(X,Y);	
// 							} else if(retorno == 4 ) {
// 						CriacaoChartPizza(X,Y);	
// 							} else if(retorno == 5 ) {
// 						CriacaoChartNumero(X,Y,total);	
// 							}
					}
	 });
	
	}
}


function ajaxChartEditar(retorno) {

			var url = document.baseURI;

	
		  var selectY = document.getElementById("eixoY");
      var YpX = selectY.options[selectY.selectedIndex].value;
	
			var selectX = document.getElementById("eixoX");
      var XpY = selectX.options[selectX.selectedIndex].value;
	
	    var selectOmitir = document.getElementById("omitir");
      var Omitir = selectOmitir.options[selectOmitir.selectedIndex].value;
	
	    var SelectIndicador = document.getElementById("indicador");
      var Indicador = SelectIndicador.options[SelectIndicador.selectedIndex].value;
	
      var dataI = document.getElementById("dataComeco");
      if(!dataI.disabled){
	    var DataInicio = $("#dataComeco").val();
			}
	
	    var dataF = document.getElementById("dataFinal");
      if(!dataF.disabled){
    	var DataFim = $("#dataFinal").val();
			}
	
	    var UsuariosS = document.getElementById("usuariosSelecionado");
      if(!UsuariosS.disabled){
	    var Usuarios = $("#usuariosSelecionado").val();
			}


		if(YpX != "" && XpY != "" && Indicador != "" ){
	
		

			
	  $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "Chart",
              XpY: XpY,
				  		YpX:YpX,
						  Omitir:Omitir,
						  Indicador:Indicador,
						  DataInicio:DataInicio,
						  DataFim:DataFim,
						  Usuarios:Usuarios,
						  retorno:retorno
          },
          error: function(resp) {
						console.log("deu erro");  
          },
          success: function(resp) {
         console.log(resp);
						if(resp.nulo === 1){
							Swal.fire({
								position: 'top-end',
								icon: 'error',
								title: 'Sem dados para os filtros selecionados',
								showConfirmButton: false,
								timer: 2500
							})
						}
						
// 				   var ARx = resp.EixoX;
// 						console.log(ARx);
//           var X = [] ;
// 					$.each(resp.EixoX, function(key,value) {
// 					X = X.concat(value.eixox);
//  					});
						
// 					var ARy = resp.EixoY;
//           var Y = [] ;
// 					$.each(resp.EixoY, function(key,value) {
// 					Y = Y.concat(value.eixoy);
//  					});
						
// 					var totalt = [] ;
// 					$.each(resp.Valor, function(key,value) {
//           totalt = totalt.concat(value.Total);
//  					});
						
// 						let total = 0;
// 						for (var i = 0; i < totalt.length; i++) {
// 							total += parseFloat(totalt[i])
// 						}
						
// 			     if(retorno == 1){
// 						CriacaoChartColuna(X,Y);
// 							}else if(retorno == 2 ) {
// 						CriacaoChartRosca(X,Y);				
// 							} else if(retorno == 3 ) {
// 						CriacaoChartLollipop(X,Y);	
// 							} else if(retorno == 4 ) {
// 						CriacaoChartPizza(X,Y);	
// 							} else if(retorno == 5 ) {
// 						CriacaoChartNumero(X,Y,total);	
// 							}
					}
	 });
	
	}
}




//Função salva Chart (Grafico)!
$("#saveCharts").on("click", function(e){ 
  e.preventDefault();
console.log("entrou");
		var url = document.baseURI;
	  var tipoGrafico = $("#tipo_grafico").val();
	  var nomeChart = $("#nomeChart").val();
	  var id = $("#grafico").val();
	  var cor = $("#cores").val();				
	 	
		var selectY = document.getElementById("eixoY");
		var YpX = selectY.options[selectY.selectedIndex].value;

		var selectX = document.getElementById("eixoX");
		var XpY = selectX.options[selectX.selectedIndex].value;
	
		var selectTipo = document.getElementById("tipoFiltro");
    var Tipo = selectTipo.options[selectTipo.selectedIndex].value;

		var selectOmitir = document.getElementById("omitir");
		var Omitir = selectOmitir.options[selectOmitir.selectedIndex].value;

		var SelectIndicador = document.getElementById("indicador");
		var Indicador = SelectIndicador.options[SelectIndicador.selectedIndex].value;

		var dataI = document.getElementById("dataComeco");
		if(!dataI.disabled){
		var DataInicio = $("#dataComeco").val();
		}

		var dataF = document.getElementById("dataFinal");
		if(!dataF.disabled){
		var DataFim = $("#dataFinal").val();
		}

		var UsuariosS = document.getElementById("usuariosSelecionado");
		if(!UsuariosS.disabled){
		var Usuarios = $("#usuariosSelecionado").val();
		}
	

	var msg = "Campos ";
	if(XpY === ""){
	   msg += " Eixo X "
		 }
		if(YpX === ""){
		 msg += " Eixo Y "
		 }
		if(Indicador === ""){
		 msg += " Nome do Grafico "
		 }
 		 msg += " Obrigatórios "
	
	if(YpX == "" || XpY == "" || Indicador == "" ){
		erro(msg);
		return false;
	}

  $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "saveCharts",
						  tipoGrafico:tipoGrafico,
              XpY: XpY,
				  		YpX:YpX,
						  Omitir:Omitir,
						  Indicador:Indicador,
						  DataInicio:DataInicio,
						  DataFim:DataFim,
						  Usuarios:Usuarios,
						  Tipo:Tipo,
						  nomeChart:nomeChart,
						  id:id,
						  cor:cor
          },
          error: function(resp) {
             console.log(resp);  
						console.log("deu erro");  
          },
          success: function(resp) {
						if(id != null){
					 sucesso('Grafico '+ nomeChart +' editado com sucesso!');	
						}else{
           sucesso('Grafico '+ nomeChart +' cadastrado com sucesso!');
						}
						setTimeout(function() {
							window.location = "/dashboard";
					 }, 3500)	

          }
      });
});


//Função habilitar ou desabilitar grafico
$("#statusChart").on("click", function(e){ 
  e.preventDefault();
		var url = document.baseURI;
	  var id = $("#grafico").val();

  $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "statusChart",
						  id:id
          },
          error: function(resp) {
             console.log(resp);  
						console.log("deu erro");  
          },
          success: function(resp) {
						console.log(resp)
						if(resp.status == 1){
							var msg = "Grafico "+resp.nome+" habilitado com sucesso";
						}else{
							var msg = "Grafico "+resp.nome+" desabilitado com sucesso";
							
						}
           sucesso(msg);
						setTimeout(function() {
							window.location = "/dashboard/"+resp.id;
					 }, 3500)	

          }
      });
});


//função para excluir o grafico
function excluirChart(id){ 
 

		var url = document.baseURI;
	  
	  var nome = $("#nomeChart").val();

	Swal.fire({
  title: 'Tem certeza que deseja excluir o gráfico '+ id +' ?', 
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#d33',
  cancelButtonColor: '#999999',
	cancelButtonText:'Cancelar',	
  confirmButtonText: 'Sim, Desejo excluir!'
}).then((result) => {
  if (result.isConfirmed) {
  $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "excluirChart",
						  id:id
          },
          error: function(resp) {
             console.log(resp);  
						console.log("deu erro");  
          },
          success: function(resp) {
           sucesso("Excluido com Sucesso");
						setTimeout(function() {
							window.location = "/dashboard";
					 }, 3500)	

          }
      });
  }
})


}

//////////////////////////INICIO///////////////////////////////////////////////////
function CriacaoChartColuna(X,Y) {
	console.log(Y);
	
 $('#cores').attr('hidden', true);
 $( ".ct-chart" ).empty();
 $( ".graficonumero" ).empty();
 $( "<input value='1' id='tipo_grafico' type='hidden' ></input>" ).appendTo( ".ct-chart" );
 $( "<canvas id='ct-chart' ></canvas>" ).appendTo( ".ct-chart" );

const ctx = document.getElementById('ct-chart');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: X,
        datasets: [{
            label: '# ',
            data: Y,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
          options: {
        plugins: {
            legend: {
							  position: 'bottom' ,
                display: false,
          
            }
        }
    }
});
}
//////////////////////////FIM///////////////////////////////////////////////////



//////////////////////////INICIO///////////////////////////////////////////////////
function CriacaoChartLollipop(X,Y) {


$('#cores').attr('hidden', false);
$( ".ct-chart" ).empty();
$( ".graficonumero" ).empty();
$( "<input value='3' id='tipo_grafico' type='hidden' ></input>" ).appendTo( ".ct-chart" );
$( "<canvas id='ct-chart' ></canvas>" ).appendTo( ".ct-chart" );
 var cor = $("#cores").val();   
	const labels = X;

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: '#56ff00',
      borderColor: cor,
      data: Y,
    }]
  };

  const config = {
    type: 'line',
    data: data,
     options: {
        plugins: {
            legend: {
							  position: 'bottom' ,
                display: false,
          
            }
        }
    }
  };
	
  const myChart = new Chart(
    document.getElementById('ct-chart'),
    config
  );	
	

}
//////////////////////////FIM///////////////////////////////////////////////////





//////////////////////////INICIO///////////////////////////////////////////////////
function CriacaoChartRosca(X,Y) {
	

 $('#cores').attr('hidden', true);
 $( ".ct-chart" ).empty();
 $( ".graficonumero" ).empty();
 $( "<input value='2' id='tipo_grafico' type='hidden' ></input>" ).appendTo( ".ct-chart" );	
 $( "<center><canvas style='height: 400px; !important'   id='ct-chart' heigth='490' ></canvas><c/center>" ).appendTo( ".ct-chart" );

	const labels = X;

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
       backgroundColor: [
       'rgba(255, 99, 132, 0.6)',
       'rgba(54, 162, 235, 0.6)',
       'rgba(255, 206, 86, 0.6)',
       'rgba(75, 192, 192, 0.6)',
       'rgba(153, 102, 255, 0.6)',
       'rgba(255, 159, 64, 0.6)',
			 'rgba(193, 0, 255, 0.6)',
       'rgba(255, 99, 132, 0.6)',
       'rgba(128, 213, 114, 0.6)',
       'rgba(54, 162, 235, 0.6)'
    ],
			
      borderColor: [
       'rgba(255, 99, 132, 0.6)',
       'rgba(54, 162, 235, 0.6)',
       'rgba(255, 206, 86, 0.6)',
       'rgba(75, 192, 192, 0.6)',
       'rgba(153, 102, 255, 0.6)',
       'rgba(255, 159, 64, 0.6)',
			 'rgba(193, 0, 255, 0.6)',
       'rgba(255, 99, 132, 0.6)',
       'rgba(128, 213, 114, 0.6)',
       'rgba(54, 162, 235, 0.6)'
    ],
      data: Y,
    }]
  };

  const config = {
    type: 'doughnut',
    data: data,
            options: {
						 aspectRatio:2,
							responsive: true,
        plugins: {
            legend: {
							  position: 'bottom' ,
                display: true,
          
            }
					
        }
							
							
    }
  };
	
  const myChart = new Chart(
    document.getElementById('ct-chart'),
    config
  );	


  myChart.resize(100, 100);

}



function CriacaoChartPorcentagem(X,T) {

	
	var chartNumero ="";
	$('#cores').attr('hidden', false);
	$( ".ct-chart" ).empty();
	$( ".graficonumero" ).empty();
	$( "<input value='6' id='tipo_grafico' type='hidden' ></input>" ).appendTo( ".graficonumero" );	
	$( "<canvas id='ct-chart' ></canvas>" ).appendTo( ".ct-chart" );

 
	console.log(T);
  var cor = $("#cores").val();  
	console.log(cor);

	
	
	 chartNumero += '<center>';
		chartNumero += '<div class="card animate fadeLeft">';
		chartNumero += '<div class="card-content" style="border-left:4px solid '+ cor + '">';		
			chartNumero += '	<h6 class="mb-0 mt-0 display-flex justify-content-between">Criação Grafico<i class="material-icons float-right">more_vert</i></h6>';	
			chartNumero += 'Todos os Registros';								
			chartNumero += '<div class="current-balance-container exibicaoChart graficonumero">';	
		chartNumero += '<h4 style="color:#333 !important" class="card-stats-number white-text">'+ T.toFixed(2) +'%</h4>';
			chartNumero += '</div>';	
			chartNumero += '</div>';	
		chartNumero += '</div>';
	chartNumero += '</center>';
						 

$( chartNumero ).appendTo( ".graficonumero" );
return false;

}


function CriacaoChartNumero(X,Y,T) {
	console.log("entrou Num");

	var chartNumero ="";
	if(Y != 2){
		
		var totalt = [] ;
	$.each(T, function(key,value) {
		totalt = totalt.concat(value.Total);
		});
		let total = 0;
		for (var i = 0; i < totalt.length; i++) {
			total += parseFloat(totalt[i])
		}

	$('#cores').attr('hidden', false);
	$( ".ct-chart" ).empty();
	$( ".graficonumero" ).empty();
	$( "<input value='5' id='tipo_grafico' type='hidden' ></input>" ).appendTo( ".graficonumero" );	
	$( "<canvas id='ct-chart' ></canvas>" ).appendTo( ".ct-chart" );

 var ValorFinal =  total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
	console.log(T);
  var cor = $("#cores").val();  
	console.log(cor);
	
	
	
	 chartNumero += '<center>';
		chartNumero += '<div class="card animate fadeLeft">';
		chartNumero += '<div class="card-content" style="border-left:4px solid '+ cor + '">';		
			chartNumero += '	<h6 class="mb-0 mt-0 display-flex justify-content-between">Criação Grafico</h6>';	
			chartNumero += 'Todos os Registros';								
			chartNumero += '<div class="current-balance-container exibicaoChart graficonumero">';	
		chartNumero += '<h4 style="color:#333 !important" class="card-stats-number white-text">'+ ValorFinal +'</h4>';
			chartNumero += '</div>';	
			chartNumero += '</div>';	
		chartNumero += '</div>';
	chartNumero += '</center>';
	


} else if (Y = 2){

	$('#cores').attr('hidden', false);
	$( ".ct-chart" ).empty();
	$( ".graficonumero" ).empty();
	$( "<input value='5' id='tipo_grafico' type='hidden' ></input>" ).appendTo( ".graficonumero" );	
	$( "<canvas id='ct-chart' ></canvas>" ).appendTo( ".ct-chart" );

 var ValorFinal =  T.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
	console.log(T);
  var cor = $("#cores").val();  
	console.log(cor);

	
	
	 chartNumero += '<center>';
		chartNumero += '<div class="card animate fadeLeft">';
		chartNumero += '<div class="card-content" style="border-left:4px solid '+ cor + '">';		
			chartNumero += '	<h6 class="mb-0 mt-0 display-flex justify-content-between">Criação Grafico</h6>';	
			chartNumero += 'Todos os Registros';								
			chartNumero += '<div class="current-balance-container exibicaoChart graficonumero">';	
		chartNumero += '<h4 style="color:#333 !important" class="card-stats-number white-text">'+ ValorFinal +'</h4>';
			chartNumero += '</div>';	
			chartNumero += '</div>';	
		chartNumero += '</div>';
	chartNumero += '</center>';
						 
}
$( chartNumero ).appendTo( ".graficonumero" );
return false;

}









function CriacaoChartCdupla(X,Y,E,V){
	
	console.log(X);
	console.log(Y);
	console.log(E);
	console.log(V);

 $('#cores').attr('hidden', true);
 $( ".ct-chart" ).empty();
 $( ".graficonumero" ).empty();
 $( "<input value='4' id='tipo_grafico' type='hidden' ></input>" ).appendTo( ".ct-chart" );	
 $( "<center><canvas style='    height: 256px; !important'   id='ct-chart' heigth='490' ></canvas><c/center>" ).appendTo( ".ct-chart" );
	
	
	
var data = {
    labels: X,
    datasets: [
        {
            label: "Entregue com data vencida",
					       backgroundColor: [
        '#DC143C',
									

    ],
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: V
        },
        {
            label: "Entregue dentro da data",
									       backgroundColor: [
      '#00FF00',

    ],
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,0.8)",
            highlightFill: "rgba(151,187,205,0.75)",
            highlightStroke: "rgba(151,187,205,1)",
            data: E
        }
    ]
};

const ctx = document.getElementById('ct-chart');
var myChart = new Chart(ctx,{
    type: 'bar',
    data: data
});	

}


