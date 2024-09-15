
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Barang Masuk</h5>
                        <canvas id="barangMasukChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Barang Keluar</h5>
                        <canvas id="barangKeluarChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Total Barang</h5>
                        <canvas id="totalBarangChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        fetch('data.php')
            .then(response => response.json())
            .then(data => {
                const labels = data.barangMasuk.map(item => item.bulan);
                const barangMasukData = data.barangMasuk.map(item => item.jumlah);
                const barangKeluarData = data.barangKeluar.map(item => item.jumlah);

                // Data untuk grafik barang masuk
                var barangMasukCtx = document.getElementById('barangMasukChart').getContext('2d');
                var barangMasukChart = new Chart(barangMasukCtx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Barang Masuk',
                            data: barangMasukData,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Data untuk grafik barang keluar
                var barangKeluarCtx = document.getElementById('barangKeluarChart').getContext('2d');
                var barangKeluarChart = new Chart(barangKeluarCtx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Barang Keluar',
                            data: barangKeluarData,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Data untuk grafik total barang (masuk - keluar)
                var totalBarangData = barangMasukData.map((masuk, index) => masuk - barangKeluarData[index]);
                var totalBarangCtx = document.getElementById('totalBarangChart').getContext('2d');
                var totalBarangChart = new Chart(totalBarangCtx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total Barang',
                            data: totalBarangData,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>