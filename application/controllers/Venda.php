<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 25/12/18
 * Time: 09:24
 */

class Venda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //Visao
    public function novo()
    {
        $this->k_menus['titulo']="SIAU | Nova Venda";
        $this->k_menus['categorias'] = $this->categoria->listar();
        $this->k_menus['reparticao'] = $this->destinatario->listar();
        $this->load->view('head_foot/header',$this->k_menus);
        if($this->controla==false)
            $this->load->view('errors/autorizacao_negada',$this->k_menus);
        else
            $this->parser->parse('venda/novo',$this->k_menus);
        $this->load->view('modal/file');
        $this->load->view('head_foot/footer');
    }

    public function listar()
    {
        $this->k_menus['titulo']="Gest - Farma | Listar Venda";
        $this->k_menus['vendas'] = $this->venda->listar();
        $this->load->view('head_foot/header',$this->k_menus);
        if($this->controla==false)
            $this->load->view('errors/autorizacao_negada',@$this->k_menus);
        else
        {
            $this->load->view('venda/listar',$this->k_menus);
        }
        $this->load->view('modal/file');
        $this->load->view('head_foot/footer');
    }

    public function detalhe($param=null)
    {
        $this->load->library('Pdf');
        $this->k_menus['detalhes'] = $this->venda->detalhe($param);
        $this->k_menus['venda'] = $this->venda->get_venda_by_id($param);
        if($this->controla==false) {
            $this->load->view('errors/autorizacao_negada', $this->k_menus);
            $this->load->view('modal/file');
            $this->load->view('head_foot/footer');
        }else {
            $this->load->view('venda/detalhe', $this->k_menus);
        }
    }


    //Model
    public function store()
    {
        $ret=0;
        $cont=count($this->input->post('carrinho'));
        $carrinho=$this->input->post('carrinho');


        $nome="Anônimo";
        if ($this->input->post('nome')!=null || $this->input->post('nome')!="")
            $nome=$this->input->post('nome');

        $repart=1;
        if ($this->input->post('id_reparticao')!="" || $this->input->post('nome')!=0)
            $repart=$this->input->post('id_reparticao');

        $total=0;
        for ($i=0;$i<count($carrinho);$i++)
        {
            $total+=$carrinho[$i]['preco'];
        }

        $venda=array(
            'qtde_prod'=>$cont,
            'valor_total'=>$total,
            'id_utilizador'=>$this->session->userdata('id'),
            'comprador'=>$nome,
            'data_criacao'=>date('Y-m-d'),
            'estado'=>'1',
            'id_reparticao'=>$repart
        );//depois aprimorar com a entrada de compradores


        $id_venda=$this->venda->store($venda);//store_prod_venda

        for ($i=0;$i<count($carrinho);$i++)
        {
            $qtde_retalho=$this->estoque->getEstoqueProd($carrinho[$i]['id_produto'])->qtde_retalho;
            $qtde_grosso=$this->estoque->getEstoqueProd($carrinho[$i]['id_produto'])->qtde_grosso;

                $qtde_considerar=$this->producto->getQtdeConsiderar($carrinho[$i]['id_produto'])->qtde_grosso;
                $ctrl_grosso=$this->producto->getQtdeConsiderar($carrinho[$i]['id_produto'])->ctrl_grosso;
                $operacao=$carrinho[$i]['qtde']/$qtde_considerar;
                $operacao_ctrl=number_format($ctrl_grosso/$qtde_considerar,0);
             if (number_format($operacao,0)<1)
             {
                    if ($operacao_ctrl<1)
                    {

                        $baixa_estoque=array(
                            'qtde_retalho'=>($qtde_retalho-$carrinho[$i]['qtde'])
                        );
                        $this->estoque->update1($carrinho[$i]['id_produto'],$baixa_estoque);

                        $dados=array(
                            'ctrl_grosso'=>$ctrl_grosso+$carrinho[$i]['qtde']
                        );
                        $this->producto->update($carrinho[$i]['id_produto'],$dados);
                    }else{
                        $baixa_estoque=array(
                            'qtde_retalho'=>($qtde_retalho-$carrinho[$i]['qtde']),
                            'qtde_grosso'=>($qtde_grosso-$operacao_ctrl)
                        );
                        $this->estoque->update1($carrinho[$i]['id_produto'],$baixa_estoque);
                        $dados=array(
                            'ctrl_grosso'=>0
                        );
                        $this->producto->update($carrinho[$i]['id_produto'],$dados);
                    }

             }else
                 {
                     $baixa_estoque=array(
                         'qtde_retalho'=>($qtde_retalho-$carrinho[$i]['qtde']),
                         'qtde_grosso'=>($qtde_grosso-number_format($operacao,0))
                     );
                     $this->estoque->update1($carrinho[$i]['id_produto'],$baixa_estoque);
                 }

            $venda_prod=array(
                'id_venda'=>$id_venda,
                'id_produto'=>$carrinho[$i]['id_produto'],
                'qtde_prod'=>$carrinho[$i]['qtde']
            );
            $ret=$this->venda->store_prod_venda($venda_prod);
        }
        if($ret!=0)
            echo callback('success','Venda efectuada com sucesso','Gest - Farma informa');
        else
            echo callback('error','Erro ao efectuar esta operação','Gest - Farma informa');
    }

    public function delete()
    {
        $dado=array('estado'=>'0');

        if($this->venda->update($dado,$this->input->post('id'))!=0)
            echo callback('success','Venda eliminada com sucesso','Gest - Farma informa');
        else
            echo callback('error','Erro ao efectuar esta operação','Gest - Farma informa');
    }

    public function venda_diaria()
    {
        echo json_encode($this->venda->grafico());
    }

    public function venda_por_data()
    {
        if (count($this->venda->venda_por_data($this->input->get('data1'), $this->input->get('data2'))) == 0)
            echo "[{\"erro\":\" <div class='alert bg-danger-50 border-1 fade show rounded-0'><div class='d-flex align-items-center'><div class='alert-icon'><i class='fa fa-calendar text-danger'></i></div><div class='flex-1'><span class='fw-700'>Venda não encontrada</span><br>Não existe vendas entre as datas inseridas.</div></div></div> \"}]";
        else
            echo json_encode($this->venda->venda_por_data($this->input->get('data1'),$this->input->get('data2')));
    }

    public function venda_por_area()
    {
        if (count($this->venda->venda_por_area($this->input->get('data1'), $this->input->get('data2'))) == 0)
            echo "[{\"erro\":\" <div class='alert bg-danger-50 border-1 fade show rounded-0'><div class='d-flex align-items-center'><div class='alert-icon'><i class='fa fa-calendar text-danger'></i></div><div class='flex-1'><span class='fw-700'>Venda não encontrada</span><br>Não existe vendas entre as datas inseridas.</div></div></div> \"}]";
        else
            echo json_encode($this->venda->venda_por_area($this->input->get('data1'),$this->input->get('data2')));
    }

}