  <?= $this->include('Layout/Header'); ?>
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Analisis Kredit Konsumtif</h1>
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
                  <p><strong class="text-primary"><?= $listKredit['kantor']; ?></strong></p>
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
                    <p><strong class="text-primary"><?= $listKredit['nama_pemohon']; ?></strong></p>
                    <div class="invalid-feedback">
                      Masukan nama Pemohon!
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="tempat_lahir">Tempat Lahir<span class="text-danger">*</span></label>
                    <p><strong class="text-primary"><?= $listKredit['tempat_lahir']; ?></strong></p>
                    <div class="invalid-feedback">
                      Masukan tempat lahir pemohon!
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="tanggal_lahir">Tanggal Lahir<span class="text-danger">*</span></label>
                    <p><strong class="text-primary"><?= $listKredit['tanggal_lahir']; ?></strong></p>
                    <div class="invalid-feedback">
                      Masukan tanggal lahir pemohon!
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama_penjamin">Nama Penjamin<span class="text-danger">*</span></label>
                  <p><strong class="text-primary"><?= $listKredit['nama_penjamin']; ?></strong></p>
                  <div class="invalid-feedback">
                    Masukan nama Penjamin!
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat<span class="text-danger">*</span></label>
                  <p><strong class="text-primary"><?= $listKredit['alamat']; ?></strong></p>
                  <div class="invalid-feedback">
                    Masukan alamat lengkap pemohon!
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="pendidikan">Pendidikan Terakhir<span class="text-danger">*</span></label>
                    <p><strong class="text-primary"><?= $listKredit['pendidikan_terakhir']; ?></strong></p>
                    <div class="invalid-feedback">
                      Pilih pendidikan terakhir pemohon!
                    </div>
                  </div>


                  <div class="form-group col-md-6">
                    <label for="tahun_lulus">Tahun Lulus<span class="text-danger">*</span></label>
                    <p><strong class="text-primary"><?= $listKredit['tahun_lulus']; ?></strong></p>
                    <div class="invalid-feedback">
                      Masukan tahun lulus pemohon!
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Status Keluarga<span class="text-danger">*</span></label>
                    <p><strong class="text-primary"><?= $listKredit['status_perkawinan']; ?></strong></p>
                    <div class="invalid-feedback">
                      Pilih status keluarga pemohon!
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="jml_tanggungan">Jumlah Tanggungan<span class="text-danger">*</span></label>
                    <p><strong class="text-primary"><?= $listKredit['jumlah_tanggungan']; ?></strong></p>
                    <div class="invalid-feedback">
                      Masukan jumlah tanggungan pemohon!
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="pekerjaan">Pekerjaan<span class="text-danger">*</span></label>
                    <p><strong class="text-primary"><?= $listKredit['pekerjaan_instansi']; ?></strong></p>
                    <div class="invalid-feedback">
                      Masukan pekerjaan pemohon!
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Gaji & Tunjangan Perbulan<span class="text-danger">*</span></label>
                    <p><strong class="text-primary">Rp <?= number_format($listKredit['gaji_dan_tunjangan'], 0, ',', '.'); ?></strong></p>
                    <div class="invalid-feedback">
                      Masukan gaji & tunjangan pemohon!
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Pendapatan Lainnya<span class="text-success">*</span></label>
                  <button class="btn btn-outline-secondary form-control" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Pendapatan Lainnya</button>
                </div>

                <div class="collapse" id="collapseExample">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="pendapatan_lain1">Sumber Pendapatan Lainya 1<span class="text-success">*</span></label>
                      <p><strong class="text-primary"><?= $listKredit['sumber_pendapatan_lain_1']; ?></strong></p>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Nominal Pendapatan Lain 1<span class="text-success">*</span></label>
                      <div class="input-group">
                        <p><strong class="text-primary">Rp <?= number_format($listKredit['nominal_pendapatan_lain_1'], 0, ',', '.'); ?></strong></p>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="pendapatan_lain2">Sumber Pendapatan Lainya 2<span class="text-success">*</span></label>
                      <p><strong class="text-primary"><?= $listKredit['sumber_pendapatan_lain_2']; ?></strong></p>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Nominal Pendapatan Lain 2<span class="text-success">*</span></label>
                      <div class="input-group">
                        <p><strong class="text-primary">Rp <?= number_format($listKredit['nominal_pendapatan_lain_2'], 0, ',', '.'); ?></strong></p>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="pendapatan_lain3">Sumber Pendapatan Lainya 3<span class="text-success">*</span></label>
                      <p><strong class="text-primary"><?= $listKredit['sumber_pendapatan_lain_3']; ?></strong></p>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Nominal Pendapatan Lain 3<span class="text-success">*</span></label>
                      <div class="input-group">
                        <p><strong class="text-primary">Rp <?= number_format($listKredit['nominal_pendapatan_lain_3'], 0, ',', '.'); ?></strong></p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Biaya Hidup Perbulan<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <p><strong class="text-primary">Rp <?= number_format($listKredit['biaya_hidup_perbulan'], 0, ',', '.'); ?></strong></p>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Biaya Pendidikan Anak<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <p><strong class="text-primary">Rp <?= number_format($listKredit['biaya_pendidikan_anak'], 0, ',', '.'); ?></strong></p>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Biaya Listrik, Air, dan Telepon<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <p><strong class="text-primary">Rp <?= number_format($listKredit['biaya_listrik_dan_telp'], 0, ',', '.'); ?></strong></p>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Biaya Lainnya<span class="text-success">*</span></label>
                    <div class="input-group">
                      <p><strong class="text-primary">Rp <?= number_format($listKredit['biaya_lain'], 0, ',', '.'); ?></strong></p>
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
                      <p><strong class="text-primary"><?= $listKredit['nama_bank_lain_1']; ?></strong></p>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Nominal Angsuran 1<span class="text-success">*</span></label>
                      <div class="input-group">
                        <p><strong class="text-primary">Rp <?= number_format($listKredit['nominal_angsuran_1'], 0, ',', '.'); ?></strong></p>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="pendapatan_lain2">Nama Bank Lain 2<span class="text-success">*</span></label>
                      <p><strong class="text-primary"><?= $listKredit['nama_bank_lain_2']; ?></strong></p>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Nominal Angsuran 2<span class="text-success">*</span></label>
                      <div class="input-group">
                        <p><strong class="text-primary">Rp <?= number_format($listKredit['nominal_angsuran_2'], 0, ',', '.'); ?></strong></p>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="pendapatan_lain3">Nama Bank Lain 3<span class="text-success">*</span></label>
                      <p><strong class="text-primary"><?= $listKredit['nama_bank_lain_3']; ?></strong></p>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Nominal Angsuran 3<span class="text-success">*</span></label>
                      <div class="input-group">
                        <p><strong class="text-primary">Rp <?= number_format($listKredit['nominal_angsuran_3'], 0, ',', '.'); ?></strong></p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-lg-4">
                    <label>Total Pendapatan<span class="text-success">*</span></label>
                    <div class="input-group">
                      <p><strong class="text-primary">Rp <?= number_format($listKredit['total_jumlah_pendapatan'], 0, ',', '.'); ?></strong></p>
                    </div>
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Total Jumlah Pengeluaran<span class="text-success">*</span></label>
                    <div class="input-group">
                      <p><strong class="text-primary">Rp <?= number_format($listKredit['total_jumlah_pengeluaran'], 0, ',', '.'); ?></strong></p>
                    </div>
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Sisa Pendapatan Perbulan<span class="text-success">*</span></label>
                    <div class="input-group">
                      <p><strong class="text-primary">Rp <?= number_format($listKredit['sisa_pendapatan_perbulan'], 0, ',', '.'); ?></strong></p>
                    </div>
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
                  <p><strong class="text-primary"><?= $listKredit['lokasi_usaha']; ?></strong></p>
                  <div class="invalid-feedback">
                    Masukan Lokasi Usaha Pemohon!
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label">Kondisi Lokasi Usaha<span class="text-danger">*</span></label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="kondisi_lokasi_usaha" value="Layak" class="selectgroup-input" <?= ($listKredit['kondisi_lokasi_usaha'] == 'Layak') ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Layak</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="kondisi_lokasi_usaha" value="Tidak" class="selectgroup-input" <?= ($listKredit['kondisi_lokasi_usaha'] == 'Tidak') ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Tidak</span>
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="form-label">Akses Lokasi Usaha</label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="akses_lokasi" value="Mudah" class="selectgroup-input" <?= ($listKredit['akses_lokasi'] == 'Mudah') ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Mudah</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="akses_lokasi" value="Sulit" class="selectgroup-input" <?= ($listKredit['akses_lokasi'] == 'Sulit') ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Sulit</span>
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label>Tanggal Kunjungan<span class="text-danger">*</span></label>
                  <p><strong class="text-primary"><?= $listKredit['tanggal_kunjungan']; ?></strong></p>
                  <div class="invalid-feedback">
                    Masukan Tanggal Kunjungan!
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Yang Mengunjungi 1<span class="text-danger">*</span></label>
                    <p><strong class="text-primary"><?= $listKredit['yang_mengunjungi_1']; ?></strong></p>
                    <div class="invalid-feedback">
                      Masukan Yang Mengunjungi!
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="alamat">Yang Mengunjungi 2<span class="text-success">*</span></label>
                    <p><strong class="text-primary"><?= $listKredit['yang_mengunjungi_2']; ?></strong></p>
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
                  <p><strong class="text-primary"></strong></p>
                  <div class="invalid-feedback">
                    Pilih Jenis Kredit!
                  </div>
                </div>
                <div class="form-group">
                  <label>Nominal Permohonan<span class="text-danger">*</span></label>
                  <div class="input-group">
                    <p><strong class="text-primary">Rp <?= number_format($listKredit['nilai_permohonan_kredit'], 0, ',', '.'); ?></strong></p>
                  </div>
                </div>
                <div class="form-group">
                  <label>Bentuk Kredit<span class="text-danger">*</span></label>
                  <p><strong class="text-primary"><?= $listKredit['bentuk_kredit']; ?></strong></p>
                </div>
                <div class="form-group">
                  <label>Jangka Waktu<span class="text-danger">*</span></label>
                  <p><strong class="text-primary"><?= $listKredit['jangka_waktu']; ?> Bulan</strong></p>
                </div>
                <div class="form-group">
                  <label>Suku Bunga Pertahun<span class="text-danger">*</span></label>
                  <div class="input-group">
                    <p><strong class="text-primary"><?= $listKredit['suku_bunga_per_tahun']; ?> %</strong></p>
                  </div>
                </div>
                <div class="form-group">
                  <label>Angsuran Perbulan<span class="text-danger">*</span></label>
                  <div class="input-group">
                    <p><strong class="text-primary">Rp <?= number_format($listKredit['angsuran_perbulan'], 0, ',', '.'); ?></strong></p>
                  </div>
                </div>
                <div class="form-group">
                  <label>Tujuan Permohonan Kredit</label>
                  <p><strong class="text-primary"><?= $listKredit['tujuan_kredit_1']; ?></strong></p>
                </div>
                <div class="form-group">
                  <label>Tujuan Permohonan Kredit</label>
                  <p><strong class="text-primary"><?= $listKredit['tujuan_kredit_2']; ?></strong></p>
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
                  <p><strong class="text-primary"><?= $listKredit['agunan_jenis_jaminan']; ?></strong></p>
                </div>
                <div class="form-group">
                  <label>Bukti Kepemilikian<span class="text-danger">*</span></label>
                  <p><strong class="text-primary"><?= $listKredit['agunan_bukti_kepemilikan']; ?></strong></p>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Harga Pasar<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <p><strong class="text-primary">Rp <?= number_format($listKredit['agunan_harga_pasar'], 0, ',', '.'); ?></strong></p>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Transaksi Bank<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <p><strong class="text-primary">Rp <?= number_format($listKredit['agunan_transaksi_bank'], 0, ',', '.'); ?></strong></p>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Nilai Likuidasi<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <p><strong class="text-primary">Rp <?= number_format($listKredit['agunan_nilai_likuidasi'], 0, ',', '.'); ?></strong></p>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Atas Nama<span class="text-danger">*</span></label>
                  <p><strong class="text-primary"><?= $listKredit['agunan_atas_nama']; ?></strong></p>
                </div>
                <div class="form-group">
                  <label class="form-label">Nilai Likuidasi Dapat Mengcover?</label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" value="Ya" class="selectgroup-input" <?= ($listKredit['agunan_nilai_likuidasi_mencover'] == 'Ya') ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Ya</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" value="Tidak" class="selectgroup-input" <?= ($listKredit['agunan_nilai_likuidasi_mencover'] == 'Tidak') ? 'checked' : '' ?>>
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
                      <input type="radio" name="" value="Sudah" class="selectgroup-input" <?= ($listKredit['hubungan_bpr'] == 'Sudah') ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Sudah</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" value="Belum" class="selectgroup-input" <?= ($listKredit['hubungan_bpr'] == 'Belum') ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Belum</span>
                    </label>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="jumlah_pinjaman_bpr">Sebagai Nasabah Peminjam<span class="text-danger">*</span></label>
                    <p><strong class="text-primary"><?= $listKredit['hubungan_pinjaman']; ?> Kali</strong></p>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Pinjman Terakhir Sebesar<span class="text-success">*</span></label>
                    <div class="input-group">
                      <p><strong class="text-primary">Rp <?= number_format($listKredit['hubungan_nilai_pinjaman_terakhir'], 0, ',', '.'); ?></strong></p>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label">Kolektibilitas<span class="text-danger">*</span></label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="" value="Lancar" class="selectgroup-input" <?= ($listKredit['hubungan_kolektibilitas'] == 'Lancar') ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Lancar</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" value="Tidak" class="selectgroup-input" <?= ($listKredit['hubungan_kolektibilitas'] == 'Tidak') ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Tidak</span>
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label">Penabung Aktif<span class="text-danger">*</span></label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="" value="Ya" class="selectgroup-input" <?= ($listKredit['hubungan_penabung_aktif'] == 'Ya') ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Aktif </span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="hubungan_penabung_aktif" value="Tidak" class="selectgroup-input" <?= ($listKredit['hubungan_penabung_aktif'] == 'Tidak') ? 'checked' : '' ?>>
                      <span class="selectgroup-button">Tidak</span>
                    </label>
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
                  <p><strong><?= $listKredit['aspek_pertimbangan_positif']; ?></strong></p>
                </div>
                <div class="form-group">
                  <label>Aspek Negatif<span class="text-danger">*</span></label>
                  <p>
                    <strong><?= $listKredit['aspek_pertimbangan_negatif']; ?></strong>
                  </p>
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