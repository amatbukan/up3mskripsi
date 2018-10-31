<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_dosen();

$alamat=$_POST['dosen_alamat'];
$telp=$_POST['dosen_telp'];

	$query = mysql_query("UPDATE dosen SET dosen_alamat='$alamat', dosen_telp='$telp' WHERE dosen_nik='$_SESSION[sesi_user]'");
	if ($query){
		echo $_SESSION['pesan'] = "Data Berhasil Diperbarui...";
	} else{
		echo $_SESSION['pesan_salah'] = "Data Gagal Diperbarui";
	}
header("Location:dosen_data.php?nik=$_SESSION[sesi_user]");
?>