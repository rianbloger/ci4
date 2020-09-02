<?php echo $this->extend('layout/template') ?>
<?php echo $this->section('content') ?>
<link rel="stylesheet" href="<?=base_url() ?>/css/style.css">
<div class="page-title">
    <div class="title_left">
        <h3>Form <small>tambah data komik</small></h3>
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
<div class="row">
    <div class="col-8">
        <form action="/komik/save" method="post">
            <?= csrf_field() ?>
            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ; ?>"  value="<?=old('judul') ?>" id="judul"  autofocus name="judul">
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul') ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  id="penulis" name="penulis" value="<?=old('penulis') ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?=old('penerbit') ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="sampul" name="sampul" value="<?=old('sampul') ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Tambah data</button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php echo $this->endSection() ?>