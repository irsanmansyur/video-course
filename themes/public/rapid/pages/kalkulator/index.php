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

  <main id="main" class='vh-100'>
    <div class="container mt-5 pt-5">
      <div class="row">
        <div class="col-md-7">
          <div class="card ">
            <div class="card-body">
              <div class="table-responsive-xl">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Name of Stock</td>
                      <td>:</td>
                      <td><input type="text" class="form-control"></td>
                    </tr>

                    <tr>
                      <td>Stock Symbol</td>
                      <td>:</td>
                      <td><input type="text" class="form-control"></td>
                    </tr>

                    <tr>
                      <td>Operoting Cash Flow (Current)</td>
                      <td>:</td>
                      <td><input type="text" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Total Debt (Short Term Debt + Long Tern Debt)</td>
                      <td>:</td>
                      <td><input type="text" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Cash and Short Term Investments</td>
                      <td>:</td>
                      <td><input type="text" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Cash Flow Growth Rate (Year 1 - Year 4</td>
                      <td>:</td>
                      <td><input type="text" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Cash Flow Growth Rate (Year 6 - Year 8</td>
                      <td>:</td>
                      <td><input type="text" class="form-control"></td>
                    </tr>

                    <tr>
                      <td>No. Of Shaes out standing</td>
                      <td>:</td>
                      <td><input type="text" class="form-control"></td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="card ">
            <div class="card-body">
              <div class="table-responsive-xl">
                <table class="table">
                  ...
                </table>
              </div>
            </div>
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

</body>

</html>