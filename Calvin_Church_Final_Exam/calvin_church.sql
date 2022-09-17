-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2022 at 09:06 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calvin_church`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'stef', '123'),
(2, 'calvin', '456'),
(3, 'daniel', '987'),
(4, 'bryan', '123');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

DROP TABLE IF EXISTS `artikel`;
CREATE TABLE IF NOT EXISTS `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` text NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `tanggal`, `judul`, `isi`) VALUES
(1, '2022-05-03', 'Allah Tritunggal', 'Melansir Jurnal Allah Tritunggal tulisan Herny Kongguasa, istilah Allah Tritunggal menurut Stephen Tong adalah tiga pribadi di dalam satu Allah, yaitu Bapa, Putra dan Roh Kudus. Ketiganya memiliki hakekat yang sama, tidak ada yang lebih besar atau lebih kecil. Ketiga Pribadi dalam Tritunggal memiliki sifat-sifat Ilahi, esensi, hakekat, natur, serta dasar yang sama. Semuanya berada dalam satu kesatuan dan selalu bertindak bersama-sama. Meski terdiri dari tiga pribadi, Allah tetaplah satu. Tidak ada Allah yang lain. Hal ini dijelaskan di Alkitab lewat Injil Yesaya 45:5 yang berbunyi: ADVERTISEMENT \"Akulah TUHAN, dan tidak ada yang lain; kecuali Aku tidak ada Allah. Aku telah mempersenjatai engkau, sekalipun engkau tidak mengenal Aku.\" Arti Allah Tritunggal dalam Agama Kristen (1) zoom-in-white Perbesar Ilsutrasi Salib foto:Unsplash Mengutip buku Allah Tritunggal: Allah Tritunggal dan Persona dan Pekerjaan Kristus karya Watchman Nee dan Witness Lee, Tuhan Yesus sempat membahas istilah ketiga Pribadi ini dalam Alkitab, tepatnya Matius 28:19 yang berbunyi: \"Karena itu pergilah, jadikanlah semua bangsa murid-Ku dan baptislah mereka ke dalam nama Bapa dan Putra dan Roh Kudus.\" Ayat tersebut membuktikan bahwa Tuhan dengan jelas membicarakan ketiga Pribadi, yaitu Bapa, Putra, dan Roh. Kata \"nama\" dalam ayat tersebut merupakan bentuk tunggal. Jika dilihat secara keseluruhan, ayat ini memaparkan bahwa Allah adalah satu namun tiga dan tiga namun satu.'),
(2, '2020-11-18', 'Predestinasi Ganda', 'Calvinis berkeyakinan bahwa Allahlah yang menentukan takdir kekal terhadap orang-orang, ada yang untuk mendapat keselamatan oleh kasih karunia, sementara sisanya akan menerima penghukuman kekal atas semua dosa mereka, terutama dosa asal mereka. Yohanes Calvin memikirkan secara dalam sesuatu yang ada di Alkitab dan tidak bisa dimungkiri lagi, yakni adanya Anugerah yang tidak dapat ditolak dan Pemilihan yang terbatas. Anugerah kepada manusia yang dipilih Tuhan tidak mungkin dapat ditolaknya, karena sudah dipilih oleh Tuhan berdasarkan kedaulatan Tuhan bukan karena kebaikan atau kelebihan apapun dari manusia tersebut, maka mulai dari itu pemilihan Allah kepada manusia tersebut terbatas tergantung kepada kedaulatan Allah. Apakah hal ini adil? Yang disebut adil adalah setiap orang yang jatuh dalam dosa pasti harus binasa, jadi seharusnya semua binasa. Kalau Allah memilih manusia untuk diselamatkan berdasarkan kedaulatan Allah adalah karena kasih dan karunia Tuhan sebagai Anugerah Allah.'),
(3, '2021-06-20', 'Calvinisme', 'Calvinisme adalah sebuah sistem teologis dan pendekatan kepada kehidupan Kristen yang menekankan kedaulatan pemerintahan Allah atas segala sesuatu.[1] Gerakan ini dinamai sesuai dengan reformator Prancis Yohanes Calvin, sehingga kadang-kadang varian dari Kekristenan Protestan ini disebut teologi Reformed. Ada juga yang menyebutnya sebagai teologi Hervormd, iman Hervormd, atau tradisionalis Hervormd.[2]\r\n\r\nTeologi Reformed dikembangkan oleh teologi-teolog seperti Martin Bucer, Heinrich Bullinger, Peter Martyr Vermigli, dan Huldrych Zwingli dan juga dipengaruhi oleh para reformator Inggris seperti misalnya Thomas Cranmer dan John Jewel. Namun karena pengaruh Yohanes Calvin yang besar dan peranannya dalam perdebatan konfesional dan gerejawi sepanjang abad ke-17, tradisi ini umumnya kemudian dikenal sebagai Calvinisme. Kini, istilah ini juga merujuk kepada doktrin dan praktik dari Gereja Reformed, dengan Calvin sebagai salah satu pemimpin pertamanya, dan sistem ini paling dikenal karena doktrin predestinasi dan kerusakan total.'),
(4, '2022-05-10', 'Reformed Liberal Church', 'Reformed church, any of several major representative groups of classical Protestantism that arose in the 16th-century Reformation. Originally, all of the Reformation churches used this name (or the name Evangelical) to distinguish themselves from the â€œunreformed,â€ or unchanged, Roman Catholic church. After the great controversy among these churches over the Lordâ€™s Supper (after 1529), the followers of Martin Luther began to use the name Lutheran as a specific name, and the name Reformed became associated with the Calvinistic churches (and also for a time with the Church of England). Eventually the name Presbyterian, which denotes the form of church polity used by most of the Reformed churches, was adopted by the Calvinistic churches of British background. The modern Reformed churches thus trace their origins to the Continental Calvinistic churches that retained the original designation. The Reformed and Presbyterian churches are treated jointly in the article Reformed and Presbyterian churches.');

-- --------------------------------------------------------

--
-- Table structure for table `data_jemaat_mingguan`
--

DROP TABLE IF EXISTS `data_jemaat_mingguan`;
CREATE TABLE IF NOT EXISTS `data_jemaat_mingguan` (
  `cabang` varchar(30) NOT NULL,
  `1` int(11) NOT NULL,
  `2` int(11) NOT NULL,
  `3` int(11) NOT NULL,
  `4` int(11) NOT NULL,
  `5` int(11) NOT NULL,
  `6` int(11) NOT NULL,
  `7` int(11) NOT NULL,
  `8` int(11) NOT NULL,
  `9` int(11) NOT NULL,
  `10` int(11) NOT NULL,
  `11` int(11) NOT NULL,
  `12` int(11) NOT NULL,
  `13` int(11) NOT NULL,
  `14` int(11) NOT NULL,
  `15` int(11) NOT NULL,
  `16` int(11) NOT NULL,
  `17` int(11) NOT NULL,
  `18` int(11) NOT NULL,
  `19` int(11) NOT NULL,
  `20` int(11) NOT NULL,
  `21` int(11) NOT NULL,
  `22` int(11) NOT NULL,
  `23` int(11) NOT NULL,
  `24` int(11) NOT NULL,
  `25` int(11) NOT NULL,
  `26` int(11) NOT NULL,
  `27` int(11) NOT NULL,
  `28` int(11) NOT NULL,
  `29` int(11) NOT NULL,
  `30` int(11) NOT NULL,
  `31` int(11) NOT NULL,
  `32` int(11) NOT NULL,
  `33` int(11) NOT NULL,
  `34` int(11) NOT NULL,
  `35` int(11) NOT NULL,
  `36` int(11) NOT NULL,
  `37` int(11) NOT NULL,
  `38` int(11) NOT NULL,
  `39` int(11) NOT NULL,
  `40` int(11) NOT NULL,
  `41` int(11) NOT NULL,
  `42` int(11) NOT NULL,
  `43` int(11) NOT NULL,
  `44` int(11) NOT NULL,
  `45` int(11) NOT NULL,
  `46` int(11) NOT NULL,
  `47` int(11) NOT NULL,
  `48` int(11) NOT NULL,
  `49` int(11) NOT NULL,
  `50` int(11) NOT NULL,
  `51` int(11) NOT NULL,
  `52` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jemaat_mingguan`
