<?
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
$tgl=date('Y-m-d');
$id=$_GET['id'];
$qP = mysql_query("SELECT * FROM penelitian_pengabdian WHERE id='$id'");
$rT=mysql_fetch_object($qP); // nim = $rT->nim
	$qK = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$rT->identitas1'");
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
	<title>Surat Tugas</title>
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
$qS = mysql_query("SELECT * FROM surat WHERE idpen='$id' AND jenis_surat='2'");
$rS = mysql_fetch_object($qS);
?>
<p style="text-align: center;"><strong><u>SURAT TUGAS <?=$jenis2;?></u></strong><br /> <font size="2"><strong>Nomor : <?php echo $rS->no_surat;?> </strong>
<strong><?php echo $rS->no_surat;?></strong></font></p>
<table>
<tbody>
<tr>
<td colspan="6" width="643">
<p>Yang bertanda tangan dibawah ini&nbsp; :</p>
</td>
</tr>
<tr>
<td colspan="6" width="643">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td width="28">
<p>1.</p>
</td>
<td width="85">
<p>Nama</p>
</td>
<td width="19">
<p>:</p>
</td>
<td colspan="3" width="510">
<p><strong><?=$rS->pejabat_nama;?></strong></p>
</td>
</tr>
<tr>
<td width="28">
<p>2.</p>
</td>
<td width="85">
<p>NIK</p>
</td>
<td width="19">
<p>:</p>
</td>
<td colspan="3" width="510">
<p><?=$rS->pejabat_nik;?></p>
</td>
</tr>
<tr>
<td width="28" style="vertical-align:top">
<p>3.</p>
</td>
<td width="85" style="vertical-align:top">
<p>Jabatan</p>
</td>
<td width="19" style="vertical-align:top">
<p>:</p>
</td>
<td colspan="3" width="510">
<p style="text-align: justify;">Kepala Unit Penelitian, Publikasi dan Pengabdian pada Masyarakat (UP3M) STMIK Palangkaraya</p>
</td>
</tr>
<tr>
<td colspan="6" width="643">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="6" width="643">
<p>Dengan ini memberikan tugas kepada :</p>
</td>
</tr>
<tr>
<td colspan="6" width="643">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td width="28">
<p>1.</p>
</td>
<td width="85">
<p>Ketua</p>
</td>
<td width="19">
<p>:</p>
</td>
<td colspan="3" width="510">
<p><?php echo $namadosen;?></p>
</td>
</tr>
<tr>
<td width="28">
<p>2.</p>
</td>
<td width="85">
<p>NIK</p>
</td>
<td width="19">
<p>:</p>
</td>
<td colspan="3" width="510">
<p><?php echo $rT->identitas1;?></p>
</td>
</tr>
<tr>
<td width="28">
<p>3.</p>
</td>
<td width="85">
<p>Jabatan</p>
</td>
<td width="19">
<p>:</p>
</td>
<td colspan="3" width="510">
<p>Dosen</p>
</td>
</tr>
<tr>
<td width="28">
<p>4.</p>
</td>
<td width="85">
<p>Anggota</p>
</td>
<td width="19">
<p>:</p>
</td>
<td width="28">
<p>1.</p>
</td>
<td width="302">
<p><?php echo $nama2;?></p>
</td>
<td width="180">
<p><?php echo $rT->identitas2;?></p>
</td>
</tr>
<tr>
<td width="28">
<p>&nbsp;</p>
</td>
<td width="85">
<p>&nbsp;</p>
</td>
<td width="19">
<p>&nbsp;</p>
</td>
<td width="28">
<p>2.</p>
</td>
<td width="302">
<p><?php echo $nama3;?></p>
</td>
<td width="180">
<p><?php echo $rT->identitas3;?></p>
</td>
</tr>
<?php
if(!empty($rT->identitas4)){
?>
<tr>
<td width="28">
<p>&nbsp;</p>
</td>
<td width="85">
<p>&nbsp;</p>
</td>
<td width="19">
<p>&nbsp;</p>
</td>
<td width="28">
<p>3.</p>
</td>
<td width="302">
<p><?php echo $nama4;?></p>
</td>
<td width="180">
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
<td width="28">
<p>&nbsp;</p>
</td>
<td width="85">
<p>&nbsp;</p>
</td>
<td width="19">
<p>&nbsp;</p>
</td>
<td width="28">
<p>4.</p>
</td>
<td width="302">
<p><?php echo $nama5;?></p>
</td>
<td width="180">
<p><?php echo $rT->identitas5;?></p>
</td>
</tr>
<?php
}
?>
<tr>
<td width="28">
<p>&nbsp;</p>
</td>
<td width="85">
<p>&nbsp;</p>
</td>
<td width="19">
<p>&nbsp;</p>
</td>
<td width="28">
<p>&nbsp;</p>
</td>
<td width="302">
<p>&nbsp;</p>
</td>
<td width="180">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="6" width="643">
<p style="text-align: justify;">Untuk melaksanakan <?php echo $jenis;?> dengan judul &ldquo;<strong><?php echo $rT->judul;?></strong> &rdquo;.</p>
</td>
</tr>
<tr>
<td colspan="6" width="643">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="6" width="643">
<p style="text-align: justify;">Demikian surat ini dibuat agar dapat dipergunakan sebagaimana mestinya dan dilaksanakan dengan penuh tanggung jawab.</p>
</td>
</tr>
<tr>
<td colspan="6" width="643">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>


<table style="float: right;">
<tbody>
<tr>
<td width="300">
<p style="text-align: center;">Palangka Raya,&nbsp;<?=month($rS->tgl_surat);?><br>
Kepala UP3M</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;"><u><?=$rS->pejabat_nama;?></u><br>
NIK. <?=$rS->pejabat_nik;?></p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
if($rT->jenis =='4' || $rT->jenis =='5'){
?>
<table style="width: 680px;">
<tbody>
<tr>
<td style="width: 680px;">
<font size="2"<p><strong><u>Tembusan :</u></strong><br>
1. Administrasi Umum<br>
2. Ketua Program Studi<br>
3. Dosen Pembimbing<br>
4. Mahasiswa<br>
5. Arsip
</p></font>
</td>
</tr>
</tbody>
</table>
<?php
}
else{
?>
<table style="width: 680px;">
<tbody>
<tr>
<td style="width: 680px;">
<font size="2"<p><strong><u>Tembusan :</u></strong><br>
1. Ketua Program Studi<br>
2. Dosen Pembimbing<br>
3. Mahasiswa<br>
4. Arsip
</p></font>
</td>
</tr>
</tbody>
</table>
<?php
}
?>