<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();

$mhs_nim=$_POST['mhs_nim'];
$mhs_nama=$_POST['mhs_nama'];
$mhs_jk=$_POST['mhs_jk'];
$mhs_tempat=$_POST['mhs_tempat'];
$mhs_tgl_lahir=$_POST['mhs_tgl_lahir'];
$prodi_kode=$_POST['prodi_kode'];
$mhs_alamat=$_POST['mhs_alamat'];

	$query = mysql_query("UPDATE mhs SET mhs_nama='$mhs_nama', mhs_jk='$mhs_jk', mhs_tempat='$mhs_tempat', mhs_tgl_lahir='$mhs_tgl_lahir', mhs_prodi='$prodi_kode', mhs_alamat='$mhs_alamat' WHERE mhs_nim='$mhs_nim'");
	if ($query){
		echo $_SESSION['pesan'] = "Data Mahasiswa dengan NIM $mhs_nim, Berhasil Diperbarui...";
	} else{
		echo $_SESSION['pesan_salah'] = "Data Mahasiswa Gagal Diperbarui";
	}
header("Location:admin_mhs.php");
?>