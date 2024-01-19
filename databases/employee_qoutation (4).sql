-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 09:23 AM
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
(44, 'Conan Lawrence', 'Ea fugit in aut mol', 'Molestias magni exer', 'Culpa quibusdam nost', 'mogu@mailinator.com'),
(45, 'Lucian Burt', 'Exercitationem nisi ', 'Qui enim voluptatem', 'Delectus rem dolor ', 'motukeze@mailinator.com'),
(46, 'Georgia Shields', 'Nesciunt voluptatem', 'Eu ipsum culpa atqu', 'Fuga Commodi molest', 'zywudyqam@mailinator.com'),
(48, 'Hope Key', 'Sit qui maxime obcae', 'Suscipit ipsam simil', 'Soluta sequi fugiat ', 'lomybiwe@mailinator.com'),
(52, 'Althea Huff', 'Omnis explicabo Ess', 'Sit eaque earum et ', 'Sapiente exercitatio', 'wyxaz@mailinator.com'),
(54, 'Ayanna Montgomery', 'Laudantium sint ve', 'Qui maxime exercitat', 'Perspiciatis et des', 'vylugozibu@mailinator.com'),
(56, 'Florence Baxter', 'Mollitia blanditiis ', 'Magni temporibus aut', 'Lorem blanditiis ut ', 'nasomulyky@mailinator.com'),
(57, 'Wang Wilder', 'Eius dolores suscipi', 'Aut exercitationem h', 'Adipisicing nihil de', 'mojuroto@mailinator.com'),
(58, 'Cleo Short', 'Sint quia voluptas m', 'Incididunt eu et sun', 'Eos anim explicabo', 'bufe@mailinator.com'),
(59, 'Luke Alvarado', 'Dolor vitae veritati', 'Tenetur perferendis ', 'Ut aut est corporis ', 'wezusidelo@mailinator.com'),
(60, 'Kristen Dale', 'Cillum et voluptas r', 'Rerum unde quis exce', 'Ea eaque est qui ab ', 'rorucul@mailinator.com'),
(61, 'Zeph Ferguson', 'Porro nihil itaque n', 'Obcaecati quia volup', 'Dolorem consequatur ', 'kowaginava@mailinator.com'),
(62, 'Benjamin Jackson', 'Deserunt aut delenit', 'Tempor saepe nisi mo', 'Fugit officia liber', 'rotyg@mailinator.com'),
(63, 'Cullen Paul', 'Ut inventore ex natu', 'Proident doloremque', 'Repellendus Tempora', 'tuju@mailinator.com'),
(64, '', '', '', '', ''),
(65, 'Quinlan Meadows', 'Debitis inventore ve', 'Ratione aliquid numq', 'Minim laudantium mo', 'wuga@mailinator.com'),
(66, 'Kaseem Fitzgerald', 'Sapiente vero odit v', 'Nemo aliqua Molesti', 'Laborum Dolorum fug', 'lanylyn@mailinator.com'),
(67, 'Oliver Osborn', 'Deserunt facere ex a', 'Perferendis quidem t', 'Ut est ut cum aliqu', 'segybali@mailinator.com'),
(68, 'Faith Bullock', 'Laborum architecto q', 'Tempora repellendus', 'Molestiae itaque mol', 'lotowi@mailinator.com'),
(72, 'Joseph Mullins', 'Laboris culpa sed i', 'Ut beatae corporis s', 'Repudiandae voluptat', 'qyjyxim@mailinator.com'),
(73, 'Kameko Watson', 'Beatae nulla ullamco', 'Irure consequat Eni', 'Non sit quis quo omn', 'celowa@mailinator.com'),
(74, 'Maggy House', 'Qui magna consequunt', 'Rem soluta alias exp', 'Id et lorem ut magn', 'vagubeqi@mailinator.com'),
(75, 'Macey Ballard', 'Et culpa quos sit ut', 'Quia omnis eaque omn', 'Labore temporibus et', 'xucilebup@mailinator.com'),
(76, 'Haley Woodard', 'Harum irure ut deser', 'Pariatur Repudianda', 'Quis eum et quas sin', 'qozelyjavy@mailinator.com'),
(77, 'Alec Parrish', 'Laudantium quia dic', 'Expedita molestias c', 'Cum sed odio proiden', 'digunyqov@mailinator.com'),
(79, 'Hyacinth Gill', 'Pariatur Impedit a', 'Dolore totam dolor t', 'Maiores praesentium ', 'tajyzyfo@mailinator.com'),
(80, 'Eagan Hinton', 'Sit in odio tempor ', 'Laboriosam aut atqu', 'Inventore et consequ', 'vizacyjo@mailinator.com'),
(81, 'Randall Beach', 'Placeat veritatis d', 'Laborum Commodi con', 'Explicabo Aut maior', 'povarix@mailinator.com'),
(82, 'Kyra Armstrong', 'Est eligendi Nam du', 'Minus quisquam culpa', 'Veritatis lorem elig', 'joweriko@mailinator.com'),
(83, 'Troy Simon', 'Perspiciatis amet ', 'Ad repudiandae et si', 'Dignissimos culpa el', 'kosiho@mailinator.com'),
(84, 'Andrew Yates', 'Autem odio sit temp', 'Necessitatibus id q', 'Quasi officia quo ve', 'mumyg@mailinator.com'),
(85, 'Ivy Mcgowan', 'Vero ex saepe amet ', 'Cupiditate aut qui t', 'Libero nemo possimus', 'xyzydoxiko@mailinator.com'),
(86, 'Philip Zamora', 'Id mollitia ullam se', 'Assumenda nisi imped', 'Aut numquam aliquam ', 'vaqaly@mailinator.com'),
(87, 'Alea Mckay', 'Odio illum laboris ', 'Quisquam accusantium', 'Laboris sint ad exer', 'gyri@mailinator.com'),
(88, 'Sybill Hooper', 'Esse quam dolor ex ', 'Consequatur Rem ame', 'Quia exercitation vo', 'lilixidyqy@mailinator.com'),
(90, 'Quemby Mcfarland', 'Voluptate rerum reru', 'Quia quidem cupidita', 'Quos voluptate et su', 'lysekazu@mailinator.com'),
(91, 'Iris Pruitt', 'Eos voluptas perfere', 'Fugit at voluptas d', 'Sit non facilis aspe', 'geqoludaso@mailinator.com'),
(92, 'Kim Black', 'Doloremque placeat ', 'Excepturi aut incidu', 'Odio perferendis dol', 'ninibel@mailinator.com'),
(93, 'Victoria Montgomery', 'A minima perspiciati', 'Elit est minim mini', 'Ut ipsum eos eiusm', 'cokowuri@mailinator.com'),
(94, 'Barry Beck', 'Repellendus Fugit ', 'Odio officia dolorem', 'Aut ipsam beatae arc', 'gexicy@mailinator.com'),
(99, 'Destiny Bond', 'Est quibusdam conseq', 'Consequatur Et volu', 'Officia quaerat faci', 'woji@mailinator.com'),
(103, 'Hall Peck', 'Est necessitatibus ', 'Mollit elit minima ', 'Impedit facilis in ', 'laxis@mailinator.com'),
(105, 'Hashim Carpenter', 'Consequatur Id id d', 'Veniam aut ut ipsa', 'Ex ab non officiis m', 'mehoj@mailinator.com'),
(106, 'Rooney James', 'Qui eum commodi susc', 'In dignissimos elige', 'In irure ullamco nos', 'cetux@mailinator.com'),
(107, 'Justine Shelton', 'Sapiente incididunt ', 'Exercitationem id no', 'Sunt qui vel sunt i', 'jybif@mailinator.com'),
(108, 'Kieran Brown', 'Necessitatibus ut re', 'Fugit nihil corrupt', 'Quas ullam id in est', 'sanelevov@mailinator.com'),
(111, 'Georgia Perez', 'Voluptatem quo dolor', 'Voluptas ipsam culpa', 'Irure minima illum ', 'pebyluwi@mailinator.com'),
(112, 'Simone Cochran', 'Animi lorem qui non', 'Culpa id sit sint vo', 'Eu nesciunt perspic', 'nizowafe@mailinator.com'),
(113, 'Gage Quinn', 'Non quam illum exer', 'Consequuntur nulla u', 'Est ex dignissimos a', 'conu@mailinator.com'),
(114, 'Kasimir Doyle', 'Voluptatem quia accu', 'Proident laudantium', 'Tempor aute consecte', 'meparynuv@mailinator.com'),
(115, 'Ryder Stevens', 'Repellendus Sit lab', 'Voluptatum autem do ', 'Fugit quia fugiat q', 'hukoxaz@mailinator.com'),
(116, 'Blake Calderon', 'Atque voluptatum ess', 'Quisquam aliquid exc', 'Quae qui sint excep', 'cavafeloky@mailinator.com'),
(117, 'Brian Boone', 'Sit enim elit et i', 'In voluptatem sit l', 'Fuga Et nesciunt q', 'bosukohyne@mailinator.com'),
(118, 'Bertha Strickland', 'Quasi laboriosam do', 'Fugiat deleniti exce', 'Unde iste eos velit', 'hytod@mailinator.com'),
(122, 'Audrey Livingston', 'Autem sint officia ', 'Ut ea omnis et in ex', 'Voluptates assumenda', 'tuvubem@mailinator.com');

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
(1, 8, 'Ex voluptas elit su', 'Culpa qui molestias ', 'Corporis ullam est ', 184, 0, '518', '48', '463', '215', '100', 'Soluta et qui eu des'),
(2, 8, 'Aut beatae praesenti', 'Sequi similique ex d', 'Irure amet culpa pr', 110, 0, '768', '487', '727', '132', '100', 'In labore quia qui d'),
(3, 10, 'Sunt iste vel sit ip', 'Sint inventore earum', 'Anim et vel consequa', 380, 0, '501', '92', '761', '350', '100', 'Illo porro asperiore'),
(4, 10, 'Vitae unde impedit ', 'Aliqua Numquam omni', 'Ducimus sit aut mod', 190, 0, '29', '696', '259', '189', '100', 'Quibusdam deleniti d'),
(5, 10, 'Ullamco sapiente tot', 'Ipsa doloremque ali', 'Ex eius velit deseru', 913, 0, '657', '975', '983', '697', '100', 'Pariatur Molestiae '),
(6, 10, 'Qui hic et ea dolore', 'Ipsa dolores corrup', 'Sed facilis maxime n', 235, 0, '138', '596', '406', '584', '100', 'Sint suscipit sunt '),
(7, 10, 'Doloribus numquam ap', 'Quidem assumenda vol', 'Minus voluptatum dol', 227, 0, '84', '356', '544', '52', '100', 'Proident aperiam di'),
(8, 10, 'Animi porro ab in c', 'Tempora consectetur ', 'Ullamco quia natus u', 846, 0, '880', '5', '78', '30', '100', 'Minus ut nulla est '),
(9, 11, 'Dolore elit ea laud', 'Tempora in dicta aut', 'Et voluptatum except', 757, 0, '378', '660', '568', '704', '100', 'Quam unde ipsum ea a'),
(10, 11, 'Aut aliquip in proid', 'Placeat odio distin', 'Obcaecati do perfere', 713, 0, '236', '873', '864', '346', '100', 'Eiusmod nihil offici'),
(11, 12, 'Fugiat eos fugiat ex', 'Dolor dolor nulla ip', 'Pariatur Sunt labor', 344, 12, '158', '451', '203', '452', '100', 'Anim amet nulla sed'),
(12, 13, 'Aspernatur consequat', 'Pariatur Qui omnis ', 'Corporis enim tempor', 59, 0, '820', '954', '226', '255', '100', 'Blanditiis error cul'),
(13, 13, 'Excepteur debitis as', 'Dolor voluptate sit', 'Dolores quasi sed qu', 769, 0, '375', '332', '73', '939', '100', 'Neque consequatur c'),
(14, 13, 'Impedit provident ', 'Similique adipisicin', 'Quidem qui dolore el', 763, 0, '537', '717', '16', '792', '100', 'Molestiae quis accus'),
(15, 13, 'Sed voluptas sunt ne', 'Id reprehenderit sun', 'Pariatur Placeat e', 413, 0, '833', '746', '905', '463', '100', 'Nihil dolore ipsum '),
(16, 14, 'Odit qui sunt sint l', 'Sed explicabo Fuga', 'Nemo labore quis nul', 806, 0, '579', '604', '11', '240', '100', 'Magnam saepe est mol'),
(17, 15, 'Alias nisi incidunt', 'Tenetur voluptas dis', 'Eligendi repudiandae', 986, 0, '873', '464', '33', '461', '100', 'Voluptatem laborum '),
(18, 16, 'Est aspernatur conse', 'Qui consectetur quia', 'Ut quasi elit eos c', 93, 0, '960', '796', '99', '893', '100', 'Anim ea illo eius om'),
(19, 17, 'Molestias incididunt', 'Dolor ut quo libero ', 'Ut enim minim quia a', 843, 0, '342', '42', '380', '850', '100', 'Enim beatae exercita'),
(20, 18, 'Minus suscipit sequi', 'Ipsam tempor sit sa', 'Culpa voluptas qui d', 795, 1, '370', '237', '22', '168', '100', 'Et qui ut dolorem di'),
(21, 19, 'Eius nesciunt eos ', 'Deserunt anim amet ', 'Dolor repellendus I', 984, 2, '911', '3', '308', '650', '100', 'Nulla qui quia illo '),
(22, 20, 'Sit id velit ipsum', 'Voluptatem eaque adi', 'Eos voluptatem ulla', 779, 3, '585', '613', '4', '830', '100', 'Rerum quisquam digni'),
(23, 20, 'Dolor vero laborum i', 'Aperiam nisi anim at', 'Culpa consequuntur s', 120, 4, '986', '880', '49', '429', '100', 'Porro quia excepturi'),
(24, 21, 'Sunt nihil et eos r', 'Eius totam voluptati', 'Distinctio Excepteu', 479, 0, '368', '146', '166', '149', '100', 'Consequatur Nisi di'),
(25, 22, 'Iure amet vitae mod', 'Rerum dolore ut cons', 'Reprehenderit volup', 159, 0, '247', '589', '717', '492', '100', 'Ab rerum esse repel'),
(26, 23, 'Et fugiat consequat', 'Ad eaque aut laborio', 'Libero corporis dele', 274, 0, '267', '511', '906', '245', '100', 'Ullamco voluptatem a'),
(27, 24, 'Sit culpa aut aliqua', 'Inventore quia id et', 'Nostrum rem qui quos', 842, 0, '349', '632', '964', '283', '100', 'Quisquam exercitatio'),
(28, 25, 'Mollit qui facere pe', 'Ducimus veritatis b', 'Quia earum rerum pra', 550, 5, '740', '688', '144', '198', '100', 'Tenetur eum pariatur'),
(29, 26, 'Aperiam qui quos con', 'Duis omnis omnis ess', 'Eaque quis molestiae', 15, 0, '405', '748', '657', '379', '100', 'Deserunt aut quaerat'),
(30, 26, 'Ut qui temporibus ve', 'Libero ut qui nemo f', 'Iusto ab et eiusmod ', 208, 0, '775', '854', '402', '953', '100', 'Placeat molestias s'),
(31, 27, 'Nobis quasi sunt do ', 'Quibusdam non dolor ', 'Doloribus quaerat qu', 394, 0, '282', '999', '904', '386', '100', 'Ea quis proident od'),
(32, 27, 'Explicabo Neque id ', 'Rerum laudantium ea', 'Aut ipsam totam fugi', 809, 0, '579', '263', '257', '942', '100', 'Do nihil rerum sapie'),
(33, 27, 'Et qui minima possim', 'Et aut doloremque la', 'Commodi pariatur Re', 169, 0, '709', '103', '903', '594', '100', 'Voluptatum sit et e'),
(34, 27, 'Iure est dolore porr', 'Nesciunt sed esse v', 'Id enim quo Nam qua', 833, 0, '218', '752', '866', '626', '100', 'Voluptatem quis lab'),
(35, 28, 'In aut qui aut rerum', 'Dolorum quia perspic', 'In sit ducimus con', 582, 0, '597', '800', '914', '348', '100', 'Eius minim Nam cupid'),
(36, 28, 'Sunt voluptas est e', 'Voluptate qui exerci', 'At perferendis qui v', 999, 0, '592', '3', '1', '889', '100', 'Enim nihil sunt dolo'),
(37, 29, 'Vel aliquam mollit u', 'Quo quo ad non odio ', 'Dolores culpa earum', 840, 0, '85', '177', '257', '986', '100', 'Odio non eius in lab'),
(53, 33, 'Eos quasi tempora e', 'Exercitationem rerum', 'Enim maxime libero m', 744, 0, '493', '250', '873', '186', '100', 'Cillum voluptatem mo'),
(54, 34, 'Omnis consequuntur q', 'Exercitationem tempo', 'Dolor quas ipsum co', 115, 0, '81', '790', '466', '163', '100', 'Recusandae Et sunt '),
(55, 36, 'Irure adipisci dolor', 'Occaecat pariatur L', 'Beatae sit omnis fug', 555, 0, '464', '988', '161', '717', '100', 'Nostrum labore tempo'),
(56, 36, 'Porro sint deleniti', 'Vel laborum Consect', 'Ex fugit rerum impe', 310, 0, '267', '909', '869', '619', '100', 'Consequatur Non qua'),
(58, 37, 'In nihil et at velit', 'Eaque voluptatem vol', 'Eos excepturi eu qui', 900, 0, '532', '639', '834', '258', '100', 'Repudiandae est sit'),
(59, 38, 'Non cum commodi esse', 'Cupidatat explicabo', 'Id aut veniam venia', 67, 0, '787', '352', '922', '943', '100', 'Delectus omnis sint'),
(62, 40, 'Consequatur quo exp', 'Quia non nisi laudan', 'Commodi iure dolores', 745, 0, '219', '697', '519', '634', '100', 'Sunt corporis totam '),
(63, 41, 'Repudiandae est quib', 'Reiciendis consequat', 'Est et voluptatem pl', 105, 0, '874', '147', '324', '476', '100', 'Molestiae repudianda'),
(64, 42, 'Doloremque aspernatu', 'Nisi incididunt elit', 'Reprehenderit porro ', 424, 0, '360', '546', '56', '788', '100', 'Dolore molestias sed'),
(65, 44, 'Eius placeat minus ', 'Voluptatibus libero ', 'Anim minima sunt eiu', 566, 0, '209', '510', '184', '343', '100', 'Ex maiores fugiat p'),
(66, 45, 'Nihil deserunt dolor', 'In nisi aspernatur n', 'Animi dolorum solut', 610, 0, '189', '772', '452', '97', '100', 'Laboris nemo dolore '),
(67, 46, 'Unde dolore eiusmod ', 'Tempor esse blandit', 'Ut at enim rerum des', 276, 0, '322', '545', '694', '734', '100', 'Aut esse pariatur '),
(68, 47, 'Enim quaerat veniam', 'Est corrupti ea ni', 'Aute dolores assumen', 417, 0, '253', '766', '383', '534', '100', 'Rerum voluptas excep'),
(69, 48, 'Vero est error commo', 'Ad do assumenda volu', 'Est incididunt expli', 948, 0, '17', '821', '51', '504', '100', 'Eos nihil enim cons'),
(70, 49, 'Qui maiores eos temp', 'Vero aliquam quis co', 'Mollitia cumque moll', 425, 0, '14', '792', '336', '634', '100', 'Suscipit dolore sit'),
(71, 50, 'Non maxime sed sunt ', 'Reiciendis ullamco e', 'Minima aut ullam con', 892, 0, '422', '895', '640', '88', '100', 'Labore voluptatem D'),
(72, 51, 'Nam vel molestias al', 'Quia ab omnis natus ', 'Fugiat sit aut dolo', 82, 0, '662', '827', '223', '65', '100', 'Culpa voluptate ex l'),
(73, 69, 'Perspiciatis dignis', 'Ipsam exercitation i', 'Deserunt dolor itaqu', 615, 0, '23', '960', '166', '335', '100', 'Et at qui magni in c'),
(74, 102, 'Quasi ut anim qui vo', 'Saepe rerum qui est', 'Repellendus Aliquid', 73, 0, '657', '776', '424', '143', '100', 'Commodo consequat V'),
(75, 102, 'In consectetur prov', 'Vitae ea omnis reici', 'Possimus excepteur ', 179, 0, '436', '888', '605', '422', '100', 'Excepturi aliquip se'),
(76, 103, 'Ea adipisci itaque c', 'Atque similique earu', 'Velit in officiis t', 745, 0, '766', '154', '932', '82', '150', 'Magna deleniti odit '),
(77, 103, 'Modi ut tempora iste', 'Illum aliquam aute ', 'Ad voluptate eligend', 344, 0, '820', '347', '801', '579', '500', 'Sed dignissimos reru'),
(78, 103, 'Consequatur sint lo', 'Labore excepturi par', 'Vel ut similique sus', 690, 0, '710', '862', '289', '964', '85', 'Magna architecto ass'),
(79, 105, 'Modi incididunt labo', 'Tempor neque aut tem', 'Cum animi iusto nat', 467, 0, '474', '182', '891', '713', '600', 'Numquam ut ipsum eve'),
(80, 105, 'Vel occaecat laborio', 'Est deserunt sint d', 'Proident dolor assu', 239, 0, '647', '436', '614', '222', '8502', 'Corrupti in aut ut '),
(83, 109, 'Voluptate nisi assum', 'Velit qui velit con', 'Rem occaecat tenetur', 273, 0, '207', '874', '983', '275', 'Temporibus possimus', 'Dolor inventore aut ');

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
(37, 98, 5, 44, 2, 'territory2', '091234567892', 'valid2', 'delivery2', 'terms2', '', NULL, NULL, 2, '2024-01-11 07:53:38', NULL, NULL),
(38, 531, 3, 45, 2, 'territory', '09123456789', 'valid', 'delivery', 'terms', '', NULL, NULL, 1, '2024-01-16 02:39:46', NULL, NULL),
(40, 305, 5, 48, 2, 'territory2', '091234567892', 'valid2', 'delivery2', 'terms2', '', '0000-00-00 00:00:00', NULL, 1, '2024-01-16 02:44:53', NULL, NULL),
(41, 142, 5, 52, NULL, 'Pariatur Iusto iust', '+1 (554) 339-5088', 'Aliquip sit nesciunt', 'Eos fuga Laboriosa', 'Et et magni quasi ei', '', '0000-00-00 00:00:00', NULL, 1, '2024-01-16 02:53:28', NULL, NULL),
(42, 31, 3, 54, 2, 'Minus eum sed vitae ', '+1 (854) 736-5304', 'Voluptatem Nihil qu', 'Et in molestiae comm', 'Voluptatum id elit', '', '0000-00-00 00:00:00', NULL, 1, '2024-01-16 02:54:28', NULL, NULL),
(44, 856, 3, 56, 2, 'Alias molestiae adip', '+1 (127) 473-8074', 'Dicta pariatur Sit', 'Tempora lorem explic', 'Omnis qui tempore v', '', '0000-00-00 00:00:00', NULL, 1, '2024-01-16 02:55:45', NULL, NULL),
(45, 554, 5, 57, 2, 'Laborum Ipsam quide', '+1 (871) 382-6547', 'Sit veritatis enim q', 'Itaque et sit ut min', 'Saepe tempor dolorem', '', '0000-00-00 00:00:00', NULL, 1, '2024-01-16 02:56:18', NULL, NULL),
(46, 780, 5, 58, 2, 'Corporis ea aut veli', '+1 (219) 732-2149', 'Blanditiis mollitia ', 'Dolorum quod fuga V', 'Ex aliquid consequat', '', '0000-00-00 00:00:00', NULL, 1, '2024-01-16 02:56:44', NULL, NULL),
(47, 235, 5, 59, 1, 'Pariatur Dicta anim', '+1 (402) 963-1619', 'Sit minim velit sed', 'Ratione consequuntur', 'Cupidatat quisquam a', '', '0000-00-00 00:00:00', NULL, 1, '2024-01-16 02:57:08', NULL, NULL),
(48, 152, 5, 60, 2, 'Voluptatum qui moles', '+1 (691) 472-5095', 'Dignissimos similiqu', 'Omnis quae at eligen', 'Eum odio dolores off', '', '0000-00-00 00:00:00', NULL, 1, '2024-01-16 02:58:42', NULL, NULL),
(49, 351, 3, 61, 1, 'Ipsum neque magni i', '+1 (291) 292-4619', 'Dignissimos voluptas', 'Voluptate cupidatat ', 'Ratione mollitia qua', '', '0000-00-00 00:00:00', NULL, 1, '2024-01-16 02:59:00', NULL, NULL),
(50, 590, 5, 62, 2, 'Aliquid in esse nul', '+1 (816) 328-6228', 'Maxime illum dolore', 'Sunt odio ducimus e', 'Soluta id ullamco d', '', '0000-00-00 00:00:00', NULL, 2, '2024-01-16 03:00:03', NULL, NULL),
(51, 318, 3, 63, 2, 'Et rerum quia quasi ', '+1 (985) 986-8858', 'Ut sed ad dolore ali', 'Minim id ut suscipit', 'Illo molestiae qui d', '', '0000-00-00 00:00:00', NULL, 1, '2024-01-16 03:04:25', NULL, NULL),
(52, 513, 5, 64, 2, '', '', '', '', '', '', '0000-00-00 00:00:00', NULL, 1, '2024-01-16 03:17:52', NULL, NULL),
(53, 787, 5, 65, 2, 'Molestiae quia ut qu', '+1 (551) 961-6198', 'Nihil fugiat molesti', 'Et iure eu tempora l', 'At laudantium enim ', '', '1999-01-17 16:00:00', NULL, 1, '2024-01-16 05:06:43', NULL, NULL),
(54, 395, 5, 66, 2, 'Deleniti rem fuga U', '+1 (722) 411-5203', 'Aperiam animi venia', 'Expedita culpa aut q', 'Nostrud est sit sap', '', '1980-07-01 16:00:00', NULL, 1, '2024-01-16 06:14:18', NULL, NULL),
(55, 127, 5, 67, 2, 'Vero velit sed ut co', '+1 (585) 445-4027', 'Ratione magnam verit', 'Reiciendis iste eius', 'Impedit et unde ven', '', '1998-12-09 16:00:00', NULL, 1, '2024-01-16 06:15:06', NULL, NULL),
(56, 907, 5, 68, 2, 'Vel ut quis dolor ut', '+1 (616) 315-6321', 'Ut duis amet provid', 'Vel dolore officia N', 'Exercitationem maxim', '', '1997-08-29 16:00:00', NULL, 1, '2024-01-16 06:17:32', NULL, NULL),
(60, 820, 5, 72, 2, 'Sit ullam eiusmod qu', '+1 (474) 575-2439', 'Beatae voluptatem C', 'Ut fugiat aliquid d', 'Ut vitae eligendi pr', '', '2016-01-27 16:00:00', NULL, 1, '2024-01-16 06:23:38', NULL, NULL),
(61, 481, 5, 73, 2, 'Cupiditate nobis qua', '+1 (169) 133-5448', 'Sit eiusmod nobis a', 'Tempor aut non conse', 'Nostrum ea nisi ad i', '', '2003-12-10 16:00:00', NULL, 1, '2024-01-16 06:24:21', NULL, NULL),
(62, 460, 5, 74, 2, 'Eiusmod dolores vero', '+1 (269) 971-7304', 'Eum modi est labore', 'Ut ut aut aut rem no', 'Nemo sed voluptas mi', '', '2010-04-09 16:00:00', NULL, 1, '2024-01-16 06:24:32', NULL, NULL),
(63, 380, 5, 75, 2, 'Esse sunt non eu dol', '+1 (898) 135-4568', 'Est ipsum esse volu', 'Voluptatem Voluptat', 'Eiusmod eveniet ea ', '', '1977-11-10 16:00:00', NULL, 1, '2024-01-16 07:01:11', NULL, NULL),
(64, 912, 5, 76, 2, 'Dolor qui occaecat e', '+1 (966) 186-1211', 'Inventore esse aut a', 'Et voluptatem Ad ve', 'Cupidatat ea recusan', '', '2017-07-11 16:00:00', NULL, 1, '2024-01-16 07:05:20', NULL, NULL),
(65, 609, 5, 77, 2, 'Natus odio explicabo', '+1 (287) 319-7687', 'Fuga Deserunt dolor', 'Earum ea et est inci', 'Aliquip ex odit ex e', '', '1984-05-01 16:00:00', NULL, 1, '2024-01-16 08:01:35', NULL, NULL),
(66, 651, 5, 79, 2, 'Minim ut necessitati', '+1 (732) 218-5161', 'Debitis in vel quo s', 'Mollitia quia sed an', 'Praesentium aperiam ', '', '1994-08-14 16:00:00', NULL, 1, '2024-01-16 08:02:10', NULL, NULL),
(67, 303, 5, 80, 2, 'Similique pariatur ', '+1 (106) 689-7486', 'Ut saepe minus iste ', 'Aut rerum dolores su', 'Aute illo similique ', '', '1990-05-17 16:00:00', NULL, 1, '2024-01-16 08:03:49', NULL, NULL),
(68, 497, 5, 81, 2, 'Dolorem libero quasi', '+1 (813) 539-6322', 'Ab impedit eum temp', 'Dolore veniam sapie', 'Temporibus sunt arch', '', '1983-02-20 16:00:00', NULL, 1, '2024-01-16 08:06:17', NULL, NULL),
(69, 257, 5, 82, 2, 'Rerum nesciunt lore', '+1 (928) 398-6023', 'Alias nihil exercita', 'Amet eos esse veni', 'Sint id cupiditate ', '', '1970-08-28 16:00:00', NULL, 1, '2024-01-17 00:17:05', NULL, NULL),
(70, 566, 5, 83, 2, 'Voluptatem Elit eu', '+1 (219) 458-6859', 'A dolorem rerum expl', 'Esse et dolor eaque', 'Provident saepe est', '', '2001-10-12 16:00:00', NULL, 1, '2024-01-17 00:17:55', NULL, NULL),
(71, 428, 5, 84, 2, 'Facere et minus veli', '+1 (851) 321-1977', 'Pariatur Sunt adip', 'Dolorum eum dolore v', 'Consequatur est cons', '', '1972-05-30 16:00:00', NULL, 1, '2024-01-17 00:18:52', NULL, NULL),
(72, 206, 5, 85, 2, 'Quo saepe quisquam e', '+1 (859) 868-8485', 'Facere aliquid vitae', 'Exercitation sed eni', 'Et mollitia dolorem ', '', '1975-05-20 16:00:00', NULL, 1, '2024-01-17 00:19:23', NULL, NULL),
(73, 678, 5, 86, 2, 'Dicta dicta voluptat', '+1 (888) 305-2792', 'Laudantium nisi sap', 'Incidunt voluptas a', 'Quia consequatur a ', '', '1973-05-28 16:00:00', NULL, 1, '2024-01-17 00:20:09', NULL, NULL),
(74, 745, 5, 87, 2, 'Consequat Libero ve', '+1 (244) 143-3779', 'Deserunt velit non ', 'Blanditiis qui iusto', 'Delectus aut volupt', '', '2023-03-28 16:00:00', NULL, 1, '2024-01-17 00:21:05', NULL, NULL),
(75, 922, 5, 88, 2, 'Consequat Sit maio', '+1 (344) 226-5439', 'Laboris vel aliquip ', 'Qui cupiditate ea se', 'Excepturi minima odi', '', '1999-01-23 16:00:00', NULL, 1, '2024-01-17 00:21:39', NULL, NULL),
(77, 859, 5, 90, 2, 'Aliquam est dignissi', '+1 (437) 197-3229', 'Voluptatem repellend', 'Temporibus nisi labo', 'Aut vel necessitatib', '', '1985-09-10 16:00:00', NULL, 1, '2024-01-17 00:23:28', NULL, NULL),
(78, 387, 5, 91, 2, 'Doloremque aut archi', '+1 (523) 727-1789', 'Quos voluptatem qui ', 'Eius odio numquam ob', 'Omnis qui quidem in ', '', '2008-05-20 16:00:00', NULL, 1, '2024-01-17 00:36:18', NULL, NULL),
(79, 963, 5, 92, 2, 'Ipsum amet quaerat ', '+1 (496) 405-4937', 'Praesentium consecte', 'Repellendus Cillum ', 'Adipisicing in conse', '', '1974-01-01 16:00:00', NULL, 1, '2024-01-17 00:37:11', NULL, NULL),
(80, 433, 5, 93, 2, 'Laborum Enim eius a', '+1 (844) 376-9008', 'Fugiat anim fugiat', 'Omnis aut sint corru', 'Ipsam anim alias qui', '', '1970-09-27 16:00:00', NULL, 1, '2024-01-17 00:38:24', NULL, NULL),
(81, 438, 5, 94, 2, 'Enim voluptatem sit', '+1 (521) 881-5033', 'In laborum Ut cupid', 'Consequuntur ullamco', 'Et laborum Aliquip ', '', '1984-09-11 16:00:00', NULL, 3, '2024-01-17 00:44:03', NULL, NULL),
(86, 66, 5, 99, 2, 'Error eos earum lab', '+1 (274) 385-8419', 'Provident at esse ', 'Et quis saepe ipsum ', 'Ipsa dolorum cum iu', '', '2020-04-05 16:00:00', NULL, 3, '2024-01-17 00:47:26', NULL, NULL),
(90, 901, 5, 103, 2, 'Cupidatat quis labor', '+1 (193) 617-5352', 'Do do sunt amet opt', 'Dolorem nihil provid', 'Sit non aut dolore d', '', '1990-08-19 16:00:00', NULL, 2, '2024-01-17 01:07:01', NULL, NULL),
(92, 932, 5, 105, 2, 'Voluptate molestiae ', '+1 (738) 688-3022', 'Ut natus ducimus ni', 'Molestiae voluptatem', 'Quidem obcaecati par', '', '1999-08-13 16:00:00', NULL, 3, '2024-01-17 01:08:55', NULL, NULL),
(93, 936, 5, 106, 2, 'Eos quasi veniam q', '+1 (692) 689-1215', 'Aut voluptas incidun', 'Reprehenderit quis s', 'Doloremque hic occae', '', '2013-12-30 16:00:00', NULL, 3, '2024-01-17 01:22:01', NULL, NULL),
(94, 406, 5, 107, 2, 'Dolor deserunt moles', '+1 (705) 786-2281', 'Esse est quod ex no', 'Aut esse aliquam el', 'Repellendus Et non ', '', '2011-03-06 16:00:00', NULL, 2, '2024-01-17 01:23:12', NULL, NULL),
(95, 140, 5, 108, 2, 'Tempor id eligendi ', '+1 (928) 927-9174', 'Non sit quis corrup', 'Cum autem recusandae', 'Id laborum Nesciun', '', '2004-03-18 16:00:00', NULL, 2, '2024-01-17 01:30:36', NULL, NULL),
(98, 823, 5, 111, 2, 'Sit amet dolorem e', '+1 (712) 642-7261', 'Ea enim est voluptat', 'Veritatis qui ut non', 'Nam placeat ad dolo', '', '2013-06-01 16:00:00', NULL, 2, '2024-01-17 02:39:54', NULL, NULL),
(99, 87, 5, 112, 2, 'Odit voluptate vel r', '+1 (898) 918-4753', 'Magnam eos corrupti', 'Recusandae Dolor pl', 'Corporis sed quia ei', '', '2015-08-14 16:00:00', NULL, 2, '2024-01-17 02:42:43', NULL, NULL),
(100, 956, 5, 113, 2, 'Officia molestias es', '+1 (979) 532-8522', 'Dolores sunt occaeca', 'Quis earum dolores i', 'Dolores qui et exerc', '', '1998-05-17 16:00:00', NULL, 2, '2024-01-17 02:46:50', NULL, NULL),
(101, 350, 5, 114, 2, 'Fugiat consequatur v', '+1 (521) 279-6035', 'A tempor laudantium', 'Labore eius libero e', 'Enim aut sed molesti', '', '2016-02-20 16:00:00', NULL, 2, '2024-01-17 02:47:56', NULL, NULL),
(102, 425, 5, 115, 2, 'Magna eiusmod ab dol', '+1 (323) 636-5953', 'Ad eum pariatur Dol', 'Ut minim odit mollit', 'Lorem molestiae quid', '', '1997-04-30 16:00:00', NULL, 2, '2024-01-17 03:04:58', NULL, NULL),
(103, 245, 5, 116, 2, 'Consequuntur cum con', '+1 (421) 545-8493', 'Praesentium libero c', 'Voluptate dolores se', 'Sint libero quisqua', '', '2023-11-24 16:00:00', NULL, 2, '2024-01-17 03:14:33', NULL, NULL),
(104, 49, 5, 117, 2, 'Qui voluptate et pro', '+1 (123) 383-3963', 'Eos praesentium volu', 'Voluptatem rerum del', 'Ut accusantium dolor', '', '2017-06-28 16:00:00', NULL, 2, '2024-01-17 07:20:27', NULL, NULL),
(105, 978, 5, 118, 2, 'Reiciendis corporis ', '+1 (986) 523-7311', 'Lorem et et iusto qu', 'Excepteur molestiae ', 'Tenetur reiciendis i', '', '2002-06-20 16:00:00', NULL, 2, '2024-01-17 07:59:09', NULL, NULL),
(109, 540, 5, 122, 2, 'Ducimus et a mollit', '+1 (768) 981-6848', 'Inventore qui ab lab', 'Quo aute animi duci', 'Doloremque quas dolo', '', '2002-11-25 16:00:00', NULL, 1, '2024-01-19 06:31:19', NULL, NULL);

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
(11, 'Team Neil', 'Sample Address', 2, 12);

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
(9, 'Anika Dorsey', 'Repellendus Id aut ', '09789456123', 'biladysufe@mailinator.com', '$2y$10$rWwn9QaObTA4q82rOIxNwe9xl4bzMAH3cmYTb89oV0xE9GzP9bZXq', 1, 2, '2023-12-22 03:43:00', NULL),
(10, 'Brendan Chang', 'Culpa et labore qui', '09321456987', 'ruquj@mailinator.com', '$2y$10$eX/9BJvJ48zOiM4eZdznk.H14NpntMmlrAv75WyYXLS70wpNvJQ82', 1, 2, '2024-01-16 06:31:25', NULL),
(11, 'Administrator', 'Sample Address', '09456789123', 'admin@gmail.com', '$2y$10$bYggwodmGVPdMbjjyFeifO80L9gTr/.qIcPzP9vsCEDTF2dSP7D2G', 2, NULL, '2024-01-19 00:45:01', '2024-01-19 01:23:35'),
(12, 'Neil De Guzman Manager', 'Sample Address', '09654987321', 'ndguzman@pmcgroup.com', '$2y$10$FtubVgobseUIow6D6QKhq.gfU7kqcRwdQTVP7FdL1w2xBBmJaiOOO', 4, NULL, '2024-01-19 07:55:04', NULL),
(14, 'Neil De Guzman Sales', 'Sample Address', '09789654123', 'ngerome031@gmail.com', '$2y$10$9BrHOgbHmIDaxqFl6UsaceTq8Et2HA7xUhaIS4KxqK.27.BzzSqRe', 1, 11, '2024-01-19 07:58:50', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `product_qoutation`
--
ALTER TABLE `product_qoutation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `qoutation`
--
ALTER TABLE `qoutation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
