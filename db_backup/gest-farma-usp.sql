#
# TABLE STRUCTURE FOR: categoria
#

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO `categoria` (`id`, `nome`, `id_utilizador`, `data_criacao`) VALUES (1, 'Comprimido', 2, '2019-12-21 16:23:12');
INSERT INTO `categoria` (`id`, `nome`, `id_utilizador`, `data_criacao`) VALUES (2, 'Xarope', 2, '2018-12-20 16:30:30');
INSERT INTO `categoria` (`id`, `nome`, `id_utilizador`, `data_criacao`) VALUES (3, 'Pomada', 2, '2018-12-20 16:31:43');
INSERT INTO `categoria` (`id`, `nome`, `id_utilizador`, `data_criacao`) VALUES (4, 'Gastaveis', 1, '2018-12-25 09:12:48');
INSERT INTO `categoria` (`id`, `nome`, `id_utilizador`, `data_criacao`) VALUES (5, 'Injecção', 1, '2018-12-25 14:32:32');
INSERT INTO `categoria` (`id`, `nome`, `id_utilizador`, `data_criacao`) VALUES (6, 'Fio de Sutura', 1, '2018-12-29 13:11:00');
INSERT INTO `categoria` (`id`, `nome`, `id_utilizador`, `data_criacao`) VALUES (15, 'Teste', 1, '2020-02-08 20:55:24');


#
# TABLE STRUCTURE FOR: cidadao
#

DROP TABLE IF EXISTS `cidadao`;

CREATE TABLE `cidadao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entidade` int(11) NOT NULL,
  `tipo` varchar(5) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `cidadao` (`id`, `id_entidade`, `tipo`, `id_utilizador`) VALUES (1, 8, 'md', 1);
INSERT INTO `cidadao` (`id`, `id_entidade`, `tipo`, `id_utilizador`) VALUES (2, 4, 'md', 1);
INSERT INTO `cidadao` (`id`, `id_entidade`, `tipo`, `id_utilizador`) VALUES (3, 5, 'md', 1);


#
# TABLE STRUCTURE FOR: estante
#

DROP TABLE IF EXISTS `estante`;

CREATE TABLE `estante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `data_adicao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `estante` (`id`, `codigo`, `id_categoria`, `data_adicao`, `estado`) VALUES (1, 'COM-00001', 1, '2019-12-23 22:04:42', '1');
INSERT INTO `estante` (`id`, `codigo`, `id_categoria`, `data_adicao`, `estado`) VALUES (2, 'XAR-00002', 2, '2019-12-23 21:46:52', '1');
INSERT INTO `estante` (`id`, `codigo`, `id_categoria`, `data_adicao`, `estado`) VALUES (3, 'POM-00003', 3, '2019-12-23 21:46:52', '1');
INSERT INTO `estante` (`id`, `codigo`, `id_categoria`, `data_adicao`, `estado`) VALUES (4, 'GAS-00004', 4, '2019-12-23 21:46:52', '1');
INSERT INTO `estante` (`id`, `codigo`, `id_categoria`, `data_adicao`, `estado`) VALUES (5, 'INJ-00005', 5, '2019-12-23 21:46:52', '1');
INSERT INTO `estante` (`id`, `codigo`, `id_categoria`, `data_adicao`, `estado`) VALUES (6, 'FIO-00006', 6, '2019-12-23 21:46:52', '1');
INSERT INTO `estante` (`id`, `codigo`, `id_categoria`, `data_adicao`, `estado`) VALUES (7, 'SOR-00007', 7, '2019-12-23 21:46:52', '1');


#
# TABLE STRUCTURE FOR: estoque
#

DROP TABLE IF EXISTS `estoque`;

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qtde_retalho` int(11) NOT NULL,
  `qtde_grosso` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `data_modificacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `estoque` (`id`, `qtde_retalho`, `qtde_grosso`, `id_producto`, `data_modificacao`) VALUES (1, 234, 23, 1, '2020-02-06 20:56:42');
INSERT INTO `estoque` (`id`, `qtde_retalho`, `qtde_grosso`, `id_producto`, `data_modificacao`) VALUES (2, 24, 3, 2, '2020-01-12 23:18:18');
INSERT INTO `estoque` (`id`, `qtde_retalho`, `qtde_grosso`, `id_producto`, `data_modificacao`) VALUES (3, 379, 38, 3, '2020-01-12 23:17:35');
INSERT INTO `estoque` (`id`, `qtde_retalho`, `qtde_grosso`, `id_producto`, `data_modificacao`) VALUES (4, 63, 6, 4, '2020-01-12 23:15:27');
INSERT INTO `estoque` (`id`, `qtde_retalho`, `qtde_grosso`, `id_producto`, `data_modificacao`) VALUES (5, 55, 6, 5, '2020-01-12 23:15:27');
INSERT INTO `estoque` (`id`, `qtde_retalho`, `qtde_grosso`, `id_producto`, `data_modificacao`) VALUES (6, 80, 8, 6, '2020-01-16 22:17:52');


