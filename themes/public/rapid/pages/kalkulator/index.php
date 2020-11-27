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

  <main id="main" class='min-vh-100 pt-5 my-5'>
    <div class="container mt-5 pt-5">
      <nav class="mb-3">
        <div class="nav nav-tabs" id="nav-tab" role="tablist" style="font-weight: bold;">
          <a class="nav-item nav-link <?= $active == 'intrinsic_value' ? "active" : ''; ?>" id="nav-intrinsic_value-tab" data-toggle="tab" href="#nav-intrinsic_value" role="tab" aria-controls="nav-intrinsic_value" aria-selected="true">Intrinsic Value</a>
          <a class="nav-item nav-link <?= $active == 'cagr' ? "active" : ''; ?>" id="nav-cagr-tab" data-toggle="tab" href="#nav-cagr" role="tab" aria-controls="nav-cagr" aria-selected="false">CAGR</a>
          <a class="nav-item nav-link" id="nav-panduan-tab" data-toggle="tab" href="#nav-panduan" role="tab" aria-controls="nav-panduan" aria-selected="false">Panduan</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade <?= $active == "intrinsic_value" ? "show active" : ''; ?>" id="nav-intrinsic_value" role="tabpanel" aria-labelledby="nav-home-tab">
          <?php $this->load->view($thema_load . "pages/kalkulator/partials/intrinsic-value.php"); ?>
        </div>
        <div class="tab-pane fade <?= $active == "cagr" ? "show active" : ''; ?>" id="nav-cagr" role="tabpanel" aria-labelledby="nav-cagr-tab">
          <?php $this->load->view($thema_load . "pages/kalkulator/partials/cagr.php"); ?>
        </div>
        <div class="tab-pane fade" id="nav-panduan" role="tabpanel" aria-labelledby="nav-panduan-tab">
          <div class="min-vh-100">
            <iframe src="https://drive.google.com/file/d/1OrkGSNyQZV8ckzNWFb236Robdlcg7bGZ/preview" style="width:100%;min-height:70vh" frameborder="0"></iframe>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php $this->load->view($thema_load . "components/footer.php"); ?>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <div id="preloader"></div>

  <?php $this->load->view($thema_load . "components/js_library.php"); ?>
  <script src="<?= $thema_folder . "pages/video/partials/main.js"; ?>"></script>

  <script>
    let navItems = document.querySelectorAll(".nav-item");
    [...navItems].forEach(navItem => {
      if (window.location.href == navItem.getAttribute("href")) {

      }
    });
  </script>
</body>

</html>