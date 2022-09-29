<header id="header" data-transparent="true" class="dark submenu-light" data-fullwidth="true">
  <div class="header-inner">
    <div class="container">
      <div id="logo">
        <a href="<?php echo base_url('home') ?>">
          <img src="<?php echo base_url() ?>/public/images/logo.png" class="logo-default">
          <img src="<?php echo base_url() ?>/public/images/logowht.png" class="logo-dark">
        </a>
      </div>
      <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
        <form class="search-form" action="#" method="get">
          <input class="form-control" name="q" type="text" placeholder="Type & Search..." />	<span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
        </form>
      </div>
      <div class="header-extras">
        <ul>
          <li style="display:none">
            <a id="btn-search" href="#"> <i class="icon-search"></i>
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
      <div id="mainMenu-trigger">	<a class="lines-button x"><span class="lines"></span></a>
      </div>
      <div id="mainMenu">
        <div class="container">
          <nav>
            <ul>
              <?php
                foreach ($menu as $parent) {
                  if($parent['parent_id'] < 1){
                    if(count($parent['child']) < 1){
                      $href=base_url($parent['url']);
                    }else{
                      $href="#";
                    }
                  }else{
                    $href=base_url($parent['url']);
                  }
                  if(count($parent['child']) > 0){
                  ?>
                      <li class="dropdown"><a href="<?php echo $href; ?>"><?php echo $parent['menu_name'] ?></a>
                      <ul class="dropdown-menu">
                        <?php
                        foreach ($parent['child'] as $child) {
                          if($child['parent_id'] < 1){
                            $href="#";
                          }else{
                            $href=base_url($child['url']);
                          }
                        ?>
                          <li><a href="<?php echo $href; ?>"><?php echo $child['menu_name'] ?></a></li>
                        <?php
                        }
                        ?>
                      </ul>
                    </li>
                  <?php
                  }else{
                  ?>
                    <li><a href="<?php echo $href; ?>"><?php echo $parent['menu_name'] ?></a></li>
                  <?php
                  }
                }
               ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