#
# TABLE STRUCTURE FOR: fornecedor
#

DROP TABLE IF EXISTS `fornecedor`;

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `nif` varchar(16) NOT NULL,
  `telefone` varchar(18) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `fornecedor` (`id`, `nome`, `nif`, `telefone`, `estado`, `id_utilizador`, `data_criacao`) VALUES (1, 'AngoMed', '002392', '(+244) 923 908 070', '1', 1, '2019-12-22');
INSERT INTO `fornecedor` (`id`, `nome`, `nif`, `telefone`, `estado`, `id_utilizador`, `data_criacao`) VALUES (2, 'Ango - Farma', '002831985', '(+244) 923 123 456', '1', 1, '2019-12-22');
INSERT INTO `fornecedor` (`id`, `nome`, `nif`, `telefone`, `estado`, `id_utilizador`, `data_criacao`) VALUES (3, 'Mateus', '00829392', '(+244) 937 437 878', '1', 1, '2019-12-25');
INSERT INTO `fornecedor` (`id`, `nome`, `nif`, `telefone`, `estado`, `id_utilizador`, `data_criacao`) VALUES (4, 'Teste mais um', '00283239229ME019', '(+244) 912 834 873', '1', 1, '2020-02-06');


#
# TABLE STRUCTURE FOR: funcao
#

DROP TABLE IF EXISTS `funcao`;

CREATE TABLE `funcao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `id_criador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `funcao` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (1, 'Médico', 1, '2019-01-02 20:04:27');
INSERT INTO `funcao` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (2, 'Enfermeiro', 1, '2019-01-02 22:49:27');
INSERT INTO `funcao` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (3, 'Atirador', 1, '2019-01-02 22:49:48');
INSERT INTO `funcao` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (4, 'Oficial Operativo', 1, '2019-01-02 22:50:16');
INSERT INTO `funcao` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (5, 'Operador de Informática', 1, '2019-01-02 22:50:37');
INSERT INTO `funcao` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (6, 'Cmdte de Secção', 1, '2019-01-02 22:51:18');
INSERT INTO `funcao` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (7, 'Cmdte de Pelotão', 1, '2019-01-02 22:51:25');
INSERT INTO `funcao` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (8, 'Cmdte de CIA', 1, '2019-01-02 22:51:33');
INSERT INTO `funcao` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (9, 'Atirador Cabo', 1, '2019-01-02 22:51:48');
INSERT INTO `funcao` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (10, 'Cabo Atirador', 1, '2019-01-02 22:51:54');
INSERT INTO `funcao` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (11, 'Teste de Cargo', 1, '2019-04-30 13:47:08');


#
# TABLE STRUCTURE FOR: menu
#

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `icone` varchar(30) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO `menu` (`id`, `nome`, `icone`, `id_utilizador`, `data_criacao`) VALUES (1, 'Funcionalidade', 'fa fa-cog', 1, '2019-12-20 20:19:06');
INSERT INTO `menu` (`id`, `nome`, `icone`, `id_utilizador`, `data_criacao`) VALUES (2, 'Sub Menu', 'fa fa-list-ul', 1, '2019-12-20 20:19:06');
INSERT INTO `menu` (`id`, `nome`, `icone`, `id_utilizador`, `data_criacao`) VALUES (3, 'Utilizador', 'fa fa-user', 1, '2019-12-20 20:19:06');
INSERT INTO `menu` (`id`, `nome`, `icone`, `id_utilizador`, `data_criacao`) VALUES (4, 'Grupo', 'fa fa-users', 1, '2019-12-20 20:19:06');
INSERT INTO `menu` (`id`, `nome`, `icone`, `id_utilizador`, `data_criacao`) VALUES (6, 'Produto', 'fa fa-list', 1, '2019-12-20 21:46:43');
INSERT INTO `menu` (`id`, `nome`, `icone`, `id_utilizador`, `data_criacao`) VALUES (7, 'Venda', 'fa fa-shopping-cart', 1, '2019-12-21 16:30:16');
INSERT INTO `menu` (`id`, `nome`, `icone`, `id_utilizador`, `data_criacao`) VALUES (8, 'Fornecedor', 'fa fa-home', 1, '2019-12-22 11:23:25');
INSERT INTO `menu` (`id`, `nome`, `icone`, `id_utilizador`, `data_criacao`) VALUES (9, 'Estoque', 'fa fa-recycle', 1, '2019-12-22 13:43:16');
INSERT INTO `menu` (`id`, `nome`, `icone`, `id_utilizador`, `data_criacao`) VALUES (10, 'Estatística', 'fa fa-chart-line', 1, '2019-12-23 12:45:25');
INSERT INTO `menu` (`id`, `nome`, `icone`, `id_utilizador`, `data_criacao`) VALUES (11, 'Estante', 'fa fa-list', 1, '2019-12-23 21:33:49');
INSERT INTO `menu` (`id`, `nome`, `icone`, `id_utilizador`, `data_criacao`) VALUES (12, 'destinatário', 'fa fa-home', 1, '2020-02-06 21:12:12');
INSERT INTO `menu` (`id`, `nome`, `icone`, `id_utilizador`, `data_criacao`) VALUES (13, 'Categoria', 'fa fa-list', 1, '2020-02-08 19:57:41');


