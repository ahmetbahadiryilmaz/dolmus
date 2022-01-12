<?php

class  ortak_sutunlar
{
    public $id;
    public $_createdby;
    public $_createTime;
    public $_updatedby;
    public $_updateTime;
    public $_deleted;
    public $_deletedby;
    public $_deletedTime;
    public function __construct($id = null,$_createdby = null, $_createTime = null ,$_updatedby = null,$_updateTime = null,$_deleted = null,$_deletedby = null,$_deletedTime = null) {
        $this->id = $id;
        $this->_createdby = $_createdby;
        $this->_createTime = $_createTime;
        $this->_updatedby = $_updatedby;
        $this->_updateTime = $_updateTime;
        $this->_deleted = $_deleted;
        $this->_deletedby = $_deletedby;
        $this->_deletedTime = $_deletedTime;
    }
}

class  kullanicilar extends ortak_sutunlar
{
    public $isim;
    public $mail;
    public $sifre;
    public $yetki;
    public function __construct( $isim = null,$mail = null,$sifre = null,$yetki =null) {
        $this->isim = $isim;
        $this->mail = $mail;
        $this->sifre = $sifre;
        $this->yetki = $yetki;
    }
    public function data(){
        $datar =[];
        $data =  array("isim","mail","sifre","yetki","_createdby","_createTime","_deleted");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }
    public function dataUpdate(){
        $datar =[];
        $data =  array("id","isim","mail","sifre","yetki","_updatedby","_updateTime");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }
    public function dataPassUpdate(){
        $datar =[];
        $data =  array("id","sifre","_updatedby","_updateTime");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }
    public function dataDelete(){
        $datar =[];
        $data =  array("id","_deleted","_deletedby","_deletedTime");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }
    public function dataSifreSifirla(){
        $datar =[];
        $data =  array("id","sifre","_updatedby","_updateTime");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }

    public function kullaniciEkle()
    {
        return db::insert("tb_kullanici", $this->data());
    }
    public function kullaniciDuzenle()
    {
        return db::update("tb_kullanici", $this->dataUpdate());
    }
    public function kullaniciSifreDuzenle()
    {
        return db::update("tb_kullanici", $this->dataPassUpdate());
    }
    public function kullaniciSil()
    {
        return db::update("tb_kullanici", $this->dataDelete());
    }
    public function kullaniciSifreSifirla()
    {
        return db::update("tb_kullanici", $this->dataSifreSifirla());
    }
}
class  turler extends ortak_sutunlar
{
    public $adi;
    public function __construct( $adi = null) {
        $this->adi = $adi;
    }
    public function data(){
        $datar =[];
        $data =  array("adi","_createdby","_createTime","_deleted");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }
    public function dataUpdate(){
        $datar =[];
        $data =  array("id","adi","_updatedby","_updateTime");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }
    public function dataDelete(){
        $datar =[];
        $data =  array("id","_deleted","_deletedby","_deletedTime");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }

    public function turEkle()
    {
        return db::insert("tb_tur", $this->data());
    }
    public function turDuzenle()
    {
        return db::update("tb_tur", $this->dataUpdate());
    }
    public function turSil()
    {
        return db::update("tb_tur", $this->dataDelete());
    }
}
class  plaka extends ortak_sutunlar
{
    public $adi;
    public $tur_id;
    public function __construct( $adi = null, $tur_id = null) {
        $this->adi = $adi;
        $this->tur_id = $tur_id;
    }
    public function data(){
        $datar =[];
        $data =  array("adi","tur_id","_createdby","_createTime","_deleted");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }
    public function dataUpdate(){
        $datar =[];
        $data =  array("id","adi","tur_id","_updatedby","_updateTime");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }
    public function dataDelete(){
        $datar =[];
        $data =  array("id","_deleted","_deletedby","_deletedTime");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }

    public function plakaEkle()
    {
        return db::insert("tb_plaka", $this->data());
    }
    public function plakaDuzenle()
    {
        return db::update("tb_plaka", $this->dataUpdate());
    }
    public function plakaSil()
    {
        return db::update("tb_plaka", $this->dataDelete());
    }
}
class  gg extends ortak_sutunlar
{
    public $adi;
    public $tutar;
    public $tarih;
    public $tur;
    public function __construct( $adi = null,$tutar = null,$tarih = null,$tur = null) {
        $this->adi = $adi;
        $this->tutar = $tutar;
        $this->tarih = $tarih;
        $this->tur = $tur;
    }
    public function data(){
        $datar =[];
        $data =  array("adi","tutar","tarih","tur","_createdby","_createTime","_deleted");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }
    public function dataUpdate(){
        $datar =[];
        $data =  array("id","adi","tutar","tarih","tur","_updatedby","_updateTime");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }
    public function dataDelete(){
        $datar =[];
        $data =  array("id","_deleted","_deletedby","_deletedTime");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }

    public function ggEkle()
    {
        return db::insert("tb_gg", $this->data());
    }
    public function ggDuzenle()
    {
        return db::update("tb_gg", $this->dataUpdate());
    }
    public function ggSil()
    {
        return db::update("tb_gg", $this->dataDelete());
    }
}
class  tweet extends ortak_sutunlar
{
    public $kategori_id; 
    public $dizifilm_id;
    public $tur_id;
    public $icerik;
    public $resim1;
    public $resim2;
    public $resim3;
    public $resim4;
    public $skt;
    public $sayi;
    public $durum;
    public function __construct( $kategori_id = null,$dizifilm_id = null,$tur_id = null,$icerik = null,$resim1 = null,$resim2 = null,$resim3 = null,$resim4 = null,$skt = null,$sayi = null,$durum = null) {
        $this->kategori_id = $kategori_id;
        $this->dizifilm_id = $dizifilm_id;
        $this->tur_id = $tur_id;
        $this->icerik = $icerik;
        $this->resim1 = $resim1;
        $this->resim2 = $resim2;
        $this->resim3 = $resim3;
        $this->resim4 = $resim4;
        $this->skt = $skt;
        $this->sayi = $sayi;
        $this->durum = $durum;
    }
    public function data(){
        $datar =[];
        $data =  array("kategori_id","dizifilm_id","tur_id","icerik","resim1","resim2","resim3","resim4","skt","sayi","durum","_createdby","_createTime","_deleted");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }
    public function dataUpdate(){
        $datar =[];
        $data =  array("id","kategori_id","dizifilm_id","tur_id","icerik","resim1","resim2","resim3","resim4","skt","sayi","durum","_updatedby","_updateTime");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }
    public function dataUpdateBot(){
        $datar =[];
        $data =  array("id","skt","sayi","_updatedby","_updateTime");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }
    public function dataDelete(){
        $datar =[];
        $data =  array("id","_deleted","_deletedby","_deletedTime");
        foreach ($data as $col)   $datar[$col] = $this->{$col} ;
        return $datar;
    }

    public function tweetEkle()
    {
        return db::insert("tb_tweet", $this->data());
    }
    public function tweetDuzenle()
    {
        return db::update("tb_tweet", $this->dataUpdate());
    }
    public function tweetDuzenleBot()
    {
        return db::update("tb_tweet", $this->dataUpdateBot());
    }
    public function tweetSil()
    {
        return db::update("tb_tweet", $this->dataDelete());
    }
}
?>