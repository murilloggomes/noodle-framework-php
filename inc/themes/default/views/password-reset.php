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

        <title><?= __("Password Reset") ?></title>
    </head>

    <body>
        <section id="signin">
            <div class="page-holder clearfix">
                <div class="signup side float-left flex flex-start flex-middle" data-active='open'>
                    <div class="signup-form">
                        <div class="form-holder">
                            <div class="title">
                                <h1><?= __("Password Reset") ?></h1>
                            </div>

                            <div class="form">
                                <form action="<?= APPURL."/recovery/".$Route->params->id.".".$Route->params->hash ?>" method="POST" autocomplete="off">
                                    <?php if (empty($success)): ?>
                                        <input type="hidden" name="action" value="reset">

                                        <?php if (!empty($error)): ?>
                                            <div class="form-result mb-40">
                                                <div class="color-danger">
                                                    <span class="mdi mdi-close"></span>
                                                    <?= $error ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-element">
                                            <div class="input-wrapper material-style">
                                                <input type="password" class="input-style" placeholder="Digite sua senha"
                                                       id="password"  name="password">
                                                <label for="password" class="placeholder">
                                                    <?= __('New Password') ?>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-element">
                                            <div class="input-wrapper material-style">
                                                <input type="password" class="input-style" placeholder="Confirme sua senha"
                                                       id="password-confirm"  name="password-confirm">
                                                <label for="password-confirm" class="placeholder">
                                                    <?= __('Password confirm') ?>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-element submit">
                                            <button type="submit" class="button-style purple">
                                                <?= __("Reset Password") ?>
                                            </button>
                                        </div>
                                    <?php else: ?>
                                        <div class="recover-sent">
                                            <h2 class="title"><?= __('Success!') ?></h2>
                                            <p><?= __("You've successfully reset your password!") ?></p>
                                            <a href="<?= APPURL."/login" ?>" class="button-style purple"><?= __("Login") ?></a>
                                        </div>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <script type="text/javascript" src="<?= active_theme_url()."/assets/js/plugins.js?v=".VERSION ?>"></script>
        <script type="text/javascript" src="<?= active_theme_url()."/assets/js/core.js?v=".VERSION ?>"></script>
        <script type="text/javascript" charset="utf-8">
            $(function(){
            })
        </script>

        <?php require_once(APPPATH.'/views/fragments/google-analytics.fragment.php'); ?>
    </body>
</html>