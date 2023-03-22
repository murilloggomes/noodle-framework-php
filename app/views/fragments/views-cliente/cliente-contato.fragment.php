<!-- tabs content -->
          <div id="cliente-contato" class="divAba" hidden>		
						<div class="card-panel">
              <div class="row">
                
              <div class="col s12 m6 l6">
               <blockquote>
                <h6>Contatos Cadastrados</h6>
               </blockquote>
                </div>
								<div class="col s12 m6 l6 display-flex align-items-center show-btn">
                	<a href="javascript:void(0)" data-id="#modalContatoGeral" class="waves-effect btn-block waves-light btn view-data" style="top:10px;"><i class="material-icons left">perm_contact_calendar</i> Adicionar Contato</a>                
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
																<th>Número</th>                            
																<th>Ramal</th>
																<th>Ações</th>                    
															</tr>
														</thead>
														<tbody>														
																<?php foreach($ClientesContatos->getDataAs("ClienteContato") as $e):?>
																<tr>																
																	<td style="background-color:#f3f3f3"><b><?= $e->get("nome_contato_cliente") ?></b></td>																	
																	<td><?= formatar("fone",  $e->get("telefone_contato_cliente"), strlen($e->get("telefone_contato_cliente"))) ?></td>
                                  
																	<td><?= $e->get("ramal_contato_cliente") ?></td>
																	 <td>
																		 <a href="javascript:void(0)" class="tooltipped view-data" data-id="<?= "#modalContato" . $e->get("id")?>" data-position="top" data-type="ClienteContato" data-tooltip="Editar">
																			 <i class="material-icons">edit</i>
																		 </a>
                      							 <a href="javascript:void(0)" data-id="<?= $e->get("id") ?>" class="tooltipped remover-dados red-text" data-type="ClienteContato" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a>
																	</td>     
																</tr>
																  <div id="modalContato<?= $e->get("id") ?>" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
																			<div class="modal-content modal-color">      
																				<form class="formValidate" 
																											action="<?= APPURL . "/clientes/edit/" . $e->get("id")?>"
																											method="POST">

																							 <input name="action" value="salvarContato" type="hidden">
																							 <input name="idContato" value="<?= $e->get("id") ?>" type="hidden">		
																								 <blockquote>
																									<h6>Cadastro de Contatos</h6>
																								</blockquote>

																											<div class="row">
																												<div class="col s12 m3">
																													<div class="input-field ">
																														<select name="tipo_contato_cliente" class="select2 browser-default">
																															<option value="0" disabled selected>Tipo Contato do Cliente</option>
																															<option <?= $e->get("tipo_contato_cliente") == "1" ? "selected" : "" ?> value="1">Celular</option>
																															<option <?= $e->get("tipo_contato_cliente") == "2" ? "selected" : "" ?> value="2">Residêncial</option>
																															<option <?= $e->get("tipo_contato_cliente") == "3" ? "selected" : "" ?> value="3">Trabalho</option>    
																														</select>
																														 <label for="tipo_contato_cliente" class="label active">Tipo de Telefone:</label>
																													</div>                       
																												</div>
																												<div class="col s12 m5">
																													<div class="input-field mt-19px">      
																														<input name="nome_contato_cliente" value="<?= $e->get("nome_contato_cliente") ?>">
																														<label for="nome_contato_cliente" class="label">Nome do Contato</label>
																													</div>                       
																												</div>
																												<div class="col s12 m3">
																													<div class="input-field mt-19px">
																														<input name="telefone_contato_cliente" onkeypress="onlynumberrealy();" onblur="javascript: formatTel(this);" onfocus="javascript: cleanFormat(this);" maxlength="11"    value="<?= $e->get("telefone_contato_cliente") ?>">
																														<label for="telefone_contato_cliente" class="label">Telefone</label>
																													</div>
																												</div>
																												 <div class="col s12 m1 m-last">
																												  <div class="input-field mt-19px">
																													 <input name="ramal_contato_cliente" value="<?= $e->get("ramal_contato_cliente") ?>">
																													 <label for="ramal_contato_cliente" class="label">Ramal</label>
																												  </div>      
																												</div>    
																											</div>
																											<div class="row">
																												<div class="col s12 m12">
																													<div class="input-field mt-19px">      
																														<input name="observacao_contato_cliente" value="<?= $e->get("observacao_contato_cliente") ?>">
																														<label for="observacao_contato_cliente" class="label">Observação</label>
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
						<div id="modalContatoGeral" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
																			<div class="modal-content modal-color"> 
           
							<form class="formValidate" 
                   	action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
                    method="POST">
								
             <input name="action" value="salvarContato" type="hidden">
								
              <blockquote>
                <h6>Cadastro de Contatos</h6>
              </blockquote>
                
                    <div class="row">
                      <div class="col s12 m3">
                        <div class="input-field ">
                          <select name="tipo_contato_cliente" class="select2 browser-default">
                            <option value="0" disabled selected>Tipo Contato do Cliente</option>
                            <option value="1">Celular</option>
                            <option value="2">Residêncial</option>
                            <option value="3">Trabalho</option>    
                          </select>
													 <label for="tipo_contato_cliente" class="label active">Tipo de Telefone:</label>
                        </div>                       
                      </div>
                      <div class="col s12 m5">
                        <div class="input-field mt-19px">      
													<input name="nome_contato_cliente" value="">
													<label for="nome_contato_cliente" class="label">Nome do Contato</label>
                        </div>                       
                      </div>
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">
                          <input name="telefone_contato_cliente" onkeypress="onlynumberrealy();" onblur="javascript: formatTel(this);" onfocus="javascript: cleanFormat(this);"   maxlength="11"   >
													<label for="telefone_contato_cliente" class="label">Telefone</label>
                        </div>
                      </div>
                       <div class="col s12 m1 m-last">
                       <div class="input-field mt-19px">
                        <input name="ramal_contato_cliente" value="">
												<label for="ramal_contato_cliente" class="label">Ramal</label>
                       </div>      
                      </div>    
                    </div>
										<div class="row">
                      <div class="col s12 m12">
                        <div class="input-field mt-19px">      
													<input name="observacao_contato_cliente" value="">
													<label for="observacao_contato_cliente" class="label">Observação</label>
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