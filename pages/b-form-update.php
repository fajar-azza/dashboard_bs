<?php 
$kode = $_REQUEST['kode_b'];
include('assets/koneksi.php');
$query = "SELECT * FROM buku WHERE kode_b='$kode'";
$q = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($q);
?>

<div class="col-12 grid-margin">
    <div class="card" >
      <div class="card-body">
        <h4 class="card-title">Form Pengisian Buku</h4>
        <?php 
              if(isset($_SESSION['msg']['error'])){
                  echo '
                      <div class="alert alert-danger" role="alert">
                          '.$_SESSION['msg']['error'].'
                      </div>
                  ';
              }
          ?>
        <form action="pages/fungsi_buku/b-update.php" method="post" enctype="multipart/form-data">

          <div class="row">

            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Kode</label>  
                <input readonly value="<?= $data['kode_b'] ?>" type="text" class="form-control" placeholder="kode" name="kode_b"/>
              
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">judul</label>
                <div class="size">
                  <input value="<?= $data['judul_b'] ?>" type="text" class="form-control" placeholder="judul" name="judul_b"/>
                  <?php 
                  if(isset($_SESSION['msg']['err_judul'])){
                      echo '<span class="text-danger">'.$_SESSION['msg']['err_judul'].'</span>';
                  }
               ?>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Kategori</label>
                <div class="form-group">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <select class="form-select form-select" name="kategori_b" >
                          <option >--Pilih Kategori--</option>
                        <?php 
                              include('assets/koneksi.php');
                              $query = "SELECT * FROM kategori";
                              $q = mysqli_query($koneksi, $query);
                              $no = 1;
                              while ($data_k = mysqli_fetch_array($q)) {
                          ?>
                          <option value="<?=$data_k['kode_k']?>">
                            <?=$data_k['nama_k']?>
                          </option>
                          
                          <?php
                              }
                          ?>
                        </select>
                        <?php 
                            if(isset($_SESSION['msg']['err_kat'])){
                                echo '<span class="text-danger">'.$_SESSION['msg']['err_kat'].'</span>';
                            }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
       
          <div class="row">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">ISBN</label>  
                <input value="<?= $data['isbn_b'] ?>" type="text" class="form-control" placeholder="isbn" name="isbn_b"/>
                
                <?php 
                  if(isset($_SESSION['msg']['err_isbn'])){
                      echo '<span class="text-danger">'.$_SESSION['msg']['err_isbn'].'</span>';
                  }
              ?>
              </div>
              
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Penulis</label>
                <div class="size">
                  <input value="<?= $data['penulis_b'] ?>" type="text" class="form-control" placeholder="Penulis" name="penulis_b"/>
                  <?php 
                  if(isset($_SESSION['msg']['err_penulis'])){
                      echo '<span class="text-danger">'.$_SESSION['msg']['err_penulis'].'</span>';
                  }
              ?>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Penerbit</label>
                <div class="form-group">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <div class="col-sm-9">
                        <select class="form-select form-select" name="penerbit_b">
                          <option>penerbit</option>
                          <?php 
                              include('assets/koneksi.php');
                              $query = "SELECT * FROM penerbit";
                              $q = mysqli_query($koneksi, $query);
                              $no = 1;
                              while ($data_k = mysqli_fetch_array($q)) {
                          ?>
                          <option value="<?=$data_k['kode_p']?>">
                            <?=$data_k['nama_p']?>
                          </option>
                          
                          <?php
                              }
                          ?>
                        </select>
                        <?php 
                            if(isset($_SESSION['msg']['err_penerbit'])){
                                echo '<span class="text-danger">'.$_SESSION['msg']['err_penerbit'].'</span>';
                            }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tahun</label>  
                <input value="<?= $data['tahun'] ?>" type="text" class="form-control" placeholder="tahun" name="tahun_b"/>
                <?php 
                  if(isset($_SESSION['msg']['err_tahun'])){
                      echo '<span class="text-danger">'.$_SESSION['msg']['err_tahun'].'</span>';
                  }
              ?>
              </div>
              
            </div>
            <div class="col-md-4">  
              <div class="form-group row">
              <label class="col-sm-3 col-form-label">Cover</label>
              <div class="col-sm-10">
                    <input type="file" name="cover_b" class="file-upload-default" value="<?= $data['penulis_b'] ?>">
                    <div class="input-group col-xs-10">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                    <?php 
                  if(isset($_SESSION['msg']['err_cover'])){
                      echo '<span class="text-danger">'.$_SESSION['msg']['err_cover'].'</span>';
                  }
              ?>
                </div>

              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Bahasa</label>
                <div class="form-group">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <div class="col-sm-9">
                        <select class="form-select form-select" name="bahasa_b">
                          <option name='bahasa'>Pilih-Bahasa</option>
                          <option >Bahasa Indonesia</option>
                          <option >Bahasa Inggris</option>
                          <?php 
                              if(isset($_SESSION['msg']['err_bahasa'])){
                                  echo '<span class="text-danger">'.$_SESSION['msg']['err_bahasa'].'</span>';
                              }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleTextarea1">Sipnosis</label>
            <textarea value="<?= $data['tahun'] ?>" class="form-control" id="exampleTextarea1" rows="6" name="sinopsis_b" ></textarea>
            <?php 
                  if(isset($_SESSION['msg']['err_sinopsis'])){
                      echo '<span class="text-danger">'.$_SESSION['msg']['err_sinopsis'].'</span>';
                  }
              ?>
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