<!-- tabs content -->
<div id="venda-endossada" class="divAba" hidden>				
						
						<div class="card-panel">
						  <div class="row">
							
						  <div class="col s12 m6 l6">
						   <blockquote>
							<h6>Cadastro de Venda Endossada</h6>
						   </blockquote>
							</div>
											<div class="col s12 m6 l6 display-flex align-items-center show-btn">
								<a href="javascript:void(0)" data-id="#modalVendaEndossadaGeral" class="waves-effect btn-block waves-light btn view-data" style="top:10px;"><i class="material-icons left">add_shopping_cart</i> Cadastro de Venda Endossada</a>
							  </div> 
										</div>							 
												
                <div class="card">
                  <div class="card-content">
                    <!-- datatable start -->
                    <div class="responsive-table">
                      <table style="width:100%" class="table ps-table">
                        <thead>
                          <tr>
                            <th>Tipo de NF</th>
                            <th>Tipo de Vencimento</th> 
                            <th>Dias para fechamento</th>                            
                            <th>Valor Máx</th>
                            <th>Ações</th>                    
                          </tr>
                        </thead>
                        <tbody>														
                            <?php foreach($ClientesVendasEndossadas->getDataAs("ClienteVendaEndossada") as $e):?>
                            <tr>																
                              <td style="background-color:#f3f3f3"><b><?=$this->consultarNF($e->get("tipo_nf")) ?></b></td>
                              <td><?=$e->get("tipo_vencimento")  ?></td>
                              <td><?=$e->get("max_dias_fechamento") ?> </td>
                              <td><?=$e->get("valor_max_vendas") ?> </td>
                               <td>
                                 <a href="javascript:void(0)" class="tooltipped view-data" data-id="<?= "#modalVendaEndossada" . $e->get("id")?>" data-position="top" data-type="VendaEndossada" data-tooltip="Editar">
                                   <i class="material-icons">edit</i>
                                 </a>
                       <a href="javascript:void(0)" data-id="<?= $e->get("id") ?>" class="tooltipped remover-dados red-text" data-type="ClienteVendaEndossada" data-position="top" data-tooltip="Remover"><i class="material-icons">clear</i></a>
                              </td>     
                            </tr>
                              <div id="modalVendaEndossada<?= $e->get("id") ?>" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
                                  <div class="modal-content modal-color">      
                                    <form class="formValidate" 
                                                  action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
                                                  method="POST">

                                       <input name="action" value="salvarVendaEndossada" type="hidden">
                                       <input name="idVendaEndossada" value="<?= $e->get("id") ?>" type="hidden">		
                                        <blockquote>
                                          <h6>Cadastro de Venda Endossada</h6>
                                        </blockquote>

                                        <div class="row">
                                          <div class="col s12 m4">
                                            <div class="input-field ">
                                              <select  name="tipo_nf" class="select2 browser-default">
                                                <option value="0" disabled selected>Escolha uma opção</option>
                                                <?php foreach($NotaFiscal->getDataAs("ConfigNotaFiscal") as $nf) : ?>
                                                <option <?= $nf->get("id") == $e->get("tipo_nf")  ? "selected" : "" ?> value="<?=$nf->get("id") ?>"><?=$nf->get("nome") ?> </option>
                                               <?php endforeach?>
                                              </select>
                                              <label for="tipo_nf" class="label active">Tipo de NF:</label>
                                            </div>                       
                                          </div>
                                          <div class="col s12 m4">
                                            <div class="input-field ">
                                              <select  name="tipo_vencimento" class="select2 browser-default">
                                                 <option value="0" disabled selected>Escolha uma opção</option>
                                                  <option value="Mensal" <?= $e->get("tipo_vencimento") == "Mensal" ? "selected" : "" ?>>Mensal</option>
                                                  <option value="Semanal" <?= $e->get("tipo_vencimento") == "Semanal" ? "selected" : "" ?>>Semanal</option>                       
                                              </select>
                                              <label for="tipo_vencimento" class="label active">Tipo de Vencimento:</label>
                                            </div> 
                                          </div>
                                          <div class="col s12 m4">
                                            <div class="input-field">
                                              <input name="max_dias_fechamento" value="<?=$e->get("max_dias_fechamento") ?>">
                                              <label for="max_dias_fechamento" class="label">Dias para fechamento:</label>
                                            </div>
                                          </div>
                                        </div>

                                            <div class="row mt-1">
                                              <div class="col s12 m3">
                                                <div class="input-field mt-19px">
                                                  <input name="valor_max_vendas" value="<?=$e->get("valor_max_vendas")?>">
                                                  <label for="valor_max_vendas" class="label">Valor máx para Venda:</label>
                                                </div>
                                              </div>
                                              <div class="col s12 m4 m-last">
                                                <div class="input-field mt-19px">
                                                  <input name="dias_carencia" value="<?=$e->get("dias_carencia") ?>">
                                                  <label for="dias_carencia" class="label">Dias de carência para fechamento:</label>
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
			
<!-- 			<!-- Modal Structure -->
			<div id="modalVendaEndossadaGeral" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
					<div class="modal-content modal-color">      
						<form class="formValidate" 
                  action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
                  method="POST">
                   <input name="action" value="salvarVendaEndossada" type="hidden">
                      <blockquote>
                      <h6>Cadastro de Venda Endossada</h6>
                    </blockquote>
                    <div class="row">
                      <div class="col s12 m4">
                        <div class="input-field ">
                          <select  name="tipo_nf" class="select2 browser-default">
                            <option value="0" disabled selected>Escolha uma opção</option>
                           <?php foreach($NotaFiscal->getDataAs("ConfigNotaFiscal") as $nf) : ?>
                            <option value="<?=$nf->get("id") ?>"><?= $nf->get("nome")?> </option>
                           <?php endforeach?>
                          </select>
                          <label for="tipo_nf" class="label active">Tipo de NF:</label>
                        </div>                       
                      </div>
                      <div class="col s12 m4">
                        <div class="input-field ">
                          <select  name="tipo_vencimento" class="select2 browser-default">
                            <option value="0" disabled selected>Escolha uma opção</option>
                            <option value="1">Mensal</option>
                            <option value="2">Semanal</option>                       
                          </select>
                          <label for="tipo_vencimento" class="label active">Tipo de Vencimento:</label>
                        </div> 
                      </div>
                      <div class="col s12 m4">
                        <div class="input-field">
                          <input name="max_dias_fechamento" value="">
                          <label for="max_dias_fechamento" class="label">Dias para fechamento:</label>
                        </div>
                      </div>
                    </div>

                    <div class="row mt-1">
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">
                          <input name="valor_max_vendas" value="">
                          <label for="valor_max_vendas" class="label">Valor máx para Venda:</label>
                        </div>
                      </div>
                      <div class="col s12 m4 m-last">
                        <div class="input-field mt-19px">
                          <input name="dias_carencia" value="">
                          <label for="dias_carencia" class="label">Dias de carência para fechamento:</label>
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