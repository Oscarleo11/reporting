-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 19 juin 2025 à 17:46
-- Version du serveur : 8.0.30
-- Version de PHP : 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reporting`
--

-- --------------------------------------------------------

--
-- Structure de la table `acquisition_cartes`
--

CREATE TABLE `acquisition_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` bigint UNSIGNED NOT NULL,
  `plafond_rechargement` bigint UNSIGNED NOT NULL,
  `plafond_retrait_journalier` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `acquisition_cartes`
--

INSERT INTO `acquisition_cartes` (`id`, `debut_periode`, `fin_periode`, `code_type`, `tarif`, `plafond_rechargement`, `plafond_retrait_journalier`, `created_at`, `updated_at`) VALUES
(5, '2023-01-01', '2023-06-30', 'FCARTE_1_T2', 20000, 2000000, 400000, '2025-06-03 20:23:28', '2025-06-03 20:23:28'),
(6, '2023-01-01', '2023-06-30', 'FCARTE_3_T2', 20000, 2000000, 400000, '2025-06-03 20:23:28', '2025-06-03 20:23:28'),
(7, '2025-06-01', '2025-06-30', 'FCARTE_1_T2', 500, 10000, 900, '2025-06-10 08:10:50', '2025-06-10 08:10:50'),
(8, '2025-06-01', '2025-06-30', 'FCARTE_1_T1', 600, 1200, 1000, '2025-06-10 08:10:50', '2025-06-10 08:10:50');

-- --------------------------------------------------------

--
-- Structure de la table `annuaires_stras`
--

CREATE TABLE `annuaires_stras` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `nbsous_agents` int NOT NULL,
  `nbpoints_service` int NOT NULL,
  `nb_emission_intra` int NOT NULL,
  `valeur_emission_intra` int NOT NULL,
  `nb_emission_hors` int NOT NULL,
  `valeur_emission_hors` int NOT NULL,
  `nb_reception_intra` int NOT NULL,
  `valeur_reception_intra` int NOT NULL,
  `nb_reception_hors` int NOT NULL,
  `valeur_reception_hors` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annuaires_stras`
--

