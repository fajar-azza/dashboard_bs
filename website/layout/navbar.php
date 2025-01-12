<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="../index.php"><img src="../assets/images/logo.svg" alt="logo"/></a>
          
        </div>
      </div>
      
      <div class="navbar-menu-wrapper col-lg-4 d-flex align-items-center justify-content-end">   
      <form action="" method="post">
      <div class="input-group">
              <input type="text" class="form-control" placeholder="Search..." aria-label="search" aria-describedby="search" name="title-book"
              value="<?= (isset($_SESSION['value-title'])) ? $_SESSION['value-title'] : null; ?>">
              <button type="submit" class="btn btn-dark btn-icon-text" name="search">
                  <i class="typcn typcn-document btn-icon-append">Cari</i>
              </button>
            </div>
      </form>
              
              <div class="col-lg-4"></div>
              <button class="btn btn-secondary btn-icon-text">
                  <a class="btn-secondary" href="../login/form-log.php">
                <i class="fa fa-user">LOGIN</i></a>                
              </button>
            
      </div>
    </nav>