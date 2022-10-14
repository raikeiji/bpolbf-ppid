  <section id="page-content" class="sidebar-right">
        <div class="container">
          <h2 class="text-dark text-center">Formulir Permintaan Informasi PPID</h2>
          <div class="row">
            <div class="content col-lg-12">
              <div class="row">
                <div class="card-body">
                  <form id="form1" class="form-validate">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="name">Nama sesuai KTP</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required="required" />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="email">Alamat Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Emaill" required="required" />
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="telephone">Kontak</label>
                        <input type="text" class="form-control" name="telp" placeholder="No Kontak" required="required" />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="number">No KTP</label>
                        <input type="text" class="form-control" name="nik" placeholder="No Identitas" required="required" />
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" placeholder="" name="alamat" rows="2"></textarea>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="address">Permintaan Informasi</label>
                        <textarea class="form-control" placeholder="" name="info_req" rows="5"></textarea>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="address">Tujuan Informasi</label>
                        <textarea class="form-control" name="info_tujuan" placeholder="" rows="5"></textarea>
                      </div>
                    </div>

                    <div>
                      <div class="h5 mb-4">Upload Photo ID</div>
                      <div class="fallback">
                        <input name="file" type="file" multiple />
                      </div>
                      <small id="dropzoneHelp" class="form-text text-muted">Max file size is 2MB and max number of files is 10.</small>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 mt-5">
                        <h5>Cara Mendapatkan</h5>
                        <div class="form-group mb-2">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="cara_dapat[]" id="satu" class="custom-control-input" value="LIHAT/BACA/DENGAR/CATAT" required="required" />
                            <label class="custom-control-label" for="satu">LIHAT/BACA/DENGAR/CATAT </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="cara_dapat[]" id="dua" class="custom-control-input" value="MENDAPATKAN SALINAN INFORMASI" required="required" />
                            <label class="custom-control-label" for="dua">MENDAPATKAN SALINAN INFORMASI </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 mt-5">
                        <h5>Cara Memberikan</h5>
                        <div class="form-group mb-2">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="cara_beri[]" id="tiga" class="custom-control-input" value="MENGAMBIL LANGSUNG " required="required" />
                            <label class="custom-control-label" for="tiga">MENGAMBIL LANGSUNG </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="cara_beri[]" id="empat" class="custom-control-input" value="FAKSIMILI" required="required" />
                            <label class="custom-control-label" for="empat"> FAKSIMILI </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="cara_beri[]" id="lima" class="custom-control-input" value="DIKIRIM" required="required" />
                            <label class="custom-control-label" for="lima">DIKIRIM </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="cara_beri[]" id="enam" class="custom-control-input" value="EMAIL" required="required" />
                            <label class="custom-control-label" for="enam">EMAIL </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="button" name="kirim" class="btn m-t-30 mt-3">Kirim</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="box-fancy section-fullwidth text-light no-padding">
        <div class="row">
          <div class="col-lg-6 text-right" style="background-color: #aca8a8">
            <h3>Formulir Keberatan Informasi Publik</h3>
            <a class="btn btn-light btn-outline btn-rounded" href="#">Formulir Keberatan Informasi Publik</a>
          </div>
          <div class="col-lg-6 text-left" style="background-color: #adadad">
            <span class="lead"
              >Apakah ada kendala dalam pengisian formulir? Silahkan unduh dan unggah formulir informasi publik disini<a href="#"> <i class="fa fa-download"></i> </a
            ></span>
            <div class="row">
              <div class="col-lg-6">
                <div>
                  <div class="fallback">
                    <input name="file" type="file" multiple />
                  </div>
                  <small id="dropzoneHelp" class="form-text text-light">unggah file formulir disini.</small>
                </div>
              </div>
              <div class="col-lg-6">
                <a class="btn btn-light btn-outline btn-rounded" href="#">Unggah</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="no-padding equalize" data-equalize-item=".text-box">
        <div class="row col-no-margin">
          <div class="col-lg-3" style="background-color: #2f2f2f">
            <div class="text-box">
              <a href="#">
                <i class="fa fa-file"></i>
                <h3>Informasi Berkala</h3>
              </a>
            </div>
          </div>

          <div class="col-lg-3" style="background-color: #383838">
            <div class="text-box">
              <a href="#">
                <i class="fas fa-file-alt"></i>
                <h3>Informasi Serta Merta</h3>
              </a>
            </div>
          </div>

          <div class="col-lg-3" style="background-color: #313131">
            <div class="text-box">
              <a href="#">
                <i class="far fa-folder-open"></i>
                <h3>Informasi Tersedia Setiap Saat</h3>
              </a>
            </div>
          </div>

          <div class="col-lg-3" style="background-color: #383838">
            <div class="text-box">
              <a href="#">
                <i class="fa fa-folder"></i>
                <h3>Informasi Yang Dikecualikan</h3>
              </a>
            </div>
          </div>
        </div>
      </section>

      <section class="no-padding embed_video">
        <div class="section">
          <!-- <iframe
            width="560"
            height="315"
            src="https://www.youtube.com/embed/jag7XRbq6zA"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe> -->
          <iframe width="100%" height="415" src="https://www.youtube.com/embed/jag7XRbq6zA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </section>
      <script type="text/javascript">
      $(document).ready(function(){
        setTimeout(function(){
          $('.embed_video .section div').removeClass('embed-responsive-16by4');
        },2000)
        $('[name="kirim"]').on('click',function(x){
          $("#form1").submit();
        })
        $("#form1").on('submit',function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>/home/sve',
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
      });
      </script>
