<?php
include "../../file/koneksi/conn.php";

$mhs_nim = mysql_real_escape_string($_POST['mhs_nim']);
$sql = "SELECT * FROM mhs WHERE mhs_nim = '$mhs_nim'";
$process = mysql_query($sql);
$num = mysql_num_rows($process);
if($num == 0){
	//echo " &#10004; NIM masih tersedia";
}else{
	echo "&#10060; <b>NIM Sudah Ada</b>";
}
?>