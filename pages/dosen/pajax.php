<?php
include "../../file/koneksi/conn.php";

	$nim=$_POST['nim'];

	$query2 = "SELECT dosen_nama,dosen_nik FROM dosen WHERE dosen_nik='$nim'";
	$hasil2 = mysql_query($query2); 
	$row2 = mysql_num_rows($hasil2);
	
	if($row2>0){
		while ($data = mysql_fetch_array($hasil2))
		{
			echo $data['dosen_nama']."-".$data['dosen_nik'];
		}
	}else{
		//echo "0";
	}
	

?>
