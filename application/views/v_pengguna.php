<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"></h1>

	</div>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h4 class="m-0 font-weight-bold text-primary">Data Pengguna</h4>
			
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Lengkap</th>
							<th>Username</th>
							<th>No HP</th>
							<th>Email</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no = 1;
						foreach ($users as $u) : ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $u->nama_lengkap ?></td>
								<td><?= $u->username ?></td>
								<td><?= $u->no_hp ?></td>
								<td><?= $u->email ?></td>
								<td>
									<a href="<?= base_url('pengguna/editpengguna/') . $u->id ?>" class="btn btn-warning btn-sm"> Edit</a>
									<a href="#" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="#hapusModal<?= $u->id ?>">Hapus</a>

									<!-- Modal Hapus -->
									<div class="modal fade" id="hapusModal<?= $u->id ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel<?= $u->id ?>" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<form action="<?= base_url('pengguna/hapus') ?>" method="post">
													<div class="modal-header">
														<h5 class="modal-title" id="hapusModalLabel<?= $u->id ?>">Konfirmasi Hapus</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<input type="hidden" name="id" value="<?= $u->id ?>">
														<p>Apakah Anda yakin ingin menghapus data dengan ID <?= $u->username ?>?</p>
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