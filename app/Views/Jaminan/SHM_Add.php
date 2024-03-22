<?= $this->include('Layout/Header'); ?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Hasil Pemeriksaan Jaminan Tanah & Bangunan</h1>
    </div>
    <div class="tab-content" id="myTabContent2">
      <!-- tab-1 -->
      <div class="tab-pane fade show active" id="form-1" role="tabpanel" aria-labelledby="form-tab1">
        <form action="<?= site_url() ?>/jaminanSHM/post" method="post" class="needs-validation" novalidate="">
      
          <div class="card card-primary">
            <div class="card-header">
              <h4>Data Diri Pemohon</h4>
            </div>
            <div class="card-body">
              <div class="form-row">
<!-- View -->
<div class="form-group col-md-6">
    <label for="nama">Nama Pemohon<span class="text-danger">*</span></label>
    <select class="form-control" id="nama" name="nama_pemohon" required="">
        <option>Pilih Nama Pemohon</option>
        <?php

if (isset($listKredit)) {
  $no = null;
  foreach ($listKredit as $baris) {
    $no++;

    echo '<option value="' . $baris['nama_pemohon'] . '">' . $baris['nama_pemohon'] . '</option>';
  }
}

?>
    </select>
    <div class="invalid-feedback">
        Pilih nama Pemohon!
    </div>
</div>
<div class="form-group col-md-6">
    <label for="nama_penjamin">Nama Penjamin<span class="text-danger">*</span></label>
    <select class="form-control" id="nama_penjamin" name="nama_penjamin" required="">
        <option>Pilih Nama Penjamin</option>
        <?php

if (isset($listKredit)) {
  $no = null;
  foreach ($listKredit as $baris) {
    $no++;

    echo '<option value="' . $baris['nama_penjamin'] . '">' . $baris['nama_penjamin'] . '</option>';
  }
}

?>
    </select>
    <div class="invalid-feedback">
        Pilih nama Penjamin!
    </div>
