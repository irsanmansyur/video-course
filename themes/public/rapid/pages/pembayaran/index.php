<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view($thema_load . "components/head.php"); ?>
</head>

<body>
  <?php $this->load->view($thema_load . "components/header.php") ?>

  <main id="main" style="margin-top:110px">
    <div class="container">
      <!--Author      : @arboshiki-->
      <div class="card">
        <div class="card-header">
          <header>
            <div class="row">
              <div class="col">
                <a target="_blank" href="<?= base_url(); ?>">
                  <img style="height: 105px" src="<?= base_url("assets/img/logo/sahampreneur.png"); ?>" data-holder-rendered="true" />
                </a>
              </div>
              <div class="col company-details">
                <h2 class="name">
                  <a target="_blank" href="<?= base_url(); ?>">
                    <?= $settings->name_app; ?>
                  </a>
                </h2>
                <div><?= $settings->Alamat; ?></div>
                <!-- <div>(123) 456-789</div> -->
                <!-- <div>company@example.com</div> -->
              </div>
            </div>
          </header>
        </div>
        <div class="card-body">
          <div class="row contacts">
            <div class="col invoice-to">
              <div class="text-gray-light">INVOICE TO:</div>
              <h2 class="to"><?= user()->name; ?></h2>
              <!-- <div class="address"><?= ''; ?></div> -->
              <div class="email"><a href="mailto:john@example.com"><?= user()->email; ?></a></div>
            </div>
            <div class="col invoice-details">
              <h1 class="invoice-id">INVOICE</h1>
              <div class="date">Tanggal Pembayaran: <?= date("d/m/Y", isset($pembayaran->created_at) ? strtotime($pembayaran->created_at) : time()); ?></div>
              <!-- <div class="date">Due Date: 30/10/2018</div> -->
            </div>
          </div>
          <hr>
          <div class="row details">
            <div class="col">
              <h4 class="card-title">Members Premium</h4>
            </div>
            <div class="col">
              <h4>Jumlah Bayar : <?= rupiah($settings->harga_member); ?>
              </h4>
            </div>
          </div>
          <hr>
          <?php if ($pembayaran) : ?>
            <center>Status Pesanan
              <p class="py-4"><button class="btn btn-primary">Menunggu Verifikasi</button></p>
            </center>
            <hr>
          <?php endif; ?>
          <?php $this->load->view($thema_load . "components/dropzone/bootstrap.php"); ?>
        </div>
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