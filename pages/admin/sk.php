<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
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
	
	$qPr = mysql_query("SELECT * FROM prodi WHERE prodi_kode='$jKK->dosen_prodi'");
	$rPr = mysql_fetch_object($qPr);
	
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
	<title>Surat Kontrak</title>
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
$qS = mysql_query("SELECT * FROM surat WHERE idpen='$id' AND jenis_surat='1'");
$rS = mysql_fetch_object($qS);
$tgl = $rS->tgl_surat;
$Pecah = explode( "-", $tgl );
for ( $i = 0; $i < count( $Pecah ); $i++ ) {
}
$day = date('D', strtotime($tgl));
$dayList = array(
	'Sun' => 'Minggu',
	'Mon' => 'Senin',
	'Tue' => 'Selasa',
	'Wed' => 'Rabu',
	'Thu' => 'Kamis',
	'Fri' => 'Jumat',
	'Sat' => 'Sabtu'
);

$bulan = array (
	1 =>   'Januari',
	'Februari',
	'Maret',
	'April',
	'Mei',
	'Juni',
	'Juli',
	'Agustus',
	'September',
	'Oktober',
	'November',
	'Desember'
);
?>
<p style="text-align: center;"><strong><u>SURAT PERJANJIAN KONTRAK </u></strong><strong><u><?=$jenis2;?></u></strong><br /> <strong>Nomor : </strong><strong><?php echo $rS->no_surat;?></strong></p>
<p>Pada hari ini, <?=$dayList[$day]?>, tanggal <?php echo $Pecah[2];?>, bulan <?php echo $bulan[(int)$Pecah[1]]?>, tahun <?php echo $Pecah[0];?>, kami yang bertanda tangan di bawah ini :</p>
<table>
<tbody>
<tr>
<td colspan="2" width="76">
<p>Nama</p>
</td>
<td width="28">
<p>:</p>
</td>
<td width="555">
<p><?=$rS->pejabat_nama;?></p>
</td>
</tr>
<tr>
<td colspan="2" width="76">
<p>NIK</p>
</td>
<td width="28">
<p>:</p>
</td>
<td width="555">
<p><?=$rS->pejabat_nik;?></p>
</td>
</tr>
<tr>
<td colspan="2" width="76">
<p>Jabatan</p>
</td>
<td width="28">
<p>:</p>
</td>
<td width="555">
<p style="text-align: justify;">Kepala Unit Penelitian, Publikasi dan Pengabdian Pada Masyarakat (UP3M) STMIK Palangkaraya dalam hal ini bertindak untuk dan atas nama perguruan tinggi tersebut; selanjutnya disebut&nbsp; sebagai PIHAK&nbsp; PERTAMA;</p>
</td>
</tr>
<tr>
<td colspan="2" width="76">
<p>&nbsp;</p>
</td>
<td width="28">
<p>&nbsp;</p>
</td>
<td width="555">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="2" width="76">
<p>Nama</p>
</td>
<td width="28">
<p>:</p>
</td>
<td width="555">
<p><?php echo $namadosen;?></p>
</td>
</tr>
<tr>
<td colspan="2" width="76">
<p>NIK</p>
</td>
<td width="28">
<p>:</p>
</td>
<td width="555">
<p><?php echo $rT->nik_dospem?></p>
</td>
</tr>
<tr>
<td colspan="2" width="76">
<p>Jabatan</p>
</td>
<td width="28">
<p>:</p>
</td>
<td width="555">
<p style="text-align: justify;">Sebagai Ketua Program <?php echo $jenis;?> dan Dosen program studi <?php echo $rPr->prodi_nama;?> STMIK Palangkaraya yang selanjutnya disebut PIHAK KEDUA.</p>
</td>
</tr>
<tr>
<td colspan="2" width="76">
<p>&nbsp;</p>
</td>
<td width="28">
<p>&nbsp;</p>
</td>
<td width="555">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: justify;">menyatakan bersepakat untuk membuat perjanjian kontrak <?php echo $jenis;?> yang diatur dalam pasal-pasal sebagai berikut :</p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: center;"><strong>Pasal 1</strong></p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: center;"><strong>Judul </strong><strong><?php echo $jenis;?></strong></p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: justify;">PIHAK PERTAMA dalam jabatannya tersebut di atas, memberikan tugas kepada PIHAK KEDUA sebagai koordinator dan penanggung jawab terhadap pelaksanaan <?php echo $jenis;?> dengan tema <strong>: </strong><strong>&ldquo;</strong><strong><?php echo $rT->judul;?></strong><strong>&rdquo;</strong></p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: center;"><strong>Pasal 2</strong></p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: center;"><strong>Jangka Waktu dan Biaya</strong></p>
</td>
</tr>
<tr>
<td width="38" style="vertical-align:top">
<p>(1)</p>
</td>
<td colspan="3" width="621">
<p style="text-align: justify;">Jangka Waktu pelaksanaan <?php echo $jenis;?> ini mulai dari tanggal <?php echo month($rT->tgl_mulai_kegiatan);?> sampai tanggal <?php echo month($rT->tgl_akhir_kegiatan);?>;</p>
</td>
</tr>
<tr>
<td width="38" style="vertical-align:top">
<p>(2)</p>
</td>
<td colspan="3" width="621">
<p style="text-align: justify;">Biaya pelaksanaan Pengabdian pada Masyarakat ini dibebankan pada Daftar Isian Pelaksanaan Anggaran Sekolah Tinggi Manajemen Informatika dan Komputer (STMIK) Palangkaraya, dengan nilai kontrak sebesar <?php echo rupiah($rT->biaya);?> (<?php echo terbilang($rT->biaya);?> Rupiah) termasuk pajak-pajak yang ditanggung oleh PIHAK KEDUA.</p>
</td>
</tr>
<tr>
<td width="38">
<p>&nbsp;</p>
</td>
<td colspan="3" width="621">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: center;"><strong>Pasal 3</strong></p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: center;"><strong>Cara Pembayaran</strong></p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: justify;">Pembayaran biaya <?php echo $jenis;?> dilakukan secara bertahap dengan pengaturan sebagai berikut :</p>
</td>
</tr>
<tr>
<td width="38" style="vertical-align:top">
<p>(1)</p>
</td>
<td colspan="3" width="621">
<p style="text-align: justify;">Tahap I sebesar 50% dari nilai kontrak yang diterimakan setelah surat perjanjian kontrak <?php echo $jenis;?> ini ditandatangani oleh kedua belah pihak dan pihak kedua harus menyerahkan proposal P<?php echo $jenis;?>;</p>
</td>
</tr>
<tr>
<td width="38" style="vertical-align:top">
<p>(2)</p>
</td>
<td colspan="3" width="621">
<p style="text-align: justify;">Tahap II sebesar 50% dari nilai kontrak yang diterimakan setelah PIHAK KEDUA menyelesaikan seluruh kewajiban pekerjaan <?php echo $jenis;?>.</p>
</td>
</tr>
<tr>
<td width="38">
<p>&nbsp;</p>
</td>
<td colspan="3" width="621">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: center;"><strong>Pasal </strong><strong>4</strong></p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: center;"><strong>Monitoring </strong><strong><?php echo $jenis;?></strong></p>
</td>
</tr>
<tr>
<td width="38" style="vertical-align:top">
<p>(1)</p>
</td>
<td colspan="3" width="621">
<p>PIHAK PERTAMA berhak untuk :</p>
</td>
</tr>
<tr>
<td width="38">
<p>&nbsp;</p>
</td>
<td width="38" style="vertical-align:top">
<p>(a)</p>
</td>
<td colspan="2" width="584">
<p style="text-align: justify;">Melakukan pengawasan administrasi, monitoring, dan evaluasi terhadap pelaksanaan <?php echo $jenis;?>;</p>
</td>
</tr>
<tr>
<td width="38">
<p>&nbsp;</p>
</td>
<td width="38" style="vertical-align:top">
<p>(b)</p>
</td>
<td colspan="2" width="584">
<p style="text-align: justify;">Memberikan sanksi jika dalam pelaksanaan <?php echo $jenis;?> terjadi pelanggaran terhadap isi perjanjian oleh tim <?php echo $jenis;?>;</p>
</td>
</tr>
<tr>
<td width="38">
<p>&nbsp;</p>
</td>
<td width="38" style="vertical-align:top">
<p>(c)</p>
</td>
<td colspan="2" width="584">
<p>Bentuk sanksi disesuaikan dengan tingkat pelanggaran yang dilakukan.</p>
</td>
</tr>
<tr>
<td width="38" style="vertical-align:top">
<p>(2)</p>
</td>
<td colspan="3" width="621">
<p style="text-align: justify;">Pemantauan kemajuan <?php echo $jenis;?> dilakukan oleh PIHAK PERTAMA bersama dengan Tim Reviewer;</p>
</td>
</tr>
<tr>
<td width="38" style="vertical-align:top">
<p>(3)</p>
</td>
<td colspan="3" width="621">
<p>Format Laporan Kemajuan dan Teknis pelaksanaannya akan diatur kemudian.</p>
</td>
</tr>
<tr>
<td width="38">
<p>&nbsp;</p>
</td>
<td colspan="3" width="621">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: center;"><strong>Pasal </strong><strong>5</strong></p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: center;"><strong>Laporan Akhir </strong><strong><?php echo $jenis;?></strong></p>
</td>
</tr>
<tr>
<td width="38" style="vertical-align:top">
<p>(1)</p>
</td>
<td colspan="3" width="621">
<p style="text-align: justify;">Laporan hasil pelaksanaan <?php echo $jenis;?> harus dijilid dalam satu kesatuan dengan laporan dan diserahkan dalam waktu paling lambat 14 (empat belas) hari kerja setelah pelaksanaan <?php echo $jenis;?> selesai;</p>
</td>
</tr>
<tr>
<td width="38" style="vertical-align:top">
<p>(2)</p>
</td>
<td colspan="3" width="621">
<p>Berkas-berkas laporan meliputi :</p>
</td>
</tr>
<tr>
<td width="38">
<p>&nbsp;</p>
</td>
<td width="38" style="vertical-align:top">
<p>(a)</p>
</td>
<td colspan="2" width="584">
<p style="text-align: justify;">Laporan dibuat rangkap 3 (tiga) dengan perincian 1 eksemplar untuk Unit Penelitian, Publikasi dan Pengabdian Pada Masyarakat (UP3M), 1 eksemplar untuk Perpustakaan, dan 1 eksemplar untuk Progam Studi homebase dosen yang bersangkutan;</p>
</td>
</tr>
<tr>
<td width="38" >
<p>&nbsp;</p>
</td>
<td width="38" style="vertical-align:top">
<p>(b)</p>
</td>
<td colspan="2" width="584">
<p>CD berisi file laporan lengkap.</p>
</td>
</tr>
<tr>
<td width="38" style="vertical-align:top">
<p>(3)</p>
</td>
<td colspan="3" width="621">
<p style="text-align: justify;">Format laporan hasil <?php echo $jenis;?> harus sesuai dengan aturan-aturan yang telah ditetapkan.</p>
</td>
</tr>
<tr>
<td width="38">
<p>&nbsp;</p>
</td>
<td colspan="3" width="621">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: center;"><strong>Pasal 6</strong></p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: center;"><strong>Sanksi</strong></p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: justify;">Segala kelalaian baik disengaja maupun tidak, sehingga menyebabkan keterlambatan menyerahkan laporan pelaksanaan <?php echo $jenis;?> dengan batas waktu dalam pasal 7 yang telah ditentukan akan mendapatkan sanksi sebagai berikut :</p>
</td>
</tr>
<tr>
<td width="38" style="vertical-align:top">
<p>(1)</p>
</td>
<td colspan="3" width="621">
<p style="text-align: justify;">Diberhentikannya bantuan keuangan, dan PIHAK KEDUA diwajibkan mengembalikan dana yang sudah diterima ke Kas STMIK Palangkaraya;</p>
</td>
</tr>
<tr>
<td width="38" style="vertical-align:top">
<p>(2)</p>
</td>
<td colspan="3" width="621">
<p style="text-align: justify;">Tidak diperbolehkan mengajukan usulan pelaksanaan <?php echo $jenis;?> pada periode tahun anggaran tersebut bagi ketua dan anggota peneliti.</p>
</td>
</tr>
<tr>
<td width="38">
<p>&nbsp;</p>
</td>
<td colspan="3" width="621">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: center;"><strong>Pasal 7</strong></p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p style="text-align: center;"><strong>Penutup</strong></p>
</td>
</tr>
<tr>
<td colspan="4" width="659">
<p>Perjanjian ini berlaku sejak ditandatangani dan disetujui oleh PIHAK PERTAMA dan PIHAK KEDUA.</p>
</td>
</tr>
</tbody>
</table>
<table>
<tbody>
<tr>
<td width="300">
<p style="text-align: center;">PIHAK PERTAMA</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;"><u><?=$rS->pejabat_nama;?></u><br />NIK. <?=$rS->pejabat_nik;?></p>
</td>
<td width="300">
<p style="text-align: center;">PIHAK KEDUA</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;"><u><?=$namadosen;?></u><br />NIK. <?=$rT->nik_dospem;?></p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<table style="width: 680px;">
<tbody>
<tr>
<td style="width: 514.545px;">
<font size="2"<p><strong><u>Tembusan Yth.</u></strong><br>
1. Ketua STMIK Palangkaraya;<br>
2. Wakil Ketua I;<br>
3. Ketua Program Studi;<br>
4. Arsip.
</p></font>
</td>
</tr>
</tbody>
</table>

</body>
</html>