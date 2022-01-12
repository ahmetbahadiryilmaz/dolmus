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
            $tweet = new tweet();
            $tweet ->id =$id;
            $tweet ->_deleted =1;
            $tweet ->_deletedby = $kim;
            $tweet ->_deletedTime = $dateTime;
            $sonuc = $tweet->tweetSil();
            if($sonuc)
                echo json_encode(array('success' => 1, 'adi' =>'Tweet silme işlemi başarıyla gerçekleşti.'));
            else
                echo json_encode(array('success' => 2, 'adi' =>'Tweet silinirken bir hata ile karşılaşıldı.'));
           
        }
?>