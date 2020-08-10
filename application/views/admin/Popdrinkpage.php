<div class="container">
    <div class="row">
        <h3> Master Data Minuman Populer </h3>
    </div>
    <div class="row">
        <table class="table table-hover table-stripped">
            <thead>
                <tr>
                    <td>Nama</td>
                    <td>Harga</td>
                    <td>Jumlah Order</td>
                    <td>Action</td>
                </tr>
            </thead>
            <?php foreach ((array)$populer as $d) : ?>
                <tr>
                    <td><?= $d['name']; ?></td>
                    <td><?= $d['price']; ?></td>
                    <td><?= $d['order']; ?></td>
                    <td><a href="#" class="badge badge-danger" onclick="return confirm('Anda Akan Menghapus Data Ini ?');"> Hide</a>
                        <a href="#" data-target="#editModal<?= $d['drinkId']; ?>" data-toggle="modal" class="badge badge-warning">Show</a>
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
                    <h1 align="center">Tambah Data Minuman Populer</h1>
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
                        <label">Pilih Foto Minuman Populer</label>
                            <input type="file" class="form-control-file" name="image" id="image">
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
                    <h1 align="center">Edit Data Minuman</h1>
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