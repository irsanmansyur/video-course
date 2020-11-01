<div class="form-group">
  <label for="name">Nama Kategori</label>
  <input class="form-control" id="name" placeholder="Enter name Kategori" name="name" value="<?= set_value("name", null) ?? $kategori->name ?>">
  <?= form_error("name", "<div class='danger text-danger'>", "</div>"); ?>
</div>
<div class="form-group">
  <label for="keterangan">Keterangan Kategori</label>
  <input class="form-control" id="keterangan" placeholder="Enter Keterangan Kategori" name="keterangan" value="<?= set_value("keterangan", null) ?? $kategori->keterangan ?>">
  <?= form_error("keterangan", "<div class='danger text-danger'>", "</div>"); ?>
</div>
<div class="form-group">
  <label for="no_urut">No Urut Kategori</label>
  <input type="number" class="form-control" id="no_urut" placeholder="Enter No Urut Kategori" name="no_urut" value="<?= set_value("no_urut", null) ?? $kategori->no_urut ?>">
  <?= form_error("no_urut", "<div class='danger text-danger'>", "</div>"); ?>
</div>
<div class="form-group">
  <div class="form-group form-group-default">
    <h3>Ganti Gambar (Klik gambar di bawah)</h3>
    <div class="card-avatar">
      <input type="file" name="gambar" id="imagechange" class="d-none">
      <a href="#pablo" id="changePhoto">
        <img class="img thumbnail rounded-circle" style="width: 100px;height:100px;" src="<?= base_url("assets/img/kategori/" . ($kategori->image ?? "default.jpg")); ?>">
      </a>
    </div>
    <?= $this->session->flashdata("image"); ?>
  </div>
</div>