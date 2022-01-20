<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 26/04/18
 * Time: 20:27
 */
class Grupo extends CI_Controller
{
	public $k_menus=array();
	public $controla=false;
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('repositorio/app/App_model'=>'app'));
		$this->load->model(array('repositorio/Utilizador_model'=>'utilizador'));
		$this->load->library('table');
		if($this->session->userdata('id_role')!=null)
		{
			$this->k_menus['menus'] = $this->app->listar_menu_role($this->session->userdata('id_role'));
			$this->k_menus['dispensado']=array("Actualizar","Eliminar");
			foreach ($this->app->listar_menu_role($this->session->userdata('id_role')) as $menu)
			{
				$result = $this->app->get_menu($menu->id, $this->session->userdata('id_role'));
				$k[$menu->nome] = $result;
			}
			$this->k_menus['builder_menu'] = @$k;
		}

		if ($this->app->control_acesso($this->uri->segment(1),$this->uri->segment(2),$this->session->userdata('id_role'))>0)
		{
			$this->controla=true;
		}else{
			$this->controla=false;
		}
	}
	public function add_privilegio()
	{
		$this->k_menus['titulo']="SIO | Adicionar Privilégio";
		$this->k_menus['menus'] = $this->app->listar_menu_role();

		foreach ($this->app->listar_menu_role() as $menu)
		{
			$result=$this->app->get_sub_menu_by_id_menu($menu->id,$this->uri->segment(3));
			$k[$menu->nome]=$result;
		}

		foreach ($this->app->listar_menu_role() as $menu)
		{
			$result=$this->app->get_sub_menu_by_id_menu4($menu->id,$this->uri->segment(3));
			$y[$menu->nome]=$result;
		}

		$this->k_menus['sub_menus']=@$k;
		$this->k_menus['sub_menus4']=@$y;
		$this->k_menus['nome_grupo'] = @$this->app->nome_grupo($this->uri->segment(3))->nome;

		$this->load->view('head_foot/header',$this->k_menus);
		if($this->controla==false)
			$this->load->view('errors/autorizacao_negada');
		else
			$this->parser->parse('grupo/add_privilegio',$this->k_menus);
		$this->load->view('modal/file');
		$this->load->view('head_foot/footer');
	}

	public function listar()
	{
		$this->k_menus['titulo']="SIO | Listar Grupo";
		$this->k_menus['grupo'] = $this->app->listar_grupo();
		$this->load->view('head_foot/header',$this->k_menus);
		if($this->controla==false)
			$this->load->view('errors/autorizacao_negada');
		else
			$this->parser->parse('grupo/listar',$this->k_menus);
		$this->load->view('modal/file');
		$this->load->view('head_foot/footer');
	}
}
