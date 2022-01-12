<?php 
include("sabit/ustlink.php");
include("inc/yetkikontrol.php");
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
            <h1 class="m-0 text-dark">Hafta Ekle</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="hafta-listele.php">Hafta Listesi</a></li>
              <li class="breadcrumb-item active">Hafta Ekle</li>
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
                <h3 class="card-title">Hafta Ekle</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div id="accordion">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                          Pazartesi
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-sm-3">
                              <label for="saat">Başlangıç saati</label>
                              <select id="saat" name="saat" class="form-control select2bs4" style="width: 100%;">
                              <?php 
                                  for ($i=1; $i < 25; $i++) 
                                  { 
                                    # code...
                                    echo "<option>".$i."</option>";
                                  }
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-sm-3">
                              <label for="aralik">Boşluk(Dakika)</label>
                              <select id="aralik" name="aralik" class="form-control select2bs4" style="width: 100%;">
                              <?php 
                                  for ($i=1; $i < 61; $i++) 
                                  { 
                                    # code...
                                    echo "<option>".$i."</option>";
                                  }
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-sm-12">
                              <label for="tur_id">Plakalar  (*)</label>
                              <select id="tur_id" name="tur_id" class="form-control select2bs4" style="width: 100%;"  multiple="multiple">
                              </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!---------------------------------->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne2">
                          Salı
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne2" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-sm-3">
                              <label for="saat">Başlangıç saati</label>
                              <select id="saat" name="saat" class="form-control select2bs4" style="width: 100%;">
                              <?php 
                                  for ($i=1; $i < 25; $i++) 
                                  { 
                                    # code...
                                    echo "<option>".$i."</option>";
                                  }
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-sm-3">
                              <label for="aralik">Boşluk(Dakika)</label>
                              <select id="aralik" name="aralik" class="form-control select2bs4" style="width: 100%;">
                              <?php 
                                  for ($i=1; $i < 61; $i++) 
                                  { 
                                    # code...
                                    echo "<option>".$i."</option>";
                                  }
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-sm-12">
                              <label for="tur_id">Plakalar  (*)</label>
                              <select id="tur_id" name="tur_id" class="form-control select2bs4" style="width: 100%;"  multiple="multiple">
                              </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                                    <!---------------------------------->
                                    <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne3">
                          Çarşamba
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne3" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-sm-3">
                              <label for="saat">Başlangıç saati</label>
                              <select id="saat" name="saat" class="form-control select2bs4" style="width: 100%;">
                              <?php 
                                  for ($i=1; $i < 25; $i++) 
                                  { 
                                    # code...
                                    echo "<option>".$i."</option>";
                                  }
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-sm-3">
                              <label for="aralik">Boşluk(Dakika)</label>
                              <select id="aralik" name="aralik" class="form-control select2bs4" style="width: 100%;">
                              <?php 
                                  for ($i=1; $i < 61; $i++) 
                                  { 
                                    # code...
                                    echo "<option>".$i."</option>";
                                  }
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-sm-12">
                              <label for="tur_id">Plakalar  (*)</label>
                              <select id="tur_id" name="tur_id" class="form-control select2bs4" style="width: 100%;"  multiple="multiple">
                              </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                                    <!---------------------------------->
                                    <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne4">
                          Perşembe
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne4" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-sm-3">
                              <label for="saat">Başlangıç saati</label>
                              <select id="saat" name="saat" class="form-control select2bs4" style="width: 100%;">
                              <?php 
                                  for ($i=1; $i < 25; $i++) 
                                  { 
                                    # code...
                                    echo "<option>".$i."</option>";
                                  }
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-sm-3">
                              <label for="aralik">Boşluk(Dakika)</label>
                              <select id="aralik" name="aralik" class="form-control select2bs4" style="width: 100%;">
                              <?php 
                                  for ($i=1; $i < 61; $i++) 
                                  { 
                                    # code...
                                    echo "<option>".$i."</option>";
                                  }
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-sm-12">
                              <label for="tur_id">Plakalar  (*)</label>
                              <select id="tur_id" name="tur_id" class="form-control select2bs4" style="width: 100%;"  multiple="multiple">
                              </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                                    <!---------------------------------->
                                    <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne5">
                          Cuma
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne5" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-sm-3">
                              <label for="saat">Başlangıç saati</label>
                              <select id="saat" name="saat" class="form-control select2bs4" style="width: 100%;">
                              <?php 
                                  for ($i=1; $i < 25; $i++) 
                                  { 
                                    # code...
                                    echo "<option>".$i."</option>";
                                  }
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-sm-3">
                              <label for="aralik">Boşluk(Dakika)</label>
                              <select id="aralik" name="aralik" class="form-control select2bs4" style="width: 100%;">
                              <?php 
                                  for ($i=1; $i < 61; $i++) 
                                  { 
                                    # code...
                                    echo "<option>".$i."</option>";
                                  }
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-sm-12">
                              <label for="tur_id">Plakalar  (*)</label>
                              <select id="tur_id" name="tur_id" class="form-control select2bs4" style="width: 100%;"  multiple="multiple">
                              </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                                    <!---------------------------------->
                                    <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne6">
                          Cumartesi
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne6" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-sm-3">
                              <label for="saat">Başlangıç saati</label>
                              <select id="saat" name="saat" class="form-control select2bs4" style="width: 100%;">
                              <?php 
                                  for ($i=1; $i < 25; $i++) 
                                  { 
                                    # code...
                                    echo "<option>".$i."</option>";
                                  }
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-sm-3">
                              <label for="aralik">Boşluk(Dakika)</label>
                              <select id="aralik" name="aralik" class="form-control select2bs4" style="width: 100%;">
                              <?php 
                                  for ($i=1; $i < 61; $i++) 
                                  { 
                                    # code...
                                    echo "<option>".$i."</option>";
                                  }
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-sm-12">
                              <label for="tur_id">Plakalar  (*)</label>
                              <select id="tur_id" name="tur_id" class="form-control select2bs4" style="width: 100%;"  multiple="multiple">
                              </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!---------------------------------->
                <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne7">
                          Pazar
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne7" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-sm-3">
                              <label for="saat">Başlangıç saati</label>
                              <select id="saat" name="saat" class="form-control select2bs4" style="width: 100%;">
                              <?php 
                                  for ($i=1; $i < 25; $i++) 
                                  { 
                                    # code...
                                    echo "<option>".$i."</option>";
                                  }
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-sm-3">
                              <label for="aralik">Boşluk(Dakika)</label>
                              <select id="aralik" name="aralik" class="form-control select2bs4" style="width: 100%;">
                              <?php 
                                  for ($i=1; $i < 61; $i++) 
                                  { 
                                    # code...
                                    echo "<option>".$i."</option>";
                                  }
                              ?>
                              </select>
                          </div>
                          <div class="form-group col-sm-12">
                              <label for="tur_id">Plakalar  (*)</label>
                              <select id="tur_id" name="tur_id" class="form-control select2bs4" style="width: 100%;"  multiple="multiple">
                              </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" id="kaydet" name="kaydet" class="btn btn-success btn-block"  >Kaydet</button>  
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


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
    $('.select2').select2();
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
    $("#kategori_id").select2({
        minimumInputLength: 0,
        language: "tr",
        width: 'resolve',
        containerCss : {"display":"block"},
        dropdownAutoWidth : true,
        placeholder: "Seçim yapınız",
        ajax: {
            url: 'ajax/cek-kategori.php',
            dataType: 'json',
            type: "POST",
            data: function (term) {
                return {
                    term: term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.adi,
                            id: item.id
                        }
                    })
                };
            }

          }
      });
      $("#tur_id").select2({
        minimumInputLength: 0,
        language: "tr",
        width: 'resolve',
        containerCss : {"display":"block"},
        dropdownAutoWidth : true,
        placeholder: "Seçim yapınız",
        ajax: {
            url: 'ajax/cek-tur.php',
            dataType: 'json',
            type: "POST",
            data: function (term) {
                return {
                    term: term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.adi,
                            id: item.id
                        }
                    })
                };
            }

          }
      });
      $("#dizifilm_id").select2({
        minimumInputLength: 1,
        language: "tr",
        width: 'resolve',
        containerCss : {"display":"block"},
        dropdownAutoWidth : true,
        placeholder: "Seçim yapınız",
        ajax: {
            url: 'ajax/cek-dizifilm.php',
            dataType: 'json',
            type: "POST",
            data: function (term) {
                return {
                    term: term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.adi,
                            id: item.id
                        }
                    })
                };
            }

          }
      });
      $("#yukle1").change(function(e){//her hangi bir şey seçilirse
          e.preventDefault();
              const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                          });
          var resim=document.getElementById ("yukle1");//resime eriş
          if (resim.files && resim.files[0]){//veri var mı kontrol ediyoruz.
            var veri=new FileReader();//apiyi başlatıyoruz.
            veri.onload=function() {//aşağıda dosya verisini okuyoruz.Eğer veri okunmuşsa
              var resimveri=veri.result;//veriyi al
                $.post("ajax/resimyukle.php",
                {"veri":resimveri},
                function(resim, status, jqXHR){//kayit.php yolluyoruz.

                  var jsonData = JSON.parse(resim);
                  if (jsonData.success == 1)
                  {
                    Toast.fire({
                                icon: jsonData.icon,
                                title: jsonData.adi
                    });
                    window.onbeforeunload = function() { return "are you sure?"; }
                  $("#resim1").val(jsonData.resimadi)  ;
                  }
                  else
                  {
                    Toast.fire({
                                icon: jsonData.icon,
                                title: jsonData.adi
                    });
                  }
                })
            }
            veri.readAsDataURL(resim.files[0]);//veriyi okuyoruz.
          }
      });
      $("#yukle2").change(function(e){//her hangi bir şey seçilirse
          e.preventDefault();
              const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                          });
          var resim=document.getElementById ("yukle2");//resime eriş
          if (resim.files && resim.files[0]){//veri var mı kontrol ediyoruz.
            var veri=new FileReader();//apiyi başlatıyoruz.
            veri.onload=function() {//aşağıda dosya verisini okuyoruz.Eğer veri okunmuşsa
              var resimveri=veri.result;//veriyi al
                $.post("ajax/resimyukle.php",
                {"veri":resimveri},
                function(resim, status, jqXHR){//kayit.php yolluyoruz.

                  var jsonData = JSON.parse(resim);
                  if (jsonData.success == 1)
                  {
                    Toast.fire({
                                icon: jsonData.icon,
                                title: jsonData.adi
                    });
                    window.onbeforeunload = function() { return "are you sure?"; }
                  $("#resim2").val(jsonData.resimadi)  ;
                  }
                  else
                  {
                    Toast.fire({
                                icon: jsonData.icon,
                                title: jsonData.adi
                    });
                  }
                })
            }
            veri.readAsDataURL(resim.files[0]);//veriyi okuyoruz.
          }
      });
      $("#yukle3").change(function(e){//her hangi bir şey seçilirse
          e.preventDefault();
              const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                          });
          var resim=document.getElementById ("yukle3");//resime eriş
          if (resim.files && resim.files[0]){//veri var mı kontrol ediyoruz.
            var veri=new FileReader();//apiyi başlatıyoruz.
            veri.onload=function() {//aşağıda dosya verisini okuyoruz.Eğer veri okunmuşsa
              var resimveri=veri.result;//veriyi al
                $.post("ajax/resimyukle.php",
                {"veri":resimveri},
                function(resim, status, jqXHR){//kayit.php yolluyoruz.

                  var jsonData = JSON.parse(resim);
                  if (jsonData.success == 1)
                  {
                    Toast.fire({
                                icon: jsonData.icon,
                                title: jsonData.adi
                    });
                    window.onbeforeunload = function() { return "are you sure?"; }
                  $("#resim3").val(jsonData.resimadi)  ;
                  }
                  else
                  {
                    Toast.fire({
                                icon: jsonData.icon,
                                title: jsonData.adi
                    });
                  }
                })
            }
            veri.readAsDataURL(resim.files[0]);//veriyi okuyoruz.
          }
      });
      $("#yukle4").change(function(e){//her hangi bir şey seçilirse
          e.preventDefault();
              const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                          });
          var resim=document.getElementById ("yukle4");//resime eriş
          if (resim.files && resim.files[0]){//veri var mı kontrol ediyoruz.
            var veri=new FileReader();//apiyi başlatıyoruz.
            veri.onload=function() {//aşağıda dosya verisini okuyoruz.Eğer veri okunmuşsa
              var resimveri=veri.result;//veriyi al
                $.post("ajax/resimyukle.php",
                {"veri":resimveri},
                function(resim, status, jqXHR){//kayit.php yolluyoruz.

                  var jsonData = JSON.parse(resim);
                  if (jsonData.success == 1)
                  {
                    Toast.fire({
                                icon: jsonData.icon,
                                title: jsonData.adi
                    });
                    window.onbeforeunload = function() { return "are you sure?"; }
                  $("#resim4").val(jsonData.resimadi)  ;
                  }
                  else
                  {
                    Toast.fire({
                                icon: jsonData.icon,
                                title: jsonData.adi
                    });
                  }
                })
            }
            veri.readAsDataURL(resim.files[0]);//veriyi okuyoruz.
          }
      });
  })
