<?php 
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
// $cover      = $_POST['cover_b'];
$bahasa     = $_POST['bahasa_b'];
$sinopsis   = $_POST['sinopsis_b'];
var_dump($_POST);

session_start();

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
// if($cover == ''){
//     $_SESSION['msg']['err_cover'] = "Data cover tidak boleh kosong";
// }
if($bahasa == 'bahasa'){
    $_SESSION['msg']['err_bahasa'] = "bahasa harus dipilih";
}
if($sinopsis == ''){
    $_SESSION['msg']['err_sinopsis'] = "Data sinopsis tidak boleh kosong";
}
if( isset($_SESSION['msg']['err_kode']) || 
    isset($_SESSION['msg']['err_judul']) || 
    isset($_SESSION['msg']['err_kat ']) ||
    isset($_SESSION['msg']['err_isbn ']) ||
    isset($_SESSION['msg']['err_penulis ']) ||
    isset($_SESSION['msg']['err_penerbit ']) ||
    isset($_SESSION['msg']['err_tahun ']) ||
    isset($_SESSION['msg']['err_cover ']) ||
    isset($_SESSION['msg']['err_bahasa ']) ||
    isset($_SESSION['msg']['err_sinopsis ']) 
    ){
    header('location:../../?page=b-form-update&kode_b='.$kode);
    exit();
}

include('../../assets/koneksi.php');

$query = "SELECT * FROM buku WHERE  kode_b != 'kode_b'";
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
    cover_b='$cover',
    bahasa_b='$bahasa',
    sinopsis_b='$sinopsis'

    WHERE kode_b='$kode'";
mysqli_query($koneksi, $query);
$_SESSION['msg']['success'] = "Data buku berhasil diupdate";
header('location:../../?page=b-data');