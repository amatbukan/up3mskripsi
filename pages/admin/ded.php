<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
include "../../file/template/atas.php";
include "admin_menu.php";
$id = $_GET['id'];
$qM = mysql_query("SELECT * FROM penelitian_pengabdian WHERE id='$id'");
$qq = mysql_fetch_object($qM);

// Ke satu
			$qM = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$qq->identitas1'");
			$jMM = mysql_num_rows($qM); 
			$rMhs = mysql_fetch_object($qM); 
			
			$qDosen = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$qq->identitas1'");
			$jDosen = mysql_num_rows($qDosen); 
			$rDosen = mysql_fetch_object($qDosen);
			if($jMM > 0){
				$nama1= $rMhs->mhs_nama;
			}elseif($jDosen > 0){
				$nama1= $rDosen->dosen_nama;
			}else{
				$nama1="";
			}
			
			$qM2 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$qq->identitas2'");
			$jMM2 = mysql_num_rows($qM2); 
			$rMhs2 = mysql_fetch_object($qM2); 
			
			$qDosen2 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$qq->identitas2'");
			$jDosen2 = mysql_num_rows($qDosen2); 
			$rDosen2 = mysql_fetch_object($qDosen2);
			if($jMM2 > 0){
				$nama2= $rMhs2->mhs_nama;
			}elseif($jDosen2 > 0){
				$nama2= $rDosen2->dosen_nama;
			}else{
				$nama2="";
			}		

			$qM3 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$qq->identitas3'");
			$jMM3 = mysql_num_rows($qM3); 
			$rMhs3 = mysql_fetch_object($qM3); 
			
			$qDosen3 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$qq->identitas3'");
			$jDosen3 = mysql_num_rows($qDosen3); 
			$rDosen3 = mysql_fetch_object($qDosen3);
			if($jMM3 > 0){
				$nama3= $rMhs3->mhs_nama;
			}elseif($jDosen3 > 0){
			$nama3= $rDosen3->dosen_nama;
			}else{
				$nama3="";
			}	

			$qM4 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$qq->identitas4'");
			$jMM4 = mysql_num_rows($qM4); 
			$rMhs4 = mysql_fetch_array($qM4); 
			
			$qDosen4 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$qq->identitas4'");
			$jDosen4 = mysql_num_rows($qDosen4); 
			$rDosen4 = mysql_fetch_array($qDosen4);
			if($jMM4 > 0){
				$nama4= $rMhs4['mhs_nama'];
			}elseif($jDosen4 > 0){
				$nama4= $rDosen4['dosen_nama'];
			}
			else{
				$nama4="";
			}
			
			$qM5 = mysql_query("SELECT * FROM mhs WHERE mhs_nim='$qq->identitas5'");
			$jMM5 = mysql_num_rows($qM5); 
			$rMhs5 = mysql_fetch_array($qM5); 
			
			$qDosen5 = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$qq->identitas5'");
			$jDosen5 = mysql_num_rows($qDosen5); 
			$rDosen5 = mysql_fetch_array($qDosen5);
			if($jMM5 > 0){
				$nama5= $rMhs5['mhs_nama'];
			}elseif($jDosen5 > 0){
				$nama5= $rDosen5['dosen_nama'];
				}
			else{
				$nama5="";
			}

			$qK = mysql_query("SELECT * FROM dosen WHERE dosen_nik='$qq->nik_dospem'");
			$jK = mysql_num_rows($qK);
			$jKK = mysql_fetch_object($qK); 	
			if($jK > 0){
				$namadosen= $jKK->dosen_nama;
			}
			else{
				$namadosen="";
			}			
