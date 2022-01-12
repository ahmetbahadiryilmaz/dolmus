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
            $tur_id =$_POST["tur_id"];
            $kim = $_SESSION['adi'] .'  id: '.$_SESSION['id'] ; 
            $dateTime = date("Y-m-d H:i:s");

            if(empty($adi) || $adi == null)
            {
                echo json_encode(array('success' => 3, 'adi' =>'Lütfen boş alanları doldurun.'));
            }
            else
            {
                $plaka = new plaka();
                $plaka ->id = $id;
                $plaka ->adi =$adi;
                $plaka ->tur_id =$tur_id;
                $plaka ->_updatedby = $kim;
                $plaka ->_updateTime = $dateTime;
                $sonuc = $plaka->plakaDuzenle();
                if($sonuc)
                    echo json_encode(array('success' => 1, 'adi' =>'Plaka düzenleme işlemi başarıyla gerçekleşti.'));
                else
                    echo json_encode(array('success' => 2, 'adi' =>'Plaka düzenlerken bir hata ile karşılaşıldı.'));
               
            }
        }
?>