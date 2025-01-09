<?php 
session_start();
include('../../assets/koneksi.php');

if (!isset($_POST['btn-submit'])) {
    header('location:../../index.php');
}

$nik       = $_POST['nik_a'];
$nama      = $_POST['nama_a'];
$nohp      = $_POST['nohp_a'];
$email     = $_POST['email_a'];
$alamat    = $_POST['alamat_a'];

$foto = $_FILES['foto_a']['name'];
$fileTmp = $_FILES['foto_a']['tmp_name'];
$folder = 'image/';

$ekstensiValid = ['jpg', 'jpeg', 'png'];
$ekstensiFile = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

// fungsi waktu
$foto = date('l, d-m-Y  H:i:s');

// generate nama baru
$newName = strtolower(md5($foto) . '.' . $ekstensiFile);

// Ambil gambar lama dari database
$sql = "SELECT foto_a FROM anggota WHERE nik_a='$nik'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$oldFile = $data['foto_a'];
$filePath = $folder . $oldFile;

// Cek apakah file gambar baru diupload
if ($_FILES['foto_a']['name']) {

    if (!in_array($ekstensiFile, $ekstensiValid)) { // Validasi ekstensi file
        $_SESSION['msg']['err_foto'] = "Hanya file dengan ekstensi jpg, jpeg, atau png yang diperbolehkan!";
        header('location:../../?page=a-form-update&nik_a='.$nik);
        exit();
    } else if ($_FILES['foto_a']['size'] > 2 * 1024 * 1024) { // Validasi ukuran file maksimal 2MB
        $_SESSION['msg']['err_foto'] = "Ukuran file maksimal 2MB!";
        header('location:../../?page=a-form-update&nik_a='.$nik);
        exit();
    }
    // Jika gambar baru diupload, hapus gambar lama
    if (file_exists($filePath)) {
    unlink($filePath);  // Hapus gambar lama
    }

    // Jika validasi berhasil, upload file
    // generate nama baru
    $upload = move_uploaded_file($fileTmp, $folder . $newName);

    // Update nama gambar baru di database
    if ($upload) {
    $sql = "UPDATE anggota SET foto_a='$newName' WHERE nik_a='$nik'";
    mysqli_query($koneksi, $sql);
    }

    if (!$upload) {
        $_SESSION['msg']['err_foto'] = "Gagal meng-upload file.";
    }
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
if(isset($_SESSION['msg'])){
    header('location:../../?page=a-form-update&nik_a='.$nik);
    exit();
}

$query = "SELECT * FROM anggota WHERE nama_a='$nama' AND nik_a!='$nik'";
$q = mysqli_query($koneksi, $query);
if(mysqli_num_rows($q)!=0){
    $_SESSION['msg']['error'] = "Data anggota sudah ada, periksa nik atau nama yang sama";
    header('location:../../?page=a-form-update&nik_a='.$nik);
    exit();
}

$query = "UPDATE anggota SET nama_a='$nama', nohp_a='$nohp', email_a='$email', alamat_a='$alamat' WHERE nik_a='$nik'";
mysqli_query($koneksi, $query);
$_SESSION['msg']['success'] = "Data anggota berhasil diupdate";
header('location:../../?page=a-data');