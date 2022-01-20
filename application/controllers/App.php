<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function store_user()
	{
		//setando os dados da conta
		$user=array('id_cidadao'=>$this->input->post('id_user'),
			'user'=>$this->input->post('user'),
			'senha'=>$this->input->post('senha'),
			'id_role'=>$this->input->post('id_role'),
			'fotografia'=>"padrao.jpg"
		);


		$this->load->library('email');
		$config['mailtype'] = 'html';
		$config['protocol'] = 'mail'; // define o protocolo utilizado
		$config['wordwrap'] = TRUE; // define se haverá quebra de palavra no texto
		$config['validate'] = TRUE; // define se haverá validação dos endereços de email
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$this->email->initialize($config);
		$this->email->from('hackerxp33@gmail.com','Gest-Farma');
		$this->email->to($this->contacto->getEmail($this->input->post('id_user'))->email);
		$this->email->cc('helviosadoc@hotmail.com');
		$this->email->subject(utf8_decode('Suas Credênciais'));
		$this->email->message(utf8_decode('A sua conta no Gest-Farma foi criada cim sucesso, para teres acesso à ela, tens informar as seguintes credênciais: <br> <b>Username: '.$this->input->post('user').' <br> Senha: '.$this->input->post('senha').'</b> <br> Para isto, clique no <a href="http://localhost/Gest-Farma/">link</a>'));


		if($this->utilizador->store($user)!=0 && $this->email->send())
			echo callback('success','Operação efectuada com sucesso','Gest-Farma informa');
		else
			echo callback('error','Erro ao efectuar esta operação','Gest-Farma informa');
	}

    public function grupo_store()
    {
        $dados=array(
            'nome'=>$this->input->post('role',true),
            'sigla'=>$this->input->post('sigla',true),
            'id_utilizador'=>$this->session->userdata('id',true)
        );
        if($this->role->store($dados)!=0)
            echo callback('success','Grupo criado com sucesso','Gest-Farma informa');
        else
            echo callback('error','Erro ao efectuar esta operação','Gest-Farma informa');

	}
	public function control_cred()
	{
		$ret=array('bd'=>$this->utilizador->control_cred($this->input->get('id_user')),'session'=>$this->get_session_cred());
		echo "[".json_encode($ret)."]";
	}

	public function set_session_cred()
	{
		if($this->input->post('valor')!=null)
			$this->session->set_userdata('control_cred', $this->input->post('valor'));
		else
			$this->session->set_userdata('control_cred', 0);
	}

	public function get_session_cred()
	{
		return $this->session->userdata('control_cred');
	}

	public function acesso()
	{
		$callback=array();
		if(!$this->utilizador->login($this->input->post()))
		{
			$callback['erro']=1;
			$callback["response"]="<b><span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>Username ou Password errada.</b>";
		}
		else
		{
			$this->session->set_userdata('valida',true);
			$dados['id']=$this->utilizador->login($this->input->post())[0]->id;
			$id=$this->utilizador->login($this->input->post())[0]->id;
			$dados['id_cidadao']=$this->utilizador->login($this->input->post())[0]->id_cidadao;
			$dados['id_role']=$this->utilizador->login($this->input->post())[0]->id_role;
			$dados['senha']=$this->utilizador->login($this->input->post())[0]->senha;
			$dados['nome']=$this->utilizador->login($this->input->post())[0]->nome;
			$dados['user']=$this->utilizador->login($this->input->post())[0]->user;
			$this->session->set_userdata($dados);
			$callback['erro']=0;
			$callback["response"]=base_url("app/dashboard");


		}

		echo "[".json_encode($callback)."]";
	}

	public function logout()
	{
		$this->session->unset_userdata('control_cred');
		$this->session->unset_userdata('valida');
		$this->session->unset_userdata('usuario');
		session_destroy();
		redirect(base_url());
	}

	public function dashboard()
	{
		$menus_grande=array();
		if($this->session->userdata('id_role')!=null)
		{
			$this->k_menus['menus_topo1'] = $this->app->listar_menu_role_dash();
			foreach ($this->app->listar_menu_role_dash() as $menu)
			{
				$result = $this->app->get_menu($menu->id, $this->session->userdata('id_role'));
				$k[$menu->nome] = $result;
				if (in_array($menu->nome,menu_dispensado()))continue;
				array_push($menus_grande,array("menu"=>$menu->nome,"sub_menu"=>$result,"icone"=>$menu->icone));
			}

		}

		$sub_menu=array();
		$nome=array();
		$href=array();
		$total_menus=0;
		$fa=array();
		$desc=array();
		foreach ($menus_grande as $item)
		{
			if ($total_menus==3)continue;

			foreach ($item['sub_menu'] as $sub_menu1)
			{
				if($sub_menu1->nome!="")
				{

					if(count($nome)==0)
					{
						if($sub_menu1->nome="dashboard") {
                            array_push($sub_menu, $sub_menu1->nome);
                            array_push($href,$sub_menu1->controlador."/listar");
                            array_push($fa, $item['icone']);
                            array_push($desc, 'Listar '.$item['menu'].'s');
						}
						array_push($nome,$item['menu']);
					}else
					{
						for ($i=$total_menus;$i<count($nome);$i++)
						{
							if($nome[$i]!=$item['menu'])
							{
								if($sub_menu1->nome="dashboard") {
									array_push($sub_menu, $sub_menu1->nome);
									array_push($href,$sub_menu1->controlador."/listar");
                                    array_push($fa, $item['icone']);
                                    array_push($desc, 'Listar '.$item['menu'].'s');
								}
								array_push($nome,$item['menu']);
								$total_menus++;
							}
						}
					}

				}
			}
		}


		if($total_menus==3)
			$cor=array('dashboard-stat blue','dashboard-stat green-jungle','dashboard-stat grey-mint','dashboard-stat yellow-gold');
		else
			$cor=array('dashboard-stat blue','dashboard-stat green-jungle','dashboard-stat grey-mint');

		$menus_topo=dinamic_menu_topo($nome,$href,$fa,$desc);

		$this->k_menus['menus_topo']=$menus_topo;
		$this->k_menus['titulo']="Gest-Farma | Dashboard";
		$this->load->view('head_foot/header',$this->k_menus);
		if($this->controla==false)
			$this->load->view('errors/autorizacao_negada');
		else
			$this->load->view('dashboard/dash',$this->k_menus);
		$this->load->view('modal/file');
		$this->load->view('head_foot/footer');
	}



	public function criar_grupo()
	{
		$dados['titulo']="Gest-Farma| Criar Grupo";
		$this->load->view('head_foot/header',$dados);
		$this->load->view('grupo/criar');
		$this->load->view('modal/file');
		$this->load->view('head_foot/footer');
	}

	public function add_sub_menu()
	{
		$this->k_menus['titulo']="Gest-Farma | Adicionar Sub Menu";
		$this->k_menus['submenu'] = $this->app->listar_sub_menu($this->uri->segment(3));
		$this->k_menus['nome_menu'] = $this->app->nome_menu($this->uri->segment(3));
		$this->load->view('head_foot/header',$this->k_menus);
		$this->parser->parse('sub-menu/novo',$this->k_menus);
		$this->load->view('modal/file');
		$this->load->view('head_foot/footer');
	}
	public function sub_menu_store()
	{
		$kt=null;
		$k = array(
			'nome'=>$this->input->post('nome'),
			'icon'=>$this->input->post('icon'),
			'id_utilizador'=>$this->session->userdata('id')
		);
		$kt=$this->app->store_sub_menu($k);
		if ($kt!=0)
			echo callback('success','Operação efectuada com sucesso','Gest-Farma informa');
		else
			echo callback('error','Erro ao efectuar esta operação','Gest-Farma informa');
	}

	public function add_sub_menu_menu()
	{
		$ret=$this->input->post('param');
		$kt=null;
		for ($i=0;$i<count($ret);$i++)
		{
			$msm=array(
				'id_menu'=>$ret[$i]['id_menu'],
				'id_sub_menu'=>$ret[$i]['id_sub_menu'],
				'controlador'=>$ret[$i]['controller'],
				'accao'=>$ret[$i]['action'],
				'modal'=>$ret[$i]['modal'],
				'id_utilizador'=>$this->session->userdata('id')
			);
			$kt=$this->app->add_sub_menu_menu($msm);
		}
		if ($kt!=0)
			echo callback('success','Operação efectuada com sucesso','Gest-Farma informa');
		else
			echo callback('error','Erro ao efectuar esta operação','Gest-Farma informa');
	}

	public function add_privilegio()
	{
		$this->k_menus['titulo']="Gest-Farma | Adicionar Privilégio";
		$this->k_menus['menus'] = $this->app->listar_menu_role();
		foreach ($this->app->listar_menu_role() as $menu)
		{
			$result=$this->app->get_sub_menu_by_id_menu($menu->id,$this->uri->segment(2));
			$k[$menu->nome]=$result;
		}

		foreach ($this->app->listar_menu_role() as $menu)
		{
			$result=$this->app->get_sub_menu_by_id_menu4($menu->id,$this->uri->segment(2));
			$y[$menu->nome]=$result;
		}

		$this->k_menus['sub_menus']=@$k;
		$this->k_menus['sub_menus4']=@$y;
		$this->k_menus['nome_grupo'] = $this->app->nome_grupo($this->uri->segment(2))->nome;

		$this->load->view('head_foot/header',$this->k_menus);
		$this->parser->parse('grupo/add_privilegio',$this->k_menus);
		$this->load->view('modal/file');
		$this->load->view('head_foot/footer');
	}

	//conceder privilégios a um determinado grupo
	public function add_privilegio_store()
	{
		$k=$this->input->post('privilegio');
		$ret=null;
		for ($i=0;$i<count($k);$i++)
		{
			$dados=array(
				'id_role'=>$k[$i]['id_role'],
				'id_menu_sub_menu'=>$k[$i]['id_msm'],
				'id_utilizador'=>$this->session->userdata('id')
			);

			$ret=$this->app->add_privilegio_store($dados);
		}
		if ($ret!=0)
			echo callback('success','Operação efectuada com sucesso','Gest-Farma informa');
		else
			echo callback('error','Erro ao efectuar esta operação','Gest-Farma informa');
	}


	//eliminar os privilégios concedido a um determinado grupo
	public function delete_privilegio()
	{
		$k=$this->input->post('privilegio');
		$ret=null;
		for ($i=0;$i<count($k);$i++)
		{
			$dados=array(
				'id_role'=>$k[$i]['id_role'],
				'id_menu_sub_menu'=>$k[$i]['id_msm'],
			);
			$ret=$this->app->delete_privilegio($dados);
		}
		if ($ret!=0)
			echo callback('success','Operação efectuada com sucesso','Gest-Farma informa');
		else
			echo callback('error','Erro ao efectuar esta operação','Gest-Farma informa');
	}

	//salvar documentos no banco de dados
	public function store_documento()
	{
		$dados=array(
			'nome'=>$this->input->post('documento_nome'),
			'estado'=>1,
			'uso'=>$this->input->post('uso'),
			'prioridade'=>$this->input->post('prioridade')
		);
		$ret=$this->documento->store($dados);
		if ($ret!=0)
			echo callback('success','Operação efectuada com sucesso','Gest-Farma informa');
		else
			echo callback('error','Erro ao efectuar esta operação','Gest-Farma informa');
	}

	public function nome_user()
	{
		echo $this->utilizador->nome_user($this->input->get('id_utilizador'))->nome;
	}

	public function alterar_senha()
	{
		$callback=array("erro"=>1,"sms"=>"As senhas não coincidem!!!");
		$callback1=array("erro"=>2,"sms"=>"A senha não coincide com a antiga!!!");
		$dados=array($this->input->post('id_utilizador'),$this->input->post('senha_actual'),$this->input->post('senha_nova'),$this->input->post('senha_nova_rep'));
		$update=array(
			'senha'=>$this->input->post('senha_nova')
		);
		if($dados[3]!=$dados[2])
		{
			echo "[".json_encode($callback)."]";
		}elseif ($this->utilizador->control_senha($dados[0],$dados[1])==0)
		{
			echo "[".json_encode($callback1)."]";
		}elseif ($this->utilizador->alterar_senha($dados[0],$update)!=0)
		{
			echo callback('success','Senha alterada com sucesso','Gest-Farma informa');
		}else{
			echo callback('error','Erro ao efectuar esta operação','Gest-Farma informa');
		}
	}

	public function getMunicipioById()
	{
		echo json_encode($this->app->getMunicipioById($this->input->get('param')));
	}

}//fim da class


