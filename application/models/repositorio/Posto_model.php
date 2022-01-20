<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 06/01/19
 * Time: 15:04
 */

class Posto_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }



    public function listar()
    {
        return $this->db->query('select *from posto where nome !=?',array("Civil"))->result();
    }
}
