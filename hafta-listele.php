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
            <h1 class="m-0 text-dark">Hafta Listesi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Ana sayfa</a></li>
              <li class="breadcrumb-item active">Haftalar</li>
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
              <div class="row">
                <div class="col-md-1">
                  <a href="hafta-ekle.php" class="btn btn-success">
                    Yeni
                  </a>
                </div>
                <div class="col-md-9">
                </div>
                <div class="col-md-2">
                  <select id="kategori_id" name="kategori_id" class="form-control select2bs4" style="width: 100%;">
                  <option>1. Hafta</option>
                  <option>2. Hafta</option>
                  <option>3. Hafta</option>
                  <option selected>4. Hafta</option>
                  </select>
                </div>
              </div>
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
                        <th  width="10%">Saat</th>
                        <th  width="10%">Pazartesi</th>
                        <th  width="10%">Salı</th>
                        <th  width="10%">Çarşamba</th>
                        <th  width="10%">Perşembe</th>
                        <th  width="10%">Cuma</th>
                        <th  width="10%">Cumartesi</th>
                        <th  width="10%">Pazar</th>
                      </tr>
                      <tr>
                        <td>10:00</td>
                        <td>33abc01</td>
                        <td>33abc02</td>
                        <td>33abc03</td>
                        <td>33abc04</td>
                        <td>33abc05</td>
                        <td>33abc06</td>
                        <td>33abc07</td>
                      </tr>
                      <tr>
                        <td>11:00</td>
                        <td>33abc01</td>
                        <td>33abc02</td>
                        <td>33abc03</td>
                        <td>33abc04</td>
                        <td>33abc05</td>
                        <td>33abc06</td>
                        <td>33abc07</td>
                      </tr>
                      <tr>
                        <td>12:00</td>
                        <td>33abc01</td>
                        <td>33abc02</td>
                        <td>33abc03</td>
                        <td>33abc04</td>
                        <td>33abc05</td>
                        <td>33abc06</td>
                        <td>33abc07</td>
                      </tr>
                      <tr>
                        <td>13:00</td>
                        <td>33abc01</td>
                        <td>33abc02</td>
                        <td>33abc03</td>
                        <td>33abc04</td>
                        <td>33abc05</td>
                        <td>33abc06</td>
                        <td>33abc07</td>
                      </tr>
                      <tr>
                        <td>14:00</td>
                        <td>33abc01</td>
                        <td>33abc02</td>
                        <td>33abc03</td>
                        <td>33abc04</td>
                        <td>33abc05</td>
                        <td>33abc06</td>
                        <td>33abc07</td>
                      </tr>
                      <tr>
                        <td>15:00</td>
                        <td>33abc01</td>
                        <td>33abc02</td>
                        <td>33abc03</td>
                        <td>33abc04</td>
                        <td>33abc05</td>
                        <td>33abc06</td>
                        <td>33abc07</td>
                      </tr>
                      <tr>
                        <td>16:00</td>
                        <td>33abc01</td>
                        <td>33abc02</td>
                        <td>33abc03</td>
                        <td>33abc04</td>
                        <td>33abc05</td>
                        <td>33abc06</td>
                        <td>33abc07</td>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th  width="10%">Saat</th>
                        <th  width="10%">Pazartesi</th>
                        <th  width="10%">Salı</th>
                        <th  width="10%">Çarşamba</th>
                        <th  width="10%">Perşembe</th>
                        <th  width="10%">Cuma</th>
                        <th  width="10%">Cumartesi</th>
                        <th  width="10%">Pazar</th>
                      </tr>
                    </thead>
                </table>
            </div>
            <button type="button" id="modal222" name="modal222" style ="display:none;"class="btn btn-default" data-toggle="modal" data-target="#modal-default">ss</button>
      </div>
     <!-- /.card-body -->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">İçerik</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p id="icerikmodal" name="icerikmodal"></p>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
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
<!-- Select2 -->
<script src="eklenti/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    $('.select2').select2();
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  })
</script>
<!--
<script>
    $(document).ready(function() {
        $('#example1 tfoot th').each( function () {
          var title = $(this).text();
          $(this).html( '<input type="text" class="form-control" placeholder="'+title+' ara" />' );
        } );
        var table = $('#example1').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url':'ajax/tweet-listele.php'
            },
            'columns': [
              { data: 'id' },
              { data: 'kategori_adi' },
              { data: 'dizifilm_adi' },
              { data: 'tur_adi' },
              { data: 'icerik' },
              { data: 'skt' },
              { data: 'sayi' },
              { data: 'durum' },
              { data: 'resim1' },
              { data: 'resim2' },
              { data: 'resim3' },
              { data: 'resim4' },
              {
                mRender:function(data,type,row)
                {
                  return '<a href="tweet-duzenle.php?id=' + row.id +'" class="btn btn-info" style="width:100px;display:none">Düzenle</a> <a href="" data-id="' + row.id +'" class="delete btn btn-danger" style="width:100px;">Sil</a> <a href="" data-id="' + row.id +'" class="sifre btn btn-warning" style="width:100px;">Test</a>';
                }
              }
            ],		
            "order": [[ 0, "desc" ]],
            "columnDefs":[
              {
                "targets":[12],
                "orderable":false,
              },
              {"targets": [4],
                    render: function ( data, type, row ) {
                      var cikti ='<a href="#" data-id="' + row.id +'" class="oku btn btn-info" style="width:100px;">Oku</a>';
                      return cikti;
                    }
              },
              {"targets": [8,9,10,11],
                    render: function ( data, type, row ) {
                      var cikti ='';
                      if(data !=null )
                      {
                        cikti ='<img src="resimler/'+ data +'" alt="User Image" height="100" width="100">';
                      }
                      else 
                      {
                        cikti ='<img src="varsayilan/img/user.jpg" alt="User Image" height="100" width="100">';
                      }
                      return cikti;
                    }
              },
              {"targets": 7,
                    render: function ( data, type, row ) {
                      var color = 'black';
                      if (data == 'Pasif') {
                        color = 'red';
                      } 
                      else if (data == 'Aktif')
                      {
                        color = 'green';
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
        table.columns().every(function () {
                var table = this;
                $('input', this.footer()).on('keyup change', function () {
                    if (table.search() !== this.value) {
                    	   table.search(this.value).draw();
                    }
                });
            });
        $(document).on('click', '.delete', function(e){
          e.preventDefault();
          var user_id = $(this).attr("data-id");
          if(confirm(user_id +" ID'li veriyi silmek istediğinize emin misiniz?"))
          {
              $.ajax({
                url:"ajax/tweet-sil.php",
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
                      setTimeout("location.href = 'tweet-listele.php'",1500);
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
		  $.ajax({
			url:"https://twitter.ekullanici.com/cektest.php?id="+user_id,
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
			  Toast.fire({
				  icon: 'success',
				  title: 'Test hesabını kontrol edin'
				})
			}
		  });

        });
		$(document).on('click', '.oku', function(){
          var user_id = $(this).attr("data-id");
          
              $.ajax({
                url:"ajax/cek-tweet.php",
                method:"POST",
                data:{id:user_id},
                success:function(response)
                {       
                    var jsonData = JSON.parse(response);
                    console.log(jsonData.sonuc);
                    $("#icerikmodal").text(jsonData.sonuc);
                    $( "#modal222" ).trigger( "click" );
                }
              });
        });
    });
</script>-->
<!-- Sayfaya özgü linkler bitiş -->
<?php
include("sabit/altscript.php");
?>