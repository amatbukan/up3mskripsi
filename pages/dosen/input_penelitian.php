<?php
include "../../file/koneksi/conn.php";
	$judul = $_POST['judulKegiatan'];
	$jenis = $_POST['jenisPenelitian'];
	$tempat = $_POST['tempatKegiatan'];
	$identitas1 = $_POST['mhs_nim'];
	$identitas2 = $_POST['mhs_nim2'];
	$identitas3 = $_POST['mhs_nim3'];
	$identitas4 = $_POST['mhs_nim4'];
	$identitas5 = $_POST['mhs_nim5'];
	$telp = $_POST['telp'];
	$tgl = date('Y-m-d');
	$prodi = $_POST['prodi'];
	$insert="insert into penelitian_pengabdian (judul,jenis,tempat,identitas1,identitas2,identitas3,identitas4,identitas5,telp,biaya,status,tgl_daftar,prodi) values ('$judul','$jenis','$tempat','$identitas1','$identitas2','$identitas3','$identitas4','$identitas5','$telp','0','0','$tgl','$prodi') ";
	$query = mysql_query($insert);
	echo "
	<script language='javascript'>
		alert('Data sudah tersimpan');
		location.href = 'dosen_hs.php';
	</script>
	";
?>