<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view($thema_load . "partials/_head.php"); ?>
  <style>
    .img-cursor-in {
      transition: transform 0.25s ease;
      cursor: zoom-in;
    }

    .img-cursor-out {
      cursor: zoom-out;
      max-width: 100%;
    }
  </style>
</head>

<body>
  <div class="wrapper">

    <?php $this->load->view($thema_load . "partials/_main_header.php"); ?>
    <?php $this->load->view($thema_load . "partials/_sidebar.php"); ?>

    <div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="page-header">
            <h4 class="page-title"><?= $page_title; ?></h4>
            <ul class="breadcrumbs">
              <li class="nav-home">
                <a href="<?= base_url(); ?>">
                  <i class="flaticon-home"></i>
                </a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href=<?= base_url('dashboard'); ?>>Dashboard</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/pembayaran'); ?>">Pembayaran</a>
              </li>
            </ul>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title">Detail data Pembayaran</div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-7">
                  <div class="card">
                    <h3 class="text-center mt-3">Terima Pembayaran dengan :</h3>
                    <hr>
                    <div class="row py-5">
                      <div class="col-6">
                        <div class="text-center">
                          <h2>Bukti Pembayaran</h2>
                          <div class="avatar avatar-xl" data-toggle="modal" data-target=".bd-example-modal-lg">
                            <img src="<?= $pembayaran->getTakeBuktiPembayaran(); ?>" alt="..." class="avatar-img img-cursor-in rounded-circle">
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <h2>Pembayaran pada :</h2>
                        <div class="row">
                          <div class="col-6 py-2">Tanggal </div>
                          <div class="col-6">: <?= date("d-m-Y", strtotime($pembayaran->created_at)); ?></div>
                          <div class="col-6 py-2">Status Pembayaran</div>
                          <div class="col-6">:
                            <?php if ($pembayaran->status == "0") : ?>
                              <span class="badge badge-warning">Pending</span>
                            <?php elseif ($pembayaran->status == "2") : ?>
                              <span class="badge badge-danger">Di Tolak</span>
                            <?php else :; ?>
                              <span class="badge badge-primary">Di Terima</span>
                            <?php endif; ?>
                          </div>
                          <div class="col-6">Jumlah Pembayaran</div>
                          <div class="col-6">: <?= rupiah($pembayaran->jumlah); ?></div>
                        </div>
                      </div>
                    </div>
                    <?php if ($pembayaran->status !== "1") : ?>
                      <form action="" method="post" class="text-center py-5">
                        <input hidden name="id" value="<?= $pembayaran->id; ?>" />
                        <button class="btn btn-danger" type="submit">Terima Pembayaran</button>
                      </form>
                      <?php if ($pembayaran->status != "2") : ?>
                        <p class="text-center pb-5">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tolak">
                            Tolak Pembayaran!
                          </button>
                        </p>
                      <?php endif; ?>
                    <?php else : ?>
                      <button class="btn btn-success">
                        <span class="btn-label">
                          <i class="fa fa-check"></i>
                        </span>
                        Telah DIterima
                      </button>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="card">
                    <h3 class="text-center mt-3">Details User Pembayar :</h3>
                    <center>
                      <div class="avatar avatar-xl">
                        <img src="<?= $pembayaran->user()->takeProfile(); ?>" alt="..." class="avatar-img rounded-circle">
                      </div>
                    </center>
                    <div class="row p-3">
                      <div class="col-6">Nama</div>
                      <div class="col-6">: <?= $pembayaran->user()->name; ?></div>
                      <div class="col-6">Email</div>
                      <div class="col-6">: <?= $pembayaran->user()->email; ?></div>
                      <div class="col-6">Username</div>
                      <div class="col-6">: <?= $pembayaran->user()->username; ?></div>
                      <div class="col-6">Register Pada</div>
                      <div class="col-6">: <?= date("d-m-Y", strtotime($pembayaran->user()->created_at)); ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view("footers/style1.php"); ?>
      </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="tolak">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Berikan Alasan Penolakan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="post">

            <div class="modal-body">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Alasan Penolakan</label>
                <textarea class="form-control" name="alasan" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>

        </div>
      </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="container">
            <center>
              <img src="<?= $pembayaran->getTakeBuktiPembayaran(); ?>" alt="" class="img-cursor-out" data-dismiss="modal" aria-label="Close">
            </center>

          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view($thema_load . "partials/_js_files.php"); ?>
  <script>
    $("#changePhoto").click(function() {
      $('input#imagechange').click();
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#changePhoto').find('.img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $('input#imagechange').change(function() {
      readURL(this);
    });
  </script>
</body>

</html>