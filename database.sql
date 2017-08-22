CREATE TABLE `admin` (
  `id_admin` tinyint UNSIGNED NOT NULL auto_increment,
  `username` varchar(10) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM;

CREATE TABLE `siswa` (
	`nis` smallint UNSIGNED NOT NULL,
	`nama_siswa` varchar(50) NOT NULL,
	`id_kelas` tinyint UNSIGNED NOT NULL,
	`id_matpelpil` tinyint UNSIGNED NOT NULL,
	PRIMARY KEY (`nis`)
) ENGINE=MyISAM;

CREATE TABLE `matpel` (
  `id_matpel` tinyint UNSIGNED NOT NULL,
  `nama_matpel` varchar(20) NOT NULL UNIQUE,
  PRIMARY KEY (`id_matpel`)
) ENGINE=MyISAM;

CREATE TABLE `nilai` (
  `id_nilai` tinyint UNSIGNED NOT NULL auto_increment,
  `nis` smallint UNSIGNED NOT NULL,
  `id_matpel` tinyint UNSIGNED NOT NULL,
  `jumlah` real UNSIGNED NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=MyISAM;

CREATE TABLE `kelas` (
	`id_kelas` tinyint UNSIGNED NOT NULL auto_increment,
	`nama_kelas` varchar(10) NOT NULL UNIQUE,
	`jurusan` tinyint UNSIGNED NOT NULL,
	PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM;

INSERT INTO matpel VALUES (1, 'FIS');
INSERT INTO matpel VALUES (2, 'BIO');
INSERT INTO matpel VALUES (3, 'KIM');
INSERT INTO matpel VALUES (4, 'GEO');
INSERT INTO matpel VALUES (5, 'SOS');
INSERT INTO matpel VALUES (6, 'EKO');
INSERT INTO matpel VALUES (7, 'BIN');
INSERT INTO matpel VALUES (8, 'BIG');
INSERT INTO matpel VALUES (9, 'MAT');
INSERT INTO matpel VALUES (10, 'AGM');
INSERT INTO matpel VALUES (11, 'PKN');
INSERT INTO matpel VALUES (12, 'SEJ');
INSERT INTO matpel VALUES (13, 'SBD');
INSERT INTO matpel VALUES (14, 'OR');
INSERT INTO matpel VALUES (15, 'BJ');
INSERT INTO matpel VALUES (16, 'TIK');

INSERT INTO kelas VALUES (1, 'XII-IPA 1', 1);
INSERT INTO kelas VALUES (2, 'XII-IPA 2', 1);
INSERT INTO kelas VALUES (3, 'XII-IPA 3', 1);
INSERT INTO kelas VALUES (4, 'XII-IPA 4', 1);
INSERT INTO kelas VALUES (5, 'XII-IPA 5', 1);
INSERT INTO kelas VALUES (6, 'XII-IPA 6', 1);
INSERT INTO kelas VALUES (7, 'XII-IPS 1', 2);
INSERT INTO kelas VALUES (8, 'XII-IPS 2', 2);
INSERT INTO kelas VALUES (9, 'XII-IPS 3', 2);
INSERT INTO kelas VALUES (10, 'XII-IPS 4', 2);
INSERT INTO kelas VALUES (11, 'XII-IPS 5', 2);
INSERT INTO kelas VALUES (12, 'XII-IPS 6', 2);

INSERT INTO siswa VALUES (1231, 'Susi', 1, 1);

INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 1, 75);
INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 2, 78);
INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 3, 80);
INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 4, 90);
INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 5, 80);
INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 6, 82);
INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 7, 85);
INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 8, 89);
INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 9, 90);
INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 10, 100);
INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 11, 80);
INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 12, 80);
INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 13, 90);
INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 14, 80);
INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 15, 80);
INSERT INTO nilai(nis, id_matpel, jumlah) VALUES (1231, 16, 70);

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$bKgkQB3oDflFwkdkub.iJ.ykY82SerFFEMjP39nh07Rqey03zn4Rq');