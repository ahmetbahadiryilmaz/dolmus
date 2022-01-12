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
            $tur = new turler();
            $tur ->id =$id;
            $tur ->_deleted =1;
            $tur ->_deletedby = $kim;
            $tur ->_deletedTime = $dateTime;
            $sonuc = $tur->turSil();
            if($sonuc)
                echo json_encode(array('success' => 1, 'adi' =>'Grup silme işlemi başarıyla gerçekleşti.'));
            else
                echo json_encode(array('success' => 2, 'adi' =>'Grup silinirken bir hata ile karşılaşıldı.'));
           
        }
?>