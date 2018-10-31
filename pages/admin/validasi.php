<?php
include "../../file/koneksi/conn.php";
cek_sesi();

if(isset($_GET['id'])) { //jika ada kiriman Id mode GET
	$Id=$_GET['id'];
	$aksi=$_GET['aksi'];
	if($aksi=='terima'){ 
		mysql_query("UPDATE penelitian_pengabdian SET status='1' WHERE id='$Id'");
		
	}
	elseif($aksi=='tolak'){
		mysql_query("UPDATE penelitian_pengabdian SET status='2' WHERE id='$Id'");
	}
	else{
		echo "";
	}
}
header("Location:daftar_dtl.php?id=$Id");
?>