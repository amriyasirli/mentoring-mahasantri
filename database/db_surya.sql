-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 26 Jan 2021 pada 00.06
-- Versi Server: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `kehadiran` varchar(128) NOT NULL,
  `tanggal_absen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `materi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `pemateri` varchar(128) DEFAULT NULL,
  `hari` varchar(50) NOT NULL,
  `jam` time NOT NULL,
  `jadwal_jenis_kelamin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'PTIK'),
(2, 'PBA'),
(3, 'PBI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, 'Kelas B'),
(2, 'IX MIPA 2'),
(3, 'IX MIPA 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `kelompok` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelompok`
--

INSERT INTO `kelompok` (`id_kelompok`, `kelompok`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III'),
(4, 'IV'),
(5, 'V');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasantri`
--

CREATE TABLE `mahasantri` (
  `nim` int(11) NOT NULL,
  `nama_santri` varchar(128) DEFAULT NULL,
  `jenis_kelamin` varchar(128) DEFAULT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasantri`
--

INSERT INTO `mahasantri` (`nim`, `nama_santri`, `jenis_kelamin`, `id_jurusan`, `id_kelompok`, `password`, `role_id`) VALUES
(2516161, 'Mutia Rahmi', 'Perempuan', 2, 1, '$2y$10$s7AISiD5L7evCOEcqLqOrOAg2NgHZX6QxzPX4Npv6m/Gl6nUYW6oW', 2),
(2516162, 'Angga', 'Laki-Laki', 3, 2, '$2y$10$s7AISiD5L7evCOEcqLqOrOAg2NgHZX6QxzPX4Npv6m/Gl6nUYW6oW', 2),
(2516163, 'Yassirli Amri', 'Laki-Laki', 1, 2, '$2y$10$fIt27eW.bAkI8KHZSx6CvOv5XfcZ2IWUir4vfyDbu6CMxnXmxMLi6', 2),
(2516164, 'Hana', 'Perempuan', 1, 2, '$2y$10$s7AISiD5L7evCOEcqLqOrOAg2NgHZX6QxzPX4Npv6m/Gl6nUYW6oW', 2),
(2516165, 'Sarai', 'Perempuan', 2, 3, '$2y$10$s7AISiD5L7evCOEcqLqOrOAg2NgHZX6QxzPX4Npv6m/Gl6nUYW6oW', 2),
(2516166, 'Hari Antonii', 'Laki-Laki', 1, 2, '$2y$10$s7AISiD5L7evCOEcqLqOrOAg2NgHZX6QxzPX4Npv6m/Gl6nUYW6oW', 2),
(2516167, 'Nabila Salsani', 'Perempuan', 3, 4, '$2y$10$mGW3yOoHuM0Iu8vs0d6uue/fJo9fgvegGZpibNFWGrVSj0xJYVSAi', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `materi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `materi`) VALUES
(1, 'Fiqih Ibadah'),
(2, 'Tahsin Quran'),
(3, 'Fiqih Nikah'),
(4, 'Bacaan Sholat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `musrif`
--

CREATE TABLE `musrif` (
  `id_musrif` int(11) NOT NULL,
  `nama_musrif` varchar(128) DEFAULT NULL,
  `gender_musrif` varchar(128) DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `musrif`
--

INSERT INTO `musrif` (`id_musrif`, `nama_musrif`, `gender_musrif`, `username`, `password`, `role_id`) VALUES
(1, 'Arif Kurniawan', 'Laki-Laki', 'admin', '$2y$10$z1984JmRUt3EEgx0tHKpMeJ00yz747LwhnVsnI2dvFcHpDg/IOp2i', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemateri`
--

CREATE TABLE `pemateri` (
  `id_pemateri` int(11) NOT NULL,
  `nama_pemateri` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemateri`
--

INSERT INTO `pemateri` (`id_pemateri`, `nama_pemateri`) VALUES
(3, 'Yassirli Amri, S.Pd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `mahasantri`
--
ALTER TABLE `mahasantri`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `musrif`
--
ALTER TABLE `musrif`
  ADD PRIMARY KEY (`id_musrif`);

--
-- Indexes for table `pemateri`
--
ALTER TABLE `pemateri`
  ADD PRIMARY KEY (`id_pemateri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `musrif`
--
ALTER TABLE `musrif`
  MODIFY `id_musrif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pemateri`
--
ALTER TABLE `pemateri`
  MODIFY `id_pemateri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
