<aside class="bg-white lter aside-md hidden-print hidden-xs b-r" id="nav">
    <section class="vbox">
        <section class="w-f scrollable" style="top:0">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                    <ul class="nav">
                      <?php
                      if($real=='dashboard'){
                        $act="style='background:rgb(60 59 59 / 23%)'";
                      }else{
                        $act='';
                      }
                      if($real=='data_statistik'){
                        $act1="style='background:rgb(60 59 59 / 23%)'";
                      }else{
                        $act1='';
                      }
                      if($real=='cerita_sukses'){
                        $act2="style='background:rgb(60 59 59 / 23%)'";
                      }else{
                        $act2='';
                      }
                       ?>
                      <li <?php echo $act ?>>
                        <a href="<?php echo base_url('Bajocontrol/dashboard') ?>"> <i class=""> <b class=""></b> </i> <span class="pull-right"></span> <span>Dashboard</span> </a>
                      </li>
                      <!-- <li>
                        <a href="" class=""> <i class=""> <b class=""></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>Master Data</span> </a>
                        <ul class="nav lt">
                          <li>
                            <a href="<?php echo base_url('Bajocontrol/master_kategori') ?>"> <i class="fa fa-angle-right"></i> <span>Master Kategori</span> </a>
                          </li>
                        </ul>
                      </li> -->
                      <?php
                      // echo $parent->id_menu.'-';
                      // echo json_encode($menu);exit;
                        foreach ($menu as $parent) {
                          if($parent['parent_id'] < 1){
                            if(!empty($parent['url'])){
                              if($parent['url']=="home"){
                                $href=base_url('Bajocontrol/beranda');
                              }else{
                                $href=base_url('Bajocontrol/'.str_replace(' ','_',strtolower($parent['url'])));
                              }
                            }else{
                              $href="#";
                            }
                          }else{
                            $href=base_url('Bajocontrol/'.str_replace(' ','-',strtolower($parent['url'])));
                          }
                          if($aktif==$parent['menu_id']){
                              // echo"kene-".$aktif.'-'.$parent['menu_id'];
                              $open="active";
                          }else{
                              // echo"ora-".$aktif.'-'.$parent['menu_id'];
                              $open="";
                          }
                          if(count($parent['child']) > 0){
                          ?>
                           <li class=" <?php echo $open; ?>">
                               <a href="<?php echo $href; ?>" class="<?php echo $open ?>">
                                  <i class=""> <b class=""></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span>
                                   <span class="menu-text"><?php echo $parent['menu_name'] ?></span><span class="toggle-icon"></span>
                               </a>
                               <ul class="nav lt">
                                 <?php
                                foreach ($parent['child'] as $child) {
                                  // echo $child['menu_id'].'-'.$url;
                                  if($child['parent_id'] < 1){
                                    $href="#";
                                  }else{
                                    $href=base_url('Bajocontrol/'.str_replace(' ','-',strtolower($child['url'])));
                                  }

                                  if($child['menu_id'] == $url){
                                    $act="style='background:#eff2f2'";
                                  }else{
                                    $act='';
                                  }

                                ?>
                                   <li <?php echo $act ?>><a href="<?php echo $href; ?>">&emsp;<?php echo $child['menu_name'] ?></a></li>
                                 <?php
                                }
                                ?>
                               </ul>
                             </li>
                           <?php
                          }else{
                            // echo $parent['menu_name'].'-'.$real;
                            if($parent['parent_id'] <1 && strtolower($parent['menu_name'])==$real){
                              $act="style='background:rgb(60 59 59 / 23%)'";
                            }else{
                              $act='';
                            }
                          ?>
                           <li <?php echo $act ?>>
                               <a href="<?php echo $href; ?>" class="active">
                                  <i class=""> <b class=""></b> </i> <span class="pull-right"></span>
                                   <span class="menu-text"><?php echo $parent['menu_name'] ?></span>
                               </a>
                           </li>
                           <?php
                          }
                        }
                       ?>

                       <?php
                       if($real=='setting'){
                         $act="style='background:rgb(60 59 59 / 23%)'";
                       }else{
                         $act='';
                       }
                        ?>
                       <li <?php echo $act ?>>
                        <a href="<?php echo base_url('Bajocontrol/setting') ?>"> <i class=""> <b class=""></b> </i> <span class="pull-right"></span> <span>Setting</span> </a>
                      </li>

                    </ul>
                </nav>
                <!-- / nav -->
            </div>
        </section>
        <footer class="footer lt hidden-xs" style="background:url('<?php echo base_url('public/images/pattern/linevector.jpg') ?>');height:auto">
            <div id="chat" class="dropup">
                <section class="dropdown-menu on aside-md m-l-n">
                    <section class="panel bg-white">
                        <header class="panel-heading b-b b-light">Active chats</header>
                        <div class="panel-body animated fadeInRight">
                            <p class="text-sm">No active chats.</p>
                            <p><a href="#" class="btn btn-sm btn-default">Start a chat</a></p>
                        </div>
                    </section>
                </section>
            </div>
            <div id="invite" class="dropup">
                <section class="dropdown-menu on aside-md m-l-n">
                    <section class="panel bg-white">
                        <header class="panel-heading b-b b-light"> John <i class="fa fa-circle text-success"></i> </header>
                        <div class="panel-body animated fadeInRight">
                            <p class="text-sm">No contacts in your lists.</p>
                            <p><a href="#" class="btn btn-sm btn-facebook"><i class="fa fa-fw fa-facebook"></i> Invite from Facebook</a></p>
                        </div>
                    </section>
                </section>
            </div>
            <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon"> <i class="fa fa-angle-left text"></i> <i class="fa fa-angle-right text-active"></i> </a>

        </footer>
    </section>
</aside>
