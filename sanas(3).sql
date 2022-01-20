-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 08-Dez-2019 às 08:48
-- Versão do servidor: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `emissor` int(11) NOT NULL,
  `receptor` int(11) NOT NULL,
  `sms` text NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `tempo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `telefone1` varchar(15) NOT NULL,
  `telefone2` varchar(15) NOT NULL,
  `email` varchar(180) NOT NULL,
  `estado` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `destinatario`
--

CREATE TABLE `destinatario` (
  `id` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `destinatario`
--

INSERT INTO `destinatario` (`id`, `descricao`, `data_criacao`, `id_utilizador`) VALUES
(1, 'Chefe da R.S.I', '2019-10-28 11:15:12', 1),
(2, 'Chefe da S.P.O.A', '2019-10-28 11:15:12', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE `documento` (
  `id` int(11) NOT NULL,
  `descricao` varchar(40) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `documento`
--

INSERT INTO `documento` (`id`, `descricao`, `data_criacao`, `id_utilizador`) VALUES
(1, 'Bilhete de Identidade', '2019-10-20 09:50:03', 1),
(2, 'Ficha', '2019-10-16 17:27:50', 1),
(3, 'Resposta', '2019-10-16 17:27:50', 1),
(4, 'Anexo', '2019-10-16 17:27:50', 1),
(5, 'Resposta SINSE', '2019-11-25 10:01:35', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprego`
--

