	
						<div class="card-panel ">
						  <div class="row">
							
						  <div class="col s12 m6 l6">
						   <blockquote>
							<h6>Cadastro Referencias Bancárias</h6>
						   </blockquote>
							</div>
								<div class="col s12 m6 l6 display-flex align-items-center show-btn">
								<a href="javascript:void(0)" data-id="#modalRefBancariaGeral" class="waves-effect btn-block waves-light btn view-data" style="top:10px;"><i class="material-icons left">add_shopping_cart</i> Adicionar Referencia Bancária</a>
							  </div> 
										</div>							 
												
													<div class="card">
														<div class="card-content">
															<!-- datatable start -->
															<div class="responsive-table">
																<table style="width:100%" class="table ps-table">
																	<thead>
																		<tr>
																			<th>Banco</th>
																			<th>Conta</th> 
																			<th>Gerente da Conta</th>
                                      <th></th>
                                      <th></th>
																		</tr>
																	</thead>
																	<tbody>														
																			<?php foreach($ClientesRefBancarias->getDataAs("ClienteReferenciaBancaria") as $e):?>
																			<tr>																
																				<td style="background-color:#f3f3f3"><b><?= $this->consultarBanco($e->get("banco_referencia_bancaria"))?></b></td>
																				<td><?= $e->get("conta_referencia_bancaria")?></td>
																				<td><?= $e->get("gerente_conta_referencia_bancaria")?></td>
																				 <td>
																					 <a href="javascript:void(0)" class="tooltipped view-data" data-id="<?= "#modalRefBancaria" . $e->get("id")?>" data-position="top" data-type="ClienteReferenciaBancaria" data-tooltip="Editar">
																						 <i class="material-icons">edit</i>
																					 </a>
															   <a href="javascript:void(0)" data-id="<?= $e->get("id") ?>" class="tooltipped remover-dados red-text" data-type="ClienteReferenciaBancaria" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a>
																				</td>     
																			</tr>
																			  <div id="modalRefBancaria<?= $e->get("id") ?>" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
																						<div class="modal-content">      
																							<form class="formValidate" 
																														action="<?= APPURL . "/clientes/edit/1"?>"
																														method="POST">
			
																										 <input name="action" value="salvarReferenciaBancaria" type="hidden">
																										 <input name="idRefBancaria" value="<?= $e->get("id") ?>" type="hidden">		
							<blockquote>
                <h6>Referência Bancária </h6>
              </blockquote>
                                                
                    <div class="row"> 
                      <div class="col s12 m6">
                        <div class="input-field refbancaria">
                          <select name="banco_referencia_bancaria" class="select2 browser-default">
                            <option value="" disabled selected>Selecione</option>
                            <?php foreach($ConfigBancos->getDataAs("ConfigBanco") as $b) : ?>
                            <option <?= $b->get("id") == $e->get("banco_referencia_bancaria")  ? "selected" : "" ?> value="<?=$b->get("id") ?>"><?=$b->get("nome") ?> </option>
                           <?php endforeach?>
                          </select>
													 <label for="banco_referencia_bancaria" class="label active">Banco:</label>
                        </div>                       
                      </div> 
                      <div class="col s12 m2">
                        <div class="input-field refbancaria">
                          <select name="tipo_referencia_bancaria " class="select2 browser-default">
                            <option value="0" disabled selected>Selecione</option>
                            <option value="1" <?= $e->get("tipo_referencia_bancaria") == 1 ? "selected" : "" ?>>Banco Digital</option>
                            <option value="2" <?= $e->get("tipo_referencia_bancaria") == 2 ? "selected" : "" ?>>Poupança</option>
                            <option value="3" <?= $e->get("tipo_referencia_bancaria") == 3 ? "selected" : "" ?>>Conta conjunta</option> 
                          </select>
													 <label for="tipo_referencia_bancaria" class="label active">Tipo de Conta:</label>
                        </div>                       
                      </div> 
                      <div class="col s12 m2">
                        <div class="input-field mt-19px">      
													<input name="agencia_referencia_bancaria" value="<?= $e->get("agencia_referencia_bancaria") ?>">
													<label for="agencia_referencia_bancaria" class="label">Agência:</label>
                        </div>                
                      </div>
                      <div class="col s12 m2">
                        <div class="input-field mt-19px">      
													<input name="conta_referencia_bancaria" value="<?= $e->get("conta_referencia_bancaria") ?>">
													<label for="conta_referencia_bancaria" class="label">Conta:</label>
                        </div>                
                      </div>
                    </div>
                <div class="row">
                     <div class="col s12 m3">
                        <div class="input-field mt-19px">      
													<input name="gerente_conta_referencia_bancaria" value="<?= $e->get("gerente_conta_referencia_bancaria") ?>">
													<label for="gerente_conta_referencia_bancaria" class="label">Gerente da Conta:</label>
                        </div>                
                      </div>
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">    
                       <input name="tempo_referencia_bancaria" type="date" value="<?=$e->get("tempo_referencia_bancaria") ?>">
                       <label for="tempo_referencia_bancaria" class="label"> Cliente desde:</label>
                        </div>                            
                      </div> 
                      <div class="col s12 m3">
                        <div class="input-field refbancaria">
                          <select name="classificacao_referencia_bancaria" class="select2 browser-default refbancaria" >
                            <option value="0" disabled selected>Selecione</option>
                            <option value="1" <?= $e->get("classificacao_referencia_bancaria") == 1 ? "selected" : "" ?>>Banco Digital</option>
                            <option value="2" <?= $e->get("classificacao_referencia_bancaria") == 2 ? "selected" : "" ?>>Banco Investimentos</option>
                            <option value="3" <?= $e->get("classificacao_referencia_bancaria") == 3 ? "selected" : "" ?>>Banco de Desenvolvimento</option> 
                          </select>
													 <label for="classificacao_referencia_bancaria" class="label active">Classficação Bancária:</label>
                        </div>                       
                      </div> 
                      <div class="col s12 m3">
                        <div class="input-field refbancaria">
                          <select name="movimentacao_referencia_bancaria" class="select2 browser-default refbancaria">
                            <option value="0" disabled selected>Selecione</option>
                            <option value="1" <?=$e->get("movimentacao_referencia_bancaria") == 1 ? "selected" : "" ?>>Entre 10.000,00 - 50.000,00</option>
                            <option value="2" <?=$e->get("movimentacao_referencia_bancaria") == 2 ? "selected" : "" ?>>Entre 60.000,00 - 100.000,00</option>
                            <option value="3" <?=$e->get("movimentacao_referencia_bancaria") == 3 ? "selected" : "" ?>>Acima de 100.000,00</option> 
                          </select>
													 <label for="movimentacao_referencia_bancaria" class="label active">Movimentação Financeira:</label>
                        </div>                       
                      </div> 
                    </div>
                <div class="row">
                  <div class="col s12 m12">
                        <div class="input-field mt-19px">    
													<input name="observacao_referencia_bancaria" value="<?= $e->get("observacao_referencia_bancaria") ?>">
													<label for="observacao_referencia_bancaria" class="label">Observação</label>
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
                                <?php endforeach; ?>										
                            </tbody>
                          </table>
                        </div>
                        <!-- datatable ends -->
                      </div>
                    </div>

        </div>            
						<!-- tabs content -->