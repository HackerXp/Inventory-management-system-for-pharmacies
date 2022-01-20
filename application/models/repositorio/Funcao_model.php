<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 02/01/19
 * Time: 19:47
 */

class Funcao_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store($dados=array())
    {
		if($dados!=null)
		{
			if( $this->db->insert('funcao',$dados))
				return $this->db->insert_id();
			else
				return false;
		}
    }

    public function listar()
    {
        return $this->db->query('select f.*, u.user from funcao f, user_teste u where f.id_criador=u.id')->result();
    }
}
