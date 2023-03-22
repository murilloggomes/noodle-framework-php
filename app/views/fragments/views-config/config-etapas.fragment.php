<a style="margin-top:4px;" href="javascript:void(0);" onclick="edicaoFunil();" class="d-inline-block float-end btn btn-primary btn-sm ms-3 bs-none" data-bs-toggle="modal"  data-bs-target="#processoModal">Adicionar funil</a>
 <h4 class="header-title">Configurações de funil e etapas</h4>
        <p class="text-muted font-14 mb-3">Gerencie e ajuste os funis e suas etapas. </p>
        <form action="" id="general-settings-form" class="general-form dashed-row" role="form" method="post" accept-charset="utf-8">
                <?php foreach($processos->getDataAs("Processo") as $p): ?>
          <div class="card">
            <div class="card-header">
							<div class="dropdown mt-0 fila_options d-inline-block">
										<a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
										 <i class="mdi mdi-dots-vertical font-18"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-end">
											<!-- item-->
											<a href="javascript:void(0);" onclick="edicaoFunil(<?=$p->get("id")?>);" class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#processoModal"><i class="mdi mdi-pencil me-1"></i>Editar</a>
											<!-- item-->
											<a href="javascript:void(0);" class="dropdown-item deletarProcesso" data-id="<?=$p->get("id")?>"><i class="mdi mdi-delete me-1"></i>Remover funil</a>
										</div>
									</div>
              <h4 class="d-inline-block"><?= $p->get("nome"); ?></h4>
              <div class="d-inline-block float-end" style="margin-top:4px;">
                <button type="button" class="btn btn-primary btn-sm ms-3 bs-none" data-id="<?= $p->get("id"); ?>" data-bs-toggle="modal" data-bs-target="#funilModal" onclick="edicaoEtapa(0,<?= $p->get("id"); ?>)">Adicionar nova etapa</button>
              </div>
            <?php $arrayEtapas = etapas($p->get("id")); ?>
            </div>
            
              <?php if($arrayEtapas != null): ?>
            <table id="funil-table" class="table dt-responsive nowrap w-100">
              <thead>
                <tr>
                  <th>Ordem</th>
                  <th>Etapa</th>
                  <th>Descrição</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($arrayEtapas as $e): ?>
                <tr>
                  <td>
                    <?= $e["ordem"]; ?> 
                  </td>
                  <td>
                    <?= $e["nome"]; ?>
                  </td>
                  <td>
                    <?= mb_strimwidth($e["descricao"],0,65, "...") ?>
                  </td>  
                  <td>
                    <button style="background: transparent; border: none;" type="button" data-bs-toggle="modal" data-bs-target="#funilModal" onclick="edicaoEtapa(<?= $e["id"]; ?>,<?= $e["processo"]; ?>);"><i class="fa fa-pencil" aria-hidden="true"></i>	</button>
                    <a href="javascript:void(0)" class="tooltipped remover-dados" data-type="Fila" data-id="<?=$e['id']; ?>" data-position="top" data-tooltip="Remover"><i class="fa fa-times" aria-hidden="true"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
            <?php else: ?>
            <div class="alert alert-info alert-dismissible col-sm-12 col-md-12 col-lg-6 mt-2" role="alert" style="margin-left: 5px;"><i style="position:relative;bottom:1px;"class="dripicons-information me-2"></i>
							Ainda não há etapas cadastrados para este funil! 
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
              <?php endif; ?>
            <!--                       <div class="card-footer">
                          <button type="submit" class="btn btn-primary bs-none"><span data-feather="check-circle"></span> Salvar</button>
                      </div> -->
          </div>
                <?php endforeach; ?>
        </form>

