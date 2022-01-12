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
            if(!isset($_POST["kategori_id"]))
                $kategori_id = "";
            else
                $kategori_id =$_POST["kategori_id"];

            if(!isset($_POST["dizifilm_id"]))
                $dizifilm_id = "";
            else
                $dizifilm_id =$_POST["dizifilm_id"];
            
            if(!isset($_POST["tur_id"]))
                $tur_id = "";
            else
                $tur_id =$_POST["tur_id"];
              

            $icerik = $_POST["icerik"] == "" ? null : $_POST["icerik"];
            $resim1 =$_POST["resim1"] == "" ? null : $_POST["resim1"];
            $resim2 =$_POST["resim2"] == "" ? null : $_POST["resim2"];
            $resim3 =$_POST["resim3"] == "" ? null : $_POST["resim3"];
            $resim4 =$_POST["resim4"] == "" ? null : $_POST["resim4"];
            $skt =$_POST["skt"];
            $skt = str_replace("T", " ", $skt);
            $sayi =$_POST["sayi"];
            $durum =$_POST["durum"];


            $kim = $_SESSION['adi'] .'  id: '.$_SESSION['id'] ; 
            $dateTime = date("Y-m-d H:i:s");

            if(empty($kategori_id) || empty($dizifilm_id) || empty($tur_id) || empty($skt))
            {
                echo json_encode(array('success' => 3, 'adi' =>'Lütfen boş alanları doldurun.'));
            }
            else
            {
                $tweet = new tweet();
                $tweet ->kategori_id =$kategori_id;
                $tweet ->dizifilm_id =$dizifilm_id;
                $tweet ->tur_id =$tur_id;
                $tweet ->icerik =$icerik;
                $tweet ->resim1 =$resim1;
                $tweet ->resim2 =$resim2;
                $tweet ->resim3 =$resim3;
                $tweet ->resim4 =$resim4;
                $tweet ->skt =$skt;
                $tweet ->sayi =$sayi;
                $tweet ->durum =$durum;
                $tweet ->_createdby = $kim;
                $tweet ->_createTime = $dateTime;
                $tweet ->_deleted = 0;
                $sonuc = $tweet->tweetDuzenle();
                if($sonuc)
                    echo json_encode(array('success' => 1, 'adi' =>'Tweet düzenleme işlemi başarıyla gerçekleşti.'));
                else
                    echo json_encode(array('success' => 2, 'adi' =>'Tweet düzenlerken bir hata ile karşılaşıldı.'));
               
            }
        }
?>