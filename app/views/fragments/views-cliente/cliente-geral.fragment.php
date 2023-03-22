<!-- tabs content -->
          <div id="general" class="divAba">				
						
            <div class="card-panel">
							<form class="formValidate" 
                    action="<?= APPURL."/clientes/edit/".($Cliente->get("id") != "" ? $Cliente->get("id") : "new") ?>"
                    method="POST">
								
             <input name="action" value="salvarDadoGeral" type="hidden">
             
								
              <blockquote>
                <h6>Cadastro dos Dados Gerais do Cliente</h6>
              </blockquote>
                
                    <div class="row">
                      
                      <div class="col s12 m2">
                        <div class="input-field ">
                          <select name="status_cliente" class="select2 browser-default status_cliente">
                            <option value="0" disabled selected>Status do Cliente</option>
                            <option value="1" <?= $Cliente->get("status") == 1 ? "selected" : "" ?>>Ativado</option>
                            <option value="2" <?= $Cliente->get("status") == 2 ? "selected" : "" ?>>Desativado</option>                       
                          </select>
													 <label for="status_cliente" class="label active">Status do Cadastro</label>
                        </div>                       
                      </div>

                      <div class="col s12 m3">
                        <div class="input-field">
                          <select name="tipo_cliente" class="select2 browser-default tipo_cliente">
                            <option value="0" disabled selected>Tipo de Pessoa</option>
                            <option value="1" <?= $Cliente->get("tipo_cliente") == 1 ? "selected" : "" ?>>Pessoa Física</option>
                            <option value="2" <?= $Cliente->get("tipo_cliente") == 2 ? "selected" : "" ?>>Pessoa Jurídica</option>                       
                          </select>
													 <label for="tipo_cliente" class="label active">Tipo de Perfil</label>
                        </div>                       
                      </div>

                      <div class="col s12 m3">
                        <div class="input-field ">
                          <input id="inputId" name="cpfCnpj" <?= $Cliente->get("tipo_cliente") == "2" ? "maxlength='14'" : "maxlength='11'" ?>  onkeypress="onlynumberrealy();" onblur="javascript: formatField(this);" onfocus="javascript: cleanFormat(this);" value="<?= formata_cpf_cnpj($Cliente->get("cpf/cnpj")) ?>">
                          <label for="cpfCnpj" class="label active inputId"><?= $Cliente->get("tipo_cliente") == "2" ? "CNPJ Cliente" : "CPF Cliente"?></label>
                        </div>
                      </div>
                      
                       <div class="col s12 m4 l-last">
                       <div class="input-field ">
                        <input class="validate nomeRazao" name="nomeRazao" <?= $Cliente->get("tipo_cliente") == "2" ? "readonly='true'" : ""?>  value="<?= $Cliente->get("nome/razao") ?>">
                        <label class="label active labelNomeRazao" for="nomeRazao"><?= $Cliente->get("tipo_cliente") == "2" ? "Razão Social Cliente" : "Nome Cliente"?></label>
                       </div>      
                      </div>    

                    </div>
              
                    <div class="row camposCNPJ" <?= $Cliente->get("tipo_cliente") == "2" ? "" : "hidden" ?>> 
                      
                        <div class="col s12 m3">
                          <div class="input-field mt-19px">
                            <input  readonly="true" class="nome_fantasia_input" name="nome_fantasia" type="text" value="<?= $Cliente->get("nome_fantasia") ?>">
                            <label class="label nome_fantasia" for="nome_fantasia">Nome Fantasia</label>
                          </div>
                        </div>
                      
                        <div class="col s12 m3">
                          <div class="input-field mt-19px">
                            <input  onkeypress="onlynumberrealy();" class="inscricao_estadual_input"name="inscricao_estadual" type="text" class="validate" value="<?= $Cliente->get("inscricao_estadual") ?>">
                            <label class="label inscricao_estadual" for="inscricao_estadual">Inscrição Estadual</label>
                          </div>
                        </div>  
                      
                        <div class="col s12 m3">
                          <div class="input-field mt-19px">
                            <input  onkeypress="onlynumberrealy();" class="inscricao_municipal_input" name="inscricao_municipal" type="text" class="validate" value="<?= $Cliente->get("inscricao_municipal") ?>">
                            <label class="label inscricao_municipal" for="inscricao_municipal">Inscrição Municipal</label>
                          </div>
                        </div>                      

                      
                        <div class="col s12 m3 m-last">
                          <div class="input-field mt-19px">
                            <input  readonly="true" name="data_fundacao" class="data_fundacao_input" type="text" class="validate" value="<?= $Cliente->get("data_fundacao") ?>">
                            <label class="label labelFundacao" for="data_fundacao">Data da Fundação</label>
                          </div>
                        </div>  
                      
                    </div>
              
                    <div class="row">                       
                        <div class="col s12 m3">
                          <div class="input-field mt-19px">
                           <select  name="perfil_tributario" class="select2 browser-default">
                            <option disabled selected>Perfil tributário do Cliente</option>													
                           <?php foreach($PerfisTributarios->getDataAs("ConfigPerfilTributario") as $pt): ?>
														 <option <?= $Cliente->get("perfil_tributario") == $pt->get("id") ? "selected" : "" ?> value="<?= $pt->get("id")?>"><?= $pt->get("nome")?></option>														 
													 <?php endforeach; ?>
                          </select>
													 <label class="label" for="perfil_tributario" class="active">Perfil tributário do Cliente</label>	
                          </div>
                        </div>
                      
                        <div class="col s12 m3">
                          <div class="input-field mt-19px">
                            <select name="regime_tributario" class="select2 browser-default">
                           <option value="" selected disabled hidden>Escolha um regime tributário</option>
                           <?php foreach($RegimesTributarios->getDataAs("ConfigRegimeTributario") as $rt): ?>
														 <option <?= $Cliente->get("regime_tributario") == $rt->get("id") ? "selected" : "" ?> value="<?= $rt->get("id")?>"><?= $rt->get("nome")?></option>														 
													 <?php endforeach; ?>                    
                          </select>
													 <label class="label" for="regime_tributario" class="active">Regime tributário do Cliente</label>		
                          </div>
                        </div> 
                      
                        <div class="col s12 m3">
                          <div class="input-field mt-19px">
                           <select name="perfil_st" class="select2 browser-default">
                            <option disabled selected>Perfil de ST do Cliente</option>
                            <option <?= $Cliente->get("perfil_st") == "1" ? "selected" : "" ?> value="1">Não se aplica</option>
                            <option <?= $Cliente->get("perfil_st") == "2" ? "selected" : "" ?> value="2">Substituto tributário</option>
                            <option <?= $Cliente->get("perfil_st") == "3" ? "selected" : "" ?> value="3">Substituído tributário</option>                       
                          </select>
													<label class="label" for="perfil_st" class="active">Perfil de ST do Cliente</label>		
                          </div>
                        </div>
                      
                        <div class="col s12 m3 m-last">
                          <div class="input-field mt-19px">
                            <select  name="qualificacao_cliente" class="select2 browser-default">
                            <option disabled selected>Qualificação do Cliente</option>
                           <?php foreach($Qualificacoes->getDataAs("ConfigQualificacao") as $q): ?>
														 <option <?= $Cliente->get("qualificacao_cliente") == $q->get("id") ? "selected" : "" ?> value="<?= $q->get("id")?>"><?= $q->get("nome")?></option>														 
													 <?php endforeach; ?>            
                          </select>
													<label class="label" for="qualificacao_cliente" class="active">Qualificação do Cliente</label>			
                          </div>
                        </div> 
                    </div>
                  
                    <div class="row">                       
                        <div class="col s12 m6">
                          <div class="input-field mt-19px">
                            <select  name="origem_cliente" class="select2 browser-default">
                                <option disabled selected>Origem do Cliente</option>
                               <?php foreach($Origens->getDataAs("ConfigOrigemCliente") as $oc): ?>
																 <option <?= $Cliente->get("origem_cliente") == $oc->get("id") ? "selected" : "" ?> value="<?= $oc->get("id")?>"><?= $oc->get("nome")?></option>
															 <?php endforeach; ?>
                            </select>
														<label class="label" for="origem_cliente" class="active">Origem do Cliente</label>
                          </div>
                        </div>
                      
                        <div class="col s12 m6 m-last">
                          <div class="input-field mt-19px">
                           <select name="vendedor_cliente" class="select2 browser-default">
                                <option disabled selected>Vendedor Responsável pelo Cliente</option>
                               <?php foreach($ClientesFuncionarios->getDataAs("ClienteFuncionario") as $cf): ?>
																 <option <?= $Cliente->get("vendedor_cliente") == $cf->get("id") ? "selected" : "" ?> value="<?= $cf->get("id")?>"><?= $cf->get("nome")?></option>
															 <?php endforeach; ?>
                            </select>
														<label class="label" for="vendedor_cliente" class="active">Vendedor Responsável pelo Cliente</label>
                          </div>
                        </div> 
                    </div>
                
                
                <?php $segmento = json_decode($Cliente->get("segmentos_atuacao"));  ?>
                    <div class="row">                     
                        <div class="col s12 m4">
                          <div class="input-field mt-19px">
                            <select data-placeholder="Segmentos de Atuação" name="segmentos_atuacao[]" class="select2 browser-default" multiple>
                              <?php foreach($Segmentos->getDataAs("ConfigSegmentoAtuacao") as $sa): ?>
																 <option <?php 
                                            if ($segmento != null) { 
                                              foreach($segmento as $s){                                       
                                              if ($s->segmento == $sa->get("id")){
                                                echo "selected"; 
                                              } else {
                                                echo ""; }
                                              }
                                            }
                                       ?>
                                       value="<?= $sa->get("id") ?>"><?= $sa->get("nome")?></option>
															 <?php endforeach; ?>
                            </select>
														<label class="label" for="segmentos_atuacao" class="active">Segmentos de Atuação</label>
                          </div>
                        </div>
                      
                        <div class="col s12 m4">
                          <div class="input-field mt-19px">
                           <select data-placeholder="Categorias do Cliente" name="categoria_cliente" class="select2 browser-default" multiple="multiple">
                               <?php foreach($Categorias->getDataAs("ConfigCategoriaCliente") as $cc): ?>
																 <option <?= $Cliente->get("categoria_cliente") == $cc->get("id") ? "selected" : "" ?> value="<?= $cc->get("id")?>"><?= $cc->get("nome")?></option>
															 <?php endforeach; ?>
                            </select>
														<label class="label" for="categoria_cliente" class="active">Categorias do Cliente</label>
                          </div>
                        </div> 
											
												<div class="col s12 m4 m-last camposCNPJ">
                          <div class="input-field mt-19px">
                            <input onkeypress="onlynumberrealy();" name="cnae_cliente" type="text" class="validate" value="<?= $Cliente->get("cnae_cliente") ?>">
                            <label class="label" for="cnae_cliente">CNAE</label>
                          </div>
                        </div>  
                    </div> 
										<div class="row">  
											<div class="col s12 display-flex justify-content-end">
												<button type="submit" class="btn waves-effect waves-light mr-2">Salvar</button>
											</div>  
										</div>
									<input hidden type="hidden" class="imagem_cliente_result" name="imagem_cliente_result" value="<?= $Cliente->get("imagem_cliente") ?>"> 
          			</form>
              </div>  
								
							
						<div class="display-flex">
								<div class="media">									
									<?php if($Cliente->get("imagem_cliente") != ""): ?>
									<img src="<?= $Cliente->get("imagem_cliente") ?>" name="imagem_cliente"  class="border-radius-4 profile-image magem_cliente" alt="profile image"
											 height="64" width="64"></br>
									<?php else: ?>
									<img src="<?= APPURL . "/app-assets/images/logo/peep-icon.png" ?>" name="imagem_cliente"  class="border-radius-4 profile-image" alt="profile image"
											 height="64" width="64"></br>
									<?php endif; ?>
									<label for="imagem_cliente">Foto do Cliente</label>
								</div>
								<div class="media-body">
									<div class="general-action-btn">
										<button id="select-files" class="btn indigo mr-2">
											<span>Trocar foto</span>
										</button>               
									</div>
										<p>
											<small>Formatos permitidos JPG, GIF or PNG. tamanho max 800kB</small>
										</p>              
									<div class="upfilewrapper">
										<input id="upfile" name="upfile" type="file" />
									</div>
								</div>
							</div>
						
            </div>
            <!-- tabs content -->