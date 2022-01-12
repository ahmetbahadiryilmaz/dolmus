<?php 
        include ("../inc/head.php");

        if ($_SESSION['adi']==null||  $_SESSION['adi'] == "")
        {
            header("location:../giris.php");
            exit;
        }

        if($_POST)
        {
            $id =$_POST["id"];
            $kim = $_SESSION['adi'] .'  id: '.$_SESSION['id'] ; 
            $dateTime = date("Y-m-d H:i:s");
            $kullanici = new kullanicilar();
            $kullanici ->id =$id;
            $kullanici ->sifre =md5("123");
            $kullanici ->_updatedby = $kim;
            $kullanici ->_updateTime = $dateTime;
            $sonuc = $kullanici->kullaniciSifreSifirla();
            if($sonuc)
                echo json_encode(array('success' => 1, 'adi' =>'Kullanıcı şifre sıfırlama işlemi başarıyla gerçekleşti.'));
            else
                echo json_encode(array('success' => 2, 'adi' =>'Kullanıcı şifre sıfırlama işlemi sırasında bir hata ile karşılaşıldı.'));
           
        }
?>