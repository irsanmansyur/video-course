<!--Card-->
<div class="card">
  <!--Card image-->
  <video class="img-fluid video-here" controls playsinline muted loop>
    <source src="<?= base_url("assets/video/{$video->file}"); ?>" type="video/mp4">
  </video>
  <!--Card content-->
  <div class="card-body">
    <!--Title-->
    <h4 class="card-title"><?= $video->title; ?></h4>
    <!--Text-->
    <p class="card-text"><?= $video->description; ?></p>
    <?php if (!isset($kategori)) : ?>
      <b>Kategori : </b> <a href="<?= base_url("admin/video/kategori/{$video->kategori()->id}"); ?>" class="badge badge-primary"><?= $video->kategori()->name; ?></a>
    <?php endif; ?>
  </div>
  <div class="card-footer">
    <a href="<?= base_url("admin/video/edit/{$video->id}" . (isset($kategori) && $kategori ? "/{$kategori->id}" : '')); ?>" class="btn btn-secondary">Edit</a>
    <a href="<?= base_url("admin/video/delete/{$video->id}"); ?>" class="delete btn btn-danger">Delete</a>
  </div>
</div>
<!--/.Card-->