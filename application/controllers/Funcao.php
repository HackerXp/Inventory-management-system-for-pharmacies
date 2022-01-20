<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 02/01/19
 * Time: 19:50
 */

class Funcao extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store()
    {
        $departamneto=new \Entity\Funcao($this->input->post('nome'),$this->session->userdata('id'));
        if($this->funcao->store($departamneto)!=0)
            echo callback('success','Função adicionada com sucesso','SIO informa');
        else
            echo callback('error','Erro ao efectuar esta operação','SIO informa');
    }

    public function listar()
    {
        $this->k_menus['titulo']="SIO | Listar Função";
        $this->k_menus['funcoes'] = $this->funcao->listar();
        $this->load->view('head_foot/header',$this->k_menus);
        if($this->controla==false)
            $this->load->view('errors/autorizacao_negada',$this->k_menus);
        else
        {
            $this->load->view('funcao/listar',$this->k_menus);
        }
        $this->load->view('modal/file');
        $this->load->view('head_foot/footer');
    }
}
