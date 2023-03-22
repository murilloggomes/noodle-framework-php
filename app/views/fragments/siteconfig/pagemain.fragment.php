<?php $idUser = $AuthUser->get("id") ?>
<!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">           
          
                  <?php require_once(APPPATH.'/views/fragments/' . $fragmentView .'.fragment.php'); ?>
                  
                  <?php require_once(APPPATH.'/views/fragments/siteconfig/sidebar.fragment.php'); ?>                  
                   
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->