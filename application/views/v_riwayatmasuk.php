<div class="container-fluid">
    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h4 class="m-0 font-weight-bold text-primary">Data Riwayat Masuk Barang</h4>
                </div>
                <div class="col-6 text-right">
                    <a href="#" class="btn btn-primary btn-icon-split no-print btn-print">
                        <span class="icon text-white-50">
                            <i class="fas fa-print"></i>
                        </span>
                        <span class="text">Print</span>
                    </a>
                </div>
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
                            <th>Stock</th>
                            <th>Waktu</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($riwayat_masuk as $rm) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $rm->nama_barang ?></td>
                                <td><?= $rm->spesifikasi ?></td>
                                <td><?= $rm->jumlah ?></td>
                                <td><?= date('d-m-Y ', strtotime($rm->created_at)) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>