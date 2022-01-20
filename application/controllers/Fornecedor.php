<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 2019-12-22
 * Time: 11:26
 */

class Fornecedor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //Visao
    public function listar()
    {
        $this->k_menus['titulo']="Gest - Farma | Listar Fornecedor";
        $this->k_menus['fornecedores'] = $this->fornecedor->listar();
        $this->load->view('head_foot/header',$this->k_menus);
        if($this->controla==false)
            $this->load->view('errors/autorizacao_negada',$this->k_menus);
        else
        {
            $this->load->view('fornecedor/listar',$this->k_menus);
        }
        $this->load->view('modal/file');
        $this->load->view('head_foot/footer');
    }

    //Model
    public function store()
    {
        $fornecedor=array(
            'nome'=>$this->input->post('nome'),
            'nif'=>$this->input->post('nif'),
            'telefone'=>$this->input->post('telefone'),
            'estado'=>'1',
            'data_criacao'=>date('Y-m-d'),
            'id_utilizador'=>$this->session->userdata('id')
        );

        if($this->fornecedor->store($fornecedor)!=0)
            echo callback('success','Fornecedor adicionado com sucesso','Gest-Farma informa');
        else
            echo callback('error','Erro ao efectuar esta operação','Gest-Farma informa');
    }

    public function update()
    {
        $fornecedor=array(
            'nome'=>$this->input->post('nome'),
            'nif'=>$this->input->post('nif'),
            'telefone'=>$this->input->post('telefone')
        );
        if($this->fornecedor->update($this->input->post('id'),$fornecedor)!=0)
            echo callback('success','Dados editado com sucesso','Gest - Farma informa');
        else
            echo callback('error','Erro ao efectuar esta operação','Gest - Farma informa');
    }
    public function eliminar()
    {
        $fornecedor=array('estado'=>'0');

        if($this->fornecedor->update($this->input->post('id'),$fornecedor)!=0)
            echo callback('success','Fornecedor eliminado com sucesso','Gest - Farma informa');
        else
            echo callback('error','Erro ao efectuar esta operação','Gest - Farma informa');
    }

    public function getById()
    {
        echo  json_encode($this->fornecedor->getById($this->input->get('id')));
    }
}