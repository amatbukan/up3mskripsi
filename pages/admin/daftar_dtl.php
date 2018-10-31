<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
include "../../file/template/atas.php";
include "admin_menu.php";
$qD = mysql_query("SELECT * FROM penelitian_pengabdian WHERE id='$_GET[id]'");
$qq = mysql_fetch_object($qD);
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Detail Data<small><small> Penelitian/Pengabdian Kepada Masyarakat</small></small></h1>
		</div>
	</div>
	<span class="form-group pull-right">
			<div class="dropdown">
			  <a class="btn btn-sm btn-success dropdown-toggle"  type="button" data-toggle="dropdown">Validasi
			  <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="validasi.php?id=<?=$qq->id;?>&aksi=terima">Diterima</a></li>
				<li><a href="validasi.php?id=<?=$qq->id;?>&aksi=tolak">Ditolak</a></li>
			  </ul>
			</div>
	</span>
	<form action="" method="post" class="form">
		<table id="modif" class="table table-bordered table-striped table-condensed table-hover">
			<tr>
				<td width="150px">Judul</td>
				<td><?=$qq->judul;?></td>
			</tr>			
			<tr>
				<td>Tempat</td>
				<td><?=$qq->tempat;?></td>
			</tr>
		<?php
		if ($qq->jenis == '0' || $qq->jenis == '2' || $qq->jenis == '4'){
			$jenis = "<span class='label label-danger'>Pengabdian Kepada Masyarakat</span>";
		}
		if ($qq->jenis == '1' || $qq->jenis == '3' || $qq->jenis == '5'){
			$jenis ="<span class='label label-success'>Penelitian</span>";
		}
		?>			
			<tr>
				<td>Jenis Kegiatan</td>
				<td style="vertical-align:middle"><?=$jenis;?></td>
			</tr>	
			<?php
			// Ke satu
				$qM = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$qq->identitas1'");
				$jMM = mysql_num_rows($qM); 
				$rMhs = mysql_fetch_object($qM); 
				
				$qDosen = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$qq->identitas1'");
				$jDosen = mysql_num_rows($qDosen); 
				$rDosen = mysql_fetch_object($qDosen);
			if($jMM > 0){
				$nama1= $rMhs->mhs_nama;
			}elseif($jDosen > 0){
				$nama1= $rDosen->dosen_nama;
			}else{
				$nama1="";
			}
			
			$qM2 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$qq->identitas2'");
			$jMM2 = mysql_num_rows($qM2); 
			$rMhs2 = mysql_fetch_object($qM2); 
			
			$qDosen2 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$qq->identitas2'");
			$jDosen2 = mysql_num_rows($qDosen2); 
			$rDosen2 = mysql_fetch_object($qDosen2);
			if($jMM2 > 0){
				$nama2= $rMhs2->mhs_nama;
			}elseif($jDosen2 > 0){
				$nama2= $rDosen2->dosen_nama;
			}else{
				$nama2="";
			}		

			$qM3 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$qq->identitas3'");
			$jMM3 = mysql_num_rows($qM3); 
			$rMhs3 = mysql_fetch_object($qM3); 
			
			$qDosen3 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$qq->identitas3'");
			$jDosen3 = mysql_num_rows($qDosen3); 
			$rDosen3 = mysql_fetch_object($qDosen3);
			if($jMM3 > 0){
				$nama3= $rMhs3->mhs_nama;
			}elseif($jDosen3 > 0){
			$nama3= $rDosen3->dosen_nama;
			}else{
				$nama3="";
			}	

			$qM4 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$qq->identitas4'");
			$jMM4 = mysql_num_rows($qM4); 
			$rMhs4 = mysql_fetch_array($qM4); 
			
			$qDosen4 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$qq->identitas4'");
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
			
			$qM5 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$qq->identitas5'");
			$jMM5 = mysql_num_rows($qM5); 
			$rMhs5 = mysql_fetch_array($qM5); 
			
			$qDosen5 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$qq->identitas5'");
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
			
			if($qq->status =='0' || $qq->status =='2'){
				$status ="disabled";
			}
			else{
				$status ="";
			}
			
			if($qq->tgl_serah_proposal =='0000-00-00'){
				$list = "disabled";
			}
			else{
				$list = "";
			}			
			
			if($qq->tgl_serah_laporan =='0000-00-00'){
				$list2 = "disabled";
			}
			else{
				$list2 = "";
			}
			?>			
			<tr>
				<td>Anggota :</td>
				<td>
					1. <?=$qq->identitas1;?> - <?=$nama1;?><br>
					2. <?=$qq->identitas2;?> - <?=$nama2;?><br>
					3. <?=$qq->identitas3;?> - <?=$nama3;?><br>
					<?php
					if($qq->identitas4 != ""){
					?>
					4. <?=$qq->identitas4;?> - <?=$nama4;?><br>
					<?php
					}
					?>
					<?php
					if($qq->identitas5 != ""){
					?>
					5. <?=$qq->identitas5;?> - <?=$nama5;?>
					<?php
					}
					?>
				</td>
			</tr>
