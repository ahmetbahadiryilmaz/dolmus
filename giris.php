<?php 

   include ("inc/head.php");
	$title             = "ekullanici";
	$indexphpnamefirst = "e";
	$indexphpnamelast  = "kullanici";
	$logoName          = "logo.jpg";
/*
	if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
		$location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header('HTTP/1.1 301 Moved Permanently');
		header('Location: ' . $location);
		exit;
	}
*/
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <link rel="shortcut icon" href="varsayilan/img/<?php echo $logoName; ?>" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php date_default_timezone_set('Europe/Istanbul'); ?>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="eklenti/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="eklenti/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="varsayilan/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b><?php echo $indexphpnamefirst; ?></b><?php echo $indexphpnamelast; ?></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <p class="login-box-msg">Oturum başlatmak için giriş yapın.</p>
      <form action="giris.php" method="Post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="eposta" name="eposta" placeholder="Eposta">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="sifre" name="sifre" placeholder="Şifre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php


      if($_POST)
      {
        $name =$_POST["eposta"];
        $pass =$_POST["sifre"];
        $md5 = md5($pass);
        if(empty($_POST['eposta']) || empty($_POST['sifre']))
        {
         echo ' <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Bilgilendirme!</h5>
                  Boş alan bırakmayınız. 
                </div>';
        }
        else
        {
                 $query  = db::$conn->prepare("SELECT * FROM tb_kullanici WHERE mail=:mail and sifre=:sifre and _deleted = 0");
              
                 $query->execute(array(
                   "mail"=>$name,
                   "sifre"=>$md5,
                 )); 
                 $row=$query->fetch(PDO::FETCH_ASSOC);
                  $kadi = $row['isim'];
                  $kid = $row['id'];
                  $yetki = $row['yetki'];
                  $profil = $row['profil'];
                 if($kid!=""){
                  session_start();
                  $_SESSION['oturum']=true;
                  $_SESSION['adi']=$kadi;
                  $_SESSION['id']=$kid;
                  $_SESSION['eposta']=$name;	
                  $_SESSION['yetki']=$yetki;
                  $_SESSION['profil']=$profil;
                 
                 header("location:index.php");
                
                 }else{
                  echo ' <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Uyarı!</h5>
                  Oturum açılırken bir sorunla karşılaşıldı.
                  </div>';
                 }
               
        
           /*
         
            */ 
          
        }
      }

?> 
          <!-- /.col -->
            <div>
				<a data-toggle="modal" data-target="#modal-default">Şifremi unuttum.</a>
                <div class="col-4" style="float: right;">
                    <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>                
                </div>
            </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
  <div class="modal fade" id="modal-default">   
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Bilgilendirme</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <label for="icerik">Şifrenizi unuttuğunuz zaman yöneticiniz ya da yazılım ekibinden biri ile iletişime geçmeniz gerekiyor.</label>                          
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


<!-- jQuery -->
<script src="eklenti/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="eklenti/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="varsayilan/js/adminlte.min.js"></script>
</body>
</html>
