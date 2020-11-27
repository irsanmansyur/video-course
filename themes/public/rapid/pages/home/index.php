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
  <section id="intro" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
        <div class="col-md-6 intro-info order-md-first order-last">

          <!-- <h2>Rapid Solutions<br>for Your <span>Business!</span></h2> -->
          <h2>SAHAMPRENEUR</h2>
          <h5>“Kasih dia seekor ikan, dia bisa makan untuk sehari. Ajari dia cara memancing dan dia bisa makan untuk seumur hidup.”</h5>
          <div>
            <?php if (!is_login()) : ?>
              <a href="#about" class="btn-get-started scrollto">Registrasi</a>
            <?php endif; ?>
          </div>
        </div>

        <div class="col-md-6 intro-img order-md-last order-first">
          <img src="<?= base_url("assets/img/sahampre.jpg"); ?>" alt="" class="img-fluid" style="-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.14);-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.14);box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.14);">
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">



    <?php $this->load->view($thema_load . "components/section/about.php"); ?>


    <?php $this->load->view($thema_load . "components/section/why-us.php"); ?>

    <?php $this->load->view($thema_load . "components/section/video-saham.php"); ?>


    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Kalkulator Saham</h3>
            <p class="cta-text">Klik disini untuk menghitung saham kamu! .</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="<?= base_url("kalkulator"); ?>">Klik Disini</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->





    <?php $this->load->view($thema_load . "components/section/testimonials.php"); ?>
    <?php $this->load->view($thema_load . "components/section/admin.php"); ?>
    <?php $this->load->view($thema_load . "components/section/asked.php"); ?>
  </main>



  <?php $this->load->view($thema_load . "components/footer.php"); ?>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <div id="preloader"></div>

  <?php $this->load->view($thema_load . "components/js_library.php"); ?>

</body>

</html>