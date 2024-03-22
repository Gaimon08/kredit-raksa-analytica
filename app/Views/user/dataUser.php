<?=$this->include('Layout/Header');?>
                       <!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Analisis Kredit Konsumtif</h1>
          </div>
          <form action="hello" method="post" class="needs-validation" novalidate=""> 
          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Data User</h4>
                    <div class="card-header-action">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                  <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Jenis Kelamin</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                        $htmlData=null;
                        $nomor=null;
                        ?>
                        <?php foreach ($ListUser as $row): ?>
                          <?php $nomor++; ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['username']; ?></td>
                            <td><?= $row['level']; ?></td>
                            <td><?= $row['jenis_kelamin']; ?></td>
                            <td><a href="<?= site_url('/user/edit/' . $row['admin_id']) ?>" class="btn btn-info"><i class="fas fa-pen"></i></a>
                            <a href="<?= site_url('/user/hapus/' . $row['admin_id']) ?>" class="btn btn-danger" ><i class="fas fa-trash"></i></a>

                        </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                </div>
              </form>
                
          
    </section>  
</div>      
<?=$this->include('Layout/Footer');?>
                                       
                                        