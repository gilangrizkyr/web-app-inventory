<div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-primary">Data Barang Keluar</h4>
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
            <a href="<?= base_url('barangkeluar/tambahkeluar') ?>" class="btn btn-info btn-sm"> Input Barang Keluar</a>
            <!-- Table or other content here -->
        </div>




        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Spesifikasi</th>
                            <th>Alasan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($barangkeluar)) : ?>
                            <?php $no = 1; ?>
                            <?php foreach ($barangkeluar as $stock) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $stock->nama_barang ?></td>
                                    <td><?= $stock->jumlah ?></td>
                                    <td><?= $stock->spesifikasi ?></td>
                                    <td><?= $stock->alasan ?></td>
                                    <td>
                                        <a href="<?= base_url('barangkeluar/editkeluar/') . $stock->idkeluar ?>" class="btn btn-warning btn-sm"> Edit</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6">Tidak ada data barang keluar.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>