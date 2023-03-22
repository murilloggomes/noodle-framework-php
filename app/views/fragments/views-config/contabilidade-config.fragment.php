<div class="col s12">
  <div class="container">
    <!-- Account settings -->
    <section class="tabs-vertical mt-1 section">
      <div class="row">
        <div class="col l4 s12">
          <!-- tabs  -->
          <div class="card-panel">
            <blockquote>
              <h6>Configuração Contábil</h6>
            </blockquote>

            <ul class="tabs">
               <li class="tab">
                <a href="#1">
              <i class="material-icons">account_balance</i>
              <span>SPED</span>
            </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col s12 l8">
          <div id="1">
            <div class="card-panel">
              <blockquote>
                <h6>Cadastro de Tipo de SPED</h6>
              </blockquote>
              <form class="paaswordvalidate" method="POST">
                <input type="hidden" name="action" value="salvarTeste">
                <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field">
                      <select  name="status" class="select2 browser-default">
                        <option value="0" disabled selected>Situação</option>
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>                       
                      </select>
                    </div>
                  </div>
                   <div class="col s12 m6">
                    <div class="input-field mt-19px">
                      <input type="text" name="nome" class="validate" placeholder="Escreva um nome para o SPED">
                      <label for="nome">Nome do SPED</label>
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
                <h6>Lista dos SPEDs</h6>
              </blockquote>
              <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%"  id="teste-lista-datatable" class="table">
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
                  <?php foreach($Teste->getDataAs("ConfigTeste") as $u):?>
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
                      <a href="javascript:void(0)" class="tooltipped remover-dados red-text" data-id="<?= $u->get("id")?>" data-type="ConfigTeste" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a></td>                    
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