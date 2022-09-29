<section id="content">
	<section class="vbox">
				<section class="scrollable padder">
					<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
							<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
							<li class="active">Dashboard</li>
					</ul>
					<div class="m-b-md">
							<h3 class="m-b-none">Dashboard</h3> <small>Welcome back, <?php echo $_SESSION['username'] ?></small> </div>
					<div class="row">
							<div class="col-md-12">
									<section class="panel panel-default">
											<header class="panel-heading font-bold">Statistics</header>
											<div class="panel-body">
													<div id="flot-1ine1" style="height:410px"></div>
											</div>
											<footer class="panel-footer bg-white no-padder">
													<div class="row text-center no-gutter">
															<div class="col-xs-12"> <span class="h4 font-bold m-t block">STATISTIC INCOMING FAX PER DAY</span> <small class="text-muted m-b block">Customers</small> </div>
													</div>
											</footer>
									</section>
							</div>
					</div>
			</section>
		</section>
		<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
</section>
<script type="text/javascript">
	function get_data(){
			$.ajax({
					type:'post',
					url:'<?php echo base_url('dashboard/get_data') ?>',
					dataType:'json',
					success:function(res){
							$('#total').html(res.total);
							$('#sent').html(res.sent);
							$('#queue').html(res.queue);
							$('#pending').html(res.pending);
					}
			})
	}

	// setInterval(function(){
	// 		get_data();
	// },5000)
	//
	// get_data();



	$(function(){
		var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
		function get_chart(){
			var d1 = [];
			$.ajax({
					type:'post',
					url:'<?php echo base_url('dashboard/get_chart') ?>',
					dataType:'json',
					success:function(res){
						$.each(res,function(i,v){
							d1.push([i,v]);
						})
					}
			})
		  // for (var i = 0; i <= 11; i += 1) {
		  //   d1.push([i, parseInt((Math.floor(Math.random() * (1 + 20 - 10))) + 10)]);
		  // }
		  $("#flot-1ine1").length && $.plot($("#flot-1ine1"), [{
		          data: d1
		      }],
		      {
		        series: {
		            lines: {
		                show: true,
		                lineWidth: 2,
		                fill: true,
		                fillColor: {
		                    colors: [{
		                        opacity: 0.0
		                    }, {
		                        opacity: 0.2
		                    }]
		                }
		            },
		            points: {
		                radius: 5,
		                show: true
		            },
		            grow: {
		              active: true,
		              steps: 50
		            },
		            shadowSize: 2
		        },
		        grid: {
		            hoverable: true,
		            clickable: true,
		            tickColor: "#f0f0f0",
		            borderWidth: 1,
		            color: '#f0f0f0'
		        },
		        colors: ["#65bd77"],
		        xaxis:{
		        },
		        yaxis: {
		          ticks: 5
		        },
		        tooltip: true,
		        tooltipOpts: {
		          content: "chart: %x.1 is %y.4",
		          defaultTheme: false,
		          shifts: {
		            x: 0,
		            y: 20
		          }
		        }
		      }
		  );
		}

		// get_chart();
	})


</script>
