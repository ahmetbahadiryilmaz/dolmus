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

$searchArray = array();

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " AND (id LIKE :id or 
        adi LIKE :adi) ";
   $searchArray = array( 
        'id'=>"%$searchValue%", 
        'adi'=>"%$searchValue%"
   );
}

## Total number of records without filtering
$stmt = db::$conn->prepare("SELECT COUNT(*) AS allcount FROM tb_tur WHERE _deleted =0");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt = db::$conn->prepare("SELECT COUNT(*) AS allcount FROM tb_tur WHERE _deleted =0 ".$searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$stmt = db::$conn->prepare("SELECT * FROM tb_tur WHERE _deleted =0 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

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
      "id"=>$row['id'],
      "adi"=>$row['adi'],
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