-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 09/11/2023 às 22:41
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `atividade1`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `diretor`
--

CREATE TABLE `diretor` (
  `id` int(11) NOT NULL,
  `minibio` longtext DEFAULT NULL,
  `nome` varchar(250) DEFAULT NULL,
  `ano_nascimento` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `filme`
--

CREATE TABLE `filme` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `sinopse` text DEFAULT NULL,
  `ano_lancamento` year(4) DEFAULT NULL,
  `duracao` int(11) DEFAULT NULL,
  `nota_imdb` float DEFAULT NULL,
  `img_cartaz` varchar(250) DEFAULT NULL,
  `fk_diretor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `diretor`
--
ALTER TABLE `diretor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_filme_2` (`fk_diretor_id`);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `filme`
--
ALTER TABLE `filme`
  ADD CONSTRAINT `FK_filme_2` FOREIGN KEY (`fk_diretor_id`) REFERENCES `diretor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
