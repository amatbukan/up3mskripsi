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
	
	if($rT->jenis == '1' || $rT->jenis == '3' || $rT->jenis == '5'){
		$jenis = "Penelitian";
	}
	elseif($rT->jenis == '0' || $rT->jenis == '2' || $rT->jenis == '4'){
		$jenis = "Pengabdian Kepada Masyarakat";
	}
	else{
		$jenis = "";
	}
?>
<html>
<head>
	<title>Surat Pengantar</title>
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
<br><br>
<table style="width: 680px;">
<tbody>
<?php
$qS = mysql_query("SELECT * FROM surat WHERE idpen='$id' AND jenis_surat='0'");
$rS = mysql_fetch_object($qS);
?>
<tr>
<td style="width: 340px;">
<p>Nomor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp; <?php echo $rS->no_surat;?><br>
Lampiran&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp; -<br>
Perihal&nbsp; &nbsp; &nbsp; &nbsp; :<em>&nbsp;&nbsp;&nbsp; </em><em>Permohonan Kegiatan</em><br>
<em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?=$jenis;?></em></p>
</td>
<td style="width: 300px;">
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Kepada<br>
Yth. &nbsp;Kepala <?=$rT->tempat;?> <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;di-&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Palangka Raya</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<table style="width: 680px;">
<tbody>
<tr>
<td style="width: 80.7273px;">&nbsp;</td>
<td style="width: 514.545px;">Dengan hormat,</td>
</tr>
<tr>
<td style="width: 80px;">&nbsp;</td>
<td style="width: 514.545px; text-align: justify;">
<p>Dalam rangka melaksanakan salah satu tridharma perguruan tinggi di lingkungan STMIK Palangkaraya, kami bermaksud melaksanakan kegiatan <?=$jenis;?> <?=$rT->judul?>. Kegiatan ini akan dilaksanakan oleh dosen dan mahasiswa dengan dosen pendamping :</p>
</td>
</tr>
</tbody>
</table>
<table style="width: 608px;">
<tbody>
<tr>
<td style="width: 105px;">&nbsp;</td>
<td style="width: 161px;">&nbsp;Nama</td>
<td style="width: 18px;">&nbsp;:</td>
<td style="width: 395px;">&nbsp;<?=$nama1;?></td>
</tr>
<tr>
<td style="width: 105px;">&nbsp;</td>
<td style="width: 161px;">&nbsp;NIK</td>
<td style="width: 18px;">&nbsp;:</td>
<td style="width: 395px;">&nbsp;<?=$rT->identitas1;?></td>
</tr>
</tbody>
</table>
<table style="width: 680px;">
<tbody>
<tr>
<td style="width: 80px;">&nbsp;</td>
<td style="width: 514.545px; text-align: justify;">Adapun nama-nama yang akan melaksanakan kegiatan adalah sebagai berikut:</td>
</tr>
</tbody>
</table>
<br>
<table style="float: right; width: 585px;" border="1">
<tbody>
<tr style="height: 35px;">
<td style="height: 35px; width: 44px;">
<p style="text-align: center;">NO.</p>
</td>
<td style="height: 35px; width: 368px;">
<p style="text-align: center;">NAMA</p>
</td>
<td style="height: 35px; width: 166px;">
<p style="text-align: center;">NIK/NIM</p>
</td>
</tr>
<tr style="height: 35px;">
<td style="height: 35px; width: 44px;">
<p style="text-align: center;">1</p>
</td>
<td style="height: 35px; width: 368px;">
<p>&nbsp;<?=$nama2;?></p>
</td>
<td style="height: 35px; width: 166px;">
<p style="text-align: center;"><?=$rT->identitas2;?></p>
</td>
</tr>
<tr style="height: 35px;">
<td style="height: 35px; width: 44px;">
<p style="text-align: center;">2</p>
</td>
<td style="height: 35px; width: 368px;">
<p>&nbsp;<?=$nama3;?></p>
</td>
<td style="height: 35px; width: 166px;">
<p style="text-align: center;"><?=$rT->identitas3;?></p>
</td>
<?php
if(!empty($rT->identitas4)){
?>
</tr>
<tr style="height: 35px;">
<td style="height: 35px; width: 44px;">
<p style="text-align: center;">3</p>
</td>
<td style="height: 35px; width: 368px;">
<p>&nbsp;<?=$nama4;?></p>
</td>
<td style="height: 35px; width: 166px;">
<p style="text-align: center;"><?=$rT->identitas4;?></p>
</td>
</tr>
<?php
}
?>
<?php
if(!empty($rT->identitas5)){
?>
<tr style="height: 35px;">
<td style="height: 35px; width: 44px;">
<p style="text-align: center;">4</p>
</td>
<td style="height: 35px; width: 368px;">
<p>&nbsp;<?=$nama5;?></p>
</td>
<td style="height: 35px; width: 166px;">
<p style="text-align: center;"><?=$rT->identitas5;?></p>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
&nbsp;&nbsp;
<table style="width: 680px;">
<tbody>
<tr>
<td style="width: 80.7273px;">&nbsp;</td>
<td style="width: 514.545px; text-align: justify;">Demikian surat permohonan <?=$jenis;?> ini kami sampaikan. Atas perhatian dan kerjasama yang baik, diucapkan terima kasih.</td>
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
<table style="width: 680px;">
<tbody>
<tr>
<td style="width: 80.7273px;">&nbsp;</td>
<td style="width: 514.545px;">
<font size="2"<p><strong><u>Tembusan :</u></strong><br>
1. Arsip<br>
2. Tempat Pelaksanaan Kegiatan
</p></font>
</td>
</tr>
</tbody>
</table>

</body>
</html>