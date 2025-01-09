<div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tabel Data Kategori </h4>
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
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Fungsi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                    include('../assets/koneksi.php');
                    $query = "SELECT * FROM kategori";
                    $q = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($data = mysqli_fetch_array($q)) {
                ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $data['kode_k'] ?></td>
                            <td><?= $data['nama_k'] ?></td>
                            <td>
                                <a href="pages/fungsi_kategori/k_delete.php?kode_k=<?= $data['kode_k'] ?>" onclick="return confirm('Anda yakin menghapus data ini?')">Hapus</i></a> |  
                                <a href="?page=k-form-update&kode_k=<?= $data['kode_k'] ?>">Edit</a> 
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