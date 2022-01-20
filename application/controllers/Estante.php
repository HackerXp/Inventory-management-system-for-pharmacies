<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 24/12/18
 * Time: 16:01
 */

class Estante extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store()
    {
        $estante=array(
        	'codigo'=>$this->input->post('codigo'),
			'id_categoria'=>$this->input->post('id_categoria'),
			'estado'=>'1'
		);
        if($this->estante->store($estante)!=0)
            echo callback('success','Estante adicionada com sucesso','Gest - Farma informa');
        else
            echo callback('error','Erro ao efectuar esta operação','Gest - Farma informa');
    }

    public function get_codigo()
    {
        echo json_encode($this->estante->get_codigo($this->input->get('param')));
    }

    public function listar()
    {
        $this->k_menus['titulo']="SIAU | Listar Estante";
        $this->k_menus['estantes'] = $this->estante->listar();
        $this->load->view('head_foot/header',$this->k_menus);
        if($this->controla==false)
            $this->load->view('errors/autorizacao_negada',$this->k_menus);
        else
            $this->parser->parse('estante/listar',$this->k_menus);
        $this->load->view('modal/file');
        $this->load->view('head_foot/footer');
    }

    public function ticket()
    {
        $this->load->library('Pdf');
        $this->k_menus['titulo']="SIAU | Tickets";
        $this->k_menus['tickets'] = $this->estante->listar();
        if($this->controla==false) {
            $this->load->view('head_foot/header', $this->k_menus);
            $this->load->view('errors/autorizacao_negada', $this->k_menus);
            $this->load->view('modal/file');
        }else {
            $this->parser->parse('estante/ticket', $this->k_menus);
        }
    }

    public function eliminar()
    {
        $dados=array('estado'=>'0');
        if($this->estante->update($dados,$this->input->post('id'))!=0)
            echo callback('success','Estante eliminada com sucesso','Gest - Farma informa');
        else
            echo callback('error','Erro ao efectuar esta operação','Gest - Farma informa');

    }
}
