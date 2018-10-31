<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_mhs();
include "../../file/template/atas.php";
include "mhs_menu.php";
?>
<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Pendaftaran <small><small>Penelitian/Pengabdian Kepada Masyarakat</small></small></h2>
			</div>
		</div>
	<form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="input_penelitian.php">
          <section class="forms">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
					  <!-- Ketua -->
                        <div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIM</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim" readonly="readonly" name="mhs_nim" value="<?=$_SESSION['sesi_user'];?>">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Mahasiswa</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control form-control-success" readonly="readonly" value="<?=$_SESSION['sesi_nama'];?>">
                            <input type="hidden" readonly="readonly" id="prodi" name="prodi" value="<?=$_SESSION['sesi_prodi'];?>">
                            <input type="hidden" readonly="readonly" id="prodi2" name="prodi2" >
                          </div>
                        </div>						
						<!-- Anggota 1 -->	
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIM</label>
                          <div class="col-sm-2">
                            <input type="text" required class="form-control form-control-success" id="mhs_nim2" name="mhs_nim2" onchange="showData()" autofocus oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Mahasiswa</label>
                          <div class="col-sm-3">
                            <input type="text" required id="mhs_nama2" class="form-control form-control-success" readonly="readonly" oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>						
						<!-- Anggota 2 -->		
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIM</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim3" name="mhs_nim3" onchange="showData2()"  autofocus oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" required>
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Mahasiswa</label>
                          <div class="col-sm-3">
                            <input type="text" id="mhs_nama3" class="form-control form-control-success" readonly="readonly" oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" required>
                          </div>
                        </div>						
						<!-- Anggota 3 -->		
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIM</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim4" name="mhs_nim4" onchange="showData3()" autofocus>
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Mahasiswa</label>
                          <div class="col-sm-3">
                            <input type="text" id="mhs_nama4" class="form-control form-control-success" readonly="readonly" >
                          </div>
                        </div>						
						<!-- Anggota 4 -->		
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIM</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim5" name="mhs_nim5" onchange="showData4()" autofocus>
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Mahasiswa</label>
                          <div class="col-sm-3">
                            <input type="text" id="mhs_nama5" class="form-control form-control-success" readonly="readonly" >
                          </div>
                        </div>
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Judul Kegiatan</label>
                          <div class="col-sm-6">
                            <textarea type="text" class="form-control form-control-success" placeholder="Judul Kegiatan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" name="judulKegiatan" id="judulKegiatan"></textarea>
                          </div>
                        </div>						
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Tempat Kegiatan</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" placeholder="Tempat Kegiatan" name="tempatKegiatan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Jenis Kegiatan</label>
                          <div class="col-sm-6">
                            <select class="form-control" name="jenisPenelitian" required oninvalid="this.setCustomValidity('Data harus dipilih')" oninput="setCustomValidity('')">
							<option value="">--- Pilih Kegiatan ---</option>
							<option value="1">Penelitian</option>
							<option value="0">Pengabdian Kepada Masyarakat</option>
							</select>
                          </div>
                        </div>
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">No HP</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" placeholder="No HP/Telp Pendaftar" name="telp" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>						
						<div class="form-group row">       
						<label class="col-sm-2 form-control-label"></label>
                          <div class="col-sm-6">	
                            <input type="submit" value="Daftar" name="submit" class="btn btn-primary">
							<a href="mhs_beranda.php" class="btn btn-danger">Kembali</a>
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
<script src="../../file/koneksi/jquery.js"></script>
<script>
	function showData() {
			var prodi = $("#prodi").val();
			var mhs_nim = $("#mhs_nim").val();
			var mhs_nim2 = $("#mhs_nim2").val();
			if (mhs_nim==mhs_nim2){
				alert("NIM Sudah Diinputkan");
				$("#mhs_nim2").val('');
				$("#mhs_nama2").val('');
				$("#mhs_nim2").focus();
			}else{
				$.post("proses-ajax.php", { prodi: ""+prodi+"", nim: ""+mhs_nim2+""}, 
				function(data){ 
					var newValue=data.split("-");
					if(newValue[0]==0){
						alert("Data tidak ditemukan / Prodi Berbeda");
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
			var prodi = $("#prodi").val();
			var mhs_nim = $("#mhs_nim").val();
			var mhs_nim2 = $("#mhs_nim2").val();
			var mhs_nim3 = $("#mhs_nim3").val();
			if (mhs_nim3==mhs_nim || mhs_nim3==mhs_nim2){
				alert("NIM Sudah Diinputkan");
				$("#mhs_nim3").val('');
				$("#mhs_nama3").val('');
				$("#mhs_nim3").focus();
			}else{
				$.post("proses-ajax.php", { prodi: ""+prodi+"", nim: ""+mhs_nim3+""}, 
				function(data){ 
					var newValue=data.split("-");
					if(newValue[0]==0){
						alert("Data tidak ditemukan / Prodi Berbeda");
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
			var prodi = $("#prodi").val();
			var mhs_nim = $("#mhs_nim").val();
			var mhs_nim2 = $("#mhs_nim2").val();
			var mhs_nim3 = $("#mhs_nim3").val();
			var mhs_nim4 = $("#mhs_nim4").val();
			if (mhs_nim4==mhs_nim3 || mhs_nim4==mhs_nim2 || mhs_nim4==mhs_nim){
				alert("NIM Sudah Diinputkan");
				$("#mhs_nim4").val('');
				$("#mhs_nama4").val('');
				$("#mhs_nim4").focus();
			}else{
				$.post("proses-ajax.php", { prodi: ""+prodi+"", nim: ""+mhs_nim4+""}, 
				function(data){ 
					var newValue=data.split("-");
					if(newValue[0]==0){
						alert("Data tidak ditemukan / Prodi Berbeda");
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
			var prodi = $("#prodi").val();
			var mhs_nim = $("#mhs_nim").val();
			var mhs_nim2 = $("#mhs_nim2").val();
			var mhs_nim3 = $("#mhs_nim3").val();
			var mhs_nim4 = $("#mhs_nim4").val();
			var mhs_nim5 = $("#mhs_nim5").val();
			if (mhs_nim5==mhs_nim4 || mhs_nim5==mhs_nim3 || mhs_nim5==mhs_nim2 || mhs_nim5==mhs_nim){
				alert("NIM Sudah Diinputkan");
				$("#mhs_nim5").val('');
				$("#mhs_nama5").val('');
				$("#mhs_nim5").focus();
			}else{
				$.post("proses-ajax.php", { prodi: ""+prodi+"", nim: ""+mhs_nim5+""}, 
				function(data){ 
					var newValue=data.split("-");
					if(newValue[0]==0){
						alert("Data tidak ditemukan / Prodi Berbeda");
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
</script>


<script>
/*
Punya mas amad
$(function() {	
	$("#mhs_nim2").change(function(){
		var mhs_nim = $("#mhs_nim").val();
		var mhs_nim2 = $("#mhs_nim2").val();
		if (mhs_nim==mhs_nim2){
			alert("NIM Sudah Diinputkan");
			$("#mhs_nim2").val('');
			$("#mhs_nama2").val('');
			$("#mhs_nim2").focus();
		}else{
			$.ajax({
			url: 'proses-ajax.php',
			type: 'POST',
			dataType: 'json',
			data: {
				'mhs_nim': mhs_nim2,
			},
			success: function (mhs) {
				$("#mhs_nama2").val(mhs['mhs_nama']);
			}
		});
		}
	});
});
$(function() {	
	$("#mhs_nim3").change(function(){
		var mhs_nim = $("#mhs_nim").val();
		var mhs_nim2 = $("#mhs_nim2").val();
		var mhs_nim3 = $("#mhs_nim3").val();
		if (mhs_nim2==mhs_nim3 || mhs_nim==mhs_nim3){
			alert("NIM Sudah Diinputkan");
			$("#mhs_nim3").val('');
			$("#mhs_nama3").val('');
			$("#mhs_nim3").focus();
		}else{
			$.ajax({
			url: 'proses-ajax.php',
			type: 'POST',
			dataType: 'json',
			data: {
				'mhs_nim': mhs_nim3,
			},
			success: function (mhs) {
				$("#mhs_nama3").val(mhs['mhs_nama']);
			},
			error: function(){
					alert("NIM Tidak Ada");
			}
		});
		}
	});
});
$(function() {	
	$("#mhs_nim4").change(function(){
		var mhs_nim = $("#mhs_nim").val();
		var mhs_nim2 = $("#mhs_nim2").val();
		var mhs_nim3 = $("#mhs_nim3").val();
		var mhs_nim4 = $("#mhs_nim4").val();
		if (mhs_nim==mhs_nim4 || mhs_nim2==mhs_nim4 || mhs_nim3==mhs_nim4){
			alert("NIM Sudah Diinputkan");
			$("#mhs_nim4").val('');
			$("#mhs_nama4").val('');
			$("#mhs_nim4").focus();
		}else{
			$.ajax({
			url: 'proses-ajax.php',
			type: 'POST',
			dataType: 'json',
			data: {
				'mhs_nim': mhs_nim4,
			},
			success: function (mhs) {
				$("#mhs_nama4").val(mhs['mhs_nama']);
			}
		});
		}
	});
});
$(function() {	
	$("#mhs_nim5").change(function(){
		var mhs_nim = $("#mhs_nim").val();
		var mhs_nim2 = $("#mhs_nim2").val();
		var mhs_nim3 = $("#mhs_nim3").val();
		var mhs_nim4 = $("#mhs_nim4").val();
		var mhs_nim5 = $("#mhs_nim5").val();
		if (mhs_nim==mhs_nim5 || mhs_nim2==mhs_nim5 || mhs_nim3==mhs_nim5 || mhs_nim4==mhs_nim5){
			alert("NIM Sudah Diinputkan");
			$("#mhs_nim5").val('');
			$("#mhs_nama5").val('');
			$("#mhs_nim5").focus();
		}else{
			$.ajax({
			url: 'proses-ajax.php',
			type: 'POST',
			dataType: 'json',
			data: {
				'mhs_nim': mhs_nim5,
			},
			success: function (mhs) {
				$("#mhs_nama5").val(mhs['mhs_nama']);
			}
		});
		}
	});
});
*/
</script>
