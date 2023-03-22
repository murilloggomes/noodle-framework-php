<style>
	.modal {
		height: auto !important;
	}
</style>
<div class="content-page">
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
							<button type="button" class="btn btn-primary btn-sm ms-3 bs-none" data-bs-toggle="modal" data-bs-target="#funilModal">
								Adicionar Fila
							</button>	
							
<!-- 							<div class="col-lg-1 col-md-1 col-sm-1 d-inline-block">
								<select class="form-select form-select-sm visualizacaoFila">
										<option selected class="dropdown-item" value="1">Kanban</option>
										<option value="2">Lista</option>
								</select>
							</div> -->
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
													<option value="2"> Privaado </option>
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
										  	<select  name="resp_funil[]" class="js-multiple-select form-control select2 userFila" id="userFunil" multiple="multiple" disabled>              
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
										<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
											<label class="active" for="">Vincular funil ao processo</label>
											<select required name="tipo" class="form-control select2 processoFila" id="">                 
													 <option value="" selected disabled="">Selecione</option>
											     <?php  foreach($Processos->getDataAs("Processo") as $p): ?>
												   <option <?= $p->get("id") == $f->get("processo") ? "selected" : "" ?> value="<?= $p->get("id") ?>" ><?= $p->get("nome") ?></option>
												   <?php endforeach; ?>
									    </select>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-12 mb-3 userSelect" id="userSelect" hidden>
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
										<div class="col col-sm-1 col-md-1 col-lg-1 mb-3">
                      <label for="example-color" class="form-label">Cor</label>
                      <input class="form-control corFila" type="color" name="cor" value="<?= $f->get("cor"); ?>">
                    </div>
									</div>
								</div>
								<div class="modal-footer">
									<input class="inputId" name="idFila" value="<?= $f->get("id") ?>" type="hidden">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
									<button type="button" class="btn btn-primary addTarefa">Adicionar</button>
								</div>
							</div>
						</div>
					</div>
						<?php endforeach; ?>
				<!-- 	End Fila edit Modal					 -->
						
				<!--  Modal New Task	-->
					<div class="modal fade" id="modalTask" aria-hidden="true" aria-labelledby="modalTaskLabel" tabindex="-1">
						<form type="formValidate" enctype="multipart/form-data"  method="POST" >
							<div class="modal-dialog modal-dialog-centered modal-xl">
								<div class="modal-content">
									<div class="modal-header">
										<h3 style="text-align:center;" class="modal-title" id="exampleModalLabel">Adicionar Tarefa</h3>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<ul class="nav nav-tabs">
											<li class="nav-item">
													<a data-bs-target="#modalTask" data-bs-toggle="modal" data-bs-dismiss="modal" class="nav-link active">
															<i class="mdi mdi-home-variant d-md-none d-block"></i>
															<span class="d-none d-md-block">Geral</span>
													</a>
											</li>
<!-- 											<li class="nav-item">
													<a href="#notas" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
															<i class="mdi mdi-account-circle d-md-none d-block"></i>
															<span class="d-none d-md-block">Notas</span>
													</a>
											</li> -->
											<li class="nav-item">
													<a  data-bs-target="#modalArquivo" data-bs-toggle="modal" data-bs-dismiss="modal" class="nav-link">
															<i class="mdi mdi-settings-outline d-md-none d-block"></i>
															<span class="d-none d-md-block">Arquivos</span>
													</a>
											</li>
									</ul>
									<div class="modal-body paddingModal ">
										<div class="row">
											<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
												<label class="active" for="">Nome</label>
												<input name="nomeTarefa" type="text" class="form-control nomeTarefa" value="" required>
											</div>

											<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
												<label class="active" for="">Vincular tarefa a fila</label>
												<select required  name="filaTarefa" id="filaTask" class="form-control select2 filaTarefa" required>                 
													<option selected disabled="">Selecione</option>
													<?php  foreach($Funis->getDataAs("Fila") as $fila): ?>
													<option value="<?= $fila->get("id") ?>" ><?= $fila->get("nome") ?></option>
													<?php endforeach; ?>															
												</select>
											</div>

											<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
												<label class="active" for="">Data de conclusão</label>
												<input  name="dataConclusao" type="date" class="form-control dataConclusao" value="" required>
											</div>

											<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
												<label class="active" for="medida-principal">Descrição</label>
												<textarea name="descricaoTarefa" class="form-control descricaoTarefa" style="height:10rem;"></textarea>
											</div>
											<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
												<label class="active" for="">Responsável pela tarefa</label>
													<select required  name="responsavelTarefa" class="form-control select2 responsavelTarefa" >                 
														<option selected disabled="">Selecione</option>
														<?php  foreach($usuarios->getDataAs("User") as $usuario): ?>
														<option value="<?= $usuario->get("id") ?>" ><?= $usuario->get("firstname") ?></option>
														<?php endforeach; ?>															
													</select>
											 </div>

											<div class="col col-sm-1 col-md-1 col-lg-1 mb-3">
												<label for="example-color" class="active">Cor</label>
												<input class="form-control corTarefa" type="color" name="corTarefa" value="">
											</div>
									</div>
								</div>
									<div class="modal-footer">
									<input class="idTarefa" name="idTarefa" value="" type="hidden">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
									<button type="button" class="btn btn-primary addTarefa" data-bs-dismiss="modal">Adicionar</button>
								</div>

								</div>
							</div>
						</div>
