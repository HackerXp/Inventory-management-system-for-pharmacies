<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 20/12/18
 * Time: 16:17
 */


class Categoria_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store($dados=null)
    {
        if ($this->db->insert('categoria',$dados) && $dados!=null)
            return $this->db->insert_id();
        return 0;
    }

    public function listar()
    {
        return $this->db->query('select c.*, ut.nome as user from categoria c, user_teste ut where c.id_utilizador=ut.id')->result();
    }

    public function listar1()
    {
        return $this->db->query('select c.* from categoria c where c.id not  in (select id_categoria from estante)')->result();
    }

    public function listar2()
    {
        return $this->db->query('select distinct c.* from categoria c, estante e where c.id not in (select e1.id_categoria from categoria c1, estante e1 where c1.id=e1.id_categoria)')->result();
    }

    public function getById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('categoria')->result();
    }

    public function update($dados,$id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('categoria',$dados))
            return 1;
        else
            return 0;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('categoria'))
            return 1;
        else
            return 0;
    }
}