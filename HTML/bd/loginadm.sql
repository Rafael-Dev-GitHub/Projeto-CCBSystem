-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Dez-2021 às 21:40
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loginadm`
--
CREATE DATABASE IF NOT EXISTS `loginadm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `loginadm`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario_id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` int NOT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario`, `senha`, `nivel`, `data_cadastro`) VALUES
(2, 'admin', '0192023a7bbd73250516f069df18b500', 1, '2021-12-04 11:02:51'),
(26, '', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2021-12-13 09:28:51'),
(25, 'usuario', '401cec94d3ed586d8cb895c10c0f7db6', 1, '2021-12-13 08:20:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `voluntario`
--

DROP TABLE IF EXISTS `voluntario`;
CREATE TABLE IF NOT EXISTS `voluntario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cpf` int NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefone` int NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `congrecacao` varchar(120) NOT NULL,
  `funcao` varchar(80) NOT NULL,
  `status_Check` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `entrada_ponto` time NOT NULL,
  `saida_ponto` time NOT NULL,
  `advertencia` text NOT NULL,
  `ocorrencia` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `voluntario`
--

INSERT INTO `voluntario` (`id`, `nome`, `cpf`, `data_nascimento`, `telefone`, `endereco`, `congrecacao`, `funcao`, `status_Check`, `entrada_ponto`, `saida_ponto`, `advertencia`, `ocorrencia`) VALUES
(48, 'maria', 222, '2021-12-16', 23131412, 'Rua Professora Olga Balster', 'CCB', 'Recepcionista', '', '00:00:00', '00:00:00', 'caiu', 'andou 3 passos'),
(45, 'Pedro', 92519, '2021-12-03', 31212312, 'Rua Professora Olga Balster', 'CCB', 'Pedreiro', 'Ativo', '03:03:00', '10:10:00', 'andou', 'caiu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
