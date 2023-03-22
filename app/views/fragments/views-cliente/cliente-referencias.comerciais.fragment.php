	
						<div class="card-panel">
						  <div class="row">
							
						  <div class="col s12 m6 l6">
						   <blockquote>
							<h6>Cadastro de Referências Comerciais</h6>
						   </blockquote>
							</div>
											<div class="col s12 m6 l6 display-flex align-items-center show-btn">
								<a href="javascript:void(0)" data-id="#modalRefComercialGeral" class="waves-effect btn-block waves-light btn view-data" style="top:10px;"><i class="material-icons left">add_shopping_cart</i> Adicionar Referencia Comercial</a>
							  </div> 
										</div>							 
												
													<div class="card">
														<div class="card-content">
															<!-- datatable start -->
															<div class="responsive-table">
																<table style="width:100%" class="table ps-table">
																	<thead>
																		<tr>
																			<th>Empresa</th>
																			<th>Telefone</th> 
																			<th>Contato</th>                            
																			<th>Média de Compra</th>
																			<th>Ações</th>                    
																		</tr>
																	</thead>
																	<tbody>														
																			<?php foreach($ClientesRefComerciais->getDataAs("ClienteReferenciaComercial") as $e):?>
																			<tr>																
																				<td style="background-color:#f3f3f3"><b><?=$e->get("empresa_referencia_comercial") ?></b></td>
																				<td><?=$e->get("telefone_referencia_comercial")?></td>
																				<td><?=$e->get("contato_referencia_comercial") ?></td>
																				<td><?=$e->get("media_referencia_comercial") ?></td>
																				 <td>
																					 <a href="javascript:void(0)" class="tooltipped view-data" data-id="<?= "#modalRefComercial" . $e->get("id")?>" data-position="top" data-type="ClienteReferenciaComercial" data-tooltip="Editar">
																						 <i class="material-icons">edit</i>
																					 </a>
															   <a href="javascript:void(0)" data-id="<?= $e->get("id") ?>" class="tooltipped remover-dados red-text" data-type="ClienteReferenciaComercial" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a>
																				</td>     
																			</tr>
																			  <div id="modalRefComercial<?= $e->get("id") ?>" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
																						<div class="modal-content modal-color">      
																							<form class="formValidate" 
																														action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
																														method="POST">
			
																										 <input name="action" value="salvarReferenciaComercial" type="hidden">
																										 <input name="idRefComercial" value="<?= $e->get("id") ?>" type="hidden">		
																											<blockquote>
																												<h6>Referência Comercial </h6>
																											</blockquote>

                                                <div class="row">
                                                  <div class="col s12 m5">
                                                    <div class="input-field mt-19px">    
                                                      <input name="empresa_referencia_comercial" value="<?=$e->get("empresa_referencia_comercial") ?>">
                                                      <label for="empresa_referencia_comercial" class="label"> Empresa:</label>
                                                    </div>                       
                                                  </div>
                                                  <div class="col s12 m3">
                                                    <div class="input-field mt-19px">      
                                                      <input name="telefone_referencia_comercial" maxlength="11" onkeypress="onlynumberrealy();" onblur="javascript: formatTel(this);" onfocus="javascript: cleanFormat(this);"  value="<?=$e->get("telefone_referencia_comercial") ?>">
                                                      <label for="telefone_referencia_comercial" class="label">Telefone:</label>
                                                    </div>                
                                                  </div>
                                                  <div class="col s12 m4">
                                                    <div class="input-field mt-19px">      
                                                      <input name="contato_referencia_comercial" value="<?=$e->get("contato_referencia_comercial") ?>">
                                                      <label for="contato_referencia_comercial" class="label">Contato da Empresa</label>
                                                    </div>                
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col s12 m5">
                                                    <div class="input-field mt-19px">    
                                                      <input name="desde_referencia_comercial" type="date" value="<?=$e->get("desde_referencia_comercial") ?>">
                                                      <label for="desde_referencia_comercial" class="label"> Cliente desde:</label>
                                                    </div>                       
                                                  </div>
                                                  <div class="col s12 m3">
                                                    <div class="input-field mt-19px">      
                                                      <input class="precoBRL"  onfocus="javascript: cleanFormatMoney(this);" name="maior_compra_referencia_comercial" value="<?=$e->get("maior_compra_referencia_comercial") ?>">
                                                      <label for="maior_compra_referencia_comercial" class="label">Maior Compra:</label>
                                                    </div>                
                                                  </div>
                                                  <div class="col s12 m4">
                                                    <div class="input-field mt-19px">      
                                                      <input  class="precoBRL" name="media_referencia_comercial" onfocus="javascript: cleanFormatMoney(this);" value="<?=$e->get("media_referencia_comercial") ?>">
                                                      <label for="media_referencia_comercial" class="label">Média de Compra Mensal:</label>
                                                    </div>                
                                                  </div>
                                                </div>
                                            <div class="row">
                                              <div class="col s12 m12">
                                                    <div class="input-field mt-19px">    
                                                      <input name="observacao_referencia_comercial" value="<?=$e->get("observacao_referencia_comercial") ?>">
                                                      <label for="observacao_referencia_comercial" class="label">Observação</label>
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