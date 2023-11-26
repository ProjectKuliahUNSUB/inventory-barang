-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2023 pada 15.13
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_barang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `barang_id` int(255) NOT NULL,
  `jenisbarang_id` varchar(255) DEFAULT NULL,
  `satuan_id` varchar(255) DEFAULT NULL,
  `merk_id` varchar(255) DEFAULT NULL,
  `barang_kode` varchar(255) NOT NULL,
  `barang_nama` varchar(255) NOT NULL,
  `barang_slug` varchar(255) DEFAULT NULL,
  `barang_harga` varchar(255) NOT NULL,
  `barang_stok` varchar(255) NOT NULL,
  `barang_gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`barang_id`, `jenisbarang_id`, `satuan_id`, `merk_id`, `barang_kode`, `barang_nama`, `barang_slug`, `barang_harga`, `barang_stok`, `barang_gambar`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', 'B001', 'Smartphone Samsung Galaxy S21', 'smartphone-samsung-galaxy-s21', '15000000', '50', 'gambar1.jpg', '2023-11-25 18:35:49', '2023-11-25 18:35:49'),
(2, '2', '2', '2', 'B002', 'Sepatu Nike Air Max', 'sepatu-nike-air-max', '1200000', '30', 'gambar2.jpg', '2023-11-25 18:35:49', '2023-11-25 18:35:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barangkeluar`
--

CREATE TABLE `tbl_barangkeluar` (
  `bk_id` int(10) UNSIGNED NOT NULL,
  `bk_kode` varchar(255) NOT NULL,
  `barang_kode` varchar(255) NOT NULL,
  `bk_tanggal` varchar(255) NOT NULL,
  `bk_tujuan` varchar(255) DEFAULT NULL,
  `bk_jumlah` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_barangkeluar`
--

INSERT INTO `tbl_barangkeluar` (`bk_id`, `bk_kode`, `barang_kode`, `bk_tanggal`, `bk_tujuan`, `bk_jumlah`, `created_at`, `updated_at`) VALUES
(1, 'BK001', 'B001', '2023-01-03', 'Toko A', '10', '2023-11-25 18:35:49', '2023-11-25 18:35:49'),
(2, 'BK002', 'B002', '2023-01-04', 'Toko B', '8', '2023-11-25 18:35:49', '2023-11-25 18:35:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barangmasuk`
--

CREATE TABLE `tbl_barangmasuk` (
  `bm_id` int(10) UNSIGNED NOT NULL,
  `bm_kode` varchar(255) NOT NULL,
  `barang_kode` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `bm_tanggal` varchar(255) NOT NULL,
  `bm_jumlah` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_barangmasuk`
--

INSERT INTO `tbl_barangmasuk` (`bm_id`, `bm_kode`, `barang_kode`, `customer_id`, `bm_tanggal`, `bm_jumlah`, `created_at`, `updated_at`) VALUES
(1, 'BM001', 'B001', '1', '2023-01-01', '20', '2023-11-25 18:35:49', '2023-11-25 18:35:49'),
(2, 'BM002', 'B002', '2', '2023-01-02', '15', '2023-11-25 18:35:49', '2023-11-25 18:35:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_nama` varchar(255) NOT NULL,
  `customer_slug` varchar(255) NOT NULL,
  `customer_alamat` text DEFAULT NULL,
  `customer_notelp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_nama`, `customer_slug`, `customer_alamat`, `customer_notelp`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john-doe', 'Jl. Raya No. 123, Kota A', '08123456789', '2023-11-25 18:35:49', '2023-11-25 18:35:49'),
(2, 'Jane Doe', 'jane-doe', 'Jl. Mawar No. 456, Kota B', '08234567890', '2023-11-25 18:35:49', '2023-11-25 18:35:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenisbarang`
--

CREATE TABLE `tbl_jenisbarang` (
  `jenisbarang_id` int(255) UNSIGNED NOT NULL,
  `jenisbarang_nama` varchar(255) NOT NULL,
  `jenisbarang_slug` varchar(255) NOT NULL,
  `jenisbarang_ket` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_jenisbarang`
--

INSERT INTO `tbl_jenisbarang` (`jenisbarang_id`, `jenisbarang_nama`, `jenisbarang_slug`, `jenisbarang_ket`, `created_at`, `updated_at`) VALUES
(1, 'Elektronik', 'elektronik', 'Jenis barang kategori elektronik', '2023-11-25 18:35:49', '2023-11-25 18:35:49'),
(2, 'Pakaian', 'pakaian', 'Jenis barang kategori pakaian', '2023-11-25 18:35:49', '2023-11-25 18:35:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_merk`
--

CREATE TABLE `tbl_merk` (
  `merk_id` int(10) UNSIGNED NOT NULL,
  `merk_nama` varchar(255) NOT NULL,
  `merk_slug` varchar(255) NOT NULL,
  `merk_keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_merk`
--

INSERT INTO `tbl_merk` (`merk_id`, `merk_nama`, `merk_slug`, `merk_keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'samsung', 'Merk elektronik Samsung', '2023-11-25 18:35:49', '2023-11-25 18:35:49'),
(2, 'Nike', 'nike', 'Merk pakaian Nike', '2023-11-25 18:35:49', '2023-11-25 18:35:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `satuan_id` int(10) UNSIGNED NOT NULL,
  `satuan_nama` varchar(255) NOT NULL,
  `satuan_slug` varchar(255) NOT NULL,
  `satuan_keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`satuan_id`, `satuan_nama`, `satuan_slug`, `satuan_keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Unit', 'unit', 'Satuan barang dalam unit', '2023-11-25 18:35:49', '2023-11-25 18:35:49'),
(2, 'Pcs', 'pcs', 'Satuan barang dalam pieces', '2023-11-25 18:35:49', '2023-11-25 18:35:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