<?php
			$qK = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$qq->nik_dospem'");
			$jK = mysql_num_rows($qK);
			$jKK = mysql_fetch_object($qK); 	
			if($jK > 0){
				$namadosen= $jKK->dosen_nama;
			}
			else{
				$namadosen="";
			}
?>
			<tr>
				<td>Telp</td>
				<td><?=$qq->telp;?></td>
			</tr>

<?php
if($qq->status =='1' || $qq->status =='3' || $qq->status =='4' || $qq->status =='5'){
?>			
			<tr>
				<td>Pendamping</td>
				<td><?=$qq->nik_dospem;?> - <?=$namadosen;?></td>
			</tr>	
			<tr>
				<td>Biaya</td>
				<td><?= rupiah($qq->biaya);?></td>
			</tr>			
		
			<?php
				if($qq->tgl_serah_proposal =='0000-00-00'){
					$proposal = "<a href='p.php?id=$qq->id' class='btn btn-xm btn-primary' data-toggle='popover' data-trigger='hover' data-placement='top' data-content='Terima Proposal'><span class='fa fa-check-square-o'></span></a>";
				}
				else{
					$proposal = month($qq->tgl_serah_proposal);
				}
			?>
			<tr>
				<td width="150px">Tanggal Penyerahan Proposal</td>
				<td><?=$proposal;?></td>
			</tr>			
			<tr>
				<td width="150px">Tanggal Mulai Kegiatan</td>
				<td><?= month($qq->tgl_mulai_kegiatan);?></td>
			</tr>			
			<tr>
				<td width="150px">Tanggal Akhir Kegiatan</td>
				<td><?= month($qq->tgl_akhir_kegiatan);?></td>
			</tr>
			<?php
				if($qq->tgl_serah_laporan =='0000-00-00'){
					$laporan = "<a href='l.php?id=$qq->id' class='btn btn-xm btn-success' data-toggle='popover' data-trigger='hover' data-placement='top' $list data-content='Terima Laporan'><span class='fa fa-check-square-o'></span></a>";
				}
				else{
					$laporan = month($qq->tgl_serah_laporan);
				}
			?>			
			<tr>
				<td width="150px">Tanggal Penyerahan Laporan</td>
				<td><?=$laporan;?></td>
			</tr>
		</table>
	</form>

<div class="dropdown">
  <a class="btn btn-primary dropdown-toggle <?=$status;?>"  type="button" data-toggle="dropdown">Cetak
  <span class="caret"></span></a>
  <ul class="dropdown-menu">
  <?php
	if($qq->jenis == '0' || $qq->jenis =='1' || $qq->jenis =='2' || $qq->jenis =='3'){
  ?>
    <li><a href="nosurat.php?id=<?=$qq->id;?>&jn=<?=$qq->jenis;?>" target="_blank">Surat Pengantar</a></li>
<?php
	}
	?>
    <li class="<?=$list;?>"><a href="nosurat2.php?id=<?=$qq->id;?>&jn=<?=$qq->jenis;?>" target="_blank">Surat Kontrak</a></li>
    <li class="<?=$list;?>"><a href="nosurat3.php?id=<?=$qq->id;?>&jn=<?=$qq->jenis;?>" target="_blank">Surat Tugas</a></li>
    <li class="<?=$list2;?>"><a href="nosurat4.php?id=<?=$qq->id;?>&jn=<?=$qq->jenis;?>" target="_blank">Tanda Bukti Laporan</a></li>
  </ul>
</div>


		<?php
		}	
		?>
</div>

<br>
<br>
<?php
include "../../file/template/bawah.php";
?>