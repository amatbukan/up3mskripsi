<?php
include "../../file/koneksi/conn.php";

$nim = $_GET['nim'];

$query2 = mysql_query("DELETE FROM mhs WHERE mhs_nim='$nim'"); // hapus mhs dengan  nim
$query3 = mysql_query("DELETE FROM pengguna WHERE pengguna_user='$nim'"); // hapus mhs dengan  nim
header("location: admin_mhs.php");
if($query2){
  
  $_SESSION['pesan'] = "Data Mahasiswa dengan NIM $nim, Telah Berhasil Dihapus...";
}else{
  $_SESSION['pesan_salah'] = "Data Mahasiswa Gagal Dihapus...";
}
?>