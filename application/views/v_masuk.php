<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"></h1>

	</div>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h4 class="m-0 font-weight-bold text-primary">Data Baraang Masuk</h4>
			<a href="<?= base_url('masuk/add_data') ?>" class="btn btn-info btn-sm"> Tambah Data</a>
			<a href="<?= base_url('masukb/load_barang') ?>" class="btn btn-info btn-sm"> Lihat Daftar Barang</a>
			<a href="<?= base_url('masukb/load_tablejoin') ?>" class="btn btn-info btn-sm"> Lihat Daftar Barang Masuk Gabungan</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Nama Buku</th>
							<th>Jumlah</th>
							<th>ID Barang</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php
						foreach ($data as $dt) : ?>
							<tr>
								<td><?php echo $dt['nama buku']; ?></td>
								<td><?php echo $dt['jumlah']; ?></td>
								<td><?php echo $dt['id']; ?></td>
								<td>
									<input type="button" onclick="location.href='<?php echo base_url('masuk/edit_data') ?>'" value="Ubah">
								</td>
								<td>
									<input type="button" onclick="location.href='<?php echo base_url('masuk/do_delete') ?>'" value="Hapus">
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>


</div>