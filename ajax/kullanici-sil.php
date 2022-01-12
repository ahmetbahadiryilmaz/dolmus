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
            $kullanici ->_deleted =1;
            $kullanici ->_deletedby = $kim;
            $kullanici ->_deletedTime = $dateTime;
            $sonuc = $kullanici->kullaniciSil();
            if($sonuc)
                echo json_encode(array('success' => 1, 'adi' =>'Kullanıcı silme işlemi başarıyla gerçekleşti.'));
            else
                echo json_encode(array('success' => 2, 'adi' =>'Kullanıcı silinirken bir hata ile karşılaşıldı.'));
           
        }
?>