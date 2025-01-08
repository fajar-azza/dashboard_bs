<?php 
if (!isset($_POST['btn-submit'])) {
    header('location:../../index.php');
}

$nik       = $_POST['nik_a'];
$nama      = $_POST['nama_a'];
$nohp      = $_POST['nohp_a'];
$email     = $_POST['email_a'];
$alamat    = $_POST['alamat_a'];
$foto      = $_POST['foto_a'];

session_start();

if($nik == ''){
    $_SESSION['msg']['err_nik'] = "Data Nik tidak boleh kosong";
}
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
if( isset($_SESSION['msg']['err_nik']) || 
    isset($_SESSION['msg']['err_nama']) ||
    isset($_SESSION['msg']['err_nohp']) ||
    isset($_SESSION['msg']['err_email']) ||
    isset($_SESSION['msg']['err_alamat']) 
    ){
    header('location:../../?page=a-form');
    exit();
}

include('../../assets/koneksi.php');

$query = "SELECT * FROM anggota WHERE nik_a='$nik' OR nama_a='$nama'";
$q = mysqli_query($koneksi, $query);
if(mysqli_num_rows($q)!=0){
    $_SESSION['msg']['error'] = "Data kategori sudah ada, periksa kode atau nama yang sama";
    header('location:../../?page=a-form');
    exit();
}

$query = "INSERT INTO anggota VALUES(
    '$nik',
    '$nama',
    '$nohp',
    '$email',
    '$alamat',
    '$foto')";
mysqli_query($koneksi, $query);
$_SESSION['msg']['success'] = "Data Anggota baru berhasil di input";
header('location:../../?page=a-form');