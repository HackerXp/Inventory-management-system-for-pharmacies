-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 27-Dez-2019 às 07:43
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
-- Database: `gest-farma-usp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `id_utilizador`, `data_criacao`) VALUES
(1, 'Comprimido', 2, '2019-12-21 15:23:12'),
(2, 'Xarope', 2, '2018-12-20 15:30:30'),
(3, 'Pomada', 2, '2018-12-20 15:31:43'),
(4, 'Gastaveis', 1, '2018-12-25 08:12:48'),
(5, 'Injecção', 1, '2018-12-25 13:32:32'),
(6, 'Fio de Sutura', 1, '2018-12-29 12:11:00'),
(7, 'Soro', 1, '2019-12-21 15:23:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidadao`
--

CREATE TABLE `cidadao` (
  `id` int(11) NOT NULL,
  `id_entidade` int(11) NOT NULL,
  `tipo` varchar(5) NOT NULL,
  `id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cidadao`
--

INSERT INTO `cidadao` (`id`, `id_entidade`, `tipo`, `id_utilizador`) VALUES
(1, 8, 'md', 1),
(2, 4, 'md', 1),
(3, 5, 'md', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estante`
--

CREATE TABLE `estante` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `data_adicao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estante`
--

INSERT INTO `estante` (`id`, `codigo`, `id_categoria`, `data_adicao`, `estado`) VALUES
(1, 'COM-00001', 1, '2019-12-23 21:04:42', '1'),
(2, 'XAR-00002', 2, '2019-12-23 20:46:52', '1'),
(3, 'POM-00003', 3, '2019-12-23 20:46:52', '1'),
(4, 'GAS-00004', 4, '2019-12-23 20:46:52', '1'),
(5, 'INJ-00005', 5, '2019-12-23 20:46:52', '1'),
(6, 'FIO-00006', 6, '2019-12-23 20:46:52', '1'),
(7, 'SOR-00007', 7, '2019-12-23 20:46:52', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `qtde_retalho` int(11) NOT NULL,
  `qtde_grosso` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `data_modificacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `qtde_retalho`, `qtde_grosso`, `id_producto`, `data_modificacao`) VALUES
(1, 978, 99, 1, '2019-12-27 00:00:14'),
(2, 1791, 160, 2, '2019-12-27 00:00:14'),
(3, 7995, 800, 3, '2019-12-23 15:21:00'),
(4, 9999, 100, 4, '2019-12-23 15:31:01'),
(5, 898, 60, 5, '2019-12-23 19:50:19'),
(6, 50, 10, 6, '2019-12-25 07:46:35'),
(7, 498, 5, 7, '2019-12-25 07:41:13'),
(8, 594, 59, 8, '2019-12-27 00:00:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `nif` varchar(16) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `nif`, `telefone`, `estado`, `id_utilizador`, `data_criacao`) VALUES
(1, 'AngoMed', '002392', '923908070', '1', 1, '2019-12-22'),
(2, 'Ango - Farma', '002831985KS031', '923123456', '1', 1, '2019-12-22'),
(3, 'Mateus', '00829392', '(+244) 937 43', '1', 1, '2019-12-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
--

CREATE TABLE `funcao` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `id_criador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcao`
--

INSERT INTO `funcao` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES
(1, 'Médico', 1, '2019-01-02 19:04:27'),
(2, 'Enfermeiro', 1, '2019-01-02 21:49:27'),
(3, 'Atirador', 1, '2019-01-02 21:49:48'),
(4, 'Oficial Operativo', 1, '2019-01-02 21:50:16'),
(5, 'Operador de Informática', 1, '2019-01-02 21:50:37'),
(6, 'Cmdte de Secção', 1, '2019-01-02 21:51:18'),
(7, 'Cmdte de Pelotão', 1, '2019-01-02 21:51:25'),
(8, 'Cmdte de CIA', 1, '2019-01-02 21:51:33'),
(9, 'Atirador Cabo', 1, '2019-01-02 21:51:48'),
(10, 'Cabo Atirador', 1, '2019-01-02 21:51:54'),
(11, 'Teste de Cargo', 1, '2019-04-30 12:47:08');

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
(1, 'Funcionalidade', 'fa fa-cog', 1, '2019-12-20 19:19:06'),
(2, 'Sub Menu', 'fa fa-list-ul', 1, '2019-12-20 19:19:06'),
(3, 'Utilizador', 'fa fa-user', 1, '2019-12-20 19:19:06'),
(4, 'Grupo', 'fa fa-users', 1, '2019-12-20 19:19:06'),
(6, 'Produto', 'fa fa-list', 1, '2019-12-20 20:46:43'),
(7, 'Venda', 'fa fa-shopping-cart', 1, '2019-12-21 15:30:16'),
(8, 'Fornecedor', 'fa fa-home', 1, '2019-12-22 10:23:25'),
(9, 'Estoque', 'fa fa-recycle', 1, '2019-12-22 12:43:16'),
(10, 'Estatística', 'fa fa-chart-line', 1, '2019-12-23 11:45:25'),
(11, 'Estante', 'fa fa-list', 1, '2019-12-23 20:33:49');

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
(1, 1, 1, 'menu', 'novo', 1, 1, '2019-12-20 19:44:23'),
(2, 1, 2, 'menu', 'listar', 0, 0, '2019-12-20 19:44:38'),
(3, 1, 3, 'menu', 'editar', 0, 1, '2019-12-20 19:44:28'),
(4, 1, 4, 'menu', 'eliminar', 1, 1, '2019-12-20 19:44:32'),
(5, 4, 1, 'grupo', 'novo', 1, 1, '2019-12-20 20:15:54'),
(6, 4, 2, 'grupo', 'listar', 0, 1, '2019-12-20 20:15:54'),
(7, 4, 5, 'grupo', 'add_privilegio', 0, 1, '2019-12-20 20:15:54'),
(8, 2, 1, 'sub_menu', 'novo', 1, 1, '2019-12-20 20:19:17'),
(9, 6, 1, 'produto', 'novo', 0, 1, '2019-12-20 20:47:44'),
(10, 6, 2, 'produto', 'listar', 0, 1, '2019-12-20 20:47:44'),
(11, 6, 3, 'produto', 'editar', 0, 1, '2019-12-20 20:47:44'),
(12, 6, 4, 'produto', 'eliminar', 1, 1, '2019-12-21 12:44:49'),
(13, 7, 1, 'venda', 'novo', 0, 1, '2019-12-21 15:28:55'),
(14, 7, 2, 'venda', 'listar', 0, 1, '2019-12-21 15:28:55'),
(15, 7, 3, 'venda', 'editar', 0, 1, '2019-12-21 15:28:55'),
(16, 7, 4, 'venda', 'eliminar', 1, 1, '2019-12-21 22:06:54'),
(17, 6, 6, 'produto', 'estoque', 0, 1, '2019-12-21 21:31:50'),
(18, 7, 7, 'venda', 'detalhe', 0, 1, '2019-12-21 22:05:07'),
(19, 8, 1, 'fornecedor', 'novo', 1, 1, '2019-12-22 10:24:48'),
(20, 8, 2, 'fornecedor', 'listar', 0, 1, '2019-12-22 10:24:02'),
(21, 8, 3, 'fornecedor', 'editar', 1, 1, '2019-12-22 10:24:54'),
(22, 8, 4, 'fornecedor', 'eliminar', 1, 1, '2019-12-22 10:24:56'),
(23, 9, 8, 'estoque', 'movimento', 0, 1, '2019-12-22 12:44:31'),
(24, 3, 1, 'utilizador', 'novo', 1, 1, '2019-12-23 12:03:49'),
(25, 3, 2, 'utilizador', 'listar', 0, 1, '2019-12-23 11:54:27'),
(26, 3, 3, 'utilizador', 'editar', 1, 1, '2019-12-23 12:03:55'),
(27, 3, 4, 'utilizador', 'eliminar', 1, 1, '2019-12-23 12:04:17'),
(28, 11, 1, 'estante', 'novo', 1, 1, '2019-12-23 20:01:41'),
(29, 11, 2, 'estante', 'listar', 0, 1, '2019-12-23 20:01:00'),
(30, 11, 3, 'estante', 'editar', 1, 1, '2019-12-23 20:01:48'),
(31, 11, 4, 'estante', 'eliminar', 1, 1, '2019-12-23 20:01:51'),
(32, 11, 9, 'estante', 'ticket', 0, 1, '2019-12-23 20:44:09'),
(33, 6, 10, 'produto', 'requisicao', 0, 1, '2019-12-25 07:58:24'),
(34, 6, 11, 'produto', 'estoque_', 0, 1, '2019-12-25 08:28:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movivento_estoque`
--

CREATE TABLE `movivento_estoque` (
  `id` int(11) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `num_factura` varchar(17) NOT NULL,
  `qtde_grosso` int(11) NOT NULL,
  `qtde_retalho` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `movivento_estoque`
--

INSERT INTO `movivento_estoque` (`id`, `id_fornecedor`, `id_producto`, `num_factura`, `qtde_grosso`, `qtde_retalho`, `data_criacao`, `id_utilizador`) VALUES
(1, 1, 1, 'MT0182', 100, 1000, '2019-12-21 23:00:00', 1),
(2, 1, 2, 'MT0186', 100, 0, '2019-12-21 23:00:00', 1),
(3, 2, 2, 'MT0187', 60, 1800, '2019-12-21 23:00:00', 1),
(4, 2, 3, 'MT0180', 800, 8000, '2019-12-22 23:00:00', 1),
(5, 1, 4, 'MT0181', 100, 10000, '2019-12-22 23:00:00', 2),
(6, 2, 5, 'YH-019', 60, 900, '2019-12-22 23:00:00', 1),
(7, 1, 7, '', 5, 500, '2019-12-24 23:00:00', 1),
(8, 3, 6, '1223', 10, 50, '2019-12-24 23:00:00', 1),
(9, 2, 8, 'MT0180', 60, 600, '2019-12-26 23:00:00', 1);

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

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `apelido`, `genero`, `data_nasc`, `numero_doc`, `nacionalidade`, `tipo`, `foto`, `estado`) VALUES
(1, 'Neusa Joaquim Lourenço', 'Neusa', 'F', '1989-02-21', '093393439HA493', 6, '1', 'padrao.jpg', '1'),
(2, 'Albertina Tarciane Anacleto de Sousa', 'Tarciane', 'F', '2015-08-26', '0019289191LA019', 2, '0', 'zamith.jpg', '1');

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
-- Estrutura da tabela `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `codigo` varchar(15) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `data_fabrico` date NOT NULL,
  `data_expir` date NOT NULL,
  `id_estante` int(11) NOT NULL,
  `qtde_critica` int(11) NOT NULL,
  `qtde_grosso` int(11) NOT NULL,
  `data_adicao` date NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `producto`
--

INSERT INTO `producto` (`id`, `nome`, `codigo`, `id_categoria`, `data_fabrico`, `data_expir`, `id_estante`, `qtde_critica`, `qtde_grosso`, `data_adicao`, `estado`, `preco`) VALUES
(1, 'Paracetamol', 'PARAC-443', 1, '2019-09-21', '2021-09-19', 1, 5, 10, '2019-12-22', '1', 0),
(2, 'Ácido Naldico', 'ÁCIDO-251', 1, '2019-09-21', '2021-09-19', 1, 5, 30, '2019-12-22', '1', 0),
(3, 'Zensoft', 'ZENSO-15', 2, '2019-09-21', '2021-09-19', 2, 5, 10, '2019-12-23', '1', 0),
(4, 'Multivitamina', 'MULTI-741', 2, '2015-11-12', '2023-06-06', 2, 5, 100, '2019-12-23', '1', 0),
(5, 'Neomycina', 'NEOMY-1788', 3, '2017-01-31', '2021-07-07', 3, 5, 15, '2019-12-23', '1', 0),
(6, 'Metronidazol', 'METRO-1986', 1, '2018-06-06', '2022-06-15', 1, 5, 5, '2019-12-23', '1', 0),
(7, 'Ampicilina', 'AMPIC-718', 1, '2012-07-05', '2020-12-17', 1, 5, 100, '2019-12-25', '1', 0),
(8, 'Ampicilina 500 mg', '201900', 5, '2014-06-03', '2019-12-10', 5, 5, 10, '2019-12-27', '1', 0);

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
(1, 'Admin', 'ADM', 0, '2019-12-20 19:00:26'),
(2, 'FARMACÊUTICO', 'FAR', 1, '2019-12-20 20:35:48');

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
(1, 1, 1, 1, '2019-12-20 19:33:01'),
(2, 1, 2, 1, '2019-12-20 19:33:01'),
(3, 1, 3, 1, '2019-12-20 19:33:01'),
(4, 1, 4, 1, '2019-12-20 19:33:01'),
(5, 1, 5, 1, '2019-12-20 20:17:00'),
(6, 1, 6, 1, '2019-12-20 20:17:00'),
(7, 1, 7, 1, '2019-12-20 20:17:00'),
(8, 1, 8, 1, '2019-12-20 20:19:36'),
(9, 1, 11, 1, '2019-12-20 20:48:05'),
(10, 1, 12, 1, '2019-12-20 20:48:05'),
(11, 1, 10, 1, '2019-12-20 20:48:05'),
(12, 1, 9, 1, '2019-12-20 20:48:05'),
(14, 1, 16, 1, '2019-12-21 15:29:17'),
(15, 1, 14, 1, '2019-12-21 15:29:17'),
(16, 1, 13, 1, '2019-12-21 15:29:17'),
(17, 1, 17, 1, '2019-12-21 21:32:28'),
(18, 1, 18, 1, '2019-12-21 22:05:19'),
(19, 1, 21, 1, '2019-12-22 10:24:25'),
(20, 1, 22, 1, '2019-12-22 10:24:25'),
(21, 1, 20, 1, '2019-12-22 10:24:25'),
(22, 1, 19, 1, '2019-12-22 10:24:25'),
(23, 1, 23, 1, '2019-12-22 12:45:14'),
(24, 1, 26, 1, '2019-12-23 11:54:43'),
(25, 1, 27, 1, '2019-12-23 11:54:43'),
(26, 1, 25, 1, '2019-12-23 11:54:43'),
(27, 1, 24, 1, '2019-12-23 11:54:43'),
(28, 2, 23, 1, '2019-12-23 12:34:16'),
(29, 2, 21, 1, '2019-12-23 12:34:16'),
(30, 2, 22, 1, '2019-12-23 12:34:16'),
(31, 2, 20, 1, '2019-12-23 12:34:16'),
(32, 2, 19, 1, '2019-12-23 12:34:16'),
(33, 2, 11, 1, '2019-12-23 12:34:16'),
(34, 2, 12, 1, '2019-12-23 12:34:16'),
(35, 2, 17, 1, '2019-12-23 12:34:16'),
(36, 2, 10, 1, '2019-12-23 12:34:16'),
(37, 2, 9, 1, '2019-12-23 12:34:16'),
(38, 2, 18, 1, '2019-12-23 12:34:16'),
(39, 2, 15, 1, '2019-12-23 12:34:16'),
(40, 2, 14, 1, '2019-12-23 12:34:16'),
(41, 2, 13, 1, '2019-12-23 12:34:16'),
(43, 1, 31, 1, '2019-12-23 20:02:34'),
(44, 1, 29, 1, '2019-12-23 20:02:34'),
(45, 1, 28, 1, '2019-12-23 20:02:34'),
(46, 1, 32, 1, '2019-12-23 20:44:26'),
(47, 1, 33, 1, '2019-12-25 07:58:43'),
(48, 1, 34, 1, '2019-12-25 08:29:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES
(1, 'novo', 'fa fa-edit', 1, '2019-12-20 19:20:53'),
(2, 'listar', 'fa fa-list', 1, '2019-12-20 19:20:53'),
(3, 'editar', 'fa fa-edit', 1, '2019-12-20 19:20:53'),
(4, 'eliminar', 'fa fa-trash', 1, '2019-12-20 19:20:53'),
(5, 'add_privilegio', 'fa fa-cogs', 1, '2019-12-20 21:22:28'),
(6, 'Estoque', 'fa fa-recycle ', 1, '2019-12-25 08:16:19'),
(7, 'detalhe', 'fa fa-eye', 1, '2019-12-21 22:04:50'),
(8, 'movimento', 'fa fa-exchange', 1, '2019-12-22 12:44:01'),
(9, 'ticket', 'fa fa-file', 1, '2019-12-23 20:43:25'),
(10, 'Requisição', 'fa fa-file-pdf-o', 1, '2019-12-25 07:57:48'),
(11, 'estoque', 'fa fa-recycle ', 1, '2019-12-25 08:30:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_teste`
--

CREATE TABLE `user_teste` (
  `id` int(11) NOT NULL,
  `id_cidadao` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `user` varchar(30) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL,
  `fotografia` varchar(70) NOT NULL,
  `estado` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_teste`
--

INSERT INTO `user_teste` (`id`, `id_cidadao`, `nome`, `user`, `senha`, `id_role`, `fotografia`, `estado`) VALUES
(1, 0, 'Élvio Sadoc da Silva e Sousa', 'Hacker Xp', 'Malaquias4', 1, 'pdc_plus-7c45ba5cdadbfc807a3e96e5ac1953ad.jpg', '1'),
(2, 1, 'Augusto Zage Capemba', 'augusto.capemba', '123456', 2, '71279822_1944316042390308_2060332615465959424_n.jpg', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `qtde_prod` int(11) NOT NULL,
  `valor_total` float NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `comprador` varchar(90) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id`, `qtde_prod`, `valor_total`, `id_utilizador`, `comprador`, `data_criacao`, `estado`) VALUES
(1, 3, 2790, 1, 'Anônimo', '2019-12-23 19:50:19', '1'),
(2, 2, 0, 1, 'Anônimo', '2019-12-25 07:41:13', '1'),
(3, 3, 0, 1, 'Anônimo', '2019-12-27 00:00:14', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_produto`
--

CREATE TABLE `venda_produto` (
  `id` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtde_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda_produto`
--

INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 1),
(3, 1, 5, 2),
(4, 2, 7, 2),
(5, 2, 1, 1),
(6, 3, 8, 6),
(7, 3, 1, 1),
(8, 3, 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cidadao`
--
ALTER TABLE `cidadao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estante`
--
ALTER TABLE `estante`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcao`
--
ALTER TABLE `funcao`
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
-- Indexes for table `movivento_estoque`
--
ALTER TABLE `movivento_estoque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posto`
--
ALTER TABLE `posto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
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
-- Indexes for table `user_teste`
--
ALTER TABLE `user_teste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venda_produto`
--
ALTER TABLE `venda_produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cidadao`
--
ALTER TABLE `cidadao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `estante`
--
ALTER TABLE `estante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `funcao`
--
ALTER TABLE `funcao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu_sub_menu`
--
ALTER TABLE `menu_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `movivento_estoque`
--
ALTER TABLE `movivento_estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posto`
--
ALTER TABLE `posto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_menu_sub_menu`
--
ALTER TABLE `role_menu_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_teste`
--
ALTER TABLE `user_teste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venda_produto`
--
ALTER TABLE `venda_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
