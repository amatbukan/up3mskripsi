            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="dosen_beranda.php"><i class="fa fa-home fa-fw"></i> Beranda</a></li>    
						<li><a href="dosen_data.php?nik=<?=$_SESSION['sesi_user'];?>"><i class="fa fa-user fa-fw"></i> Data Diri</a></li>
						<li>
                            <a class="accordion-heading" data-toggle="collapse" data-target="#submenu"><i class="fa fa-pencil fa-fw accordion-heading"></i> Pendaftaran<span class="fa arrow"></span></a>
                            <ul class="nav nav-list collapse" id="submenu">
                                <li>
                                    <a href="dosen_daftar.php">Program Dosen & Mahasiswa</a>
                                </li>
                                <li>
                                    <a href="dosen_dtr.php">Program Dosen</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li><a href="dosen_hs.php"><i class="fa fa-book fa-fw"></i> Laporan Penelitian/Pengabdian</a></li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
		</nav>

      