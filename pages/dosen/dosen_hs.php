<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_dosen();
include "../../file/template/atas.php";
include "dosen_menu.php";
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Data <small><small> Penelitian/Pengabdian Kepada Masyarakat</small></small></h2>
                </div>
            </div>
	<section class="content">
		<div class="container-fluid">
                <?php
                //menampilkan pesan jika ada pesan
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo pesan_benar($_SESSION['pesan']);
                }
				unset($_SESSION['pesan']);
                //mengatur session pesan menjadi kosong
                $_SESSION['pesan'] = '';
                if (isset($_SESSION['pesan_salah']) && $_SESSION['pesan_salah'] <> '') {
                    echo pesan_salah($_SESSION['pesan_salah']);
                }
				unset($_SESSION['pesan_salah']);
                ?>
		</div>
		<div class="box-body table-responsive">
			<table id="modif" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th class="text-center">NO</th>
					<th class="text-center">JUDUL KEGIATAN</th>
					<th class="text-center">STATUS</th>				
					<th class="text-center">AKSI</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no=1;
			$qO=mysql_query("SELECT * FROM `penelitian_pengabdian` WHERE identitas1='$_SESSION[sesi_user]' OR identitas2='$_SESSION[sesi_user]' OR identitas3='$_SESSION[sesi_user]' OR identitas4='$_SESSION[sesi_user]' OR identitas5='$_SESSION[sesi_user]' OR nik_dospem='$_SESSION[sesi_user]'");
			while($rO=mysql_fetch_object($qO)) {
				
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
			?>	
				<tr>
					<td align="center"><?=$no;?></td>
					<td align="justify"><?=$rO->judul;?></td>
					<td align="center" style="vertical-align:middle"><?=$status;?></td>
					<td align="center">
						<a href="dtl_dft.php?id=<?=$rO->id;?>" class="btn btn-sm btn-danger" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Detail Data"><span class="fa fa-search"></span></a>
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

<?php
include "../../file/template/bawah.php";
?>