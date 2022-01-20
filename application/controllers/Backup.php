<?php
/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 09/05/19
 * Time: 17:07
 */

class Backup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
    }

    public function backup_db()
    {
        $this->load->dbutil();
        $db_format=array('format'=>'zip','filename'=>'gest-farma-usp.sql');
        $backup=& $this->dbutil->backup($db_format);
        $dbname='backup-on-'.date('Y-m-d').'.zip';
        $save='db_backup/'.$dbname;
        write_file($save,$backup);
        force_download($dbname,$backup);
    }

}