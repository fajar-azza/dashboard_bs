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

              if(isset($_SESSION['msg']['success'])){
                  echo '
                      <div class="alert alert-success" role="alert">
                          '.$_SESSION['msg']['success'].'
                      </div>
                  ';
              }
          ?>
        <form action="pages/fungsi_buku/b_input.php" method="post" enctype="multipart/form-data">

          <div class="row">

            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Kode</label>  
                <input type="text" class="form-control" placeholder="kode" name="kode_b"/>
                <?php 
                  if(isset($_SESSION['msg']['err_kode'])){
                      echo '<span class="text-danger">'.$_SESSION['msg']['err_kode'].'</span>';
                  }
              ?>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">judul</label>
                <div class="size">
                  <input type="text" class="form-control" placeholder="judul" name="judul_b"/>
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
                  <?php 
                        include('assets/koneksi.php');
                        $query = "SELECT * FROM kategori";
                        $q = mysqli_query($koneksi, $query);
                    ?>
                  <select class="form-select form-select" name="kategori_b">
                    <option value="">--Pilih Kategori--</option>
                    <?php  while ($data = mysqli_fetch_array($q)) { ?>
                    <option value="<?=$data['kode_k']?>">
                      <?=$data['nama_k']?>
                    </option>
                    <?php } ?>
                  </select>
                  <?php 
                      if(isset($_SESSION['msg']['err_kat'])){
                          echo '<span class="text-danger">'.$_SESSION['msg']['err_kat'].'</span>';
                      }
                  ?>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">ISBN</label>  
                <input type="text" class="form-control" placeholder="isbn" name="isbn_b"/>
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
                  <input type="text" class="form-control" placeholder="Penulis" name="penulis_b"/>
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
                  <?php 
                        include('assets/koneksi.php');
                        $query = "SELECT * FROM penerbit";
                        $q = mysqli_query($koneksi, $query);
                  ?>
                  <select class="form-select form-select" name="penerbit_b">
                    <option value="">--Pilih Penerbit--</option>
                    <?php while ($data = mysqli_fetch_array($q)) { ?>
                    <option value="<?=$data['kode_p']?>">
                      <?=$data['nama_p']?>
                    </option>
                    <?php } ?>
                  </select>
                  <?php 
                      if(isset($_SESSION['msg']['err_penerbit'])){
                          echo '<span class="text-danger">'.$_SESSION['msg']['err_penerbit'].'</span>';
                      }
                  ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tahun</label>  
                <input type="date" class="form-control" placeholder="tahun" name="tahun_b"/>
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
                    <input type="file" name="cover_b" class="file-upload-default">
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
                <select class="form-select form-select" name="bahasa_b">
                  <option value="">Pilih-Bahasa</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Inggris">Inggris</option>
                </select>
                  <?php 
                      if(isset($_SESSION['msg']['err_bahasa'])){
                          echo '<span class="text-danger">'.$_SESSION['msg']['err_bahasa'].'</span>';
                      }
                  ?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleTextarea1">Sinopsis</label>
            <textarea class="form-control" id="exampleTextarea1" rows="6" name="sinopsis_b"></textarea>
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