// Dashboard - Modern
//----------------------

(function(window, document, $) {   

  $.ajax({
    type: "POST",
    url: document.baseURI,
    dataType: "jsonp",
    data: {
      action: "dashboardConfig"
    },
    error: function() {
      console.log("ERRO DE INICIALIZAÇÃO");
    },
    success: function(resp) { 
      var card1Desempenho = addCard1(resp.card1, resp.metaIndicadorCard1);
      addCard2(resp);
      addCard3(resp.card3);    
      addCard4(resp.card4);
        

      $("#filialCard1").text(resp.nomeFilialCard1);
      $("#indicadorCard1").text(resp.nomeIndicadorCard1);
      $("#valorMetaExecutado").text(card1Desempenho);
      
      $("#filialCard2").text(resp.nomeFilialCard2);
      $("#indicadorCard2").text(resp.nomeIndicadorCard2);
      
      $("#filialCard3").text(resp.nomeFilialCard3);
      $("#indicadorCard3").text(resp.nomeIndicadorCard3);
      
      $("#filialCard4").text(resp.nomeFilialCard4);
      $("#indicadorCard4").text(resp.nomeIndicadorCard4);
    }
  });



  $(".card-1-tooltip").on("click", function() {
    $(".card-1-divselect").toggle();
  });

  $(".card-2-tooltip").on("click", function() {
    $(".card-2-divselect").toggle();
  });

  $(".card-3-tooltip").on("click", function() {
    $(".card-3-divselect").toggle();
  });
  
  $(".card-4-tooltip").on("click", function() {
    $(".card-4-divselect").toggle();
  });

  $(".select-indicadores").on("change", function() {
    var id = $(this).find("option:selected").val();
    var type = $(this).data("type");

    $.ajax({
      type: "POST",
      url: document.baseURI,
      dataType: "jsonp",
      data: {
        action: "select-indicadores",
        id: id,
        type: type
      },
      error: function() {
        console.log("ERROR");
      },
      success: function(resp) {
        console.log(resp);
        var metaD = resp.meta;
        
        if (type == "card_1") {
          var valorCompleto = 0;

          $.each(resp.idUsuario, function(index, value) {
            valorCompleto += parseInt(value.quantidade);
          });

          
          var completos = valorCompleto;

          var restantes = metaD - valorCompleto;
          // Se tipo for Meta Mensal
          // -----------
          var CurrentBalanceDonutChart = new Chartist.Pie(
            "#current-balance-donut-chart", {
              labels: [1, 2],
              series: [{
                  meta: "Completos",
                  value: 10
                },
                {
                  meta: "Restantes",
                  value: 15
                }
              ]
            },

            {
              donut: true,
              donutWidth: 8,
              showLabel: false,
              plugins: [
                Chartist.plugins.tooltip({
                  class: "current-balance-tooltip",
                  appendToBody: true
                }),
                Chartist.plugins.fillDonut({
                  items: [{
                    content: '<p class="small">META</p><h5 class="mt-0 mb-0">' + metaD + '</h5>'
                  }]
                })
              ]
            }
          )
          setTimeout(function() {
            M.toast({
              html: "Atualizado com sucesso."
            })
          }, 200)

          $("#filialCad1").text(resp.nomeFilial);
          $("#indicadorCad1").text(resp.nomeIndicador);
          $("#valorMetaExecutado").text(valorCompleto);
          // ----------- FIM META MENSAL ----- //
          $(".card-1-divselect").toggle();

        } else if (type == "card_2") {          
      
          var card2Janeiro = 0;
          var card2Fevereiro = 0;
          var card2Marco = 0;
          var card2Abril = 0;
          var card2Maio = 0;
          var card2Junho = 0;
          var card2Julho = 0;
          var card2Agosto = 0;
          var card2Setembro = 0;
          var card2Outubro = 0;
          var card2Novembro = 0;
          var card2Dezembro = 0;
      
           //card1Desempenho
            $.each(resp.mesJaneiro, function(index, value) {
              card2Janeiro += parseInt(value.quantidade);
            });
            //card1Desempenho
            $.each(resp.mesFevereiro, function(index, value) {
              card2Fevereiro += parseInt(value.quantidade);
            });
            //card1Desempenho
            $.each(resp.mesMarco, function(index, value) {
              card2Marco += parseInt(value.quantidade);
            });
            //card1Desempenho
            $.each(resp.mesAbril, function(index, value) {
              card2Abril += parseInt(value.quantidade);
            });
            //card1Desempenho
            $.each(resp.mesMaio, function(index, value) {
              card2Maio += parseInt(value.quantidade);
            });
            //card1Desempenho
            $.each(resp.mesJunho, function(index, value) {
              card2Junho += parseInt(value.quantidade);
            });
            //card1Desempenho
            $.each(resp.mesJulho, function(index, value) {
              card2Julho += parseInt(value.quantidade);
            });
            //card1Desempenho
            $.each(resp.mesAgosto, function(index, value) {
              card2Agosto += parseInt(value.quantidade);
            });
             //card1Desempenho
            $.each(resp.mesSetembro, function(index, value) {
              card2Setembro += parseInt(value.quantidade);
            });
             //card1Desempenho
            $.each(resp.mesOutubro, function(index, value) {
              card2Outubro += parseInt(value.quantidade);
            });
             //card1Desempenho
            $.each(resp.mesNovembro, function(index, value) {
              card2Novembro += parseInt(value.quantidade);
            });
             //card1Desempenho
            $.each(resp.mesDezembro, function(index, value) {
              card2Dezembro += parseInt(value.quantidade);
            });
 
      
          var UserStatisticsBarChart = new Chartist.Bar(
            "#user-statistics-bar-chart", {
              labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
              series: [
                [card2Janeiro, card2Fevereiro, card2Marco, card2Abril, card2Maio, card2Junho,card2Julho,card2Agosto,card2Setembro,card2Outubro,card2Novembro,card2Dezembro],
                [metaD, metaD, metaD, metaD, metaD, metaD,metaD,metaD,metaD,metaD,metaD,metaD]
              ]
            }, {
              // Default mobile configuration
              stackBars: true,
              chartPadding: 0,
              axisX: {
                showGrid: true
              },
              axisY: {
                showGrid: true,
                labelInterpolationFnc: function(value) {
                  return value / 1000 + "k"
                },
                scaleMinSpace: 50
              },
              plugins: [
                Chartist.plugins.tooltip({
                  class: "user-statistics-tooltip",
                  appendToBody: true
                })
              ]
            }, [
              // Options override for media > 800px
              [
                "screen and (min-width: 800px)",
                {
                  stackBars: false,
                  seriesBarDistance: 10
                }
              ],
              // Options override for media > 1000px
              [
                "screen and (min-width: 1000px)",
                {
                  reverseData: false,
                  horizontalBars: false,
                  seriesBarDistance: 15
                }
              ]
            ]
          )

          UserStatisticsBarChart.on("draw", function(data) {
            if (data.type === "bar") {
              data.element.attr({
                style: "stroke-width: 12px",
                x1: data.x1 + 0.001
              })         
            }
          })

          UserStatisticsBarChart.on("created", function(data) {
            var defs = data.svg.querySelector("defs") || data.svg.elem("defs")
            defs
              .elem("linearGradient", {
                id: "barGradient1",
                x1: 0,
                y1: 0,
                x2: 0,
                y2: 1
              })
              .elem("stop", {
                offset: 0,
                "stop-color": "#f57722"
              })
              .parent()
              .elem("stop", {
                offset: 1,
                "stop-color": "#f57722"
              })

            defs
              .elem("linearGradient", {
                id: "barGradient2",
                x1: 0,
                y1: 0,
                x2: 0,
                y2: 1
              })
              .elem("stop", {
                offset: 0,
                "stop-color": "#000000"
              })
              .parent()
              .elem("stop", {
                offset: 1,
                "stop-color": "#000000"
              })
            return defs
          })
              setTimeout(function() {
                M.toast({
                  html: "Atualizado com sucesso."
                })
              }, 200)
               $("#filialCard2").text(resp.nomeFilial);
              $("#indicadorCard2").text(resp.nomeIndicador);
              $(".card-2-divselect").toggle();
            } else if (type == "card_3") {
              var card3Dias = [];
              var card3DiaQuantidade = [];
          //card 3   
          $.each(resp.idUsuario, function(index, value) {
            card3Dias.push(parseInt(value.dia));
            card3DiaQuantidade.push(parseInt(value.quantidade));
          });

          var TotalTransactionLine = new Chartist.Line(
            "#total-transaction-line-chart", {
              labels: card3Dias,
              series: [card3DiaQuantidade]
            }, {
              chartPadding: 0,
              axisX: {
                showLabel: true,
                showGrid: true
              },
              axisY: {
                showLabel: true,
                showGrid: true,
              },
              lineSmooth: Chartist.Interpolation.simple({
                divisor: 2
              }),
              plugins: [
                Chartist.plugins.tooltip({
                  class: "total-transaction-tooltip",
                  appendToBody: true
                })
              ],
              fullWidth: true
            }
          )

          TotalTransactionLine.on("created", function(data) {
            var defs = data.svg.querySelector("defs") || data.svg.elem("defs")
            defs
              .elem("linearGradient", {
                id: "lineLinearStats",
                x1: 0,
                y1: 0,
                x2: 1,
                y2: 0
              })
              .elem("stop", {
            offset: "0%",
            "stop-color": "rgba(245, 119, 34, 0.7)"
            })
            .parent()
            .elem("stop", {
              offset: "10%",
              "stop-color": "rgba(245, 119, 84, 1)"
            })
            .parent()
            .elem("stop", {
              offset: "30%",
              "stop-color": "rgba(245, 119, 34, 0.7)"
            })
            .parent()
            .elem("stop", {
              offset: "95%",
              "stop-color": "rgba(245, 119, 14, 1)"
            })
            .parent()
            .elem("stop", {
              offset: "100%",
              "stop-color": "rgba(245, 119, 34, 0.7)"
            })

            return defs
          }).on("draw", function(data) {
            var circleRadius = 5
            if (data.type === "point") {
              var circle = new Chartist.Svg("circle", {
                cx: data.x,
                cy: data.y,
                "ct:value": data.value.y,
                r: circleRadius,
                class: data.value.y === 35 ?
                  "ct-point ct-point-circle" :
                  "ct-point ct-point-circle-transperent"
              })
              data.element.replace(circle)
            }
          })
          setTimeout(function() {
            M.toast({
              html: "Atualizado com sucesso."
            })
          }, 200)
          $("#filialCard3").text(resp.nomeFilial);
          $("#indicadorCard3").text(resp.nomeIndicador);
          $(".card-3-divselect").toggle();

        } else if (type == "card_4"){
          
          $("#users-list-datatable tbody tr").remove();

          $.each(resp.card4, function(index, value) {

          //Verificar se pode já adicionar Produtos	
           var newRow = $("<tr>");	    
           var cols = "";	
           var url = document.baseURI;	

          cols += '<td></td>';
          cols += '<td>'+value.id+'</td>';
          cols += '<td>'+value.nome+'</td>';
          cols += '<td>'+value.cargo+'</td>';
          cols += '<td>'+value.filial+'</td>';	
          cols += '<td>'+value.mDia+'</td>';
          cols += '<td>'+value.mMes+'</td>';		  

          newRow.append(cols);

          $("#users-list-datatable tbody").append(newRow);
          });
          setTimeout(function() {
            M.toast({
              html: "Atualizado com sucesso."
            })
          }, 200)
          $("#filialCard4").text(resp.nomeFilialCard4);
          $("#indicadorCard4").text(resp.nomeIndicadorCard4);
          $(".card-4-divselect").toggle();
        }
      }
    })
    return false;
  });

  // charts update on sidenav collapse
  $('.logo-wrapper .navbar-toggler').on('click', function() {
    setTimeout(function() {
      CurrentBalanceDonutChart.update();
      TotalTransactionLine.update();
      UserStatisticsBarChart.update();
      ConversionRatioBarChart.update();
    }, 200);
  })
})(window, document, jQuery)

