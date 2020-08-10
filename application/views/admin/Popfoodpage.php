<div class="container">
    <div class="row">
        <h3> Master Data Makanan Populer </h3>
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
                        <a href="#" data-target="#editModal<?= $d['foodId']; ?>" data-toggle="modal" class="badge badge-warning">Show</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>