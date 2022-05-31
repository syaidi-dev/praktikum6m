-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for praktikum_daftartugas6m
CREATE DATABASE IF NOT EXISTS `praktikum_daftartugas6m` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `praktikum_daftartugas6m`;

-- Dumping structure for table praktikum_daftartugas6m.dosen
CREATE TABLE IF NOT EXISTS `dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(255) NOT NULL,
  `handphone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table praktikum_daftartugas6m.dosen: ~2 rows (approximately)
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` (`id`, `nama_dosen`, `handphone`, `email`) VALUES
	(1, 'Alamsyah', '08112345678', 'alamsyah@gmail.com'),
	(2, 'Yogy Mirza', '0812345690', 'yogy.mirza@gmail.com'),
	(3, 'Zainuddin', '08132123111', 'zainuddin@gmail.com');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;

-- Dumping structure for table praktikum_daftartugas6m.matakuliah
CREATE TABLE IF NOT EXISTS `matakuliah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_matakuliah` varchar(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `dosen_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table praktikum_daftartugas6m.matakuliah: ~0 rows (approximately)
/*!40000 ALTER TABLE `matakuliah` DISABLE KEYS */;
INSERT INTO `matakuliah` (`id`, `nama_matakuliah`, `hari`, `jam`, `dosen_id`) VALUES
	(2, 'Metodologi Penelitian', 'Selasa', '20:40', 1);
/*!40000 ALTER TABLE `matakuliah` ENABLE KEYS */;

-- Dumping structure for table praktikum_daftartugas6m.pengguna
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `nama_lengkap` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table praktikum_daftartugas6m.pengguna: ~0 rows (approximately)
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` (`id`, `email`, `password`, `nama_lengkap`) VALUES
	(0, 'syaidi.muhammad@gmail.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'M.Syaidi'),
	(1, 'admin@gmail.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin');
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;

-- Dumping structure for table praktikum_daftartugas6m.tugas
CREATE TABLE IF NOT EXISTS `tugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tugas` varchar(255) NOT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table praktikum_daftartugas6m.tugas: ~2 rows (approximately)
/*!40000 ALTER TABLE `tugas` DISABLE KEYS */;
INSERT INTO `tugas` (`id`, `nama_tugas`, `matakuliah_id`, `keterangan`, `deadline`) VALUES
	(1, 'Membuat Makalah Penelitian', 1, 'Cari Jurnal tentang judul makalah', 'Rabu 01 Juni 2022');
/*!40000 ALTER TABLE `tugas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
