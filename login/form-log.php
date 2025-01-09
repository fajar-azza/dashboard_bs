<?php
session_start();
if(isset($_SESSION['login'])){
  header('location:../dashboard/?page=dashboard');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="../assets/css/style.css">
  <?php include('../components/style.php')?>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-start py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src=" ../assets/images/logo-dark.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Sign in to continue.</h6>
              
              <form class="pt-3" action="fungsi/login.php" method="POST">
              <?php 
                    if(isset($_SESSION['msg-global'])){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['msg-global'] ?>
                        </div>
                    <?php
                    }
                    ?>
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control form-control-lg <?= (isset($_SESSION['msg-user']))?"is-invalid":null ?>" id="exampleInputEmail1" placeholder="Username" name="username">
                  <?php 
                    if(isset($_SESSION['msg-user'])){
                    ?>
                      <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['msg-user'] ?>
                      </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="form-group">
                <label for="">Password</label>
                  <input type="password" class="form-control form-control-lg <?= (isset($_SESSION['msg-pass']))?"is-invalid":null ?>" id="exampleInputPassword1" placeholder="Password" name="password">
                  <?php 
                    if(isset($_SESSION['msg-pass'])){
                    ?>
                      <div class="alert alert-danger" role="alert">
                          <?php echo $_SESSION['msg-pass'] ?>
                      </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="mt-3 d-grid gap-2">
                <button type="submit" name="btn-login" class="btn btn-primary btn-lg">Sign In</button>
                </div>
                
                <div class="text-center mt-4 fw-light">
                  Don't have an account? <a href="form-register.php" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
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

<?php
session_destroy();

?>

