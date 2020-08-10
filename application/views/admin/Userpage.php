<div class="container">
    <div class="row">
        <h3> Konfigurasi User</h3>
    </div>
    <div class="row">
        <a style="margin-bottom: 10px " href="#" class="btn btn-success" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus"></i> Tambah Data</a>

        <table class="table table-hover table-stripped">
            <thead>
                <tr>
                    <td>Foto</td>
                    <td>Nama</td>
                    <td>Jenis Kelamin</td>
                    <td>Tanggal Lahir</td>
                    <td>No. Telepon</td>
                    <td>Email</td>
                    <td>Opsi</td>
                </tr>
            </thead>
            <?php foreach ((array)$user as $u) : ?>
                <tr>
                    <td> <img src="<?= $u['imageUrl']; ?>" alt="FotoUser"></td>
                    <td><?= $u['name']; ?></td>
                    <td><?= $u['gender']; ?></td>
                    <td><?= $u['dateOfBirth']; ?></td>
                    <td><?= $u['phone']; ?></td>
                    <td><?= $u['email']; ?></td>
                    <td><a href="<?php base_url(); ?>User/deleteUser/<?= $u['userId']; ?>" class="badge badge-danger" onclick="return confirm('Anda Akan Menghapus Data Ini ?');"> Hapus </a>
                        <a href="#" data-target="#editModal<?= $u['userId']; ?>" data-toggle="modal" class="badge badge-warning">Edit</a>
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
                    <h1 align="center">Tambah Data User</h1>
                </div>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>User/addData" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama </label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                        <select class="form-control" id="jeniskel">
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Masukkan Tanggal Lahir">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                        <label>No. Telpon</label>
                        <input type="number" class="form-control" name="telp" id="telp" placeholder="Masukkan Nomor Telepon">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                        <label">Pilih Foto User</label>
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
                    <h1 align="center">Tambah Data Table</h1>
                </div>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Food" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nomor Kursi </label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Makanan">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" id="type" placeholder="Masukkan Type Makanan">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Kursi</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Masukkan Harga">
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>