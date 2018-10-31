<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
include "../../file/template/atas.php";
include "admin_menu.php";
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Data Dosen<small><small> Daftar Dosen</small></small></h2>
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
			<span class="form-group pull-right">
				<a href="#" class="btn btn-primary btn-sm" onclick="tampilkanModal('adi.php')"><span class="fa fa-plus"></span> Tambah</a>
			</span>
		</div>
		<div class="box-body table-responsive">
			<table id="modif" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th class="text-center">No.</th>
					<th class="text-center">NIK</th>
					<th class="text-center">NAMA DOSEN</th>
					<th class="text-center">DOSEN PRODI</th>
					<th class="text-center">AKSI</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no=1;
			$qO=mysql_query("SELECT dosen.dosen_nik, dosen.dosen_nama, prodi.prodi_nama FROM dosen, prodi WHERE dosen.dosen_prodi = prodi.prodi_kode ORDER BY dosen_nik ASC");
			while($rO=mysql_fetch_object($qO)) {
			?>	
				<tr>
					<td align="center"><?=$no;?></td>
					<td align="center"><?=$rO->dosen_nik ?></td>
					<td><a href="detail.php?nik=<?=$rO->dosen_nik ?>"><span class="fa fa-user"> <?=$rO->dosen_nama; ?></span></a></td>
					<td align="center">
					<?php
					if ($rO->prodi_nama == 'Teknik Informatika') {
						echo "<span class='label label-danger'>$rO->prodi_nama</span>";
					}
					if ($rO->prodi_nama == 'Sistem Informasi') {
						echo "<span class='label label-success'>$rO->prodi_nama</span>";
					}
					if ($rO->prodi_nama == 'Manajemen Informatika') {
						echo "<span class='label label-info'>$rO->prodi_nama</span>";
					}
					?>
					</td>
					<td align="center">
						<a href="adu.php?nik=<?=$rO->dosen_nik;?>" class="btn btn-sm btn-info" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Ubah Data Dosen"><span class="fa fa-edit"></span></a></span></a>
						<a href="adh.php?nik=<?=$rO->dosen_nik;?>" class="btn btn-sm btn-danger" onclick="return confirm('Data Dosen [<?=$rO->dosen_nama;?>] akan dihapus?')" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Hapus Data Dosen"><span class="fa fa-trash"></span></a>
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