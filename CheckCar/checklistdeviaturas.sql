-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/03/2026 às 22:30
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `checklistdeviaturas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `checklistdeentrada`
--

CREATE TABLE `checklistdeentrada` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `NomeDeGuerra2` varchar(500) NOT NULL,
  `idFuncionario2` int(255) NOT NULL,
  `DataAtual2` DATE NOT NULL,
  `HorarioDeEntrada` time NOT NULL,
  `PrefixoDaViatura2` int(255) NOT NULL,
  `KMatual2` int(255) NOT NULL,
  `LiquidoDeArrefecimento2` varchar(500) NOT NULL,
  `NivelDoOleo2` varchar(500) NOT NULL,
  `KilometragemParaProximaTrocadeOleo2` int(255) NOT NULL,
  `EstadoDeLuzes2` varchar(500) NOT NULL,
  `ProblemaNasLuzes2` varchar(500) DEFAULT NULL,
  `ImagemLuzes2` varchar(255) DEFAULT NULL,
  `EstadoDosPneus2` varchar(500) NOT NULL,
  `ProblemaNosPneus2` varchar(500) DEFAULT NULL,
  `ImagemPneus2` varchar(255) DEFAULT NULL,
  `CondicaoGeraldaLataria2` varchar(500) NOT NULL,
  `EstadoDoRadioComunicador2` varchar(500) NOT NULL,
  `ProblemaNoRadioComunicador2` varchar(500) DEFAULT NULL,
  `ImagemRadio2` varchar(255) DEFAULT NULL,
  `EstadoDaSirene2` varchar(500) NOT NULL,
  `ProblemaNaSirene2` varchar(500) DEFAULT NULL,
  `ImagemSirene2` varchar(255) DEFAULT NULL,
  `EstadoDoGiroflex2` varchar(500) NOT NULL,
  `ProblemaNoGiroflex2` varchar(500) DEFAULT NULL,
  `ImagemGiroflex2` varchar(255) DEFAULT NULL,
  `Saldoaproximadodecombustivel2` int(255) NOT NULL,
  `observacoes2` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `checklistdesaída`
--

CREATE TABLE `checklistdesaida` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `NomeDeGuerra` varchar(500) NOT NULL,
  `idFuncionario` int(255) NOT NULL,
  `DataAtual` DATE NOT NULL,
  `HorarioDeSaida` time NOT NULL,
  `Missao` varchar(1000) NOT NULL,
  `PrefixoDaViatura` int(255) NOT NULL,
  `KMatual` int(255) NOT NULL,
  `LiquidoDeArrefecimento` varchar(500) NOT NULL,
  `NivelDoOleo` varchar(500) NOT NULL,
  `KilometragemParaProximaTrocadeOleo` int(255) NOT NULL,
  `EstadoDeLuzes` varchar(500) NOT NULL,
  `ProblemaNasLuzes` varchar(500) DEFAULT NULL,
  `ImagemLuzes` varchar(255) DEFAULT NULL,
  `EstadoDosPneus` varchar(500) NOT NULL,
  `ProblemaNosPneus` varchar(500) DEFAULT NULL,
  `ImagemPneus` varchar(255) DEFAULT NULL,
  `CondicaoGeraldaLataria` varchar(500) NOT NULL,
  `EstadoDoRadioComunicador` varchar(500) NOT NULL,
  `ProblemaNoRadioComunicador` varchar(500) DEFAULT NULL,
  `ImagemRadio` varchar(255) DEFAULT NULL,
  `EstadoDaSirene` varchar(500) NOT NULL,
  `ProblemaNaSirene` varchar(500) DEFAULT NULL,
  `ImagemSirene` varchar(255) DEFAULT NULL,
  `EstadoDoGiroflex` varchar(500) NOT NULL,
  `ProblemaNoGiroflex` varchar(500) DEFAULT NULL,
  `ImagemGiroflex` varchar(255) DEFAULT NULL,
  `Saldoaproximadodecombustivel` int(255) NOT NULL,
  `observacoes` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `checklistdeentrada`
--
ALTER TABLE `checklistdeentrada`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `checklistdesaída`
--
ALTER TABLE `checklistdesaída`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `checklistdeentrada`
--
ALTER TABLE `checklistdeentrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `checklistdesaída`
--
ALTER TABLE `checklistdesaída`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
