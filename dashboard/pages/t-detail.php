<a href="?page=t-data" class="btn btn-secondary mb-3">Kembali</a>
<div class="col-lg-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title">Tabel Detail Data Anggota</h4>
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
                     <th>NIK</th>
                     <th>Nama</th>
                     <th>No HP</th>
                     <th>email</th>
                     <th>alamat</th>
                     <th>foto</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                            if (isset($_REQUEST['detail'])) {
                                $id = $_REQUEST['detail'];

                                include('../assets/koneksi.php');
                                $query = "SELECT * FROM detail_transaksi
                                        LEFT JOIN anggota ON detail_transaksi.nik_anggota = anggota.nik_a 
                                        WHERE detail_transaksi.id_transaksi = '$id' ";
                                $q = mysqli_query($koneksi, $query);
                                $data = mysqli_fetch_array($q);
                            }
                        ?>
                  <tr>
                     <td><?= $data['nik_a'] ?></td>
                     <td><?= $data['nama_a'] ?></td>
                     <td><?= $data['nohp_a'] ?></td>
                     <td><?= $data['email_a'] ?></td>
                     <td><?= $data['alamat_a'] ?></td>
                     <td>
                        <img src="pages/fungsi_anggota/image/<?= $data['foto_a'] ?>" alt="">
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title">Tabel Detail Data Buku</h4>
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
                     <th>NO</th>
                     <th>Kode Buku</th>
                     <th>Judul Buku</th>
                     <th>Cover</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                            if (isset($_REQUEST['detail'])) {
                                $id = $_REQUEST['detail'];

                                include('../assets/koneksi.php');
                                $query = "SELECT * FROM detail_transaksi
                                        LEFT JOIN buku ON detail_transaksi.kode_buku = buku.kode_b
                                        WHERE detail_transaksi.id_transaksi = '$id'";
                                $q = mysqli_query($koneksi, $query);
                                $no = 1;
                            }
                            while ($dataBuku = mysqli_fetch_array($q)) {
                        ?>
                  <tr>
                     <td><?= $no++; ?></td>
                     <td><?= $dataBuku['kode_b'] ?></td>
                     <td><?= $dataBuku['judul_b'] ?></td>
                     <td>
                        <img src="pages/fungsi_buku/image/<?= $dataBuku['cover_b'] ?>" alt="">
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