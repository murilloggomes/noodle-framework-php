<?php $idUser = $AuthUser->get("id") ?>
<div class="leftside-menu">
                <!-- LOGO -->
                <a href="<?= APPURL ?>" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="<?= APPURL . "/app-assets/assets/image/logo-branco-noodle.png"?>" alt="" height="36">
                    </span>
                    <span class="logo-sm">
                        <img src="<?= APPURL . "/app-assets/assets/image/icon-branco-noodle.png"?>" alt="" height="26">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="<?= APPURL ?>" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="<?= APPURL . "/app-assets/assets/image/logo-preto-noodle.png"?>" alt="" height="36">
                    </span>
                    <span class="logo-sm">
                        <img src="<?= APPURL . "/app-assets/assets/image/icon-preto-noodle.png"?>" alt="" height="26">
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container" data-simplebar>

                    <!--- Sidemenu -->
                    <ul class="side-nav">
                     
                        <li class="side-nav-title side-nav-item">MENU</li>
                    
                        <li class="side-nav-item">
                            <a href="<?= APPURL . "/dashboard"?>" class="side-nav-link">
                                <i class="uil-chart"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                   
                        <li class="side-nav-item">
                            <a href="<?= APPURL . "/users" ?>" class="side-nav-link">
                                <i class="uil-user"></i>
                                <span> Usuários </span>
                            </a>
                        </li>
                     
                       <li class="side-nav-item">
                            <a href="<?= APPURL . "/config" ?>" class="side-nav-link">
                                <i class="uil-bright"></i>
                                <span> Sistema </span>
                            </a>
                        </li>
                   
                <?php if(isset($_COOKIE["nplhA"])): ?>
                    <li class="side-nav-item">
                        <a ref="javascript:void(0)" id="VoltarSessao" class="side-nav-link">
                        <i class="uil-arrow-circle-left"></i>
                        <span class="menu-title" data-i18n="Documentation">Voltar</span>                 
                        </a>
                    </li>  
                <?php endif; ?>


                </ul>

                <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
<div class="rightbar-overlay"></div>