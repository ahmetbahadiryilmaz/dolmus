<?php 
    $urlSonuc= $_SERVER['REQUEST_URI'];
    $dizi = explode ("/",$urlSonuc,3); 
    $gelenLink= $dizi[2];
    $profil = str_replace("../", "", $_SESSION['profil']);

?>
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="varsayilan/img/<?php echo $logoName; ?>" alt="<?php echo $logoAlt; ?>" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $title; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $profil; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="sifredegis.php" class="d-block"><?php echo  $_SESSION['adi']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <!-- <nav class="mt-2"> -->
      <nav class="mt-2" style="font-size:80.5%;">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false" >
            <li class="nav-header" <?php echo $yetki_seviyesi < 60 ?  'style="display:none;"': '';?>>Kullanıcı İşlemleri</li>
            <li class="nav-item"  <?php echo $yetki_seviyesi < 60 ?  'style="display:none;"': '';?>>
                <a href="kullanici-ekle.php" class="nav-link <?php     echo $gelenLink == "kullanici-ekle.php" ? "active" : ""; ?>">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>Yeni Kullanıcı</p>
                </a>
            </li>
            <li class="nav-item"  <?php echo $yetki_seviyesi < 60 ?  'style="display:none;"': '';?>> 
                <a href="kullanici-listele.php" class="nav-link <?php     echo $gelenLink == "kullanici-listele.php" ? "active" : ""; ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Kullanıcı Listesi
                </p>
                </a>
            </li>
            <li class="nav-header"  <?php echo $yetki_seviyesi < 50 ?  'style="display:none;"': '';?>>Haftalar</li>
            <li class="nav-item" <?php echo $yetki_seviyesi < 50 ?  'style="display:none;"': '';?>> 
                <a href="hafta-listele.php" class="nav-link <?php     echo $gelenLink == "hafta-listele.php" ? "active" : ""; ?>">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Haftalar Listesi
                </p>
                </a>
            </li>
            <li class="nav-header"  <?php echo $yetki_seviyesi < 50 ?  'style="display:none;"': '';?>>Tanımlamlar</li>
           
            <li class="nav-item" <?php echo $yetki_seviyesi < 50 ?  'style="display:none;"': '';?>> 
                <a href="tur-listele.php" class="nav-link <?php     echo $gelenLink == "tur-listele.php" ? "active" : ""; ?>">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Grup Listesi
                </p>
                </a>
            </li>
            <li class="nav-item" <?php echo $yetki_seviyesi < 50 ?  'style="display:none;"': '';?>> 
                <a href="plaka-listele.php" class="nav-link <?php     echo $gelenLink == "plaka-listele.php" ? "active" : ""; ?>">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Plaka Listesi
                </p>
                </a>
            </li>
            <li class="nav-header"  <?php echo $yetki_seviyesi < 50 ?  'style="display:none;"': '';?>>Gelir/Gider</li>
            <li class="nav-item" <?php echo $yetki_seviyesi < 50 ?  'style="display:none;"': '';?>> 
                <a href="gg-listele.php" class="nav-link <?php     echo $gelenLink == "gg-listele.php" ? "active" : ""; ?>">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Gelir/Gider Listesi
                </p>
                </a>
            </li>
        </ul>
 <!--
          <li class="nav-item" >
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
  -->
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>