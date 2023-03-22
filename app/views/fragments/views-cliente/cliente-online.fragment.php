<!-- tabs content -->
          <div id="online" class="divAba" hidden>				
						
            <div class="card-panel">
							<form class="formValidate" 
                    action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
                    method="POST">
								
             <input name="action" value="salvarOnline" type="hidden">
						 <input name="idOnline" value="<?= $ClienteOnline->get("id") ?>" type="hidden">		
              <blockquote>
                <h6>Cadastro de informações Onlines</h6>
              </blockquote>
                
                    <div class="row">
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">    
													<input name="site_cliente" value="<?= $ClienteOnline->get("site_cliente") ?>">
													<label for="site_cliente" class="label">Site</label>
                        </div>                       
                      </div>
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">      
													<input name="email_cliente" value="<?= $ClienteOnline->get("email_cliente") ?>">
													<label for="email_cliente" class="label">E-mail principal</label>
                        </div>                       
                      </div>
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">
                          <input name="email_nfe_cliente" value="<?= $ClienteOnline->get("email_nfe_cliente") ?>">
													<label for="email_nfe_cliente" class="label">E-mail para envio de NFE</label>
                        </div>
                      </div>
                       <div class="col s12 m3 m-last">
                       <div class="input-field mt-19px">
                        <input name="email_mkt_cliente" value="<?= $ClienteOnline->get("email_mkt_cliente") ?>">
												<label for="email_mkt_cliente" class="label">E-mail para envio MKT</label>
                       </div>      
                      </div>    
                    </div>
										<div class="row">
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">    
													<input name="senha_portal_cliente" value="<?= $ClienteOnline->get("senha_portal_cliente") ?>">
													<label for="senha_portal_cliente" class="label">Senha para acesso (Portal Online)</label>
                        </div>                       
                      </div>
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">      
													<input name="facebook_cliente" value="<?= $ClienteOnline->get("facebook_cliente") ?>">
													<label for="facebook_cliente" class="label">Facebook</label>
                        </div>                       
                      </div>
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">      
													<input name="linkedin_cliente" value="<?= $ClienteOnline->get("linkedin_cliente") ?>">
													<label for="linkedin_cliente" class="label">Linkedin</label>
                        </div>                       
                      </div>
                       <div class="col s12 m3">
                        <div class="input-field mt-19px">      
													<input name="instagram_cliente" value="<?= $ClienteOnline->get("instagram_cliente") ?>">
													<label for="instagram_cliente" class="label">Instagram</label>
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
            <!-- tabs content -->