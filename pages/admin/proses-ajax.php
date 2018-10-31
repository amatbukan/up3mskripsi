<?php
include "../../file/koneksi/conn.php";

	$nim=$_POST['nim'];
	
	$query = "SELECT mhs_nama,mhs_nim FROM mhs WHERE mhs_nim='$nim'";
	$hasil = mysql_query($query);
	$row = mysql_num_rows($hasil); 
	
	$query2 = "SELECT dosen_nama,dosen_nik FROM dosen WHERE dosen_nik='$nim'";
	$hasil2 = mysql_query($query2); 
	$row2 = mysql_num_rows($hasil2);
	

	if($row>0){
		 while ($data = mysql_fetch_array($hasil))
		{
			echo $data['mhs_nama']."-".$data['mhs_nim'];
		} 
		
	}else if($row2>0){
		while ($data = mysql_fetch_array($hasil2))
		{
			echo $data['dosen_nama']."-".$data['dosen_nik'];
		}
	}else{
		echo "0";
	}
	

?>
