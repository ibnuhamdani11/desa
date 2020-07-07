<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Surat Keterangan Domisili Perusahaan</h6>
            </div>
            <div class="card-body">
              <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#modalAdd">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data</span>
              </a>
              <br><br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Domisili</th>
                      <th>Desa</th>
                      <th>Kecamatan</th>
                      <th>Kabupaten</th>
                      <th>Pembuat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                          foreach ($data_domisili_lembaga as $data_domisili_lembaga1) {?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $data_domisili_lembaga1->name_lembaga ?></td>
                      <td><?= $data_domisili_lembaga1->domisili ?></td>
                      <td><?= $data_domisili_lembaga1->desa ?></td>
                      <td><?= $data_domisili_lembaga1->kecamatan ?></td>
                      <td><?= $data_domisili_lembaga1->kabupaten ?></td>
                      <td><?= $data_domisili_lembaga1->created_by ?></td>
                      <td>
                        <a href="<?=base_url();?>admin/suket/domisili_perusahaan/cetak?val=<?=$data_domisili_lembaga1->id?>" class="btn btn-success btn-circle btn-sm" >
                          <i class="fas fa-print"></i>
                        </a>
                        <a href="<?=base_url();?>admin/suket/domisili_perusahaan/?action=edit&val=<?=$data_domisili_lembaga1->id?>" class="btn btn-info btn-circle btn-sm" >
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?=base_url();?>admin/suket/domisili_perusahaan/hapus?val=<?=$data_domisili_lembaga1->id?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure to delete this data');">
                          <i class="fas fa-trash"></i>                          
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

    <!-- Modal Large class = 'bd-example-modal-lg and modal-lg' small ='bd-example-modal-sm and modal-sm'-->
      <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <form method="POST" action="<?= base_url('/admin/suket/domisili_perusahaan/aksi_simpan')?>">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Surat Domisili Perusahaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Nama Perusahaan/ Organisasi</label>
                      <input type="text" class="form-control" placeholder="Masukan nama" name="name" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Domisili</label>
                      <input type="text" class="form-control" placeholder="Masukan domisili" name="domisili" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Desa</label>
                      <input type="text" class="form-control" placeholder="Masukan desa" name="desa" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Kecamatan</label>
                      <input type="text" class="form-control" placeholder="Masukan kecamatan" name="kecamatan" required>                    
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Kabupaten</label>
                      <input type="text" class="form-control" placeholder="Masukan kabupaten" name="kabupaten" required>                    
                    </div>
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <!-- akhir modal -->



    <!-- Modal Large class = 'bd-example-modal-lg and modal-lg' small ='bd-example-modal-sm and modal-sm'-->
    <?php  
    if(isset($_GET['action'])){
        switch ($_GET['action']){
            
            case "edit":
            // echo "";
            ?>
      <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <form method="POST" action="<?= base_url('/admin/suket/domisili_perusahaan/aksi_edit')?>">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Surat Domisili Perusahaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Nama Perusahaan/ Organisasi</label>
                      <input type="text" hidden class="form-control" value="<?= $data_edit->id?>" name="id" required>
                      <input type="text" class="form-control" value="<?= $data_edit->name_lembaga?>" name="name" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Domisili</label>
                      <input type="text" class="form-control" value="<?= $data_edit->domisili?>" name="domisili" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Desa</label>
                      <input type="text" class="form-control" value="<?= $data_edit->desa?>" name="desa" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Kecamatan</label>
                      <input type="text" class="form-control" value="<?= $data_edit->kecamatan?>" name="kecamatan" required>                    
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Kabupaten</label>
                      <input type="text" class="form-control" value="<?= $data_edit->kabupaten?>" name="kabupaten" required>                    
                    </div>
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <!-- akhir modal -->
        <script type='text/javascript'>
            $(document).ready(function(){
              console.log("test")
                $('#modalEdit').modal('show');
            });
        </script>
        <?php
        break;
    }
}


?>