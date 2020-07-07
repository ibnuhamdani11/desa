<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
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
                      <th>username</th>
                      <th>No HP</th>
                      <th>Jenis Kelamin</th>
                      <th>Foto</th>
                      <th>Pembuat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                          foreach ($data_pengguna as $data_pengguna1) {?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $data_pengguna1->username ?></td>
                      <td><?= $data_pengguna1->phone_number ?></td>
                      <td><?= $data_pengguna1->gender ?></td>
                      <td><?= $data_pengguna1->photo ?></td>
                      <td><?= $data_pengguna1->created_by ?></td>
                      <td>
                        <a href="<?=base_url();?>admin/pengguna/cetakid?val=<?=$data_pengguna1->id?>" class="btn btn-success btn-circle btn-sm" >
                          <i class="fas fa-print"></i>
                        </a>
                        <a href="<?=base_url();?>admin/pengguna/?action=edit&val=<?=$data_pengguna1->id?>" class="btn btn-info btn-circle btn-sm" >
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?=base_url();?>admin/pengguna/hapus?val=<?=$data_pengguna1->id?>&&image=<?= $data_pengguna1->photo?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure to delete this data');">
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
            <form method="POST" enctype="multipart/form-data" action="<?= base_url('/admin/pengguna/aksi_simpan')?>">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Username</label>
                      <input type="text" class="form-control" placeholder="Masukan username" name="username" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>No Handphone</label>
                      <input type="text" class="form-control" placeholder="Masukan no handphone" name="phone_number" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Jenis Kelamin</label>
                      <select class="browser-default custom-select" name="gender">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Level</label>
                      <select class="browser-default custom-select" name="level">
                        <option selected>Pilih Level</option>
                        <?php foreach ($data_level as $level) {?>
                        <option value="<?= $level->id?>"><?= $level->name?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Password</label>
                      <input type="password" class="form-control" placeholder="Masukan password" name="password" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Ulangi Password</label>
                      <input type="password" class="form-control" placeholder="Masukan ulangi password kategori" name="ulangi_password" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Upload Foto</label>
                      <br>
                      <input type="file" name="photo" required>                      
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
      <div class="modal fade " id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
          <div class="modal-content">
            <form method="POST" action="<?= base_url('admin/pengguna/aksi_edit')?>">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                  <div class="form-row">
                    <input type="text" hidden class="form-control" value="<?=$data_edit->id?>" name="id">
                    <div class="form-group col-md-12">
                      <label>Kategori</label>
                      <input type="text" class="form-control" value="<?=$data_edit->category?>" name="kategori">
                    </div>
                    <div class="form-group col-md-12">
                      <label >Keterangan</label>
                      <input type="text" class="form-control" value="<?=$data_edit->desc?>" name="keterangan">
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