<!--  Modal arquivos New  -->
						<div class="modal fade" id="modalArquivo" aria-hidden="true" aria-labelledby="modalArquivoLabel" tabindex="-1">
							<input name="action" value="salvarArquivos" type="hidden">
							<div class="modal-dialog modal-dialog-centered modal-xl">
								<div class="modal-content">
									<div class="modal-header">
										<h3 style="text-align:center;" class="modal-title" id="exampleModalLabel">Adicionar Arquivos</h3>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<ul class="nav nav-tabs">
											<li class="nav-item">
													<a  data-bs-target="#modalTask" data-bs-toggle="modal" data-bs-dismiss="modal" class="nav-link">
															<i class="mdi mdi-home-variant d-md-none d-block"></i>
															<span class="d-none d-md-block">Geral</span>
													</a>
											</li>
<!-- 											<li class="nav-item">
													<a href="#notas" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
															<i class="mdi mdi-account-circle d-md-none d-block"></i>
															<span class="d-none d-md-block">Notas</span>
													</a>
											</li> -->
											<li class="nav-item">
													<a  data-bs-target="#modalArquivo" data-bs-toggle="modal" data-bs-dismiss="modal" class="nav-link active">
															<i class="mdi mdi-settings-outline d-md-none d-block"></i>
															<span class="d-none d-md-block">Arquivos</span>
														
													</a>
											</li>
									</ul>
									<div class="modal-body paddingModal ">
										<div class="row">
											<div class="mb-3">
<!--                         <label for="example-fileinput" class="form-label">Adicionar arquivos</label> -->
                        <input type="file" onchange="changeImage(this)"  id="task-fileinput" name="arquivosTask" class="form-control uploadArquivos">
												<img src="" class="selectedImage"  height="150" hidden>
                       </div>
									 </div>
								<div class="tabelaArquivos mt-10">
									<table style="width:100%; text-align-last: left;" id="usuarios" class="table hover">
										<thead>
											<tr>
												
												<th>Arquivo</th>
												<th>Extensão</th>
												<th>Tamanho</th>
												<th>Ações</th>
											</tr>
										</thead>
										<tbody>
									<tr class="arquivos">
										 <td>Não há arquivos vinculados a essa tarefa.</td>
									</tr>
									</tbody>
									</table>
								</div>
								</div>
									<div class="modal-footer">
										<input class="idTarefa" name="idTarefa" value="" type="hidden">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
										<button type="button" class="btn btn-primary addArquivo">Adicionar</button>
								 	</div>
<!-- 									<div class="modal-footer">
										<button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
									</div> -->
								</div>
							</div>
							</form>
						</div>
<!-- 						<a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>
						 -->
				<!-- 	End New Task	 -->
						
						<!--  Modal Edit Task	-->
						<?php foreach($Tasks->getDataAs("Tarefa") as $t): ?>
						<div class="modal fade" id="modalTaskEdit<?= $t->get("id"); ?>" aria-hidden="true" aria-labelledby="modalTaskLabel" tabindex="-1">
						<div class="modal-dialog modal-dialog-centered modal-xl">
						<div class="modal-content">
								<div class="modal-header">
									<h3 style="text-align:center;" class="modal-title">Edição de Tarefa</h3>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<ul class="nav nav-tabs">
											<li class="nav-item">
													<a  data-bs-target="#modalTask<?= $t->get("id"); ?>" data-bs-toggle="modal" data-bs-dismiss="modal" class="nav-link active">
															<i class="mdi mdi-home-variant d-md-none d-block"></i>
															<span class="d-none d-md-block">Geral</span>
													</a>
											</li>
