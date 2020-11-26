<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view($thema_load . "components/head.php"); ?>
</head>

<body>
  <?php $this->load->view($thema_load . "components/header.php") ?>
  <!--==========================
    Intro Section
  ============================-->

  <main id="main" class='mt-5'>
    <div style="min-height:400px" class="d-flex justify-content-center align-items-center">
      <div>
        <div class="alert alert-danger mt-5"><?= $status; ?></div>
        <a href="<?= base_url("pembayaran"); ?>" class="btn btn-primary">Cek Status Pembayaran</a>
      </div>
    </div>
  </main>

  <?php $this->load->view($thema_load . "components/footer.php"); ?>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <div id="preloader"></div>

  <?php $this->load->view($thema_load . "components/js_library.php"); ?>

</body>

</html>