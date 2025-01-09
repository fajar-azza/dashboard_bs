<?php 

$kode = $_REQUEST['kode_p'];

include('../../../assets/koneksi.php');

$query = "DELETE FROM penerbit WHERE kode_p='$kode'";
mysqli_query($koneksi, $query);
session_start();
$_SESSION['msg']['success'] = "Data kategori ".$kode." berhasil dihapus";
header('location:../../?page=p-data');