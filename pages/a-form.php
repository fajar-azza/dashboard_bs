<div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form Anggota</h4>
        <?php 
            if(isset($_SESSION['msg']['error'])){
                echo '
                    <div class="alert alert-danger" role="alert">
                        '.$_SESSION['msg']['error'].'
                    </div>
                ';
            }

            if(isset($_SESSION['msg']['success'])){
                echo '
                    <div class="alert alert-success" role="alert">
                        '.$_SESSION['msg']['success'].'
                    </div>
                ';
            }
        ?>

        <form class="form-sample" action="pages/fungsi_anggota/a_input.php" method="post">
          <p class="card-description">
            Registrasi Anggota Baru
          </p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">NIK</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="nik" name="nik_a"/>
                  <?php 
                      if(isset($_SESSION['msg']['err_nik'])){
                          echo '<span class="text-danger">'.$_SESSION['msg']['err_nik'].'</span>';
                      }
                  ?>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="nama" name="nama_a"/>
                  <?php 
                      if(isset($_SESSION['msg']['err_nama'])){
                          echo '<span class="text-danger">'.$_SESSION['msg']['err_nama'].'</span>';
                      }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">No Hp</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="no.hp" name="nohp_a"/>
                  <?php 
                      if(isset($_SESSION['msg']['err_nohp'])){
                          echo '<span class="text-danger">'.$_SESSION['msg']['err_nohp'].'</span>';
                      }
                  ?>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">email</label>
                <div class="col-sm-6">
                  <input type="email" class="form-control" placeholder="@example.com" name="email_a"/>
                  <?php 
                      if(isset($_SESSION['msg']['err_email'])){
                          echo '<span class="text-danger">'.$_SESSION['msg']['err_email'].'</span>';
                      }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="alamat" name="alamat_a"/>
                  <?php 
                      if(isset($_SESSION['msg']['err_alamat'])){
                          echo '<span class="text-danger">'.$_SESSION['msg']['err_alamat'].'</span>';
                      }
                  ?>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto</label>
                
                <div class="col-sm-5">
                    <input type="file" name="foto_a" class="file-upload-default">
                    <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                      <?php 
                      if(isset($_SESSION['msg']['err_nik'])){
                          echo '<span class="text-danger">'.$_SESSION['msg']['err_nik'].'</span>';
                      }
                  ?>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-end">
              <button type="submit" name="btn-submit" class="btn btn-primary me-2" >Submit</button>
          </div> 
        </form>
      </div>
    </div>
  </div>
  <?php 
unset($_SESSION['msg']);
?>  