-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 31, 2021 at 03:14 PM
-- Server version: 10.2.39-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esisumba_anggota`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `user_id`, `jabatan`, `ig`, `fb`, `created_at`, `updated_at`) VALUES
(1, 3, 'Ketua Bidang Umum', 'Coba IG', 'Coba FB', '2021-12-23', '2021-12-29'),
(3, 9, 'Ketua', 'Ig', 'Fb', '2021-12-29', '2021-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `events`
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
-- Dumping data for table `events`
--

INSERT INTO `events` (`id_event`, `game_id`, `user_id`, `event_name`, `event_image`, `slot`, `price`, `pricepool`, `isfree`, `detail`, `peraturan`, `start`, `end`, `created_at`, `updated_at`) VALUES
(3, 3, 10, 'Event Uji Coba', '30_12_2021_61cd5fab47f96.jpg', '32', '100000', '5000000', 1, 'Detail', 'Aturan', '2022-01-01', '2022-01-31', '2021-12-29 23:28:43', '2021-12-29 23:28:43');

-- --------------------------------------------------------

--
-- Table structure for table `event_inv_teams`
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
-- Table structure for table `event_teams`
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
-- Dumping data for table `event_teams`
--

INSERT INTO `event_teams` (`id_event_teams`, `event_id`, `squad_id`, `ispaid`, `paid_image`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 0, '30_12_2021_61cd5fcfc0a51.png', '2021-12-29 23:29:19', '2021-12-29 23:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `event_winners`
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
-- Table structure for table `games`
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
-- Dumping data for table `games`
--

INSERT INTO `games` (`id_game`, `game_name`, `game_image`, `game_category_id`, `created_at`, `updated_at`) VALUES
(3, 'Mobile Legends', '20_12_2021_61c02c2eaad52.png', 2, '2021-12-19 15:09:34', '2021-12-19 15:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `game_categories`
--

CREATE TABLE `game_categories` (
  `id_game_category` int(11) NOT NULL,
  `game_category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_categories`
--

INSERT INTO `game_categories` (`id_game_category`, `game_category`, `created_at`, `updated_at`) VALUES
(2, 'RPG', '2021-12-19 15:09:22', '2021-12-19 15:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `managements`
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
-- Table structure for table `management_inv_squads`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
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
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `players`
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
-- Dumping data for table `players`
--

INSERT INTO `players` (`id_player`, `user_id`, `squad_id`, `game_id`, `ingame_name`, `ingame_id`, `player_image`, `created_at`, `updated_at`) VALUES
(6, 3, NULL, '3', 'First player account', '1212121', '29_12_2021_61cbfed5d747b.jpg', '2021-12-28 22:23:17', '2021-12-28 23:01:21'),
(7, 10, 2, '3', 'juno', 'juno', '30_12_2021_61cd5e8034aee.jpg', '2021-12-29 23:23:44', '2021-12-29 23:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `request_managements`
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
-- Table structure for table `request_squads`
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
-- Table structure for table `squads`
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
-- Dumping data for table `squads`
--

INSERT INTO `squads` (`id_squad`, `game_id`, `squad_name`, `squad_image`, `squad_leader`, `management_id`, `created_at`, `updated_at`) VALUES
(2, 3, 'Uji Coba', '30_12_2021_61cd5eac701f1.jpg', 7, NULL, '2021-12-29 23:24:28', '2021-12-29 23:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `squad_inv_players`
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
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `user_role`, `nama`, `email`, `password`, `kontak`, `alamat`, `gender`, `user_image`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'ESI Sumbawa', 'esisumbawa@gmail.com', '$2y$10$uoHBNmtLQOVtGf/UeY0CBe2RHAcsEEtWY3FsOmXyq8HOYjBykKeCa', '0834 4938 3434', 'Sumbawa', 'l', '30_12_2021_61cd61abe224c.jpg', '2021-12-05 11:28:41', '2021-12-29 23:37:15'),
(9, 'admin', 'Made Widiarta', 'widiartaimade@gmail.com', '$2y$10$BbBTe52R1jPGdMooDIWFMeUIIL8ezyb2J4G83EfGFsX8MQohqIXZq', '1234', 'Jl. Kebayaan No. 11', 'l', '29_12_2021_61cc08436ccd5.jpg', '2021-12-28 23:03:31', '2021-12-28 23:03:55'),
(10, 'player', 'Juno Praditya', 'juno.praditya@gmail.com', '$2y$10$cQT/EhEp/XCFDAdkDOLR1uHVTrDd1BYB0M9g9NGlj60OhNnLBrAIa', '1234', 'Kebayan', 'l', '30_12_2021_61cd612955a78.jpg', '2021-12-28 23:08:22', '2021-12-29 23:36:44'),
(11, 'player', 'Ardi', 'ardi@gmail.com', '$2y$10$Vz92n43RZFMTVyLBISbxze32Pl3NpXNMr3wY7XNLGBCjhhC5vma3O', '728282', 'Akaka', 'l', 'Group115.svg', '2021-12-30 00:25:47', '2021-12-30 00:25:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `event_inv_teams`
--
ALTER TABLE `event_inv_teams`
  ADD PRIMARY KEY (`id_event_inv_teams`);

--
-- Indexes for table `event_teams`
--
ALTER TABLE `event_teams`
  ADD PRIMARY KEY (`id_event_teams`);

--
-- Indexes for table `event_winners`
--
ALTER TABLE `event_winners`
  ADD PRIMARY KEY (`id_event_winner`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id_game`);

--
-- Indexes for table `game_categories`
--
ALTER TABLE `game_categories`
  ADD PRIMARY KEY (`id_game_category`);

--
-- Indexes for table `managements`
--
ALTER TABLE `managements`
  ADD PRIMARY KEY (`id_management`);

--
-- Indexes for table `management_inv_squads`
--
ALTER TABLE `management_inv_squads`
  ADD PRIMARY KEY (`id_management_inv_squad`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id_player`);

--
-- Indexes for table `request_managements`
--
ALTER TABLE `request_managements`
  ADD PRIMARY KEY (`id_request_management`);

--
-- Indexes for table `request_squads`
--
ALTER TABLE `request_squads`
  ADD PRIMARY KEY (`id_request_squad`);

--
-- Indexes for table `squads`
--
ALTER TABLE `squads`
  ADD PRIMARY KEY (`id_squad`);

--
-- Indexes for table `squad_inv_players`
--
ALTER TABLE `squad_inv_players`
  ADD PRIMARY KEY (`id_squad_inv_player`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_inv_teams`
--
ALTER TABLE `event_inv_teams`
  MODIFY `id_event_inv_teams` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_teams`
--
ALTER TABLE `event_teams`
  MODIFY `id_event_teams` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_winners`
--
ALTER TABLE `event_winners`
  MODIFY `id_event_winner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `game_categories`
--
ALTER TABLE `game_categories`
  MODIFY `id_game_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `managements`
--
ALTER TABLE `managements`
  MODIFY `id_management` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `management_inv_squads`
--
ALTER TABLE `management_inv_squads`
  MODIFY `id_management_inv_squad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id_player` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `request_managements`
--
ALTER TABLE `request_managements`
  MODIFY `id_request_management` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_squads`
--
ALTER TABLE `request_squads`
  MODIFY `id_request_squad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `squads`
--
ALTER TABLE `squads`
  MODIFY `id_squad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `squad_inv_players`
--
ALTER TABLE `squad_inv_players`
  MODIFY `id_squad_inv_player` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
