-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Ago-2016 às 01:57
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `score_table`
--

DROP TABLE IF EXISTS `score_table`;
CREATE TABLE `score_table` (
  `id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `mac` varchar(100) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `mac_user`
--
ALTER TABLE `mac_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `score_table`
--
ALTER TABLE `score_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
