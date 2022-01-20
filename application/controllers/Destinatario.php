<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 2020-02-06
 * Time: 21:18
 */

class Destinatario extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //Visao
    public function listar()
    {
        $this->k_menus['titulo']="SIAU | Listar Destinatário";
        $this->k_menus['destinatarios'] = $this->destinatario->listar();
        $this->load->view('head_foot/header',$this->k_menus);
        if($this->controla==false)
            $this->load->view('errors/autorizacao_negada',$this->k_menus);
        else
            $this->parser->parse('destinatario/listar',$this->k_menus);
        $this->load->view('modal/file');
        $this->load->view('head_foot/footer');
    }


    //Model
    public function store()
    {
        $destinatario=array(
            'nome'=>$this->input->post('nome'),
            'id_utilizador'=>$this->session->userdata('id'),
            'estado'=>'1',
            'data_criacao'=>date('Y-m-d')
        );
        if ($destinatario['nome']!=null||$destinatario['nome']!="") {
            if ($this->destinatario->store($destinatario) != 0)
                echo callback('success', 'Destinatário adicionado com sucesso', 'Gest - Farma informa');
            else
                echo callback('error', 'Erro ao efectuar esta operação', 'Gest - Farma informa');
        }else{
            echo callback('error', 'Informe o nome', 'Gest - Farma informa');
        }
    }

    public function getById()
    {
        echo json_encode($this->destinatario->getById($this->input->get('id')));
    }

    public function update()
    {
        $dados=array('nome'=>$this->input->post('nome'));

        if($this->destinatario->update($dados,$this->input->post('id_destinatario'))!=0)
            echo callback('success','Destinatário editado com sucesso','Gest - Farma informa');
        else
            echo callback('error','Erro ao efectuar esta operação','Gest - Farma informa');
    }

    public function eliminar()
    {
        $dados=array('estado'=>'0');
        if($this->destinatario->update($dados,$this->input->post('id'))!=0)
            echo callback('success','Destinatário eliminado com sucesso','Gest - Farma informa');
        else
            echo callback('error','Erro ao efectuar esta operação','Gest - Farma informa');

    }
}