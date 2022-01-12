<?php 
        include ("../inc/head.php");

        if ($_SESSION['adi']==null||  $_SESSION['adi'] == "")
        {
            header("location:../giris.php");
            exit;
        }

        if($_POST)
        {
            $adi =$_POST["adi"];
            $kim = $_SESSION['adi'] .'  id: '.$_SESSION['id'] ; 
            $dateTime = date("Y-m-d H:i:s");

            if(empty($adi) || $adi == null)
            {
                echo json_encode(array('success' => 3, 'adi' =>'Lütfen boş alanları doldurun.'));
            }
            else
            {
                $tur = new turler();
                $tur ->adi =$adi;
                $tur ->_createdby = $kim;
                $tur ->_createTime = $dateTime;
                $tur ->_deleted = 0;
                $sonuc = $tur->turEkle();
                if($sonuc)
                    echo json_encode(array('success' => 1, 'adi' =>'Grup ekleme işlemi başarıyla gerçekleşti.'));
                else
                    echo json_encode(array('success' => 2, 'adi' =>'Grup eklerken bir hata ile karşılaşıldı.'));
               
            }
        }
?>