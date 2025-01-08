<?php 

$kode = $_REQUEST['kode_b'];

include('../../assets/koneksi.php');

$query = "DELETE FROM buku WHERE kode_b='$kode'";
mysqli_query($koneksi, $query);
session_start();
$_SESSION['msg']['success'] = "Data buku ".$kode." berhasil dihapus";
header('location:../../?page=b-data');