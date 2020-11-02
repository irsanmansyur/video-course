<div class="form-group">
  <label for="user_id">Nama User</label>
  <select class="form-control" name="user_id" id="user_id">
    <option value="">Select user</option>
    <?php foreach ($users as $user) : ?>
      <option value="<?= $user->id; ?>" <?= set_value("user_id") ==  $user->id ? " selected" : ($testimonial->user_id ==  $user->id ? " selected" : ''); ?>><?= $user->name; ?></option>
    <?php endforeach; ?>
  </select>
  <?= form_error("user_id", "<div class='danger text-danger'>", "</div>"); ?>
</div>
<div class="form-group">
  <label for="keterangan">Keterangan Testimonial</label>
  <input class="form-control" id="keterangan" placeholder="Enter Keterangan Testimonial" name="keterangan" value="<?= set_value("keterangan", null) ?? $testimonial->keterangan ?>">
  <?= form_error("keterangan", "<div class='danger text-danger'>", "</div>"); ?>
</div>
<!-- 
<div class="form-group">
  <div class="form-group form-group-default">
    <h3>Ganti Gambar (Klik gambar di bawah)</h3>
    <div class="card-avatar">
      <input type="file" name="gambar" id="imagechange" class="d-none">
      <a href="#pablo" id="changePhoto">
        <img class="img thumbnail rounded-circle" style="width: 100px;height:100px;" src="<?= base_url("assets/img/testimonial/" . ($testimonial->image ?? "default.jpg")); ?>">
      </a>
    </div>
    <?= $this->session->flashdata("image"); ?>
  </div>
</div> -->