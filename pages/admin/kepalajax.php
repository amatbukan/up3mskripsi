<?php
include "../../file/koneksi/conn.php";
$query = mysql_query("SELECT * FROM dosen WHERE dosen_nik='".mysql_escape_string($_POST['dosen_nik'])."'");
$data = mysql_fetch_array($query);

echo json_encode($data);
?>