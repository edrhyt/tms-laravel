-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 07:24 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sqldb_tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(3, 'Asus'),
(2, 'Panasonic'),
(1, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`) VALUES
(1, 'Admin'),
(3, 'Collection'),
(4, 'Lainnya'),
(2, 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `employee_identity_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `identity_card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `division_id`, `position_id`, `employee_identity_number`, `first_name`, `last_name`, `email`, `address`, `place_of_birth`, `date_of_birth`, `identity_card_number`, `phone_number`, `active`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'TMS412001200', 'Putra', 'Ari Lesmana', 'palesmana@gmail.com', 'Sunset Road 112, Seminyak, Bali', 'Seminyak', '1989-05-03', '3326162103070009', '081230983291', 1, '1616845883-Putra-Ari-Lesmana.jpg', '2021-03-23 20:29:43', '2021-03-27 11:51:23'),
(5, 2, 3, 'TMS412001202', 'Buana', 'Iman Setiawan', 'bisetiawan@gmail.com', 'Jl Griya Raya 1, Bandung', 'Bandung', '1998-01-25', '3326160108060009', '081738293645', 1, 'avatar.jpg', '2021-03-23 20:35:56', '2021-03-23 20:35:56'),
(6, 2, 7, 'TMS412001203', 'Devi', 'Dian Sasmita', 'ddsasmita@gmail.com', 'Jl Wastukencana 4, Bandung', 'Bandung', '1984-11-25', '3326161106490001', '089172263211', 1, 'avatar.jpg', '2021-03-23 20:35:56', '2021-03-23 20:35:56'),
(10, 2, 2, 'TMS221020001', 'Rivaldi', 'Irawan', 'rivaldirawan@gmail.com', 'Subang, Aja weh ini mah', 'Bandung', '1997-06-25', '32170283927711', '081293626912', 1, '1617367071-Rivaldi-Irawan.jpg', '2021-03-27 01:02:10', '2021-04-02 12:37:51'),
(11, 2, 5, 'TMS2101040205', 'Ujang', 'Bustoms', 'ujangbustoms@gmail.com', 'Bandung, Cileunyi, 22 Panjaitan', 'Bandung', '1992-05-04', '32170621119290', '08123456789', 1, '1617288795-Ujang-Bustoms.jpg', '2021-04-01 14:51:47', '2021-04-01 14:53:15'),
(14, 2, 4, 'TMS2101040208', 'Sandi', 'Fajar', 'snf@gmail.com', 'Bandung Barat, Ngamprah', 'Bandun', '1992-09-03', '32170623281920', '081273820810', 1, 'avatar.png', '2021-04-07 06:36:39', '2021-04-07 06:36:39'),
(15, 2, 3, 'TMS2101040209', 'Deni', 'Maulana', 'dmaulana@gmail.com', 'Bandung Barat, Padalarang', 'Bandung', '1997-04-14', '32170689201928', '08127382819', 1, 'avatar.png', '2021-04-07 06:42:48', '2021-04-07 06:42:48'),
(17, 3, 9, 'TMS2101040206', 'Edi', 'Ruhiat', 'edi21.1@gmail.com', 'Bandung Barat, Ngamprah', 'Bandung', '2021-05-18', '321706271197014', '081293626948', 1, NULL, '2021-05-26 11:47:05', '2021-05-26 11:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incoming_products`
--

CREATE TABLE `incoming_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `incoming_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_14_163358_create_divisions_table', 1),
(5, '2021_03_14_163839_create_positions_table', 1),
(6, '2021_03_14_164423_create_employees_table', 1),
(7, '2021_03_14_172431_create_brands_table', 1),
(8, '2021_03_14_172517_create_units_table', 1),
(9, '2021_03_14_172627_create_products_table', 1),
(10, '2021_03_14_173338_create_incoming_products_table', 1),
(11, '2021_03_14_174007_create_outgoing_products_table', 1),
(12, '2021_03_15_073741_create_provinces_table', 1),
(13, '2021_03_15_073842_create_regencies_table', 1),
(14, '2021_03_15_074123_create_subdistricts_table', 1),
(15, '2021_03_15_074255_create_villages_table', 1),
(16, '2021_03_15_075255_create_order_letters_table', 1),
(17, '2021_03_15_123756_create_order_letter_products_table', 1),
(18, '2021_03_26_123833_update_positions_table', 2),
(19, '2021_05_03_160428_add_timestamps_to_order_letters', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_letters`
--

CREATE TABLE `order_letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `regency_id` bigint(20) UNSIGNED NOT NULL,
  `subdistrict_id` bigint(20) UNSIGNED NOT NULL,
  `village_id` bigint(20) UNSIGNED NOT NULL,
  `sp_employee_id` bigint(20) UNSIGNED NOT NULL,
  `db_employee_id` bigint(20) UNSIGNED NOT NULL,
  `ss_employee_id` bigint(20) UNSIGNED NOT NULL,
  `surveyor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coordinator_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installments_tenor` int(11) NOT NULL,
  `coordinator_discount` double DEFAULT NULL,
  `reward` int(11) DEFAULT NULL,
  `dp_discount` double DEFAULT NULL,
  `total` int(11) NOT NULL,
  `netto` int(11) NOT NULL,
  `first_installment` int(11) NOT NULL,
  `monthly_installments` int(11) NOT NULL,
  `date` date NOT NULL,
  `survey_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `due_date` smallint(6) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('order','survey','delivery') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `survey_status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_letters`
--

INSERT INTO `order_letters` (`id`, `number`, `province_id`, `regency_id`, `subdistrict_id`, `village_id`, `sp_employee_id`, `db_employee_id`, `ss_employee_id`, `surveyor_id`, `coordinator_name`, `address`, `installments_tenor`, `coordinator_discount`, `reward`, `dp_discount`, `total`, `netto`, `first_installment`, `monthly_installments`, `date`, `survey_date`, `delivery_date`, `due_date`, `phone`, `customers`, `status`, `survey_status`, `created_at`, `updated_at`) VALUES
(9, 'BDG-00102', 32, 3217, 321713, 3217132002, 11, 14, 15, 17, 'Udin Sedunia', 'Bandung', 10, NULL, NULL, 10000, 7800000, 7790000, 770000, 780000, '2021-05-09', '2021-05-26', NULL, 14, '12309123', NULL, 'survey', '1', '2021-05-08 21:06:16', '2021-05-26 14:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_letter_products`
--

CREATE TABLE `order_letter_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_letter_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `subtotal_price` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_letter_products`
--

INSERT INTO `order_letter_products` (`id`, `order_letter_id`, `product_id`, `quantity`, `subtotal_price`, `created_at`, `updated_at`) VALUES
(24, 9, 1, 1, 1800000, '2021-05-26 18:13:30', '2021-05-26 18:13:30'),
(25, 9, 3, 2, 6000000, '2021-05-26 18:13:30', '2021-05-26 18:13:30');

--
-- Triggers `order_letter_products`
--
DELIMITER $$
CREATE TRIGGER `assign_subtotal_price` BEFORE INSERT ON `order_letter_products` FOR EACH ROW SET NEW.subtotal_price = (SELECT `price` FROM `products` WHERE `id` = NEW.product_id) * NEW.quantity
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `outgoing_products`
--

CREATE TABLE `outgoing_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `outgoing_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `division_id`) VALUES
(2, 'Kepala Cabang', 2),
(3, 'SPV Sales (SS)', 2),
(4, 'Demo Booker', 2),
(5, 'Sales Promotor', 2),
(7, 'Training', 2),
(8, 'SPV Credit Control (CC)', 3),
(9, 'Surveyor', 3),
(10, 'Kolektor', 3),
(11, 'Head', 1),
(12, 'Staff', 1),
(13, 'Driver', 1),
(14, 'Helper', 1),
(15, 'OB/Umum', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `unit_id`, `name`, `stock`, `price`) VALUES
(1, 1, 1, 'SAMSUNG 32\" T4500 HD Smart TV', 5, 1800000),
(2, 1, 1, 'SAMSUNG RF50K5960S8', 8, 10500000),
(3, 2, 1, 'PANASONIC CS YN7TKJ - Standard 3/4 PK - R32', 2, 3000000),
(4, 3, 1, 'ASUS ROG STRIX-SCAR G732LXS-I98SD6T', 0, 67999000);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(32, 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `regencies`
--

CREATE TABLE `regencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regencies`
--

INSERT INTO `regencies` (`id`, `province_id`, `name`) VALUES
(3204, 32, 'Kab. Bandung'),
(3210, 32, 'Kab. Majalengka'),
(3217, 32, 'Kab. Bandung Barat'),
(3273, 32, 'Kota Bandung'),
(3277, 32, 'Kota Cimahi');

-- --------------------------------------------------------

--
-- Table structure for table `subdistricts`
--

CREATE TABLE `subdistricts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `regency_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subdistricts`
--

INSERT INTO `subdistricts` (`id`, `regency_id`, `name`) VALUES
(320405, 3204, 'Cileunyi'),
(320406, 3204, 'Cimenyan'),
(320407, 3204, 'Cilengkrang'),
(320408, 3204, 'Bojongsoang'),
(320409, 3204, 'Margahayu'),
(320410, 3204, 'Margaasih'),
(320411, 3204, 'Katapang'),
(320412, 3204, 'Dayeuhkolot'),
(320413, 3204, 'Banjaran'),
(320414, 3204, 'Pameungpeuk'),
(320415, 3204, 'Pangalengan'),
(320416, 3204, 'Arjasari'),
(320417, 3204, 'Cimaung'),
(320425, 3204, 'Cicalengka'),
(320426, 3204, 'Nagreg'),
(320427, 3204, 'Cikancung'),
(320428, 3204, 'Rancaekek'),
(320429, 3204, 'Ciparay'),
(320430, 3204, 'Pacet'),
(320431, 3204, 'Kertasari'),
(320432, 3204, 'Baleendah'),
(320433, 3204, 'Majalaya'),
(320434, 3204, 'Solokanjeruk'),
(320435, 3204, 'Paseh'),
(320436, 3204, 'Ibun'),
(320437, 3204, 'Soreang'),
(320438, 3204, 'Pasirjambu'),
(320439, 3204, 'Ciwidey'),
(320440, 3204, 'Rancabali'),
(320444, 3204, 'Cangkuang'),
(320446, 3204, 'Kutawaringin'),
(321001, 3210, 'Lemahsugih'),
(321002, 3210, 'Bantarujeg'),
(321003, 3210, 'Cikijing'),
(321004, 3210, 'Talaga'),
(321005, 3210, 'Argapura'),
(321006, 3210, 'Maja'),
(321007, 3210, 'Majalengka'),
(321008, 3210, 'Sukahaji'),
(321009, 3210, 'Rajagaluh'),
(321010, 3210, 'Leuwimunding'),
(321011, 3210, 'Jatiwangi'),
(321012, 3210, 'Dawuan'),
(321013, 3210, 'Kadipaten'),
(321014, 3210, 'Kertajati'),
(321015, 3210, 'Jatitujuh'),
(321016, 3210, 'Ligung'),
(321017, 3210, 'Sumberjaya'),
(321018, 3210, 'Panyingkiran'),
(321019, 3210, 'Palasah'),
(321020, 3210, 'Cigasong'),
(321021, 3210, 'Sindangwangi'),
(321022, 3210, 'Banjaran'),
(321023, 3210, 'Cingambul'),
(321024, 3210, 'Kasokandel'),
(321025, 3210, 'Sindang'),
(321026, 3210, 'Malausma'),
(321701, 3217, 'Lembang'),
(321702, 3217, 'Parongpong'),
(321703, 3217, 'Cisarua'),
(321704, 3217, 'Cikalongwetan'),
(321705, 3217, 'Cipeundeuy'),
(321706, 3217, 'Ngamprah'),
(321707, 3217, 'Cipatat'),
(321708, 3217, 'Padalarang'),
(321709, 3217, 'Batujajar'),
(321710, 3217, 'Cihampelas'),
(321711, 3217, 'Cililin'),
(321712, 3217, 'Cipongkor'),
(321713, 3217, 'Rongga'),
(321714, 3217, 'Sindangkerta'),
(321715, 3217, 'Gununghalu'),
(321716, 3217, 'Saguling'),
(327301, 3273, 'Sukasari'),
(327302, 3273, 'Coblong'),
(327303, 3273, 'Babakan Ciparay'),
(327304, 3273, 'Bojongloa Kaler'),
(327305, 3273, 'Andir'),
(327306, 3273, 'Cicendo'),
(327307, 3273, 'Sukajadi'),
(327308, 3273, 'Cidadap'),
(327309, 3273, 'Bandung Wetan'),
(327310, 3273, 'Astana Anyar'),
(327311, 3273, 'Regol'),
(327312, 3273, 'Batununggal'),
(327313, 3273, 'Lengkong'),
(327314, 3273, 'Cibeunying Kidul'),
(327315, 3273, 'Bandung Kulon'),
(327316, 3273, 'Kiaracondong'),
(327317, 3273, 'Bojongloa Kidul'),
(327318, 3273, 'Cibeunying Kaler'),
(327319, 3273, 'Sumur Bandung'),
(327320, 3273, 'Antapani'),
(327321, 3273, 'Bandung Kidul'),
(327322, 3273, 'Buahbatu'),
(327323, 3273, 'Rancasari'),
(327324, 3273, 'Arcamanik'),
(327325, 3273, 'Cibiru'),
(327326, 3273, 'Ujung Berung'),
(327327, 3273, 'Gedebage'),
(327328, 3273, 'Panyileukan'),
(327329, 3273, 'Cinambo'),
(327330, 3273, 'Mandalajati'),
(327701, 3277, 'Cimahi Selatan'),
(327702, 3277, 'Cimahi Tengah'),
(327703, 3277, 'Cimahi Utara');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`) VALUES
(2, 'Kg'),
(1, 'Piece');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Edi Ruhiat', 'admin@tms.dev', '2021-03-21 20:13:25', '$2y$10$k/o2yGRLvBagqGGsIje06OsZWNATKVY9Vn5MzycikZaVV7cNcBCne', '28KT63VgB28cXX0JPYOlIHsKNCpcDziM982yWDqRFnO7Sd7dNXC97VEMjGhy', '2021-03-21 20:13:25', '2021-03-21 20:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subdistrict_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`id`, `subdistrict_id`, `name`) VALUES
(3204052001, 320405, 'Cileunyi Kulon'),
(3204052002, 320405, 'Cileunyi Wetan'),
(3204052003, 320405, 'Cimekar'),
(3204052004, 320405, 'Cinunuk'),
(3204052005, 320405, 'Cibiru Hilir'),
(3204052006, 320405, 'Cibiru Wetan'),
(3204061001, 320406, 'Padasuka'),
(3204061002, 320406, 'Cibeunying'),
(3204062003, 320406, 'Cimenyan'),
(3204062004, 320406, 'Mandalamekar'),
(3204062005, 320406, 'Cikadut'),
(3204062006, 320406, 'Ciburial'),
(3204062007, 320406, 'Sindanglaya'),
(3204062008, 320406, 'Mekarsaluyu'),
(3204062009, 320406, 'Mekarmanik'),
(3204072001, 320407, 'Jatiendah'),
(3204072002, 320407, 'Cilengkrang'),
(3204072003, 320407, 'Cipanjalu'),
(3204072004, 320407, 'Melatiwangi'),
(3204072005, 320407, 'Ciporeat'),
(3204072006, 320407, 'Girimekar'),
(3204082001, 320408, 'Lengkong'),
(3204082002, 320408, 'Bojongsoang'),
(3204082003, 320408, 'Buahbatu'),
(3204082004, 320408, 'Cipagalo'),
(3204082005, 320408, 'Bojongsari'),
(3204082006, 320408, 'Tegalluar'),
(3204091004, 320409, 'Sulaiman'),
(3204092001, 320409, 'Margahayu Tengah'),
(3204092002, 320409, 'Magahayu Selatan'),
(3204092003, 320409, 'Sukamenak'),
(3204092005, 320409, 'Sayati'),
(3204102001, 320410, 'Margaasih'),
(3204102002, 320410, 'Lagadar'),
(3204102003, 320410, 'Nanjung'),
(3204102004, 320410, 'Mekarrahayu'),
(3204102005, 320410, 'Rahayu'),
(3204102006, 320410, 'Cigondewah Hilir'),
(3204112001, 320411, 'Sangkanhurip'),
(3204112002, 320411, 'Katapang'),
(3204112004, 320411, 'Gandasari'),
(3204112006, 320411, 'Sukamukti'),
(3204112007, 320411, 'Cilampeni'),
(3204112008, 320411, 'Pangauban'),
(3204112009, 320411, 'Banyusari'),
(3204121001, 320412, 'Pasawahan'),
(3204122002, 320412, 'Dayeuhkolot'),
(3204122003, 320412, 'Cangkuang Wetan'),
(3204122004, 320412, 'Cangkuang Kulon'),
(3204122005, 320412, 'Sukapura'),
(3204122006, 320412, 'Citeureup'),
(3204132001, 320413, 'Kamasan'),
(3204132002, 320413, 'Banjaran Wetan'),
(3204132003, 320413, 'Banjaran Kulon'),
(3204132005, 320413, 'Ciapus'),
(3204132006, 320413, 'Sindangpanon'),
(3204132007, 320413, 'Kiangroke'),
(3204132008, 320413, 'Tarajusari'),
(3204132012, 320413, 'Mekarjaya'),
(3204132013, 320413, 'Margahurip'),
(3204132016, 320413, 'Neglasari'),
(3204132018, 320413, 'Pasirmulya'),
(3204142001, 320414, 'Sukasari'),
(3204142002, 320414, 'Bojongmanggu'),
(3204142003, 320414, 'Rancatungku'),
(3204142004, 320414, 'Bojongkunci'),
(3204142005, 320414, 'Rancamulya'),
(3204142006, 320414, 'Langonsari'),
(3204152001, 320415, 'Pangalengan'),
(3204152002, 320415, 'Margaluyu'),
(3204152003, 320415, 'Warnasari'),
(3204152004, 320415, 'Sukamanah'),
(3204152005, 320415, 'Lamajang'),
(3204152006, 320415, 'Margamukti'),
(3204152007, 320415, 'Margamulya'),
(3204152008, 320415, 'Banjarsari'),
(3204152009, 320415, 'Sukaluyu'),
(3204152010, 320415, 'Tribaktimulya'),
(3204152011, 320415, 'Pulosari'),
(3204152012, 320415, 'Wanasuka'),
(3204152013, 320415, 'Margamekar'),
(3204162001, 320416, 'Arjasari'),
(3204162002, 320416, 'Lebakwangi'),
(3204162003, 320416, 'Batukarut'),
(3204162004, 320416, 'Ancolmekar'),
(3204162005, 320416, 'Baros'),
(3204162006, 320416, 'Mangunjaya'),
(3204162007, 320416, 'Mekarjaya'),
(3204162008, 320416, 'Pinggirsari'),
(3204162009, 320416, 'Patrolsari'),
(3204162010, 320416, 'Rancakole'),
(3204162011, 320416, 'Wargaluyu'),
(3204172001, 320417, 'Cimaung'),
(3204172002, 320417, 'Jagabaya'),
(3204172003, 320417, 'Pasirhuni'),
(3204172004, 320417, 'Campakamulya'),
(3204172005, 320417, 'Cipinang'),
(3204172006, 320417, 'Mekarsari'),
(3204172007, 320417, 'Sukamaju'),
(3204172008, 320417, 'Cikalong'),
(3204172009, 320417, 'Malasari'),
(3204172010, 320417, 'Warjabakti'),
(3204252001, 320425, 'Cicalengka Kulon'),
(3204252002, 320425, 'Cicalengka Wetan'),
(3204252003, 320425, 'Babakan Peuteuy'),
(3204252004, 320425, 'Cikuya'),
(3204252005, 320425, 'Dampit'),
(3204252006, 320425, 'Margaasih'),
(3204252007, 320425, 'Narawita'),
(3204252008, 320425, 'Panenjoan'),
(3204252009, 320425, 'Tanjungwangi'),
(3204252010, 320425, 'Tenjolaya'),
(3204252011, 320425, 'Waluya'),
(3204252012, 320425, 'Nagrog'),
(3204262001, 320426, 'Nagreg'),
(3204262002, 320426, 'Bojong'),
(3204262003, 320426, 'Ciaro'),
(3204262004, 320426, 'Ciherang'),
(3204262005, 320426, 'Citaman'),
(3204262006, 320426, 'Mandalawangi'),
(3204262007, 320426, 'Nagreg Kendan'),
(3204262008, 320426, 'Ganjar Sabar'),
(3204272001, 320427, 'Mandalasari'),
(3204272002, 320427, 'Cikancung'),
(3204272003, 320427, 'Cikasungka'),
(3204272004, 320427, 'Cihanyir'),
(3204272005, 320427, 'Ciluluk'),
(3204272006, 320427, 'Hegarmanah'),
(3204272007, 320427, 'Mekarlaksana'),
(3204272008, 320427, 'Tanjunglaya'),
(3204272009, 320427, 'Srirahayu'),
(3204281014, 320428, 'Rancaekek Kencana'),
(3204282001, 320428, 'Rancaekek Wetan'),
(3204282002, 320428, 'Rancaekek Kulon'),
(3204282003, 320428, 'Bojongsalam'),
(3204282004, 320428, 'Bojongloa'),
(3204282005, 320428, 'Jelegong'),
(3204282006, 320428, 'Linggar'),
(3204282007, 320428, 'Cangkuang'),
(3204282008, 320428, 'Haurpugur'),
(3204282009, 320428, 'Sukamanah'),
(3204282010, 320428, 'Sukamulya'),
(3204282011, 320428, 'Tegal Sumedang'),
(3204282012, 320428, 'Sangiang'),
(3204282013, 320428, 'Nanjung Mekar'),
(3204292001, 320429, 'Ciparay'),
(3204292002, 320429, 'Gunungleutik'),
(3204292003, 320429, 'Mekarsari'),
(3204292004, 320429, 'Cikoneng'),
(3204292005, 320429, 'Ciheulang'),
(3204292006, 320429, 'Pakutandang'),
(3204292007, 320429, 'Sumbersari'),
(3204292008, 320429, 'Mangunharja'),
(3204292009, 320429, 'Sagaracipta'),
(3204292010, 320429, 'Sarimahi'),
(3204292011, 320429, 'Serangmekar'),
(3204292012, 320429, 'Babakan'),
(3204292013, 320429, 'Bumiwangi'),
(3204292014, 320429, 'Mekarlaksana'),
(3204302001, 320430, 'Cipeujeuh'),
(3204302002, 320430, 'Cikitu'),
(3204302003, 320430, 'Cananggela'),
(3204302004, 320430, 'Maruyung'),
(3204302005, 320430, 'Sukarame'),
(3204302006, 320430, 'Nagrak'),
(3204302007, 320430, 'Cikawao'),
(3204302008, 320430, 'Mekarjaya'),
(3204302009, 320430, 'Pangauban'),
(3204302010, 320430, 'Mandalahaji'),
(3204302011, 320430, 'Girimulya'),
(3204302012, 320430, 'Tanjungwangi'),
(3204302013, 320430, 'Mekarsari'),
(3204312001, 320431, 'Sukapura'),
(3204312002, 320431, 'Cibeureum'),
(3204312003, 320431, 'Santosa'),
(3204312004, 320431, 'Tarumajaya'),
(3204312005, 320431, 'Neglawangi'),
(3204312006, 320431, 'Cihawuk'),
(3204312007, 320431, 'Cikembang'),
(3204312008, 320431, 'Resmi Tingal'),
(3204321001, 320432, 'Baleendah'),
(3204321002, 320432, 'Andir'),
(3204321003, 320432, 'Manggahang'),
(3204321004, 320432, 'Jelekong'),
(3204321008, 320432, 'Wargamekar'),
(3204322005, 320432, 'Bojongmalaka'),
(3204322006, 320432, 'Rancamanyar'),
(3204322007, 320432, 'Malakasari'),
(3204332001, 320433, 'Majalaya'),
(3204332002, 320433, 'Wangisagara'),
(3204332003, 320433, 'Biru'),
(3204332004, 320433, 'Padamulya'),
(3204332005, 320433, 'Bojong'),
(3204332006, 320433, 'Majasetra'),
(3204332007, 320433, 'Majakerta'),
(3204332008, 320433, 'Sukamaju'),
(3204332009, 320433, 'Padaulun'),
(3204332010, 320433, 'Neglasari'),
(3204332011, 320433, 'Sukamukti'),
(3204342001, 320434, 'Rancakasumba'),
(3204342002, 320434, 'Solokanjeruk'),
(3204342003, 320434, 'Cibodas'),
(3204342004, 320434, 'Panyadap'),
(3204342005, 320434, 'Bojongemas'),
(3204342006, 320434, 'Padamukti'),
(3204342007, 320434, 'Langensari'),
(3204352001, 320435, 'Cigentur'),
(3204352002, 320435, 'Cipedes'),
(3204352003, 320435, 'Loa'),
(3204352004, 320435, 'Cijagra'),
(3204352005, 320435, 'Cipaku'),
(3204352006, 320435, 'Sindangsari'),
(3204352007, 320435, 'Drawati'),
(3204352008, 320435, 'Sukamanah'),
(3204352009, 320435, 'Sukamantri'),
(3204352010, 320435, 'Karangtunggal'),
(3204352011, 320435, 'Mekarpawitan'),
(3204352012, 320435, 'Tangsimekar'),
(3204362001, 320436, 'Ibun'),
(3204362002, 320436, 'Laksana'),
(3204362003, 320436, 'Dukuh'),
(3204362004, 320436, 'Talun'),
(3204362005, 320436, 'Pangguh'),
(3204362006, 320436, 'Lampegan'),
(3204362007, 320436, 'Neglasari'),
(3204362008, 320436, 'Mekarwangi'),
(3204362009, 320436, 'Sudi'),
(3204362010, 320436, 'Tangulun'),
(3204362011, 320436, 'Cibeet'),
(3204362012, 320436, 'Karyalaksana'),
(3204372001, 320437, 'Soreang'),
(3204372002, 320437, 'Sadu'),
(3204372004, 320437, 'Panyirapan'),
(3204372010, 320437, 'Sukajadi'),
(3204372011, 320437, 'Pamekaran'),
(3204372017, 320437, 'Karamatmulya'),
(3204372018, 320437, 'Sukanagara'),
(3204372019, 320437, 'Cingcin'),
(3204372020, 320437, 'Parungserab'),
(3204372021, 320437, 'Sekarwangi'),
(3204382001, 320438, 'Pasirjambu'),
(3204382002, 320438, 'Cibodas'),
(3204382003, 320438, 'Cikoneng'),
(3204382004, 320438, 'Cukanggenteng'),
(3204382005, 320438, 'Cisondari'),
(3204382006, 320438, 'Margamulya'),
(3204382007, 320438, 'Mekarsari'),
(3204382008, 320438, 'Mekarmaju'),
(3204382009, 320438, 'Sugihmukti'),
(3204382010, 320438, 'Tenjolaya'),
(3204392001, 320439, 'Lebakmuncang'),
(3204392002, 320439, 'Ciwidey'),
(3204392003, 320439, 'Nengkelan'),
(3204392004, 320439, 'Panundaan'),
(3204392005, 320439, 'Panyocokan'),
(3204392006, 320439, 'Rawabogo'),
(3204392007, 320439, 'Sukawening'),
(3204402001, 320440, 'Patengan'),
(3204402002, 320440, 'Sukaresmi'),
(3204402003, 320440, 'Indragiri'),
(3204402004, 320440, 'Cipelah'),
(3204402005, 320440, 'Alamendah'),
(3204442001, 320444, 'Cangkuang'),
(3204442002, 320444, 'Ciluncat'),
(3204442003, 320444, 'Nagrak'),
(3204442004, 320444, 'Bandasari'),
(3204442005, 320444, 'Pananjung'),
(3204442006, 320444, 'Jatisari'),
(3204442007, 320444, 'Tanjungsari'),
(3204462001, 320446, 'Jelegong'),
(3204462002, 320446, 'Jatisari'),
(3204462003, 320446, 'Pameuntasan'),
(3204462004, 320446, 'Kopo'),
(3204462005, 320446, 'Cibodas'),
(3204462006, 320446, 'Kutawaringin'),
(3204462007, 320446, 'Sukamulya'),
(3204462008, 320446, 'Padasuka'),
(3204462009, 320446, 'Buninagara'),
(3204462010, 320446, 'Gajah Mekar'),
(3204462011, 320446, 'Cilame'),
(3210012001, 321001, 'Cipasung'),
(3210012002, 321001, 'Bangbayang'),
(3210012003, 321001, 'Borogojol'),
(3210012004, 321001, 'Cibulan'),
(3210012005, 321001, 'Lemahputih'),
(3210012006, 321001, 'Sadawangi'),
(3210012007, 321001, 'Kepuh'),
(3210012008, 321001, 'Padarek'),
(3210012009, 321001, 'Kalapadua'),
(3210012010, 321001, 'Cigaleuh'),
(3210012011, 321001, 'Margajaya'),
(3210012012, 321001, 'Sukajadi'),
(3210012013, 321001, 'Mekarwangi'),
(3210012014, 321001, 'Sinargalih'),
(3210012015, 321001, 'Mekarmulya'),
(3210012016, 321001, 'Sukamaju'),
(3210012017, 321001, 'Cisalak'),
(3210012018, 321001, 'Dayeuhwangi'),
(3210012019, 321001, 'Lemahsugih'),
(3210022002, 321002, 'Cipeundeuy'),
(3210022008, 321002, 'Cimangguhilir'),
(3210022009, 321002, 'Salawangi'),
(3210022010, 321002, 'Bantarujeg'),
(3210022011, 321002, 'Gununglarang'),
(3210022012, 321002, 'Cikidang'),
(3210022013, 321002, 'Cinambo'),
(3210022014, 321002, 'Haurgeulis'),
(3210022015, 321002, 'Sukamenak'),
(3210022016, 321002, 'Wadowetan'),
(3210022017, 321002, 'Babakansari'),
(3210022018, 321002, 'Silihwangi'),
(3210022022, 321002, 'Sindanghurip'),
(3210032001, 321003, 'Sukasari'),
(3210032002, 321003, 'Cisoka'),
(3210032003, 321003, 'Sindangpanji'),
(3210032004, 321003, 'Cikijing'),
(3210032005, 321003, 'Sindang'),
(3210032006, 321003, 'Banjaransari'),
(3210032007, 321003, 'Kasturi'),
(3210032008, 321003, 'Cidulang'),
(3210032009, 321003, 'Jagasari'),
(3210032010, 321003, 'Bagjasari'),
(3210032011, 321003, 'Sunalari'),
(3210032012, 321003, 'Cipulus'),
(3210032013, 321003, 'Kancana'),
(3210032014, 321003, 'Sukamukti'),
(3210032015, 321003, 'Cilancang'),
(3210042001, 321004, 'Lampuyang'),
(3210042002, 321004, 'Cibeureum'),
(3210042003, 321004, 'Cikeusal'),
(3210042004, 321004, 'Jatipamor'),
(3210042005, 321004, 'Argasari'),
(3210042006, 321004, 'Cicanir'),
(3210042007, 321004, 'Campaga'),
(3210042008, 321004, 'Sukaperna'),
(3210042009, 321004, 'Talaga Kulon'),
(3210042010, 321004, 'Talaga Wetan'),
(3210042011, 321004, 'Ganeas'),
(3210042012, 321004, 'Salado'),
(3210042013, 321004, 'Gunung Manik'),
(3210042014, 321004, 'Kertahayu'),
(3210042015, 321004, 'Mekarraharja'),
(3210042016, 321004, 'Margamukti'),
(3210042017, 321004, 'Mekarhurip'),
(3210052001, 321005, 'Sagara'),
(3210052002, 321005, 'Cibunut'),
(3210052003, 321005, 'Tejamulya'),
(3210052004, 321005, 'Sukasari Kaler'),
(3210052005, 321005, 'Argamukti'),
(3210052006, 321005, 'Sukadana'),
(3210052007, 321005, 'Sadasari'),
(3210052008, 321005, 'Haurseah'),
(3210052009, 321005, 'Mekarwangi'),
(3210052010, 321005, 'Cikaracak'),
(3210052011, 321005, 'Heubeulisuk'),
(3210052012, 321005, 'Sukasari Kidul'),
(3210052013, 321005, 'Gunungwangi'),
(3210052014, 321005, 'Argalingga'),
(3210062001, 321006, 'Cihaur'),
(3210062002, 321006, 'Wanahayu'),
(3210062003, 321006, 'Cengal'),
(3210062004, 321006, 'Anggrawati'),
(3210062005, 321006, 'Cipicung'),
(3210062006, 321006, 'Malongpong'),
(3210062007, 321006, 'Tegalsari'),
(3210062008, 321006, 'Maja Utara'),
(3210062009, 321006, 'Pasanggrahan'),
(3210062010, 321006, 'Cieurih'),
(3210062011, 321006, 'Kartabasuki'),
(3210062012, 321006, 'Sindangkerta'),
(3210062013, 321006, 'Banjaran'),
(3210062014, 321006, 'Paniis'),
(3210062015, 321006, 'Cicalung'),
(3210062016, 321006, 'Pageraji'),
(3210062017, 321006, 'Maja Selatan'),
(3210062018, 321006, 'Nunuk Baru'),
(3210071001, 321007, 'Munjul'),
(3210071002, 321007, 'Babakan Jawa'),
(3210071003, 321007, 'Cicurug'),
(3210071004, 321007, 'Sindangkasih'),
(3210071007, 321007, 'Majalengka Wetan'),
(3210071008, 321007, 'Majalengka Kulon'),
(3210071009, 321007, 'Tarikolot'),
(3210071010, 321007, 'Cikasarung'),
(3210071011, 321007, 'Tonjong'),
(3210071013, 321007, 'Cijati'),
(3210072005, 321007, 'Kulur'),
(3210072006, 321007, 'Kawunggirang'),
(3210072012, 321007, 'Sidamukti'),
(3210072014, 321007, 'Cibodas'),
(3210082001, 321008, 'Ciomas'),
(3210082002, 321008, 'Padahanten'),
(3210082009, 321008, 'Sukahaji'),
(3210082010, 321008, 'Salagedang'),
(3210082011, 321008, 'Cikeusik'),
(3210082012, 321008, 'Jayi'),
(3210082013, 321008, 'Nanggewer'),
(3210082014, 321008, 'Palabuan'),
(3210082015, 321008, 'Cikoneng'),
(3210082016, 321008, 'Babakanmanjeti'),
(3210082017, 321008, 'Tanjungsari'),
(3210082018, 321008, 'Cikalong'),
(3210082019, 321008, 'Candrajaya'),
(3210092001, 321009, 'Pajajar'),
(3210092002, 321009, 'Teja'),
(3210092003, 321009, 'Payung'),
(3210092004, 321009, 'Babakankareo'),
(3210092005, 321009, 'Sindangpano'),
(3210092006, 321009, 'Sadomas'),
(3210092007, 321009, 'Kumbung'),
(3210092008, 321009, 'Rajagaluh Kidul'),
(3210092009, 321009, 'Singawada'),
(3210092010, 321009, 'Rajagaluh Lor'),
(3210092011, 321009, 'Cipinang'),
(3210092012, 321009, 'Cisetu'),
(3210092013, 321009, 'Rajagaluh'),
(3210102001, 321010, 'Parakan'),
(3210102002, 321010, 'Patuanan'),
(3210102003, 321010, 'Nanggerang'),
(3210102004, 321010, 'Lame'),
(3210102005, 321010, 'Mindi'),
(3210102006, 321010, 'Rajawangi'),
(3210102007, 321010, 'Leuwikujang'),
(3210102008, 321010, 'Mirat'),
(3210102009, 321010, 'Leuwimunding'),
(3210102010, 321010, 'Ciparay'),
(3210102011, 321010, 'Heuleut'),
(3210102012, 321010, 'Karangasem'),
(3210102013, 321010, 'Tanjungsari'),
(3210102014, 321010, 'Parungjaya'),
(3210112001, 321011, 'Burujul Kulon'),
(3210112002, 321011, 'Burujul Wetan'),
(3210112003, 321011, 'Cicadas'),
(3210112004, 321011, 'Andir'),
(3210112005, 321011, 'Sukaraja Wetan'),
(3210112006, 321011, 'Pinangraja'),
(3210112007, 321011, 'Cibentar'),
(3210112008, 321011, 'Leuweunggede'),
(3210112009, 321011, 'Cibolerang'),
(3210112010, 321011, 'Sutawangi'),
(3210112011, 321011, 'Jatisura'),
(3210112012, 321011, 'Jatiwangi'),
(3210112013, 321011, 'Loji'),
(3210112014, 321011, 'Sukaraja Kulon'),
(3210112015, 321011, 'Mekarsari'),
(3210112016, 321011, 'Surawangi'),
(3210122006, 321012, 'Gandu'),
(3210122007, 321012, 'Dawuan'),
(3210122008, 321012, 'Genteng'),
(3210122010, 321012, 'Mandapa'),
(3210122011, 321012, 'Balida'),
(3210122012, 321012, 'Karanganyar'),
(3210122013, 321012, 'Salawana'),
(3210122015, 321012, 'Bojongcideres'),
(3210122017, 321012, 'Sinarjati'),
(3210122018, 321012, 'Pasirmalati'),
(3210122021, 321012, 'Baturuyuk'),
(3210132001, 321013, 'Heuleut'),
(3210132002, 321013, 'Kadipaten'),
(3210132003, 321013, 'Babakananyar'),
(3210132004, 321013, 'Karangsambung'),
(3210132005, 321013, 'Liangjulang'),
(3210132006, 321013, 'Pagandon'),
(3210132007, 321013, 'Cipaku'),
(3210142001, 321014, 'Pakubeureum'),
(3210142002, 321014, 'Sukawana'),
(3210142003, 321014, 'Kertawinangun'),
(3210142004, 321014, 'Palasah'),
(3210142005, 321014, 'Babakan'),
(3210142006, 321014, 'Kertajati'),
(3210142007, 321014, 'Bantarjati'),
(3210142008, 321014, 'Pasiripis'),
(3210142009, 321014, 'Sukamulya'),
(3210142010, 321014, 'Kertasari'),
(3210142011, 321014, 'Mekarjaya'),
(3210142012, 321014, 'Mekarmulya'),
(3210142013, 321014, 'Sukakerta'),
(3210142014, 321014, 'Sahbandar'),
(3210152001, 321015, 'Biyawak'),
(3210152002, 321015, 'Panyingkiran'),
(3210152003, 321015, 'Panongan'),
(3210152004, 321015, 'Randegan Wetan'),
(3210152005, 321015, 'Putridalem'),
(3210152006, 321015, 'Jatitengah'),
(3210152007, 321015, 'Jatitujuh'),
(3210152008, 321015, 'Babajurang'),
(3210152009, 321015, 'Pilangsari'),
(3210152010, 321015, 'Jatiraga'),
(3210152011, 321015, 'Sumber Wetan'),
(3210152012, 321015, 'Pangkalanpari'),
(3210152013, 321015, 'Randegan Kulon'),
(3210152014, 321015, 'Sumber Kulon'),
(3210152015, 321015, 'Pasindangan'),
(3210162001, 321016, 'Cibogor'),
(3210162002, 321016, 'Beber'),
(3210162003, 321016, 'Beusi'),
(3210162004, 321016, 'Tegalaren'),
(3210162005, 321016, 'Buntu'),
(3210162006, 321016, 'Ligung'),
(3210162007, 321016, 'Wanasalam'),
(3210162008, 321016, 'Ampel'),
(3210162009, 321016, 'Bantarwaru'),
(3210162010, 321016, 'Majasari'),
(3210162011, 321016, 'Kedungkencana'),
(3210162012, 321016, 'Kertasari'),
(3210162013, 321016, 'Leuweunghapit'),
(3210162014, 321016, 'Ligung Lor'),
(3210162015, 321016, 'Sukawera'),
(3210162016, 321016, 'Gandawesi'),
(3210162017, 321016, 'Kodasari'),
(3210162018, 321016, 'Leuwiliang Baru'),
(3210162019, 321016, 'Kedungsari'),
(3210172001, 321017, 'Bongas Wetan'),
(3210172002, 321017, 'Bongas Kulon'),
(3210172003, 321017, 'Garawangi'),
(3210172004, 321017, 'Rancaputat'),
(3210172005, 321017, 'Banjaran'),
(3210172006, 321017, 'Sepat'),
(3210172007, 321017, 'Paningkiran'),
(3210172008, 321017, 'Parapatan'),
(3210172009, 321017, 'Panjalin Kidul'),
(3210172010, 321017, 'Cidenok'),
(3210172011, 321017, 'Lojikobong'),
(3210172012, 321017, 'Panjalin Lor'),
(3210172013, 321017, 'Sumberjaya'),
(3210172014, 321017, 'Pancaksuji'),
(3210172015, 321017, 'Gelok Mulya'),
(3210182001, 321018, 'Cijurey'),
(3210182002, 321018, 'Pasirmuncang'),
(3210182003, 321018, 'Jatipamor'),
(3210182004, 321018, 'Bantrangsana'),
(3210182005, 321018, 'Jatiserang'),
(3210182006, 321018, 'Bonang'),
(3210182007, 321018, 'Leuwiseeng'),
(3210182008, 321018, 'Panyingkiran'),
(3210182009, 321018, 'Karyamukti'),
(3210192001, 321019, 'Majasuka'),
(3210192002, 321019, 'Cisambeng'),
(3210192003, 321019, 'Palasah'),
(3210192004, 321019, 'Weragati'),
(3210192005, 321019, 'Trajaya'),
(3210192006, 321019, 'Tarikolot'),
(3210192007, 321019, 'Buniwangi'),
(3210192008, 321019, 'Sindanghaji'),
(3210192009, 321019, 'Waringin'),
(3210192010, 321019, 'Pasir'),
(3210192011, 321019, 'Karamat'),
(3210192012, 321019, 'Enggalwangi'),
(3210192013, 321019, 'Sindangwasa'),
(3210201004, 321020, 'Cigasong'),
(3210201005, 321020, 'Simpeureum'),
(3210201006, 321020, 'Cicenang'),
(3210202001, 321020, 'Kawunghilir'),
(3210202002, 321020, 'Tajur'),
(3210202003, 321020, 'Tenjolayar'),
(3210202007, 321020, 'Baribis'),
(3210202008, 321020, 'Batujaya'),
(3210202009, 321020, 'Kutamanggu'),
(3210202010, 321020, 'Karayunan'),
(3210212001, 321021, 'Bantaragung'),
(3210212002, 321021, 'Padaherang'),
(3210212003, 321021, 'Lengkong Kulon'),
(3210212004, 321021, 'Jerukleueut'),
(3210212005, 321021, 'Sindangwangi'),
(3210212006, 321021, 'Buahkapas'),
(3210212007, 321021, 'Ujungberung'),
(3210212008, 321021, 'Balagedog'),
(3210212009, 321021, 'Leuwilaja'),
(3210212010, 321021, 'Lengkong Wetan'),
(3210222001, 321022, 'Genteng'),
(3210222002, 321022, 'Sunia'),
(3210222003, 321022, 'Darmalarang'),
(3210222004, 321022, 'Sindangpala'),
(3210222005, 321022, 'Banjaran'),
(3210222006, 321022, 'Kagok'),
(3210222007, 321022, 'Cimeong'),
(3210222008, 321022, 'Panyindangan'),
(3210222009, 321022, 'Kareo'),
(3210222010, 321022, 'Sangiang'),
(3210222011, 321022, 'Sunia Baru'),
(3210222012, 321022, 'Hegarmanah'),
(3210222013, 321022, 'Girimulya'),
(3210232001, 321023, 'Sedareja'),
(3210232002, 321023, 'Cidadap'),
(3210232003, 321023, 'Maniis'),
(3210232004, 321023, 'Nagarakembang'),
(3210232005, 321023, 'Wangkelang'),
(3210232006, 321023, 'Cimanggu'),
(3210232007, 321023, 'Cingambul'),
(3210232008, 321023, 'Cikondang'),
(3210232009, 321023, 'Ciranjeng'),
(3210232010, 321023, 'Rawa'),
(3210232011, 321023, 'Kondangmekar'),
(3210232012, 321023, 'Cintaasih'),
(3210232013, 321023, 'Muktisari'),
(3210242001, 321024, 'Jatisawit'),
(3210242002, 321024, 'Leuwikidang'),
(3210242003, 321024, 'Ranji Kulon'),
(3210242004, 321024, 'Ranji Wetan'),
(3210242005, 321024, 'Gunungsari'),
(3210242006, 321024, 'Kasokandel'),
(3210242007, 321024, 'Girimukti'),
(3210242008, 321024, 'Jatimulya'),
(3210242009, 321024, 'Wanajaya'),
(3210242010, 321024, 'Gandasari'),
(3210252001, 321025, 'Pasirayu'),
(3210252002, 321025, 'Sindang'),
(3210252003, 321025, 'Garawastu'),
(3210252004, 321025, 'Indrakila'),
(3210252005, 321025, 'Gunungkuning'),
(3210252007, 321025, 'Sangkanhurip'),
(3210252008, 321025, 'Bayureja'),
(3210262001, 321026, 'Sukadana'),
(3210262002, 321026, 'Werasari'),
(3210262003, 321026, 'Malausma'),
(3210262004, 321026, 'Lebakwangi'),
(3210262005, 321026, 'Cimuncang'),
(3210262006, 321026, 'Ciranca'),
(3210262007, 321026, 'Banyusari'),
(3210262008, 321026, 'Buninagara'),
(3210262009, 321026, 'Jagamulya'),
(3210262010, 321026, 'Girimukti'),
(3210262011, 321026, 'Kramat Jaya'),
(3217012001, 321701, 'Pagerwangi'),
(3217012002, 321701, 'Kayuambon'),
(3217012003, 321701, 'Lembang'),
(3217012004, 321701, 'Cikidang'),
(3217012005, 321701, 'Cikahuripan'),
(3217012006, 321701, 'Cikole'),
(3217012007, 321701, 'Gudangkahuripan'),
(3217012008, 321701, 'Jayagiri'),
(3217012009, 321701, 'Cibodas'),
(3217012010, 321701, 'Langensari'),
(3217012011, 321701, 'Mekarwangi'),
(3217012012, 321701, 'Cibogo'),
(3217012013, 321701, 'Sukajaya'),
(3217012014, 321701, 'Suntenjaya'),
(3217012015, 321701, 'Wangunharja'),
(3217012016, 321701, 'Wangunsari'),
(3217022001, 321702, 'Karyawangi'),
(3217022002, 321702, 'Cihanjuang'),
(3217022003, 321702, 'Cihanjuangrahayu'),
(3217022004, 321702, 'Cihideung'),
(3217022005, 321702, 'Ciwaruga'),
(3217022006, 321702, 'Cigugurgirang'),
(3217022007, 321702, 'Sariwangi'),
(3217032001, 321703, 'Jambudipa'),
(3217032002, 321703, 'Padaasih'),
(3217032003, 321703, 'Pasirhalang'),
(3217032004, 321703, 'Pasirlangu'),
(3217032005, 321703, 'Cipada'),
(3217032006, 321703, 'Kertawangi'),
(3217032007, 321703, 'Tugumukti'),
(3217032008, 321703, 'Sadangmekar'),
(3217042001, 321704, 'Ciptagumati'),
(3217042002, 321704, 'Cikalong'),
(3217042003, 321704, 'Cipada'),
(3217042004, 321704, 'Cisomangbarat'),
(3217042005, 321704, 'Ganjarsari'),
(3217042006, 321704, 'Kanangasari'),
(3217042007, 321704, 'Mandalasari'),
(3217042008, 321704, 'Mandalamukti'),
(3217042009, 321704, 'Mekarjaya'),
(3217042010, 321704, 'Puteran'),
(3217042011, 321704, 'Rende'),
(3217042012, 321704, 'Tenjolaut'),
(3217042013, 321704, 'Wangunjaya'),
(3217052001, 321705, 'Cipeundeuy'),
(3217052002, 321705, 'Ciharashas'),
(3217052003, 321705, 'Bojongmekar'),
(3217052004, 321705, 'Ciroyom'),
(3217052005, 321705, 'Jatimekar'),
(3217052006, 321705, 'Margalaksana'),
(3217052007, 321705, 'Margaluyu'),
(3217052008, 321705, 'Nanggeleng'),
(3217052009, 321705, 'Nyenang'),
(3217052010, 321705, 'Sirnaraja'),
(3217052011, 321705, 'Sirnagalih'),
(3217052012, 321705, 'Sukahaji'),
(3217062001, 321706, 'Ngamprah'),
(3217062002, 321706, 'Cimareme'),
(3217062003, 321706, 'Cilame'),
(3217062004, 321706, 'Tanimulya'),
(3217062005, 321706, 'Cimanggu'),
(3217062006, 321706, 'Bojongkoneng'),
(3217062007, 321706, 'Margajaya'),
(3217062008, 321706, 'Mekarsari'),
(3217062009, 321706, 'Gadobangkong'),
(3217062010, 321706, 'Sukatani'),
(3217062011, 321706, 'Pakuhaji'),
(3217072001, 321707, 'Ciptaharja'),
(3217072002, 321707, 'Cipatat'),
(3217072003, 321707, 'Citatah'),
(3217072004, 321707, 'Rajamandalakulon'),
(3217072005, 321707, 'Mandalawangi'),
(3217072006, 321707, 'Kertamukti'),
(3217072007, 321707, 'Nyalindung'),
(3217072008, 321707, 'Gunungmasigit'),
(3217072009, 321707, 'Cirawamekar'),
(3217072010, 321707, 'Mandalasari'),
(3217072011, 321707, 'Sumurbandung'),
(3217072012, 321707, 'Sarimukti'),
(3217082001, 321708, 'Kertamulya'),
(3217082002, 321708, 'Padalarang'),
(3217082003, 321708, 'Cimerang'),
(3217082004, 321708, 'Campaka Mekar'),
(3217082005, 321708, 'Tagogapu'),
(3217082006, 321708, 'Ciburuy'),
(3217082007, 321708, 'Kertajaya'),
(3217082008, 321708, 'Cipeundeuy'),
(3217082009, 321708, 'Jayamekar'),
(3217082010, 321708, 'Laksanamekar'),
(3217092001, 321709, 'Batujajar Timur'),
(3217092002, 321709, 'Batujajar Barat'),
(3217092004, 321709, 'Galanggang'),
(3217092005, 321709, 'Cangkorah'),
(3217092007, 321709, 'Selacau'),
(3217092008, 321709, 'Pangauban'),
(3217092010, 321709, 'Giriasih'),
(3217102001, 321710, 'Cipatik'),
(3217102002, 321710, 'Citapen'),
(3217102003, 321710, 'Cihampelas'),
(3217102004, 321710, 'Mekarjaya'),
(3217102005, 321710, 'Mekarmukti'),
(3217102006, 321710, 'Pataruman'),
(3217102007, 321710, 'Situwangi'),
(3217102008, 321710, 'Singajaya'),
(3217102009, 321710, 'Tanjungwangi'),
(3217102010, 321710, 'Tanjungjaya'),
(3217112001, 321711, 'Cililin'),
(3217112002, 321711, 'Budiharja'),
(3217112003, 321711, 'Batulayang'),
(3217112004, 321711, 'Bongas'),
(3217112005, 321711, 'Karanganyar'),
(3217112006, 321711, 'Karangtanjung'),
(3217112007, 321711, 'Karyamukti'),
(3217112008, 321711, 'Kidangpananjung'),
(3217112009, 321711, 'Mukapayung'),
(3217112010, 321711, 'Nanggerang'),
(3217112011, 321711, 'Rancapanggung'),
(3217122001, 321712, 'Sarinagen'),
(3217122002, 321712, 'Baranangsiang'),
(3217122003, 321712, 'Citalem'),
(3217122004, 321712, 'Cijenuk'),
(3217122005, 321712, 'Cijambu'),
(3217122006, 321712, 'Cibenda'),
(3217122007, 321712, 'Cintaasih'),
(3217122008, 321712, 'Cicangkanghilir'),
(3217122009, 321712, 'Girimukti'),
(3217122010, 321712, 'Karangsari'),
(3217122011, 321712, 'Mekarsari'),
(3217122012, 321712, 'Neglasari'),
(3217122013, 321712, 'Sirnagalih'),
(3217122014, 321712, 'Sukamulya'),
(3217132001, 321713, 'Cibedug'),
(3217132002, 321713, 'Bojong'),
(3217132003, 321713, 'Bojongsalam'),
(3217132004, 321713, 'Cibitung'),
(3217132005, 321713, 'Cicadas'),
(3217132006, 321713, 'Cinengah'),
(3217132007, 321713, 'Sukamanah'),
(3217132008, 321713, 'Sukaresmi'),
(3217142001, 321714, 'Cintakarya'),
(3217142002, 321714, 'Sindangkerta'),
(3217142003, 321714, 'Buninagara'),
(3217142004, 321714, 'Cikadu'),
(3217142005, 321714, 'Cicangkanggirang'),
(3217142006, 321714, 'Mekarwangi'),
(3217142007, 321714, 'Pasirpogor'),
(3217142008, 321714, 'Puncaksari'),
(3217142009, 321714, 'Rancasenggang'),
(3217142010, 321714, 'Weninggalih'),
(3217142011, 321714, 'Wangunsari'),
(3217152001, 321715, 'Sirnajaya'),
(3217152002, 321715, 'Gununghalu'),
(3217152003, 321715, 'Bunijaya'),
(3217152004, 321715, 'Celak'),
(3217152005, 321715, 'Cilangari'),
(3217152006, 321715, 'Sindangjaya'),
(3217152007, 321715, 'Sukasari'),
(3217152008, 321715, 'Tamanjaya'),
(3217152009, 321715, 'Wargasaluyu'),
(3217162001, 321716, 'Cikande'),
(3217162002, 321716, 'Jati'),
(3217162003, 321716, 'Girimukti'),
(3217162004, 321716, 'Bojonghaleuang'),
(3217162005, 321716, 'Cipangeran'),
(3217162006, 321716, 'Saguling'),
(3273011001, 327301, 'Sukarasa'),
(3273011002, 327301, 'Gegerkalong'),
(3273011003, 327301, 'Isola'),
(3273011004, 327301, 'Sarijadi'),
(3273021001, 327302, 'Cipaganti'),
(3273021002, 327302, 'Lebakgede'),
(3273021003, 327302, 'Sadangserang'),
(3273021004, 327302, 'Dago'),
(3273021005, 327302, 'Sekeloa'),
(3273021006, 327302, 'Lebak Siliwangi'),
(3273031001, 327303, 'Babakan Ciparay'),
(3273031002, 327303, 'Babakan'),
(3273031003, 327303, 'Sukahaji'),
(3273031004, 327303, 'Margahayu Utara'),
(3273031005, 327303, 'Margasuka'),
(3273031006, 327303, 'Cirangrang'),
(3273041001, 327304, 'Kopo'),
(3273041002, 327304, 'Babakan Tarogong'),
(3273041003, 327304, 'Jamika'),
(3273041004, 327304, 'Babakan Asih'),
(3273041005, 327304, 'Suka Asih'),
(3273051001, 327305, 'Maleber'),
(3273051002, 327305, 'Dungus Cariang'),
(3273051003, 327305, 'Ciroyom'),
(3273051004, 327305, 'Kebon Jeruk'),
(3273051005, 327305, 'Garuda'),
(3273051006, 327305, 'Campaka'),
(3273061001, 327306, 'Husen Sastranegara'),
(3273061002, 327306, 'Arjuna'),
(3273061003, 327306, 'Pajajaran'),
(3273061004, 327306, 'Pasir Kaliki'),
(3273061005, 327306, 'Pamoyanan'),
(3273061006, 327306, 'Sukaraja'),
(3273071001, 327307, 'Pasteur'),
(3273071002, 327307, 'Cipedes'),
(3273071003, 327307, 'Sukawarna'),
(3273071004, 327307, 'Sukagalih'),
(3273071005, 327307, 'Sukabungah'),
(3273081001, 327308, 'Hegarmanah'),
(3273081002, 327308, 'Ciumbuleuit'),
(3273081003, 327308, 'Ledeng'),
(3273091001, 327309, 'Cihapit'),
(3273091002, 327309, 'Tamansari'),
(3273091003, 327309, 'Citarum'),
(3273101001, 327310, 'Karasak'),
(3273101002, 327310, 'Nyengseret'),
(3273101003, 327310, 'Karanganyar'),
(3273101004, 327310, 'Panjunan'),
(3273101005, 327310, 'Cibadak'),
(3273101006, 327310, 'Pelindung Hewan'),
(3273111001, 327311, 'Cigereleng'),
(3273111002, 327311, 'Ancol'),
(3273111003, 327311, 'Pungkur'),
(3273111004, 327311, 'Balonggede'),
(3273111005, 327311, 'Ciseureuh'),
(3273111006, 327311, 'Ciateul'),
(3273111007, 327311, 'Pasirluyu'),
(3273121001, 327312, 'Gumuruh'),
(3273121002, 327312, 'Maleer'),
(3273121003, 327312, 'Cibangkong'),
(3273121004, 327312, 'Kacapiring'),
(3273121005, 327312, 'Kebonwaru'),
(3273121006, 327312, 'Kebongedang'),
(3273121007, 327312, 'Samoja'),
(3273121008, 327312, 'Binong'),
(3273131001, 327313, 'Cijagra'),
(3273131002, 327313, 'Lingkar Selatan'),
(3273131003, 327313, 'Burangrang'),
(3273131004, 327313, 'Paledang'),
(3273131005, 327313, 'Turangga'),
(3273131006, 327313, 'Malabar'),
(3273131007, 327313, 'Cikawao'),
(3273141001, 327314, 'Padasuka'),
(3273141002, 327314, 'Cikutra'),
(3273141003, 327314, 'Cicadas'),
(3273141004, 327314, 'Sukamaju'),
(3273141005, 327314, 'Sukapada'),
(3273141006, 327314, 'Pasirlayung'),
(3273151001, 327315, 'Cijerah'),
(3273151002, 327315, 'Cibuntu'),
(3273151003, 327315, 'Warung Muncang'),
(3273151004, 327315, 'Caringin'),
(3273151005, 327315, 'Cigondewah Kaler'),
(3273151006, 327315, 'Gempolsari'),
(3273151007, 327315, 'Cigondewah Rahayu'),
(3273151008, 327315, 'Cigondewah Kidul'),
(3273161001, 327316, 'Sukapura'),
(3273161002, 327316, 'Kebon Jayanti'),
(3273161003, 327316, 'Babakan Surabaya'),
(3273161004, 327316, 'Cicaheum'),
(3273161005, 327316, 'Babakansari'),
(3273161006, 327316, 'Kebon Kangkung'),
(3273171001, 327317, 'Situsaeur'),
(3273171002, 327317, 'Kebon Lega'),
(3273171003, 327317, 'Cibaduyut'),
(3273171004, 327317, 'Mekarwangi'),
(3273171005, 327317, 'Cibaduyut Kidul'),
(3273171006, 327317, 'Cibaduyut Wetan'),
(3273181001, 327318, 'Cihaur Geulis'),
(3273181002, 327318, 'Sukaluyu'),
(3273181003, 327318, 'Neglasari'),
(3273181004, 327318, 'Cigadung'),
(3273191001, 327319, 'Braga'),
(3273191002, 327319, 'Merdeka'),
(3273191003, 327319, 'Kebon Pisang'),
(3273191004, 327319, 'Babakan Ciamis'),
(3273201001, 327320, 'Antapani Kulon'),
(3273201004, 327320, 'Antapani Tengah'),
(3273201005, 327320, 'Antapani Kidul'),
(3273201006, 327320, 'Antapani Wetan'),
(3273211001, 327321, 'Batununggal'),
(3273211002, 327321, 'Wates'),
(3273211003, 327321, 'Mengger'),
(3273211004, 327321, 'Kujangsari'),
(3273221001, 327322, 'Sekejati'),
(3273221002, 327322, 'Margasari'),
(3273221003, 327322, 'Cijaura'),
(3273221004, 327322, 'Jatisari'),
(3273231001, 327323, 'Cipamokolan'),
(3273231002, 327323, 'Derwati'),
(3273231003, 327323, 'Munjahlega'),
(3273231004, 327323, 'Mekarmulya'),
(3273241001, 327324, 'Sukamiskin'),
(3273241002, 327324, 'Cisaranten Bina Harapan'),
(3273241003, 327324, 'Cisaranten Kulon'),
(3273241004, 327324, 'Sindanglaya/Cisantren Endah'),
(3273251001, 327325, 'Palasari'),
(3273251002, 327325, 'Cipadung'),
(3273251003, 327325, 'Pasir Biru'),
(3273251004, 327325, 'Cisurupan'),
(3273261003, 327326, 'Pasir Endah'),
(3273261004, 327326, 'Cigending'),
(3273261005, 327326, 'Pasirwangi'),
(3273261006, 327326, 'Pasirjati'),
(3273261007, 327326, 'Pasanggrahan'),
(3273271001, 327327, 'Cimenerang'),
(3273271002, 327327, 'Cisantren Kidul'),
(3273271003, 327327, 'Rancabolang'),
(3273271004, 327327, 'Rancanumpang'),
(3273281001, 327328, 'Cipadung Kulon'),
(3273281002, 327328, 'Cipadung Kidul'),
(3273281003, 327328, 'Cipadung Wetan'),
(3273281004, 327328, 'Mekar Mulya'),
(3273291001, 327329, 'Cisaranten Wetan'),
(3273291002, 327329, 'Pakemitan'),
(3273291003, 327329, 'Sukamulya'),
(3273291004, 327329, 'Babakan Penghulu'),
(3273301001, 327330, 'Jatihandap'),
(3273301002, 327330, 'Karang Pamulang'),
(3273301003, 327330, 'Pasir Impun'),
(3273301004, 327330, 'Sindang Jaya'),
(3277011001, 327701, 'Melong'),
(3277011002, 327701, 'Cibeureum'),
(3277011003, 327701, 'Utama'),
(3277011004, 327701, 'Leuwigajah'),
(3277011005, 327701, 'Cibeber'),
(3277021001, 327702, 'Baros'),
(3277021002, 327702, 'Cigugur Tengah'),
(3277021003, 327702, 'Karangmekar'),
(3277021004, 327702, 'Setiamanah'),
(3277021005, 327702, 'Padasuka'),
(3277021006, 327702, 'Cimahi'),
(3277031001, 327703, 'Pasirkaliki'),
(3277031002, 327703, 'Cibabat'),
(3277031003, 327703, 'Citeureup'),
(3277031004, 327703, 'Cipageran');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `divisions_name_unique` (`name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_employee_identity_number_unique` (`employee_identity_number`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD UNIQUE KEY `employees_identity_card_number_unique` (`identity_card_number`),
  ADD KEY `employees_division_id_foreign` (`division_id`),
  ADD KEY `employees_position_id_foreign` (`position_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incoming_products`
--
ALTER TABLE `incoming_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incoming_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_letters`
--
ALTER TABLE `order_letters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_letters_number_unique` (`number`),
  ADD KEY `order_letters_province_id_foreign` (`province_id`),
  ADD KEY `order_letters_regency_id_foreign` (`regency_id`),
  ADD KEY `order_letters_subdistrict_id_foreign` (`subdistrict_id`),
  ADD KEY `order_letters_village_id_foreign` (`village_id`),
  ADD KEY `order_letters_sp_employee_id_foreign` (`sp_employee_id`),
  ADD KEY `order_letters_db_employee_id_foreign` (`db_employee_id`),
  ADD KEY `order_letters_ss_employee_id_foreign` (`ss_employee_id`),
  ADD KEY `order_letters_surveyor_id_foreign` (`surveyor_id`);

--
-- Indexes for table `order_letter_products`
--
ALTER TABLE `order_letter_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_letter_products_order_letter_id_foreign` (`order_letter_id`),
  ADD KEY `order_letter_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `outgoing_products`
--
ALTER TABLE `outgoing_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outgoing_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `positions_division_id_foreign` (`division_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `provinces_name_unique` (`name`);

--
-- Indexes for table `regencies`
--
ALTER TABLE `regencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regencies_province_id_foreign` (`province_id`);

--
-- Indexes for table `subdistricts`
--
ALTER TABLE `subdistricts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subdistricts_regency_id_foreign` (`regency_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `villages_subdistrict_id_foreign` (`subdistrict_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incoming_products`
--
ALTER TABLE `incoming_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_letters`
--
ALTER TABLE `order_letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_letter_products`
--
ALTER TABLE `order_letter_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `outgoing_products`
--
ALTER TABLE `outgoing_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `regencies`
--
ALTER TABLE `regencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3278;

--
-- AUTO_INCREMENT for table `subdistricts`
--
ALTER TABLE `subdistricts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327704;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3277031005;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `incoming_products`
--
ALTER TABLE `incoming_products`
  ADD CONSTRAINT `incoming_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_letters`
--
ALTER TABLE `order_letters`
  ADD CONSTRAINT `order_letters_db_employee_id_foreign` FOREIGN KEY (`db_employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_letters_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_letters_regency_id_foreign` FOREIGN KEY (`regency_id`) REFERENCES `regencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_letters_sp_employee_id_foreign` FOREIGN KEY (`sp_employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_letters_ss_employee_id_foreign` FOREIGN KEY (`ss_employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_letters_subdistrict_id_foreign` FOREIGN KEY (`subdistrict_id`) REFERENCES `subdistricts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_letters_surveyor_id_foreign` FOREIGN KEY (`surveyor_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_letters_village_id_foreign` FOREIGN KEY (`village_id`) REFERENCES `villages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_letter_products`
--
ALTER TABLE `order_letter_products`
  ADD CONSTRAINT `order_letter_products_order_letter_id_foreign` FOREIGN KEY (`order_letter_id`) REFERENCES `order_letters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_letter_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `outgoing_products`
--
ALTER TABLE `outgoing_products`
  ADD CONSTRAINT `outgoing_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `regencies`
--
ALTER TABLE `regencies`
  ADD CONSTRAINT `regencies_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subdistricts`
--
ALTER TABLE `subdistricts`
  ADD CONSTRAINT `subdistricts_regency_id_foreign` FOREIGN KEY (`regency_id`) REFERENCES `regencies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `villages_subdistrict_id_foreign` FOREIGN KEY (`subdistrict_id`) REFERENCES `subdistricts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
