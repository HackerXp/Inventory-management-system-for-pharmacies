<?php

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 24/08/18
 * Time: 15:25
 */
class Conta_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function store($dados=null)
	{
		if ($this->db->insert('user_teste',$dados) && $dados!=null)
			return $this->db->insert_id();
		return 0;
	}

	public function delete($id)
	{
		$this->db->where('id_cidadao', $id);
		if ($this->db->delete('user_teste'))
			return 1;
		else
			return 0;
	}

    public function getDados($id)
    {
        return $this->db->query('select *from user_teste where id=?',array($id))->result();
    }

    public function getFoto()
    {
        return $this->db->query('select fotografia from user_teste where id=?',array($this->session->userdata('id')))->result()[0];
    }

    public function conferir($id,$senha)
    {
        return $this->db->query('select id from user_teste where id=? and senha=?',array($id,$senha))->num_rows();
    }
    
	public function update($dados,$id)
	{
//		$this->db->where('id_cidadao', $id);
		$this->db->where('id', $id);
		if ($this->db->update('user_teste',$dados))
			return 1;
		else
			return 0;
	}
}
