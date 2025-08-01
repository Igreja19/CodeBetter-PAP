-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 31-Mar-2020 às 06:02
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codebetter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `community`
--

DROP TABLE IF EXISTS `community`;
CREATE TABLE IF NOT EXISTS `community` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `projectname` varchar(320) NOT NULL,
  `image` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `community`
--

INSERT INTO `community` (`id`, `username`, `projectname`, `image`) VALUES
(5, 'antonio', 'simple js game', 'iframe/default.png'),
(27, 'joaquim', 'neon lights css', 'iframe/default.png'),
(30, 'joaquim', 'slide css menu', 'iframe/default.png'),
(28, 'joaquim', 'css simple animation', 'iframe/default.png'),
(31, 'joaquim', 'css buttons', 'iframe/default.png'),
(34, 'roberto', 'html and css scroll down btn', 'iframe/default.png'),
(40, 'joaquim', 'abstract sign up form', 'iframe/default.png'),
(47, 'roberto', 'color palette explosion', 'iframe/default.png'),
(91, 'admin', 'sign in form css', 'iframe/default.png'),
(94, 'admin', 'card hover css effect', 'iframe/default.png'),
(96, 'admin', 'snakegame', 'iframe/default.png'),
(61, 'joaquim', 'pure css connect game', 'iframe/default.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gateway`
--

DROP TABLE IF EXISTS `gateway`;
CREATE TABLE IF NOT EXISTS `gateway` (
  `email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gateway`
--

INSERT INTO `gateway` (`email`) VALUES
('codebetter@enterprise.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `news`
--

INSERT INTO `news` (`id`, `title`, `detail`, `date`) VALUES
(3, 'Welcome to CodeBetter', 'Welcome to our CodeBetter project developed for front-end developers to share with the community', 1582459471);

-- --------------------------------------------------------

--
-- Estrutura da tabela `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `plans`
--

DROP TABLE IF EXISTS `plans`;
CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `unit` varchar(10) NOT NULL,
  `length` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `plans`
--

INSERT INTO `plans` (`id`, `name`, `description`, `unit`, `length`, `price`) VALUES
(14, 'Default Plan', 'Access to full version of code editor;\r\nAccess to community;', 'Years', 100, 7),
(17, 'Plus Plan', 'Access code editor and community full;\r\nAccess earlier to future updates;	', 'Years', 100, 15),
(4, 'Free Plan', 'Access to the code editor (community saving)\r\nAccess to the community', 'Years', 100, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(220) NOT NULL,
  `password` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `image` varchar(220) NOT NULL DEFAULT 'imgs/default.png',
  `wallpaper` varchar(220) NOT NULL DEFAULT 'wallpaper/default.png',
  `color` varchar(220) NOT NULL DEFAULT '#9C28B2',
  `membership` int(11) NOT NULL,
  `expire` varchar(22) NOT NULL,
  `rank` int(1) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `image`, `wallpaper`, `color`, `membership`, `expire`, `rank`, `status`) VALUES
(10, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@gmail.com', 'imgs/unnamed.jpg', 'wallpapers/203519.jpg', '#67adaa', 17, '0', 1, 0),
(28, 'julia', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'julia@gmail.com', 'imgs/default.png', 'wallpapers/default3.jpg', '#eaa4fb', 4, '0', 0, 0),
(20, 'roberto', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'roberto@gmail.com', 'imgs/default.png', 'wallpapers/default.jpg', '#4280b3', 4, '0', 0, 0),
(21, 'joaquim', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'joaquim@gmail.com', 'imgs/default.png', 'wallpapers/default.jpg', '#2c24b0', 4, '0', 0, 0),
(24, 'antonio', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'antonio@gmail.com', 'imgs/default.png', 'wallpapers/default.jpg', '#0182C3', 4, '0', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
