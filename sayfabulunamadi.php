<?php
include("sabit/ustlink.php");
include("inc/yetkikontrol.php");
$gelenYetki =$_SESSION['yetki'];
$yetki_seviyesi = yetkiKontrol($gelenYetki);

?>
<!-- Sayfaya özgü linkler -->
    <!-- DataTables -->
    <link rel="stylesheet" href="eklenti/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="eklenti/datatables-responsive/css/responsive.bootstrap4.min.css">


<!-- Sayfaya özgü linkler bitiş -->
<?php 
    include("sabit/ust.php");
    include("sabit/sol.php");

?>
<div class="content-wrapper">
    <!-- İçerik Başlık -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">404 Sayfa bulunamadı</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Ana sayfa</a></li>
              <li class="breadcrumb-item active">404</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.İçerik Başlık Bitiş -->
    <!-- İçerik Konu  -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Sayfa bulunamadı.</h3>

          <p>
           Üzgünüz böyle bir sayfa bulamadık. Ana sayfaya yönlendirilmek için tıklayınız.
          <a href="index.php">Ana sayfa</a>
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.İçerik Konu Bitiş -->

</div>

<?php 
    include("sabit/alt.php");
?>
<!-- Sayfaya özgü linkler -->


<!-- Sayfaya özgü linkler bitiş -->
<?php
include("sabit/altscript.php");
?>