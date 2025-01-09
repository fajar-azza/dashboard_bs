<?php 
session_start();
include('../../../assets/koneksi.php');

if (!isset($_POST['btn-submit'])) {
    header('location:../../index.php');
}

$kode       = $_POST['kode_b'];
$judul      = $_POST['judul_b'];
$kategori   = $_POST['kategori_b'];
$isbn       = $_POST['isbn_b'];
$penulis    = $_POST['penulis_b'];
$penerbit   = $_POST['penerbit_b'];
$tahun      = $_POST['tahun_b'];
$bahasa     = $_POST['bahasa_b'];
$sinopsis   = $_POST['sinopsis_b'];

// insert gambar ke db dan folder covers
$cover = $_FILES['cover_b']['name'];
$fileTmp = $_FILES['cover_b']['tmp_name'];
$folder = 'image/';

$ekstensiValid = ['jpg', 'jpeg', 'png'];
$ekstensiFile = strtolower(pathinfo($cover, PATHINFO_EXTENSION));

// fungsi waktu
$cover = date('l, d-m-Y  H:i:s');

// generate nama baru
$newName = strtolower(md5($cover) . '.' . $ekstensiFile);

// Ambil gambar lama dari database
$sql = "SELECT cover_b FROM buku WHERE kode_b='$kode'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$oldFile = $data['cover_b'];
$filePath = $folder . $oldFile;

// Cek apakah file gambar baru diupload
if ($_FILES['cover_b']['name']) {

    if (!in_array($ekstensiFile, $ekstensiValid)) { // Validasi ekstensi file
        $_SESSION['msg']['err_cover'] = "Hanya file dengan ekstensi jpg, jpeg, atau png yang diperbolehkan!";
        header('location:../../?page=b-form-update&kode_b='.$kode);
        exit();
    } else if ($_FILES['cover_b']['size'] > 2 * 1024 * 1024) { // Validasi ukuran file maksimal 2MB
        $_SESSION['msg']['err_cover'] = "Ukuran file maksimal 2MB!";
        header('location:../../?page=b-form-update&kode_b='.$kode);
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
    $sql = "UPDATE buku SET cover_b='$newName' WHERE kode_b='$kode'";
    mysqli_query($koneksi, $sql);
    }

    if (!$upload) {
        $_SESSION['msg']['err_cover'] = "Gagal meng-upload file.";
    }
}

if($kode == ''){
    $_SESSION['msg']['err_kode'] = "Data kode tidak boleh kosong";
}
if($judul == ''){
    $_SESSION['msg']['err_judul'] = "Data nama tidak boleh kosong";
}
if($kategori == ''){
    $_SESSION['msg']['err_kat'] = "Data Kategori harus dipilih ";
}
if($isbn == ''){
    $_SESSION['msg']['err_isbn'] = "Data isbn tidak boleh kosong";
}
if($penulis == ''){
    $_SESSION['msg']['err_penulis'] = "Data penulis tidak boleh kosong";
}
if($penerbit == ''){
    $_SESSION['msg']['err_penerbit'] = "Data penerbit harus dipilih";
}
if($tahun == ''){
    $_SESSION['msg']['err_tahun'] = "Data tahun tidak boleh kosong";
}
if($bahasa == 'bahasa'){
    $_SESSION['msg']['err_bahasa'] = "bahasa harus dipilih";
}
if($sinopsis == ''){
    $_SESSION['msg']['err_sinopsis'] = "Data sinopsis tidak boleh kosong";
}
if ($cover == '') {
    $_SESSION['msg']['cover'] = "Pilih Gambar!";
}
if( isset($_SESSION['msg']) 
    ){
    header('location:../../?page=b-form-update&kode_b='.$kode);
    exit();
}

$query = "SELECT * FROM buku WHERE judul_b ='$judul' AND isbn_b!='$isbn_b'";
$q = mysqli_query($koneksi, $query);
if(mysqli_num_rows($q)!=1){
    $_SESSION['msg']['error'] = "Data buku sudah ada, periksa kode atau nama yang sama";
    header('location:../../?page=b-form-update&kode_b='.$kode);
    exit();
}

$query = "UPDATE buku SET 
    judul_b='$judul', 
    kategori_b='$kategori', 
    isbn_b='$isbn', 
    penulis_b='$penulis', 
    penerbit_b='$penerbit', 
    tahun='$tahun',
    bahasa_b='$bahasa',
    sinopsis_b='$sinopsis'
    WHERE kode_b='$kode'
";

mysqli_query($koneksi, $query);
$_SESSION['msg']['success'] = "Data buku berhasil diupdate";
header('location:../../?page=b-data');