<?php
include "../../file/koneksi/conn.php";

$nik = $_GET['nik'];

$query2 = mysql_query("DELETE FROM dosen WHERE dosen_nik='$nik'");
$query3 = mysql_query("DELETE FROM pengguna WHERE pengguna_user='$nik'"); // hapus mhs dengan  nim
header("location: admin_dosen.php");
if($query2){
  $_SESSION['pesan'] = "Data Dosen dengan NIK $nik, Telah Berhasil Dihapus...";
}else{
  $_SESSION['pesan_salah'] = "Data Dosen Gagal Dihapus...";
}
?>