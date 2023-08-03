        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pinjam <sup>Yuk</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

			<!-- Nav Item - Peminjaman -->
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="fas fa-fw fa-gift"></i>
					<span>Peminjaman</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Nav Item - User Management -->
			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User Manajemen</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Komponen User:</h6>
                        <a class="collapse-item" href="<?= base_url('user/biodata'); ?>">Biodata</a>
                        <a class="collapse-item" href="<?= base_url('user/akun'); ?>">Akun</a>
                    </div>
                </div>
            </li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Nav Item - Verifikasi Peminjaman -->
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="fas fa-fw fa-check"></i>
					<span>Verifikasi Peminjaman</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Nav Item - Verifikasi Peminjaman -->
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="fas fa-fw fa-history"></i>
					<span>Riwayat Peminjaman</span></a>
			</li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Master Data Lab -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masterDataLab"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Master Data Lab</span>
                </a>
                <div id="masterDataLab" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Komponen Master Data:</h6>
                        <a class="collapse-item" href="<?= base_url('master/prodi'); ?>">Prodi</a>
                        <a class="collapse-item" href="<?= base_url('master/laboratorium'); ?>">Laboratorium</a>
                    </div>
                </div>
            </li>

			<!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

