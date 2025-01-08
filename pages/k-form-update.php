<?php 
$kode = $_REQUEST['kode_k'];
include('assets/koneksi.php');
$query = "SELECT * FROM kategori WHERE kode_k='$kode'";
$q = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($q);

?>

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form Edit Kategori</h4>
        <?php 
              if(isset($_SESSION['msg']['error'])){
                  echo '
                      <div class="alert alert-danger" role="alert">
                          '.$_SESSION['msg']['error'].'
                      </div>
                  ';
              }
          ?>
        
        <form class="forms-sample" action="pages/fungsi_kategori/k-update.php" method="post">
          <div class="form-group">
            <label for="exampleInputUsername1">Kode</label>
            <input readonly value="<?= $data['kode_k'] ?>" type="text" class="form-control" id="exampleInputUsername1" placeholder="Kode Buku" name="kode_k">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text " value="<?=$data['nama_k']?>" class="form-control" id="exampleInputEmail1" placeholder="Nama" name="nama_k">
            <?php 
                  if(isset($_SESSION['msg']['err_nama'])){
                      echo '<span class="text-danger">'.$_SESSION['msg']['err_nama'].'</span>';
                  }
              ?>
          </div>
          <div class="text-end">
              <button type="submit" name="btn-submit" class="btn btn-primary me-2" >Simpan Perubahan</button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
  <?php 
unset($_SESSION['msg']);
?>  