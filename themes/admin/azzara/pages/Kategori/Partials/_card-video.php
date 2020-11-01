<!--Card-->
<div class="card">
  <!--Card image-->
  <kategori class="img-fluid kategori-here" controls playsinline muted loop>
    <source src="<?= base_url("assets/kategori/{$kategori->file}"); ?>" type="kategori/mp4">
  </kategori>
  <!--Card content-->
  <div class="card-body">
    <!--Title-->
    <h4 class="card-title"><?= $kategori->title; ?></h4>
    <!--Text-->
    <p class="card-text"><?= $kategori->description; ?></p>
    <?php if (!isset($kategori)) : ?>
      <b>Kategori : </b> <a href="<?= base_url("admin/kategori/kategori/{$kategori->kategori()->id}"); ?>" class="badge badge-primary"><?= $kategori->kategori()->name; ?></a>
    <?php endif; ?>
  </div>
  <div class="card-footer">
    <a href="<?= base_url("admin/kategori/edit/{$kategori->id}" . (isset($kategori) && $kategori ? "/{$kategori->id}" : '')); ?>" class="btn btn-secondary">Edit</a>
    <a href="<?= base_url("admin/kategori/delete/{$kategori->id}"); ?>" class="delete btn btn-danger">Delete</a>
  </div>
</div>
<!--/.Card-->