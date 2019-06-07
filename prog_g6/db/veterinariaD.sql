-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 24-Out-2018 às 17:32
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
  `email` varchar(80) NOT NULL,
  `status_agendamento` tinyint(1) NOT NULL,
  `id_veterinario` int(11) NOT NULL
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

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id_cidade`, `nome`, `estado`) VALUES
(1, 'Feliz', 'Rio Grande do Sul'),
(2, 'Rio Branco', 'Acre');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `id_veterinario` int(11) NOT NULL,
  `laudo` varchar(1000) NOT NULL,
  `observacao` varchar(1000) NOT NULL,
  `status_consulta` int(11) NOT NULL,
  `horarioConsulta` time NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `id_veterinario`, `laudo`, `observacao`, `status_consulta`, `horarioConsulta`, `id_usuario`) VALUES
(4, 3, '', '', 1, '12:12:24', 3),
(6, 13, '', '', 1, '12:12:51', 3),
(8, 32, '', '', 1, '12:27:17', 3),
(9, 45, '', '', 1, '15:14:24', 65),
(11, 68, '', '', 1, '15:36:34', 61),
(12, 78, '', '', 1, '17:23:39', 98);

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
  `id_atendente` int(11) NOT NULL,
  `nomeVI` varchar(50) NOT NULL,
  `emailVI` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `internacao`
--

INSERT INTO `internacao` (`id_internacao`, `id_usuario`, `id_veterinario`, `dt_entrada`, `dt_saida`, `id_quarto`, `grau_complicacao`, `id_atendente`, `nomeVI`, `emailVI`) VALUES
(1, 1, 3, '2018-10-11', '2018-10-30', 1, 'baixo', 4, 'Não', 'Não'),
(2, 13, 32, '2018-10-03', '2018-10-24', 2, 'baixo', 41, 'não', 'não');

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
  `cep` int(20) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `logradouro` varchar(20) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id_usuario`, `id_cidade`, `nomeP`, `dt_nasc`, `raca`, `plano_s`, `cep`, `bairro`, `logradouro`, `numero`, `complemento`) VALUES
