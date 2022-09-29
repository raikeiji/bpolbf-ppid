<script type="text/javascript" src="<?php echo base_url('public/plugins/tinymce/tinymce.min1.js') ?>"></script>
<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Admin</a></li>
                <li class="active">Settings</li>
            </ul>
            <div class="m-b-md">
                <h3 class="m-b-none">Settings
                  <!-- <button type="button" class="btn btn-sm btn-info pull-right" name="add_user">Add User</button> -->
                </h3>
                <small>Welcome back, <?php echo $_SESSION['username'] ?></small>
            </div>
            <form class="" method="post" id="form_setting">
              <div class="row">
                <?php
                foreach ($data->getResult() as $key => $value) { ?>
                  <div class="col-md-6 col-xs-12">
                      <section class="panel panel-default">
                          <header class="panel-heading font-bold"><?php echo str_replace('_',' ',strtoupper($value->name)) ?></header>
                          <div class="panel-body">
                            <?php
                            if($value->tipe=='textarea'){
                                echo'<textarea class="form-control" name="'.$value->name.'" rows="12" cols="110">'.$value->value.'</textarea>';
                            }elseif($value->tipe=='text'){
                                echo'<input type="text" name="'.$value->name.'" class="form-control" value="'.$value->value.'">';
                            }elseif($value->tipe=='file'){
                                echo'<input type="file" name="'.$value->name.'" class="form-control">';
                            }
                             ?>

                          </div>

                      </section>
                  </div>
                <?php }
                 ?>

              </div>
              <footer class="panel-footer bg-white no-padder m-b-lg">
                  <div class="row text-center no-gutter">
                      <div class="col-xs-12"> <span class="h4 font-bold m-t block">SYSTEM SETTING</span> <button type="submit" class="btn btn-sm btn-info" name="simpan">Save Change</button> </div>
                  </div>
              </footer>
            </form>
        </section>
    </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
  </section>
<script type="text/javascript">
$(document).ready(function(){

  $("#form_setting").on('submit',function(e){
      e.preventDefault();
      $.ajax({
          type: "POST",
          url: '<?php echo base_url() ?>/Bajocontrol/setting/do_save',
          data: new FormData(this),
          dataType:'json',
          contentType: false,
          cache: false,
          processData:false,
          success: function(response){
              if(response.status){
                  sweetalert(1,response.msg);
                  window.setTimeout(function(){ window.location = "<?php echo base_url(); ?>/Bajocontrol/setting"; },2000);
              }else{
                  sweetalert(4,response.msg);
              }
          }
      });
  });

  tinymce.init({
      selector:'textarea',
      plugins : 'image code',
		  toolbar : 'undo redo | image code',
      image_title: true,
      automatic_uploads: false,
      convert_urls: false,
      file_picker_types: 'image',
      setup: function(editor) {
        editor.on('init', function(e) {
          console.log('The Editor has initialized.');
        });
      },
      init_instance_callback: function (editor) {
        editor.on('init', function (e) {
          console.log('Element clicked:');
        });
      },
      images_upload_handler : function(blobInfo, success, failure) {
    			var xhr, formData;

    			xhr = new XMLHttpRequest();
    			xhr.withCredentials = false;
    			xhr.open('POST', '<?php echo base_url('Bajocontrol/general/manage_news/upload_images') ?>');

    			xhr.onload = function() {
    				var json;

    				if (xhr.status != 200) {
    					failure('HTTP Error: ' + xhr.status);
    					return;
    				}

    				json = JSON.parse(xhr.responseText);

    				if (!json || typeof json.location != 'string') {
    					failure('Invalid JSON: ' + json.message);
    					return;
    				}

    				success(json.location);
    			};

    			formData = new FormData();
    			formData.append('file', blobInfo.blob(), blobInfo.filename());

    			xhr.send(formData);
    		},
    });

})
</script>
