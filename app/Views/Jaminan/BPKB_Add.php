<?= $this->include('Layout/Header'); ?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Hasil Pemeriksaan Jaminan Benda Bergerak</h1>
      <a href="<?= site_url() ?>/jaminanBPKB/add" class="btn btn-primary ml-auto">Tambah Jaminan Barang Bergerak</a>
    </div>
    <div class="tab-content" id="myTabContent2">
      <!-- tab-1 -->
      <div class="tab-pane fade show active" id="form-1" role="tabpanel" aria-labelledby="form-tab1">
        <form action="<?= site_url() ?>/jaminanBPKB/post" method="post" class="needs-validation" novalidate="">
      
          <div class="card card-primary">
            <div class="card-header">
              <h4>Data Pemohon Kredit</h4>
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
</div>

<div class="form-group">
                <label for="alamat">Alamat<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Desa, RT/RW, Kelurahan, kecamatan, Kabupaten" required="">
                <div class="invalid-feedback">
                  Masukan alamat lengkap pemohon!
                </div>
              </div>
          </div>
            </div>
  

          <div class="card card-primary">
            <div class="card-header">
              <h4>DETAIL JAMINAN</h4>
            </div>
            <div class="card-body">
            <div class="form-group">
                <label >Jenis Barang<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="jenis_barang" placeholder="Jenis Barang" required="">
                <div class="invalid-feedback">
                  Masukan Jenis Barang!
                </div>
              </div>
<div class="form-group">
                <label>Merk<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="merk" placeholder="Merk Kendaraan" required="">
                <div class="invalid-feedback">
                  Masukan Merk Kendaraan!
                </div>
              </div>
              <div class="form-group ">
    <label>Tahun<span class="text-danger">*</span></label>
    <select class="form-control" name="tahun" >
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
      Masukkan tahun!
    </div>
  </div>
  <div class="form-group">
                <label>Warna<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="warna" placeholder="Warna Kendaraan" required="">
                <div class="invalid-feedback">
                  Masukan Warna Kendaraan!
                </div>
              </div>
  <div class="form-group">
                <label>No. Mesin<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="no_mesin" placeholder="Nomor Mesin Kendaraan" required="">
                <div class="invalid-feedback">
                  Masukan Nomor Mesin Kendaraan!
                </div>
              </div>
  <div class="form-group">
                <label>No. Rangka<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="no_rangka" placeholder="Nomor Rangka Kendaraan" required="">
                <div class="invalid-feedback">
                  Masukan Nomor Rangka Kendaraan!
                </div>
              </div>
  <div class="form-group">
                <label>No. Polisi<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="no_polisi" placeholder="Nomor Polisi Kendaraan" required="">
                <div class="invalid-feedback">
                  Masukan Nomor Polisi Kendaraan!
                </div>
              </div>
  <div class="form-group">
                <label>No. STNK<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="no_stnk" placeholder="Nomor STNK Kendaraan" required="">
                <div class="invalid-feedback">
                  Masukan Nomor STNK Kendaraan!
                </div>
              </div>
  <div class="form-group">
                <label>No. BPKB<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="no_bpkb" placeholder="Nomor BPKB Kendaraan" required="">
                <div class="invalid-feedback">
                  Masukan Nomor BPKB Kendaraan!
                </div>
              </div>
  <div class="form-group">
                <label>Nama DI BPKB<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama_di_bpkb" placeholder="Nama Di BPKB Kendaraan" required="">
                <div class="invalid-feedback">
                  Masukan Nama Di BPKB Kendaraan!
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
              <h4>KONDISI JAMINAN</h4>
            </div>
            <div class="card-body">
            <div class="form-group">
                <label class="form-label">Bodi Kendaraan</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_bodi_kendaraan" value="Baik" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Baik</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_bodi_kendaraan" value="Sedang" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Sedang</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_bodi_kendaraan" value="Kurang" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Kurang</span>
                  </label>
                </div>
              </div>
            <div class="form-group">
                <label class="form-label">Cat</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_cat" value="Baik" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Baik</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_cat" value="Sedang" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Sedang</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_cat" value="Kurang" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Kurang</span>
                  </label>
                </div>
              </div>
            <div class="form-group">
                <label class="form-label">Plapon/ Atap</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_plapon_atap" value="Baik" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Baik</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_plapon_atap" value="Sedang" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Sedang</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_plapon_atap" value="Kurang" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Kurang</span>
                  </label>
                </div>
              </div>
            <div class="form-group">
                <label class="form-label">Rangka/ Sasis</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_rangka_sasis" value="Baik" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Baik</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_rangka_sasis" value="Sedang" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Sedang</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_rangka_sasis" value="Kurang" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Kurang</span>
                  </label>
                </div>
              </div>
            <div class="form-group">
                <label class="form-label">Kaca Spion</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_kaca_spion" value="Ada" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Ada</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_kaca_spion" value="Tidak Ada" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Tidak Ada</span>
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Lampu Depan</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_lampu_depan" value="Berfungsi" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Berfungsi</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_lampu_depan" value="Tidak Berfungsi" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Tidak Berfungsi</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_lampu_depan" value="Tidak Ada" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Tidak Ada</span>
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Lampu Belakang</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_lampu_belakang" value="Berfungsi" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Berfungsi</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_lampu_belakang" value="Tidak Berfungsi" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Tidak Berfungsi</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_lampu_belakang" value="Tidak Ada" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Tidak Ada</span>
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Lampu Rem</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_lampu_rem" value="Berfungsi" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Berfungsi</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_lampu_rem" value="Tidak Berfungsi" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Tidak Berfungsi</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_lampu_rem" value="Tidak Ada" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Tidak Ada</span>
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Lampu Sen</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_lampu_sen" value="Berfungsi" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Berfungsi</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_lampu_sen" value="Tidak Berfungsi" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Tidak Berfungsi</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_lampu_sen" value="Tidak Ada" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Tidak Ada</span>
                  </label>
                </div>
              </div>
              <div class="form-group ">
    <label>Ban Depan<span class="text-danger">*</span></label>
    <select class="form-control" name="kondisi_ban_depan" >
        <option value="" selected disabled hidden>Pilih Kondisi</option>
        <!-- Menambahkan pilihan tahun dengan kelipatan 10% dari 0% hingga 100% -->
        <?php
            for ($percent = 0; $percent <= 100; $percent += 10) {
                echo "<option value='$percent'>$percent%</option>";
            }
        ?>
    </select>
    <div class="invalid-feedback">
       Pilih kondisi Ban Depan!
    </div>
