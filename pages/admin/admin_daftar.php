<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
include "../../file/template/atas.php";
include "admin_menu.php";
// kada jadi
$query = mysql_query("UPDATE penelitian_pengabdian SET status='3' WHERE tgl_mulai_kegiatan = CURDATE()");
$qu = mysql_query("UPDATE penelitian_pengabdian SET status='4' WHERE status='3' AND (tgl_serah_laporan ='0000-00-00') AND   tgl_akhir_kegiatan <= DATE_SUB(CURDATE(),INTERVAL 14 DAY)");

?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Data Pendaftaran<small><small> Penelitian/Pengabdian Kepada Masyarakat</small></small></h2>
                </div>
            </div>
	<section class="content">
		<div class="container-fluid">
                <?php
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo pesan_benar($_SESSION['pesan']);
                }
                unset($_SESSION['pesan']);
                $_SESSION['pesan'] = '';
                if (isset($_SESSION['pesan_salah']) && $_SESSION['pesan_salah'] <> '') {
                    echo pesan_salah($_SESSION['pesan_salah']);
                }
				unset($_SESSION['pesan_salah']);
                ?>
		<!--<span class="form-group pull-right">
			<a href="daftartb.php" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span> Tambah</a>
		</span>-->		
		</div>
		<div class="box-body table-responsive">
			<table id="modif" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th class="text-center" width="20px">No.</th>
					<th class="text-center">NIK/NIM- NAMA LENGKAP</th>
					<th class="text-center">JENIS</th>
					<th class="text-center">STATUS</th>
					<th class="text-center" width="100px">AKSI</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no=1;
			$qO=mysql_query("SELECT id,identitas1,identitas2,identitas3,identitas4,identitas5,status,jenis,judul,tempat FROM penelitian_pengabdian order by id desc")or die(mysql_error());
			while($rO=mysql_fetch_object($qO)){

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
	
	if($rO->status == '0'){
		$status = "<span class='label label-info'>Menunggu Validasi</span>";
	}
	elseif($rO->status == '1'){
		$status = "<span class='label label-success'>Diterima</span>";
	}
	elseif($rO->status == '2'){
		$status = "<span class='label label-danger'>Ditolak</span>";
	}
	elseif($rO->status == '3'){
		$status = "<span class='label label-info'>Mulai Kegiatan</span>";
	}	
	elseif($rO->status == '4'){
		$status = "<span class='label label-danger'>Belum Serah Laporan</span>";
	}	
	elseif($rO->status == '5'){
		$status = "<span class='label label-primary'>Selesai</span>";
	}
	
	if ($rO->jenis == '0' || $rO->jenis == '2' || $rO->jenis == '4'){
	$jenis = "<span class='label label-primary'>Pengabdian</span>";
	}
	elseif($rO->jenis == '1' || $rO->jenis == '3' || $rO->jenis == '5'){
		$jenis = "<span class='label label-info'>Penelitian</span>";
	}
	else{
		$jenis = "";
	}
	?>			
				<tr>
					<td align="center"><?=$no;?></td>
					<td>
					<table>
					<tr>
						<td width="50px" style="vertical-align:top"> Judul: </td>
						<td align="justify"><?=$rO->judul;?></td>
					</tr>					
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td width="50px" style="vertical-align:top"> Tempat: </td>
						<td align="justify"><?=$rO->tempat;?> </td>
					</tr>
					</table>
					<br>
					<?=$rO->identitas1;?> - <?=$nama1;?><br>	
					<?=$rO->identitas2;?> - <?=$nama2;?><br>	
					<?=$rO->identitas3;?> - <?=$nama3;?><br>	
					<?php
					if($rO->identitas4 !=""){
					?>
					<?=$rO->identitas4;?> - <?=$nama4;?><br>
					<?php
					}
					?>
					<?php
					if($rO->identitas5 !=""){
					?>
					<?=$rO->identitas5;?> - <?=$nama5;?>
					<?php
					}
					?>
					</td>
					<td align="center" style="vertical-align:middle"><?php echo $jenis;?>
					<td align="center" style="vertical-align:middle"><?php echo $status;?>
					<td align="center" style="vertical-align:middle">				
						<a href="ded.php?id=<?=$rO->id;?>" class="btn btn-sm btn-warning" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Edit Data"><span class="fa fa-edit"></span></a>						
						<a href="daftar_dtl.php?id=<?=$rO->id;?>" class="btn btn-sm btn-info" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Lihat Data Lengkap"><span class="fa fa-bars"></span></a>
						
						<a href="hps_daf.php?id=<?=$rO->id;?>" class="btn btn-sm btn-danger" onclick="return confirm('Data ini akan dihapus?')" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Hapus Data"><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php
			$no++;
			}
			?>			
			</tbody>
			</table>
	</div>
	</section>
	<br>
<?php
include "../../file/template/bawah.php";
?>