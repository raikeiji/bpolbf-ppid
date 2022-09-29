<?php
  echo json_encode($parent);exit;
 ?>
<aside class="sidebar">
    <div class="sidebar__menu-group">
        <ul class="sidebar_nav">
          <li class="menu-title">
              <span>Main Menu</span>
          </li>
          <li>
              <a href="<?php echo base_url() ?>">
                  <span data-feather="home" class="nav-icon"></span>
                  <span class="menu-text">Beranda</span>
              </a>
          </li>
          <!-- <li>
              <a href="<?php echo base_url('create_menu') ?>">
                  <span data-feather="home" class="nav-icon"></span>
                  <span class="menu-text">Peluang Investasi</span>
              </a>
          </li>
          <li>
              <a href="<?php echo base_url('create_menu') ?>">
                  <span data-feather="home" class="nav-icon"></span>
                  <span class="menu-text">Fasilitas</span>
              </a>
          </li>
          <li>
              <a href="<?php echo base_url('create_menu') ?>">
                  <span data-feather="home" class="nav-icon"></span>
                  <span class="menu-text">Category</span>
              </a>
          </li>
          <li>
              <a href="<?php echo base_url('home/list_pages'); ?>" class="active">
                  <span data-feather="home" class="nav-icon"></span>
                  <span class="menu-text">Posting</span>
              </a>
          </li> -->
          <?php
          // echo json_encode($menu);exit;
            foreach ($menudashboard as $parent) {
              if($parent['parent_id'] < 1){
                $href="#";
              }else{
                $href=base_url(str_replace(' ','-',strtolower($parent['url'])));
              }
              if($parent==$parent['menu_id']){
                  $open="active";
              }else{
                  $open="";
              }
              if(count($parent['child']) > 0){
              ?>
               <li class="has-child <?php echo $open; ?>">
                   <a href="<?php echo $href; ?>" class="">
                       <span data-feather="package" class="nav-icon"></span>
                       <span class="menu-text"><?php echo $parent['menu_name'] ?></span><span class="toggle-icon"></span>
                   </a>
                   <ul>
                     <?php
                    foreach ($parent['child'] as $child) {
                      if($child['parent_id'] < 1){
                        $href="#";
                      }else{
                        $href=base_url(str_replace(' ','-',strtolower($child['url'])));
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
               <li>
                   <a href="<?php echo $href; ?>" class="active">
                       <span data-feather="home" class="nav-icon"></span>
                       <span class="menu-text"><?php echo $parent['menu_name'] ?></span>
                   </a>
               </li>
               <?php
              }
            }
           ?>
             <li class="menu-title">
                 <span>Settings</span>
             </li>
            <li class="has-child">
                <a href="#" class="">
                    <span data-feather="settings" class="nav-icon"></span>
                    <span class="menu-text">Pengaturan</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li>
                        <a href="#" class="">Pengaturan</a>
                    </li>
                    <li>
                        <a href="#" class="">Database Produk</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</aside>
