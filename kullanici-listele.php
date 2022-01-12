<?php 
include("sabit/ustlink.php");
$gelenYetki =$_SESSION['yetki'];
include("inc/yetkikontrol.php");
$yetki_seviyesi = yetkiKontrol($gelenYetki);
if ($yetki_seviyesi < 60)
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
?>

<!-- İçerik Bölümü -->
<div class="content-wrapper">
    <!-- İçerik Başlık -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kullanıcı Listesi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Ana sayfa</a></li>
              <li class="breadcrumb-item active">Kullanıcılar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.İçerik Başlık Bitiş -->
    <!-- İçerik Konu  -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="kullanici-ekle.php" class="btn btn-success">
                  Yeni
                </a>
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
                        <th  width="15%">ID</th>
                        <th  width="20%">Adı</th>
                        <th  width="20%">Mail</th>
                        <th  width="20%">Yetki</th>
                        <th  width="25%">İşlemler</th>
                      </tr>
                    </thead>
                </table>
            </div>
   
      </div>
     <!-- /.card-body -->
    </section>
    <!-- /.İçerik Konu Bitiş -->

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
            'serverMethod': 'post',
            'ajax': {
                'url':'ajax/kullanici-listele.php'
            },
            'columns': [
              { data: 'id' },
              { data: 'isim' },
              { data: 'mail' },
              { data: 'yetki' },
              {
                mRender:function(data,type,row)
                {
                  return '<a href="kullanici-duzenle.php?id=' + row.id +'" class="btn btn-info" style="width:100px;">Düzenle</a> <a href="" data-id="' + row.id +'" class="delete btn btn-danger" style="width:100px;">Sil</a> <a href="" data-id="' + row.id +'" class="sifre btn btn-warning" style="width:100px;">Sıfırla</a>';
                }
              }
            ],		
            "order": [[ 0, "desc" ]],
            "columnDefs":[
              {
                "targets":[3],
                "orderable":false,
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
        $(document).on('click', '.delete', function(e){
          e.preventDefault();
          var user_id = $(this).attr("data-id");
          if(confirm(user_id +" ID'li veriyi silmek istediğinize emin misiniz?"))
          {
              $.ajax({
                url:"ajax/kullanici-sil.php",
                method:"POST",
                data:{id:user_id},
                success:function(response)
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
                      setTimeout("location.href = 'kullanici-listele.php'",1500);
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
          }
          else
          {
          return false; 
          }
        });
        $(document).on('click', '.sifre', function(e){
          e.preventDefault();
          var user_id = $(this).attr("data-id");
          if(confirm(user_id +" ID'li kullanıcının şifresini sıfırlamak istediğinize emin misiniz?"))
          {
              $.ajax({
                url:"ajax/kullanici-sifre-sifirla.php",
                method:"POST",
                data:{id:user_id},
                success:function(response)
                {              
                  const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                  });
                    var jsonData = JSON.parse(response);
                    if (jsonData.success == "1")
                    {
                      Toast.fire({
                          icon: 'success',
                          title: jsonData.adi
                        })
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
          }
          else
          {
          return false; 
          }
        });
    });
</script>
<!-- Sayfaya özgü linkler bitiş -->
<?php
include("sabit/altscript.php");
?>