-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 16-Out-2018 às 10:46
-- Versão do servidor: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.27-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `veterinariaD`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `id_agendamento` int(11) NOT NULL,
  `nomePet` varchar(50) NOT NULL,
  `dt` date NOT NULL,
  `hr` time NOT NULL,
  `nomeTutor` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `status_agendamento` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentousuario`
--

CREATE TABLE `agendamentousuario` (
  `id_agendamento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id_cidade` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `id_veterinario` int(11) NOT NULL,
  `id_agendamento` int(11) NOT NULL,
  `laudo` varchar(1000) NOT NULL,
  `observacao` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `internacao`
--

CREATE TABLE `internacao` (
  `id_internacao` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_veterinario` int(11) NOT NULL,
  `dt_entrada` date NOT NULL,
  `dt_saida` date NOT NULL,
  `id_quarto` int(11) NOT NULL,
  `grau_complicacao` varchar(20) NOT NULL,
  `id_atendente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `id_usuario` int(11) NOT NULL,
  `id_cidade` int(11) NOT NULL,
  `nomeP` varchar(50) NOT NULL,
  `dt_nasc` date NOT NULL,
  `raca` varchar(20) NOT NULL,
  `plano_s` varchar(20) NOT NULL,
  `cep` int(11) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `lougradouro` varchar(20) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

CREATE TABLE `quarto` (
  `id_quarto` int(11) NOT NULL,
  `disponivel` tinyint(1) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `id_internacao` int(11) NOT NULL,
  `medicamento` varchar(20) NOT NULL,
  `procedimento` varchar(20) NOT NULL,
  `reacao` varchar(20) NOT NULL,
  `visibilidade` tinyint(1) NOT NULL,
  `id_atendente` int(11) NOT NULL,
  `dt_registro` datetime NOT NULL,
  `dt_procedimento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tela`
--

CREATE TABLE `tela` (
  `id_tela` int(11) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telausuario`
--

CREATE TABLE `telausuario` (
  `id_tela` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `visivel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cpf` int(11) NOT NULL,
  `ativoSistema` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariotipo`
--

CREATE TABLE `usuariotipo` (
  `id_tipo` int(11) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `veterinario`
--

CREATE TABLE `veterinario` (
  `id_usuario` int(11) NOT NULL,
  `crmv` int(11) NOT NULL,
  `nivel_formacao` varchar(50) NOT NULL,
  `dt_nasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`id_agendamento`);

--
-- Indexes for table `agendamentousuario`
--
ALTER TABLE `agendamentousuario`
  ADD PRIMARY KEY (`id_agendamento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id_cidade`);

--
-- Indexes for table `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_agendamento` (`id_agendamento`),
  ADD KEY `id_veterinario` (`id_veterinario`);

--
-- Indexes for table `internacao`
--
ALTER TABLE `internacao`
  ADD PRIMARY KEY (`id_internacao`),
  ADD KEY `id_quarto` (`id_quarto`),
  ADD KEY `id_atendente` (`id_atendente`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_veterinario` (`id_veterinario`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_cidade` (`id_cidade`);

--
-- Indexes for table `quarto`
--
ALTER TABLE `quarto`
  ADD PRIMARY KEY (`id_quarto`);

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_internacao` (`id_internacao`),
  ADD KEY `id_atendente` (`id_atendente`);

--
-- Indexes for table `tela`
--
ALTER TABLE `tela`
  ADD PRIMARY KEY (`id_tela`);

--
-- Indexes for table `telausuario`
--
ALTER TABLE `telausuario`
  ADD PRIMARY KEY (`id_tela`,`id_tipo`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indexes for table `usuariotipo`
--
ALTER TABLE `usuariotipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indexes for table `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `internacao`
--
ALTER TABLE `internacao`
  MODIFY `id_internacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quarto`
--
ALTER TABLE `quarto`
  MODIFY `id_quarto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tela`
--
ALTER TABLE `tela`
  MODIFY `id_tela` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuariotipo`
--
ALTER TABLE `usuariotipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agendamentousuario`
--
ALTER TABLE `agendamentousuario`
  ADD CONSTRAINT `agendamentousuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `agendamentousuario_ibfk_2` FOREIGN KEY (`id_agendamento`) REFERENCES `agendamento` (`id_agendamento`);

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_agendamento`) REFERENCES `agendamento` (`id_agendamento`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id_usuario`);

--
-- Limitadores para a tabela `internacao`
--
ALTER TABLE `internacao`
  ADD CONSTRAINT `internacao_ibfk_1` FOREIGN KEY (`id_quarto`) REFERENCES `quarto` (`id_quarto`),
  ADD CONSTRAINT `internacao_ibfk_2` FOREIGN KEY (`id_atendente`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `internacao_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `internacao_ibfk_4` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id_usuario`);

--
-- Limitadores para a tabela `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `paciente_ibfk_2` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id_cidade`);

--
-- Limitadores para a tabela `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`id_internacao`) REFERENCES `internacao` (`id_internacao`),
  ADD CONSTRAINT `registro_ibfk_2` FOREIGN KEY (`id_atendente`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `telausuario`
--
ALTER TABLE `telausuario`
  ADD CONSTRAINT `telausuario_ibfk_1` FOREIGN KEY (`id_tela`) REFERENCES `tela` (`id_tela`),
  ADD CONSTRAINT `telausuario_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `usuariotipo` (`id_tipo`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `usuariotipo` (`id_tipo`);

--
-- Limitadores para a tabela `veterinario`
--
ALTER TABLE `veterinario`
  ADD CONSTRAINT `veterinario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
