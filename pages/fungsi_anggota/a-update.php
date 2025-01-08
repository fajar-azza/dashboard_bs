<?php 
if (!isset($_POST['btn-submit'])) {
    header('location:../../index.php');
}

$nama      = $_POST['nama_a'];
$nohp      = $_POST['nohp_a'];
$email     = $_POST['email_a'];
$alamat    = $_POST['alamat_a'];
$foto      = $_POST['foto_a'];

session_start();

if($nama == ''){
    $_SESSION['msg']['err_nama'] = "Data nama tidak boleh kosong";
}
if($nohp == ''){
    $_SESSION['msg']['err_nohp'] = "Data no hp tidak boleh kosong";
}
if($email == ''){
    $_SESSION['msg']['err_email'] = "Data email tidak boleh kosong";
}
if($alamat == ''){
    $_SESSION['msg']['err_alamat'] = "Data alamat tidak boleh kosong";
}
if(isset($_SESSION['msg']['err_nama'])){
    header('location:../../?page=k-form-update&kode_k='.$kode);
    exit();
}

include('../../assets/koneksi.php');

$query = "SELECT * FROM kategori WHERE nama_k='$nama' AND kode_k != '$kode_k'";
$q = mysqli_query($koneksi, $query);
if(mysqli_num_rows($q)!=0){
    $_SESSION['msg']['error'] = "Data kategori sudah ada, periksa kode atau nama yang sama";
    header('location:../../?page=a-form-update&kode_a='.$kode);
    exit();
}

$query = "UPDATE kategori SET nama_k='$nama' WHERE kode_k='$kode'";
mysqli_query($koneksi, $query);
$_SESSION['msg']['success'] = "Data kategori berhasil diupdate";
header('location:../../?page=k-data');