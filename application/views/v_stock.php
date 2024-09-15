<div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-primary">Ketersediaan Stock</h4>
            <div class="text-right">
                <a href="#" class="btn btn-primary btn-icon-split no-print btn-print">
                    <span class="icon text-white-50">
                        <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Print</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Spesifikasi</th>
                            <th>Harga</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($stocks as $stock) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $stock->nama_barang ?></td>
                                <td><?= $stock->spesifikasi ?></td>
                                <td><?= $stock->harga ?></td>
                                <td><?= $stock->jumlah ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>