<header id="header">


  <div class="container">

    <div class="logo float-left">
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="text-light"><a href="#intro" class="scrollto"><span>Sahampreneur</span></a></h1> -->
      <a href="#header" class="scrollto"><img src="/assets/img/logo/sahampreneur.png" alt="" class="img-fluid" style="padding: 0;margin-top: -20px;max-height: 91px;"></a>
    </div>

    <nav class="main-nav float-right d-none d-lg-block">
      <ul>
        <li class="active"><a href="#intro">Beranda</a></li>
        <li><a href="#about">Tentang Kami</a></li>
        <li class="drop-down"><a href="#services">Video Saham</a>
          <ul>
            <li><a href="#">Video (mengarahkan ke halaman baru)</a></li>
            <li><a href="#">Kalkulator (mengarahkan ke halaman baru)</a></li>
          </ul>
        </li>
        <li><a href="#team">Tim</a></li>
        <li><a href="#footer">Hubungi Kami</a></li>
        <?php if (is_login()) : ?>
          <li> <a href="#"> <?= user()->name; ?></a></li>
          <li>
            <form action="auth/logout" method="post"><button type="submit" class="btn btn-danger p-2">Logout</button></form>
          </li>
        <?php else : ?>
          <li><a href="/login/user">Login</a></li>
          <li><a href="/register/user">Register</a></li>
        <?php endif; ?>
      </ul>
    </nav><!-- .main-nav -->

  </div>
</header><!-- #header -->