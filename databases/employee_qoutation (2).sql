-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 09:17 AM
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
-- Database: `employee_qoutation`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `contact_person`, `position`, `email`) VALUES
(10, 'Jesse Quinn', 'Tenetur eaque dignis', 'Aliqua Vel ut labor', 'Do molestiae commodo', 'jynysy@mailinator.com'),
(12, 'Echo Riggs', 'Omnis veniam volupt', 'Aperiam quia fugiat ', 'Quam nisi reprehende', 'dylafohud@mailinator.com'),
(13, 'Jeremy Willis', 'Dolorem nisi provide', 'Excepturi fugit ess', 'Voluptatem laboriosa', 'vyfuwaqohe@mailinator.com'),
(14, 'Marshall Rodriquez', 'Accusamus dignissimo', 'Est sed aspernatur d', 'Voluptas et cum haru', 'bafyba@mailinator.com'),
(15, 'Jolie Whitaker', 'Soluta eos magna dol', 'Quidem qui in sed of', 'In harum non ipsum ', 'lesecyq@mailinator.com'),
(16, 'Echo Anthony', 'Sunt praesentium no', 'Dolores ab expedita ', 'Reprehenderit minim ', 'vyzy@mailinator.com'),
(17, 'Sawyer Cook', 'Voluptatibus autem i', 'Accusantium distinct', 'Quia ut odio amet a', 'gokozyjof@mailinator.com'),
(18, 'Daryl Goff', 'Iusto eius numquam d', 'Asperiores enim mini', 'Obcaecati sed dolore', 'pubadytejo@mailinator.com'),
(19, 'Sade Michael', 'Sequi fugit irure q', 'Voluptate consequunt', 'Est est hic consequ', 'dafaku@mailinator.com'),
(20, 'Nero Mccormick', 'Eos sed natus sapien', 'Sed sed quidem velit', 'Eos nulla consequun', 'vowumile@mailinator.com'),
(21, 'Alvin Love', 'Beatae eos ratione i', 'Pariatur Enim hic e', 'Ullam autem reprehen', 'sebe@mailinator.com'),
(22, 'Quail Roach', 'Est ut ut dicta eaq', 'Eum provident volup', 'Quia quo rerum facil', 'qiwe@mailinator.com'),
(23, 'Timothy Ayala', 'Nam sint doloribus q', 'Id doloremque sed de', 'Sed a quibusdam iust', 'navam@mailinator.com'),
(24, 'Martin Cantrell', 'Qui debitis culpa au', 'Aliqua Sed inventor', 'Nobis voluptatem Et', 'taquw@mailinator.com'),
(25, 'Carl Ferrell', 'Qui nihil ipsum con', 'Porro qui eveniet a', 'Aliqua Cupidatat do', 'sopat@mailinator.com'),
(26, 'Nero Daugherty', 'Veniam voluptatem ', 'Proident natus rem ', 'Occaecat enim velit ', 'qomyko@mailinator.com'),
(27, 'Zia James', 'Reiciendis mollit in', 'Quo libero sed dolor', 'Quae voluptatem Opt', 'puvatyxi@mailinator.com'),
(30, 'Oren Espinoza', 'Obcaecati eum ducimu', 'A ut consequuntur ip', 'In et velit dolores', 'byzelujy@mailinator.com'),
(31, 'Victoria Gillespie', 'Sed necessitatibus e', 'Non voluptatum quod ', 'Cupiditate atque aut', 'culex@mailinator.com'),
(32, 'Meredith Howe', 'Consectetur ab exped', 'Unde sint aute neque', 'Eum at autem do id n', 'rotos@mailinator.com'),
(33, 'Petra Battle', 'Tempor tenetur ea qu', 'Beatae velit est et', 'Ut non voluptatibus ', 'hebakacyg@mailinator.com'),
(34, 'Imani Reynolds', 'Voluptate temporibus', 'Sit molestiae qui vo', 'Natus et dolorem ad ', 'copyh@mailinator.com'),
(35, 'Rylee Herrera', 'Adipisicing eligendi', 'Architecto quis repu', 'Unde in consectetur', 'vidytyr@mailinator.com'),
(36, 'Cailin Ramirez', 'Alias amet dicta mi', 'Ea aut qui voluptate', 'Vitae pariatur Libe', 'juxuq@mailinator.com'),
(38, 'Irene Dyer', 'Nemo sint mollitia m', 'Sunt nihil id vel ', 'Quaerat perferendis ', 'wosu@mailinator.com'),
(39, 'Isabelle Wallace', 'Culpa consequatur v', 'Ratione laudantium ', 'Sed minima aspernatu', 'piwyz@mailinator.com'),
(43, 'Christine Vinson', 'A sed possimus exer', 'Id dolorum consequu', 'Nostrum nisi omnis i', 'jadabiges@mailinator.com'),
(44, 'Conan Lawrence', 'Ea fugit in aut mol', 'Molestias magni exer', 'Culpa quibusdam nost', 'mogu@mailinator.com');