<!-- 											<li class="nav-item">
													<a href="#notas" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
															<i class="mdi mdi-account-circle d-md-none d-block"></i>
															<span class="d-none d-md-block">Notas</span>
													</a>
											</li> -->
											<li class="nav-item">
													<a  data-bs-target="#modalTaskArquivos<?= $t->get("id"); ?>" data-bs-toggle="modal" data-bs-dismiss="modal" class="nav-link">
															<i class="mdi mdi-settings-outline d-md-none d-block"></i>
															<span class="d-none d-md-block">Arquivos</span>
													</a>
											</li>
									</ul>
							<!-- 	Tab Geral Edit  -->
								<div class="modal-body paddingModal tab-pane show active" id="geral<?=$t->get("id"); ?>">
									<div class="row">
										<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
											<label class="active" for="">Nome</label>
											<input  name="nomeTarefa" type="text" class="form-control nomeTarefa" value="<?= $t->get("nome"); ?>" required>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
											<label class="active" for="">Vincular tarefa a fila</label>
											<select required  name="filaTarefa" class="form-control select2 filaTarefa" required>                 
												  <option selected disabled="">Selecione</option>
											  	<?php  foreach($Funis->getDataAs("Fila") as $fila): ?>
												  <option <?= $fila->get("id") == $t->get("fila") ? "selected" : "" ?> value="<?= $fila->get("id") ?>" ><?= $fila->get("nome") ?></option>
												  <?php endforeach; ?>															
											  </select>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
											<label class="active" for="">Data de conclusão</label>
											<input  name="dataConclusao" class="form-control dataConclusao" type="date" value="<?= $t->get("data_previsao"); ?>" required>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
											<label class="active" for="medida-principal">Descrição</label>
											<textarea name="descricaoTarefa" class="form-control descricaoTarefa" style="height:10rem;"><?= $t->get("descricao"); ?></textarea>
										</div>
										<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
											<label class="active" for="">Responsável pela tarefa</label>
										  	<select required  name="responsavelTarefa" class="form-control select2 responsavelTarefa" >                 
												  <option selected disabled="">Selecione</option>
											  	<?php  foreach($usuarios->getDataAs("User") as $usuario): ?>
												  <option <?= $usuario->get("id") == $t->get("responsavel") ? "selected" : "" ?> value="<?= $usuario->get("id"); ?>" ><?= $usuario->get("firstname"); ?></option>
												  <?php endforeach; ?>															
											  </select>
										</div>
										<div class="col col-sm-1 col-md-1 col-lg-1 mb-3">
                      <label for="example-color" class="active">Cor</label>
                      <input class="form-control corTarefa" type="color" name="corTarefa" value="<?= $t->get("cor"); ?>">
                    </div>
									</div>
								</div>
								<div class="modal-footer">
									<input class="idTarefa" name="idTarefa" value="<?=$t->get("id"); ?>" hidden>
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
									<button type="button" class="btn btn-primary addTarefa">Adicionar</button>
								</div>
							</div>
						</div>
					</div>
					<!-- 	modal edit arquivos task		 -->
					<div class="modal fade" id="modalTaskArquivos<?= $t->get("id"); ?>" aria-hidden="true" aria-labelledby="modalTaskLabel" tabindex="-1">
						<form class="formValidate" action=""enctype="multipart/form-data"  method="POST">
						<input name="action" value="salvarArquivos" type="hidden">
							<div class="modal-dialog modal-dialog-centered modal-xl">
								<div class="modal-content">
									<div class="modal-header">
										<h3 style="text-align:center;" class="modal-title" id="exampleModalLabel">Adicionar Arquivos</h3>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<ul class="nav nav-tabs">
											<li class="nav-item">
													<a  data-bs-target="#modalTaskEdit<?= $t->get("id"); ?>" data-bs-toggle="modal" data-bs-dismiss="modal" class="nav-link">
															<i class="mdi mdi-home-variant d-md-none d-block"></i>
															<span class="d-none d-md-block">Geral</span>
													</a>
											</li>
<!-- 											<li class="nav-item">
													<a href="#notas" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
															<i class="mdi mdi-account-circle d-md-none d-block"></i>
															<span class="d-none d-md-block">Notas</span>
													</a>
											</li> -->
											<li class="nav-item">
													<a  data-bs-target="#modalArquivoEdit<?= $t->get("id"); ?>" data-bs-toggle="modal" data-bs-dismiss="modal" class="nav-link active">
															<i class="mdi mdi-settings-outline d-md-none d-block"></i>
															<span class="d-none d-md-block">Arquivos</span>
													</a>
											</li>
									</ul>
									<div class="modal-body paddingModal ">
										<div class="row">
											<div class="mb-3">
