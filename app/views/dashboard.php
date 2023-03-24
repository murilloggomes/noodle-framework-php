<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <title><?= site_settings("site_name") ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?= APPURL . "/assets/images/logo/peep-icon.png" ?>">
  <link href="<?= APPURL . "/assets/css/vendor/jquery-jvectormap-1.2.2.css" ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="<?= APPURL . "/assets/css/icons.min.css" ?>" rel="stylesheet" type="text/css" />
  <link href="<?= APPURL . "/assets/css/app.min.css" ?>" rel="stylesheet" type="text/css" id="app-style" />
  <link href="<?= APPURL . "/assets/css/dashboard.css" ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
  <link rel="stylesheet" href="<?= APPURL . "/assets/css/scrollbar.min.css" ?>">
  <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

  <!-- Bootstrap datepicker CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css"
    rel="stylesheet" />

  <style>
    ::-webkit-scrollbar {
      width: 10px;
      height: 10px;
      background-color: #ccc
    }

    ::-webkit-scrollbar-track {
      background: #ccc
    }

    ::-webkit-scrollbar-track-piece {
      background: #ccc;
      height: 20px
    }

    ::-webkit-scrollbar-thumb {
      background: #333;
      border-radius: 3px
    }

    ::-webkit-scrollbar-corner {
      background: red;
      border-radius: 5px
    }
  </style>
</head>

<body onload="exibeChart()" class="loading"
  data-layout-color="<?= custom($AuthUser->get("id"), "modo_tema") == "" ? "light" : custom($AuthUser->get("id"), "modo_tema") ?>"
  data-leftbar-theme="<?= custom($AuthUser->get("id"), "cor_menu") == "" ? "default" : custom($AuthUser->get("id"), "cor_menu") ?>"
  data-layout-mode="<?= custom($AuthUser->get("id"), "largura_tema") == "" ? "fixed" : custom($AuthUser->get("id"), "largura_tema") ?>"
  data-rightbar-onstart="true">

  <!-- Begin page -->
  <div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <?php require(APPPATH . '/views/fragments/layout/navigation.fragment.php'); ?>
    <?php require(APPPATH . '/views/fragments/layout/topbar.fragment.php'); ?>
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <?php require(APPPATH . '/views/fragments/layout/modal.fragment.php'); ?>
    <?php require(APPPATH . '/views/fragments/dashboard.fragment.php'); ?>
    <?php require(APPPATH . '/views/fragments/layout/footer.fragment.php'); ?>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
  </div>
  <!-- END wrapper -->
  <!-- Right Sidebar -->
  <?php require(APPPATH . '/views/fragments/layout/navigation-right.fragment.php'); ?>
  <div class="rightbar-overlay"></div>
  <!-- /End-bar -->

  <!-- bundle -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="<?= APPURL . "/assets/js/vendor.min.js" ?>"></script>
  <script src="<?= APPURL . "/assets/js/vendor/chart.min.js" ?>"></script>
  <script src="<?= APPURL . "/assets/js/custom/custom-dashboard.js" ?>"></script>
  <script src="<?= APPURL . "/assets/js/custom/chart-criacao.js" ?>"></script>
  <script src="<?= APPURL . "/assets/js/custom/custom-js.js" ?>"></script>
  <script src="<?= APPURL . "/assets/js/app.min.js" ?>"></script>
  <script src="<?= APPURL . "/assets/js/vendor/jquery-jvectormap-1.2.2.min.js" ?>"></script>
  <script src="<?= APPURL . "/assets/js/vendor/jquery-jvectormap-world-mill-en.js" ?>"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="<?= APPURL . "/assets/js/js-mult/main.js" ?>"></script>
  <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <!-- third party js ends -->
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
  <script>
    $(".row").sortable();
    $(document).ready(function () {
      $("#datepicker").datepicker();
      $(".select2").select2({
        dropdownParent: $("#staticBackdrop")
      });
    });
  </script>
</body>

</html>