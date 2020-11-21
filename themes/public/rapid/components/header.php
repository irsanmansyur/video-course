<header id="header">


  <div class="container">

    <div class="logo float-left">
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="text-light"><a href="#intro" class="scrollto"><span>Sahampreneur</span></a></h1> -->
      <a href="#header" class="scrollto"><img src="/assets/img/logo/sahampreneur.png" alt="" class="img-fluid" style="padding: 0;margin-top: -20px;max-height: 91px;"></a>
    </div>

    <nav class="main-nav float-right d-none d-lg-block">
      <ul>
        <li class="active"><a href="<?= base_url(); ?>">Beranda</a></li>
        <?php if (current_url() != base_url()) : ?>
          <li><a href="<?= base_url(); ?>#about">Tentang Kami</a></li>
          <li class="drop-down"><a href="#services">Video Saham</a>
            <ul>
              <li><a href="<?= base_url("video"); ?>">Video</a></li>
              <li><a href="<?= base_url("kalkulator"); ?>">Kalkulator</a></li>
            </ul>
          </li>
          <li><a href="<?= base_url(); ?>#team">Tim</a></li>
          <li><a href="#footer">Hubungi Kami</a></li>
          <?php if (is_login()) : ?>
            <li> <a href="<?= base_url("profile"); ?>"> <?= user()->name; ?></a></li>
            <li>
              <form action="auth/logout" method="post"><button type="submit" class="btn btn-danger p-2">Logout</button></form>
            </li>
          <?php else : ?>
            <li><a href="auth/login">Login</a></li>
            <li><a href="/register/user">Register</a></li>
          <?php endif; ?>
        <?php else :; ?>
          <li><a href="#about">Tentang Kami</a></li>
          <li class="drop-down"><a href="#services">Video Saham</a>
            <ul>
              <li><a href="<?= base_url("video"); ?>">Video</a></li>
              <li><a href="<?= base_url("kalkulator"); ?>">Kalkulator</a></li>
            </ul>
          </li>
          <li><a href="#team">Tim</a></li>
          <li><a href="#footer">Hubungi Kami</a></li>
          <?php if (is_login()) : ?>
            <li> <a href="<?= base_url("profile"); ?>"> <?= user()->name; ?></a></li>
            <li>
              <form action="auth/logout" method="post"><button type="submit" class="btn btn-danger p-2">Logout</button></form>
            </li>
          <?php else : ?>
            <li><a href="auth/login">Login</a></li>
            <li><a href="/register/user">Register</a></li>
          <?php endif; ?>
        <?php endif; ?>

      </ul>
    </nav><!-- .main-nav -->

  </div>
</header><!-- #header -->