<?php 
$kode = $_REQUEST['kode_p'];
include('../assets/koneksi.php');
$query = "SELECT * FROM penerbit WHERE kode_p='$kode'";
$q = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($q);

?>

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form Edit Penerbit</h4>
        <?php 
              if(isset($_SESSION['msg']['error'])){
                  echo '
                      <div class="alert alert-danger" role="alert">
                          '.$_SESSION['msg']['error'].'
                      </div>
                  ';
              }
          ?>
        
        <form class="forms-sample" action="pages/fungsi_penerbit/p-update.php" method="post">
          <div class="form-group">
            <label for="exampleInputUsername1">Kode</label>
            <input readonly value="<?= $data['kode_p'] ?>" type="text" class="form-control" id="exampleInputUsername1" placeholder="Kode Buku" name="kode_p">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text " value="<?=$data['nama_p']?>" class="form-control" id="exampleInputEmail1" placeholder="Nama" name="nama_p">
            <?php 
                  if(isset($_SESSION['msg']['err_nama'])){
                      echo '<span class="text-danger">'.$_SESSION['msg']['err_nama'].'</span>';
                  }
              ?>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <input type="text" value="<?=$data['alamat_p']?>" class="form-control" id="exampleInputPassword1" placeholder="Alamat" name="alamat_p">
            <?php 
                  if(isset($_SESSION['msg']['err_alamat'])){
                      echo '<span class="text-danger">'.$_SESSION['msg']['err_alamat'].'</span>';
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