<?php echo $this->extend('layout/template') ?>
<?php echo $this->section('content') ?>
<?php
if($validation->hasError('sampul')){
    d($validation->getError('sampul'));
}
?>
    <link rel="stylesheet" href="<?=base_url() ?>/css/style.css">
    <div class="page-title">
        <div class="title_left">
            <h3>Form <small>ubah data komik</small></h3>
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
            <form action="/komik/update/<?=$komik['id'] ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ; ?>"
                               value="<?=(old('judul'))? old('judul') : $komik['judul'] ?>" id="judul"  autofocus name="judul">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  id="penulis" name="penulis"
                               value="<?=(old('penulis'))? old('penulis') : $komik['penulis'] ?>"  >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" name="penerbit"
                               value="<?=(old('penerbit'))? old('penerbit') :$komik['penerbit'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/<?=$komik['sampul'] ?>" alt="" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-fi le-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : '' ; ?>"
                                   id="sampul" name="sampul" onchange="previewaimg()">
                            <label class="custom-file-label" for="sampul"><?=$komik['sampul'] ?></label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul') ?>
                            </div>
                        </div>
<!--                        <input type="text" class="form-control" id="sampul" name="sampul"-->
<!--                               value="--><?//=(old('sampul'))? old('sampul') :$komik['sampul'] ?><!--">-->
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="hidden" value="<?=$komik['slug'] ?>" name="slug">
                        <input type="hidden" value="<?=$komik['sampul'] ?>" name="sampulLama">
                        <button type="submit" class="btn btn-primary">Ubah data</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script>
        function previewaimg(){
            const sampul = document.querySelector('#sampul');
            const samplulLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            samplulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function (e){
                imgPreview.src = e.target.result;
            }
        }

    </script>

<?php echo $this->endSection() ?>