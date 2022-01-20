<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2018, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2018, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;
    public $k_menus=array();
    public $controla=false;
    public $validacao=false;
    public $msgError=null;
	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
        date_default_timezone_set('Africa/Luanda');
	    if (date('d-m-Y')=='00-00-0000')
	    {
            $this->validacao=true;
            $this->msgError='<h1 style="color: #a21612;margin-left: 0%;margin-top: 20%;text-align: center">O período da licença expirou, contacte o desenvolvedor do sistema para mais informações.</h1>';
        }else {
            self::$instance =& $this;

            // Assign all the class objects that were instantiated by the
            // bootstrap file (CodeIgniter.php) to local class variables
            // so that CI can run as one big super object.
            foreach (is_loaded() as $var => $class) {
                $this->$var =& load_class($class);
            }

            $this->load =& load_class('Loader', 'core');
            $this->load->initialize();
            log_message('info', 'Controller Class Initialized');


            //minhas configuracoes
            if ($this->session->userdata('id_role') != null) {

                $this->k_menus['menus'] = $this->app->listar_menu_role($this->session->userdata('id_role'));

                foreach ($this->app->listar_menu_role($this->session->userdata('id_role')) as $menu) {
                    $result = $this->app->get_menu($menu->id, $this->session->userdata('id_role'));
                    $k[$menu->nome] = $result;
                }
                $this->k_menus['builder_menu'] = @$k;
            }

            if ($this->uri->segment(1) == "app" && $this->uri->segment(2) == "dashboard") {
                $this->controla = true;
            } elseif ($this->app->control_acesso($this->uri->segment(1), $this->uri->segment(2), $this->session->userdata('id_role')) > 0) {
                $this->controla = true;
            } else {
                $this->k_menus['auto_negada'] = "De certeza que não tens autorização para ver o conteúdo que estás procurando, contacte o administrador de sistema para mais informações.";
                $this->controla = false;
            }
        }
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}

}
