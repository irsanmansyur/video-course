<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>RegistrationForm_v1 by Colorlib</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- MATERIAL DESIGN ICONIC FONT -->
  <link rel="stylesheet" href="<?= $thema_folder; ?>assets/auth/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

  <!-- STYLE CSS -->
  <link rel="stylesheet" href="/assets/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $thema_folder; ?>assets/auth/css/style.css">
</head>

<body>

  <div class="wrapper" style="background-image: url('<?= $thema_folder; ?>assets/auth/images/bg-registration-form-1.jpg');">
    <div class="inner">
      <div class="image-holder">
        <img src="<?= $thema_folder; ?>assets/auth/images/registration-form-1.jpg" alt="">
      </div>
      <form method="post">
        <h3>Registration Form</h3>
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
        <div class="form-wrapper" style="margin-bottom: 25px;">
          <select name="jkl" id="" class="form-control" style="margin-bottom: 5px;">
            <option value="" disabled selected>Gender</option>
            <option value="Laki - Laki" <?= set_value('jkl') == "Laki - Laki" ? "selected" : ''; ?>>Laki - Laki</option>
            <option value="Perempuan" <?= set_value('jkl') == "Perempuan" ? "selected" : ''; ?>>Perempuan</option>
            <option value="">Lainya</option>
          </select>
          <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
          <?= form_error("jkl", "<div class='text-danger'>", "</div>"); ?>

        </div>
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
        <div class="form-wrapper" style="margin-bottom: 25px;">
          <span class="text-dark">Do You have Code Referal..? Insert Here / Empty or not</span>
          <input style="margin-bottom: 5px;" name="codeReferal" value="<?= set_value('codeReferal') ?>" placeholder="Code Referal" class="form-control">
          <i class="zmdi zmdi-lock"></i>
          <?= form_error("codeReferal", "<div class='text-danger'>", "</div>"); ?>
        </div>

        <button type="submit">Register
          <i class="zmdi zmdi-arrow-right"></i>
        </button>
      </form>
    </div>
  </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>