<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tabel Data Buku</h4>
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
                <th>no</th>
                <th>Kode</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>ISBN</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Cover</th>
                <th>Bahasa</th>
                <th>Sinopsis</th>
                <th>fungsi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                include('assets/koneksi.php');
                $query = "SELECT * FROM buku
                          LEFT JOIN kategori ON buku.kategori_b = kategori.kode_k
                          LEFT JOIN penerbit ON buku.penerbit_b = penerbit.kode_p
                          ";
                $q = mysqli_query($koneksi, $query);
                $no = 1;
                while ($data = mysqli_fetch_array($q)) {
              ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $data['kode_b'] ?></td>
                    <td><?= $data['judul_b'] ?></td>
                    <td><?= $data['nama_k'] ?></td>
                    <td><?= $data['isbn_b'] ?></td>
                    <td><?= $data['penulis_b'] ?></td>
                    <td><?= $data['nama_p'] ?></td>
                    <td><?= $data['tahun'] ?></td>
                    <td>
                      <img src="pages/fungsi_buku/image/<?= $data['cover_b'] ?>" alt="">
                    </td>
                    <td><?= $data['bahasa_b'] ?></td>
                    <td><?= $data['sinopsis_b'] ?></td>
                    <td>
                        <a href="pages/fungsi_buku/b_delete.php?kode_b=<?= $data['kode_b'] ?>" onclick="return confirm('Anda yakin menghapus data ini?')">Hapus</i></a> |  
                        <a href="?page=b-form-update&kode_b=<?= $data['kode_b'] ?>">Edit</a> 
                    </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php 
unset($_SESSION['msg']);
?>