</div>
              <div class="form-group ">
    <label>Ban Belakang<span class="text-danger">*</span></label>
    <select class="form-control" name="kondisi_ban_belakang" >
        <option value="" selected disabled hidden>Pilih Kondisi</option>
        <!-- Menambahkan pilihan tahun dengan kelipatan 10% dari 0% hingga 100% -->
        <?php
            for ($percent = 0; $percent <= 100; $percent += 10) {
                echo "<option value='$percent'>$percent%</option>";
            }
        ?>
    </select>
    <div class="invalid-feedback">
       Pilih kondisi Ban Belakang!
    </div>
</div>
    


              <div class="form-group">
                <label class="form-label">Mesin</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_mesin" value="Baik" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Baik</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_mesin" value="Sedang" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Sedang</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_mesin" value="Kurang" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Kurang</span>
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Bagian Dalam Mobil</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_dalam_mobil" value="Baik" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Baik</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_dalam_mobil" value="Sedang" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Sedang</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_dalam_mobil" value="Kurang" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Kurang</span>
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Jok Depan & Dashboard</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_jok_dashboard" value="Baik" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Baik</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_jok_dashboard" value="Sedang" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Sedang</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_jok_dashboard" value="Kurang" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Kurang</span>
                  </label>
                </div>
              </div>
              <div class="form-group">
                  <label>Aksesoris Khusus<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="kondisi_aksesoris_khusus" placeholder="Aksesoris Khusus Kendaraan" required="">
                  <div class="invalid-feedback">
                    Masukan Aksesoris Khusus Kendaraan!
                  </div>
                </div>  
              </div>
              </div>

          <div class="card card-primary">
            <div class="card-header">
              <h4>Detail Kredit</h4>
            </div>
            <div class="card-body">
          

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