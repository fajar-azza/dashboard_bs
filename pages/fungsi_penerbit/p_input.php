<?php 
if (!isset($_POST['btn-submit'])) {
    header('location:../../index.php');
}

$kode = $_POST['kode_p'];
$nama = $_POST['nama_p'];
$alamat = $_POST['alamat_p'];

session_start();

if($kode == ''){
    $_SESSION['msg']['err_kode'] = "Data kode tidak boleh kosong";
}

if($nama == ''){
    $_SESSION['msg']['err_nama'] = "Data nama tidak boleh kosong";
}
if($alamat == ''){
    $_SESSION['msg']['err_alamat'] = "Data alamat tidak boleh kosong";
}

if(isset($_SESSION['msg'])){
    header('location:../../?page=p-form');
    exit();
}

include('../../assets/koneksi.php');

$query = "SELECT * FROM penerbit WHERE kode_p='$kode' OR nama_p='$nama'";
$q = mysqli_query($koneksi, $query);
if(mysqli_num_rows($q)!=0){
    $_SESSION['msg']['error'] = "Data penerbit sudah ada, periksa kode atau nama yang sama";
    header('location:../../?page=p-form');
    exit();
}

$query = "INSERT INTO penerbit VALUES('$kode','$nama','$alamat')";
mysqli_query($koneksi, $query);
$_SESSION['msg']['success'] = "Data Penerbit baru berhasil di input";
header('location:../../?page=p-form');