<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <link rel="icon" href="<?php echo base_url() ?>assets2/logo.png">
  <title>Gudang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>

  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets2/template/select2/dist/css/select2.min.css"> -->
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/template/css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/template/css/datatable/datatables.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/template/css/datatable/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets2/template/js/select.dataTables.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

  <!-- End plugin css for this page -->
  <script src="<?php echo base_url() ?>assets2/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets2/template/js/jquery-ui/jquery-ui.min.js"></script>


  <!-- plugins:js -->
  <script src="<?php echo base_url() ?>assets2/template/js/datatable/datatables.js"></script>
  <script src="<?php echo base_url() ?>assets2/template/js/datatable/datatables.min.js"></script>
  <script src="<?php echo base_url() ?>assets2/template/js/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets2/template/vendors/js/vendor.bundle.base.js"></script>



  <script src="<?php echo base_url() ?>assets2/template/js/autoNumeric.js"></script>
  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- <script src="<?php echo base_url() ?>assets2/template/select2/dist/js/select2.min.js"></script> -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets2/template/images/favicon.png" />

</head>

<body>
  <div class="container-scroller">

    <?php $this->load->view($navbar) ?>
    <div class="container-fluid page-body-wrapper">
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>

      <?php $this->load->view($sidebar) ?>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div class="main-panel">
        <div class="content-wrapper">
          <?php $this->load->view($content) ?>
        </div>
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022 <b> Created Labibul Fikri &nbsp; </b>
              <!-- <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span> -->
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Jamil Jaya  <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
      </div>
      <!-- End of Main Content -->


    </div>
  </div>
</body>


<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?php echo base_url() ?>assets2/template/vendors/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>assets2/template/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets2/template/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url() ?>assets2/template/js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?php echo base_url() ?>assets2/template/js/off-canvas.js"></script>
<script src="<?php echo base_url() ?>assets2/template/js/hoverable-collapse.js"></script>
<script src="<?php echo base_url() ?>assets2/template/js/template.js"></script>
<script src="<?php echo base_url() ?>assets2/template/js/settings.js"></script>
<script src="<?php echo base_url() ?>assets2/template/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- <script src="<?php echo base_url() ?>assets2/template/js/dashboard.js"></script> -->
<script src="<?php echo base_url() ?>assets2/template/js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->

</html>