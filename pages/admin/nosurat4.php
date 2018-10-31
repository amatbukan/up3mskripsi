<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
include "../../file/template/atas.php";
include "admin_menu.php";
$id=$_GET['id'];
$jenisk=$_GET['jn'];

if(isset($_POST['Simpan'])){
	$tanggal = $_POST['tgl_surat'];
	$nik = $_SESSION['sesi_nik'];
	$nama = $_SESSION['sesi_nama'];
	mysql_query("INSERT INTO surat VALUES ('','$id','','3','$tanggal','$nik','$nama')");
	if($jenisk == '2' || $jenisk == '3'){
		header("Location:tbl1.php?id=$id");
	}
	elseif($jenisk == '0' || $jenisk == '1'){
		header("Location:tbl.php?id=$id");
	}		
	elseif($jenisk == '4' || $jenisk == '5'){
		header("Location:tbl1.php?id=$id");
	}	
}

$qS = mysql_query("SELECT * FROM surat WHERE idpen='$id' AND jenis_surat='3'");
$jS = mysql_num_rows($qS);
$rS = mysql_fetch_object($qS);
if($jS > 0){
	if($jenisk == '2' || $jenisk == '3'){
		header("Location:tbl1.php?id=$id");
	}
	elseif($jenisk == '0' || $jenisk == '1'){
		header("Location:tbl.php?id=$id");
	}		
	elseif($jenisk == '4' || $jenisk == '5'){
		header("Location:tbl1.php?id=$id");
	}	
}
else{
	$val = "Cetak";
	$cetak = "Simpan";
	$tgl = "";

?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">Input Tanggal Bukti Laporan</h4>
                </div>
            </div>
			  <form class="form-horizontal" role="form" method="POST" role="form" action="">			
				<div class="form-group row">
				  <label class="col-sm-2 form-control-label">Tanggal Surat</label>
				  <div class="col-sm-3">
					<input type="text" id="tgl" class="form-control form-control-success" name="tgl_surat" placeholder="Tanggal" required value="<?=$tgl;?>">
				  </div>
				</div>
				<div class="form-group row">      
				<label class="col-sm-2 form-control-label"></label>
				  <div class="col-sm-3">
					<input type="submit" name="<?=$cetak;?>" value="<?=$val;?>" class="btn btn-primary">
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

