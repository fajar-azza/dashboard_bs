<?php 
include('../assets/koneksi.php');

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM detail_transaksi
            LEFT JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id
            LEFT JOIN buku ON detail_transaksi.kode_buku = buku.kode_b
            LEFT JOIN anggota ON detail_transaksi.nik_anggota = anggota.nik_a
            WHERE detail_transaksi.id_transaksi = '$id'
    ";

    $query = mysqli_query($koneksi, $sql);
    $book = [];
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_array($query)) {
            $book[] = $row; // Menyimpan setiap baris data ke dalam array
        }
    }

    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
}
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <form class="forms-sample" action="pages/fungsi_transaksi/t_penambahanbuku.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
                        <h3 class="card-title">Form Peminjaman Buku</h3>
                        <?php 
                        if(isset($_SESSION['msg']['failed'])){
                          echo '
                              <div class="alert alert-danger" role="alert">
                                  '.$_SESSION['msg']['failed'].'
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
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputUsername1">NIK</label>
                                <div class="input-group">
                                    <input readonly type="text" class="form-control" placeholder="Search..."
                                        name="nik_anggota" value="<?= $data['nik_anggota'] ?>"
                                        onkeyup="showName(this.value)">
                                    <div class="input-group-prepend d-flex">
                                        <span class="input-group-text" id="search">
                                            <button class="btn btn-dark btn-icon-text">
                                                <i class="typcn typcn-document btn-icon-append"></i>
                                                Cari
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <?php 
                                if(isset($_SESSION['msg']['err-nik'])){
                                    echo '<span class="text-danger">'.$_SESSION['msg']['err-nik'].'</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input readonly type="text" class="form-control" id="namaAnggota" placeholder="Nama"
                                    name="nama_anggota" value="<?= $data['nama_a'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Peminjaman</label>
                                <input readonly type="date" class="form-control" name="tgl_pinjam"
                                    value="<?= $data['tgl_pinjam'] ?>">
                            </div>
                            <?php 
                                if(isset($_SESSION['msg']['err-tgl'])){
                                    echo '<span class="text-danger">'.$_SESSION['msg']['err-tgl'].'</span>';
                                }
                            ?>
                            <div class="form-group" hidden>
                                <label for="exampleInputPassword1">Id</label>
                                <input type="text" class="form-control" name="id" value="<?= $data['id'] ?>">
                            </div>
                            <div class="text-end">
                                <button type="submit" name="btn-submit" class="btn btn-primary me-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <?php 
                        if(isset($_SESSION['msg']['err-buku'])){
                          echo '
                              <div class="alert alert-danger" role="alert">
                                  '.$_SESSION['msg']['err-buku'].'
                              </div>
                          ';
                        }
                        ?>
                        <div class="card-body">
                            <?php 
                            $jmlBuku = 5;
                            for ($i = 1; $i <= $jmlBuku; $i++) {
                                if ($i <= count($book)) {
                            ?>
                            <!-- jika buku sudah dipinjam -->
                            <p class="display-4">
                                <u>Buku <?= $i; ?></u>
                            </p>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kode</label>
                                <div class="col-sm-9">
                                    <input readonly type="text" class="form-control"
                                        value="<?= $book[$i - 1]['kode_b']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                    <input readonly type="text" class="form-control"
                                        value="<?= $book[$i - 1]['judul_b']; ?>">
                                </div>
                            </div>
                            <?php } else { ?>
                            <!-- jika buku baru -->
                            <p class="display-4">
                                <u>Buku <?= $i; ?></u>
                            </p>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kode</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="kode" name="buku<?= $i; ?>"
                                        onkeyup="showBook(this.value, <?= $i ?>)" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                    <input readonly type="text" class="form-control" id="judulBuku<?= $i; ?>"
                                        placeholder="judul" name="judul<?= $i; ?>"
                                        value="<?= $book[$i - 1]['judul_b'] ?? '' ?>">
                                </div>
                            </div>
                            <?php } 
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php 
include('fungsi_transaksi/live-search.php');
unset($_SESSION['msg']); 
?>