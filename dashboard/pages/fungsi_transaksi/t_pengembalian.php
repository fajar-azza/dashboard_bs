<?php
session_start();
include('../../../assets/koneksi.php');

if (!isset($_POST['btn-submit'])) {
    header('location: ../../?page=t-kembali');
    exit();
}

$nik_anggota = $_POST['nik_anggota'];
$tgl_kembali = $_POST['tgl_kembali'];

if ($nik_anggota == '') {
    $_SESSION['msg']['err-nik'] = "NIK tidak boleh kosong";
}
if ($tgl_kembali == '') {
    $_SESSION['msg']['err-tgl'] = "Tentukan tanggal pengembalian buku";
}

if (isset($_SESSION['msg'])) {
    header('location: ../../?page=t-kembali');
    exit();
}

try {
    // 1. Cek apakah ada transaksi yang tgl_kembali nya NULL untuk satu member
    $sqlCheckReturn = "SELECT tgl_kembali FROM transaksi WHERE nik_anggota='$nik_anggota'";
    $queryCheckReturn = mysqli_query($koneksi, $sqlCheckReturn);
    if (!$queryCheckReturn) {
       throw new Exception("Gagal mengecek status pengembalian buku: " . mysqli_error($koneksi));
    }
 
    $nullTglKembali = false; // Menandakan apakah masih ada transaksi dengan tgl_kembali NULL
    $validTglKembali = false; // Menandakan apakah semua transaksi sudah memiliki tgl_kembali yang valid
 
    // Periksa seluruh transaksi member
    while ($dataReturn = mysqli_fetch_array($queryCheckReturn)) {
       if ($dataReturn['tgl_kembali'] == NULL) {
          // Jika ada transaksi dengan tgl_kembali NULL, berarti member masih bisa mengembalikan buku
          $nullTglKembali = true;
       } else {
          // Jika ada transaksi dengan tgl_kembali yang sudah terisi (valid), berarti member sudah mengembalikan buku
          $validTglKembali = true;
       }
    }
 
    // 2. Jika masih ada transaksi dengan tgl_kembali NULL, maka member bisa mengembalikan buku
    if ($nullTglKembali) {
       // Update tgl_kembali pada transaksi yang belum dikembalikan
       $sqlUpdateTransaksi = "UPDATE transaksi SET tgl_kembali='$tgl_kembali' WHERE nik_anggota='$nik_anggota' AND tgl_kembali IS NULL";
       $queryUpdateTransaksi = mysqli_query($koneksi, $sqlUpdateTransaksi);
       if (!$queryUpdateTransaksi) {
          throw new Exception("Gagal mengupdate tgl_kembali: " . mysqli_error($koneksi));
       }
 
       // Commit transaksi
       mysqli_commit($koneksi);
 
       // Set pesan sukses
       $_SESSION['msg']['success'] = "Buku peminjaman <b>" . $nik_anggota . "</b> berhasil dikembalikan!";
       unset($_SESSION['value']);
       header('location: ../../?page=t-data');
       exit();
    } else {
       // Jika tidak ada transaksi dengan tgl_kembali NULL, maka member sudah mengembalikan semua bukunya
       $_SESSION['msg']['failed'] = "Tidak ada peminjaman buku dari member ini!";
       header('location: ../../?page=t-kembali');
       exit();
    }
 
} catch (Exception $e) {
    // Rollback jika terjadi error
    mysqli_rollback($koneksi);
    $_SESSION['msg']['failed'] = "Terjadi kesalahan saat memproses data: " . $e->getMessage();
    header('location: ../../?page=t-kembali');
    exit();
}
 