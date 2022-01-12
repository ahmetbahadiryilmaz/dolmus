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
            $tur =$_POST["tur"];
            $tarih =$_POST["tarih"];
            $tutar =$_POST["tutar"];
            $kim = $_SESSION['adi'] .'  id: '.$_SESSION['id'] ; 
            $dateTime = date("Y-m-d H:i:s");

            if(empty($adi) || $adi == null)
            {
                echo json_encode(array('success' => 3, 'adi' =>'Lütfen boş alanları doldurun.'));
            }
            else
            {
                $gg = new gg();
                $gg ->id = $id;
                $gg ->adi =$adi;
                $gg ->tur =$tur;
                $gg ->tarih =$tarih;
                $gg ->tutar =$tutar;
                $gg ->_updatedby = $kim;
                $gg ->_updateTime = $dateTime;
                $sonuc = $gg->ggDuzenle();
                if($sonuc)
                    echo json_encode(array('success' => 1, 'adi' =>'Gelir/Gider düzenleme işlemi başarıyla gerçekleşti.'));
                else
                    echo json_encode(array('success' => 2, 'adi' =>'Gelir/Gider düzenlerken bir hata ile karşılaşıldı.'));
               
            }
        }
?>