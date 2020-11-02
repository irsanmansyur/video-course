<!--Card-->
<div class="card">
  <!--Card image-->
  <testimonial class="img-fluid testimonial-here" controls playsinline muted loop>
    <source src="<?= base_url("assets/testimonial/{$testimonial->file}"); ?>" type="testimonial/mp4">
  </testimonial>
  <!--Card content-->
  <div class="card-body">
    <!--Title-->
    <h4 class="card-title"><?= $testimonial->title; ?></h4>
    <!--Text-->
    <p class="card-text"><?= $testimonial->description; ?></p>
    <?php if (!isset($testimonial)) : ?>
      <b>Testimonial : </b> <a href="<?= base_url("admin/testimonial/testimonial/{$testimonial->testimonial()->id}"); ?>" class="badge badge-primary"><?= $testimonial->testimonial()->name; ?></a>
    <?php endif; ?>
  </div>
  <div class="card-footer">
    <a href="<?= base_url("admin/testimonial/edit/{$testimonial->id}" . (isset($testimonial) && $testimonial ? "/{$testimonial->id}" : '')); ?>" class="btn btn-secondary">Edit</a>
    <a href="<?= base_url("admin/testimonial/delete/{$testimonial->id}"); ?>" class="delete btn btn-danger">Delete</a>
  </div>
</div>
<!--/.Card-->