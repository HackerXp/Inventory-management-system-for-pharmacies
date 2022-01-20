<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/18
 * Time: 20:51
 */


class Producto_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store($dados=null)
    {
        if ($this->db->insert('producto',$dados) && $dados!=null)
            return $this->db->insert_id();
        return 0;
    }

    public function update($id,$dados=array())
    {
        $this->db->where('id', $id);
        if ($this->db->update('producto', $dados))
            return 1;
        else
            return 0;
    }

    public function listar()
    {
        return $this->db->query('select distinct p.*, c.nome as categoria, e.qtde_retalho as estoque,e.qtde_grosso, es.codigo as estante from producto p, categoria c,estoque e, estante es where p.id_categoria=c.id and p.id=e.id_producto and es.id_categoria=c.id and p.estado=?',array('1'))->result();
    }

    public function listarById($id)
    {
        return $this->db->query('select distinct p.*, c.nome as categoria from producto p, categoria c where p.id_categoria=c.id and p.id=?',array($id))->result()[0];
    }

    public function getNome($id)
    {
        return $this->db->query('select distinct p.nome,p.qtde_grosso from producto p where  p.id=?',array($id))->result()[0];
    }

    public function getQtdeConsiderar($id)
    {
        return $this->db->query('select qtde_grosso,ctrl_grosso from producto where id=?',array($id))->result()[0];
    }

    public function get_by_id_categoria($param)
    {
        return $this->db->query('select p.*, c.nome as categoria, e.qtde_retalho as estoque,e.qtde_grosso, es.codigo as estante from producto p, categoria c,estoque e, estante es where p.id_categoria=c.id and p.id=e.id_producto and es.id_categoria=c.id and c.id=? and p.estado=? and e.qtde_retalho>p.qtde_critica',array($param,'1'))->result();
    }

    public function get_req_by_id_categoria($param)
    {
        return $this->db->query('select p.*, c.nome as categoria, e.qtde_retalho as estoque,e.qtde_grosso, es.codigo as estante from producto p, categoria c,estoque e, estante es where p.id_categoria=c.id and p.id=e.id_producto and es.id_categoria=c.id and c.id=? and p.estado=? and e.qtde_retalho<=?',array($param,'1',50))->result();
    }

    public function get_produto_by_codigo_barra($param)
    {
        return $this->db->query('select p.*, c.nome as categoria, e.qtde_retalho as estoque,e.qtde_grosso, es.codigo as estante from producto p, categoria c,estoque e, estante es where p.id_categoria=c.id and p.id=e.id_producto and es.id_categoria=c.id and p.codigo=? and p.estado=? and (e.qtde_retalho>p.qtde_critica or p.qtde_critica=?)',array($param,'1',5))->result();
    }
}