</script>
<script>
    function countChar(val) {
      var len = val.value.length;
      $('#demo').text(len);
    };
    //Emoji ekleme

    // tweet içeriğine hashtag eklenme işlemleri
    $('#addhashtagWoman').click(function (e) {
        var tag =  '👩';
        var tweet =  $('#icerik').val() + tag;
        $('#icerik').val(tweet);
        e.preventDefault();
    });
	$('#addhashtagKalp').click(function (e) {
        var tag =  '❤️';
        var tweet =  $('#icerik').val() + tag;
        $('#icerik').val(tweet);
        e.preventDefault();
    });

    $('#addhashtagMan').click(function (e) {
        var tag =  '🙍‍♂️';
        var tweet =  $('#icerik').val() + tag;
        $('#icerik').val(tweet);
        e.preventDefault();
    });
    $('#addhashtagCamera').click(function (e) {
        var tag =  '🎥';
        var tweet =  $('#icerik').val() + tag;
        $('#icerik').val(tweet);
        e.preventDefault();
    });
    $('#addhashtagMoon').click(function (e) {
        var tag =  '🌙';
        var tweet =  $('#icerik').val() + tag;
        $('#icerik').val(tweet);
        e.preventDefault();
    });
    $('#addhashtagSun').click(function (e) {
        var tag =  '☀';
        var tweet =  $('#icerik').val() + tag;
        $('#icerik').val(tweet);
        e.preventDefault();
    });
    $('#addhashtagTime').click(function (e) {
        var tag =  '🕒';
        var tweet =  $('#icerik').val() + tag;
        $('#icerik').val(tweet);
        e.preventDefault();
    });
    // tweet içeriğine hashtag eklenme işlemleri
    $('#addHashtag').click(function (e) {
        var tag =  $("[id='dizifilm_id'] option:selected").text().trim().replace(/\s+/g, "")
        .replace("'","")
        .replace(":","")
        .replace(",","")
        .replace("\;","")
        .replace(".","");
        if ($('#kategori_id').val() === '1'){
            tag = '📺 #' + tag;
        }
        else if ($('#kategori_id').val() === '2'){
            tag = '🎬 #' + tag;
        }
        else {
            tag = '#' + tag;
        }
        var tweet =  $('#icerik').val() + '\n' +tag;
        $('#icerik').val(tweet);
        e.preventDefault();
      });
