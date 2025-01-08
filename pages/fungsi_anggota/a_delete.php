<?php 

$kode = $_REQUEST['nik_a'];

include('../../assets/koneksi.php');

$query = "DELETE FROM anggota WHERE nik_a='$kode'";
mysqli_query($koneksi, $query);
session_start();
$_SESSION['msg']['success'] = "Data Anggota ".$nik." berhasil dihapus";
header('location:../../?page=a-data');