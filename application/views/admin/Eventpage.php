<div class="container">
    <div class="row">
        <h3> Kelola Data Event </h3>
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
                    <td>Nomor</td>
                    <td>Gambar</td>
                    <td>Deskripsi Event</td>
                    <td>Action</td>
                </tr>
            </thead>
            <!-- <?php foreach ((array)$meja as $t) : ?>
                <tr>
                    <td><?= $t['numberOfTable']; ?></td>
                    <td><?= $t['type']; ?></td>
                    <td><?= $t['manyOfSeats']; ?></td>
                    <!-- <td><?= $t['avalaibleTime']; ?></td> -->
            <td><a href="<?php base_url(); ?>Table/deleteData/<?= $t['tableId']; ?>" class="badge badge-danger" onclick="return confirm('Anda Akan Menghapus Data Ini ?');"> Hapus </a>
                <a href="#" data-target="#editModal<?= $t['tableId']; ?>" data-toggle="modal" class="badge badge-warning">Edit</a>
            </td>
            </tr>
        <?php endforeach; ?> -->
        </table>
    </div>
</div>
<div id="AddModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-tittle">
                    <h1 align="center">Tambah Data Event</h1>
                </div>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Food" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label">Pilih Foto Event</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="textarea" class="form-control" name="type" id="type" placeholder="Masukkan Deskripsi">
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
<div id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-tittle">
                    <h1 align="center">Tambah Data Event</h1>
                </div>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Food" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label">Pilih Foto Event</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="textarea" class="form-control" name="type" id="type" placeholder="Masukkan Deskripsi">
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>