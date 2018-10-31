<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_mhs();

$alamat=$_POST['mhs_alamat'];

	$query = mysql_query("UPDATE mhs SET mhs_alamat='$alamat' WHERE mhs_nim='$_SESSION[sesi_user]'");
	if ($query){
		echo $_SESSION['pesan'] = "Data Alamat Berhasil Diperbarui...";
	} else{
		echo $_SESSION['pesan_salah'] = "Data Gagal Diperbarui";
	}
header("Location:mhs_data.php?nim=$_SESSION[sesi_user]");
?>