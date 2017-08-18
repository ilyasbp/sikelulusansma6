CREATE TABLE `admin` (
  `id_admin` int NOT NULL auto_increment,
  `username_admin` varchar(30) NOT NULL UNIQUE,
  `password_admin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM;

CREATE TABLE `siswa` (
	`nis` int NOT NULL,
	`nama` varchar(40) NOT NULL,
	`id_kelas` int NOT NULL,
	`bin` real NOT NULL,
	`big` real NOT NULL,
	`mat` real NOT NULL,
	`nilpelpil` real NOT NULL,
	`id_matpelpil` int NOT NULL,
	PRIMARY KEY (`nis`)
) ENGINE=MyISAM;

CREATE TABLE `matpelpil` (
  `id_matpelpil` int NOT NULL,
  `nama_matpelpil` varchar(30) NOT NULL,
  PRIMARY KEY (`id_matpelpil`)
) ENGINE=MyISAM;

CREATE TABLE `kelas` (
	`id_kelas` int NOT NULL auto_increment,
	`nama_kelas` varchar(10),
	PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM;

INSERT INTO matpelpil VALUES (1, 'Fisika');
INSERT INTO matpelpil VALUES (2, 'Biologi');
INSERT INTO matpelpil VALUES (3, 'Kimia');
INSERT INTO matpelpil VALUES (4, 'Geografi');
INSERT INTO matpelpil VALUES (5, 'Sosiologi');
INSERT INTO matpelpil VALUES (6, 'Ekonomi');

INSERT INTO siswa VALUES (1234, 'Susi', 1, 100, 80, 77.5, 90, 1);
INSERT INTO siswa VALUES (1235, 'Pam', 2, 90, 80, 70, 90, 2);
INSERT INTO siswa VALUES (1236, 'Koni', 3, 70, 80, 70, 90, 3);
INSERT INTO siswa VALUES (1237, 'Pali', 7, 80, 80, 70, 90, 4);
INSERT INTO siswa VALUES (1238, 'Kuni', 8, 100, 80, 70, 90, 5);
INSERT INTO siswa VALUES (1239, 'Kuna', 9, 85, 80, 70, 90, 6);

INSERT INTO kelas VALUES (1, 'XII-MIA 1');
INSERT INTO kelas VALUES (2, 'XII-MIA 2');
INSERT INTO kelas VALUES (3, 'XII-MIA 3');
INSERT INTO kelas VALUES (4, 'XII-MIA 4');
INSERT INTO kelas VALUES (5, 'XII-MIA 5');
INSERT INTO kelas VALUES (6, 'XII-MIA 6');
INSERT INTO kelas VALUES (7, 'XII-IIS 1');
INSERT INTO kelas VALUES (8, 'XII-IIS 2');
INSERT INTO kelas VALUES (9, 'XII-IIS 3');
INSERT INTO kelas VALUES (10, 'XII-IIS 4');
INSERT INTO kelas VALUES (11, 'XII-IIS 5');
INSERT INTO kelas VALUES (12, 'XII-IIS 6');

