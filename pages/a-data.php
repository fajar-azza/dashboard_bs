<div class="col-lg-12 grid-margin stretch-card">
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
                <th>Nik</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>email</th>
                <th>alamat</th>
                <th>foto</th>
                <th>fungsi</th>

              </tr>
            </thead>
            <tbody>
            <?php 
                    include('assets/koneksi.php');
                    $query = "SELECT * FROM anggota";
                    $q = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($data = mysqli_fetch_array($q)) {
                ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $data['nik_a'] ?></td>
                            <td><?= $data['nama_a'] ?></td>
                            <td><?= $data['nohp_a'] ?></td>
                            <td><?= $data['email_a'] ?></td>
                            <td><?= $data['alamat_a'] ?></td>
                            <td><?= $data['foto_a'] ?></td>
                            <td>
                                <a href="pages/fungsi_anggota/a_delete.php?nik_a=<?= $data['nik_a'] ?>" onclick="return confirm('Anda yakin menghapus data ini?')">Hapus</i></a> |  
                                <a href="?page=a-form-update&nik_a=<?= $data['nik_a'] ?>">Edit</a> 
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