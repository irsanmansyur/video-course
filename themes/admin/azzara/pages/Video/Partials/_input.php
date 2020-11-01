<div class="form-group">
  <label for="kategori_id">Kategori Video</label>
  <?php if (isset($kategori) && $kategori) : ?>
    <input hidden value="<?= $kategori->id; ?>" name="kategori_id">
    <input readonly value="<?= $kategori->name; ?>" class="form-control" />
  <?php else :; ?>
    <select class="form-control" name="kategori_id" id="kategori_id">
      <option value="">Select Kategori</option>
      <?php foreach ($kategories as $kategori) : ?>
        <option value="<?= $kategori->id; ?>" <?= set_value("kategori_id") ==  $kategori->id ? " selected" : ($video->kategori_id ==  $kategori->id ? " selected" : ''); ?>><?= $kategori->name; ?></option>
      <?php endforeach; ?>
    </select>
  <?php endif; ?>
  <?= form_error("kategori_id", "<div class='danger text-danger'>", "</div>"); ?>

</div>
<div class="form-group">
  <label for="title">Title Video</label>
  <input class="form-control" id="title" placeholder="Enter name Video" name="title" value="<?= set_value("title", null) ?? $video->title ?>">
  <?= form_error("title", "<div class='danger text-danger'>", "</div>"); ?>
</div>
<div class="form-group">
  <label for="description">Keterangan Video</label>
  <input class="form-control" id="description" placeholder="Enter Keterangan Video" name="description" value="<?= set_value("description", null) ?? $video->description ?>">
  <?= form_error("description", "<div class='danger text-danger'>", "</div>"); ?>
</div>
<div class="form-group">
  <label for="no_urut">No Urut Video</label>
  <input type="number" class="form-control" id="no_urut" placeholder="Enter No Urut Video" name="no_urut" value="<?= set_value("no_urut", null) ?? $video->no_urut ?>">
  <?= form_error("no_urut", "<div class='danger text-danger'>", "</div>"); ?>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-5">
      <video class="img-fluid video-here" controls playsinline muted loop>
        <source src="<?= base_url("assets/video/{$video->file}"); ?>" type="video/mp4">
      </video>
    </div>
    <div class="col-md-7">
      <input type="file" name="video" class="change-video" id="customFile">
      <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
  </div>
  <?= $this->session->flashdata("video"); ?>
</div>