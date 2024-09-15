-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Jul 2024 pada 17.08
-- Versi server: 11.4.2-MariaDB-log
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webpro3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id` int(15) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `spesifikasi` varchar(100) DEFAULT NULL,
  `stock` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga`, `status`, `spesifikasi`, `stock`) VALUES
(1, 'Buku Anak Belajar Menulis dan Latihan Keterampilan Untuk TK/SD Kelas 1', 'Rp 7000', 'Ada', 'SD', 55),
(3, 'Buku ESPS Matematika Kelas 1 SD MI kurikulum merdeka', 'Rp 77000', 'Ada', 'SD', 10),
(4, 'buku induk siswa sd k13', 'Rp 115000', 'Ada', 'SD', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangkeluar`
--

DROP TABLE IF EXISTS `barangkeluar`;
CREATE TABLE `barangkeluar` (
  `idkeluar` int(11) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `spesifikasi` varchar(200) NOT NULL,
  `alasan` varchar(200) NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk`
--

DROP TABLE IF EXISTS `barangmasuk`;
CREATE TABLE `barangmasuk` (
  `idmasuk` int(11) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `spesifikasi` varchar(200) NOT NULL,
  `harga` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barangmasuk`
--

INSERT INTO `barangmasuk` (`idmasuk`, `nama_barang`, `jumlah`, `spesifikasi`, `harga`, `created_at`) VALUES
(66, 'Buku IPS', '1000', 'SMP', '25000', '2024-07-05 09:13:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `idmasuk` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `aksi` varchar(50) NOT NULL,
  `alasan` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id`, `idmasuk`, `nama_barang`, `spesifikasi`, `jumlah`, `harga`, `aksi`, `alasan`, `waktu`) VALUES
(13, 66, 'Buku IPS', 'SMP', 1000, 10000, 'edit', 'Salah Input harga', '2024-07-05 23:14:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar`
--

DROP TABLE IF EXISTS `keluar`;
CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `jumlah` varchar(100) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keluar`
--

INSERT INTO `keluar` (`idkeluar`, `penerima`, `jumlah`, `id`) VALUES
(1, 'Lidia', '25', 3),
(4, 'Yeril', '25', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `masuk`
--

DROP TABLE IF EXISTS `masuk`;
CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `jumlah` varchar(100) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `penerima`, `jumlah`, `id`) VALUES
(1, 'Fazri', '50', 1),
(2, 'Gilang', '46', 4),
(4, 'Kurniadi', '100', 3),
(6, 'Lidia', '55', 3),
(7, 'Yeril', '14', 3),
(8, 'Yeril', '18', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_keluar`
--

DROP TABLE IF EXISTS `riwayat_keluar`;
CREATE TABLE `riwayat_keluar` (
  `id` int(11) NOT NULL,
  `deleted_at` timestamp NOT NULL,
  `idrk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_masuk`
--

DROP TABLE IF EXISTS `riwayat_masuk`;
CREATE TABLE `riwayat_masuk` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `idrm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `idmasuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data untuk tabel `stock`
--

INSERT INTO `stock` (`id`, `nama_barang`, `spesifikasi`, `jumlah`, `harga`, `idmasuk`) VALUES
(8, 'Buku IPS', 'SMP', 1000, 10000, 66);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_keluar`
--

DROP TABLE IF EXISTS `stock_keluar`;
CREATE TABLE `stock_keluar` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `idkeluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `no_hp`, `email`, `image`, `created_at`, `role_id`) VALUES
(1, 'adi', '123', 'Muhammad Kurniadi Pu', '081256623590', 'adi110298.kp@gmail.com', '', NULL, 2),
(2, 'gilang', '123', 'Gilang Rizky Ramadhan', '019201', 'wqwq@gmail.com', '', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `username`, `role_id`) VALUES
(1, 'Admin', 1),
(2, 'User', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barangkeluar`
--
ALTER TABLE `barangkeluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indeks untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`),
  ADD KEY `keluar_ibfk_1` (`id`);

--
-- Indeks untuk tabel `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`),
  ADD KEY `masuk_ibfk_1` (`id`);

--
-- Indeks untuk tabel `riwayat_keluar`
--
ALTER TABLE `riwayat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat_masuk`
--
ALTER TABLE `riwayat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmasuk` (`idmasuk`);

--
-- Indeks untuk tabel `stock_keluar`
--
ALTER TABLE `stock_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_barang` (`nama_barang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`role_id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `riwayat_keluar`
--
ALTER TABLE `riwayat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_masuk`
--
ALTER TABLE `riwayat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `stock_keluar`
--
ALTER TABLE `stock_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keluar`
--
ALTER TABLE `keluar`
  ADD CONSTRAINT `keluar_ibfk_1` FOREIGN KEY (`id`) REFERENCES `barang` (`id`);

--
-- Ketidakleluasaan untuk tabel `masuk`
--
ALTER TABLE `masuk`
  ADD CONSTRAINT `masuk_ibfk_1` FOREIGN KEY (`id`) REFERENCES `barang` (`id`);

--
-- Ketidakleluasaan untuk tabel `riwayat_keluar`
--
ALTER TABLE `riwayat_keluar`
  ADD CONSTRAINT `riwayat_keluar_ibfk_1` FOREIGN KEY (`id`) REFERENCES `barangmasuk` (`idmasuk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_masuk`
--
ALTER TABLE `riwayat_masuk`
  ADD CONSTRAINT `riwayat_masuk_ibfk_1` FOREIGN KEY (`id`) REFERENCES `barangmasuk` (`idmasuk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`idmasuk`) REFERENCES `barangmasuk` (`idmasuk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stock_keluar`
--
ALTER TABLE `stock_keluar`
  ADD CONSTRAINT `stock_keluar_ibfk_1` FOREIGN KEY (`id`) REFERENCES `barangmasuk` (`idmasuk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
