<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <title><?= site_settings("site_name") ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- App favicon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="<?= APPURL . "/assets/css/vendor/jquery-jvectormap-1.2.2.css" ?>" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="<?= APPURL . "/assets/css/icons.min.css" ?>" rel="stylesheet" type="text/css" />
  <link href="<?= APPURL . "/assets/css/app.min.css" ?>" rel="stylesheet" type="text/css" id="app-style" />
  <link href="<?= APPURL . "/assets/css/custom.css" ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?= APPURL . "/assets/css/toastr.min.css" ?>">
  <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= APPURL . "/assets/css/scrollbar.min.css" ?>">
</head>
<!-- END: Head-->

<body class="loading"
  data-layout-color="<?= custom($AuthUser->get("id"), "modo_tema") == "" ? "light" : custom($AuthUser->get("id"), "modo_tema") ?>"
  data-leftbar-theme="<?= custom($AuthUser->get("id"), "cor_menu") == "" ? "default" : custom($AuthUser->get("id"), "cor_menu") ?>"
  data-layout-mode="<?= custom($AuthUser->get("id"), "largura_tema") == "" ? "fixed" : custom($AuthUser->get("id"), "largura_tema") ?>"
  data-rightbar-onstart="true" data-leftbar-compact-mode="condensed">

  <!-- Begin page -->
  <!-- ========== Left Sidebar Start ========== -->
  <div class="wrapper">
    <?php require(APPPATH . '/views/fragments/layout/navigation.fragment.php'); ?>
    <?php require(APPPATH . '/views/fragments/layout/topbar.fragment.php'); ?>
    <div class="content-page">
      <div class="content">
        <div class="container-fluid">

          <?php require(APPPATH . '/views/fragments/users.fragment.php'); ?>

        </div>
      </div>
    </div>

    <?php require(APPPATH . '/views/fragments/layout/footer.fragment.php'); ?>
  </div>
  <!-- END wrapper -->

  <!-- Right Sidebar -->
  <?php require(APPPATH . '/views/fragments/layout/navigation-right.fragment.php'); ?>
  <div class="rightbar-overlay"></div>
  <!-- /End-bar -->

  <!-- bundle -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <script src="<?= APPURL . "/assets/js/vendor.min.js" ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="<?= APPURL . "/assets/js/app.min.js" ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

  <!-- third party js ends -->

</body>

</html>