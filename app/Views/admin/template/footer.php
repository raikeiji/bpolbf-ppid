<script src="<?php echo base_url() ?>/public/adminjs/app.v1.js"></script>
<script src="<?php echo base_url() ?>/public/adminjs/charts/easypiechart/jquery.easy-pie-chart.js"></script>
<script src="<?php echo base_url() ?>/public/adminjs/charts/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url() ?>/public/adminjs/charts/flot/jquery.flot.min.js"></script>
<script src="<?php echo base_url() ?>/public/adminjs/charts/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url() ?>/public/adminjs/charts/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url() ?>/public/adminjs/charts/flot/jquery.flot.grow.js"></script>
<script src="<?php echo base_url() ?>/public/adminjs/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/public/adminjs/charts/flot/demo.js"></script>
<script src="<?php echo base_url() ?>/public/adminjs/calendar/bootstrap_calendar.js"></script>
<script src="<?php echo base_url() ?>/public/adminjs/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>/public/adminjs/calendar/demo.js"></script>
<script src="<?php echo base_url() ?>/public/adminjs/sortable/jquery.sortable.js"></script>
<script src="<?php echo base_url() ?>/public/adminjs/app.plugin.js"></script>
<script src="<?php echo base_url() ?>/public/adminjs/animate.js"></script>


<script type="text/javascript">
$(document).ready(function(){
  setTimeout(function(){
    $('.mce-branding').html('Dedicated for Labuhan Bajo');
  },500)
})
var ml4 = {};
ml4.opacityIn = [0,1];
ml4.scaleIn = [0.2, 1];
ml4.scaleOut = 3;
ml4.durationIn = 800;
ml4.durationOut = 600;
ml4.delay = 500;

anime.timeline({loop: true})
.add({
  targets: '.ml4 .letters-1',
  opacity: ml4.opacityIn,
  scale: ml4.scaleIn,
  duration: ml4.durationIn
}).add({
  targets: '.ml4 .letters-1',
  opacity: 0,
  scale: ml4.scaleOut,
  duration: ml4.durationOut,
  easing: "easeInExpo",
  delay: ml4.delay
}).add({
  targets: '.ml4 .letters-2',
  opacity: ml4.opacityIn,
  scale: ml4.scaleIn,
  duration: ml4.durationIn,
}).add({
  targets: '.ml4 .letters-2',
  opacity: 0,
  scale: ml4.scaleOut,
  duration: ml4.durationOut,
  easing: "easeInExpo",
  delay: ml4.delay
}).add({
  targets: '.ml4 .letters-3',
  opacity: ml4.opacityIn,
  scale: ml4.scaleIn,
  duration: ml4.durationIn
}).add({
  targets: '.ml4 .letters-3',
  opacity: 0,
  scale: ml4.scaleOut,
  duration: ml4.durationOut,
  easing: "easeInExpo",
  delay: ml4.delay
}).add({
  targets: '.ml4',
  opacity: 0,
  duration: 500,
  delay: 500
});

$('[data="logout"]').click(function(){
    $.ajax({
        type:'post',
        dataType:'json',
        url:'<?php echo base_url('Bajocontrol/login/do_logout') ?>',
        success:function(res){
            if(res.status){
                setTimeout(function(){
                  location.href='<?php echo base_url('Bajocontrol/home') ?>';
                },2000)
            }else{
                sweetalert(5,res.msg);
            }
        }
    })
})

$('.datepicker').datepicker();
</script>
