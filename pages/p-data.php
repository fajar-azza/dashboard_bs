<div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tabel Data Penerbit</h4>
        <div class="table-responsive">
          <?php
        if(isset($_SESSION['msg']['success'])){
                  echo '
                      <div class="alert alert-success" role="alert">
                          '.$_SESSION['msg']['success'].'
                      </div>
                  ';
              }
              ?>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>fungsi</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                    include('assets/koneksi.php');
                    $query = "SELECT * FROM penerbit";
                    $q = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($data = mysqli_fetch_array($q)) {
                ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $data['kode_p'] ?></td>
                            <td><?= $data['nama_p'] ?></td>
                            <td><?= $data['alamat_p'] ?></td>
                            <td>
                                <a href="pages/fungsi_penerbit/p_delete.php?kode_p=<?= $data['kode_p'] ?>" onclick="return confirm('Anda yakin menghapus data ini?')">Hapus</i></a> |  
                                <a href="?page=p-form-update&kode_p=<?= $data['kode_p'] ?>">Edit</a> 
                            </td>
                        </tr>
                <?php
                    }
                ?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php 
unset($_SESSION['msg']);
?>