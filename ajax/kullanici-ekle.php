<?php 
        include ("../inc/head.php");

        if ($_SESSION['adi']==null||  $_SESSION['adi'] == "")
        {
            header("location:../giris.php");
            exit;
        }

        if($_POST)
        {
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
                $kullanici ->isim =$isim;
                $kullanici ->mail = $mail;
                $kullanici ->yetki = $yetki;
                $kullanici ->sifre = md5("123");
                $kullanici ->_createdby = $kim;
                $kullanici ->_createTime = $dateTime;
                $kullanici ->_deleted = 0;
                $sonuc = $kullanici->kullaniciEkle();
                if($sonuc)
                    echo json_encode(array('success' => 1, 'adi' =>'Kullanıcı ekleme işlemi başarıyla gerçekleşti.'));
                else
                    echo json_encode(array('success' => 2, 'adi' =>'Kullanıcı eklerken bir hata ile karşılaşıldı.'));
               
            }
        }
?>