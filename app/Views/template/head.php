<header id="header">
  <div class="header-inner">
    <div class="container">
      <div id="logo">
        <a href="index.html">
          <img src="public/images/logo.png" class="logo-default" />
          <img src="public/images/logo.png" class="logo-dark" />
        </a>
      </div>

      <div id="search">
        <a id="btn-search-close" class="btn-search-close" aria-label="Close search form">
          <i class="icon-x"></i>
        </a>
        <form class="search-form" action="#" method="get">
          <input class="form-control" name="q" type="text" placeholder="Type & Search..." />
          <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
        </form>
      </div>

      <div class="header-extras">
        <ul>
          <li>
            <a id="btn-search" href="#">
              <i class="icon-search"></i>
            </a>
          </li>
          <li>
            <div class="p-dropdown">	<a href="#"><i class="icon-globe"></i><span><?php echo strtoupper($_SESSION['web_lang']) ?></span></a>
              <ul class="p-dropdown-content">
                <li><a href="<?php echo base_url() ?>/?lang=id">IDs</a>
                </li>
                <li><a href="<?php echo base_url() ?>/?lang=en">EN</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>

      <div id="mainMenu-trigger">
        <a class="lines-button x"><span class="lines"></span></a>
      </div>

      <div id="mainMenu">
        <div class="container">
          <nav>
            <ul>
              <li>
                <a href="<?php echo base_url() ?>">Home</a>
              </li>
              <li>
                <a href="<?php echo base_url('profile') ?>">Profile</a>
              </li>
              <!-- <li class="dropdown">
                <a href="">Regulasi</a>
                <ul class="dropdown-menu">
                  <li><a href="<?php //echo base_url('aturan_terbuka') ?>">Peraturan Keterbukaan Informasi Publik</a></li>
                  <li><a href="<?php //echo base_url('maklumat_pelayanan_publik') ?>">Maklumat Pelayanan Publik</a></li>
                  <li><a href="<?php //echo base_url('sop_publik') ?>">SOP Pelayanan Informasi Publik</a></li>
                </ul>
              </li> -->
              <li class="dropdown">
                <a href="">Laporan</a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url('laporan_bulanan') ?>">Laporan Bulanan Pelaksanaan Pelayanan</a></li>
                  <li><a href="<?php echo base_url('laporan_tahunan') ?>">Laporan Tahunan Pelaksanaan Pelayanan</a></li>
                  <li><a href="<?php echo base_url('laporan_survei') ?>">Laporan Survei Pelaksanaan Pelayanan</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="">DIP (Daftar Informasi Publik)</a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url('info_berkala') ?>">Informasi Secara Berkala</a></li>
                  <li><a href="<?php echo base_url('info_sertamerta') ?>">Informasi Serta Merta</a></li>
                  <li><a href="<?php echo base_url('info_setiapsaat') ?>">Informasi Setiap Saat</a></li>
                  <li><a href="<?php echo base_url('info_dikecualikan') ?>">Informasi Dikecualikan</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
