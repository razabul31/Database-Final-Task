
-- Database Backup --
-- Ver. : 1.0.1
-- Host : 127.0.0.1
-- Generating Time : Jul 27, 2022 at 17:15:37:PM


CREATE TABLE `faktur` (
  `NoFaktur` varchar(15) NOT NULL,
  `Tgl` date DEFAULT NULL,
  `NoKTP` decimal(15,0) DEFAULT NULL,
  `NoRangka` varchar(18) DEFAULT NULL,
  `IdPetugas` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`NoFaktur`),
  KEY `NoKTP` (`NoKTP`),
  KEY `NoRangka` (`NoRangka`),
  KEY `IdPetugas` (`IdPetugas`),
  CONSTRAINT `faktur_ibfk_1` FOREIGN KEY (`NoKTP`) REFERENCES `pemilik` (`NoKTP`),
  CONSTRAINT `faktur_ibfk_2` FOREIGN KEY (`NoRangka`) REFERENCES `motor` (`NoRangka`),
  CONSTRAINT `faktur_ibfk_3` FOREIGN KEY (`IdPetugas`) REFERENCES `petugas` (`IdPetugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO faktur VALUES
("FK/ABI/623969/R","2017-01-22","321701059960001","MH1JEFK217FK1R2266","AC0015805"),
("FK/ABI/823233/R","2017-07-17","321704140880001","MH1JEFK217FK1R3121","AC0015801"),
("FK/ABI/823643/R","2016-06-21","321702140130001","MH1JEFK217FK1R4423","AC0015893"),
("FK/ABI/823696/R","2017-01-13","321703120660001","MH1JEFK217FK1R3133","AC0015802");

CREATE TABLE `motor` (
  `NoRangka` varchar(18) NOT NULL,
  `IdType` varchar(14) DEFAULT NULL,
  `NamaVarian` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`NoRangka`),
  KEY `IdType` (`IdType`),
  CONSTRAINT `motor_ibfk_1` FOREIGN KEY (`IdType`) REFERENCES `type` (`IdType`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO motor VALUES
("MH1JEFK217FK1R2214","K1NO2NO4L0 M/T","BLADE 125 FI"),
("MH1JEFK217FK1R2266","K1NO2NO4NY M/T","JUPITER MX"),
("MH1JEFK217FK1R3121","A5C1BF1CB M/T","CB 150 R"),
("MH1JEFK217FK1R3133","D1I02N27S1 A/T","CB 150 R"),
("MH1JEFK217FK1R4423","KC11BF1CB A/T","VARIO 110");

CREATE TABLE `pemilik` (
  `NoKTP` decimal(15,0) NOT NULL,
  `NamaPemilik` varchar(20) DEFAULT NULL,
  `AlamatPemilik` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`NoKTP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pemilik VALUES
("111","ahmad","jL1"),
("321701059960001","RAKA DANARTA","Jl. Mangga No. 3"),
("321702140130001","WAHYUDIN ANWAR","Kp Kara Mandalasari"),
("321703120660001","AGUST WIYONO","Jl. Batununggal"),
("321704140260001","JAJANG NURJAMAN","Kp. Cihuni Mandalasari"),
("321704140880001","RITA JULI","Jl. Imam Bonjol Kel. Alai Gelo");

CREATE TABLE `petugas` (
  `IdPetugas` varchar(9) NOT NULL,
  `NamaPetugas` varchar(17) DEFAULT NULL,
  `AlamatPetugas` varchar(30) DEFAULT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`IdPetugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO petugas VALUES
("AC0015801","David Sudiana","Jl. Srigunting Raya",""),
("AC0015802","Udin Supriatna","Jl. A H Nasution",""),
("AC0015805","Hartono ","Jl. Melati No. 2",""),
("AC0015893","Tatang Supratna","Jln. Leuwipanjang Kebonlega II",""),
("admin","Admin","Jl. Jalan","admin");

CREATE TABLE `type` (
  `IdType` varchar(14) NOT NULL,
  `NoMesin` varchar(17) DEFAULT NULL,
  `IsiSilinder` varchar(5) DEFAULT NULL,
  `Warna` varchar(9) DEFAULT NULL,
  `TahunPembuatan` int(4) DEFAULT NULL,
  `Harga` int(9) DEFAULT NULL,
  PRIMARY KEY (`IdType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO type VALUES
("A5C1BF1CB M/T","JFE1E - 1191866","124.8","PUTIH","2013","11998500"),
("D1I02N27S1 A/T","JFE1E - 1191821","124.8","HITAM","2017","11998500"),
("K1NO2NO4L0 M/T","JFE2E - 1203871","109.2","MERAH","2015","9223600"),
("K1NO2NO4NY M/T","MFE2E - 2209861","134.4","HIJAU","2016","15185000"),
("KC11BF1CB A/T","JFE3E - 1344821","108","BIRU","2014","8774200");