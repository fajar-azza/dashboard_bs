<?php 
    include('../assets/koneksi.php');
    $query = "SELECT *, COUNT(detail_transaksi.id_transaksi) AS pinjam_buku 
            FROM transaksi
            LEFT JOIN anggota ON transaksi.nik_anggota = anggota.nik_a
            LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi
            GROUP BY transaksi.id ORDER BY transaksi.id DESC
    ";
    $q = mysqli_query($koneksi, $query);


?>

<div class="col-lg-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title">Tabel Data Transaksi</h4>
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
                     <th>NIK</th>
                     <th>Nama</th>
                     <th>Peminjaman Buku</th>
                     <th>Tanggal Pinjam</th>
                     <th>Tanggal Kembali</th>
                     <th>Aksi</th>

                  </tr>
               </thead>
               <tbody>
                  <?php 
                        $no = 1;
                        while ($data = mysqli_fetch_assoc($q)) {
                        ?>
                  <tr>
                     <th scope="row"><?= $no++ ?></th>
                     <td><?= $data['nik_a'] ?></td>
                     <td><?= $data['nama_a'] ?></td>
                     <td><?= ($data['tgl_kembali'] != null) ? '0' : $data['pinjam_buku'] ?> / 5</td>
                     <td><?= $data['tgl_pinjam'] ?></td>
                     <td>
                        <?= ($data['tgl_kembali'] != null) ? $data['tgl_kembali'] : 'Buku belum dikembalikan' ?>
                     </td>
                     <td>
                        <a href="?page=t-detail&detail=<?= $data['id_transaksi'] ?>" class="btn btn-primary">
                           Detail
                        </a>
                        |
                        <a href="?page=t-tambahbuku&id=<?= $data['id_transaksi'] ?>"
                           class="btn btn-info <?= ($data['tgl_kembali'] != null || $data['pinjam_buku'] == '5') ? 'disabled' : null; ?>">
                           Tambah buku
                        </a>
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