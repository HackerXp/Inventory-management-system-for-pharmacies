<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 24/12/18
 * Time: 19:03
 */


class Estoque_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store($dados=null)
    {
        if ($this->db->insert('estoque',$dados) && $dados!=null)
            return $this->db->insert_id();
        return 0;
    }

    public function store_movimento_estoque($dados=null)
    {
        if ($this->db->insert('movivento_estoque',$dados) && $dados!=null)
            return $this->db->insert_id();
        return 0;
    }

    public function update($id,$dados=array())
    {
        $this->db->where('id', $id);
        if ($this->db->update('estoque', $dados))
            return 1;
        else
            return 0;
    }

    public function update1($id,$dados=array())
    {
        $this->db->where('id_producto', $id);
        if ($this->db->update('estoque', $dados))
            return 1;
        else
            return 0;
    }

    public function getEstoqueProd($id)
    {
        return $this->db->query('select qtde_retalho, qtde_grosso from estoque where id_producto=?',array($id))->result()[0];
    }
    
    public function baixa($desconto,$id_prod)
    {
        return $this->db->query('update estoque set qtde_retalho=? where id_producto=?',array($desconto,$id_prod));
    }

    public function movimento()
    {
        return $this->db->query('select f.nome,p.nome as produto,p.data_fabrico,p.data_expir,me.*, ut.nome user from movivento_estoque me, producto p, fornecedor f, user_teste ut where me.id_fornecedor=f.id and me.id_producto=p.id and me.id_utilizador=ut.id and f.estado=? order by me.id desc',array('1'))->result();

    }

    public function getNum_factura($id)
    {
        return $this->db->query('select num_factura from movivento_estoque where id=?',array($id))->result();
    }

    public function update_mv_estoque($dados,$id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('movivento_estoque',$dados))
            return 1;
        else
            return 0;
    }
}