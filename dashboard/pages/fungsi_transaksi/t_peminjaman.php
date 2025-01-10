<?php
session_start();
include('../../assets/koneksi.php');

if (!isset($_POST['btn-submit'])) {
    header('location: ../../?page=dashboard');
    exit();
}

$nik_anggota = $_POST['nik_anggota'];
$nama_anggota = $_POST['nama_anggota'];
$tgl_pinjam = $_POST['tgl_pinjam'];

$buku = [];
for ($i = 5; $i <= 5; $i++) {
    $kode_buku = $_POST["buku$i"] ? $_POST["buku$i"] : null;
    $judul_buku = $_POST["judul$i"] ? $_POST["judul$i"] : null;
    if (!empty($kode_buku)) {
        $buku[] = ['kode_buku' => $kode_buku, 'judul_buku' => $judul_buku];
    }
}


if ($nik_anggota == '') {
    $_SESSION['msg']['err-nik'] = 'NIK tidak boleh kosong';
}
if ($tgl_pinjam == '') {
    $_SESSION['msg']['err-tgl'] = 'Tentukan tanggal peminjaman';
}
if (empty($buku)) {
    $_SESSION['msg']['err-buku'] = 'Pilih buku yang ingin dipinjam';
} else {
    $code = []; // Array untuk menyimpan kode buku yang diinput
    foreach ($buku as $buk) {
        // Validasi apakah buku dengan kode yang sama sudah ada di input
        if (in_array($buk['code'], $code)) {
            $_SESSION['msg']['err-buku'] = "Tidak bisa meminjam buku dengan kode yang sama!";
            break;
        }
        $code[] = $buk['code']; // Tambahkan kode ke array jika belum ada

        // Validasi apakah buku ada di database
        $sql = "SELECT * FROM buku WHERE kode_b='{$buk['code']}'";
        $query = mysqli_query($connect, $sql);
        if (mysqli_num_rows($query) == 0) {
            $_SESSION['msg']['buk'] = "Buku dengan kode '{$buk['code']}' tidak ditemukan!";
            break;
        }
    }
}

if (isset($_SESSION['msg'])) {
    header('location: ../../?page=t-pinjam');
    exit();
}