<!--                         <label for="example-fileinput" class="form-label">Adicionar arquivos</label> -->
                        <input type="file" onchange="changeImage(this)" id="task-fileinput" name="arquivosTask" class="form-control">
												<img src="" class="selectedImage" height="150" hidden>
                       </div>
									 </div>

								<div class="tabelaArquivos mt-10">
									<table style="width:100%; text-align-last: left;" id="usuarios" class="table hover">
										<thead>
											<tr>
												<th>Arquivo</th>
												<th>Extensão</th>
												<th>Tamanho</th>
<!-- 												<th>Usuário</th> -->
												<th>Ações</th>
											</tr>
										</thead>
										<tbody>
											<?php $path = ROOTPATH . "/assets/uploads/tarefas/" . $t->get("id") . "/" ?>
											<?php if(is_dir($path)):?>
											<?php $files = scandir($path); ?>
											<?php foreach ($files as $f): ?>
											<?php $pathFiles = ROOTPATH . "/assets/uploads/tarefas/" . $t->get("id") . "/" . $f ?>
											<?php $extensao = pathinfo($pathFiles, PATHINFO_EXTENSION);?>
											<?php if($f == '.' or $f == '..'): ?>
											<tr hidden></tr>
										 <?php else: ?>
									<tr>
										 <td><a href="<?= APPURL . "assets/uploads/tarefas/" . $t->get("id") . "/" .$f ?>" class="text-body fw-bold"><?= $f ?></a> </td>
										 <td><?= $extensao ?> </td>
										 <td><?= filesize($pathFiles); ?></td>
<!-- 									 	 <td></td> -->
										 <td>
<!-- 												 <a href="javascript:void(0)" data-id="" class="tooltipped " data-type="" data-position="top" data-tooltip="Logar"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a> -->
<!-- 												 <button style="background: transparent; border: none;" type="button" data-bs-toggle="modal" data-bs-target="#modalInformacoes" data-value="" class="abrirModal">	<i class="mdi mdi-codepen" aria-hidden="true"></i>	</button> -->
												 <a href="javascript:void(0)" data-id="" class="tooltipped remover-user red-text" data-type="User" data-position="top" data-tooltip="Remover" alt="Remover">
													 <i class="mdi mdi-file-image-remove" style="font-size:23px; position: relative; top: -10px; " aria-hidden="true"></i></a>
										 </td>
									</tr>
									<?php endif; ?>
									<?php endforeach; ?>
									<?php else: ?>
									<tr class="arquivos">
										 <td>Não há arquivos vinculados a essa tarefa.</td>
									</tr>
									<?php endif; ?> 
									</tbody>
									</table>
								</div>
								</div>
									<div class="modal-footer">
									<input class="idTarefa" name="idTarefa" value="<?=$t->get("id"); ?>" type="hidden">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
									<button type="button" class="btn btn-primary addArquivo">Adicionar</button>
								</div>
								</div>
							</div>
							</form>
						</div>
						<!-- 	end modal edit task arquivos		 -->
						<?php endforeach; ?>
				<!-- 	End Edit Task	 -->
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
							<div class="mt-2 btn-task-pos">
								<button type="button" class="btn btn-xs btn-success fsize-secundaria btn-task btn-add-task" data-bs-toggle="modal" data-bs-target="#modalTask" hidden>+ Adicionar nova tarefa</button>
							</div>
						<div class="filaTask sortable" id="filaTask<?= $f->get("id") ?>">
						<?php foreach($myTask->getDataAs("Tarefa") as $t): ?>
						<?php if($f->get("id") == $t->get("fila")): ?>
						<?php $taskcor = $t->get("cor"); ?>
						<div id="task-list-<?= $t->get("id") ?>" data-id="<?= $t->get("id") ?>" class="task-list-items">
							<div class="card mb-0 task-width">
								<div class="card-body p-1">
									<small class="float-end text-muted" id="responsavelTask<?=$t->get("id"); ?>"><?= nomeCriador($t->get("responsavel")); ?></small>
									<span class="badge" id="corTask<?=$t->get("id");?>" style='<?= "background-color:$taskcor; width:10%;display: list-item; color:transparent"?>'>High</span>
									<h5 class="mt-2 mb-2">
										<a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" id="taskNome<?=$t->get("id"); ?>" class="text-body"><?= $t->get("nome"); ?></a>
									</h5>
									<div class="mb-1 task-card-box">
										<div class="task-card-content">
												<i style="font-size:14px;" class="mdi mdi-calendar-clock-outline text-muted" alt="previsão de conclusão"></i>
										<span class="pe-2 text-nowrap d-inline-block fsize-small" >
												<?= $t->get("data_previsao"); ?>
										</span>
										</div>
										<div class="task-card-content">
												<i style="font-size:14px;" class="mdi mdi-phone text-muted" alt="telefone de contato"></i>
										<span class="pe-2 text-nowrap d-inline-block fsize-small">
												Não informado
										</span>
										</div>
										<div class="task-card-content">
												<i style="font-size:14px;" class="mdi mdi-map-marker text-muted" alt="cidade"></i>
										<span class="pe-2 text-nowrap d-inline-block fsize-small">
												Fortaleza/CE
										</span>
										</div>
									</div>
									<div class="dropdown float-end">
										<a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
										 <i class="mdi mdi-dots-vertical font-18"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-end">
											<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" id="editarTask" data-bs-target="#modalTaskEdit<?= $t->get("id")?>"><i class="mdi mdi-pencil me-1"></i>Editar</a>
											<a href="javascript:void(0);" class="dropdown-item deletarTarefa" data-id="<?= $t->get("id");?>"><i class="mdi mdi-delete me-1"></i>Remover tarefa</a>
