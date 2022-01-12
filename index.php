<?php 
include("sabit/ustlink.php");
$gelenYetki =$_SESSION['yetki'];
include("inc/yetkikontrol.php");
$yetki_seviyesi = yetkiKontrol($gelenYetki);
if ($yetki_seviyesi < 10)
{
  header("location:yetkisizerisim.php");
  exit;
}
?>
<!-- Sayfaya özgü linkler -->
<!-- DataTables -->
<link rel="stylesheet" href="eklenti/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="eklenti/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- Sayfaya özgü linkler bitiş -->
<?php 
include("sabit/ust.php");
include("sabit/sol.php");
include ("inc/head.php");
 
function rapor($ilk, $son, $tur) 
{
 
  $datakul = [
    'son' => $son,
    'ilk' => $ilk,
    'tur' => $tur,
  ];
 /*echo $ilk."<br>";
  echo $son."<br>";
  echo $tur."<br>";*/
  $stmtkul = db::$conn->prepare("select sum(tutar) as toplamsayi from tb_gg WHERE _deleted =0 and tarih > :ilk and tarih < :son and tur =:tur ");
  $stmtkul->execute($datakul);
  //print_r($stmtkul);
  $records = $stmtkul->fetch();
  $kullanilabilir = (double)$records['toplamsayi'];
  return $kullanilabilir;
}
?>

<!-- İçerik Bölümü -->
<div class="content-wrapper">
    <!-- İçerik Başlık -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ana sayfa </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Ana sayfa</a></li>
              <li class="breadcrumb-item active">Ana sayfa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="row">
           <div class="col-12">
              <div class="card card-primary card-tabs">
                <div class="card-header">
                  Gelir/Gider Raporları
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                      <h5 class="mb-2">Bu Ay</h5>
                      <?php 
                       $buAyIlk = date("Y-m-d 00:00:01",strtotime('first day of this month'));
                       $buAySon = date("Y-m-d 23:59:59",strtotime('last day of this month'));
                       $buaygider= rapor($buAyIlk,$buAySon,"Gider");
                       $buaygelir= rapor($buAyIlk,$buAySon,"Gelir");
                       $buayfark = $buaygelir - $buaygider;
                      ?>
                      <div class="row">
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="far fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Gider Toplam</span>
                              <span class="info-box-number"><?=$buaygider?> TL</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Gelir Toplam</span>
                              <span class="info-box-number"><?=$buaygelir?> TL</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Fark</span>
                              <span class="info-box-number"><?=$buayfark?> TL</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                      </div>
                    </div>
                    <div class="container-fluid">
                      <h5 class="mb-2">Geçen Ay</h5>
                      <?php 
                        $gecenAyIlk = date("Y-m-d 00:00:01",strtotime('first day of last month')); 
                        $gecenAySon = date("Y-m-d 23:59:59",strtotime('last day of last month')); 
                        $gecenaygider= rapor($gecenAyIlk,$gecenAySon,"Gider");
                        $gecenaygelir= rapor($gecenAyIlk,$gecenAySon,"Gelir");
                        $gecenayfark = $gecenaygelir - $gecenaygider;
                       ?>
                      <div class="row">
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="far fa-money-bill-alt"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text">Gider Toplam </span>
                              <span class="info-box-number"><?=$gecenaygider?> TL</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Gelir Toplam</span>
                              <span class="info-box-number"><?=$gecenaygelir?> TL</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Fark</span>
                              <span class="info-box-number"><?=$gecenayfark?> TL</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                      </div>
                    </div>
                    <div class="container-fluid">
                      <h5 class="mb-2">Son 3 Ay</h5>
                      <?php 
                      $date = date("Y-m-d 00:00:01",strtotime('first day of this month'));
                      $date = new DateTime($date);
                      $date->modify('-2 month');
                      $sonUcIlk = $date->format('Y-m-d H:i:s');
                      
                      $sonucgider= rapor($sonUcIlk,$buAySon,"Gider");
                      $sonucgelir= rapor($sonUcIlk,$buAySon,"Gelir");
                      $sonucfark = $sonucgelir - $sonucgider;

                      ?>
                      <div class="row">
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="far fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Gider Toplam</span>
                              <span class="info-box-number"><?=$sonucgider?> TL</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Gelir Toplam</span>
                              <span class="info-box-number"><?=$sonucgelir?> TL</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Fark</span>
                              <span class="info-box-number"><?=$sonucfark?> TL</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                      </div>
                    </div>
                    <div class="container-fluid">
                      <h5 class="mb-2">Son 6 Ay</h5>
                      <?php 
                      $date = date("Y-m-d 00:00:01",strtotime('first day of this month'));
                      $date = new DateTime($date);
                      $date->modify('-5 month');
                      $sonAltiIlk = $date->format('Y-m-d H:i:s');
                      
                      $sonaltigider= rapor($sonAltiIlk,$buAySon,"Gider");
                      $sonaltigelir= rapor($sonAltiIlk,$buAySon,"Gelir");
                      $sonaltifark = $sonaltigelir - $sonaltigider;

                      ?>
                      <div class="row">
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="far fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Gider Toplam</span>
                              <span class="info-box-number"><?=$sonaltigider?> TL</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Gelir Toplam</span>
                              <span class="info-box-number"><?=$sonaltigelir?> TL</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Fark</span>
                              <span class="info-box-number"><?=$sonaltifark?> TL</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                      </div>
                    </div>
                    <div class="container-fluid">
                      <h5 class="mb-2">Son 1 Yıl</h5>
                      <?php 
                      $date = date("Y-m-d 00:00:01",strtotime('first day of this month'));
                      $date = new DateTime($date);
                      $date->modify('-11 month');
                      $sonOnIkiIlk = $date->format('Y-m-d H:i:s');
                      
                      $sonOnikigider= rapor($sonOnIkiIlk,$buAySon,"Gider");
                      $sonOnikigelir= rapor($sonOnIkiIlk,$buAySon,"Gelir");
                      $sonOnikifark = $sonOnikigelir - $sonOnikigider;

                      ?>
                      <div class="row">
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="far fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Gider Toplam</span>
                              <span class="info-box-number"><?=$sonOnikigider?> TL</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Gelir Toplam</span>
                              <span class="info-box-number"><?=$sonOnikigelir?> TL</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-money-bill-alt"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Fark</span>
                              <span class="info-box-number"><?=$sonOnikifark?> TL</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div> 
        </div>
    </section>
        <!-- İçerik Konu  -->
        <section class="content">
        <div class="card card-primary card-tabs">
            <div class="card-header">
                  Ay bazında rapor
                <div class="card-tools">
                  <!-- Maximize Button -->
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>   
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style ="padding:0px; width: 100%">
                    <thead>
                      <tr>
                        <th  width="25%">Yıl</th>
                        <th  width="25%">Ay</th>
                        <th  width="25%">Tür</th>
                        <th  width="25%">Tutar Toplam</th>
                      </tr>
                    </thead>
                </table>
            </div>
   
      </div>
     <!-- /.card-body -->
    </section>
    <!-- /.İçerik Konu Bitiş -->
    <!-- /.İçerik Başlık Bitiş -->
 

