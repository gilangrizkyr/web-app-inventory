<div class="container-fluid">
    <!-- Page Heading -->
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h4 class="m-0 font-weight-bold text-primary">Data History</h4>
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
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                            <th>Alasan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($history as $h) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $h->nama_barang ?></td>
                                <td><?= $h->spesifikasi ?></td>
                                <td><?= $h->jumlah ?></td>
                                <td><?= $h->harga ?></td>
                                <td><?= $h->aksi ?></td>
                                <td><?= $h->alasan ?></td>
                                <td><?= date('d-m-Y ', strtotime($h->waktu)) ?></td> <!-- Pastikan field created_at ada di tabel history -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
