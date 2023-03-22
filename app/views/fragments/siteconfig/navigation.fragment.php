<div class="leftside-menu">
                <!-- LOGO -->
                <a href="<?= APPURL ?>" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="<?= APPURL . "/assets/image/logo/HORUS-15.png"?>" alt="" height="36">
                    </span>
                    <span class="logo-sm">
                        <img src="<?= APPURL . "/assets/image/logo/HORUS-15.png"?>" alt="" height="16">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="<?= APPURL ?>" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="<?= APPURL . "/assets/image/logo/HORUS-01.png"?>" alt="" height="36">
                    </span>
                    <span class="logo-sm">
                        <img src="<?= APPURL . "/assets/image/logo/HORUS-01.png"?>" alt="" height="16">
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container" data-simplebar>

                    <!--- Sidemenu -->
                    <ul class="side-nav">
                       <?php $decodePermissaoPagina = json_decode($AuthUser->get("permissoes_paginas"),true); ?>
                        <li class="side-nav-title side-nav-item">MENU</li>
                        <?php if(in_array(3,$decodePermissaoPagina)): ?>     
                        <li class="side-nav-item">
                            <a href="<?= APPURL . "/dashboard"?>" class="side-nav-link">
                                <i class="uil-chart"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(in_array(4,$decodePermissaoPagina)): ?> 
                      <li class="side-nav-item">
                            <a href="<?= APPURL . "/relatorio-tiino"?>" class="side-nav-link">
                                <i class="uil-chart-bar"></i>
                                <span> Relatório Tiino</span>
                            </a>
                        </li>
                      <?php endif; ?>
                   
                        <li class="side-nav-title side-nav-item">PAINEL DE ADMINISTRADOR</li>
                        <?php if(in_array(5,$decodePermissaoPagina)): ?>
                         <li class="side-nav-item">
                            <a href="<?= APPURL . "/processos"?>" class="side-nav-link">
                                <i class="uil-clipboard-alt"></i>
                                <span> Processos </span>
                            </a>
                        </li>
                      <?php endif; ?>
                      <?php if(in_array(6,$decodePermissaoPagina)): ?>
                        <li class="side-nav-item">
                            <a href="<?= APPURL . "/users" ?>" class="side-nav-link">
                                <i class="uil-user"></i>
                                <span> Usuários </span>
                            </a>
                        </li>
                      <?php endif; ?>
                      <?php if(in_array(2,$decodePermissaoPagina)): ?>
                      <li class="side-nav-item">
                            <a href="<?= APPURL . "/clientes" ?>" class="side-nav-link">
                                <i class="uil-users-alt"></i>
                                <span> Clientes </span>
                            </a>
                        </li>
                      <?php endif; ?>
                      <?php if(in_array(1,$decodePermissaoPagina)): ?>
                       <li class="side-nav-item">
                            <a href="<?= APPURL . "/config" ?>" class="side-nav-link">
                                <i class="uil-bright"></i>
                                <span> Sistema </span>
                            </a>
                        </li>
                      <?php endif; ?>
                                <?php if(isset($_COOKIE["nplhA"])): ?>
                         <li class="side-nav-item">
                 <a ref="javascript:void(0)" id="VoltarSessao" class="side-nav-link">
                   <i class="uil-arrow-circle-left"></i>
                   <span class="menu-title" data-i18n="Documentation">Voltar</span>                 
                 </a>
            </li>  
                             
                       
                        <?php endif; ?>

<!--                         <li class="side-nav-item">
                            <a href="<?= APPURL . "/logs" ?>" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span> Logs </span>
                            </a>
                        </li> -->
                    </ul>

                    <!-- Help Box -->
<!--                     <div class="help-box text-white text-center">
                        <a href="javascript: void(0);" class="float-end close-btn text-white">
                            <i class="mdi mdi-close"></i>
                        </a>                        
                        <h5 class="mt-3">Sistema Horus Processos</h5>
                        <p class="mb-3">Versão: 1.0</p>                       
                    </div> -->
                    <!-- end Help Box -->
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
<div class="rightbar-overlay"></div>