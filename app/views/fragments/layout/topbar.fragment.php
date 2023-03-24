<?php $id ="3"; ?>   
<!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">                           
                            <li class="dropdown notification-list d-lg-none">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-search noti-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                    <form class="p-3">
                                        <input type="text" class="form-control" placeholder="Pesquisar ..." aria-label="Recipient's username">
                                    </form>
                                </div>
                            </li>

                            <li class="dropdown notification-list">
                                <a onclick="" class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-bell noti-icon"></i>
                                    <div id="iconL">
                                    
                                  </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                                    <!-- item-->
                                    <div class="dropdown-item noti-title px-3">
                                        <h5 class="m-0">
                                            <span class="float-end">
                                               <div id="limp">
                                                <a href="javascript: void(0);" onclick="" class="text-dark">
                                                    <small>Limpar Todos</small>
                                                </a>
                                              </div>
                                            </span>Notificações
                                        </h5>
                                    </div>

                                    <div class="px-3" style="max-height: 300px;" data-simplebar id="notificacaoDiv">
                                    </div>

                                    <div id="verT">
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#notificacaoG" class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                                        Ver Todas
                                    </a>
                                  </div>

                                </div>
                            </li>
                           
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                    <?php $arquivo = $_SERVER["DOCUMENT_ROOT"] . "/assets/images/usuarios/$id.jpg";   ?>
                                    <?php if(file_exists($arquivo)): ?>  
                                        <img src="<?= APPURL . "/assets/images/usuarios/$id.jpg"?>" alt="user-image" class="rounded-circle">
                                    <?php else: ?>
                                         <img src="<?= APPURL . "/assets/image/avatar/horus.png"?>" alt="user-image" class="rounded-circle">
                                    <?php endif; ?>   
                                  </span>
                                    <span>
                                        <span class="account-user-name text-wrap" ><?= substr($AuthUser->get("firstname"), 0, 15) . ' ...';  ?></span>
                                        <span class="account-position">Brasília</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Menu do Usuário</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="<?= APPURL . "/perfil"?>" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>Minha Conta</span>
                                    </a>

                                    <!-- item-->
                                    <a href="<?= APPURL . "/logout"?>" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Sair</span>
                                    </a>
                                </div>
                            </li>

                        </ul>
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>                        
                    <!-- end Topbar -->