-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 03:55 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panda_resort`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fathers_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_persons` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(8,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `total` decimal(8,2) NOT NULL DEFAULT '0.00',
  `advance_received` decimal(8,2) NOT NULL DEFAULT '0.00',
  `balance_total` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `check_in_date`, `check_out_date`, `full_name`, `fathers_name`, `mobile_number`, `email`, `vehicle_number`, `cnic`, `room_number`, `number_of_persons`, `address`, `description`, `purpose`, `payment_amount`, `tax`, `discount`, `total`, `advance_received`, `balance_total`, `created_at`, `updated_at`) VALUES
(1, '2020-02-01', '2020-02-19', 'Shakir Rasool Bhat', 'Gh Rasool Bhatt', '7889684429', 'shakir@gmail.com', '12313', '14111', '1', 2, 'Delhi', 'Delhi Delhi', 'Delhi', '100.00', '1.00', '10.00', '91.00', '91.00', '0.00', '2020-01-31 18:30:00', '2020-02-03 18:03:12'),
(2, '2020-02-01', '2020-02-19', 'Shakir Rasool Bhat', 'Gh Rasool Bhatt', '7889684429', 'shakir@gmail.com', '12313', '14111', '2222', 2, 'Delhi', 'Delhi Delhi', 'Delhi', '100.00', '1.00', '10.00', '91.00', '91.00', '0.00', '2020-01-31 18:30:00', '2020-01-31 18:30:00'),
(3, '2020-02-02', '2020-02-03', 'Umar Khan', 'Mohammad Shakeel Khan', '9149773448', 'umar.khan@gmail.com', '445434', '1212', '202', 2, 'Bangalore', 'Bangalore Oam shakti Layout', 'Bangalore Oam shakti Layout', '100.00', '12.00', '10.00', '102.00', '102.00', '0.00', '2020-01-31 18:30:00', '2020-02-01 12:25:28'),
(5, '2020-02-19', '2020-02-27', 'Danish Majeed Mir', 'Abdul Majeed', '9419773548', 'danish@gmail.com', '3323', '123213', '12', 3, 'Srinagar', 'Srinagar', 'Srinagar', '100.00', '12.00', '12.00', '100.00', '999.00', '12.00', '2020-02-02 08:37:31', '2020-02-02 08:37:31'),
(6, '2020-02-02', '2020-02-12', 'Ahtisham Ahmad', 'Ahtisham Ahmad', '9900887766', 'Ahtisham@gmail.com', '3242335', '21333', '2222', 2, 'Delhi', 'Delhi Delhi', 'Delhi', '100.00', '10.00', '10.00', '100.00', '80.00', '20.00', '2020-02-02 09:31:24', '2020-02-02 09:31:24'),
(21, '2020-02-03', '2020-02-05', 'Sameer Khazir', 'Khazir Mohammad', '9988776655', 'Sameer.Khazir@gmail.com', '23234', '123213', 'ROOM-123', 4, 'Ladoora', 'Ladoora Ladoora', 'Ladoora', '100.00', '10.00', '10.00', '100.00', '90.00', '10.00', '2020-02-02 04:39:51', '2020-02-06 08:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `booking_other_members`
--

CREATE TABLE `booking_other_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_other_members`
--

INSERT INTO `booking_other_members` (`id`, `booking_id`, `name`, `mobile`, `cnic`, `created_at`, `updated_at`) VALUES
(22, 21, 'name-2', 'mobile-2', 'cnic-2', '2020-02-06 13:36:28', '2020-02-06 13:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_01_31_131519_create_bookings_table', 2),
(4, '2020_02_01_180708_create_booking_other_members_table', 3),
(5, '2020_02_02_104357_create_rooms_table', 4),
(6, '2020_02_03_071210_create_room_images_table', 4);

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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `number_of_people` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `room_type`, `room_price`, `number_of_people`, `created_at`, `updated_at`) VALUES
(1, 'ROOM-123', 'DULEX', '1000.00', 3, '2020-02-03 02:14:54', '2020-02-03 06:07:49'),
(2, 'ROOM-111', 'SUPER DULEX', '3000.00', 2, '2020-02-03 02:16:35', '2020-02-03 02:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`id`, `room_id`, `image`, `created_at`, `updated_at`) VALUES
(2, 1, 'images/room/1-room-image12.jpeg', '2020-02-03 07:44:54', '2020-02-03 08:18:40'),
(3, 2, 'images/room/2-room-image.jpeg', '2020-02-03 07:46:35', '2020-02-03 10:02:21'),
(4, 1, 'images/room/1-room-image2020-02-03-113431.jpeg', '2020-02-03 11:34:31', '2020-02-03 11:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'shakir', 'shakir@marmeto.com', '$2y$10$89OtwB5fIkEo2g9iYb9dEOPucHZNX3YJstr8yQRFjj9w3IrYIl2rO', NULL, NULL, '2020-01-30 18:30:00', '2020-01-30 18:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_other_members`
--
ALTER TABLE `booking_other_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_other_mombers_booking_id_foreign` (`booking_id`);

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
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_images_room_id_foreign` (`room_id`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `booking_other_members`
--
ALTER TABLE `booking_other_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_other_members`
--
ALTER TABLE `booking_other_members`
  ADD CONSTRAINT `booking_other_mombers_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `bookings` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
