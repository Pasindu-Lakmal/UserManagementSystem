-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 04:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_adress` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email_adress`, `password`, `last_login`, `is_deleted`) VALUES
(1, 'pasindu', 'lakmal', 'pasindu1lak@gmail.com', 'e3388ff7376f2979d18ecfa9a2f9f0f2c92db77b', '0000-00-00 00:00:00', 0),
(2, 'hasntha', 'chamika', 'paminduchamika@gmail.com', '05dff87b2fe108e1a55bc2c92e343dff3bde00ff', '0000-00-00 00:00:00', 0),
(8, 'lasindu', 'marapana', 'lasindumarapana@yahoo.com', '5179821c8aa6efae4ec4e76f9f76a456949dd631', '0000-00-00 00:00:00', 0),
(9, 'hasantha', 'hasntha', 'hasntha@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2022-01-12 07:41:01', 0),
(11, 'janru', 'nimatha', 'janrunimatha@yahoo.com', 'a82fc7bd8b681cd85ab6d81e327b8caa468f00ca', '0000-00-00 00:00:00', 0),
(12, 'wanhun', 'somapala', 'wanhunsomapala@yahoo.com', 'b1b5dab5cbc23b75bd5d52490e648504bf7efc94', '0000-00-00 00:00:00', 0),
(15, 'pasindu', 'lakmal', 'pasindulakmal@gmail.com', 'df989e4678a1fc14cce8f2b9a4caf793c6226a6f', '2022-01-14 19:26:47', 0),
(16, 'hasindu', 'lakmal', 'hasindu@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2022-01-12 07:41:29', 0),
(17, 'nipuni', 'anuththara', 'nipunianuththara@gmail.com', 'df989e4678a1fc14cce8f2b9a4caf793c6226a6f', '2022-01-10 15:18:22', 0),
(18, 'pasindu', 'lakmal', 'pasindu6lak@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0000-00-00 00:00:00', 0),
(19, 'nipuni', 'anuththra', 'nipuni@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2022-01-10 17:12:59', 0),
(20, 'pasindu', 'nipuni', 'pasindu@gmail.com', 'df989e4678a1fc14cce8f2b9a4caf793c6226a6f', '0000-00-00 00:00:00', 1),
(21, 'pasindu', 'mayakaduwa', 'pasindumayakaduwa@gmail.com', 'df989e4678a1fc14cce8f2b9a4caf793c6226a6f', '0000-00-00 00:00:00', 0),
(22, 'pasindu', 'lakmal2', 'pasindulakmal2@gmail.com', 'df989e4678a1fc14cce8f2b9a4caf793c6226a6f', '2022-03-28 13:00:57', 1),
(23, 'pasindu', 'lakmal3', 'pasindulakmal3@gmail.com', 'df989e4678a1fc14cce8f2b9a4caf793c6226a6f', '0000-00-00 00:00:00', 0),
(24, 'pasindu', 'lakmal4', 'pasindulakmal4@gmail.com', 'df989e4678a1fc14cce8f2b9a4caf793c6226a6f', '0000-00-00 00:00:00', 0),
(25, 'pasindu', 'lakmal5', 'pasindulakmal5@gmail.com', 'df989e4678a1fc14cce8f2b9a4caf793c6226a6f', '0000-00-00 00:00:00', 0),
(26, 'pasindu', 'lakmal6', 'pasindulakmal6@gmail.com', 'df989e4678a1fc14cce8f2b9a4caf793c6226a6f', '0000-00-00 00:00:00', 0),
(27, 'hasindu', 'lakshan', 'dog@gmail.com', 'df989e4678a1fc14cce8f2b9a4caf793c6226a6f', '0000-00-00 00:00:00', 0),
(28, 'kasun', 'saritha', 'CAT@GMAIL.COM', '0eae92fe173c0e8b3f6b5e05079e03bbab50b694', '0000-00-00 00:00:00', 0),
(29, 'nipun', 'anuththara', 'anuththra@yahoo.com', 'df989e4678a1fc14cce8f2b9a4caf793c6226a6f', '0000-00-00 00:00:00', 0),
(30, 'pasindu', 'anuththara', 'anuththara@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
