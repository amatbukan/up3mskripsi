<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
include "../../file/template/atas.php";
include "admin_menu.php";
$dosen_nik = $_GET['nik'];
$qDosen = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$dosen_nik'");
$rD = mysql_fetch_object($qDosen);
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Ubah Data Dosen<small><small> <?php echo $rD->dosen_nama; ?></small></small></h2>
                </div>
            </div>
	<form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="adhu.php">
          <section class="forms">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-9">
                  <div class="card">
                    <div class="card-body">
                      <form class="form-horizontal">
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">NIK</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" name="dosen_nik" readonly="readonly" value="<?php echo $rD->dosen_nik;?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Nama Dosen</label>
                          <div class="col-sm-6">
                            <input type="text" name="dosen_nama" class="form-control form-control-success" placeholder="Nama Lengkap Dosen (Beserta Gelar)" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $rD->dosen_nama;?>">
                          </div>
                        </div>                        
						<div class="form-group row">
                          <label class="col-sm-3 form-control-label">Tempat Lahir</label>
                          <div class="col-sm-6">
                            <input type="text" name="dosen_tempat" class="form-control form-control-success" placeholder="Tempat Lahir" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $rD->dosen_tempat;?>">
                          </div>
                        </div>						
						<div class="form-group row">
                          <label class="col-sm-3 form-control-label">Tanggal Lahir</label>
                          <div class="col-sm-6">
						  <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input id="tgl" type="text" name="dosen_tgl_lahir" class="form-control form-control-success" placeholder="Tanggal Lahir" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $rD->dosen_tgl_lahir;?>">
						  </div>
                          </div>
                        </div>						
						<div class="form-group row">
                          <label class="col-sm-3 form-control-label">Program Studi</label>
                          <div class="col-sm-6">
                            <select class="form-control" name="prodi_kode" required oninvalid="this.setCustomValidity('Data harus dipilih')" oninput="setCustomValidity('')">
							<option value="">---Pilih Prodi---</option>
							<?php
								$qQ=mysql_query("SELECT * FROM prodi ORDER BY prodi_nama ASC");
								while($rT=mysql_fetch_object($qQ)) {
								$sel=($rD->dosen_prodi==$rT->prodi_kode)?'selected':'';
							?>
								<option value="<?=$rT->prodi_kode;?>" <?=$sel;?>> <?=$rT->prodi_nama;?> </option>
							<?php
							}
							?>
							</select>
                          </div>
                        </div>
						<div class="form-group row">
                          <label class="col-sm-3 form-control-label">Alamat</label>
                          <div class="col-sm-6">
                            <textarea type="text" name="dosen_alamat" class="form-control form-control-success" placeholder="Telp/HP" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo $rD->dosen_alamat;?></textarea>
                          </div>
                        </div>
						<div class="form-group row">
                          <label class="col-sm-3 form-control-label">Telp/HP</label>
                          <div class="col-sm-6">
                            <input type="text" name="dosen_telp" class="form-control form-control-success" placeholder="Telp/HP" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" onkeypress="return hanyaAngka(event)" value="<?php echo $rD->dosen_telp;?>">
                          </div>
                        </div>
						<div class="form-group row">
						<label class="col-sm-3 form-control-label"></label>						
                          <div class="col-sm-6">
                            <input type="submit" value="Perbarui" class="btn btn-success">
							<a href="admin_dosen.php" type="button" class="btn btn-danger">Kembali</a>
                          </div>
                        </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
		</section>
	</form>

<?php
include "../../file/template/bawah.php";
?>