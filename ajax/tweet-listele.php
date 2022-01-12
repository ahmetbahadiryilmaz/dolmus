<?php
include ("../inc/head.php");
if ($_SESSION['adi']==null||  $_SESSION['adi'] == "")
{
  header("location:giris.php");
  exit;
}
include("../inc/yetkikontrol.php");
$gelenYetki =$_SESSION['yetki'];
$yetki_seviyesi = yetkiKontrol($gelenYetki);
if ($yetki_seviyesi < 0)
{
  header("location:yetkisizerisim.php");
  exit;
}

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

$searchArray = array();
$searchcolumnarray =" ";
for ($i=0; $i< 12 ; $i++)
{
   $sv = $_POST['columns'][$i]['search']['value'];
   if ($sv != "" || $sv !=null)
   {
      $columnName2 = $_POST['columns'][$i]['data'];
      $cl="";
      switch ($columnName2) {
         case "id":
               $cl ="tb_tweet.id";
             break;
         case "kategori_adi":
               $cl  ="tb_kategori.adi";
             break;
         case "dizifilm_adi":
               $cl  ="tb_dizifilm.adi";
             break;
        case "tur_adi":
              $cl  ="tb_tur.adi";
            break;
         case "icerik":
               $cl  ="tb_tweet.icerik";
             break;
         case "resim1":
               $cl  ="tb_tweet.resim1";
             break;
         case "resim2":
              $cl  ="tb_tweet.resim2";
            break;
        case "resim3":
               $cl  ="tb_tweet.resim3";
             break;
         case "resim4":
               $cl  ="tb_tweet.resim4";
             break;
         case "durum":
               $cl  ="tb_tweet.durum";
             break;
         case "skt":
               $cl  ="tb_tweet.skt";
             break;
         case "sayi":
               $cl  ="tb_tweet.sayi";
             break;
      }
      $searchcolumnarray = $searchcolumnarray . " and " . $cl . " LIKE '%" .$sv ."%'";
   }
}

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " AND (tb_tweet.id LIKE :id OR 
         tb_kategori.adi LIKE :kategori_adi OR  
         tb_dizifilm.adi LIKE :dizifilm_adi OR  
         tb_tur.adi LIKE :tur_adi OR 
         tb_tweet.icerik LIKE :icerik OR 
         tb_tweet.resim1 LIKE :resim1 OR 
         tb_tweet.resim2 LIKE :resim2 OR 
         tb_tweet.resim3 LIKE :resim3 OR 
         tb_tweet.resim4 LIKE :resim4 OR
         tb_tweet.durum LIKE :durum OR 
         tb_tweet.skt LIKE :skt OR 
         tb_tweet.sayi LIKE :sayi  ) ";
   $searchArray = array( 
         'id'=>"%$searchValue%",
         'kategori_adi'=>"%$searchValue%",
         'dizifilm_adi'=>"%$searchValue%",
         'tur_adi'=>"%$searchValue%",
         'icerik'=>"%$searchValue%",
         'resim1'=>"%$searchValue%",
         'resim2'=>"%$searchValue%",
         'resim3'=>"%$searchValue%",
         'resim4'=>"%$searchValue%",
         'durum'=>"%$searchValue%",
         'skt'=>"%$searchValue%",
         'sayi'=>"%$searchValue%",
   );
}

## Total number of records without filtering
$stmt = db::$conn->prepare("SELECT COUNT(tb_tweet.id) AS allcount FROM  tb_tweet  INNER JOIN tb_kategori on tb_tweet.kategori_id = tb_kategori.id INNER JOIN tb_tur on tb_tweet.tur_id = tb_tur.id INNER JOIN tb_dizifilm on tb_tweet.dizifilm_id= tb_dizifilm.id  WHERE tb_tweet._deleted = 0 and tb_dizifilm._deleted = 0 and tb_tur._deleted= 0 and tb_kategori._deleted=0");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt = db::$conn->prepare("SELECT COUNT(*) AS allcount FROM  tb_tweet  INNER JOIN tb_kategori on tb_tweet.kategori_id = tb_kategori.id INNER JOIN tb_tur on tb_tweet.tur_id = tb_tur.id INNER JOIN tb_dizifilm on tb_tweet.dizifilm_id= tb_dizifilm.id  WHERE tb_tweet._deleted = 0 and tb_dizifilm._deleted = 0 and tb_tur._deleted= 0 and tb_kategori._deleted=0".$searchQuery ." ". $searchcolumnarray);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];


## Fetch records
$stmt = db::$conn->prepare("SELECT tb_tweet.id as id , tb_kategori.adi as kategori_adi ,  tb_dizifilm.adi as dizifilm_adi ,  tb_tur.adi as tur_adi , tb_tweet.icerik as icerik , tb_tweet.resim1 as resim1 , tb_tweet.resim2 as resim2 ,  tb_tweet.resim3 as resim3 , tb_tweet.resim4 as resim4 ,tb_tweet.durum as durum , tb_tweet.skt as skt , tb_tweet.sayi as sayi  FROM  tb_tweet  INNER JOIN tb_kategori on tb_tweet.kategori_id = tb_kategori.id INNER JOIN tb_tur on tb_tweet.tur_id = tb_tur.id INNER JOIN tb_dizifilm on tb_tweet.dizifilm_id= tb_dizifilm.id  WHERE tb_tweet._deleted = 0 and tb_dizifilm._deleted = 0 and tb_tur._deleted= 0 and tb_kategori._deleted=0".$searchQuery." ". $searchcolumnarray." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

// Bind values
foreach($searchArray as $key=>$search){
   $stmt->bindValue(':'.$key, $search,PDO::PARAM_STR);
}

$stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
$stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
$stmt->execute();
$empRecords = $stmt->fetchAll();
$data = array();

foreach($empRecords as $row){
   $data[] = array(
      "id" => $row['id'], 
      "kategori_adi" => $row['kategori_adi'],  
      "dizifilm_adi" => $row['dizifilm_adi'],  
      "tur_adi" => $row['tur_adi'], 
      "icerik" => $row['icerik'], 
      "resim1" => $row['resim1'], 
      "resim2" => $row['resim2'], 
      "resim3" => $row['resim3'], 
      "resim4" => $row['resim4'],
      "durum" => $row['durum'], 
      "skt" => $row['skt'], 
      "sayi" => $row['sayi'],
   );
}

## Response
$response = array(
   "draw" => intval($draw),
   "iTotalRecords" => $totalRecords,
   "iTotalDisplayRecords" => $totalRecordwithFilter,
   "aaData" => $data
);

echo json_encode($response);