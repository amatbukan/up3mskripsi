<?php
include "../../file/koneksi/conn.php";
include "../../file/template/atas.php";
cek_sesi();
cek_level_mhs();
include "mhs_menu.php";
$nim = $_GET['nim'];
$qM = mysql_query("SELECT mhs.mhs_nim, mhs.mhs_nama, mhs.mhs_alamat, mhs.mhs_jk, mhs.mhs_tempat, mhs.mhs_tgl_lahir, mhs.mhs_prodi, prodi.prodi_nama FROM mhs, prodi WHERE mhs.mhs_prodi = prodi.prodi_kode AND mhs_nim='$nim'");
$rM = mysql_fetch_object($qM);
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Data Diri<small><small> Ubah Data Diri</small></small></h1>
		</div>
	</div>
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
<form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="mdu.php">
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
                            <input type="text" class="form-control form-control-success" readonly="readonly" value="<?php echo $rM->mhs_nim;?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Nama Mahasiswa</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" readonly="readonly" value="<?php echo $rM->mhs_nama;?>">
                          </div>
                        </div>                          
						<div class="form-group row">
                          <label class="col-sm-3 form-control-label">Jenis Kelamin</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" readonly="readonly" value="<?php echo $rM->mhs_jk;?>">
                          </div>
                        </div>  
 						
						<div class="form-group row">
                          <label class="col-sm-3 form-control-label">Tempat Lahir</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" readonly="readonly" value="<?php echo $rM->mhs_tempat;?>">
                          </div>
                        </div>						
						<div class="form-group row">
                          <label class="col-sm-3 form-control-label">Tanggal Lahir</label>
                          <div class="col-sm-6">
						  <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" name="mhs_tgl_lahir" class="form-control form-control-success" readonly="readonly" value="<?php echo month($rM->mhs_tgl_lahir);?>">
						  </div>
                          </div>
                        </div>						
						<div class="form-group row">
                          <label class="col-sm-3 form-control-label">Program Studi</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" readonly="readonly" value="<?php echo $rM->prodi_nama;?>">
                          </div>
                        </div>							
						<div class="form-group row">
                          <label class="col-sm-3 form-control-label">Alamat</label>
                          <div class="col-sm-6">
                            <textarea autofocus type="text" class="form-control form-control-success" name="mhs_alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo $rM->mhs_alamat;?></textarea>
                          </div>
                        </div>								
						<div class="form-group row">       
							<label class="col-sm-3 form-control-label"></label>
							<div class="col-sm-6">
								<input type="submit" value="Perbarui" class="btn btn-primary">
								<a href="mhs_beranda.php" type="button" class="btn btn-danger">Kembali</a>
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
</div>