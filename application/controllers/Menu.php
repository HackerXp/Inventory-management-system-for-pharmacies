<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public $k_menus=array();
	public $controla=false;
	/**
	 * Menu constructor.
	 */
	public function __construct()
	{
		parent::__construct();
	}
	public function store()
	{
		$menu = array(
			'nome'=>$this->input->post('nome'),
			'icone'=>$this->input->post('icone'),
			'id_utilizador'=>$this->session->userdata('id')
		);
		if ($this->app->store_menu($menu)!=0)
			echo callback('success','Funcionalidade adicionada com sucesso','SIO informa');
		else
			echo callback('error','Erro ao efectuar esta operação','SIO informa');
	}

	public function listar()
	{
		$this->k_menus['titulo']="SIO | Listar Menu";
		$this->k_menus['menu'] = $this->app->listar_menu();
		$this->load->view('head_foot/header',$this->k_menus);
		if($this->controla==false)
			$this->load->view('errors/autorizacao_negada');
		else
			$this->parser->parse('menu_/listar',$this->k_menus);
		$this->load->view('modal/file');
		$this->load->view('head_foot/footer');
	}

}
