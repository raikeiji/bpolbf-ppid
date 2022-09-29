<!DOCTYPE html>
<html lang="en" class="app">
<?php echo $meta ?>
<body>
  <section class="vbox">
  	<?php echo $header; ?>
    <section>
      <section class="hbox stretch" style="margin-top:9px;">
          <!-- .aside -->
      		<?php echo $sidemenu; ?>
      		<!-- /.aside -->
    		  <?php echo $content; ?>
          <aside class="bg-light lter b-l aside-md hide" id="notes">
              <div class="wrapper">Notification</div>
          </aside>
  	  </section>
  	</section>
  </section>
  <?php echo $footer; ?>
</body>
</html>
