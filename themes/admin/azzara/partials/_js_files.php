<!--   Core JS Files   -->
<script src="<?= $thema_folder; ?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= $thema_folder; ?>assets/js/core/popper.min.js"></script>
<script src="<?= $thema_folder; ?>assets/js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="<?= $thema_folder; ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= $thema_folder; ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- Bootstrap Toggle -->
<script src="<?= $thema_folder; ?>assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="<?= $thema_folder; ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Datatable -->
<script src="<?= $thema_folder; ?>assets/js/plugin/datatables/datatables.min.js"></script>
<!-- Azzara JS -->
<script src="<?= $thema_folder; ?>assets/js/ready.min.js"></script>
<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="<?= $thema_folder; ?>assets/js/setting-demo.js"></script>
<?php $this->load->view($thema_load . "partials/_notify.php"); ?>


<script>
  function ready(callbackFunc) {
    if (document.readyState !== "loading") {
      callbackFunc();
    } else if (document.addEventListener) {
      document.addEventListener("DOMContentloaded", callbackFunc());
    } else
      document.attachEvent('onreadystatechange', function() {
        if (document.readyState == 'complete')
          callbackFunc();
      })
  }

  const baseUrl = "<?= base_url() ?>";


  $('#basic-datatables').DataTable();
</script>
<script src="<?= $thema_folder; ?>assets/js/main.js?<?= time(); ?>"></script>