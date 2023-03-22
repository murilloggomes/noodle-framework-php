<style>
	.modal {
		height: auto !important;
	}
	body[data-layout-color=dark] .modal-body{background:#3b444e !important;}

</style>
<div class="content-page">
	<div class="">
		
	</div>
	<div class="content">
		<!-- Start Content-->
		<div class="container-fluid">
			<!-- start page title -->
			<div class="row">
				<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
					<div class="page-title-box" hidden>
						<div class="page-title-right">
							<ol class="breadcrumb m-0">								
								<li class="breadcrumb-item"><a href="<?= APPURL . "/processos/"?>">Processos</a></li>
								<li class="breadcrumb-item active"><?= $nomeProcesso ?></li>
							</ol>
						</div>
						<h4 class="page-title"><?= $nomeProcesso ?>
							<div class="mt-2 btn-task-pos">
								
							<button type="button" class="btn btn-primary btn-sm ms-3 bs-none" data-bs-toggle="modal" data-bs-target="#funilModal">
								Adicionar fila
							</button>	
							<div class="col-lg-6 col-md-6 col-sm-6">
								
							</div>
							
 
							<div class="d-inline-block">
								<button type="button" class="btn btn-dark btnKanban bs-none invert" title="Visualização em kanban"><i class="dripicons-view-list" style="position:relative;top: 0px;right: 5px;"></i> </button>
								<button type="button" class="btn btn-dark btnLista bs-none" style="height:33px;" title="Visualização em lista"><i class="dripicons-view-list" style="position:relative;top:-1px;"></i> </button>
							</div>
						</h4>
					</div>
						
					<!-- Modal Fila Novo -->
					<div class="modal fade" id="funilModal" data-value="novo" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-xl">
							<div class="modal-content">
								<div class="modal-header">
									<h3 style="text-align:center;" class="modal-title" id="exampleModalLabel">Adicionar Funil</h3>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body paddingModal">
									<div class="row">
										<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
											<label class="active" for="">Nome</label>
											<input name="nome" type="text" class="form-control nomeFila" value="" required>
										</div>

										<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
											<label class="active" for="">Visibilidade</label>
											<select onchange="filtroUsuario();" name="visibilidade" class="form-control select2 visibilidadeFila" id="visibilidade" required>                 
												<option value="" selected disabled="">Selecione um ou mais usuários</option>
												  <optgroup label="Todos podem vê-lo">
													<option value="1">Público</option>
												</optgroup>
												<optgroup label="Somente o responsável pelo funil pode vê-lo.">
													<option value="2"> Privado </option>
												</optgroup>
												<optgroup label="Somente alguns usuários podem vê-lo.">
													<option value="3"> Por Usúario </option>
												</optgroup>
											</select>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
											<label class="active" for="">Vincular funil ao processo</label>
											<select required name="tipo" class="form-control select2 processoFila" id="">                 
													 <option value="" selected disabled="">Selecione</option>
											     <?php  foreach($Processos->getDataAs("Processo") as $p): ?>
												   <option value="<?= $p->get("id") ?>" ><?= $p->get("nome") ?></option>
												   <?php endforeach; ?>
									    </select>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-12 mb-3 userSelect" id="userSelect" hidden>
											<label class="active" for="">Informe os usuários que terão acesso a este funil:</label>
										  	<select name="resp_funil[]" class="js-multiple-select form-control select2 userFila" id="userFunil" multiple="multiple" disabled>              
											  	<?php  foreach($usuarios->getDataAs("User") as $usuario): ?>
												  <option value="<?= $usuario->get("id") ?>" ><?= $usuario->get("firstname") ?></option>
												  <?php endforeach; ?>															
											  </select>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
											<label class="active" for="">Tipo de funil</label>
											<select required name="tipo" class="form-control select2 tipoFila">                 
													 <option value="" selected disabled="">Selecione</option>
											     <?php  foreach($tiposFunis->getDataAs("TipoFunil") as $tp): ?>
												   <option value="<?= $tp->get("id") ?>" ><?= $tp->get("nome") ?></option>
												   <?php endforeach; ?>
									    </select>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
											<label class="active" for="">Responsável pelo funil</label>
										  	<select required  name="responsavel" class="form-control select2 responsavelFila" >                 
												  <option value="" selected disabled="">Selecione</option>
											  	<?php  foreach($usuarios->getDataAs("User") as $usuario): ?>
												  <option value="<?= $usuario->get("id") ?>" ><?= $usuario->get("firstname") ?></option>
												  <?php endforeach; ?>															
											  </select>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
											<label class="active" for="medida-principal">Descrição</label>
											<textarea name="descricao" class="form-control descricaoFila" style="height: 10rem;"> </textarea>
										</div>
										<div class="col col-sm-12 col-md-6 col-lg-5 mb-3">
											<div class="form-check form-switch">
												<input name="empresaExibe" class="form-check-input exibeEmpresaFila" type="checkbox">
												<label class="form-check-label" for="flexSwitchCheckDefault">Mostrar empresa na tela da oportunidade</label>
											</div>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-5 mb-3">
											<div class="form-check form-switch">
												<input name="pessoaExibe" class="form-check-input exibePessoaFila" type="checkbox">
												<label class="form-check-label" for="flexSwitchCheckDefault">Mostrar pessoa na tela da oportunidade </label>
											</div>
										</div>
										<div class="col col-sm-1 col-md-1 col-lg-1 mb-3">
                      <label for="example-color" class="form-label">Cor</label>
                      <input class="form-control corFila" type="color" name="cor" value="">
                    </div>
									</div>
								</div>
								<div class="modal-footer">
									<input class="inputId" name="idFila" value="0" type="hidden">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
									<button type="button" class="btn btn-primary enviarForm">Adicionar</button>
								</div>
							</div>
						</div>
					</div>
				<!--  Modal Fila Edit	-->
						<?php foreach($Funis->getDataAs("Fila") as $f): ?>
						<div class="modal fade modalEditFila" id="modalFilaEdit<?= $f->get("id"); ?>" data-value="edit" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-xl">
						<div class="modal-content">
								<div class="modal-header">
									<h3 style="text-align:center;" class="modal-title" id="exampleModalLabel">Edição de Funil</h3>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body paddingModal">
									<div class="row">
										<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
											<label class="active" for="">Nome</label>
											<input  name="nome" type="text" class="form-control nomeFila" value="<?=$f->get("nome");?>" required>
										</div>

										<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
											<label class="active" for="">Visibilidade</label>
											<select onchange="filtroUsuario();" name="visibilidade" class="form-control select2 visibilidadeFila" id="visibilidade" required>                 
												<option value="" selected disabled="">Selecione um ou mais usuários</option>
												  <optgroup label="Todos podem vê-lo">
													<option <?php $f->get("visibilidade_fila") == "1" ? "selected" : ""  ?> value="1">Público</option>
												</optgroup>
												<optgroup label="Somente o responsável pelo funil pode vê-lo.">
													<option <?php $f->get("visibilidade_fila") == "2" ? "selected" : ""  ?> value="2"> Privado </option>
												</optgroup>
												<optgroup label="Somente alguns usuários podem vê-lo.">
													<option <?php $f->get("visibilidade_fila") == "3" ? "selected" : ""  ?> value="3"> Por Usúario </option>
												</optgroup>
											</select>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-6 <mb></mb>-3">
											<label class="active" for="">Vincular funil ao processo</label>
											<select required name="tipo" class="form-control select2 processoFila" id="">                 
													 <option value="" selected disabled="">Selecione</option>
											     <?php  foreach($Processos->getDataAs("Processo") as $p): ?>
												   <option <?= $p->get("id") == $f->get("processo") ? "selected" : "" ?> value="<?= $p->get("id") ?>" ><?= $p->get("nome") ?></option>
												   <?php endforeach; ?>
									    </select>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-12ve mb-3 userSelect" id="userSelect" hidden>
											<label class="active" for="">Informe os usuários que terão acesso a este funil:</label>
										  	<select  name="resp_funil[]" class="js-multiple-select form-control select2 userFila" id="userFunil" multiple="multiple" disabled>               
											  	<?php  foreach($usuarios->getDataAs("User") as $usuario): ?>
												  <option value="<?= $usuario->get("id") ?>" ><?= $usuario->get("firstname") ?></option>
												  <?php endforeach; ?>															
											  </select>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
											<label class="active" for="">Tipo de funil</label>
											<select required name="tipo" class="form-control select2 tipoFila" id="">                 
													 <option value="" selected disabled="">Selecione</option>
											     <?php  foreach($tiposFunis->getDataAs("TipoFunil") as $tp): ?>
												   <option <?= $tp->get("id") == $f->get("tipo_funil") ? "selected" : "" ?> value="<?= $tp->get("id") ?>" ><?= $tp->get("nome") ?></option>
												   <?php endforeach; ?>
									    </select>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
											<label class="active" for="">Responsável pelo funil</label>
										  	<select required  name="responsavel" class="form-control select2 responsavelFila" >                 
												  <option selected disabled="">Selecione</option>
											  	<?php  foreach($usuarios->getDataAs("User") as $usuario): ?>
												  <option <?= $usuario->get("id") == $f->get("responsavel_funil") ? "selected" : "" ?> value="<?= $usuario->get("id") ?>" ><?= $usuario->get("firstname") ?></option>
												  <?php endforeach; ?>															
											  </select>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
											<label class="active" for="medida-principal">Descrição</label>
											<textarea name="descricao" class="form-control descricaoFila" style="height:10rem;"><?=$f->get("descricao");?> </textarea>
										</div> 
										<div class="col col-sm-12 col-md-6 col-lg-5 mb-3">
											<div class="form-check form-switch">
												<input <?= $f->get("exibe_empresa") == "true" ? "checked" : "" ?> name="empresaExibe" class="form-check-input exibeEmpresaFila" type="checkbox">
												<label class="form-check-label" for="flexSwitchCheckDefault" >Mostrar empresa na tela da oportunidade</label>
											</div>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-5 mb-3">
											<div class="form-check form-switch">
												<input <?= $f->get("exibe_pessoa") == "true" ? "checked" : "" ?> name="pessoaExibe" class="form-check-input exibePessoaFila" type="checkbox">
												<label class="form-check-label" for="flexSwitchCheckDefault">Mostrar pessoa na tela da oportunidade </label>
											</div>
										</div>
<!-- 										<div class="col col-sm-1 col-md-1 col-lg-1 mb-3">
                      <label for="example-color" class="form-label">Cor</label>
                      <input class="form-control corFila" type="color" name="cor" value="<?= $f->get("cor"); ?>">
                    </div> -->
									</div>
								</div>
								<div class="modal-footer">
									<input class="inputId" name="idFila" value="<?= $f->get("id") ?>" type="hidden">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
									<button type="button" class="btn btn-primary enviarForm">Adicionar</button>
								</div>
							</div>
						</div>
					</div>
						<?php endforeach; ?>
						
				<div class="modal fade" id="modalTask" aria-hidden="true" aria-labelledby="modalTaskLabel" tabindex="-1">
						<div class="modal-dialog modal-dialog-centered modal-xl">
						<div class="modal-content">
								<div class="modal-header">
									<h3 style="text-align:center;" class="modal-title">Oportunidade</h3>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
		
								<div class="modal-body paddingModal tab-pane show active" id="geral">
									<div class="row">
										<div class="col col-sm-12 col-md-4 col-lg-3 mb-3">
											<label class="active" for="">ID oportunidade</label>
											<input id="idOportunidade"  name="idOportunidade" type="text" class="form-control" value="" readonly>
										</div>
										<div class="col col-sm-12 col-md-4 col-lg-3 mb-3">
											<label class="active" for="">Título</label>
											<input id="nomeTarefa"  name="nomeTarefa" type="text" class="form-control nomeTarefa" value="" required>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
											<label class="active" for="">Cliente</label>
											<select id="clienteTarefa"  required  name="filaTarefa" class="form-control select2 clienteTarefa" required>                 
												  <option selected disabled="">Selecione</option>
											  	<?php  foreach($clientes->getDataAs("Cliente") as $c): ?>
												  <option value="<?= $c->get("id") ?>" ><?= $c->get("nome") ?></option>
												  <?php endforeach; ?>															
											  </select>
										</div>
										
										<div class="col col-sm-12 col-md-4 col-lg-3 mb-3">
											<label class="active" for="">Valor da oportunidade</label>
											<input id="valorTarefa" onKeyPress="return(moeda(this,'.',',',event))" onkeypress="onlynumberfull();" maxlength="25" name="valorOportunidade" type="text" class="form-control valorTarefa" value="" required>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-3 mb-3">
											<label class="active" for="">Data de conclusão</label>
											<input id="dataTarefa" name="dataConclusao" class="form-control dataConclusao" type="date" value="" required>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
											<label class="active" for="">Vincular tarefa a fila</label>
											<select id="filaTarefa"  required  name="filaTarefa" class="form-control select2 filaTarefa" required>                 
												  <option selected disabled="">Selecione</option>
											  	<?php  foreach($Funis->getDataAs("Fila") as $fila): ?>
												  <option <?= $fila->get("id") ?> value="<?= $fila->get("id") ?>" ><?= $fila->get("nome") ?></option>
												  <?php endforeach; ?>															
											  </select>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
											<label class="active" for="medida-principal">Descrição</label>
											<textarea id="descricaoTarefa" name="descricaoTarefa" class="form-control descricaoTarefa" style="height:10rem;"></textarea>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
											<label class="active" for="">Usuários envolvidos</label>
											<select id="responsavelTarefa"    name="responsavelTarefa[]" class="form-control select2 responsavelTarefa" multiple required>
												  <option selected disabled="">Selecione</option>
											  	<?php  foreach($usuarios->getDataAs("User") as $usuario): ?>
												  <option <?= $usuario->get("id")  ?> value="<?= $usuario->get("id"); ?>" ><?= $usuario->get("firstname"); ?></option>
												  <?php endforeach; ?>															
											  </select>
										</div>
										<div class="col col-sm-3 col-md-3 col-lg-6 mb-3">
                      <label for="example-color" class="active">Tag</label>
                      <select class="form-control tag select2"   type="text" id="tagTarefa" name="tagTarefa" list="tags" value="">
                        <option  disabled selected>Selecione</option>
													<?php foreach($tags->getDataAs("Tag") as $tag): ?>
													<option data-value="<?= $tag->get("cor"); ?>" value="<?= $tag->get("id") ?>"> <?= $tag->get("nome"); ?></option>
													<?php endforeach; ?>
											</select>
                    </div>
									</div>
								</div>
								<div class="modal-footer">
									<input class="idTarefa" id="idTarefa" value="" hidden>
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
									<button type="button" data-bs-dismiss="modal" class="btn btn-primary addTarefa">Adicionar</button>
								</div>
							</div>
						</div>
					</div>
                                         
<!-- 				</div>
			</div> -->
			<!-- end page title -->
			<div class="row">
				<div class="col-12">
					<div class="board sortable" data-plugin="dragula" id="filaArea" >
						<?php $filasProcesso = $Funis->getDataAs("Filas");  ?>
						<?php if(empty($filasProcesso)): ?>
						<div class="alert alert-info alert-dismissible col-sm-12 col-md-12 col-lg-12" role="alert"><i style="position:relative;bottom:1px;"class="dripicons-information me-2"></i>
							Desculpe! Não há nenhuma fila cadastrado para esse processo! 
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						<?php endif; ?>
					<?php foreach($Funis->getDataAs("Fila") as $f): ?>
					<?php	$criador = $f->get("criador"); ?>
					<?php $cor = $f->get("cor"); ?>
					<div class="tasks hoverOportunidade boardKanban" data-value="<?= $f->get("id"); ?>" data-id="btnTask<?= $f->get("id") ?>">
						<h6 class="mt-0 task-header" id="tituloFila<?=$f->get("id");?>"><?= $f->get("nome"); ?></h6>
									<div class="dropdown mt-0 fila_options">
										<a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
										 <i class="mdi mdi-dots-vertical font-18"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-end">
											<!-- item-->
											<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" id="editarFila" data-bs-target="#modalFilaEdit<?= $f->get("id")?>"><i class="mdi mdi-pencil me-1"></i>Editar</a>
											<!-- item-->
											<a href="javascript:void(0);" class="dropdown-item deletarFila" data-id="<?= $f->get("id");?>"><i class="mdi mdi-delete me-1"></i>Remover Fila</a>
											<!-- item-->
<!-- 											<a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Adicionar usuário</a> -->
											<!-- item-->
<!-- 											<a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Sair</a> -->
										</div>
									</div>
						
							
						<div class="filaTask sortable" id="filaTask<?= $f->get("id") ?>">
						
					<ul style="list-style: none;margin-left: -14%;" id="<?=$f->get("id");?>" class="items">
						
						<?php
						$arrayFila = tarefas($f->get("id"),$AuthUser->get("id"),$AuthUser->get("account_type"),$f->get("responsavel_funil"));
						if($arrayFila != null):
						?>
						
						<?php foreach($arrayFila as $t): ?>
						<?php $taskcor = $t["cor"]; ?>
						<?php $responsavel = $t["responsavel"];?>
						
						<?php $arrayCliente = clienteTask($t["cliente"]); ?>
						<?php $arrayTag = tagsTask($t['tag']); ?>
						<?php $arrayAtividade = atividadeTask($t['atividade']) ?>

						<li id="<?= $t["id"] ?>" class="list">
							<div id="task-list-" data-id="" class="task-list-items">
								<div class="card mb-0 task-width ribbon-box">
									<div class="card-body p-1">
										<div class="mb-1">
										<?php if(isset($arrayTag)): ?>
										<?php foreach($arrayTag as $tag): ?>
										<span class="badge badge-effect" title="<?= $tag['descricao']; ?>" style="background-color:<?= $tag['cor']; ?>;"><?= $tag['nome']; ?></span>
										<?php endforeach; ?>
										<?php else: ?>
											<span class="badge badge-effect" title="" style="background-color:transparent;">.</span>	
										<?php endif; ?>
										
										<?php if(isset($arrayAtividade)): ?>
										<?php foreach($arrayAtividade as $atividade): ?>
										<a href="<?= APPURL."/oportunidade/".$t['id'] ?>" >
											<span class="badge badge-effect2" title="<?= $atividade['descricao'] ?>" style="background-color:orange;">
											<i class="mdi mdi-pencil-plus i_badge"></i>
											<?= $atividade['titulo'] ?>
											</span>
											</a>
										<?php endforeach; ?>
										<?php else: ?>
										<a href="<?= APPURL."/oportunidade/".$t['id'] ?>">
										<span class="badge badge-effect2" title="Não há atividades em aberto para esta tarefa/oportunidade" style="background: orange; "><i class="mdi mdi-pencil i_badge"></i>Não há atividades</span>
										</a>
										<?php endif; ?>
										</div>
										<?php if($t['status'] == "2"): ?>
										<div class="ribbon ribbon-success float-end fst-italic">
											<i class="mdi mdi-check-bold" style="margin-right: 3px;"></i>Ganho
										</div>
										<?php elseif($t['status'] == "3"): ?>
										<div class="ribbon ribbon-danger float-end fst-italic">
											<i class="mdi mdi-close-thick" style="margin-right: 3px;"></i>Perdido
										</div>
										<?php endif; ?>
										<h5 class="mt-2 mb-2">
											<a  onclick="edicaoTarefa(<?= $t["id"] ?>)" data-bs-toggle="modal" data-bs-target="#modalTask" href="#" id="taskNome<?=$t["id"]; ?>" class="text-body"><?= $t["nome"]; ?></a>
										</h5>
										<div class="mb-1 task-card-box">
										<?php if(isset($arrayCliente)): ?>
										<?php foreach($arrayCliente as $c): ?>
													<?php $nomeCliente = consultarId("Cliente" , $t["cliente"]); ?>
											<div class="task-card-content" title="Cliente: <?= $nomeCliente; ?> ">
													<i style="font-size:14px;" class="mdi mdi-account-arrow-right text-muted"></i>
												<?php if($t["cliente"] != 0): ?>
											<span class="pe-2 text-nowrap d-inline-block fsize-small">
												  <?= mb_strimwidth($nomeCliente, 0, 25, "..") ?>
											</span>
												<?php else: ?>
												<span class="pe-2 text-nowrap d-inline-block fsize-small">
													Não informado
											</span>
												<?php endif; ?>
											</div>
											<div class="task-card-content" title="telefone de contato: <?= $c["telefone"];?>">
													<i style="font-size:14px;" class="mdi mdi-phone text-muted"></i>
											<?php if($c["telefone"] != null): ?>
											<span class="pe-2 text-nowrap d-inline-block fsize-small">
													<?= $c["telefone"]; ?>
											</span>
												<?php else: ?>
											<span class="pe-2 text-nowrap d-inline-block fsize-small">
													Não informado
											</span>
												<?php endif; ?>
											</div>
											<div class="task-card-content" title="E-mail: <?= $c["email"]; ?>">
													<i style="font-size:14px;" class="mdi mdi-email text-muted"></i>
											<?php if($c["email"] != null): ?>
											<span class="pe-2 text-nowrap d-inline-block fsize-small">
													<?= $c["email"]; ?>
											</span>
												<?php else: ?>
												<span class="pe-2 text-nowrap d-inline-block fsize-small">
													Não informado
											</span>
												<?php endif; ?>
											</div>
											<div class="task-card-content" title="Local da oportunidade: <?= $c["cidade"] . " - " . $c["uf"]; ?>">
													<i style="font-size:14px;" class="mdi mdi-map-marker text-muted" title="Local da oportunidade"></i>
											<span class="pe-2 text-nowrap d-inline-block fsize-small">
													<?= $c["cidade"] . " - " . $c["uf"]; ?>
											</span>
											</div>
										<?php endforeach; ?>
										<?php else: ?>
										<div class="task-card-content" title="Cliente da oportunidade">
												<i style="font-size:14px;" class="mdi mdi-account-arrow-right text-muted"></i>
											<span class="pe-2 text-nowrap d-inline-block fsize-small">
												Não informado
										</span>
										</div>
										<div class="task-card-content" title="telefone de contato">
												<i style="font-size:14px;" class="mdi mdi-phone text-muted"></i>
										<span class="pe-2 text-nowrap d-inline-block fsize-small">
												Não informado
										</span>
										</div>
										<div class="task-card-content" title="E-mail">
												<i style="font-size:14px;" class="mdi mdi-email text-muted"></i>
											<span class="pe-2 text-nowrap d-inline-block fsize-small">
												Não informado
										</span>
										</div>
										<div class="task-card-content" title="Cidade">
												<i style="font-size:14px;" class="mdi mdi-map-marker text-muted" title="Local da oportunidade"></i>
										<span class="pe-2 text-nowrap d-inline-block fsize-small">
												Não informado
										</span>
										</div>
										<?php endif; ?>
											<div class="task-card-content" title="Valor da oportunidade: <?= formatarPreco($t["valor"]); ?>">
													<i style="font-size:14px;" class="mdi mdi-cash-multiple text-muted"></i>
												<?php if($t["valor"] != ""): ?>
											<span class="pe-2 text-nowrap d-inline-block fsize-small">
													<?= formatarPreco($t["valor"]) ?>
											</span>
												<?php else: ?>
													<span class="pe-2 text-nowrap d-inline-block fsize-small">
												Não informado
										</span>
												<?php endif; ?>
											</div>
											<div class="task-card-content" title="Data de criação: <?= date("d/m/Y H:m:s", strtotime($t["data_criacao"])) ?>">
													<i style="font-size:14px;" class="mdi mdi-calendar-clock-outline text-muted" title="previsão de conclusão"></i>
											<span class="pe-2 text-nowrap d-inline-block fsize-small" >
													<?= date("d/m/Y H:m:s", strtotime($t["data_criacao"]))  ?>
											</span>
											</div>
											<div class="task-card-content" title="Última modificação: <?= date("d/m/Y H:m:s", strtotime($t["data_previsao"]))  ?>">
													<i style="font-size:14px;" class="mdi mdi-calendar-edit text-muted" title="Última alteração"></i>
											<span class="pe-2 text-nowrap d-inline-block fsize-small">
													<?= date("d/m/Y H:m:s", strtotime($t["data_previsao"])) ?>
											</span>
											</div>
										</div>
										<div class="dropdown float-end">
											<a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
											 <i class="mdi mdi-dots-vertical font-18"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-end">
												<a href="<?= APPURL."/oportunidade/".$t['id'] ?>" class="dropdown-item"><i class="mdi mdi-eye me-1"></i>Ver oportunidade</a>
												<a onclick="edicaoTarefa(<?= $t["id"] ?>)" data-bs-toggle="modal" data-bs-target="#modalTask" href="#" id="taskNome<?=$t["id"]; ?>" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Editar tarefa</a>
												<a href="javascript:void(0);" class="dropdown-item deletarTarefa" data-id="<?= $t["id"];?>"><i class="mdi mdi-delete me-1"></i>Remover tarefa</a>
<!-- 												<a href="javascript:void(0);" class="dropdown-item concluirTarefa"><i class="mdi mdi-clipboard-check-multiple me-1"></i>Concluir tarefa</a> -->
	<!-- 									<a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Adicionar usuário</a> -->
	<!-- 									<a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Sair</a> -->
											</div>
										</div>
										<p class="mb-0">
											<?php if(file_exists("assets/images/usuarios/$responsavel.jpg")): ?>
											<img src="<?= APPURL . "/assets/images/usuarios/$responsavel.jpg "?>" class="avatar-xs rounded-circle me-1" title="Envolvidos" />
											<?php else: ?>
											<img src="<?= APPURL . "/assets/images/usuarios/no-image.jpg "?>" class="avatar-xs rounded-circle me-1" title="Envolvidos" />
											<?php endif; ?>
											<span class="align-middle fsize-secundaria"><?= nomeCriador($t["responsavel"]); ?></span>
										</p>
									</div>
								</div>
							</div>
						</li>
						<?php endforeach; ?>
						<?php else: ?>
						<li style="height:110px" id="sem<?= $f->get("id") ?>" class="list"></li>
						<?php endif; ?>
							<div id="semTarefa<?= $f->get("id") ?>">
						</div>
							</ul>
						</div>
						<div class="mb-1"></div>
					</div>
					<!-- 		Lista			 -->
					<?php endforeach; ?>
				<span id="elementoFila"></span>
					</div>
<!-- 					<button type="submit" id="mForm">Salva</button>
					 -->
					<!-- end .board-->
				</div>
				<!-- end col -->
			</div>
			<!-- end row-->
		</div>
		<!-- container -->
	</div>
	<!-- content -->
</div>