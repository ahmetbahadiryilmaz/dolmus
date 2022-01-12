<?php 
        include ("../inc/head.php");

        if ($_SESSION['adi']==null||  $_SESSION['adi'] == "")
        {
            header("location:../giris.php");
            exit;
        }

        if($_POST)
        {
            $id=$_SESSION['id'];
            $esifre =$_POST["esifre"];
            $sifre1 =$_POST["sifre1"];
            $sifre2 =$_POST["sifre2"];
            $kim = $_SESSION['adi'] .'  id: '.$_SESSION['id'] ; 
            $dateTime = date("Y-m-d H:i:s");

            if(empty($esifre) || $esifre == null || empty($sifre1) || $sifre1 == null|| empty($sifre2) || $sifre2 == null)
            {
                echo json_encode(array('success' => 3, 'adi' =>'Lütfen boş alanları doldurun.'));
            }
            else
            {
                $eskimd5 =md5($esifre);
                $sql ="SELECT * FROM tb_kullanici WHERE sifre='$eskimd5' and id='$id' and _deleted=0";
                $stmt = db::$conn->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row)
                {
                    if ($sifre1 == $sifre2)
                    {
                        $md5 = md5($sifre1);
                        $kullanici = new kullanicilar();
                        $kullanici ->id          = $id;
                        $kullanici ->sifre       = $md5;
                        $kullanici ->_updatedby  = $kim;
                        $kullanici ->_updateTime = $dateTime;
                        $sonuc = $kullanici->kullaniciSifreDuzenle();
                        if($sonuc)
                            echo json_encode(array('success' => 1, 'adi' =>'Şifre değişikliği işlemi başarılı. Yeniden oturum açmak için yönlendiriliyorsunuz...'));
                        else
                            echo json_encode(array('success' => 2, 'adi' =>'Şifre değiştirilirken bir hata ile karşılaşıldı.'));
                    }
                    else
                    {
                        //şifreler uyuşmuyor
                        echo json_encode(array('success' => 5, 'adi' =>'Yeni şifreler eşleşmiyor.' ));
                    }

                }
                else
                {
                    //Eski şifre yanlış
                    echo json_encode(array('success' => 4, 'adi' =>'Eski şifre hatalı.'));

                }
            }
        }
?>