?>
<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Edit Data<small><small> Penelitian/Pengabdian Kepada Masyarakat</small></small></h2>
			</div>
		</div>
	<form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="editkegiatan.php">
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
                            <input type="text" onchange="showData6()" class="form-control form-control-success" id="mhs_nim" name="mhs_nim" value="<?=$qq->identitas1;?>" autofocus oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Anggota</label>
                          <div class="col-sm-3">
                            <input type="text" id="mhs_nama" class="form-control form-control-success" readonly="readonly" value="<?=$nama1;?>">
                            <input type="hidden" class="form-control form-control-success" name="id" readonly="readonly" value="<?=$qq->id;?>">
                          </div>
                        </div>						
						<!-- Anggota 1 -->	
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIM/NIK</label>
                          <div class="col-sm-2">
                            <input type="text" required class="form-control form-control-success" id="mhs_nim2" name="mhs_nim2" onchange="showData()" autofocus oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?=$qq->identitas2;?>">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Anggota</label>
                          <div class="col-sm-3">
                            <input type="text" required id="mhs_nama2" class="form-control form-control-success" readonly="readonly" oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?=$nama2;?>">
                          </div>
                        </div>						
						<!-- Anggota 2 -->		
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIM/NIK</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim3" name="mhs_nim3" onchange="showData2()"  autofocus oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" required value="<?=$qq->identitas3;?>">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Anggota</label>
                          <div class="col-sm-3">
                            <input type="text" id="mhs_nama3" class="form-control form-control-success" readonly="readonly" oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" required value="<?=$nama3;?>">
                          </div>
                        </div>						
						<!-- Anggota 3 -->		
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIM/NIK</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim4" name="mhs_nim4" onchange="showData3()" autofocus value="<?=$qq->identitas4;?>">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Anggota</label>
                          <div class="col-sm-3">
                            <input type="text" id="mhs_nama4" class="form-control form-control-success" readonly="readonly" value="<?=$nama4;?>">
                          </div>
                        </div>						
						<!-- Anggota 4 -->		
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIM/NIK</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim5" name="mhs_nim5" onchange="showData4()" autofocus value="<?=$qq->identitas5;?>">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Anggota</label>
                          <div class="col-sm-3">
                            <input type="text" id="mhs_nama5" class="form-control form-control-success" readonly="readonly" value="<?=$nama5;?>">
                          </div>
                        </div>
						<?php
						if ($qq->jenis =='0' || $qq->jenis =='1'){		
						?>
						<!-- Pendamping -->
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIK</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="dospem" name="nik_dospem" onchange="showData5()" autofocus value="<?=$qq->nik_dospem;?>">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Dosen</label>
                          <div class="col-sm-3">
                            <input type="text" id="dospem_nama" class="form-control form-control-success" readonly="readonly" value="<?=$namadosen;?>">
                          </div>
                        </div>
						<?php
						}
						?>
						<!--<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Jenis Kegiatan</label>
                          <div class="col-sm-6">
                            <select class="form-control" name="jenisPenelitian" required oninvalid="this.setCustomValidity('Data harus dipilih')" oninput="setCustomValidity('')">
								<option value="">--- Pilih Kegiatan ---</option>
								<option value="0">Pengabdian Kepada Masyarakat</option>
								<option value="1">Penelitian</option>
							</select>
                          </div>
                        </div>-->
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Judul Kegiatan</label>
                          <div class="col-sm-6">
                            <textarea type="text" class="form-control form-control-success" placeholder="Judul Kegiatan" name="judulKegiatan" id="judulKegiatan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"><?=$qq->judul;?></textarea>
                          </div>
                        </div>						
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Tempat Kegiatan</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" placeholder="Tempat Kegiatan" name="tempatKegiatan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?=$qq->tempat;?>">
                          </div>
                        </div>
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">No HP</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" placeholder="No HP/Telp" name="telp" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?=$qq->telp;?>">
                          </div>
                        </div>	
						<?php
						if($qq->biaya !='0'){
						?>
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Biaya</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" placeholder="Biaya Sesuai Proposal (Isi Tanpa Titik/Koma)" name="biaya" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?=$qq->biaya;?>">
                          </div>
                        </div>							
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Tanggal Mulai Kegiatan</label>
                          <div class="col-sm-6">
                            <input type="text" id="tgl" class="form-control form-control-success" placeholder="Tanggal Mulai" name="tgl_mulai_kegiatan" required value="<?php echo $qq->tgl_mulai_kegiatan; ?>">
                          </div>
                        </div>							
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Tanggal Berakhir Kegiatan</label>
                          <div class="col-sm-6">
                            <input type="text" id="tgl2" class="form-control form-control-success" placeholder="Tanggal Akhir" name="tgl_akhir_kegiatan" required value="<?php echo $qq->tgl_akhir_kegiatan; ?>">
                          </div>
                        </div>		
						<?php
						}
						?>
						<div class="form-group row">       
                          <label class="col-sm-2 form-control-label"></label>
                          <div class="col-sm-6">
                            <input type="submit" value="Perbarui" name="submit" class="btn btn-primary">
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
			var mhs_nim2 = $("#mhs_nim").val();
			var mhs_nim3 = $("#mhs_nim").val();
			var mhs_nim4 = $("#mhs_nim").val();
			var mhs_nim5 = $("#mhs_nim").val();
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
