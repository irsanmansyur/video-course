<link href="<?= $thema_folder; ?>assets/lib/dropzone-5.7.0/dist/min/dropzone.min.css" rel="stylesheet">
<script src="<?= $thema_folder; ?>assets/lib/dropzone-5.7.0/dist/min/dropzone.min.js"></script>
<script src="<?= $thema_folder; ?>assets/lib/sweetalert/sweetalert.min.js"></script>

<form action="/pembayaran/upload" class="dropzone" id="my-dropzone">
</form>
<center class="mt-2">
  <?php if ($pembayaran) : ?>
    <button id="submit-all" class="btn btn-warning">Ganti Bukti Pembayaran</button>
  <?php else :; ?>
    <button id="submit-all" class="btn btn-primary">Upload Bukti Pembayaran</button>
  <?php endif; ?>
</center>
<div class="dz-preview dz-preview-single w-100 mt-3">
  <div class="dz-preview-cover text-center">
    <?php if ($pembayaran) : ?>
      <img id="dz-preview" class="dz-preview-img" style="min-width: 50%;max-width:90%" src="<?= base_url("assets/img/pembayaran/" . $pembayaran->bukti_pembayaran); ?>" alt="..." data-dz-thumbnail>
    <?php else :; ?>
      <img id="dz-preview" class="dz-preview-img" src="" alt="..." data-dz-thumbnail style="max-width:90%">
    <?php endif; ?>
  </div>
</div>



<script>
  var imgSrc = document.querySelector("#dz-preview");
  var ImgFile = imgSrc ? imgSrc.getAttribute('src') : '';
  Dropzone.options.myDropzone = {
    maxFiles: 1,
    autoProcessQueue: false,
    init: function() {
      var submitButton = document.querySelector("#submit-all")
      myDropzone = this; // closure

      submitButton.addEventListener("click", function() {
        myDropzone.processQueue(); // Tell Dropzone to process all queued files.
      });

      this.on("addedfile", function() {
        // Show submit button here and/or inform user to click it.
      });
      this.on("thumbnail", function(file, dataUrl) {
        ImgFile = dataUrl;
      });
      this.on("success", function(file, responseText) {
        document.querySelector("#dz-preview").setAttribute('src', ImgFile);
        swal("Bukti Transfer Di kirim!", "Silahkan cek Status pembayaran anda dalam max 2X 24 jam!", "success")
          .then((value) => {
            location.reload();
          });;

      });

    }
  };
</script>