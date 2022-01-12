<?php 
session_start();
if ($_SESSION['adi']==null||  $_SESSION['adi'] == "")
{
 header("location:giris.php");
  exit;
}

include ("../inc/head.php");
$searchTerm =$_POST['term'];
$search = $searchTerm['term'];
$sql ="SELECT * FROM tb_tur WHERE _deleted =0  and adi like'%$search%' ";
$is = db::$conn->query( $sql, PDO::FETCH_ASSOC);
if ( $is){
    $idata=[];
    $isi=0;
    foreach( $is as $row ){
        $id= $row['id'];
        $adi= $row['adi'];
        $idata[$isi] = ["id"=> $id, "adi" =>$adi];
        $isi++;
    }
    echo json_encode($idata);
}
else{
    echo json_encode(array('sonuc' => 2 ));
}


?>