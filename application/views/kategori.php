<!DOCTYPE html>
<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <div id="content-wrapper">
                    <?php $this->load->view("admin/_partials/navbar.php") ?>
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
                        </div>
                        <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2" data-toggle="modal" data-target="#tambahMenuModal"><i class="fa-solid fa-plus text-white-50"></i><small>Tambah</small></a>
                        <hr>
                        <div class="modal fade" id="tambahMenuModal" tabindex="-1" aria-labelledby="tambahOrderModal" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content bg-default">
                                    <div class="modal-header ">
                                        <h5 class="modal-title font-weight-bold" id="tambahOrderModal">Tambah Kategori</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <div class="modal-body font-weight-bold text-dark">
                                    <form action="<?php echo base_url(); ?>kategori/tambah" method="post" class="form-horizontal">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Nama</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Deskripsi</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                                                    
                        <?php 
                            if ($this->session->flashdata('message')) {
                            echo '<p class="warning" style="margin: 10px 20px;">' . $this->session->flashdata('message') . '</p>';
                            } 
                        ?>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table  table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-dark">
                                            <tr>
                                                <th width="20px">No</th>
                                                <th>NAMA</th>
                                                <th>DESCRIPTION</th>
                                                <th>STATUS</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($kategori as $k) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $k['nama'] ?></td>
                                                    <td><?= $k['deskripsi'] ?></td>
                                                    <td class="text-light">
                                                        <?php
                                                        if ($k['status'] == 0) {
                                                            echo '<span class="badge bg-secondary">Disabled</span>';
                                                        } else if ($k['status'] == 1) {
                                                            echo '<span class="badge bg-success">Enabled</span>';
                                                        } else {
                                                            echo '<span class="badge bg-dark">#</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#editMenuModal<?= $k['category_id'] ?>"><i class="fa-solid fa-circle-info"></i><small>Edit</small></a>
                                                        <div class="modal fade" id="editMenuModal<?= $k['category_id'] ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content bg-default">
                                                                    <div class="modal-header ">
                                                                        <h5 class="modal-title font-weight-bold" id="editOrderModal">Ubah Kategori</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body font-weight-bold text-dark">
                                                                        <?php 
                                                                        ?>
                                                                    <form action="<?= base_url('kategori/edit/' . $k['category_id']) ?>" method="POST">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <label for="basic-url">ID Kategori </label>
                                                                                    <div class="input-group mb-3">
                                                                                        <input type="text" class="form-control" name="category_id" id="category_id" value="<?= $k['category_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                    </div>
                                                                                    <label for="basic-url">Nama</label><br>
                                                                                    <div class="input-group mb-1">
                                                                                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $k['nama'] ?>" aria-describedby="basic-addon3">
                                                                                    </div><br>
                                                                                    <label for="basic-url">Deskripsi</label><br>
                                                                                    <div class="input-group mb-1">
                                                                                        <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= $k['deskripsi'] ?>" aria-describedby="basic-addon3">
                                                                                    </div><br>
                                                                                    <label for="basic-url">Status</label><br>
                                                                                    <div class="input-group mb-1">
                                                                                        <select class="custom-select" name="status" id="status">
                                                                                            <option value="<?= $k['status'] ?>"><?php
                                                                                                                                                    if ($k['status'] == 0) {
                                                                                                                                                        echo 'Disabled';
                                                                                                                                                    } else if ($k['status'] == 1) {
                                                                                                                                                        echo 'Enabled';
                                                                                                                                                    } else {
                                                                                                                                                        echo 'Belum Diketahui';
                                                                                                                                                    }
                                                                                                                                                    ?></option>
                                                                                            <option value="0">Disabled</option>
                                                                                            <option value="1">Enabled</option>
                                                                                        </select>
                                                                                    </div><br>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletepesertaModal<?= $k['category_id'] ?>"><i class="fas fa-trash-can"></i><small>Hapus</small></a>
                                                        <div class="modal fade" id="deletepesertaModal<?= $k['category_id'] ?>" tabindex="-1" aria-labelledby="deletepesertaModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-white">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title font-weight-bold" id="deletepesertaModalLabel">Hapus Category</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5>Yakin ingin menghapus Category dengan Nama "<?= $k['nama'] ?>" ?</h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        <a href="<?= base_url() ?>kategori/deletekategori/<?= $k['category_id']; ?>" class="btn btn-danger">Ya</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                            
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- End of Main Content -->
                </div>
                <!-- /.content-wrapper -->


            </div>
            <!-- /#wrapper -->

            <!-- Sticky Footer -->
            <?php $this->load->view("admin/_partials/footer.php") ?>
            
        </div>
    </div>
                                        
    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>
</body>
</html>