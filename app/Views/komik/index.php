<?php echo $this->extend('layout/template') ?>
<?php echo $this->section('content') ?>

<div class="page-title">
              <div class="title_left">
                <h3>Komik <small></small></h3>
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

<div class="row" >
<div class="col-md-12 col-sm-12" >
<div class="x_panel tile ">
            <div class="x_title">
                <h2>Daftar komik</h2>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Sampul</th>
                          <th>Judul</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td><img src="" alt=""></td>
                          <td>Naruto</td>
                          <td><a href="" class="btn btn-success">Detail</a></td>
                        </tr>
                       
                      </tbody>
                    </table>
            </div>
        </div>

</div>
</div>

<?php echo $this->endSection() ?>