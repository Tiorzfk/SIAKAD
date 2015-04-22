-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Feb 2015 pada 00.03
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_detail_nilai`
--

CREATE TABLE IF NOT EXISTS `tr_detail_nilai` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(5) NOT NULL,
  `id_sk` int(5) NOT NULL,
  `nilai` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data untuk tabel `tr_detail_nilai`
--

INSERT INTO `tr_detail_nilai` (`id`, `id_siswa`, `id_sk`, `nilai`) VALUES
(80, 1, 2, 90),
(81, 1, 4, 70),
(82, 1, 6, 10),
(83, 1, 7, 100),
(84, 6, 5, 80),
(85, 6, 8, 40),
(86, 2, 2, 60),
(87, 2, 4, 75),
(88, 2, 6, 90),
(89, 2, 7, 50),
(90, 2, 9, 80),
(91, 4, 2, 40),
(92, 4, 4, 90),
(93, 4, 6, 40),
(94, 4, 7, 30),
(95, 4, 9, 70),
(96, 3, 5, 50),
(97, 3, 8, 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_guru`
--

CREATE TABLE IF NOT EXISTS `tr_guru` (
  `id_guru` int(5) NOT NULL AUTO_INCREMENT,
  `id_kp` int(5) NOT NULL,
  `nip_guru` varchar(20) NOT NULL,
  `nama_guru` varchar(15) NOT NULL,
  `alamat_guru` text NOT NULL,
  `telepon_guru` varchar(20) NOT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tr_guru`
--

INSERT INTO `tr_guru` (`id_guru`, `id_kp`, `nip_guru`, `nama_guru`, `alamat_guru`, `telepon_guru`) VALUES
(1, 2, '99127212', 'Ucup', 'Cimahi', '14045'),
(4, 5, '99-12345678', 'Sae', 'asdas', '(123) 123-123123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_kelas`
--

CREATE TABLE IF NOT EXISTS `tr_kelas` (
  `id_kelas` int(2) NOT NULL AUTO_INCREMENT,
  `id_kp` int(3) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `kelas_nama` int(2) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tr_kelas`
--

INSERT INTO `tr_kelas` (`id_kelas`, `id_kp`, `kelas`, `kelas_nama`) VALUES
(1, 1, 'X', 1),
(2, 1, 'XI', 5),
(3, 3, 'XII', 3),
(4, 1, 'XII', 5),
(5, 3, 'XII', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_kp_keahlian`
--

CREATE TABLE IF NOT EXISTS `tr_kp_keahlian` (
  `id_kp` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tr_kp_keahlian`
--

INSERT INTO `tr_kp_keahlian` (`id_kp`, `nama_kp`) VALUES
(1, 'RPL'),
(2, 'TKJ'),
(3, 'Animasi'),
(4, 'MM'),
(5, 'Bengkel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_login`
--

CREATE TABLE IF NOT EXISTS `tr_login` (
  `id_login` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(10) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `level` varchar(7) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tr_login`
--

INSERT INTO `tr_login` (`id_login`, `nama`, `nama_lengkap`, `username`, `password`, `foto`, `level`) VALUES
(1, 'tio', 'Tioreza Febrian', 'tio123', 'sikasik', 'tio.jpg', 'admin'),
(2, 'Guru', '', 'guru', 'guru', '', 'guru'),
(3, 'siswa', '', 'siswa', 'siswa', '', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_nilai`
--

CREATE TABLE IF NOT EXISTS `tr_nilai` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(5) NOT NULL,
  `id_guru` int(5) NOT NULL,
  `semester` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `tr_nilai`
--

INSERT INTO `tr_nilai` (`id`, `id_siswa`, `id_guru`, `semester`) VALUES
(23, 1, 1, 1),
(24, 6, 4, 1),
(25, 2, 1, 1),
(26, 4, 1, 1),
(27, 3, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_siswa`
--

CREATE TABLE IF NOT EXISTS `tr_siswa` (
  `id_siswa` int(5) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(3) NOT NULL,
  `id_ta` int(5) NOT NULL,
  `NISN` varchar(15) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tr_siswa`
--

INSERT INTO `tr_siswa` (`id_siswa`, `id_kelas`, `id_ta`, `NISN`, `nama`, `alamat`, `tgl_lahir`, `foto`, `status`) VALUES
(1, 1, 1, '99-1231231', 'Raditya', 'sadas', '19/02/1997', 'agent1.jpg', 1),
(2, 2, 1, '99-1231231', 'Gilang', 'sadas', '19/02/1997', 'agent5.jpg', 1),
(3, 3, 1, '99-1231231', 'Aurel', 'tes tes tes tes tes ', '10/03/1998', 'agent2.jpg', 1),
(4, 4, 2, '99-12312312', 'Wardani', 'sablengsableng sable', '19/02/1997', 'agent4.jpg', 1),
(6, 5, 2, '12-31231231', 'Bruce', 'tesagagatesagaga tes', '23/12/3123', 'agent9.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_standar_kompetensi`
--

CREATE TABLE IF NOT EXISTS `tr_standar_kompetensi` (
  `id_sk` int(5) NOT NULL AUTO_INCREMENT,
  `id_kp` int(5) NOT NULL,
  `nama_sk` varchar(50) NOT NULL,
  `kelas_sk` varchar(20) NOT NULL,
  PRIMARY KEY (`id_sk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `tr_standar_kompetensi`
--

INSERT INTO `tr_standar_kompetensi` (`id_sk`, `id_kp`, `nama_sk`, `kelas_sk`) VALUES
(1, 2, 'menguasai Jaringan', ''),
(2, 1, 'menguasai php', ''),
(4, 1, 'menguasai framework(CI,YII)', ''),
(5, 3, 'Menguasai software unity', ''),
(6, 1, 'Menguasai Javascript', ''),
(7, 1, 'Menguasai Ajax', ''),
(8, 3, 'Menguasai software Blender', ''),
(9, 1, 'Menguasai mysql', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_tahun_ajaran`
--

CREATE TABLE IF NOT EXISTS `tr_tahun_ajaran` (
  `id_ta` int(5) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(15) NOT NULL,
  PRIMARY KEY (`id_ta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tr_tahun_ajaran`
--

INSERT INTO `tr_tahun_ajaran` (`id_ta`, `tahun_ajaran`) VALUES
(1, '2014/2015'),
(2, '2015/2016');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
