/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.3.16-MariaDB : Database - buku_tamu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `data` */

DROP TABLE IF EXISTS `data`;

CREATE TABLE `data` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `asal` varchar(500) DEFAULT NULL,
  `keperluan` varchar(500) DEFAULT NULL,
  `surat_tugas` varchar(100) DEFAULT NULL,
  `jenis` enum('1','2','3','4') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data` */

/*Table structure for table `data_tamu` */

DROP TABLE IF EXISTS `data_tamu`;

CREATE TABLE `data_tamu` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `data_id` int(5) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `no_telp` varchar(100) DEFAULT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `pekerjaan` varchar(500) DEFAULT NULL,
  `ttd` varchar(500) DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL,
  KEY `id` (`id`),
  KEY `data_id` (`data_id`),
  CONSTRAINT `data_tamu_ibfk_1` FOREIGN KEY (`data_id`) REFERENCES `data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_tamu` */

/*Table structure for table `informasi` */

DROP TABLE IF EXISTS `informasi`;

CREATE TABLE `informasi` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `data_id` int(5) DEFAULT NULL,
  `nomor_pendaftaran` varchar(50) DEFAULT NULL,
  `jenis_permohonan` enum('B','K') DEFAULT NULL,
  `instansi` enum('ya','tidak') DEFAULT NULL,
  `dokumentasi` enum('sudah','belum') DEFAULT NULL,
  `bentuk_informasi` enum('cetak','elektronik') DEFAULT NULL,
  `keputusan_ppid` enum('diterima','ditolak') DEFAULT NULL,
  `alasan_ppid` varchar(100) DEFAULT NULL,
  `biaya` decimal(20,0) DEFAULT NULL,
  `tgl_pemberian_jawaban` date DEFAULT NULL,
  `tgl_pemberian_informasi` date DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `informasi` */

/*Table structure for table `jenis_tamu` */

DROP TABLE IF EXISTS `jenis_tamu`;

CREATE TABLE `jenis_tamu` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_tamu` */

insert  into `jenis_tamu`(`id`,`nama`) values 
(1,'Berkunjung'),
(2,'Janji Bertemu'),
(3,'Permintaan Informasi'),
(4,'Lainnya');

/*Table structure for table `ttd` */

DROP TABLE IF EXISTS `ttd`;

CREATE TABLE `ttd` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `file` varchar(200) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `data_id` int(5) DEFAULT NULL,
  `tamu_id` int(5) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ttd` */

insert  into `ttd`(`id`,`file`,`status`,`data_id`,`tamu_id`) values 
(1,'rhoma_32_36',1,32,36);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
