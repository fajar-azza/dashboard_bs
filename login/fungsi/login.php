<?php 

if(!isset($_POST['btn-login'])){
    header('location:../form-log.php');
    exit();
}
// proses login
// ============
// ambil username dan password yg diinput
$user_form = $_POST['username'];
$pass_form = $_POST['password'];
// validasi kosong atau tidak
session_start();
if($user_form==''){
    $_SESSION['msg-user'] = "Username tidak boleh kosong.";
}
if($pass_form==''){
    $_SESSION['msg-pass'] = "Password tidak boleh kosong.";
}

if(isset($_SESSION['msg-user']) || isset($_SESSION['msg-pass'])){
    header('location:../form-log.php');
    exit();
}

// cek benar / salah
// koneksi
$conn = mysqli_connect('localhost', 'root', '', 'fajar_pbo');
$sql = "SELECT * FROM users WHERE username='$user_form' AND password='$pass_form'";
$q = mysqli_query($conn, $sql);
$numRow = mysqli_num_rows($q);
if($numRow == 0){
    $_SESSION['msg-global'] = "Data login tidak valid.";
    header('location:../form-log.php');
    exit();
}

// login
$_SESSION['login'] = true;
header('location:../../dashboard/?page=dashboard');



?>