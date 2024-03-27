-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 07:23 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmc_online_quotation`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_quotation`
--

CREATE TABLE `comment_quotation` (
  `id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_line_1` text NOT NULL,
  `address_line_2` text NOT NULL,
  `city` text NOT NULL,
  `province` text NOT NULL,
  `tel_no` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `address_line_1`, `address_line_2`, `city`, `province`, `tel_no`, `mobile_no`, `isActive`, `created_at`, `updated_at`) VALUES
(3, 'Mooney Graves Traders', 'tapagywew@mailinator.com', '774 North Cowley Boulevard', 'Consectetur est nesc', 'Officiis non vel do ', 'Dolores ab consequat', '', '', 0, '2024-02-23 03:30:39', '2024-02-23 05:25:50'),
(5, 'Progressive Medical Corporation', 'info@pmc.ph', '200 C. Raymundo Avenue Caniogan', '', 'Pasig', 'Metro Manila', '+63 (2) 8656 6888', '+63 (969) 3156888', 1, '2024-02-23 04:39:38', '2024-02-23 05:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address_line_1` text NOT NULL,
  `address_line_2` text DEFAULT NULL,
  `city` text NOT NULL,
  `province` text NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `file_quotation`
--

CREATE TABLE `file_quotation` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `quotation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_quotation`
--

CREATE TABLE `product_quotation` (
  `id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `uom` varchar(255) NOT NULL,
  `comparative_price` varchar(255) NOT NULL,
  `catalog_price` text NOT NULL,
  `proposed_price` varchar(255) NOT NULL,
  `wo_scd_price` varchar(255) NOT NULL,
  `applied_discount` varchar(255) NOT NULL,
  `approved_price` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL,
  `control_no` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `validity` int(11) NOT NULL,
  `delivery` text NOT NULL,
  `term_id` int(11) DEFAULT NULL,
  `vat` text NOT NULL,
  `remarks` text NOT NULL,
  `region` varchar(255) NOT NULL,
  `needed_at` timestamp NULL DEFAULT NULL,
  `released_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_status`
--

CREATE TABLE `quotation_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation_status`
--

INSERT INTO `quotation_status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'pending', '2024-02-16 02:58:21', NULL),
(2, 'approved', '2024-02-16 02:58:21', NULL),
(3, 'disapproved', '2024-02-16 02:58:21', NULL),
(4, 'initially approved', '2024-02-16 02:58:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`) VALUES
(1, 'Provincial'),
(2, 'Metro Manila');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'sales', '2023-12-12 02:55:57', NULL),
(2, 'admin', '2023-12-12 02:55:57', '2023-12-20 07:10:26'),
(4, 'Sales manager', '2024-01-05 07:17:49', NULL),
(6, 'General Manager', '2024-02-23 06:20:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `address`, `region_id`, `manager_id`) VALUES
(1, 'E-Jhay\'s Team', 'Zone 4 Dacap Sur, Bani, Pangasinan, 2407', NULL, 2),
(2, 'Neil\'s Team', 'Sample Address', NULL, 6),
(3, 'Haidee\'s Team', '200 C Reymundo Ave. Brgy Caniogan Pasig City', NULL, 8),
(4, 'Charie\'s Team', '200 C Reymundo Ave. Brgy Caniogan Pasig City', NULL, 11),
(5, 'Mary Ann\'s Team', '200 C Reymundo Ave. Brgy Caniogan Pasig City', NULL, 13),
(6, 'Stella\'s Team', '200 C Reymundo Ave. Brgy Caniogan Pasig City', NULL, 17),
(7, 'Melissa\'s Team', '200 C Reymundo Ave. Brgy Caniogan Pasig City', NULL, 19);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'COD', '2024-02-22 03:21:38', NULL),
(4, '15 days', '2024-02-22 03:40:26', NULL),
(5, '30 days', '2024-02-27 06:57:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `address`, `phone`, `email`, `password`, `role_id`, `team_id`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Sample Address', '09789456123', 'admin@gmail.com', '$2y$10$kHFjnzCgNS/CfD3yvo0zLeTo/0T/Q7nKnoaGM/iFFzZduA3aiXaUG', 2, NULL, '2024-02-20 17:09:13', '2024-02-28 20:54:00'),
(2, 'E-Jhay Manager', 'Sample Address', '09789456123', 'bumacodejhay@gmail.com', '$2y$10$sGcCBo9O4GXbzIu/opZDbOBQLECgK16c/cMxTeBKrmfyPez3fzeEu', 4, NULL, '2024-02-20 17:27:02', '2024-03-14 07:24:26'),
(3, 'E-Jhay Sales', 'Sample Address', '09122960911', 'evbumacod@pmcgroup.com', '$2y$10$xmwRr4dGPGmWdmm1YormHONHYvnMVvszOHTw1kxMd1cKC81ZZAFmi', 1, 1, '2024-02-20 17:28:01', '2024-03-13 10:15:28'),
(4, 'Susan T. Panugayan', '200 C Reymundo Ave. Brgy Caniogan Pasig CIty', '09209040510', 'susan.panugayan@pmc.ph', '$2y$10$dbNhd.hYQsPDpoAaN/dx9eRAeCeayVlJTDWpSNw9q995bE5kTqthG', 6, NULL, '2024-02-22 22:20:24', '2024-03-04 07:21:03'),
(5, 'Neil De Guzman', '29/F Antel Global Corporate Center No.3 Doña Julia Vargas Ave. Ortigas Center, Pasig City 1605 Philippines', '09669611540', 'ndguzman@pmcgroup.com', '$2y$10$DeUUWBdA7jjC/RR/Zz5LXu3DJBv/FZkbfznQ8UjoKh09eU/V0ONDy', 2, NULL, '2024-02-26 22:52:32', '2024-03-04 08:38:43'),
(6, 'Haidee Liza Aquino', '200 C Reymundo AVe. Brgy Caniogan Pasig City', '09052404026', 'Haidee.aquino@pmc.ph', '$2y$10$GR7yD6jEotqIcqSmv8SBKOA4.22RFg5tS55mm3lUezwTn2kyeqiz6', 4, NULL, '2024-03-03 18:40:51', NULL),
(7, 'Aizel Jhane Urriza', '200 C Reymundo Ave. Brgy Caniogan Pasig City', '09389392041', 'Aizel.urriza@pmc.ph', '$2y$10$HQoiqrvRkCjZ5kAamSm4zuTePo8wzCNEox0jWkckX2ewTU29s95ta', 1, 3, '2024-03-03 18:46:07', NULL),
(8, 'Jericho M. Labingpuno', '200 C Reymundo Ave. Brgy Caniogan Pasig City', '09458748631', 'jericho.labingpuno@pmc.ph', '$2y$10$c3sbrchhrCCVPMbTfLCsX.JHfQ2ejfOSn5MsgItCK4oTxegmx7kVC', 1, 4, '2024-03-03 23:21:06', '2024-03-04 12:24:13'),
(9, 'Ma. Charie Amor J. Cereno', '200 C Reymundo Ave. Brgy Caniogan Pasig City', '09328744675', 'charie.cereno@pmc.ph', '$2y$10$/fSO2Gg5TmujcUm6NCH0ZOhP7TawpZd08ooRkC/O/e1kKGP4OlCMC', 4, NULL, '2024-03-03 23:23:32', NULL),
(10, 'Cristina Gastalla', '200 C Reymundo Ave. Brgy Caniogan Pasig City', '09600164993', 'cristina.gastalla@pmc.ph', '$2y$10$yCHTAQOhCiui5KoSSZiDTerw4PLQUghmMzHzzZPh8lo.GUSDAI6Km', 1, 4, '2024-03-03 23:30:47', NULL),
(11, 'Mary Ann D. Pascual', '200 C Reymundo Ave. Brgy Caniogan Pasig City', '09228691615', 'maryann.domingo@pmc.ph', '$2y$10$QSbetk1Q6NR6QsYE93J2POwaFh9RvsT1yRu1BkQaSpVDtsSVt0dGO', 4, NULL, '2024-03-03 23:50:07', '2024-03-14 07:18:28'),
(12, 'Aiamae Luciapao', '200 C Reymundo Ave. Brgy Caniogan Pasig City', '09260857381', 'aiamae.luciapao@pmc.ph', '$2y$10$HCWsYdBiAg5PhO1XtzCrUuU2FPg0lkzZ1.xhsKW.Mon.4k11NDkL2', 1, 3, '2024-03-04 00:19:56', NULL),
(13, 'Michelle Dela Cruz Tamayo', '200 C Reymundo Ave. Brgy Caniogan Pasig City', '09267345277', 'michelle.tamayo@pmc.ph', '$2y$10$zr96AEc2uBYSUAYB.e.8VOpi8pa0x8P2Ot9viEolItkPMheTl25Ze', 1, 3, '2024-03-05 16:58:37', '2024-03-11 08:39:26'),
(14, 'Richie Bacongco ', '200 C Reymundo Ave. Brgy Caniogan Pasig City', '09273091545', 'richie.bacongco@pmc.ph', '$2y$10$QSbetk1Q6NR6QsYE93J2POwaFh9RvsT1yRu1BkQaSpVDtsSVt0dGO', 1, 5, '2024-03-12 18:22:32', '2024-03-13 06:23:51'),
(15, 'Stella Mariz G. Caiga', '200 C Reymundo Ave. Brgy Caniogan Pasig City', '', 'stella.caiga@pmc.ph', '$2y$10$IiyrIAsNE0p5ZumotsS/O.8jQfWm2uaQzRosLnssf3VwWCgmV8yNO', 4, NULL, '2024-03-13 19:05:33', '2024-03-14 07:08:59'),
(16, 'Khana Corinne Van Aimee M. Jansen', '200 C Reymundo Ave. Brgy Caniogan Pasig City', '', 'khana.jensen@pmc.ph', '$2y$10$5cLQnkwUWgNG/UzDGOIFbezuzdjzTCi88lAYcyBz2x/1pvSSjwJ1.', 1, 5, '2024-03-13 19:07:00', '2024-03-14 08:01:56'),
(17, 'Melissa Mae A. Aguirre', '200 C Reymundo Ave. Brgy Caniogan Pasig City', '', 'melissa.aguirre@pmc.ph', '$2y$10$C7n91jPbkIVb6x5MBjjfG.U3.Jq3xczYxRW0clAZ5bVnlr.VDGncG', 4, NULL, '2024-03-13 19:16:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `validity`
--

CREATE TABLE `validity` (
  `id` int(11) NOT NULL,
  `validity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `validity`
--

INSERT INTO `validity` (`id`, `validity`, `created_at`, `updated_at`) VALUES
(1, 7, '2024-02-05 00:47:58', '2024-03-21 03:00:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_quotation`
--
ALTER TABLE `comment_quotation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_id` (`quotation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_quotation`
--
ALTER TABLE `file_quotation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_id` (`quotation_id`);

--
-- Indexes for table `product_quotation`
--
ALTER TABLE `product_quotation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_id` (`quotation_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `status` (`status`),
  ADD KEY `term_id` (`term_id`);

--
-- Indexes for table `quotation_status`
--
ALTER TABLE `quotation_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `validity`
--
ALTER TABLE `validity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_quotation`
--
ALTER TABLE `comment_quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_quotation`
--
ALTER TABLE `file_quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_quotation`
--
ALTER TABLE `product_quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation_status`
--
ALTER TABLE `quotation_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `validity`
--
ALTER TABLE `validity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_quotation`
--
ALTER TABLE `comment_quotation`
  ADD CONSTRAINT `comment_quotation_ibfk_1` FOREIGN KEY (`quotation_id`) REFERENCES `quotation` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_quotation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `file_quotation`
--
ALTER TABLE `file_quotation`
  ADD CONSTRAINT `file_quotation_ibfk_1` FOREIGN KEY (`quotation_id`) REFERENCES `quotation` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_quotation`
--
ALTER TABLE `product_quotation`
  ADD CONSTRAINT `product_quotation_ibfk_1` FOREIGN KEY (`quotation_id`) REFERENCES `quotation` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotation`
--
ALTER TABLE `quotation`
  ADD CONSTRAINT `quotation_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `quotation_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `quotation_ibfk_3` FOREIGN KEY (`status`) REFERENCES `quotation_status` (`id`),
  ADD CONSTRAINT `quotation_ibfk_4` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `quotation_ibfk_5` FOREIGN KEY (`term_id`) REFERENCES `term` (`id`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
