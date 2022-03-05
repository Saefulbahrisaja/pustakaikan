-- MySQL dump 10.19  Distrib 10.3.31-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db_fishpedia
-- ------------------------------------------------------
-- Server version	10.3.31-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin`
--

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` VALUES (1,'Admin','admin','$2y$10$gM65guT8lvkmUy7nbqcyLO3E5E7dq8i39pmHhjXMwQQI1VVMhe7Ky');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_famili`
--

DROP TABLE IF EXISTS `tb_famili`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_famili` (
  `id_famili` int(11) NOT NULL AUTO_INCREMENT,
  `famili` varchar(60) NOT NULL,
  PRIMARY KEY (`id_famili`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_famili`
--

LOCK TABLES `tb_famili` WRITE;
/*!40000 ALTER TABLE `tb_famili` DISABLE KEYS */;
INSERT INTO `tb_famili` VALUES (1,'Cichlidae'),(2,'Cyprinidae'),(3,'Chanidae'),(4,'Osteoglossidae (Bonytongues)'),(5,'Melanotaeniidae');
/*!40000 ALTER TABLE `tb_famili` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_genus`
--

DROP TABLE IF EXISTS `tb_genus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_genus` (
  `id_genus` int(11) NOT NULL AUTO_INCREMENT,
  `genus` varchar(60) NOT NULL,
  PRIMARY KEY (`id_genus`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_genus`
--

LOCK TABLES `tb_genus` WRITE;
/*!40000 ALTER TABLE `tb_genus` DISABLE KEYS */;
INSERT INTO `tb_genus` VALUES (1,'Cyprinus'),(2,'Oreochromis'),(3,'Chanos'),(4,'Rasbora'),(5,'Sclerophagus'),(6,'Melanotaenia');
/*!40000 ALTER TABLE `tb_genus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_ikan`
--

DROP TABLE IF EXISTS `tb_ikan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_ikan` (
  `kd_ikan` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_post` date NOT NULL DEFAULT current_timestamp(),
  `nama_ikan` varchar(255) NOT NULL,
  `nama_ilmiah` varchar(100) NOT NULL,
  `id_genus` int(11) NOT NULL,
  `id_spesies` int(11) NOT NULL,
  `id_ordo` int(11) NOT NULL,
  `id_famili` int(11) NOT NULL,
  `id_sebaran` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `kd_kategori` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  PRIMARY KEY (`kd_ikan`),
  KEY `id_famili` (`id_famili`),
  KEY `id_genus` (`id_genus`),
  KEY `id_spesies` (`id_spesies`),
  KEY `id_ordo` (`id_ordo`),
  KEY `id_sebaran` (`id_sebaran`),
  KEY `kd_kategori` (`kd_kategori`),
  CONSTRAINT `tb_ikan_ibfk_1` FOREIGN KEY (`id_famili`) REFERENCES `tb_famili` (`id_famili`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_ikan_ibfk_2` FOREIGN KEY (`id_genus`) REFERENCES `tb_genus` (`id_genus`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_ikan_ibfk_3` FOREIGN KEY (`id_spesies`) REFERENCES `tb_spesies` (`id_spesies`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_ikan_ibfk_4` FOREIGN KEY (`id_ordo`) REFERENCES `tb_ordo` (`id_ordo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_ikan_ibfk_6` FOREIGN KEY (`kd_kategori`) REFERENCES `tb_kategori` (`kd_kategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ikan`
--

LOCK TABLES `tb_ikan` WRITE;
/*!40000 ALTER TABLE `tb_ikan` DISABLE KEYS */;
INSERT INTO `tb_ikan` VALUES (1,'2022-01-31','Nila','Oreo Cromis',2,1,1,1,1,'Ikan nila adalah sejenis ikan konsumsi air tawar. Ikan ini diintroduksi dari Afrika, tepatnya Afrika bagian timur, pada tahun 1969, dan kini menjadi ikan peliharaan yang populer di kolam-kolam air tawar di Indonesia sekaligus hama di setiap sungai dan danau Indonesia. Nama ilmiahnya adalah Oreochromis niloticus, dan dalam bahasa Inggris dikenal sebagai Nile Tilapia.','https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Oreo_nilo_071011-0507_F_jtg.jpg/250px-Oreo_nilo_071011-0507_F_jtg.jpg',1,1,0),(3,'2022-01-31','Silver Sea Bream','-',1,1,1,2,1,'Di luar Indonesia, ikan yang memiliki nama latin Pagrus auratus bisa juga ditemukan di sepanjang pantai Selandia Baru, Australia dan kepulauan Tasmania. Silver Sea bream lebih suka bertelur di perairan yang kedalamannya tak lebih dari 50 meter.\r\n\r\nIkan dewasa bisa ditemukan di kelompok yang besar. Ikan jenis ini hidup di daerah berbatu dan karang setinggi kira-kira 200 meter, yang menjadi tempat bermigrasi. Ikan yang lebih besar bisa ditemukan di muara dan pelabuhan.\r\n\r\nIkan-ikan ini tumbuh sampai panjang 30 sentimeter dan pada tahap itu ikan sudah mencapai kematangan seksual. Silver bream bisa hidup sampai 40 tahun. Saat sudah mencapai kedewasaan seksual, sebagian kecil jantan berubah menjadi betina, sementara ikan dewasa dengan dua jenis kelamin akan memiliki benjolan di kepala.','https://bacaterus.com/wp-content/uploads/2020/01/Silver-Sea-bream-Copy.webp',2,1,0),(4,'2022-01-31','Seluang','Rasbora argyrotaenia',4,3,1,2,1,'Ikan seluang mirip dengan ikan belida. Ikan ini umumnya banyak ditemukan di Sungai Musi, di wilayah Provinsi Sumatera Selatan. Namun ikan ini juga bisa ditemukan di negara Asia lainnya, seperti Singapura dan Malaysia. Di negara tersebut umumnya orang-orang menyimpan Ikan Seluang di tangki akuarium sebagai ikan hias.\r\n\r\nBerbeda dengan orang-orang di Sumatera Selatan dan bagian lain dari Sumatera, contohnya Jambi, mereka mengkonsumsi ikan Seluang sebagai lauk. Biasanya jenis ikan ini akan dimasak menggunakan santan atau dibungkus dengan menggunakan daun pisang.','https://bacaterus.com/wp-content/uploads/2020/01/Seluang-Copy.webp',1,1,0),(5,'2022-01-31','Arwana','Sclerogphagus formosus',5,4,3,4,1,'Asian Bonytongue alias Dragonfish atau orang banyak mengenalnya dengan nama Ikan Arwana, pada tahun 2009 oleh Kementerian Kelautan dan Perikanan diklasifikasikan sebagai spesies ikan langka. Sebenarnya, ikan jenis ini tidak bisa dikonsumsi sebagai lauk, sebaliknya ikan ini justru bisa dipelihara di akuarium air tawar.\r\n\r\nIkan air tawar ini merupakan salah satu spesies ikan tertua. Sebagian besar ikan Asian bonytongue umumnya ditemukan di Palembang, Lampung, Bangka-Belitung, Riau juga Kalimantan Barat. Ikan ini dibagi menjadi empat varian berdasarkan warnanya; merah, hijau, emas dengan ekor emas dan merah. Ikan yang berwarna hijau Asia ditemukan di Indonesia, Malaysia, Thailand, Myanmar dan Vietnam.\r\n\r\nArwana Asia merah biasa ditemukan di Indonesia. Sementara itu ikan arwana Asia yang memiliki warna emas dengan ekor berwarna merah, hanya bisa ditemukan di Indonesia. Ikan arwana Asia berwarna emas terakhir bisa ditemukan di Malaysia.','https://bacaterus.com/wp-content/uploads/2020/01/Arwana-Bonytongue-Asia-Copy.webp',1,1,0),(6,'2022-06-25','Bandeng/Milkfish','Chanos chanos',3,2,2,3,1,'Ikan bandeng (Chanos chanos) adalah ikan pangan populer di Asia Tenggara. Ikan ini merupakan satu-satunya spesies yang masih ada dalam suku Chanidae (bersama enam genus tambahan yang dilaporkan pernah ada namun sudah punah).[1] Dalam bahasa Bugis dan Makassar dikenal sebagai ikan bolu, dan dalam bahasa Inggris milkfish)\r\n\r\nMereka hidup di Samudra Hindia dan Samudra Pasifik dan cenderung berkawanan di sekitar pesisir dan pulau-pulau dengan terumbu koral. Ikan yang muda dan baru menetas hidup di laut selama 2–3 minggu, lalu berpindah ke rawa-rawa bakau berair payau, dan kadang kala danau-danau berair asin. Bandeng baru kembali ke laut kalau sudah dewasa dan bisa berkembang biak.\r\n\r\nIkan muda disebut nener (IPA : nənər ) dikumpulkan orang dari sungai-sungai dan dibesarkan di tambak-tambak. Di sana mereka bisa diberi makanan apa saja dan tumbuh dengan cepat. Setelah cukup besar (biasanya sekitar 25–30 cm) bandeng dijual dalam keadaan segar atau sudah dibekukan. Bandeng diolah dengan cara digoreng, dibakar, dikukus, dipindang, atau diasap.','https://ilmubudidaya.com/wp-content/uploads/2018/04/Manfaat-Ikan-Bandeng-e1508141110827.jpg',3,1,0),(7,'2022-02-17','Ikan Mas','Ciprinus caprio L',1,1,1,2,1,'Ikan ini bukan asli indonesia','ss',1,1,1),(9,'2022-02-21','Rainbow Bosemani','Melanotaenia Bosemani',6,5,4,5,1,'Ikan rainbow boesemani merupakan salah satu ikan hias air tawar yang memiliki warna yang cemerlang. Ikan yang berasal dari Thailand ini merupakan jenis ikan omnivora atau ikan pemakan segala. Pada habitat aslinya ikan ini biasa hidup pada pH 7-8 dengan suhu air 22-25 derajar celcius. Ikan rainbow boesemani dewasa dapat hidup hingga mencapai panjang 10 cm.','http://news.unair.ac.id/wp-content/uploads/2020/05/Ilustrasi-oleh-infoikan-com-1.jpg',1,1,1);
/*!40000 ALTER TABLE `tb_ikan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kategori`
--

DROP TABLE IF EXISTS `tb_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kategori` (
  `kd_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kategori`
--

LOCK TABLES `tb_kategori` WRITE;
/*!40000 ALTER TABLE `tb_kategori` DISABLE KEYS */;
INSERT INTO `tb_kategori` VALUES (1,'Ikan Air Tawar'),(2,'Ikan Air Asin'),(3,'Ikan Air Payau');
/*!40000 ALTER TABLE `tb_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_ordo`
--

DROP TABLE IF EXISTS `tb_ordo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_ordo` (
  `id_ordo` int(11) NOT NULL AUTO_INCREMENT,
  `ordo` varchar(60) NOT NULL,
  PRIMARY KEY (`id_ordo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ordo`
--

LOCK TABLES `tb_ordo` WRITE;
/*!40000 ALTER TABLE `tb_ordo` DISABLE KEYS */;
INSERT INTO `tb_ordo` VALUES (1,'Cypriniformes'),(2,'Gonorynchiformes'),(3,'Malacopterygii'),(4,'Atheriniformes');
/*!40000 ALTER TABLE `tb_ordo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_sebaran`
--

DROP TABLE IF EXISTS `tb_sebaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_sebaran` (
  `id_sebaran` int(11) NOT NULL AUTO_INCREMENT,
  `kd_ikan` int(11) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `deskripsi_sebaran` text NOT NULL,
  PRIMARY KEY (`id_sebaran`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sebaran`
--

LOCK TABLES `tb_sebaran` WRITE;
/*!40000 ALTER TABLE `tb_sebaran` DISABLE KEYS */;
INSERT INTO `tb_sebaran` VALUES (1,1,107.7077298970057,-6.891811356109458,'Hampir diseluruh perairan di indonesia'),(2,4,103.5394866,-1.610435,'Jambi'),(3,1,-3.9832536,12.6606714,'Republic Democtratic Kongo'),(4,4,104.6228726,-2.9549597,'Sungai Musi Sumarta Selatan'),(7,4,103.7041581,1.3139961,'Singapura'),(8,4,100.5488534,4.0890462,'Malaysia'),(9,1,-70.7298925,-1.6235821,'Sungai Amazone'),(10,8,-8.7111206,-0.9910388,'Pesisir Afrika'),(11,8,100,29,'Pesisir Asia'),(12,8,150.6517771,-33.8473566,'Pesisir Australia'),(14,6,105.4061752,-7.2948934,'Menyebar di samudra hindia, pada air laut dan air payau'),(15,6,-135.7889107,-29.5186913,'Laut pasifik '),(16,5,114.4943702,-3.2750454,'Banjar kalimanatan selatan'),(17,5,138.4935746,-6.3536134,'Sunagi Digul Papua'),(18,9,138.6615402,-5.1891277,'Endemik papua'),(19,9,132.1893232,-1.2371545,'Danao Framu Ayamaru papua');
/*!40000 ALTER TABLE `tb_sebaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_spesies`
--

DROP TABLE IF EXISTS `tb_spesies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_spesies` (
  `id_spesies` int(11) NOT NULL AUTO_INCREMENT,
  `spesies` varchar(60) NOT NULL,
  PRIMARY KEY (`id_spesies`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_spesies`
--

LOCK TABLES `tb_spesies` WRITE;
/*!40000 ALTER TABLE `tb_spesies` DISABLE KEYS */;
INSERT INTO `tb_spesies` VALUES (1,'Cyprinus carpio'),(2,'Chanos chanos'),(3,'Rasbora argyrotaenia'),(4,'Sclerogphagus formosus'),(5,'Melanotaenia Bosemani');
/*!40000 ALTER TABLE `tb_spesies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_wilayah`
--

DROP TABLE IF EXISTS `tb_wilayah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_wilayah` (
  `id_wilayah` int(11) NOT NULL AUTO_INCREMENT,
  `long` varchar(60) NOT NULL,
  `lat` varchar(60) NOT NULL,
  `id_sebaran` int(11) NOT NULL,
  PRIMARY KEY (`id_wilayah`),
  KEY `id_sebaran` (`id_sebaran`),
  CONSTRAINT `tb_wilayah_ibfk_1` FOREIGN KEY (`id_sebaran`) REFERENCES `tb_sebaran` (`id_sebaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_wilayah`
--

LOCK TABLES `tb_wilayah` WRITE;
/*!40000 ALTER TABLE `tb_wilayah` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_wilayah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitor`
--

DROP TABLE IF EXISTS `visitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitor` (
  `ip` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `hits` int(11) NOT NULL,
  `online` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitor`
--

LOCK TABLES `visitor` WRITE;
/*!40000 ALTER TABLE `visitor` DISABLE KEYS */;
INSERT INTO `visitor` VALUES ('127.0.0.1','2022-02-24',105,'1645693986','2022-02-24 13:20:21'),('127.0.0.1','2022-03-05',34,'1646494043','2022-03-05 16:57:28');
/*!40000 ALTER TABLE `visitor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-05 22:28:27
