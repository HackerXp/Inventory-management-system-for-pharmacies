<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/18
 * Time: 16:11
 */

class Categoria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //Visao
    public function listar()
    {
        $this->k_menus['titulo']="Gest - Farma | Listar Categoria";
        $this->k_menus['categorias'] = $this->categoria->listar();
        $this->load->view('head_foot/header',$this->k_menus);
        if($this->controla==false)
            $this->load->view('errors/autorizacao_negada',$this->k_menus);
        else
        {
            $this->load->view('categoria/listar',$this->k_menus);
        }
        $this->load->view('modal/file');
        $this->load->view('head_foot/footer');
    }

    //Model
    public function store()
    {
        $categoria=array(
            'nome'=>$this->input->post('nome'),
            'id_utilizador'=>$this->session->userdata('id')
        );

        if ($categoria['nome']!=null||$categoria['nome']!="") {
            if ($this->categoria->store($categoria) != 0)
                echo callback('success', 'Categoria adicionada com sucesso', 'Gest - Farma informa');
            else
                echo callback('error', 'Erro ao efectuar esta operação', 'Gest - Farma informa');
        }else{
            echo callback('error', 'Informe o nome', 'Gest - Farma informa');
        }
    }

    public function update()
    {
        $dados=array('nome'=>$this->input->post('nome'));

        if ($dados['nome']!=null||$dados['nome']!="") {
            if ($this->categoria->update($dados, $this->input->post('id_categoria')) != 0)
                echo callback('success', 'Categoria editada com sucesso', 'Gest - Farma informa');
            else
                echo callback('error', 'Erro ao efectuar esta operação', 'Gest - Farma informa');
        }else{
            echo callback('error', 'Informe o nome', 'Gest - Farma informa');
        }
    }


    public function eliminar()
    {
        if ($this->categoria->delete($this->input->post('id'))==1)
            echo callback('success', 'Categoria eliminada com sucesso', 'Gest - Farma informa');
        else
            echo callback('error', 'Erro ao efectuar esta operação', 'Gest - Farma informa');
    }

    public function getById()
    {
        echo json_encode($this->categoria->getById($this->input->get('id')));
    }
}