<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/18
 * Time: 18:48
 */

class Produto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //View
    public function novo()
    {
        $this->k_menus['titulo']="Gest - Farma | Adicionar Producto";
        $this->k_menus['categorias'] = $this->categoria->listar();
        $this->load->view('head_foot/header',$this->k_menus);
        if($this->controla==false)
            $this->load->view('errors/autorizacao_negada',$this->k_menus);
        else
            $this->parser->parse('produto/novo',$this->k_menus);
        $this->load->view('modal/file');
        $this->load->view('head_foot/footer');
    }

    public function listar()
    {
        $this->k_menus['titulo']="Gest - Farma | Listar Producto";
        $this->k_menus['produtos'] = $this->producto->listar();
        $this->load->view('head_foot/header',$this->k_menus);
        if($this->controla==false)
            $this->load->view('errors/autorizacao_negada',$this->k_menus);
        else
            $this->load->view('produto/listar',$this->k_menus);
        $this->load->view('modal/file');
        $this->load->view('head_foot/footer');
    }


    public function editar($param)
    {
        $this->k_menus['titulo']="Gest - Farma | Editar Producto";
        $this->k_menus['produto'] = $this->producto->listarById($param);
        $this->k_menus['categorias'] = $this->categoria->listar();
        $this->load->view('head_foot/header',$this->k_menus);
        if($this->controla==false)
            $this->load->view('errors/autorizacao_negada',$this->k_menus);
        else
            $this->load->view('produto/editar',$this->k_menus);
        $this->load->view('modal/file');
        $this->load->view('head_foot/footer');
    }

    public function estoque($param)
    {
        $this->k_menus['titulo']="Gest - Farma | Estoque do Producto";
        $this->k_menus['id_producto'] =$param;
        $this->k_menus['fornecedores'] = $this->fornecedor->listar();
        $this->k_menus['produto_nome'] = $this->producto->getNome($param)->nome;
        $this->load->view('head_foot/header',$this->k_menus);
        if($this->controla==false)
            $this->load->view('errors/autorizacao_negada',$this->k_menus);
        else
            $this->load->view('produto/estoque',$this->k_menus);
        $this->load->view('modal/file');
        $this->load->view('head_foot/footer');
    }

    public function estoque_()
    {
        $this->load->library('Pdf');
        $this->k_menus['categorias'] = $this->categoria->listar();
        if($this->controla==false) {
            $this->k_menus['titulo']="Gest - Farma | Autorização Negada";
            $this->load->view('head_foot/header', $this->k_menus);
            $this->load->view('errors/autorizacao_negada', $this->k_menus);
            $this->load->view('modal/file');
            $this->load->view('head_foot/footer');
        } else {
            $this->load->view('produto/listagem_pdf', $this->k_menus);
        }
    }

    public function requisicao()
    {
        $this->load->library('Pdf');
        $this->k_menus['categorias'] = $this->categoria->listar();
        if($this->controla==false) {
            $this->k_menus['titulo']="Gest - Farma | Autorização Negada";
            $this->load->view('head_foot/header', $this->k_menus);
            $this->load->view('errors/autorizacao_negada', $this->k_menus);
            $this->load->view('modal/file');
            $this->load->view('head_foot/footer');
        } else {
            $this->load->view('produto/requisicao', $this->k_menus);
        }
    }

    public function em_analise()
    {
        $this->load->library('Pdf');
        $this->k_menus['categorias'] = $this->categoria->listar();
        if($this->controla==false) {
            $this->k_menus['titulo']="Gest - Farma | Autorização Negada";
            $this->load->view('head_foot/header', $this->k_menus);
            $this->load->view('errors/autorizacao_negada', $this->k_menus);
            $this->load->view('modal/file');
            $this->load->view('head_foot/footer');
        } else {
            $this->load->view('produto/em_analise', $this->k_menus);
        }
    }


    //Model
    public function store()
    {
        $produto=array(
            'nome'=>$this->input->post('nome_prod'),
            'codigo'=>$this->input->post('codigo_prod'),
            'id_categoria'=>$this->input->post('id_categoria_prod'),
            'data_fabrico'=>$this->input->post('data_fab_prod'),
            'data_expir'=>$this->input->post('data_exp_prod'),
            'id_estante'=>$this->input->post('id_estante_prod'),
            'qtde_critica'=>5,
            'qtde_grosso'=>$this->input->post('qtde_grosso'),
            'data_adicao'=>date('Y-m-d'),
            'estado'=>'1',
            'preco'=>$this->input->post('preco'),
            'ctrl_grosso'=>0
        );
        
        print_r($produto);
        die;
        $id_prod=$this->producto->store($produto);
        $estoque=array(
            'qtde_retalho'=>0,
            'qtde_grosso'=>0,
            'id_producto'=>$id_prod);
        if($this->estoque->store($estoque)!=0){
            $this->session->set_userdata('ctrl_data_prod',1);
            echo callback('success', 'Produto adicionado com sucesso', 'Gest - Farma informa', $id_prod);
        }else
            echo callback('error','Erro ao efectuar esta operação','Gest - Farma informa');
    }

    //992851343
    public function update()
    {
        $produto=array(
            'nome'=>$this->input->post('nome_prod'),
            'codigo'=>$this->input->post('codigo_prod'),
            'id_categoria'=>$this->input->post('id_categoria_prod'),
            'data_fabrico'=>$this->input->post('data_fab_prod'),
            'data_expir'=>$this->input->post('data_exp_prod'),
            'qtde_grosso'=>$this->input->post('qtde_grosso'),
            'preco'=>$this->input->post('preco')
		);

        if($this->producto->update($this->input->post('id_produto'),$produto)!=0)
            echo callback('success','Produto editado com sucesso','Gest - Farma informa');
        else
            echo callback('error','Erro ao efectuar esta operação','Gest - Farma informa');
    }

    public function delete()
    {
        $produto=array('estado'=>'0');

        if($this->producto->update($this->input->post('id'),$produto)!=0)
            echo callback('success','Produto eliminado com sucesso','Gest - Farma informa');
        else
            echo callback('error','Erro ao efectuar esta operação','Gest - Farma informa');
    }

    public function get_by_id_categoria()
    {
        $response=$this->producto->get_by_id_categoria($this->input->get('param'));
        echo json_encode($response);
    }

    public function getValorGrosso()
    {
        echo $this->producto->getNome($this->input->get('param'))->qtde_grosso;
    }

    public function get_produto_by_codigo_barra()
    {
        if (count($this->producto->get_produto_by_codigo_barra($this->input->get('param'))) == 0)
            echo "[{\"erro\":\" <div class='alert bg-danger-50 border-1 fade show rounded-0'><div class='d-flex align-items-center'><div class='alert-icon'><i class='fa fa-calendar text-danger'></i></div><div class='flex-1'><span class='fw-700'>Producto não encontrado</span><br>Não existe producto com este código.</div></div></div> \"}]";
        else
            echo json_encode($this->producto->get_produto_by_codigo_barra($this->input->get('param')));
    }
}
