-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2021 pada 11.12
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `administrasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `approver_list`
--

CREATE TABLE `approver_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document` varchar(200) NOT NULL,
  `document_id` int(11) NOT NULL,
  `apv_level` int(11) NOT NULL,
  `status` varchar(25) DEFAULT NULL,
  `kategori` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `approver_list`
--

INSERT INTO `approver_list` (`id`, `user_id`, `document`, `document_id`, `apv_level`, `status`, `kategori`, `tanggal`, `id_divisi`, `id_jabatan`, `updated_at`, `created_at`) VALUES
(1, 3, 'Surat Masuk', 1, 1, NULL, 'Surat Masuk', '0000-00-00', 3, 5, '2021-03-25 22:45:16', '2021-03-25 22:45:16'),
(2, 3, 'Surat Masuk', 1, 1, NULL, 'Surat Masuk', '0000-00-00', 3, 5, '2021-03-25 22:46:12', '2021-03-25 22:46:12'),
(3, 3, 'Surat Masuk', 1, 1, NULL, 'Surat Masuk', '0000-00-00', 3, 5, '2021-03-25 22:47:03', '2021-03-25 22:47:03'),
(4, 3, 'Surat Masuk', 1, 1, NULL, 'Surat Masuk', '0000-00-00', 3, 5, '2021-03-25 22:47:49', '2021-03-25 22:47:49'),
(5, 3, 'Surat Masuk', 1, 1, NULL, 'Surat Masuk', '0000-00-00', 3, 5, '2021-03-25 22:50:00', '2021-03-25 22:50:00'),
(6, 3, 'Surat Masuk', 1, 1, NULL, 'Surat Masuk', '0000-00-00', 3, 5, '2021-03-25 22:52:34', '2021-03-25 22:52:34'),
(7, 3, 'Surat Masuk', 1, 1, NULL, 'Surat Masuk', '0000-00-00', 3, 5, '2021-03-25 22:53:03', '2021-03-25 22:53:03'),
(8, 3, 'Surat Masuk', 1, 1, NULL, 'Surat Masuk', '0000-00-00', 3, 5, '2021-03-25 22:54:04', '2021-03-25 22:54:04'),
(9, 3, 'Surat Masuk', 2, 1, NULL, 'Surat Masuk', '0000-00-00', 3, 5, '2021-03-25 23:00:21', '2021-03-25 23:00:21'),
(10, 4, 'Surat Masuk', 3, 1, NULL, 'Surat Masuk', '0000-00-00', 2, 6, '2021-03-25 23:23:56', '2021-03-25 23:23:56'),
(11, 5, 'Surat Masuk', 3, 2, NULL, 'Surat Masuk', '0000-00-00', 2, 5, '2021-03-25 23:23:56', '2021-03-25 23:23:56'),
(12, 6, 'Surat Masuk', 3, 3, NULL, 'Surat Masuk', '0000-00-00', 3, 6, '2021-03-25 23:23:56', '2021-03-25 23:23:56'),
(18, 6, 'Surat Masuk', 4, 3, 'Approve', 'Surat Masuk', '2021-03-27', 3, 6, '2021-03-27 19:41:53', '2021-03-27 10:22:52'),
(19, 4, 'Surat Masuk', 4, 1, 'Approve', 'Surat Masuk', '2021-03-27', 2, 6, '2021-03-27 19:14:24', '2021-03-27 10:23:57'),
(20, 5, 'Surat Masuk', 4, 2, 'Approve', 'Surat Masuk', '2021-03-27', 2, 5, '2021-03-27 19:40:54', '2021-03-27 10:23:57'),
(25, 4, 'Surat Masuk', 7, 1, 'Approve', 'Surat Masuk', '2021-03-29', 2, 6, '2021-03-29 05:20:40', '2021-03-29 05:18:49'),
(26, 5, 'Surat Masuk', 7, 2, 'Approve', 'Surat Masuk', '2021-03-29', 2, 5, '2021-03-29 05:21:41', '2021-03-29 05:18:49'),
(27, 6, 'Surat Masuk', 7, 3, 'Approve', 'Surat Masuk', '2021-03-29', 3, 6, '2021-03-29 05:22:58', '2021-03-29 05:18:49'),
(31, 4, 'Surat Masuk', 9, 1, 'Approve', 'Surat Masuk', '2021-03-31', 2, 6, '2021-03-31 05:47:29', '2021-03-31 04:31:34'),
(32, 5, 'Surat Masuk', 9, 2, NULL, 'Surat Masuk', '2021-03-31', 2, 5, '2021-03-31 04:31:34', '2021-03-31 04:31:34'),
(33, 6, 'Surat Masuk', 9, 3, NULL, 'Surat Masuk', '2021-03-31', 3, 6, '2021-03-31 04:31:34', '2021-03-31 04:31:34'),
(34, 4, 'Surat Masuk', 11, 1, NULL, 'Surat Masuk', '2021-06-15', 2, 6, '2021-06-14 23:10:28', '2021-06-14 23:10:28'),
(35, 5, 'Surat Masuk', 11, 2, NULL, 'Surat Masuk', '2021-06-15', 2, 5, '2021-06-14 23:10:28', '2021-06-14 23:10:28'),
(36, 6, 'Surat Masuk', 11, 3, NULL, 'Surat Masuk', '2021-06-15', 3, 6, '2021-06-14 23:10:28', '2021-06-14 23:10:28'),
(37, 4, 'Surat Masuk', 12, 1, NULL, 'Surat Masuk', '2021-06-15', 2, 6, '2021-06-14 23:19:35', '2021-06-14 23:19:35'),
(38, 5, 'Surat Masuk', 12, 2, NULL, 'Surat Masuk', '2021-06-15', 2, 5, '2021-06-14 23:19:35', '2021-06-14 23:19:35'),
(39, 6, 'Surat Masuk', 12, 3, NULL, 'Surat Masuk', '2021-06-15', 3, 6, '2021-06-14 23:19:35', '2021-06-14 23:19:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `approver_log`
--

CREATE TABLE `approver_log` (
  `id` int(11) NOT NULL,
  `document` varchar(200) NOT NULL,
  `document_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `kategori` varchar(200) DEFAULT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `approver_log`