</script>
<script type="text/javascript">
$(document).ready(function() {
  $('#kaydet').click(function(e) {
      e.preventDefault();
      const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                  });

      // Veriler toplanacak
      var kategori_iddata = $('#kategori_id').select2('data')
      var kategori_id = kategori_iddata[0].id;
      var dizifilm_iddata = $('#dizifilm_id').select2('data')
      var dizifilm_id = dizifilm_iddata[0].id;
      var tur_iddata = $('#tur_id').select2('data')
      var tur_id = tur_iddata[0].id;
      var icerik= $("#icerik").val();
      var resim1= $("#resim1").val();
      var resim2= $("#resim2").val();
      var resim3= $("#resim3").val();
      var resim4= $("#resim4").val();
      var skt = $("#skt").val();
      var sayi= $("#sayi").val();
      var durumdata = $('#durum').select2('data')
      var durum = durumdata[0].text;
      $.post('ajax/tweet-ekle.php',   // url
      {
        kategori_id: kategori_id,
        dizifilm_id:dizifilm_id,
        tur_id: tur_id,
        icerik:icerik,
        resim1: resim1,
        resim2:resim2,
        resim3:resim3,
        resim4:resim4,
        skt:skt,
        sayi:sayi,
        durum: durum,
      },
      function(data, status, jqXHR) 
      {// success callback
        var jsonData = JSON.parse(data);
        if(jsonData.success == 1)
        {
          Toast.fire({
                      icon: jsonData.icon,
                      title: jsonData.adi
          })
          window.onbeforeunload = function() { return null; }
          setTimeout("location.href = 'tweet-listele.php'",2000);
        }
        else 
        {
          Toast.fire({
                      icon: jsonData.icon,
                      title: jsonData.adi
          })
        }
      })    
    });
	  $('#dizikaydet').click(function(e) {
      e.preventDefault();
      const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                  });

      // Veriler toplanacak
	  var adi= $("#adi").val();

      $.post('ajax/dizifilm-ekle.php',   // url
      {
        adi: adi,
      },
      function(data, status, jqXHR) 
      {// success callback
		var jsonData = JSON.parse(data);
		// user is logged in successfully in the back-end
		// let's redirect
		if (jsonData.success == "1")
		{
		  Toast.fire({
			  icon: 'success',
			  title: jsonData.adi
			})
			$("#adi").val("");
		}
		else if (jsonData.success == "3")
		{
		  Toast.fire({
			icon: 'info',
			title: jsonData.adi
		  })
		}
		else if (jsonData.success == "4")
		{
		  Toast.fire({
			icon: 'warning',
			title: jsonData.adi
		  })
		}
		else if (jsonData.success == "5")
		{
		  Toast.fire({
			icon: 'warning',
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
      })    
    });
});
</script>

<!-- Sayfaya özgü linkler bitiş -->
<?php
include("sabit/altscript.php");
?>