#
# TABLE STRUCTURE FOR: menu_sub_menu
#

DROP TABLE IF EXISTS `menu_sub_menu`;

CREATE TABLE `menu_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_sub_menu` int(11) NOT NULL,
  `controlador` varchar(50) NOT NULL,
  `accao` varchar(50) NOT NULL,
  `modal` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (1, 1, 1, 'menu', 'novo', 1, 1, '2019-12-20 20:44:23');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (2, 1, 2, 'menu', 'listar', 0, 0, '2019-12-20 20:44:38');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (3, 1, 3, 'menu', 'editar', 0, 1, '2019-12-20 20:44:28');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (4, 1, 4, 'menu', 'eliminar', 1, 1, '2019-12-20 20:44:32');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (5, 4, 1, 'grupo', 'novo', 1, 1, '2019-12-20 21:15:54');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (6, 4, 2, 'grupo', 'listar', 0, 1, '2019-12-20 21:15:54');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (7, 4, 5, 'grupo', 'add_privilegio', 0, 1, '2019-12-20 21:15:54');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (8, 2, 1, 'sub_menu', 'novo', 1, 1, '2019-12-20 21:19:17');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (9, 6, 1, 'produto', 'novo', 0, 1, '2019-12-20 21:47:44');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (10, 6, 2, 'produto', 'listar', 0, 1, '2019-12-20 21:47:44');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (11, 6, 3, 'produto', 'editar', 0, 1, '2019-12-20 21:47:44');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (12, 6, 4, 'produto', 'eliminar', 1, 1, '2019-12-21 13:44:49');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (13, 7, 1, 'venda', 'novo', 0, 1, '2019-12-21 16:28:55');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (14, 7, 2, 'venda', 'listar', 0, 1, '2019-12-21 16:28:55');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (15, 7, 3, 'venda', 'editar', 0, 1, '2019-12-21 16:28:55');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (16, 7, 4, 'venda', 'eliminar', 1, 1, '2019-12-21 23:06:54');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (17, 6, 6, 'produto', 'estoque', 0, 1, '2019-12-21 22:31:50');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (18, 7, 7, 'venda', 'detalhe', 0, 1, '2019-12-21 23:05:07');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (19, 8, 1, 'fornecedor', 'novo', 1, 1, '2019-12-22 11:24:48');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (20, 8, 2, 'fornecedor', 'listar', 0, 1, '2019-12-22 11:24:02');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (21, 8, 3, 'fornecedor', 'editar', 1, 1, '2019-12-22 11:24:54');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (22, 8, 4, 'fornecedor', 'eliminar', 1, 1, '2019-12-22 11:24:56');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (23, 9, 8, 'estoque', 'movimento', 0, 1, '2019-12-22 13:44:31');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (24, 3, 1, 'utilizador', 'novo', 1, 1, '2019-12-23 13:03:49');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (25, 3, 2, 'utilizador', 'listar', 0, 1, '2019-12-23 12:54:27');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (26, 3, 3, 'utilizador', 'editar', 1, 1, '2019-12-23 13:03:55');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (27, 3, 4, 'utilizador', 'eliminar', 1, 1, '2019-12-23 13:04:17');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (28, 11, 1, 'estante', 'novo', 1, 1, '2019-12-23 21:01:41');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (29, 11, 2, 'estante', 'listar', 0, 1, '2019-12-23 21:01:00');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (30, 11, 3, 'estante', 'editar', 1, 1, '2019-12-23 21:01:48');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (31, 11, 4, 'estante', 'eliminar', 1, 1, '2019-12-23 21:01:51');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (32, 11, 9, 'estante', 'ticket', 0, 1, '2019-12-23 21:44:09');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (33, 6, 10, 'produto', 'requisicao', 0, 1, '2019-12-25 08:58:24');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (34, 6, 11, 'produto', 'estoque_', 0, 1, '2019-12-25 09:28:41');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (35, 10, 12, 'estatistica', 'diaria', 0, 1, '2019-12-28 14:56:01');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (36, 10, 13, 'estatistica', 'por_data', 0, 1, '2019-12-28 16:51:07');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (37, 6, 14, 'produto', 'em_analise', 0, 1, '2020-01-08 22:15:06');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (38, 10, 15, 'estatistica', 'saida_por_area', 0, 1, '2020-01-10 09:39:00');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (39, 12, 1, 'destinatario', 'novo', 1, 1, '2020-02-06 21:17:28');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (40, 12, 2, 'destinatario', 'listar', 0, 1, '2020-02-06 21:13:22');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (41, 12, 3, 'destinatario', 'editar', 1, 1, '2020-02-06 21:17:35');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (42, 12, 4, 'destinatario', 'eliminar', 1, 1, '2020-02-06 21:17:41');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (43, 9, 3, 'estoque', 'editar', 1, 1, '2020-02-08 17:43:43');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (44, 13, 1, 'categoria', 'novo', 1, 1, '2020-02-08 19:58:34');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (45, 13, 2, 'categoria', 'listar', 0, 1, '2020-02-08 19:58:09');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (46, 13, 3, 'categoria', 'editar', 1, 1, '2020-02-08 19:58:37');
