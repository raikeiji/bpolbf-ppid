        <header class="dk header navbar navbar-fixed-top-xs" style="z-index:999">
            <div class="navbar-header aside-md">
                <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="fa fa-bars"></i> </a>
                <a href="<?php echo base_url() ?>" class="navbar-brand" data-toggle="fullscreen">
                  <img id="image_logo" src="<?php echo base_url() ?>/public/images/logo.png" style="max-height:60px;position:absolute;margin-top:0px" class="m-r-sm">

                </a>
                <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a>
            </div>
            <ul class="nav navbar-nav hidden-xs">
                <li>
                    <a href="#"><div class="font-bold" style="font-size:20px">Selamat datang <?php echo $_SESSION['username'] ?></div> </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
                <li class="hidden-xs hidden">
                    <a href="#" class="dropdown-toggle dk" data-toggle="dropdown"> <i class="fa fa-bell"></i> <span class="badge badge-sm up bg-danger m-l-n-sm count">2</span> </a>
                    <section class="dropdown-menu aside-xl">
                        <section class="panel bg-white">
                            <header class="panel-heading b-light bg-light"> <strong>You have <span class="count">2</span> notifications</strong> </header>
                            <div class="list-group list-group-alt animated fadeInRight">
                                <a href="#" class="media list-group-item"> <span class="pull-left thumb-sm"> <img src="<?php echo base_url() ?>/public/images/avatar.jpg" alt="John said" class="img-circle"> </span> <span class="media-body block m-b-none"> Use awesome animate.css<br> <small class="text-muted">10 minutes ago</small> </span> </a>
                                <a href="#" class="media list-group-item"> <span class="media-body block m-b-none"> 1.0 initial released<br> <small class="text-muted">1 hour ago</small> </span> </a>
                            </div>
                            <footer class="panel-footer text-sm"> <a href="#" class="pull-right"><i class="fa fa-cog"></i></a> <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a> </footer>
                        </section>
                    </section>
                </li>
                <li class="dropdown hidden-xs hidden"> <a href="#" class="dropdown-toggle dker" data-toggle="dropdown"><i class="fa fa-fw fa-search"></i></a>
                    <section class="dropdown-menu aside-xl animated fadeInUp">
                        <section class="panel bg-white">
                            <form role="search">
                                <div class="form-group wrapper m-b-none">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search"> <span class="input-group-btn"> <button type="submit" class="btn btn-info btn-icon"><i class="fa fa-search"></i></button> </span> </div>
                                </div>
                            </form>
                        </section>
                    </section>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="<?php echo base_url() ?>/public/images/avatar.jpg"> </span> <?php echo $_SESSION['username'] ?><b class="caret"></b> </a>
                    <ul class="dropdown-menu animated fadeInRight"> <span class="arrow top"></span>
                        <li class="hidden"> <a href="#">Settings</a> </li>
                        <li> <a href="profile.html">Profile</a> </li>
                        <li class="hidden">
                            <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a>
                        </li>
                        <li> <a href="docs.html">Help</a> </li>
                        <li class="divider"></li>
                        <li class="hidden"> <a href="<?php echo base_url('lockme') ?>" data-toggle="ajaxModal">Lock Screen</a> </li>
                        <li> <a href="#" data="logout">Logout</a> </li>
                    </ul>
                </li>
            </ul>
            <img src="<?php echo base_url('public/images/pattern/linevector.jpg') ?>" style="height:10px;width:100%" alt="">
        </header>
