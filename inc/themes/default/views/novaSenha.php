

<html>
  <head class="no-js" lang="pt-BR">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <meta name="theme-color" content="#fff">
        <title>Definir Senha</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="apple-touch-icon" href="<?= APPURL . "/app-assets/images/favicon/apple-touch-icon-152x152.png"?>">
        <link rel="shortcut icon" type="image/x-icon" href="<?= APPURL . "/app-assets/images/logo/peep-icon2.png"?>">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-modern-menu-template/materialize.css">
 </head>
    <body>
        <div class="novaSenha" style="margin-top:15%">
					
         <div class="form-group d-flex justify-content-center">
                    <h4> Olá, <?= $AuthUser->get("firstname"); ?> </h4>
        </div>
         <div class="container d-flex justify-content-center ">
                <form class="formValidate" 
                      action="<?= APPURL . "/novaSenha" ?>"
											method="POST">
					        <input name="action" value="novaSenha" type="hidden">
                  <input name="idUsuario" type="hidden" value="<?= $AuthUser->get("id"); ?>">
                  <input type="password" style="display:none"> 
       <div class="form-group">
                   <label for="senha">Senha</label>
                   <input name="passwd" type="password" class="validate" placeholder=""  >
                            
        </div>
        <div class="form-group">
                    <label for="confirme-senha">Confirmar Senha</label>
                    <input name="confirm-passwd"  type="password" class="validate" placeholder=""  >
       </div>
                  <p> &nbsp;&nbsp;&nbsp; Gentileza defina sua nova senha com no mínimo 6 caracteres! </p>
                        <button style="width:100%" type="submit" class="btn btn-primary">Salvar</button>
             </form>
    
    
      </div>
 
			</div>
    
            <!-- TOAST -->
        <script src="<?= APPURL . "/app-assets/js/vendors.min.js"?>"></script>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>