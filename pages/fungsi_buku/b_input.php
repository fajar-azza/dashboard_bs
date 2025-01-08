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
$bahasa     = $_POST['bahasa_b'];
$sinopsis   = $_POST['sinopsis_b'];


$cover      = $_FILES['cover_b']['name'];
$fileTmp    = $_FILES['cover']['tmp_name'];
$folder     = '../image/';


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
if(!$cover == ''){
    $_SESSION['msg']['err_cover'] = "Data cover tidak boleh kosong";
}
if($bahasa == ' '){
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
        
    header('location:../../?page=b-form');
    exit();
}

include('../../assets/koneksi.php');

$query = "SELECT * FROM buku   WHERE kode_b='$kode' OR judul_b='$judul' OR isbn_b='$isbn'";
$q = mysqli_query($koneksi, $query);
if(mysqli_num_rows($q)!=0){
    $_SESSION['msg']['error'] = "Data buku sudah ada, periksa kode atau nama yang sama";
    header('location:../../?page=b-form');
    exit();
}

$query = "INSERT INTO buku VALUES
        (   '$kode',
            '$judul',
            '$kategori',
            '$isbn',
            '$penulis',
            '$penerbit',
            '$tahun',
            '$cover',
            '$bahasa',
            '$sinopsis')";
mysqli_query($koneksi, $query);
$_SESSION['msg']['success'] = "Data buku baru berhasil di input";
header('location:../../?page=b-form');