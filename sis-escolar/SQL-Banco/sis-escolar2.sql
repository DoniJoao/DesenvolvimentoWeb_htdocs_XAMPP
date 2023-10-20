-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Out-2023 às 17:44
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sis-escolar2`
--
CREATE DATABASE IF NOT EXISTS `sis-escolar2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sis-escolar2`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_alunos`
--

CREATE TABLE `tb_alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fk_tb_turmas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_alunos`
--

INSERT INTO `tb_alunos` (`id`, `nome`, `foto`, `email`, `fk_tb_turmas_id`) VALUES
(1, 'Maria Eugenia da Silva', 'aluno-teste.png', 'maria2023@gmail.com', 1),
(2, 'Bob Marley Farias', 'aluno-teste.png', 'marley2023@gmail.com', 2),
(3, 'Miguel de Souza', 'aluno-teste.png', 'miguelito2023@gmail.com', 3),
(4, 'Marcia Amaro Mendes', 'aluno-teste.png', 'marcia2023@gmail.com', 1),
(5, 'Reginaldo Candido', 'aluno-teste.png', 'reginaldo13@gmail.com', 2),
(6, 'Ricardo Meira', 'aluno-teste.png', 'ricardo2020@gmail.com', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_turmas`
--

CREATE TABLE `tb_turmas` (
  `id` int(11) NOT NULL,
  `descTurma` varchar(20) DEFAULT NULL,
  `ano` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_turmas`
--

INSERT INTO `tb_turmas` (`id`, `descTurma`, `ano`) VALUES
(1, '3DSM', 2020),
(2, '2DSM', 2022),
(3, '1DSM', 2023);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nomeCompleto` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` text NOT NULL,
  `permisao` enum('adm','usu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nomeCompleto`, `usuario`, `senha`, `permisao`) VALUES
(1, 'Reginaldo Candido', 'reginaldocandido', '123456', 'adm'),
(2, 'João Paulo Santos', 'joaosantos', '123456', 'usu');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tb_alunos_2` (`fk_tb_turmas_id`);

--
-- Índices para tabela `tb_turmas`
--
ALTER TABLE `tb_turmas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_turmas`
--
ALTER TABLE `tb_turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  ADD CONSTRAINT `FK_tb_alunos_2` FOREIGN KEY (`fk_tb_turmas_id`) REFERENCES `tb_turmas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
