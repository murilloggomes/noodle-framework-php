<div class="col s12">
  <div class="container">
    <!-- Account settings -->
    <section class="tabs-vertical mt-1 section">
      <div class="row">
        <div class="col l4 s12">
          <!-- tabs  -->
          <div class="card-panel">
            <blockquote>
              <h6>Configuração de Contas</h6>
            </blockquote>

            <ul class="tabs">
              <li class="tab">
                <a href="#general">
              <i class="material-icons">supervisor_account</i>
              <span>Centro de Custo</span>
            </a>
              </li>
              <li class="tab">
                <a href="#cargo">
              <i class="material-icons">work</i>
              <span>Cargo</span>
            </a>
              </li>
               <li class="tab">
                <a href="#categoria-cliente">
              <i class="material-icons">assignment_ind</i>
              <span>Categoria de Cliente</span>
            </a>
              </li>
              <li class="tab">
                <a href="#unidadenegocio">
              <i class="material-icons">streetview</i>
              <span>Unidade de Negócio</span>
            </a>
              </li>
              <li class="tab">
                <a href="#qualificacao">
              <i class="material-icons">star</i>
              <span>Qualificação</span>
            </a>
              </li>
               <li class="tab">
                <a href="#segmento-atuacao">
              <i class="material-icons">account_balance</i>
              <span>Segmento de Atuação</span>
            </a>
              </li>
              <li class="tab">
              <a href="#origem-cliente">
            <i class="material-icons">get_app</i>
                <span>Origem de Cliente</span>
            </a>
              </li>
              <li class="tab">
              <a href="#tipo-endereco">
            <i class="material-icons">add_location</i>
                <span>Tipo de Endereço</span>
            </a>
              </li>
              <li class="tab">
              <a href="#tipo-imovel">
            <i class="material-icons">store</i>
                <span>Tipo de Imóvel</span>
            </a>
              </li>
              <li class="tab">
              <a href="#tipo-residencia">
            <i class="material-icons">home</i>
                <span>Tipo de Residência</span>
            </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col l8 s12">
          <!-- tabs content -->
          <div id="general">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro de Centros de Custos</h6>
              </blockquote>
              <form class="formValidate" method="POST">
                <input type="hidden" name="action" value="salvarEquipe">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                      <select id="status-equipe" name="status-equipe" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome-equipe" name="nome-equipe" type="text" class="validate" placeholder="Escreva o nome da Equipe">
                      <label for="equipe-label2">Nome da Equipe</label>
                    </div>
                  </div>
                  <div class="col s12 display-flex justify-content-end">
                    <button type="submit" class="btn indigo waves-effect waves-light mr-2">Salvar</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- tabs  -->
            <div class="card-panel">
               <blockquote>
                <h6>Lista dos Centros de Custos Cadastradas</h6>
              </blockquote>
      
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%" class="table">
                <thead>
                  <tr>
                    <th></th>                
                    <th>ID</th>
                    <th>Nome</th>             
                    <th>Criado Em</th>                            
                    <th>Status</th>
                    <th>Ações</th>                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($CentroCustos->getDataAs("CentroCusto") as $u):?>
                    <tr>
                      <td></td>                     
                      <td><?= $u->get("id")?></td>
                      <td><?= ucfirst(strtolower($u->get("nome")))?></td>                    
                      <td><?= date("d/m/Y", strtotime($u->get("data_criacao")))?></td>                                  
                      <?php if($u->get("status")):?>
                      <td>
                        <span class="chip green lighten-5">
                          <span class="green-text">Ativo</span>
                        </span>
                      </td>  
                      <?php else: ?>
                      <td>
                        <span class="chip red lighten-5">
                          <span class="red-text">Desativado</span>
                        </span>
                      </td>  
                      <?php endif; ?>
                      <td><a href="javascript:void(0)" class="tooltipped edit-dados" data-position="top" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $u->get("id")?>" data-type="CentroCusto" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                    
                    </tr>
                  <?php endforeach;?>
                       
                </tbody>
              </table>
            </div>
            <!-- datatable ends -->
          </div>
        </div>
      
            </div>
          </div>
          <div id="cargo">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro de Cargo</h6>
              </blockquote>
              <form class="paaswordvalidate" method="POST">
                <input type="hidden" name="action" value="salvarCargo">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                      <select id="status-cargo" name="status-cargo" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome-cargo" type="text" name="nome-cargo" class="validate" placeholder="Escreva o nome do Cargo">
                      <label for="cargo-label2">Nome do Cargo</label>
                    </div>
                  </div>


                  <div class="col s12 display-flex justify-content-end">
                    <button type="submit" class="btn indigo waves-effect waves-light mr-2">Salvar</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- tabs  -->
            <div class="card-panel">
                <blockquote>
                <h6>Lista dos Cargos Cadastrados</h6>
              </blockquote>
              
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%" class="table">
                <thead>
                  <tr>
                    <th ></th>                   
                    <th>ID</th>
                    <th>Nome</th>             
                    <th>Criado Em</th>                            
                    <th>Status</th>
                    <th>Ações</th>                  
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($Cargos->getDataAs("Cargo") as $u):?>
                    <tr>
                      <td ></td>                    
                      <td><?= $u->get("id")?></td>
                      <td><?= ucfirst(strtolower($u->get("nome")))?></td>                    
                      <td><?= date("d-m-Y", strtotime($u->get("data_criacao")))?></td>                                  
                      <?php if($u->get("status")):?>
                      <td>
                        <span class="chip green lighten-5">
                          <span class="green-text">Ativo</span>
                        </span>
                      </td>  
                      <?php else: ?>
                      <td>
                        <span class="chip red lighten-5">
                          <span class="red-text">Desativado</span>
                        </span>
                      </td>  
                      <?php endif; ?>
                      <td><a href="javascript:void(0)" class="tooltipped edit-dados" data-position="top" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $u->get("id")?>" data-type="Cargo" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                    
                    </tr>
                  <?php endforeach;?>
                       
                </tbody>
              </table>
            </div>
            <!-- datatable ends -->
          </div>
        </div>
     
            </div>
          </div>
               <div id="categoria-cliente">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro de Categoria de Cliente</h6>
              </blockquote>
              <form class="infovalidate" method="POST">
                <input type="hidden" name="action" value="salvarCategoriaCliente">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                     <select id="status-categoria-cliente" name="status-categoria-cliente" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome-categoria-cliente" type="text" name="nome-categoria-cliente" class="validate" placeholder="Escreva o nome da Categoria de Cliente">
                      <label for="nome-categoria-cliente">Nome da Categoria de Cliente</label>
                    </div>
                  </div>
                 
                  <div class="col s12 display-flex justify-content-end">
                    <button type="submit" class="btn indigo waves-effect waves-light mr-2">Salvar</button>
                  </div>
                </div>

              </form>
            </div>
            <!-- tabs  -->
            <div class="card-panel">
                <blockquote>
                <h6>Lista das Categorias de Clientes</h6>
              </blockquote>
              
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%" class="table">
                <thead>
                  <tr>
                    <th ></th>                   
                    <th>ID</th>
                    <th>Nome</th>             
                    <th>Criado Em</th>                            
                    <th>Status</th>
                    <th>Ações</th>                   
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($CategoriasClientes->getDataAs("ConfigCategoriaCliente") as $cac):?>
                    <tr>
                      <td ></td>                     
                      <td><?= $cac->get("id")?></td>
                      <td><?= ucfirst(strtolower($cac->get("nome")))?></td>                    
                      <td><?= date("d-m-Y", strtotime($cac->get("data_criacao")))?></td>                                  
                      <?php if($cac->get("status")):?>
                      <td>
                        <span class="chip green lighten-5">
                          <span class="green-text">Ativo</span>
                        </span>
                      </td>  
                      <?php else: ?>
                      <td>
                        <span class="chip red lighten-5">
                          <span class="red-text">Desativado</span>
                        </span>
                      </td>  
                      <?php endif; ?>
                      <td><a href="javascript:void(0)" class="tooltipped edit-dados" data-position="top" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $cac->get("id")?>" data-type="ConfigCategoriaCliente" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                   
                    </tr>
                  <?php endforeach;?>
                       
                </tbody>
              </table>
            </div>
            <!-- datatable ends -->
          </div>
        </div>
   
            </div>
          </div> 
          <div id="unidadenegocio">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro de Unidade de Negócio</h6>
              </blockquote>
              <form class="infovalidate" method="POST">
                <input type="hidden" name="action" value="salvarUnidadeNegocio">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                     <select id="status-unidade" name="status-unidade" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome-unidade" type="text" name="nome-unidade" class="validate" placeholder="Escreva o nome da Unidade de Negócio">
                      <label for="nome-unidade">Nome da Unidade de Negócio</label>
                    </div>
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                     <select id="estado-unidade" name="estado-unidade" class="select2 browser-default">
                        <option value="0" disabled selected>Estado</option>
                        <?php foreach($Estados as $uf => $e): ?>
                          <option value="<?= $uf ?>"><?= $e ?></option>
                        <?php endforeach; ?>                                              
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field">
                      <input id="cidade-unidade" type="text" name="cidade-unidade" class="validate" placeholder="Escreva a cidade da Unidade de Negócio">
                      <label for="cidade-unidade">Cidade</label>
                    </div>
                  </div>
                  <div class="col s12 display-flex justify-content-end">
                    <button type="submit" class="btn indigo waves-effect waves-light mr-2">Salvar
                </button>
                  </div>
                </div>
              </form>
            </div>
            <!-- tabs  -->
            <div class="card-panel">
                <blockquote>
                <h6>Lista das Unidades de Negócios Cadastradas</h6>
              </blockquote>
              
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%" class="table ps-table">
                <thead>
                  <tr>
                    <th ></th>                   
                    <th>ID</th>
                    <th>Nome</th>             
                    <th>Criado Em</th>                            
                    <th>Status</th>
                    <th>Ações</th>                   
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($UnidadesNegocios->getDataAs("UnidadeNegocio") as $u):?>
                    <tr>
                      <td ></td>                     
                      <td><?= $u->get("id")?></td>
                      <td><?= ucfirst(strtolower($u->get("nome")))?></td>                    
                      <td><?= date("d-m-Y", strtotime($u->get("data_criacao")))?></td>                                  
                      <?php if($u->get("status")):?>
                      <td>
                        <span class="chip green lighten-5">
                          <span class="green-text">Ativo</span>
                        </span>
                      </td>  
                      <?php else: ?>
                      <td>
                        <span class="chip red lighten-5">
                          <span class="red-text">Desativado</span>
                        </span>
                      </td>  
                      <?php endif; ?>
                      <td><a href="javascript:void(0)" class="tooltipped edit-dados" data-position="top" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $u->get("id")?>" data-type="UnidadeNegocio" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                   
                    </tr>
                  <?php endforeach;?>
                       
                </tbody>
              </table>
            </div>
            <!-- datatable ends -->
          </div>
        </div>
      
            </div>
          </div>
           <div id="qualificacao">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro de Qualificação</h6>
              </blockquote>
              <form class="infovalidate" method="POST">
                <input type="hidden" name="action" value="salvarQualificacao">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                     <select id="status-qualificacao" name="status-qualificacao" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome-qualificacao" type="text" name="nome-qualificacao" class="validate" placeholder="Escreva o nome da qualificação">
                      <label for="nome-qualificacao">Nome da Qualificação</label>
                    </div>
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col s12 display-flex justify-content-end">
                    <button type="submit" class="btn indigo waves-effect waves-light mr-2">Salvar</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- tabs  -->
            <div class="card-panel">
                <blockquote>
                <h6>Lista das Qualificações cadastradas</h6>
              </blockquote>
             
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%" class="table ps-table">
                <thead>
                  <tr>
                    <th ></th>                   
                    <th>ID</th>
                    <th>Nome</th>             
                    <th>Criado em</th>                            
                    <th>Status</th>
                    <th>Ações</th>                   
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($Qualificacoes->getDataAs("ConfigQualificacao") as $q):?>
                    <tr>
                      <td ></td>                     
                      <td><?= $q->get("id")?></td>
                      <td><?= ucfirst(strtolower($q->get("nome")))?></td>                    
                      <td><?= date("d-m-Y", strtotime($q->get("data_criacao")))?></td>                                  
                      <?php if($q->get("status")):?>
                      <td>
                        <span class="chip green lighten-5">
                          <span class="green-text">Ativo</span>
                        </span>
                      </td>  
                      <?php else: ?>
                      <td>
                        <span class="chip red lighten-5">
                          <span class="red-text">Desativado</span>
                        </span>
                      </td>  
                      <?php endif; ?>
                      <td><a href="javascript:void(0)" class="tooltipped edit-dados" data-position="top" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $q->get("id")?>" data-type="ConfigQualificacao" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                   
                    </tr>
                  <?php endforeach;?>
                       
                </tbody>
              </table>
            </div>
            <!-- datatable ends -->
          </div>
        </div>
  
            </div>
          </div>
                <div id="segmento-atuacao">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro de Segmento de Atuação</h6>
              </blockquote>
              <form class="infovalidate" method="POST">
                <input type="hidden" name="action" value="salvarSegmentoAtuacao">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                     <select id="status-segmento-atuacao" name="status-segmento-atuacao" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome-segmento-atuacao" type="text" name="nome-segmento-atuacao" class="validate" placeholder="Escreva o nome do segmento de atuação">
                      <label for="nome-segmento-atuacao">Nome do Segmento Atuação</label>
                    </div>
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col s12 display-flex justify-content-end">
                    <button type="submit" class="btn indigo waves-effect waves-light mr-2">Salvar</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- tabs  -->
            <div class="card-panel">
                <blockquote>
                <h6>Lista dos Segmentos de Atuações</h6>
              </blockquote>
            
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%" class="table ps-table">
                <thead>
                  <tr>
                    <th ></th>                   
                    <th>ID</th>
                    <th>Nome</th>             
                    <th>Criado em</th>                            
                    <th>Status</th>
                    <th>Ações</th>                   
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($SegmentoAtuacao->getDataAs("ConfigSegmentoAtuacao") as $sA):?>
                    <tr>
                      <td></td>                     
                      <td><?= $sA->get("id")?></td>
                      <td><?= ucfirst(strtolower($sA->get("nome")))?></td>                    
                      <td><?= date("d-m-Y", strtotime($sA->get("data_criacao")))?></td>                                  
                      <?php if($sA->get("status")):?>
                      <td>
                        <span class="chip green lighten-5">
                          <span class="green-text">Ativo</span>
                        </span>
                      </td>  
                      <?php else: ?>
                      <td>
                        <span class="chip red lighten-5">
                          <span class="red-text">Desativado</span>
                        </span>
                      </td>  
                      <?php endif; ?>
                      <td><a href="javascript:void(0)" class="tooltipped edit-dados" data-position="top" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $sA->get("id")?>" data-type="ConfigSegmentoAtuacao" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                   
                    </tr>
                  <?php endforeach;?>
                       
                  <?php ?>
                </tbody>
              </table>
            </div>
            <!-- datatable ends -->
          </div>
        </div>
  
            </div>
          </div>
             <div id="origem-cliente">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro da Origem do Cliente</h6>
              </blockquote>
              <form class="infovalidate" method="POST">
                <input type="hidden" name="action" value="salvarOrigemCliente">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                     <select id="status-origem-cliente" name="status-origem-cliente" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome-origem-cliente" type="text" name="nome-origem-cliente" class="validate" placeholder="Escreva o nome da Origem do cliente">
                      <label for="nome-origem-cliente">Nome da Origem do cliente</label>
                    </div>
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col s12 display-flex justify-content-end">
                    <button type="submit" class="btn indigo waves-effect waves-light mr-2">Salvar</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- tabs  -->
            <div class="card-panel">
                <blockquote>
                <h6>Lista das Origem de cliente</h6>
              </blockquote>
             
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%" class="table ps-table">
                <thead>
                  <tr>
                    <th ></th>                   
                    <th>ID</th>
                    <th>Nome</th>             
                    <th>Criado em</th>                            
                    <th>Status</th>
                    <th>Ações</th>                   
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($OrigensClientes->getDataAs("ConfigOrigemCliente") as $o):?>
                    <tr>
                      <td ></td>                     
                      <td><?= $o->get("id")?></td>
                      <td><?= ucfirst(strtolower($o->get("nome")))?></td>                    
                      <td><?= date("d-m-Y", strtotime($o->get("data_criacao")))?></td>                                  
                      <?php if($o->get("status")):?>
                      <td>
                        <span class="chip green lighten-5">
                          <span class="green-text">Ativo</span>
                        </span>
                      </td>  
                      <?php else: ?>
                      <td>
                        <span class="chip red lighten-5">
                          <span class="red-text">Desativado</span>
                        </span>
                      </td>  
                      <?php endif; ?>
                      <td><a href="javascript:void(0)" class="tooltipped edit-dados" data-position="top" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $o->get("id")?>" data-type="ConfigOrigemCliente" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                   
                    </tr>
                  <?php endforeach;?>
                       
                </tbody>
              </table>
            </div>
            <!-- datatable ends -->
          </div>
        </div>
  
            </div>
          </div>
          
           <div id="tipo-endereco">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro de Tipo de Endereço</h6>
              </blockquote>
              <form class="infovalidate" method="POST">
                <input type="hidden" name="action" value="salvarTipoEndereco">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                     <select id="status-tipo-endereco" name="status-tipo-endereco" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome-tipo-endereco" type="text" name="nome-tipo-endereco" class="validate" placeholder="Escreva o nome do tipo de endereço...">
                      <label for="nome-tipo-endereco">Nome do tipo de endereço:</label>
                    </div>
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col s12 display-flex justify-content-end">
                    <button type="submit" class="btn indigo waves-effect waves-light mr-2">Salvar</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- tabs  -->
            <div class="card-panel">
                <blockquote>
                <h6>Lista dos Tipos de Endereços:</h6>
              </blockquote>
             
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%" class="table ps-table">
                <thead>
                  <tr>
                    <th ></th>                   
                    <th>ID</th>
                    <th>Nome</th>             
                    <th>Criado em</th>                            
                    <th>Status</th>
                    <th>Ações</th>                   
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($TiposEnderecos->getDataAs("ConfigTipoEndereco") as $te):?>
                    <tr>
                      <td ></td>                     
                      <td><?= $te->get("id")?></td>
                      <td><?= ucfirst(strtolower($te->get("nome")))?></td>                    
                      <td><?= date("d-m-Y", strtotime($te->get("data_criacao")))?></td>                                  
                      <?php if($te->get("status")):?>
                      <td>
                        <span class="chip green lighten-5">
                          <span class="green-text">Ativo</span>
                        </span>
                      </td>  
                      <?php else: ?>
                      <td>
                        <span class="chip red lighten-5">
                          <span class="red-text">Desativado</span>
                        </span>
                      </td>  
                      <?php endif; ?>
                      <td><a href="javascript:void(0)" class="tooltipped edit-dados" data-position="top" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $te->get("id")?>" data-type="ConfigTipoEndereco" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                   
                    </tr>
                  <?php endforeach;?>
                       
                </tbody>
              </table>
            </div>
            <!-- datatable ends -->
          </div>
        </div>
   
            </div>
          </div>
          
                     <div id="tipo-imovel">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro do Tipo de Imóvel</h6>
              </blockquote>
              <form class="infovalidate" method="POST">
                <input type="hidden" name="action" value="salvarTipoImovel">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                     <select id="status-tipo-imovel" name="status-tipo-imovel" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome-tipo-imovel" type="text" name="nome-tipo-imovel" class="validate" placeholder="Escreva o nome do tipo de imóvel...">
                      <label for="nome-tipo-imovel">Nome do tipo de Imóvel:</label>
                    </div>
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col s12 display-flex justify-content-end">
                    <button type="submit" class="btn indigo waves-effect waves-light mr-2">Salvar</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- tabs  -->
            <div class="card-panel">
                <blockquote>
                <h6>Lista dos Tipos de Imóveis:</h6>
              </blockquote>
             
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%" class="table ps-table">
                <thead>
                  <tr>
                    <th ></th>                   
                    <th>ID</th>
                    <th>Nome</th>             
                    <th>Criado em</th>                            
                    <th>Status</th>
                    <th>Ações</th>                   
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($TiposImoveis->getDataAs("ConfigTipoImovel") as $ti):?>
                    <tr>
                      <td ></td>                     
                      <td><?= $ti->get("id")?></td>
                      <td><?= ucfirst(strtolower($ti->get("nome")))?></td>                    
                      <td><?= date("d-m-Y", strtotime($ti->get("data_criacao")))?></td>                                  
                      <?php if($ti->get("status")):?>
                      <td>
                        <span class="chip green lighten-5">
                          <span class="green-text">Ativo</span>
                        </span>
                      </td>  
                      <?php else: ?>
                      <td>
                        <span class="chip red lighten-5">
                          <span class="red-text">Desativado</span>
                        </span>
                      </td>  
                      <?php endif; ?>
                      <td><a href="javascript:void(0)" class="tooltipped edit-dados" data-position="top" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $ti->get("id")?>" data-type="ConfigTipoImovel" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                   
                    </tr>
                  <?php endforeach;?>
                       
                </tbody>
              </table>
            </div>
            <!-- datatable ends -->
          </div>
        </div>

            </div>
          </div>
           <div id="tipo-residencia">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro de Tipo de Residência</h6>
              </blockquote>
              <form class="infovalidate" method="POST">
                <input type="hidden" name="action" value="salvarTipoResidencia">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                     <select id="status-tipo-residencia" name="status-tipo-residencia" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome-tipo-residencia" type="text" name="nome-tipo-residencia" class="validate" placeholder="Escreva o nome do tipo de residência...">
                      <label for="nome-tipo-residencia">Nome do Tipo de Residência:</label>
                    </div>
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col s12 display-flex justify-content-end">
                    <button type="submit" class="btn indigo waves-effect waves-light mr-2">Salvar</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- tabs  -->
            <div class="card-panel">
                <blockquote>
                <h6>Lista dos Tipos de Residência:</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%" id="tipo-residencia-lista-datatable" class="table">
                <thead>
                  <tr>
                    <th ></th>                   
                    <th>ID</th>
                    <th>Nome</th>             
                    <th>Criado em</th>                            
                    <th>Status</th>
                    <th>Ações</th>                   
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($TiposResidencias->getDataAs("ConfigTipoResidencia") as $tipor):?>
                    <tr>
                      <td ></td>                     
                      <td><?= $tipor->get("id")?></td>
                      <td><?= ucfirst(strtolower($tipor->get("nome")))?></td>                    
                      <td><?= date("d-m-Y", strtotime($tipor->get("data_criacao")))?></td>                                  
                      <?php if($tipor->get("status")):?>
                      <td>
                        <span class="chip green lighten-5">
                          <span class="green-text">Ativo</span>
                        </span>
                      </td>  
                      <?php else: ?>
                      <td>
                        <span class="chip red lighten-5">
                          <span class="red-text">Desativado</span>
                        </span>
                      </td>  
                      <?php endif; ?>
                      <td><a href="javascript:void(0)" class="tooltipped edit-dados" data-position="top" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $tipor->get("id")?>" data-type="ConfigTipoResidencia" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                   
                    </tr>
                  <?php endforeach;?>
                       
                </tbody>
              </table>
            </div>
            <!-- datatable ends -->
          </div>
        </div>
      </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
  </div>
</div>