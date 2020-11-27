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
                <a href="#">Daftar Masukan User</a>
              </li>
            </ul>
          </div>
          <div class="card">
            <div class="card-header  d-flex justify-content-between">
              <div class="card-title"><?= $page_title; ?></div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="basic-datatables" class="table table-hover display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">nama</th>
                      <th scope="col">Di Kirim Pada</th>
                      <th scope="col">email</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Pesan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($masukans as $masukan) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $masukan->name; ?></td>
                        <td><?= date('d-m-Y', strtotime($masukan->created_at)); ?></td>
                        <td><?= $masukan->email; ?></td>
                        <td><?= $masukan->subject; ?></td>
                        <td><?= $masukan->message; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view($thema_load . "partials/_custom_templates.php"); ?>
  </div>
  <?php $this->load->view($thema_load . "partials/_js_files.php"); ?>
  <!-- Sweet Alert -->
  <script src="<?= $thema_folder; ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
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
            window.location = del.getAttribute('href');
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