<?php

error_reporting(E_ALL);
ini_set('display_errors', 1); 
session_start();
$alertid = $_POST['id_kelas'];
$_SESSION['alertid'] = $alertid;
 require ($_SERVER['DOCUMENT_ROOT']."/sissmkn2/config/Database.php"); ?>
<?php require ($_SERVER['DOCUMENT_ROOT']."/sissmkn2/config/Kelas.php"); ?>
<?php
$object = new t_kelas();

$aksi = $_GET['aksi'];

foreach($object->getforalert($_GET['id_kelas']) as $item) { 
  if (!empty($item['id_kelas'])){
    $_SESSION['alertid'] = "ada";
    header("location:http://localhost:8080/sissmkn2/views/admin/kelas.php");
  }
}


if($aksi == 'insert') {
 $object->insertkelas($_POST['id_kelas'], $_POST['kelas'], $_POST['nip'], $_POST['tingkat'], $_POST['program'], $_POST['ruang'], $_POST['ketua'], $_POST['masuk'], $_POST['guru_bk'], $_POST['th_ajar'], $_POST['profil']);
header("location:http://localhost:8080/sissmkn2/views/admin/kelas.php");
 }
 
elseif ($aksi == 'update') {
	 $object->updateKelas($_POST['id_kelas'], $_POST['kelas'], $_POST['nip'], $_POST['tingkat'], $_POST['program'], $_POST['ruang'], $_POST['ketua'], $_POST['masuk'], $_POST['guru_bk'], $_POST['th_ajar'], $_POST['profil']);
    header("location:http://localhost:8080/sissmkn2/views/admin/kelas.php");
}
elseif ($aksi == 'hapus') {
	 $object->Deletekelas($_GET['id_kelas']);
    header("location:http://localhost:8080/sissmkn2/views/admin/kelas.php");
}


?>
