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
                $plaka ->adi =$adi;
                $plaka ->tur_id =$tur_id;
                $plaka ->_createdby = $kim;
                $plaka ->_createTime = $dateTime;
                $plaka ->_deleted = 0;
                $sonuc = $plaka->plakaEkle();
                if($sonuc)
                    echo json_encode(array('success' => 1, 'adi' =>'Plaka ekleme işlemi başarıyla gerçekleşti.'));
                else
                    echo json_encode(array('success' => 2, 'adi' =>'Plaka eklerken bir hata ile karşılaşıldı.'));
               
            }
        }
?>