-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 20 Okt 2020 pada 16.36
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whats-api`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_send`
--

CREATE TABLE `chat_send` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `chat` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `chat_send`
--

INSERT INTO `chat_send` (`id`, `userid`, `chat`, `created_at`, `updated_at`) VALUES
(1, '8b59f5b5-1bfe-46c0-8b96-7594f2bcad5a', 'message', '2020-10-19 10:24:23', '2020-10-19 10:24:23'),
(2, '8b59f5b5-1bfe-46c0-8b96-7594f2bcad5a', 'message', '2020-10-19 10:27:59', '2020-10-19 10:27:59'),
(3, '8b59f5b5-1bfe-46c0-8b96-7594f2bcad5a', 'message', '2020-10-19 10:30:01', '2020-10-19 10:30:01'),
(4, '8b59f5b5-1bfe-46c0-8b96-7594f2bcad5a', 'message', '2020-10-19 10:31:35', '2020-10-19 10:31:35'),
(5, '8b59f5b5-1bfe-46c0-8b96-7594f2bcad5a', 'message', '2020-10-19 10:32:15', '2020-10-19 10:32:15'),
(6, '8b59f5b5-1bfe-46c0-8b96-7594f2bcad5a', 'message', '2020-10-19 10:33:35', '2020-10-19 10:33:35'),
(7, '8b59f5b5-1bfe-46c0-8b96-7594f2bcad5a', 'message', '2020-10-19 10:36:02', '2020-10-19 10:36:02'),
(8, '8b59f5b5-1bfe-46c0-8b96-7594f2bcad5a', 'message', '2020-10-19 19:04:12', '2020-10-19 19:04:12'),
(9, '8b59f5b5-1bfe-46c0-8b96-7594f2bcad5a', 'message', '2020-10-19 19:41:51', '2020-10-19 19:41:51'),
(10, '8b59f5b5-1bfe-46c0-8b96-7594f2bcad5a', 'message', '2020-10-19 20:47:12', '2020-10-19 20:47:12'),
(11, '8b59f5b5-1bfe-46c0-8b96-7594f2bcad5a', 'message', '2020-10-19 21:08:43', '2020-10-19 21:08:43'),
(12, '8b59f5b5-1bfe-46c0-8b96-7594f2bcad5a', 'message', '2020-10-19 21:13:23', '2020-10-19 21:13:23'),
(13, '855e8233-a6da-4614-bf3f-50a80f8cf1ab', 'message', '2020-10-19 21:16:19', '2020-10-19 21:16:19'),
(14, '855e8233-a6da-4614-bf3f-50a80f8cf1ab', 'message', '2020-10-19 21:18:53', '2020-10-19 21:18:53'),
(15, '855e8233-a6da-4614-bf3f-50a80f8cf1ab', 'message', '2020-10-19 21:22:51', '2020-10-19 21:22:51'),
(16, '855e8233-a6da-4614-bf3f-50a80f8cf1ab', 'message', '2020-10-19 21:26:32', '2020-10-19 21:26:32'),
(17, '855e8233-a6da-4614-bf3f-50a80f8cf1ab', 'message', '2020-10-19 21:28:11', '2020-10-19 21:28:11'),
(18, '855e8233-a6da-4614-bf3f-50a80f8cf1ab', 'message', '2020-10-19 21:38:07', '2020-10-19 21:38:07'),
(19, '8b59f5b5-1bfe-46c0-8b96-7594f2bcad5a', 'message', '2020-10-19 22:07:22', '2020-10-19 22:07:22'),
(20, '8b59f5b5-1bfe-46c0-8b96-7594f2bcad5a', 'message', '2020-10-19 22:08:45', '2020-10-19 22:08:45'),
(21, '855e8233-a6da-4614-bf3f-50a80f8cf1ab', 'message', '2020-10-20 01:22:58', '2020-10-20 01:22:58'),
(22, '855e8233-a6da-4614-bf3f-50a80f8cf1ab', 'message', '2020-10-20 01:24:09', '2020-10-20 01:24:09'),
(23, '6c3d0c36-efc0-4010-87c2-d3f675063dc9', 'message', '2020-10-20 06:08:57', '2020-10-20 06:08:57'),
(24, '6c3d0c36-efc0-4010-87c2-d3f675063dc9', 'message', '2020-10-20 06:50:22', '2020-10-20 06:50:22'),
(25, '6c3d0c36-efc0-4010-87c2-d3f675063dc9', 'message', '2020-10-20 07:05:51', '2020-10-20 07:05:51'),
(26, '6c3d0c36-efc0-4010-87c2-d3f675063dc9', 'message', '2020-10-20 07:10:57', '2020-10-20 07:10:57'),
(27, '6c3d0c36-efc0-4010-87c2-d3f675063dc9', 'message', '2020-10-20 07:13:37', '2020-10-20 07:13:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `device`
--

CREATE TABLE `device` (
  `id` varchar(100) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `qrcode` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0: Not Connected: 1: Connected'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `device`
--

INSERT INTO `device` (`id`, `phone`, `userid`, `created_at`, `updated_at`, `qrcode`, `status`) VALUES
('c92717d3-ad54-44aa-a335-8ac8f73dce1f', '628982382323', '6c3d0c36-efc0-4010-87c2-d3f675063dc9', '2020-10-20 05:41:29', '2020-10-20 09:09:40', NULL, 0),
('ee311e76-fcf2-4dc1-a33f-f05ee8b8ec3d', '6285156838407', '6c3d0c36-efc0-4010-87c2-d3f675063dc9', '2020-10-20 05:57:56', '2020-10-20 09:09:51', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `quota` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `quota`, `created_at`, `updated_at`) VALUES
(1, 50, '2020-10-20 02:09:05', '2020-10-20 02:09:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `verified` int(11) NOT NULL DEFAULT 0,
  `token` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `quota` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`, `name`, `last_name`, `verified`, `token`, `role`, `quota`, `is_active`) VALUES
('55c22b09-aa93-4db0-822e-c975f60f6b5d', 'ufa15082@smktiufa.sch.id', '$2y$10$c6vwwjzRgvJQWejaz95SUuZCHZTF/R3w9nDgO1LSd9g3nOkYVoORu', '2020-10-18 01:14:30', '2020-10-18 01:31:36', 'ufa', 'ufa', 1, 'BQZzVgWovo', 0, 50, 0),
('6c3d0c36-efc0-4010-87c2-d3f675063dc9', 'fwidhiarta@gmail.com', '$2y$10$2V/nPqudSj8/RVforbBF1.vNHDcFNFLpa0cvQ5i5h5SFmBpG10gRe', '2020-10-19 22:40:06', '2020-10-20 05:42:30', 'fwidhiarta', 'faris', 1, 'hsxztl32gu', 1, 50, 1),
('855e8233-a6da-4614-bf3f-50a80f8cf1ab', 'abdulmanan@gmail.com', '$2y$10$EALEKXfDXR.Zvq9sGlyZSOR9IrBej6ud7pYEErRrDt5CMIN6z1Hgy', '2020-10-19 18:47:24', '2020-10-19 22:23:33', 'abdul', 'manan', 1, 'xd87su9Uuc', 0, 50, 1),
('c096c31a-6e28-4036-b905-125b6d1f3af1', 'bambang@gmail.com', '$2y$10$YHzS7BkI/FGOKXAt5/ca7O.0w7tvoxswARdaZ3KlQ87eFs3Uvf.PS', '2020-10-19 19:11:33', '2020-10-19 22:16:39', 'bambang', 'bambang', 0, NULL, 0, 50, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `verify_user`
--

CREATE TABLE `verify_user` (
  `id` int(11) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `created_at` time NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `verify_user`
--

INSERT INTO `verify_user` (`id`, `token`, `userid`, `created_at`, `updated_at`) VALUES
(1, 'e84ea367777dccbb4af22b0a60bd73c8e6a49f48', '8b59f5b5-1bfe-46c0-8b96-7594f2bcad5a', '03:53:18', '2020-09-12 20:53:18'),
(2, 'b5b69f0769c0f6977caafec1e23ab78a1a4d95b3', '55c22b09-aa93-4db0-822e-c975f60f6b5d', '08:14:30', '2020-10-18 01:14:30'),
(3, '3454fb48813b453635e8ec132be9322e8e81025b', 'c096c31a-6e28-4036-b905-125b6d1f3af1', '02:11:33', '2020-10-19 19:11:33'),
(4, '8c2555a5af1ac2d031b808a29ff6d42d68fbb76d', '6c3d0c36-efc0-4010-87c2-d3f675063dc9', '05:40:06', '2020-10-19 22:40:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chat_send`
--
ALTER TABLE `chat_send`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `verify_user`
--
ALTER TABLE `verify_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chat_send`
--
ALTER TABLE `chat_send`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `verify_user`
--
ALTER TABLE `verify_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
