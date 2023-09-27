
// function refreshChart () {
// 			var url = document.baseURI;

// console.log("entrou exibe chart");

// 	  $.ajax({
//           url: url,
//           type: "POST",
//           dataType: "jsonp",
//           data: {
//               action: "refreshChart"

//           },
//           error: function(resp) {
// 						console.log("deu erro");  
//           },
//            success: function(resp) {


//  	console.log(resp);
		
// 					}
// 	 });


// }


function exibeChart () {
			var url = document.baseURI;

console.log("entrou exibe chart");

	  $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "exibeChart"

          },
          error: function(resp) {
						console.log("deu erro");  
          },
           success: function(resp) {


 	console.log(resp);
		
					}
	 });


}


// setInterval(function(){
// 	console.log("refrexh");
//    refreshChart();
// }, 5000);

//////////////////////////INICIO///////////////////////////////////////////////////
function ChartColuna(X,Y, ID,Nome) {
//  $( ".ct-chart" ).empty();
console.log(Nome);
 const ctx = document.getElementById('ct-chart' + ID);
	

const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: X,
    datasets: [{
      
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
function ChartLollipop(X,Y,ID, COR) {
$( ".ct-chart" ).empty();
$( "<input value='2' id='tipo_grafico' type='hidden' ></input>" ).appendTo( ".ct-chart" );
const labels = X;

  const data = {
    labels: labels,
    datasets: [{
      
      backgroundColor: '#ffc107',
      borderColor: COR,
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
    document.getElementById('ct-chart' + ID),
    config
  );	

}
//////////////////////////FIM///////////////////////////////////////////////////


//////////////////////////INICIO///////////////////////////////////////////////////
function ChartPizza(X,Y,ID) {

//  $( ".ct-chart" ).empty();
 $( "<input value='4' id='tipo_grafico' type='hidden' ></input>" ).appendTo( ".ct-chart" );	
	
	const labels = X;

  const data = {
    labels: labels,
    datasets: [{
    
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
    type: 'pie',
    data: data,
    options: {}
  };
	
  const myChart = new Chart(
    document.getElementById('ct-chart' + ID),
    config
  );	

}
//////////////////////////FIM///////////////////////////////////////////////////



//////////////////////////INICIO///////////////////////////////////////////////////
function ChartRosca(X,Y,ID) {
 //$( ".ct-chart" ).empty();
 $( "<input value='3' id='tipo_grafico' type='hidden' style='height: 320px; !important' height='320px'></input>" ).appendTo( ".ct-chart" );
		const labels = X;

  const data = {
    labels: labels,
    datasets: [{
     
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
						 aspectRatio: 2,
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
    document.getElementById('ct-chart' + ID),
    config
  );	
}
//////////////////////////FIM///////////////////////////////////////////////////

//////////////////////////INICIO///////////////////////////////////////////////////
function ChartNumero(X,Y,ID, T) {
		console.log(T);		 
			 
	if(Y != 2){
		 
			var totalt = [] ;
			$.each(T, function(key,value) {
        totalt = totalt.concat(value.Total);
 				});
				let total = 0;
				for (var i = 0; i < totalt.length; i++) {
					total += parseFloat(totalt[i])
				}
		
	
	$( ".ct-chart" ).empty();
	$( ".graficonumero"+ ID ).empty();
	$( "<input value='5' id='tipo_grafico' type='hidden' ></input>" ).appendTo( ".graficonumero" );	
	
	
	
const valorTotalF = Intl.NumberFormat('pt-br', {style: 'currency', currency: 'BRL'}).format(total);



	var chartNumero ="";		
	chartNumero += '<h5 class="center-align">'+ valorTotalF +'</h5>';
	chartNumero += '<p class="medium-small center-align">Valor exibido de acordo com os dados selecionados!</p>';
	$(chartNumero).appendTo(".graficonumero" + ID );
		 } else if(Y == 2){
			 
	console.log(T);		 
			 
 	$( ".ct-chart" ).empty();
	$( ".graficonumero"+ ID ).empty();
	$( "<input value='5' id='tipo_grafico' type='hidden' ></input>" ).appendTo( ".graficonumero" );	
	
const valorTotalF = Intl.NumberFormat('pt-br', {style: 'currency', currency: 'BRL'}).format(T);



	var chartNumero ="";		
	chartNumero += '<h5 class="center-align">'+ valorTotalF +'</h5>';
	chartNumero += '<p class="medium-small center-align">Valor exibido de acordo com os dados selecionados!</p>';
	$(chartNumero).appendTo(".graficonumero" + ID );
		}

}
//////////////////////////FIM///////////////////////////////////////////////////




function ChartPorcentagem(ID,P) {
	
			 
	console.log(P);		 
			 
 	$( ".ct-chart" ).empty();
	$( ".graficonumero"+ ID ).empty();
	$( "<input value='6' id='tipo_grafico' type='hidden' ></input>" ).appendTo( ".graficonumero" );	

	var chartNumero ="";		
	chartNumero += '<h5 class="center-align">'+ P.toFixed(2) +'%</h5>';
	chartNumero += '<p class="medium-small center-align">Porcentagem exibido de acordo com os dados selecionados!</p>';
	$(chartNumero).appendTo(".graficonumero" + ID );

}




function ChartCdupla(X,Y,E,V,ID){
	

 //$( ".ct-chart" ).empty();
 $( ".graficonumero" ).empty();
 $( "<input value='4' id='tipo_grafico' type='hidden' ></input>" ).appendTo( ".ct-chart" );	
 $( "<center><canvas style='height: 256px; !important'   id='ct-chart' heigth='490' ></canvas></center>" ).appendTo( ".ct-chart" );
	
	
	
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

const ctx = document.getElementById('ct-chart'+ID);
var myChart = new Chart(ctx,{
    type: 'bar',
    data: data
});	

}



$("#cores").on("change", function(){
	$(".ct-series-a .ct-bar, .ct-series-a .ct-line, .ct-series-a .ct-point, .ct-series-a .ct-slice-donut").css("stroke", $(this).val());
});

$("#button-modal").on("click", function(event){
event.preventDefault();
  
$("#myModal").modal("show");
  
setTimeout(function(){   

var data = {
  // A labels array that can contain any sort of values
  labels: ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta'],
  // Our series array that contains series objects or in this case series data arrays
  series: [
    [5, 2, 4, 2, 0]
  ]
};

// As options we currently only set a static size of 300x200 px. We can also omit this and use aspect ratio containers
// as you saw in the previous example
 var options = { 
  width: '100%', 
	height: '100%', 
 };

// Create a new line chart object where as first parameter we pass in a selector
// that is resolving to our chart container element. The Second parameter
// is the actual data object. As a third parameter we pass in our custom options.
//new Chartist.Bar('.ct-chart', data, options);		
$(".select2").select2({});	
},250);	
});


$('.chart-icon').on('click', function(){
	var elemento = $(this);
		$('.chart-icon').each(function (value, key){
			$(this).removeClass('actived');
		});
		$(this).addClass('actived');
});
