<div class="container">
    <div class="row">
        <h3> Master Data Table / Meja</h3>
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
                    <td>Nomor Meja</td>
                    <td>Type</td>
                    <td>Jumlah Kursi</td>
                    <!-- <td>Waktu Tersedia</td> -->
                    <td>Action</td>
                </tr>
            </thead>
            <?php foreach ((array)$meja as $t) : ?>
                <tr>
                    <td><?= $t['numberOfTable']; ?></td>
                    <td><?= $t['type']; ?></td>
                    <td><?= $t['manyOfSeats']; ?></td>
                    <!-- <td><?= $t['avalaibleTime']; ?></td> -->
                    <td><a href="<?php base_url(); ?>Table/deleteData/<?= $t['tableId']; ?>" class="badge badge-danger" onclick="return confirm('Anda Akan Menghapus Data Ini ?');"> Hapus </a>
                        <a href="#" data-target="#editModal<?= $t['tableId']; ?>" data-toggle="modal" class="badge badge-warning">Edit</a>
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
                    <h1 align="center">Tambah Data Table</h1>
                </div>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Table/addData" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nomor Kursi </label>
                        <input type="text" class="form-control" name="numseat" id="numseat" placeholder="Masukkan Nomor Meja">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" id="type" placeholder="Masukkan Type Meja">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Kursi</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah Kursi">
                    </div>
                    <div class="form-group">
                        <label>Waktu Tersedia</label>
                        <input type="text" class="form-control" name="avail" id="avail" placeholder="Masukkan Waktu Tersedianya Meja">
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
<?php foreach ((array)$meja as $d) : ?>
    <div id="editModal<?= $d['tableId']; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-tittle">
                        <h1 align="center">Tambah Data Table</h1>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>Table/editData" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>ID </label>
                            <input type="text" class="form-control" name="id" id="id" value="<?= $d['tableId']; ?>" placeholder="Masukkan Nomor Meja" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nomor Kursi </label>
                            <input type="text" class="form-control" name="numseat" id="numseat" value="<?= $d['numberOfTable']; ?>"" placeholder=" Masukkan Nomor Meja">
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" class="form-control" name="type" value="<?= $d['type']; ?>"" id=" type" placeholder="Masukkan Type Meja">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Kursi</label>
                            <input type="number" class="form-control" name="jumlah" value="<?= $d['manyOfSeats']; ?>" id=" jumlah" placeholder="Masukkan Jumlah Kursi">
                        </div>
                        <div class="form-group">
                            <label>Waktu Tersedia</label>
                            <input type="text" class="form-control" name="avail" id="avail" value="<?= $d['avalaibleTime']; ?>"" placeholder=" Masukkan Waktu Tersedianya Meja">
                        </div>
                        <input type="submit" name="submit" value="Submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>