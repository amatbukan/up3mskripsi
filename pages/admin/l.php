<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();

$id=$_GET['id'];
$tgl=date('Y-m-d');
	$query = mysql_query("UPDATE penelitian_pengabdian SET tgl_serah_laporan='$tgl', status='5' WHERE id='$id'");
	
header("Location:daftar_dtl.php?id=$id");
?>