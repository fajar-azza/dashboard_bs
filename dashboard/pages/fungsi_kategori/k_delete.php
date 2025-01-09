<?php 

$kode = $_REQUEST['kode_k'];

include('../../../assets/koneksi.php');

$query = "DELETE FROM kategori WHERE kode_k='$kode'";
mysqli_query($koneksi, $query);
session_start();
$_SESSION['msg']['success'] = "Data kategori ".$kode." berhasil dihapus";
header('location:../../?page=k-data');