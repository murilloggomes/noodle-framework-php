<div class="col s12">
  <div class="container">
    <!-- Account settings -->
    <section class="tabs-vertical mt-1 section">
      <div class="row">
        <div class="col l4 s12">
          <!-- tabs  -->
          <div class="card-panel">
            <blockquote>
              <h6>Configuração de Empresa</h6>
            </blockquote>

            <ul class="tabs">
              <li class="tab">
               <a href="#empresas">
                <i class="material-icons">home</i>
                <span>Atividade da Empresa</span>
               </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col l8 s12">
          <!-- tabs content -->
          <div id="empresas">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro de Atividade da Empresa</h6>
              </blockquote>
              <form class="paaswordvalidate" method="POST">
                <input type="hidden" name="action" value="salvarAtividadeEmpresa">
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
                      <input type="text" name="atividade" class="validate" placeholder="Escolha a(s) atividade(s) da Empresa">
                      <label for="atividade">Atividade da Empresa:</label>
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
                <h6>Lista das Atividades da Empresa Cadastradas</h6>
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
                    <th>Atividade</th>             
                    <th>Criado Em</th>                            
                    <th>Status</th>
                    <th>Ações</th>                  
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($Empresas->getDataAs("ConfigEmpresa") as $e):?>
                    <tr>
                      <td ></td>                    
                      <td><?= $e->get("id")?></td>
                      <td><?= ucfirst(strtolower($e->get("atividade")))?></td>                    
                      <td><?= date("d-m-Y", strtotime($e->get("data_criacao")))?></td>                                  
                      <?php if($e->get("status") == 1):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $e->get("id")?>" data-type="ConfigEmpresa" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                    
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
    </section>
  </div>
</div>