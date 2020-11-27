<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Form Pendaftaran Klient Sahampreneur</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- MATERIAL DESIGN ICONIC FONT -->
  <link rel="stylesheet" href="<?= $thema_folder; ?>assets/auth/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

  <!-- STYLE CSS -->
  <link rel="stylesheet" href="/assets/bootstrap/bootstrap.min.css">
  <script src="/assets/bootstrap/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="<?= $thema_folder; ?>assets/auth/css/style.css">
</head>

<body>

  <div class="wrapper" style="background-image: url('<?= $thema_folder; ?>assets/auth/images/bg-registration-form-1.jpg');">
    <div class="inner" style="min-height: 
    80vh;position:relative">
      <div class="image-holder d-flex align-items-center" style="min-height: 
    80vh">
        <img src="<?= base_url("assets\img\logo\sahampreneur.png") ?>">
      </div>

      <form method="post" id="formMe">
        <h3>Form pendaftaran</h3>
        <div class="form-group " style=" margin-bottom: 25px;">
          <div class="row">
            <div class="col-6">
              <input type="text" style="width:100%;margin-bottom :3px" name="nama_depan" placeholder="First Name" value="<?= set_value("nama_depan"); ?>" class="form-control">
              <?= form_error("nama_depan", "<div class='text-danger'>", "</div>"); ?>
            </div>
            <div class="col-6">
              <input type="text" style="width:100%;margin-bottom :3px" value="<?= set_value("nama_belakan"); ?>" name="nama_belakan" placeholder="Last Name" class="form-control">
              <?= form_error("nama_belakan", "<div class='text-danger'>", "</div>"); ?>
            </div>
          </div>
        </div>
        <div class="form-wrapper " style="margin-bottom: 25px;">
          <input type="text" style="margin-bottom: 5px;" placeholder="Username" name="username" value="<?= set_value("username"); ?>" class="form-control">
          <i class="zmdi zmdi-account"></i>
          <?= form_error("username", "<div class='text-danger'>", "</div>"); ?>
        </div>
        <div class="form-wrapper" style="margin-bottom: 25px;">
          <input type="text" name="email" value="<?= set_value("email"); ?>" style="margin-bottom: 5px;" placeholder="Email Address" class="form-control">
          <i class="zmdi zmdi-email"></i>
          <?= form_error("email", "<div class='text-danger'>", "</div>"); ?>
        </div>
        <!-- <div class="form-wrapper" style="margin-bottom: 25px;">
          <select name="jkl" id="" class="form-control" style="margin-bottom: 5px;">
            <option value="" disabled selected>Gender</option>
            <option value="Laki - Laki" <?= set_value('jkl') == "Laki - Laki" ? "selected" : ''; ?>>Laki - Laki</option>
            <option value="Perempuan" <?= set_value('jkl') == "Perempuan" ? "selected" : ''; ?>>Perempuan</option>
            <option value="">Lainya</option>
          </select>
          <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
          <?= form_error("jkl", "<div class='text-danger'>", "</div>"); ?>
        </div> -->
        <div class="form-wrapper" style="margin-bottom: 25px;">
          <input type="password" style="margin-bottom: 5px;" name="passwordsignin" placeholder="Password" class="form-control">
          <i class="zmdi zmdi-lock"></i>
          <?= form_error("passwordsignin", "<div class='text-danger'>", "</div>"); ?>

        </div>
        <div class="form-wrapper" style="margin-bottom: 25px;">
          <input type="password" style="margin-bottom: 5px;" name="confirmpassword" placeholder="Confirm Password" class="form-control">
          <i class="zmdi zmdi-lock"></i>
          <?= form_error("confirmpassword", "<div class='text-danger'>", "</div>"); ?>
        </div>
        <small class="text-dark">Apakah kamu sudah punya kode referal? Jika ada isi disini</small>
        <div class="form-wrapper" style="margin-bottom: 25px;">
          <input style="margin-bottom: 5px;" name="codeReferal" value="<?= set_value('codeReferal') ?>" placeholder="Kode Referal" class="form-control">
          <i class="zmdi zmdi-lock"></i>
          <?= form_error("codeReferal", "<div class='text-danger'>", "</div>"); ?>
        </div>
        <div class="form-check ">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="accept">
          <label class="form-check-label" id="cekAccept" style="color: black;">Saya setuju dengan <a href="#" data-toggle="modal" data-target="#exampleModalLong">Term and Conditions</a> dan <a href="#" data-toggle="modal" data-target="#exampleModalLongPrivacy">Privacy Policy</a> Sahampreneur.</label>
          <?= form_error("accept", "<div class='text-danger'>", "</div>"); ?>
        </div>
        <button type="submit" id="registerNow">Daftar
          <i class="zmdi zmdi-arrow-right"></i>
        </button>
        <br>
        <span style="margin-top:20px">Sudah Punya akun .? <a href="<?= base_url("auth/login"); ?>">Login</a></span>
      </form>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl h-100" role="document">
      <div class="modal-content  h-75">
        <div class="modal-header" style="justify-content: space-between;">
          <h5 class="modal-title" id="exampleModalLongTitle">Term And Policy</h5>
          <button type="button" style="width:50px;margin:0;background:transparent" name="close_modal" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="font-size:40px;color:black;">&times;</span>
          </button>
        </div>
        <div class="modal-body h-100">
          <iframe src="https://drive.google.com/file/d/1uSTLkKHvYvXoANBMEJNe1zke84KRcz28/preview" style="width:100%;height:100%" frameborder="0"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary noaccept" data-dismiss="modal">Close</button>
          <!-- <button type="button" id="acceptMe" class="btn btn-primary">Accept</button> -->
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLongPrivacy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl h-100" role="document">
      <div class="modal-content  h-75">
        <div class="modal-header" style="justify-content: space-between;">
          <h5 class="modal-title" id="exampleModalLongTitle">Privacy Policy</h5>
          <button type="button" style="width:50px;margin:0;background:transparent" name="close_modal" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="font-size:40px;color:black;">&times;</span>
          </button>
        </div>
        <div class="modal-body h-100">
          <iframe src="https://drive.google.com/file/d/19nws66axlYDZSOjegy0oXBS-S_akyB52/preview" style="width:100%;height:100%" frameborder="0"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary noaccept" data-dismiss="modal">Close</button>
          <!-- <button type="button" id="acceptMe" class="btn btn-primary">Accept</button> -->
        </div>
      </div>
    </div>
  </div>
  <!-- insert just before the closing body tag </body> -->

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>