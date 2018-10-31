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
				<h2 class="page-header">Tambah Data<small><small> Penelitian/Pengabdian Kepada Masyarakat</small></small></h2>
			</div>
		</div>
	<form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="tambahkegiatan.php">
          <section class="forms">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
					  <!-- Ketua -->
                        <div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIM/NIK</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim" name="mhs_nim" autofocus onchange="showData6()" autofocus oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Anggota</label>
                          <div class="col-sm-3">
                            <input type="text" id="mhs_nama" class="form-control form-control-success" readonly="readonly">
                          </div>
                        </div>						
						<!-- Anggota 1 -->	
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIM/NIK</label>
                          <div class="col-sm-2">
                            <input type="text" required class="form-control form-control-success" id="mhs_nim2" name="mhs_nim2" onchange="showData()" autofocus oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Anggota</label>
                          <div class="col-sm-3">
                            <input type="text" required id="mhs_nama2" class="form-control form-control-success" readonly="readonly" oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>						
						<!-- Anggota 2 -->		
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIM/NIK</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim3" name="mhs_nim3" onchange="showData2()"  autofocus oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" required>
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Anggota</label>
                          <div class="col-sm-3">
                            <input type="text" id="mhs_nama3" class="form-control form-control-success" readonly="readonly" oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" required>
                          </div>
                        </div>						
						<!-- Anggota 3 -->		
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIM/NIK</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim4" name="mhs_nim4" onchange="showData3()" autofocus>
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Anggota</label>
                          <div class="col-sm-3">
                            <input type="text" id="mhs_nama4" class="form-control form-control-success" readonly="readonly">
                          </div>
                        </div>						
						<!-- Anggota 4 -->		
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIM/NIK</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim5" name="mhs_nim5" onchange="showData4()" autofocus>
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Anggota</label>
                          <div class="col-sm-3">
                            <input type="text" id="mhs_nama5" class="form-control form-control-success" readonly="readonly">
                          </div>
                        </div>
						<!-- Pendamping -->
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIK</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="dospem" name="nik_dospem" onchange="showData5()" autofocus>
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Dosen</label>
                          <div class="col-sm-3">
                            <input type="text" id="dospem_nama" class="form-control form-control-success" readonly="readonly">
                          </div>
                        </div>
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Jenis Kegiatan</label>
                          <div class="col-sm-6">
                            <select class="form-control" name="jenisPenelitian" required oninvalid="this.setCustomValidity('Data harus dipilih')" oninput="setCustomValidity('')">
								<option value="">--- Pilih Kegiatan ---</option>
								<option value="0">Pengabdian Kepada Masyarakat</option>
								<option value="1">Penelitian</option>
							</select>
                          </div>
                        </div>
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Judul Kegiatan</label>
                          <div class="col-sm-6">
                            <textarea type="text" class="form-control form-control-success" placeholder="Judul Kegiatan" name="judulKegiatan" id="judulKegiatan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                          </div>
                        </div>						
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Tempat Kegiatan</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" placeholder="Tempat Kegiatan" name="tempatKegiatan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">No HP</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" placeholder="No HP/Telp" name="telp" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>	
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Program Studi</label>
                          <div class="col-sm-6">
                            <select class="form-control" name="prodi" required oninvalid="this.setCustomValidity('Data harus dipilih')" oninput="setCustomValidity('')">
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
                          <label class="col-sm-2 form-control-label"></label>
                          <div class="col-sm-6">
                            <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
							<a href="admin_daftar.php" type="button" class="btn btn-danger">Kembali</a>
                          </div>
                        </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
		</section>
	</form>