function addCard1(data, meta){
  
  var restantesCard1 = 0;
  var completosCard1 = 0;
  var metaDCard1 = 0;
	var card1Desempenho = 0;	
  
      //card1Desempenho
      $.each(data, function(index, value) {
        card1Desempenho += parseInt(value.quantidade);
      });

      metaDCard1 = meta;
      completosCard1 = card1Desempenho;
      restantesCard1 = metaDCard1 - card1Desempenho;

      var CurrentBalanceDonutChart = new Chartist.Pie(
        "#current-balance-donut-chart", {
          labels: [1, 2],
          series: [{
              meta: "Completos",
              value: card1Desempenho
            },
            {
              meta: "Restantes",
              value: restantesCard1
            }
          ]
        },

        {
          donut: true,
          donutWidth: 8,
          showLabel: false,
          plugins: [
            Chartist.plugins.tooltip({
              class: "current-balance-tooltip",
              appendToBody: true
            }),
            Chartist.plugins.fillDonut({
              items: [{
                content: '<p class="small">META</p><h5 class="mt-0 mb-0">' + metaDCard1 + '</h5>'
              }]
            })
          ]
        }
      )
  
    return card1Desempenho;
}

function addCard2(data){
  
      var card2Janeiro = 0;
      var card2Fevereiro = 0;
      var card2Marco = 0;
      var card2Abril = 0;
      var card2Maio = 0;
      var card2Junho = 0;
      var card2Julho = 0;
      var card2Agosto = 0;
      var card2Setembro = 0;
      var card2Outubro = 0;
      var card2Novembro = 0;
      var card2Dezembro = 0;
      
      var card2Meta = data.metaIndicadorCard2;
  
    //card1Desempenho
      $.each(data.mesJaneiro, function(index, value) {
        card2Janeiro += parseInt(value.quantidade);
      });
      //card1Desempenho
      $.each(data.mesFevereiro, function(index, value) {
        card2Fevereiro += parseInt(value.quantidade);
      });
      //card1Desempenho
      $.each(data.mesMarco, function(index, value) {
        card2Marco += parseInt(value.quantidade);
      });
      //card1Desempenho
      $.each(data.mesAbril, function(index, value) {
        card2Abril += parseInt(value.quantidade);
      });
      //card1Desempenho
      $.each(data.mesMaio, function(index, value) {
        card2Maio += parseInt(value.quantidade);
      });
      //card1Desempenho
      $.each(data.mesJunho, function(index, value) {
        card2Junho += parseInt(value.quantidade);
      });
      //card1Desempenho
      $.each(data.mesJulho, function(index, value) {
        card2Julho += parseInt(value.quantidade);
      });
      //card1Desempenho
      $.each(data.mesAgosto, function(index, value) {
        card2Agosto += parseInt(value.quantidade);
      });
       //card1Desempenho
      $.each(data.mesSetembro, function(index, value) {
        card2Setembro += parseInt(value.quantidade);
      });
       //card1Desempenho
      $.each(data.mesOutubro, function(index, value) {
        card2Outubro += parseInt(value.quantidade);
      });
       //card1Desempenho
      $.each(data.mesNovembro, function(index, value) {
        card2Novembro += parseInt(value.quantidade);
      });
       //card1Desempenho
      $.each(data.mesDezembro, function(index, value) {
        card2Dezembro += parseInt(value.quantidade);
      });
  
    var UserStatisticsBarChart = new Chartist.Bar(
        "#user-statistics-bar-chart", {
          labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
          series: [
            [card2Janeiro, card2Fevereiro, card2Marco, card2Abril, card2Maio, card2Junho,card2Julho,card2Agosto,card2Setembro,card2Outubro,card2Novembro,card2Dezembro],
            [card2Meta, card2Meta, card2Meta, card2Meta, card2Meta, card2Meta,card2Meta,card2Meta,card2Meta,card2Meta,card2Meta,card2Meta]
          ]
        }, {
          // Default mobile configuration
          stackBars: true,
          chartPadding: 0,
          axisX: {
            showGrid: false
          },
          axisY: {
            showGrid: false,
            labelInterpolationFnc: function(value) {
              return value / 1000 + "k"
            },
            scaleMinSpace: 50
          },
          plugins: [
            Chartist.plugins.tooltip({
              class: "user-statistics-tooltip",
              appendToBody: true
            })
          ]
        }, [
          // Options override for media > 800px
          [
            "screen and (min-width: 800px)",
            {
              stackBars: false,
              seriesBarDistance: 10
            }
          ],
          // Options override for media > 1000px
          [
            "screen and (min-width: 1000px)",
            {
              reverseData: false,
              horizontalBars: false,
              seriesBarDistance: 15
            }
          ]
        ]
      )

      UserStatisticsBarChart.on("draw", function(data) {
        if (data.type === "bar") {
          data.element.attr({
            style: "stroke-width: 12px",
            x1: data.x1 + 0.001
          })         
        }
      })

      UserStatisticsBarChart.on("created", function(data) {
        var defs = data.svg.querySelector("defs") || data.svg.elem("defs")
        defs
          .elem("linearGradient", {
            id: "barGradient1",
            x1: 0,
            y1: 0,
            x2: 0,
            y2: 1
          })
          .elem("stop", {
            offset: 0,
            "stop-color": "#f57722"
          })
          .parent()
          .elem("stop", {
            offset: 1,
            "stop-color": "#f57722"
          })

        defs
          .elem("linearGradient", {
            id: "barGradient2",
            x1: 0,
            y1: 0,
            x2: 0,
            y2: 1
          })
          .elem("stop", {
            offset: 0,
            "stop-color": "#000000"
          })
          .parent()
          .elem("stop", {
            offset: 1,
            "stop-color": "#000000"
          })
        return defs
      })
  
    return false;
}