</div>


               
  
                <div class="form-group">
                  <span class="text-success pr-3">* Optional</span>
                  <span class="text-danger">* Required</span>
                </div>
              </div>
            </div>
            </div>
  

          <div class="card card-primary">
            <div class="card-header">
              <h4>DATA TANAH BERDASARKAN SURAT TANAH</h4>
            </div>
            <div class="card-body">
              <div class="form-row">
              <div class="form-group col-md-6">
                <label for="alamat">Nomor<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="Surat_Tanah_Nomor" placeholder="Nomor Surat Tanah" required="">
                <div class="invalid-feedback">
                  Masukan Nomor Surat Tanah!
                </div>
              </div>
              <div class="form-group col-md-6">
                <label>Tanggal<span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="Surat_Tanah_Tanggal" placeholder="Tanggal Surat Tanah" required="">
                <div class="invalid-feedback">
                  Masukan Tanggal Surat Tanah!
                </div>
              </div>
              </div>
                <div class="form-group">
                  <label>Atas Nama<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Surat_Tanah_Atas_Nama" placeholder="Surat Tanah Atas Nama" required="">
                  <div class="invalid-feedback">
                    Masukan Atas Nama Surat Tanah!
                  </div>
                </div>  
                <div class="form-group">
                <label>Hak Atas Tanah<span class="text-danger">*</span></label>
                <select class="form-control" name="Hak_Atas_Tanah_Status" required="">
                  <option value="" selected disabled hidden>Status Hak Atas Tanah</option>
                  <option value="Hak Milik">Hak Milik</option>
                  <option value="Guna Bangunan">Guna Bangunan</option>
                  <option value="Pakai">Pakai</option>
                </select>
                <div class="invalid-feedback">
                  Pilih Hak Atas Tanah!
                </div>
              </div>
              <div class="form-group">
                <label>Luas Tanah<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="text" class="form-control" name="Luas_Tanah" placeholder="Luas Tanah">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                     m2
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <span class="text-success pr-3">* Optional</span>
                  <span class="text-danger">* Required</span>
                </div>
              </div>
            </div>
          </div>
          <div class="card card-primary">
            <div class="card-header">
              <h4>Detail Kredit</h4>
            </div>
            <div class="card-body">
            <div class="form-group">
                <label class="form-label">Lokasi Tanah adalah (Cocok/ Tidak Cocok) dengan pemeriksaan di lapangan?			</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="Lokasi_Tanah_Cocok_Tidak" value="Cocok" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Cocok</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="Lokasi_Tanah_Cocok_Tidak" value="Tidak Cocok" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Tidak</span>
                  </label>
                </div>
              </div>
            <div class="form-group">
                <label class="form-label">Batas Tanah adalah (Cocok/ Tidak Cocok) dengan pemeriksaan di lapangan?			</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="Batas_Tanah_Cocok_Tidak" value="Cocok" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Cocok</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="Batas_Tanah_Cocok_Tidak" value="Tidak Cocok" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Tidak</span>
                  </label>
                </div>
              </div>
              </div>
              </div>

          <div class="card card-primary">
            <div class="card-header">
              <h4>Detail Kredit</h4>
            </div>
            <div class="card-body">
            <div class="form-group">
                  <label>Terletak Di Jalan<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Lokasi_Tanah_Jalan" placeholder="Terletak Di Jalan" required="">
                  <div class="invalid-feedback">
                    Masukan Nama Jalan!
                  </div>
                </div>  
              <div class="form-row">

            <div class="form-group col-md-6">
                  <label>Kampung/ Dusun<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Lokasi_Tanah_Kampung" placeholder="Nama Kampung/ Dusun" required="">
                  <div class="invalid-feedback">
                    Masukan Nama Kampung/ Dusun!
                  </div>
                </div> 
                <div class="form-group col-md-6">
                  <label>Desa<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Lokasi_Tanah_Desa" placeholder="Terletak Di Desa" required="">
                  <div class="invalid-feedback">
                    Masukan Nama Desa!
                  </div>
                </div>   
              </div>
            
              <div class="form-row">
            
            <div class="form-group col-md-6">
                  <label>Kecamatan<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Lokasi_Tanah_Kecamatan" placeholder="Terletak Di Kecamatan" required="">
                  <div class="invalid-feedback">
                    Masukan Nama Kecamatan!
                  </div>
                </div>  
            <div class="form-group col-md-6">
                  <label>Kabupaten<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Lokasi_Tanah_Kabupaten" placeholder="Terletak Di Kabupaten" required="">
                  <div class="invalid-feedback">
                    Masukan Nama Kabupaten!
                  </div>
                </div>  
                </div> 

                <div class="form-group">
                <label>Jarak dari Jalan<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="number" class="form-control" name="Lokasi_Tanah_Jarak_Meter" placeholder="Jarak dari Jalan Desa">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                     meter dari jalan desa.
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <label>Akses Masuk<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Lokasi_Tanah_Akses_Masuk" placeholder="Akses Masuk" required="">
                  <div class="invalid-feedback">
                    Masukan Akses Masuk!
                  </div>
                </div>  

                <div class="form-row">
            
            <div class="form-group col-md-6">
                  <label>Batas Tanah Utara<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Batas_Tanah_Utara" placeholder="Batas Tanah Utara" required="">
                  <div class="invalid-feedback">
                    Masukan Batas Tanah Utara!
                  </div>
                </div>  
            <div class="form-group col-md-6">
                  <label>Batas Tanah Timur<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Batas_Tanah_Timur" placeholder="Batas Tanah Timur" required="">
                  <div class="invalid-feedback">
                    Masukan Batas Tanah Timur!
                  </div>
                </div>  
                </div>  

                <div class="form-row">
            
            <div class="form-group col-md-6">
                  <label>Batas Tanah Selatan<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Batas_Tanah_Selatan" placeholder="Batas Tanah Selatan" required="">
                  <div class="invalid-feedback">
                    Masukan Batas Tanah Selatan!
                  </div>
                </div>  
            <div class="form-group col-md-6">
                  <label>Batas Tanah Barat<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Batas_Tanah_Barat" placeholder="Batas Tanah Barat" required="">
                  <div class="invalid-feedback">
                    Masukan Batas Tanah Barat!
                  </div>
                </div>  
           
                </div> 

                <div class="form-group">
                  <label>Bentuk Tanah<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Bentuk_Tanah" placeholder="Bentuk Tanah" required="">
                  <div class="invalid-feedback">
                    Masukan Bentuk Tanah!
                  </div>
                  </div>
                <div class="form-group">
                  <label>Permukaan Tanah<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Permukaan_Tanah" placeholder="Permukaan Tanah" required="">
                  <div class="invalid-feedback">
                    Masukan Permukaan Tanah!
                  </div>
                  </div>
                  <div class="form-group">
                <label>Luas Tanah<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="number" class="form-control" name="Luas_Tanah_Bentuk" placeholder="Luas Tanah">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                     meter Persegi.
                    </div>
                  </div>
                </div>
              </div>


            </div>
              </div>

          <div class="card card-primary">
            <div class="card-header">
              <h4>Detail Kredit</h4>
            </div>
            <div class="card-body">
              <div class="form-row">
            <div class="form-group col-md-4">
                  <label>Persetujan Bangunan Nomor<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Persetujuan_Bangunan_No" placeholder="Nomor Persetujuan Bangunan Gedung" required="">
                  <div class="invalid-feedback">
                    Masukan Persetujan Bangunan Nomor!
                  </div>
                  </div>
              <div class="form-group col-md-4">
                  <label>Persetujan Bangunan Tanggal<span class="text-danger">*</span></label>
                  <input type="date" class="form-control" name="Persetujuan_Bangunan_Tanggal" placeholder="Tanggal Persetujuan Bangunan Gedung" required="">
                  <div class="invalid-feedback">
                    Masukan Persetujan Bangunan Tanggal!
                  </div>
                  </div>
              <div class="form-group col-md-4">
                  <label>Persetujan Bangunan Atas Nama<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="Persetujuan_Bangunan_Atas_Nama" placeholder="Atas Nama Persetujuan Bangunan Gedung" required="">
                  <div class="invalid-feedback">
                    Masukan Persetujan Bangunan Atas Nama!
                  </div>
                  </div>

                  </div>
              <div class="form-row">
              <div class="form-group col-md-4">
                <label>Jumlah Toko<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="number" class="form-control" name="Jumlah_Toko" placeholder="Jumlah Toko">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                    Unit.
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Luas Toko<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="number" class="form-control" name="Luas_Toko" placeholder="Luas Toko">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                    m2
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-4">
    <label for="tahun_lulus">Tahun Toko<span class="text-danger">*</span></label>
    <select class="form-control" name="Tahun_Toko">
    <option value="" selected disabled hidden>Pilih Tahun</option>
      <!-- Menambahkan pilihan tahun dari 1900 hingga 2099 -->
      <?php
        $start_year = 1900;
        $end_year = 2099;
        for ($year = $start_year; $year <= $end_year; $year++) {
          echo "<option value='$year'>$year</option>";
        }
      ?>
    </select>
    <div class="invalid-feedback">
      Masukkan tahun Toko!
    </div>
  </div>
                  </div>
              <div class="form-row">
              <div class="form-group col-md-4">
                <label>Jumlah Rumah<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="number" class="form-control" name="Jumlah_Rumah" placeholder="Jumlah Rumah">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                    Unit.
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Luas Rumah<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="number" class="form-control" name="Luas_Rumah" placeholder="Luas Rumah">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                    m2
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-4">
    <label for="tahun_lulus">Tahun Rumah<span class="text-danger">*</span></label>
    <select class="form-control" name="Tahun_Rumah" >
    <option value="" selected disabled hidden>Pilih Tahun</option>
      <!-- Menambahkan pilihan tahun dari 1900 hingga 2099 -->
      <?php
        $start_year = 1900;
        $end_year = 2099;
        for ($year = $start_year; $year <= $end_year; $year++) {
          echo "<option value='$year'>$year</option>";
        }
      ?>
    </select>
    <div class="invalid-feedback">
      Masukkan tahun Rumah!
    </div>
  </div>
                  </div>
              <div class="form-row">
              <div class="form-group col-md-4">
                <label>Jumlah Pabrik<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="number" class="form-control" name="Jumlah_Pabrik" placeholder="Jumlah Pabrik">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                    Unit.
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Luas Pabrik<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="number" class="form-control" name="Luas_Pabrik" placeholder="Luas Pabrik">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                    m2
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-4">
    <label for="tahun_lulus">Tahun Pabrik<span class="text-danger">*</span></label>
    <select class="form-control" name="Tahun_Pabrik" >
    <option value="" selected disabled hidden>Pilih Tahun</option>
      <!-- Menambahkan pilihan tahun dari 1900 hingga 2099 -->
      <?php
        $start_year = 1900;
        $end_year = 2099;
        for ($year = $start_year; $year <= $end_year; $year++) {
          echo "<option value='$year'>$year</option>";
        }
      ?>
    </select>
    <div class="invalid-feedback">
      Masukkan tahun Pabrik!
    </div>
  </div>
                  </div>
              <div class="form-row">
              <div class="form-group col-md-4">
                <label>Jumlah Gudang<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="number" class="form-control" name="Jumlah_Gudang" placeholder="Jumlah Gudang">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                    Unit.
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Luas Gudang<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="number" class="form-control" name="Luas_Gudang" placeholder="Luas Gudang">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                    m2
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-4">
    <label for="tahun_lulus">Tahun Toko<span class="text-danger">*</span></label>
    <select class="form-control" name="Tahun_Gudang" >
    <option value="" selected disabled hidden>Pilih Tahun</option>
      <!-- Menambahkan pilihan tahun dari 1900 hingga 2099 -->
      <?php
        $start_year = 1900;
        $end_year = 2099;
        for ($year = $start_year; $year <= $end_year; $year++) {
          echo "<option value='$year'>$year</option>";
        }
      ?>
    </select>
    <div class="invalid-feedback">
      Masukkan tahun Gudang!
    </div>
  </div>
                  </div>

              </div>
</div>
         

          <div class="card card-primary">
            <!-- <div class="card-header">
                <h4>Hubungan Dengan BPR</h4>
              </div> -->
            <div class="card-body">
              <div class="form-group">
                <button class="btn btn-primary form-control ">Submit</button>
              </div>
            </div>
          </div>
        </form>



  </section>
</div>
<?= $this->include('Layout/Footer'); ?>