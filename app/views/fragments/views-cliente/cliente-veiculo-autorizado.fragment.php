<!-- tabs content -->
          <div id="veiculo-autorizado" class="divAba" hidden>		
						<div class="card-panel">
              <div class="row">
                
              <div class="col s12 m6 l6">
               <blockquote>
                <h6>Veículos Cadastrados</h6>
               </blockquote>
                </div>
								<div class="col s12 m6 l6 display-flex align-items-center show-btn">
                	<a href="javascript:void(0)" data-id="#modalVeiculoAutorizado" class="waves-effect btn-block waves-light btn view-data" style="top:10px;"><i class="material-icons left">perm_contact_calendar</i> Adicionar Veículo Autorizado</a>                
              	</div> 
							</div>							 
									
										<div class="card">
											<div class="card-content">
												<!-- datatable start -->
												<div class="responsive-table">
													<table style="width:100%" class="table ps-table">
														<thead>
															<tr>
																<th>Veículo</th>															
																<th>Placa</th>                            
																<th>Motorista</th>
																<th>Ações</th>                    
															</tr>
														</thead>
														<tbody>														
												<?php foreach($ClientesVeiculosAutorizados->getDataAs("ClienteVeiculoAutorizado") as $e):?>
																<tr>																
																	<td style="background-color:#f3f3f3"><b><?= $e->get("nome_veiculo") ?></b></td>																	
																	<td><?= $e->get("placa_veiculo") ?></td>
																	<td><?= $this->consultarFuncionario($e->get("motorista_veiculo")); ?></td>
																	 <td>
																		 <a href="javascript:void(0)" class="tooltipped view-data" data-id="<?= "#modalVeiculoAutorizado" . $e->get("id")?>" data-position="top" data-type="VeiculoAutorizado" data-tooltip="Editar">
																			 <i class="material-icons">edit</i>
																		 </a>
                      							 <a href="javascript:void(0)" data-id="<?= $e->get("id") ?>" class="tooltipped remover-dados red-text" data-type="ClienteVeiculoAutorizado" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a>
																	</td>     
																</tr>
																  <div id="modalVeiculoAutorizado<?= $e->get("id") ?>" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
																			<div class="modal-content modal-color">      
																				<form class="formValidate" 
                                              action="<?= APPURL . "/clientes/edit/" . $e->get("id")?>"
                                              method="POST">

                                       <input name="action" value="salvarVeiculoAutorizado" type="hidden">
                                       <input name="idVeiculoAutorizado" value="<?= $e->get("id") ?>" type="hidden">		
              <blockquote>
                <h6>Cadastro de Veículo Autorizado </h6>
              </blockquote>
                    <div class="row">
                      <div class="col s12 m4">
                        <div class="input-field ">
                          <select name="situacao_veiculo" class="select2 browser-default">
                            <option value="0" disabled selected>Status do Cliente</option>
                            <option value="1" <?= $e->get("situacao_veiculo") == 1 ? "selected" : "" ?>>Ativo</option>
                            <option value="2" <?= $e->get("situacao_veiculo") == 2 ? "selected" : "" ?>>Inativo</option>                       
                          </select>
                           <label for="situacao_veiculo" class="label active">Situação do Veículo:</label>
                        </div>                       
                      </div>
                      <div class="col s12 m4">
                        <div class="input-field mt-19px">      
                          <input  name="nome_veiculo" value="<?= $e->get("nome_veiculo") ?>">
                          <label for="nome-veiculo" class="label">Veículo:</label>
                        </div>                       
                      </div>
                      <div class="col s12 m4">
                        <div class="input-field mt-19px">
                          <input  name="placa_veiculo" value="<?= $e->get("placa_veiculo") ?>">
                          <label for="placa_veiculo" class="label">Placa:</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12 m6">
                       <div class="input-field ">
                          <select name="motorista_veiculo" class="select2 browser-default motorista">
                            <option value="0" disabled selected>Selecione</option>
                            <?php foreach($ClientesFuncionarios->getDataAs("ClienteFuncionario") as $cf) : ?>
                            <option data-id="<?= $cf->get("cpf_funcionario") ?>"<?= $cf->get("id") == $e->get("motorista_veiculo")  ? "selected" : "" ?> value="<?=$cf->get("id") ?>"><?=$cf->get("nome_funcionario") ?> </option>
                           <?php endforeach?>
                          </select>
													 <label for="motorista_veiculo" class="label active">Motorista:</label>
                        </div>                          
                      </div>
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">      
                          <input class="cpf_motorista" name="cpf_motorista_veiculo" onkeypress="onlynumberrealy();" onblur="javascript: formatField(this);" onfocus="javascript: cleanFormat(this);"
                                 value="<?= $e->get("cpf_motorista_veiculo") ?>">
                          <label for="cpf_motorista_veiculo" class="label">CPF do Motorista</label>
                        </div>                       
                      </div>
                       <div class="col s12 m3">
                        <div class="input-field mt-19px">      
                          <input class="inputCnh" name="cnh_motorista_veiculo" value="<?= $e->get("cnh_motorista_veiculo") ?>">
                          <label for="cnh_motorista_veiculo" class="label">CNH do Motorista:</label>
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
                         <?php endforeach; ?>										
                            </tbody>
                          </table>
                        </div>
                        <!-- datatable ends -->
                      </div>
                    </div>
									       
              </div> 
						<div id="modalVeiculoAutorizado" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
																			<div class="modal-content modal-color"> 
           
							<form class="formValidate" 
                   	action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
                    method="POST">
								
             <input name="action" value="salvarVeiculoAutorizado" type="hidden">
								
             <blockquote>
                <h6>Cadastro de Veículo Autorizado </h6>
              </blockquote>
                
                    <div class="row">
                      <div class="col s12 m4">
                        <div class="input-field ">
                          <select name="situacao_veiculo" class="select2 browser-default">
                            <option value="0" disabled selected>Status do Cliente</option>
                            <option value="1">Ativo</option>
                            <option value="2">Inativo</option>                       
                          </select>
                           <label for="situacao_veiculo" class="label active">Situação do Veículo:</label>
                        </div>                       
                      </div>
                      
                      <div class="col s12 m4">
                        <div class="input-field mt-19px">      
                          <input  name="nome_veiculo" value="">
                          <label for="nome_veiculo" class="label">Veículo:</label>
                        </div>                       
                      </div>
                      <div class="col s12 m4">
                        <div class="input-field mt-19px">
                          <input  name="placa_veiculo" value="">
                          <label for="placa_veiculo" class="label">Placa:</label>
                        </div>
                      </div>
                    </div>
                
                    <div class="row">
                      <div class="col s12 m6">
                       <div class="input-field ">
                          <select name="motorista_veiculo" class="select2 browser-default motorista">
                            <option value="0" disabled selected>Selecione</option>
                            <?php foreach($ClientesFuncionarios->getDataAs("ClienteFuncionario") as $cf) : ?>
                            <option value="<?=$cf->get("id") ?>"><?=$cf->get("nome_funcionario") ?> </option>
                           <?php endforeach?>
                          </select>
													 <label for="motorista_veiculo" class="label active">Motorista:</label>
                        </div>                          
                      </div>
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">      
                          <input class="cpf_motorista" name="cpf_motorista_veiculo" onkeypress="onlynumberrealy();" onblur="javascript: formatField(this);" onfocus="javascript: cleanFormat(this);"
                                 value="">
                          <label for="cpf_motorista_veiculo" class="label">CPF do Motorista</label>
                        </div>                       
                      </div>
                       <div class="col s12 m3">
                        <div class="input-field mt-19px">      
                          <input class="inputCnh" name="cnh_motorista_veiculo" value="">
                          <label for="cnh_motorista_veiculo" class="label">CNH do Motorista:</label>
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
            <!-- tabs content -->