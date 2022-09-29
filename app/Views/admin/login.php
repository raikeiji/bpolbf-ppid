<script src="https://www.google.com/recaptcha/api.js?render=6LcZ99kZAAAAABBCyD4G7RJ-tLR38FCR7npCMYOO"></script>
<body class="bg-info"  style="background:url('<?php echo base_url('public/images/bglogin.jpg') ?>');background-size:100% 100%">
<section id="content" class="wrapper-md animated fadeInUp">
    <div class="container aside-xxl">
        <a class="navbar-brand block" href=""><?php echo $title;  ?></a>
        <section class="panel panel-default bg-white m-t-lg">
            <header class="panel-heading text-center" style="background:#4fd0dd"><strong class="color-white">Sign in</strong></header>
            <form id="loginadmin" method="post" data="encode_form" class="panel-body wrapper-lg">
                <div class="form-group"><label class="control-label color-white">Username</label> <input type="text" name="username" class="form-control input-lg" /></div>
                <div class="form-group"><label class="control-label color-white">Password</label> <input type="password" name="password" class="form-control input-lg" /></div>
                <!-- <div class="checkbox">
                    <label class="color-white"> <input type="checkbox" /> Keep me logged in </label>
                </div> -->
                <!-- <a href="#" class="pull-right m-t-xs color-white"><small>Forgot password?</small></a>  -->
                <input type="hidden" id="token" name="token">
                <button type="submit" class="btn btn-primary">Sign in</button>
                <div class="line line-dashed"></div>
            </form>
        </section>
    </div>
</section>
<script type="text/javascript">
  grecaptcha.ready(function() {
    grecaptcha.execute('6LcZ99kZAAAAABBCyD4G7RJ-tLR38FCR7npCMYOO', {action: 'submit'}).then(function(token) {
      $('#token').val(token);
      $("#loginadmin").on('submit',function(e){
          e.preventDefault();
          $.ajax({
              type: "POST",
              url: '<?php echo base_url() ?>/Bajocontrol/login/do_login',
              data: new FormData(this),
              dataType:'json',
              contentType: false,
              cache: false,
              processData:false,
              success: function(response){
                  if(response.status){
                    sweetalert(1,response.msg);
                    setTimeout(function(){
                       location.href='<?php echo base_url('Bajocontrol/dashboard') ?>';
                    },2000)
                  }else{
                    sweetalert(5,response.msg);
                  }
              }
          })
      });
    });
  });
  // function login(user,pass){
  //   $.ajax({
  //       type:'post',
  //       url:'<?php echo base_url('Bajocontrol/login/do_login') ?>',
  //       data: {
  //           'username':$('#loginadmin [name="username"]').val(),
  //           'password':$('#loginadmin [name="password"]').val()
  //       },
  //       dataType:'json',
  //       success:function(res){
  //           if(res.status){
  //               sweetalert(1,res.msg);
  //               setTimeout(function(){
  //                   location.href='<?php echo base_url('Bajocontrol/dashboard') ?>';
  //               },2000)
  //           }else{
  //               sweetalert(5,res.msg);
  //           }
  //       }
  //   })
  // }

  // $('#loginadmin button').click(function(){
  //     var user=$('#loginadmin [name="username"]').val();
  //     var pass=$('#loginadmin [name="password"]').val();
  //     login(user,pass);
  // })
  //
  // $('#loginadmin').on('keypress',function(e) {
  //     var user=$('#loginadmin [name="username"]').val();
  //     var pass=$('#loginadmin [name="password"]').val();
  //     if(e.which == 13) {
  //         login(user,pass);
  //     }
  // })
</script>
</body>
