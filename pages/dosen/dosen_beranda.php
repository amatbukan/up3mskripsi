<?php
include "../../file/koneksi/conn.php";
include "../../file/template/atas.php";
cek_sesi();
cek_level_dosen();
include "dosen_menu.php";
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Beranda<small><small> Halaman Dosen</small></small></h1>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4> Hai... <?php echo $_SESSION['sesi_nama']; ?> Selamat Datang</h4>
			</div>
			<div class="panel-body">
				<p align="justify">Jaga kerahasiaan akun Anda dengan sebaik-baiknya. Semua aktivitas yang terjadi atas nama akun ini menjadi tanggung jawab Anda. Jangan memberitahukan sandi Anda kepada siapapun. Segera melapor ke UP3M jika mengalami/menemui hal-hal yang mencurigakan pada aktivitas akun Anda.</p>
			</div>
		</div>
	</div>                
	
	<div class="col-lg-12">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h4> Perhatian</h4>
			</div>
			<div class="panel-body">
				<h5>Kepada seluruh Dosen, WAJIB untuk :</h5>
					<ol align="justify">
						<li>Memeriksa dan memperbaiki data diri.</li>
						<li>Menginputkan nomor telepon/ponsel yang aktif dan dapat dihubungi.</li>
						<li>Segera mengganti sandi akun Anda. Buat sandi dengan kombinasi huruf kapital dan kecil serta angka.</li>
						<li>Segera melapor ke Bagian UP3M untuk memperbaiki data yang tidak dapat diubah sendiri.</li>
						<li>Pendaftaran Penelitain/Pengabdian Kepada Masyarakat Minimal 3 Orang dan Maksimal 5 orang setiap kelompok.</li>
					</ol>
			</div>
		</div>
	</div>
</div>
	
<?php
include "../../file/template/bawah.php";
?>