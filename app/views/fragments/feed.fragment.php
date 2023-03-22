<!-- <style>
	.modal {
		height: auto !important;
	}
</style> -->
<div class="content-page">
	<div class="content">
		<!-- Start Content-->
		<div class="container-fluid mt-2">
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-body">
							<h4 class="header-title mb-3"> Dados da oportunidade</h4>
							<form>
								<div id="basicwizard">
									<ul class="nav nav-pills nav-justified form-wizard-header mb-4">
										<li class="nav-item ">
											<a href="#basictab1" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2 active "> 
													<i class="mdi mdi-account-circle font-18 align-middle me-1"></i>
													<span class="d-none d-sm-inline">Notas</span>
											</a>
										</li>
										<li class="nav-item">
											<a onclick="tabelaAtividade()" href="#basictab2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
													<i class="mdi mdi-text-box-outline font-18 align-middle me-1"></i>
													<span class="d-none d-sm-inline">Atividades</span>
											</a>
										</li>
										<li class="nav-item">
											<a onclick="tabelaArquivos()" href="#basictab3" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
													<i class="mdi mdi-file font-18 align-middle me-1"></i>
													<span class="d-none d-sm-inline">Arquivos</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="#basictab4" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
													<i class="mdi mdi-email font-18 align-middle me-1"></i>
													<span class="d-none d-sm-inline">E-mails</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="#basictab5" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
													<i class="mdi mdi-timeline-check font-18 align-middle me-1"></i>
													<span class="d-none d-sm-inline">Histórico</span>
											</a>
										</li>
									</ul>
									<div class="tab-content b-0 mb-0">
										<div class="tab-pane active" id="basictab1">
											<div class="row">
												<div class="col-12">
													<div class=" mb-3">
														<a href="javascript:void(0);" onclick="exibiEditorNota()" class="btn btn-info">Aicionar Nota<i class="mdi mdi-plus ms-1"></i></a>
													</div>
													<div class=" mb-3" onchange="editorNotas()" id="snow-editor" style="height: 300px;"></div>
													<div id="botaoEditor" class=" mb-3">
														<a href="javascript:void(0);" onclick="exibiEditorNota()" class="btn btn-danger">Cancelar</a>
														<a href="javascript:void(0);" onclick="editorNotas()" class="btn btn-success">Salvar</a>
													</div>
													<div id="notaPrint" class="row ">
														<?php foreach($Notas->getDataAs("Nota") as $n): ?>
														<div style="background:#eef2f7 ; border-color:#1d232b26!important" class="card border-primary border">
															<div class="card-body">
																<?=  $n->get("texto") ?>
															</div>
															<div class="col-12 sm-12 md-12 lg-12">
																<?php $diferenca = strtotime(date("Y-m-d H:i:s")) - strtotime(date("Y-m-d H:i:s", strtotime($n->get("data_criacao")))); $dias = floor($diferenca / (60 * 60 * 24)); 	?>
																<?php if($dias == 0): ?>
																<span class="d-none d-sm-inline">Hoje</span></br>
																<?php else: ?>
																<span class="d-none d-sm-inline"><?= $dias . " dias atrás."?></span></br>
																<?php endif; ?>
																<b>	<?= date("d/m/Y H:m:s", strtotime($n->get("data_criacao")))?></b>
																<b style="float: right;"><?= nomeCriador($n->get("criador")) ?></b>
															</div>
														</div>
														<?php endforeach; ?>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="basictab2">
											<div class="mb-3">
												<button type="button" class="btn btn-secondary" onclick="modalAtividade(0)" data-dismiss="modal">Adicionar Atividade</button>
											</div>
											<div class="col-12">
												<div class="modal-body paddingModal" id="divAtividade">
													<div class="mb-3">
														<h3> Registro de Atividade</h3>
													</div>
													<form>
														<div class="row">
															<input id="idAtividade" type="hidden">
															<div class="col col-sm-12 col-md-12 col-lg-3 mb-3">
																<label class="active" for="">Situação da Atividade</label>
																<select id="statusATIVIDADE" name="tipo" class="select2 form-control">              <option selected disabled value="" >Selecione</option>
																		<option value="1" >A fazer</option>
																		<option value="2" >Iniciar</option>
																		<option value="3" >Pausar</option>
																		<option value="4" >Concluido</option>
																</select>
															</div>
															<div class="col col-sm-12 col-md-12 col-lg-3 mb-3">
																<label class="active" for="">Usuario</label>
																<select id="usuario" name="usuario" class=" select2 form-control">  
										      <option selected disabled value="" >Selecione</option>	 	
										<?php foreach($Usuarios->getDataAs("User") as $U): ?>
										         <option value="<?= $U->get("id") ?>" ><?= $U->get("firstname") ?></option>
										     <?php endforeach; ?>
										</select>
															</div>
															<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
																<label class="active" for="">Título</label>
																<input id="titulo" name="titulo" type="text" class="form-control nomeFila" value="">
															</div>
															<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
																<label class="active" for="">Descrição</label>
																<textarea id="descricao" rows="5" cols="33" name="descricao" type="text" class="form-control nomeFila" value=""></textarea>
															</div>
															<div class="col col-sm-12 col-md-12 col-lg-4 mb-3">
																<label class="active" for="">Inicio da atividade</label>
																<input id="inicio" name="inicio" type="datetime-local" class="form-control nomeFila" value="" readonly>
															</div>
															<div class="col col-sm-12 col-md-12 col-lg-4 mb-3">
																<label class="active" for="">Fim da atividade</label>
																<input id="fim" name="fim" type="datetime-local" class="form-control nomeFila" value="" readonly>
															</div>
															<div class="col col-sm-12 col-md-12 col-lg-4 mb-3">
																<label class="active" for="">Duração</label>
																<input id="duracao" name="duracao" type="text" class="form-control nomeFila" value="" readonly>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" onclick="toogleAtividade()" data-dismiss="modal">Fechar</button>
															<button type="button" onclick="salvarAtividade()" class="btn btn-primary">Salvar</button>
														</div>
													</form>
												</div>
												<div class="col-12">
													<table id="tabelaAtividade" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
														<thead>
															<tr>
																<th>ID</th>
																<th>Responsável</th>
																<th>Título</th>
																<th>Descrição</th>
																<th>Situação</th>
																<th>Data Cadastro </th>
																<th>Data Inicio</th>
																<th>Data Conclusão</th>
																<th>Duração</th>
																<th>Ação</th>

															</tr>
														</thead>
														<tbody>
															<?php foreach($AtividadesT->getDataAs("Atividade") as $a): ?>
															<?php $IDa =  $a->get("id");
										 $idResponsavel =  $a->get("responsavel");

									switch ($a->get("tipo_atividade")){
									 case 1:
											 $statusAtividade = "A fazer";
											 break;
									 case 2:
											 $statusAtividade = "Iniciado";
											 break;
									 case 3:
											 $statusAtividade = "Pausado";
											 break;

									 case 4:
											 $statusAtividade = "Concluido";
											 break;

									}
									?>
															<tr>
																<th>
																	<?= $a->get("id") ?>
																</th>
																<th>
																	<?= nomeCriador($idResponsavel) ?>
																</th>
																<th>
																	<?= $a->get("titulo") ?>
																</th>
																<th class="text-wrap">
																	<?= $a->get("descricao") ?>
																</th>
																<th>
																	<?= $statusAtividade ?>
																</th>
																<th>
																	<?= date("d/m/Y H:i:s", strtotime($a->get("data_criacao")))?>
																</th>
																<th>
																	<?= $a->get("data_inicio") == "0000-00-00 00:00:00" ? "" : date("d/m/Y H:i:s", strtotime($a->get("data_inicio"))) ?>
																</th>
																<th>
																	<?= $a->get("data_conclusao") == "0000-00-00 00:00:00" ? "" : date("d/m/Y H:i:s", strtotime($a->get("data_conclusao")))  ?>
																</th>
																<th>
																	<?= $a->get("duracao") ?>
																</th>
																<th> <button onclick="modalAtividade(<?= $IDa ?>)" style='background: transparent; border: none;' type='button' onclick="toogleAtividade()">		<i class='mdi mdi-pencil' aria-hidden='true'></i></button>
																	<a href='javascript:void(0)' onclick='removerAtividade(<?= $IDa ?>)' class='tooltipped' data-type='User' data-position='top' data-tooltip='Remover'><i class='mdi mdi-close-circle' aria-hidden='true'></i></a>
																</th>
															</tr>
															<?php endforeach; ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>

										<div class="tab-pane" id="basictab3">
											<div class="row">
												<div class="col-12">
													<form enctype="multipart/form-data" action="<?= APPURL . " /oportunidade/ " . $idRota ?>" method="POST">
														<input type="hidden" name="action" value="salvarArquivo">
														<div class="col-12 sm-12 md-12 lg-6">
															<input type="file" name="uploadArquivos" id="uploadArquivos" class="dropify" data-height="100" />
															<div class="col-12 sm-12 md-12 lg-12 mt-2 mb-3">
																<button style="width: 100%; border-radius: 10px;" class="btn btn-primary">Enviar Arquivo</button>
															</div>
														</div>
													</form>
													<form enctype="multipart/form-data" action="<?= APPURL . " /oportunidade/ " . $idRota ?>" method="POST">
														<input type="hidden" name="action" value="donwloadPasta">
														<div class="col-12 sm-12 md-12 lg-6">
															<div class="col-12 sm-12 md-12 lg-12 mt-2 mb-3">
																<button style=" border-radius: 2px;" class="btn btn-primary">Baixar Todos</button>
															</div>
														</div>
													</form>
													<table id="tabelaArquivos" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
														<thead>
															<tr>
																<th>ID</th>
																<th>Responsável</th>
																<th style="    width: 67px;
    position: relative;" class="text-wrap">Prévia</th>
																<th class="text-wrap">Nome do arquivo</th>
																<th>Ação</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach($Arquivos->getDataAs("Arquivo") as $ar): ?>
															<?php $IDa =  $ar->get("id");$idResponsavel =  $ar->get("responsavel");?>
															<tr>
																<form enctype="multipart/form-data" action="<?= APPURL . " /oportunidade/ " . $idRota ?>" method="POST">
																	<input type="hidden" name="action" value="downloadAquivoUnico">
																	<input type="hidden" name="nomeArquivo" value="<?= $ar->get(" nome_arquivo ") ?>">
																	<th>
																		<?= $IDa ?>
																	</th>
																	<th>
																		<?= nomeCriador($idResponsavel) ?>
																	</th>
																	<th>
																		<?php if(stripos($ar->get("nome_arquivo"), ".pdf")): ?>
																		<div class="zoom-gallery">
																			<a class="iframe-popup " href="<?= APPURL." /assets/uploads/ ".$idRota."/ ".$ar->get("nome_arquivo ") ?>">
															 <div style="z-index:99999999";  class="iframe-popup form-label" src="<?= APPURL."/assets/uploads/".$idRota."/".$ar->get("nome_arquivo") ?>" >
																<button style="background: transparent; border: none;" class="form-label">
																		<embed class="iframe-popup " src="<?= APPURL."/assets/uploads/".$idRota."/".$ar->get("nome_arquivo") ?>" style="width:50%;margin-top:8px;height:68px;"></br>                          
															  </button>
															</div>
														</a>
																		</div>
																		<?php else: ?>
																		<div class="zoom-gallery">
																			<a href="<?= APPURL." /assets/uploads/ ".$idRota."/ ".$ar->get("nome_arquivo ") ?>" title="Cotação 1">
                            <img style="height:68px;" style="border-radius:20px;" src="<?= APPURL."/assets/uploads/".$idRota."/".$ar->get("nome_arquivo") ?>" alt="Cotação 1">                  
	                         </a>
																		</div>
																		<?php endif; ?>
																	</th>
																	<th>
																		<?= $ar->get("nome_arquivo") ?>
																	</th>
																	<th><button style="background: transparent; border: none;font-size:19px; " class='tooltipped' data-type='User' data-position='top' data-tooltip='Download'><i class='mdi mdi-arrow-down-bold	' aria-hidden='true'></i></button>
																		<a style="font-size:19px;" href='javascript:void(0)' onclick='removerAtividade(<?= $IDa ?>)' class='tooltipped' data-type='User' data-position='top' data-tooltip='Remover'><i class='mdi mdi-close-circle' aria-hidden='true'></i></a>
																	</th>

																</form>
															</tr>
															<?php endforeach; ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="tab-pane " id="basictab4">
											<div class="row">
												<div class="col-12">
													Criar Email

												</div>
												<!-- end col -->
											</div>
											<!-- end row -->
											<ul class="list-inline wizard mb-0">
												<li class="next list-inline-item float-end">
													<a href="javascript:void(0);" class="btn btn-info">Add More Info <i class="mdi mdi-arrow-right ms-1"></i></a>
												</li>
											</ul>
										</div>
					
										<!-- 	Historico -->
										<div class="tab-pane" id="basictab5">
											<div class="content">

												<!-- Start Content-->
												<div class="container-fluid">
													<!-- end page title -->
													<div class="row">
														<div class="col-12">
															<div class="timeline" dir="ltr">
																<div class="timeline-show mb-3 text-center">
																	<h5 class="m-0 time-show-name">Recente</h5>
																</div>
																<div class="timeline-lg-item timeline-item-left">
																	<div class="timeline-desk">
																		<div class="timeline-box">
																			<span class="arrow-alt"></span>
																			<span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
																			<h4 class="mt-0 mb-1 font-16">Nota adicionada</h4>
																			<p class="text-muted"><small>08/11/2022</small></p>
																			<p> </p>

																		</div>
																	</div>
																</div>

																<div class="timeline-lg-item timeline-item-right">
																	<div class="timeline-desk">
																		<div class="timeline-box">
																			<span class="arrow"></span>
																			<span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
																			<h4 class="mt-0 mb-1 font-16">Um e-mail enviado foi visualizado</h4>
																			<p class="text-muted"><small>03/11/2022</small></p>
																			<p>O e-mail de assunto CICLO CAIRU CICLO CAIRU LTDA 50.000,00 23/08/2021 foi visualizado pelo destinatário dhiego.silva@horustelecom.com.br. </p>
																		</div>
																	</div>
																</div>

																<div class="timeline-show my-3 text-center">
																	<h5 class="m-0 time-show-name">Ontem</h5>
																</div>

																<div class="timeline-show my-3 text-center">
																	<h5 class="m-0 time-show-name">Outubro</h5>
																</div>

