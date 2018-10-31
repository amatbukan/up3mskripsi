<?php
include "../../file/koneksi/conn.php";
	$id = $_POST['id'];
	$judul = $_POST['judulKegiatan'];
	$tempat = $_POST['tempatKegiatan'];
	$identitas1 = $_POST['mhs_nim'];
	$identitas2 = $_POST['mhs_nim2'];
	$identitas3 = $_POST['mhs_nim3'];
	$identitas4 = $_POST['mhs_nim4'];
	$identitas5 = $_POST['mhs_nim5'];
	$nik = $_POST['nik_dospem'];
	$biaya = $_POST['biaya'];
	$tgl_mulai = $_POST['tgl_mulai_kegiatan'];
	$tgl_akhir = $_POST['tgl_akhir_kegiatan'];
	$telp = $_POST['telp'];

	if($biaya == ""){
		$biy ="0";
	}
	else{
		$biy = $biaya;
	}
	$query = mysql_query("UPDATE penelitian_pengabdian SET judul='$judul', tempat='$tempat', identitas1='$identitas1', identitas2='$identitas2', identitas3='$identitas3', identitas4='$identitas4', identitas5='$identitas5', nik_dospem='$nik', telp='$telp', biaya='$biy', tgl_mulai_kegiatan='$tgl_mulai', tgl_akhir_kegiatan='$tgl_akhir' WHERE id='$id'"); 
	
	if ($query){
		echo $_SESSION['pesan'] = "Data Berhasil Diperbarui...";
	} else{
		echo $_SESSION['pesan_salah'] = "Data Gagal Diperbarui";
	}
header("Location:admin_daftar.php");
?>