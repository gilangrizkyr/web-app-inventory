<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Barang</h1>

	</div>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah barang</h6>
		</div>
		<div class="card-body">
			<div class="col-6">
				<form action="<?= base_url('barang/simpan') ?>" method="post" enctype="multipart/form-data">

					<label for="">Nama Barang</label>
					<input type="text" name="nama_barang" class="form-control" id="">
					<label for="">Spesifikasi</label><br>
					<input type="radio" name="spesifikasi" value="TK">
        			<label for="html">TK</label>
        			<input type="radio" name="spesifikasi" value="SD">
        			<label for="html">SD</label>
        			<input type="radio" name="spesifikasi" value="SMP">
        			<label for="html">SMP</label>
        			<input type="radio" name="spesifikasi" value="MTS">
        			<label for="html">MTS</label>
        			<input type="radio" name="spesifikasi" value="SMA">
        			<label for="html">SMA</label>
        			<input type="radio" name="spesifikasi" value="SMK">
        			<label for="html">SMK</label><br>
					
					<label for="">Harga</label>
					<input type="text" name="harga" class="form-control" id="">

        			<label for="">Stock</label>
					<input type="number" name="stock" class="form-control" id="">

					<br>
					<button type="submit" class="btn btn-success btn-sm">Simpan</button>

				</form>
			</div>




		</div>
	</div>


</div>