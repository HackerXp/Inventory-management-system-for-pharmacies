<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: elviosadoc
 * Date: 23/04/18
 * Time: 16:37
 */
class Utilizador extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function novo($param = null)
    {
        $this->k_menus['titulo'] = "Gest-Farma| Novo Utilizador";
        $this->load->view('head_foot/header', $this->k_menus);
        if ($this->controla == false)
            $this->load->view('errors/autorizacao_negada');
        else
            $this->parser->parse('utilizador/novo', $this->k_menus);
        $this->load->view('modal/file');
        $this->load->view('head_foot/footer');
    }

    public function store()
    {
        $conta = array(
            'id_cidadao' => $this->session->userdata('id'),
            'nome' => $this->input->post('nome', TRUE),
            'user' => user_name($this->input->post('nome', TRUE)),
            'senha' => '123456',
            'id_role' => $this->input->post('grupo', TRUE),
            'fotografia' => 'padrao.jpg'
        );

        if ($this->conta->store($conta) != 0)
            echo callback('success', 'Conta criada com sucesso', 'Gest-Farma informa');
        else
            echo callback('error', 'Erro ao efectuar esta operação', 'Gest-Farma informa');


    }

    public function perfil()
    {
        $this->k_menus['titulo'] = "Gest-Farma| Perfil Utilizador";
        $this->load->view('head_foot/header', $this->k_menus);
        $this->load->view('utilizador/perfil', $this->k_menus);
        $this->load->view('modal/file');
        $this->load->view('head_foot/footer');
    }

    public function listar($param = null)
    {
        $this->k_menus['titulo'] = "Gest-Farma| Listar Utilizador";
        $this->k_menus['param'] = $param;
        $this->k_menus['utilizadores'] = $this->utilizador->listar_utilizadores();
        $this->load->view('head_foot/header', $this->k_menus);
        if ($this->controla == false)
            $this->load->view('errors/autorizacao_negada');
        else
            $this->parser->parse('utilizador/listar', $this->k_menus);
        $this->load->view('modal/file');
        $this->load->view('head_foot/footer');
    }

    public function dados_user()
    {
        foreach ($this->utilizador->dados_user($_GET['id_user']) as $item) {
            $rs[] = $item;
        }
        echo json_encode($rs);
    }

    public function alterar_foto()
    {
        if (isset($_FILES["image_file"]["name"])) {
            $config['upload_path'] = './foto_utilizador/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);

            $nomefoto = $this->conta->getFoto()->fotografia;
            if ($nomefoto == "padrao.jpg") {
                if (!$this->upload->do_upload('image_file')) {
                    echo $this->upload->display_errors();
                } else {
                    $data = $this->upload->data();
                    $update = array(
                        'fotografia' => $data["file_name"]
                    );
                    if ($this->utilizador->alterar_foto($this->session->userdata('id'), $update) == 1)
                        echo callback('success', 'Foto alterada com sucesso', 'Gest-Farmainforma', base_url() . 'foto_utilizador/' . $data["file_name"]);
                    else
                        echo callback('error', 'Erro ao efectuar esta operação', 'Gest-Farmainforma');
                }
            } else {
                $nomefoto = 'foto_utilizador/' . $this->conta->getFoto()->fotografia;
                if (unlink($nomefoto)) {
                    if (!$this->upload->do_upload('image_file')) {
                        echo $this->upload->display_errors();
                    } else {
                        $data = $this->upload->data();
                        $update = array(
                            'fotografia' => $data["file_name"]
                        );
                        if ($this->utilizador->alterar_foto($this->session->userdata('id'), $update) == 1)
                            echo callback('success', 'Foto alterada com sucesso', 'Gest-Farma informa', base_url() . 'foto_utilizador/' . $data["file_name"]);
                        else
                            echo callback('error', 'Erro ao efectuar esta operação', 'Gest-Farma informa');
                    }
                }
            }
        }
    }

    public function upload_foto()
    {
        define('UPLOAD_DIR', './foto_utilizador/');
        $img = $_POST['foto_capturada'];
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $nome = 'sio-' . uniqid() . '.jpg';
        $file = UPLOAD_DIR . $nome;
        $nomefoto = $this->conta->getFoto()->fotografia;
        if ($nomefoto == "padrao.jpg") {
            file_put_contents($file, $data);
            $update = array(
                'fotografia' => $nome
            );
            if ($this->utilizador->alterar_foto($this->session->userdata('id'), $update) == 1)
                echo callback('success', 'Foto alterada com sucesso', 'Gest-Farma informa', base_url() . 'foto_utilizador/' . $nome);
            else
                echo callback('error', 'Erro ao efectuar esta operação', 'Gest-Farma informa');
        } else {
            $nomefoto = 'foto_utilizador/' . $this->conta->getFoto()->fotografia;
            if (unlink($nomefoto)) {
                file_put_contents($file, $data);
                $update = array(
                    'fotografia' => $nome
                );
                if ($this->utilizador->alterar_foto($this->session->userdata('id'), $update) == 1)
                    echo callback('success', 'Foto alterada com sucesso', 'Gest-Farma informa', base_url() . 'foto_utilizador/' . $nome);
                else
                    echo callback('error', 'Erro ao efectuar esta operação', 'Gest-Farma informa');
            }
        }
    }

    public function getPosto()
    {
        echo json_encode($this->posto->listar());
    }

    public function editar($param = null)
    {

        $this->k_menus['titulo'] = "Gest-Farma| Editar Utilizador";
        $this->k_menus['cidadao'] = $this->utilizador->getById($param);
        $this->load->view('head_foot/header', $this->k_menus);

        if ($this->controla == false)
            $this->load->view('errors/autorizacao_negada');
        else
            $this->load->view('utilizador/editar', $this->k_menus);
        $this->load->view('modal/file');
        $this->load->view('head_foot/footer');
    }

    public function update()
    {
        $user = array(
            'nome' => $this->input->post('nome'),
            'id_role'=>$this->input->post('grupo')
        );
        if ($this->conta->update($user, $this->input->post('id')) != 0)
            echo callback('success', 'Operação efectuada com sucesso', 'Gest-Farma informa');
        else
            echo callback('error', 'Erro ao efectuar esta operação', 'Gest-Farma informa');
    }

    public function eliminar()
    {
        $utilizador = array(
            'estado' => '0'
        );
        if ($this->conta->update($utilizador, $this->input->post('id')) == 1)
            echo callback('success', 'Utilizador eliminado com sucesso', 'Gest-Farma informa');
        else
            echo callback('error', 'Erro ao efectuar esta operação', 'Gest-Farma informa');
    }

    public function getDados()
    {
        echo json_encode($this->conta->getDados($this->input->get('id')));
    }

    public function update_conta()
    {
        if ($this->conta->conferir($this->input->post('id'), $this->input->post('senha_atual')) == 0)
            echo callback('error', 'Erro ao alterar as credências, a senha antiga não confere.', 'Gest-Farma informa');
        else {
            if ($this->input->post('ctrl_user') == 1 && $this->input->post('ctrl_senha') == 0) {
                $dados = array(
                    'user' => $this->input->post('user')
                );
                if ($this->conta->update($dados, $this->input->post('id')) == 1)
                    echo callback('success', 'Username alterado com sucesso', 'Gest-Farma informa', 1);
                else
                    echo callback('error', 'Erro ao efectuar esta operação', 'Gest-Farma informa', 0);
            } elseif ($this->input->post('ctrl_senha') == 1 && $this->input->post('ctrl_user') == 0) {
                $dados = array(
                    'senha' => $this->input->post('senha_nova')
                );
                if ($this->conta->update($dados, $this->input->post('id')) == 1)
                    echo callback('success', 'Senha alterada com sucesso', 'Gest-Farma informa', 1);
                else
                    echo callback('error', 'Erro ao efectuar esta operação', 'Gest-Farma informa', 0);
            } elseif ($this->input->post('ctrl_senha') == 1 && $this->input->post('ctrl_user') == 1) {
                $dados = array(
                    'user' => $this->input->post('user'),
                    'senha' => $this->input->post('senha_nova')
                );
                if ($this->conta->update($dados, $this->input->post('id')) == 1)
                    echo callback('success', 'Credênciais alteradas com sucesso', 'Gest-Farma informa', 1);
                else
                    echo callback('error', 'Erro ao efectuar esta operação', 'Gest-Farma informa', 0);
            }
        }
    }

    public function getById()
    {
        echo json_encode($this->utilizador->getById($this->input->get('id')));
    }
}
