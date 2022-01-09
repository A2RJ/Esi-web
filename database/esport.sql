-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2022 pada 09.19
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esport`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `jabatan` varchar(255) NOT NULL,
  `ig` varchar(50) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `user_id`, `jabatan`, `ig`, `fb`, `created_at`, `updated_at`) VALUES
(1, 3, 'Ketua Bidang Umum', 'Coba IG', 'Coba FB', '2021-12-23', '2021-12-29'),
(3, 9, 'Ketua', 'Ig', 'Fb', '2021-12-29', '2021-12-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pricepool` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isfree` tinyint(1) NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `peraturan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id_event`, `game_id`, `user_id`, `event_name`, `event_image`, `slot`, `price`, `pricepool`, `isfree`, `detail`, `peraturan`, `start`, `end`, `created_at`, `updated_at`) VALUES
(3, 3, 10, 'Event Uji Coba', '30_12_2021_61cd5fab47f96.jpg', '32', '100000', '5000000', 1, 'Detail', 'Aturan', '2022-01-01', '2022-01-31', '2021-12-29 23:28:43', '2021-12-29 23:28:43'),
(4, 3, 11, 'First Event', '31_12_2021_61ceb467e2108.png', '21', '120000', '8000000', 0, 'Detail', 'Retet', '2021-12-31', '2021-12-31', '2021-12-30 23:42:31', '2021-12-30 23:42:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_inv_teams`
--

