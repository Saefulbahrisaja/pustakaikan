-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2022 at 03:17 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fishpedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_famili`
--

CREATE TABLE `tb_famili` (
  `id_famili` int(11) NOT NULL,
  `famili` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_famili`
--

INSERT INTO `tb_famili` (`id_famili`, `famili`) VALUES
(1, 'Cichlidae'),
(2, 'Cyprinidae'),
(3, 'Chanidae'),
(4, 'Osteoglossidae (Bonytongues)'),
(5, 'Melanotaeniidae');

-- --------------------------------------------------------

--
-- Table structure for table `tb_genus`
--

CREATE TABLE `tb_genus` (
  `id_genus` int(11) NOT NULL,
  `genus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_genus`
--

INSERT INTO `tb_genus` (`id_genus`, `genus`) VALUES
(1, 'Cyprinus'),
(2, 'Oreochromis'),
(3, 'Chanos'),
(4, 'Rasbora'),
(5, 'Sclerophagus'),
(6, 'Melanotaenia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ikan`
--

CREATE TABLE `tb_ikan` (
  `kd_ikan` int(11) NOT NULL,
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
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ikan`
--

INSERT INTO `tb_ikan` (`kd_ikan`, `tgl_post`, `nama_ikan`, `nama_ilmiah`, `id_genus`, `id_spesies`, `id_ordo`, `id_famili`, `id_sebaran`, `deskripsi`, `photo`, `kd_kategori`, `id_user`, `views`) VALUES
(1, '2022-01-31', 'Nila', 'Oreo Cromis', 2, 1, 1, 1, 1, 'Ikan nila adalah sejenis ikan konsumsi air tawar. Ikan ini diintroduksi dari Afrika, tepatnya Afrika bagian timur, pada tahun 1969, dan kini menjadi ikan peliharaan yang populer di kolam-kolam air tawar di Indonesia sekaligus hama di setiap sungai dan danau Indonesia. Nama ilmiahnya adalah Oreochromis niloticus, dan dalam bahasa Inggris dikenal sebagai Nile Tilapia.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Oreo_nilo_071011-0507_F_jtg.jpg/250px-Oreo_nilo_071011-0507_F_jtg.jpg', 1, 1, 0),
(3, '2022-01-31', 'Silver Sea Bream', '-', 1, 1, 1, 2, 1, 'Di luar Indonesia, ikan yang memiliki nama latin Pagrus auratus bisa juga ditemukan di sepanjang pantai Selandia Baru, Australia dan kepulauan Tasmania. Silver Sea bream lebih suka bertelur di perairan yang kedalamannya tak lebih dari 50 meter.\r\n\r\nIkan dewasa bisa ditemukan di kelompok yang besar. Ikan jenis ini hidup di daerah berbatu dan karang setinggi kira-kira 200 meter, yang menjadi tempat bermigrasi. Ikan yang lebih besar bisa ditemukan di muara dan pelabuhan.\r\n\r\nIkan-ikan ini tumbuh sampai panjang 30 sentimeter dan pada tahap itu ikan sudah mencapai kematangan seksual. Silver bream bisa hidup sampai 40 tahun. Saat sudah mencapai kedewasaan seksual, sebagian kecil jantan berubah menjadi betina, sementara ikan dewasa dengan dua jenis kelamin akan memiliki benjolan di kepala.', 'https://bacaterus.com/wp-content/uploads/2020/01/Silver-Sea-bream-Copy.webp', 2, 1, 0),
(4, '2022-01-31', 'Seluang', 'Rasbora argyrotaenia', 4, 3, 1, 2, 1, 'Ikan seluang mirip dengan ikan belida. Ikan ini umumnya banyak ditemukan di Sungai Musi, di wilayah Provinsi Sumatera Selatan. Namun ikan ini juga bisa ditemukan di negara Asia lainnya, seperti Singapura dan Malaysia. Di negara tersebut umumnya orang-orang menyimpan Ikan Seluang di tangki akuarium sebagai ikan hias.\r\n\r\nBerbeda dengan orang-orang di Sumatera Selatan dan bagian lain dari Sumatera, contohnya Jambi, mereka mengkonsumsi ikan Seluang sebagai lauk. Biasanya jenis ikan ini akan dimasak menggunakan santan atau dibungkus dengan menggunakan daun pisang.', 'https://bacaterus.com/wp-content/uploads/2020/01/Seluang-Copy.webp', 1, 1, 0),
(5, '2022-01-31', 'Arwana', 'Sclerogphagus formosus', 5, 4, 3, 4, 1, 'Asian Bonytongue alias Dragonfish atau orang banyak mengenalnya dengan nama Ikan Arwana, pada tahun 2009 oleh Kementerian Kelautan dan Perikanan diklasifikasikan sebagai spesies ikan langka. Sebenarnya, ikan jenis ini tidak bisa dikonsumsi sebagai lauk, sebaliknya ikan ini justru bisa dipelihara di akuarium air tawar.\r\n\r\nIkan air tawar ini merupakan salah satu spesies ikan tertua. Sebagian besar ikan Asian bonytongue umumnya ditemukan di Palembang, Lampung, Bangka-Belitung, Riau juga Kalimantan Barat. Ikan ini dibagi menjadi empat varian berdasarkan warnanya; merah, hijau, emas dengan ekor emas dan merah. Ikan yang berwarna hijau Asia ditemukan di Indonesia, Malaysia, Thailand, Myanmar dan Vietnam.\r\n\r\nArwana Asia merah biasa ditemukan di Indonesia. Sementara itu ikan arwana Asia yang memiliki warna emas dengan ekor berwarna merah, hanya bisa ditemukan di Indonesia. Ikan arwana Asia berwarna emas terakhir bisa ditemukan di Malaysia.', 'https://bacaterus.com/wp-content/uploads/2020/01/Arwana-Bonytongue-Asia-Copy.webp', 1, 1, 0),
(6, '2022-06-25', 'Bandeng/Milkfish', 'Chanos chanos', 3, 2, 2, 3, 1, 'Ikan bandeng (Chanos chanos) adalah ikan pangan populer di Asia Tenggara. Ikan ini merupakan satu-satunya spesies yang masih ada dalam suku Chanidae (bersama enam genus tambahan yang dilaporkan pernah ada namun sudah punah).[1] Dalam bahasa Bugis dan Makassar dikenal sebagai ikan bolu, dan dalam bahasa Inggris milkfish)\r\n\r\nMereka hidup di Samudra Hindia dan Samudra Pasifik dan cenderung berkawanan di sekitar pesisir dan pulau-pulau dengan terumbu koral. Ikan yang muda dan baru menetas hidup di laut selama 2–3 minggu, lalu berpindah ke rawa-rawa bakau berair payau, dan kadang kala danau-danau berair asin. Bandeng baru kembali ke laut kalau sudah dewasa dan bisa berkembang biak.\r\n\r\nIkan muda disebut nener (IPA : nənər ) dikumpulkan orang dari sungai-sungai dan dibesarkan di tambak-tambak. Di sana mereka bisa diberi makanan apa saja dan tumbuh dengan cepat. Setelah cukup besar (biasanya sekitar 25–30 cm) bandeng dijual dalam keadaan segar atau sudah dibekukan. Bandeng diolah dengan cara digoreng, dibakar, dikukus, dipindang, atau diasap.', 'https://ilmubudidaya.com/wp-content/uploads/2018/04/Manfaat-Ikan-Bandeng-e1508141110827.jpg', 3, 1, 0),
(7, '2022-02-17', 'Ikan Mas', 'Ciprinus caprio L', 1, 1, 1, 2, 1, 'Ikan ini bukan asli indonesia', 'ss', 1, 1, 1),
(9, '2022-02-21', 'Rainbow Bosemani', 'Melanotaenia Bosemani', 6, 5, 4, 5, 1, 'Ikan rainbow boesemani merupakan salah satu ikan hias air tawar yang memiliki warna yang cemerlang. Ikan yang berasal dari Thailand ini merupakan jenis ikan omnivora atau ikan pemakan segala. Pada habitat aslinya ikan ini biasa hidup pada pH 7-8 dengan suhu air 22-25 derajar celcius. Ikan rainbow boesemani dewasa dapat hidup hingga mencapai panjang 10 cm.', 'http://news.unair.ac.id/wp-content/uploads/2020/05/Ilustrasi-oleh-infoikan-com-1.jpg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kd_kategori` int(11) NOT NULL,
  `nm_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`kd_kategori`, `nm_kategori`) VALUES
(1, 'Ikan Air Tawar'),
(2, 'Ikan Air Asin'),
(3, 'Ikan Air Payau');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ordo`
--

CREATE TABLE `tb_ordo` (
  `id_ordo` int(11) NOT NULL,
  `ordo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ordo`
--

INSERT INTO `tb_ordo` (`id_ordo`, `ordo`) VALUES
(1, 'Cypriniformes'),
(2, 'Gonorynchiformes'),
(3, 'Malacopterygii'),
(4, 'Atheriniformes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sebaran`
--

CREATE TABLE `tb_sebaran` (
  `id_sebaran` int(11) NOT NULL,
  `kd_ikan` int(11) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `deskripsi_sebaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sebaran`
--

INSERT INTO `tb_sebaran` (`id_sebaran`, `kd_ikan`, `longitude`, `latitude`, `deskripsi_sebaran`) VALUES
(1, 1, 107.7077298970057, -6.891811356109458, 'Hampir diseluruh perairan di indonesia'),
(2, 4, 103.5394866, -1.610435, 'Jambi'),
(3, 1, -3.9832536, 12.6606714, 'Republic Democtratic Kongo'),
(4, 4, 104.6228726, -2.9549597, 'Sungai Musi Sumarta Selatan'),
(7, 4, 103.7041581, 1.3139961, 'Singapura'),
(8, 4, 100.5488534, 4.0890462, 'Malaysia'),
(9, 1, -70.7298925, -1.6235821, 'Sungai Amazone'),
(10, 8, -8.7111206, -0.9910388, 'Pesisir Afrika'),
(11, 8, 100, 29, 'Pesisir Asia'),
(12, 8, 150.6517771, -33.8473566, 'Pesisir Australia'),
(14, 6, 105.4061752, -7.2948934, 'Menyebar di samudra hindia, pada air laut dan air payau'),
(15, 6, -135.7889107, -29.5186913, 'Laut pasifik '),
(16, 5, 114.4943702, -3.2750454, 'Banjar kalimanatan selatan'),
(17, 5, 138.4935746, -6.3536134, 'Sunagi Digul Papua'),
(18, 9, 138.6615402, -5.1891277, 'Endemik papua'),
(19, 9, 132.1893232, -1.2371545, 'Danao Framu Ayamaru papua');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spesies`
--

CREATE TABLE `tb_spesies` (
  `id_spesies` int(11) NOT NULL,
  `spesies` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_spesies`
--

INSERT INTO `tb_spesies` (`id_spesies`, `spesies`) VALUES
(1, 'Cyprinus carpio'),
(2, 'Chanos chanos'),
(3, 'Rasbora argyrotaenia'),
(4, 'Sclerogphagus formosus'),
(5, 'Melanotaenia Bosemani');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wilayah`
--

CREATE TABLE `tb_wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `long` varchar(60) NOT NULL,
  `lat` varchar(60) NOT NULL,
  `id_sebaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `ip` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `hits` int(11) NOT NULL,
  `online` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`ip`, `date`, `hits`, `online`, `time`) VALUES
('::1', '2022-02-16', 15, '1644984709', '2022-02-16 05:00:43'),
('::1', '2022-02-21', 137, '1645442424', '2022-02-21 09:13:54'),
('::1', '2022-02-22', 60, '1645502697', '2022-02-22 02:15:15'),
('::1', '2022-02-23', 19, '1645607110', '2022-02-23 08:02:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_famili`
--
ALTER TABLE `tb_famili`
  ADD PRIMARY KEY (`id_famili`);

--
-- Indexes for table `tb_genus`
--
ALTER TABLE `tb_genus`
  ADD PRIMARY KEY (`id_genus`);

--
-- Indexes for table `tb_ikan`
--
ALTER TABLE `tb_ikan`
  ADD PRIMARY KEY (`kd_ikan`),
  ADD KEY `id_famili` (`id_famili`),
  ADD KEY `id_genus` (`id_genus`),
  ADD KEY `id_spesies` (`id_spesies`),
  ADD KEY `id_ordo` (`id_ordo`),
  ADD KEY `id_sebaran` (`id_sebaran`),
  ADD KEY `kd_kategori` (`kd_kategori`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `tb_ordo`
--
ALTER TABLE `tb_ordo`
  ADD PRIMARY KEY (`id_ordo`);

--
-- Indexes for table `tb_sebaran`
--
ALTER TABLE `tb_sebaran`
  ADD PRIMARY KEY (`id_sebaran`);

--
-- Indexes for table `tb_spesies`
--
ALTER TABLE `tb_spesies`
  ADD PRIMARY KEY (`id_spesies`);

--
-- Indexes for table `tb_wilayah`
--
ALTER TABLE `tb_wilayah`
  ADD PRIMARY KEY (`id_wilayah`),
  ADD KEY `id_sebaran` (`id_sebaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_famili`
--
ALTER TABLE `tb_famili`
  MODIFY `id_famili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_genus`
--
ALTER TABLE `tb_genus`
  MODIFY `id_genus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_ikan`
--
ALTER TABLE `tb_ikan`
  MODIFY `kd_ikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kd_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ordo`
--
ALTER TABLE `tb_ordo`
  MODIFY `id_ordo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_sebaran`
--
ALTER TABLE `tb_sebaran`
  MODIFY `id_sebaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_spesies`
--
ALTER TABLE `tb_spesies`
  MODIFY `id_spesies` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_wilayah`
--
ALTER TABLE `tb_wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_ikan`
--
ALTER TABLE `tb_ikan`
  ADD CONSTRAINT `tb_ikan_ibfk_1` FOREIGN KEY (`id_famili`) REFERENCES `tb_famili` (`id_famili`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_ikan_ibfk_2` FOREIGN KEY (`id_genus`) REFERENCES `tb_genus` (`id_genus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_ikan_ibfk_3` FOREIGN KEY (`id_spesies`) REFERENCES `tb_spesies` (`id_spesies`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_ikan_ibfk_4` FOREIGN KEY (`id_ordo`) REFERENCES `tb_ordo` (`id_ordo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_ikan_ibfk_6` FOREIGN KEY (`kd_kategori`) REFERENCES `tb_kategori` (`kd_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_wilayah`
--
ALTER TABLE `tb_wilayah`
  ADD CONSTRAINT `tb_wilayah_ibfk_1` FOREIGN KEY (`id_sebaran`) REFERENCES `tb_sebaran` (`id_sebaran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
