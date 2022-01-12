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
            $plaka = new plaka();
            $plaka ->id =$id;
            $plaka ->_deleted =1;
            $plaka ->_deletedby = $kim;
            $plaka ->_deletedTime = $dateTime;
            $sonuc = $plaka->plakaSil();
            if($sonuc)
                echo json_encode(array('success' => 1, 'adi' =>'Plaka silme işlemi başarıyla gerçekleşti.'));
            else
                echo json_encode(array('success' => 2, 'adi' =>'Plaka silinirken bir hata ile karşılaşıldı.'));
           
        }
?>