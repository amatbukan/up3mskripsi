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
                    <h2 class="page-header">Data Mahasiswa<small><small> Daftar Mahasiswa</small></small></h2>
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
			<span class="form-group pull-right">
				<a href="#" class="btn btn-primary btn-sm" onclick="tampilkanModal('ami.php')"><span class="fa fa-plus"></span> Tambah</a>
			</span>
		</div>
		<div class="box-body table-responsive">
			<table id="modif" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th class="text-center">No.</th>
					<th class="text-center">NIM</th>
					<th class="text-center">NAMA MAHASISWA</th>
					<th class="text-center">PROGRAM STUDI</th>
					<th class="text-center">AKSI</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no=1;
			$qO=mysql_query("SELECT mhs.mhs_nim, mhs.mhs_nama, mhs.mhs_prodi, prodi.prodi_nama FROM mhs, prodi WHERE mhs.mhs_prodi = prodi.prodi_kode ORDER BY mhs_nim ASC");
			while($rO=mysql_fetch_object($qO)) {
			?>	
				<tr>
					<td align="center"><?=$no;?></td>
					<td align="center"><?=$rO->mhs_nim;?></td>
					<td><a href="dtl.php?nim=<?=$rO->mhs_nim;?>"><span class="fa fa-user"> <?=$rO->mhs_nama; ?></span></a></td>
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
						<a href="amu.php?nim=<?=$rO->mhs_nim;?>" class="btn btn-sm btn-info" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Ubah Mahasiswa"><span class="fa fa-edit"></span></a>
						<a href="amh.php?nim=<?=$rO->mhs_nim;?>" class="btn btn-sm btn-danger" onclick="return confirm('Data Mahasiswa [<?=$rO->mhs_nama;?>] akan dihapus?')" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Hapus Mahasiswa"><span class="fa fa-trash"></span></a>
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