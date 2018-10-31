<?php
session_start();
ob_start();

function koneksi () {
	$dbname = "up3mskripsi";
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$koneksi=mysql_connect($dbhost, $dbuser, $dbpass) or die ('Gagal Koneksi!');
	mysql_select_db($dbname,$koneksi) or die ('DB tidak ada!');		
}

koneksi ();

function proses_login($user, $pass) {
	$qU=mysql_query("SELECT * FROM pengguna WHERE pengguna_user='$user' AND pengguna_sandi=md5('$pass')");
	$jU=mysql_num_rows($qU);
	if($jU < 1) {
		$_SESSION['pesan_salah'] = "<small>ID Pengguna/Sandi Salah</small>";
		header('Location:index.php');
		exit;
	}
	else {
		$rU=mysql_fetch_object($qU);
		$_SESSION['sesi_user']=$rU->pengguna_user;
		$_SESSION['sesi_level']=$rU->pengguna_level;
		switch($rU->pengguna_level) {
			case '00' : //dosen
				$qA=mysql_query("SELECT * FROM dosen WHERE dosen_nik='$rU->pengguna_user'");
				$rA=mysql_fetch_object($qA);
				$_SESSION['sesi_nama']=$rA->dosen_nama;
				$_SESSION['sesi_prodi']=$rA->dosen_prodi;
				header('location:pages/dosen/dosen_beranda.php');
				break;
			case '11' : //mhs
				$qP=mysql_query("SELECT * FROM mhs WHERE mhs_nim='$rU->pengguna_user'");
				$rA=mysql_fetch_object($qP);
				$_SESSION['sesi_nama']=$rA->mhs_nama;
				$_SESSION['sesi_prodi']=$rA->mhs_prodi;
				header('location:pages/mhs/mhs_beranda.php');
				break;
			case '99' : // admin
				$qP=mysql_query("SELECT * FROM admin WHERE admin_user='$rU->pengguna_user'");
				$rA=mysql_fetch_object($qP);
				$_SESSION['sesi_nama']=$rA->admin_nama;
				$_SESSION['sesi_nik']=$rA->admin_nik;
				header('location:pages/admin/admin_beranda.php');
				break;
			default :
				$_SESSION['sesi_nama']="???";
		}
	}
}

// fungsi cek_sesi
function cek_sesi() {
	if(($_SESSION['sesi_user']=="") OR ($_SESSION['sesi_level']=="") OR ($_SESSION['sesi_nama']=="")) {
		header('location:belum_login.php');
		exit;
	}
}
// fungsi cek_level_admin
function cek_level_admin() {
	if($_SESSION['sesi_level'] <> '99') {
		header('location:tidak_berhak_akses.php');
	}
}
// fungsi cek_level_dosen
function cek_level_dosen() {
	if($_SESSION['sesi_level'] <> '00') {
		header('location:tidak_berhak_akses.php');
	}
}
// fungsi cek_level_mhs
function cek_level_mhs() {
	if($_SESSION['sesi_level'] <> '11') {
		header('location:tidak_berhak_akses.php');
	}
}

function pesan_salah($pesan) {
    $pesan = "<div class='alert alert-danger' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>$pesan</div>";
    return $pesan;
}

function pesan_benar($pesan) {
    $pesan = "<div class='alert alert-success' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>$pesan</div>";
    return $pesan;
}

function month($tanggal) {
	$thn=substr($tanggal, 0, 4);
	$bln=substr($tanggal, 5, 2);
	$tgl=substr($tanggal, 8, 2);
	switch($bln) {
		case '01': $bln="Januari";break;
		case '02': $bln="Februari";break;
		case '03': $bln="Maret";break;
		case '04': $bln="April";break;
		case '05': $bln="Mei";break;
		case '06': $bln="Juni";break;
		case '07': $bln="Juli";break;
		case '08': $bln="Agustus";break;
		case '09': $bln="September";break;
		case '10': $bln="Oktober";break;
		case '11': $bln="November";break;
		case '12': $bln="Desember";break;
		default: $bln="00";
	}
	$tanggal=$tgl." ".$bln." ".$thn;
	return $tanggal;
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
function rp($angka){
	
	$hasil_rupiah = "" . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}

	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " Belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
?>
