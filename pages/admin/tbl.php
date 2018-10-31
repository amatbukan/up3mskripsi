<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
$tgl=date('Y-m-d');
$id=$_GET['id'];
$qP = mysql_query("SELECT * FROM penelitian_pengabdian WHERE id='$id'");
$rT=mysql_fetch_object($qP); // nim = $rT->nim

	$qK = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$rT->nik_dospem'");
	$jK = mysql_num_rows($qK);
	$jKK = mysql_fetch_object($qK); 	
	if($jK > 0){
		$namadosen= $jKK->dosen_nama;
	}
	else{
		$namadosen="";
	}
	
	// Ke satu
		$qM = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$rT->identitas1'");
		$jMM = mysql_num_rows($qM); 
		$rMhs = mysql_fetch_object($qM); 
		
		$qDosen = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$rT->identitas1'");
		$jDosen = mysql_num_rows($qDosen); 
		$rDosen = mysql_fetch_object($qDosen);
	if($jMM > 0){
		$nama1= $rMhs->mhs_nama;
	}elseif($jDosen > 0){
		$nama1= $rDosen->dosen_nama;
	}else{
		$nama1="";
	}
	
	$qM2 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$rT->identitas2'");
	$jMM2 = mysql_num_rows($qM2); 
	$rMhs2 = mysql_fetch_object($qM2); 
	
	$qDosen2 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$rT->identitas2'");
	$jDosen2 = mysql_num_rows($qDosen2); 
	$rDosen2 = mysql_fetch_object($qDosen2);
	if($jMM2 > 0){
		$nama2= $rMhs2->mhs_nama;
	}elseif($jDosen2 > 0){
		$nama2= $rDosen2->dosen_nama;
	}else{
		$nama2="";
	}		

	$qM3 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$rT->identitas3'");
	$jMM3 = mysql_num_rows($qM3); 
	$rMhs3 = mysql_fetch_object($qM3); 
	
	$qDosen3 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$rT->identitas3'");
	$jDosen3 = mysql_num_rows($qDosen3); 
	$rDosen3 = mysql_fetch_object($qDosen3);
	if($jMM3 > 0){
		$nama3= $rMhs3->mhs_nama;
	}elseif($jDosen3 > 0){
	$nama3= $rDosen3->dosen_nama;
	}else{
		$nama3="";
	}	

	$qM4 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$rT->identitas4'");
	$jMM4 = mysql_num_rows($qM4); 
	$rMhs4 = mysql_fetch_array($qM4); 
	
	$qDosen4 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$rT->identitas4'");
	$jDosen4 = mysql_num_rows($qDosen4); 
	$rDosen4 = mysql_fetch_array($qDosen4);
	if($jMM4 > 0){
		$nama4= $rMhs4['mhs_nama'];
	}elseif($jDosen4 > 0){
		$nama4= $rDosen4['dosen_nama'];
	}
	else{
		$nama4="";
	}
	
	$qM5 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$rT->identitas5'");
	$jMM5 = mysql_num_rows($qM5); 
	$rMhs5 = mysql_fetch_array($qM5); 
	
	$qDosen5 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$rT->identitas5'");
	$jDosen5 = mysql_num_rows($qDosen5); 
	$rDosen5 = mysql_fetch_array($qDosen5);
	if($jMM5 > 0){
		$nama5= $rMhs5['mhs_nama'];
	}elseif($jDosen5 > 0){
		$nama5= $rDosen5['dosen_nama'];
		}
	else{
		$nama5="";
	}
	
	if ($rT->jenis == '0' || $rT->jenis == '2' || $rT->jenis == '4'){
	$jenis = "Pengabdian Kepada Masyarakat";
	}
	elseif($rT->jenis == '1' || $rT->jenis == '3' || $rT->jenis == '5'){
		$jenis = "Penelitian";
	}
	else{
		$jenis = "";
	}	
	
	if ($rT->jenis == '0' || $rT->jenis == '2' || $rT->jenis == '4'){
	$jenis2 = "PENGABDIAN KEPADA MASYARAKAT";
	}
	elseif($rT->jenis == '1' || $rT->jenis == '3' || $rT->jenis == '5'){
		$jenis2 = "PENELITIAN";
	}
	else{
		$jenis2 = "";
	}
