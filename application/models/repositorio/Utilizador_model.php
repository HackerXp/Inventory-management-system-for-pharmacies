<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 23/04/18
 * Time: 17:29
 */
class Utilizador_model extends CI_Model
{

	public function store($dados=array())
	{
		if($dados!=null)
		{
			if( $this->db->insert('user_teste',$dados))
				return $this->db->insert_id();
			else
				return false;
		}
	}

	public function login($dados=array())
	{
		if($dados!=null)
		{
			$this->db->where('user', $dados['user']);
			$this->db->where('senha', $dados['senha']);
			$this->db->where('estado', '1');
			$result=$this->db->get('user_teste');
			if( $result->num_rows()>0)
			{
				return $result->result();
			}else
			{
				return false;
			}
		}
	}



	public function listar()
	{
		return $this->db->get('user_teste')->result();
	}

	public function retorna_role($id_user)
	{
		return $this->db->query('select r.nome,r.sigla from role r, user_teste ut where r.id=ut.id_role and ut.id='.$id_user)->result()[0];
	}




	public function listar_utilizadores()
	{
		return $this->db->query('select ut.*, r.nome as role from user_teste ut, role r where ut.id_role=r.id and ut.estado=?',array('1'))->result();
	}


	public function controla_add_conta($id_user)
	{
		$r=0;
		$r=$this->db->query("select *from user_teste where id_cidadao=".$id_user)->result();
		return count($r);

		return $r;
	}

	public function control_cred($id_user)
	{
		$r=0;
		$r=$this->db->query("select *from conta where control_cred=0 and id_cidadao=".$id_user)->result();
		return count($r);

		return $r;
	}

	public function control_senha($id_user,$senha)
	{
		$this->db->where('id_cidadao', $id_user);
		$this->db->where('senha', $senha);
		$result=$this->db->get('user_teste');
		return $result->num_rows();
	}

	public function nome_user($id_user)
	{
		return $this->db->query("select nome from cidadao where  id=".$id_user)->result()[0];
	}

	public function alterar_senha($id,$dados=array())
	{
		$this->db->where('id_cidadao', $id);
		if($this->db->update('user_teste', $dados)) {
			$update=array('control_cred'=>1);
			$this->db->where('id_cidadao', $id);
			$this->db->update('conta', $update);
			return 1;
		}else
			return 0;
	}

	public function getById($id)
	{
		return $this->db->query('select ut.nome from user_teste ut where ut.id=?',array($id))->result();
	}


	public function alterar_foto($id,$dados=array())
	{
		$this->db->where('id', $id);
		if ($this->db->update('user_teste', $dados))
			return 1;
		else
			return 0;
	}
	public function seccao_1($id_user)
	{
		return $this->retorna_role($id_user)->nome;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		if ($this->db->delete('cidadao'))
			return 1;
		else
			return 0;
	}

}//fim da class