CREATE TABLE `event_inv_teams` (
  `id_event_inv_teams` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `squad_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_teams`
--

CREATE TABLE `event_teams` (
  `id_event_teams` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `squad_id` int(11) NOT NULL,
  `ispaid` tinyint(1) DEFAULT NULL,
  `paid_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `event_teams`
--

INSERT INTO `event_teams` (`id_event_teams`, `event_id`, `squad_id`, `ispaid`, `paid_image`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, '30_12_2021_61cd5fcfc0a51.png', '2021-12-29 23:29:19', '2022-01-08 21:31:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_winners`
--

CREATE TABLE `event_winners` (
  `id_event_winner` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `squad_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `games`
--

CREATE TABLE `games` (
  `id_game` int(11) NOT NULL,
  `game_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `games`
--

INSERT INTO `games` (`id_game`, `game_name`, `game_image`, `game_category_id`, `created_at`, `updated_at`) VALUES
(3, 'Mobile Legends', '20_12_2021_61c02c2eaad52.png', 2, '2021-12-19 15:09:34', '2021-12-19 15:09:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `game_categories`
--

CREATE TABLE `game_categories` (
  `id_game_category` int(11) NOT NULL,
  `game_category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `game_categories`
--

INSERT INTO `game_categories` (`id_game_category`, `game_category`, `created_at`, `updated_at`) VALUES
(2, 'RPG', '2021-12-19 15:09:22', '2021-12-19 15:09:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `managements`
--

CREATE TABLE `managements` (
  `id_management` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `management_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `management_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontak` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `management_inv_squads`
--

CREATE TABLE `management_inv_squads` (
  `id_management_inv_squad` int(11) NOT NULL,
  `management_id` int(11) NOT NULL,
  `squad_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `players`
--

CREATE TABLE `players` (
  `id_player` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `squad_id` int(11) DEFAULT NULL,
  `game_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingame_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingame_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `players`
--

INSERT INTO `players` (`id_player`, `user_id`, `squad_id`, `game_id`, `ingame_name`, `ingame_id`, `player_image`, `created_at`, `updated_at`) VALUES
(6, 3, NULL, '3', 'First player account', '1212121', '29_12_2021_61cbfed5d747b.jpg', '2021-12-28 22:23:17', '2021-12-28 23:01:21'),
(7, 10, 2, '3', 'juno', 'juno', '30_12_2021_61cd5e8034aee.jpg', '2021-12-29 23:23:44', '2021-12-29 23:24:28'),
(8, 11, 3, '3', 'coekill', '12121', '03_01_2022_61d327e2195a1.png', '2022-01-03 08:44:18', '2022-01-03 08:44:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_managements`
--

CREATE TABLE `request_managements` (
  `id_request_management` int(11) NOT NULL,
  `squad_id` int(11) NOT NULL,
  `management_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_squads`
--

CREATE TABLE `request_squads` (
  `id_request_squad` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `squad_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `squads`
--

CREATE TABLE `squads` (
  `id_squad` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `squad_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `squad_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `squad_leader` int(11) NOT NULL,
  `management_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `squads`
--

INSERT INTO `squads` (`id_squad`, `game_id`, `squad_name`, `squad_image`, `squad_leader`, `management_id`, `created_at`, `updated_at`) VALUES
(2, 3, 'Uji Coba', '30_12_2021_61cd5eac701f1.jpg', 7, NULL, '2021-12-29 23:24:28', '2021-12-29 23:24:28'),
(3, 3, 'AHHA Squad', '03_01_2022_61d327f250ef2.png', 8, NULL, '2022-01-03 08:44:34', '2022-01-03 08:44:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `squad_inv_players`
--

CREATE TABLE `squad_inv_players` (
  `id_squad_inv_player` int(11) NOT NULL,
  `squad_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user_role` enum('player','management','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kartu_identitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('l','p') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `user_role`, `uuid`, `nama`, `email`, `fb`, `ig`, `password`, `kontak`, `alamat`, `kartu_identitas`, `gender`, `user_image`, `created_at`, `updated_at`) VALUES
(3, 'admin', '2022010907094811', 'ESI Sumbawa', 'esisumbawa@gmail.com', NULL, NULL, '$2y$10$rfUEKY3lugu5eXigo7oWb.9hM5oVr98Kb3ZvezEpmJbkcBXlQ2X56', '0834 4938 3434', 'Sumbawa', NULL, 'l', '30_12_2021_61cd61abe224c.jpg', '2021-12-05 11:28:41', '2021-12-29 23:37:15'),
(9, 'admin', '2022010907094812', 'Made Widiarta', 'widiartaimade@gmail.com', NULL, NULL, '$2y$10$rfUEKY3lugu5eXigo7oWb.9hM5oVr98Kb3ZvezEpmJbkcBXlQ2X56', '1234', 'Jl. Kebayaan No. 11', NULL, 'l', '29_12_2021_61cc08436ccd5.jpg', '2021-12-28 23:03:31', '2021-12-28 23:03:55'),
(10, 'player', '2022010907094813', 'Juno Praditya', 'juno.praditya@gmail.com', NULL, NULL, '$2y$10$rfUEKY3lugu5eXigo7oWb.9hM5oVr98Kb3ZvezEpmJbkcBXlQ2X56', '1234', 'Kebayan', NULL, 'l', '30_12_2021_61cd612955a78.jpg', '2021-12-28 23:08:22', '2021-12-29 23:36:44'),
(11, 'admin', '2022010907094814', 'Ardiansyah Putra', 'ardi@gmail.com', 'kdlksds', '12121', '$2y$10$rfUEKY3lugu5eXigo7oWb.9hM5oVr98Kb3ZvezEpmJbkcBXlQ2X56', '728282', 'Akaka', NULL, 'l', '09_01_2022_61da713b7a869.png', '2021-12-30 00:25:47', '2022-01-09 00:14:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `event_inv_teams`
--
ALTER TABLE `event_inv_teams`
  ADD PRIMARY KEY (`id_event_inv_teams`);

--
-- Indeks untuk tabel `event_teams`
--
ALTER TABLE `event_teams`
  ADD PRIMARY KEY (`id_event_teams`);

--
-- Indeks untuk tabel `event_winners`
--
ALTER TABLE `event_winners`
  ADD PRIMARY KEY (`id_event_winner`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id_game`);

--
-- Indeks untuk tabel `game_categories`
--
ALTER TABLE `game_categories`
  ADD PRIMARY KEY (`id_game_category`);

--
-- Indeks untuk tabel `managements`
--
ALTER TABLE `managements`
  ADD PRIMARY KEY (`id_management`);

--
-- Indeks untuk tabel `management_inv_squads`
--
ALTER TABLE `management_inv_squads`
  ADD PRIMARY KEY (`id_management_inv_squad`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id_player`);

--
-- Indeks untuk tabel `request_managements`
--
ALTER TABLE `request_managements`
  ADD PRIMARY KEY (`id_request_management`);

--
-- Indeks untuk tabel `request_squads`
--
ALTER TABLE `request_squads`
  ADD PRIMARY KEY (`id_request_squad`);

--
-- Indeks untuk tabel `squads`
--
ALTER TABLE `squads`
  ADD PRIMARY KEY (`id_squad`);

--
-- Indeks untuk tabel `squad_inv_players`
--
ALTER TABLE `squad_inv_players`
  ADD PRIMARY KEY (`id_squad_inv_player`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `event_inv_teams`
--
ALTER TABLE `event_inv_teams`
  MODIFY `id_event_inv_teams` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `event_teams`
--
ALTER TABLE `event_teams`
  MODIFY `id_event_teams` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `event_winners`
--
ALTER TABLE `event_winners`
  MODIFY `id_event_winner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `games`
--
ALTER TABLE `games`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `game_categories`
--
ALTER TABLE `game_categories`
  MODIFY `id_game_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `managements`
--
ALTER TABLE `managements`
  MODIFY `id_management` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `management_inv_squads`
--
ALTER TABLE `management_inv_squads`
  MODIFY `id_management_inv_squad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `players`
--
ALTER TABLE `players`
  MODIFY `id_player` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `request_managements`
--
ALTER TABLE `request_managements`
  MODIFY `id_request_management` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `request_squads`
--
ALTER TABLE `request_squads`
  MODIFY `id_request_squad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `squads`
--
ALTER TABLE `squads`
  MODIFY `id_squad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `squad_inv_players`
--
ALTER TABLE `squad_inv_players`
  MODIFY `id_squad_inv_player` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
