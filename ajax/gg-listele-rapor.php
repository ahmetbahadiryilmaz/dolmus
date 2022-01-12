<?php
include ("../inc/head.php");
if ($_SESSION['adi']==null||  $_SESSION['adi'] == "")
{
 // echo "<div class='col-md-12'><p style='color:red'>oturu:".$_SESSION['oturum']." isim:".$_SESSION['isim']." Eposta:".$_SESSION['eposta']." Şifre:".$_SESSION['sifre']."  </p></div>";
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
if(isset($_POST['order'][1]['column']))

{

   $columnIndex1 = $_POST['order'][1]['column']; // Column index

   $columnName1 = $_POST['columns'][$columnIndex1]['data']; // Column name

   $columnName = $columnName.' '. $columnSortOrder .','.$columnName1 . ' '.$columnSortOrder;

   $columnSortOrder ="";

}
$searchArray = array();

## Search 
$searchQuery = " ";/*
if($searchValue != ''){
   $searchQuery = " AND (id LIKE :id or 
        tur LIKE :tur or
        tutar LIKE :tutar or
        tarih LIKE :tarih or
        adi LIKE :adi) ";
   $searchArray = array( 
        'id'=>"%$searchValue%", 
        'adi'=>"%$searchValue%",
        'tutar'=>"%$searchValue%", 
        'tur'=>"%$searchValue%", 
        'tarih'=>"%$searchValue%"
   );
}
*/
## Total number of records without filtering
$stmt = db::$conn->prepare("SELECT COUNT(*) AS allcount from ( select  CAST( MONTH(tarih) as decimal(9)) as ay , CAST( YEAR(tarih) as decimal(9)) as yil  FROM tb_gg WHERE _deleted =0  group by yil,ay ) as sonuc");
$stmt->execute();
$records = $stmt->fetch();
if(!isset($records['allcount']) )
{
    $totalRecords=0;
}
else
{
    $totalRecords = $records['allcount'];
}
## Total number of records with filtering
$stmt = db::$conn->prepare("SELECT COUNT(*) AS allcount from ( select  CAST( MONTH(tarih) as decimal(9)) as ay , CAST( YEAR(tarih) as decimal(9)) as yil  FROM tb_gg WHERE _deleted =0  group by yil,ay ) as sonuc");
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];
if ($rowperpage == -1)
{
   $rowperpage =$totalRecordwithFilter;
}

## Fetch records
$stmt = db::$conn->prepare("SELECT sum(tutar)  as tutar, tur, CAST( MONTH(tarih) as decimal(9)) as ay , CAST( YEAR(tarih) as decimal(9)) as yil  FROM tb_gg WHERE _deleted =0 group by yil,ay,tur ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

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
      "yil"=>$row['yil'],
      "tutar"=>$row['tutar'],
      "ay"=>$row['ay'],
      "tur"=>$row['tur'],
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