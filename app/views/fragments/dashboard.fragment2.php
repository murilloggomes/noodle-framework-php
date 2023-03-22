
 <div class="section">
   <!-- Current balance & total transactions cards-->
   
      <div class="col s12 m12 l4">
         <!-- Current Balance -->
         <div class="card animate fadeLeft">
            <div class="card-content">
               <h6 class="mb-0" style="display:block;padding-left:0.6rem;border-left:5px solid #000000;font-size:18px;font-weight:400;margin:0">Mês Atual 
								 <a style="color:#000000;" href="javascript:void(0)"><i class="material-icons float-right card-1-tooltip waves-effect-laranja">more_vert</i></a>								 							
               </h6>            			 
							</div>					 
							<div style="display:none;background-color:rgb(245 119 35 / 0.1);" class="select-indicadores card-1-divselect">
								<div class="row card-content">
									<div class="col s12 m12">
										<label for="selectCard1">Indicador</label>
										<select id="selectCard1" data-type="card_1" class="select2 select-indicadores">
											 <option value="0" disabled selected>Selecione o Indicador</option>
												<?php foreach($Indicadores->getDataAs("Indicador") as $f): ?>
												 <option value="<?= $f->get("id") ?>"><?= $f->get("nome") ?></option>
												<?php endforeach; ?>    
										</select>	
									</div>								
								</div>
							</div>	
					 		<div class="card-content">
               <div class="current-balance-container">
                  <div id="current-balance-donut-chart" class="current-balance-shadow"></div>
               </div>
               <h5 id="valorMetaExecutado" style="color:#f57722" class="center-align"></h5>
               <p class="medium-small center-align">Realizados</p>
								<div class="row">
								<div class="float-left">	
						 			<label>Indicador</label>
									<p id="indicadorCard1" class="medium-small text-indicador"></p>
							 </div>		
						 		<div class="float-right">	
						 			<label>Unidade de Negócio</label>
									<p id="filialCard1" class="medium-small text-filial"></p>
								</div>						 	
									</div>
            </div>
         </div>
      </div>
		 <!-- User statistics & appointment cards-->

      <div class="col s12 l8">
				 <h3 class="hide-on-med-and-down" style="display:block;padding-left:0.6rem;border-left:5px solid #000000;font-size:22px;font-weight:400">DASHBOARD</h3>
					<p class="mb-1 hide-on-med-and-down">Página de acompanhamento de Indicadores</p>
         <!-- User Statistics -->
         <div class="card user-statistics-card animate fadeLeft">
            <div class="card-content">
               <h4 class="mb-0" style="display:block;padding-left:0.6rem;border-left:5px solid #000000;font-size:18px;font-weight:400;margin:0">Acompanhamento Mensal <a style="color:#000000;" href="javascript:void(0)"><i class="material-icons float-right card-2-tooltip waves-effect-laranja">more_vert</i></a></h4>
					 	</div>
								<div style="display:none;background-color:rgb(245 119 35 / 0.1);" class="select-indicadores card-2-divselect">
								<div class="row card-content">
									<div class="col s12 m12">
										<label for="selectCard2">Indicador</label>
										<select id="selectCard2" data-type="card_2" class="select2 select-indicadores">
											 <option value="0" disabled selected>Selecione o Indicadsor</option>
												<?php foreach($Indicadores->getDataAs("Indicador") as $f): ?>
												 <option value="<?= $f->get("id") ?>"><?= $f->get("nome") ?></option>
												<?php endforeach; ?>    
										</select>	
									</div>								
								</div>
							</div>
					  <div class="card-content">
							 <div class="user-statistics-container">
                  <div id="user-statistics-bar-chart" class="user-statistics-shadow ct-golden-section"></div>
               </div>
              <div class="row">
								<div class="float-left">	
						 			<label>Indicador</label>
									<p id="indicadorCard2" class="medium-small text-indicador"></p>
							 </div>		
						 		<div class="float-right">	
						 			<label>Unidade de Negócio</label>
									<p id="filialCard2" class="medium-small text-filial"></p>
								</div>						 	
									</div>              
            </div>
         </div>
      </div>    
  
   
   
   <!--/ Current balance & total transactions cards-->

   <!--/ Current balance & appointment cards-->
      <div class="col s12 m12 l12 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
							<h4 class="mb-0" style="display:block;padding-left:0.6rem;border-left:5px solid #000000;font-size:18px;font-weight:400;margin:0">Acompanhamento Diário <a style="color:#000000;" href="javascript:void(0)"><i class="material-icons float-right card-3-tooltip waves-effect-laranja">more_vert</i></a></h4>               
							</div>
							<div style="display:none;background-color:rgb(245 119 35 / 0.1);" class="select-indicadores card-3-divselect">
								<div class="row card-content">
									<div class="col s12 m12">
										<label for="selectCard3">Indicador</label>
										<select id="selectCard3" data-type="card_3" class="select2 select-indicadores">
											 <option value="0" disabled selected>Selecione o Indicador</option>
												<?php foreach($Indicadores->getDataAs("Indicador") as $f): ?>
												 <option value="<?= $f->get("id") ?>"><?= $f->get("nome") ?></option>
												<?php endforeach; ?>    
										</select>	
									</div>								
								</div>
							</div>
					 <div class="card-content">
               <div class="total-transaction-container">
                  <div id="total-transaction-line-chart" class="total-transaction-shadow"></div>
               </div>
						 <div class="row">
								<div class="float-left">	
						 			<label>Indicador</label>
									<p id="indicadorCard3" class="medium-small text-indicador"></p>
							 </div>		
						 		<div class="float-right">	
						 			<label>Unidade de Negócio</label>
									<p id="filialCard3" class="medium-small text-filial"></p>
								</div>						 	
									</div>
            </div>
         </div>
      </div>

   <div class="row">      
      <div class="col s12 m12 l12">
         <div class="card users-list-table animate fadeRight">
            <div class="card-content pb-1">
               <h4 class="mb-0" style="display:block;padding-left:0.6rem;border-left:5px solid #000000;font-size:18px;font-weight:400;margin:0">Acompanhamento por Usuário <a style="color:#000000;" href="javascript:void(0)"><i class="material-icons float-right card-4-tooltip">more_vert</i></a></h4>	
								 <label>Indicador</label>
								 <span id="indicadorCard4" class="medium-small text-indicador"></span>
								 <label>| Unidade de Negócio</label>
									<span id="filialCard4" class="medium-small text-filial"></span>								
            </div>
					 <div style="display:none;background-color:rgb(245 119 35 / 0.1);" class="select-indicadores card-4-divselect">
								<div class="row card-content">
									<div class="col s12 m12">
										<label for="selectCard4">Indicador</label>
										<select id="selectCard4" data-type="card_4" class="select2 select-indicadores">
											 <option value="0" disabled selected>Selecione o Indicador</option>
												<?php foreach($Indicadores->getDataAs("Indicador") as $f): ?>
												 <option value="<?= $f->get("id") ?>"><?= $f->get("nome") ?></option>
												<?php endforeach; ?>    
										</select>	
									</div>								
								</div>
							</div>
        <div class="users-list-table">      
          <div class="card-content">
            <!-- datatable start -->
            <div class="responsive-table">
              <table style="width:100%" id="users-list-datatable" class="table">
                <thead>
                  <tr> 
                    <th></th>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Unidade de Negócio</th>
                    <th>Média Diária</th>
										<th>Esse Mês</th>										
                  </tr>
                </thead>
                <tbody>								
                </tbody>
              </table>
            </div>
            <!-- datatable ends -->
          </div>     
      </div>
         </div>
      </div>
   </div>
</div><!-- START RIGHT SIDEBAR NAV -->