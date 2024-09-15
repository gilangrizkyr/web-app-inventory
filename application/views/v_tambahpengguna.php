<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Pengguna</h1>

	</div>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Pengguna</h6>
		</div>
		<div class="card-body">
			<div class="col-6">
				<form action="<?= base_url('pengguna/simpan') ?>" method="post">

					<label for="">Username</label>
					<input type="text" name="username" class="form-control" id="">

					<label for="">Nama Lengkap</label>
					<input type="text" name="nama_lengkap" class="form-control" id="">

					<label for="">Password</label>
					<input type="password" name="password" class="form-control" id="">

					<label for="">No Handphone</label>
					<input type="number" name="no_hp" class="form-control" id="">

					<label for="">Email</label>
					<input type="email" name="email" class="form-control" id="">

					<br>
					<button type="submit" class="btn btn-success btn-sm">Simpan</button>

				</form>
			</div>




		</div>
	</div>


</div>