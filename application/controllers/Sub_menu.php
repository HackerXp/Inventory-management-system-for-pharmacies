<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 26/04/18
 * Time: 20:42
 */
class Sub_menu extends CI_Controller
{
    public $k_menus=array();
    
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
    }

    public function listar()
    {
        echo "Listar sub menu";
    }
}