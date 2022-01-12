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
            $gg = new gg();
            $gg ->id =$id;
            $gg ->_deleted =1;
            $gg ->_deletedby = $kim;
            $gg ->_deletedTime = $dateTime;
            $sonuc = $gg->ggSil();
            if($sonuc)
                echo json_encode(array('success' => 1, 'adi' =>'Gelir/Gider silme işlemi başarıyla gerçekleşti.'));
            else
                echo json_encode(array('success' => 2, 'adi' =>'Gelir/Gider silinirken bir hata ile karşılaşıldı.'));
           
        }
?>