</div>
<!-- ./İçerik Bölümü Bitiş -->
<?php 
include("sabit/alt.php");
?>
<!-- Sayfaya özgü scriptler -->
<!-- DataTables -->
<script src="eklenti/datatables/jquery.dataTables.min.js"></script>
<script src="eklenti/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="eklenti/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="eklenti/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<script>
    $(document).ready(function() {
    
        $('#example1').DataTable({
            'processing': true,
            'serverSide': true,
            'searching':false,
            'serverMethod': 'post',
            'ajax': {
                'url':'ajax/gg-listele-rapor.php'
            },
            'columns': [
              { data: 'yil' },
              { data: 'ay' },
              { data: 'tur' },
              { data: 'tutar' },
            ],		
            "order": [[ 0, "desc" ],[ 1, "desc" ]],
            "columnDefs":[
              {"targets": 2,
                render: function ( data, type, row ) {
                  var color = 'black';
                  if (data == 'Gelir') 
                  {
                    color = 'darkgreen';
                  } 
                  else{
                    color = 'Red';
                  }
                  return '<span style="color:' + color + ' ; font-weight: bold;">' + data + '</span>';
                }

              },
            ],
            "responsive": true,            
            "language": {
                "emptyTable": "Gösterilecek ver yok.",
                "processing": "Veriler yükleniyor",
                "sDecimal": ".",
                "sInfo": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "sInfoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Sayfada _MENU_ kayıt göster",
                "sLoadingRecords": "Yükleniyor...",
                "sSearch": "Ara:",
                "sZeroRecords": "Eşleşen kayıt bulunamadı.",
                "oPaginate": {
                    "sFirst": "İlk",
                    "sLast": "Son",
                    "sNext": "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending": ": artan sütun sıralamasını aktifleştir",
                    "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            }
        });
    });
</script>
<!-- Sayfaya özgü linkler bitiş -->
<?php
include("sabit/altscript.php");
?>