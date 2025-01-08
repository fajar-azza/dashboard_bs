<?php 
if (!isset($_POST['btn-submit'])) {
    header('location:../../index.php');
}

$kode = $_POST['kode_k'];
$nama = $_POST['nama_k'];

session_start();

if($nama == ''){
    $_SESSION['msg']['err_nama'] = "Data nama tidak boleh kosong";
}

if(isset($_SESSION['msg']['err_nama'])){
    header('location:../../?page=k-form-update&kode_k='.$kode);
    exit();
}

include('../../assets/koneksi.php');

$query = "SELECT * FROM kategori WHERE nama_k='$nama' AND kode_k != '$kode'";
$q = mysqli_query($koneksi, $query);
if(mysqli_num_rows($q)!=0){
    $_SESSION['msg']['error'] = "Data kategori sudah ada, periksa kode atau nama yang sama";
    header('location:../../?page=k-form-update&kode_k='.$kode);
    exit();
}

$query = "UPDATE kategori SET nama_k='$nama' WHERE kode_k='$kode'";
mysqli_query($koneksi, $query);
$_SESSION['msg']['success'] = "Data kategori berhasil diupdate";
header('location:../../?page=k-data');