<!-- 											<a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Adicionar usuário</a> -->
<!-- 											<a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Sair</a> -->
										</div>
									</div>
									<p class="mb-0">
										<img src="<?= APPURL . "/assets/images/usuarios/$criador.jpg "?>" class="avatar-xs rounded-circle me-1" title="Envolvidos" />
										<span class="align-middle fsize-secundaria"><?= nomeCriador($f->get("criador")); ?></span>
									</p>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<?php endforeach; ?>
						</div>
						<div class="mb-1"></div>
					</div>
					<!-- 		Lista			 -->
					<div class="board boardLista" hidden>
						<div class="mt-2">
							<h5 class="m-0 pb-2">
									<a class="text-dark" data-bs-toggle="collapse" href="#todayTasks" role="button" aria-expanded="false" aria-controls="todayTasks">
											<i class='uil uil-angle-down font-18'></i><?= $f->get("nome"); ?><span class="text-muted"> (10)</span>
									</a>
							</h5>
							<?php foreach($myTask->getDataAs("Tarefa") as $t): ?>
							<?php if($f->get("id") == $t->get("fila")): ?>
							<?php $taskcor = $t->get("cor"); ?>
							<?php $responsavel = $t->get("responsavel"); ?>
							<?php $imgResponsavel = APPURL . "/assets/images/usuarios/$responsavel.jpg" ?>

							<div class="collapse show" id="todayTasks">
									<div class="card mb-0">
											<div class="card-body">
													<!-- task -->
													<div class="row justify-content-sm-between">
															<div class="col-sm-6 mb-2 mb-sm-0">
																	<div class="form-check">
																			<input type="checkbox" class="form-check-input" id="task1">
																			<label class="form-check-label" for="task1">
																					<?= $t->get("nome"); ?>
																			</label>
																	</div> <!-- end checkbox -->
															</div> <!-- end col -->
															<div class="col-sm-6">
																	<div class="d-flex justify-content-between">
																			<div id="tooltip-container">
																					<img src="<?= APPURL . "/assets/images/usuarios/$responsavel.jpg" ?>" class="avatar-xs rounded-circle me-1"
																					data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Responsável da tarefa" />
																					<span class="align-middle"><?= nomeCriador($t->get("responsavel")); ?></span>
																			</div>
																			<div>
																					<ul class="list-inline font-13 text-end">
																							<li class="list-inline-item">
																									<i class='uil uil-schedule font-16 me-1'></i><?= $t->get("data_previsao") ?>
																							</li>
<!-- 																							<li class="list-inline-item ms-1">
																									<i class='uil uil-align-alt font-16 me-1'></i> 3/7
																							</li> -->
																							<li class="list-inline-item ms-1">
																									<i class='uil uil-comment-message font-16 me-1'></i> 21
																							</li>
																							<li class="list-inline-item ms-2">
																									<span class="badge badge-danger-lighten p-1">Alta</span>
																							</li>
																					</ul>
																			</div>
																	</div> <!-- end .d-flex-->
															</div> <!-- end col -->
													</div>
													<!-- end task -->
													<!-- task -->


													<!-- end task -->
											</div> <!-- end card-body-->
									</div> <!-- end card -->
							</div> <!-- end .collapse-->
							<?php endif; ?>
							<?php endforeach; ?>
					</div> <!-- end .mt-2-->
					</div>
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