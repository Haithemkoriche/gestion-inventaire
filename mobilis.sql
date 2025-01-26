-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 fév. 2024 à 14:00
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mobilis`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mobilis.com', NULL, '$2y$12$NJ9.asdK0knkFzH7bz70xuAx1ShkMPfWTzsNgfZbmSj11jpN.GhwW', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_bar` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `code_bar`, `designation`, `quantite`, `created_at`, `updated_at`) VALUES
(5, 52, 'Qui perspiciatis qu', 26, '2024-01-06 12:08:40', '2024-01-06 12:14:17'),
(6, 123, 'PC', 12, '2024-02-01 08:25:44', '2024-02-01 08:25:44'),
(7, 74, 'Voluptatem eum cillu', 69, '2024-02-01 08:39:25', '2024-02-01 08:39:25'),
(8, 123, 'PC', 12, '2024-02-01 11:50:48', '2024-02-01 11:50:48'),
(9, 123, 'PC', 2, '2024-02-01 11:57:31', '2024-02-01 11:57:31');

-- --------------------------------------------------------

--
-- Structure de la table `article_office`
--

CREATE TABLE `article_office` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `office_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article_office`
--

INSERT INTO `article_office` (`id`, `article_id`, `office_id`, `created_at`, `updated_at`) VALUES
(3, 5, 23, NULL, NULL),
(4, 6, 23, NULL, NULL),
(5, 7, 23, NULL, NULL),
(6, 8, 32, NULL, NULL),
(7, 9, 33, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bureaux`
--

CREATE TABLE `bureaux` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `num_bureau` int(11) NOT NULL,
  `etage` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_01_06_093441_create_articles_table', 1),
(7, '2024_01_06_102449_create_bureaux_table', 2),
(8, '2024_01_06_104054_create_offices_table', 3),
(9, '2024_01_06_110644_create_sieges_table', 4),
(10, '2024_01_06_113904_create_bureau_sieges_table', 5),
(11, '2024_01_06_115529_create_office_siege_table', 6),
(12, '2024_01_06_125337_create_article_office_table', 7),
(13, '2014_10_12_000000_create_users_table', 8),
(14, '2024_01_31_100007_create_admins_table', 9);

-- --------------------------------------------------------

--
-- Structure de la table `offices`
--

CREATE TABLE `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `num_bureau` int(11) NOT NULL,
  `etage` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `offices`
--

INSERT INTO `offices` (`id`, `num_bureau`, `etage`, `created_at`, `updated_at`) VALUES
(22, 1, 1, '2024-01-06 11:25:51', '2024-02-01 09:01:07'),
(23, 11, 66, '2024-01-06 11:41:30', '2024-01-06 11:41:30'),
(25, 99, 12, '2024-02-01 08:26:28', '2024-02-01 08:26:28'),
(26, 99, 12, '2024-02-01 08:27:09', '2024-02-01 08:27:09'),
(27, 99, 12, '2024-02-01 08:27:48', '2024-02-01 08:27:48'),
(28, 99, 12, '2024-02-01 08:28:24', '2024-02-01 08:28:24'),
(29, 101, 1, '2024-02-01 08:33:22', '2024-02-01 08:33:22'),
(30, 101, 1, '2024-02-01 08:34:22', '2024-02-01 08:34:22'),
(31, 101, 1, '2024-02-01 08:35:49', '2024-02-01 08:35:49'),
(32, 100, 3, '2024-02-01 11:50:12', '2024-02-01 11:50:12'),
(33, 1, 1, '2024-02-01 11:57:10', '2024-02-01 11:57:10');

-- --------------------------------------------------------

--
-- Structure de la table `office_siege`
--

CREATE TABLE `office_siege` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `office_id` bigint(20) UNSIGNED NOT NULL,
  `siege_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `office_siege`
--

INSERT INTO `office_siege` (`id`, `office_id`, `siege_id`, `created_at`, `updated_at`) VALUES
(7, 22, 2, NULL, NULL),
(8, 23, 2, NULL, NULL),
(10, 25, 1, NULL, NULL),
(11, 26, 1, NULL, NULL),
(12, 27, 1, NULL, NULL),
(13, 28, 1, NULL, NULL),
(14, 31, 2, NULL, NULL),
(15, 32, 1, NULL, NULL),
(16, 33, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sieges`
--

CREATE TABLE `sieges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) NOT NULL,
  `address_siege` varchar(255) NOT NULL,
  `wilaya_sieges` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sieges`
--

INSERT INTO `sieges` (`id`, `designation`, `address_siege`, `wilaya_sieges`, `created_at`, `updated_at`) VALUES
(1, 'mobilis hydra', 'parado,hydra', 'Algerie', '2024-01-06 10:18:23', '2024-01-06 10:18:31'),
(2, 'mobilis babz', 'dar el  bida', 'alger', '2024-01-06 11:44:30', '2024-01-06 11:44:30'),
(3, 'mobilis adrar', 'adrar', 'Adrar', '2024-02-01 11:52:32', '2024-02-01 11:52:32');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `siege_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `siege_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hydra', 'hydra@mobilis.com', NULL, '$2y$12$nXM/LG9hxucuQsXh.qFrQukyBZofkH.F5qcx4ShtxuIceojIb4M8C', 1, NULL, '2024-01-31 08:56:43', '2024-01-31 08:56:43'),
(2, 'koriche', 'koriche@tabiblib-services.com', NULL, '$2y$12$gNqxb30TuHfctbsdjAaY5u.NVlKCTbyDho.5iv2NvlLCP0KDwI0k2', 2, NULL, '2024-02-01 08:06:58', '2024-02-01 08:06:58'),
(3, 'adrar', 'adrar@mobilis.com', NULL, '$2y$12$hdmj6BpyJIRXD5bYrWyVMevgnXEyzjVqjH7iz/d3QUqjeoyQ4UHAS', 3, NULL, '2024-02-01 11:53:57', '2024-02-01 11:53:57');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article_office`
--
ALTER TABLE `article_office`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_office_article_id_foreign` (`article_id`),
  ADD KEY `article_office_office_id_foreign` (`office_id`);

--
-- Index pour la table `bureaux`
--
ALTER TABLE `bureaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `office_siege`
--
ALTER TABLE `office_siege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `office_siege_office_id_foreign` (`office_id`),
  ADD KEY `office_siege_siege_id_foreign` (`siege_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `sieges`
--
ALTER TABLE `sieges`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_siege_id_foreign` (`siege_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `article_office`
--
ALTER TABLE `article_office`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `bureaux`
--
ALTER TABLE `bureaux`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `office_siege`
--
ALTER TABLE `office_siege`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sieges`
--
ALTER TABLE `sieges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article_office`
--
ALTER TABLE `article_office`
  ADD CONSTRAINT `article_office_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_office_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `office_siege`
--
ALTER TABLE `office_siege`
  ADD CONSTRAINT `office_siege_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `office_siege_siege_id_foreign` FOREIGN KEY (`siege_id`) REFERENCES `sieges` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_siege_id_foreign` FOREIGN KEY (`siege_id`) REFERENCES `sieges` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
