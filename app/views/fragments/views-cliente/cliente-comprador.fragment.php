<!-- tabs content -->
<div id="cliente-comprador" class="divAba" hidden>				
						
						<div class="card-panel">
						  <div class="row">
							
						  <div class="col s12 m6 l6">
						   <blockquote>
							<h6>Cadastro Compradores</h6>
						   </blockquote>
							</div>
											<div class="col s12 m6 l6 display-flex align-items-center show-btn">
								<a href="javascript:void(0)" data-id="#modalCompradorGeral" class="waves-effect btn-block waves-light btn view-data" style="top:10px;"><i class="material-icons left">add_shopping_cart</i> Adicionar Comprador</a>
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
																			<th>E-mail</th>                            
																			<th>Cargo</th>
																			<th>Ações</th>                    
																		</tr>
																	</thead>
																	<tbody>														
																			<?php foreach($ClientesCompradores->getDataAs("ClienteComprador") as $e):?>
																			<tr>																
																				<td style="background-color:#f3f3f3"><b><?=$e->get("nome_comprador") ?></b></td>
																				<td><?=$e->get("telefone_comprador") ?></td>
																				<td><?=$e->get("email_comprador") ?></td>
																				<td><?= $this->consultarCargo($e->get("cargo_comprador")) ?></td>
																				 <td>
																					 <a href="javascript:void(0)" class="tooltipped view-data" data-id="<?= "#modalComprador" . $e->get("id")?>" data-position="top" data-type="ClienteComprador" data-tooltip="Editar">
																						 <i class="material-icons">edit</i>
																					 </a>
															   <a href="javascript:void(0)" data-id="<?= $e->get("id") ?>" class="tooltipped remover-dados red-text" data-type="ClienteComprador" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a>
																				</td>     
																			</tr>
																			  <div id="modalComprador<?= $e->get("id") ?>" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
																						<div class="modal-content">      
																							<form class="formValidate" 
																											action="<?= APPURL . "/clientes/edit/" . $e->get("id")?>"
																											method="POST">
			
																										 <input name="action" value="salvarComprador" type="hidden">
																										 <input name="idComprador" value="<?= $e->get("id") ?>" type="hidden">		
                                            <blockquote>
                                              <h6>Cadastro de Comprador</h6>
                                            </blockquote>
                                              <div class="row">                      
                                                <div class="col s12 m6">
                                                  <div class="input-field mt-19px">    
                                                    <input name="nome_comprador" value=" <?= $e->get("nome_comprador") ?>">
                                                    <label for="nome_comprador" class="label" >Nome do Comprador:</label>
                                                  </div>                       
                                                </div>

                                                <div class="col s12 m3">
                                                  <div class="input-field mt-19px">      
                                                    <input name="cpf_comprador" maxlength="11"  onkeypress="onlynumberrealy();" onblur="javascript: formatField(this);" onfocus="javascript: cleanFormat(this);"  value="<?= $e->get("cpf_comprador") ?>">
                                                    <label for="cpf_comprador" class="label">CPF do Comprador:</label>
                                                  </div>                       
                                                </div>

                                                <div class="col s12 m3">
                                                  <div class="input-field selectcomprador ">
                                                    <select name="cargo_comprador" class="select2 browser-default">
                                                      <option value="0" disabled selected>Selecione o Cargo</option>
                                                     <?php foreach($Cargos->getDataAs("Cargo") as $c): ?>
                                                      <option <?= $e->get("cargo_comprador") == $c->get("id") ? "selected": "" ?> value="<?= $c->get("id") ?>"> <?=$c->get("nome") ?> </option>
                                                      <?php endforeach;?>
                                                    </select>
                                                     <label for="cargo_comprador" class="label active">Cargo:</label>
                                                  </div>                       
                                                </div>
                                              </div>
                                               
                                              <div class="row">                      
                                                <div class="col s12 m3">
                                                  <div class="input-field mt-19px">      
                                                    <input name="telefone_comprador" maxlength="11" onkeypress="onlynumberrealy();" onblur="javascript: formatTel(this);" onfocus="javascript: cleanFormat(this);"
                                                           value="<?= $e->get("telefone_comprador") ?>">
                                                    <label for="telefone_comprador" class="label" >Telefone:</label>
                                                  </div>                       
                                                </div>																															 
                                                 <div class="col s12 m3">
                                                  <div class="input-field mt-19px">      
                                                    <input name="email_comprador"  value="<?= $e->get("email_comprador") ?>">
                                                    <label for="email_comprador" class="label" >E-mail:</label>
                                                  </div>                       
                                                </div>
                                                <div class="col s12 m3">
                                                  <div class="input-field mt-19px">      
                                                    <input class="precoBRL" name="renda_comprador" onfocus="javascript: cleanFormatMoney(this);" value="<?=$e->get("renda_comprador") ?>">
                                                    <label for="renda_comprador" class="label">Renda Mensal:</label>
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
			<div id="modalCompradorGeral" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
					<div class="modal-content">      
						<form class="formValidate" 
                  action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
                  method="POST">
			
					 <input name="action" value="salvarComprador" type="hidden">
			
						<blockquote>
							<h6>Cadastro de Comprador</h6>
						</blockquote>
              <div class="row">                      
                <div class="col s12 m6">
                  <div class="input-field mt-19px">    
                    <input name="nome_comprador" value="">
                    <label for="nome_comprador" class="label" >Nome do Comprador:</label>
                  </div>                       
                </div>

                <div class="col s12 m3">
                  <div class="input-field mt-19px">      
                    <input name="cpf_comprador" maxlength="11"  onkeypress="onlynumberrealy();" onblur="javascript: formatField(this);" onfocus="javascript: cleanFormat(this);"  value="">
                    <label for="cpf_comprador" class="label">CPF do Comprador:</label>
                  </div>                       
                </div>

                <div class="col s12 m3">
                  <div class="input-field selectcomprador">
                    <select name="cargo_comprador" class="select2 browser-default">
                      <option value="0" disabled selected>Selecione o Cargo</option>
                      <?php foreach($Cargos->getDataAs("Cargo") as $c): ?>
                      <option value="<?=$c->get("id"); ?>"> <?=$c->get("nome") ?> </option>
                      <?php endforeach;?>
                     
                    </select>
                     <label for="cargo_comprador" class="label active">Cargo:</label>
                  </div>                       
                </div>
              </div>

              <div class="row">                      
                <div class="col s12 m3">
                  <div class="input-field mt-19px">      
                    <input name="telefone_comprador" maxlength="11" onkeypress="onlynumberrealy();" onblur="javascript: formatTel(this);" onfocus="javascript: cleanFormat(this);"
                           value="">
                    <label for="telefone_comprador" class="label" >Telefone:</label>
                  </div>                       
                </div>																															 
                 <div class="col s12 m3">
                  <div class="input-field mt-19px">      
                    <input name="email_comprador"  value="">
                    <label for="email_comprador" class="label" >E-mail:</label>
                  </div>                       
                </div>
                 <div class="col s12 m3">
                  <div class="input-field mt-19px">      
                    <input class="precoBRL" name="renda_comprador" onfocus="javascript: cleanFormatMoney(this);" value="">
                    <label for="renda_comprador" class="label">Renda Mensal:</label>
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
													