<?php
include "../../file/template/bawah.php";
?>
<script>

	function showData6() {
		var mhs_nim = $("#mhs_nim").val();
		if (mhs_nim==" "){
			alert("NIK/NIM Sudah Diinputkan");
			$("#mhs_nim").val('');
			$("#mhs_nama").val('');
			$("#mhs_nim").focus();
		}else{
			$.post("proses-ajax.php", { nim: ""+mhs_nim+""}, 
			function(data){ 
				var newValue=data.split("-");
				if(newValue[0]==0){
					alert("Data tidak ditemukan");
					$("#mhs_nim").val('');
					$("#mhs_nama").val('');
					$("#mhs_nim").focus();
				}else{
				$("#mhs_nama").val(newValue[0]);
				$("#mhs_nim2").focus();
				}
			});	
		}
	}
	function showData() {
			var mhs_nim = $("#mhs_nim").val();
			var mhs_nim2 = $("#mhs_nim2").val();
			if (mhs_nim==mhs_nim2){
				alert("NIK/NIM Sudah Diinputkan");
				$("#mhs_nim2").val('');
				$("#mhs_nama2").val('');
				$("#mhs_nim2").focus();
			}else{
				$.post("proses-ajax.php", { nim: ""+mhs_nim2+""}, 
				function(data){ 
					var newValue=data.split("-");
					if(newValue[0]==0){
						alert("Data tidak ditemukan");
						$("#mhs_nim2").val('');
						$("#mhs_nama2").val('');
						$("#mhs_nim2").focus();
					}else{
					$("#mhs_nama2").val(newValue[0]);
					$("#mhs_nim3").focus();
					}
				});	
			}
	}
	
	function showData2() {
			var mhs_nim = $("#mhs_nim").val();
			var mhs_nim2 = $("#mhs_nim2").val();
			var mhs_nim3 = $("#mhs_nim3").val();
			if (mhs_nim3==mhs_nim || mhs_nim3==mhs_nim2){
				alert("NIK/NIM Sudah Diinputkan");
				$("#mhs_nim3").val('');
				$("#mhs_nama3").val('');
				$("#mhs_nim3").focus();
			}else{
				$.post("proses-ajax.php", { nim: ""+mhs_nim3+""}, 
				function(data){ 
					var newValue=data.split("-");
					if(newValue[0]==0){
						alert("Data tidak ditemukan");
						$("#mhs_nim3").val('');
						$("#mhs_nama3").val('');
						$("#mhs_nim3").focus();
					}else{
						$("#mhs_nama3").val(newValue[0]);
						$("#mhs_nim4").focus();
					}
				});	
			}
	}
	
	function showData3() {
			var mhs_nim = $("#mhs_nim").val();
			var mhs_nim2 = $("#mhs_nim2").val();
			var mhs_nim3 = $("#mhs_nim3").val();
			var mhs_nim4 = $("#mhs_nim4").val();
			if (mhs_nim4==mhs_nim3 || mhs_nim4==mhs_nim2 || mhs_nim4==mhs_nim){
				alert("NIK/NIM Sudah Diinputkan");
				$("#mhs_nim4").val('');
				$("#mhs_nama4").val('');
				$("#mhs_nim4").focus();
			}else{
				$.post("proses-ajax.php", { nim: ""+mhs_nim4+""}, 
				function(data){ 
					var newValue=data.split("-");
					if(newValue[0]==0){
						alert("Data tidak ditemukan");
						$("#mhs_nim4").val('');
						$("#mhs_nama4").val('');
						$("#mhs_nim4").focus();
					}else{
						$("#mhs_nama4").val(newValue[0]);
						$("#mhs_nim5").focus();
					}
				});	
			}
	}
	
	function showData4() {
			var mhs_nim = $("#mhs_nim").val();
			var mhs_nim2 = $("#mhs_nim2").val();
			var mhs_nim3 = $("#mhs_nim3").val();
			var mhs_nim4 = $("#mhs_nim4").val();
			var mhs_nim5 = $("#mhs_nim5").val();
			if (mhs_nim5==mhs_nim4 || mhs_nim5==mhs_nim3 || mhs_nim5==mhs_nim2 || mhs_nim5==mhs_nim){
				alert("NIK/NIM Sudah Diinputkan");
				$("#mhs_nim5").val('');
				$("#mhs_nama5").val('');
				$("#mhs_nim5").focus();
			}else{
				$.post("proses-ajax.php", { nim: ""+mhs_nim5+""}, 
				function(data){ 
					var newValue=data.split("-");
					if(newValue[0]==0){
						alert("Data tidak ditemukan");
						$("#mhs_nim5").val('');
						$("#mhs_nama5").val('');
						$("#mhs_nim5").focus();
					}else{
						$("#mhs_nama5").val(newValue[0]);
						$("#judulKegiatan").focus();
					}
				});	
			}
	}	
	function showData5() {
			var mhs_nim = $("#mhs_nim").val();
			var mhs_nim2 = $("#mhs_nim2").val();
			var mhs_nim3 = $("#mhs_nim3").val();
			var mhs_nim4 = $("#mhs_nim4").val();
			var mhs_nim5 = $("#mhs_nim5").val();
			var dospem = $("#dospem").val();
			if (dospem==mhs_nim5 || dospem==mhs_nim4 || dospem==mhs_nim3 || dospem==mhs_nim2 || dospem==mhs_nim){
				alert("NIK/NIM Sudah Diinputkan");
				$("#dospem").val('');
				$("#dospem_nama").val('');
				$("#dospem").focus();
			}else{
				$.post("proses-ajax.php", { nim: ""+dospem+""}, 
				function(data){ 
					var newValue=data.split("-");
					if(newValue[0]==0){
						alert("Data tidak ditemukan");
						$("#dospem").val('');
						$("#dospem_nama").val('');
						$("#dospem").focus();
					}else{
						$("#dospem_nama").val(newValue[0]);
						$("#judulKegiatan").focus();
					}
				});	
			}
	}
	

</script>
