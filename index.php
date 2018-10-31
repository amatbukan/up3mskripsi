<?php
include "file/koneksi/conn.php";
if(isset($_POST['pL'])) {
	$pU=$_POST['pU'];
	$pS=$_POST['pS'];
	proses_login($pU, $pS);
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Muhammad M.">
    <title>Penelitian & Pengabdian</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">

	<link rel="shortcut icon" href="assets/stmik.jpg">
</head>
<body class="hold-transition" style="background: #2288bb;">
    <style type="text/css">
.well { background: #ffffff; }
.dialog {
	width: 250px;
	margin: 7% auto 0;
	padding: 20px;
	text-align: center;
}
</style>
<div class="container">
    <div class="row" style="width:300px;margin:100px auto;">    
		<div class="">
            <div class="well dialog">
				<img src="assets/stmik.jpg" width="80px">
                <h4 class="text-primary"><strong>STMIK Palangkaraya</strong></h4>
                <small class="text-danger"><strong>Penelitian dan PKM</strong></small>
				<hr>
                <?php
                if (isset($_SESSION['pesan_salah']) && $_SESSION['pesan_salah'] <> '') {
                    echo pesan_salah($_SESSION['pesan_salah']);
                }
                unset($_SESSION['pesan_salah']);
			
                ?>
                <div>
                    <form class="form-horizontal" role="form" method="POST">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
									<span class="input-group-addon"><span class="fa fa-user"></span></span>
									<input type="text" name="pU" class="form-control" placeholder="ID Pengguna" required autofocus oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
								</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
									<span class="input-group-addon"><span class="fa fa-lock"></span></span>
									<input type="password" name="pS" class="form-control" placeholder="*******" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">						
								</div>                              
                            </div>
                        </div>
                       <div class="form-group">
                            <div class="col-sm-12">
								<button type="submit" name="pL" class="btn btn-primary btn-block">
									<i class="fa fa-btn fa-sign-in"></i> Masuk <i class="fa fa-spin fa-spinner ic-indicator" style="display: none;"></i>

								</button>
                            </div>
                        </div>
                    </form>
                </div>
				&copy; IT STMIK Palangkaraya
            </div>
        </div>
    </div>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		window.setTimeout(function() { $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 1500);

	</script>
  </body>
</html>