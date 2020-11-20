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

    <div class="container d-flex justify-content-center align-items-center" style="min-height :500px;">
      <div class="card w-100 mt-5">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-md-7">
              <div class="img-profile">
                <img src="<?= base_url("assets/img/profile/") . user()->profile; ?>" alt="" style="width: 100%;max-height:500px">
              </div>
            </div>
            <div class="col-sm-12 col-md-5">
              <div class="title">Selamat Datang</div>
              <h1><?= user()->name; ?></h1>
              <div>Status</div>
              <div>
                <?php if ($status == 1) : ?>
                  <span class="badge badge-danger">Anda Belum melakukan Pembayaran</span>
                <?php elseif ($status == 0) :; ?>
                  <span class="badge badge-warning">Pembayaran anda belum di verifikasi</span>
                <?php elseif ($status == 1) :; ?>
                  <span class="badge badge-primary">Members Premium</span>
                <?php else :; ?>
                  <span class="badge badge-warning">Pembayaran anda di tolak</span> <br>
                  <span><?= $pembayaran->alasan; ?></span>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <a href="<?= base_url("admin/profile"); ?>" class="btn btn-danger d-block my-4">Ubah profile</a>
        </div>
      </div>

    </div>
  </main>
  <div class="row">
    <div class=""></div>
  </div>

  <?php $this->load->view($thema_load . "components/footer.php"); ?>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <div id="preloader"></div>

  <?php $this->load->view($thema_load . "components/js_library.php"); ?>
  <script src="<?= $thema_folder . "pages/video/partials/main.js"; ?>"></script>

</body>

</html>