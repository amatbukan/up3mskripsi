<?php
include "../../file/koneksi/conn.php";

	$filter = $_POST['filter'];
	$tahun = $_POST['tahun'];
	$prodi = $_POST['prodi_kode'];
	$laporan = $_POST['laporan'];
	if($filter == '1'){
		header("Location:cetakll.php?tahun=$tahun");
	}
	elseif($filter == '2'){
		header("Location:cetaklll.php?tahun=$tahun&prodi_kode=$prodi&lp=$laporan");
	}	
	elseif($filter == '3'){
		header("Location:cetakl.php?tahun=$tahun&prodi_kode=$prodi&lp=$laporan");
	}
?>