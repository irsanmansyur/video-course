<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view($thema_load . "partials/_head.php"); ?>

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
              <li class="nav-item active">
                <a href="#">Laporan Mobil</a>
              </li>
            </ul>
          </div>
          <div class="card">
            <div class="card-header  d-flex justify-content-between">
              <div class="card-title"><?= $page_title; ?></div>
              <a href="<?= base_url('admin/video/tambah' . (isset($kategori) && $kategori ? "/{$kategori->id}" : '')); ?>" class="btn btn-primary">Tambah</a>
            </div>
            <div class="card-body">
              <div class="row">
                <?php foreach ($videos as $video) :
                  $video->kategori(); ?>
                  <div class="col-md-4 key_me">
                    <?php $this->load->view($thema_load . "pages/video/partials/_card-video.php", compact("video")); ?>
                  </div>
                <?php endforeach; ?>
              </div>
              <?= $pagination; ?>
            </div>
          </div>
        </div>
        <?php $this->load->view("footers/style1.php"); ?>

      </div>
    </div>

  </div>
  <!-- Sweet Alert -->
  <script src="<?= $thema_folder; ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
  <?php $this->load->view($thema_load . "partials/_js_files.php"); ?>
  <script>
    var baseurl = "<?= base_url() ?>";

    [...document.querySelectorAll(".delete")].forEach(del => {
      del.addEventListener('click', e => {
        e.preventDefault();
        swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          buttons: {
            cancel: {
              visible: true,
              text: 'No, cancel!',
              className: 'btn btn-danger'
            },
            confirm: {
              text: 'Yes, delete it!',
              className: 'btn btn-success'
            }
          }
        }).then((willDelete) => {
          if (willDelete) {
            let url = del.getAttribute('href');
            fetch(url, {
              method: "post"
            }).then(res => res.json()).then(res => {
              res.status && del.closest(".key_me").remove();
              swal(res.message, {
                buttons: {
                  confirm: {
                    className: `btn btn-${res.status ? "success" : "danger"}`
                  }
                }
              });
            })
          } else {
            swal("tidak jadi menghapus!", {
              buttons: {
                confirm: {
                  className: 'btn btn-success'
                }
              }
            });
          }
        });

      })
    });
  </script>

</body>

</html>