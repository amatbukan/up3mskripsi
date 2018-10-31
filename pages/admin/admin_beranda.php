<?php
require_once "../../file/koneksi/conn.php";
cek_sesi();
cek_level_admin();
include "../../file/template/atas.php";
require_once "admin_menu.php";
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Beranda</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
								<?php
								$dtampil = mysql_query("SELECT * FROM dosen");
								$dtotal = mysql_num_rows($dtampil);
								?>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo "$dtotal"; ?></div>
									<div>Dosen</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin_dosen.php">
                            <div class="panel-footer">
                                <span class="pull-left">Selengkapnya</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>            
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
								<?php
								$mtampil = mysql_query("SELECT * FROM mhs");
								$mtotal = mysql_num_rows($mtampil);
								?>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo "$mtotal"; ?></div>
									<div>Mahasiswa</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin_mhs.php">
                            <div class="panel-footer">
                                <span class="pull-left">Selengkapnya</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>                
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-hdd-o fa-5x"></i>
                                </div>
								<?php
								$mp = mysql_query("SELECT * FROM penelitian_pengabdian WHERE jenis='1' OR jenis='3' OR jenis='5'");
								$mpn = mysql_num_rows($mp);
								?>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo "$mpn"; ?></div>
									<div>Penelitian</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin_daftar.php">
                            <div class="panel-footer">
                                <span class="pull-left">Selengkapnya</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>				
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
								<?php
								$mpe = mysql_query("SELECT * FROM penelitian_pengabdian WHERE jenis='0' OR jenis='2' OR jenis='4'");
								$mpb = mysql_num_rows($mpe);
								?>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo "$mpb"; ?></div>
									<div>Pengabdian</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin_daftar.php">
                            <div class="panel-footer">
                                <span class="pull-left">Selengkapnya</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
<?php
include "../../file/template/bawah.php";
?>