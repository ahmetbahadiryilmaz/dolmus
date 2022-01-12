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
                $tur ->id = $id;
                $tur ->adi =$adi;
                $tur ->_updatedby = $kim;
                $tur ->_updateTime = $dateTime;
                $sonuc = $tur->turDuzenle();
                if($sonuc)
                    echo json_encode(array('success' => 1, 'adi' =>'Grup düzenleme işlemi başarıyla gerçekleşti.'));
                else
                    echo json_encode(array('success' => 2, 'adi' =>'Grup düzenlerken bir hata ile karşılaşıldı.'));
               
            }
        }
?>