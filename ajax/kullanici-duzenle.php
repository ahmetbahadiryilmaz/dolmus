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
            $mail =$_POST["mail"];
            $isim =$_POST["isim"];
            $yetki =$_POST["yetki"];
            $kim = $_SESSION['adi'] .'  id: '.$_SESSION['id'] ; 
            $dateTime = date("Y-m-d H:i:s");

            if(empty($mail) || $mail == null || empty($isim) || $isim == null)
            {
                echo json_encode(array('success' => 3, 'adi' =>'Lütfen boş alanları doldurun.'));
            }
            else
            {
                $kullanici = new kullanicilar();
                $kullanici ->id = $id;
                $kullanici ->isim =$isim;
                $kullanici ->mail = $mail;
                $kullanici ->yetki = $yetki;
                $kullanici ->_updatedby = $kim;
                $kullanici ->_updateTime = $dateTime;
                $sonuc = $kullanici->kullaniciDuzenle();
                if($sonuc)
                    echo json_encode(array('success' => 1, 'adi' =>'Kullanıcı düzenleme işlemi başarıyla gerçekleşti.'));
                else
                    echo json_encode(array('success' => 2, 'adi' =>'Kullanıcı düzenlerken bir hata ile karşılaşıldı.'));
               
            }
        }
?>