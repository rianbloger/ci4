<?=$this->extend('layout/template') ?>
<?=$this->section('content') ?>
<div class="page-title">
    <div class="title_left">
        <h3>Detail komik <small></small></h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <!-- <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div> -->
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="<?=$komik['sampul'] ?>" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $komik['judul']; ?></h5>
                <p class="card-text">Penulis : <?= $komik['penulis']; ?></p>
                <p class="card-text"><small class="text-muted">Penerbit : <?= $komik['penerbit']; ?></small></p>
                <div class="btn btn-info">Update</div>
                <div class="btn btn-danger">Delete</div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection() ?>