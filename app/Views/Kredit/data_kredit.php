  <?= $this->include('Layout/Header'); ?>
  <!-- Main Content -->
  <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>Analisis Kredit Konsumtif</h1>
              <a href="<?= site_url() ?>/analisa/add" class="btn btn-primary ml-auto">Tambah Data Analisa Kredit</a>
          </div>

          <div class="card">
              <div class="card-body">
                  <table id="myTable" class="table table-bordered table-md">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Nama Pemohon</th>
                              <th>Alamat</th>
                              <th class="text-center">Action</th>
            
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1; ?>
                          <?php foreach ($listKredit as $row) : ?>
                              <tr>
                                  <td><?= $no++; ?></td>
                                  <td><?= $row['nama_pemohon']; ?></td>
                                  <td><?= $row['alamat']; ?></td>
                                  
                      <td class="text-center">
                                 <a href="<?= site_url('/analisa/laporan/' . $row['id']) ?>" class="btn btn-icon btn-primary"><i class="far fa-file"></i></a>
                                 <a href="<?= site_url('/analisa/detail/' . $row['id']) ?>" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                                 <a href="<?= site_url('/analisa/delete/' . $row['id']); ?>" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                </td>
                              </tr>
                          <?php endforeach; ?>


                      </tbody>
                  </table>
              </div>
          </div>

      </section>
  </div>
  <?= $this->include('Layout/Footer'); ?>