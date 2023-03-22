<?php if(isset($IndicadoresDashboard)):?>

<?php foreach($IndicadoresDashboard as $i): ?>
<?php endforeach; ?>
<?php endif; ?>

<?php foreach($GraficoEdit->getDataAs("Chart") as $ChartS): ?>

<form onload="ajaxChart(<?= $ChartS->get(" tipo_grafico ") ?>)" class="ps-form ps-form--new-product" action="<?= APPURL." /dashboard/ ".($ChartS->isAvailable() ? $ChartS->get("id ") : "new ") ?>" method="POST">
 <?php $eixoY = $ChartS->get("eixoy");
	     $eixoX = $ChartS->get("eixox"); ?>
	<div class="content-page">
		<div class="content">
			<div class="container-fluid">






				<?php if(isset($IndicadoresDashboard)):?>
				<?php foreach($IndicadoresDashboard as $i): ?>
				<?php endforeach; ?>
				<?php endif; ?>

				
				
				
				
				
				<blockquote style="border-bottom:solid 1px #cecece; margin: 20px 0 0;font-size:16px">
					Grafíco de Relatório
				</blockquote>
				<div clasS="row">



					<div class="col col-sm-12 col-md-12 col-lg-6 mb-4 mt-4">

						<aside class="skeleton-aside">
							<input class="form-control" required id="nomeChart" name="nomeChart" class="mt-5" value="<?= $ChartS->get(" nome ") ?>" style="display:block;padding-left:0.6rem;font-size:14px;margin:15px;width:94% !important" type="text" placeholder="Digite o nome do Indicador">
							<div style="position: absolute; z-index: 99999999;left: 30%; top: 54%;transform: translate(-50%, -50%);" class="graficonumero"></div>
							<div style="padding:60px" class="ct-chart current-balance-container">
								<canvas id="ct-chart"></canvas>
							</div>
						</aside>
					</div>
					<div class="col col-sm-12 col-md-12 col-lg-6 mb-3 mt-4">
						<aside class="skeleton-aside-right" style="border-left:solid 1px #cecece; padding: 33px;">
        <div class="row">
         <div class="col  col-sm-12 col-md-12 col-lg-12 " style="text-align-last: center;">  
          <h5>Detalhes do Gráfico</h5>
         </div>
        <div style="text-align: center;" class="col  col-sm-2 col-md-2 col-lg-2 ">  
        <input onchange="ajaxChart()"  type="color" onchange="" id="cores" class="input-field" name="ArcoIris" list="arcoIris" type="checkbox" style="padding: none !important;border: none;width: 55px;background: transparent;" > 
      
          <datalist id="arcoIris">
            <option value="#FF0000">Vermelho</option>
            <option value="#FFA500">Laranja</option>
            <option value="#FFFF00">Amarelo</option>
            <option value="#008000">Verde</option>
            <option value="#0000FF">Azul</option>
            <option value="#4B0082">Indigo</option>
            <option value="#EE82EE">Violeta</option>
          </datalist>
          </div>
        </div>
				<center>
					<div class="row">
          <div align="center" style="text-align: center;" class="col col-sm-12 col-md-12 col-lg-12 mb-1">
						<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
              <label style="font-size:12px;">Escolha o tipo de Gráfico</label>		
								</div>
					<section class="section">
						<div class="section-content">
						<div class="row row-dashboard">
							<div  class=" col  col-sm-6 col-md-6 col-lg-3 mb-1" 	>
              <div onclick="ajaxChart(1)" class="tamanhoGrafico">
                <div id="chart-coluna" value="1" class=" coluna chart-icon">
                  <span style="font-size:40px">
                    <img width="40px" src="<?= APPURL . '/assets/images/icon/icon-barras.png'?>">
                  </span>  
									<label style="font-size:12px;display: block;">Coluna</label>
                 </div>
							</div>									
							</div>
							<div  class="active2 col  col-sm-6 col-md-6 col-lg-3 mb-1" 	>
							<div onclick="ajaxChart(2)" class="tamanhoGrafico">
               <div  id="chart-rosca"  value="2"  class="  rosca chart-icon">
                 <span style="font-size:40px">
                   <img width="40px" src="<?= APPURL . '/assets/images/icon/icon-pizza.png'?>">
                 </span>
								 <label style="font-size:12px;display: block;">Rosca</label>
                </div>
							</div>
							</div>
							<div  class="active3 col  col-sm-6 col-md-6 col-lg-3 mb-1" 	>
							<div onclick="ajaxChart(3)" class="tamanhoGrafico">
               <div  id="chart-lolipop"  value="3"  class="  lolipop chart-icon">
                 <span style="font-size:40px">
                   <img width="40px" src="<?= APPURL . '/assets/images/icon/icon-line.png'?>">
                 </span>
								 <label style="font-size:12px;display: block;">Linha</label>
                </div>
							</div>
							</div>
							<div  class="active5 col  col-sm-6 col-md-6 col-lg-3 mb-1" 	>
							<div onclick="ajaxChart(5)"    class="tamanhoGrafico">
               <div  id="chart-numero"  value="5"  class="  numero chart-icon">
                 <span style="font-size:40px">
                   <img width="40px" src="<?= APPURL . '/assets/images/icon/icon-montante.png'?>">
                 </span>
								 <label style="font-size:12px;display: block;">Montante</label>
                </div>
							</div>
							</div>	
							<div  class="active4 col  col-sm-6 col-md-6 col-lg-3 mb-1" 	>
								<div onclick="ajaxChart(4)"   class="chartDuplo  tamanhoGrafico">
               <div id="chart-comparacao"  value="4"  class=" comparacao chart-icon">
                 <span style="font-size:40px">
                    <img width="40px" src="<?= APPURL . '/assets/images/icon/icon-comparacoes.png'?>">
                 </span>
								 <label style="font-size:12px;display: block;">Barra de Comparação</label>
                </div>
							</div>
							</div>	
								<div  class="active6 col  col-sm-6 col-md-6 col-lg-3 mb-1" 	>
								<div onclick="ajaxChart(6)"   class="chartDuplo  tamanhoGrafico">
               <div id="chart-comparacao"  value="6"  class=" comparacao chart-icon">
                 <span style="font-size:40px">
                    <img width="40px" src="<?= APPURL . '/assets/images/icon/icon-porcentagem.png'?>">
                 </span>
								 <label style="font-size:12px;display: block;">Porcentagem Frete/Valor</label>
                </div>
							</div>
							</div>	
           </div>		
							
							
							
						</div>
						</section>
          </div>  
					</div>
					</center>
							<center>
								<div class="row ml-20" style="margin-top:25px">
									<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
										<label class="active" for="medida-principal">Indicador</label>
										<select onchange="indicador()" required style="width:100%" onchange="ajaxChart(1)" id="indicador" name="tarefa-principal" class="form-control  select-chart select2" id="tarefa-principal">                     
                     <option value="" selected disabled="">Selecione</option>
										<?php foreach($Indicadores->getDataAs("Indicador") as $i):?>
                     <option <?= $eixoX == $i->get("id") ? "selected" : ""?>   value="<?= $i->get("id") ?>" ><?= $i->get("nome") ?></option>
                     <?php endforeach; ?>
                  </select>
									</div>
									<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
										<label class="active" for="medida-principal">Eixo X</label>
										<select required style="width:100%" onchange="ajaxChart(1)" id="eixoX" name="grupo-principal" class="form-control select-chart select2" id="grupo-principal">                     
                     <option value="" selected disabled="">Selecione</option>
					 <option <?= $ChartS->get("eixox") == 1 ? "selected" : ""?> value="1">Responsável</option>
                     <option <?= $ChartS->get("eixox") == 2 ? "selected" : ""?>  value="2">Filial Responsável</option>                       
                  </select>
									</div>
									<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
										<label class="active" for="medida-principal">Eixo Y</label>
										<select required style="width:100%" onchange="ajaxChart(1)" id="eixoY" name="medida-principal" class="form-control select-chart select2" id="medida-principal">                 
                     <option value="" selected disabled="">Selecione</option>
																	<?php if($eixoX == 1): ?>
										 <option <?=  $eixoY == 1 ? "selected" : "" ?>   value="1">Orçamentos Aprovados</option>
										 <option <?=  $eixoY == 2 ? "selected" : "" ?>   value="2">Orçamentos Aguardando</option>
										 <option <?=  $eixoY == 3 ? "selected" : "" ?>   value="3">Orçamentos Reprovados</option>
										 <option <?=  $eixoY == 4 ? "selected" : "" ?>   value="4">Orçamentos Vencidos</option>
										 <option <?=  $eixoY == 5 ? "selected" : "" ?>   value="5">Todos Orçamentos</option>
										<?php else:  ?>
										 <option <?=  $eixoY == 1 ? "selected" : "" ?>   value="1">Aprovado</option>
										 <option <?=  $eixoY == 2 ? "selected" : "" ?>   value="2">Em Análise</option>
										 <option <?=  $eixoY == 3 ? "selected" : "" ?>   value="3">Reprovado/Vencido</option>
										 <option <?=  $eixoY == 5 ? "selected" : "" ?>   value="5">Arguadando Ação</option>
										 <option <?=  $eixoY == 6 ? "selected" : "" ?>   value="6">Separado p/ Envio</option>
										 <option <?=  $eixoY == 7 ? "selected" : "" ?>   value="7">Entregue em partes</option>
										 <option <?=  $eixoY == 8 ? "selected" : "" ?>   value="8">Despachado</option>
										 <option <?=  $eixoY == 9 ? "selected" : "" ?>   value="9">Despachado em Partes</option>
										 <option <?=  $eixoY == 10 ? "selected" : "" ?>   value="10">Em separação</option>
										 <option <?=  $eixoY == 11 ? "selected" : "" ?>   value="11">Entrega Realizada</option>
										 <option <?=  $eixoY == 12 ? "selected" : "" ?>   value="12">Todos</option>
										 <option <?=  $eixoY == 13 ? "selected" : "" ?>   value="13"></option>
										
										 <option <?=  $eixoY == 1 ? "selected" : "" ?>   value="1"></option>
										 <option <?=  $eixoY == 1 ? "selected" : "" ?>   value="1"></option>
										 <option <?=  $eixoY == 1 ? "selected" : "" ?>   value="1"></option>
										<?php endif; ?>
                  </select>
									</div>
								</div>
								<div class="row" style="border-bottom:solid 1px #cecece;margin-top:25px">
									<div class="filtros-selecionados">
										<div id="fecharData">
											<a href="javascript:void(0)" onclick="fecharData()" style="color:red; float:right;font-size:18px;margin-top:-28px">X </a>
										</div>
										<div class="row">
											<div id="datainicio" class="col col-sm-12 col-md-12 col-lg-6 mb-3">
												<input style="width:100%" onchange="ajaxChart(1)" class="dataComeco form-control" id="dataComeco" name="dataComeco" value="<?=  date('Y-m-d', strtotime('-1 month')) ?>" type="date">Inicio</input>
											</div>
											<div id="datafim" class="col col-sm-12 col-md-12 col-lg-6 mb-3">
												<input style="width:100%" onchange="ajaxChart(1)" class="dataFinal form-control" id="dataFinal" name="dataFinal" value="<?= date('Y-m-d') ?>" type="date">Fim</input>
											</div>
										</div>

									</div>

									<div id="usuarioFiltro" style="border-bottom:solid 1px;margin-top:25px; border-color:#cecece;">
										<div class="col s12 m12 l12" style="margin-top:8px"> <a onclick="fecharUser()" style="color:red; float:right;font-size:18px;margin-top:13px">X </a>
											<select style="width:100%" onchange="ajaxChart(1)" name="omitir" class="omitir select2 form-control " required id="omitir">
                            <option value="" disabled selected>Usuários Selecionados:</option>
														 <option   value="1">Excluir Usuários</option>	
														 <option   value="0">Selecionar Apenas Usuários</option>		
                          </select>
										</div>
										<div class="col s12 m12 l12" style="margin-top:8px">
											<select placeholder="Seleciones os Usuarios" style="width:100%" onchange="ajaxChart(1)" id="usuariosSelecionado" class="form-control select2 usuariosSelecionados" name="usuariosSelecionado" multiple>
                             	
															<?php foreach($ArrayUsuarios as $u): ?>
																 <option 
                                       value="<?= $u['id'] ?>"><?= $u['nome'] ." - " . $u['tipo_conta'] ?></option>
															 <?php endforeach; ?>
                            </select>
											<label class="active" for="medida-principal">Selecione os Usuários</label>
											<label class="s12 m12 l12 label" for="usuarioSelect" class="active"></label>
										</div>
									</div>
								</div>
								<div id="div-filtros-ativos" class="col col-sm-12 col-md-12 col-lg-12 mt-2 mb-3">
									<label id="add-filtros" class="add-filtros" style="position:relative; ">              
                	<span onclick="addFiltro()" id="text-filtros">+ Adicionar Filtros</span>
                </label>
								</div>
								<div class="selectFiltro" style="display:none;">
									<div class="col col-sm-12 col-md-12 col-lg-12 mt-2 mb-3" style="margin-top:8px">
										<select style="width:100%" onchange="ajaxChart(1)" id="select-filtros" class="select2 form-control select-chart" data-id="0" style="display:none">
									<option selected disabled  value="0">Selecione o Filtro</option>
									<option value="1">Data</option>
									<option id="excecoes" value="2">Exceções Usuários</option>
								</select>
									</div>
								</div>
							</center>
					<center>
		<div class="row" style="margin-bottom:5px !important">
			<?php if($ChartS->get("status") == 1): ?>
			<div class="col  col-sm-6 col-md-6 col-lg-3 ">
				<button id="statusChart" type="button" class="btn btn-info waves-light ">Desabilitar</button>
			</div>
			<?php else: ?>
			<div class="col  col-sm-6 col-md-6 col-lg-3 ">
				<button id="statusChart" type="button" class="btn btn-info waves-light ">Habilitar</button>
			</div>
			<?php endif; ?>
			<div class="col  col-sm-6 col-md-6 col-lg-3 ">
				<button onclick="excluirChart(<?= $idGrafico ?>)" type="button" class="btn btn-info waves-light ">Excluir</button>
			</div>
			<div class="col  col-sm-6 col-md-6 col-lg-3 ">
				<a href="<?= APPURL ?>"><button type="button" class="btn btn-info waves-light " >Voltar</button></a>
			</div>
			<div class="col  col-sm-6 col-md-6 col-lg-3 ">
				<button id="saveCharts" type="button" class="btn btn-info waves-light">Salvar</button>
			</div>
		</div>
	</center>
					</div>
					</aside>
				</div>







			</div>
		</div>
	</div>











	</aside>

</form>
<?php endforeach; ?>