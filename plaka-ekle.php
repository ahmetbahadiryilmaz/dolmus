<?php 
include("sabit/ustlink.php");
include("inc/yetkikontrol.php");
include ("inc/db.php");
$gelenYetki =$_SESSION['yetki'];
$yetki_seviyesi = yetkiKontrol($gelenYetki);
if ($yetki_seviyesi < 5)
{
  header("location:yetkisizerisim.php");
  exit;
}
?>
<!-- Sayfaya özgü linkler -->
 <!-- Select2 -->
 <link rel="stylesheet" href="eklenti/select2/css/select2.min.css">
 <link rel="stylesheet" href="eklenti/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Sayfaya özgü linkler bitiş -->
<?php 
include("sabit/ust.php");
include("sabit/sol.php");
?>

<!-- İçerik Bölümü -->
<div class="content-wrapper">
    <!-- İçerik Başlık -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Plaka Ekle</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="plaka-listele.php">Plaka Listesi</a></li>
              <li class="breadcrumb-item active">Plaka Ekle</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.İçerik Başlık Bitiş -->
    <!-- İçerik Konu  -->
    <section class="content">
        <form id="plaka" method="Post">
          <div class="card card-outline card-info">
                  <div class="card-header">
                      <h3 class="card-title">Plaka Ekle</h3>

                      <div class="card-tools">
                      <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fas fa-minus"></i></button> --> 
                          <!-- Küçültme butonu gerek olursa açarız sonra -->
                      </div>
                  </div>
                  <div class="card-body">
                          <div class="form-group">
                              <label for="adi">Adı</label>
                              <input type="text"  id="adi" name="adi" class="form-control">
                          </div>   
                          <div class="form-group">
                              <label for="tur_id">Grup</label>
                              <select id="tur_id" name="tur_id" class="form-control select2bs4" style="width: 100%;">     
                          <?php
                              $turler = db::$conn->query("SELECT * FROM tb_tur where _deleted=0", PDO::FETCH_ASSOC);
                              if ( $turler->rowCount() ){
                                  foreach( $turler as $row ){
                                        $turid= $row['id'];
                                        $adi= $row['adi'];
                                      ?>
                                        <option value="<?php echo $turid; ?>"><?php echo $adi;?></option>

                                     <?php 
                                  }
                              }
                          ?>
                               </select>
                          </div>           
                  </div>
                  <!-- /.card-body -->
          </div>
          <div class="row">
              <div class="col-sm-12">
                <div class ="col-sm-2">
                </div>
                <div class ="col-sm-2">
                </div>
                <button type="submit" class="btn btn-success btn-block"  style="margin-right:15px; width:100px; float:right">Kaydet</button>    
              </div>
          </div>
        </form>
    </section>
    <!-- /.İçerik Konu Bitiş -->

</div>
<!-- ./İçerik Bölümü Bitiş -->
<?php 
include("sabit/alt.php");
?>
<!-- Sayfaya özgü scriptler -->
<!-- Select2 -->
<script src="eklenti/select2/js/select2.full.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    //Datemask dd/mm/yyyy
   // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  })
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#plaka').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'ajax/plaka-ekle.php',
            data: $(this).serialize(),
            success: function(response)
            {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });
                var jsonData = JSON.parse(response);
 
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                  Toast.fire({
                      icon: 'success',
                      title: jsonData.adi
                    })
                    setTimeout("location.href = 'plaka-listele.php'",2000);
                }
                else
                {
                  Toast.fire({
                    icon: 'error',
                    title: jsonData.adi
                  })
                }
           }
       });
     });
});
</script>

<!-- Sayfaya özgü linkler bitiş -->
<?php
include("sabit/altscript.php");
?>