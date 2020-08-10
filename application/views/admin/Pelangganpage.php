<div class="container">
    <div class="row">
        <h3>Order Terkonfirmasi</h3>
    </div>

    <div class="row confir">
        <div class="col">
            <h5>Order Masuk</h5>
            <table class="table table-hover table-stripped">
                <thead>
                    <tr>
                        <td>Kode Item Order</td>
                        <td>Tanggal</td>
                        <td>Note</td>
                        <td>Expired</td>
                        <td>Status Order</td>
                        <td>Status Payment</td>
                        <td>Foto Bukti</td>
                        <td>Total</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <?php foreach ((array)$order as $t) : ?>
                    <?php if ($t['statusOrder'] == "Confirm") { ?>
                        <tr>
                            <td><?= $t['orderCode']; ?></td>
                            <td><?= $t['orderDate']; ?></td>
                            <td><?= $t['note']; ?></td>
                            <td><?= $t['expired']; ?></td>
                            <td><?= $t['statusOrder']; ?></td>
                            <td><?= $t['statusPayment']; ?></td>
                            <td>
                                <img src="<?= $t['imageUrl']; ?>" alt="foto-order">
                            </td>
                            <td><?= $t['totalPrices']; ?></td>
                            <td> <a href="#" data-target="#editModal<?= $t['orderCode']; ?>" data-toggle="modal" class="badge badge-warning">Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?php foreach ((array)$order as $t) :  ?>
    <div id="editModal<?php echo $t['orderCode']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-tittle">
                        <h1 align="center">Konfirmasi Order</h1>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>C_Mobil/editMob" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label">Kode Item Order</label>
                                <input type="text" class="form-control" name="kodeItem" id="kodeItem" value="<?= $t['orderCode']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="text" class="form-control" name="tanggal" id="tanggal" value="<?= $t['orderDate']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <textarea class="form-control" name="note" id="note" cols="30" rows="10"><?= $t['note']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Expired</label>
                            <input type="text" class="form-control" name="expired" id="expired" value="<?= $t['expired']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Status Order</label>
                            <input type="text" class="form-control" name="statsOrder" id="statsOrder" value="<?= $t['statusOrder']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Status Payment</label>
                            <input type="text" class="form-control" name="statsPay" id="statsPay" value="<?= $t['statusPayment']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <div class="row ml-2">
                                <label>Foto Bukti</label>
                            </div>
                            <div class="row ml-2">
                                <img src="<?= $t['imageUrl']; ?>" alt="foto-order">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Total</label>
                            <input type="text" class="form-control" name="total" id="total" value="<?= $t['totalPrices']; ?>" readonly>
                        </div>

                        <input type="submit" name="submit" value="Konfirmasi" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>