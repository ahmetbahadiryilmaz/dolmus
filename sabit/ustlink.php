<?php 
session_start();
if ($_SESSION['adi']==null||  $_SESSION['adi'] == "")
{
 // echo "<div class='col-sm-12'><p style='color:red'>oturu:".$_SESSION['oturum']." Adi:".$_SESSION['adi']." Eposta:".$_SESSION['eposta']." Şifre:".$_SESSION['sifre']."  </p></div>";
  header("location:giris.php");
  exit;
}
$title           = "ekullanici";
$titlePart1      = "e";
$titlePart2      = "kullanici";
$footerCopyright = "ekullanici";
$footerYear      = "2021";
$footerVersiyon  = "1.0.0.0";
$logoName        = "logo.jpg";
$logoAlt         = "ekullanici";
?>

<!DOCTYPE html>
<html>
<head>
<?php date_default_timezone_set('Europe/Istanbul'); ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <link rel="shortcut icon" href="varsayilan/img/<?php echo $logoName; ?>" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="eklenti/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="eklenti/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="eklenti/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="eklenti/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="varsayilan/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="eklenti/overlayScrollbars/css/OverlayScrollbars.min.css">