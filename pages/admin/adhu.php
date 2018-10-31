<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();

$dosen_nik=$_POST['dosen_nik'];
$dosen_nama=$_POST['dosen_nama'];
$dosen_tempat=$_POST['dosen_tempat'];
$dosen_tgl_lahir=$_POST['dosen_tgl_lahir'];
$dosen_telp=$_POST['dosen_telp'];
$dosen_alamat=$_POST['dosen_alamat'];
$prodi_kode=$_POST['prodi_kode'];


	$query = mysql_query("UPDATE dosen SET dosen_nama='$dosen_nama', dosen_tempat='$dosen_tempat', dosen_tgl_lahir='$dosen_tgl_lahir', dosen_alamat='$dosen_alamat', dosen_prodi='$prodi_kode', dosen_telp='$dosen_telp' WHERE dosen_nik='$dosen_nik'");
	if ($query){
		echo $_SESSION['pesan'] = "Data Dosen dengan NIK $dosen_nik, Berhasil Diperbarui...";
	} else{
		echo $_SESSION['pesan_salah'] = "Data Dosen Gagal Diperbarui";
	}
header("Location:admin_dosen.php");
?>