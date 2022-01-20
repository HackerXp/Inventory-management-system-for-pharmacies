<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 2019-12-22
 * Time: 11:29
 */

class Fornecedor_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store($dados=null)
    {
        if ($this->db->insert('fornecedor',$dados) && $dados!=null)
            return $this->db->insert_id();
        return 0;
    }

    public function listar()
    {
        return $this->db->query('select f.*, ut.nome as user from fornecedor f, user_teste ut where f.id_utilizador=ut.id and f.estado=?',array('1'))->result();
    }

    public function getById($id)
    {
        return $this->db->query('select f.* from fornecedor f where  f.id=?',array($id))->result();
    }
    public function update($id,$dados)
    {
        $this->db->where('id', $id);
        if ($this->db->update('fornecedor',$dados))
            return 1;
        else
            return 0;
    }
}