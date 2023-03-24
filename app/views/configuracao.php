<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8" />
  <title><?= site_settings("site_name") ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?= APPURL . "/assets/images/logo/peep-icon.png" ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="<?= APPURL . "/assets/css/icons.min.css" ?>" rel="stylesheet" type="text/css" />
  <link href="<?= APPURL . "/assets/css/app.min.css" ?>" rel="stylesheet" type="text/css" id="app-style" />
  <link href="<?= APPURL . "/assets/css/custom.css" ?>" rel="stylesheet" type="text/css" />
  <link href="<?= APPURL . "/assets/css/config-custom.css" ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?= APPURL . "/assets/css/toastr.min.css" ?>">
  <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
  <link rel="stylesheet" href="<?= APPURL . "/assets/css/scrollbar.min.css" ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">



</head>
<!-- END: Head-->

<body class="loading"
  data-layout-color="<?= custom($AuthUser->get("id"), "modo_tema") == "" ? "light" : custom($AuthUser->get("id"), "modo_tema") ?>"
  data-leftbar-theme="<?= custom($AuthUser->get("id"), "cor_menu") == "" ? "default" : custom($AuthUser->get("id"), "cor_menu") ?>"
  data-layout-mode="<?= custom($AuthUser->get("id"), "largura_tema") == "" ? "fixed" : custom($AuthUser->get("id"), "largura_tema") ?>"
  data-rightbar-onstart="true" style="font-family:open sans,Helvetica Neue,Helvetica,Arial,sans-serif;">
  <!-- Begin page -->
  <div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <?php require(APPPATH . '/views/fragments/layout/navigation.fragment.php'); ?>
    <?php require(APPPATH . '/views/fragments/layout/topbar.fragment.php'); ?>
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
      <div class="content">
        <?php require(APPPATH . '/views/fragments/views-config/config-geral.fragment.php'); ?>
      </div>
    </div>
    <?php require(APPPATH . '/views/fragments/layout/footer.fragment.php'); ?>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
  </div>
  <!-- END wrapper -->

  <!-- Right Sidebar -->
  <?php require(APPPATH . '/views/fragments/layout/navigation-right.fragment.php'); ?>
  <div class="rightbar-overlay"></div>
  <!-- bundle -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="<?= APPURL . "/assets/js/vendor.min.js" ?>"></script>
  <script src="<?= APPURL . "/assets/js/app.min.js" ?>"></script>

  <!-- demo js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="<?= APPURL . "/assets/js/custom/custom-config.js" ?>"></script>
  <script src="<?= APPURL . "/assets/js/custom/drag.js" ?>"></script>

  <script src="<?= APPURL . "/assets/js/custom/custom-js.js" ?>"></script>
  <!--         <script src="<?= APPURL . "/assets/js/js-mult/main.js" ?>"></script> -->
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"
    integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="<?= APPURL . "/assets/js/js-mult/select2.min.js" ?>"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- end demo js-->



  <script>
    // 				$('#equipes-table').DataTable({
    // 				 responsive: true,
    // 					order: [0, 'ASC'],
    // 					lengthMenu: [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Todos"] ],   
    // 					pageLength: 5,
    // 					language: {
    // 						url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json'
    // 					},
    // 			});

    $("#menu-motivo-tab").on("click", function () {
      console.log("dale btn");
      $("#btnProcesso").attr("hidden", false);
    });

  </script>

</body>


</html>