CREATE TABLE `emprego` (
  `id` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `instituicao` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `data` varchar(50) NOT NULL,
  `estado` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola`
--

CREATE TABLE `escola` (
  `id` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `instituicao` varchar(100) NOT NULL,
  `classe` varchar(40) NOT NULL,
  `data` varchar(50) NOT NULL,
  `estado` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `expediente`
--

CREATE TABLE `expediente` (
  `id` int(11) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `referencia` text NOT NULL,
  `tipo` int(11) NOT NULL,
  `oficial` int(11) NOT NULL,
  `estado` enum('0','1','2') NOT NULL,
  `data_criacao` date NOT NULL,
  `origem` int(11) NOT NULL,
  `destino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `expediente_documento`
--

CREATE TABLE `expediente_documento` (
  `id` int(11) NOT NULL,
  `id_expediente` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `file` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacao_extra`
--

CREATE TABLE `informacao_extra` (
  `id` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `emprego` varchar(255) NOT NULL,
  `cargo` varchar(160) NOT NULL,
  `escola` varchar(90) NOT NULL,
  `classe` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `icone` varchar(30) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id`, `nome`, `icone`, `id_utilizador`, `data_criacao`) VALUES
(2, 'Funcionalidade', 'fa fa-cog', 1, '2019-05-13 21:35:23'),
(3, 'Sub Menu', 'fa fa-list-ul', 1, '2019-05-13 21:35:43'),
(4, 'Utilizador', 'fa fa-user', 1, '2019-05-13 21:35:47'),
(6, 'Grupo', 'fa fa-users', 1, '2019-05-13 21:37:23'),
(25, 'Expediente', 'fa fa-book ', 1, '2019-09-23 10:27:28'),
(26, 'Pessoa', 'fa fa-user', 1, '2019-09-24 18:32:43'),
(27, 'Ofício', 'fa fa-book', 1, '2019-09-26 20:53:28'),
(28, 'Proveniência', 'fa fa-map-pin', 1, '2019-09-27 08:14:02'),
(29, 'Relatorio', 'fa fa-book', 1, '2019-10-02 10:13:20'),
(30, 'Configurações', 'fa fa-cogs', 1, '2019-10-19 09:39:30'),
(31, 'Estatística', 'fa fa-chart-line', 1, '2019-11-05 15:41:47'),
(32, 'Buscador', 'fa fa-search', 1, '2019-11-05 16:08:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_sub_menu`
--

CREATE TABLE `menu_sub_menu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_sub_menu` int(11) NOT NULL,
  `controlador` varchar(50) NOT NULL,
  `accao` varchar(50) NOT NULL,
  `modal` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `menu_sub_menu`
--

INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES
(2, 4, 1, 'utilizador', 'novo', 0, 1, '2019-07-13 20:49:03'),
(3, 2, 1, 'menu', 'novo', 1, 1, '2019-02-27 17:09:58'),
(4, 2, 2, 'menu', 'listar', 0, 1, '2019-02-27 17:10:02'),
(6, 6, 1, 'grupo', 'novo', 1, 1, '2018-12-20 13:37:41'),
(7, 6, 2, 'grupo', 'listar', 0, 1, '2018-12-20 13:35:43'),
(8, 6, 5, 'grupo', 'add_privilegio', 0, 1, '2018-12-20 14:02:30'),
(13, 3, 1, 'sub_menu', 'novo', 1, 1, '2018-12-20 17:41:53'),
(42, 13, 1, 'funcao', 'novo', 1, 1, '2019-01-02 18:58:30'),
(43, 13, 2, 'funcao', 'listar', 0, 1, '2019-01-02 18:58:31'),
(44, 13, 3, 'funcao', 'editar', 1, 1, '2019-01-02 18:58:31'),
(45, 13, 4, 'funcao', 'eliminar', 1, 1, '2019-01-02 18:58:31'),
(75, 4, 2, 'utilizador', 'listar', 0, 1, '2019-02-27 18:14:22'),
(76, 4, 3, 'utilizador', 'editar', 0, 1, '2019-02-27 18:14:23'),
(77, 4, 4, 'utilizador', 'eliminar', 0, 1, '2019-10-28 09:35:49'),
(125, 25, 1, 'expediente', 'novo', 1, 1, '2019-10-28 09:35:30'),
(126, 25, 2, 'expediente', 'listar', 0, 1, '2019-09-23 10:28:14'),
(127, 25, 3, 'expediente', 'editar', 0, 1, '2019-09-23 10:28:14'),
(128, 25, 4, 'expediente', 'eliminar', 1, 1, '2019-09-24 17:11:06'),
(129, 25, 43, 'expediente', 'adicionar_pessoa', 0, 1, '2019-09-24 20:16:31'),
(130, 25, 6, 'expediente', 'detalhe', 0, 1, '2019-09-24 06:16:37'),
(131, 26, 1, 'pessoa', 'novo', 0, 1, '2019-09-24 18:33:11'),
(132, 26, 2, 'pessoa', 'listar', 0, 1, '2019-09-24 18:33:12'),
(133, 26, 3, 'pessoa', 'editar', 0, 1, '2019-09-24 18:33:12'),
(134, 26, 4, 'pessoa', 'eliminar', 1, 1, '2019-10-29 22:29:16'),
(135, 27, 44, 'oficio', 'comprovacao', 1, 1, '2019-09-27 10:10:00'),
(136, 28, 1, 'proveniencia', 'novo', 1, 1, '2019-09-27 08:18:16'),
(137, 27, 6, 'ofício', 'detalhe', 0, 1, '2019-09-27 13:15:09'),
(142, 29, 1, 'relatorio', 'novo', 1, 1, '2019-10-02 08:34:26'),
(143, 29, 2, 'relatorio', 'listar', 0, 1, '2019-10-02 09:31:14'),
(144, 29, 3, 'relatorio', 'editar', 0, 1, '2019-10-02 10:07:11'),
(145, 29, 4, 'relatorio', 'eliminar', 0, 1, '2019-10-02 10:07:12'),
(146, 29, 6, 'relatorio', 'detalhe', 0, 1, '2019-10-02 10:07:12'),
(147, 29, 50, 'relatorio', 'pesquisar', 0, 1, '2019-10-09 09:15:12'),
(148, 25, 51, 'expediente', 'configurar', 1, 1, '2019-10-19 10:10:22'),
(149, 25, 53, 'expediente', 'listar_tipo_documento', 0, 1, '2019-10-19 09:45:23'),
(150, 25, 54, 'expediente', 'anexar_resposta', 0, 1, '2019-10-30 09:39:13'),
(151, 25, 55, 'expediente', 'dashboard', 0, 1, '2019-11-05 15:39:41'),
(152, 27, 55, 'ofício', 'dashboard', 0, 1, '2019-11-05 15:39:59'),
(153, 29, 55, 'relatorio', 'dashboard', 0, 1, '2019-11-05 15:40:23'),
(154, 4, 55, 'utilizador', 'dashboard', 0, 1, '2019-11-05 15:40:46'),
(155, 31, 55, 'estatistica', 'dashboard', 0, 1, '2019-11-05 15:42:17'),
(156, 32, 55, 'buscador', 'dashboard', 0, 1, '2019-11-05 16:08:36'),
(157, 31, 56, 'estatistica', 'diaria', 0, 1, '2019-11-07 14:26:48'),
(158, 31, 57, 'estatistica', 'expediente', 0, 1, '2019-11-15 12:04:38'),
(159, 31, 58, 'estatistica', 'relatorio', 0, 1, '2019-11-15 12:04:39'),
(160, 31, 59, 'estatistica', 'expedientePordata', 0, 1, '2019-11-15 15:11:05'),
(161, 31, 60, 'estatistica', 'expediente_poroficial', 0, 1, '2019-11-17 16:21:31'),
(162, 26, 6, 'pessoa', 'detalhe', 0, 1, '2019-11-21 07:58:10'),
(163, 26, 61, 'pessoa', 'ficha', 0, 1, '2019-11-27 19:36:48'),
(164, 26, 62, 'pessoa', 'adiciona_info', 0, 1, '2019-12-01 13:38:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `morada`
--

CREATE TABLE `morada` (
  `id` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `estado` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `municipio`
--

INSERT INTO `municipio` (`id`, `nome`, `id_provincia`, `id_utilizador`, `data_criacao`) VALUES
(1, 'Belas', 1, 3, '2018-04-28 17:56:09'),
(2, 'Cacuaco', 1, 3, '2018-04-28 16:56:09'),
(3, 'Cazenga', 1, 3, '2018-04-28 16:56:09'),
(4, 'Icolo e Bengo', 1, 3, '2018-04-28 16:56:09'),
(5, 'Luanda', 1, 3, '2018-04-28 16:56:09'),
(6, 'Kilamba Kiaxi', 1, 3, '2018-04-28 16:56:09'),
(7, 'Talatona', 1, 3, '2018-04-28 16:56:09'),
(8, 'Quiçama', 1, 3, '2018-04-28 16:56:09'),
(9, 'Viana', 1, 3, '2018-04-28 16:56:09'),
(10, 'Ambriz', 2, 3, '2018-04-28 16:56:09'),
(11, 'Dande', 2, 3, '2018-04-28 16:56:09'),
(12, 'Dembos', 2, 3, '2018-04-28 16:56:09'),
(13, 'Bula Atumba', 2, 3, '2018-04-28 16:56:09'),
(14, 'Nambuangongo', 2, 3, '2018-04-28 16:56:09'),
(15, 'Pango Aluquém', 2, 3, '2018-04-28 16:56:09'),
(16, 'Balombo', 3, 3, '2018-04-28 16:56:09'),
(17, 'Baía Farta', 3, 3, '2018-04-28 16:56:09'),
(18, 'Benguela', 3, 3, '2018-04-28 16:56:09'),
(19, 'Bocoio', 3, 3, '2018-04-28 16:56:09'),
(20, 'Caimbambo', 3, 3, '2018-04-28 16:56:09'),
(21, 'Catumbela', 3, 3, '2018-04-28 16:56:09'),
(22, 'Chongorói', 3, 3, '2018-04-28 16:56:09'),
(23, 'Cubal', 3, 3, '2018-04-28 16:56:09'),
(24, 'Ganda', 3, 3, '2018-04-28 16:56:09'),
(25, 'Lobito', 3, 3, '2018-04-28 16:56:09'),
(26, 'Andulo', 4, 3, '2018-04-28 16:56:09'),
(27, 'Camacupa', 4, 3, '2018-04-28 16:56:09'),
(28, 'Catabola', 4, 3, '2018-04-28 16:56:09'),
(29, 'Chinguar', 4, 3, '2018-04-28 16:56:09'),
(30, 'Chitembo', 4, 3, '2018-04-28 16:56:09'),
(31, 'Cuemba', 4, 3, '2018-04-28 16:56:09'),
(32, 'Cunhinga', 4, 3, '2018-04-28 16:56:09'),
(33, 'Cuito', 4, 3, '2018-04-28 16:56:09'),
(34, 'Nharêa', 4, 3, '2018-04-28 16:56:09'),
(35, 'Belize', 5, 3, '2018-04-28 16:56:09'),
(36, 'Buco Zau', 5, 3, '2018-04-28 16:56:09'),
(37, 'Cabinda', 5, 3, '2018-04-28 16:56:09'),
(38, 'Cacongo', 5, 3, '2018-04-28 16:56:09'),
(39, 'Cahama', 6, 3, '2018-04-28 16:56:09'),
(40, 'Cuanhama', 6, 3, '2018-04-28 16:56:09'),
(41, 'Curoca', 6, 3, '2018-04-28 16:56:09'),
(42, 'Cuvelai', 6, 3, '2018-04-28 16:56:09'),
(43, 'Namacunde', 6, 3, '2018-04-28 16:56:09'),
(44, 'Ombadja', 6, 3, '2018-04-28 16:56:09'),
(45, 'Bailundo', 10, 3, '2018-04-28 16:56:09'),
(46, 'Cachiungo', 10, 3, '2018-04-28 16:56:09'),
(47, 'Caála', 10, 3, '2018-04-28 16:56:09'),
(48, 'Ecunha', 10, 3, '2018-04-28 16:56:09'),
(49, 'Huambo', 10, 3, '2018-04-28 16:56:09'),
(50, 'Londuimbali', 10, 3, '2018-04-28 16:56:09'),
(51, 'Longonjo', 10, 3, '2018-04-28 16:56:09'),
(52, 'Mungo', 10, 3, '2018-04-28 16:56:09'),
(53, 'Chicala Choloanga', 10, 3, '2018-04-28 16:56:09'),
(54, 'Chinjenje', 10, 3, '2018-04-28 16:56:09'),
(55, 'Ucuma', 10, 3, '2018-04-28 16:56:09'),
(56, 'Caconda', 11, 3, '2018-04-28 16:56:09'),
(57, 'Cacula', 11, 3, '2018-04-28 16:56:09'),
(58, 'Caluquembe', 11, 3, '2018-04-28 16:56:09'),
(59, 'Gambos', 11, 3, '2018-04-28 16:56:09'),
(60, 'Chibia', 11, 3, '2018-04-28 16:56:09'),
(61, 'Chicomba', 11, 3, '2018-04-28 16:56:09'),
(62, 'Chipindo', 11, 3, '2018-04-28 16:56:09'),
(63, 'Humpata', 11, 3, '2018-04-28 16:56:09'),
(64, 'Jamba', 11, 3, '2018-04-28 16:56:09'),
(65, 'Cuvango', 11, 3, '2018-04-28 16:56:09'),
(66, 'Lubango', 11, 3, '2018-04-28 16:56:09'),
(67, 'Matala', 11, 3, '2018-04-28 16:56:09'),
(68, 'Quilengues', 11, 3, '2018-04-28 16:56:09'),
(69, 'Quipungo', 11, 3, '2018-04-28 16:56:09'),
(70, 'Calai', 7, 3, '2018-04-28 16:56:09'),
(71, 'Cuangar', 7, 3, '2018-04-28 16:56:09'),
(72, 'Cuchi', 7, 3, '2018-04-28 16:56:09'),
(73, 'Cuito Cuanavale', 7, 3, '2018-04-28 16:56:09'),
(74, 'Dirico', 7, 3, '2018-04-28 16:56:09'),
(75, 'Nancova', 7, 3, '2018-04-28 16:56:09'),
(76, 'Mavinga', 7, 3, '2018-04-28 16:56:09'),
(77, 'Menongue', 7, 3, '2018-04-28 16:56:09'),
(78, 'Rivungo', 7, 3, '2018-04-28 16:56:09'),
(79, 'Ambaca', 8, 3, '2018-04-28 16:56:09'),
(80, 'Banga', 8, 3, '2018-04-28 16:56:09'),
(81, 'Bolongongo', 8, 3, '2018-04-28 16:56:09'),
(82, 'Cambambe', 8, 3, '2018-04-28 16:56:09'),
(83, 'Cazengo', 8, 3, '2018-04-28 16:56:09'),
(84, 'Golungo Alto', 8, 3, '2018-04-28 16:56:09'),
(85, 'Ngonguembo', 8, 3, '2018-04-28 16:56:09'),
(86, 'Lucala', 8, 3, '2018-04-28 16:56:09'),
(87, 'Quiculungo', 8, 3, '2018-04-28 16:56:09'),
(88, 'Samba Cajú', 8, 3, '2018-04-28 16:56:09'),
(89, 'Amboim', 9, 3, '2018-04-28 16:56:09'),
(90, 'Cassongue', 9, 3, '2018-04-28 16:56:09'),
(91, 'Conda', 9, 3, '2018-04-28 16:56:09'),
(92, 'Ebo', 9, 3, '2018-04-28 16:56:09'),
(93, 'Libolo', 9, 3, '2018-04-28 16:56:09'),
(94, 'Mussende', 9, 3, '2018-04-28 16:56:09'),
(95, 'Porto Amboim', 9, 3, '2018-04-28 16:56:09'),
(96, 'Quibala', 9, 3, '2018-04-28 16:56:09'),
(97, 'Quilenda', 9, 3, '2018-04-28 16:56:09'),
(98, 'Seles', 9, 3, '2018-04-28 16:56:09'),
(99, 'Sumbe', 9, 3, '2018-04-28 16:56:09'),
(100, 'Cela', 9, 3, '2018-04-28 16:56:09'),
(101, 'Cambulo', 12, 3, '2018-04-28 16:56:09'),
(102, 'Capenda Camulemba', 12, 3, '2018-04-28 16:56:09'),
(103, 'Caungula', 12, 3, '2018-04-28 16:56:09'),
(104, 'Chitato', 12, 3, '2018-04-28 16:56:09'),
(105, 'Cuango', 12, 3, '2018-04-28 16:56:09'),
(106, 'Cuilo', 12, 3, '2018-04-28 16:56:09'),
(107, 'Lubalo', 12, 3, '2018-04-28 16:56:09'),
(108, 'Lucapa', 12, 3, '2018-04-28 16:56:09'),
(109, 'Xá Muteba', 12, 3, '2018-04-28 16:56:09'),
(110, 'Lóvua', 12, 3, '2018-04-28 16:56:09'),
(111, 'Cacolo', 13, 3, '2018-04-28 16:56:09'),
(112, 'Dala', 13, 3, '2018-04-28 16:56:09'),
(113, 'Muconda', 13, 3, '2018-04-28 16:56:09'),
(114, 'Saurimo', 13, 3, '2018-04-28 16:56:09'),
(115, 'Cacuso', 14, 3, '2018-04-28 16:56:09'),
(116, 'Calandula', 14, 3, '2018-04-28 16:56:09'),
(117, 'Cambundi Catembo', 14, 3, '2018-04-28 16:56:09'),
(118, 'Cangandala', 14, 3, '2018-04-28 16:56:09'),
(119, 'Cahombo', 14, 3, '2018-04-28 16:56:09'),
(120, 'Kiwaba \'Zogi', 14, 3, '2018-04-28 16:56:09'),
(121, 'Cunda-Dia-Baze', 14, 3, '2018-04-28 16:56:09'),
(122, 'Luquembo', 14, 3, '2018-04-28 16:56:09'),
(123, 'Malanje', 14, 3, '2018-04-28 16:56:09'),
(124, 'Marimba', 14, 3, '2018-04-28 16:56:09'),
(125, 'Massango', 14, 3, '2018-04-28 16:56:09'),
(126, 'Caculama', 14, 3, '2018-04-28 16:56:09'),
(127, 'Quela', 14, 3, '2018-04-28 16:56:09'),
(128, 'Quirima', 14, 3, '2018-04-28 16:56:09'),
(129, 'Alto Zambeze', 15, 3, '2018-04-28 16:56:09'),
(130, 'Bundas', 15, 3, '2018-04-28 16:56:09'),
(131, 'Camanongue', 15, 3, '2018-04-28 16:56:09'),
(132, 'Cameia', 15, 3, '2018-04-28 16:56:09'),
(133, 'Luau', 15, 3, '2018-04-28 16:56:09'),
(134, 'Luacano', 15, 3, '2018-04-28 16:56:09'),
(135, 'Luchazes', 15, 3, '2018-04-28 16:56:09'),
(136, 'Léua', 15, 3, '2018-04-28 16:56:09'),
(137, 'Moxico', 15, 3, '2018-04-28 16:56:09'),
(138, 'Bibala', 16, 3, '2018-04-28 16:56:09'),
(139, 'Camacuio', 16, 3, '2018-04-28 16:56:09'),
(140, 'Moçâmedes', 16, 3, '2018-04-28 16:56:09'),
(141, 'Tômbwa', 16, 3, '2018-04-28 16:56:09'),
(142, 'Virei', 16, 3, '2018-04-28 16:56:09'),
(143, 'Alto Cauale', 17, 3, '2018-04-28 16:56:09'),
(144, 'Ambuíla', 17, 3, '2018-04-28 16:56:09'),
(145, 'Bembe', 17, 3, '2018-04-28 16:56:09'),
(146, 'Buengas', 17, 3, '2018-04-28 16:56:09'),
(147, 'Bungo', 17, 3, '2018-04-28 16:56:09'),
(148, 'Damba', 17, 3, '2018-04-28 16:56:09'),
(149, 'Milunga', 17, 3, '2018-04-28 16:56:09'),
(150, 'Mucaba', 17, 3, '2018-04-28 16:56:09'),
(151, 'Negage', 17, 3, '2018-04-28 16:56:09'),
(152, 'Puri', 17, 3, '2018-04-28 16:56:09'),
(153, 'Quimbele', 17, 3, '2018-04-28 16:56:09'),
(154, 'Dange Quitexe', 17, 3, '2018-04-28 16:56:09'),
(155, 'Pombo', 17, 3, '2018-04-28 16:56:09'),
(156, 'Songo', 17, 3, '2018-04-28 16:56:09'),
(157, 'Uíge', 17, 3, '2018-04-28 16:56:09'),
(158, 'Maquela do Zombo', 17, 3, '2018-04-28 16:56:09'),
(159, 'Cuimba', 18, 3, '2018-04-28 16:56:09'),
(160, 'Mbanza Kongo', 18, 3, '2018-04-28 16:56:09'),
(161, 'Nóqui', 18, 3, '2018-04-28 16:56:09'),
(162, 'Nzeto', 18, 3, '2018-04-28 16:56:09'),
(163, 'Soyo', 18, 3, '2018-04-28 16:56:09'),
(164, 'Tomboco', 18, 3, '2018-04-28 16:56:09'),
(165, 'Dundo', 12, 3, '2018-04-28 16:56:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `naturalidade`
--

CREATE TABLE `naturalidade` (
  `id` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oficio`
--

CREATE TABLE `oficio` (
  `id` int(11) NOT NULL,
  `id_proveniencia` int(11) NOT NULL,
  `objectivo` text NOT NULL,
  `id_destino` int(11) NOT NULL,
  `data_criacao` date NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `id` int(11) NOT NULL,
  `sigla` varchar(3) NOT NULL,
  `nome` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`id`, `sigla`, `nome`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'AS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua And Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas The'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CD', 'Congo The Democratic Republic Of The'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)'),
(54, 'HR', 'Croatia (Hrvatska)'),
(55, 'CU', 'Cuba'),
(56, 'CY', 'Cyprus'),
(57, 'CZ', 'Czech Republic'),
(58, 'DK', 'Denmark'),
(59, 'DJ', 'Djibouti'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'TP', 'East Timor'),
(63, 'EC', 'Ecuador'),
(64, 'EG', 'Egypt'),
(65, 'SV', 'El Salvador'),
(66, 'GQ', 'Equatorial Guinea'),
(67, 'ER', 'Eritrea'),
(68, 'EE', 'Estonia'),
(69, 'ET', 'Ethiopia'),
(70, 'XA', 'External Territories of Australia'),
(71, 'FK', 'Falkland Islands'),
(72, 'FO', 'Faroe Islands'),
(73, 'FJ', 'Fiji Islands'),
(74, 'FI', 'Finland'),
(75, 'FR', 'France'),
(76, 'GF', 'French Guiana'),
(77, 'PF', 'French Polynesia'),
(78, 'TF', 'French Southern Territories'),
(79, 'GA', 'Gabon'),
(80, 'GM', 'Gambia The'),
(81, 'GE', 'Georgia'),
(82, 'DE', 'Germany'),
(83, 'GH', 'Ghana'),
(84, 'GI', 'Gibraltar'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'XU', 'Guernsey and Alderney'),
(92, 'GN', 'Guinea'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HT', 'Haiti'),
(96, 'HM', 'Heard and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HK', 'Hong Kong S.A.R.'),
(99, 'HU', 'Hungary'),
(100, 'IS', 'Iceland'),
(101, 'IN', 'India'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'JM', 'Jamaica'),
(109, 'JP', 'Japan'),
(110, 'XJ', 'Jersey'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea North'),
(116, 'KR', 'Korea South'),
(117, 'KW', 'Kuwait'),
(118, 'KG', 'Kyrgyzstan'),
(119, 'LA', 'Laos'),
(120, 'LV', 'Latvia'),
(121, 'LB', 'Lebanon'),
(122, 'LS', 'Lesotho'),
(123, 'LR', 'Liberia'),
(124, 'LY', 'Libya'),
(125, 'LI', 'Liechtenstein'),
(126, 'LT', 'Lithuania'),
(127, 'LU', 'Luxembourg'),
(128, 'MO', 'Macau S.A.R.'),
(129, 'MK', 'Macedonia'),
(130, 'MG', 'Madagascar'),
(131, 'MW', 'Malawi'),
(132, 'MY', 'Malaysia'),
(133, 'MV', 'Maldives'),
(134, 'ML', 'Mali'),
(135, 'MT', 'Malta'),
(136, 'XM', 'Man (Isle of)'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'YT', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia'),
(144, 'MD', 'Moldova'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'MS', 'Montserrat'),
(148, 'MA', 'Morocco'),
(149, 'MZ', 'Mozambique'),
(150, 'MM', 'Myanmar'),
(151, 'NA', 'Namibia'),
(152, 'NR', 'Nauru'),
(153, 'NP', 'Nepal'),
(154, 'AN', 'Netherlands Antilles'),
(155, 'NL', 'Netherlands The'),
(156, 'NC', 'New Caledonia'),
(157, 'NZ', 'New Zealand'),
(158, 'NI', 'Nicaragua'),
(159, 'NE', 'Niger'),
(160, 'NG', 'Nigeria'),
(161, 'NU', 'Niue'),
(162, 'NF', 'Norfolk Island'),
(163, 'MP', 'Northern Mariana Islands'),
(164, 'NO', 'Norway'),
(165, 'OM', 'Oman'),
(166, 'PK', 'Pakistan'),
(167, 'PW', 'Palau'),
(168, 'PS', 'Palestinian Territory Occupied'),
(169, 'PA', 'Panama'),
(170, 'PG', 'Papua new Guinea'),
(171, 'PY', 'Paraguay'),
(172, 'PE', 'Peru'),
(173, 'PH', 'Philippines'),
(174, 'PN', 'Pitcairn Island'),
(175, 'PL', 'Poland'),
(176, 'PT', 'Portugal'),
(177, 'PR', 'Puerto Rico'),
(178, 'QA', 'Qatar'),
(179, 'RE', 'Reunion'),
(180, 'RO', 'Romania'),
(181, 'RU', 'Russia'),
(182, 'RW', 'Rwanda'),
(183, 'SH', 'Saint Helena'),
(184, 'KN', 'Saint Kitts And Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'PM', 'Saint Pierre and Miquelon'),
(187, 'VC', 'Saint Vincent And The Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'XG', 'Smaller Territories of the UK'),
(200, 'SB', 'Solomon Islands'),
(201, 'SO', 'Somalia'),
(202, 'ZA', 'South Africa'),
(203, 'GS', 'South Georgia'),
(204, 'SS', 'South Sudan'),
(205, 'ES', 'Spain'),
(206, 'LK', 'Sri Lanka'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard And Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syria'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad And Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks And Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States Minor Outlying Islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State (Holy See)'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (US)'),
(241, 'WF', 'Wallis And Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'YU', 'Yugoslavia'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(260) NOT NULL,
  `apelido` varchar(60) NOT NULL,
  `genero` enum('M','F') NOT NULL,
  `data_nasc` date NOT NULL,
  `numero_doc` varchar(20) NOT NULL,
  `nacionalidade` int(11) NOT NULL,
  `tipo` enum('0','1') NOT NULL,
  `foto` varchar(100) NOT NULL,
  `estado` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_expediente`
--

CREATE TABLE `pessoa_expediente` (
  `id` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `id_expediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posto`
--

CREATE TABLE `posto` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `id_criador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posto`
--

INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES
(1, 'Soldado', 1, '2019-01-06 14:27:13'),
(2, '2º Cabo', 1, '2019-01-06 14:27:13'),
(3, '1º Cabo', 1, '2019-01-06 14:27:13'),
(4, 'Sub Sargento', 1, '2019-01-06 14:27:13'),
(5, '2º Sargento', 1, '2019-01-06 14:27:13'),
(6, '1º Sargento', 1, '2019-01-06 14:27:13'),
(7, 'Aspirante', 1, '2019-01-06 14:27:13'),
(8, 'Sub Tenente', 1, '2019-01-06 14:27:13'),
(9, 'Tenente', 1, '2019-01-06 14:27:13'),
(10, 'Capitão', 1, '2019-01-06 14:29:25'),
(11, 'Major', 1, '2019-01-06 14:27:13'),
(12, 'Tenente Coronel', 1, '2019-01-06 14:27:13'),
(13, 'Coronel', 1, '2019-01-06 14:27:13'),
(14, 'Brigadeiro', 1, '2019-01-06 14:27:13'),
(15, 'Tenente General', 1, '2019-01-06 14:27:13'),
(16, 'Civil', 1, '2019-01-23 11:24:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `proveniencia`
--

CREATE TABLE `proveniencia` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `proveniencia`
--

INSERT INTO `proveniencia` (`id`, `nome`, `estado`, `id_utilizador`) VALUES
(1, 'Casa Civil', '1', 1),
(2, 'Secretaria Geral', '1', 1),
(3, 'Cerimonial', '1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `provincia`
--

CREATE TABLE `provincia` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sigla` varchar(2) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `provincia`
--

INSERT INTO `provincia` (`id`, `nome`, `sigla`, `longitude`, `latitude`, `id_utilizador`) VALUES
(1, 'Luanda', 'LA', -8.1933, 13.1933, 0),
(2, 'Bengo', 'BO', -8.1933, 13.1933, 0),
(3, 'Benguela', 'BA', -8.1933, 13.1933, 0),
(4, 'Bié', 'BE', -8.1933, 13.1933, 0),
(5, 'Cabinda', 'CA', -8.1933, 13.1933, 0),
(6, 'Cunene', 'CE', -8.1933, 13.1933, 0),
(7, 'Cuando Cubango', 'KK', -8.1933, 13.1933, 0),
(8, 'Cuanza Norte', 'KN', -8.1933, 13.1933, 0),
(9, 'Cuanza Sul', 'KS', -8.1933, 13.1933, 0),
(10, 'Huambo', 'HO', -8.1933, 13.1933, 0),
(11, 'Huíla', 'HA', -8.1933, 13.1933, 0),
(12, 'Lunda Norte', 'LN', -8.1933, 13.1933, 0),
(13, 'Lunda Sul', 'LS', -8.1933, 13.1933, 0),
(14, 'Malanje', 'ME', -8.1933, 13.1933, 0),
(15, 'Moxico', 'MO', -8.1933, 13.1933, 0),
(16, 'Namibe', 'NE', -8.1933, 13.1933, 0),
(17, 'Uíge', 'UE', -8.1933, 13.1933, 0),
(18, 'Zaire', 'ZE', -8.1933, 13.1933, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio`
--

CREATE TABLE `relatorio` (
  `id` int(11) NOT NULL,
  `ficheiro` varchar(125) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `ano` varchar(5) NOT NULL,
  `data_criacao` date NOT NULL,
  `estado` int(11) NOT NULL,
  `intervalo` varchar(50) NOT NULL,
  `id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `role`
--

INSERT INTO `role` (`id`, `nome`, `sigla`, `id_utilizador`, `data_criacao`) VALUES
(1, 'Master', 'ADMIN', 1, '2019-07-15 08:46:56'),
(7, 'SIAPO', 'SIA', 1, '2019-09-23 10:24:49'),
(8, 'SPOA', 'SPO', 1, '2019-09-26 20:54:47'),
(9, 'SOE', 'SOE', 1, '2019-09-26 20:54:58'),
(10, 'SOG', 'SOG', 1, '2019-09-26 20:55:04'),
(11, 'SOTV', 'SOT', 1, '2019-09-26 20:55:21'),
(12, 'SL', 'SL', 1, '2019-09-26 20:55:30'),
(13, 'SINSE', 'SIN', 1, '2019-09-27 10:56:48'),
(14, 'SIE', 'SIE', 1, '2019-09-27 10:57:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_menu_sub_menu`
--

CREATE TABLE `role_menu_sub_menu` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu_sub_menu` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `role_menu_sub_menu`
--

INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES
(2, 1, 2, 1, '2018-12-20 08:24:32'),
(3, 1, 3, 1, '2018-12-20 10:34:16'),
(4, 1, 4, 1, '2018-12-20 10:44:29'),
(5, 1, 6, 1, '2018-12-20 13:38:31'),
(6, 1, 7, 1, '2018-12-20 13:38:31'),
(7, 1, 8, 1, '2018-12-20 14:03:14'),
(15, 1, 13, 1, '2018-12-20 17:42:15'),
(48, 1, 44, 1, '2019-01-02 18:58:50'),
(49, 1, 45, 1, '2019-01-02 18:58:50'),
(50, 1, 43, 1, '2019-01-02 18:58:50'),
(51, 1, 42, 1, '2019-01-02 18:58:50'),
(96, 1, 76, 1, '2019-02-27 18:23:39'),
(127, 1, 75, 1, '2019-07-13 21:56:32'),
(128, 1, 77, 1, '2019-07-13 21:56:32'),
(177, 1, 127, 1, '2019-09-23 10:30:51'),
(178, 1, 128, 1, '2019-09-23 10:30:51'),
(179, 1, 126, 1, '2019-09-23 10:30:51'),
(180, 1, 125, 1, '2019-09-23 10:30:51'),
(181, 1, 129, 1, '2019-09-24 06:08:51'),
(182, 1, 130, 1, '2019-09-24 06:16:52'),
(183, 1, 133, 1, '2019-09-24 18:33:36'),
(184, 1, 134, 1, '2019-09-24 18:33:36'),
(185, 1, 132, 1, '2019-09-24 18:33:36'),
(193, 1, 135, 1, '2019-09-26 20:53:53'),
(194, 1, 136, 1, '2019-09-27 08:17:51'),
(195, 1, 137, 1, '2019-09-27 13:19:54'),
(196, 1, 141, 1, '2019-10-02 08:27:46'),
(197, 1, 140, 1, '2019-10-02 08:27:46'),
(198, 1, 138, 1, '2019-10-02 08:27:46'),
(199, 1, 139, 1, '2019-10-02 08:27:46'),
(200, 1, 142, 1, '2019-10-02 08:34:10'),
(201, 1, 146, 1, '2019-10-02 10:07:26'),
(202, 1, 144, 1, '2019-10-02 10:07:26'),
(203, 1, 145, 1, '2019-10-02 10:07:26'),
(204, 1, 143, 1, '2019-10-02 10:07:26'),
(205, 1, 147, 1, '2019-10-09 09:15:52'),
(207, 1, 148, 1, '2019-10-19 09:42:31'),
(208, 1, 149, 1, '2019-10-19 09:47:07'),
(209, 1, 150, 1, '2019-10-30 09:40:11'),
(210, 1, 155, 1, '2019-11-05 15:45:20'),
(211, 1, 151, 1, '2019-11-05 15:45:20'),
(212, 1, 152, 1, '2019-11-05 15:45:20'),
(213, 1, 154, 1, '2019-11-05 15:45:20'),
(214, 1, 153, 1, '2019-11-05 15:45:20'),
(215, 1, 156, 1, '2019-11-05 16:08:47'),
(216, 1, 157, 1, '2019-11-07 14:27:10'),
(217, 8, 156, 1, '2019-11-07 23:03:02'),
(218, 8, 155, 1, '2019-11-07 23:03:02'),
(219, 8, 157, 1, '2019-11-07 23:03:02'),
(220, 8, 129, 1, '2019-11-07 23:03:02'),
(221, 8, 150, 1, '2019-11-07 23:03:02'),
(222, 8, 151, 1, '2019-11-07 23:03:02'),
(223, 8, 130, 1, '2019-11-07 23:03:02'),
(224, 8, 127, 1, '2019-11-07 23:03:02'),
(225, 8, 128, 1, '2019-11-07 23:03:02'),
(226, 8, 126, 1, '2019-11-07 23:03:02'),
(227, 8, 149, 1, '2019-11-07 23:03:02'),
(228, 8, 125, 1, '2019-11-07 23:03:02'),
(229, 8, 132, 1, '2019-11-07 23:03:02'),
(230, 8, 153, 1, '2019-11-07 23:03:02'),
(231, 8, 146, 1, '2019-11-07 23:03:02'),
(232, 8, 144, 1, '2019-11-07 23:03:02'),
(233, 8, 145, 1, '2019-11-07 23:03:02'),
(234, 8, 143, 1, '2019-11-07 23:03:02'),
(235, 8, 142, 1, '2019-11-07 23:03:02'),
(236, 8, 147, 1, '2019-11-07 23:03:02'),
(237, 8, 152, 1, '2019-11-07 23:03:02'),
(238, 8, 137, 1, '2019-11-07 23:03:02'),
(239, 1, 158, 1, '2019-11-15 12:05:51'),
(240, 1, 159, 1, '2019-11-15 12:05:51'),
(241, 1, 160, 1, '2019-11-15 15:12:54'),
(242, 1, 161, 1, '2019-11-17 16:22:08'),
(243, 1, 162, 1, '2019-11-21 07:58:23'),
(244, 1, 163, 1, '2019-11-27 19:37:04'),
(245, 1, 164, 1, '2019-12-01 13:38:54'),
(246, 8, 164, 1, '2019-12-01 17:45:06'),
(247, 8, 162, 1, '2019-12-01 17:45:06'),
(248, 8, 163, 1, '2019-12-01 17:45:06'),
(249, 8, 133, 1, '2019-12-01 17:45:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `icon` varchar(25) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES
(1, 'novo', 'fa fa-edit', 1, '2018-12-20 11:51:04'),
(2, 'listar', 'fa fa-list', 1, '2018-12-20 08:17:58'),
(3, 'editar', 'fa fa-edit', 1, '2018-12-20 08:17:58'),
(4, 'eliminar', 'fa fa-trash', 1, '2018-12-20 08:17:58'),
(5, 'add_privilegio', 'fa fa-cogs', 1, '2018-12-20 14:01:51'),
(6, 'detalhe', 'fa fa-eye', 1, '2018-12-24 21:55:44'),
(7, 'Listagem PDF', 'fa fa-file-pdf-o', 1, '2018-12-26 20:06:25'),
(10, 'adicionar cargo', 'fa fa-paste', 1, '2019-01-03 17:30:16'),
(15, 'add_conta', 'fa fa-user-plus', 1, '2019-01-29 06:57:44'),
(19, 'descrição', 'fa fa-list', 1, '2019-02-01 09:05:36'),
(43, 'Adicionar Pessoa', 'fa fa-user-plus', 1, '2019-09-24 06:07:28'),
(44, 'Comprovação', 'fa fa-eye', 1, '2019-09-26 20:50:52'),
(45, 'Mensal', 'fa fa-calendar', 1, '2019-10-02 08:25:40'),
(46, 'Semanal', 'fa fa-calendar', 1, '2019-10-02 08:25:52'),
(47, 'Trimestral', 'fa fa-calendar', 1, '2019-10-02 08:26:19'),
(48, 'Semestral', 'fa fa-calendar', 1, '2019-10-02 08:26:30'),
(49, 'Anual', 'fa fa-calendar', 1, '2019-10-02 08:27:24'),
(50, 'Pesquisar', 'fa fa-search', 1, '2019-10-09 09:14:40'),
(51, 'Configurar', 'fa fa-cog', 1, '2019-10-19 09:33:25'),
(52, 'Tipo Documento', 'fa fa-file', 1, '2019-10-19 09:40:34'),
(53, 'Listar Tipo Documento', 'fa fa-list', 1, '2019-10-19 09:43:28'),
(54, 'Anexar Resposta', 'fa fa-file', 1, '2019-10-30 09:38:43'),
(55, 'dashboard', 'fa fa-chart-pie', 1, '2019-11-05 15:39:21'),
(56, 'diaria', 'fa fa-calendar', 1, '2019-11-07 14:26:07'),
(57, 'expediente', 'fa fa-book', 1, '2019-11-15 12:02:38'),
(58, 'relatorio', 'fa fa-book', 1, '2019-11-15 12:03:17'),
(59, 'expedientePordata', 'fa fa-book', 1, '2019-11-15 14:57:57'),
(60, 'expediente_porOficial', 'fa fa-bar-chart', 1, '2019-11-17 16:20:59'),
(61, 'ficha', 'fa fa-file-pdf', 1, '2019-11-27 19:36:00'),
(62, 'Adicionar Informação', 'fa fa-info', 1, '2019-12-01 13:37:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id`, `descricao`, `data_criacao`, `id_utilizador`) VALUES
(1, 'Informação Operativa', '2019-10-20 09:47:35', 1),
(2, 'Informação de Ocorrência', '2019-10-16 16:22:32', 1),
(3, 'B.E.O.C', '2019-10-16 16:22:32', 1),
(4, 'Informação de Alerta', '2019-10-16 16:22:32', 1),
(5, 'Carta Informativa', '2019-10-16 16:22:32', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `id_tipo`, `id_documento`, `id_utilizador`, `data_criacao`) VALUES
(1, 1, 1, 1, '2019-10-30 08:54:48'),
(2, 1, 2, 1, '2019-10-30 08:54:48'),
(3, 1, 3, 1, '2019-10-30 08:54:48'),
(4, 2, 4, 1, '2019-10-30 08:54:58'),
(5, 3, 4, 1, '2019-10-30 08:55:13'),
(6, 4, 4, 1, '2019-10-30 08:55:28'),
(7, 5, 4, 1, '2019-10-30 08:55:54'),
(8, 2, 1, 1, '2019-10-30 11:06:46'),
(9, 1, 5, 1, '2019-11-25 10:01:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_teste`
--

CREATE TABLE `user_teste` (
  `id` int(11) NOT NULL,
  `id_cidadao` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL,
  `fotografia` varchar(70) NOT NULL,
  `estado` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_teste`
--

INSERT INTO `user_teste` (`id`, `id_cidadao`, `user`, `senha`, `id_role`, `fotografia`, `estado`) VALUES
(1, 0, 'Hacker Xp', 'Malaquias4#', 1, 'padrao.jpg', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `viatura`
--

CREATE TABLE `viatura` (
  `id` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `cor` varchar(30) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `estado` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinatario`
--
ALTER TABLE `destinatario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emprego`
--
ALTER TABLE `emprego`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expediente_documento`
--
ALTER TABLE `expediente_documento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informacao_extra`
--
ALTER TABLE `informacao_extra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_sub_menu`
--
ALTER TABLE `menu_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `morada`
--
ALTER TABLE `morada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naturalidade`
--
ALTER TABLE `naturalidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oficio`
--
ALTER TABLE `oficio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pessoa_expediente`
--
ALTER TABLE `pessoa_expediente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posto`
--
ALTER TABLE `posto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proveniencia`
--
ALTER TABLE `proveniencia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relatorio`
--
ALTER TABLE `relatorio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_menu_sub_menu`
--
ALTER TABLE `role_menu_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_teste`
--
ALTER TABLE `user_teste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viatura`
--
ALTER TABLE `viatura`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `destinatario`
--
ALTER TABLE `destinatario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documento`
--
ALTER TABLE `documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emprego`
--
ALTER TABLE `emprego`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `escola`
--
ALTER TABLE `escola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expediente_documento`
--
ALTER TABLE `expediente_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informacao_extra`
--
ALTER TABLE `informacao_extra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `menu_sub_menu`
--
ALTER TABLE `menu_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `morada`
--
ALTER TABLE `morada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `naturalidade`
--
ALTER TABLE `naturalidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oficio`
--
ALTER TABLE `oficio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pessoa_expediente`
--
ALTER TABLE `pessoa_expediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posto`
--
ALTER TABLE `posto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `proveniencia`
--
ALTER TABLE `proveniencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `relatorio`
--
ALTER TABLE `relatorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `role_menu_sub_menu`
--
ALTER TABLE `role_menu_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_teste`
--
ALTER TABLE `user_teste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `viatura`
--
ALTER TABLE `viatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
