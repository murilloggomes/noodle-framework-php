<?php if (!defined('APP_VERSION')) die("Yo, what's up?"); ?>
<!DOCTYPE html>
<html class="no-js" lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="theme-color" content="#fff">

        <meta name="description" content="<?= site_settings("site_description") ?>">
        <meta name="keywords" content="<?= site_settings("site_keywords") ?>"> 
                
        <link rel="stylesheet" type="text/css" href="<?= APPURL . "/inc/themes/default/assets/styles/main.css" ?>">

        <title><?= site_settings("site_name") ?></title>
    </head>

    <body>
       
        <?php $action = Input::post("action"); ?>
        <section id="signin">        
          
            <div class="page-holder clearfix">            
             
                <div class="signin side flex flex-center flex-middle" data-active="<?= $action == "login" ? "true" : ($action=="signup" || $Route->target == "Signup" ? "false" : "") ?>">    
                    
                    <div class="signin-form">
                      <div style="width:100%;">
                        <div class="image-capa mb-20">
                          
                        
                        </div>
                        </div>
                        <form action="<?= APPURL."/login" ?>" method="POST" autocomplete="off">
                            <input type="hidden" name="action" value="login">
                            <?php if (isset($semUser)): ?>
                                <div class="form-result">
                                    <div class="color-danger">
                                        <span class="mdi mdi-close"></span>
                                        <?= "Usuário não encontrado em nosso sistema!" ?>
                                    </div>
                                </div>
                            <?php elseif (Input::post("action") == "login"): ?>
                                <div class="form-result">
                                      <div class="color-danger">
                                          <span class="mdi mdi-close"></span>
                                          <?= "Usuário ou senha incorretos" ?>
                                      </div>
                                 </div>
                            <?php endif; ?> 
                            <div class="form">                             
                                <div class="form-element">                                  
                                    <div class="input-wrapper material-style">
                                        <input type="text" 
                                               class="input-style" 
                                               id="username" 
                                               name="username"
                                               placeholder="E-mail"
                                               value="<?= Input::Post("username") ?>">                                      
                                    </div>
                                </div>
                                <div class="form-element">
                                    <div class="input-wrapper material-style">
                                        <input 
                                        type="password"
                                        class="input-style"
                                        id="password"
                                        placeholder="Senha"
                                        name="password"
                                        >
                                      <a href="javascript:void(0)">                                   
                                       <svg style="bottom: 12px;right: 5px;padding:3px;width:20px;height:20px;color:#fff;border-radius:50px;cursor:pointer;position:absolute;filter: opacity(0.5);display:none;background-color: #fff" data-value="text" class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium css-vubbuv hidePass textPass" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="EyeOutlineIcon"><path d="M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M12,4.5C17,4.5 21.27,7.61 23,12C21.27,16.39 17,19.5 12,19.5C7,19.5 2.73,16.39 1,12C2.73,7.61 7,4.5 12,4.5M3.18,12C4.83,15.36 8.24,17.5 12,17.5C15.76,17.5 19.17,15.36 20.82,12C19.17,8.64 15.76,6.5 12,6.5C8.24,6.5 4.83,8.64 3.18,12Z"></path></svg> 
                                        <svg style="bottom: 12px;right: 5px;padding:3px;width:20px;height:20px;color:#fff;border-radius:50px;cursor:pointer;position:absolute;filter: opacity(0.5); background-color: #fff;" data-value="pass" class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium css-vubbuv hidePass codePass" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="EyeOffOutlineIcon"><path d="M2,5.27L3.28,4L20,20.72L18.73,22L15.65,18.92C14.5,19.3 13.28,19.5 12,19.5C7,19.5 2.73,16.39 1,12C1.69,10.24 2.79,8.69 4.19,7.46L2,5.27M12,9A3,3 0 0,1 15,12C15,12.35 14.94,12.69 14.83,13L11,9.17C11.31,9.06 11.65,9 12,9M12,4.5C17,4.5 21.27,7.61 23,12C22.18,14.08 20.79,15.88 19,17.19L17.58,15.76C18.94,14.82 20.06,13.54 20.82,12C19.17,8.64 15.76,6.5 12,6.5C10.91,6.5 9.84,6.68 8.84,7L7.3,5.47C8.74,4.85 10.33,4.5 12,4.5M3.18,12C4.83,15.36 8.24,17.5 12,17.5C12.69,17.5 13.37,17.43 14,17.29L11.72,15C10.29,14.85 9.15,13.71 9,12.28L5.6,8.87C4.61,9.72 3.78,10.78 3.18,12Z"></path></svg>
                                      </a> 
                                    </div>
                                </div>
                                <div class="form-element submit">
                                    <button class="button-style" type="submit">
                                        <?= 'acessar' ?>
                                    </button>
                                </div>
                                <div class="reset-pass">
                                    <a href="<?= APPURL."/recovery" ?>"><?= "Esqueceu sua senha?" ?></a>
                                </div>
                                <div style="color:#fff">
                                    <p>Noodle Framework PHP - Versão: <?= APP_VERSION ?></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
        <link rel="stylesheet" type="text/css" href="<?= APPURL . "/inc/themes/default/assets/styles/vendor.css?" . VERSION ?>">
        <script type="text/javascript" src="<?= APPURL . "/inc/themes/default/assets/scripts/vendor.js?" . VERSION?>"></script>
        <script type="text/javascript" src="<?= APPURL . "/inc/themes/default/assets/scripts/main.js?" . VERSION?>"></script>
        <script>
            $(document).on("click", ".hidePass", function(){
              var data = $(this).data("value");             
         
              if (data == "pass"){
                $(".codePass").hide();
                $(".textPass").show();
                $("#password").attr("type", "text");           
              } else if (data == "text"){
                $(".textPass").hide();
                $(".codePass").show();
                $("#password").attr("type", "password");
              } 

            });
        </script>
    </body>
</html>