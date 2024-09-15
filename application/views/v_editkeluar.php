<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barang Keluar</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Barang</h6>
        </div>
        <div class="card-body">
            <div class="col-6">
                <form action="<?= base_url('barangkeluar/update') ?>" method="post">

                    <input type="hidden" name="idkeluar" value="<?= $cek->idkeluar ?>" class="form-control" id="">
                    <div class="form-group">
                        <label for="penerima">Nama Barang</label>
                        <input type="text" name="nama_barang" value="<?= $cek->nama_barang ?>" class="form-control" id="penerima">
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" value="<?= $cek->jumlah ?>" class="form-control" id="jumlah">
                    </div>

                    <label for="alasan">Alasan Edit</label>
                    <textarea name="alasan" class="form-control"></textarea>

                    <br>
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>

                </form>
            </div>
        </div>
    </div>

</div>
