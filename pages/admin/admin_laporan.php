<?php
require_once "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
include "../../file/template/atas.php";
require_once "admin_menu.php";
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan</h1><hr>
                </div>
            </div>
			<section class="forms">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" role="form" action="ctk.php">					
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Cetak Laporan</label>
                          <div class="col-sm-3">
                            <select class="form-control" name="filter" required oninvalid="this.setCustomValidity('Data harus dipilih')" oninput="setCustomValidity('')">
							<option value="">--- Pilih Cetak Laporan ---</option>
							<option value="3">Program Dosen dan Mahasiswa</option>
							<option value="2">Program Dosen </option>
							<!--<option value="3">PKM Terpadu</option>-->
							</select>
                          </div>
                        </div>	
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Tahun</label>
                          <div class="col-sm-3">
                            <select class="form-control" name="tahun" required oninvalid="this.setCustomValidity('Data harus dipilih')" oninput="setCustomValidity('')">
							<option value="">--- Tahun ---</option>
							<?php
								$qO=mysql_query("SELECT distinct(EXTRACT(YEAR FROM tgl_serah_laporan)) as tahun FROM penelitian_pengabdian WHERE NOT tgl_serah_laporan='0000-00-00'") or die(mysql_error());
								while($rO=mysql_fetch_object($qO)) {
							?>
								<option value="<?=$rO->tahun;?>"><?=$rO->tahun;?></option>
							<?php
							}
							?>
							</select>
                          </div>
                        </div>	
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Program Studi</label>
                          <div class="col-sm-3">
                            <select class="form-control" name="prodi_kode" required oninvalid="this.setCustomValidity('Data harus dipilih')" oninput="setCustomValidity('')">
							<option value="">--- Pilih Prodi ---</option>
							<?php
								$qO=mysql_query("SELECT * FROM prodi ORDER BY prodi_nama ASC") or die(mysql_error());
								while($rO=mysql_fetch_object($qO)) {
							?>
								<option value="<?=$rO->prodi_kode;?>"><?=$rO->prodi_nama;?></option>
							<?php
							}
							?>
							</select>
                          </div>
                        </div>	
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Serah Laporan</label>
                          <div class="col-sm-3">
                            <select class="form-control" name="laporan" required oninvalid="this.setCustomValidity('Data harus dipilih')" oninput="setCustomValidity('')">
							<option value="">--- Pilih Laporan ---</option>
							<option value="AND (tgl_serah_laporan <> 0000-00-00)">Selesai</option>
							<option value="AND (tgl_serah_laporan = 0000-00-00)">Belum </option>
							<!--<option value="3">PKM Terpadu</option>-->
							</select>
                          </div>
                        </div>							
                        <div class="form-group row">       
                          <label class="col-sm-2 form-control-label"></label>
                          <div class="col-sm-3">
                            <input type="submit" value="Cetak" class="btn btn-primary">
							<a href="admin_beranda.php" type="button" class="btn btn-danger">Kembali</a>
                          </div>
                        </div><hr>
                      </form>
                    </div>
                  </div>
                </div>
                </div>
                </div>
		</section>
<?php
include "../../file/template/bawah.php";
?>