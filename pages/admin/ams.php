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
$pas = md5('rahasia');
	$query = mysql_query("INSERT INTO mhs VALUES ('$mhs_nim', '$mhs_nama', '$mhs_tempat', '$mhs_tgl_lahir', '$mhs_jk', '$mhs_alamat', '$prodi_kode')");
        if ($query){
            echo $_SESSION['pesan'] = "Data Mahasiswa dengan NIM $mhs_nim, Berhasil Disimpan...";
			mysql_query("INSERT INTO pengguna VALUES ('', '$mhs_nim', '$pas', '11')");
        }else{
            echo $_SESSION['pesan_salah'] = "Data Mahasiswa dengan NIM $mhs_nim, sudah ada...!";
        }
		header('Location:admin_mhs.php');
?>
