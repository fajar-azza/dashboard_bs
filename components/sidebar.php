<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

      <!--item Kategori-->
      <li class="nav-item active">
        
        <a class="nav-link" href="?page=dashboard" >
        <i class="typcn typcn-device-desktop menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>        
        <li class="nav-item
              ">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="typcn typcn-document-text menu-icon"></i>
            <span class="menu-title">Kategori</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse 
                <?php
                if(
                  $_REQUEST['page']=='k-data'||
                  $_REQUEST['page']=='k-form'
                ){
                  echo "show";
                }  
              ?>
          " id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item "> 
              <a href="?page=k-data" class="nav-link <?= ($_REQUEST['page']=="k-data")?"active":null ?>">
                              Data Kategori
                          </a></li>
              <li class="nav-item"> 
              <a href="?page=k-form" class="nav-link <?= ($_REQUEST['page']=="k-form")?"active":null ?>">
                              Form Kategori
                          </a></li>  
            </ul>
          </div>
        </li>
      </li>
      <!--item Penerbit-->
      <li class="nav-item
            ">
        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="typcn typcn-film menu-icon"></i>
          <span class="menu-title">Penerbit</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse 
        <?php
              if(
                $_REQUEST['page']=='p-data'||
                $_REQUEST['page']=='p-form'
              ){
                echo "show";
              }  
            ?>
        " id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item "> 
            <a href="?page=p-data" class="nav-link <?= ($_REQUEST['page']=="p-data")?"active":null ?>">
                            Data Penerbit
                        </a></li>
                        <li class="nav-item"> 
            <a href="?page=p-form" class="nav-link <?= ($_REQUEST['page']=="p-form")?"active":null ?>">
                            Form Penerbit
                        </a></li>  
          </ul>
        </div>
      </li> 
      <!--item Buku-->                   
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="typcn typcn-th-small-outline menu-icon"></i>
          <span class="menu-title">Buku</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse
          <?php
                if(
                  $_REQUEST['page']=='b-data'||
                  $_REQUEST['page']=='b-form'
                ){
                  echo "show";
                }  
              ?>
        
        " id="tables">
          <ul class="nav flex-column sub-menu">
          <li class="nav-item "> 
            <a href="?page=b-data" class="nav-link <?= ($_REQUEST['page']=="b-data")?"active":null ?>">
                            Data Buku
                        </a></li>
                        <li class="nav-item"> 
            <a href="?page=b-form" class="nav-link <?= ($_REQUEST['page']=="b-form")?"active":null ?>">
                            Form Buku
                        </a></li>
          </ul>
        </div>
      </li>
      <!--item Anggota-->                  
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#anggota" aria-expanded="false" aria-controls="anggota">
          <i class="typcn typcn-user-add-outline menu-icon"></i>
          <span class="menu-title">Anggota</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse
        <?php
              if(
                $_REQUEST['page']=='a-form'||
                $_REQUEST['page']=='a-data'
              ){
                echo "show";
              }  
            ?>
        " id="anggota">
          <ul class="nav flex-column sub-menu">
          <li class="nav-item "> 
            <a href="?page=a-data" class="nav-link <?= ($_REQUEST['page']=="a-data")?"active":null ?>">
                            Data Anggota 
                        </a></li>
                        <li class="nav-item ">
            <a href="?page=a-form" class="nav-link <?= ($_REQUEST['page']=="a-form")?"active":null ?>">
                            Form Anggota 
                        </a></li>                                              
          </ul>
        </div>
      </li> 
      <!--item Transaksi-->  
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
          <i class="typcn typcn-compass menu-icon"></i>
          <span class="menu-title">Transaksi</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse
        <?php
              if(
                $_REQUEST['page']=='t-pinjam'|| 
                $_REQUEST['page']=='t-kembali'||
                $_REQUEST['page']=='t-data'
              ){
                echo "show";
              }  
            ?>
        " id="icons">
          <ul class="nav flex-column sub-menu">
          <li class="nav-item "> 
            <a href="?page=t-pinjam" class="nav-link <?= ($_REQUEST['page']=="t-pinjam")?"active":null ?>">
                            Peminjaman
                        </a></li>
                        <li class="nav-item"> 
            <a href="?page=t-kembali" class="nav-link <?= ($_REQUEST['page']=="t-kembali")?"active":null ?>">
                            Pengembalian
                        </a></li>
                        <li class="nav-item"> 
            <a href="?page=t-data" class="nav-link <?= ($_REQUEST['page']=="t-data")?"active":null ?>">
                            Data Transaksi
                        </a></li>
          </ul>
        </div>
      </li>                          
      
    </ul>
  </nav>