<?php
include "../../file/koneksi/conn.php";
?>
<link rel="stylesheet" href="../../assets/tema/css/datepicker.css">
<script src="../../assets/tema/js/fontawesome.js"></script>
<style>
.datepicker{z-index:1151;}
</style>
<script>
$(document).ready(function(){
	$('#dosen_nik').blur(function(){
		var dosen_nik = $(this).val();

		$.ajax({
			type	: 'POST',
			url 	: 'pros.php',
			data 	: 'dosen_nik='+dosen_nik,
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
					 <h4 class="text-danger">Tambah Data Dosen</h4><hr>
                      <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" role="form" action="ads.php">
                        <div class="form-group row">
                          <label class="col-sm-4 form-control-label">NIK</label>
                          <div class="col-sm-7">
                            <input type="text" id="dosen_nik" class="form-control form-control-success" maxlength="15" name="dosen_nik" placeholder="Nomor Induk Karyawan" oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" onkeypress="return hanyaAngka(event)" autofocus required><span id="pesan"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 form-control-label">Nama Dosen</label>
                          <div class="col-sm-7">
                            <input type="text" name="dosen_nama" class="form-control form-control-success" placeholder="Nama Lengkap Dosen (Beserta Gelar)" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>                        
						<div class="form-group row">
                          <label class="col-sm-4 form-control-label">Tempat Lahir</label>
                          <div class="col-sm-7">
                            <input type="text" name="dosen_tempat" class="form-control form-control-success" placeholder="Tempat Lahir" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>						
						<div class="form-group row">
                          <label class="col-sm-4 form-control-label">Tanggal Lahir</label>
                          <div class="col-sm-7">
						  <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input id="tgl1" type="text" name="dosen_tgl_lahir" class="form-control form-control-success" placeholder="Tahun-Bulan-Tanggal" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						  </div>
                          </div>
                        </div>						
						<div class="form-group row">
                          <label class="col-sm-4 form-control-label">Program Studi</label>
                          <div class="col-sm-7">
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
                          <label class="col-sm-4 form-control-label">Alamat</label>
                          <div class="col-sm-7">
                            <textarea type="text" name="dosen_alamat" class="form-control form-control-success" placeholder="Alamat Lengkap" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                          </div>
                        </div>						
						<div class="form-group row">
                          <label class="col-sm-4 form-control-label">Telp/HP</label>
                          <div class="col-sm-7">
                            <input type="text" name="dosen_telp" class="form-control form-control-success" placeholder="Telp/HP" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>	
                        <div class="form-group row">       
                          <div class="col-sm-offset-9 offset-sm-10">
                            <input id="x" type="submit" value="Simpan" class="btn btn-primary">
                          </div>
                        </div><hr>
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


