<div class="container">
    <div class="row">
        <h3> Master Data Carousels</h3>
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
                    <td>Title</td>
                    <td>Foto</td>
                    <td>Action</td>
                </tr>
            </thead>
            <?php foreach ((array)$data as $f) : ?>
                <tr>
                    <td><?= $f["title"]; ?></td>
                    <td><img src="<?= isset($f['image']) ? $f['image'] : 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/600px-No_image_available.svg.png'; ?>" width="100px"/></td>
                    <td><a href="<?php base_url(); ?>Carousels/deleteData/<?= $f['slideId']; ?>" class="badge badge-danger" onclick="return confirm('Anda Akan Menghapus Data Ini ?');"> Hapus </a>
                        <a href="#" data-target="#editModal<?= $f['slideId']; ?>" data-toggle="modal" class="badge badge-warning">Edit</a>
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
                    <h1 align="center">Tambah Data Carousel</h1>
                </div>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Carousels/addData" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title </label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Title">
                    </div>
                    <div class="form-group">
                        <label">Pilih Foto Carousel</label>
                            <input type="file" class="form-control-file" name="file" id="file">
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
<?php foreach ((array)$data as $f) : ?>
    <div id="editModal<?= $f['slideId']; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-tittle">
                        <h1 align="center">Edit Data Carousel</h1>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>Carousels/editData" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" name="id" id="id" value="<?= $f['slideId']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control" value="<?= $f['title']; ?>" name="title" id="title" placeholder="Masukkan Title">
                        </div>
                        <input type="hidden" value="<?= isset($f['image']) ? $f['image'] : ''; ?>" name="image" id="image">
                        <div class="form-group">
                            <label">Pilih Foto Carousel</label>
                                <input type="file" class="form-control-file" name="file" id="file">
                        </div>
                        <input type="submit" name="submit" value="submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>