
      <section id="page-title" class="text-light" data-bg-parallax="public/images/profile/bajo8.jpg">
        <div class="container">
          <div class="text-center">
            <h1>Pejabat Pengelola Informasi dan Dokumentasi (PPID)</h1>
          </div>
        </div>
      </section>
      <section class="body-inner">
        <img src="public/images/pattern/linevector.jpg" class="img-fluid b--responsive" />
      </section>

      <section class="" style="background: url(public/images/lp/bg-vector.png)">
        <?php

        foreach ($berita->getResult() as $key => $value) {
          $lang=$_SESSION['web_lang'];
          if($lang=='en'){
            $konten=$value->ind;
          }else{
            $konten=$value->en;
          }
          ?>

          <?php
        }
         ?>
        <?php echo $konten; ?>
      </section>
