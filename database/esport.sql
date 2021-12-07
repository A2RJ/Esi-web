-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2021 pada 03.20
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

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
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pricepool` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `events` (`id_event`, `game_id`, `user_id`, `event_name`, `event_image`, `slot`, `pricepool`, `detail`, `peraturan`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'Noto Event', 'image.jpg', '21', '11111111111111', '1', '1', '2021-12-12', '2021-12-12', '2021-12-05 00:55:45', '2021-12-05 22:57:05'),
(3, 1, 1, 'CKCKCKCK', 'image.jpg', '1', '1', '1', '1', '2021-12-12', '2021-12-12', '2021-12-05 00:55:45', '2021-12-05 17:58:41'),
(4, 1, 1, 'PUBG Global Championship', 'pubg.jpg', '16', '2333333', '2', '2', '2021-12-12', '2021-12-12', '2021-12-05 22:54:20', '2021-12-05 22:54:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_inv_teams`
--

CREATE TABLE `event_inv_teams` (
  `id_event_inv_teams` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `squad_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `event_inv_teams`
--

INSERT INTO `event_inv_teams` (`id_event_inv_teams`, `event_id`, `squad_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-12-11 16:00:00', '2021-12-05 21:31:45'),
(2, 3, 1, '2021-12-11 16:00:00', '2021-12-05 21:31:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_teams`
--

CREATE TABLE `event_teams` (
  `id_event_teams` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `squad_id` int(11) NOT NULL,
  `isfree` tinyint(1) NOT NULL,
  `ispaid` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `event_teams`
--

INSERT INTO `event_teams` (`id_event_teams`, `event_id`, `squad_id`, `isfree`, `ispaid`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 0, 1, '2021-12-11 16:00:00', '2021-12-05 21:19:37'),
(12, 3, 1, 1, 1, '2021-12-11 16:00:00', '2021-12-05 21:19:15');

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

--
-- Dumping data untuk tabel `event_winners`
--

INSERT INTO `event_winners` (`id_event_winner`, `event_id`, `squad_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2021-12-11 16:00:00', '2021-12-05 21:48:43'),
(12, 1, 2, '2021-12-11 16:00:00', '2021-12-05 21:48:53');

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
(1, 'PUBG', 'pubg.jpg', 1, '2021-12-11 16:00:00', '2021-12-11 16:00:00'),
(2, 'Mobile Legends', 'ml.jpg', 3, '2021-12-11 16:00:00', '2021-12-05 22:09:27');

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
(1, 'RPG', '2021-12-11 16:00:00', '2021-12-11 16:00:00'),
(3, 'Strategi', '2021-12-11 16:00:00', '2021-12-11 16:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `managements`
--

CREATE TABLE `managements` (
  `id_management` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `management_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `management_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `managements`
--

INSERT INTO `managements` (`id_management`, `user_id`, `management_name`, `management_image`, `kontak`, `web_url`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 1, 'Coba management', 'image.jpg', '239234893', 'https://uts.ac.id', 'Batu alang', '2021-12-11 16:00:00', '2021-12-05 18:04:30'),
(3, 12, 'Coba management AHAHA', 'image.jpg', '1', 'https://uts.ac.id', 'Batu alang', '2021-12-11 16:00:00', '2021-12-11 16:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `management_inv_squads`
--

CREATE TABLE `management_inv_squads` (
  `id_management_inv_squad` int(11) NOT NULL,
  `management_id` int(11) NOT NULL,
  `squad_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `management_inv_squads`
--

INSERT INTO `management_inv_squads` (`id_management_inv_squad`, `management_id`, `squad_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-12-11 16:00:00', '2021-12-05 22:29:13'),
(2, 1, 2, '2021-12-11 16:00:00', '2021-12-05 22:29:00');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_05_082924_create_event_inv_teams_table', 1),
(6, '2021_12_05_082924_create_event_teams_table', 1),
(7, '2021_12_05_082924_create_event_winner_table', 1),
(8, '2021_12_05_082924_create_events_table', 1),
(9, '2021_12_05_082924_create_game_categories_table', 1),
(10, '2021_12_05_082924_create_games_table', 1),
(11, '2021_12_05_082924_create_management_inv_squads_table', 1),
(12, '2021_12_05_082924_create_managements_table', 1),
(13, '2021_12_05_082924_create_players_table', 1),
(14, '2021_12_05_082924_create_squad_inv_players_table', 1),
(15, '2021_12_05_082924_create_squads_table', 1),
(16, '2021_12_06_073231_create_event_inv_teams_table', 0),
(17, '2021_12_06_073231_create_event_teams_table', 0),
(18, '2021_12_06_073231_create_event_winners_table', 0),
(19, '2021_12_06_073231_create_events_table', 0),
(20, '2021_12_06_073231_create_failed_jobs_table', 0),
(21, '2021_12_06_073231_create_game_categories_table', 0),
(22, '2021_12_06_073231_create_games_table', 0),
(23, '2021_12_06_073231_create_management_inv_squads_table', 0),
(24, '2021_12_06_073231_create_managements_table', 0),
(25, '2021_12_06_073231_create_password_resets_table', 0),
(26, '2021_12_06_073231_create_personal_access_tokens_table', 0),
(27, '2021_12_06_073231_create_players_table', 0),
(28, '2021_12_06_073231_create_squad_inv_players_table', 0),
(29, '2021_12_06_073231_create_squads_table', 0),
(30, '2021_12_06_073231_create_users_table', 0);

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
  `squad_id` int(11) NOT NULL,
  `game_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingame_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingame_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `players`
--

INSERT INTO `players` (`id_player`, `user_id`, `squad_id`, `game_id`, `ingame_name`, `ingame_id`, `player_image`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '1', 'coekill', '873747', 'image.jpg', '2021-12-05 23:09:45', '2021-12-05 23:28:29'),
(2, 1, 1, '1', 'coekill', '3434', 'image.jpg', '2021-12-05 23:11:51', '2021-12-05 23:28:38'),
(3, 2, 2, '1', 'coekill', '12121', 'image.jpg', '2021-12-05 23:21:03', '2021-12-05 23:28:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `squads`
--

CREATE TABLE `squads` (
  `id_squad` int(11) NOT NULL,
  `squad_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `squad_leader` int(11) NOT NULL,
  `management_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `squads`
--

INSERT INTO `squads` (`id_squad`, `squad_name`, `squad_leader`, `management_id`, `created_at`, `updated_at`) VALUES
(1, 'AHAHAHA Squad', 1, 1, '2021-12-11 16:00:00', '2021-12-11 16:00:00'),
(2, 'HEHEHEH Squad', 1, 1, '2021-12-11 16:00:00', '2021-12-11 16:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `squad_inv_players`
--

CREATE TABLE `squad_inv_players` (
  `id_squad_inv_player` int(11) NOT NULL,
  `squad_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
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
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('l','p') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `user_role`, `nama`, `email`, `password`, `kontak`, `alamat`, `gender`, `user_image`, `created_at`, `updated_at`) VALUES
(1, 'player', 'Jando', 'apa@gmail.com', '$2y$10$rYcZbxwQ0/ZnQ7kX/KTs7OuT68HdFIEq8aOc3sLL8fVN62RvjOV.6', '1', '1', 'l', 'user.jpg', '2021-12-05 18:22:11', '2021-12-05 22:31:37'),
(2, 'management', 'Noto singin', '2', '2', '2', '2', 'p', '2', '2021-12-05 19:28:41', '2021-12-05 22:34:04');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `event_inv_teams`
--
ALTER TABLE `event_inv_teams`
  MODIFY `id_event_inv_teams` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `event_teams`
--
ALTER TABLE `event_teams`
  MODIFY `id_event_teams` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `event_winners`
--
ALTER TABLE `event_winners`
  MODIFY `id_event_winner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `games`
--
ALTER TABLE `games`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `game_categories`
--
ALTER TABLE `game_categories`
  MODIFY `id_game_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `managements`
--
ALTER TABLE `managements`
  MODIFY `id_management` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `players`
--
ALTER TABLE `players`
  MODIFY `id_player` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `squads`
--
ALTER TABLE `squads`
  MODIFY `id_squad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `squad_inv_players`
--
ALTER TABLE `squad_inv_players`
  MODIFY `id_squad_inv_player` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
