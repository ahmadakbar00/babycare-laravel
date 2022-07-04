-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 09:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baby_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(10) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `content`, `category`, `image`, `created_at`, `updated_at`) VALUES
(2, 3, 'Ikan', 'Ikan adalah sumber protein, vitamin, dan mineral yang luar biasa. Asam lemak omega-3 pada ikan berminyak, seperti salmon segar dan makerel sangat baik untuk kesehatan jantung anak dan juga dapat mendukung perkembangan otaknya. Ada beberapa jenis ikan yang sebaiknya dihindari, seperti hiu, ikan todak, dan marlin. Pasalnya, ikan-ikan ini memiliki kandungan merkuri yang tinggi di dalamnya, sehingga dapat memengaruhi pertumbuhan sistem saraf anak. \r\nIkan berminyak, seperti makerel, salmon, dan sarden merupakan pilihan yang sangat bagus. Untuk mendapatkan nutrisi terbaik dari ikan, sebaiknya berikan setidaknya dua porsi ikan seminggu, termasuk satu ikan berminyak.', 'Baik', NULL, '2022-06-16 19:08:35', '2022-06-16 19:08:35'),
(3, 3, 'Kacang-Kacangan', 'Kacang-kacangan seperti kacang merah, kacang panjang, kacang kedelai, kacang polong, buncis dan lain-lain juga termasuk makanan yang paling direkomendasikan untuk anak-anak. Kacang-kacangan adalah sumber protein dan zat besi yang baik. Biar tidak terkesan monoton, ibu bisa memadukan kacang-kacangan dengan sayuran atau daging-dagingan. Selain menambah variasi, kandungan gizinya pun bisa semakin lengkap ketika bahan makanan tersebut saling dipadukan. \r\n\r\nNamun, ibu perlu waspada juga dengan kacang-kacangan. Sebab, terkadang kacang-kacangan menimbulkan reaksi alergi pada anak-anak. Apabila Si Kecil mengalami tanda-tanda alergi seperti muncul ruam pada kulit atau gatal-gatal, sebaiknya hentikan konsumsi kacang terlebih dahulu.', 'Baik', NULL, '2022-06-16 19:09:10', '2022-06-16 19:09:10'),
(4, 3, 'Sayuran', 'Bukan rahasia lagi kalau sayuran kaya akan vitamin, mineral, dan serat. Sayuran membantu pertumbuhan dan perkembangan Si Kecil bahkan dapat membantu melindungi dirinya dari sejumlah penyakit dalam jangka panjang. Namun, beberapa anak biasanya menolak makan sayur karena rasanya yang kurang sedap. Beberapa sayuran, seperti kangkung, kubis dan selada contohnya. Sayuran ini punya cita rasa kuat yang mungkin perlu dipelajari si kecil untuk disukai. \r\n\r\nKalau Si Kecil tidak menyukainya, ibu bisa memberinya dengan sayuran yang rasanya lebih lembut, seperti ubi. Anak-anak umumnya sangat tertarik dengan rasa manis, jadi ibu bisa mulai mengajari Si Kecil dengan sayuran bercita rasa manis terlebih dahulu. Namun, tetap tawarkan makanan yang lebih pahit juga sesekali. Dengan begitu, anak secara bertahap akan belajar menyukai berbagai rasa yang berbeda.\r\n\r\nIbu juga mencoba memadukan makanan pahit dan manis untuk membantu anak mempelajari jenis cita rasa yang lebih luas. Seiring waktu, ibu bisa mulai mengurangi jumlah makanan yang lebih manis dan membantu Si Kecil agar lebih terbiasa dengan rasa pahit.', 'Umum', NULL, '2022-06-20 02:36:43', '2022-06-20 02:37:08'),
(5, 3, 'sssq1q', 'dfghgdsf', 'Baik', NULL, '2022-07-01 08:58:29', '2022-07-01 08:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `baby`
--

CREATE TABLE `baby` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `length` decimal(9,3) DEFAULT NULL,
  `weight` decimal(9,3) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baby`
--

INSERT INTO `baby` (`id`, `name`, `parent`, `age`, `length`, `weight`, `status`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Amita Pramoedya', 1, 43, '120.000', '40.000', 'Baik', 'Perempuan', '2022-06-03 23:09:58', '2022-06-20 12:55:22'),
(2, 'Andi', 1, 51, '201.000', '100.000', 'Baik', 'Laki-laki', '2022-06-03 23:10:17', '2022-07-02 08:06:07'),
(10, 'Wahyu', 1, 2, '40.000', '7.000', 'Baik', 'Laki-laki', '2022-06-10 07:47:35', '2022-06-10 07:47:35'),
(20, 'Putri', 5, 2, '53.000', '5.000', 'Baik', 'Perempuan', '2022-06-21 05:34:11', '2022-06-21 05:44:56'),
(21, 'Putra', 1, 2, '35.000', '4.000', 'Baik', 'Laki-laki', '2022-06-25 16:04:04', '2022-06-25 16:04:04'),
(22, 'aaaa', 1, 3, '23.000', '23.000', 'Baik', 'Laki-laki', '2022-07-01 15:32:08', '2022-07-02 04:13:50'),
(23, 'lala', 1, 1, '23.000', '45.000', 'Baik', 'Perempuan', '2022-07-02 04:20:49', '2022-07-02 04:20:49'),
(24, 'lala', 1, 1, '23.000', '45.000', 'Baik', 'Perempuan', '2022-07-02 04:21:16', '2022-07-02 04:21:16'),
(25, 'popo', 1, 1, '12.000', '23.000', 'Baik', 'Laki-laki', '2022-07-02 04:22:08', '2022-07-02 04:22:08'),
(26, 'Karen', 1, 11, '123.000', '34.000', 'Baik', 'Laki-laki', '2022-07-02 06:17:47', '2022-07-02 06:17:47'),
(27, 'lalalal', 1, 1, '30.000', '4.000', 'Baik', 'Perempuan', '2022-07-02 06:20:24', '2022-07-02 06:20:24'),
(28, 'lalalal', 1, 1, '30.000', '4.000', 'Baik', 'Perempuan', '2022-07-02 06:21:46', '2022-07-02 06:21:46'),
(29, 'lalalal', 1, 1, '30.000', '4.000', 'Baik', 'Perempuan', '2022-07-02 06:23:38', '2022-07-02 06:23:38'),
(30, 'lalalal', 1, 1, '30.000', '4.000', 'Baik', 'Perempuan', '2022-07-02 06:25:19', '2022-07-02 06:25:19'),
(31, 'lalalal', 1, 1, '30.000', '4.000', 'Baik', 'Perempuan', '2022-07-02 06:26:35', '2022-07-02 06:26:35'),
(32, 'lalalal', 1, 1, '30.000', '4.000', 'Baik', 'Perempuan', '2022-07-02 06:27:27', '2022-07-02 06:27:27'),
(33, 'papap', 1, 6, '40.000', '5.000', 'Baik', 'Laki-laki', '2022-07-02 06:29:02', '2022-07-02 06:29:02'),
(34, 'papap', 1, 6, '40.000', '5.000', 'Baik', 'Laki-laki', '2022-07-02 06:36:34', '2022-07-02 06:36:34'),
(35, 'papap', 1, 6, '40.000', '5.000', 'Baik', 'Laki-laki', '2022-07-02 06:37:50', '2022-07-02 06:37:50'),
(36, 'papap', 1, 6, '40.000', '5.000', 'Baik', 'Laki-laki', '2022-07-02 06:43:03', '2022-07-02 06:43:03'),
(37, 'kaka', 1, 13, '30.000', '20.000', 'Baik', 'Laki-laki', '2022-07-02 08:06:57', '2022-07-02 08:37:19'),
(38, 'dinda', 5, 4, '40.000', '6.000', 'Baik', 'Perempuan', '2022-07-02 08:39:05', '2022-07-02 08:58:06'),
(39, 'pipi', 5, 3, '40.000', '5.000', 'Baik', 'Laki-laki', '2022-07-02 08:56:38', '2022-07-02 08:57:45'),
(40, 'caca', 5, 7, '40.000', '5.000', 'Baik', 'Perempuan', '2022-07-02 08:58:49', '2022-07-02 09:03:46'),
(41, 'noah', 5, 1, '30.000', '4.500', 'Baik', 'Laki-laki', '2022-07-02 09:04:06', '2022-07-02 09:04:06'),
(42, 'nana', 5, 1, '30.000', '30.000', 'Baik', 'Laki-laki', '2022-07-02 09:12:01', '2022-07-02 09:12:01'),
(43, 'haha', 5, 1, '30.000', '5.000', 'Baik', 'Laki-laki', '2022-07-02 09:13:35', '2022-07-02 09:13:35'),
(44, 'haha', 5, 1, '30.000', '5.000', 'Baik', 'Laki-laki', '2022-07-02 09:15:03', '2022-07-02 09:15:03'),
(45, 'haha', 5, 60, '120.000', '25.000', 'Baik', 'Laki-laki', '2022-07-02 09:15:44', '2022-07-02 09:23:20'),
(46, 'ads', 1, 5, '120.000', '2.000', 'Baik', 'Laki-laki', '2022-07-04 06:20:40', '2022-07-04 06:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `data_baby_admin`
--

CREATE TABLE `data_baby_admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `length` decimal(9,2) DEFAULT NULL,
  `weight` decimal(9,2) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_baby_admin`
--

INSERT INTO `data_baby_admin` (`id`, `user_id`, `age`, `length`, `weight`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 11, '90.00', '12.20', 'Laki-laki', 'Lebih', '2022-01-02 17:51:32', '2022-06-20 00:56:22'),
(2, 3, 23, '111.00', '11.50', 'Laki-laki', 'Baik', '2022-01-02 17:52:41', '2022-01-02 17:52:41'),
(3, 3, 11, '90.00', '12.20', 'Perempuan', 'Lebih', '2022-01-02 17:53:06', '2022-06-18 12:14:28'),
(4, 3, 17, '87.00', '10.50', 'Laki-laki', 'Baik', '2022-01-02 17:58:53', '2022-01-02 17:58:53'),
(5, 3, 20, '85.00', '9.00', 'Laki-laki', 'Kurang', '2022-01-02 17:59:22', '2022-01-02 17:59:22'),
(6, 3, 7, '74.00', '9.30', 'Laki-laki', 'Baik', '2022-01-02 17:59:51', '2022-01-02 17:59:51'),
(7, 3, 4, '67.00', '6.80', 'Perempuan', 'Baik', '2022-01-02 18:00:26', '2022-01-02 18:00:26'),
(8, 3, 1, '55.00', '4.00', 'Laki-laki', 'Baik', '2022-01-02 18:00:41', '2022-01-02 18:00:41'),
(9, 3, 42, '112.00', '12.60', 'Perempuan', 'Baik', '2022-01-02 18:00:57', '2022-01-02 18:00:57'),
(10, 3, 30, '103.00', '11.30', 'Perempuan', 'Baik', '2022-01-02 18:01:18', '2022-01-02 18:01:18'),
(11, 3, 27, '89.00', '10.20', 'Perempuan', 'Baik', '2022-01-02 18:01:44', '2022-01-02 18:01:44'),
(12, 3, 60, '120.00', '25.00', 'Perempuan', 'Baik', '2022-01-02 18:02:06', '2022-01-02 18:02:06'),
(13, 3, 45, '115.00', '15.40', 'Laki-laki', 'Baik', '2022-01-02 18:02:25', '2022-01-02 18:02:25'),
(14, 3, 29, '87.00', '10.00', 'Laki-laki', 'Kurang', '2022-01-02 18:02:51', '2022-01-02 18:02:51'),
(15, 3, 18, '100.00', '13.80', 'Laki-laki', 'Lebih', '2022-01-02 18:03:25', '2022-01-02 18:03:25'),
(16, 3, 14, '99.00', '13.60', 'Laki-laki', 'Lebih', '2022-01-02 18:03:49', '2022-01-02 18:03:49'),
(17, 3, 24, '86.00', '9.10', 'Laki-laki', 'Kurang', '2022-01-02 18:04:10', '2022-01-02 18:04:10'),
(18, 3, 7, '75.00', '7.80', 'Perempuan', 'Baik', '2022-01-02 18:04:39', '2022-01-02 18:04:39'),
(19, 3, 39, '104.00', '12.20', 'Perempuan', 'Baik', '2022-01-02 18:05:00', '2022-01-02 18:05:00'),
(20, 3, 57, '114.00', '14.80', 'Perempuan', 'Baik', '2022-01-02 18:05:22', '2022-01-02 18:05:22'),
(21, 3, 14, '99.00', '20.00', 'Perempuan', 'Lebih', '2022-06-26 06:23:51', '2022-06-26 06:23:51'),
(23, 3, 34, '100.00', '12.10', 'Perempuan', 'Baik', '2022-06-26 07:18:36', '2022-06-26 07:18:36'),
(24, 3, 29, '85.00', '10.00', 'Laki-laki', 'Kurang', '2022-06-26 07:20:10', '2022-06-26 07:21:38'),
(25, 3, 18, '101.00', '13.50', 'Laki-laki', 'Baik', '2022-06-26 07:22:33', '2022-06-26 07:23:31'),
(26, 3, 24, '87.00', '9.00', 'Laki-laki', 'Kurang', '2022-06-26 07:29:32', '2022-06-26 07:29:32'),
(27, 3, 24, '88.00', '20.00', 'Laki-laki', 'Lebih', '2022-06-26 07:34:49', '2022-06-26 07:34:49'),
(28, 3, 24, '90.00', '15.00', 'Laki-laki', 'Baik', '2022-06-26 07:36:26', '2022-06-26 07:36:26'),
(29, 3, 26, '80.00', '20.00', 'Laki-laki', 'Lebih', '2022-06-26 07:38:59', '2022-06-26 07:38:59'),
(30, 3, 29, '92.10', '30.00', 'Laki-laki', 'Lebih', '2022-06-26 07:42:21', '2022-06-26 07:42:21'),
(31, 3, 23, '90.00', '9.00', 'Laki-laki', 'Kurang', '2022-06-26 07:44:47', '2022-06-26 07:44:47'),
(32, 3, 12, '63.00', '9.00', 'Laki-laki', 'Baik', '2022-06-26 07:48:34', '2022-06-26 07:48:34'),
(33, 3, 16, '76.00', '10.50', 'Laki-laki', 'Baik', '2022-06-26 07:50:34', '2022-06-26 07:50:34'),
(34, 3, 54, '100.00', '20.00', 'Laki-laki', 'Baik', '2022-06-26 07:53:38', '2022-06-26 07:53:38'),
(35, 3, 42, '96.00', '10.50', 'Laki-laki', 'Kurang', '2022-06-26 07:56:27', '2022-06-26 07:56:27'),
(36, 3, 23, '85.00', '9.70', 'Laki-laki', 'Baik', '2022-06-26 08:01:50', '2022-06-26 08:01:50'),
(37, 3, 26, '86.00', '9.00', 'Laki-laki', 'Kurang', '2022-06-26 08:03:19', '2022-06-26 08:03:19'),
(38, 3, 31, '85.00', '10.00', 'Laki-laki', 'Kurang', '2022-06-26 08:05:02', '2022-06-26 08:05:02'),
(39, 3, 38, '100.00', '21.00', 'Laki-laki', 'Lebih', '2022-06-26 08:07:15', '2022-06-26 08:07:15'),
(40, 3, 25, '87.00', '15.00', 'Laki-laki', 'Baik', '2022-06-26 08:08:31', '2022-06-26 08:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `data_testing`
--

CREATE TABLE `data_testing` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `length` decimal(5,2) NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_testing`
--

INSERT INTO `data_testing` (`id`, `user_id`, `age`, `weight`, `length`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 15, '20.00', '80.00', 'Laki-laki', 'Lebih', '2022-01-02 17:51:32', '2022-01-02 17:51:31'),
(2, 3, 2, '4.00', '50.00', 'Laki-laki', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(3, 3, 56, '15.00', '120.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(4, 3, 60, '20.00', '110.00', 'Perempuan', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(5, 3, 58, '24.00', '111.00', 'Perempuan', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(6, 3, 1, '3.00', '50.00', 'Perempuan', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(7, 3, 1, '4.00', '50.00', 'Perempuan', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(8, 3, 27, '10.00', '88.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(9, 3, 60, '30.00', '120.00', 'Laki-laki', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(10, 3, 60, '50.00', '130.00', 'Laki-laki', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(11, 3, 59, '20.00', '111.00', 'Laki-laki', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(12, 3, 35, '11.00', '95.00', 'Laki-laki', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(13, 3, 17, '11.00', '80.00', 'Laki-laki', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(14, 3, 16, '9.00', '75.00', 'Laki-laki', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(15, 3, 10, '8.00', '75.00', 'Laki-laki', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `data_training`
--

CREATE TABLE `data_training` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `length` decimal(5,2) NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_training`
--

INSERT INTO `data_training` (`id`, `user_id`, `age`, `weight`, `length`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 11, '12.20', '90.00', 'Laki-laki', 'Baik', '2022-01-02 17:51:32', '2022-01-02 17:51:32'),
(2, 3, 23, '11.50', '111.00', 'Laki-laki', 'Kurang', '2022-01-02 17:51:32', '2022-01-02 17:51:32'),
(3, 3, 35, '11.00', '110.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(4, 3, 17, '10.50', '87.00', 'Laki-laki', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(5, 3, 20, '9.00', '85.00', 'Laki-laki', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(6, 3, 7, '9.30', '74.00', 'Laki-laki', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(7, 3, 4, '6.80', '67.00', 'Perempuan', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(8, 3, 1, '4.00', '55.00', 'Laki-laki', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(9, 3, 42, '12.60', '112.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(10, 3, 30, '11.30', '103.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(11, 3, 27, '10.20', '89.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(12, 3, 60, '25.00', '120.00', 'Perempuan', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(13, 3, 45, '15.40', '115.00', 'Laki-laki', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(14, 3, 29, '10.00', '87.00', 'Laki-laki', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(15, 3, 18, '13.80', '100.00', 'Laki-laki', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(16, 3, 14, '13.60', '99.00', 'Laki-laki', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(17, 3, 24, '9.10', '86.00', 'Laki-laki', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(18, 3, 7, '7.80', '75.00', 'Perempuan', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(19, 3, 39, '12.20', '104.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(20, 3, 57, '14.80', '114.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(21, 3, 60, '25.00', '123.00', 'Perempuan', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(22, 3, 34, '12.10', '100.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(23, 3, 29, '10.00', '85.00', 'Laki-laki', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(24, 3, 18, '13.50', '101.00', 'Laki-laki', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(25, 3, 14, '20.00', '99.00', 'Laki-laki', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(26, 3, 24, '9.00', '87.00', 'Laki-laki', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(27, 3, 24, '20.00', '88.00', 'Laki-laki', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(28, 3, 24, '15.00', '90.00', 'Laki-laki', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(29, 3, 26, '20.00', '80.00', 'Laki-laki', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(30, 3, 29, '30.00', '92.10', 'Laki-laki', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(31, 3, 30, '9.00', '90.00', 'Laki-laki', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(32, 3, 12, '9.00', '63.00', 'Laki-laki', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(33, 3, 16, '10.50', '76.00', 'Laki-laki', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(34, 3, 54, '20.00', '100.00', 'Laki-laki', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(35, 3, 42, '10.50', '96.00', 'Laki-laki', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(36, 3, 23, '9.70', '85.00', 'Laki-laki', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(37, 3, 26, '9.00', '86.00', 'Laki-laki', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(38, 3, 31, '10.00', '85.00', 'Laki-laki', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(39, 3, 38, '21.00', '100.00', 'Laki-laki', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(40, 3, 25, '15.00', '87.00', 'Laki-laki', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(41, 3, 30, '10.00', '90.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(42, 3, 18, '12.00', '80.00', 'Perempuan', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(43, 3, 1, '3.00', '45.00', 'Perempuan', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(44, 3, 1, '4.00', '50.00', 'Perempuan', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(45, 3, 2, '2.60', '50.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(46, 3, 6, '5.00', '65.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(47, 3, 9, '6.00', '70.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(48, 3, 13, '7.00', '75.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(49, 3, 18, '8.00', '80.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(50, 3, 23, '9.00', '85.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(51, 3, 24, '9.50', '86.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(52, 3, 9, '10.00', '70.00', 'Perempuan', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(53, 3, 44, '12.00', '100.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(54, 3, 45, '15.00', '100.00', 'Perempuan', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(55, 3, 55, '30.00', '120.00', 'Perempuan', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(56, 3, 53, '25.00', '115.00', 'Perempuan', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(57, 3, 60, '30.00', '120.00', 'Perempuan', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(58, 3, 60, '15.00', '130.00', 'Perempuan', 'Kurang', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(59, 3, 55, '35.00', '120.00', 'Perempuan', 'Lebih', '2022-01-02 17:51:31', '2022-01-02 17:51:31'),
(60, 3, 60, '20.00', '125.00', 'Perempuan', 'Baik', '2022-01-02 17:51:31', '2022-01-02 17:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `baby_id` int(100) NOT NULL,
  `parent_id` int(100) NOT NULL,
  `report_monthly` int(100) NOT NULL,
  `report_monthly_total` int(100) NOT NULL,
  `age` int(100) NOT NULL,
  `weight` double(9,3) NOT NULL,
  `length` double(9,3) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `prob_baik` double NOT NULL,
  `prob_kurang` double NOT NULL,
  `prob_lebih` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `name`, `baby_id`, `parent_id`, `report_monthly`, `report_monthly_total`, `age`, `weight`, `length`, `gender`, `status`, `prob_baik`, `prob_kurang`, `prob_lebih`, `created_at`, `updated_at`) VALUES
(1, 'Andi', 2, 1, 1, 1, 20, 9.000, 85.000, 'Laki-laki', 'Kurang', 0, 0, 0, '2022-06-10 03:02:27', '2022-06-10 03:02:27'),
(2, 'Andi', 2, 1, 2, 2, 10, 18.000, 50.000, 'Laki-laki', 'Baik', 0, 0, 0, '2022-06-10 03:30:33', '2022-06-10 03:30:33'),
(3, 'Andi', 2, 1, 3, 3, 50, 30.000, 60.000, 'Laki-laki', 'Baik', 0, 0, 0, '2022-06-10 03:31:28', '2022-06-10 03:31:28'),
(8, 'Amita Pramoedya', 1, 1, 5, 8, 36, 32.000, 100.000, 'Perempuan', 'Baik', 0, 0, 0, '2022-06-11 08:36:49', '2022-06-18 06:26:07'),
(9, 'Amita Pramoedya', 1, 1, 6, 9, 43, 40.000, 120.000, 'Perempuan', 'Baik', 0, 0, 0, '2022-06-20 05:55:22', '2022-06-20 05:55:22'),
(11, 'aaaa', 22, 1, 2, 7, 2, 54.000, 35.000, 'Laki-laki', 'Baik', 0, 0, 0, '2022-07-01 08:46:17', '2022-07-01 08:46:17'),
(12, 'aaaa', 22, 1, 0, 8, 3, 23.000, 23.000, 'Laki-laki', 'Baik', 0, 0, 0, '2022-07-01 21:13:50', '2022-07-01 21:13:50'),
(13, 'popo', 25, 1, 1, 1, 1, 23.000, 12.000, 'Laki-laki', 'Baik', 0, 0, 0, '2022-07-01 21:22:08', '2022-07-01 21:22:08'),
(14, 'Karen', 26, 1, 1, 1, 11, 34.000, 123.000, 'Laki-laki', 'Baik', 0, 0, 0, '2022-07-01 23:17:47', '2022-07-01 23:17:47'),
(15, 'lalalal', 28, 1, 1, 1, 1, 4.000, 30.000, 'Perempuan', 'Baik', 0, 0, 0, '2022-07-01 23:21:46', '2022-07-01 23:21:46'),
(16, 'lalalal', 29, 1, 1, 1, 1, 4.000, 30.000, 'Perempuan', 'Baik', 0, 0, 0, '2022-07-01 23:23:38', '2022-07-01 23:23:38'),
(17, 'lalalal', 30, 1, 1, 1, 1, 4.000, 30.000, 'Perempuan', 'Baik', 0, 0, 0, '2022-07-01 23:25:19', '2022-07-01 23:25:19'),
(18, 'lalalal', 31, 1, 1, 1, 1, 4.000, 30.000, 'Perempuan', 'Baik', 1.22, 0, 0, '2022-07-01 23:26:35', '2022-07-01 23:26:35'),
(19, 'lalalal', 32, 1, 1, 1, 1, 4.000, 30.000, 'Perempuan', 'Baik', 0, 0, 0, '2022-07-01 23:27:27', '2022-07-01 23:27:27'),
(20, 'papap', 33, 1, 1, 1, 6, 5.000, 40.000, 'Laki-laki', 'Baik', 0, 0, 0, '2022-07-01 23:29:02', '2022-07-01 23:29:02'),
(21, 'papap', 34, 1, 1, 1, 6, 5.000, 40.000, 'Laki-laki', 'Baik', 0.0000024436312128949004, 5.5569164406695e-56, 0, '2022-07-01 23:36:34', '2022-07-01 23:36:34'),
(22, 'papap', 35, 1, 1, 1, 6, 5.000, 40.000, 'Laki-laki', 'Baik', 0.0000024436312128949, 5.5569164406695e-56, 2.707532524366e-18, '2022-07-01 23:37:50', '2022-07-01 23:37:50'),
(23, 'papap', 36, 1, 1, 1, 6, 5.000, 40.000, 'Laki-laki', 'Baik', 0.0000024436312128949, 5.5569164406695e-56, 2.707532524366e-18, '2022-07-01 23:43:03', '2022-07-01 23:43:03'),
(24, 'Andi', 2, 1, 0, 19, 51, 100.000, 201.000, 'Laki-laki', 'Baik', 3.2188403110852e-93, 0, 2.6873767142635e-102, '2022-07-02 01:06:07', '2022-07-02 01:06:07'),
(25, 'kaka', 37, 1, 1, 1, 1, 3.000, 30.000, 'Laki-laki', 'Baik', 0.00000014211608619013, 3.087029056702e-88, 2.3115976978712e-24, '2022-07-02 01:06:57', '2022-07-02 01:06:57'),
(26, 'kaka', 37, 1, 0, 21, 2, 4.000, 35.000, 'Laki-laki', 'Baik', 0.00000056130571520169, 1.9082582827349e-71, 2.5108277413333e-21, '2022-07-02 01:15:03', '2022-07-02 01:15:03'),
(27, 'kaka', 37, 1, 0, 22, 11, 12.200, 90.000, 'Laki-laki', 'Baik', 0.00058682188119472, 0.000000005307355919394, 0.00024159411127096, '2022-07-02 01:16:59', '2022-07-02 01:16:59'),
(28, 'kaka', 37, 1, 4, 23, 12, 40.000, 400.000, 'Laki-laki', 'Baik', 2.412089028455e-72, 0, 0, '2022-07-02 01:30:31', '2022-07-02 01:30:31'),
(29, 'kaka', 37, 1, 1, 24, 13, 20.000, 30.000, 'Laki-laki', 'Baik', 0.00000055887939915095, 5.0238852798226e-126, 4.2262083152279e-22, '2022-07-02 01:37:19', '2022-07-02 01:37:19'),
(30, 'dinda', 38, 5, 1, 1, 1, 4.000, 40.000, 'Perempuan', 'Baik', 0.0000011406851546063, 3.119783737837e-63, 6.7480399727755e-19, '2022-07-02 01:39:05', '2022-07-02 01:39:05'),
(31, 'dinda', 38, 5, 1, 2, 2, 5.000, 45.000, 'Perempuan', 'Baik', 0.0000037081746356028, 2.4627196152764e-49, 2.5016163109335e-16, '2022-07-02 01:39:29', '2022-07-02 01:39:29'),
(32, 'dinda', 38, 5, 1, 3, 3, 20.000, 20.000, 'Perempuan', 'Baik', 0.000000042483675221245, 2.6288462057264e-149, 6.4695643505673e-29, '2022-07-02 01:56:07', '2022-07-02 01:56:07'),
(33, 'pipi', 39, 5, 1, 1, 1, 4.000, 30.000, 'Laki-laki', 'Baik', 0.00000021703162992485, 4.6684032542977e-81, 3.5661000491932e-24, '2022-07-02 01:56:38', '2022-07-02 01:56:38'),
(34, 'pipi', 39, 5, 1, 2, 2, 4.000, 35.000, 'Laki-laki', 'Baik', 0.00000056130571520169, 1.9082582827349e-71, 2.5108277413333e-21, '2022-07-02 01:57:22', '2022-07-02 01:57:22'),
(35, 'pipi', 39, 5, 1, 3, 3, 5.000, 40.000, 'Laki-laki', 'Baik', 0.0000019564569141989, 1.0401906953729e-56, 1.5517392463946e-18, '2022-07-02 01:57:45', '2022-07-02 01:57:45'),
(36, 'dinda', 38, 5, 1, 4, 4, 6.000, 40.000, 'Perempuan', 'Baik', 0.0000029288963478132, 1.1509328133359e-51, 2.7472142412256e-18, '2022-07-02 01:58:06', '2022-07-02 01:58:06'),
(37, 'caca', 40, 5, 1, 1, 5, 4.000, 30.000, 'Perempuan', 'Baik', 0.00000021703162992485, 4.6684032542977e-81, 3.5661000491932e-24, '2022-07-02 01:58:49', '2022-07-02 01:58:49'),
(38, 'caca', 40, 5, 1, 2, 6, 4.500, 35.000, 'Perempuan', 'Baik', 0.00000092223308960805, 2.593526908571e-67, 6.6297333808009e-21, '2022-07-02 02:03:23', '2022-07-02 02:03:23'),
(39, 'caca', 40, 5, 1, 3, 7, 5.000, 40.000, 'Perempuan', 'Baik', 0.0000026142719532662, 9.2547558937164e-56, 3.185080361345e-18, '2022-07-02 02:03:46', '2022-07-02 02:03:46'),
(40, 'noah', 41, 5, 1, 4, 8, 4.500, 30.000, 'Laki-laki', 'Baik', 0.00000026335227565568, 6.4726913411085e-78, 4.3802054760449e-24, '2022-07-02 02:04:06', '2022-07-02 02:04:06'),
(41, 'nana', 42, 5, 1, 5, 1, 30.000, 30.000, 'Laki-laki', 'Baik', 0.00000000049980327857162, 1.2812243199e-313, 8.2712479067677e-24, '2022-07-02 02:12:01', '2022-07-02 02:12:01'),
(42, 'haha', 45, 5, 1, 6, 1, 5.000, 30.000, 'Laki-laki', 'Baik', 0.00000031569464622296, 4.5123547948928e-75, 5.3403410639729e-24, '2022-07-02 02:15:44', '2022-07-02 02:15:44'),
(43, 'haha', 45, 5, 1, 7, 10, 23.000, 123.000, 'Laki-laki', 'Baik', 0.0000078949003443846, 6.7659165965446e-135, 0.00000002469628333898, '2022-07-02 02:16:08', '2022-07-02 02:16:08'),
(44, 'haha', 45, 5, 2, 8, 11, 4.000, 30.000, 'Laki-laki', 'Baik', 0.00000043336858641788, 8.6513864383432e-79, 1.9175924521282e-23, '2022-07-02 02:17:59', '2022-07-02 02:17:59'),
(45, 'haha', 45, 5, 3, 9, 12, 5.000, 40.000, 'Laki-laki', 'Baik', 0.0000034863908486593, 8.2452055410687e-55, 6.033467106241e-18, '2022-07-02 02:18:11', '2022-07-02 02:18:11'),
(46, 'haha', 45, 5, 4, 10, 60, 25.000, 120.000, 'Laki-laki', 'Baik', 0.0000008511821769818, 5.9661886893614e-170, 0.000000000024437790564783, '2022-07-02 02:23:20', '2022-07-02 02:23:20'),
(47, 'ads', 46, 1, 1, 25, 1, 30.000, 110.000, 'Laki-laki', 'Lebih', 0.0000011826109423, 0.0000000000000013582679412459, 0.000017154019801827, '2022-07-03 23:20:40', '2022-07-03 23:20:40'),
(48, 'ads', 46, 1, 2, 26, 2, 10.000, 110.000, 'Laki-laki', 'Baik', 0.00006631126369729, 0.000036793463287024, 0.000024397424323108, '2022-07-03 23:23:44', '2022-07-03 23:23:44'),
(49, 'ads', 46, 1, 3, 27, 4, 4.000, 50.000, 'Laki-laki', 'Baik', 0.0000050080959167869, 0.00000045644201275244, 0.0000043776485307608, '2022-07-03 23:24:44', '2022-07-03 23:24:44'),
(50, 'ads', 46, 1, 4, 28, 5, 2.000, 120.000, 'Laki-laki', 'Baik', 0.0000090437681569267, 0.0000005391040747716, 0.0000057566049471608, '2022-07-03 23:25:16', '2022-07-03 23:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `favorite_color` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `favorite_color`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ahmad', 'ahmad@gmail.com', 2, NULL, '$2y$10$Q27Wk41YqNpZKPLfkhh11eGD1R6Jku8j.rr5FmwG2O.FxhFNYDura', NULL, '2021-12-09 14:15:33', '2022-06-20 08:03:11'),
(3, 'hiz', 'hiz@gmail.com', 1, NULL, '$2y$10$g7qjrwHKHERPalm410.xV.F/H45maq4c9s8diohJR1dkYgTw/R0jG', NULL, '2021-12-10 12:47:51', '2021-12-10 12:47:51'),
(4, 'ahmadhiz', 'ahmadhiz@gmail.com', 2, 'red', '$2y$10$6Ef1n2E7z1pxKieOKUTVY.7TRh8ycNyiI4XR/nvEMIXj5U1pPgIVe', NULL, '2021-12-10 15:07:26', '2021-12-10 15:07:26'),
(5, 'akbar', 'ahmadakbar@gmail.com', 2, '', '$2y$10$PlBEKm95zlVb22D1uED5BeKPtxhrOLVm5eOj6Wqy31zwxvHHC8/bm', NULL, '2022-06-21 05:28:54', '2022-06-21 05:28:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `baby`
--
ALTER TABLE `baby`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `data_baby_admin`
--
ALTER TABLE `data_baby_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `data_testing`
--
ALTER TABLE `data_testing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_training`
--
ALTER TABLE `data_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `parent_id_2` (`parent_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `baby`
--
ALTER TABLE `baby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `data_baby_admin`
--
ALTER TABLE `data_baby_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `data_testing`
--
ALTER TABLE `data_testing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_training`
--
ALTER TABLE `data_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `baby`
--
ALTER TABLE `baby`
  ADD CONSTRAINT `baby_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `users` (`id`);

--
-- Constraints for table `data_baby_admin`
--
ALTER TABLE `data_baby_admin`
  ADD CONSTRAINT `data_baby_admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
