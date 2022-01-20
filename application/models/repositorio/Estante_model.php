<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 24/12/18
 * Time: 15:59
 */


class Estante_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store($dados=null)
    {
        if ($this->db->insert('estante',$dados) && $dados!=null)
            return $this->db->insert_id();
        return 0;
    }

    public function listar()
    {
        return $this->db->query('select e.*, c.nome from estante e, categoria c where e.id_categoria=c.id and e.estado=?',array('1'))->result();
    }

    public function get_codigo($id_categoria)
    {
        return $this->db->query('select e.id, e.codigo from estante e where e.id_categoria=?',array($id_categoria))->result();
    }

    public function update($dados,$id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('estante',$dados))
            return 1;
        else
            return 0;
    }
}