INSERT INTO `menu_sub_menu` (`id`, `id_menu`, `id_sub_menu`, `controlador`, `accao`, `modal`, `id_utilizador`, `data_criacao`) VALUES (47, 13, 4, 'categoria', 'eliminar', 1, 1, '2020-02-08 19:58:40');


#
# TABLE STRUCTURE FOR: movivento_estoque
#

DROP TABLE IF EXISTS `movivento_estoque`;

CREATE TABLE `movivento_estoque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fornecedor` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `num_factura` varchar(17) NOT NULL,
  `qtde_grosso` int(11) NOT NULL,
  `qtde_retalho` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_utilizador` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `movivento_estoque` (`id`, `id_fornecedor`, `id_producto`, `num_factura`, `qtde_grosso`, `qtde_retalho`, `data_criacao`, `id_utilizador`) VALUES (1, 2, 1, 'MT0182', 5, 50, '2019-12-28 00:00:00', 1);
INSERT INTO `movivento_estoque` (`id`, `id_fornecedor`, `id_producto`, `num_factura`, `qtde_grosso`, `qtde_retalho`, `data_criacao`, `id_utilizador`) VALUES (2, 2, 2, 'MT0181', 7, 42, '2019-12-28 00:00:00', 1);
INSERT INTO `movivento_estoque` (`id`, `id_fornecedor`, `id_producto`, `num_factura`, `qtde_grosso`, `qtde_retalho`, `data_criacao`, `id_utilizador`) VALUES (3, 3, 3, 'MT0181', 40, 400, '2019-12-28 00:00:00', 1);
INSERT INTO `movivento_estoque` (`id`, `id_fornecedor`, `id_producto`, `num_factura`, `qtde_grosso`, `qtde_retalho`, `data_criacao`, `id_utilizador`) VALUES (4, 2, 4, 'MT0186', 8, 80, '2019-12-30 00:00:00', 1);
INSERT INTO `movivento_estoque` (`id`, `id_fornecedor`, `id_producto`, `num_factura`, `qtde_grosso`, `qtde_retalho`, `data_criacao`, `id_utilizador`) VALUES (5, 2, 5, 'MT0187', 6, 60, '2020-01-06 00:00:00', 1);
INSERT INTO `movivento_estoque` (`id`, `id_fornecedor`, `id_producto`, `num_factura`, `qtde_grosso`, `qtde_retalho`, `data_criacao`, `id_utilizador`) VALUES (6, 1, 6, '089765', 8, 80, '2020-01-16 00:00:00', 1);
INSERT INTO `movivento_estoque` (`id`, `id_fornecedor`, `id_producto`, `num_factura`, `qtde_grosso`, `qtde_retalho`, `data_criacao`, `id_utilizador`) VALUES (7, 1, 1, 'MT0181', 9, 90, '2020-01-16 00:00:00', 1);
INSERT INTO `movivento_estoque` (`id`, `id_fornecedor`, `id_producto`, `num_factura`, `qtde_grosso`, `qtde_retalho`, `data_criacao`, `id_utilizador`) VALUES (8, 1, 1, '1223', 1, 10, '2020-01-16 00:00:00', 1);
INSERT INTO `movivento_estoque` (`id`, `id_fornecedor`, `id_producto`, `num_factura`, `qtde_grosso`, `qtde_retalho`, `data_criacao`, `id_utilizador`) VALUES (9, 2, 1, 'M00T71', 1, 10, '2020-02-08 18:27:31', 1);
INSERT INTO `movivento_estoque` (`id`, `id_fornecedor`, `id_producto`, `num_factura`, `qtde_grosso`, `qtde_retalho`, `data_criacao`, `id_utilizador`) VALUES (10, 2, 1, 'MT0182', 1, 10, '2020-01-16 00:00:00', 1);
INSERT INTO `movivento_estoque` (`id`, `id_fornecedor`, `id_producto`, `num_factura`, `qtde_grosso`, `qtde_retalho`, `data_criacao`, `id_utilizador`) VALUES (11, 2, 1, '089765', 8, 80, '2020-02-06 00:00:00', 1);
INSERT INTO `movivento_estoque` (`id`, `id_fornecedor`, `id_producto`, `num_factura`, `qtde_grosso`, `qtde_retalho`, `data_criacao`, `id_utilizador`) VALUES (12, 1, 1, 'MT0187', 3, 30, '2020-02-06 00:00:00', 1);


#
# TABLE STRUCTURE FOR: pessoa
#

DROP TABLE IF EXISTS `pessoa`;

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(260) NOT NULL,
  `apelido` varchar(60) NOT NULL,
  `genero` enum('M','F') NOT NULL,
  `data_nasc` date NOT NULL,
  `numero_doc` varchar(20) NOT NULL,
  `nacionalidade` int(11) NOT NULL,
  `tipo` enum('0','1') NOT NULL,
  `foto` varchar(100) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `pessoa` (`id`, `nome`, `apelido`, `genero`, `data_nasc`, `numero_doc`, `nacionalidade`, `tipo`, `foto`, `estado`) VALUES (1, 'Neusa Joaquim Lourenço', 'Neusa', 'F', '1989-02-21', '093393439HA493', 6, '1', 'padrao.jpg', '1');
INSERT INTO `pessoa` (`id`, `nome`, `apelido`, `genero`, `data_nasc`, `numero_doc`, `nacionalidade`, `tipo`, `foto`, `estado`) VALUES (2, 'Albertina Tarciane Anacleto de Sousa', 'Tarciane', 'F', '2015-08-26', '0019289191LA019', 2, '0', 'zamith.jpg', '1');


#
# TABLE STRUCTURE FOR: posto
#

DROP TABLE IF EXISTS `posto`;

CREATE TABLE `posto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `id_criador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (1, 'Soldado', 1, '2019-01-06 15:27:13');
INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (2, '2º Cabo', 1, '2019-01-06 15:27:13');
INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (3, '1º Cabo', 1, '2019-01-06 15:27:13');
INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (4, 'Sub Sargento', 1, '2019-01-06 15:27:13');
INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (5, '2º Sargento', 1, '2019-01-06 15:27:13');
INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (6, '1º Sargento', 1, '2019-01-06 15:27:13');
INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (7, 'Aspirante', 1, '2019-01-06 15:27:13');
INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (8, 'Sub Tenente', 1, '2019-01-06 15:27:13');
INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (9, 'Tenente', 1, '2019-01-06 15:27:13');
INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (10, 'Capitão', 1, '2019-01-06 15:29:25');
INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (11, 'Major', 1, '2019-01-06 15:27:13');
INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (12, 'Tenente Coronel', 1, '2019-01-06 15:27:13');
INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (13, 'Coronel', 1, '2019-01-06 15:27:13');
INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (14, 'Brigadeiro', 1, '2019-01-06 15:27:13');
INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (15, 'Tenente General', 1, '2019-01-06 15:27:13');
INSERT INTO `posto` (`id`, `nome`, `id_criador`, `data_criacao`) VALUES (16, 'Civil', 1, '2019-01-23 12:24:15');


#
# TABLE STRUCTURE FOR: producto
#

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `preco` float NOT NULL,
  `ctrl_grosso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `producto` (`id`, `nome`, `codigo`, `id_categoria`, `data_fabrico`, `data_expir`, `id_estante`, `qtde_critica`, `qtde_grosso`, `data_adicao`, `estado`, `preco`, `ctrl_grosso`) VALUES (1, 'Paracetamol', '023942434962', 1, '2017-03-13', '2020-02-15', 1, 5, 10, '2019-12-28', '1', '0', 6);