INSERT INTO `annuaires_stras` (`id`, `debut_periode`, `fin_periode`, `nbsous_agents`, `nbpoints_service`, `nb_emission_intra`, `valeur_emission_intra`, `nb_emission_hors`, `valeur_emission_hors`, `nb_reception_intra`, `valeur_reception_intra`, `nb_reception_hors`, `valeur_reception_hors`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-03-30', 11214, 12087, 50, 34, 50, 60, 70, 10, 30, 60, '2025-06-08 13:02:57', '2025-06-08 13:02:57'),
(3, '2023-01-01', '2023-06-30', 222, 22, 33, 0, 2, 0, 5, 0, 42, 0, '2025-06-16 13:19:41', '2025-06-16 13:19:41');

-- --------------------------------------------------------

--
-- Structure de la table `annuaire_services`
--

CREATE TABLE `annuaire_services` (
  `id` bigint UNSIGNED NOT NULL,
  `annuaire_stra_id` bigint UNSIGNED NOT NULL,
  `operateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_service` text COLLATE utf8mb4_unicode_ci,
  `date_lancement` date DEFAULT NULL,
  `perimetre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mecanisme_compensation_reglement` text COLLATE utf8mb4_unicode_ci,
  `nbsous_agents` int NOT NULL DEFAULT '0',
  `nbpoints_service` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annuaire_services`
--

INSERT INTO `annuaire_services` (`id`, `annuaire_stra_id`, `operateur`, `code_service`, `description_service`, `date_lancement`, `perimetre`, `mecanisme_compensation_reglement`, `nbsous_agents`, `nbpoints_service`, `created_at`, `updated_at`) VALUES
(1, 1, 'MOGR', 'STRA_MOGR', 'Transfert d\'argent vers presque tous les pays du monde en agence', '2021-01-01', 'INTRA_ET_HORS_UEMOA', 'Compensation via SICA-UEMOA et règlement à travers STAR-UEMOA', 4333, 5750, '2025-06-08 13:02:57', '2025-06-08 13:02:57'),
(2, 1, 'ETABLISSEMENT', 'STRA_RAPTR', 'Transfert d\'argent vers presque tous les pays du monde en agence', '2021-01-01', 'INTRA_UEMOA', 'Compensation et règlement à travers RTGS', 6881, 6337, '2025-06-08 13:02:57', '2025-06-08 13:02:57'),
(4, 3, 'TTTTTT', 'STRA_RAPTR', 'Transfert d\'argent vers presque tous les pays du monde en agence', '2023-03-03', 'INTRA_ET_HORS_UEMOA', 'Compensation via SICA-UEMOA et règlement à travers STAR-UEMOA', 222, 22, '2025-06-16 13:19:41', '2025-06-16 13:19:41');

-- --------------------------------------------------------

--
-- Structure de la table `annuaire_transactions`
--

CREATE TABLE `annuaire_transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `annuaire_service_id` bigint UNSIGNED NOT NULL,
  `type_transaction` enum('emission','reception') COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode_envoi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_reception` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_intra` int NOT NULL DEFAULT '0',
  `valeur_intra` bigint NOT NULL DEFAULT '0',
  `nb_hors` int NOT NULL DEFAULT '0',
  `valeur_hors` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annuaire_transactions`
--

INSERT INTO `annuaire_transactions` (`id`, `annuaire_service_id`, `type_transaction`, `mode_envoi`, `mode_reception`, `nb_intra`, `valeur_intra`, `nb_hors`, `valeur_hors`, `created_at`, `updated_at`) VALUES
(1, 1, 'emission', 'APPLICATION_WEB', 'COMPTE_BANCAIRE', 25, 125, 25, 125, '2025-06-08 13:02:57', '2025-06-08 13:02:57'),
(2, 2, 'emission', 'SOUS_AGENTS', 'ESPECE_GUICHET', 25, 125, 25, 125, '2025-06-08 13:02:57', '2025-06-08 13:02:57'),
(5, 4, 'reception', 'APPLICATION_WEB', 'DS', 5, 444, 42, 43, '2025-06-16 13:19:41', '2025-06-16 13:19:41'),
(6, 4, 'emission', '333', 'PORTE_MONNAIE_ELECTRONIQUE', 33, 22, 2, 33, '2025-06-16 13:19:41', '2025-06-16 13:19:41');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('reporting_cache_gilbert.afantohou@ubagroup.com|127.0.0.1', 'i:1;', 1750328932),
('reporting_cache_gilbert.afantohou@ubagroup.com|127.0.0.1:timer', 'i:1750328932;', 1750328932),
('reporting_cache_lo@gmail.com|127.0.0.1', 'i:1;', 1750333699),
('reporting_cache_lo@gmail.com|127.0.0.1:timer', 'i:1750333699;', 1750333699);

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `details_risques_stras`
--

CREATE TABLE `details_risques_stras` (
  `id` bigint UNSIGNED NOT NULL,
  `risque_stra_id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `risque` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mecanisme_maitrise` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `details_risques_stras`
--

INSERT INTO `details_risques_stras` (`id`, `risque_stra_id`, `code`, `risque`, `mecanisme_maitrise`, `created_at`, `updated_at`) VALUES
(3, 6, 'FRIS_3_RIS_4', 'Le manque de régulateur ayant occasionné l\'interruption brusque de l’appareil', 'Une feuille de route élaborée et mise en oeuvre de maîtriser le risque', '2025-06-08 20:55:10', '2025-06-08 20:55:10'),
(4, 6, 'FRIS_1_RIS_3', 'La non mise à jour du système a engendré le dysfonctionnement de la plate-forme', 'Des actions en vue de maîtriser le risque ont été identifiées et mise en oeuvre', '2025-06-08 20:55:10', '2025-06-08 20:55:10'),
(5, 7, 'FRIS_3_RIS_4', 'FGFFGF', 'GFGFG', '2025-06-17 10:44:04', '2025-06-17 10:44:04'),
(6, 8, 'FRIS_3_RIS_4', 'FGFFGF', 'GFGFG', '2025-06-17 10:44:17', '2025-06-17 10:44:17'),
(7, 9, 'FRIS_3_RIS_4', 'FGFFGF', 'GFGFG', '2025-06-17 10:44:24', '2025-06-17 10:44:24');

-- --------------------------------------------------------

--
-- Structure de la table `ecosystemes`
--

CREATE TABLE `ecosystemes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `nbsous_agents` int NOT NULL,
  `nbpoints_service` int NOT NULL,
  `modalite_controle_sousagents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_offert` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_service` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `operateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays_operateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perimetre_partenariat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debut_partenariat` date NOT NULL,
  `fin_partenariat` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ecosystemes`
--

INSERT INTO `ecosystemes` (`id`, `debut_periode`, `fin_periode`, `nbsous_agents`, `nbpoints_service`, `modalite_controle_sousagents`, `service_offert`, `description_service`, `operateur`, `pays_operateur`, `perimetre_partenariat`, `debut_partenariat`, `fin_partenariat`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-01-31', 5, 50, 'Contrôle sur place de l’activité. Transmission mensuelle des reporting par les sous agents', 'STRA_MOGR', 'MoneyGram fournit des services de transfert d\'argent et d\'autres services financiers dans le monde entier avec des plateformes numériques et des points de vente.', 'MOGR', 'US', 'INTRA_ET_HORS_UEMOA', '2021-02-01', NULL, '2025-06-13 06:45:48', '2025-06-13 06:45:48'),
(2, '2023-01-01', '2023-01-31', 5, 50, 'Contrôle sur place de l’activité. Transmission mensuelle des reporting par les sous agents', 'STRA_MOCA', 'Services de transfert d\'argent.', 'MOGR', 'US', 'INTRA_ET_HORS_UEMOA', '2018-04-01', '2022-06-11', '2025-06-13 06:45:48', '2025-06-13 06:45:48');

-- --------------------------------------------------------

--
-- Structure de la table `emission_cartes`
--

CREATE TABLE `emission_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `totalcarte` int NOT NULL,
  `codefamille` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codetype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbcarte` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `emission_cartes`
--

INSERT INTO `emission_cartes` (`id`, `debut_periode`, `fin_periode`, `totalcarte`, `codefamille`, `codetype`, `description`, `nbcarte`, `created_at`, `updated_at`) VALUES
(10, '2023-01-01', '2023-06-30', 4900, 'FCARTE_1', 'FCARTE_1_T1', 'Cartes adossées à un compte courant', 200, '2025-06-03 20:03:08', '2025-06-03 20:03:08'),
(11, '2023-01-01', '2023-06-30', 4900, 'FCARTE_1', 'FCARTE_1_T2', 'Cartes adossées à un compte épargne', 800, '2025-06-03 20:03:08', '2025-06-03 20:03:08'),
(12, '2023-01-01', '2023-06-30', 4900, 'FCARTE_2', 'FCARTE_2_T1', 'Cartes adossées à un compte de monnaie électronique', 2500, '2025-06-03 20:03:08', '2025-06-03 20:03:08'),
(13, '2023-01-01', '2023-06-30', 4900, 'FCARTE_3', 'FCARTE_3_T2', 'Cartes Mastercard', 1400, '2025-06-03 20:03:08', '2025-06-03 20:03:08');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `famille_cartes`
--

CREATE TABLE `famille_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `famille_cartes`
--

INSERT INTO `famille_cartes` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'FCARTE_1', '', NULL, NULL),
(3, 'FCARTE_2', '', NULL, NULL),
(5, 'FCARTE_3', '', NULL, NULL),
(7, 'FRACHEQUE_1', NULL, NULL, NULL),
(9, 'FRACHEQUE_2', NULL, NULL, NULL),
(11, 'FRCARTE_1', NULL, NULL, NULL),
(13, 'FRCARTE_2', NULL, NULL, NULL),
(15, 'FRCARTE_3', NULL, NULL, NULL),
(17, 'IPCARTE_1', NULL, NULL, NULL),
(19, 'IPCARTE_2', NULL, NULL, NULL),
(21, 'IPCARTE_3', NULL, NULL, NULL),
(23, 'IPCARTE_4', NULL, NULL, NULL),
(25, 'IPCARTE_5', NULL, NULL, NULL),
(27, 'IPCARTE_6', NULL, NULL, NULL),
(29, 'IPCHEQUE_1', NULL, NULL, NULL),
(31, 'IPCHEQUE_2', NULL, NULL, NULL),
(33, 'IPCHEQUE_3', NULL, NULL, NULL),
(35, 'IPCHEQUE_4', NULL, NULL, NULL),
(37, 'IPCHEQUE_5', NULL, NULL, NULL),
(39, 'IPCHEQUE_6', NULL, NULL, NULL),
(41, 'IPCHEQUE_7', NULL, NULL, NULL),
(42, 'IPCHEQUE_8', NULL, NULL, NULL),
(45, 'UTLCARTE_1', NULL, NULL, NULL),
(47, 'UTLCARTE_2', NULL, NULL, NULL),
(49, 'UTLCARTE_3', NULL, NULL, NULL),
(50, 'UTLCARTE_4', NULL, NULL, NULL),
(58, 'UTLCARTE_5', NULL, NULL, NULL),
(59, 'UTLCARTE_6', NULL, NULL, NULL),
(62, 'UTLCARTE_7', NULL, NULL, NULL),
(63, 'UTLCARTE_8', NULL, NULL, NULL),
(66, 'UTLCHEQUE_1', NULL, NULL, NULL),
(67, 'UTLCHEQUE_2', NULL, NULL, NULL),
(70, 'UTLCHEQUE_3', NULL, NULL, NULL),
(72, 'TCHEQUE_1', NULL, NULL, NULL),
(73, 'TCHEQUE_2', NULL, NULL, NULL),
(76, 'TCHEQUE_4', NULL, NULL, NULL),
(77, 'TCHEQUE_5', NULL, NULL, NULL),
(81, 'FRACHEQUE_3\r\n', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `famille_cheques`
--

CREATE TABLE `famille_cheques` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `famille_cheques`
--

INSERT INTO `famille_cheques` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'FRACHEQUE_1\r\n', NULL, NULL, NULL),
(2, 'FRACHEQUE_2\r\n', NULL, NULL, NULL),
(3, 'FRACHEQUE_3', NULL, NULL, NULL),
(4, 'IPCHEQUE_1', NULL, NULL, NULL),
(5, 'IPCHEQUE_2', NULL, NULL, NULL),
(6, 'IPCHEQUE_3', NULL, NULL, NULL),
(7, 'IPCHEQUE_4', NULL, NULL, NULL),
(8, 'IPCHEQUE_5', NULL, NULL, NULL),
(9, 'IPCHEQUE_6', NULL, NULL, NULL),
(10, 'UTLCHEQUE_1', NULL, NULL, NULL),
(11, 'UTLCHEQUE_2', NULL, NULL, NULL),
(12, 'UTLCHEQUE_3', NULL, NULL, NULL),
(13, 'UTLCHEQUE_4', NULL, NULL, NULL),
(14, 'UTLCHEQUE_5', '', NULL, NULL),
(15, 'TCHEQUE_1', '', NULL, NULL),
(16, 'TCHEQUE_2', NULL, NULL, NULL),
(17, 'TCHEQUE_3', NULL, NULL, NULL),
(18, 'TCHEQUE_4', NULL, NULL, NULL),
(19, 'TCHEQUE_5', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `famille_cheque_cartes`
--

CREATE TABLE `famille_cheque_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `famille_cheque_cartes`
--

INSERT INTO `famille_cheque_cartes` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'FCARTE_1', NULL, NULL, NULL),
(2, 'FCARTE_2', NULL, NULL, NULL),
(3, 'FCARTE_3', NULL, NULL, NULL),
(4, 'FCARTE_4', NULL, NULL, NULL),
(5, 'FCARTE_5', NULL, NULL, NULL),
(6, 'FRCARTE_1', NULL, NULL, NULL),
(7, 'FRCARTE_2', NULL, NULL, NULL),
(8, 'FRCARTE_3', NULL, NULL, NULL),
(9, 'FRCARTE_4', NULL, NULL, NULL),
(10, 'FRCARTE_5', NULL, NULL, NULL),
(11, 'IPCARTE_1', NULL, NULL, NULL),
(12, 'IPCARTE_2', NULL, NULL, NULL),
(13, 'IPCARTE_3', NULL, NULL, NULL),
(14, 'IPCARTE_4', NULL, NULL, NULL),
(15, 'IPCARTE_5', NULL, NULL, NULL),
(16, 'UTLCARTE_1', NULL, NULL, NULL),
(17, 'UTLCARTE_2', NULL, NULL, NULL),
(18, 'UTLCARTE_3', NULL, NULL, NULL),
(19, 'UTLCARTE_4', NULL, NULL, NULL),
(20, 'UTLCARTE_5', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fraudestras`
--

CREATE TABLE `fraudestras` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `fraude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_fraude` int NOT NULL,
  `valeur_fraude` bigint NOT NULL,
  `mesures_correctives` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode_operatoire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `debut_fraude` date NOT NULL,
  `fin_fraude` date NOT NULL,
  `total_fraude` int NOT NULL,
  `total_valeur_fraude` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fraudestras`
--

INSERT INTO `fraudestras` (`id`, `debut_periode`, `fin_periode`, `fraude`, `service`, `nb_fraude`, `valeur_fraude`, `mesures_correctives`, `mode_operatoire`, `debut_fraude`, `fin_fraude`, `total_fraude`, `total_valeur_fraude`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-01-31', 'DFRA_1', 'STRA_WEUN', 2, 2000, 'Mise en oeuvre des procédures de détection des identifiants', 'Fait de profiter de personnes vulnérables pour obtenir leurs mots de passe personnels', '2023-01-04', '2023-04-01', 3, 12000, '2025-06-13 06:52:26', '2025-06-13 06:52:26'),
(2, '2023-01-01', '2023-01-31', 'DFRA_10', 'STRA_MOGR', 1, 10000, 'Collecte d’information sur la fraude et annulation des opérations frauduleuses', 'l\'émission de transactions fictives', '2023-01-04', '2023-04-12', 3, 12000, '2025-06-13 06:52:26', '2025-06-13 06:52:26');

-- --------------------------------------------------------

--
-- Structure de la table `fraude_cheque_cartes`
--

CREATE TABLE `fraude_cheque_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codecheque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datefraude` date NOT NULL,
  `libellefraude` text COLLATE utf8mb4_unicode_ci,
  `mesurescorrectives` text COLLATE utf8mb4_unicode_ci,
  `modeoperatoire` text COLLATE utf8mb4_unicode_ci,
  `nbfraude` int NOT NULL,
  `valeurcfa` bigint NOT NULL,
  `totalfraude` int NOT NULL,
  `totalvaleurcfa` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fraude_cheque_cartes`
--

INSERT INTO `fraude_cheque_cartes` (`id`, `debut_periode`, `fin_periode`, `type`, `codecheque`, `datefraude`, `libellefraude`, `mesurescorrectives`, `modeoperatoire`, `nbfraude`, `valeurcfa`, `totalfraude`, `totalvaleurcfa`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'CHEQUE', 'FRACHEQUE_2', '2023-04-02', 'Chèque falsifié', 'Appeler le client pour confirmer les détails du chèques', 'Le chèque est intercepté et le bénéficiaire est modifié.', 5, 10, 20, 40, '2025-06-03 23:42:41', '2025-06-03 23:42:41'),
(2, '2023-01-01', '2023-06-30', 'CARTE', 'FRCARTE_1', '2023-01-21', 'Carte falsifiée ou contrefaite', 'Confiscation de la carte', 'Se produit lorsqu\'un criminel copie les données contenues sur la bande magnétique d\'une carte de crédit ou de débit légitime', 5, 10, 20, 40, '2025-06-03 23:42:41', '2025-06-03 23:42:41'),
(3, '2023-01-01', '2023-06-30', 'CHEQUE', 'FRACHEQUE_3', '2023-05-12', 'Chèque contrefait', 'saisie du chèque', 'chèque qui n\'est ni fait ni autorisé par le titulaire légitime du compte', 10, 20, 20, 40, '2025-06-03 23:42:41', '2025-06-03 23:42:41');

-- --------------------------------------------------------

--
-- Structure de la table `incident_cheque_cartes`
--

CREATE TABLE `incident_cheque_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateincident` date NOT NULL,
  `libelleincident` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `risque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nboccurrence` int NOT NULL,
  `descriptiondetaillee` text COLLATE utf8mb4_unicode_ci,
  `mesurescorrectives` text COLLATE utf8mb4_unicode_ci,
  `impactfinancier` bigint NOT NULL,
  `statutincident` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecloture` date DEFAULT NULL,
  `infoscomplementaires` text COLLATE utf8mb4_unicode_ci,
  `totalincidents` int NOT NULL,
  `totalimpactfinancier` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `incident_cheque_cartes`
--

INSERT INTO `incident_cheque_cartes` (`id`, `debut_periode`, `fin_periode`, `type`, `dateincident`, `libelleincident`, `risque`, `nboccurrence`, `descriptiondetaillee`, `mesurescorrectives`, `impactfinancier`, `statutincident`, `datecloture`, `infoscomplementaires`, `totalincidents`, `totalimpactfinancier`, `created_at`, `updated_at`) VALUES
(4, '2023-01-01', '2023-06-30', 'CARTE', '2023-04-01', 'Vol de cartes', 'financier', 3, 'La carte du client a été volée', 'carte bloquée', 500, 'T', '2023-04-03', 'Pas d\'informations particulières', 10, 7000, '2025-06-04 09:54:37', '2025-06-04 09:54:37'),
(5, '2023-01-01', '2023-06-30', 'CHEQUE', '2023-04-01', 'Refus de paiement de chèques pour défaut ou insuffisance de provision', 'financier', 6, 'Le client n\'a pas assez de fonds pour l\'opération.', 'Le client a été invité à approvisionner le compte.', 1500, 'P', '2023-04-06', 'Pas d\'informations particulières', 10, 7000, '2025-06-04 09:54:37', '2025-06-04 09:54:37'),
(6, '2023-01-01', '2023-06-30', 'CHEQUE', '2023-04-01', 'Infraction aux interdictions bancaires et judiciaires', 'juridique', 1, 'émission de plusieurs chèques sans provision', 'inscrire sur le Fichier Central des Chèques', 5000, 'N', '2023-04-02', 'Pas d\'informations particulières', 10, 7000, '2025-06-04 09:54:37', '2025-06-04 09:54:37');

-- --------------------------------------------------------

--
-- Structure de la table `incident_paiement_cartes`
--

CREATE TABLE `incident_paiement_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbcarte` int NOT NULL,
  `valeurcfa` bigint DEFAULT NULL,
  `totalnombre` int NOT NULL,
  `totalvaleurcfa` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `incident_paiement_cartes`
--

INSERT INTO `incident_paiement_cartes` (`id`, `debut_periode`, `fin_periode`, `code`, `description`, `nbcarte`, `valeurcfa`, `totalnombre`, `totalvaleurcfa`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'IPCARTE_3', 'Perte de cartes', 4, 4, 27, 20, '2025-06-04 11:40:41', '2025-06-04 11:40:41'),
(2, '2023-01-01', '2023-06-30', 'IPCARTE_4', 'Cartes capturées', 8, NULL, 27, 20, '2025-06-04 11:40:41', '2025-06-04 11:40:41'),
(3, '2023-01-01', '2023-06-30', 'IPCARTE_2', 'Vol de cartes', 3, 4, 27, 20, '2025-06-04 11:40:41', '2025-06-04 11:40:41'),
(4, '2023-01-01', '2023-06-30', 'IPCARTE_5', 'Cartes en opposition', 8, 8, 27, 20, '2025-06-04 11:40:41', '2025-06-04 11:40:41'),
(5, '2023-01-01', '2023-06-30', 'IPCARTE_6', 'Autres à préciser', 4, 4, 27, 20, '2025-06-04 11:40:41', '2025-06-04 11:40:41');

-- --------------------------------------------------------

--
-- Structure de la table `incident_paiement_cheques`
--

CREATE TABLE `incident_paiement_cheques` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbcheque` int NOT NULL,
  `valeurcfa` bigint DEFAULT NULL,
  `totalnombre` int NOT NULL,
  `totalvaleurcfa` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `incident_paiement_cheques`
--

INSERT INTO `incident_paiement_cheques` (`id`, `debut_periode`, `fin_periode`, `code`, `description`, `nbcheque`, `valeurcfa`, `totalnombre`, `totalvaleurcfa`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'IPCHEQUE_3', 'Interdictions bancaires d\'émettre des chèques', 2, NULL, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46'),
(2, '2023-01-01', '2023-06-30', 'IPCHEQUE_1', 'Refus de paiement de chèques pour defaut ou insuffisance de provision', 2, 5, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46'),
(3, '2023-01-01', '2023-06-30', 'IPCHEQUE_2', 'Avertissements adressés aux titulaires de comptes qui ont émis des chèques sans provision', 5, NULL, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46'),
(4, '2023-01-01', '2023-06-30', 'IPCHEQUE_4', 'Infractions aux interdictions bancaires et judiciaires', 3, NULL, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46'),
(5, '2023-01-01', '2023-06-30', 'IPCHEQUE_5', 'Oppositions pour perte ou vol de formules de chèques', 2, 8, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46'),
(6, '2023-01-01', '2023-06-30', 'IPCHEQUE_8', 'Levées des interdictions bancaires d\'émettre des chèques', 1, NULL, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46'),
(7, '2023-01-01', '2023-06-30', 'IPCHEQUE_6', 'Formules de faux chèques et/ou chèques falsifiés', 3, NULL, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46'),
(8, '2023-01-01', '2023-06-30', 'IPCHEQUE_7', 'Régularisation d\'incidents de paiement sur chèque', 1, 8, 19, 21, '2025-06-04 20:24:46', '2025-06-04 20:24:46');

-- --------------------------------------------------------

--
-- Structure de la table `incident_stras`
--

CREATE TABLE `incident_stras` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `plateformetechnique` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `risque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateincident` date NOT NULL,
  `libelleincident` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nboccurrence` int NOT NULL,
  `descriptiondetaillee` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mesurescorrectives` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `impactfinancier` bigint DEFAULT NULL,
  `statutincident` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecloture` date DEFAULT NULL,
  `naturedeclaration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `totalincidents` int DEFAULT NULL,
  `totalimpactfinancier` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `incident_stras`
--

INSERT INTO `incident_stras` (`id`, `debut_periode`, `fin_periode`, `plateformetechnique`, `risque`, `dateincident`, `libelleincident`, `nboccurrence`, `descriptiondetaillee`, `mesurescorrectives`, `impactfinancier`, `statutincident`, `datecloture`, `naturedeclaration`, `reference`, `created_at`, `updated_at`, `totalincidents`, `totalimpactfinancier`) VALUES
(8, '2023-01-01', '2023-01-31', 'STRA_MOGR', 'Risque opérationnel', '2023-01-02', 'Dysfonctionnement de la plate-forme', 2, 'Arrêt du fonctionnement de la plate-forme pendant 2 heures.', 'Un diagnostic des incidents ainsi que des mises à jour ont été effectuées.', 20000000, 'N', '2023-01-06', 'Commentaire / Informations complémentaires', 'INC002/01/2023', '2025-06-10 08:08:44', '2025-06-10 08:08:44', 5, 25000000),
(9, '2023-01-01', '2023-01-31', 'STRA_ORYX', 'Risque opérationnel', '2023-01-06', 'Interruptions instantanées récurrentes de la plate-forme', 3, 'Demande de mise à jour brusque sur la plateforme occasionnant des interruptions', 'rationaliser le processus de mise à jour', 5000000, 'T', '2023-01-12', 'Commentaire / Informations complémentaires', 'INC003/01/2023', '2025-06-10 08:08:44', '2025-06-10 08:08:44', 5, 25000000);

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_02_123529_create_type_cartes_table', 1),
(5, '2025_06_02_123530_create_acquisition_cartes_table', 1),
(6, '2025_06_02_150440_create_emission_cartes_table', 2),
(7, '2025_06_02_150441_create_famille_cartes_table', 2),
(8, '2025_06_03_220030_create_fraude_cheque_cartes_table', 3),
(9, '2025_06_03_234509_create_incident_cheque_cartes_table', 4),
(10, '2025_06_04_121448_create_incident_paiement_cartes_table', 5),
(11, '2025_06_04_131650_create_incident_paiement_cheques_table', 6),
(12, '2025_06_04_142439_create_reclamation_cheque_cartes_table', 7),
(13, '2025_06_04_145215_create_tarification_cheque_cartes_table', 8),
(14, '2025_06_04_151126_create_typologie_cheques_table', 9),
(15, '2025_06_04_182224_create_utilisation_cartes_table', 10),
(16, '2025_06_04_183118_create_utilisation_cheques_table', 11),
(17, '2025_06_07_192952_create_annuaire_stras_table', 12),
(18, '2025_06_07_192953_create_annuaire_services_table', 12),
(19, '2025_06_07_192954_create_annuaire_transactions_table', 12),
(20, '2025_06_07_200207_create_services_table', 13),
(21, '2025_06_07_200252_create_modes_envoi_table', 13),
(22, '2025_06_07_200305_create_modes_reception_table', 13),
(23, '2025_06_08_160321_create_risques_stras_table', 14),
(24, '2025_06_08_160927_create_details_risques_stras_table', 14),
(25, '2025_06_08_164108_create_type_risque_stras_table', 14),
(26, '2025_06_08_173616_create_incident_stras_table', 15),
(27, '2025_06_10_083912_add_totaux_to_incident_stras_table', 16),
(28, '2025_06_10_105021_create_famille_cheques_table', 17),
(29, '2025_06_10_112354_create_famille_cheque_cartes_table', 18),
(30, '2025_06_12_092531_create_ecosystemes_table', 19),
(31, '2025_06_12_101714_create_fraude_stras_table', 20),
(32, '2025_06_12_104209_create_operation_stras_table', 21),
(33, '2025_06_12_110259_create_reclamation_stras_table', 22),
(34, '2025_06_19_105403_add_role_to_users_table', 23);

-- --------------------------------------------------------

--
-- Structure de la table `modes_envoi`
--

CREATE TABLE `modes_envoi` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `modes_reception`
--

CREATE TABLE `modes_reception` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `operationstras`
--

CREATE TABLE `operationstras` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_transaction_emission` int NOT NULL,
  `valeur_transaction_emission` bigint NOT NULL,
  `nb_transaction_reception` int NOT NULL,
  `valeur_transaction_reception` bigint NOT NULL,
  `total_nb_emission` int NOT NULL,
  `total_valeur_emission` bigint NOT NULL,
  `total_nb_reception` int NOT NULL,
  `total_valeur_reception` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `operationstras`
--

INSERT INTO `operationstras` (`id`, `debut_periode`, `fin_periode`, `service`, `pays`, `motif`, `nb_transaction_emission`, `valeur_transaction_emission`, `nb_transaction_reception`, `valeur_transaction_reception`, `total_nb_emission`, `total_valeur_emission`, `total_nb_reception`, `total_valeur_reception`, `created_at`, `updated_at`) VALUES
(1, '2023-12-01', '2023-12-31', 'STRA_WEUN', 'SN', 'ASSISTANCE_FAMILIALE', 10, 10, 10, 10, 20, 30, 25, 30, '2025-06-13 08:31:50', '2025-06-13 08:31:50'),
(2, '2023-12-01', '2023-12-31', 'STRA_WEUN', 'SN', 'AIDE_SCOLAIRE', 5, 10, 10, 10, 20, 30, 25, 30, '2025-06-13 08:31:50', '2025-06-13 08:31:50'),
(3, '2023-12-01', '2023-12-31', 'RIA', 'BJ', 'ACQUISITION_IMMOBILIERE_FONCIERE', 5, 10, 5, 10, 20, 30, 25, 30, '2025-06-13 08:31:50', '2025-06-13 08:31:50');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reclamation_cheque_cartes`
--

CREATE TABLE `reclamation_cheque_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etattraitement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mesurescorrectives` text COLLATE utf8mb4_unicode_ci,
  `nbre` int NOT NULL,
  `totalcarte` int DEFAULT NULL,
  `totalcheque` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reclamation_cheque_cartes`
--

INSERT INTO `reclamation_cheque_cartes` (`id`, `debut_periode`, `fin_periode`, `type`, `motif`, `etattraitement`, `mesurescorrectives`, `nbre`, `totalcarte`, `totalcheque`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'carte', 'Cartes non fonctionnelles au guichet', 'P', 'Rappel des cartes non fonctionnelles et ou erronées', 65, 65, 50, '2025-06-04 20:53:09', '2025-06-04 20:53:09'),
(2, '2023-01-01', '2023-06-30', 'cheque', 'Remise de chèque non encaissée', 'T', 'Suivi du traitement des chèques déposés pour encaissement', 50, 65, 50, '2025-06-04 20:53:09', '2025-06-04 20:53:09');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation_stras`
--

CREATE TABLE `reclamation_stras` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_recu` int NOT NULL,
  `nb_traite` int NOT NULL,
  `motif_reclamation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `procedure_traitement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_recu` int DEFAULT NULL,
  `total_traite` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reclamation_stras`
--

INSERT INTO `reclamation_stras` (`id`, `debut_periode`, `fin_periode`, `service`, `nb_recu`, `nb_traite`, `motif_reclamation`, `procedure_traitement`, `total_recu`, `total_traite`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-01-31', 'STRA_WEUN', 15, 15, 'Validations erronées des opérations', 'Correction des opérations erronées validées', 35, 30, '2025-06-13 08:34:37', '2025-06-13 08:34:37'),
(2, '2023-01-01', '2023-01-31', 'STRA_RIA', 20, 15, 'Erreurs de validation des opérations', 'Revue et correction des opérations erronées validées', 35, 30, '2025-06-13 08:34:37', '2025-06-13 08:34:37');

-- --------------------------------------------------------

--
-- Structure de la table `risques_stras`
--

CREATE TABLE `risques_stras` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `nb_risque` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `risques_stras`
--

INSERT INTO `risques_stras` (`id`, `debut_periode`, `fin_periode`, `nb_risque`, `created_at`, `updated_at`) VALUES
(6, '2023-01-01', '2023-01-31', 2, '2025-06-08 20:55:10', '2025-06-08 20:55:10'),
(7, '2025-06-17', '2025-06-17', 1, '2025-06-17 10:44:04', '2025-06-17 10:44:04'),
(8, '2025-06-17', '2025-06-17', 1, '2025-06-17 10:44:17', '2025-06-17 10:44:17'),
(9, '2025-06-17', '2025-06-17', 1, '2025-06-17 10:44:23', '2025-06-17 10:44:23');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `code`, `libelle`) VALUES
(1, 'STRA_MOGR', ''),
(2, 'STRA_RAPTR', '');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AhXPqjFRMdNfw6hmMgXIcpRSYMXKYzjhNyKAWbaS', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRXVIdTc4QmVPTHdXbTFNMkg3N09NQlR2T0NhTWxEc2s0TG9xMXBwcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9yZXBvcnRpbmcubG9jYWwvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1750355109),
('esRZtO2MgNeFGCXxhtiS0ARMyQCV5heWpZtSm0vW', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiclhybDRwdGxWb0lkVURCT1UxbENoQlpkTzFCeVNGWjJwMVhIbE5SaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9yZXBvcnRpbmcubG9jYWwvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1750352780);

-- --------------------------------------------------------

--
-- Structure de la table `tarification_cheque_cartes`
--

CREATE TABLE `tarification_cheque_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coutminimum` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tarification_cheque_cartes`
--

INSERT INTO `tarification_cheque_cartes` (`id`, `debut_periode`, `fin_periode`, `type`, `code`, `coutminimum`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'carte', 'UTLCARTE_1', 10, '2025-06-04 21:12:06', '2025-06-04 21:12:06'),
(2, '2023-01-01', '2023-06-30', 'carte', 'UTLCARTE_4', 62, '2025-06-04 21:12:06', '2025-06-04 21:12:06'),
(3, '2023-01-01', '2023-06-30', 'carte', 'UTLCARTE_2', 20, '2025-06-04 21:12:06', '2025-06-04 21:12:06'),
(4, '2023-01-01', '2023-06-30', 'carte', 'UTLCARTE_3', 21, '2025-06-04 21:12:06', '2025-06-04 21:12:06'),
(5, '2023-01-01', '2023-06-30', 'carte', 'UTLCARTE_5', 85, '2025-06-04 21:12:06', '2025-06-04 21:12:06'),
(6, '2023-01-01', '2023-06-30', 'cheque', 'UTLCHEQUE_1', 40, '2025-06-04 21:12:06', '2025-06-04 21:12:06'),
(7, '2023-01-01', '2023-06-30', 'cheque', 'UTLCHEQUE_2', 45, '2025-06-04 21:12:06', '2025-06-04 21:12:06');

-- --------------------------------------------------------

--
-- Structure de la table `type_cartes`
--

CREATE TABLE `type_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_cartes`
--

INSERT INTO `type_cartes` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'FCARTE_1_T2', 'Cartes adossées à un compte épargne', NULL, NULL),
(3, 'FCARTE_3_T2', 'Cartes Mastercard', NULL, NULL),
(7, 'FCARTE_1_T1', ' Cartes adossées à un compte courant', NULL, NULL),
(8, 'FCARTE_2_T1', 'Cartes adossées à un compte de monnaie électronique', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_risque_stras`
--

CREATE TABLE `type_risque_stras` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_risque_stras`
--

INSERT INTO `type_risque_stras` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'FRIS_3_RIS_4', 'Manque de régulateur', NULL, NULL),
(2, 'FRIS_1_RIS_3', 'Risque système non mis à jour', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `typologie_cheques`
--

CREATE TABLE `typologie_cheques` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbcheque` int NOT NULL,
  `totalcheque` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `typologie_cheques`
--

INSERT INTO `typologie_cheques` (`id`, `debut_periode`, `fin_periode`, `code`, `description`, `nbcheque`, `totalcheque`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'TCHEQUE_1', 'Chèque barré', 2, 49, '2025-06-04 21:28:36', '2025-06-04 21:28:36'),
(2, '2023-01-01', '2023-06-30', 'TCHEQUE_4', 'Chèque certifié', 20, 49, '2025-06-04 21:28:36', '2025-06-04 21:28:36'),
(3, '2023-01-01', '2023-06-30', 'TCHEQUE_3', 'Chèque avalisé', 27, 49, '2025-06-04 21:28:36', '2025-06-04 21:28:36');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'OSCAR', 'oscarfolitse@gmail.com', NULL, '$2y$12$ntOQq6XBZqG1.o49eBynS.3XzdRt0/sGs4iULkzJFCOfwrpzbAdRO', NULL, '2025-06-02 13:05:30', '2025-06-18 13:11:21', 'user'),
(2, 'M. Gilbert', 'gilbert.afantohou@gmail.com', NULL, '$2y$12$w4wG.9C72pTJMX5a2XTS0.8YkNlXnHxaKklVP59whXr7yDTTquDwy', NULL, '2025-06-18 13:19:56', '2025-06-18 14:30:04', 'admin'),
(5, 'Jonh Doe', 'jonh@gmail.com', NULL, '$2y$12$Ucir6EQI1hr8aJux3Lvil.wfklyrln5t2925yuVx9urARO7cB0Cx6', NULL, '2025-06-19 16:07:29', '2025-06-19 16:07:29', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `utilisation_cartes`
--

CREATE TABLE `utilisation_cartes` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbcarte` int NOT NULL,
  `valeurcfa` bigint NOT NULL,
  `totalnbcarte` int NOT NULL,
  `totalvaleurcfa` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisation_cartes`
--

INSERT INTO `utilisation_cartes` (`id`, `debut_periode`, `fin_periode`, `code`, `description`, `nbcarte`, `valeurcfa`, `totalnbcarte`, `totalvaleurcfa`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'UTLCARTE_1', 'Retraits effectués par nos clients sur nos GAB/DAB', 50, 250000, 200, 450000, '2025-06-04 21:49:44', '2025-06-04 21:49:44'),
(2, '2023-01-01', '2023-06-30', 'UTLCARTE_3', 'Dépôts d\'espèces sur nos GAB/DAB', 145, 50000, 200, 450000, '2025-06-04 21:49:44', '2025-06-04 21:49:44'),
(3, '2023-01-01', '2023-06-30', 'UTLCARTE_5', 'Paiement via les TPE', 5, 150000, 200, 450000, '2025-06-04 21:49:44', '2025-06-04 21:49:44');

-- --------------------------------------------------------

--
-- Structure de la table `utilisation_cheques`
--

CREATE TABLE `utilisation_cheques` (
  `id` bigint UNSIGNED NOT NULL,
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbcheque` int NOT NULL,
  `valeurcfa` bigint NOT NULL,
  `totalnbcheque` int NOT NULL,
  `totalvaleurcfa` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisation_cheques`
--

INSERT INTO `utilisation_cheques` (`id`, `debut_periode`, `fin_periode`, `code`, `description`, `nbcheque`, `valeurcfa`, `totalnbcheque`, `totalvaleurcfa`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', '2023-06-30', 'UTLCHEQUE_1', 'Chèques encaissés au guichet', 5, 70000, 14, 500000, '2025-06-04 21:55:40', '2025-06-04 21:55:40'),
(2, '2023-01-01', '2023-06-30', 'UTLCHEQUE_3', 'Chèques reçus à la compensation', 5, 30000, 14, 500000, '2025-06-04 21:55:40', '2025-06-04 21:55:40'),
(3, '2023-01-01', '2023-06-30', 'UTLCHEQUE_2', 'Chèques présentés à la compensation', 4, 400000, 14, 500000, '2025-06-04 21:55:40', '2025-06-04 21:55:40');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acquisition_cartes`
--
ALTER TABLE `acquisition_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annuaires_stras`
--
ALTER TABLE `annuaires_stras`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annuaire_services`
--
ALTER TABLE `annuaire_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annuaire_services_annuaire_stra_id_foreign` (`annuaire_stra_id`);

--
-- Index pour la table `annuaire_transactions`
--
ALTER TABLE `annuaire_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annuaire_transactions_annuaire_service_id_foreign` (`annuaire_service_id`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `details_risques_stras`
--
ALTER TABLE `details_risques_stras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `details_risques_stras_risque_stra_id_foreign` (`risque_stra_id`);

--
-- Index pour la table `ecosystemes`
--
ALTER TABLE `ecosystemes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emission_cartes`
--
ALTER TABLE `emission_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `famille_cartes`
--
ALTER TABLE `famille_cartes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `famille_cartes_code_unique` (`code`);

--
-- Index pour la table `famille_cheques`
--
ALTER TABLE `famille_cheques`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `famille_cheques_code_unique` (`code`);

--
-- Index pour la table `famille_cheque_cartes`
--
ALTER TABLE `famille_cheque_cartes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `famille_cheque_cartes_code_unique` (`code`);

--
-- Index pour la table `fraudestras`
--
ALTER TABLE `fraudestras`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fraude_cheque_cartes`
--
ALTER TABLE `fraude_cheque_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `incident_cheque_cartes`
--
ALTER TABLE `incident_cheque_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `incident_paiement_cartes`
--
ALTER TABLE `incident_paiement_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `incident_paiement_cheques`
--
ALTER TABLE `incident_paiement_cheques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `incident_stras`
--
ALTER TABLE `incident_stras`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modes_envoi`
--
ALTER TABLE `modes_envoi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modes_envoi_code_unique` (`code`);

--
-- Index pour la table `modes_reception`
--
ALTER TABLE `modes_reception`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modes_reception_code_unique` (`code`);

--
-- Index pour la table `operationstras`
--
ALTER TABLE `operationstras`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `reclamation_cheque_cartes`
--
ALTER TABLE `reclamation_cheque_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reclamation_stras`
--
ALTER TABLE `reclamation_stras`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `risques_stras`
--
ALTER TABLE `risques_stras`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_code_unique` (`code`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `tarification_cheque_cartes`
--
ALTER TABLE `tarification_cheque_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_cartes`
--
ALTER TABLE `type_cartes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_cartes_code_unique` (`code`);

--
-- Index pour la table `type_risque_stras`
--
ALTER TABLE `type_risque_stras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_risque_stras_code_unique` (`code`);

--
-- Index pour la table `typologie_cheques`
--
ALTER TABLE `typologie_cheques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `utilisation_cartes`
--
ALTER TABLE `utilisation_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisation_cheques`
--
ALTER TABLE `utilisation_cheques`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acquisition_cartes`
--
ALTER TABLE `acquisition_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `annuaires_stras`
--
ALTER TABLE `annuaires_stras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `annuaire_services`
--
ALTER TABLE `annuaire_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `annuaire_transactions`
--
ALTER TABLE `annuaire_transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `details_risques_stras`
--
ALTER TABLE `details_risques_stras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `ecosystemes`
--
ALTER TABLE `ecosystemes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `emission_cartes`
--
ALTER TABLE `emission_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `famille_cartes`
--
ALTER TABLE `famille_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT pour la table `famille_cheques`
--
ALTER TABLE `famille_cheques`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `famille_cheque_cartes`
--
ALTER TABLE `famille_cheque_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `fraudestras`
--
ALTER TABLE `fraudestras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `fraude_cheque_cartes`
--
ALTER TABLE `fraude_cheque_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `incident_cheque_cartes`
--
ALTER TABLE `incident_cheque_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `incident_paiement_cartes`
--
ALTER TABLE `incident_paiement_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `incident_paiement_cheques`
--
ALTER TABLE `incident_paiement_cheques`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `incident_stras`
--
ALTER TABLE `incident_stras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `modes_envoi`
--
ALTER TABLE `modes_envoi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `modes_reception`
--
ALTER TABLE `modes_reception`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `operationstras`
--
ALTER TABLE `operationstras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `reclamation_cheque_cartes`
--
ALTER TABLE `reclamation_cheque_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reclamation_stras`
--
ALTER TABLE `reclamation_stras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `risques_stras`
--
ALTER TABLE `risques_stras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tarification_cheque_cartes`
--
ALTER TABLE `tarification_cheque_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `type_cartes`
--
ALTER TABLE `type_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `type_risque_stras`
--
ALTER TABLE `type_risque_stras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `typologie_cheques`
--
ALTER TABLE `typologie_cheques`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisation_cartes`
--
ALTER TABLE `utilisation_cartes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisation_cheques`
--
ALTER TABLE `utilisation_cheques`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annuaire_services`
--
ALTER TABLE `annuaire_services`
  ADD CONSTRAINT `annuaire_services_annuaire_stra_id_foreign` FOREIGN KEY (`annuaire_stra_id`) REFERENCES `annuaires_stras` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `annuaire_transactions`
--
ALTER TABLE `annuaire_transactions`
  ADD CONSTRAINT `annuaire_transactions_annuaire_service_id_foreign` FOREIGN KEY (`annuaire_service_id`) REFERENCES `annuaire_services` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `details_risques_stras`
--
ALTER TABLE `details_risques_stras`
  ADD CONSTRAINT `details_risques_stras_risque_stra_id_foreign` FOREIGN KEY (`risque_stra_id`) REFERENCES `risques_stras` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
