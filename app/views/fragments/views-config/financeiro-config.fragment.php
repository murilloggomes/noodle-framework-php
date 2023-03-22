<div class="col s12">
  <div class="container">
    <!-- Account settings -->
    <section class="tabs-vertical mt-1 section">
      <div class="row">
        <div class="col l4 s12">
          <!-- tabs  -->
          <div class="card-panel">
            <blockquote>
              <h6>Configuração do Financeiro</h6>
            </blockquote>

            <ul class="tabs">
               <li class="tab">
                <a href="#bancos">
              <i class="material-icons">account_balance</i>
              <span>Bancos</span>
            </a>
              </li>
              <li class="tab">
                <a href="#condicao-pagamento">
              <i class="material-icons">payment</i>
              <span>Condições de Pagamentos</span>
            </a>
              </li>
              <li class="tab">
                <a href="#icms">
              <i class="material-icons">compare_arrows</i>
              <span>ICMS</span>
            </a>
              </li>
              <li class="tab">
                <a href="#beneficio-fiscal">
              <i class="material-icons">exposure</i>
              <span>Benefício Fiscal</span>
            </a>
              </li>
              <li class="tab">
                <a href="#substituicao-tributaria">
              <i class="material-icons">sync</i>
              <span>Substituição Tributária</span>
            </a>
              </li>
              <li class="tab">
                <a href="#perfil-tributario">
              <i class="material-icons">account_box</i>
              <span>Perfil Tributário</span>
            </a>
              </li>
               <li class="tab">
              <a href="#regime-tributario">
            <i class="material-icons">transfer_within_a_station</i>
                <span>Regime Tributário</span>
            </a>
              </li>
                <li class="tab">
              <a href="#nota-fiscal">
            <i class="material-icons">description</i>
                <span>Nota Fiscal</span>
            </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col s12 l8">
          <div id="condicao-pagamento">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro de Condição de Pagamento</h6>
              </blockquote>
              <form class="paaswordvalidate" method="POST">
                <input type="hidden" name="action" value="salvarCondicaoPagamento">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                      <select id="status_condicao_pagamento" name="status_condicao_pagamento" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                   <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome_condicao_pagamento" type="text" name="nome_condicao_pagamento" class="validate" placeholder="Escreva o nome para a Condição de Pagamento">
                      <label for="nome_condicao_pagamento">Nome da Condição de Pagamento</label>
                    </div>
                  </div>
                  
                   <div class="col s12 m3">
                    <div class="input-field mt-19px">
                      <input id="taxa_condicao_pagamento" type="text" name="taxa_condicao_pagamento" class="validate" placeholder="Taxa de Juros para a condição">
                      <label for="taxa_condicao_pagamento">Taxa</label>
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
                <h6>Lista das Condições de Pagamentos Cadastrados</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%"  id="condicao-pagamento-lista-datatable" class="table">
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
                  <?php foreach($CondicoesPagamentos->getDataAs("CondicaoPagamento") as $u):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $u->get("id")?>" data-type="CondicaoPagamento" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                    
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
          
          <div id="icms">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro do ICMS:</h6>
              </blockquote>
              <form class="paaswordvalidate" method="POST">
                <input type="hidden" name="action" value="salvarIcm">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                      <select id="status_icms" name="status_icms" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome_icms" type="text" name="nome_icms" class="validate" placeholder="Escreva o nome para o ICMS">
                      <label for="nome_icms">Nome do ICMS</label>
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
                <h6>Lista dos ICMS</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%"  id="icm-lista-datatable" class="table">
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
                  <?php foreach($Icms->getDataAs("Icm") as $u):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $u->get("id")?>" data-type="Icm" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                    
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
      
          <div id="beneficio-fiscal">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro do Benefício Fiscal</h6>
              </blockquote>
              <form class="paaswordvalidate" method="POST">
                <input type="hidden" name="action" value="salvarBeneficioFiscal">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                      <select id="status_beneficio_fiscal" name="status_beneficio_fiscal" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome_beneficio_fiscal" type="text" name="nome_beneficio_fiscal" class="validate" placeholder="Escreva o nome do Benefício">
                      <label for="nome_beneficio_fiscal">Nome do Benefício Fiscal</label>
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
                <h6>Lista dos Benefícios Fiscais</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%"  id="beneficio-fiscal-lista-datatable" class="table">
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
                  <?php foreach($BeneficioFiscais->getDataAs("BeneficioFiscal") as $u):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $u->get("id")?>" data-type="BeneficioFiscal" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                    
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
          <div id="substituicao-tributaria">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro de Substituição Tributária</h6>
              </blockquote>
              <form class="paaswordvalidate" method="POST">
                <input type="hidden" name="action" value="salvarSubstituicaoTributaria">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                      <select  name="status_substituicao_tributaria" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome_substituicao_tributaria" type="text" name="nome_substituicao_tributaria" class="validate" placeholder="Escreva o nome da Substituição Tributária">
                      <label for="nome_substituicao_tributaria">Nome da Substituição Tributária</label>
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
                <h6>Lista das Substituições Tributárias</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%"  id="substituicao-tributaria-lista-datatable" class="table">
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
                  <?php foreach($SubstituicoesTributarias->getDataAs("ConfigSubstituicaoTributaria") as $u):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $u->get("id")?>" data-type="ConfigSubstituicaoTributaria" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                    
                    </tr>
                  <?php endforeach;?>
                       
                </tbody>
              </table>
            </div>
          </div>
                </div>
              </div>
            </div>
          </div>
            
          <div id="perfil-tributario">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro de Perfil Tributário</h6>
              </blockquote>
              <form class="infovalidate" method="POST">
                <input type="hidden" name="action" value="salvarPerfilTributario">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                     <select id="status_perfil_tributario" name="status_perfil_tributario" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome_perfil_tributario" type="text" name="nome_perfil_tributario" class="validate" placeholder="Escreva o nome do Perfil Tributário">
                      <label for="nome_perfil_tributario">Nome do Perfil tributário</label>
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
                <h6>Lista de Perfis Tributários</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%" id="perfil-tributario-lista-datatable" class="table">
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
                  <?php foreach($PerfisTributarios->getDataAs("ConfigPerfilTributario") as $rt):?>
                    <tr>
                      <td ></td>                     
                      <td><?= $rt->get("id")?></td>
                      <td><?= ucfirst(strtolower($rt->get("nome")))?></td>                    
                      <td><?= date("d-m-Y", strtotime($rt->get("data_criacao")))?></td>                                  
                      <?php if($rt->get("status")):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $rt->get("id")?>" data-type="ConfigPerfilTributario" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                   
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
          
          
          
          <div id="regime-tributario">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro do Regime Tributário</h6>
              </blockquote>
              <form class="infovalidate" method="POST">
                <input type="hidden" name="action" value="salvarRegimeTributario">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                     <select id="status_regime_tributario" name="status_regime_tributario" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome_regime_tributario" type="text" name="nome_regime_tributario" class="validate" placeholder="Escreva o nome do Regime tributário">
                      <label for="nome_regime_tributario">Nome do Regime tributário</label>
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
                <h6>Lista dos Regimes tributários</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%" id="regime-tributario-lista-datatable" class="table">
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
                  <?php foreach($RegimesTributarios->getDataAs("ConfigRegimeTributario") as $rt):?>
                    <tr>
                      <td ></td>                     
                      <td><?= $rt->get("id")?></td>
                      <td><?= ucfirst(strtolower($rt->get("nome")))?></td>                    
                      <td><?= date("d-m-Y", strtotime($rt->get("data_criacao")))?></td>                                  
                      <?php if($rt->get("status")):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $rt->get("id")?>" data-type="ConfigRegimeTributario" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                   
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
           <div id="bancos">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro de Banco</h6>
              </blockquote>
              <form class="infovalidate" method="POST">
                <input type="hidden" name="action" value="salvarBancos">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                     <select name="status_banco" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome_banco" type="text" name="nome_banco" class="validate" placeholder="Escreva o nome do Banco">
                      <label for="nome_banco">Nome do Banco</label>
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
                <h6>Lista dos Bancos cadastrados</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%" id="banco-lista-datatable" class="table">
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
                  <?php foreach($Bancos->getDataAs("ConfigBanco") as $b):?>
                    <tr>
                      <td ></td>                     
                      <td><?= $b->get("id")?></td>
                      <td><?= ucfirst(strtolower($b->get("nome")))?></td>                    
                      <td><?= date("d-m-Y", strtotime($b->get("data_criacao")))?></td>                                  
                      <?php if($b->get("status")):?>
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
                      <td><a href="javascript:void(0)" class="tooltipped edit-dados" data-position="top" data-type="ConfigBanco" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $b->get("id")?>" data-type="ConfigBanco" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                   
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
           <div id="nota-fiscal">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro do Tipo da Nota Fiscal</h6>
              </blockquote>
              <form class="infovalidate" method="POST">
                <input type="hidden" name="action" value="salvarNotaFiscal">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                     <select name="status" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input type="text" name="nome" class="validate" placeholder="Escreva o nome para a Nota Fiscal">
                      <label for="nome_banco">Nome da Nota Fiscal</label>
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
                <h6>Lista das Nota Fiscais cadastrados</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%" id="banco-lista-datatable" class="table">
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
                  <?php foreach($NotaFiscal->getDataAs("ConfigNotaFiscal") as $nf):?>
                    <tr>
                      <td ></td>                     
                      <td><?= $nf->get("id")?></td>
                      <td><?= ucfirst(strtolower($nf->get("nome")))?></td>                    
                      <td><?= date("d-m-Y", strtotime($nf->get("data_criacao")))?></td>                                  
                      <?php if($nf->get("status")):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $nf->get("id")?>" data-type="ConfigNotaFiscal" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                   
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