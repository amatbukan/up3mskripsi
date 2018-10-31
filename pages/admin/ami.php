<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
?>
<link rel="stylesheet" href="../../assets/tema/css/datepicker.css">
<script src="../../assets/tema/js/fontawesome.js"></script>
<style>
.datepicker{z-index:1151;}
</style>
<script>
$(document).ready(function(){
	$('#mhs_nim').blur(function(){
		var mhs_nim = $(this).val();

		$.ajax({
			type	: 'POST',
			url 	: 'proses.php',
			data 	: 'mhs_nim='+mhs_nim,
			success	: function(data){
				if(data==0){
					$("#pesan").html(data);
					$( "#x" ).prop( "disabled", false );
					}
					else{
						$("#pesan").html(data);
						$( "#x" ).prop( "disabled", true );
					}
			}
		})

	});
});
</script>
          <section class="forms">		  
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
					<h4 class="text-danger">Tambah Data Mahasiswa</h4><hr>
                      <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" role="form" action="ams.php">
                        <div class="form-group row">
                          <label class="col-sm-4 form-control-label">NIM</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" maxlength="15" name="mhs_nim" placeholder="Nomor Induk Karyawan" oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" id="mhs_nim" autofocus required><span id="pesan"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 form-control-label">Nama Mahasiswa</label>
                          <div class="col-sm-6">
                            <input type="text" name="mhs_nama" class="form-control form-control-success" placeholder="Nama Lengkap Mahasiswa" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>                         
						<div class="form-group row">
                          <label class="col-sm-4 form-control-label">Jenis Kelamin</label>
                          <div class="col-sm-6">
							<input type="radio" name="mhs_jk" value="Laki-Laki" required> Laki-Laki
							<input type="radio" name="mhs_jk" value="Perempuan" required> Perempuan
                          </div>
                        </div>                        
						<div class="form-group row">
                          <label class="col-sm-4 form-control-label">Tempat Lahir</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" name="mhs_tempat" placeholder="Tempat Lahir" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>						
						<div class="form-group row">
                          <label class="col-sm-4 form-control-label">Tanggal Lahir</label>
                          <div class="col-sm-6">
						  <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input id="tgl1" type="text" name="mhs_tgl_lahir" class="form-control form-control-success" placeholder="Tanggal Lahir" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						  </div>
                          </div>
                        </div>						
						<div class="form-group row">
                          <label class="col-sm-4 form-control-label">Program Studi</label>
                          <div class="col-sm-6">
                            <select class="form-control" name="prodi_kode" required oninvalid="this.setCustomValidity('Data harus dipilih')" oninput="setCustomValidity('')">
							<option value="">---Pilih Prodi---</option>
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
                          <label class="col-sm-4 form-control-label">Alamat</label>
                          <div class="col-sm-6">
                            <textarea type="text" name="mhs_alamat" class="form-control form-control-success" placeholder="Alamat Lengkap" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                          </div>
                        </div>							
                        <div class="form-group row">       
                          <div class="col-sm-offset-8 offset-sm-8">
                            <input id="x" type="submit" value="Simpan" class="btn btn-primary">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                </div>
                </div>
		</section>
<script src="../../assets/tema/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
$('#tgl1').datepicker({format:'yyyy-mm-dd'});

</script>

