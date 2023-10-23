-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23. Okt, 2023 10:13 AM
-- Tjener-versjon: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingsystemdb`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `failed_jobs`
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
-- Tabellstruktur for tabell `message`
--

CREATE TABLE `message` (
                           `message_id` int(11) NOT NULL,
                           `sender` int(11) NOT NULL,
                           `reciver` int(11) NOT NULL,
                           `message` varchar(255) NOT NULL,
                           `time_stamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `migrations`
--

CREATE TABLE `migrations` (
                              `id` int(10) UNSIGNED NOT NULL,
                              `migration` varchar(255) NOT NULL,
                              `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
                                                          (1, '2014_10_12_000000_create_users_table', 1),
                                                          (2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
                                                          (3, '2019_08_19_000000_create_failed_jobs_table', 1),
                                                          (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
                                         `email` varchar(255) NOT NULL,
                                         `token` varchar(255) NOT NULL,
                                         `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `personal_access_tokens`
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
-- Tabellstruktur for tabell `students`
--

CREATE TABLE `students` (
                            `student_id` int(11) NOT NULL,
                            `first_name` varchar(50) NOT NULL,
                            `last_name` varchar(50) NOT NULL,
                            `email` varchar(200) NOT NULL,
                            `phone_number` varchar(200) NOT NULL,
                            `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dataark for tabell `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `email`, `phone_number`, `password`) VALUES
    (1, 'Cookie', 'Monster', 'Cookie@Monster.moc', '12345678', 'Test1234');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `time_slots`
--

CREATE TABLE `time_slots` (
                              `timeslot_id` int(11) NOT NULL,
                              `tutor_id` int(11) NOT NULL,
                              `date` date NOT NULL,
                              `start_time` time NOT NULL,
                              `end_time` time NOT NULL,
                              `location` varchar(255) NOT NULL,
                              `description` varchar(255) NOT NULL,
                              `booked_by` int(11) DEFAULT NULL,
                              `created_at` timestamp NULL DEFAULT NULL,
                              `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dataark for tabell `time_slots`
--

INSERT INTO `time_slots` (`timeslot_id`, `tutor_id`, `date`, `start_time`, `end_time`, `location`, `description`, `booked_by`, `created_at`, `updated_at`) VALUES
                                                                                                                                                               (1, 0, '2023-10-06', '09:00:00', '10:00:00', 'UIA', 'Hva som helst php relatert', 1, NULL, '2023-10-18 13:18:41'),
                                                                                                                                                               (2, 1, '2023-10-04', '11:00:00', '12:00:00', '48 113', 'Prosjekt', NULL, NULL, '2023-10-18 13:18:41'),
                                                                                                                                                               (5, 0, '2023-10-12', '10:00:00', '11:00:00', 'B1 002', 'Prosjekt veildening', NULL, NULL, '2023-10-18 13:18:41'),
                                                                                                                                                               (6, 1, '2023-10-19', '15:00:00', '16:00:00', 'B2 016', 'AWDAE', NULL, '2023-10-18 10:56:40', '2023-10-18 13:18:41'),
                                                                                                                                                               (7, 1, '2023-10-16', '09:00:00', '10:00:00', '48 007a', 'JAVASCRIPT', 1, '2023-10-18 11:01:07', '2023-10-19 09:56:54'),
                                                                                                                                                               (8, 1, '2023-10-17', '10:00:00', '11:00:00', '50 116e', 'CSS', 1, '2023-10-18 11:04:28', '2023-10-18 11:19:30'),
                                                                                                                                                               (9, 1, '2023-10-20', '12:00:00', '01:00:00', '48 115', 'JQUERY', NULL, '2023-10-18 11:19:23', '2023-10-19 09:55:52'),
                                                                                                                                                               (10, 1, '2023-10-13', '11:00:00', '12:00:00', 'uia', 'hgdfsdxfnm', NULL, '2023-10-19 07:19:12', '2023-10-19 07:19:12');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `users`
--

CREATE TABLE `users` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `email_verified_at` timestamp NULL DEFAULT NULL,
                         `password` varchar(255) NOT NULL,
                         `phone_number` varchar(200) NOT NULL,
                         `remember_token` varchar(100) DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone_number`, `remember_token`, `created_at`, `updated_at`) VALUES
                                                                                                                                               (1, '', '', NULL, '', '', NULL, NULL, NULL),
                                                                                                                                               (2, 'Cookie Monster', 'cookiemonster@sesam.og', NULL, '$2y$10$pERuBwiJLIOxjEwJe3YlpOtl2yOmVy59MS/a20oBe61lT3foWhOFi', '12345678', NULL, '2023-10-23 06:12:27', '2023-10-23 06:12:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
    ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
    ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
    ADD PRIMARY KEY (`timeslot_id`),
  ADD KEY `booked_by` (`booked_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
    MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
    MODIFY `timeslot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `time_slots`
--
ALTER TABLE `time_slots`
    ADD CONSTRAINT `time_slots_ibfk_1` FOREIGN KEY (`booked_by`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `time_slots_ibfk_2` FOREIGN KEY (`booked_by`) REFERENCES `students` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