--

INSERT INTO `approver_log` (`id`, `document`, `document_id`, `user_id`, `status`, `keterangan`, `kategori`, `id_divisi`, `id_jabatan`, `tanggal`, `updated_at`, `created_at`) VALUES
(1, 'Surat Masuk', 1, 1, 'Submitted', 'Approval Surat Masuk', NULL, 2, 1, '0000-00-00', '2021-03-25 22:53:03', '2021-03-25 22:53:03'),
(2, 'Surat Masuk', 1, 1, 'Submitted', 'Approval Surat Masuk', NULL, 2, 1, '0000-00-00', '2021-03-25 22:54:04', '2021-03-25 22:54:04'),
(3, 'Surat Masuk', 2, 1, 'Submitted', 'Approval Surat Masuk', NULL, 2, 1, '0000-00-00', '2021-03-25 23:00:21', '2021-03-25 23:00:21'),
(4, 'Surat Masuk', 3, 1, 'Submitted', 'Approval Surat Masuk', NULL, 2, 1, '2021-03-26', '2021-03-26 07:01:44', '2021-03-25 23:23:56'),
(5, 'Surat Masuk', 4, 1, 'Submitted', 'Approval Surat Masuk', NULL, 2, 1, '2021-03-27', '2021-03-27 10:23:57', '2021-03-27 10:23:57'),
(6, 'Surat Masuk', 4, 6, 'In Progress', '-', NULL, 3, 6, '2021-03-27', '2021-03-27 12:00:33', '2021-03-27 12:00:33'),
(7, 'Surat Masuk', 4, 6, 'In Progress', '-', NULL, 3, 6, '2021-03-27', '2021-03-27 12:07:08', '2021-03-27 12:07:08'),
(8, 'Surat Masuk', 4, 4, 'In Progress', '-', NULL, 3, 6, '2021-03-27', '2021-03-27 19:11:56', '2021-03-27 12:10:06'),
(9, 'Surat Masuk', 4, 5, 'In Progress', '-', NULL, 3, 5, '2021-03-28', '2021-03-27 19:40:54', '2021-03-27 19:40:54'),
(10, 'Surat Masuk', 4, 6, 'Completed', '-', NULL, 3, 6, '2021-03-28', '2021-03-27 19:41:53', '2021-03-27 19:41:53'),
(11, 'Surat Masuk', 6, 1, 'Submitted', 'Approval Surat Masuk', NULL, 2, 1, '2021-03-28', '2021-03-28 01:00:33', '2021-03-28 01:00:33'),
(12, 'Surat Masuk', 7, 1, 'Submitted', 'Approval Surat Masuk', NULL, 2, 1, '2021-03-29', '2021-03-29 05:18:49', '2021-03-29 05:18:49'),
(13, 'Surat Masuk', 7, 4, 'In Progress', '-', NULL, 3, 6, '2021-03-29', '2021-03-29 05:20:40', '2021-03-29 05:20:40'),
(14, 'Surat Masuk', 7, 5, 'In Progress', '-', NULL, 3, 5, '2021-03-29', '2021-03-29 05:21:41', '2021-03-29 05:21:41'),
(15, 'Surat Masuk', 7, 6, 'Completed', '-', NULL, 3, 6, '2021-03-29', '2021-03-29 05:22:58', '2021-03-29 05:22:58'),
(16, 'Surat Masuk', 8, 1, 'Submitted', 'Approval Surat Masuk', NULL, 2, 1, '2021-03-29', '2021-03-29 05:54:41', '2021-03-29 05:54:41'),
(17, 'Surat Masuk', 8, 4, 'Rejected', 'Typo', NULL, 3, 6, '2021-03-29', '2021-03-29 06:05:38', '2021-03-29 06:05:38'),
(18, 'Surat Masuk', 6, 4, 'Rejected', 'Typo MAs', NULL, 3, 6, '2021-03-29', '2021-03-29 06:06:25', '2021-03-29 06:06:25'),
(19, 'Surat Masuk', 9, 1, 'Submitted', 'Approval Surat Masuk', NULL, 2, 1, '2021-03-31', '2021-03-31 04:31:34', '2021-03-31 04:31:34'),
(20, 'Surat Masuk', 9, 4, 'In Progress', '-', NULL, 3, 6, '2021-03-31', '2021-03-31 05:47:29', '2021-03-31 05:47:29'),
(21, 'Surat Masuk', 11, 1, 'Submitted', 'Approval Surat Masuk', NULL, 2, 1, '2021-06-15', '2021-06-14 23:10:28', '2021-06-14 23:10:28'),
(22, 'Surat Masuk', 12, 1, 'Submitted', 'Approval Surat Masuk', NULL, 2, 1, '2021-06-15', '2021-06-14 23:19:35', '2021-06-14 23:19:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `departmenr`
--

CREATE TABLE `departmenr` (
  `id` int(11) NOT NULL,
  `department` varchar(200) NOT NULL,
  `singkatan` varchar(200) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `departmenr`
--

INSERT INTO `departmenr` (`id`, `department`, `singkatan`, `is_delete`) VALUES
(1, 'Kesehatan Masyarakat', 'KESMAS', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi_d`
--

CREATE TABLE `divisi_d` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `line_no` int(11) NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisi_d`
--

INSERT INTO `divisi_d` (`id`, `line_no`, `nama_jabatan`, `id_divisi`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 'Manajer', 2, 0, NULL, NULL),
(2, 2, 'Supervisor', 2, 0, NULL, NULL),
(3, 3, 'Staff', 2, 0, NULL, NULL),
(4, 1, 'Manajer', 3, 0, NULL, NULL),
(5, 2, 'Supervisor', 3, 0, NULL, NULL),
(6, 3, 'Operator', 3, 0, NULL, NULL),
(7, 4, 'Staffc', 3, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi_h`
--

CREATE TABLE `divisi_h` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_divisi` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses` int(200) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisi_h`
--

INSERT INTO `divisi_h` (`id`, `nama_divisi`, `akses`, `is_delete`, `created_at`, `updated_at`) VALUES
(2, 'Informatics and Technology', 1, 0, NULL, NULL),
(3, 'Displan', 2, 0, NULL, NULL),
(4, 'Kepala TU', 3, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `is_delete` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama_karyawan`, `username`, `password`, `id_divisi`, `id_jabatan`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Chelvin Reksa', 'admin', '21232f297a57a5a743894a0e4a801fc3', 2, 1, '0', '2021-03-16 06:54:59', '2021-03-16 06:54:59'),
(2, 'Nurman Fiqri S', '', '', 2, 2, '0', '2021-03-16 06:55:23', '2021-03-16 06:55:23'),
(3, 'Adi Siswoyo', '', '', 3, 5, '0', '2021-03-16 06:55:39', '2021-03-16 06:55:39'),
(4, 'Amin TU', 'amin', 'caf1a3dfb505ffed0d024130f58c5cfa', 2, 6, '0', '2021-03-26 06:19:55', '2021-03-26 06:19:55'),
(5, 'Ericka Devi', 'erika', 'e10adc3949ba59abbe56e057f20f883e', 2, 5, '0', '2021-03-26 06:20:49', '2021-03-26 06:20:49'),
(6, 'Heru Agus', 'heru', '01cfcd4f6b8770febfb40cb906715822', 3, 6, '0', '2021-03-26 06:21:52', '2021-03-26 06:21:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mails`
--

CREATE TABLE `mails` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `directory` varchar(1000) NOT NULL,
  `mail_folder_id` int(11) NOT NULL,
  `mail_type_id` int(11) NOT NULL,
  `mail_reference_id` int(11) NOT NULL,
  `mail_priority_id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mails_files`
--

CREATE TABLE `mails_files` (
  `id` int(11) NOT NULL,
  `original_name` varchar(2000) NOT NULL,
  `mail_id` int(11) NOT NULL,
  `directory_name` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master`
--

CREATE TABLE `master` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `instansi` varchar(1000) NOT NULL,
  `url_file` varchar(200) NOT NULL,
  `id_jenis_surat` int(11) NOT NULL,
  `id_sifat_surat` int(11) NOT NULL,
  `id_prioritas_surat` int(11) NOT NULL,
  `id_folder_surat` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `doc_status` varchar(25) NOT NULL,
  `apv_level` int(11) NOT NULL,
  `unit` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master`
--

INSERT INTO `master` (`id`, `nama`, `file`, `instansi`, `url_file`, `id_jenis_surat`, `id_sifat_surat`, `id_prioritas_surat`, `id_folder_surat`, `is_delete`, `id_user`, `doc_status`, `apv_level`, `unit`, `tanggal`, `updated_at`, `created_at`) VALUES
(1, 'Surat Undangan Acara', 'dummy.pdf', '', 'public/file/dummy.pdf', 0, 0, 0, 0, 0, 1, 'Submitted', 0, 7, '2021-03-25', '2021-03-25 22:54:04', '2021-03-26 05:54:04'),
(2, 'Surat Undangan Acara Pembukaan', 'dummy.pdf', '', 'public/file/dummy.pdf', 0, 0, 0, 0, 0, 1, 'Submitted', 0, 7, '2021-03-26', '2021-03-25 23:00:21', '2021-03-26 06:00:21'),
(3, 'Surat Undangan Acara Pembukaan  1', 'dummy.pdf', '', 'public/file/dummy.pdf', 0, 0, 0, 0, 0, 1, 'Submitted', 0, 7, '2021-03-26', '2021-03-25 23:23:56', '2021-03-26 06:23:56'),
(4, 'Surat Undangan Pembukaan Hi-Technology', 'dummy.pdf', '', 'public/file/dummy.pdf', 0, 0, 0, 0, 0, 1, 'Completed', 3, 7, '2021-03-26', '2021-03-27 19:41:53', '2021-03-28 02:41:53'),
(5, 'Surat Undangan Acara C', 'Document_20210328061932_dummy.pdf', '', 'http://localhost/administrasi/public/public/storage/file/Document_20210328061932_dummy.pdf', 0, 0, 0, 0, 1, 1, 'Draft', 0, 7, '2021-03-28', '2021-03-27 23:43:05', '2021-03-28 06:43:05'),
(6, 'Surat Undangan Acara Semnasti', 'Document_20210328064326_dummy.pdf', '', 'http://localhost/administrasi/public/storage/file/Document_20210328064326_dummy.pdf', 0, 0, 0, 0, 0, 1, 'Rejected', -1, 7, '2021-03-28', '2021-03-29 06:06:25', '2021-03-29 13:06:25'),
(7, 'Surat Undangan Acara S', 'Document_20210329121833_dummy.pdf', '', 'http://localhost/administrasi/public/storage/file/Document_20210329121833_dummy.pdf', 0, 0, 0, 0, 0, 1, 'Completed', 3, 7, '2021-03-29', '2021-03-29 05:22:58', '2021-03-29 12:22:58'),
(8, 'Surat Undangan Acara Semnas 2021', 'Document_20210329125436_dummy.pdf', '', 'http://localhost/administrasi/public/storage/file/Document_20210329125436_dummy.pdf', 0, 0, 0, 0, 0, 1, 'Draft', 0, 7, '2021-03-29', '2021-03-29 06:11:52', '2021-03-29 13:11:52'),
(9, 'Surat Undangan Acara', 'Document_20210329150315_dummy.pdf', '', 'http://localhost/administrasi/public/storage/file/Document_20210329150315_dummy.pdf', 0, 0, 0, 0, 0, 1, 'In Progress', 1, 7, '2021-03-29', '2021-03-31 05:47:29', '2021-03-31 12:47:29'),
(10, 'Kepala Divisi', 'Document_20210331113315_22861_(2).pdf', '', 'http://localhost/administrasi/public/storage/file/Document_20210331113315_22861_(2).pdf', 0, 0, 0, 0, 0, 1, 'Draft', 0, 7, '2021-03-31', '2021-03-31 04:33:15', '2021-03-31 04:33:15'),
(11, 'Kepala Divisi', 'Document_20210615053738_Ika_Erinawati_(60218085)_MB5A.pdf', 'Pemerintah Pusat', 'http://localhost/administrasi/public/storage/file/Document_20210615053738_Ika_Erinawati_(60218085)_MB5A.pdf', 1, 1, 1, 1, 0, 1, 'Submitted', 0, NULL, '2021-06-15', '2021-06-14 23:10:28', '2021-06-15 06:10:28'),
(12, 'Lorem Ipsum', 'Document_20210615061935_Ika_Erinawati_(60218085)_MB5A.pdf', 'Instansi ABC', 'http://localhost/administrasi/public/storage/file/Document_20210615061935_Ika_Erinawati_(60218085)_MB5A.pdf', 1, 1, 1, 1, 0, 1, 'Submitted', 0, NULL, '2021-06-15', '2021-06-14 23:19:35', '2021-06-15 06:19:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `sort_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `title`, `link`, `parent`, `status`, `icon`, `class`, `sort_by`, `created_at`, `updated_at`) VALUES
(1, 'MD Asset', '#', '0', 1, 'fas fa-book', 'md-asset', '1', NULL, NULL),
(2, 'List Asset', '/md/asset/index', '1', 1, 'fas fa-list', '', '1', NULL, NULL),
(3, 'Setting', '#', '0', 1, 'fa fa-cog', 'setting', '0', NULL, NULL),
(4, 'Role & Menu', '/setting/role/index', '3', 1, '', 'role', '1', NULL, NULL),
(5, 'User', '/setting/user/index', '3', 1, '', 'user', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_d`
--

CREATE TABLE `menu_d` (
  `id_menu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu_d`
--

INSERT INTO `menu_d` (`id_menu`, `id_role`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL),
(4, 2, NULL, NULL),
(5, 2, NULL, NULL),
(7, 2, NULL, NULL),
(2, 2, NULL, NULL),
(6, 2, NULL, NULL),
(3, 2, NULL, NULL),
(8, 2, NULL, NULL),
(9, 2, NULL, NULL),
(10, 2, NULL, NULL),
(1, 1, NULL, NULL),
(4, 1, NULL, NULL),
(5, 1, NULL, NULL),
(7, 1, NULL, NULL),
(2, 1, NULL, NULL),
(6, 1, NULL, NULL),
(3, 1, NULL, NULL),
(8, 1, NULL, NULL),
(9, 1, NULL, NULL),
(10, 1, NULL, NULL),
(11, 1, NULL, NULL),
(12, 1, NULL, NULL),
(13, 1, NULL, NULL),
(14, 1, NULL, NULL),
(15, 1, NULL, NULL),
(16, 1, NULL, NULL),
(17, 1, NULL, NULL),
(18, 1, NULL, NULL),
(1, 3, NULL, NULL),
(4, 3, NULL, NULL),
(5, 3, NULL, NULL),
(7, 3, NULL, NULL),
(2, 3, NULL, NULL),
(6, 3, NULL, NULL),
(3, 3, NULL, NULL),
(8, 3, NULL, NULL),
(9, 3, NULL, NULL),
(10, 3, NULL, NULL),
(11, 3, NULL, NULL),
(12, 3, NULL, NULL),
(13, 3, NULL, NULL),
(14, 3, NULL, NULL),
(15, 3, NULL, NULL),
(16, 3, NULL, NULL),
(17, 3, NULL, NULL),
(18, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_detail`
--

CREATE TABLE `menu_detail` (
  `id_menu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu_detail`
--

INSERT INTO `menu_detail` (`id_menu`, `id_role`, `created_at`, `updated_at`) VALUES
(1, 3, '2020-11-07 23:38:27', '2020-11-07 23:38:27'),
(2, 3, '2020-11-07 23:38:27', '2020-11-07 23:38:27'),
(3, 3, '2020-11-07 23:38:27', '2020-11-07 23:38:27'),
(4, 3, '2020-11-07 23:38:27', '2020-11-07 23:38:27'),
(5, 3, '2020-11-07 23:38:27', '2020-11-07 23:38:27'),
(1, 4, '2020-12-19 19:19:25', '2020-12-19 19:19:25'),
(2, 4, '2020-12-19 19:19:25', '2020-12-19 19:19:25'),
(1, 5, '2021-01-01 19:50:22', '2021-01-01 19:50:22'),
(2, 5, '2021-01-01 19:50:22', '2021-01-01 19:50:22'),
(1, 6, '2021-01-01 19:51:37', '2021-01-01 19:51:37'),
(2, 6, '2021-01-01 19:51:37', '2021-01-01 19:51:37'),
(1, 2, '2021-01-01 20:27:43', '2021-01-01 20:27:43'),
(2, 2, '2021-01-01 20:27:43', '2021-01-01 20:27:43'),
(3, 2, '2021-01-01 20:27:43', '2021-01-01 20:27:43'),
(4, 2, '2021-01-01 20:27:43', '2021-01-01 20:27:43'),
(5, 2, '2021-01-01 20:27:43', '2021-01-01 20:27:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_h`
--

CREATE TABLE `menu_h` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_by` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu_h`
--

INSERT INTO `menu_h` (`id`, `title`, `link`, `parent`, `status`, `icon`, `sort_by`, `created_at`, `updated_at`) VALUES
(1, 'Master Data', '#', 0, 1, 'media/svg/icons/Home/Box.svg', 2, NULL, NULL),
(2, 'Dashboard', '/home', 0, 1, 'media/svg/icons/Design/Layers.svg', 1, NULL, NULL),
(3, 'Setting', '#', 0, 1, 'media/svg/icons/Code/Settings4.svg', 3, NULL, NULL),
(4, 'Divisi & Jabatan', 'master/divisi', 1, 1, 'checkmark-outline', 0, NULL, NULL),
(5, 'Karyawan', 'master/karyawan', 1, 1, 'person-circle-outline', 0, NULL, NULL),
(6, 'Setting Approval', 'seting/approval', 2, 1, 'checkmark-outline', 0, NULL, NULL),
(7, 'Surat ', 'master/surat', 1, 1, 'document-text-outline', 1, NULL, NULL),
(8, 'Role & Menu', 'setting/role', 3, 1, 'list-outline', 1, NULL, NULL),
(9, 'Approver Surat ', 'setting/workflow', 3, 1, 'shield-checkmark-outline', 1, NULL, NULL),
(10, 'Role Akses User', 'setting/role-akses', 3, 1, 'lock-open-outline', 3, NULL, NULL),
(11, 'Jenis Surat', 'setting/jenis-surat', 3, 1, '-', 3, NULL, NULL),
(12, 'Sifat Surat', 'setting/sifat-surat', 3, 1, '-', 4, NULL, NULL),
(13, 'Prioritas Surat', 'setting/prioritas-surat', 3, 1, '-', 5, NULL, NULL),
(14, 'Folder Surat ', 'setting/folder-surat', 3, 1, '-', 6, NULL, NULL),
(15, 'Pengaturan Jabatan', '#', 0, 1, 'media/svg/icons/Communication/Add-user.svg', 4, NULL, NULL),
(16, 'Jabatan', 'jabatan/jabatan', 15, 1, '-', 1, NULL, NULL),
(17, 'Unit Kerja', 'jabatan/unit_kerja', 15, 1, '-', 2, NULL, NULL),
(18, 'Department', 'jabatan/department', 15, 1, '-', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_03_10_165515_setting_approver', 1),
(4, '2021_03_10_172721_unit_kerja', 1),
(5, '2021_03_11_082410_setting_user', 1),
(6, '2021_03_11_083200_divisi_h', 1),
(7, '2021_03_11_083338_divisi_d', 1),
(8, '2021_03_11_091205_md_karyawan', 1),
(9, '2021_03_12_154558_karyawan', 1),
(10, '2021_03_14_054348_menu_h', 1),
(11, '2021_03_14_055110_menu_d', 1),
(12, '2021_03_14_055325_role', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 0, NULL, NULL),
(2, 'admin', 0, NULL, NULL),
(3, 'kepala tu', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_folder_surat`
--

CREATE TABLE `setting_folder_surat` (
  `id` int(11) NOT NULL,
  `folder_surat` varchar(200) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_folder_surat`
--

INSERT INTO `setting_folder_surat` (`id`, `folder_surat`, `is_delete`) VALUES
(1, 'Keuangan', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_jenis_surat`
--

CREATE TABLE `setting_jenis_surat` (
  `id` int(11) NOT NULL,
  `jenis_surat` varchar(200) NOT NULL,
  `kode` varchar(200) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_jenis_surat`
--

INSERT INTO `setting_jenis_surat` (`id`, `jenis_surat`, `kode`, `warna`, `is_delete`) VALUES
(1, 'Permohonan', 'PRMHN', '#18f708', 0),
(2, 'Pemberitahuan', 'PBRTHN', '#fdec08', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_modul`
--

CREATE TABLE `setting_modul` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_modul`
--

INSERT INTO `setting_modul` (`id`, `nama`) VALUES
(1, 'Surat Masuk'),
(2, 'Surat Keluar ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_prioritas_surat`
--

CREATE TABLE `setting_prioritas_surat` (
  `id` int(11) NOT NULL,
  `prioritas_surat` varchar(200) NOT NULL,
  `kode` varchar(200) NOT NULL,
  `warna` varchar(200) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_prioritas_surat`
--

INSERT INTO `setting_prioritas_surat` (`id`, `prioritas_surat`, `kode`, `warna`, `is_delete`) VALUES
(1, 'Biasa', 'BS', '#2ef406', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_role`
--

CREATE TABLE `setting_role` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_role`
--

INSERT INTO `setting_role` (`id`, `id_karyawan`, `id_role`, `is_delete`) VALUES
(1, 1, 1, 0),
(2, 2, 2, 1),
(3, 4, 2, 0),
(4, 5, 2, 0),
(5, 6, 2, 0),
(6, 3, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_sifat_surat`
--

CREATE TABLE `setting_sifat_surat` (
  `id` int(11) NOT NULL,
  `sifat_surat` varchar(200) NOT NULL,
  `kode` varchar(200) NOT NULL,
  `warna` varchar(200) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_sifat_surat`
--

INSERT INTO `setting_sifat_surat` (`id`, `sifat_surat`, `kode`, `warna`, `is_delete`) VALUES
(1, 'Umum', 'UM', '#ff0000', 0),
(2, 'asas', 'dd', '#000000', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_user`
--

CREATE TABLE `setting_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_workflow`
--

CREATE TABLE `setting_workflow` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_workflow` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modul_id` int(11) NOT NULL,
  `kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `setting_workflow`
--

INSERT INTO `setting_workflow` (`id`, `nama_workflow`, `modul_id`, `kategori`, `unit`, `is_delete`, `created_at`, `updated_at`) VALUES
(5, 'Administrasi Update', 0, '', '0', 1, NULL, NULL),
(6, 'UPT TU Update', 0, '', '0', 1, NULL, NULL),
(7, 'UPT TU UPDATE', 1, 'Surat Masuk', '0', 0, NULL, NULL),
(8, 'Admin', 1, 'masuk', '0', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_workflow_d`
--

CREATE TABLE `setting_workflow_d` (
  `id` int(11) NOT NULL,
  `line_no` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_workflow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_workflow_d`
--

INSERT INTO `setting_workflow_d` (`id`, `line_no`, `id_divisi`, `id_jabatan`, `id_workflow`) VALUES
(1, 1, 1, 1, 5),
(2, 2, 2, 2, 5),
(3, 3, 3, 6, 5),
(4, 1, 4, 4, 6),
(5, 2, 5, 5, 6),
(6, 3, 6, 6, 6),
(7, 4, 7, 7, 6),
(8, 1, 2, 6, 7),
(9, 2, 2, 5, 7),
(10, 3, 3, 6, 7),
(11, 1, 2, 3, 8),
(12, 2, 2, 2, 8),
(13, 3, 2, 1, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `unit_kerja`
--

INSERT INTO `unit_kerja` (`id`, `unit_kerja`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Seksi ABC', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'sales');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `approver_list`
--
ALTER TABLE `approver_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `approver_log`
--
ALTER TABLE `approver_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `departmenr`
--
ALTER TABLE `departmenr`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisi_d`
--
ALTER TABLE `divisi_d`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisi_h`
--
ALTER TABLE `divisi_h`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mails_files`
--
ALTER TABLE `mails_files`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_h`
--
ALTER TABLE `menu_h`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_folder_surat`
--
ALTER TABLE `setting_folder_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_jenis_surat`
--
ALTER TABLE `setting_jenis_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_modul`
--
ALTER TABLE `setting_modul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_prioritas_surat`
--
ALTER TABLE `setting_prioritas_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_role`
--
ALTER TABLE `setting_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_sifat_surat`
--
ALTER TABLE `setting_sifat_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_user`
--
ALTER TABLE `setting_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_workflow`
--
ALTER TABLE `setting_workflow`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_workflow_d`
--
ALTER TABLE `setting_workflow_d`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `approver_list`
--
ALTER TABLE `approver_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `approver_log`
--
ALTER TABLE `approver_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `departmenr`
--
ALTER TABLE `departmenr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `divisi_d`
--
ALTER TABLE `divisi_d`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `divisi_h`
--
ALTER TABLE `divisi_h`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mails_files`
--
ALTER TABLE `mails_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master`
--
ALTER TABLE `master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `menu_h`
--
ALTER TABLE `menu_h`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `setting_folder_surat`
--
ALTER TABLE `setting_folder_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `setting_jenis_surat`
--
ALTER TABLE `setting_jenis_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `setting_modul`
--
ALTER TABLE `setting_modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `setting_prioritas_surat`
--
ALTER TABLE `setting_prioritas_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `setting_role`
--
ALTER TABLE `setting_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `setting_sifat_surat`
--
ALTER TABLE `setting_sifat_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `setting_user`
--
ALTER TABLE `setting_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting_workflow`
--
ALTER TABLE `setting_workflow`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `setting_workflow_d`
--
ALTER TABLE `setting_workflow_d`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
