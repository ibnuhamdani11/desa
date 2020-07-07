<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Surat Keterangan Domisili</h6>
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
                      <th>Tempat, tgl lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Pekerjaan</th>
                      <th>Alamat</th>
                      <th>Pembuat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                          foreach ($data_domisili as $data_domisili1) {?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $data_domisili1->name ?></td>
                      <td><?= $data_domisili1->tempat.", ".$data_domisili1->tanggal_lahir ?></td>
                      <td><?= $data_domisili1->gender == 'L' ? "Laki-laki": "Perempuan"; ?></td>
                      <td><?= $data_domisili1->job ?></td>
                      <td><?= $data_domisili1->address ?></td>
                      <td><?= $data_domisili1->created_by ?></td>
                      <td>
                        <a href="<?=base_url();?>admin/suket/domisili/cetak?val=<?=$data_domisili1->id?>" class="btn btn-success btn-circle btn-sm" >
                          <i class="fas fa-print"></i>
                        </a>
                        <a href="<?=base_url();?>admin/suket/domisili/?action=edit&val=<?=$data_domisili1->id?>" class="btn btn-info btn-circle btn-sm" >
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?=base_url();?>admin/suket/domisili/hapus?val=<?=$data_domisili1->id?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure to delete this data');">
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
      <div class="modal fade bd-example-modal-lg" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <form method="POST" action="<?= base_url('/admin/suket/domisili/aksi_simpan')?>">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Surat Domisili</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Nama</label>
                      <input type="text" class="form-control" placeholder="Masukan nama" name="name" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Jenis Kelamin</label>
                      <select class="browser-default custom-select" name="gender">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Tempat</label>
                      <input type="text" class="form-control" placeholder="Masukan tempat " name="tempat" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Tanggal lahir</label>
                      <input type="text" class="form-control" placeholder="Masukan tanggal lahir" name="tgl_lahir" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Agama</label>
                      <select class="browser-default custom-select" name="religion">
                        <option selected>Pilih Agama</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Konghucu">Konghucu</option>
                        <option value="Kristen">Kristen</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Pekerjaan</label>
                      <input type="text" class="form-control" placeholder="Masukan pekerjaan" name="job" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Alamat</label>
                      <input type="text" class="form-control" placeholder="Masukan alamat" name="address" required>                    
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
      <div class="modal fade bd-example-modal-lg" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <form method="POST" action="<?= base_url('/admin/suket/domisili/aksi_edit')?>">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Surat Domisili</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Nama</label>
                      <input type="text" hidden class="form-control" value="<?= $data_edit->id?>" name="id" required>
                      <input type="text" class="form-control" value="<?= $data_edit->name?>" name="name" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Jenis Kelamin</label>
                      <select class="browser-default custom-select" name="gender">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="L" <?= $data_edit->gender == 'L' ? 'selected' : '';?>>Laki-laki</option>
                        <option value="P" <?= $data_edit->gender == 'P' ? 'selected' : '';?>>Perempuan</option>
                      </select>
                    </div>
                    
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Tempat</label>
                      <input type="text" class="form-control" value="<?= $data_edit->tempat?>" name="tempat" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Tanggal lahir</label>
                      <input type="text" class="form-control" value="<?= $data_edit->tanggal_lahir?>" name="tgl_lahir" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Agama</label>
                      <select class="browser-default custom-select" name="religion">
                        <option selected>Pilih Agama</option>
                        <option value="Buddha" <?= $data_edit->religion == 'Buddha' ? 'selected' : '';?>>Buddha</option>
                        <option value="Hindu" <?= $data_edit->religion == 'Hindu' ? 'selected' : '';?>>Hindu</option>
                        <option value="Islam" <?= $data_edit->religion == 'Islam' ? 'selected' : '';?>>Islam</option>
                        <option value="Katolik" <?= $data_edit->religion == 'Katolik' ? 'selected' : '';?>>Katolik</option>
                        <option value="Konghucu" <?= $data_edit->religion == 'Konghucu' ? 'selected' : '';?>>Konghucu</option>
                        <option value="Kristen" <?= $data_edit->religion == 'Kristen' ? 'selected' : '';?>>Kristen</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Pekerjaan</label>
                      <input type="text" class="form-control" value="<?= $data_edit->job?>" name="job" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Alamat</label>
                      <input type="text" class="form-control" value="<?= $data_edit->address?>" name="address" required>                    
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