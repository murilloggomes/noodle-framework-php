<!-- Scripts essenciais -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- FINAL DOS SCRIPTS -->

<!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/sistema/logo-capa.png" alt="" height="42">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/sistema/favicon.ico" alt="" height="16">
                    </span>
                </a>                
    
                <div class="h-100" id="leftside-menu-container" data-simplebar>

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">Menu</li>                     
                        <li class="side-nav-item">
                            <a href="<?= APPURL . "/users" ?>" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span class="badge bg-success float-end"><?= $Users->getTotalCount() ?></span>
                                <span> Usuários </span>
                            </a>                            
                        </li> 
                    </ul>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
