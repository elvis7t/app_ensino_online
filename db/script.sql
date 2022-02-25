-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Tempo de geração: 25-Fev-2022 às 11:30
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
-- Estrutura da tabela `sys_matricula`
--

CREATE TABLE `sys_matricula` (
  `mat_id` int NOT NULL,
  `mat_curId` int NOT NULL,
  `mat_aluId` int NOT NULL,
  `mat_usuId` int NOT NULL,
  `mat_data` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `sys_matricula`
--

INSERT INTO `sys_matricula` (`mat_id`, `mat_curId`, `mat_aluId`, `mat_usuId`, `mat_data`) VALUES
(1, 2, 2, 1, '2022-02-25 08:26:21'),
(2, 2, 3, 1, '2022-02-25 08:26:28'),
(3, 2, 4, 1, '2022-02-25 08:26:36'),
(4, 2, 5, 1, '2022-02-25 08:26:41'),
(5, 2, 6, 1, '2022-02-25 08:26:46'),
(6, 2, 7, 1, '2022-02-25 08:26:57'),
(7, 2, 8, 1, '2022-02-25 08:27:02'),
(8, 2, 9, 1, '2022-02-25 08:27:11'),
(9, 2, 10, 1, '2022-02-25 08:27:17'),
(10, 2, 11, 1, '2022-02-25 08:27:25');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `sys_matricula`
--
ALTER TABLE `sys_matricula`
  ADD PRIMARY KEY (`mat_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sys_matricula`
--
ALTER TABLE `sys_matricula`
  MODIFY `mat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
