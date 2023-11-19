-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Nov-2023 às 22:35
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sis_filmes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `diretor`
--

CREATE TABLE `diretor` (
  `id` int(11) NOT NULL,
  `mini_bio` longtext DEFAULT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `ano_nascimento` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `diretor`
--

INSERT INTO `diretor` (`id`, `mini_bio`, `nome`, `ano_nascimento`) VALUES
(5, 'um homem exemplar', 'João Pedro', 1999);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filme`
--

CREATE TABLE `filme` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) DEFAULT NULL,
  `sinopse` text DEFAULT NULL,
  `ano_lancamento` year(4) DEFAULT NULL,
  `duracao` int(11) DEFAULT NULL,
  `nota_imdb` float DEFAULT NULL,
  `img_cartaz` varchar(100) DEFAULT NULL,
  `fk_diretor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `filme`
--

INSERT INTO `filme` (`id`, `titulo`, `sinopse`, `ano_lancamento`, `duracao`, `nota_imdb`, `img_cartaz`, `fk_diretor_id`) VALUES
(53, 'Minions', 'bichinhos amaerlos operarios do mal', 2010, 8, 1.4, '1208abc64ead10c38356bb127928f427.', 5),
(54, 'carros 7', 'carros falantes', 2007, 7, 1.47, '337963788ba5d8e2375108c5816e44a1.', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`) VALUES
(1, 'joaosantos');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `diretor`
--
ALTER TABLE `diretor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_filme_2` (`fk_diretor_id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `diretor`
--
ALTER TABLE `diretor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `filme`
--
ALTER TABLE `filme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `filme`
--
ALTER TABLE `filme`
  ADD CONSTRAINT `FK_filme_2` FOREIGN KEY (`fk_diretor_id`) REFERENCES `diretor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
