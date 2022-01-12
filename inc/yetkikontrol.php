<?php 

function yetkiKontrol($gelenYetki)
{
    $yetkiyok =0;
    switch ($gelenYetki) {
        case "Bilinmiyor":
            $yetkiyok =0;
            break;
        case "Muhasebe":
            $yetkiyok =5;
            break;
        case "PM1":
            $yetkiyok =10;
            break;
        case "PM2":
            $yetkiyok =15;
            break;
        case "PM3":
            $yetkiyok =20;
            break;
        case "PME":
            $yetkiyok =25;
            break;
        case "PMD":
            $yetkiyok =30;
            break;
        case "Yönetici":
            $yetkiyok =50;
            break;
        case "Admin":
            $yetkiyok =99;
            break;
    }
    return $yetkiyok;
}
?>