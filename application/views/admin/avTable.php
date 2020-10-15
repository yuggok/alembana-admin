<div class="container">
    <div class="row">
        <h3> Ketersediaan Meja</h3>
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
        <table class="table table-hover table-stripped">
            <thead>
                <tr>
                    <td>Nomor Meja</td>
                    <td>Type</td>
                    <td>Jumlah Kursi</td>
                    <td>Foto</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <?php foreach ((array)$meja as $t) : ?>
                <?php $av = TRUE; ?>
                <tr>
                    <td><?= $t['numberOfTable']; ?></td>
                    <td><?= $t['type']; ?></td>
                    <td><?= $t['manyOfSeats']; ?></td>
                    <td><img src="<?= isset($t['filePath']) ? $t['filePath'] : 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/600px-No_image_available.svg.png'; ?>" width="100px" /></td>
                    <td><?php if ($av) {
                            echo "Available";
                        } else {
                            echo "Booked";
                        } ?></td>
                    <td><a href="<?php $av == true; ?>" class="badge badge-danger" onclick="return confirm('Pelanggan Sudah Pergi ?');"> Check Out </a>
                        <a href="#" data-target="<?php $av == false; ?>" data-toggle="modal" class="badge badge-warning">Check In</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>