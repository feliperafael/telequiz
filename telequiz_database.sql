-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jul-2016 às 23:41
-- Versão do servidor: 10.1.13-MariaDB
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `mac_code`
--

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
(1, '123', 5216, '2016-07-10 21:10:57'),
(2, '233', 9424, '2016-07-10 21:14:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mac_user`
--

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
(1, '123', 1, '2016-07-10 18:11:58'),
(2, '233', 2, '2016-07-10 18:15:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `score_table`
--

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
(1, 1000, '123', '2016-07-10 21:13:56'),
(2, 1000, '123', '2016-07-10 21:14:00'),
(3, 1000, '233', '2016-07-10 21:15:47'),
(4, 1000, '233', '2016-07-10 21:15:57'),
(5, 1000, '233', '2016-07-10 21:15:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

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
(1, 'Eduardo', '$2a$08$MTg0ODk3NTY0NDU3ODJiYONV1jlnACS0VCU9bS8YBLrI7j2snJaBK', 'rsoares.eduardo@gmail.com', 1),
(2, 'tacon', '$2a$08$NDk0NDA5MTMwNTc4MmJhYua.h05ki2zQFLuBbaHrX6iuS1kCNCDKa', 'tacon.tacon@gmail.com', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mac_user`
--
ALTER TABLE `mac_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `score_table`
--
ALTER TABLE `score_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
