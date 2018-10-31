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
                    <h2 class="page-header">Data Prodi<small><small> Daftar Program Studi</small></small></h2>
                </div>
            </div>
	<section class="content">
		<div class="container-fluid">
			<span class="form-group pull-right">
			</span>
		</div>
		<div class="box-body table-responsive">
			<table id="modif" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th class="text-center">No.</th>
					<th class="text-center">Kode Prodi</th>
					<th class="text-center">NAMA PROGRAM STUDI</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no=1;
			$qO=mysql_query("SELECT * FROM prodi ORDER BY prodi_kode ASC");
			while($rO=mysql_fetch_object($qO)) {
			?>	
				<tr>
					<td align="center"><?=$no;?></td>
					<td align="center"><?=$rO->prodi_kode;?></td>
					<td align="center"><?=$rO->prodi_nama;?></td>
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