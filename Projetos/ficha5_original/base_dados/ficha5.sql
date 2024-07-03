-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Maio-2019 às 18:48
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `ficha5`
--  
 
 CREATE DATABASE ficha5;

 USE ficha5;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cabana`
--

CREATE TABLE `cabana` (
  `IdCabana` int(3) NOT NULL,
  `Lotacao` int(2) NOT NULL,
  `img_cabana` varchar(30) NOT NULL,
  `tipo` varchar(4) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `preco_p_noite` decimal(6,2) NOT NULL,
  `Descricao` text NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cabana`
--

INSERT INTO `cabana` (`IdCabana`, `Lotacao`, `img_cabana`, `tipo`, `nome`, `preco_p_noite`, `Descricao`, `estado`) VALUES
(1, 2, 'T0_1.png', 'T0', 'T0 - Casa da carochinha', '70.00', 'T0 colorido, com vista para o monte, ambiente tranquilo. Ideal para relaxar, excelentes sombras. Com: Cama de Rede, todo mobilado, varanda, ar condicionado. ', 1),
(2, 2, 'T0_L1.png', 'T0L', 'T0 - Cabana de luxo com vista para norte', '150.50', 'T0 de luxo, linhas modernas, com linda paisagem, ambiente tranquilo. \r\nIdeal para relaxar, com excelentes sombras. \r\nCom: Cama de Rede, todo mobilado, varanda, ar condicionado, estores eléctricos, janela panorâmica, janela vertical. ', 1),
(3, 2, 'T0_2.png', 'T0', 'T0 - Orientado a Meca', '79.99', 'T0 com estilo oriental, com vista para o monte, ambiente tranquilo. \r\nIdeal para relaxar, excelentes sombras. Com: Cama de Rede, todo mobilado, varanda, ar condicionado. ', 1),
(4, 2, 'T0_L2.png', 'T0L', 'T0 - Luxo com espírito veraniante', '175.00', 'T0 de luxo, linhas modernas, com linda paisagem, ambiente tranquilo. \r\nIdeal para relaxar, com excelentes sombras. \r\nCom: Cama de Rede, todo mobilado, varanda, ar condicionado, estores eléctricos, janela panorâmica, janela vertical. ', 1),
(5, 3, 'T1_1.png', 'T1', 'T1 - A humildade habita aqui ', '100.00', 'T1 familiar, ambiente tranquilo. \r\nIdeal para relaxar, com excelentes sombras. \r\nCom: Cama de Rede, todo mobilado, varanda, ar condicionado.', 1),
(6, 3, 'T1_L1.png', 'T1L', 'T1 - Bungalow com cama king size ', '200.00', 'T1 de luxo familiar, linhas modernas, com linda paisagem, ambiente tranquilo. \r\nIdeal para relaxar, com excelentes sombras. \r\nCom: Cama de Rede, todo mobilado, varanda, ar condicionado, estores eléctricos, janela panorâmica, janela vertical. ', 1),
(7, 3, 'T1_2.png', 'T1', 'T1 - Casa vicking', '100.00', 'T1 vicking com ratos como oferta, vista para outra cabana, boas sombras, ambiente acolhedor mas frio, excelente para famÃ­lia.', 1),
(8, 4, 'T1_L2.png', 'T1L', 'T1 Luxo - Casa da palha', '175.00', 'T1 de luxo, com piscina privada, casa soalheira com ambiente, perfeita para apanhar sol e bronzear, casa orientada Ã  privacidade, excelente para relaxar.', 1),
(9, 4, 'T2_1.png', 'T2', 'T2 - Orientado ao Meco', '175.00', 'T2 com vista para o mar, excelente ambiente, ideal para fÃ©rias em famÃ­lia, espaÃ§o ao ar livre para piqueniques. PrÃ³ximo de um parque infantil. ', 1),
(10, 4, 'T2_2.png', 'T2', 'T2 - Casa Moderna', '180.00', 'T2 com vista para o mar, excelente ambiente, ideal para fÃ©rias em famÃ­lia, espaÃ§o ao ar livre para piqueniques. PrÃ³ximo de um parque infantil. ', 1),
(11, 6, 'T2_L1.png', 'T2L', 'T2 Luxo - Big Size', '300.00', 'T2 de Luxo com camas king size, vista para o monte, excelente ambiente, ideal para fÃ©rias com famÃ­lia/amigos, espaÃ§o ao ar livre para piqueniques. Com garagem privada para dois carros. ', 1),
(12, 6, 'T2_L2.png', 'T2L', 'T2 Luxo - Sweet Dreams', '300.00', 'T2 de Luxo com camas king size, vista para o monte, excelente ambiente, ideal para fÃ©rias com famÃ­lia/amigos, espaÃ§o ao ar livre para piqueniques. Com garagem privada para dois carros. ', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estadoreserva`
--

CREATE TABLE `estadoreserva` (
  `estado` int(2) NOT NULL,
  `descricao` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estadoreserva`
--

INSERT INTO `estadoreserva` (`estado`, `descricao`) VALUES
(0, 'Pre-reserva'),
(1, 'Reserva'),
(2, 'ReservaApagada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quota`
--

CREATE TABLE `quota` (
  `nomeUtilizador` varchar(40) NOT NULL,
  `ano` int(4) NOT NULL,
  `valor` float(7,2) NOT NULL,
  `DataPagamento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `IdReserva` int(11) NOT NULL,
  `IdCliente` varchar(40) NOT NULL,
  `IdCasa` int(3) NOT NULL,
  `DataIni` date NOT NULL,
  `DataFim` date NOT NULL,
  `caucao` decimal(6,2) NOT NULL,
  `preco` decimal(7,2) NOT NULL,
  `NrPessoas` int(2) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipocabana`
--

CREATE TABLE `tipocabana` (
  `TipoCabana` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipocabana`
--

INSERT INTO `tipocabana` (`TipoCabana`) VALUES
('T0'),
('T0L'),
('T1'),
('T1L'),
('T2'),
('T2L');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoutilizador`
--

CREATE TABLE `tipoutilizador` (
  `id_Tipo` int(2) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipoutilizador`
--

INSERT INTO `tipoutilizador` (`id_Tipo`, `descricao`) VALUES
(1, 'administrativo'),
(4, 'cliente'),
(5, 'cliente nao validado'),
(2, 'funcionario'),
(3, 'socio'),
(6, 'Utilizador apagado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `nomeUtilizador` varchar(40) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `imagem` varchar(30) NOT NULL DEFAULT 'default.png',
  `morada` varchar(60) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `telemovel` int(9) NOT NULL,
  `tipoUtilizador` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`nomeUtilizador`, `mail`, `imagem`, `morada`, `pass`, `telemovel`, `tipoUtilizador`) VALUES
('admin', 'admin@ficha5.pt', 'fabio.png', 'Rua de cima, Lote de baixo, nÂº7', '21232f297a57a5a743894a0e4a801fc3', 987654321, 1),
('cliente', 'cliente@gmail.com', 'default.png', 'Rua de cima, Lote de baixo, nÂº777', '4983a0ab83ed86e0e7213c8783940193', 911111111, 4),
('funcionario', 'funcionario@ficha5.pt', 'Nelson.jpg', 'Rua de cima, Lote de baixo, nÂº77', 'cc7a84634199040d54376793842fe035', 917654321, 2),
('socio', 'socio@gmail.com', 'default.png', 'Rua de Cimeira do Fundo, Lote de baixo superior, nÂº7', '1b1844daa452df42c6f9123857ca686c', 912345678, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabana`
--
ALTER TABLE `cabana`
  ADD PRIMARY KEY (`IdCabana`),
  ADD KEY `tipo` (`tipo`);

--
-- Indexes for table `estadoreserva`
--
ALTER TABLE `estadoreserva`
  ADD PRIMARY KEY (`estado`),
  ADD UNIQUE KEY `estado` (`estado`);

--
-- Indexes for table `quota`
--
ALTER TABLE `quota`
  ADD PRIMARY KEY (`nomeUtilizador`,`ano`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`IdReserva`),
  ADD KEY `IdCliente` (`IdCliente`),
  ADD KEY `IdCasa` (`IdCasa`),
  ADD KEY `estado` (`estado`);

--
-- Indexes for table `tipocabana`
--
ALTER TABLE `tipocabana`
  ADD PRIMARY KEY (`TipoCabana`);

--
-- Indexes for table `tipoutilizador`
--
ALTER TABLE `tipoutilizador`
  ADD PRIMARY KEY (`id_Tipo`),
  ADD UNIQUE KEY `descricao` (`descricao`),
  ADD KEY `descricao_2` (`descricao`),
  ADD KEY `descricao_3` (`descricao`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`nomeUtilizador`),
  ADD KEY `tipoUtilizador` (`tipoUtilizador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabana`
--
ALTER TABLE `cabana`
  MODIFY `IdCabana` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `IdReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1016;

--
-- AUTO_INCREMENT for table `tipoutilizador`
--
ALTER TABLE `tipoutilizador`
  MODIFY `id_Tipo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `casa_reservada` FOREIGN KEY (`IdCasa`) REFERENCES `cabana` (`IdCabana`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estado` FOREIGN KEY (`estado`) REFERENCES `estadoreserva` (`estado`),
  ADD CONSTRAINT `reservador` FOREIGN KEY (`IdCliente`) REFERENCES `utilizador` (`nomeUtilizador`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `tipo` FOREIGN KEY (`tipoUtilizador`) REFERENCES `tipoutilizador` (`id_Tipo`) ON UPDATE CASCADE;
COMMIT;


