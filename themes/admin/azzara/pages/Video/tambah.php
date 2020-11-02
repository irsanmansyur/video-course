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
              <li class="nav-item">

                <a href=<?= base_url('admin/video' . (isset($kategori) && $kategori ? "/kategori/{$kategori->id}" : '')); ?>>Kategori <?= (isset($kategori) && $kategori ? $kategori->name : ''); ?> </a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item active">
                <a href="#">tambah</a>
              </li>
            </ul>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title">Form Tambah data Video</div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <?php $this->load->view($thema_load . "pages/video/partials/_input.php"); ?>
              </div>
              <div class="card-action">
                <button class="btn btn-success" type="submit">Submit</button>
                <button class="btn btn-danger" type="reset">Reset</button>
              </div>
            </form>
          </div>
        </div>
        <?php $this->load->view("footers/style1.php"); ?>

      </div>
    </div>


  </div>
  <?php $this->load->view($thema_load . "partials/_js_files.php"); ?>
  <script>
    $(document).on("change", ".change-video", function(evt) {
      var $source = $('.video-here');
      $source[0].src = URL.createObjectURL(this.files[0]);
      $source.parent()[0].load();
    });
  </script>
</body>

</html>