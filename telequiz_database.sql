-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jul-2016 às 19:16
-- Versão do servidor: 5.7.10-log
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telequiz_database`
--
CREATE DATABASE IF NOT EXISTS `telequiz_database` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `telequiz_database`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mac_code`
--

DROP TABLE IF EXISTS `mac_code`;
CREATE TABLE `mac_code` (
  `id` int(11) NOT NULL,
  `mac` varchar(20) NOT NULL,
  `code_validation` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='relaciona um mac a um código de validação ( lembrar de criar rotina de limpeza)';

--
-- Extraindo dados da tabela `mac_code`
--

INSERT INTO `mac_code` (`id`, `mac`, `code_validation`, `time_stamp`) VALUES
(1, 'aaaa', 1000, '2016-07-13 00:41:45'),
(2, 'BBB', 8864, '2016-07-13 00:42:32'),
(3, 'cccB', 4016, '2016-07-13 01:00:08'),
(4, 'ccfsfsfscB', 2296, '2016-07-13 01:00:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mac_user`
--

DROP TABLE IF EXISTS `mac_user`;
CREATE TABLE `mac_user` (
  `id` int(11) NOT NULL,
  `mac` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_stamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mac_user`
--

INSERT INTO `mac_user` (`id`, `mac`, `user_id`, `time_stamp`) VALUES
(1, 'aaaa', 1, '2016-07-12 21:41:58'),
(2, 'BBB', 1, '2016-07-12 21:42:43'),
(3, 'cccB', 2, '2016-07-12 22:00:16'),
(4, 'ccfsfsfscB', 2, '2016-07-12 22:00:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `score_table`
--

DROP TABLE IF EXISTS `score_table`;
CREATE TABLE `score_table` (
  `id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `mac` varchar(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `score_table`
--

INSERT INTO `score_table` (`id`, `score`, `mac`, `data_hora`) VALUES
(1, 10000, 'aaaa', '2016-07-13 00:42:08'),
(2, 10000, 'BBB', '2016-07-13 00:42:49'),
(3, 10000, 'cccB', '2016-07-13 01:00:20'),
(4, 10000, 'cccB', '2016-07-13 01:00:21'),
(5, 10000, 'cccB', '2016-07-13 01:00:22'),
(6, 10000, 'ccfsfsfscB', '2016-07-13 01:00:47'),
(7, 10000, 'ccfsfsfscB', '2016-07-13 01:00:48'),
(8, 10000, 'ccfsfsfscB', '2016-07-13 01:00:48'),
(9, 10000, 'ccfsfsfscB', '2016-07-13 01:00:49'),
(10, 10000, 'ccfsfsfscB', '2016-07-13 01:00:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(100) NOT NULL,
  `senha_user` varchar(60) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `status_user` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `nome_user`, `senha_user`, `email_user`, `status_user`) VALUES
(1, 'Eduardo', '$2a$08$NjI0NjIzNjU1Nzg1OGUwYe3xA9t5CFwmAoaTVyYF8hH33VZ1NCebS', 'rsoares.eduardo@gmail.com', 1),
(2, 'tacon', '$2a$08$MTM5MzQ1OTEwNjU3ODU5MeWig7LmuPvjeHog4EnHGVdG8Vud.Uvhy', 'tacon.tacon@gmail.com', 1),
(3, 'biiirl', '$2a$08$MzA4Njk2MDk0NTc4NTkyZOOOfWZT8aIgRBVgL3NiOmuhmlE5W8cYm', 'siasuasuhuas@ashuhuasuhas.com', 1),
(4, 'biiirl', '$2a$08$ODAyNTY3NzQxNTc4NTkzM.ITmvAWT.0JlAXsq.3NyJKiL4XbZ3awe', 'birl@birl.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mac_code`
--
ALTER TABLE `mac_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mac_user`
--
ALTER TABLE `mac_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score_table`
--
ALTER TABLE `score_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mac_code`
--
ALTER TABLE `mac_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mac_user`
--
ALTER TABLE `mac_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `score_table`
--
ALTER TABLE `score_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
