 <?php
 session_start();
 if(!isset($_SESSION['login'])){
     header('location:login/form-log.php');
     exit();
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
         <?php include('../components/top-nav.php')?>
         <!-- partial -->

         <div class="container-fluid page-body-wrapper">
             <!-- partial:partials/_sidebar.html -->
             <?php include('../components/sidebar.php')?>
             <!-- partial -->
             <div class="main-panel">
                 <div class="content-wrapper">
                     <?php
                      $page = isset($_REQUEST['page']) && !empty($_REQUEST['page']) ? $_REQUEST['page'] : 'dashboard';
                      include('pages/'.$page.'.php');
                      ?>
                 </div>
                 <!-- content-wrapper ends -->
                 <!-- partial:partials/_footer.html -->
                 <?php include('../components/footer.php')?>
                 <!-- partial -->
             </div>
             <!-- main-panel ends -->
         </div>
         <!-- page-body-wrapper ends -->
     </div>
     <!-- container-scroller -->
     <?php include('../components/script.php')?>

 </body>

 </html>