setTimeout(function(){ 
	var btnMenu = document.querySelector("#produtos_length");
	btnMenu.addEventListener("click", function() {
		setTimeout(function(){ 
     $(".select2").select2({});
			}, 1000);
  });
	
	var btnPesquisa = document.querySelector("#produtos_filter");
	btnPesquisa.addEventListener("keypress", function() {
		console.log("foioio");
		setTimeout(function(){ 
     $(".select2").select2({});
			}, 1500);
  });
	
	var btnPag = document.querySelector("#produtos_paginate");
	btnPag.addEventListener("click", function() {
		console.log("wwwwwwwwwwwww");
		setTimeout(function(){ 
     $(".select2").select2({});
			}, 1000);
  });
	

	
	
$(".select2").select2({});
 	}, 2000);


setTimeout(function(){ 
	


function format(d) {
	console.log(d);

    return (
        '<table cellpadding="5" cellspacing="0" border="0" style="width:100%">' +
        '<tr>' +
        '<td>Brasília:</td>' +
			  '<td>' +
         d[5] +
        '</td>' +
        '<td>' +
        new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(d[6]) +
        '</td>' +
			 '<td>' +
        new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(d[7]) +
        '</td>' +
        '</tr>' +
			   '<tr>' +
        '<td>Goiânia:</td>' +
        '<td>' +
        d[8] +
        '</td>' +
			  '<td>' +
        new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(d[9]) +
        '</td>' +
			 '<td>' +
        new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(d[10]) +
        '</td>' +
        '</tr>' +
			   '<tr>' +
        '<td>Rio Verde:</td>' +
        '<td>' +
        d[11] +
        '</td>' +
			  '<td>' +
        new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(d[12]) +
        '</td>' +
			 '<td>' +
        new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(d[13]) +
        '</td>' +
        '</tr>' +
			   '<tr>' +
        '<td>Palmas:</td>' +
        '<td>' +
        d[14] +
        '</td>' +
			  '<td>' +
        new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(d[15]) +
        '</td>' +
			 '<td>' +
        new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(d[16]) +
        '</td>' +
        '</tr>' +
			   '<tr>' +
        '<td>Solar:</td>' +
        '<td>' +
        d[17] +
        '</td>' +
			  '<td>' +
        new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(d[18]) +
        '</td>' +
			 '<td>' +
        new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(d[19]) +
        '</td>' +
        '</tr>' +
			   '<tr>' +
        '<td>Radial:</td>' +
        '<td>' +
        d[20] +
        '</td>' +
			  '<td>' +
        new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(d[21]) +
        '</td>' +
			 '<td>' +
        new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(d[22]) +
        '</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Fortaleza:</td>' +
        '<td>' +
        d[23]+
        '</td>' +
			  '<td>' +
        new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(d[24]) +
        '</td>' +
			 '<td>' +
        new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(d[25]) +
        '</td>' +
        '</tr>' +
        '</table>'
    );
}


var table = 		$('#solar').DataTable(  {	
			  destroy:true,
	   responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        columnDefs: [ {
					     className: 'dt-control',
                orderable: false,
                data: null,
                defaultContent: '',
            targets:   0
        } ],
			 	processing: true,
        serverSide: true,	
			  stateSave: true, 
				stateDuration: 20,
				paging: true,				
				pagingType: 'full_numbers',
				searching: true,
	   		bSort: true,
			  order: [1, 'DESC'],
        lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"] ],   
				pageLength: 25,
				ordering: true,
	
        columns: [
            {
                className: 'dt-control',
                orderable: false,
                data: null,
                defaultContent: '',
            },
					   { data: 0 },

       
        ],

				language: {
 					url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json'
				},
			
				ajax: {
					url: document.baseURI,	
					type: 'POST',	
					data: {
						
						action: 'otimizar',
					}
				},		
	success: select2(),		
				deferRender: true,
	
	 
		});		

	
	
   $('#solar tbody').on('click', 'td.dt-control', function () {
		 
        var tr = $(this).closest('tr');
        var row = table.row(tr);
	
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });
	
		}, 300);

 $('#solar thead').on('click',  function () {
	 setTimeout(function(){ 

       $(".select2").select2({});
	 	}, 800);

    });

 $('#produtos_length').on('focus,blur',  function () {
	 console.log("sfgdssfdfsdfsdfsdffsdsfd");
	 setTimeout(function(){ 

       $(".select2").select2({});
	 	}, 800);

    });

function select2(){
	console.log("entrou 2222");
		 setTimeout(function(){ 

       $(".select2").select2({});
	 	}, 800);
}

function updateStatus(obj, param, retorno) {
var urlSave = document.baseURI;		
var qtd = $(".estoqueM" + retorno).val();
var UsuariosPro = ".userM" + retorno;
var Usuarios = $(UsuariosPro).val();
var StatussPro = ".statusM" + retorno;		
var status = $(StatussPro).val();
var column = $(obj).parents("tr").find("td:nth-child(" + param + ")");
var id = column.html();	
		$.ajax({
				url: urlSave,
				type: "POST",
				dataType: "jsonp",
				data: {
						action: "save",
						id: id,
						qtd: qtd,
					  Usuarios: Usuarios,
					  status: status
			},
			error: function(resp) {
				console.log(resp);
			},
			success: function(resp) {

				console.log(resp);
	
				
			}
		});		
		
}



	