INSERT INTO `producto` (`id`, `nome`, `codigo`, `id_categoria`, `data_fabrico`, `data_expir`, `id_estante`, `qtde_critica`, `qtde_grosso`, `data_adicao`, `estado`, `preco`, `ctrl_grosso`) VALUES (2, 'Ácido Naldico', '023942437451', 1, '2017-06-06', '2020-06-10', 1, 5, 6, '2019-12-28', '1', '0', 2);
INSERT INTO `producto` (`id`, `nome`, `codigo`, `id_categoria`, `data_fabrico`, `data_expir`, `id_estante`, `qtde_critica`, `qtde_grosso`, `data_adicao`, `estado`, `preco`, `ctrl_grosso`) VALUES (3, 'Zensoft', '4710970324469', 1, '2017-02-08', '2021-02-11', 2, 5, 10, '2019-12-28', '1', '0', 5);
INSERT INTO `producto` (`id`, `nome`, `codigo`, `id_categoria`, `data_fabrico`, `data_expir`, `id_estante`, `qtde_critica`, `qtde_grosso`, `data_adicao`, `estado`, `preco`, `ctrl_grosso`) VALUES (4, 'Metronidazol', '5608242145630', 2, '2018-06-05', '2020-02-12', 2, 5, 10, '2019-12-30', '1', '0', 5);
INSERT INTO `producto` (`id`, `nome`, `codigo`, `id_categoria`, `data_fabrico`, `data_expir`, `id_estante`, `qtde_critica`, `qtde_grosso`, `data_adicao`, `estado`, `preco`, `ctrl_grosso`) VALUES (5, 'Raul', '45657876542', 2, '2019-06-05', '2022-03-02', 2, 5, 10, '2020-01-06', '1', '0', 5);
INSERT INTO `producto` (`id`, `nome`, `codigo`, `id_categoria`, `data_fabrico`, `data_expir`, `id_estante`, `qtde_critica`, `qtde_grosso`, `data_adicao`, `estado`, `preco`, `ctrl_grosso`) VALUES (6, 'Bromexina', '5656565656', 2, '2019-02-06', '2021-06-09', 2, 5, 10, '2020-01-16', '1', '0', 0);


