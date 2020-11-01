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
            <h4 class="page-title">Dashboard</h4>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="row">
                <div class="col-sm-6 col-md-4">
                  <div class="card card-stats card-round">
                    <div class="card-body ">
                      <div class="row align-items-center">
                        <div class="col-icon">
                          <div class="icon-big text-center icon-primary bubble-shadow-small">
                            <i class="fas fa-users"></i>
                          </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                          <div class="numbers">
                            <p class="card-category">Users</p>
                            <h4 class="card-title"><?= $count_users ?></h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="card card-stats card-round">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-icon">
                          <div class="icon-big text-center icon-secondary bubble-shadow-small">
                            <i class="far fa-check-circle"></i>
                          </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                          <div class="numbers">
                            <p class="card-category">Kategori Video</p>
                            <h4 class="card-title"><?= $count_kategori; ?></h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="card card-stats card-round">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-icon">
                          <div class="icon-big text-center icon-info bubble-shadow-small">
                            <i class="far fa-newspaper"></i>
                          </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                          <div class="numbers">
                            <p class="card-category">Video</p>
                            <h4 class="card-title"><?= $count_video; ?></h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <?php $this->load->view($thema_load . 'partials/_card_profile.php');; ?>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Custom template | don't include it in your project! -->
    <div class="custom-template">
      <div class="title">Settings</div>
      <div class="custom-content">
        <div class="switcher">
          <div class="switch-block">
            <h4>Topbar</h4>
            <div class="btnSwitch">
              <button type="button" class="changeMainHeaderColor" data-color="blue"></button>
              <button type="button" class="selected changeMainHeaderColor" data-color="purple"></button>
              <button type="button" class="changeMainHeaderColor" data-color="light-blue"></button>
              <button type="button" class="changeMainHeaderColor" data-color="green"></button>
              <button type="button" class="changeMainHeaderColor" data-color="orange"></button>
              <button type="button" class="changeMainHeaderColor" data-color="red"></button>
            </div>
          </div>
          <div class="switch-block">
            <h4>Background</h4>
            <div class="btnSwitch">
              <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
              <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
              <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
            </div>
          </div>
        </div>
      </div>
      <div class="custom-toggle">
        <i class="flaticon-settings"></i>
      </div>
    </div>
    <!-- End Custom template -->
  </div>
  <?php $this->load->view($thema_load . "partials/_js_files.php"); ?>


</body>

</html>