<!-- 																<div class="timeline-lg-item timeline-item-right">
																	<div class="timeline-desk">
																		<div class="timeline-box">
																			<span class="arrow"></span>
																			<span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
																			<h4 class="mt-0 mb-1 font-16">Join new team member Alex Smith</h4>
																			<p class="text-muted"><small>10 December, 2018</small></p>
																			<p>Alex Smith is a Senior Software (Full Stack) engineer with a deep passion for building usable, functional & pretty web applications. </p>
																			<div class="d-flex">
																				<img src="assets/images/users/avatar-3.jpg" alt="Arya S" class="rounded-circle me-2" height="24">
																				<div>
																					<h5 class="mt-1 font-14 mb-0">
																						Alex Smith <small>- Senior Software (Full Stack)</small>
																					</h5>
																				</div>
																			</div>
																		</div>
																	</div>
																</div> -->

																

															</div>
															<!-- end timeline -->
														</div>
														<!-- end col -->
													</div>
													<!-- end row -->

												</div>
												<!-- container -->
											</div>
											<!-- content -->
											<!-- end Footer -->
											<!-- end row -->
										</div>
										<!-- container -->

									</div>

								</div>
								<!-- content -->
						</div>
					</div>


				</div>
				<!-- content -->
			</div>
		</div>
	</div>
	<!-- content -->
</div>