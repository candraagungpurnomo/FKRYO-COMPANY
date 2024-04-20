<!DOCTYPE html>
<html lang="en">
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
                            <h1 class="h3 mb-0 text-gray-800">Book</h1>
                        </div>
                        <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2" data-toggle="modal" data-target="#tambahMenuModal"><i class="fa-solid fa-plus text-white-50"></i><small>Tambah</small></a>
                       <hr>
                        <?php if ($this->session->flashdata('message')) {
                            echo '<p class="warning" style="margin: 10px 20px;">' . $this->session->flashdata('message') . '</p>';
                        } ?>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table  table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-dark">
                                            <tr>
                                                <th width="20px">No</th>
                                                <th>NAMA</th>
                                                <th>ISBN</th>
                                                <th>KATEGORY</th>
                                                <th>AUTHOR</th>
                                                <th>STATUS</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($buku as $b) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $b['nama'] ?></td>
                                                    <td><?= $b['isbn'] ?></td>
                                                    <td><?= $b['kategory'] ?></td>
                                                    <td><?= $b['author'] ?></td>
                                                    <td class="text-light">
                                                        <?php
                                                        if ($b['status'] == 0) {
                                                            echo '<span class="badge bg-secondary">Disabled</span>';
                                                        } else if ($b['status'] == 1) {
                                                            echo '<span class="badge bg-success">Enabled</span>';
                                                        } else {
                                                            echo '<span class="badge bg-dark">#</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#editMenuModal<?= $b['buku_id'] ?>"><i class="fa-solid fa-circle-info"></i><small>Edit</small></a>
                                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletepesertaModal<?= $b['buku_id'] ?>"><i class="fas fa-trash-can"></i><small>Hapus</small></a>
                                                        <div class="modal fade" id="deletepesertaModal<?= $b['buku_id'] ?>" tabindex="-1" aria-labelledby="deletepesertaModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-white">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title font-weight-bold" id="deletepesertaModalLabel">Hapus Category</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5>Yakin ingin menghapus Category dengan Nama "<?= $b['nama'] ?>" ?</h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        <a href="<?= base_url() ?>buku/deletebuku/<?= $b['buku_id']; ?>" class="btn btn-danger">Ya</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Edit Menu Modal -->
                                                        <div class="modal fade" id="editMenuModal<?= $b['buku_id'] ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content bg-default">
                                                                    <div class="modal-header ">
                                                                        <h5 class="modal-title font-weight-bold" id="editOrderModal">Detail Pemenang Lelang</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body font-weight-bold text-dark">
                                                                    <form action="<?= base_url('buku/edit/' . $b['buku_id']) ?>" method="POST">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <label for="basic-url">ID Kategori </label>
                                                                                    <div class="input-group mb-3">
                                                                                        <input type="text" class="form-control" name="buku_id" id="buku_id" value="<?= $b['buku_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                    </div>
                                                                                    <label for="basic-url">Nama</label><br>
                                                                                    <div class="input-group mb-1">
                                                                                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $b['nama'] ?>" aria-describedby="basic-addon3">
                                                                                    </div><br>

                                                                                    <label for="basic-url">ISBN</label><br>
                                                                                    <div class="input-group mb-1">
                                                                                        <input type="text" class="form-control" name="isbn" id="isbn" value="<?= $b['isbn'] ?>" aria-describedby="basic-addon3">
                                                                                    </div><br>

                                                                                    <label for="basic-url">KATEGORY</label><br>
                                                                                    <div class="input-group mb-1">
                                                                                        <input type="text" class="form-control" name="kategory" id="kategory" value="<?= $b['kategory'] ?>" aria-describedby="basic-addon3">
                                                                                    </div><br>

                                                                                    <label for="basic-url">AUTHOR</label><br>
                                                                                    <div class="input-group mb-1">
                                                                                        <input type="text" class="form-control" name="author" id="author" value="<?= $b['author'] ?>" aria-describedby="basic-addon3">
                                                                                    </div><br>
                                                                                    <label for="basic-url" class=" text-dark">Status</label><br>
                                                                                        <div class="input-group mb-3">
                                                                                            <form action="<?= base_url('buku/edit/' . $b['buku_id']) ?>" method="POST">
                                                                                                <select class="custom-select" name="status" id="status">
                                                                                                    <option value="<?= $b['status'] ?>">
                                                                                                        <?php if ($b['status'] == "1") {
                                                                                                            echo "Enabled";
                                                                                                        } else if ($b['status'] == "0") {
                                                                                                            echo "Disabled";
                                                                                                        } else {
                                                                                                            echo "Belum Diisi";
                                                                                                        } ?>
                                                                                                    </option>
                                                                                                    <option value="0">Disabled</option>
                                                                                                    <option value="1">Enabled</option>
                                                                                                </select>
                                                                                        </div>
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
                                                    </td>
                                                    <div class="modal fade" id="tambahMenuModal" tabindex="-1" aria-labelledby="tambahOrderModal" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content bg-default">
                                                                    <div class="modal-header ">
                                                                        <h5 class="modal-title font-weight-bold" id="tambahOrderModal">Tambah Buku</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body font-weight-bold text-dark">
                                                                        <form action="<?php echo base_url(); ?>buku/tambah" method="post" class="form-horizontal">
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
                                                                                                <label class="col-sm-2 control-label">ISBN</label>
                                                                                                <div class="col-sm-10">
                                                                                                    <input type="text" name="isbn" id="isbn" class="form-control" placeholder="ISBN">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-2 control-label">Kategori</label>
                                                                                                <div class="col-sm-10">
                                                                                                    <input type="text" name="kategory" id="kategory" class="form-control" placeholder="Kategori">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label class="col-sm-2 control-label">Author</label>
                                                                                                <div class="col-sm-10">
                                                                                                    <input type="text" name="author" id="author" class="form-control" placeholder="Author">
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