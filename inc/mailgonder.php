<?php
require __DIR__."/phpmailer/class.phpmailer.php";
error_reporting(0);

function mailGonder($MailId,$baslik,$icerik,$eposta)
{
    require __DIR__."/db.php";
    $sql ="SELECT * FROM mail WHERE id=$MailId";
    $stmt = db::$conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row)
    {
        $mailadi = $row['eposta'];
        $mailsifre = $row['sifre'];
        $sifre_cozuldu = base64_decode($mailsifre);
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0; // Hata ayıklama değişkeni: 1 = hata ve mesaj gösterir, 2 = sadece mesaj gösterir
        $mail->SMTPAuth = true; //SMTP doğrulama olmalı ve bu değer değişmemeli
        $mail->SMTPSecure = 'tls'; // Normal bağlantı için tls , güvenli bağlantı için ssl yazın
        $mail->Host = "smtp.gmail.com"; // Mail sunucusunun adresi (IP de olabilir)
        $mail->Port = 587; // Normal bağlantı için 587, güvenli bağlantı için 465 yazın
        $mail->IsHTML(true);
        $mail->SetLanguage("tr", "phpmailer/language");
        $mail->CharSet  ="utf-8";
        $mail->Username = $mailadi; // Gönderici adresinizin sunucudaki kullanıcı adı (e-posta adresiniz)
       // $mail->Username = "kalitetercume@gmail.com";
       // $mail->Password = "Mersin333*";
        $mail->Password = $sifre_cozuldu; // Mail adresimizin sifresi
        $mail->SetFrom( $mailadi, "Kalite Tercüme"); // Mail atıldığında gorulecek isim ve email (genelde yukarıdaki username kullanılır)
       //$mail->addReplyTo("pm2@kalitetercume.com.tr","PM'");
     //   $mail->SetFrom( "kalitetercume@gmail.com", "Kalite Tercüme"); 
        $mail->Sender = $eposta;
        $mail->AddAddress($eposta); 
       // $mail->AddCC("pm3@kalitetercume.com.tr");// Mailin gönderileceği alıcı adres
        $mail->Subject = $baslik;
        $mail->Body = $icerik; // Mailin içeriği
        if(!$mail->Send())
        {
            echo "Email Gönderim Hatasi: ".$mail->ErrorInfo;
        } 
        else {
                echo 'Başarılı Gönderim.';
        }	
    }		
}		

//https://myaccount.google.com/lesssecureapps bölümünden düşük uygulamara izin verilecek ve imapı aktifleştirilecek
?>