?>
<html>
<head>
	<title>Tanda Bukti Laporan</title>
	<link rel="shortcut icon" href="../../assets/stmik.jpg">
</head>
<body style="width:18cm; margin:0 auto;" onLoad="window.print();">
<table border="0" width="100%" style="border-bottom: 2px solid #000;" align="center">
	<tr align="center">
		<td rowspan="4"><img src="../../assets/stmik.jpg" width="100px"></td>
		<td>SEKOLAH TINGGI MANAJEMEN INFORMATIKA DAN KOMPUTER</td>
	</tr>
	<tr align="center">
		<td><h1 style="margin:0;">STMIK PALANGKARAYA</h1></td>
	</tr>
	<tr align="center">
		<td>Jl. G. Obos No. 114 Telp. 0536-3224593 Fax. 0536-3225515 Palangka Raya</td>
	</tr>
	<tr align="center" style="color: #ff0000;">
		<td>Surel: humas@stmikplk.ac.id ~ Laman: www.stmikplk.ac.id</td>
	</tr>
</table>
<?php
$qS = mysql_query("SELECT * FROM surat WHERE idpen='$id' AND jenis_surat='3'");
$rS = mysql_fetch_object($qS);
?>
<h3 style="text-align: center;">TANDA BUKTI<br>PENYERAHAN LAPORAN <?php echo $jenis2;?><br>TAHUN 2017</h3>
<h2 style="text-align: center;">&nbsp;</h2>
<table>
<tbody>
<tr>
<td colspan="7" width="299">
<p>Telah diserahkan kepada</p>
</td>
<td width="19">
<p>:</p>
</td>
<td colspan="2" width="329">
<p><strong>UP3M STMIK Palangkaraya</strong></p>
</td>
</tr>
<tr>
<td colspan="7" width="299">
<p>&nbsp;</p>
</td>
<td width="19">
<p>&nbsp;</p>
</td>
<td colspan="2" width="329">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="7" width="299">
<p>Pada Tanggal</p>
</td>
<td width="19">
<p>:</p>
</td>
<td colspan="2" width="329">
<p><?php echo month($rS->tgl_surat);?></p>
</td>
</tr>
<tr>
<td colspan="7" width="299">
<p>&nbsp;</p>
</td>
<td width="19">
<p>&nbsp;</p>
</td>
<td colspan="2" width="329">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="7" width="299">
<p>Laporan <?php echo $jenis;?> atas</p>
</td>
<td width="19">
<p>:</p>
</td>
<td colspan="2" width="329">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="7" width="299">
<p>&nbsp;</p>
</td>
<td width="19">
<p>&nbsp;</p>
</td>
<td colspan="2" width="329">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td width="56">
<p>&nbsp;</p>
</td>
<td width="28">
<p>1.</p>
</td>
<td colspan="3" width="92">
<p>Nama</p>
</td>
<td width="19">
<p>:</p>
</td>
<td colspan="4" width="451">
<p><?php echo $namadosen;?></p>
</td>
</tr>
<tr>
<td width="56">
<p>&nbsp;</p>
</td>
<td width="28">
<p>2.</p>
</td>
<td colspan="3" width="92">
<p>NIK</p>
</td>
<td width="19">
<p>:</p>
</td>
<td colspan="4" width="451">
<p><?php echo $rT->nik_dospem;?></p>
</td>
</tr>
<tr>
<td width="56">
<p>&nbsp;</p>
</td>
<td width="28">
<p>3.</p>
</td>
<td colspan="3" width="92">
<p>Jabatan</p>
</td>
<td width="19">
<p>:</p>
</td>
<td colspan="4" width="451">
<p>Dosen</p>
</td>
</tr>
<tr>
<td width="56">
<p>&nbsp;</p>
</td>
<td width="28">
<p>4.</p>
</td>
<td colspan="3" width="92">
<p>Anggota</p>
</td>
<td width="19">
<p>:</p>
</td>
<td colspan="4" width="451">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="2" width="85">
<p>&nbsp;</p>
</td>
<td width="26">
<p>1.</p>
</td>
<td colspan="6" width="267">
<p><?php echo $nama1;?></p>
</td>
<td width="269">
<p><?php echo $rT->identitas1;?></p>
</td>
</tr>
<tr>
<td colspan="2" width="85">
<p>&nbsp;</p>
</td>
<td width="26">
<p>2.</p>
</td>
<td colspan="6" width="267">
<p><?php echo $nama2;?></p>
</td>
<td width="269">
<p><?php echo $rT->identitas2;?></p>
</td>
</tr>
<tr>
<td colspan="2" width="85">
<p>&nbsp;</p>
</td>
<td width="26">
<p>3.</p>
</td>
<td colspan="6" width="267">
<p><?php echo $nama3;?></p>
</td>
<td width="269">
<p><?php echo $rT->identitas3;?></p>
</td>
</tr>
<?php
if(!empty($rT->identitas4)){
?>
<tr>
<td colspan="2" width="85">
<p>&nbsp;</p>
</td>
<td width="26">
<p>4.</p>
</td>
<td colspan="6" width="267">
<p><?php echo $nama4;?></p>
</td>
<td width="269">
<p><?php echo $rT->identitas4;?></p>
</td>
</tr>
<?php
}
?>

