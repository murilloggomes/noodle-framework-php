<div class="col s12">
  <div class="container">
    <!-- Account settings -->
    <section class="tabs-vertical mt-1 section">
      <div class="row">
        <div class="col l4 s12">
          <!-- tabs  -->
          <div class="card-panel">
            <blockquote>
              <h6>Configuração de Produto</h6>
            </blockquote>

            <ul class="tabs">
              <li class="tab">
                <a href="#general">
                  <i class="material-icons">supervisor_account</i>
                  <span>NCM</span>
                </a>
              </li>
              <li class="tab">
                <a href="#kit-produto">
                  <i class="material-icons">work</i>
                  <span>Kits de Produtos</span>
                </a>
              </li>
              <li class="tab">
                <a href="#segmento-produto">
                  <i class="material-icons">streetview</i>
                  <span>Segmentos de Produtos</span>
                </a>
              </li>
              <li class="tab" >
                <a href="#tipo-produto">
                  <i class="material-icons">free_breakfast</i>
                  <span>Tipos de Produtos</span>
                </a>
              </li>
              <li class="tab" >
                <a href="#modelo-produto">
                  <i class="material-icons">palette</i>
                  <span>Modelos de Produtos</span>
                </a>
              </li>
              <li class="tab" >
                <a href="#origem-produto">
                  <i class="material-icons">pin_drop</i>
                  <span>Origens de Produtos</span>
                </a>
              </li>
              <li class="tab" >
                <a href="#fabricante-produto">
                  <i class="material-icons">location_city</i>
                  <span>Fabricantes de Produtos</span>
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
              <h6>Cadastro de NCM</h6>
              </blockquote>
              <form class="paaswordvalidate" method="POST">
                <input type="hidden" name="action" value="salvarNcm">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                      <select id="status_ncm" name="status_ncm" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome_ncm" type="text" name="nome_ncm" class="validate">
                      <label for="nome_ncm">NCM</label>
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
                <h6>Lista dos Kits de Produtos</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%"  id="kitproduto-lista-datatable" class="table">
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
                  <?php foreach($KitProdutos->getDataAs("KitProduto") as $u):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $u->get("id")?>" data-type="KitProduto" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                    
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
          
          <div id="kit-produto">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro do Kit de Produto</h6>
              </blockquote>
              <form class="paaswordvalidate" method="POST">
                <input type="hidden" name="action" value="salvarKitProduto">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                      <select id="status_kitproduto" name="status_kitproduto" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome_kitproduto" type="text" name="nome_kitproduto" class="validate">
                      <label for="nome_kitproduto">Nome do Kit de Produto</label>
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
                <h6>Lista dos Kits de Produtos</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%"  id="kitproduto-lista-datatable" class="table">
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
                  <?php foreach($KitProdutos->getDataAs("KitProduto") as $u):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $u->get("id")?>" data-type="KitProduto" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                    
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
          <div id="segmento-produto">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro de Segmento de Produto</h6>
              </blockquote>
              <form class="paaswordvalidate" method="POST">
                <input type="hidden" name="action" value="salvarSegmentoProduto">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                      <select id="status_segmentoproduto" name="status_segmentoproduto" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome_segmentoproduto" type="text" name="nome_segmentoproduto" class="validate" >
                      <label for="nome_segmentoproduto"> Nome do Segmento de Produto</label>
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
                <h6>Lista dos Segmentos de Produtos Cadastrados</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%"  id="segmentoproduto-lista-datatable" class="table">
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
                  <?php foreach($SegmentoProdutos->getDataAs("SegmentoProduto") as $u):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $u->get("id")?>" data-type="SegmentoProduto" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                    
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
          <div id="tipo-produto">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro do Tipo de Produto</h6>
              </blockquote>
              <form class="paaswordvalidate" method="POST">
                <input type="hidden" name="action" value="salvarTipoProduto">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                      <select id="status_tipoproduto" name="status_tipoproduto" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome_tipoproduto" type="text" name="nome_tipoproduto" class="validate">
                      <label for="nome_tipoproduto">Nome do Tipo de Produto</label>
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
                <h6>Lista dos Tipos de Produtos</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%"  id="tipoproduto-lista-datatable" class="table">
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
                  <?php foreach($TipoProdutos->getDataAs("TipoProduto") as $u):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $u->get("id")?>" data-type="TipoProduto" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                    
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
          <div id="modelo-produto">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro do Modelo de Produto</h6>
              </blockquote>
              <form class="paaswordvalidate" method="POST">
                <input type="hidden" name="action" value="salvarModeloProduto">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                      <select id="status_modeloproduto" name="status_modeloproduto" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome_modeloproduto" type="text" name="nome_modeloproduto" class="validate" >
                      <label for="nome_modeloproduto">Nome do Modelo de Produto</label>
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
                <h6>Lista dos Modelos de Produtos</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%"  id="modeloproduto-lista-datatable" class="table">
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
                  <?php foreach($ModeloProdutos->getDataAs("ModeloProduto") as $u):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $u->get("id")?>" data-type="ModeloProduto" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                    
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
          <div id="origem-produto">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro da Origem do Produto</h6>
              </blockquote>
              <form class="paaswordvalidate" method="POST">
                <input type="hidden" name="action" value="salvarOrigemProduto">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                      <select id="status_origemproduto" name="status_origemproduto" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome_origemproduto" type="text" name="nome_origemproduto" class="validate" >
                      <label for="nome_origemproduto">Nome do Modelo de Produto</label>
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
                <h6>Lista das Origens dos Produtos</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%"  id="origemproduto-lista-datatable" class="table">
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
                  <?php foreach($OrigemProdutos->getDataAs("OrigemProduto") as $u):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $u->get("id")?>" data-type="OrigemProduto" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                    
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
          <div id="fabricante-produto">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro do Fabricante do Produto</h6>
              </blockquote>
              <form class="paaswordvalidate" method="POST">
                <input type="hidden" name="action" value="salvarFabricanteProduto">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                      <select id="status_fabricanteproduto" name="status_fabricanteproduto" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input id="nome_fabricanteproduto" type="text" name="nome_fabricanteproduto" class="validate" >
                      <label for="nome_fabricanteproduto">Nome do Fabricante do Produto</label>
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
                <h6>Lista dos Fabricantes dos Produtos</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%"  id="fabricanteproduto-lista-datatable" class="table">
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
                  <?php foreach($FabricanteProdutos->getDataAs("FabricanteProduto") as $u):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $u->get("id")?>" data-type="FabricanteProduto" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                    
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
          </div>
          </div>