function addCard3(data){
		var card3Dias = [];
    var card3DiaQuantidade = [];
   //card 3   
      $.each(data, function(index, value) {
        card3Dias.push(parseInt(value.dia));
        card3DiaQuantidade.push(parseInt(value.quantidade));
      });

      var TotalTransactionLine = new Chartist.Line(
        "#total-transaction-line-chart", {
          labels: card3Dias,
          series: [card3DiaQuantidade]
        }, {
          chartPadding: 0,
          axisX: {
            showLabel: true,
            showGrid: true
          },
          axisY: {
            showLabel: true,
            showGrid: true,
          },
          lineSmooth: Chartist.Interpolation.simple({
            divisor: 2
          }),
          plugins: [
            Chartist.plugins.tooltip({
              class: "total-transaction-tooltip",
              appendToBody: true
            })
          ],
          fullWidth: true
        }
      )

      TotalTransactionLine.on("created", function(data) {
        var defs = data.svg.querySelector("defs") || data.svg.elem("defs")
        defs
          .elem("linearGradient", {
            id: "lineLinearStats",
            x1: 0,
            y1: 0,
            x2: 1,
            y2: 0
          })
          .elem("stop", {
            offset: "0%",
            "stop-color": "rgba(245, 119, 34, 0.7)"
          })
          .parent()
          .elem("stop", {
            offset: "10%",
            "stop-color": "rgba(245, 119, 84, 1)"
          })
          .parent()
          .elem("stop", {
            offset: "30%",
            "stop-color": "rgba(245, 119, 34, 0.7)"
          })
          .parent()
          .elem("stop", {
            offset: "95%",
            "stop-color": "rgba(245, 119, 14, 1)"
          })
          .parent()
          .elem("stop", {
            offset: "100%",
            "stop-color": "rgba(245, 119, 34, 0.7)"
          })

        return defs
      }).on("draw", function(data) {
        var circleRadius = 5
        if (data.type === "point") {
          var circle = new Chartist.Svg("circle", {
            cx: data.x,
            cy: data.y,
            "ct:value": data.value.y,
            r: circleRadius,
            class: data.value.y === 35 ?
              "ct-point ct-point-circle" :
              "ct-point ct-point-circle-transperent"
          })
          data.element.replace(circle)
        }
      })
  
    return false;
}

function addCard4(data){
  
    var usersTable; 
		console.log(data);
    $.each(data, function(index, value) {
     
		//Verificar se pode já adicionar Produtos	
     var newRow = $("<tr>");	    
		 var cols = "";	
		 var url = document.baseURI;	
	
    cols += '<td></td>';
		cols += '<td>'+value.id+'</td>';
		cols += '<td>'+value.nome+'</td>';
		cols += '<td>'+value.cargo+'</td>';
		cols += '<td>'+value.filial+'</td>';	
    cols += '<td>'+value.mDia+'</td>';
		cols += '<td>'+value.mMes+'</td>';		  
		
    newRow.append(cols);
	
		$("#users-list-datatable").append(newRow);
    });
  
	
      // datatable initialization
        if ($("#users-list-datatable").length > 0) {
          usersTable = $("#users-list-datatable").DataTable({
            responsive: true,             
            'columnDefs': [{
              "orderable": false,
              "targets": [0]
            }]
          });
        }  

        // Input, Select, Textarea validations except submit button validation initialization
        if ($(".users-edit").length > 0) {
          $("#accountForm, #infotabForm").validate({
            errorElement: 'div'
          });
        }
		

    return false;
}