<!-- Modals -->
<!-- Modal Processo-->
	<div class="modal fade" id="processoModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h3 style="text-align:center;" class="modal-title" id="exampleModalLabel">Funil</h3>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body paddingModal">
						<div class="row">
							<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
								<label class="active" for="">Nome</label>
								<input name="nome" type="text" class="form-control nomeProcesso" value="" required>
							</div>
							<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
								<label class="active" for="">Equipe</label>
								<select name="equipe" class="form-control select2 equipeProcesso" required>                 
									<option value="" selected disabled="">Selecione a equipe</option>
										<?php foreach($equipes->getDataAs("CentroCusto") as $e): ?>
										<option value="<?= $e->get("id") ?>"> <?= $e->get("nome") ?> </option>
									<?php endforeach; ?>		
								</select>
							</div>
							<div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
								<label class="active" for="">Unidade de negócio</label>
								<select name="unidadeNegocio" class="form-control select2 unidadeProcesso" required>                 
									<option value="" selected disabled="">Selecione uma unidade</option>
									<?php  foreach($unidadesNegocios->getDataAs("UnidadeNegocio") as $un): ?>
										<option value="<?= $un->get("id") ?>"><?= $un->get("nome") ?></option>
									<?php endforeach; ?>			
								</select>
							</div>
							<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
								<label class="active" for="">Responsável</label>
									<select required  name="responsavelFunil[]" class="form-control select2 responsavelFila" id="responsavelFunil" multiple >                 
										<option value="" selected disabled="">Selecione</option>
										<?php  foreach($usuarios->getDataAs("User") as $usuario): ?>
										<option value="<?= $usuario->get("id") ?>"><?= $usuario->get("firstname") ?></option>
										<?php endforeach; ?>															
									</select>
							</div>
							
							<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
								<label class="active" for="descricao">Descrição</label>
								<textarea name="descricao" class="form-control descricaoProcesso" style="height:10rem;"> </textarea>
							</div>
							<div class="col col-sm-1 col-md-1 col-lg-1 mb-3">
								<label for="example-color" class="form-label">Cor</label>
								<input class="form-control corProcesso"  type="color" name="cor" value="">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input id="idFunil" name="idFunil" type="hidden" value="" >
            
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
						<button type="button" id="adicionarProcesso" class="btn btn-primary ">Adicionar</button>
					</div>
				</div>
			</div>
		</div>
<!--   Modal etapa     -->
<div class="modal fade" id="funilModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="text-align:center;" class="modal-title" id="exampleModalLabel">Etapa</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body paddingModal">
        <div class="row">
          <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
            <label class="active" for="">Nome</label>
            <input name="nome" id="nomeEtapa" type="text" class="form-control nomeFila" value="" required>
          </div>

          <div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
            <label class="active" for="">Visibilidade</label>
            <select onchange="filtroUsuario();" name="visibilidade" class="form-control select2 visibilidadeFila" id="visibilidadeEtapa" required>                 
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
            <label class="active" for="">Vincular etapa ao funil</label>
            <select required name="tipo" class="form-control select2 processoFila" id="etapaProcesso">                 
                 <option value="" selected disabled="">Selecione</option>
                 <?php  foreach($processos->getDataAs("Processo") as $p): ?>
                 <option value="<?= $p->get("id") ?>" ><?= $p->get("nome") ?></option>
                 <?php endforeach; ?>
            </select>
          </div>
            <div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
            <label class="active" for="">Ordem</label>
            <select required name="ordemEtapa" class="form-control select2 ordemEtapa" id="ordemEtapa">                 
            </select>
          </div>
          <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 userSelect" id="userSelect" hidden>
            <label class="active" for="">Informe os usuários que terão acesso a este funil:</label>
              <select name="resp_funil[]" class="js-multiple-select form-control select2 userFila" id="userEtapa" multiple="multiple" disabled>             
                <?php  foreach($usuarios->getDataAs("User") as $usuario): ?>
                <option value="<?= $usuario->get("id") ?>" ><?= $usuario->get("firstname") ?></option>
                <?php endforeach; ?>															
              </select>
          </div>
          <div class="col col-sm-12 col-md-12 col-lg-6 mb-3">
            <label class="active" for="">Responsável pelo funil</label>
              <select required  name="responsavel_etapa[]" class="form-control select2 responsavelEtapa" id="responsavelEtapa" multiple>                
                <option value="" selected disabled="">Selecione</option>
                <?php  foreach($usuarios->getDataAs("User") as $usuario): ?>
                <option value="<?= $usuario->get("id") ?>" ><?= $usuario->get("firstname") ?></option>
                <?php endforeach; ?>															
              </select>
          </div>
					
          <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
            <label class="active" for="medida-principal">Descrição</label>
            <textarea name="descricao" class="form-control descricaoFila" id="descricaoEtapa" style="height: 10rem;"> </textarea>
          </div>
          <div class="col col-sm-12 col-md-6 col-lg-5 mb-3">
            <div class="form-check form-switch">
              <input name="empresaExibe" class="form-check-input exibeEmpresaFila" id="empresaEtapa" type="checkbox">
              <label class="form-check-label" for="flexSwitchCheckDefault">Mostrar empresa na tela da oportunidade</label>
            </div>
          </div>
          <div class="col col-sm-12 col-md-12 col-lg-5 mb-3">
            <div class="form-check form-switch">
              <input name="pessoaExibe" class="form-check-input exibePessoaFila" id="pessoaEtapa" type="checkbox">
              <label class="form-check-label" for="flexSwitchCheckDefault">Mostrar pessoa na tela da oportunidade </label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" class="inputId" name="idFila" id="idEtapa" value="" type="">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary btnEtapa" data-bs-dismiss="modal">Adicionar</button>
      </div>
    </div>
  </div>
</div>
<!--  fim modal edit equipe       -->