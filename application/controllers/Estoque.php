<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 24/12/18
 * Time: 22:32
 */

class Estoque extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //Visao
    public function movimento($param=null)
    {
        if ($param==null) {
            $this->k_menus['titulo'] = "Gest - Farma | Listar Movimentos";
            $this->k_menus['movimentos'] = $this->estoque->movimento();
            $this->load->view('head_foot/header', $this->k_menus);
            if ($this->controla == false)
                $this->load->view('errors/autorizacao_negada', $this->k_menus);
            else
                $this->load->view('estoque/movimento', $this->k_menus);
            $this->load->view('modal/file');
            $this->load->view('head_foot/footer');
        }else{
            $this->load->library('Pdf');
            $this->k_menus['movimentos'] = $this->estoque->movimento();
            if($this->controla==false) {
                $this->load->view('errors/autorizacao_negada', $this->k_menus);
                $this->load->view('modal/file');
                $this->load->view('head_foot/footer');
            }else {
                $this->load->view('estoque/movimento_pdf', $this->k_menus);
            }
        }
    }

    //Model
    public function store()
    {
        $estoque=array(
            'id_fornecedor'=>$this->input->post('id_fornecedor'),
            'id_producto'=>$this->input->post('id_producto'),
            'num_factura'=>$this->input->post('numero_factura'),
            'qtde_grosso'=>$this->input->post('qtde_ini_grosso_estq'),
            'qtde_retalho'=>$this->input->post('qtde_retalho_es'),
            'data_criacao'=>date('Y-m-d'),
            'id_utilizador'=>$this->session->userdata('id')
        );
        if ($this->session->userdata('ctrl_data_prod')==1)
            $this->session->unset_userdata('ctrl_data_prod');
        if ($this->estoque->store_movimento_estoque($estoque)!=0)
            {
                $retalhoPro=$this->estoque->getEstoqueProd($this->input->post('id_producto'))->qtde_retalho;
                $grossoPro=$this->estoque->getEstoqueProd($this->input->post('id_producto'))->qtde_grosso;

                $dados_estoque=array(
                    'qtde_retalho'=>($retalhoPro+(int)$this->input->post('qtde_retalho_es')),
                    'qtde_grosso'=>($grossoPro+(int)$this->input->post('qtde_ini_grosso_estq')),
                );

                $produto=array(
                    'data_fabrico'=>$this->input->post('data_fab_prod'),
                    'data_expir'=>$this->input->post('data_exp_prod')
                );

                $this->producto->update($this->input->post('id_producto'),$produto);

                if ($this->estoque->update1($this->input->post('id_producto'),$dados_estoque)!=0)
                    echo callback('success','Estoque actualizado com sucesso','Gest - Farma informa');
                else
                    echo callback('error','Erro ao efectuar esta operação','Gest - Farma informa');
            }



    }

    public function getNum_factura()
    {
        echo json_encode($this->estoque->getNum_factura($this->input->get('id')));
    }

    public function update_mv_estoque()
    {
        $dados=array('num_factura'=>$this->input->post('num_factura'));

        if($this->estoque->update_mv_estoque($dados,$this->input->post('id_movimento_estoque'))!=0)
            echo callback('success','Número da factura editado com sucesso','Gest - Farma informa');
        else
            echo callback('error','Erro ao efectuar esta operação','Gest - Farma informa');
    }
}
