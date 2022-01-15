-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2022 pada 20.29
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kolam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `nama`, `tgl_pesan`, `jenis`, `qty`, `id_user`, `status`, `timestamp`) VALUES
(2, 'coba', '2022-01-22', 'Paket', 45, 4, 'Lunas', '2022-01-13 19:47:07'),
(3, 'Bagong', '2022-01-17', 'Pribadi', 5, 4, 'Belum Lunas', '2022-01-13 20:00:10'),
(4, 'Jarwo', '2022-01-15', 'Paket', 52, 2, 'Lunas', '2022-01-13 20:42:21'),
(5, 'Bejo Baehaqi', '2022-01-15', 'Pribadi', 2, 5, 'Lunas', '2022-01-15 10:45:41'),
(6, 'SD Bahagia', '2022-01-18', 'Paket', 51, 5, 'Belum Lunas', '2022-01-15 10:48:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `email`, `password`, `level`) VALUES
(2, 'Widdan Baehaqi', 'widdan', 'widdan@gmail.com', 'widdan', 'user'),
(3, 'Yanuar Eko', 'yanuar', 'yanuar@gmail.com', 'yanuar', 'admin'),
(4, 'Yultarizal', 'rizal', 'rizal@gmail.com', 'rizal', 'user'),
(5, 'Baehaqi', 'baehaqi', 'baehaqi@hotmail.com', 'baehaqi', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
