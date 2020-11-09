  <!--==========================
      Team Section
    ============================-->
  <section id="team" class="section-bg">
    <div class="container">
      <div class="section-header">
        <h3>Admin Kami</h3>
        <p>Kami selalu siap kapan saja di butuhkan, dengan beberapa admin profesional!</p>
      </div>
      <div class="row justify-content-center">
        <?php foreach ($admins as $admin) : ?>
          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="<?= $admin->takeProfile() ?>" class="img-fluid w-100" style="height: 300px;" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4><?= $admin->name; ?></h4>
                  <span><?= $admin->jabatan ? $admin->jabatan : 'Karyawan'; ?></span>
                  <!-- <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section><!-- #team -->