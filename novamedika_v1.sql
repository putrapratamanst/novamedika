/*
SQLyog Community v12.2.0 (64 bit)
MySQL - 10.1.28-MariaDB : Database - novamedika_v1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `log` */

CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `log` */

insert  into `log`(`id`,`login_time`,`logout_time`,`user_id`) values 
(6,'2018-08-07 06:51:27','2018-08-07 10:51:33',3),
(7,'2018-08-07 06:52:03',NULL,1);

/*Table structure for table `migration` */

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values 
('m000000_000000_base',1520048178);

/*Table structure for table `pasien` */

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_rm` varchar(20) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `no_ktp` varchar(100) NOT NULL,
  `no_bpjs` varchar(100) DEFAULT NULL,
  `cara_bayar` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kategori_pasien` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `pasien` */

insert  into `pasien`(`id`,`no_rm`,`nama`,`no_ktp`,`no_bpjs`,`cara_bayar`,`tanggal_lahir`,`alamat`,`kategori_pasien`,`created_date`,`updated_date`) values 
(23,'R:0000001','RANGGA WHIKI PANGESTU','8839293948248324','1283929239232','0','1995-07-12','Kauman','prolanis','2018-08-07 16:18:06',NULL),
(24,'G:0004564','GAIB SRI SADHONO','3312024570912731','1283781273712','1','1965-11-11','Jl. Kauman, no 15, Klaten','non prolanis','2018-08-07 18:37:14',NULL);

/*Table structure for table `pekerja_medis` */

CREATE TABLE `pekerja_medis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pekerja_medis` */

insert  into `pekerja_medis`(`id`,`nama`,`posisi`,`username`,`password`,`user_id`) values 
(2,'Dokter Tama','1','doktertama81','XObCxcEZ',3);

/*Table structure for table `posisi` */

CREATE TABLE `posisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posisi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `posisi` */

insert  into `posisi`(`id`,`posisi`) values 
(1,'dokter'),
(2,'fisioterapis'),
(3,'bidan'),
(4,'perawat');

/*Table structure for table `tindakan` */

CREATE TABLE `tindakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) NOT NULL,
  `obat` text,
  `pemeriksaan_penunjang` text,
  `diagnosa` text,
  `terapi` text,
  `biaya` text,
  `status` varchar(100) DEFAULT NULL,
  `tindakan` text,
  `kategori_pasien_rawat_inap` varchar(200) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `id_pekerja_medis` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `rujukan` varchar(255) DEFAULT NULL,
  `kategori_pasien_rawat_jalan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pasien` (`id_pasien`),
  CONSTRAINT `tindakan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tindakan` */

insert  into `tindakan`(`id`,`id_pasien`,`obat`,`pemeriksaan_penunjang`,`diagnosa`,`terapi`,`biaya`,`status`,`tindakan`,`kategori_pasien_rawat_inap`,`tanggal_masuk`,`tanggal_keluar`,`id_pekerja_medis`,`created_date`,`updated_date`,`rujukan`,`kategori_pasien_rawat_jalan`) values 
(1,23,'ponstan','cabut gigi','sakit gigi',NULL,'120000','0','bersihkan karang gigi',NULL,'0000-00-00','0000-00-00',1,'2018-08-07 16:19:49',NULL,NULL,'LABORATORIUM'),
(2,23,'paracetamol','lumpuh','rawat',NULL,'120000','1','ganti kaki','visite','1992-02-12','2018-08-23',1,'2018-08-07 16:21:23',NULL,'',NULL),
(3,24,'Lansoprazole','-','Maag',NULL,'-','0','-',NULL,'0000-00-00','0000-00-00',1,'2018-08-07 18:40:36',NULL,NULL,'UMUM'),
(4,24,'Lanzoprazole','-','Maag',NULL,'-','0','-',NULL,NULL,NULL,1,'2018-08-07 18:42:24',NULL,NULL,'UMUM'),
(5,24,'- Lanzoprazole\r\n- Sanmag','USG','Maag Akut',NULL,'-','1','Rawat Inap 3 Hari','bpjs','2018-08-07','2018-08-10',1,'2018-08-07 18:45:51',NULL,'',NULL);

/*Table structure for table `user` */

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `is_login` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`user_id`,`name`,`password`,`user_type`,`is_login`) values 
(1,'admin','$2y$13$Gg2JcCqpaE5JRAohjN1KxupI7iHPPHiyqQED7hyanKM4tW/RGih5W','0',NULL),
(2,'dokteragus199','$2y$13$oQFfymoULtIdTMjTNSB4vu05oVkrsDpy3SBzBiatNfINoznUeeqaG','1',NULL),
(3,'doktertama81','$2y$13$egE4Pt6Ci.hQCVwwdOhucu03sJ/2D8Vp9o5wPlpXrUhs5vglj3ELO','1',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
