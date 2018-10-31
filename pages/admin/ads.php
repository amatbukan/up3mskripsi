<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();


$dosen_nik=$_POST['dosen_nik'];
$dosen_nama=$_POST['dosen_nama'];
$dosen_tempat=$_POST['dosen_tempat'];
$dosen_tgl_lahir=$_POST['dosen_tgl_lahir'];
$dosen_alamat=$_POST['dosen_alamat'];
$dosen_telp=$_POST['dosen_telp'];
$prodi_kode=$_POST['prodi_kode'];
$pas = md5('rahasia');
	$query = mysql_query("INSERT INTO dosen VALUES ('$dosen_nik', '$dosen_nama', '$dosen_tempat', '$dosen_tgl_lahir', '$dosen_alamat', '$dosen_telp', '$prodi_kode' )");
        if ($query){
            echo $_SESSION['pesan'] = "Data Dosen dengan NIK $dosen_nik, Berhasil Disimpan...";
			mysql_query("INSERT INTO pengguna VALUES ('', '$dosen_nik', '$pas', '00')");
        }else{
            echo $_SESSION['pesan_salah'] = "Data Dosen dengan NIK $dosen_nik, sudah ada...!";
        }
		header('Location:admin_dosen.php');
?>
