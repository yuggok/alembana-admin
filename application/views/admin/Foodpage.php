<div class="container">
    <div class="row">
        <h3> Master Data Foods</h3>
    </div>
    <?php if ($this->session->flashdata('hasil')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('hasil'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            </div>

        </div>
    <?php endif; ?>
    <div class="row">
        <a style="margin-bottom: 10px " href="#" class="btn btn-success" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus"></i> Tambah Data</a>

        <table class="table table-hover table-stripped">
            <thead>
                <tr>
                    <td>Nama</td>
                    <td>Type</td>
                    <td>Foto</td>
                    <td>Harga</td>
                    <td>Action</td>
                </tr>
            </thead>
            <?php foreach ((array)$food as $f) : ?>
                <tr>
                    <td><?= $f["name"]; ?></td>
                    <td><?= $f['type']; ?></td>
                    <td><img src="<?= isset($f['filePath']) ? $f['filePath'] : 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/600px-No_image_available.svg.png'; ?>" width="100px"/></td>
                    <td><?= $f['price']; ?></td>
                    <td><a href="<?php base_url(); ?>Food/deleteData/<?= $f['foodId']; ?>" class="badge badge-danger" onclick="return confirm('Anda Akan Menghapus Data Ini ?');"> Hapus </a>
                        <a href="#" data-target="#editModal<?= $f['foodId']; ?>" data-toggle="modal" class="badge badge-warning">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<div id="AddModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-tittle">
                    <h1 align="center">Tambah Data Foods</h1>
                </div>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Food/addData" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama </label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Makanan">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" id="type" placeholder="Masukkan Type Makanan">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Masukkan Harga">
                    </div>
                    <div class="form-group">
                        <label">Pilih Foto Makanan</label>
                            <input type="file" class="form-control-file" name="file" id="file">
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
<?php foreach ((array)$food as $f) : ?>
    <div id="editModal<?= $f['foodId']; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-tittle">
                        <h1 align="center">Edit Data Foods</h1>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>Food/editData" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" name="id" id="id" value="<?= $f['foodId']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control" value="<?= $f['name']; ?>" name="name" id="name" placeholder="Masukkan Nama Makanan">
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" class="form-control" value="<?= $f['type']; ?>" name="type" id="type" placeholder="Masukkan Type Makanan">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" value="<?= $f['price']; ?>" name="price" id="price" placeholder="Masukkan Harga">
                        </div>
                        <input type="hidden" value="<?= isset($f['filePath']) ? $f['filePath'] : ''; ?>" name="filePath" id="filePath">
                        <div class="form-group">
                            <label">Pilih Foto Makanan</label>
                                <input type="file" class="form-control-file" name="file" id="file">
                        </div>
                        <input type="submit" name="submit" value="submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>