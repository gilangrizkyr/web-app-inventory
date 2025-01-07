<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Keluar</h6>
        </div>
        <div class="card-body">
            <div class="col-6">
                <form action="<?= base_url('barangkeluar/tambahkeluar_proses') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="nama_barang" onkeyup="searchBarang()" required>
                    </div>
                    <div id="hasilPencarian" style="margin-top: 10px;"></div>
                    <div class="form-group">
                        <label for="spesifikasi">Spesifikasi</label>
                        <input type="text" name="spesifikasi" class="form-control" id="spesifikasi" readonly required>
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

<script>
    function searchBarang() {
        let namaBarang = document.getElementById('nama_barang').value;

        if (namaBarang.length < 3) {
            document.getElementById('hasilPencarian').innerHTML = '';
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open('GET', '<?= base_url('barangkeluar/search_barang'); ?>?nama_barang=' + namaBarang, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('hasilPencarian').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }

    function selectBarang(namaBarang, spesifikasi) {
        // Mengisi input nama_barang dan spesifikasi
        document.getElementById('nama_barang').value = namaBarang;
        document.getElementById('spesifikasi').value = spesifikasi;
        document.getElementById('hasilPencarian').innerHTML = ''; // Hapus hasil pencarian setelah pemilihan
    }
</script>
