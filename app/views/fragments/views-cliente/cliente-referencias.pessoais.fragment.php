	
						<div class="card-panel">
						  <div class="row">
							
						  <div class="col s12 m6 l6">
						   <blockquote>
							<h6>Cadastro Referencias</h6>
						   </blockquote>
							</div>
											<div class="col s12 m6 l6 display-flex align-items-center show-btn">
								<a href="javascript:void(0)" data-id="#modalRefPessoalGeral" class="waves-effect btn-block waves-light btn view-data" style="top:10px;"><i class="material-icons left">add_shopping_cart</i> Adicionar Referência Pessoal</a>
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
																			<th>Telefone</th> 
																			<th>Relação</th>                            
																			<th>Ações</th>                    
																		</tr>
																	</thead>
																	<tbody>														
																			<?php foreach($ClientesRefPessoais->getDataAs("ClienteReferenciaPessoal") as $e):?>
																			<tr>																
																				<td style="background-color:#f3f3f3"><b><?=$e->get("nome_referencia") ?></b></td>
																				<td><?= $e->get("telefone_referencia") ?></td>                                   
 																				<td><?= $this->relacaoTrabalho($e->get("relacao_referencia")) ?></td> 
																				 <td>
																					 <a href="javascript:void(0)" class="tooltipped view-data" data-id="<?= "#modalRefPessoal" . $e->get("id")?>" data-position="top" data-type="ClienteReferenciaPessoal" data-tooltip="Editar">
																						 <i class="material-icons">edit</i>
																					 </a>
															   <a href="javascript:void(0)" data-id="<?= $e->get("id") ?>" class="tooltipped remover-dados red-text" data-type="ClienteReferenciaPessoal" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a>
																				</td>     
																			</tr>
																			  <div id="modalRefPessoal<?= $e->get("id") ?>" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
																						<div class="modal-content">      
																							<form class="formValidate" 
																														action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
																											      method="POST">
			
																										 <input name="action" value="salvarReferenciaPessoal" type="hidden">
																										 <input name="idRefPessoal" value="<?= $e->get("id") ?>" type="hidden">		
																											<blockquote>
																												<h6>Referência Pessoal </h6>
																											</blockquote>

																														<div class="row">
																															<div class="col s12 m6">
																																<div class="input-field mt-19px">    
																																	<input name="nome_referencia" value=" <?= $e->get("nome_referencia") ?>">
																																	<label for="nome_referencia" class="label">Nome do Contato</label>
																																</div>                       
																															</div>
																															<div class="col s12 m3">
																																<div class="input-field mt-19px">      
																																	<input name="telefone_referencia" onkeypress="onlynumberrealy();" onblur="javascript: formatTel(this);" onfocus="javascript: cleanFormat(this);" maxlength="11"
                                                                          value="<?= $e->get("telefone_referencia") ?>">
																																	<label for="telefone_referencia" class="label">Telefone do Contato</label>
																																</div>                
																															</div>
																															<div class="col s12 m3">
																																<div class="input-field ">
																																	<select name="relacao_referencia" class="select2 browser-default">
																																		<option value="0" disabled selected>Selecione</option>
																																		<option value="1" <?= $e->get("relacao_referencia") == 1 ? "selected" : "" ?>>Supervisor</option>
																																		<option value="2"  <?= $e->get("relacao_referencia") == 2 ? "selected" : "" ?>>Trabalho</option>                       
																																	</select>
																																	 <label for="relacao_referencia" class="label active">Relação</label>
																																</div>                       
																															</div> 
																														</div>
																												<div class="row">
																													<div class="col s12 m12">
																																<div class="input-field mt-19px">    
																																	<input name="observacao_referencia" value=" <?= $e->get("observacao_referencia")?>">
																																	<label for="observacao_referencia" class="label">Observação</label>
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
			
			
													