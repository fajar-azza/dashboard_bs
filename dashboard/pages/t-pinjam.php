<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <form class="forms-sample" action="pages/fungsi_transaksi/t_peminjaman.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
                        <h4 class="card-title">Form Peminjaman Buku</h4>
                        <p class="card-description">Isi Data dengan Benar</p>
                        <div class="card-body">
                            <h4 class="card-title">Form Peminjaman</h4>
                            <p class="card-description">
                                Basic form layout
                            </p>
                            <div class="form-group">
                                <label for="exampleInputUsername1">NIK</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..." name="nik_anggota">
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
                                <input readonly type="text" class="form-control" id="" placeholder="Nama"
                                    name="nama_anggota">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tgl Peminjaman</label>
                                <input type="date" class="form-control" name="tgl_pinjam">
                            </div>
                            <?php 
                                if(isset($_SESSION['msg']['err-tgl'])){
                                    echo '<span class="text-danger">'.$_SESSION['msg']['err-tgl'].'</span>';
                                }
                            ?>
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
                            ?>
                            <p class="display-4">
                                <u>Buku <?= $i; ?></u>
                            </p>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kode</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="kode" name="buku<?= $i; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                    <input readonly type="text" class="form-control" id="" placeholder="judul"
                                        name="judul<?= $i; ?>">
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php unset($_SESSION['msg']) ?>