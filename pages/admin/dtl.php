<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
include "../../file/template/atas.php";
include "admin_menu.php";
$qM = mysql_query("SELECT mhs.mhs_nim, mhs.mhs_nama, mhs.mhs_tempat, mhs.mhs_tgl_lahir, mhs.mhs_jk, mhs.mhs_alamat, prodi.prodi_nama FROM mhs, prodi WHERE mhs.mhs_prodi = prodi.prodi_kode AND mhs_nim='$_GET[nim]'");
$rM = mysql_fetch_object($qM);
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Detail Data Mahasiswa<small><small> <?php echo $rM->mhs_nama; ?></small></small></h2>
                </div>
            </div>

			<div class="form-group row">
			  <label class="col-sm-2 form-control-label">NIM</label>
			  <div class="col-sm-2">
				<input type="text" class="form-control form-control-success" readonly="readonly" value="<?php echo $rM->mhs_nim; ?>">
			  </div>
			</div>			
			<div class="form-group row">
			  <label class="col-sm-2 form-control-label">Nama Mahasiswa</label>
			  <div class="col-sm-4">
				<input type="text" class="form-control form-control-success" readonly="readonly" value="<?php echo $rM->mhs_nama; ?>">
			  </div>
			</div>			
			<div class="form-group row">
			  <label class="col-sm-2 form-control-label">Jenis Kelamin</label>
			  <div class="col-sm-2">
				<input type="text" class="form-control form-control-success" readonly="readonly" value="<?php echo $rM->mhs_jk; ?>">
			  </div>
			</div>			
			<div class="form-group row">
			  <label class="col-sm-2 form-control-label">Tempat Tanggal Lahir</label>
			  <div class="col-sm-4">
				<input type="text" class="form-control form-control-success" readonly="readonly" value="<?php echo $rM->mhs_tempat;?>, <?php echo month($rM->mhs_tgl_lahir);?>">
			  </div>
			</div>			
			<div class="form-group row">
			  <label class="col-sm-2 form-control-label">Program Studi</label>
			  <div class="col-sm-3">
				<input type="text" class="form-control form-control-success" readonly="readonly" value="<?php echo $rM->prodi_nama; ?>">
			  </div>
			</div>			
			<div class="form-group row">
			  <label class="col-sm-2 form-control-label">Alamat</label>
			  <div class="col-sm-3">
					<textarea type="text" class="form-control form-control-success" readonly="readonly"><?php echo $rM->mhs_alamat; ?></textarea>
			  </div>
			</div>
			<a href="admin_mhs.php" class="btn btn-xl btn-danger"><span class="fa fa-caret-square-o-left"> Kembali</span></a>
</div>
<?php
include "../../file/template/bawah.php";
?>