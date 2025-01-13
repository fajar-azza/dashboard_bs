<a href="?page=card" class="btn btn-secondary mb-3 col-md-3">Kembali</a>
<div class="col-lg-12 ">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Detail Buku</h4>
        <div class="">
          <div>

          </div>
          <?php 
          if (isset($_REQUEST['detail'])) {
            $id = $_REQUEST['detail'];
          
                include('../assets/koneksi.php');
                $query = "SELECT * FROM buku
                          LEFT JOIN kategori ON buku.kategori_b = kategori.kode_k
                          LEFT JOIN penerbit ON buku.penerbit_b = penerbit.kode_p
                          WHERE buku.kode_b = '$id' ";
                          
                $q = mysqli_query($koneksi, $query);
                $data = mysqli_fetch_array($q); {
                }
              ?>
              <div class="row">
              <div class="col-md-5">
                        <img class="shadow rounded me-5" width="350" height="450vh"
                           src="../dashboard/pages/fungsi_buku/image/<?= $data['cover_b']; ?>" alt="">
              </div>
              <div class="col-md-4">
                <table class="table mt-3 col-md-3"  style="width: 50%;" >
                  
                    <tr>
                      <td>kode</td>
                      <td><?= $data['kode_b'] ?></td>
                    </tr>
                    <tr>
                      <td>judul</td>
                      <td><?= $data['judul_b'] ?></td>
                    </tr>
                    <tr>
                      <td>Kategori</td>
                      <td><?= $data['nama_k'] ?></td>
                    </tr>
                    <tr>
                      <td>isbn</td>
                      <td><?= $data['isbn_b'] ?></td>
                    </tr>
                    <tr>
                      <td>penulis</td>
                      <td><?= $data['penulis_b'] ?></td>
                    </tr>
                    <tr>
                      <td>penerbit</td>
                      <td><?= $data['nama_p'] ?></td>
                    </tr>
                    <tr>
                      <td>tahun</td>
                      <td><?= $data['tahun'] ?></td>
                    </tr>
                    <tr>
                      <td>bahasa</td>
                      <td><?= $data['bahasa_b'] ?></td>
                    </tr>
                    
              
                    <?php } ?>
                    
                </table>
                <br>
              </div>
              <H3>Sinopsis</H3>
              <H5><?= $data['sinopsis_b'] ?></H5>
              <br>
              <div></div>
        </div>
      </div>
    </div>
  </div>
  <div></div>
  