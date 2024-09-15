<div class="container-fluid">
	<!-- Page Heading -->
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-primary">Data Barang Masuk</h4>
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
            <a href="<?= base_url('barangmasuk/tambahmasuk') ?>" class="btn btn-info btn-sm"> Input Data Masuk</a>
            <!-- Table or other content here -->
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
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($users as $u) : ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $u->nama_barang ?></td>
								<td><?= $u->spesifikasi ?></td>
								<td><?= $u->harga ?></td>
								<td><?= $u->jumlah ?></td>
								<td>
									<a href="<?= base_url('barangmasuk/editmasuk/') . $u->idmasuk ?>" class="btn btn-warning btn-sm"> Edit</a>
									<a href="#" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="#hapusModal<?= $u->idmasuk ?>">Hapus</a>

									<!-- Modal Hapus -->
									<div class="modal fade" id="hapusModal<?= $u->idmasuk ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel<?= $u->idmasuk ?>" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<form action="<?= base_url('barangmasuk/hapus') ?>" method="post">
													<div class="modal-header">
														<h5 class="modal-title" id="hapusModalLabel<?= $u->idmasuk ?>">Konfirmasi Hapus</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<input type="hidden" name="idmasuk" value="<?= $u->idmasuk ?>">
														<p>Apakah Anda yakin ingin menghapus data dengan nama
															<b><?= $u->nama_barang ?></b>?
														</p>
														<label for="alasan">Alasan Hapus</label>
														<textarea name="alasan" class="form-control" required></textarea>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
														<button type="submit" class="btn btn-danger">Hapus</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>