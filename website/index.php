<?php
session_start();
include('../assets/koneksi.php');
$sql = "SELECT * FROM buku 
         LEFT JOIN kategori ON buku.kategori_b = kategori.kode_k
         LEFT JOIN penerbit ON buku.penerbit_b = penerbit.kode_p
         ORDER BY buku.judul_b ASC";
$query = mysqli_query($koneksi, $sql);

if (isset($_POST['search'])) {
  $title = $_POST['title-book'];

  $_SESSION['value-title'] = $title;

  $sql = "SELECT * FROM buku
           LEFT JOIN kategori ON buku.kategori_b = kategori.kode_k
           LEFT JOIN penerbit ON buku.penerbit_b = penerbit.kode_p
           WHERE judul_b LIKE '%$title%' ORDER BY buku.judul_b ASC";
  $query = mysqli_query($koneksi, $sql);
  if (mysqli_num_rows($query) == 0) { 
     $_SESSION['not-found'] = '<h1 class="text-center ">Book not found!</h1>';
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php include('../components/style.php')?>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include('layout/navbar.php')?>
    <!-- partial -->
    
    <div class="container-fluid page-body-wrapper">      
      <!-- partial:partials/_sidebar.html -->
      
      <!-- partial -->
      
        <div class="content-wrapper row mb-10 ">
        <?php
                $page = isset($_REQUEST['page']) && !empty($_REQUEST['page']) ? $_REQUEST['page'] : 'card';
                  include('layout/'.$page.'.php');
                  ?>
          
          <?php 
               if (isset($_SESSION['not-found'])) {
                  echo $_SESSION['not-found'];
               }?>
        

 
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
         <div>

         </div>
        <!-- partial -->
      </div>
      
     
      
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  
  <!-- container-scroller -->

  <?php include('../components/script.php')?>
  <!-- End custom js for this page-->
</body>
<?php 
unset($_SESSION['value-title']);
unset($_SESSION['not-found']); 
?>

<footer class="footer fixed bottom text-center" > 
    <span class="">Copyright © 2024 <a href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
    <span class="">Hand-crafted & made with <i class="typcn typcn-heart-full-outline text-danger"></i></span>          
</footer>
</html>
