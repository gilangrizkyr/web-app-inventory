<div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Keluar</h6>
        </div>
        <div class="card-body">
            <div class="col-6">
                <form action="<?= base_url('barangkeluar/tambahkeluar_proses') ?>" method="post">

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="nama_barang" required>
                    </div>

                    <div class="form-group">
                        <label for="spesifikasi">Spesifikasi</label><br>
                        <input type="radio" name="spesifikasi" value="TK" id="spesifikasi_tk">
                        <label for="spesifikasi_tk">TK</label>
                        <input type="radio" name="spesifikasi" value="SD" id="spesifikasi_sd">
                        <label for="spesifikasi_sd">SD</label>
                        <input type="radio" name="spesifikasi" value="SMP" id="spesifikasi_smp">
                        <label for="spesifikasi_smp">SMP</label>
                        <input type="radio" name="spesifikasi" value="MTS" id="spesifikasi_mts">
                        <label for="spesifikasi_mts">MTS</label>
                        <input type="radio" name="spesifikasi" value="SMA" id="spesifikasi_sma">
                        <label for="spesifikasi_sma">SMA</label>
                        <input type="radio" name="spesifikasi" value="SMK" id="spesifikasi_smk">
                        <label for="spesifikasi_smk">SMK</label>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" id="jumlah" required>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>

                </form>
            </div>
        </div>
    </div>
</div>
