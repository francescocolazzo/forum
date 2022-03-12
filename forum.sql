-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 12, 2022 alle 22:31
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `comments`
--

CREATE TABLE `comments` (
  `idComment` bigint(20) UNSIGNED NOT NULL,
  `idTopic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idUtente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `like` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `comments`
--

INSERT INTO `comments` (`idComment`, `idTopic`, `idUtente`, `commento`, `like`, `created_at`, `updated_at`) VALUES
(1, '3', '2', 'This situation is sad.', '1', '2022-03-09 22:09:03', NULL),
(2, '3', '1', 'Ucraina, monito degli Usa: c\'è il rischio che la Russia usi armi chimiche.', '1', '2022-03-10 06:10:30', NULL),
(3, '3', '2', 'Inconcepibile che vengano usata armi chimiche.', '1', '2022-03-10 06:10:30', NULL),
(4, '3', '1', 'La storia si ripete.', '1', '2022-03-10 06:10:30', NULL),
(5, '4', '1', 'ok', NULL, '2022-03-10 11:22:08', '2022-03-10 11:22:08'),
(6, '5', '1', 'occhio per occhio...', NULL, '2022-03-10 11:23:38', '2022-03-10 11:23:38'),
(12, '2', '1', 'La Nato prende tempo con l\'Ucraina.', NULL, '2022-03-10 12:31:49', '2022-03-10 12:31:49'),
(13, '2', '1', 'Ucraina wants to find a resolution to the conflict with Russia.', NULL, '2022-03-10 12:33:42', '2022-03-10 12:33:42'),
(14, '29', '1', 'Grillo si è dimesso.', NULL, '2022-03-11 15:07:43', '2022-03-11 15:07:43'),
(19, '29', '5', 'Grillo è ritornato.', NULL, '2022-03-11 15:20:41', '2022-03-11 15:20:41'),
(20, '29', '5', 'Grillo si candida come ministro.', NULL, '2022-03-11 18:58:46', '2022-03-11 18:58:46'),
(23, '26', '1', 'Okok', NULL, '2022-03-11 21:06:02', '2022-03-11 21:06:02'),
(24, '21', '4', 'Governo cadrà.', NULL, '2022-03-11 21:17:48', '2022-03-11 21:17:48'),
(25, '21', '4', 'Il governo non ha la maggioranza in parlamento.', NULL, '2022-03-11 21:22:41', '2022-03-11 21:22:41'),
(26, '32', '4', 'Tutto bene in italia.', NULL, '2022-03-12 10:42:40', '2022-03-12 10:42:40');

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_09_134028_create_users_table', 2),
(6, '2022_03_09_135627_create_users_table', 3),
(7, '2022_03_09_142218_create_users_table', 4),
(8, '2022_03_09_142800_create_topics_table', 5),
(9, '2022_03_09_143157_create_comments_table', 6),
(10, '2022_03_09_144001_create_users_table', 7),
(11, '2022_03_09_144024_create_topics_table', 7);

-- --------------------------------------------------------

--
-- Struttura della tabella `topics`
--

CREATE TABLE `topics` (
  `idTopic` bigint(20) UNSIGNED NOT NULL,
  `idUtente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titoloTopic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrizioneTopic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `topics`
--

INSERT INTO `topics` (`idTopic`, `idUtente`, `titoloTopic`, `descrizioneTopic`, `created_at`, `updated_at`) VALUES
(2, '2', 'Nato', 'What is NATO and why hasn\'t it imposed a no-fly zone in Ukraine', '2022-03-09 15:56:26', NULL),
(3, '1', 'SUPER LEAGUE', 'LEADING EUROPEAN FOOTBALL CLUBS ANNOUNCE NEW SUPER LEAGUE COMPETITION\r\nTwelve of Europe’s leading football clubs have today come together to announce they have agreed to establish a new mid-week competition, the Super League, governed by its Founding Club', '2022-03-09 15:56:26', NULL),
(4, '1', 'Milano', 'Milano, capitale mondiale della moda e del design, è una metropoli del Nord Italia ed è capoluogo della Lombardia. Sede della Borsa Italiana, è un polo finanziario famoso anche per i ristoranti e i negozi esclusivi. Il Duomo in stile gotico e il convento', '2022-03-10 12:27:08', '2022-03-10 12:27:08'),
(21, '1', 'Governo in bilico', 'Governo in bilico senza la maggioranza assoluta.', '2022-03-10 20:37:40', '2022-03-10 20:37:40'),
(26, '1', 'Ucraina', 'Lutsk attaccata nella notte: la città è a soli 100km dal confine polacco.  Dnipro sotto l\'Unione Sovietica era un importante centro di produzione di armi nuclear', '2022-03-11 05:28:43', '2022-03-11 05:28:43'),
(27, '1', 'Los Angeles Lakers', 'I Los Angeles Lakers sono una delle trenta squadre di pallacanestro che giocano nella NBA, il campionato professionistico degli Stati Uniti d\'America.', '2022-03-11 11:07:37', '2022-03-11 11:07:37'),
(31, '1', 'Fine dei cereali in italia', 'Niente più cereali in Italia.', '2022-03-11 20:01:14', '2022-03-11 20:01:14');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `idUtente` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominativo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`idUtente`, `username`, `nominativo`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'utente1', 'Utente1', 'utente@gmail.com', '$2y$10$ferAV1o9pWUgV42JluTBUeWX/T7IaMJBFn1ZNPmMDurdO9RbHwfH.', NULL, NULL),
(2, 'utente2', 'Utente2', 'utente2@gmail.com', '$2y$10$ferAV1o9pWUgV42JluTBUeWX/T7IaMJBFn1ZNPmMDurdO9RbHwfH.', NULL, NULL),
(4, 'GiuseppeGaribaldi', NULL, 'utente33@gmail.com', '$2y$10$ferAV1o9pWUgV42JluTBUeWX/T7IaMJBFn1ZNPmMDurdO9RbHwfH.', '2022-03-11 06:37:55', '2022-03-11 06:37:55'),
(5, 'De-lucis', NULL, 'delucis@gmail.com', '$2y$10$ferAV1o9pWUgV42JluTBUeWX/T7IaMJBFn1ZNPmMDurdO9RbHwfH.', '2022-03-11 15:02:03', '2022-03-11 15:02:03');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`idComment`);

--
-- Indici per le tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`idTopic`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUtente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `comments`
--
ALTER TABLE `comments`
  MODIFY `idComment` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT per la tabella `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `topics`
--
ALTER TABLE `topics`
  MODIFY `idTopic` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `idUtente` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
