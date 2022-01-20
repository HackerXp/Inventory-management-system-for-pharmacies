<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('parser','database','session','table','pagination');
$autoload['drivers'] = array();
$autoload['helper'] = array('url','form','funcoes');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('repositorio/Utilizador_model' => 'utilizador', 'repositorio/app/App_model' => 'app', 'repositorio/Role_model' => 'role','repositorio/Funcao_model' => 'funcao','repositorio/Conta_model' => 'conta', 'repositorio/Categoria_model' => 'categoria', 'repositorio/Producto_model' => 'producto', 'repositorio/Estante_model' => 'estante', 'repositorio/Estoque_model' => 'estoque', 'repositorio/Venda_model' => 'venda', 'repositorio/Fornecedor_model' => 'fornecedor', 'repositorio/Destinatario_model' => 'destinatario');
