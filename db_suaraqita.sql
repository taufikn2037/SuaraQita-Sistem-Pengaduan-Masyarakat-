-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Apr 2023 pada 19.09
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_suaraqita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `name__admin` varchar(255) NOT NULL,
  `username__admin` varchar(128) NOT NULL,
  `password__admin` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id_admin`, `name__admin`, `username__admin`, `password__admin`, `id_role`, `is_active`) VALUES
(1, 'Administrator', 'admin', 'admin123', 1, 1),
(2, 'Taufikk', 'taufik123', '12345', 3, 1),
(7, 'dimas', 'dimas123', '112233', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(225) NOT NULL,
  `isi_berita` text NOT NULL,
  `foto_berita` varchar(225) NOT NULL,
  `tgl_berita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `isi_berita`, `foto_berita`, `tgl_berita`) VALUES
(9, 'PLOOTING KEAMANAN DAN PAM SIAGA JAGA SEKOLAH YANG ADA DIWILAYAH KOTA BANDAR LAMPUNG SEBAGAI ANTISIPASI ISU PENCULIKAN ANAK', 'Sehubungan dengan maraknya isu penculikan anak di Wilayah Kota Bandar Lampung, Kasat Pol PP Kota Bandar Lampung ( Ahmad Nurizki Erwandi, S. STP ) menginstruksikan langsung Anggota untuk Plooting Keamanan dengan menempatkan personilnya di beberapa sekolah TK yang berada di Kota Bandar Lampung.\r\n\r\nHal ini menindaklanjuti arahan dari Walikota Bandar Lampung ( Hj. Eva Dwiana ) yang sehari sebelumnya telah menginstruksikan RT, Linmas, Babinsa dan Bhabinkamtibmas untuk melakukan patroli rutin dilingkungannya masing - masing.\r\n\r\nDihimbau kepada orang tua agar selalu waspada dan terus mendampingi anaknya demi keselamatan kita dan keluarga.', '7f108b0cf4c942f5df8d1800065b557d.jpg', '2023-02-02'),
(11, 'Walikota Bandar Lampung Hj. Eva Dwiana Mendapatkan Penghargaan Dalam Kategori Peduli UMKM', 'Walikota Bandar Lampung Hj. Eva Dwiana menghadiri acara pelantikan pengurusan SMSi provinsi lampung dan pelantikan pengurus LBH SMSI priode 2022-2027, serta pemberian SMSI Award, TH. 2023. Acara berlangsung Di Ballroom Novotel, Minggu, (15/01/2023).\r\n\r\nWalikota Bandar Lampung, Hj. Eva Dwiana mendapatkan penghargaan Dalam katagori Peduli UMKM. Pengahargaan diberikan langsung oleh ketua umum SMSI Provinsi Lampung, Bpk. Doni Irawan.', 'ddb278ef19867bdbbedb8d35a138cc16.jpg', '2023-02-02'),
(13, 'pengumuman', 'informasi penting tolong dilihat', '4d5598330b71ab6db8b9bedec3ff9a09.jpg', '2023-02-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `foto_galeri` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `foto_galeri`) VALUES
(7, 'edfbd980e44b7466a3b4c9d7f98b649a.png'),
(8, 'eb5d9e9da453d26cae14c97bb00da5de.png'),
(9, 'e096039bff877b314d6f9a773b8a9824.png'),
(10, '1675633b94047c659db4da978b9a3c37.png'),
(11, '9d6841873d75a34df7591ac99da87234.png'),
(13, '2c4de26a9d8f3fb1f9a5031adf26e4a6.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sosial'),
(3, 'Infrastruktur'),
(5, 'Kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai','tolak') NOT NULL,
  `rating` enum('0','tidak puas','puas','sangat puas') NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `id_user`, `isi_laporan`, `foto`, `status`, `rating`, `id_kategori`) VALUES
(24, '2023-01-18', 6, 'Jalan Jelek', 'cda52ff71d8408bf7029a8fca8cd2c85.jpg', 'selesai', 'sangat puas', 3),
(25, '2023-01-18', 6, 'Duit hilang', '21fff8231279ae05e31c1e0b6064dab5.jpeg', 'tolak', '0', 1),
(26, '2023-01-25', 6, 'tes', 'e3f8996604e127714928039c2058d838.png', 'proses', '0', 1),
(27, '2023-02-02', 17, 'macet dijalan kota', 'd30efa1ae695d266ec10bc750da8ca03.jpg', '0', '0', 1),
(28, '2023-02-06', 18, 'fjf', '1bde1aecc863ec69fe45f76324ac76e9.jpg', 'proses', '0', 1),
(29, '2023-02-06', 18, 'sayw', 'e4d7784e5d5622da18f7ea3eefbfd255.jpg', 'tolak', '0', 3),
(30, '2023-02-09', 19, 'tolong jalan depan rumah saya rusak', '4bf64eb008c81e97cbd00da1fb2eb938.jpg', 'selesai', 'sangat puas', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_admin`) VALUES
(11, 24, '2023-01-18', 'Okee shaap', 2),
(12, 25, '2023-01-23', 'Tidak sesuai', 2),
(13, 26, '2023-01-25', 'oke', 2),
(14, 28, '2023-02-06', 'okee', 2),
(15, 30, '2023-02-09', 'baik kami proses', 2),
(16, 29, '2023-02-09', 'tidak valid', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name__user` varchar(255) NOT NULL,
  `email__user` varchar(128) NOT NULL,
  `username__user` varchar(128) NOT NULL,
  `nik__user` int(16) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `password__user` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `name__user`, `email__user`, `username__user`, `nik__user`, `no_telepon`, `password__user`, `id_role`, `is_active`, `date_created`) VALUES
(6, 'Taufik Nurhidayat', 'taufik@gmail.com', 'taufik2037', 1811122, '082186687337', '$2y$10$iwZDlNksLC.SRoQFKDFzm.Pk7E8Ey0RXs4iuFb8AUNUnXj5u4UYmi', 2, 1, '2022-12-08'),
(17, 'tono', 'tono@gmail.com', 'tono123', 2147483647, '0821887788', '$2y$10$3J/zlc5f2HsJJWEDJjucluQ24CId4D/P8HxbSPnvHTBk1A1fzYHR.', 2, 1, '2023-01-10'),
(18, 'taufik', 'taufik.mesuji@gmail.com', 'taufik11', 5353535, '086666', '$2y$10$O4..bQgsfGd5QBUhHnyrQukLShVbwE1zbvz1wKyaQxT.QkbiauoT2', 2, 1, '2023-02-06'),
(19, 'taufik nur', 'taufik123@gmail.com', 'taufik37', 2147483647, '082186687337', '$2y$10$1dA/a20Rz8TrDQsEKBXnTeYWdT003zcDixYyNYxy/gGYD93iwAx3.', 2, 1, '2023-02-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_role`
--

CREATE TABLE `users_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_role`
--

INSERT INTO `users_role` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_user` (`id_user`) USING BTREE,
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `users_role` (`id_role`);

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `pengaduan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id_admin`),
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `users_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
