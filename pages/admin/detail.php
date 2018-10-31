<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
include "../../file/template/atas.php";
include "admin_menu.php";
$qDosen = mysql_query("SELECT dosen.dosen_nik, dosen.dosen_nama, dosen.dosen_tempat, dosen.dosen_tgl_lahir, dosen.dosen_telp, dosen.dosen_alamat, prodi.prodi_nama FROM dosen, prodi WHERE dosen.dosen_prodi = prodi.prodi_kode AND dosen_nik='$_GET[nik]'");
$rD = mysql_fetch_object($qDosen);
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Detail Data Dosen<small><small> <?php echo $rD->dosen_nama; ?></small></small></h2>
                </div>
            </div>

			<div class="form-group row">
			  <label class="col-sm-2 form-control-label">NIK</label>
			  <div class="col-sm-2">
				<input type="text" class="form-control form-control-success" readonly="readonly" value="<?php echo $rD->dosen_nik; ?>">
			  </div>
			</div>			
			<div class="form-group row">
			  <label class="col-sm-2 form-control-label">Nama Dosen</label>
			  <div class="col-sm-4">
				<input type="text" class="form-control form-control-success" readonly="readonly" value="<?php echo $rD->dosen_nama; ?>">
			  </div>
			</div>					
			<div class="form-group row">
			  <label class="col-sm-2 form-control-label">Tempat Tanggal Lahir</label>
			  <div class="col-sm-4">
				<input type="text" class="form-control form-control-success" readonly="readonly" value="<?php echo $rD->dosen_tempat;?>, <?php echo month($rD->dosen_tgl_lahir);?>">
			  </div>
			</div>			
			<div class="form-group row">
			  <label class="col-sm-2 form-control-label">Dosen Program Studi</label>
			  <div class="col-sm-3">
				<input type="text" class="form-control form-control-success" readonly="readonly" value="<?php echo $rD->prodi_nama; ?>">
			  </div>
			</div>				
			<div class="form-group row">
			  <label class="col-sm-2 form-control-label">Alamat</label>
			  <div class="col-sm-3">
				<textarea type="text" class="form-control form-control-success" readonly="readonly"><?php echo $rD->dosen_alamat;?></textarea>
			  </div>
			</div>			
			<div class="form-group row">
			  <label class="col-sm-2 form-control-label">Telp/HP</label>
			  <div class="col-sm-2">
				<input type="text" class="form-control form-control-success" readonly="readonly" value="<?php echo $rD->dosen_telp; ?>">
			  </div>
			</div>	
			<a href="admin_dosen.php" class="btn btn-xl btn-danger"><span class="fa fa-caret-square-o-left"> Kembali</span></a>
</div>
<?php
include "../../file/template/bawah.php";
?>