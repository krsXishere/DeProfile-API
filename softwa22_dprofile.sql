-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2023 at 11:02 PM
-- Server version: 8.0.31-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softwa22_dprofile`
--

-- --------------------------------------------------------

--
-- Table structure for table `desas`
--

CREATE TABLE `desas` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `desas`
--

INSERT INTO `desas` (`id`, `kode`, `desa`, `kecamatan_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'desa1', 'Desa Margamekar', 1, '2023-02-12 11:19:06', '2023-02-12 11:19:06', NULL),
(2, 'desa2', 'Kelurahan Kotakaler', 2, '2023-02-12 11:19:06', '2023-02-14 08:27:19', NULL),
(5, 'k8wQ0C', 'Desa Kemutug Kidul', 6, '2023-03-03 09:48:22', '2023-03-03 09:51:33', NULL),
(6, 'wptoLV', 'Desa Kemutug Kidul', 1, '2023-03-16 19:01:30', '2023-03-16 19:01:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakulikulers`
--

CREATE TABLE `ekstrakulikulers` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ekstrakulikulers`
--

INSERT INTO `ekstrakulikulers` (`id`, `jenis`, `nama`, `sekolah_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'IT', 'IT Club Nesas', 1, '2023-02-14 19:54:53', '2023-02-14 19:54:53', NULL),
(3, 'Akademik', 'Karya Ilmiah Remaja Nesas', 1, '2023-02-14 20:01:04', '2023-02-14 20:01:04', NULL),
(4, 'Olahraga', 'Basket', 1, '2023-03-05 09:04:04', '2023-03-05 09:04:04', NULL),
(6, 'Olahraga', 'Voli', 22, '2023-03-05 09:07:27', '2023-03-05 09:07:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `jenis`, `keterangan`, `sekolah_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bangunan Jurusan Komputer', 'Bangunan', 'Bangunan sumbangan dari ortu siswa', 1, '2023-02-14 19:24:58', '2023-02-21 08:08:20', NULL),
(6, 'Komputer HP ProDesk', 'Perangkat Elektronik', 'Fasilitas Jurusan Rekayasa Perangkat Lunak', 1, '2023-03-07 20:05:22', '2023-03-08 06:40:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeris`
--

INSERT INTO `galeris` (`id`, `judul`, `deskripsi`, `image`, `sekolah_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Peringatan HUT Nesas ke-59', 'Pelaksanaan HUT RI ke-77 dan HUT Nesas ke-59 pada acara Nesas Expo', 'galeri/2UW6m9oDEhLo7sBBfbVZN6a6J2TiegPrhL0R4No5.jpg', 1, '2023-02-21 08:41:52', '2023-02-21 08:42:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` bigint NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` bigint NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `nip`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `pendidikan`, `jurusan`, `alamat`, `no_telpon`, `email`, `sekolah_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 87878787890, 'Krisna Purnama', 'Laki-laki', 'Sumedang', '2005-03-15', 'Sarjana Terapan', 'Sarjana Terapan', 'Dusun Piwelas', 81222757761, 'krisnapurnama@gmail.com', 1, '2023-02-15 07:57:56', '2023-03-11 09:18:58', NULL),
(2, 8666, 'Raka Shandy Aditya', 'Laki-laki', 'Sumedang', '2005-01-28', 'Universitas Katholik Parahyangan', 'Digital Bussiness', 'Kirisik Jatinunggal', 754895748, 'adit@gmail.com', 1, '2023-02-15 07:59:21', '2023-03-14 08:36:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint UNSIGNED NOT NULL,
  `jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kurikulum_id` bigint UNSIGNED NOT NULL,
  `sekolah_id` bigint UNSIGNED NOT NULL,
  `akreditasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `jurusan`, `keterangan`, `tahun`, `kurikulum_id`, `sekolah_id`, `akreditasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rekayasa Perangkat Lunak', 'Jurusan Komputer', '2016', 1, 1, 'Akreditasi A', '2023-02-12 12:08:52', '2023-02-12 12:08:52', NULL),
(4, 'Teknik Kendaraan Ringan Otomotif', 'Jurusan Mesin', '2000', 1, 1, 'Akreditasi A', '2023-02-15 01:19:10', '2023-02-15 01:19:10', NULL),
(8, 'IPA', 'Jurusan IPA', '2013', 1, 23, 'A', '2023-03-16 19:07:05', '2023-03-16 19:07:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kabupatens`
--

CREATE TABLE `kabupatens` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kabupatens`
--

INSERT INTO `kabupatens` (`id`, `kode`, `kabupaten`, `provinsi_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kab1', 'Kabupaten Sumedang', 1, '2023-02-12 11:16:05', '2023-02-12 11:16:05', NULL),
(4, 'MuFFm64ThmCTl65AkBsi', 'Kabupaten Bandung', 1, '2023-02-14 07:59:54', '2023-02-14 07:59:54', NULL),
(5, 'P6MerJ', 'Kabupaten Subang', 1, '2023-03-03 08:55:30', '2023-03-03 08:59:25', NULL),
(7, 'mG8QSa', 'Kabupaten Banyumas', 2, '2023-03-03 09:23:09', '2023-03-03 09:23:09', NULL),
(8, 'bkxvuK', 'Bebas bebas', 22, '2023-03-16 18:52:57', '2023-03-16 18:53:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatans`
--

CREATE TABLE `kecamatans` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatans`
--

INSERT INTO `kecamatans` (`id`, `kode`, `kecamatan`, `kabupaten_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kec1', 'Kecamatan Sumedang Selatan', 1, '2023-02-12 11:17:01', '2023-02-12 11:17:01', NULL),
(2, 'kec2', 'Kecamatan Sumedang Utara', 1, '2023-02-12 11:18:31', '2023-02-12 11:18:31', NULL),
(4, 'QZtvQvSmbNruPfFL3PxW', 'Kecamatan Rancakalong', 1, '2023-02-14 08:13:46', '2023-03-03 09:30:31', NULL),
(5, 'ivQZ7R', 'Kecamatan Jatinunggal', 1, '2023-03-03 09:21:54', '2023-03-03 09:21:54', NULL),
(6, 'IH5qgw', 'Kecamatan Baturaden', 7, '2023-03-03 09:23:32', '2023-03-03 09:23:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kurikulums`
--

CREATE TABLE `kurikulums` (
  `id` bigint UNSIGNED NOT NULL,
  `kurikulum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kurikulums`
--

INSERT INTO `kurikulums` (`id`, `kurikulum`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kurikulum 2013', 'Kurtilas', '2023-02-12 12:07:04', '2023-02-12 12:07:04', NULL),
(2, 'Kurikulum Merdeka', 'Kurikulum terbaru', '2023-02-12 12:07:04', '2023-03-03 19:08:36', NULL),
(3, 'Kurikulum Darurat', 'Kurikulum Darurat', '2023-02-12 12:07:47', '2023-02-12 12:07:47', NULL),
(5, 'Kurikulum KTSP', 'Sudah tidak digunakan', '2023-02-14 19:08:58', '2023-02-14 19:08:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`) VALUES
(1, 'Super Admin'),
(2, 'Admin Sekolah'),
(3, 'Public');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_11_140421_create_provinsi_table', 1),
(6, '2023_02_11_140650_create_kabupaten_table', 1),
(7, '2023_02_11_140757_create_kecamatan_table', 1),
(8, '2023_02_11_140925_create_desa_table', 1),
(9, '2023_02_11_140944_create_sekolah_table', 1),
(10, '2023_02_11_141005_create_kurikulum_table', 1),
(11, '2023_02_11_141322_create_jurusan_table', 1),
(12, '2023_02_11_141323_create_siswa_table', 1),
(13, '2023_02_11_141419_create_galeri_table', 1),
(14, '2023_02_11_141437_create_prestasi_table', 1),
(15, '2023_02_11_141502_create_ekstrakulikuler_table', 1),
(16, '2023_02_11_141547_create_fasilitass_table', 1),
(17, '2023_02_11_141608_create_guru_table', 1),
(18, '2023_02_12_075754_change_sekolahs_no_telpon_column_type', 1),
(19, '2023_02_12_122532_change_siswas_nisn_column_type', 2),
(20, '2023_02_15_013155_change_kurikulums_keterangan_column_type', 3),
(21, '2023_02_15_023134_change_fasilitas_keterangan_column_type', 4),
(22, '2023_02_17_110348_add_npsn_to_sekolahs', 5),
(23, '2023_02_17_111216_change_nss_rt_rw_sekolahs_column_type', 6),
(24, '2023_02_17_135240_add_image_users_column_type', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(15, 'App\\Models\\User', 3, 'android', '8e631bf7ffca4c02aaae7c37230d598d8a357587e99c70f850d00c0dc31a0530', '[\"*\"]', NULL, NULL, '2023-02-17 07:01:56', '2023-02-17 07:01:56'),
(45, 'App\\Models\\User', 1, 'android', 'a3b491ef527abe0290414c63cd01bafb9eb48e413d442c4ed7cd28e1da96fc2a', '[\"admin-user\"]', '2023-02-25 20:16:41', NULL, '2023-02-22 04:15:59', '2023-02-25 20:16:41'),
(46, 'App\\Models\\User', 1, 'android', 'bfddb136522b748b80098ff74c7fcafd68430ad6c0e2fdde21ab0d290bfbb768', '[\"admin-user\"]', NULL, NULL, '2023-02-23 00:49:56', '2023-02-23 00:49:56'),
(47, 'App\\Models\\User', 3, 'android', 'c6934e2242d0faa5e1ee7fefbc993a282f828c61c45c6243eeca9819bb7ae6b5', '[\"admin-user\"]', '2023-02-23 01:52:23', NULL, '2023-02-23 00:54:29', '2023-02-23 01:52:23'),
(48, 'App\\Models\\User', 5, 'riansah@gmail.com', '248b5d7c652e8271dbd23cc19a8d97cf446e2471ad7c15a24e8258f61be722f9', '[\"*\"]', NULL, NULL, '2023-02-23 01:26:33', '2023-02-23 01:26:33'),
(55, 'App\\Models\\User', 10, 'riansahhhh@gmail.com', '902085a38016630b6577543d40015f62aa58669d2854e8da37f4c005655cf57c', '[\"*\"]', NULL, NULL, '2023-02-23 05:34:09', '2023-02-23 05:34:09'),
(56, 'App\\Models\\User', 1, 'ikis@gmail.com', '75521381594e4cbebccf0e9ca076a1a0c62aea48a4dfd8f9de50a00674e40cb3', '[\"public-user\"]', NULL, NULL, '2023-02-23 05:58:58', '2023-02-23 05:58:58'),
(57, 'App\\Models\\User', 1, 'ikis@gmail.com', '55cca058b941837d66352f125bc7f7917fd05552ad36e38ce7b58b06cf60d790', '[\"public-user\"]', NULL, NULL, '2023-02-23 05:59:50', '2023-02-23 05:59:50'),
(58, 'App\\Models\\User', 1, 'ikis@gmail.com', '8c29b78e9dde4970e54b5b5e95a1ca9cb403cef8e46c62784a69043c20d926bd', '[\"public-user\"]', '2023-02-23 06:07:52', NULL, '2023-02-23 06:00:30', '2023-02-23 06:07:52'),
(63, 'App\\Models\\User', 1, 'ikis@gmail.com', '2a763dbc9ce9dd580b3611e03dfd6f0be2035c921bc6070bdd8699f0cd7ba8e6', '[\"public-user\"]', '2023-02-23 21:10:27', NULL, '2023-02-23 21:05:16', '2023-02-23 21:10:27'),
(64, 'App\\Models\\User', 12, 'rudi@gmail.com', 'cbef2a31ed9478088b48381a003560cc11fb4c8b024d3c1bb0678a4db870bc19', '[\"*\"]', NULL, NULL, '2023-02-23 21:14:48', '2023-02-23 21:14:48'),
(67, 'App\\Models\\User', 13, 'naufaldafa17@gmail.com', '8f352d085b49572a8f5c6c39563ff8c1984963cef921dcf145ba25568e084da8', '[\"*\"]', NULL, NULL, '2023-02-23 21:19:54', '2023-02-23 21:19:54'),
(69, 'App\\Models\\User', 1, 'ikis@gmail.com', '959e2f52aff648085da12cf8b9a92fe4dd4d35f6e2e93d8218c7e0fc109380ff', '[\"public-user\"]', '2023-02-24 04:18:08', NULL, '2023-02-23 21:34:08', '2023-02-24 04:18:08'),
(70, 'App\\Models\\User', 12, 'rudi@gmail.com', 'ff331399620e5868d94554471d13d738757709e44483cd2a3f407a237e45eabb', '[\"public-user\"]', '2023-02-25 21:29:37', NULL, '2023-02-24 04:02:18', '2023-02-25 21:29:37'),
(71, 'App\\Models\\User', 1, 'ikis@gmail.com', 'cb5ddacdf8a7c15d348bebd289aa17610e47e7e56c13f5de27c2842aec20cd21', '[\"public-user\"]', '2023-02-24 09:11:40', NULL, '2023-02-24 09:02:53', '2023-02-24 09:11:40'),
(74, 'App\\Models\\User', 14, 'cevi@gmail.com', '8054aaa2e341f71ca1f1ab910fe5341b53d9d58b9bfd0499d8495a6326da6088', '[\"*\"]', NULL, NULL, '2023-02-25 08:24:46', '2023-02-25 08:24:46'),
(75, 'App\\Models\\User', 15, 'riansahhhhh@gmail.com', '74174bb5408cb8ca970b0326de2592fcf2f0752f81098f6c383bf56ea5f8f380', '[\"*\"]', NULL, NULL, '2023-02-25 08:28:05', '2023-02-25 08:28:05'),
(76, 'App\\Models\\User', 1, 'ikis@gmail.com', 'bec88dc9aaf532cdcd279ea0df9599773c8e01f660b47b7e04037ff4f13729d9', '[\"public-user\"]', NULL, NULL, '2023-02-25 08:28:14', '2023-02-25 08:28:14'),
(77, 'App\\Models\\User', 16, 'riansahhhhhh@gmail.com', 'df7bcfc9464864b6fc9a500d5bb5c7c91889d781ff3bacbb050ad3be8e930270', '[\"*\"]', NULL, NULL, '2023-02-25 08:32:34', '2023-02-25 08:32:34'),
(78, 'App\\Models\\User', 17, 'cevii@gmail.com', '86a080bc8168b23c34b8a90a266b754a853374ad0f1bd9327eeb51aba46b7545', '[\"*\"]', NULL, NULL, '2023-02-25 08:32:44', '2023-02-25 08:32:44'),
(80, 'App\\Models\\User', 18, 'ceviii@gmail.com', 'cfe10343e4c256350d52ffab0964866e16f6bf5a541698b14d914b1093799525', '[\"public-user\"]', '2023-02-25 09:36:43', NULL, '2023-02-25 09:17:02', '2023-02-25 09:36:43'),
(82, 'App\\Models\\User', 18, 'ceviii@gmail.com', '7f123150afb074b8cdc0f3c5c3fcd2646f61b73c409bd7e88f0fb9765582a5a9', '[\"public-user\"]', '2023-02-25 10:47:53', NULL, '2023-02-25 10:21:42', '2023-02-25 10:47:53'),
(88, 'App\\Models\\User', 17, 'cevii@gmail.com', '163a67d2e37788fdfef914cdaf7650932dcd9ee0f671e6c5bf0e704cbc83897d', '[\"public-user\"]', '2023-02-25 20:39:05', NULL, '2023-02-25 20:38:45', '2023-02-25 20:39:05'),
(89, 'App\\Models\\User', 14, 'cevi@gmail.com', '1b38936023a451a14b04021e97dcdf96541fbe5bd5edf6b17df0ca89c7fb2122', '[\"public-user\"]', '2023-02-26 07:09:17', NULL, '2023-02-25 21:08:36', '2023-02-26 07:09:17'),
(90, 'App\\Models\\User', 1, 'android', 'da7205cc80d379f1deee154b44a5e6e374f8ecaf50e4caef217c03d04419eda9', '[\"admin-user\"]', '2023-02-26 07:01:14', NULL, '2023-02-25 21:30:19', '2023-02-26 07:01:14'),
(91, 'App\\Models\\User', 1, 'ikis@gmail.com', 'fb4a4d0ced90e223fdcf42a30a387f3cd2cc941c8a7b38a9024662203b00e6e7', '[\"public-user\"]', '2023-02-26 22:20:36', NULL, '2023-02-26 21:47:29', '2023-02-26 22:20:36'),
(92, 'App\\Models\\User', 1, 'ikis@gmail.com', '0870dfeb921c8035694c07b7581fb889c9f0aa2add975aa8d1e6451d9999bb79', '[\"public-user\"]', '2023-02-27 05:13:51', NULL, '2023-02-27 04:58:47', '2023-02-27 05:13:51'),
(93, 'App\\Models\\User', 1, 'ikis@gmail.com', '94cceb41250629ce5e390908baa079e8c82c7587eae7b44f5ec4ebb71ac3f9c8', '[\"public-user\"]', NULL, NULL, '2023-03-03 04:33:35', '2023-03-03 04:33:35'),
(94, 'App\\Models\\User', 19, 'admin@gmail.com', '492eed09fe724cc9bd9f78458be377819c69ec37ade84f8814bc1de95710567b', '[\"*\"]', NULL, NULL, '2023-03-03 09:54:38', '2023-03-03 09:54:38'),
(95, 'App\\Models\\User', 32, 'ikis@gmail.com', '8c38454177e67cc8fef1af1b3cec10e387e7a835e32839a75e80ea6ef4ca210e', '[\"public-user\"]', '2023-03-16 17:41:37', NULL, '2023-03-16 17:41:15', '2023-03-16 17:41:37'),
(100, 'App\\Models\\User', 32, 'ikis@gmail.com', '25b0b48d8e4d23a4aa6811f61bddd3a9fed3b582b0d4436a19581e6f8349c59a', '[\"public-user\"]', '2023-03-20 15:51:43', NULL, '2023-03-17 18:09:38', '2023-03-20 15:51:43'),
(101, 'App\\Models\\User', 40, 'cepi@gmail.com', 'afabf7f98fe92b1ecaf849232e9b90a78ea9d1c8c6de2b026f49420de00c0fbb', '[\"*\"]', '2023-03-23 08:41:34', NULL, '2023-03-23 08:41:26', '2023-03-23 08:41:34'),
(102, 'App\\Models\\User', 41, 'adit@gmail.com', 'ebb38365350fa7a0a271cf5aec9b934af917add0425936193699712e2036d9a3', '[\"*\"]', '2023-03-23 08:46:04', NULL, '2023-03-23 08:45:49', '2023-03-23 08:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `prestasis`
--

CREATE TABLE `prestasis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_prestasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prestasis`
--

INSERT INTO `prestasis` (`id`, `nama`, `jenis_prestasi`, `tingkat`, `keterangan`, `sekolah_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Juara 1 LKS ITSSFB', 'Akademik', 'Kabupaten', 'Krisna Purnama sebagai peraih Juara 1 bidang IT Software Solution for Bussiness', 1, '2023-02-14 23:20:57', '2023-02-14 23:20:57', NULL),
(2, 'Juara Harapan 3 LKS ITSSFB', 'Akademik', 'Provinsi', 'Krisna Purnama sebagai peraih Juara Harapan 3 bidang IT Software Solution for Bussiness', 1, '2023-02-14 23:22:30', '2023-02-14 23:22:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinsis`
--

CREATE TABLE `provinsis` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinsis`
--

INSERT INTO `provinsis` (`id`, `kode`, `provinsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'prov1', 'Jawa Barat', '2023-02-12 11:15:16', '2023-02-12 11:15:16', NULL),
(2, 'prov2', 'Jawa Tengah', '2023-02-12 11:15:16', '2023-02-12 11:15:16', NULL),
(12, 'Dhjpi1', 'Sulawesi Selatan', '2023-03-03 07:50:04', '2023-03-03 07:50:04', NULL),
(14, 't4T9td', 'Sulawesi Utara', '2023-03-12 11:38:14', '2023-03-12 11:38:14', NULL),
(15, 'XQ44Kd', 'NTT', '2023-03-12 11:38:14', '2023-03-12 11:38:14', NULL),
(16, 'rDSqm3', 'DKI Jakarta', '2023-03-12 11:38:14', '2023-03-12 11:38:14', NULL),
(17, 'xVme4G', 'provinsi', '2023-03-13 06:57:20', '2023-03-13 06:57:20', NULL),
(18, '55mSAT', 'Sulawesi Utara', '2023-03-13 06:57:20', '2023-03-13 06:57:20', NULL),
(19, 'nC8igP', 'NTT', '2023-03-13 06:57:20', '2023-03-13 06:57:20', NULL),
(20, 'wqgGGG', 'DKI Jakarta', '2023-03-13 06:57:20', '2023-03-13 06:57:20', NULL),
(22, 'HCHijj', 'Jakarta', '2023-03-16 18:51:57', '2023-03-16 18:51:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sekolahs`
--

CREATE TABLE `sekolahs` (
  `id` bigint UNSIGNED NOT NULL,
  `nss` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `npsn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa_id` bigint UNSIGNED NOT NULL,
  `rw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_fax` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat_long` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepala_sekolah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolahs`
--

INSERT INTO `sekolahs` (`id`, `nss`, `npsn`, `nama`, `alamat`, `desa_id`, `rw`, `rt`, `no_telpon`, `no_fax`, `lat_long`, `image`, `email`, `kepala_sekolah`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '321021018002', '0989809', 'SMK Negeri 1 Sumedang', 'Jl. Mayor Abdurakhman No.209 ', 2, '0', '0', '(0261) 202056-203646', '(0261) 202056-203646', '-6.832352 / 107.96264599999995', 'sekolah/fiSNyKdC8aGzH5QuPdRUxh4zDjfJj9VSRquBmYkx.jpg', 'smkn1smd@gmail.com', 'Dra. Elis Herawati, M. Pd', 37, '2023-02-12 11:19:57', '2023-03-09 01:14:19', NULL),
(22, '456789', '567890', 'SMK Negeri 2 Sumedang', 'Kairo', 1, '0', '0', '456789', '45678', '3456789 / 3456789', 'sekolah/HKPhUGplrr11H89ofi7817VNn3oAujvzMRUQu6sL.png', 'smkn2smd@gmail.com', 'Bapak Anonymous', 38, '2023-03-16 05:15:56', '2023-03-16 05:15:56', NULL),
(23, '23456789', '456789', 'SMAN 1 SUMEDANG', 'Dusun Nangorak', 5, '0', '0', '345678990(456789)', '345678990(456789)', '345678 / 456789', 'sekolah/csxVQvbDV0UQj98MMQJWtsZztr2UbTTF8AVIbjtq.png', 'smansa@gmail.com', 'Bapak Anonymous', 39, '2023-03-16 19:05:32', '2023-03-16 19:05:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint UNSIGNED NOT NULL,
  `nisn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` bigint NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nisn`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `pendidikan`, `alamat`, `no_telpon`, `email`, `jurusan_id`, `tahun_ajaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '0055361481', 'Krisna Purnama', 'Laki-laki', 'Sumedang', '2005-03-15', 'SMP Negeri 3 Sumedang', 'Dusun Piwelas', 81222757761, 'krisnapurnama28@gmail.com', 1, '2022/2023', '2023-02-12 12:16:54', '2023-02-12 12:16:54', NULL),
(2, '0055361481', 'Alya Yasmin Salsabila', 'Perempuan', 'Sumedang', '2004-07-12', 'SMP Negeri 4 Sumedang', 'Gang Sepat', 895333181401, 'yasminalya4@gmail.com', 1, '2022/2023', '2023-02-12 12:16:54', '2023-02-12 12:16:54', NULL),
(6, '0055361481', 'Chandra Gusman Juliawan', 'Laki-laki', 'Sumedang', '2005-03-15', 'SMP Negeri 3 Sumedang', 'Gunung Puyuh', 98765432, 'chala@gmail.com', 1, '2022/2023', '2023-03-10 21:17:03', '2023-03-10 21:17:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_id` bigint NOT NULL,
  `status_akun` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `level_id`, `status_akun`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 'Admin De\'Profile', 'admin@gmail.com', NULL, '$2y$10$uZlm1uku5qv4ESiLepAWG.vPnW9kixkuJ2aXiQs1tvt2QvBO0QoVC', '', 1, 'Sudah digunakan', NULL, '2023-03-03 09:54:38', '2023-03-13 06:52:59', NULL),
(29, 'Alya Yasmin Salsabila', 'ayaa@gmail.com', NULL, '$2y$10$Us250RxDdFEUSXUGDbtHNOuHPz77XE2z4f1RUEHAId6TRSGgFYKFK', 'users_picture/343ueASuTITFqzszXbG8Hfpl6ymg1qNHdxCEsNlE.jpg', 3, 'Sudah digunakan', NULL, '2023-03-05 07:12:23', '2023-03-05 07:36:25', NULL),
(32, 'Krisna Purnama', 'ikis@gmail.com', NULL, '$2y$10$2bQcC2iz/ybVv2KNtVPqIuoGHZuiZ/Urwfizb3FKbINKV6f4NqpT2', 'users_picture/DAaQ6T9LVbMfN8FLpgnV1Ue6BNcGxZUJR69D9qau.jpg', 3, 'Sudah digunakan', NULL, '2023-03-05 07:27:34', '2023-03-16 17:58:35', NULL),
(37, 'SMK NESAS', 'smkn1smd@gmail.com', NULL, '$2y$10$/lAhNQec0GPE5tnkn4X4GOE3lVvVhdfQbgxnmplak0GcjXyliR/ay', 'users_picture/JCtq6O180QjQVOvm5zOjrASLWsa5OHZuEzLi5tdB.png', 2, 'Sudah digunakan', NULL, '2023-03-16 01:54:20', '2023-03-16 01:54:20', NULL),
(38, 'SMK Negeri 2 Sumedang', 'smkn2smd@gmail.com', NULL, '$2y$10$8VJMiYX8k.5LciPMr6ZZk.XdDO1XMwFPamFRQClXWYL8cxS0sq/Ri', 'users_picture/QnHdiojJN98c1QTr1RYKSuGtJAulOi8PieRJvZDk.png', 2, 'Belum digunakan', NULL, '2023-03-16 04:37:38', '2023-03-16 04:37:38', NULL),
(39, 'SMAN 1 SMD', 'smansa@gmail.com', NULL, '$2y$10$GAFI7zRPoCt6zdpStFafQuwb/fKp7JFfAzcJQd53RtqM4K/mUaKZe', 'users_picture/HLLo83rJEtBe2s2RdegwidcM4DKGKuofq4UMjNdE.png', 2, 'Belum digunakan', NULL, '2023-03-16 19:03:12', '2023-03-16 19:03:12', NULL),
(40, 'Kevin', 'cepi@gmail.com', NULL, '$2y$10$tQCUZfXc1RIwCC8vSdE3C.1z8afuVayNYftLlmJoQoXuas1n4DtY2', NULL, 3, 'Sudah digunakan', NULL, '2023-03-23 08:41:26', '2023-03-23 08:41:26', NULL),
(41, 'Raka', 'adit@gmail.com', NULL, '$2y$10$u6V/z6WVrd0PG24mCbHVXe4WTSJuP/ZQ7.Uww5ltq2GPDi7Y1gh1m', NULL, 3, 'Sudah digunakan', NULL, '2023-03-23 08:45:49', '2023-03-23 08:45:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desas`
--
ALTER TABLE `desas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desas_kecamatan_id_foreign` (`kecamatan_id`);

--
-- Indexes for table `ekstrakulikulers`
--
ALTER TABLE `ekstrakulikulers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ekstrakulikulers_sekolah_id_foreign` (`sekolah_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fasilitass_sekolah_id_foreign` (`sekolah_id`);

--
-- Indexes for table `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galeris_sekolah_id_foreign` (`sekolah_id`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gurus_sekolah_id_foreign` (`sekolah_id`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurusans_kurikulum_id_foreign` (`kurikulum_id`),
  ADD KEY `jurusans_sekolah_id_foreign` (`sekolah_id`);

--
-- Indexes for table `kabupatens`
--
ALTER TABLE `kabupatens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kabupatens_provinsi_id_foreign` (`provinsi_id`);

--
-- Indexes for table `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatans_kabupaten_id_foreign` (`kabupaten_id`);

--
-- Indexes for table `kurikulums`
--
ALTER TABLE `kurikulums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prestasis`
--
ALTER TABLE `prestasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prestasis_sekolah_id_foreign` (`sekolah_id`);

--
-- Indexes for table `provinsis`
--
ALTER TABLE `provinsis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sekolahs_desa_id_foreign` (`desa_id`),
  ADD KEY `sekolahs_user_id_foreign` (`user_id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_jurusan_id_foreign` (`jurusan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `foreignkey_level_id` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desas`
--
ALTER TABLE `desas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ekstrakulikulers`
--
ALTER TABLE `ekstrakulikulers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kabupatens`
--
ALTER TABLE `kabupatens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kecamatans`
--
ALTER TABLE `kecamatans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kurikulums`
--
ALTER TABLE `kurikulums`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `prestasis`
--
ALTER TABLE `prestasis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `provinsis`
--
ALTER TABLE `provinsis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sekolahs`
--
ALTER TABLE `sekolahs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `desas`
--
ALTER TABLE `desas`
  ADD CONSTRAINT `desas_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ekstrakulikulers`
--
ALTER TABLE `ekstrakulikulers`
  ADD CONSTRAINT `ekstrakulikulers_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitass_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galeris`
--
ALTER TABLE `galeris`
  ADD CONSTRAINT `galeris_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gurus`
--
ALTER TABLE `gurus`
  ADD CONSTRAINT `gurus_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD CONSTRAINT `jurusans_kurikulum_id_foreign` FOREIGN KEY (`kurikulum_id`) REFERENCES `kurikulums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jurusans_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kabupatens`
--
ALTER TABLE `kabupatens`
  ADD CONSTRAINT `kabupatens_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD CONSTRAINT `kecamatans_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupatens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prestasis`
--
ALTER TABLE `prestasis`
  ADD CONSTRAINT `prestasis_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD CONSTRAINT `sekolahs_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sekolahs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `foreignkey_level_id` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
