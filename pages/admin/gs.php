<?php
include "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
include "../../file/template/atas.php";
include "admin_menu.php";


if(isset($_POST['ganti_sandi'])) 
{
	$sb=md5($_POST['sandi_baru']);
	$sb1=md5($_POST['sandi_baru1']);
	$sl=md5($_POST['sandi_lama']);
				
		if($sb <> $sb1)
		{
			$_SESSION['pesan_salah'] = "Sandi Baru Tidak Sama!";
			echo "<meta http-equiv='refresh' content='4;url=gs.php'>";
		}
		else
		{
			$qS=mysql_query("SELECT * FROM pengguna WHERE pengguna_sandi='$sl' AND pengguna_user='$_SESSION[sesi_user]'");
			$jS=mysql_num_rows($qS);
			if($jS <= 0) 
			{
			$_SESSION['pesan_salah'] = "Sandi Lama Anda Salah!";
			echo "<meta http-equiv='refresh' content='4;url=gs.php'>";
			}
				else
				{
					mysql_query("UPDATE pengguna SET pengguna_sandi='$sb' WHERE pengguna_user='$_SESSION[sesi_user]'");
					$_SESSION['pesan'] = "Sandi Anda Berhasil Diubah! Anda Akan Keluar dari sistem dan masuk dengan sandi baru Anda";
					echo "<meta http-equiv='refresh' content='4;url=logout.php'>";
				}
		}
}
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Ganti Sandi<small><small> <?php echo $_SESSION['sesi_nama']; ?> - <?php echo $_SESSION['sesi_nik']; ?></small></small></h2>
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
		<div class="jumbotron">
			<form class="form-horizontal" method="post">
			<div class="form-group">
				<label class="col-sm-2 control-label">Sandi Lama</label>
				<div class="col-sm-3">
					<input type="password" class="form-control" name="sandi_lama" placeholder="Sandi Lama" required autofocus oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-2 control-label">Sandi Baru</label>
				<div class="col-sm-3">
					<input type="password" class="form-control" name="sandi_baru" placeholder="Sandi Baru" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-2 control-label">Ulangi Sandi Baru</label>
				<div class="col-sm-3">
					<input type="password" class="form-control" name="sandi_baru1" placeholder="Ulangi Sandi Baru" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<div class="col-sm-3">
					<input type="submit" name="ganti_sandi" class="btn btn-primary" value="Ganti Sandi">
					<a href="admin_beranda.php" type="button" class="btn btn-danger">Kembali</a>
				</div>
			</div>
			</form>
	</div>
</div>
<?php
include "../../file/template/bawah.php";
?>
