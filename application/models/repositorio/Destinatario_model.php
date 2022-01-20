<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 2020-02-06
 * Time: 21:23
 */

class Destinatario_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store($dados=null)
    {
        if ($this->db->insert('reparticao',$dados) && $dados!=null)
            return $this->db->insert_id();
        return 0;
    }

    public function listar()
    {
        return $this->db->query('select r.*, ut.nome as user from reparticao r, user_teste ut where r.id_utilizador=ut.id and r.estado=? order by r.nome asc',array('1'))->result();
    }


    public function getById($id)
    {
        return $this->db->query('select r.nome from reparticao r where r.id=? and r.estado=?',array($id,'1'))->result();
    }
    
    public function update($dados,$id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('reparticao',$dados))
            return 1;
        else
            return 0;
    }
}