-- --------------------------------------------------------

--
-- Table structure for table `product_qoutation`
--

CREATE TABLE `product_qoutation` (
  `id` int(11) NOT NULL,
  `qoutation_id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `comparative_price` varchar(255) NOT NULL,
  `catalog_price` varchar(255) NOT NULL,
  `proposed_price` varchar(255) NOT NULL,
  `approved_price` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `deal_equivalent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_qoutation`
--

INSERT INTO `product_qoutation` (`id`, `qoutation_id`, `unit`, `code`, `description`, `quantity`, `stock`, `comparative_price`, `catalog_price`, `proposed_price`, `approved_price`, `total`, `deal_equivalent`) VALUES
(1, 8, 'Ex voluptas elit su', 'Culpa qui molestias ', 'Corporis ullam est ', 184, 0, '518', '48', '463', '215', 'Nisi quaerat molesti', 'Soluta et qui eu des'),
(2, 8, 'Aut beatae praesenti', 'Sequi similique ex d', 'Irure amet culpa pr', 110, 0, '768', '487', '727', '132', 'Optio sed reprehend', 'In labore quia qui d'),
(3, 10, 'Sunt iste vel sit ip', 'Sint inventore earum', 'Anim et vel consequa', 380, 0, '501', '92', '761', '350', 'In dicta aliquid eu ', 'Illo porro asperiore'),
(4, 10, 'Vitae unde impedit ', 'Aliqua Numquam omni', 'Ducimus sit aut mod', 190, 0, '29', '696', '259', '189', 'Consectetur dolores', 'Quibusdam deleniti d'),
(5, 10, 'Ullamco sapiente tot', 'Ipsa doloremque ali', 'Ex eius velit deseru', 913, 0, '657', '975', '983', '697', 'Odit accusantium do ', 'Pariatur Molestiae '),
(6, 10, 'Qui hic et ea dolore', 'Ipsa dolores corrup', 'Sed facilis maxime n', 235, 0, '138', '596', '406', '584', 'Aute sit qui quis q', 'Sint suscipit sunt '),
(7, 10, 'Doloribus numquam ap', 'Quidem assumenda vol', 'Minus voluptatum dol', 227, 0, '84', '356', '544', '52', 'Aut saepe iusto omni', 'Proident aperiam di'),
(8, 10, 'Animi porro ab in c', 'Tempora consectetur ', 'Ullamco quia natus u', 846, 0, '880', '5', '78', '30', 'In delectus expedit', 'Minus ut nulla est '),
(9, 11, 'Dolore elit ea laud', 'Tempora in dicta aut', 'Et voluptatum except', 757, 0, '378', '660', '568', '704', 'Labore eos velit qu', 'Quam unde ipsum ea a'),
(10, 11, 'Aut aliquip in proid', 'Placeat odio distin', 'Obcaecati do perfere', 713, 0, '236', '873', '864', '346', 'Aut aperiam eius qui', 'Eiusmod nihil offici'),
(11, 12, 'Fugiat eos fugiat ex', 'Dolor dolor nulla ip', 'Pariatur Sunt labor', 344, 12, '158', '451', '203', '452', 'Tempor vero omnis do', 'Anim amet nulla sed'),
(12, 13, 'Aspernatur consequat', 'Pariatur Qui omnis ', 'Corporis enim tempor', 59, 0, '820', '954', '226', '255', 'Culpa esse omnis e', 'Blanditiis error cul'),
(13, 13, 'Excepteur debitis as', 'Dolor voluptate sit', 'Dolores quasi sed qu', 769, 0, '375', '332', '73', '939', 'Eaque enim cillum qu', 'Neque consequatur c'),
(14, 13, 'Impedit provident ', 'Similique adipisicin', 'Quidem qui dolore el', 763, 0, '537', '717', '16', '792', 'Aut numquam aliquam ', 'Molestiae quis accus'),
(15, 13, 'Sed voluptas sunt ne', 'Id reprehenderit sun', 'Pariatur Placeat e', 413, 0, '833', '746', '905', '463', 'Est distinctio Ut p', 'Nihil dolore ipsum '),
(16, 14, 'Odit qui sunt sint l', 'Sed explicabo Fuga', 'Nemo labore quis nul', 806, 0, '579', '604', '11', '240', 'Voluptatem enim in ', 'Magnam saepe est mol'),
(17, 15, 'Alias nisi incidunt', 'Tenetur voluptas dis', 'Eligendi repudiandae', 986, 0, '873', '464', '33', '461', 'Tempora sunt volupta', 'Voluptatem laborum '),
(18, 16, 'Est aspernatur conse', 'Qui consectetur quia', 'Ut quasi elit eos c', 93, 0, '960', '796', '99', '893', 'Autem inventore esse', 'Anim ea illo eius om'),
(19, 17, 'Molestias incididunt', 'Dolor ut quo libero ', 'Ut enim minim quia a', 843, 0, '342', '42', '380', '850', 'Consequat Et alias ', 'Enim beatae exercita'),
(20, 18, 'Minus suscipit sequi', 'Ipsam tempor sit sa', 'Culpa voluptas qui d', 795, 1, '370', '237', '22', '168', 'In voluptatem Minim', 'Et qui ut dolorem di'),
(21, 19, 'Eius nesciunt eos ', 'Deserunt anim amet ', 'Dolor repellendus I', 984, 2, '911', '3', '308', '650', 'Rem voluptatem Aute', 'Nulla qui quia illo '),
(22, 20, 'Sit id velit ipsum', 'Voluptatem eaque adi', 'Eos voluptatem ulla', 779, 3, '585', '613', '4', '830', 'Dolorem amet dolori', 'Rerum quisquam digni'),
(23, 20, 'Dolor vero laborum i', 'Aperiam nisi anim at', 'Culpa consequuntur s', 120, 4, '986', '880', '49', '429', 'Rerum ducimus volup', 'Porro quia excepturi'),
(24, 21, 'Sunt nihil et eos r', 'Eius totam voluptati', 'Distinctio Excepteu', 479, 0, '368', '146', '166', '149', 'Consectetur pariatu', 'Consequatur Nisi di'),
(25, 22, 'Iure amet vitae mod', 'Rerum dolore ut cons', 'Reprehenderit volup', 159, 0, '247', '589', '717', '492', 'Eiusmod nihil autem ', 'Ab rerum esse repel'),
(26, 23, 'Et fugiat consequat', 'Ad eaque aut laborio', 'Libero corporis dele', 274, 0, '267', '511', '906', '245', 'Minima et et minim p', 'Ullamco voluptatem a'),
(27, 24, 'Sit culpa aut aliqua', 'Inventore quia id et', 'Nostrum rem qui quos', 842, 0, '349', '632', '964', '283', 'Nostrud hic non dolo', 'Quisquam exercitatio'),
(28, 25, 'Mollit qui facere pe', 'Ducimus veritatis b', 'Quia earum rerum pra', 550, 5, '740', '688', '144', '198', 'Deserunt minima mini', 'Tenetur eum pariatur'),
(29, 26, 'Aperiam qui quos con', 'Duis omnis omnis ess', 'Eaque quis molestiae', 15, 0, '405', '748', '657', '379', 'Magnam laudantium l', 'Deserunt aut quaerat'),
(30, 26, 'Ut qui temporibus ve', 'Libero ut qui nemo f', 'Iusto ab et eiusmod ', 208, 0, '775', '854', '402', '953', 'Officiis omnis cum d', 'Placeat molestias s'),
(31, 27, 'Nobis quasi sunt do ', 'Quibusdam non dolor ', 'Doloribus quaerat qu', 394, 0, '282', '999', '904', '386', 'Repudiandae quibusda', 'Ea quis proident od'),
(32, 27, 'Explicabo Neque id ', 'Rerum laudantium ea', 'Aut ipsam totam fugi', 809, 0, '579', '263', '257', '942', 'In illo facere aliqu', 'Do nihil rerum sapie'),
(33, 27, 'Et qui minima possim', 'Et aut doloremque la', 'Commodi pariatur Re', 169, 0, '709', '103', '903', '594', 'Sit qui sint sit u', 'Voluptatum sit et e'),
(34, 27, 'Iure est dolore porr', 'Nesciunt sed esse v', 'Id enim quo Nam qua', 833, 0, '218', '752', '866', '626', 'Dolore sed et dolore', 'Voluptatem quis lab'),
(35, 28, 'In aut qui aut rerum', 'Dolorum quia perspic', 'In sit ducimus con', 582, 0, '597', '800', '914', '348', 'Et minim in doloremq', 'Eius minim Nam cupid'),
(36, 28, 'Sunt voluptas est e', 'Voluptate qui exerci', 'At perferendis qui v', 999, 0, '592', '3', '1', '889', 'Eaque ex qui autem q', 'Enim nihil sunt dolo'),
(37, 29, 'Vel aliquam mollit u', 'Quo quo ad non odio ', 'Dolores culpa earum', 840, 0, '85', '177', '257', '986', 'Veritatis facere pos', 'Odio non eius in lab'),
(53, 33, 'Eos quasi tempora e', 'Exercitationem rerum', 'Enim maxime libero m', 744, 0, '493', '250', '873', '186', 'Modi et alias reicie', 'Cillum voluptatem mo'),
(54, 34, 'Omnis consequuntur q', 'Exercitationem tempo', 'Dolor quas ipsum co', 115, 0, '81', '790', '466', '163', 'Voluptatem Aut repu', 'Recusandae Et sunt '),
(55, 36, 'Irure adipisci dolor', 'Occaecat pariatur L', 'Beatae sit omnis fug', 555, 0, '464', '988', '161', '717', 'Enim nisi culpa ver', 'Nostrum labore tempo'),
(56, 36, 'Porro sint deleniti', 'Vel laborum Consect', 'Ex fugit rerum impe', 310, 0, '267', '909', '869', '619', 'Optio nemo non cupi', 'Consequatur Non qua'),
(58, 37, 'In nihil et at velit', 'Eaque voluptatem vol', 'Eos excepturi eu qui', 900, 0, '532', '639', '834', '258', 'Similique est nesciu', 'Repudiandae est sit');

-- --------------------------------------------------------

--
-- Table structure for table `qoutation`
--

CREATE TABLE `qoutation` (
  `id` int(11) NOT NULL,
  `control_no` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `territory` varchar(255) NOT NULL,
  `tel_no` varchar(255) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `delivery` varchar(255) NOT NULL,
  `terms` text NOT NULL,
  `remarks` text NOT NULL,
  `needed_at` timestamp NULL DEFAULT NULL,
  `released_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qoutation`
--

INSERT INTO `qoutation` (`id`, `control_no`, `created_by`, `customer_id`, `team_id`, `territory`, `tel_no`, `validity`, `delivery`, `terms`, `remarks`, `needed_at`, `released_at`, `status`, `created_at`, `updated_at`, `expired_at`) VALUES
(8, 1, 3, 10, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 1, '2024-01-04 06:59:54', NULL, NULL),
(10, 388, 3, 12, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 1, '2024-01-04 07:37:59', NULL, NULL),
(11, 728, 3, 13, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 3, '2024-01-04 07:46:34', NULL, NULL),
(12, 928, 3, 14, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 1, '2024-01-05 00:01:02', NULL, NULL),
(13, 746, 3, 15, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 3, '2024-01-05 01:29:14', NULL, NULL),
(14, 965, 3, 16, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 3, '2024-01-05 07:28:45', NULL, NULL),
(15, 333, 3, 17, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 3, '2024-01-05 07:29:16', NULL, NULL),
(16, 407, 3, 18, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 3, '2024-01-05 07:29:35', NULL, NULL),
(17, 338, 3, 19, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 3, '2024-01-05 07:33:38', NULL, NULL),
(18, 46, 3, 20, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 3, '2024-01-05 07:35:22', NULL, NULL),
(19, 691, 3, 21, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 2, '2024-01-05 07:36:26', NULL, NULL),
(20, 968, 3, 22, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 2, '2024-01-05 07:39:21', NULL, NULL),
(21, 550, 3, 23, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 2, '2024-01-05 07:40:20', NULL, NULL),
(22, 256, 3, 24, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 2, '2024-01-05 07:42:56', NULL, NULL),
(23, 835, 3, 25, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 2, '2024-01-05 07:43:52', NULL, NULL),
(24, 458, 3, 26, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 3, '2024-01-05 07:47:44', NULL, NULL),
(25, 286, 3, 27, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 2, '2024-01-05 07:47:56', NULL, NULL),
(26, 147, 3, 30, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 2, '2024-01-08 00:10:17', NULL, NULL),
(27, 986, 3, 31, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 2, '2024-01-09 00:47:10', NULL, NULL),
(28, 397, 3, 32, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 1, '2024-01-09 06:03:16', NULL, NULL),
(29, 797, 3, 33, NULL, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 1, '2024-01-09 06:49:01', NULL, NULL),
(33, 526, 5, 38, 2, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 2, '2024-01-10 03:42:40', NULL, NULL),
(34, 962, 9, 39, 2, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 2, '2024-02-10 04:44:33', NULL, NULL),
(36, 29, 5, 43, 2, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 2, '2024-01-10 05:52:42', NULL, NULL),
(37, 98, 5, 44, 2, 'territory2', '091234567892', 'valid2', 'delivery2', 'terms2', '', NULL, NULL, 2, '2024-01-11 07:53:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qoutation_status`
--

CREATE TABLE `qoutation_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qoutation_status`
--

INSERT INTO `qoutation_status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'pending', '2024-01-07 23:58:48', NULL),
(2, 'approved', '2024-01-07 23:58:48', NULL),
(3, 'disapproved', '2024-01-07 23:58:48', NULL);

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
(4, 'Sales manager', '2024-01-05 07:17:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `region_id` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `address`, `region_id`, `manager_id`) VALUES
(1, 'Team unknown', 'Sample Address', 1, NULL),
(2, 'Sample', 'Sample Address', 2, 3),
(5, 'Aphrodite Ruiz', 'Et neque qui omnis p', 2, NULL),
(6, 'Jane Barr', 'Sunt quis nemo ut s', 2, NULL),
(8, 'Stewart Morton', 'Dolorum aut sed mole', 1, NULL),
(9, 'Phoebe Brock', 'Cupidatat consequatu', 1, NULL),
(10, 'Charity Fields', 'Non architecto irure', 1, NULL);

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
(3, 'Katelyn Ochoa', 'Laborum Minus tempo', '09789456123', 'muguku@mailinator.com', '$2y$10$UcdFS7FMa3IYvP3jlYe6/uCypAFhS8bITzobHdkGjlz2oHSVpXREu', 4, NULL, '2023-12-22 02:34:25', NULL),
(4, 'Uta Vincent', 'Rem consequat Ab qu', '09789456123', 'hanolityf@mailinator.com', '$2y$10$SdLCWINhCuNT5B.mVqM4VuVk68PsfQwy2F../qKOv0.rtvOet0hGG', 4, NULL, '2023-12-22 03:28:50', NULL),
(5, 'Karyn Hubbard', 'Corrupti quo pariat', '09789456123', 'nabib@mailinator.com', '$2y$10$aPbfNhxqUkigQunaFqOd/OMcvDY3WN5Hi0fWSAdKrEjVMG5IeXZ9m', 1, 2, '2023-12-22 03:29:48', NULL),
(9, 'Anika Dorsey', 'Repellendus Id aut ', '09789456123', 'biladysufe@mailinator.com', '$2y$10$rWwn9QaObTA4q82rOIxNwe9xl4bzMAH3cmYTb89oV0xE9GzP9bZXq', 1, 2, '2023-12-22 03:43:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `product_qoutation`
--
ALTER TABLE `product_qoutation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qoutation_id` (`qoutation_id`);

--
-- Indexes for table `qoutation`
--
ALTER TABLE `qoutation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ref_no` (`control_no`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `status` (`status`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `qoutation_status`
--
ALTER TABLE `qoutation_status`
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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `team_id` (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `product_qoutation`
--
ALTER TABLE `product_qoutation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `qoutation`
--
ALTER TABLE `qoutation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `qoutation_status`
--
ALTER TABLE `qoutation_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_qoutation`
--
ALTER TABLE `product_qoutation`
  ADD CONSTRAINT `product_qoutation_ibfk_1` FOREIGN KEY (`qoutation_id`) REFERENCES `qoutation` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qoutation`
--
ALTER TABLE `qoutation`
  ADD CONSTRAINT `qoutation_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `qoutation_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `qoutation_ibfk_3` FOREIGN KEY (`status`) REFERENCES `qoutation_status` (`id`),
  ADD CONSTRAINT `qoutation_ibfk_4` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `team_ibfk_2` FOREIGN KEY (`manager_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
