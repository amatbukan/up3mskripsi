<?php
/* 
punya mas ahmad
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_mhs();
$query = mysql_query("SELECT * FROM mhs WHERE mhs_nim='".mysql_escape_string($_POST['mhs_nim'])."' AND mhs_prodi='$_SESSION[sesi_prodi]'");
$data = mysql_fetch_array($query);
//$data = "SELECT * FROM mhs WHERE mhs_nim='".mysql_escape_string($_POST['mhs_nim'])."' AND mhs_prodi='$_SESSION[sesi_prodi]'";

echo json_encode($data); */
?>

<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_mhs();

	$nim=$_POST['nim'];
	$prodi=$_POST['prodi'];
	$query = "SELECT * FROM mhs WHERE mhs_nim='$nim' AND mhs_prodi='$prodi'";
	$hasil = mysql_query($query);
	$row = mysql_num_rows($hasil);
	if($row>0){
		while ($data = mysql_fetch_array($hasil))
		{
			echo $data['mhs_nama']."-".$data['mhs_prodi'];
		}
	}else{
		echo "0";
	}
	

?>