--

INSERT INTO `data_jemaat_mingguan` (`cabang`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46`, `47`, `48`, `49`, `50`, `51`, `52`) VALUES
('Bandung', 100, 789, 965, 414, 966, 572, 332, 1017, 815, 476, 518, 935, 334, 730, 798, 282, 514, 614, 0, 564, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 344, 0, 0, 0, 0),
('Makassar', 805, 469, 749, 616, 561, 265, 731, 257, 356, 474, 562, 722, 851, 685, 504, 375, 614, 402, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Karawaci', 785, 781, 305, 527, 559, 404, 412, 510, 838, 643, 430, 444, 856, 455, 512, 518, 423, 701, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Tokyo', 232, 223, 172, 191, 179, 124, 79, 116, 222, 177, 113, 223, 64, 200, 215, 99, 179, 157, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Singapura', 519, 901, 248, 884, 330, 302, 317, 601, 553, 263, 516, 899, 612, 385, 312, 521, 834, 332, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_jemaat_tahunan`
--

DROP TABLE IF EXISTS `data_jemaat_tahunan`;
CREATE TABLE IF NOT EXISTS `data_jemaat_tahunan` (
  `cabang` varchar(30) NOT NULL,
  `2017` int(11) NOT NULL,
  `2018` int(11) NOT NULL,
  `2019` int(11) NOT NULL,
  `2020` int(11) NOT NULL,
  `2021` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jemaat_tahunan`
--

INSERT INTO `data_jemaat_tahunan` (`cabang`, `2017`, `2018`, `2019`, `2020`, `2021`) VALUES
('Bandung', 598, 680, 850, 983, 1040),
('Makassar', 363, 537, 675, 735, 893),
('Karawaci', 263, 437, 575, 735, 892),
('Tokyo', 58, 120, 170, 195, 250),
('Singapura', 502, 625, 725, 871, 958);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
CREATE TABLE IF NOT EXISTS `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `name`, `keterangan`, `tanggal`, `image`) VALUES
(95, 'Natal 2019', 'Merupakan Ibadah Natal ke 69 yang dirayakan Calvin Church', '2019-12-25', '1.jpg'),
(96, 'Natal 2018', 'Merupakan Ibadah Natal Tahun 2018. Dihadiri 2081 Orang.', '2018-12-25', '4.jpg'),
(97, 'Baptisan 2020', 'Merupakan Kegiatan Baptisan Tahunan ', '2022-05-05', 'midweek-600x338.jpg'),
(98, 'Paskah 2003', 'Merupakan Ibadah Paskah Pertama', '2003-04-09', 'about-header-bg-2000.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

DROP TABLE IF EXISTS `pdf`;
CREATE TABLE IF NOT EXISTS `pdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penulis` text NOT NULL,
  `judul` text NOT NULL,
  `tanggal` text NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`id`, `penulis`, `judul`, `tanggal`, `file`) VALUES
(2, 'Kevin Nobel', 'Iman Kristen Sosiologi', '2022-05-11', 'Pedoman Penyusunan Analisis Sosial (Tugas Individu) (1).pdf'),
(3, 'Penulis Sosiologi Handal', 'Pemetaaan Sosial', '2021-06-06', 'Pemetaan Sosial_202000286.pdf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
