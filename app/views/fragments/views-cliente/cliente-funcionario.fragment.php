<!-- tabs content -->
<div id="cliente-funcionario" class="divAba" hidden>				
						
  <div class="card-panel">
    <div class="row">

    <div class="col s12 m6 l6">
     <blockquote>
    <h6>Compradores Funcionario</h6>
     </blockquote>
    </div>
            <div class="col s12 m6 l6 display-flex align-items-center show-btn">
      <a href="javascript:void(0)" data-id="#modalFuncionarioGeral" class="waves-effect btn-block waves-light btn view-data" style="top:10px;"><i class="material-icons left">add_shopping_cart</i> Adicionar Funcionários</a>
      </div> 
          </div>							 

  <div class="card">
    <div class="card-content">
      <!-- datatable start -->
      <div class="responsive-table">
        <table style="width:100%" class="table ps-table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Endereço</th> 
              <th>Estado</th>                            
              <th>CEP</th>
              <th>Ações</th>                    
            </tr>
          </thead>
          <tbody>														
              <?php foreach($ClientesFuncionarios->getDataAs("ClienteFuncionario") as $e):?>
              <?php $endereco = json_decode($e->get("dados_funcionarios"), true); ?>
              <tr>																
                <td style="background-color:#f3f3f3"><b><?= $e->get("nome_funcionario"); ?></b></td>
                <td><?= $endereco[0]['logradouro_funcionario'] ?></td>
                <td><?= $endereco[0]['estado_funcionario'] ?></td>
                <td><?= $endereco[0]['cep_funcionario'] ?> </td>
                 <td>
                   <a href="javascript:void(0)" class="tooltipped view-data" data-id="<?= "#modalFuncionario" . $e->get("id")?>" data-position="top" data-type="ClienteFuncionario" data-tooltip="Editar">
                     <i class="material-icons">edit</i>
                   </a>
         <a href="javascript:void(0)" data-id="<?= $e->get("id") ?>" class="tooltipped remover-dados red-text" data-type="ClienteFuncionario" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a>
                </td>     
              </tr>
                <div id="modalFuncionario<?= $e->get("id") ?>" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
                    <div class="modal-content modal-color">      
                    <form class="formValidate" 
                                  action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
                                  method="POST">

                           <input name="action" value="salvarFuncionario" type="hidden">
                           <input name="idFuncionario" value="<?= $e->get("id") ?>" type="hidden">		
                            <blockquote>
                              <h6>Cadastro de Funcionário</h6>
                            </blockquote>
                            <div class="row">                      
                                    <div class="col s12 m6">
                                      <div class="input-field mt-19px">    
                                        <input name="nome_funcionario" value="<?= $e->get("nome_funcionario") ?>">
                                        <label for="nome_funcionario" class="label" >Nome do Funcionário</label>
                                      </div>                       
                                    </div>
                                    <div class="col s12 m3">
                                      <div class="input-field mt-19px">      
                                        <input name="cpf_funcionario"  onkeypress="onlynumberrealy();" onblur="javascript: formatField(this);" onfocus="javascript: cleanFormat(this);" maxlength="11"  value="<?= formata_cpf_cnpj($e->get("cpf_funcionario")) ?>">
                                        <label for="cpf_funcionario" class="label" >CPF do Funcionário</label>
                                      </div>                       
                                    </div>
                                    <div class="col s12 m3">
                                      <div class="input-field ">
                                        <select name="cargo_funcionario" class="select2 browser-default">
                                          <option value="0" disabled selected>Selecione o Cargo</option>
                                          <?php foreach($Cargos->getDataAs("Cargo") as $c): ?>
                                          <option <?= $e->get("cargo_funcionario") == $c->get("id") ? "selected": "" ?> value="<?= $c->get("id") ?>"><?= $c->get("nome") ?></option>
                                          <?php endforeach;?>
                                        </select>
                                         <label for="cargo_funcionario" class="label active">Cargo:</label>
                                      </div>                       
                                    </div>
                                  </div>
                                  <div class="row">                      
                                    <div class="col s12 m3">
                                      <div class="input-field ">
                                        <select name="relacao_trabalho" class="select2 browser-default">
                                          <option value="0" disabled selected>Selecione a Relação</option>
                                          <option value="1" <?=$e->get("relacao_trabalho") == 1 ? "selected" : "" ?>>Sociedade</option>
                                          <option value="2" <?=$e->get("relacao_trabalho") == 2 ? "selected" : "" ?>>Supervisor</option>
                                          <option value="3" <?=$e->get("relacao_trabalho") == 3 ? "selected" : "" ?>>Subordinado</option>    
                                        </select>
                                         <label for="relacao_trabalho" class="label active">Relação de Trabalho:</label>
                                      </div>                       
                                    </div>
                                    <div class="col s12 m3">
                                      <div class="input-field mt-19px">      
                                        <input name="telefone_funcionario" onkeypress="onlynumberrealy();" onblur="javascript: formatTel(this);" onfocus="javascript: cleanFormat(this);" maxlength="11"
                                               value="<?= $e->get("telefone_funcionario") ?>">
                                        <label for="telefone_funcionario" class="label" >Telefone:</label>
                                      </div>                       
                                    </div>																															 
                                     <div class="col s12 m3">
                                      <div class="input-field mt-19px">      
                                        <input name="email_funcionario"  value="<?= $e->get("email_funcionario") ?>">
                                        <label for="email_funcionario" class="label" >E-mail:</label>
                                      </div>                       
                                    </div>
                                  </div>
                            <blockquote>
                              <h6>Endereço</h6>
                            </blockquote>
                                  <div class="row">
                                    <div class="col s12 m2">
                                      <div class="input-field mt-19px">    
                                        <input class="cepField" name="cep_funcionario" onkeypress="onlynumberrealy();" onblur="javascript:formatCep(this);" onfocus="javascript:cleanFormat(this);" maxlength="8" value="<?= $endereco[0]['cep_funcionario'] ?>">
                                        <label for="cep_funcionario" class="label">CEP:</label>
                                      </div>                       
                                    </div>

                                    <div class="col s12 m8">
                                      <div class="input-field mt-19px">      
                                        <input class="logradouroField" name="logradouro_funcionario"  value="<?= $endereco[0]['logradouro_funcionario'] ?>">
                                        <label for="logradouro_funcionario" class="label" >Logradouro:</label>
                                      </div>                       
                                    </div>

                                    <div class="col s12 m2">
                                      <div class="input-field mt-19px">      
                                        <input name="numero_funcionario"  value="<?= $endereco[0]['numero_funcionario'] ?>">
                                        <label for="numero_funcionario" class="label" >Número:</label>
                                      </div>                       
                                    </div>
                                  </div>
                              <div class="row">
                                    <div class="col s12 m3">
                                      <div class="input-field mt-19px">    
                                        <input name="complemento_funcionario" value="<?= $endereco[0]['complemento_funcionario'] ?>">
                                        <label for="complemento_funcionario" class="label">Complemento:</label>
                                      </div>                       
                                    </div>
                                    <div class="col s12 m6">
                                      <div class="input-field mt-19px">      
                                        <input class="bairroField" name="bairro_funcionario"  value="<?= $endereco[0]['bairro_funcionario'] ?>">
                                        <label for="bairro_funcionario" class="label" >Bairro:</label>
                                      </div>                       
                                    </div>
                                    <div class="col s12 m3">
                                      <div class="input-field mt-19px">      
                                        <input name="referencia_funcionario"  value="<?= $endereco[0]['referencia_funcionario'] ?>">
                                        <label for="referencia_funcionario" class="label" >Ponto de Referência:</label>
                                      </div>                       
                                    </div>
                                  </div>
                              <div class="row">
                                    <div class="col s12 m4">
                                      <div class="input-field mt-19px">    
                                        <input class="localidadeField" name="cidade_funcionario" value="<?= $endereco[0]['cidade_funcionario'] ?>">
                                        <label for="cidade_funcionario" class="label">Cidade:</label>
                                      </div>                       
                                    </div>
                                    <div class="col s12 m4">
                                      <div class="input-field mt-19px">      
                                        <input class="estadoField" name="estado_funcionario"  value="<?= $endereco[0]['estado_funcionario'] ?>">
                                        <label for="estado_funcionario" class="label" >Estado:</label>
                                      </div>                       
                                    </div>
                                    <div class="col s12 m4">
                                      <div class="input-field mt-19px">      
                                        <input name="pais_funcionario"  value="<?= $endereco[0]['pais_funcionario'] ?>">
                                        <label for="pais_funcionario" class="label">País:</label>
                                      </div>                       
                                    </div>
                                  </div>
                               <blockquote>
                              <h6>Rendas e Dependentes</h6>
                              </blockquote>
                                  <div class="row">
                                    <div class="col s12 m3">
                                      <div class="input-field mt-19px">    
                                        <input type="date" name="data_admissao" value="<?=$e->get("data_admissao") ?>">
                                        <label for="data_admissao" class="label" >Data de Admissão:</label>
                                      </div>                       
                                    </div>
                                    <div class="col s12 m3">
                                      <div class="input-field ">
                                        <select name="renda_funcionario" class="select2 browser-default">
                                          <option value="0" disabled selected>Selecione</option>
                                          <option value="1" <?= $e->get("renda_funcionario") == "1" ? "selected" : "" ?>>Até R$ 1400,00</option>
                                          <option value="2" <?= $e->get("renda_funcionario") == "2" ? "selected" : "" ?>>De R$ 1.500,00 até 3.000,00</option>
                                          <option value="3" <?= $e->get("renda_funcionario") == "3" ? "selected" : "" ?> >De R$ 3.000,00 até 5.000,00</option> 
                                          <option value="4" <?= $e->get("renda_funcionario") == "4" ? "selected" : "" ?>>De R$ 5.000,00 até 10.000,00</option>
                                          <option value="5" <?= $e->get("renda_funcionario") == "5" ? "selected" : "" ?>>Acima de R$ 10.000,00</option>
                                        </select>
                                         <label for="renda_funcionario" class="label active">Renda Média:</label>
                                      </div>                       
                                    </div>
                                    <div class="col s12 m3">
                                      <div class="input-field mt-19px">      
                                        <input class="precoBRL"  name="outros_rendimentos" onfocus="javascript: cleanFormatMoney(this);" value="<?= $e->get("outros_rendimentos") ?>">
                                        <label for="outros_rendimentos" class="label" >Outros Rendimentos:</label>
                                      </div>                       
                                    </div>
                                     <div class="col s12 m3">
                                      <div class="input-field mt-19px">      
                                        <input name="numero_dependentes"  value="<?= $e->get("numero_dependentes") ?>">
                                        <label for="numero_dependentes" class="label">Número de Dependentes:</label>
                                      </div>                       
                                    </div>
                                  </div>
                                  <div class="row">  
                                    <div class="col s12 display-flex justify-content-end">
                                      <button type="submit" class="btn waves-effect waves-light mr-2">Salvar</button>
                                    </div>  
                                  </div>	
                              </form>
                                </div>
                            <?php endforeach; ?>										
                        </tbody>
                      </table>
                    </div>
                    <!-- datatable ends -->
                  </div>
                </div>
    </div>            
  <!-- tabs content -->
			
			<!-- Modal Structure -->
			<div id="modalFuncionarioGeral" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
					<div class="modal-content modal-color">      
						<form class="formValidate" 
                  action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
                  method="POST">

           <input name="action" value="salvarFuncionario" type="hidden">

            <blockquote>
              <h6>Cadastro de Endereço</h6>
            </blockquote>


            <div class="row">                      
                    <div class="col s12 m6">
                      <div class="input-field mt-19px">    
                        <input name="nome_funcionario" value="">
                        <label for="nome_funcionario" class="label">Nome do Funcionário</label>
                      </div>                       
                    </div>

                    <div class="col s12 m3">
                      <div class="input-field mt-19px">      
                        <input name="cpf_funcionario"  onkeypress="onlynumberrealy();" onblur="javascript: formatField(this);" onfocus="javascript: cleanFormat(this);"  value="" maxlength="11">
                        <label for="cpf_funcionario" class="label" >CPF do Funcionário</label>
                      </div>                       
                    </div>

                    <div class="col s12 m3">
                      <div class="input-field ">
                        <select name="cargo_funcionario" class="select2 browser-default">
                          <option value="0" disabled selected>Selecione o Cargo</option>
                          <?php foreach($Cargos->getDataAs("Cargo") as $c): ?>
                          <option value="<?=$c->get("id") ?>"><?=$c->get("nome") ?></option>
                          <?php endforeach;?>
                        </select>
                         <label for="cargo_funcionario" class="label active">Cargo:</label>
                      </div>                       
                    </div>
                  </div>
                  <div class="row">                      
                    <div class="col s12 m3">
                      <div class="input-field ">
                        <select name="relacao_funcionario" class="select2 browser-default">
                          <option value="0" disabled selected>Selecione a Relação</option>
                          <option value="1">Sociedade</option>
                          <option value="2">Supervisor</option>
                          <option value="3">Subordinado</option>    
                        </select>
                         <label for="relacao_funcionario" class="label active">Relação de Trabalho:</label>
                      </div>                       
                    </div>
                    <div class="col s12 m3">
                      <div class="input-field mt-19px">      
                        <input name="telefone_funcionario" onkeypress="onlynumberrealy();" onblur="javascript: formatTel(this);" onfocus="javascript: cleanFormat(this);" value="" maxlength="11">
                        <label for="telefone_funcionario" class="label" >Telefone:</label>
                      </div>                       
                    </div>																															 
                     <div class="col s12 m3">
                      <div class="input-field mt-19px">      
                        <input name="email_funcionario" type="email"  value="">
                        <label for="email_funcionario" class="label" >E-mail:</label>
                      </div>                       
                    </div>
                  </div>
            <blockquote>
              <h6>Endereço</h6>
            </blockquote>
                  <div class="row">
                    <div class="col s12 m2">
                      <div class="input-field mt-19px">    
                        <input class="cepField"name="cep_funcionario" maxlength="8" onkeypress="onlynumberrealy();" onblur="javascript: formatCep(this);" onfocus="javascript: cleanFormat(this);" placeholder="Ex: 00000-000"  value="">
                        <label for="cep_funcionario" class="label">CEP:</label>
                      </div>                       
                    </div>

                    <div class="col s12 m8">
                      <div class="input-field mt-19px">      
                        <input class="logradouroField" name="logradouro_funcionario"  value="">
                        <label for="logradouro_funcionario" class="label" >Logradouro:</label>
                      </div>                       
                    </div>

                    <div class="col s12 m2">
                      <div class="input-field mt-19px">      
                        <input name="numero_funcionario"  value="">
                        <label for="numero_funcionario" class="label" >Número:</label>
                      </div>                       
                    </div>
                  </div>
              <div class="row">
                    <div class="col s12 m3">
                      <div class="input-field mt-19px">    
                        <input name="complemento_funcionario" value="">
                        <label for="complemento_funcionario" class="label">Complemento:</label>
                      </div>                       
                    </div>
                    <div class="col s12 m6">
                      <div class="input-field mt-19px">      
                        <input class="bairroField" name="bairro_funcionario"  value="">
                        <label for="bairro_funcionario" class="label" >Bairro:</label>
                      </div>                       
                    </div>
                    <div class="col s12 m3">
                      <div class="input-field mt-19px">      
                        <input name="referencia_funcionario"  value="">
                        <label for="referencia_funcionario" class="label" >Ponto de Referência:</label>
                      </div>                       
                    </div>
                  </div>
              <div class="row">
                    <div class="col s12 m4">
                      <div class="input-field mt-19px">    
                        <input class="localidadeField" name="cidade_funcionario" value="">
                        <label for="cidade_funcionario" class="label">Cidade:</label>
                      </div>                       
                    </div>
                    <div class="col s12 m4">
                      <div class="input-field mt-19px">      
                        <input class="estadoField"name="estado_funcionario"  value="">
                        <label for="estado_funcionario" class="label" >Estado:</label>
                      </div>                       
                    </div>
                    <div class="col s12 m4">
                      <div class="input-field mt-19px">      
                        <input name="pais_funcionario"  value="">
                        <label for="pais_funcionario" class="label">País:</label>
                      </div>                       
                    </div>
                  </div>

               <blockquote>
              <h6>Rendas e Dependentes</h6>
              </blockquote>

                  <div class="row">

                    <div class="col s12 m3">
                      <div class="input-field mt-19px">    
                        <input name="data_admissao" value="" type="date">
                        <label for="data_admissao" class="label" >Data de Admissão:</label>
                      </div>                       
                    </div>
                    <div class="col s12 m3">
                      <div class="input-field ">
                        <select name="renda_funcionario" class="select2 browser-default">
                          <option value="0" disabled selected>Selecione</option>
                          <option value="1">Até R$ 1400,00</option>
                          <option value="2">De R$ 1.500,00 até 3.000,00</option>
                          <option value="3">De R$ 3.000,00 até 5.000,00</option>    
                        </select>
                         <label for="renda_funcionario" class="label active">Renda Média:</label>
                      </div>                       
                    </div>

                    <div class="col s12 m3">
                      <div class="input-field mt-19px">      
                        <input name="outros_rendimentos" value="">
                        <label for="outros_rendimentos" class="label" >Outros Rendimentos:</label>
                      </div>                       
                    </div>


                     <div class="col s12 m3">
                      <div class="input-field mt-19px">      
                        <input name="numero_dependentes"  value="">
                        <label for="numero_dependentes" class="label">Número de Dependentes:</label>
                      </div>                       
                    </div>

                  </div>

                  <div class="row">  
                    <div class="col s12 display-flex justify-content-end">
                      <button type="submit" class="btn waves-effect waves-light mr-2">Salvar</button>
                    </div>  
                  </div>	
              </form>																		
			  </div>
	    </div>
  </div>