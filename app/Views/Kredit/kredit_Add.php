<?= $this->include('Layout/Header'); ?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Analisis Kredit Konsumtif</h1>
      <div class="btn-group mb-3 ml-auto" role="group" aria-label="Basic example">
                      <a class="btn btn-primary" href="<?= site_url() ?>/jaminanBPKB/add">Jaminan BPKB</a>
                      <a class="btn btn-primary"href="<?= site_url() ?>/jaminanSHM/add">Jaminan SHM</a>
                    </div>
      
    </div>
    <div class="tab-content" id="myTabContent2">
      <!-- tab-1 -->
      <div class="tab-pane fade show active" id="form-1" role="tabpanel" aria-labelledby="form-tab1">
        <form action="<?= site_url() ?>/analisa/kredit_post" method="post" class="needs-validation" novalidate="">
          <div class="card card-primary">
            <div class="card-header">
              <h4>Informasi Kantor</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Kantor<span class="text-danger">*</span></label>
                <select class="form-control" name="kantor" required="">
                  <option value="" selected disabled hidden>Pilih kantor RWAP</option>
                  <option value="Kantor Pusat Cilimus">Kantor Pusat Cilimus</option>
                  <option value="Kantor cabang Kuningan">Kantor Cabang Kuningan</option>
                  <option value="Kantor Canbang Luragung">Kantor Cabang Luragung</option>
                </select>
                <div class="invalid-feedback">
                  Pilih kantor RWAP!
                </div>
              </div>
            </div>
          </div>
          <div class="card card-primary">
            <div class="card-header">
              <h4>Data Diri Pemohon</h4>
              <!-- <div class="card-header-action">
                  <a href="#" class="btn btn-primary">
                    View All
                  </a>
                </div> -->
            </div>
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nama">Nama Pemohon<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="nama" name="nama_pemohon" placeholder="Nama Lengkap Pemohon" required="">
                  <div class="invalid-feedback">
                    Masukan nama Pemohon!
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <label for="tempat_lahir">Tempat Lahir<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir Pemohon" required="">
                  <div class="invalid-feedback">
                    Masukan tempat lahir pemohon!
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <label for="tanggal_lahir">Tanggal Lahir<span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir Pemohon" required="" max="<?= date('Y-m-d') ?>">
                  <div class="invalid-feedback">
                    Masukan tanggal lahir pemohon!
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="nama_penjamin">Nama Penjamin<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nama_penjamin" name="nama_penjamin" placeholder="Nama Penjamin" required="">
                <div class="invalid-feedback">
                  Masukan nama Penjamin!
                </div>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Desa, RT/RW, Kelurahan, kecamatan, Kabupaten" required="">
                <div class="invalid-feedback">
                  Masukan alamat lengkap pemohon!
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="pendidikan">Pendidikan Terakhir<span class="text-danger">*</span></label>
                  <select class="form-control" id="pendidikan" name="pendidikan_terakhir" required="">
                    <option value="" selected disabled hidden>Pilih Pendidikan Terakhir</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA/SMK">SMA/SMK</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Sarjana">Sarjana</option>
                    <option value="Magister">Magister</option>
                    <option value="Doktor">Doktor</option>
                  </select>
                  <div class="invalid-feedback">
                    Pilih pendidikan terakhir pemohon!
                  </div>
                </div>
                  <div class="form-group col-md-6">
    <label for="tahun_lulus">Tahun Lulus<span class="text-danger">*</span></label>
    <select class="form-control" id="tahun_lulus" name="tahun_lulus" required="">
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
      Masukkan tahun lulus pemohon!
    </div>
  </div>

              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Status Keluarga<span class="text-danger">*</span></label>
                  <select class="form-control" name="status_perkawinan" required="">
                    <option value="">Status Keluarga Pemohon</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Duda/janda">Duda/janda</option>
                  </select>
                  <div class="invalid-feedback">
                    Pilih status keluarga pemohon!
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="jml_tanggungan">Jumlah Tanggungan<span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="jml_tanggungan" name="jumlah_tanggungan" placeholder="Jumlah Tanggungan" required="">
                  <div class="invalid-feedback">
                    Masukan jumlah tanggungan pemohon!
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="pekerjaan">Pekerjaan<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="pekerjaan" name="pekerjaan_instansi" placeholder="Pekerjaan/Instansi" required="">
                  <div class="invalid-feedback">
                    Masukan pekerjaan pemohon!
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label>Gaji & Tunjangan Perbulan<span class="text-danger">*</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        Rp
                      </div>
                    </div>
                    <input type="text" class="form-control currency" name="gaji_dan_tunjangan" placeholder="Gaji & Tunjangan Pemohon Perbulan" required="">
                    <div class="invalid-feedback">
                      Masukan gaji & tunjangan pemohon!
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Pendapatan Lainnya<span class="text-success">*</span></label>
                <button class="btn btn-outline-secondary form-control" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Pendapatan Lainya</button>
              </div>
              <div class="collapse" id="collapseExample">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="pendapatan_lain1">Sumber Pendapatan Lainya 1<span class="text-success">*</span></label>
                    <input type="text" class="form-control" id="sumber_pendapatan_lain_1" name="sumber_pendapatan_lain_1" placeholder="Sumber Pendapatan Lain 1">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Nominal Pendapatan Lain 1<span class="text-success">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          Rp
                        </div>
                      </div>
                      <input type="text" class="form-control currency" name="nominal_pendapatan_lain_1" placeholder="Nominal Pendapatan Lain 1">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="pendapatan_lain2">Sumber Pendapatan Lainya 2<span class="text-success">*</span></label>
                    <input type="text" class="form-control" id="pendapatan_lain2" name="sumber_pendapatan_lain_2" placeholder="Sumber Pendapatan Lain 2">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Nominal Pendapatan Lain 2<span class="text-success">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          Rp
                        </div>
                      </div>
                      <input type="text" class="form-control currency" name="nominal_pendapatan_lain_2" placeholder="Nominal Pendapatan Lain 2">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="pendapatan_lain3">Sumber Pendapatan Lainya 3<span class="text-success">*</span></label>
                    <input type="text" class="form-control" id="pendapatan_lain_3" name="sumber_pendapatan_lain_3" placeholder="Sumber Pendapatan Lain 3">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Nominal Pendapatan Lain 3<span class="text-success">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          Rp
                        </div>
                      </div>
                      <input type="text" class="form-control currency" name="nominal_pendapatan_lain_3" placeholder="Nominal Pendapatan Lain 3">
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Biaya Hidup Perbulan<span class="text-danger">*</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        Rp
                      </div>
                    </div>
                    <input type="text" class="form-control currency" name="biaya_hidup_perbulan" placeholder="Biaya Hidup Perbulan" required="">
                    <div class="invalid-feedback">
                      Masukan Biaya Hidup Perbulan!
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label>Biaya Pendidikan Anak<span class="text-danger">*</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        Rp
                      </div>
                    </div>
                    <input type="text" class="form-control currency" name="biaya_pendidikan_anak" placeholder="Biaya Pendidikan Anak" required="">
                    <div class="invalid-feedback">
                      Masukan Biaya Pendidikan Anak!
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Biaya Listrik, Air, dan Telepon<span class="text-danger">*</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        Rp
                      </div>
                    </div>
                    <input type="text" class="form-control currency" name="biaya_listrik_dan_telp" placeholder="Biaya Listrik, Air, dan Telepon" required="">
                    <div class="invalid-feedback">
                      Masukan Biaya Listrik, Air, dan Telepon!
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label>Biaya Lainnya<span class="text-success">*</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        Rp
                      </div>
                    </div>
                    <input type="text" class="form-control currency" name="biaya_lain" placeholder="Biaya Lain nya">
                    <div class="invalid-feedback">
                      Masukan Biaya Lainnya!
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Angsuran Bank Lainnya<span class="text-success">*</span></label>
                <button class="btn btn-outline-secondary form-control" type="button" data-toggle="collapse" data-target="#angsuranBankLain" aria-expanded="false" aria-controls="angsuranBankLain">Angsuran Bank Lain</button>
              </div>
              <div class="collapse" id="angsuranBankLain">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="pendapatan_lain1">Nama Bank Lain 1<span class="text-success">*</span></label>
                    <input type="text" class="form-control" name="nama_bank_lain_1" placeholder="Nama Bank Lain 1">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Nominal Angsuran 1<span class="text-success">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          Rp
                        </div>
                      </div>
                      <input type="text" class="form-control currency" name="nominal_angsuran_1" placeholder="Nominal Angsuran 1">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="pendapatan_lain2">Nama Bank Lain 2<span class="text-success">*</span></label>
                    <input type="text" class="form-control" name="nama_bank_lain_2" placeholder="Nama Bank Lain 2">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Nominal Angsuran 2<span class="text-success">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          Rp
                        </div>
                      </div>
                      <input type="text" class="form-control currency" name="nominal_angsuran_2" placeholder="Nominal Angsuran 2">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="pendapatan_lain3">Nama Bank Lain 3<span class="text-success">*</span></label>
                    <input type="text" class="form-control" name="nama_bank_lain_3" placeholder="Nama Bank Lain 3">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Nominal Angsuran 3<span class="text-success">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          Rp
                        </div>
                      </div>
                      <input type="text" class="form-control currency" name="nominal_angsuran_3" placeholder="Nominal Angsuran 3">
                    </div>

                  </div>
                </div>

              </div>
              <div class="form-row">
                <div class="form-group col-lg-4">
                  <label>Total Pendapatan<span class="text-success">*</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        Rp
                      </div>
                    </div>
                    <input type="text" class="form-control" name="total_pendapatan" placeholder="Total Pendapatan" readonly>
                  </div>
                </div>
                <div class="form-group col-lg-4">
                  <label>Total Jumlah Pengeluaran<span class="text-success">*</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        Rp
                      </div>
                    </div>
                    <input type="text" class="form-control" name="total_jumlah_pengeluaran" placeholder="Total Jumlah Pengeluaran" readonly>
                  </div>
                </div>
                <div class="form-group col-lg-4">
                  <label>Sisa Pendapatan Perbulan<span class="text-success">*</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        Rp
                      </div>
                    </div>
                    <input type="text" class="form-control" name="sisa_pendapatan_perbulan" placeholder="Nominal Angsuran 1" readonly>
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
              <h4>Usaha Pemohon</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="alamat">Lokasi Usaha Pemohon<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="lokasi_usaha" name="lokasi_usaha" placeholder="Desa, RT/RW, Kelurahan, kecamatan, Kabupaten" required="">
                <div class="invalid-feedback">
                  Masukan Lokasi Usaha Pemohon!
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Kondisi Lokasi Usaha<span class="text-danger">*</span></label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_lokasi_usaha" value="Baik" class="selectgroup-input">
                    <span class="selectgroup-button">Layak</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="kondisi_lokasi_usaha" value="Buruk" class="selectgroup-input">
                    <span class="selectgroup-button">Tidak</span>
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Akses Lokasi Usaha</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="akses_lokasi" value="Mudah" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Mudah</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="akses_lokasi" value="Sulit" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Sulit</span>
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label>Tanggal Kunjungan<span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="tanggal_kunjungan" placeholder="Tanggal Kunjungan" required="">
                <div class="invalid-feedback">
                  Masukan Tanggal Kunjungan!
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Yang Mengunjungi 1<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="yang_mengunjungi_1" placeholder="Yang Mengunjungi" required="">
                  <div class="invalid-feedback">
                    Masukan Yang Mengunjungi!
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="alamat">Yang Mengunjungi 2<span class="text-success">*</span></label>
                  <input type="text" class="form-control" name="yang_mengunjungi_2" placeholder="Yang Mengunjungi 2">
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
                <label>Jenis Kredit<span class="text-danger">*</span></label>
                <select class="form-control" name="jenis_kredit" required="">
                  <option value="">Pilih Jenis Kredit</option>
                  <option value="kmk">Kredit Modal Kerja</option>
                  <option value="kab">Kredit Angsuran Berjangka</option>
                  <option value="kta">Kredit Tanpa Angunan</option>
                  <option value="kretap">Kredit Penghasilan Tetap</option>
                </select>
                <div class="invalid-feedback">
                  Pilih Jenis Kredit!
                </div>
              </div>
              <div class="form-group">
                <label>Nominal Permohonan<span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      Rp
                    </div>
                  </div>
                  <input type="text" class="form-control currency" name="nilai_permohonan_kredit" id="nilaiPermohonan" placeholder="Jumlah Nominal Promohonan">
                </div>
              </div>
              <div class="form-group">
                <label>Bentuk Kredit<span class="text-danger">*</span></label>
                <select class="form-control" name="bentuk_kredit" required="">
                  <option value="">Pilih Jenis Kredit</option>
                  <option value="Bulanan">Bulanan (Konsumtif)</option>
                </select>
                <div class="invalid-feedback">
                  Pilih Jenis Kredit!
                </div>
              </div>
              <div class="form-group">
                <label>Jangka Waktu<span class="text-danger">*</span></label>
                <select class="form-control" name="jangka_waktu" id="jangkaWaktu" required="">
                  <option value="">Pilih Jenis Kredit</option>
                  <option value="12">12 Bulan</option>
                  <option value="18">18 Bulan</option>
                  <option value="24">24 Bulan</option>
                  <option value="30">30 Bulan</option>
                  <option value="36">36 Bulan</option>
                  <option value="48">48 Bulan</option>
                  <option value="54">54 Bulan</option>
                  <option value="60">60 Bulan</option>
                  <option value="72">72 Bulan</option>
                  <option value="78">78 Bulan</option>
                  <option value="84">84 Bulan</option>
                  <option value="90">90 Bulan</option>
                  <option value="96">96 Bulan</option>
                </select>
                <div class="invalid-feedback">
                  Pilih Jenis Kredit!
                </div>
              </div>
              <div class="form-group">
                <label>Suku Bunga Pertahun<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="text" class="form-control" name="suku_bunga_per_tahun" id="sukuBunga" placeholder="Suku Bunga Kredit Pertahun">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      %
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Angsuran Perbulan<span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      Rp
                    </div>
                  </div>
                  <input type="text" class="form-control currency" name="angsuran_perbulan" id="angsuranPerbulan" placeholder="Angsuran Kredit Perbulan">
                </div>
              </div>
              <div class="form-group">
                <label>Tujuan Permohonan Kredit</label>
                <textarea class="form-control" name="tujuan_kredit_1"></textarea>
              </div>
              <div class="form-group">
                <label>Tujuan Permohonan Kredit</label>
                <textarea class="form-control" name="tujuan_kredit_2"></textarea>
              </div>
            </div>
          </div>

          <div class=" card card-primary">
            <div class="card-header">
              <h4>Jaminan</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Jenis Jaminan<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="agunan_jenis_jaminan" placeholder="Jenis Jaminan" required="">
                <div class="invalid-feedback">
                  Masukan Jenis Jaminan!
                </div>
              </div>
              <div class="form-group">
                <label>Bukti Kepemilikian<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="agunan_bukti_kepemilikan" placeholder="Bukti Kepemilikian Jaminan" required="">
                <div class="invalid-feedback">
                  Masukan Bukti Kepemilikian!
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Harga Pasar<span class="text-danger">*</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        Rp
                      </div>
                    </div>
                    <input type="text" class="form-control currency" name="harga_pasar" id="hargaPasar" placeholder="Harga Pasar Jaminan" oninput="calculateValues()">
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label>Transaksi Bank<span class="text-danger">*</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        Rp
                      </div>
                    </div>
                    <input type="text" class="form-control currency" name="transaksi_bank" id="transaksiBank" placeholder="Transaksi Bank" readonly="">
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label>Nilai Likuidasi<span class="text-danger">*</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        Rp
                      </div>
                    </div>
                    <input type="text" class="form-control currency" name="harga_likuidasi" id="nilaiLikuidasi" placeholder="Nilai Likuidasi Jaminan" readonly="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Atas Nama<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="agunan_atas_nama" placeholder="Jaminan Atas Nama" required="">
                <div class="invalid-feedback">
                  Masukan Jaminan Atas Nama!
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Nilai Likuidasi Dapat Mengcover?</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="agunan_nilai_likuidasi_mencover" value="Ya" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Ya</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="agunan_nilai_likuidasi_mencover" value="Tidak" class="selectgroup-input" required="">
                    <span class="selectgroup-button">Tidak</span>
                  </label>
                </div>
              </div>

            </div>
          </div>

          <div class="card card-primary">
            <div class="card-header">
              <h4>Hubungan Dengan BPR</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label class="form-label">Hubungan Dengan BPR<span class="text-danger">*</span></label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="hubungan_bpr" value="Sudah" class="selectgroup-input" data-toggle="collapse" data-target="#form-hubungan" aria-expanded="false" aria-controls="formHubungan">
                    <span class="selectgroup-button">Sudah</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="hubungan_bpr" value="Belum" class="selectgroup-input">
                    <span class="selectgroup-button">Belum</span>
                  </label>
                </div>
              </div>
              <div class="collapse" id="form-hubungan">
                <input type="text" class="form-control" name="id_pemohon">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="jumlah_pinjaman_bpr">Sebagai Nasabah Peminjam<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="jumlah_pinjaman_bpr" name="hubungan_pinjaman" placeholder="Sebagai Nasabah Peminjam (Berapa Kali)">
                    <div class="invalid-feedback">
                      Masukan jumlah Pinjaman!
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Pinjman Terakhir Sebesar<span class="text-success">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          Rp
                        </div>
                      </div>
                      <input type="text" class="form-control currency" name="hubungan_nilai_pinjaman_terakhir" placeholder="Nominal Pinjaman Terakhir">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label">Kolektibilitas<span class="text-danger">*</span></label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="hubungan_kolektibilitas" value="Lancar" class="selectgroup-input">
                      <span class="selectgroup-button">Lancar</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="hubungan_kolektibilitas" value="Tidak" class="selectgroup-input">
                      <span class="selectgroup-button">Tidak</span>
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label">Penabung Aktif<span class="text-danger">*</span></label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="hubungan_penabung_aktif" value="Ya" class="selectgroup-input">
                      <span class="selectgroup-button">Aktif </span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="hubungan_penabung_aktif" value="Tidak" class="selectgroup-input">
                      <span class="selectgroup-button">Tidak</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card card-primary">
            <div class="card-header">
              <h4>Aspek Pertimbangan</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Aspek Positif<span class="text-danger">*</span></label>
                <textarea class="summernote form-control" name="aspek_pertimbangan_positif"></textarea>
                <div class="invalid-feedback">
                  Masukan Aspek Positif!
                </div>
              </div>
              <div class="form-group">
                <label>Aspek Negatif<span class="text-danger">*</span></label>
                <textarea class="summernote form-control" name="aspek_pertimbangan_negatif"></textarea>
                <div class="invalid-feedback">
                  Masukan Aspek Negatif!
                </div>
              </div>
            </div>
          </div>

          <div class="card card-primary">
            <div class="card-header">
              <h4>Usulan Kredit</h4>
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