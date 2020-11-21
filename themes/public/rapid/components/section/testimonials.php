  <!--==========================
      Clients Section
    ============================-->
  <section id="testimonials">
    <div class="container">

      <header class="section-header">
        <h3>Testimoni</h3>
        <h4 class="text-center">Beberepa Testimonial Dari Client Kami </h4>
      </header>

      <div class="row justify-content-center">
        <div class="col-lg-8">

          <div class="owl-carousel testimonials-carousel wow fadeInUp">
            <?php foreach ($testimonials as $testimonial) : ?>
              <div class="testimonial-item">
                <img src="<?= base_url("assets/img/" . ($testimonial->foto ? 'testimonial/' . $testimonial->foto : 'profile/' . $testimonial->user()->profile)); ?>" class="testimonial-img" alt="">
                <h3><?= $testimonial->user()->name; ?></h3>
                <!-- <h4>Ceo &amp; Founder</h4> -->
                <p>
                  <?= $testimonial->keterangan; ?>
                </p>
              </div>
            <?php endforeach; ?>

          </div>

        </div>
      </div>


    </div>
  </section><!-- #testimonials -->