#
# TABLE STRUCTURE FOR: reparticao
#

DROP TABLE IF EXISTS `reparticao`;

CREATE TABLE `reparticao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(170) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `data_criacao` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO `reparticao` (`id`, `nome`, `id_utilizador`, `estado`, `data_criacao`) VALUES (1, 'Repartição de Informática', 1, '1', '2020-02-06');
INSERT INTO `reparticao` (`id`, `nome`, `id_utilizador`, `estado`, `data_criacao`) VALUES (2, 'Repartição de Contra Inteligência Militar', 1, '1', '2020-02-06');
INSERT INTO `reparticao` (`id`, `nome`, `id_utilizador`, `estado`, `data_criacao`) VALUES (3, 'Repartição de Educação Patriótica', 1, '1', '2020-02-06');
INSERT INTO `reparticao` (`id`, `nome`, `id_utilizador`, `estado`, `data_criacao`) VALUES (4, 'Repartição de Pessoal e Quadros', 1, '1', '2020-02-06');
INSERT INTO `reparticao` (`id`, `nome`, `id_utilizador`, `estado`, `data_criacao`) VALUES (5, 'Destacamento de Segurança Presidencial', 1, '1', '2020-02-06');
INSERT INTO `reparticao` (`id`, `nome`, `id_utilizador`, `estado`, `data_criacao`) VALUES (6, 'USP', 1, '1', '2020-02-06');
INSERT INTO `reparticao` (`id`, `nome`, `id_utilizador`, `estado`, `data_criacao`) VALUES (7, 'Repartição do Pessoal e Quadros', 1, '1', '2020-02-06');
INSERT INTO `reparticao` (`id`, `nome`, `id_utilizador`, `estado`, `data_criacao`) VALUES (8, 'Guarnição Especial do Palácio Presidencial', 1, '1', '2020-02-06');
INSERT INTO `reparticao` (`id`, `nome`, `id_utilizador`, `estado`, `data_criacao`) VALUES (11, 'Repartição de Saúde', 1, '1', '2020-02-06');
INSERT INTO `reparticao` (`id`, `nome`, `id_utilizador`, `estado`, `data_criacao`) VALUES (12, 'Teste mais', 1, '0', '2020-02-06');
INSERT INTO `reparticao` (`id`, `nome`, `id_utilizador`, `estado`, `data_criacao`) VALUES (13, 'Teste mais um', 1, '0', '2020-02-06');


#
# TABLE STRUCTURE FOR: role
#

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `role` (`id`, `nome`, `sigla`, `id_utilizador`, `data_criacao`) VALUES (1, 'Admin', 'ADM', 0, '2019-12-20 20:00:26');
INSERT INTO `role` (`id`, `nome`, `sigla`, `id_utilizador`, `data_criacao`) VALUES (2, 'FARMACÊUTICO', 'FAR', 1, '2019-12-20 21:35:48');


#
# TABLE STRUCTURE FOR: role_menu_sub_menu
#

DROP TABLE IF EXISTS `role_menu_sub_menu`;

CREATE TABLE `role_menu_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `id_menu_sub_menu` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (1, 1, 1, 1, '2019-12-20 20:33:01');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (2, 1, 2, 1, '2019-12-20 20:33:01');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (3, 1, 3, 1, '2019-12-20 20:33:01');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (4, 1, 4, 1, '2019-12-20 20:33:01');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (5, 1, 5, 1, '2019-12-20 21:17:00');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (6, 1, 6, 1, '2019-12-20 21:17:00');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (7, 1, 7, 1, '2019-12-20 21:17:00');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (8, 1, 8, 1, '2019-12-20 21:19:36');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (9, 1, 11, 1, '2019-12-20 21:48:05');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (10, 1, 12, 1, '2019-12-20 21:48:05');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (11, 1, 10, 1, '2019-12-20 21:48:05');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (12, 1, 9, 1, '2019-12-20 21:48:05');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (14, 1, 16, 1, '2019-12-21 16:29:17');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (15, 1, 14, 1, '2019-12-21 16:29:17');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (16, 1, 13, 1, '2019-12-21 16:29:17');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (17, 1, 17, 1, '2019-12-21 22:32:28');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (18, 1, 18, 1, '2019-12-21 23:05:19');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (19, 1, 21, 1, '2019-12-22 11:24:25');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (20, 1, 22, 1, '2019-12-22 11:24:25');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (21, 1, 20, 1, '2019-12-22 11:24:25');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (22, 1, 19, 1, '2019-12-22 11:24:25');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (23, 1, 23, 1, '2019-12-22 13:45:14');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (24, 1, 26, 1, '2019-12-23 12:54:43');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (25, 1, 27, 1, '2019-12-23 12:54:43');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (26, 1, 25, 1, '2019-12-23 12:54:43');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (27, 1, 24, 1, '2019-12-23 12:54:43');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (28, 2, 23, 1, '2019-12-23 13:34:16');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (29, 2, 21, 1, '2019-12-23 13:34:16');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (30, 2, 22, 1, '2019-12-23 13:34:16');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (31, 2, 20, 1, '2019-12-23 13:34:16');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (32, 2, 19, 1, '2019-12-23 13:34:16');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (33, 2, 11, 1, '2019-12-23 13:34:16');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (34, 2, 12, 1, '2019-12-23 13:34:16');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (35, 2, 17, 1, '2019-12-23 13:34:16');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (36, 2, 10, 1, '2019-12-23 13:34:16');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (37, 2, 9, 1, '2019-12-23 13:34:16');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (38, 2, 18, 1, '2019-12-23 13:34:16');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (40, 2, 14, 1, '2019-12-23 13:34:16');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (41, 2, 13, 1, '2019-12-23 13:34:16');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (43, 1, 31, 1, '2019-12-23 21:02:34');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (44, 1, 29, 1, '2019-12-23 21:02:34');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (45, 1, 28, 1, '2019-12-23 21:02:34');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (46, 1, 32, 1, '2019-12-23 21:44:26');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (47, 1, 33, 1, '2019-12-25 08:58:43');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (48, 1, 34, 1, '2019-12-25 09:29:47');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (49, 1, 35, 1, '2019-12-28 14:58:47');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (50, 1, 36, 1, '2019-12-28 16:51:42');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (51, 2, 35, 1, '2020-01-02 11:15:52');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (52, 2, 36, 1, '2020-01-02 11:15:52');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (53, 2, 34, 1, '2020-01-02 11:15:52');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (54, 2, 33, 1, '2020-01-02 11:15:52');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (55, 2, 32, 1, '2020-01-02 11:15:52');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (56, 2, 29, 1, '2020-01-02 11:15:52');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (57, 1, 37, 1, '2020-01-08 22:15:53');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (58, 1, 38, 1, '2020-01-10 09:39:13');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (59, 1, 41, 1, '2020-02-06 21:13:54');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (60, 1, 42, 1, '2020-02-06 21:13:54');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (61, 1, 40, 1, '2020-02-06 21:13:54');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (62, 1, 39, 1, '2020-02-06 21:13:54');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (63, 1, 43, 1, '2020-02-08 17:41:52');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (64, 1, 46, 1, '2020-02-08 19:58:57');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (65, 1, 47, 1, '2020-02-08 19:58:57');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (66, 1, 45, 1, '2020-02-08 19:58:57');
INSERT INTO `role_menu_sub_menu` (`id`, `id_role`, `id_menu_sub_menu`, `id_utilizador`, `data_criacao`) VALUES (67, 1, 44, 1, '2020-02-08 19:58:57');


