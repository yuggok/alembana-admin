<div class="container">
    <div class="row">
        <h3> Master Data Minuman</h3>
    </div>
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
            <?php foreach ((array)$drinks as $d) : ?>
                <tr>
                    <td><?= $d["name"]; ?></td>
                    <td><?= $d['type']; ?></td>
                    <td>Foto</td>
                    <td><?= $d['price']; ?></td>
                    <td><a href="<?php base_url(); ?>Drinks/deleteData/<?= $d['drinkId']; ?>" class="badge badge-danger" onclick="return confirm('Anda Akan Menghapus Data Ini ?');"> Hapus </a>
                        <a href="#" data-target="#editModal<?= $d['drinkId']; ?>" data-toggle="modal" class="badge badge-warning">Edit</a>
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
                    <h1 align="center">Tambah Data Minuman</h1>
                </div>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Drinks/addData" method="post" enctype="multipart/form-data">
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
                        <label">Pilih Foto Minuman</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
<?php foreach ((array)$drinks as $d) : ?>
    <div id="editModal<?= $d['drinkId']; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-tittle">
                        <h1 align="center">Edit Data Minuman</h1>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>Drinks/editData" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" name="id" id="id" value="<?= $d['drinkId']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control" value="<?= $d['name']; ?>" name="name" id="name" placeholder="Masukkan Nama Minuman">
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" class="form-control" value="<?= $d['type']; ?>" name="type" id="type" placeholder="Masukkan Type Minuman">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" value="<?= $d['price']; ?>" name="price" id="price" placeholder="Masukkan Harga">
                        </div>
                        <div class="form-group">
                            <label">Pilih Foto Makanan</label>
                                <input type="file" class="form-control-file" name="image" id="image">
                        </div>
                        <input type="submit" name="submit" value="submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>