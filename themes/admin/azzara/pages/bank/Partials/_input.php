<div class="form-group">
  <label for="rek">Bank Bank</label>
  <input class="form-control" id="rek" placeholder="Enter Bank Bank" name="rek" value="<?= set_value("rek", null) ?? $bank->rek ?>">
  <?= form_error("rek", "<div class='danger text-danger'>", "</div>"); ?>
</div>
<div class="form-group">
  <label for="name">Nama Pemilik Rekening</label>
  <input class="form-control" id="name" placeholder="Enter Bank Bank" name="name" value="<?= set_value("name", null) ?? $bank->name ?>">
  <?= form_error("name", "<div class='danger text-danger'>", "</div>"); ?>
</div>

<div class="form-group">
  <div class="form-group form-group-default">
    <h3>Ganti Gambar (Klik gambar di bawah)</h3>
    <div class="card-avatar">
      <input type="file" name="gambar" id="imagechange" class="d-none">
      <a href="#pablo" id="changePhoto">
        <img class="img thumbnail rounded-circle" style="width: 100px;height:100px;" src="<?= base_url("assets/img/bank/" . ($bank->image ?? "default.jpg")); ?>">
      </a>
    </div>
    <?= $this->session->flashdata("image"); ?>
  </div>
</div>