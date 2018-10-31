<?php
require_once "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
include "../../file/template/atas.php";
require_once "admin_menu.php";

$qPejabat = mysql_query("SELECT * FROM pejabat WHERE status='1'");
$rPejabat = mysql_fetch_object($qPejabat);

if(isset($_POST['Ganti'])){
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	mysql_query("UPDATE pejabat SET status='0'");
	mysql_query("INSERT INTO pejabat VALUES ('$nik','$nama','1')");
		$_SESSION['pesan'] = "Kepala UP3M Berhasil Diubah...";
		echo "<meta http-equiv='refresh' content='4;url=admin_pengaturan.php'>";
}

?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pengaturan</h1><hr>
                </div>
            </div>
                <?php
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo pesan_benar($_SESSION['pesan']);
                }
                unset($_SESSION['pesan']);
                ?>
			<section class="forms">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" role="form" action="">					
						<div class="form-group row">
                          <label class="col-sm-2 form-control-label">Kepala UP3M</label>
                          <div class="col-sm-5">
                            <select class="form-control" name="nik" id="dosen_nik" required oninvalid="this.setCustomValidity('Data harus dipilih')" oninput="setCustomValidity('')">
							<option value="">--- Pilih Kepala UP3M ---</option>
							<?php
								$qO=mysql_query("SELECT * FROM dosen ORDER BY dosen_nama ASC") or die(mysql_error());
								while($rO=mysql_fetch_object($qO)) {
								$sel=($rPejabat->nik==$rO->dosen_nik)?'selected':'';
							?>
								<option value="<?=$rO->dosen_nik;?>" <?=$sel;?>><?=$rO->dosen_nama;?></option>
							<?php
							}
							?>
							</select>
                          </div>
                        </div>
						<input type="hidden" name="nama" id="dosen_nama" class="form-control form-control-success">	
                        <div class="form-group row">       
                          <label class="col-sm-2 form-control-label"></label>
                          <div class="col-sm-3">
                            <input type="submit" name="Ganti" value="Ganti" class="btn btn-primary">
							<a href="admin_beranda.php" type="button" class="btn btn-danger">Kembali</a>
                          </div>
                        </div><hr>
                      </form>
                    </div>
                  </div>
                </div>
                </div>
                </div>
		</section>
<?php
include "../../file/template/bawah.php";
?>

<script>
	$(function() {
		$("#dosen_nik").change(function(){
			var dosen_nik = $("#dosen_nik").val();
			$.ajax({
				url: 'kepalajax.php',
				type: 'POST',
				dataType: 'json',
				data: {
					'dosen_nik': dosen_nik,
				},
				success: function (mhs) {
					$("#dosen_nama").val(mhs['dosen_nama']);

				}
			});
		});
	});
</script>