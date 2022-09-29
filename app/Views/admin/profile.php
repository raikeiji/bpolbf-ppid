<script type="text/javascript" src="<?php echo base_url('public/plugins/tinymce/tinymce.min1.js') ?>"></script>
<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Admin</a></li>
                <li class="active">Tentang BPOLBF</li>
            </ul>
            <div class="m-b-md">
                <h3 class="m-b-none">Tentang BPOLBF
                  <!-- <button type="button" class="btn btn-sm btn-info pull-right" name="add_user">Add User</button> -->
                </h3>
                <small>Welcome back, <?php echo $_SESSION['username'] ?></small>
            </div>
            <form class="" method="post" id="form_setting">
              <div class="row">
                <div class="col-sm-12">
                      <section class="panel panel-default">
                          <header class="panel-heading font-bold">Pilih Bahasa</header>
                          <div class="panel-body">
                              <form role="form">
                                  <div class="form-group col-sm-4">
                                    <select name="bahasa" class="form-control">
                                      <option value="1">Bahasa Indonesia</option>
                                      <option value="2">Bahasa Inggris</option>
                                    </select>
                                  </div>
                          </div>
                        </section>
                </div>
              </div>
                <div class="row">
                  <div class="col-sm-12">
                    <section class="panel panel-default">
                        <header class="panel-heading font-bold">Section</header>
                        <div class="panel-body">
                                <div class="form-group col-sm-12">
                                  <label>Konten</label>
                                  <textarea class="form-control" name="konten1" id="konten1" rows="12" cols="110"><?php echo $data->ind ?></textarea>
                                </div>
                        </div>
                      </section>
                  </div>
                </div>
                  <div class="row text-center no-gutter" style="margin-bottom:40px">
                    <button type="submit" class="btn btn-sm btn-info" name="simpan">Save Change</button>
                  </div>
            </form>
        </section>
    </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
  </section>
<script type="text/javascript">
$(document).ready(function(){

  $('[name="bahasa"]').change(function(){
    get_data($(this).val());
  });
  $("#form_setting").on('submit',function(e){
      e.preventDefault();
      var konten1 = tinymce.get("konten1").getContent();
      $('#form_setting [name="konten1"]').val(konten1);
      $.ajax({
          type: "POST",
          url: '<?php echo base_url('Bajocontrol/profile/do_save') ?>',
          data: new FormData(this),
          dataType:'json',
          contentType: false,
          cache: false,
          processData:false,
          success: function(response){
              if(response.status){
                  sweetalert(1,response.msg);
                  window.setTimeout(function(){ window.location = "<?php echo base_url(); ?>/Bajocontrol/profile"; },2000);
              }else{
                  sweetalert(4,response.msg);
              }
          }
      });
  });
  function get_data(x){
    $.ajax({
      type:'post',
      url:'<?php echo base_url('Bajocontrol/profile/get_data') ?>',
      data:{'lang':x},
      dataType:'json',
      success:function(res){
          $('[name="konten1"]').html(res[0]['k1']);
          tinymce.get("konten1").setContent(res[0]['k1']);
      }
    })
  }
  tinymce.init({
      selector:'textarea',
      plugins : 'image code',
		  toolbar : 'undo redo | code',
      image_title: true,
      automatic_uploads: false,
      convert_urls: false,
      file_picker_types: 'image',
      init_instance_callback: function (editor) {
        editor.on('click', function (e) {
          // console.log('Element clicked:', e.target.nodeName);
        });
      },
      images_upload_handler : function(blobInfo, success, failure) {
    			var xhr, formData;

    			xhr = new XMLHttpRequest();
    			xhr.withCredentials = false;
    			xhr.open('POST', '<?php echo base_url('bajocontrol/profile/upload_images') ?>');

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
