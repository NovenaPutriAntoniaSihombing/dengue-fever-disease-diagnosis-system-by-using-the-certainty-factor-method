-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2025 pada 05.45
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_register`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosis_results`
--

CREATE TABLE `diagnosis_results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gejala` varchar(255) NOT NULL,
  `cf_pakar` decimal(5,2) NOT NULL,
  `cf_user` decimal(5,2) NOT NULL,
  `cf_gejala` decimal(5,2) NOT NULL,
  `cf_combined` decimal(5,2) NOT NULL,
  `final_cf` decimal(5,2) NOT NULL,
  `confidence_percentage` decimal(5,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diagnosis_results`
--

INSERT INTO `diagnosis_results` (`id`, `user_id`, `gejala`, `cf_pakar`, `cf_user`, `cf_gejala`, `cf_combined`, `final_cf`, `confidence_percentage`, `created_at`) VALUES
(61, 1, 'Nyeri seluruh tubuh', '1.00', '0.40', '0.40', '0.40', '0.81', '81.40', '2025-01-15 14:37:08'),
(62, 1, 'Nyeri sendi', '0.80', '0.40', '0.32', '0.59', '0.81', '81.40', '2025-01-15 14:37:08'),
(63, 1, 'Nyeri otot', '0.60', '0.40', '0.24', '0.69', '0.81', '81.40', '2025-01-15 14:37:08'),
(64, 1, 'Nyeri perut', '0.40', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:08'),
(65, 1, 'Demam', '1.00', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:08'),
(66, 1, 'Bintik merah pada kulit', '0.60', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:08'),
(67, 1, 'Sakit kepala', '0.70', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:08'),
(68, 1, 'Mual', '0.50', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:08'),
(69, 1, 'Muntah', '0.50', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:08'),
(70, 1, 'Nafsu makan berkurang', '0.80', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:08'),
(71, 1, 'Denyut nadi cepat dan lemah', '0.70', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:08'),
(72, 1, 'Tubuh terasa dingin', '0.50', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:08'),
(73, 1, 'Kesadaran menurun', '0.30', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:08'),
(74, 1, 'Mimisan', '0.90', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:08'),
(75, 1, 'Gusi berdarah', '0.80', '0.50', '0.40', '0.81', '0.81', '81.40', '2025-01-15 14:37:08'),
(76, 1, 'Nyeri seluruh tubuh', '1.00', '0.40', '0.40', '0.40', '0.81', '81.40', '2025-01-15 14:37:12'),
(77, 1, 'Nyeri sendi', '0.80', '0.40', '0.32', '0.59', '0.81', '81.40', '2025-01-15 14:37:12'),
(78, 1, 'Nyeri otot', '0.60', '0.40', '0.24', '0.69', '0.81', '81.40', '2025-01-15 14:37:12'),
(79, 1, 'Nyeri perut', '0.40', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:12'),
(80, 1, 'Demam', '1.00', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:12'),
(81, 1, 'Bintik merah pada kulit', '0.60', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:12'),
(82, 1, 'Sakit kepala', '0.70', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:12'),
(83, 1, 'Mual', '0.50', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:12'),
(84, 1, 'Muntah', '0.50', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:12'),
(85, 1, 'Nafsu makan berkurang', '0.80', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:12'),
(86, 1, 'Denyut nadi cepat dan lemah', '0.70', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:12'),
(87, 1, 'Tubuh terasa dingin', '0.50', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:12'),
(88, 1, 'Kesadaran menurun', '0.30', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:12'),
(89, 1, 'Mimisan', '0.90', '0.00', '0.00', '0.69', '0.81', '81.40', '2025-01-15 14:37:12'),
(90, 1, 'Gusi berdarah', '0.80', '0.50', '0.40', '0.81', '0.81', '81.40', '2025-01-15 14:37:12'),
(91, 1, 'Nyeri seluruh tubuh', '1.00', '0.40', '0.40', '0.40', '0.69', '68.99', '2025-01-15 14:38:06'),
(92, 1, 'Nyeri sendi', '0.80', '0.40', '0.32', '0.59', '0.69', '68.99', '2025-01-15 14:38:06'),
(93, 1, 'Nyeri otot', '0.60', '0.40', '0.24', '0.69', '0.69', '68.99', '2025-01-15 14:38:06'),
(94, 1, 'Nyeri perut', '0.40', '0.00', '0.00', '0.69', '0.69', '68.99', '2025-01-15 14:38:06'),
(95, 1, 'Demam', '1.00', '0.00', '0.00', '0.69', '0.69', '68.99', '2025-01-15 14:38:06'),
(96, 1, 'Bintik merah pada kulit', '0.60', '0.00', '0.00', '0.69', '0.69', '68.99', '2025-01-15 14:38:06'),
(97, 1, 'Sakit kepala', '0.70', '0.00', '0.00', '0.69', '0.69', '68.99', '2025-01-15 14:38:06'),
(98, 1, 'Mual', '0.50', '0.00', '0.00', '0.69', '0.69', '68.99', '2025-01-15 14:38:06'),
(99, 1, 'Muntah', '0.50', '0.00', '0.00', '0.69', '0.69', '68.99', '2025-01-15 14:38:06'),
(100, 1, 'Nafsu makan berkurang', '0.10', '0.00', '0.00', '0.69', '0.69', '68.99', '2025-01-15 14:38:06'),
(101, 1, 'Denyut nadi cepat dan lemah', '0.70', '0.00', '0.00', '0.69', '0.69', '68.99', '2025-01-15 14:38:06'),
(102, 1, 'Tubuh terasa dingin', '0.20', '0.00', '0.00', '0.69', '0.69', '68.99', '2025-01-15 14:38:06'),
(103, 1, 'Kesadaran menurun', '0.30', '0.00', '0.00', '0.69', '0.69', '68.99', '2025-01-15 14:38:06'),
(104, 1, 'Gusi berdarah', '0.80', '0.00', '0.00', '0.69', '0.69', '68.99', '2025-01-15 14:38:06'),
(105, 1, 'Nyeri seluruh tubuh', '1.00', '0.40', '0.40', '0.40', '0.98', '98.01', '2025-01-16 01:58:36'),
(106, 1, 'Nyeri sendi', '0.80', '0.10', '0.08', '0.45', '0.98', '98.01', '2025-01-16 01:58:36'),
(107, 1, 'Nyeri otot', '0.60', '0.10', '0.06', '0.48', '0.98', '98.01', '2025-01-16 01:58:36'),
(108, 1, 'Nyeri perut', '0.40', '0.20', '0.08', '0.52', '0.98', '98.01', '2025-01-16 01:58:36'),
(109, 1, 'Demam', '1.00', '0.60', '0.60', '0.81', '0.98', '98.01', '2025-01-16 01:58:36'),
(110, 1, 'Bintik merah pada kulit', '0.60', '0.40', '0.24', '0.85', '0.98', '98.01', '2025-01-16 01:58:36'),
(111, 1, 'Sakit kepala', '0.70', '1.00', '0.70', '0.96', '0.98', '98.01', '2025-01-16 01:58:36'),
(112, 1, 'Mual', '0.50', '0.20', '0.10', '0.96', '0.98', '98.01', '2025-01-16 01:58:36'),
(113, 1, 'Muntah', '0.50', '0.10', '0.05', '0.96', '0.98', '98.01', '2025-01-16 01:58:36'),
(114, 1, 'Nafsu makan berkurang', '0.10', '0.50', '0.05', '0.96', '0.98', '98.01', '2025-01-16 01:58:36'),
(115, 1, 'Denyut nadi cepat dan lemah', '0.70', '0.40', '0.28', '0.97', '0.98', '98.01', '2025-01-16 01:58:36'),
(116, 1, 'Tubuh terasa dingin', '0.20', '0.70', '0.14', '0.98', '0.98', '98.01', '2025-01-16 01:58:36'),
(117, 1, 'Kesadaran menurun', '0.30', '0.30', '0.09', '0.98', '0.98', '98.01', '2025-01-16 01:58:36'),
(118, 1, 'Gusi berdarah', '0.80', '0.00', '0.00', '0.98', '0.98', '98.01', '2025-01-16 01:58:36'),
(119, 1, 'Nyeri seluruh tubuh', '1.00', '0.40', '0.40', '0.40', '0.98', '98.01', '2025-01-16 02:23:24'),
(120, 1, 'Nyeri sendi', '0.80', '0.10', '0.08', '0.45', '0.98', '98.01', '2025-01-16 02:23:24'),
(121, 1, 'Nyeri otot', '0.60', '0.10', '0.06', '0.48', '0.98', '98.01', '2025-01-16 02:23:24'),
(122, 1, 'Nyeri perut', '0.40', '0.20', '0.08', '0.52', '0.98', '98.01', '2025-01-16 02:23:24'),
(123, 1, 'Demam', '1.00', '0.60', '0.60', '0.81', '0.98', '98.01', '2025-01-16 02:23:24'),
(124, 1, 'Bintik merah pada kulit', '0.60', '0.40', '0.24', '0.85', '0.98', '98.01', '2025-01-16 02:23:24'),
(125, 1, 'Sakit kepala', '0.70', '1.00', '0.70', '0.96', '0.98', '98.01', '2025-01-16 02:23:24'),
(126, 1, 'Mual', '0.50', '0.20', '0.10', '0.96', '0.98', '98.01', '2025-01-16 02:23:24'),
(127, 1, 'Muntah', '0.50', '0.10', '0.05', '0.96', '0.98', '98.01', '2025-01-16 02:23:24'),
(128, 1, 'Nafsu makan berkurang', '0.10', '0.50', '0.05', '0.96', '0.98', '98.01', '2025-01-16 02:23:24'),
(129, 1, 'Denyut nadi cepat dan lemah', '0.70', '0.40', '0.28', '0.97', '0.98', '98.01', '2025-01-16 02:23:24'),
(130, 1, 'Tubuh terasa dingin', '0.20', '0.70', '0.14', '0.98', '0.98', '98.01', '2025-01-16 02:23:24'),
(131, 1, 'Kesadaran menurun', '0.30', '0.30', '0.09', '0.98', '0.98', '98.01', '2025-01-16 02:23:24'),
(132, 1, 'Gusi berdarah', '0.80', '0.00', '0.00', '0.98', '0.98', '98.01', '2025-01-16 02:23:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `birth_date` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `gender`, `birth_date`, `password`, `created_at`) VALUES
(1, 'Elvira Angellina', 'Angel25@gmail.com', 'Perempuan', '2024-12-26', '$2y$10$JTwsgl5m7B4VlQAnvyPyuur3sTDjGQiFRIuylY.uXeM6KwzDS5nsW', '2024-12-26 04:52:25'),
(2, 'Refa', 'Refa12@gmail.com', 'Perempuan', '2025-01-15', '$2y$10$FQff86TLj1NURIdFUVLrb.a5GvADMBE./IRnqeq2119259XCNxF16', '2025-01-15 13:51:38');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diagnosis_results`
--
ALTER TABLE `diagnosis_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diagnosis_results`
--
ALTER TABLE `diagnosis_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `diagnosis_results`
--
ALTER TABLE `diagnosis_results`
  ADD CONSTRAINT `diagnosis_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
