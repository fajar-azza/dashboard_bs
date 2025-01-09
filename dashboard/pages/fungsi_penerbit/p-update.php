<?php 
if (!isset($_POST['btn-submit'])) {
    header('location:../../index.php');
}

$kode = $_POST['kode_p'];
$nama = $_POST['nama_p'];
$alamat = $_POST['alamat_p'];

session_start();

if($nama == ''){
    $_SESSION['msg']['err_nama'] = "Data nama tidak boleh kosong";
}
if($alamat == ''){
    $_SESSION['msg']['err_alamat'] = "Data alamat tidak boleh kosong";
}
if(isset($_SESSION['msg'])){
    header('location:../../?page=p-form-update&kode_p='.$kode);
    exit();
}

include('../../../assets/koneksi.php');

$query = "SELECT * FROM penerbit WHERE nama_p='$nama' AND kode_p!= '$kode' ";
$q = mysqli_query($koneksi, $query);
if(mysqli_num_rows($q)!=0){
    $_SESSION['msg']['error'] = "Data Penerbit sudah ada, periksa kode atau nama yang sama";
    header('location:../../?page=p-form-update&kode_p='.$kode);
    exit();
}

$query = "UPDATE penerbit SET nama_p='$nama', alamat_p='$alamat' WHERE kode_p='$kode' ";
mysqli_query($koneksi, $query);
$_SESSION['msg']['success'] = "Data kategori berhasil diupdate";
header('location:../../?page=p-data');