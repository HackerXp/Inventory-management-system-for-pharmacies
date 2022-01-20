<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 2019-12-28
 * Time: 14:56
 */

class Estatistica extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function diaria($param=null)
    {
        if ($param==null) {
            $this->k_menus['titulo'] = "Gest - Farma | Estatística de vendas diárias";
            $this->load->view('head_foot/header', $this->k_menus);
            if ($this->controla == false)
                $this->load->view('errors/autorizacao_negada', $this->k_menus);
            else
                $this->load->view('estatistica/diaria', $this->k_menus);
            $this->load->view('modal/file');
            $this->load->view('head_foot/footer');
        }else
            {
                $this->load->library('Pdf');
                $this->k_menus['venda'] = $this->venda->grafico();
                if($this->controla==false) {
                    $this->load->view('errors/autorizacao_negada', $this->k_menus);
                    $this->load->view('modal/file');
                    $this->load->view('head_foot/footer');
                }else {
                    $this->load->view('estatistica/diaria_pdf', $this->k_menus);
                }
            }
    }

    public function por_data($param=null)
    {
        if ($param==null) {
            $this->k_menus['titulo'] = "Gest - Farma | Estatística de vendas por data";
            $this->load->view('head_foot/header', $this->k_menus);
            if ($this->controla == false)
                $this->load->view('errors/autorizacao_negada', $this->k_menus);
            else
                $this->load->view('estatistica/por_data', $this->k_menus);
            $this->load->view('modal/file');
            $this->load->view('head_foot/footer');
        }else
        {
            $this->load->library('Pdf');
            $this->k_menus['venda'] = $this->venda->venda_por_data($this->uri->segment(3),$this->uri->segment(4));
            $this->k_menus['data1'] =$this->uri->segment(3);
            $this->k_menus['data2'] =$this->uri->segment(4);
            if($this->controla==false) {
                $this->load->view('errors/autorizacao_negada', $this->k_menus);
                $this->load->view('modal/file');
                $this->load->view('head_foot/footer');
            }else {
                $this->load->view('estatistica/por_data_pdf', $this->k_menus);
            }
        }
    }


    public function saida_por_area($param=null)
    {
        if ($param==null) {
            $this->k_menus['titulo'] = "Gest - Farma | Estatística de saída por área";
            $this->load->view('head_foot/header', $this->k_menus);
            if ($this->controla == false)
                $this->load->view('errors/autorizacao_negada', $this->k_menus);
            else
                $this->load->view('estatistica/por_area', $this->k_menus);
            $this->load->view('modal/file');
            $this->load->view('head_foot/footer');
        }else
        {
            $this->load->library('Pdf');
            $this->k_menus['venda'] = $this->venda->venda_por_area($this->uri->segment(3),$this->uri->segment(4));
            $this->k_menus['data1'] =$this->uri->segment(3);
            $this->k_menus['data2'] =$this->uri->segment(4);
            if($this->controla==false) {
                $this->load->view('errors/autorizacao_negada', $this->k_menus);
                $this->load->view('modal/file');
                $this->load->view('head_foot/footer');
            }else {
                $this->load->view('estatistica/por_area_pdf', $this->k_menus);
            }
        }
    }
}