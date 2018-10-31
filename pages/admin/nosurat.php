<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
include "../../file/template/atas.php";
include "admin_menu.php";
$id=$_GET['id'];
$jenisk=$_GET['jn'];
$qS = mysql_query("SELECT * FROM surat WHERE idpen='$id' AND jenis_surat='0'");
$jS = mysql_num_rows($qS);
$rS = mysql_fetch_object($qS);
// tambah data surat
if(isset($_POST['Simpan'])){
	$no = $_POST['no_surat'];
	$tanggal = $_POST['tgl_surat'];
	$nik = $_POST['pejabat_nik'];
	$nama = $_POST['pejabat_nama'];
	mysql_query("INSERT INTO surat VALUES ('','$id','$no','0','$tanggal','$nik','$nama')");
	if($jenisk == '2' || $jenisk == '3'){
		header("Location:sp1.php?id=$id");
	}
	elseif($jenisk == '0' || $jenisk == '1'){
		header("Location:sp.php?id=$id");
	}	
}
	
	
if($jS > 0){
	if($jenisk == '2' || $jenisk == '3'){
		header("Location:sp1.php?id=$id");
	}
	elseif($jenisk == '0' || $jenisk == '1'){
		header("Location:sp.php?id=$id");
	}	
}
else{
	$val = "Cetak";
	$cetak = "Simpan";
	$isi = "";
	$tgl = "";
	// pejabat aktif
	$qJ = mysql_query("SELECT * FROM pejabat WHERE status='1'");
	$rJ = mysql_fetch_object($qJ);
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">Input No Surat Pengantar</h4>
                </div>
            </div>
			  <form class="form-horizontal" role="form" method="POST" role="form" action="">
				<div class="form-group row">
				  <label class="col-sm-2 form-control-label">No Surat</label>
				  <div class="col-sm-3">
					<input type="text" class="form-control form-control-success" name="no_surat" placeholder="Nomor Surat" oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" autofocus required value="<?=$isi;?>">
				  </div>				  
				</div>				
				<div class="form-group row">
				  <label class="col-sm-2 form-control-label">Tanggal Surat</label>
				  <div class="col-sm-3">
					<input type="text" id="tgl" class="form-control form-control-success" name="tgl_surat" placeholder="Tanggal" required value="<?=$tgl;?>">
					<input type="hidden" class="form-control form-control-success" name="pejabat_nik"  value="<?=$rJ->nik;?>">
					<input type="hidden" class="form-control form-control-success" name="pejabat_nama" value="<?=$rJ->nama;?>">
				  </div>
				</div>				
			
				<div class="form-group row">       
				  <label class="col-sm-2 form-control-label"></label>
				  <div class="col-sm-6">
					<input type="submit" name="<?=$cetak;?>" value="<?=$val;?>" class="btn btn-primary">
					<a href="daftar_dtl.php?id=<?=$id;?>" type="button" class="btn btn-danger">Kembali</a>
				  </div>				  
				</div>
			  </div>	
			  </form>
			  <?php
}
?>

<?php
include "../../file/template/bawah.php";
?>

