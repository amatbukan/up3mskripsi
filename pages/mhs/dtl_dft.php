<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_mhs();
include "../../file/template/atas.php";
include "mhs_menu.php";

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
				<h2 class="page-header">Detail <small><small>Penelitian/Pengabdian Kepada Masyarakat</small></small></h2>
			</div>
		</div>
	<form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST">
          <section class="forms">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
					  <!-- Ketua -->
                        <div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIK/NIM</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim" readonly="readonly" name="mhs_nim" value="<?=$qq->identitas1;?>">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Anggota</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control form-control-success" readonly="readonly" value="<?=$nama1;?>">
                          </div>
                        </div>	                        
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIK/NIM</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim" readonly="readonly" name="mhs_nim" value="<?=$qq->identitas2;?>">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Anggota</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control form-control-success" readonly="readonly" value="<?=$nama2;?>">
                          </div>
                        </div>							
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIK/NIM</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim" readonly="readonly" name="mhs_nim" value="<?=$qq->identitas3;?>">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Anggota</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control form-control-success" readonly="readonly" value="<?=$nama3;?>">
                          </div>
                        </div>
						<?php
						if($qq->identitas4 !=""){
						?>						
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIK/NIM</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim" readonly="readonly" name="mhs_nim" value="<?=$qq->identitas4;?>">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Anggota</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control form-control-success" readonly="readonly" value="<?=$nama4;?>">
                          </div>
                        </div>	
						<?php
						}
						?>
						<?php
						if($qq->identitas5 !=""){
						?>	
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIK/NIM</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim" readonly="readonly" name="mhs_nim" value="<?=$qq->identitas5;?>">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Anggota</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control form-control-success" readonly="readonly" value="<?=$nama5;?>">
                          </div>
                        </div>		
						<?php
						}
						?>						
						<?php
						if($qq->nik_dospem !=""){
						?>	
						<div class="form-group row">
                          <label class="col-sm-1 form-control-label">NIK</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control form-control-success" id="mhs_nim" readonly="readonly" name="mhs_nim" value="<?=$qq->nik_dospem;?>">
                          </div>                          
						  <label class="col-sm-2 form-control-label">Nama Dosen</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control form-control-success" readonly="readonly" value="<?=$namadosen;?>">
                          </div>
                        </div>		
						<?php
						}
						?>
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Judul Kegiatan</label>
                          <div class="col-sm-6">
                            <textarea type="text" readonly="readonly" class="form-control form-control-success"><?=$qq->judul;?></textarea>
                          </div>
                        </div>						
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Tempat Kegiatan</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" readonly="readonly" value="<?=$qq->tempat;?>">
                          </div>
                        </div>
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">No HP</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-success" readonly="readonly" value="<?=$qq->telp;?>">
                          </div>
                        </div>
						<div class="form-group row">       
						<label class="col-sm-2 form-control-label"></label>
                          <div class="col-sm-6">
                            <a href="mhs_hs.php" class="btn btn-danger">Kembali</a>
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