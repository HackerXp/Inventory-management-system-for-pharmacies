<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 25/12/18
 * Time: 08:43
 */


class Role_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store($dados = array())
    {
        if ($this->db->insert('role', $dados) && $dados != null)
            return $this->db->insert_id();
        else
            return false;
    }

    public function getRole()
    {
        return $this->db->query('select * from role where nome!=?',array('Master'))->result();
    }

}
