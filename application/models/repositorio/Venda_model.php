<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 25/12/18
 * Time: 16:22
 */


class Venda_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store($dados=null)
    {
        if ($this->db->insert('venda',$dados) && $dados!=null)
            return $this->db->insert_id();
        return 0;
    }
    public function store_prod_venda($dados=null)
    {
        if ($this->db->insert('venda_produto',$dados) && $dados!=null)
            return $this->db->insert_id();
        return 0;
    }

    public function listar()
    {
        return $this->db->query('SELECT v.*, ut.nome as user, sum(vp.qtde_prod) as qtde_prod from venda v, user_teste ut,venda_produto vp where v.id=vp.id_venda and v.id_utilizador=ut.id and v.estado=? GROUP BY v.id order by v.id desc',array('1'))->result();
    }

    public function get_venda_by_id($id)
    {
        return $this->db->query('select v.*, ut.nome as user, r.nome as repart from venda v, user_teste ut, reparticao r where v.id_reparticao=r.id and v.id_utilizador=ut.id and v.id=?',array($id))->result()[0];
    }
    public function detalhe($id)
    {
        return $this->db->query('SELECT v.*,p.nome,p.codigo,p.preco,vp.qtde_prod FROM venda v, producto p, venda_produto vp WHERE v.id=vp.id_venda and p.id=vp.id_produto and v.id=?',array($id))->result();
    }

    public function update($dados,$id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('venda',$dados))
            return 1;
        else
            return 0;
    }

    public function grafico()
    {
        return $this->db->query('SELECT c.nome as categoria, p.nome as producto, sum(vp.qtde_prod) as count, (p.preco*sum(vp.qtde_prod)) as preco FROM venda v, producto p, venda_produto vp, categoria c WHERE v.id=vp.id_venda and p.id=vp.id_produto and c.id=p.id_categoria and v.data_criacao=? and v.estado=? group by p.nome',array(date('Y-m-d'),'1'))->result();
    }

    public function venda_por_data($data1,$data2)
    {
        return $this->db->query('SELECT c.nome as categoria, p.nome as producto, sum(vp.qtde_prod) as count, (p.preco*sum(vp.qtde_prod)) as preco FROM venda v, producto p, venda_produto vp, categoria c WHERE v.id=vp.id_venda and p.id=vp.id_produto and c.id=p.id_categoria and v.data_criacao between ? and ? and v.estado=? group by p.nome',array($data1,$data2,'1'))->result();
    }

    public function venda_por_area($data1,$data2)
    {
        return $this->db->query('SELECT r.nome, count(v.comprador) as count FROM venda v, reparticao r WHERE v.id_reparticao=r.id and v.data_criacao between ? and ? and v.estado=? group by r.nome',array($data1,$data2,'1'))->result();
    }
}