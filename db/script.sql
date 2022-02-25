-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Tempo de geração: 25-Fev-2022 às 11:15
-- Versão do servidor: 8.0.28
-- versão do PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `app_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_usuario`
--

CREATE TABLE `sys_usuario` (
  `usu_cod` int NOT NULL,
  `usu_nome` varchar(30) NOT NULL DEFAULT '0',
  `usu_senha` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'c65b0c751648454fbe595faa4ac69ece',
  `usu_empId` int NOT NULL,
  `usu_dpId` int NOT NULL,
  `usu_classeId` int NOT NULL,
  `usu_email` varchar(50) DEFAULT '0',
  `usu_ativo` enum('0','1') DEFAULT '0',
  `usu_online` enum('0','1') DEFAULT '0',
  `usu_foto` varchar(25) DEFAULT '0',
  `usu_datacad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usu_datades` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usu_chapa` varchar(6) DEFAULT NULL,
  `usu_sexo` enum('F','M') DEFAULT NULL,
  `usu_ramal` varchar(6) DEFAULT NULL,
  `usu_cel` varchar(15) DEFAULT NULL,
  `usu_dashId` int DEFAULT NULL,
  `usu_mnutopId` int NOT NULL,
  `usu_pagId` int NOT NULL,
  `usu_usucadId` int DEFAULT NULL,
  `usu_pmail` enum('0','1') DEFAULT NULL,
  `usu_pchat` enum('0','1') DEFAULT NULL,
  `usu_pcalend` enum('0','1') DEFAULT NULL,
  `usu_prelatorio` enum('0','1') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Armazena usuarios do sistema';

--
-- Extraindo dados da tabela `sys_usuario`
--

INSERT INTO `sys_usuario` (`usu_cod`, `usu_nome`, `usu_senha`, `usu_empId`, `usu_dpId`, `usu_classeId`, `usu_email`, `usu_ativo`, `usu_online`, `usu_foto`, `usu_datacad`, `usu_datades`, `usu_chapa`, `usu_sexo`, `usu_ramal`, `usu_cel`, `usu_dashId`, `usu_mnutopId`, `usu_pagId`, `usu_usucadId`, `usu_pmail`, `usu_pchat`, `usu_pcalend`, `usu_prelatorio`) VALUES
(1, 'Elvis Leite', '4badaee57fed5610012a296273158f5f', 1, 2, 1, 'admin@ensino.online.com', '1', '0', '/images/perfil/Elv_1.png', '2022-01-12 03:00:00', '2021-02-16 03:00:00', '1103', 'M', '7445', '(11)9 4749-1646', 11, 16, 10, 1, '1', '1', '1', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `sys_usuario`
--
ALTER TABLE `sys_usuario`
  ADD PRIMARY KEY (`usu_cod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sys_usuario`
--
ALTER TABLE `sys_usuario`
  MODIFY `usu_cod` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