#
# TABLE STRUCTURE FOR: sub_menu
#

DROP TABLE IF EXISTS `sub_menu`;

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES (1, 'novo', 'fa fa-edit', 1, '2019-12-20 20:20:53');
INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES (2, 'listar', 'fa fa-list', 1, '2019-12-20 20:20:53');
INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES (3, 'editar', 'fa fa-edit', 1, '2019-12-20 20:20:53');
INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES (4, 'eliminar', 'fa fa-trash', 1, '2019-12-20 20:20:53');
INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES (5, 'add_privilegio', 'fa fa-cogs', 1, '2019-12-20 22:22:28');
INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES (6, 'Estoque', 'fa fa-recycle ', 1, '2019-12-25 09:16:19');
INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES (7, 'detalhe', 'fa fa-eye', 1, '2019-12-21 23:04:50');
INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES (8, 'movimento', 'fa fa-exchange', 1, '2019-12-22 13:44:01');
INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES (9, 'ticket', 'fa fa-file', 1, '2019-12-23 21:43:25');
INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES (10, 'Requisição', 'fa fa-file-pdf-o', 1, '2019-12-25 08:57:48');
INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES (11, 'estoque', 'fa fa-recycle ', 1, '2019-12-25 09:30:36');
INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES (12, 'diária', 'fa fa-calendar', 1, '2019-12-28 15:05:07');
INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES (13, 'por data', 'fa fa-calendar', 1, '2019-12-28 16:50:42');
INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES (14, 'Em Análise', 'fa fa-eye', 1, '2020-01-08 22:13:57');
INSERT INTO `sub_menu` (`id`, `nome`, `icon`, `id_utilizador`, `data_criacao`) VALUES (15, 'Saída por Área', 'fa fa-info', 1, '2020-01-10 09:38:01');


#
# TABLE STRUCTURE FOR: user_teste
#

DROP TABLE IF EXISTS `user_teste`;

CREATE TABLE `user_teste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cidadao` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `user` varchar(30) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL,
  `fotografia` varchar(70) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `user_teste` (`id`, `id_cidadao`, `nome`, `user`, `senha`, `id_role`, `fotografia`, `estado`) VALUES (1, 0, 'Élvio Sadoc da Silva e Sousa', 'Hacker Xp', 'Malaquias4', 1, 'pdc_plus-7c45ba5cdadbfc807a3e96e5ac1953ad.jpg', '1');
