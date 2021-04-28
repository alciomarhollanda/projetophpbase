-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Abr-2021 às 02:58
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `city`
--

CREATE TABLE `city` (
  `idCity` int(11) NOT NULL,
  `nameCity` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `city`
--

INSERT INTO `city` (`idCity`, `nameCity`) VALUES
(1, 'Campinas'),
(2, 'Ortolândia'),
(4, 'Sumaré');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profile_reg`
--

CREATE TABLE `profile_reg` (
  `idProfile` int(11) NOT NULL,
  `nameProfile` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `profile_reg`
--

INSERT INTO `profile_reg` (`idProfile`, `nameProfile`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reg`
--

CREATE TABLE `reg` (
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `city` varchar(15) NOT NULL,
  `image` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `id` int(11) NOT NULL,
  `fk_idProfile` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reg`
--

INSERT INTO `reg` (`name`, `username`, `password`, `city`, `image`, `gender`, `id`, `fk_idProfile`) VALUES
('Bikash', 'bikash', 'bikash', 'knp', 'image/images.png', 'male', 2, NULL),
('Alciomar Hollanda', 'alciomar@gmail.com', '123', 'knp', 'image/github-octocat.png', 'male', 3, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`idCity`);

--
-- Índices para tabela `profile_reg`
--
ALTER TABLE `profile_reg`
  ADD PRIMARY KEY (`idProfile`);

--
-- Índices para tabela `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idProfile` (`fk_idProfile`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `city`
--
ALTER TABLE `city`
  MODIFY `idCity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `profile_reg`
--
ALTER TABLE `profile_reg`
  MODIFY `idProfile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `reg`
--
ALTER TABLE `reg`
  ADD CONSTRAINT `reg_ibfk_1` FOREIGN KEY (`fk_idProfile`) REFERENCES `profile_reg` (`idProfile`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
