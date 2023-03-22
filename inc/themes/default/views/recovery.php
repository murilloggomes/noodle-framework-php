<?php if (!defined('APP_VERSION')) die("Yo, what's up?"); ?>
<!DOCTYPE html>
<html class="no-js" lang="<?= ACTIVE_LANG ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <meta name="theme-color" content="#fff">

        <meta name="description" content="<?= site_settings("site_description") ?>">
        <meta name="keywords" content="<?= site_settings("site_keywords") ?>">

        <link rel="icon" href="<?= site_settings("logomark") ? site_settings("logomark") : active_theme_url() . "/assets/images/favicon.ico"?>" type="image/x-icon">
        <link rel="shortcut icon" href="<?= site_settings("logomark") ? site_settings("logomark") : active_theme_url() . "/assets/images/favicon.ico"?>" type="image/x-icon">
        
        <link rel="stylesheet" type="text/css" href="<?= active_theme_url() . "/assets/styles/vendor.css?v=neptun010002" . VERSION ?>">
        <link rel="stylesheet" type="text/css" href="<?= active_theme_url() . "/assets/styles/main.css?v=neptun010002" . VERSION ?>">

        <title><?= __("Password Recovery") ?></title>
    </head>

    <body>
        <section id="signin">
            <div class="page-holder clearfix">
                <div class="signup side float-left flex flex-start flex-middle" data-active='open'>
                    <div class="signup-form">
                        <div class="form-holder">
                            <div class="title">
                                <h1><?= __("Password Recovery") ?></h1>
                            </div>
                            <div class="form">
                                <form action="<?= APPURL."/recovery" ?>" method="POST" autocomplete="off">
                                    <?php if (empty($success)): ?>
                                        <input type="hidden" name="action" value="recover" >

                                        <?php if (!empty($error)): ?>
                                            <div class="form-result">
                                                <div class="color-danger">
                                                    <span class="mdi mdi-close"></span>
                                                    <?= $error ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-element">
                                            <div class="input-wrapper material-style">
                                                <input type="email" class="input-style" 
                                                       id="email"  name="email" placeholder="Seu endereço de email"
                                                       value="<?= htmlchars(Input::Post("email")) ?>">
                                                <label for="email" class="placeholder">
                                                    <?= __('Your e-mail address') ?>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-element submit">
                                            <button type="submit" class="button-style purple">
                                                <?= __("Submit") ?>
                                            </button>
                                        </div>
                                    <?php else: ?>
                                        <div class="recover-sent">
                                            <h2 class="title"><?= __('Email Sent!') ?></h2>
                                            <p><?= __('Password reset instruction sent to your email address.')?> <br></br> <a style="font-weight:700" href="<?=APPURL . '/login'?>">Voltar para início</a></p>
                                        </div>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script type="text/javascript" src="<?= active_theme_url() . "/assets/scripts/vendor.js?v=neptun010002" . VERSION?>"></script>
        <script type="text/javascript" src="<?= active_theme_url() . "/assets/scripts/main.js?v=neptun010002" . VERSION?>"></script>
        <script type="text/javascript" charset="utf-8">
        </script>
      <?php require_once APPPATH . '/views/fragments/google-analytics.fragment.php';?>
    </body>
</html>