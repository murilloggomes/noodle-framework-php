<!-- tabs content -->
          <div id="enderecos" class="divAba" hidden>				
						
            <div class="card-panel">
              <div class="row">
                
              <div class="col s12 m6 l6">
               <blockquote>
                <h6>Endereços Cadastrados</h6>
               </blockquote>
                </div>
								<div class="col s12 m6 l6 display-flex align-items-center show-btn">
                	<a href="javascript:void(0)" data-id="#modalEnderecoGeral" class="waves-effect btn-block waves-light btn view-data" style="top:10px;"><i class="material-icons left">location_city</i> Adicionar Endereço</a>
              	</div> 
							</div>							 
									
										<div class="card">
											<div class="card-content">
												<!-- datatable start -->
												<div class="responsive-table">
													<table style="width:100%" class="table ps-table">
														<thead>
															<tr>
																<th>Endereço de Referência</th>
																<th>Endereço</th> 
																<th>Cidade</th>                            
																<th>Estado</th>
																<th>Ações</th>                    
															</tr>
														</thead>
														<tbody>														
																<?php foreach($ClienteEndereco->getDataAs("ClienteEndereco") as $e):?>
																<tr>																
																	<td style="background-color:#f3f3f3"><b><?= $e->get("nome_endereco_cliente")?></b></td>
																	<td><?= $e->get("logradouro_cliente")?></td>
																	<td><?= $e->get("cidade_cliente")?></td>
																	<td><?= formatar("cep" , $e->get("cep_cliente")) ?></td>
																	 <td>
																		 <a href="javascript:void(0)" class="tooltipped view-data" data-id="<?= "#modalEndereco" . $e->get("id")?>" data-position="top" data-type="ClienteEndereco" data-tooltip="Editar">
																			 <i class="material-icons">edit</i>
																		 </a>
                      							 <a href="javascript:void(0)" data-id="<?= $e->get("id") ?>" class="tooltipped remover-dados red-text" data-type="ClienteEndereco" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a>
																	</td>     
																</tr>
																  <div id="modalEndereco<?= $e->get("id") ?>" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
																			<div class="modal-content modal-color">      
																				<form class="formValidate" 
																											action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
																											method="POST">

																							 <input name="action" value="salvarEndereco" type="hidden">
																							 <input name="idEndereco" value="<?= $e->get("id") ?>" type="hidden">		
																								<blockquote>
																									<h6>Cadastro de Endereço</h6>
																								</blockquote>

																											<div class="row">
																												<div class="col s12 m2">
																													<div class="input-field mt-19px">    
																														<input class="cepField" name="cep_cliente" onkeypress="onlynumberrealy();" onblur="javascript: formatCep(this);" onfocus="javascript: cleanFormat(this);" placeholder="Ex: 00000-000" type="text" maxlength="8" value="<?= formatar("cep", $e->get("cep_cliente")) ?>">
																														<label for="cep_cliente" class="label">CEP:</label>
																													</div>                       
																												</div>

																												<div class="col s12 m6">
																													<div class="input-field mt-19px">      
																														<input class="logradouroField" name="logradouro_cliente" type="text" value="<?= $e->get("logradouro_cliente") ?>">
																														<label for="logradouro_cliente" class="label">Endereço:</label>
																													</div>                       
																												</div>

																												<div class="col s12 m2">
																													<div class="input-field mt-19px">
																														<input name="complemento_cliente" value="<?= $e->get("complemento_cliente") ?>">
																														<label for="complemento_cliente" class="label">Complemento:</label>
																													</div>
																												</div>

																												 <div class="col s12 m2 m-last">
																												  <div class="input-field mt-19px">
																													<input name="numero_endereco_cliente" value="<?= $e->get("numero_endereco_cliente") ?>">
																													<label for="numero_endereco_cliente" class="label">Número:</label>
																												 </div>      
																												</div>    
																											</div>

																											<div class="row">
																												<div class="col s12 m3">
																													<div class="input-field mt-19px">    
																														<input class="bairroField" name="bairro_cliente" value="<?= $e->get("bairro_cliente") ?>">
																														<label for="bairro_cliente" class="label">Bairro:</label>
																													</div>                       
																												</div>

																												<div class="col s12 m3">
																													<div class="input-field mt-19px">      
																														<input class="localidadeField" name="cidade_cliente" value="<?= $e->get("cidade_cliente") ?>">
																														<label for="cidade_cliente" class="label">Cidade:</label>
																													</div>                       
																												</div>

																												<div class="col s12 m3">
																													<div class="input-field">
																														<select name="estado_cliente" class="select2 browser-default">
																															<option value="" selected disabled hidden>Estado</option> 
																															<?php foreach($Estados as $uf => $nome): ?>
																															<option <?= $uf == $e->get("estado_cliente") ? "selected": "" ?> value="<?= $uf ?>"><?= $nome ?></option>
																															<?php endforeach;?>
																														</select>	
																														<label for="estado_cliente" class="active" >Estado:</label>
																													</div>
																												</div>

																												 <div class="col s12 m3 l-last">
																												 <div class="input-field mt-19px">
																													<input name="pais_cliente" value="<?= $e->get("pais_cliente") ?>">
																													<label for="pais_cliente" class="label">País:</label>
																												 </div>      
																												</div>    

																											</div>

																												<div class="row">
																												<div class="col s12 m3">
																													<div class="input-field mt-19px">    
																														<input name="ponto_referencia_cliente" value="<?= $e->get("ponto_referencia_cliente") ?>">
																														<label for="ponto_referencia_cliente" class="label">Ponto de referência:</label>
																													</div>                       
																												</div>

																												<div class="col s12 m3">
																													<div class="input-field">      
																														<select name="tipo_endereco_cliente" class="select2 browser-default">
																															<option value="" selected disabled hidden>Tipo de Endereço</option> 
																															<?php foreach($TiposEnderecos->getDataAs("ConfigTipoEndereco") as $ce): ?>
																															<option <?= $e->get("tipo_endereco_cliente") == $ce->get("id") ? "selected": "" ?> value="<?= $ce->get("id") ?>"><?= $ce->get("nome") ?></option>
																															<?php endforeach;?>
																														</select>
																														<label for="tipo_endereco_cliente" class="label">Tipo de Endereço:</label>
																													</div>                       
																												</div>

																												<div class="col s12 m3">
																													<div class="input-field">
																														<select name="tipo_imovel_cliente" class="select2 browser-default">
																															<option value="" selected disabled hidden>Tipo de Imóvel</option> 
																															<?php foreach($TiposImoveis->getDataAs("ConfigTipoImovel") as $ti): ?>
																															<option <?= $e->get("tipo_imovel_cliente") == $ti->get("id") ? "selected": "" ?>  value="<?= $ti->get("id") ?>"><?= $ti->get("nome") ?></option>
																															<?php endforeach;?>
																														</select>
																														<label for="tipo_imovel_cliente" class="label">Tipo de Imóvel:</label>
																													</div>
																												</div>

																												 <div class="col s12 m3 l-last">
																												 <div class="input-field">
																														<select name="tipo_residencia_cliente" class="select2 browser-default">
																															<option value="" selected disabled hidden>Tipo de Imóvel</option> 
																															<?php foreach($TiposResidencias->getDataAs("ConfigTipoResidencia") as $tr): ?>
																															<option <?= $e->get("tipo_residencia_cliente") == $tr->get("id") ? "selected": "" ?> value="<?= $tr->get("id") ?>"><?= $tr->get("nome") ?></option>
																															<?php endforeach;?>
																														</select>
																													<label for="tipo_residencia_cliente" class="label">Tipo de Residência:</label>
																												 </div>      
																												</div>    

																											</div>

																									<div class="row">

																												<div class="col s12 m2">
																													<div class="input-field mt-19px">    
																														<input name="andar_imovel_cliente" value="<?= $e->get("andar_imovel_cliente") ?>">
																														<label for="andar_imovel_cliente" class="label">Andar:</label>
																													</div>                       
																												</div>

																												<div class="col s12 m6">
																													<div class="input-field mt-19px">      
																														<input name="acesso_entrega_cliente" value="<?= $e->get("acesso_entrega_cliente") ?>">
																														<label for="acesso_entrega_cliente" class="label">Forma de Acesso para Entrega:</label>
																													</div>                       
																												</div>																												
																												<div class="col s12 m4">
																													<div class="input-field mt-19px">      
																														<input name="nome_endereco_cliente" value="<?= $e->get("nome_endereco_cliente") ?>">
																														<label for="nome_endereco_cliente" class="label active" style="color:#ff760d">Nome Referência Endereço:</label>
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
<div id="modalEnderecoGeral" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
																			<div class="modal-content modal-color ">      
																				<form class="formValidate" 
																											action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
																											method="POST">

																							 <input name="action" value="salvarEndereco" type="hidden">
																							 
																								<blockquote>
																									<h6>Cadastro de Endereço</h6>
																								</blockquote>

																											<div class="row">

																												<div class="col s12 m2">
																													<div class="input-field mt-19px">    
																														<input class="cepField" name="cep_cliente" onkeypress="onlynumberrealy();" onblur="javascript: formatCep(this);" onfocus="javascript: cleanFormat(this);" placeholder="Ex: 00000-000" type="text" value="">
																														<label for="cep_cliente" class="label">CEP:</label>
																													</div>                       
																												</div>

																												<div class="col s12 m6">
																													<div class="input-field mt-19px">      
																														<input class="logradouroField" name="logradouro_cliente" type="text" value="">
																														<label for="logradouro_cliente" class="label">Endereço:</label>
																													</div>                       
																												</div>

																												<div class="col s12 m2">
																													<div class="input-field mt-19px">
																														<input name="complemento_cliente" value="">
																														<label for="complemento_cliente" class="label">Complemento:</label>
																													</div>
																												</div>

																												 <div class="col s12 m2 m-last">
																												 <div class="input-field mt-19px">
																													<input name="numero_endereco_cliente" value="">
																													<label for="numero_endereco_cliente" class="label">Número:</label>
																												 </div>      
																												</div>    
																											</div>

																											<div class="row">

																												<div class="col s12 m3">
																													<div class="input-field mt-19px">    
																														<input class="bairroField" name="bairro_cliente" value="">
																														<label for="bairro_cliente" class="label">Bairro:</label>
																													</div>                       
																												</div>

																												<div class="col s12 m3">
																													<div class="input-field mt-19px">      
																														<input class="localidadeField" name="cidade_cliente" value="">
																														<label for="cidade_cliente" class="label">Cidade:</label>
																													</div>                       
																												</div>

																												<div class="col s12 m3">
																													<div class="input-field">
																														<select name="estado_cliente" class="select2 browser-default">
																															<option value="" selected disabled hidden>Estado</option> 
																															<?php foreach($Estados as $uf => $nome): ?>
																															<option value="<?= $uf ?>"><?= $nome ?></option>
																															<?php endforeach;?>
																														</select>	
																														<label for="estado_cliente" class="active" >Estado:</label>
																													</div>
																												</div>

																												 <div class="col s12 m3 l-last">
																												 <div class="input-field mt-19px">
																													<input name="pais_cliente" value="">
																													<label for="pais_cliente" class="label">País:</label>
																												 </div>      
																												</div>    

																											</div>

																												<div class="row">

																												<div class="col s12 m3">
																													<div class="input-field mt-19px">    
																														<input name="ponto_referencia_cliente" value="">
																														<label for="ponto_referencia_cliente" class="label">Ponto de referência:</label>
																													</div>                       
																												</div>

																												<div class="col s12 m3">
																													<div class="input-field">      
																														<select name="tipo_endereco_cliente" class="select2 browser-default">
																															<option value="" selected disabled hidden>Tipo de Endereço</option> 
																															<?php foreach($TiposEnderecos->getDataAs("ConfigTipoEndereco") as $ce): ?>
																															<option value="<?= $ce->get("id") ?>"><?= $ce->get("nome") ?></option>
																															<?php endforeach;?>
																														</select>
																														<label for="tipo_endereco_cliente" class="label">Tipo de Endereço:</label>
																													</div>                       
																												</div>

																												<div class="col s12 m3">
																													<div class="input-field">
																														<select name="tipo_imovel_cliente" class="select2 browser-default">
																															<option value="" selected disabled hidden>Tipo de Imóvel</option> 
																															<?php foreach($TiposImoveis->getDataAs("ConfigTipoImovel") as $ti): ?>
																															<option value="<?= $ti->get("id") ?>"><?= $ti->get("nome") ?></option>
																															<?php endforeach;?>
																														</select>
																														<label for="tipo_imovel_cliente" class="label">Tipo de Imóvel:</label>
																													</div>
																												</div>

																												 <div class="col s12 m3 l-last">
																												 <div class="input-field">
																														<select name="tipo_residencia_cliente" class="select2 browser-default">
																															<option value="" selected disabled hidden>Tipo de Imóvel</option> 
																															<?php foreach($TiposResidencias->getDataAs("ConfigTipoResidencia") as $tr): ?>
																															<option value="<?= $tr->get("id") ?>"><?= $tr->get("nome") ?></option>
																															<?php endforeach;?>
																														</select>
																													<label for="tipo_residencia_cliente" class="label">Tipo de Residência:</label>
																												 </div>      
																												</div>    

																											</div>

																									<div class="row">
																												<div class="col s12 m2">
																													<div class="input-field mt-19px">    
																														<input name="andar_imovel_cliente" value="">
																														<label for="andar_imovel_cliente" class="label">Andar:</label>
																													</div>                       
																												</div>
																												<div class="col s12 m6">
																													<div class="input-field mt-19px">      
																														<input name="acesso_entrega_cliente" value="">
																														<label for="acesso_entrega_cliente" class="label">Forma de Acesso para Entrega:</label>
																													</div>                       
																												</div>
																												<div class="col s12 m4">
																													<div class="input-field mt-19px">      
																														<input name="nome_endereco_cliente" type="text" value="">
																														<label for="nome_endereco_cliente" class="label" style="color:#ff760d">Nome Referência Endereço:</label>
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
										