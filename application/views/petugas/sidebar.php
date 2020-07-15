<aside class="menu-sidebar2 js-right-sidebar">
    <div class="logo bg-info">
        <a href="#">
        				<h4 class="text-white" ><i class="fas fa-file-signature ml-1 mr-2" ></i>PeopleReport</h4>
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar2">
        <div class="account2">
            <div class="image img-cir img-120">
                <img src="<?= base_url('assets/img/').$user['picture']; ?>" alt="<?= $user['nama_petugas']; ?>" />
            </div>
            <h4 class="name"><?= $user['nama_petugas']; ?></h4>
            <a href="<?= base_url('index.php/auth/logout'); ?>">Sign out</a>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
            	<li class="active" >
            	<a href="<?= base_url('index.php/petugas'); ?>">
            	<i class="fas fa-tachometer-alt"></i>Dashboard</a>        
            	</li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-newspaper"></i>Pengaduan
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= base_url('index.php/data_pengaduan'); ?>">
                                <i class="fas fa-file-import"></i>Pengaduan Masuk</a>
                        </li>
                        <li>
                            <a href="<?= base_url('index.php/data_pengaduan/index/0/belum'); ?>">
                                <i class="fas fa-question-circle"></i>Belum Terverifikasi</a>
                        </li>
                        <li>
                        <a href="<?= base_url('index.php/data_pengaduan/index/0/selesai'); ?>">
                        <i class="fas fa-check-circle"></i>Telah Terverifikasi</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                   <a href="<?= base_url('index.php/data_tanggapan/'); ?>">
                    <i class="fas fa-file-signature"></i>Tanggapan Pengaduan</a>
                </li>      
				
				<li>
				<a href="<?= base_url('index.php/data_petugas/index/').$user['id_petugas']; ?>">
				<i class="fas fa-user-edit"></i>Edit Profil</a>
				</li>      
            </ul>
        </nav>
    </div>
</aside>
<!-- END HEADER DESKTOP-->