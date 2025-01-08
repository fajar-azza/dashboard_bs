<?php 
$nik = $_REQUEST['nik_a'];
include('assets/koneksi.php');
$query = "SELECT * FROM anggota WHERE nik_a='$nik'";
$q = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($q);
?>
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Form Update Data Anggota</h4>

      <form class="form-sample" action="pages/fungsi_anggota/a_update.php" method="post">
        <p class="card-description">
           Data Anggota
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">NIK</label>
              <div class="col-sm-6">
                <input readonly value="<?= $data['nik_a'] ?>" type="text" class="form-control" placeholder="nik" name="nik_a"/>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-6">
                <input value="<?= $data['nama_a'] ?>" type="text" class="form-control" placeholder="nama" name="nama_a"/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">No Hp</label>
              <div class="col-sm-6">
                <input value="<?= $data['nohp_a'] ?>" type="text" class="form-control" placeholder="no.hp" name="nohp_a"/>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">email</label>
              <div class="col-sm-6">
                <input value="<?= $data['email_a'] ?>" type="email" class="form-control" placeholder="@example.com" name="email_a"/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-6">
                <input value="<?= $data['alamat_a'] ?>" type="text" class="form-control" placeholder="alamat" name="alamat_a"/>
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