-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2025 at 05:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `actors` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `movie_id`, `actors`) VALUES
(1, 1, 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page, Cillian Murphy'),
(2, 2, 'Christian Bale, Heath Ledger, Morgan Freeman, Aaron Eckhart, Tempest'),
(3, 3, 'Leonardo DiCaprio, Kate Winslet, Billy Zane, Kathy Bates, Frances Fisher'),
(4, 4, 'Robert Downey Jr., Chris Evans, Scarlett Johansson, Mark Ruffalo, Jeremy Renner'),
(5, 5, 'Tom Hanks, Robin Wright, Sally Field'),
(6, 6, 'Keanu Reeves, Carrie-Anne Moss, Laurence Fishburne, Hugo Weaving'),
(7, 7, 'Idina Menzel, Kristen Bell, Josh Gad, Jonathan Groff'),
(8, 8, 'Chloe Grace Moretz, Jason Marsden, Suzanne Pleshette, David Ogden Stiers'),
(9, 9, 'James Earl Jones, Matthew Broderick, Jeremy Irons, Whoopi Goldberg'),
(10, 10, 'Jeff Goldblum, Sam Neill, Laura Dern, Richard Attenborough, BD Wong'),
(11, 11, 'Batman');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `description` text NOT NULL,
  `img_url` varchar(254) NOT NULL,
  `genre` varchar(254) NOT NULL,
  `ticket` int(11) NOT NULL,
  `day_film` date NOT NULL,
  `time_film` time(6) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `description`, `img_url`, `genre`, `ticket`, `day_film`, `time_film`, `status`) VALUES
(1, 'Inception', 'A thief who steals corporate secrets through dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.', 'images/movies/inception.jpg', 'Sci-Fi', 92, '2025-02-10', '18:00:00.000000', 1),
(2, 'The Dark Knight 2', 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.', 'images/movies/dark_knight.jpg', 'Action', 112, '2025-03-15', '14:00:00.000000', 1),
(3, 'Titanic', 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.', 'images/movies/titanic.jpg', 'Romance', 76, '2025-04-10', '17:00:00.000000', 1),
(4, 'Avengers: Endgame', 'The Avengers assemble once more to reverse Thanos\' actions and restore balance to the universe.', 'images/movies/avengers_endgame.jpg', 'Superhero', 150, '2025-05-20', '19:00:00.000000', 1),
(5, 'Forrest Gump', 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other history unfold through the perspective of an Alabama man with an IQ of 75.', 'images/movies/forrest_gump.jpg', 'Drama', 110, '2025-06-12', '18:30:00.000000', 0),
(6, 'The Matrix', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', 'images/movies/matrix.jpg', 'Action', 95, '2025-07-18', '20:00:00.000000', 1),
(7, 'Frozen', 'When their kingdom becomes trapped in eternal winter, two sisters embark on a quest to break the icy spell.', 'images/movies/frozen.jpg', 'Animation', 80, '2025-08-25', '16:30:00.000000', 0),
(8, 'Spirited Away', 'During her familys journey to the countryside, a young girl wanders into a world ruled by gods, witches, and spirits.', 'images/movies/spirited_away.jpg', 'Fantasy', 85, '2025-09-05', '15:00:00.000000', 1),
(9, 'The Lion King', 'A young lion prince is cast out of his pride by his cruel uncle, who claims he killed his father. He grows up thinking he’s just another ordinary lion.', 'images/movies/lion_king.jpg', 'Animation', 70, '2025-10-01', '19:30:00.000000', 1),
(10, 'Jurassic Park', 'During a preview tour, a theme park suffers a major power breakdown that allows its cloned dinosaur exhibits to run amok.', 'images/movies/jurassic_park.jpg', 'Adventure', 123, '2025-11-18', '21:00:00.000000', 1),
(11, 'Demon Slayer: Kimetsu no Yaiba', 'Demon Slayer: Kimetsu no Yaiba is a Japanese manga series written and illustrated by Koyoharu Gotouge. It was serialized in Shueisha\'s shōnen manga magazine Weekly Shōnen Jump from February 2016 to May 2020, with its chapters collected in 23 tankōbon volumes.', 'images/movies/1736689798.jpg', 'Shonen manga, Dark fantasy, Action manga, Fantasy', 100, '2025-01-13', '09:47:00.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `number_of_tickets` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `customer_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date_purchased` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `payment_type` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `movie_id`, `number_of_tickets`, `status`, `customer_id`, `total_price`, `date_purchased`, `payment_type`) VALUES
(25, 2, 3, 1, 1, 345, '2025-01-13 22:04:46.628987', 'paypal'),
(26, 3, 3, 1, 1, 237, '2025-01-13 22:06:46.982012', 'google_pay');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(254) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Blanc', 'blanc@gmail.com', NULL, '$2y$10$TFyRp3KUnpsSP880zfLiz.7WCml1TaIteWcXD2nc7.zK87kX5VrCO', NULL, '2025-01-11 23:14:14', '2025-01-11 23:14:14', 'customer'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$g/obEUtg9E8ttkBtQXm8KubIAA9KNEn2xZ.u9.0fFlA861HGvfOEi', NULL, '2025-01-12 04:22:58', '2025-01-12 04:22:58', 'admin'),
(3, 'Enen', 'enen@gmail.com', NULL, '$2y$10$TlUUaDBv9Lyk99S81q95NueKymQjnlj4yyvsAnnVMlc6ypWcZqfoy', NULL, '2025-01-13 06:27:33', '2025-01-13 06:27:33', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
