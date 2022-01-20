<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'App';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['dashboard'] = 'app/dashboard';
$route['criar_grupo'] = 'app/criar_grupo';
$route['listar_grupo'] = 'app/listar_grupo';
$route['teste_parser'] = 'app/teste_parser';
$route['listar_menu'] = 'app/listar_menu';
$route['novo_utilizador'] = 'utilizador/novo';
$route['perfil_utilizador'] = 'utilizador/perfil';
$route['add_sub_menu/(:num)'] = 'app/add_sub_menu/$1';
$route['add_privilegio/(:num)'] = 'app/add_privilegio/$1';