(3, 2, 'gyyuyu', '2018-10-17', 'ghfhg', 'gyvv', 5645646, 'fghfh', 'tyfy', 234, 'fdrttrtr'),
(61, 2, 'padrao', '2000-01-01', 'teste', 'Sim ', 55555555, 'teste', 'teste', 5555, 'teste'),
(62, 2, 'padrao', '2000-01-01', 'teste', 'Sim  ', 55555555, 'teste', 'teste', 5555, 'teste'),
(63, 2, 'padrao', '2018-10-24', 'teste', 'Sim  ', 55555555, 'teste', 'teste', 5555, 'teste'),
(64, 2, 'prog_g3', '2000-08-21', 'prog_g3', 'Não', 11111111, 'prog_g3', 'prog_g3', 111, 'prog_g3'),
(65, 2, 'padraoteste', '2018-10-16', 'testepadrao', 'Sim  ', 95770000, 'testepadrao', 'testepadrao', 222, 'testepadrao'),
(66, 2, 'TESTEG3', '2018-02-02', 'TESTEG3', 'Sim  ', 11111111, 'TESTEG3', 'TESTEG3', 111, 'TESTEG3'),
(67, 2, 'GETESTE', '2017-05-25', 'GETESTE', 'Não', 22222222, 'GETESTE', 'GETESTE', 222, 'GETESTE'),
(69, 2, 'padraoteste', '2018-10-02', 'padraoteste', 'Sim  ', 66666666, 'padraoteste', 'padraoteste', 666, 'padraoteste'),
(88, 2, 'senha', '2018-10-01', 'senha', 'Sim  ', 22222222, 'senha', 'senha', 222, 'senha'),
(98, 2, 'ANDRES', '2018-10-15', 'TESTEG3', 'Não', 22222222, 'GETESTE', 'TESTEG3', 222, 'GETESTE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

CREATE TABLE `quarto` (
  `id_quarto` int(11) NOT NULL,
  `disponivel` tinyint(1) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `quarto`
--

INSERT INTO `quarto` (`id_quarto`, `disponivel`, `descricao`) VALUES
(1, 1, 'quarto azul'),
(2, 1, 'C111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `id_internacao` int(11) NOT NULL,
  `medicamento` varchar(60) NOT NULL,
  `procedimento` varchar(200) NOT NULL,
  `reacao` varchar(60) NOT NULL,
  `visibilidade` tinyint(1) NOT NULL,
  `id_atendente` int(11) NOT NULL,
  `dt_registro` datetime NOT NULL,
  `dt_procedimento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `registro`
--

INSERT INTO `registro` (`id_registro`, `id_internacao`, `medicamento`, `procedimento`, `reacao`, `visibilidade`, `id_atendente`, `dt_registro`, `dt_procedimento`) VALUES
(1, 1, 'Vermífugo', 'Pressão: 30bps', 'Nenhuma', 1, 4, '2018-10-19 04:25:35', '2018-10-19 04:25:35'),
(2, 1, 'Nenhum', 'Temperatura: 36°', 'Nenhuma', 1, 4, '2018-10-18 07:07:38', '2018-10-19 03:04:05'),
(4, 1, 'Xarope', 'Medicar com xarope', 'Nenhuma', 1, 4, '2018-10-23 11:48:58', '2018-10-23 11:48:58'),
(27, 1, '', 'Limpeza na ferida', '', 1, 4, '2018-10-24 16:56:12', '2018-10-24 16:56:12'),
(29, 1, '', 'Aplicar injeção', '', 1, 4, '2018-10-24 16:58:11', '2018-10-24 16:58:11'),
(30, 1, '', 'Operação da pata frontal esquerda', 'Boas', 1, 4, '2018-10-24 17:02:08', '2018-10-24 17:02:08'),
(31, 1, '', 'Tala na pata traseira direita', '', 1, 4, '2018-10-24 17:10:38', '2018-10-30 17:10:38'),
(33, 1, 'Dipirona gotas', 'Tala na pata traseira direita', 'A pata já está melhorando', 1, 4, '2018-10-24 17:10:38', '2018-10-30 17:10:38'),
(36, 1, 'Dipirona gotas', 'Tala na pata traseira direita', 'A pata já está melhorando', 1, 4, '2018-10-24 17:10:38', '2018-10-30 17:10:38'),
(37, 1, 'Medicamento para dor', 'Operação da pata frontal esquerda', 'Boas', 1, 4, '2018-10-24 17:16:02', '2018-10-24 17:16:02'),
(38, 1, 'Nenhum', 'Dar soro sabor suco de uva', 'Nenhuma', 1, 4, '2018-10-24 17:21:10', '2018-10-24 17:21:10'),
(39, 1, 'Ciprovet Colírio Frasco', 'Operação no olho direito', '', 1, 4, '2018-10-24 17:21:24', '2018-10-24 17:21:24'),
(40, 1, 'Nenhum', 'Aplicar injeção dolorida', 'Nenhuma', 1, 4, '2018-10-24 17:22:43', '2018-10-24 17:22:43'),
(41, 1, 'Anti-inflamatório Prediderm Comprimidos', 'Castração', 'Sonolência', 1, 4, '2018-10-24 17:23:55', '2018-10-24 17:23:55'),
(43, 1, 'Amor', 'Dar carinho', 'Ficou feliz', 1, 4, '2018-10-24 17:28:53', '2018-10-24 17:28:53'),
(44, 1, 'Carinho', 'Dar muito carinho', '', 1, 4, '2018-10-24 17:32:05', '2018-10-24 17:32:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tela`
--

CREATE TABLE `tela` (
  `id_tela` int(11) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tela`
--

INSERT INTO `tela` (`id_tela`, `descricao`) VALUES
(1, 'login'),
(2, 'home');

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
  `email` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `ativoSistema` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_tipo`, `nome`, `senha`, `email`, `telefone`, `cpf`, `ativoSistema`) VALUES
(1, 3, 'Ana Paula', 'senhadaanapaula', 'ana@gmail.com', '999999999', '111111111', 1),
(2, 3, 'Túlio', 'senhadotulio', 'tulio@gmail.com', '999999999', '222222222', 1),
(3, 4, 'Scheila', '123', 'scheila@gmail.com', '51996351932', '192.168.103.223', 1),
(4, 2, 'Sheila', '123456', 'sheila@gmail.com', '5136373075', '1234561234', 1),
(13, 4, 'gsd', '123', 'fas@gmail.com', '3124', '12312', 1),
(23, 4, 'gsd', '123', 'fas@gmail.com', '3124', '12312', 1),
(26, 3, 'pessego', '12345', 'a@a', '(55)55555-5555', '190.190.190-01', 1),
(27, 3, 'testeeeeeeeeeeeeeee', '12345', 'lucas-andres16@hotmail.com', '(95)77000-00', '555.555.555-55', 1),
(28, 3, 'progg3', '12345', 'lucas-andres16@hotmail.com', '(95)77000-00', '555.555.555-55', 1),
(29, 3, 'hhhhhhhhhhhhhhh', '12345', 'a@a', '(95)77000-00', '55555555555555555', 1),
(30, 3, 'ççççççççççççççççççççççççççççç', '12345', 'ddddd@ere', '444444444444444', '19019019001', 1),
(31, 3, 'kkkkkkkkkkkkkkkkk', '12345', 'lucas-andres16@hotmail.com', '(55)55555-5555', '555.555.555-55', 1),
(32, 4, 'gsd', '123', 'fas@gmail.com', '3124', '12312', 1),
(33, 4, 'sad', '14234', 'fas@gmail.com', '3124', '134124', 1),
(34, 4, 'sad', '14234', 'fas@gmail.com', '3124', '134124', 1),
(35, 4, 'sad', '14234', 'fas@gmail.com', '3124', '134124', 1),
(36, 3, 'TESTE3', '12345', 'lucas-andres16@hotmail.com', '(55)55555-5555', '555.555.555-55', 1),
(37, 3, 'TESTE3', '12345', 'lucas-andres16@hotmail.com', '(95)77000-00', '555.555.555-55', 1),
(38, 3, 'oi', '12345', 'teste100@teste100.com', '(95)77000-00', '111.111.111-11', 1),
(39, 2, 'Gabrieli', '000', 'gabrielimassing2001@gmail.com', '051998859656', '033663721095', 1),
(40, 3, 'teste100', '12345', 'lucas-andres16@hotmail.com', '(55)55555-5555', '555.555.555-55', 1),
(41, 2, 'Claudete', '123456', 'claudete@gmail.com', '9999999999999', '04649051096', 1),
(42, 2, 'Thiago', '000', 'gabrielimassing2001@gmail.com', '051998859656', '033663721095', 1),
(43, 2, 'Thiago', '123', 'gabrielimassing2001@gmail.com', '051998859656', '033663721095', 1),
(44, 2, 'juliana', '12345', 'juliana@gmail.com', '05136379876', '123456782', 0),
(45, 4, 'teste', '321', 'teste@gmail.com', '5180143594', '214124', 1),
(46, 2, 'Amanda', '1234', 'gabrielimassing2001@gmail.com', '051998859656', '033663721095', 0),
(47, 3, 'testepadrao', '12345', 'testepadrao@testepadrao', '(11)11111-1111', '111.111.111-11', 1),
(48, 3, 'teste', '12345', 'teste@teste', '(55)55555-5555', '555.555.555-55', 1),
(49, 3, 'padrao', '12345', 'padrao@padrao', '(55)55555-5555', '555.555.555-55', 1),
(50, 3, 'padrao', '12345', 'padrao@padrao', '(55)55555-5555', '555.555.555-55', 1),
(51, 3, 'teste', '12345', 'teste@teste', '(55)55555-5555', '555.555.555-55', 1),
(52, 3, 'teste', '12345', 'teste@teste', '(55)55555-5555', '555.555.555-55', 1),
(53, 3, 'teste', '12345', 'teste@teste', '(55)55555-5555', '555.555.555-55', 1),
(54, 3, 'teste', '12345', 'teste@teste', '(55)55555-5555', '555.555.555-55', 1),
(55, 3, 'teste', '12345', 'teste@teste', '(55)55555-5555', '555.555.555-55', 1),
(56, 3, 'teste', '12345', 'teste@teste', '(55)55555-5555', '555.555.555-55', 1),
(57, 3, 'teste', '12345', 'teste@teste', '(55)55555-5555', '555.555.555-55', 1),
(61, 3, 'teste', '12345', 'teste@teste', '(55)55555-5555', '555.555.555-55', 1),
(62, 3, 'teste', '12345', 'teste@teste', '(55)55555-5555', '555.555.555-55', 1),
(63, 3, 'teste', '12345', 'teste@teste', '(55)55555-5555', '555.555.555-55', 1),
(64, 3, 'prog_g3', '12345', 'prog_g3@progg3.com.br', '(11)11111-1111', '111.111.111-11', 1),
(65, 3, 'testepadrao', '12345', 'testepadrao@padraoteste.com', '(51)99999-9999', '154.011.111-11', 1),
(66, 3, 'TESTEG3', '12345', 'TESTEG3@testeg3.com', '(11)11111-1111', '111.111.111-11', 1),
(67, 3, 'GETESTE', '12345', 'GETESTE@teste.com', '(22)22222-2222', '222.222.222-22', 1),
(68, 4, 'teste', 'asf', 'teste@gmail.com', '12345678', '124124', 1),
(69, 3, 'padraoteste', '12345', 'padraoteste@padraoteste.com', '(66)66666-6666', '666.666.666-66', 1),
(70, 4, 'teste', 'ws6G6rvVZQ', 'qwerty@gmail.com', '12345678', '123312', 1),
(71, 4, 'teste', 'ej2ot8wasC', 'qwerty@gmail.com', '12345678', '123312', 1),
(72, 4, 'teste', 'khII2Gz1kC', 'qwerty@gmail.com', '12345678', '123312', 1),
(73, 4, 'teste', '069OSRdLK1', 'qwerty@gmail.com', '12345678', '123312', 1),
(74, 4, 'teste', '5DsiJtIxjS', 'qwerty@gmail.com', '12345678', '123312', 1),
(75, 4, 'teste', '', 'qwerty@gmail.com', '12345678', '123312', 1),
(76, 4, 'testeSenha', '', 'senha@gmailcom', '4534615', '7864', 1),
(77, 4, 'testeSenha', 'GZM0CEIyAr', 'senha@gmailcom', '4534615', '7864', 1),
(78, 4, 'testeSenha2', 'GSHS4bfPq5', 'teste@gmail.com', '2412654', '5646', 1),
(79, 4, 'testeSenha3', 'utuXbjAEns', 'qwerty@gmail.com', '12345678', '14123', 1),
(80, 4, 'testeSenha4', 'LUVGyEFbmI', 'teste@gmail.com', '12345678', '1234', 1),
(81, 4, 'testeSenha4', 'gKrqbhIA3y', 'teste@gmail.com', '12345678', '1234', 1),
(82, 4, 'testeSenha5', '0keiibBYRG', 'teste@gmail.com', '761235', '12412', 1),
(83, 4, 'asfasf', 'VWlHpuU2tq', 'jknksf@dsad.dsad', '123124', '124123', 1),
(84, 4, 'asfasf', 'wlfUYzAPJL', 'jknksf@dsad.dsad', '123124', '124123', 1),
(85, 4, 'asfasf', 'g4rcqd6DYg', 'jknksf@dsad.dsad', '123124', '124123', 1),
(86, 4, 'teste7', '5gKgqc4zWZ', 'teste@gmail.com', '122314', '12142', 1),
(87, 3, 'testesenha', '12345', 'testesenha@testesenha', '(55)55555-5555', '555.555.555-55', 1),
(88, 3, 'senha', 'nvHxbLOBCx', 'senha@senha.com', '(99)99999-9999', '666.666.666-66', 1),
(89, 4, 'testeSenha5', '3ZKa8a2MC9', 'teste@gmail.com', '761235', '12412', 1),
(90, 4, 'testeSenha5', 'I7fm9Us49l', 'teste@gmail.com', '761235', '12412', 1),
(91, 4, 'testeSenha5', 'ZGKgIiHYAU', 'teste@gmail.com', '761235', '12412', 1),
(92, 4, 'testeSenha5', '3vGP69GrvA', 'teste@gmail.com', '761235', '12412', 1),
(93, 4, 'testeSenha5', 'uUTxP7pvvJ', 'teste@gmail.com', '761235', '12412', 1),
(94, 4, 'testeSenha5', 'ZysrjGuFbC', 'teste@gmail.com', '761235', '12412', 1),
(95, 4, 'testeSenha5', 'ErQQUrFQY0', 'teste@gmail.com', '761235', '12412', 1),
(96, 4, 'testeSenha5', '5LOcEuNdaL', 'teste@gmail.com', '761235', '12412', 1),
(97, 4, 'testeSenha5', 'I1aCwuYOCX', 'teste@gmail.com', '761235', '12412', 1),
(98, 3, 'LUCAS', 'Q0MAlSdezB', 'LUCAS@lucas.com.br', '(11)11111-1111', '222.222.222-22', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariotipo`
--

CREATE TABLE `usuariotipo` (
  `id_tipo` int(11) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuariotipo`
--

INSERT INTO `usuariotipo` (`id_tipo`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Atendentende'),
(3, 'Tutor'),
(4, 'Veterinario');

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
-- Extraindo dados da tabela `veterinario`
--

INSERT INTO `veterinario` (`id_usuario`, `crmv`, `nivel_formacao`, `dt_nasc`) VALUES
(3, 3643, 'sdjkhjbyujgjygvgjb', '2018-10-02'),
(13, 121, 'qdwdq', '2018-10-19'),
(23, 121, 'qdwdq', '2018-10-19'),
(32, 121, 'qdwdq', '2018-10-19'),
(33, 4141, 'sad fs dfs', '2018-10-18'),
(34, 4141, 'sad fs dfs', '2018-10-18'),
(35, 4141, 'sad fs dfs', '2018-10-18'),
(45, 1240, 'teste do teste', '2018-10-16'),
(68, 156651, 'asjdfhbj', '2018-10-03'),
(70, 12341, '124412', '2018-10-11'),
(71, 12341, '124412', '2018-10-11'),
(72, 12341, '124412', '2018-10-11'),
(73, 12341, '124412', '2018-10-11'),
(74, 12341, '124412', '2018-10-11'),
(75, 12341, '124412', '2018-10-11'),
(76, 234423, 'sdjkfhis', '1351-12-15'),
(77, 234423, 'sdjkfhis', '1351-12-15'),
(78, 57653, '1fsdsfsdf', '2018-10-09'),
(79, 12412, 'asdasd', '2018-10-02'),
(80, 156651, 'asfasf', '2018-10-09'),
(81, 156651, 'asfasf', '2018-10-09'),
(82, 124124, '1qwfwwefwe', '3151-05-14'),
(83, 123123, 'adsdas', '2018-10-08'),
(84, 123123, 'adsdas', '2018-10-08'),
(85, 123123, 'adsdas', '2018-10-08'),
(86, 12314, 'teste', '1313-03-15'),
(89, 124124, '1qwfwwefwe', '3151-05-14'),
(90, 124124, '1qwfwwefwe', '3151-05-14'),
(91, 124124, '1qwfwwefwe', '3151-05-14'),
(92, 124124, '1qwfwwefwe', '3151-05-14'),
(93, 124124, '1qwfwwefwe', '3151-05-14'),
(94, 124124, '1qwfwwefwe', '3151-05-14'),
(95, 124124, '1qwfwwefwe', '3151-05-14'),
(96, 124124, '1qwfwwefwe', '3151-05-14'),
(97, 124124, '1qwfwwefwe', '3151-05-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`id_agendamento`),
  ADD KEY `agendamento_ibfk_1` (`id_veterinario`);

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
  ADD UNIQUE KEY `id_veterinario` (`id_veterinario`),
  ADD KEY `fk2` (`id_usuario`);

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
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `internacao`
--
ALTER TABLE `internacao`
  MODIFY `id_internacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `quarto`
--
ALTER TABLE `quarto`
  MODIFY `id_quarto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `tela`
--
ALTER TABLE `tela`
  MODIFY `id_tela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `usuariotipo`
--
ALTER TABLE `usuariotipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `agendamento_ibfk_1` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id_usuario`);

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
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id_usuario`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

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
