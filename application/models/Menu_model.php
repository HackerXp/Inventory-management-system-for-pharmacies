<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 17/04/18
 * Time: 22:56
 */
class Menu_model extends CI_Model
{

    public function store(\Entity\Menu $menu)
    {
        $this->doctrine->em->persist($menu);
        $this->doctrine->em->flush();
    }
}