<?php
if(!empty($rT->identitas5)){
?>
<tr>
<td colspan="2" width="85">
<p>&nbsp;</p>
</td>
<td width="26">
<p>5.</p>
</td>
<td colspan="6" width="267">
<p><?php echo $nama5;?></p>
</td>
<td width="269">
<p><?php echo $rT->identitas5;?></p>
</td>
</tr>
<?php
}
?>
<tr>
<td colspan="3" width="111" style="vertical-align:top">
<p>Judul</p>
</td>
<td width="21" style="vertical-align:top">
<p>:</p>
</td>
<td colspan="6" width="515">
<p align="justify"><?php echo $rT->judul;?></p>
</td>
</tr>
<tr>
<td colspan="3" width="111">
<p>&nbsp;</p>
</td>
<td width="21">
<p>&nbsp;</p>
</td>
<td colspan="6" width="515">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="3" width="111">
<p>Tempat</p>
</td>
<td width="21">
<p>:</p>
</td>
<td colspan="6" width="515">
<p><?php echo $rT->tempat;?></p>
</td>
</tr>
<tr>
<td colspan="3" width="111">
<p>&nbsp;</p>
</td>
<td width="21">
<p>&nbsp;</p>
</td>
<td colspan="6" width="515">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="3" width="111">
<p>Sebanyak</p>
</td>
<td width="21">
<p>:</p>
</td>
<td colspan="6" width="515">
<p>1 (satu) eksemplar</p>
</td>
</tr>
<tr>
<td colspan="3" width="111">
<p>&nbsp;</p>
</td>
<td width="21">
<p>&nbsp;</p>
</td>
<td colspan="6" width="515">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="10" width="647">
<p>Demikian tanda bukti ini dibuat agar dapat dipergunakan sebagaimana mestinya.</p>
</td>
</tr>
</tbody>
</table>
<table style="float: right;">
<tbody>
<tr>
<td width="300">
<p style="text-align: center;">Palangka Raya,&nbsp;<?=month($rS->tgl_surat);?><br>
Yang Menerima,</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;"><u><?=$rS->pejabat_nama;?></u><br>
NIK. <?=$rS->pejabat_nik;?></p>
</td>
</tr>
</tbody>
</table>
