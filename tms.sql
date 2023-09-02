-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2022 at 10:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `variable` varchar(256) NOT NULL,
  `value` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`variable`, `value`) VALUES
('dir_home', 'http://127.0.0.1/my_projects/task-management-system/'),
('home', 'http://127.0.0.1/my_projects/task-management-system/'),
('last_task_id', '7801');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `slno` int(255) NOT NULL,
  `taskid` int(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `task_date` date NOT NULL,
  `task_time` time NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`slno`, `taskid`, `userid`, `title`, `description`, `task_date`, `task_time`, `is_completed`, `created_on`) VALUES
(2, 3721, 'sazad876', 'Freemium Travel Theme ', 'This freemium travel theme can be used by agencies, tour operators, and other travel businesses to showcase their packages, services, and tours. The modern appearance is easy to navigate and lets you organize your content into aesthetically-pleasing sections and pages. Travel Master also provides you with an easy-to-use demo import tool.', '2022-07-23', '00:21:17', 1, '2022-07-22 19:53:03'),
(1, 5673, 'admin', 'Freemium Travel Theme 1', 'This freemium travel theme can be used by agencies, tour operators, and other travel businesses to showcase their packages, services, and tours. The modern appearance is easy to navigate and lets you organize your content into aesthetically-pleasing sections and pages. Travel Master also provides you with an easy-to-use demo import tool.\r\nThis freemium travel theme can be used by agencies, tour operators, and other travel businesses to showcase their packages, services, and tours. The modern appearance is easy to navigate and lets you organize your content into aesthetically-pleasing sections and pages. Travel Master also provides you with an easy-to-use demo import tool.', '2022-07-23', '01:21:17', 1, '2022-07-22 19:53:03'),
(3, 7798, 'admin', 'Freemium Travel Theme 3', 'This freemium travel theme can be used by agencies, tour operators, and other travel businesses to showcase their packages, services, and tours. The modern appearance is easy to navigate and lets you organize your content into aesthetically-pleasing sections and pages. Travel Master also provides you with an easy-to-use demo import tool.\r\nThis freemium travel theme can be used by agencies, tour operators, and other travel businesses to showcase their packages, services, and tours. The modern appearance is easy to navigate and lets you organize your content into aesthetically-pleasing sections and pages. Travel Master also provides you with an easy-to-use demo import tool.', '2022-07-23', '01:21:17', 1, '2022-07-22 19:53:03'),
(5, 7799, 'sazad876', 'Fix Ib Vijayin Issues', 'Need to redeploy the whole code base of Ib Vijayin(both frontend and backend) to the onohosting server.', '2022-07-24', '19:46:00', 0, '2022-07-24 13:27:45'),
(6, 7800, 'sazad876', 'Contact Graphics maker', 'Contact Graphics maker for matrushaktiholidays.com logo. Selected logo must have colour highlighting and should have a Jagganath Mandir in it. Find the extra cost for the logo making and contact matrushaktiholidays.com for the feasible price.', '2022-07-25', '10:45:00', 1, '2022-07-24 13:35:41'),
(8, 7801, 'sazad876', 'test1', 'test1 test1', '2022-07-24', '08:10:00', 1, '2022-07-25 02:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `no_of_logins` int(255) NOT NULL DEFAULT 0,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `full_name`, `email`, `password`, `last_login`, `no_of_logins`, `created_on`) VALUES
('admin', 'Admin', 'admin@admin.com', '^^V)Ha7AtbBC9^rRD%', '2022-07-22 20:21:22', 6, '2022-07-22 19:58:10'),
('sazad876', 'Sazad Ahemad', 'mail2sazad@gmail.com', '123456', '2022-08-21 08:12:14', 3, '2022-07-22 19:45:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`variable`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskid`),
  ADD UNIQUE KEY `slno` (`slno`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `slno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
