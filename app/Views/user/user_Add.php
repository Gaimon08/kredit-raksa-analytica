<?=$this->include('Layout/Header');?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Analisis Kredit Konsumtif</h1>
          </div>
            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
              <form action="<?=base_url()?>/user/add_post" method="post" class="needs-validation" novalidate=""> 
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">Nama lengkap</label>
                      <input id="frist_name" type="text" class="form-control" name="nama" autofocus required="">
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Username</label>
                      <input id="last_name" type="text" class="form-control" name="username" required="">
                    </div>
                  </div>

                  <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="jenis_kelamin" required="">
                        <option value="">Pilih jenis kelamin anda</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      <div class="invalid-feedback">
                         Pilih jenis kelamin anda!
                        </div>
                    </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required="">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password-confirm" required="">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree" required="">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
</section>
</div>
  <?=$this->include('Layout/Footer');?>