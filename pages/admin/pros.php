<?php
include "../../file/koneksi/conn.php";

$dosen_nik = mysql_real_escape_string($_POST['dosen_nik']);
$sql = "SELECT * FROM dosen WHERE dosen_nik = '$dosen_nik'";
$process = mysql_query($sql);
$num = mysql_num_rows($process);
if($num == 0){
	//echo " &#10004; NIM masih tersedia";
}else{
	echo "&#10060; <b>NIK Sudah Ada</b>";
}
?>