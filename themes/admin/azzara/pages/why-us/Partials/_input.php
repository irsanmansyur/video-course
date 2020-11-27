<div class="form-group">
  <label for="name">Key Name</label>
  <input class="form-control" id="name" placeholder="Enter Keterangan Testimonial" name="name" value="<?= set_value("name", null) ?? $whyUs->name ?>">
  <?= form_error("name", "<div class='danger text-danger'>", "</div>"); ?>
</div>
<div class="form-group">
  <label for="val">Value Name</label>
  <input class="form-control" id="val" placeholder="Enter Keterangan Testimonial" name="val" value="<?= set_value("val", null) ?? $whyUs->val ?>">
  <?= form_error("val", "<div class='danger text-danger'>", "</div>"); ?>
</div>