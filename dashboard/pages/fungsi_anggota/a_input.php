<?php 
session_start();
include('../../../assets/koneksi.php');

if (!isset($_POST['btn-submit'])) {
    header('location:../../index.php');
}

$nik       = $_POST['nik_a'];
$nama      = $_POST['nama_a'];
$nohp      = $_POST['nohp_a'];
$email     = $_POST['email_a'];
$alamat    = $_POST['alamat_a'];

// input gambar
$foto = $_FILES['foto_a']['name'];
$fileTmp = $_FILES['foto_a']['tmp_name'];
$folder = 'image/';

$ekstensiValid = ['jpg', 'jpeg', 'png'];
$ekstensiFile = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

// fungsi waktu
$foto = date('l, d-m-Y  H:i:s');

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
if ($foto == '') {
    $_SESSION['msg']['err_foto'] = "Pilih Gambar!";
 } else if (!in_array($ekstensiFile, $ekstensiValid)) { // Validasi ekstensi file
    $_SESSION['msg']['err_foto'] = "Hanya file dengan ekstensi jpg, jpeg, atau png yang diperbolehkan!";
 } else if ($_FILES['foto_a']['size'] > 2 * 1024 * 1024) { // Validasi ukuran file maksimal 2MB
    $_SESSION['msg']['err_foto'] = "Ukuran file maksimal 2MB!";
 } else {
    if (isset($_SESSION['msg'])) {
       header('location: ../../?page=a-form');
       exit();
    }
    
    // Jika validasi berhasil, upload file
    // generate nama baru
    $newName = strtolower(md5($foto) . '.' . $ekstensiFile);
    $upload = move_uploaded_file($fileTmp, $folder . $newName);
 
    if (!$upload) {
       $_SESSION['msg']['foto'] = "Gagal meng-upload file.";
    }
}

if( isset($_SESSION['msg']) 
    ){
    header('location:../../?page=a-form');
    exit();
}

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
    '$newName'
    )";
mysqli_query($koneksi, $query);
$_SESSION['msg']['success'] = "Data Anggota baru berhasil di input";
header('location:../../?page=a-form');