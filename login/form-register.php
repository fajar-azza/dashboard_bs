<?php 
session_start();
if(isset($_SESSION['login'])){
    header('location:index.php');
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
                <img src="../assets/images/logo-dark.svg" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="fw-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" action="fungsi/register.php" method="POST">
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
                <label for="">Usename</label>
                  <input type="text" class="form-control form-control-lg <?= (isset($_SESSION['msg-user']))?"is-invalid":null ?>" id="exampleInputUsername1" placeholder="Username" name="username">
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
                  <input type="password" class="form-control form-control-lg <?= (isset($_SESSION['msg-pass']))?"is-invalid":null ?>" id="exampleInputEmail1" placeholder="password" name="password">
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
                <div class="form-group">
                <label for="">Konfirmasi Password</label>
                  <input type="password" class="form-control form-control-lg <?= (isset($_SESSION['msg-pass-conf']))?"is-invalid":null ?>" id="exampleInputPassword1" placeholder="Konfirmasi Password" name="password_confirmation">
                  <?php 
                    if(isset($_SESSION['msg-pass-conf'])){
                    ?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['msg-pass-conf'] ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="mt-3 d-grid gap-2">
                    <button type="submit" name="btn-register" class="btn btn-primary btn-lg">Sign up</button>
                </div>
                <div class="text-center mt-4 fw-light">
                  Already have an account? <a href="form-log.php" class="text-primary">Login</a>
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
  <!-- container-scroller -->
  <!-- base:js -->
  <?php include('../components/script.php')?>
  <!-- endinject -->
</body>

</html>
<?php
session_destroy();

?>