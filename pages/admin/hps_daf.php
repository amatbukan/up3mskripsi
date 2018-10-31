<?php
include "../../file/koneksi/conn.php";

$id= $_GET['id'];

$query2 = mysql_query("DELETE FROM penelitian_pengabdian WHERE id='$id'");
$query2 = mysql_query("DELETE FROM surat WHERE idpen='$id'");
header("location: admin_daftar.php");
if($query2){
  $_SESSION['pesan'] = "Data Pendaftaran Berhasil Dihapus...";
}else{
  $_SESSION['pesan_salah'] = "Data Gagal Dihapus...";
}
?>