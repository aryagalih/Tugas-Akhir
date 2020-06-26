-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2020 pada 21.32
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_jadwal`
--

CREATE TABLE `tb_detail_jadwal` (
  `id_jadwal` int(5) NOT NULL,
  `nis` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_penilaian`
--

CREATE TABLE `tb_detail_penilaian` (
  `id` int(11) NOT NULL,
  `id_nilai` int(5) NOT NULL,
  `nis` bigint(15) NOT NULL,
  `nilai_pengetahuan` int(3) NOT NULL,
  `nilai_keterampilan` int(3) NOT NULL,
  `nilai_sikap` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_penilaian`
--

INSERT INTO `tb_detail_penilaian` (`id`, `id_nilai`, `nis`, `nilai_pengetahuan`, `nilai_keterampilan`, `nilai_sikap`) VALUES
(7, 3869, 12345, 90, 90, 90),
(8, 3869, 12346, 90, 90, 90),
(9, 3869, 12347, 90, 90, 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nip` bigint(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` int(15) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`nip`, `nama`, `jk`, `alamat`, `no_telpon`, `foto`) VALUES
(91283, 'Arya Galih', ' Laki-Laki', 'Malang', 98123, ''),
(9866212, 'Arya Galih Ramdan', ' Laki-Laki', 'KOTA BATU', 98234, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(5) NOT NULL,
  `id_matpel` int(5) NOT NULL,
  `nip` bigint(20) NOT NULL,
  `jam_pelajaran` varchar(30) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `id_matpel`, `nip`, `jam_pelajaran`, `id_kelas`, `hari`) VALUES
(8961, 2294, 91283, '07:00 - 07:40', 54, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(5) NOT NULL,
  `nama` varchar(10) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama`, `status`) VALUES
(54, '7A', 0),
(55, '7B', 0),
(56, '7C', 0),
(57, '8A', 1),
(58, '8B', 1),
(59, '8C', 1),
(60, '9A', 2),
(61, '9B', 2),
(62, '9C', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matpel`
--

CREATE TABLE `tb_matpel` (
  `id_matpel` int(5) NOT NULL,
  `nama_matpel` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_matpel`
--

INSERT INTO `tb_matpel` (`id_matpel`, `nama_matpel`) VALUES
(2294, 'Matematika'),
(8522, 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_nilai` int(5) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_matpel` int(5) NOT NULL,
  `bab_kompetensi` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_nilai`, `id_kelas`, `id_matpel`, `bab_kompetensi`) VALUES
(3869, 54, 2294, 'Matrix');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` bigint(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama`, `alamat`, `kelas`, `jk`, `foto`) VALUES
(12345, 'Arya', 'Pokopek', '54', 'Laki-Laki', ''),
(12346, 'Galih', 'Kota Batu', '54', 'Perempuan', ''),
(12347, 'Rama', 'Kota Malang', '54', 'Laki-Laki', ''),
(12348, 'Dani', 'Kota Semarang', '55', 'Perempuan', ''),
(12349, 'Arya Galih Ramdani', 'Kota Beji', '55', 'Laki-Laki', ''),
(12350, 'Ary', 'Mburi Pasar', '55', 'Perempuan', ''),
(12351, 'Mahardika', 'Oro oro Ombo', '56', 'Laki-Laki', ''),
(12352, 'Adityas', 'Pokopek', '56', 'Perempuan', ''),
(12353, 'Arya Joni', 'Oro oro Ombo', '56', 'Laki-Laki', ''),
(12354, 'Firman', 'Pokopek', '57', 'Laki-Laki', ''),
(12355, 'Surya', 'Malang', '57', 'Perempuan', ''),
(12356, 'Ahlan', 'Kota Batu', '57', 'Laki-Laki', ''),
(12357, 'Yaya', 'Kota Batu', '58', 'Perempuan', ''),
(12358, 'Samsul', 'Pokopek', '58', 'Perempuan', ''),
(12359, 'Veri', 'Beji', '59', 'Perempuan', ''),
(12360, 'Anggi', 'Malang', '60', 'Perempuan', ''),
(12361, 'ikshan', 'Oro oro Ombo', '61', 'Laki-Laki', ''),
(12362, 'Yani', 'Kota Batu', '62', 'Perempuan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `created_at`, `role`) VALUES
('admin', 'admin', '2020-06-10 13:33:01', 1),
('guru', 'guru', '2020-06-10 14:30:18', 2),
('siswa', 'siswa', '2020-06-10 14:30:40', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `tb_detail_jadwal`
--
ALTER TABLE `tb_detail_jadwal`
  ADD KEY `nis` (`nis`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `tb_detail_penilaian`
--
ALTER TABLE `tb_detail_penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_nilai` (`id_nilai`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_matpel` (`id_matpel`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_matpel`
--
ALTER TABLE `tb_matpel`
  ADD PRIMARY KEY (`id_matpel`);

--
-- Indeks untuk tabel `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_penilaian`
--
ALTER TABLE `tb_detail_penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id_nilai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9884;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `nis` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12363;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`);

--
-- Ketidakleluasaan untuk tabel `tb_detail_jadwal`
--
ALTER TABLE `tb_detail_jadwal`
  ADD CONSTRAINT `tb_detail_jadwal_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`),
  ADD CONSTRAINT `tb_detail_jadwal_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwal` (`id_jadwal`);

--
-- Ketidakleluasaan untuk tabel `tb_detail_penilaian`
--
ALTER TABLE `tb_detail_penilaian`
  ADD CONSTRAINT `tb_detail_penilaian_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`),
  ADD CONSTRAINT `tb_detail_penilaian_ibfk_2` FOREIGN KEY (`id_nilai`) REFERENCES `tb_penilaian` (`id_nilai`);

--
-- Ketidakleluasaan untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_guru` (`nip`),
  ADD CONSTRAINT `tb_jadwal_ibfk_2` FOREIGN KEY (`id_matpel`) REFERENCES `tb_matpel` (`id_matpel`),
  ADD CONSTRAINT `tb_jadwal_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
