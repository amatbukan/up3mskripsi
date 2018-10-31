<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
include "../../file/template/atas.php";
include "admin_menu.php";
$nim = $_GET['nim'];
$qM = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$nim'");
$rM = mysql_fetch_object($qM);
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Ubah Data Mahasiswa<small><small> <?php echo $rM->mhs_nama; ?></small></small></h2>
                </div>
            </div>
	<form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="amhu.php">
          <section class="forms">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-9">
                  <div class="card">
                    <div class="card-body">
                      <form class="form-horizontal">
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">NIM</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control form-control-success" name="mhs_nim" placeholder="Nomor Induk Mahasiswa" oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" onkeypress="return hanyaAngka(event)" readonly="readonly" value="<?php echo $rM->mhs_nim;?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Nama Mahasiswa</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" name="mhs_nama" placeholder="Nama Lengkap Mahasiswa" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" autofocus value="<?php echo $rM->mhs_nama;?>">
                          </div>
                        </div>  
						<div class="form-group row">
                          <label class="col-sm-3 form-control-label">Jenis Kelamin</label>
                          <div class="col-sm-6">
						  <?php
							if($rM->mhs_jk=='Perempuan') { $cekP='checked'; $cekL='';}
							else {$cekP=''; $cekL='checked';}
							?>
						  
							<input type="radio" name="mhs_jk" value="Laki-Laki" required <?=$cekL;?>> Laki-Laki
							<input type="radio" name="mhs_jk" value="Perempuan" required <?=$cekP;?>> Perempuan
                          </div>
                        </div> 						
						<div class="form-group row">
                          <label class="col-sm-3 form-control-label">Tempat Lahir</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" name="mhs_tempat" placeholder="Tempat Lahir" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $rM->mhs_tempat;?>">
                          </div>
                        </div>						
						<div class="form-group row">
                          <label class="col-sm-3 form-control-label">Tanggal Lahir</label>
                          <div class="col-sm-6">
						  <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input id="tgl" type="text" name="mhs_tgl_lahir" class="form-control form-control-success" placeholder="Tanggal Lahir" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $rM->mhs_tgl_lahir;?>">
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
								$sel=($rM->mhs_prodi==$rT->prodi_kode)?'selected':'';
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
                            <textarea type="text" class="form-control form-control-success" name="mhs_alamat" placeholder="Alamat Lengkap" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo $rM->mhs_alamat;?></textarea>
                          </div>
                        </div>								
						<div class="form-group row"> 
						<label class="col-sm-3 form-control-label"></label>						
                          <div class="col-sm-6">
                            <input type="submit" value="Perbarui" class="btn btn-success">
							<a href="admin_mhs.php" type="button" class="btn btn-danger">Kembali</a>
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