INSERT INTO `user_teste` (`id`, `id_cidadao`, `nome`, `user`, `senha`, `id_role`, `fotografia`, `estado`) VALUES (2, 1, 'Augusto Zage Capemba', 'augusto.capemba', '123456', 2, '71279822_1944316042390308_2060332615465959424_n.jpg', '1');


#
# TABLE STRUCTURE FOR: venda
#

DROP TABLE IF EXISTS `venda`;

CREATE TABLE `venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qtde_prod` int(11) NOT NULL,
  `valor_total` float NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `comprador` varchar(90) NOT NULL,
  `data_criacao` date NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `id_reparticao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `venda` (`id`, `qtde_prod`, `valor_total`, `id_utilizador`, `comprador`, `data_criacao`, `estado`, `id_reparticao`) VALUES (1, 2, '0', 1, 'Élvio de Sousa', '2020-01-09', '1', 8);
INSERT INTO `venda` (`id`, `qtde_prod`, `valor_total`, `id_utilizador`, `comprador`, `data_criacao`, `estado`, `id_reparticao`) VALUES (2, 2, '0', 1, 'Anacleto', '2020-01-10', '1', 8);
INSERT INTO `venda` (`id`, `qtde_prod`, `valor_total`, `id_utilizador`, `comprador`, `data_criacao`, `estado`, `id_reparticao`) VALUES (3, 3, '0', 1, 'Miguel Bartolomeu', '2020-01-10', '1', 1);
INSERT INTO `venda` (`id`, `qtde_prod`, `valor_total`, `id_utilizador`, `comprador`, `data_criacao`, `estado`, `id_reparticao`) VALUES (4, 4, '0', 1, 'Mateus António', '2020-01-12', '1', 8);
INSERT INTO `venda` (`id`, `qtde_prod`, `valor_total`, `id_utilizador`, `comprador`, `data_criacao`, `estado`, `id_reparticao`) VALUES (5, 2, '0', 1, 'Rui Alberto', '2020-01-12', '1', 5);
INSERT INTO `venda` (`id`, `qtde_prod`, `valor_total`, `id_utilizador`, `comprador`, `data_criacao`, `estado`, `id_reparticao`) VALUES (6, 2, '0', 1, 'Beatriz Minga', '2020-01-12', '1', 2);
INSERT INTO `venda` (`id`, `qtde_prod`, `valor_total`, `id_utilizador`, `comprador`, `data_criacao`, `estado`, `id_reparticao`) VALUES (7, 3, '0', 1, 'Carlos Alberto', '2020-01-12', '1', 3);
INSERT INTO `venda` (`id`, `qtde_prod`, `valor_total`, `id_utilizador`, `comprador`, `data_criacao`, `estado`, `id_reparticao`) VALUES (8, 3, '0', 1, 'Felipe Deschamps', '2020-01-12', '1', 1);
INSERT INTO `venda` (`id`, `qtde_prod`, `valor_total`, `id_utilizador`, `comprador`, `data_criacao`, `estado`, `id_reparticao`) VALUES (9, 1, '0', 1, 'Teresa Almeida', '2020-01-12', '1', 4);
INSERT INTO `venda` (`id`, `qtde_prod`, `valor_total`, `id_utilizador`, `comprador`, `data_criacao`, `estado`, `id_reparticao`) VALUES (10, 2, '0', 1, 'Vilmara Augusto', '2020-01-12', '1', 6);
INSERT INTO `venda` (`id`, `qtde_prod`, `valor_total`, `id_utilizador`, `comprador`, `data_criacao`, `estado`, `id_reparticao`) VALUES (11, 2, '0', 1, 'Jorge Malavaleca', '2020-01-12', '1', 5);
INSERT INTO `venda` (`id`, `qtde_prod`, `valor_total`, `id_utilizador`, `comprador`, `data_criacao`, `estado`, `id_reparticao`) VALUES (12, 1, '0', 1, 'Bérgom Manuel', '2020-01-16', '1', 2);


#
# TABLE STRUCTURE FOR: venda_produto
#

DROP TABLE IF EXISTS `venda_produto`;

CREATE TABLE `venda_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtde_prod` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (1, 1, 1, 2);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (2, 1, 3, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (3, 2, 4, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (4, 2, 5, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (5, 3, 4, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (6, 3, 2, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (7, 3, 1, 2);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (8, 4, 2, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (9, 4, 3, 2);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (10, 4, 1, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (11, 4, 4, 3);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (12, 5, 5, 2);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (13, 5, 1, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (14, 6, 2, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (15, 6, 1, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (16, 7, 1, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (17, 7, 3, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (18, 7, 4, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (19, 8, 4, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (20, 8, 5, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (21, 8, 2, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (22, 9, 2, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (23, 10, 3, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (24, 10, 1, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (25, 11, 1, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (26, 11, 2, 1);
INSERT INTO `venda_produto` (`id`, `id_venda`, `id_produto`, `qtde_prod`) VALUES (27, 12, 1, 4);


