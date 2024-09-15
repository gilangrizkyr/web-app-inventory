<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barang Masuk</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Barang</h6>
        </div>
        <div class="card-body">
            <div class="col-6">
                <form action="<?= base_url('barangmasuk/update') ?>" method="post">
                    <input type="hidden" name="idmasuk" value="<?= $cek->idmasuk ?>" class="form-control" id="">

                    <label for="">Nama Barang</label>
                    <input type="text" name="nama_barang" value="<?= $cek->nama_barang ?>" class="form-control" id="">

                    <label for="">Spesifikasi</label><br>
                    <input type="radio" name="spesifikasi" value="TK" <?= $cek->spesifikasi == 'TK' ? 'checked' : '' ?>> TK<br>
                    <input type="radio" name="spesifikasi" value="SD" <?= $cek->spesifikasi == 'SD' ? 'checked' : '' ?>> SD<br>
                    <input type="radio" name="spesifikasi" value="SMP" <?= $cek->spesifikasi == 'SMP' ? 'checked' : '' ?>> SMP<br>
                    <input type="radio" name="spesifikasi" value="MTS" <?= $cek->spesifikasi == 'MTS' ? 'checked' : '' ?>> MTS<br>
                    <input type="radio" name="spesifikasi" value="SMA" <?= $cek->spesifikasi == 'SMA' ? 'checked' : '' ?>> SMA<br>
                    <input type="radio" name="spesifikasi" value="SMK" <?= $cek->spesifikasi == 'SMK' ? 'checked' : '' ?>> SMK<br>

                    <label for="">Harga</label>
                    <input type="number" name="harga" value="<?= $cek->harga ?>" class="form-control" id="">

                    <label for="">Jumlah</label>
                    <input type="number" name="jumlah" value="<?= $cek->jumlah ?>" class="form-control" id="">

                    <label for="alasan">Alasan Edit</label>
                    <textarea name="alasan" class="form-control"></textarea>

                    <br>
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
