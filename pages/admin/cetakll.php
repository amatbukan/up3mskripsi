<?php
include "../../file/koneksi/conn.php";
 // Define relative path from this script to mPDF
 $nama_dokumen='Laporan'; //Beri nama file PDF hasil.
define('_MPDF_PATH','MPDF57/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('c', 'Legal-L'); // Create new mPDF Document
 $tahun = $_GET['tahun'];
 $prodi = $_GET['prodi_kode'];
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<strong><p align="center">REKAP PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT<br> TAHUN <?=$tahun;?></p></strong>
<table border="1">
			<thead>
				<tr>
					<th class="text-center">No.</th>
					<th class="text-center" width="250px">NAMA</th>
					<th class="text-center">NIK/NIM</th>
					<th class="text-center" width="200px">JUDUL</th>
					<th class="text-center">JENIS KEGIATAN</th>
					<th class="text-center" width="180px">TEMPAT</th>
					<th class="text-center">DANA</th>
					<th class="text-center">TGL PELAKSANAAN</th>
					<th class="text-center" width="130px">TGL LAPORAN</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no=1;
			$qO=mysql_query("SELECT * FROM penelitian_pengabdian WHERE YEAR(tgl_serah_laporan)='$tahun' AND jenis='2' OR jenis='3' AND status='5' AND prodi='$prodi' ORDER BY id ASC")or die(mysql_error());
			while($rO=mysql_fetch_object($qO)){
	
	$qK = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$rO->nik_dospem'");
	$jK = mysql_num_rows($qK);
	$jKK = mysql_fetch_object($qK); 	
	if($jK > 0){
		$namadosen= $jKK->dosen_nama;
	}
	else{
		$namadosen="";
	}
	// Ke satu
	$qM = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$rO->identitas1'");
	$jMM = mysql_num_rows($qM); 
	$rMhs = mysql_fetch_object($qM); 

	$qDosen = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$rO->identitas1'");
	$jDosen = mysql_num_rows($qDosen); 
	$rDosen = mysql_fetch_object($qDosen);
	if($jMM > 0){
		$nama1= $rMhs->mhs_nama;
	}elseif($jDosen > 0){
		$nama1= $rDosen->dosen_nama;
		}
	else{
		$nama1="";
	}

	// Ke dua
	$qM2 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$rO->identitas2'");
	$jMM2 = mysql_num_rows($qM2); 
	$rMhs2 = mysql_fetch_object($qM2); 
	
	$qDosen2 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$rO->identitas2'");
	$jDosen2 = mysql_num_rows($qDosen2); 
	$rDosen2 = mysql_fetch_object($qDosen2);
	if($jMM2 > 0){
		$nama2= $rMhs2->mhs_nama;
	}elseif($jDosen2 > 0){
		$nama2= $rDosen2->dosen_nama;
		}
	else{
		$nama2="";
	}

	/// Ke tiga
	$qM3 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$rO->identitas3'");
	$jMM3 = mysql_num_rows($qM3); 
	$rMhs3 = mysql_fetch_object($qM3); 
	
	$qDosen3 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$rO->identitas3'");
	$jDosen3 = mysql_num_rows($qDosen3); 
	$rDosen3 = mysql_fetch_object($qDosen3);
	if($jMM3 > 0){
		$nama3= $rMhs3->mhs_nama;
	}elseif($jDosen3 > 0){
		$nama3= $rDosen3->dosen_nama;
		}
	else{
		$nama3="";
	}

	/// Ke empat
	$qM4 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$rO->identitas4'");
	$jMM4 = mysql_num_rows($qM4); 
	$rMhs4 = mysql_fetch_object($qM4); 
	
	$qDosen4 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$rO->identitas4'");
	$jDosen4 = mysql_num_rows($qDosen4); 
	$rDosen4 = mysql_fetch_object($qDosen4);
	if($jMM4 > 0){
		$nama4= $rMhs4->mhs_nama;
	}elseif($jDosen4 > 0){
		$nama4= $rDosen4->dosen_nama;
	}
	else{
		$nama4="";
	}

	/// Ke lima
	$qM5 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$rO->identitas5'");
	$jMM5 = mysql_num_rows($qM5); 
	$rMhs5 = mysql_fetch_object($qM5); 
	
	$qDosen5 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$rO->identitas5'");
	$jDosen5 = mysql_num_rows($qDosen5); 
	$rDosen5 = mysql_fetch_object($qDosen5);
	if($jMM5 > 0){
		$nama5= $rMhs5->mhs_nama;
	}elseif($jDosen5 > 0){
		$nama5= $rDosen5->dosen_nama;
		}
	else{
		$nama5="";
	}
	
	if($rO->jenis == '1' || $rO->jenis == '3' || $rO->jenis == '5'){
		$jenis = "Penelitian";
	}
	elseif($rO->jenis == '0' || $rO->jenis == '2' || $rO->jenis == '4'){
		$jenis = "Pengabdian Kepada Masyarakat";
	}
	else{
		$jenis = "";
	}
	?>			
				<tr>
					<td align="center"><?=$no;?></td>
					<td>
					<?=$nama1;?><br>	
					<?=$nama2;?><br>	
					<?=$nama3;?><br>	
					<?php
					if($rO->identitas4 !=""){
					?>
					<?=$nama4;?><br>
					<?php
					}
					?>
					<?php
					if($rO->identitas5 !=""){
					?>
					<?=$nama5;?>
					<?php
					}
					?>
					</td>
					<td>
					<?=$rO->identitas1;?><br>
					<?=$rO->identitas2;?><br>
					<?=$rO->identitas3;?><br>
					<?php
					if($rO->identitas4 !=""){
					?>
					<?=$rO->identitas4;?><br>
					<?php
					}
					?>
					<?php
					if($rO->identitas5 !=""){
					?>
					<?=$rO->identitas5;?><br>
					<?php
					}
					?>					
					</td>
					<td align="center"><?=$rO->judul;?></td>
					<td align="center"><?=$jenis;?></td>
					<td align="center"><?=$rO->tempat;?></td>
					<td align="center"><?php echo rp($rO->biaya);?></td>
					<td align="center"><?php echo month($rO->tgl_mulai_kegiatan);?>- <br><?php echo month($rO->tgl_akhir_kegiatan);?></td>
					<td align="center"><?php echo month($rO->tgl_serah_laporan);?></td>
				</tr>
			<?php
			$no++;
			}
			?>			
			</tbody>
			</table>
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>