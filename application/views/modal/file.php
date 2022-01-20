<!--Alterar fotos de perfil-->
<div class="modal fade" id="modal-camera" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <h4 class="modal-title text-white">
                    <i class="fa fa-picture-o"></i> Alterar foto de perfil
                </h4>
                <button type="button" class="close text-white btn-desligar-camera" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">

                <div id="panel-2" class="panel rounded-0 mb-0">
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="accordion accordion-outline" id="js_demo_accordion-3">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="javascript:void(0);" class="card-title collapsed btn-desligar-camera"
                                           data-toggle="collapse" data-target="#js_demo_accordion-3b"
                                           aria-expanded="false">
                                            <i class="fa fa-file-picture-o width-2 fs-xl"></i>
                                            Carregar Fotografia
                                            <span class="ml-auto">
                                                                <span class="collapsed-reveal">
                                                                    <i class="fa fa-minus fs-xl"></i>
                                                                </span>
                                                                <span class="collapsed-hidden">
                                                                    <i class="fa fa-plus fs-xl"></i>
                                                                </span>
                                                            </span>
                                        </a>
                                    </div>
                                    <div id="js_demo_accordion-3b" class="collapse" data-parent="#js_demo_accordion-3">
                                        <div class="card-body">
                                            <form action="<?= site_url('utilizador/alterar_foto')?>" enctype="multipart/form-data" id="upload_form">
                                            <div class="form-group mb-0">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file_name" id="image_file">
                                                    <label class="custom-file-label" for="customFile">Selecione o ficheiro</label>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="javascript:void(0);" class="card-title btn-ligar-camera" data-toggle="collapse"
                                           data-target="#js_demo_accordion-3a" aria-expanded="false">
                                            <i class="fa fa-camera width-2 fs-xl"></i>
                                            Camera
                                            <span class="ml-auto">
                                                                <span class="collapsed-reveal">
                                                                    <i class="fa fa-minus fs-xl"></i>
                                                                </span>
                                                                <span class="collapsed-hidden">
                                                                    <i class="fa fa-plus fs-xl"></i>
                                                                </span>
                                                            </span>
                                        </a>
                                    </div>
                                    <div id="js_demo_accordion-3a" class="collapse"
                                         data-parent="#js_demo_accordion-3">
                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8 text-center">
                                                    <div id="camera_utente" class="img-thumbnail"></div>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-brand-gradient mt-0">
                <form class="text-center">
                    <button type=button class="btn btn-sm btn-info btn-outline" id="carregar-foto-perfil">Carregar</button>
                    <div id="pre_take_buttons">
                        <button type=button class="btn btn-sm btn-info btn-outline" onClick="preview_snapshot()">Capturar</button>
                    </div>
                    <div id="post_take_buttons" style="display:none">
                        <button type=button class="btn btn-sm btn-default btn-outline" onClick="cancel_preview()">Tirar Outra</button>
                        <button type=button class="btn btn-sm btn-success btn-outline btn_salvar_imagen" data-dismiss="modal" style="font-weight:bold;">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-foto-pessoa" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <h4 class="modal-title text-white">
                    <i class="fa fa-picture-o"></i> Adicionar Fotografia
                </h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('pessoa/adicionar_foto')?>" enctype="multipart/form-data" id="upload_forms">
                    <div class="form-group mb-0">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file_name" id="image_files">
                            <label class="custom-file-label" for="customFile">Selecione o ficheiro</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-brand-gradient mt-0">
                <button type=button class="btn btn-sm btn-info btn-outline btn-add-foto-pessoa" id="e">Carregar</button>
            </div>
        </div>
    </div>
</div>


<!---Alterar Credencias-->
<div class="modal fade" id="modal-credencias" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <h4 class="modal-title text-white">
                    <i class="fa fa-lock"></i> Alterar credênciais
                </h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div id="panel-2" class="panel rounded-0 mb-0">
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="accordion accordion-outline" id="js_demo_accordion-3">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="javascript:void(0);" class="card-title collapsed"
                                           data-toggle="collapse" data-target="#js_demo_accordion-3b"
                                           aria-expanded="false">
                                            <i class="fa fa-user width-2 fs-xl"></i>
                                             Username
                                            <span class="ml-auto">
                                                                <span class="collapsed-reveal">
                                                                    <i class="fa fa-minus fs-xl"></i>
                                                                </span>
                                                                <span class="collapsed-hidden">
                                                                    <i class="fa fa-plus fs-xl"></i>
                                                                </span>
                                                            </span>
                                        </a>
                                    </div>
                                    <div id="js_demo_accordion-3b" class="collapse" data-parent="#js_demo_accordion-3">
                                        <div class="card-body">
                                            <div class="input-group">
                                                <input type="text" class="form-control p-4" disabled id="user-name">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input mt-1 chk-alterar-nome" id="checkmeout1">
                                                            <label class="custom-control-label" for="checkmeout1">Alterar</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="javascript:void(0);" class="card-title" data-toggle="collapse"
                                           data-target="#js_demo_accordion-3a" aria-expanded="false">
                                            <i class="fa fa-key width-2 fs-xl"></i>
                                            Senha e confirmação
                                            <span class="ml-auto">
                                                                <span class="collapsed-reveal">
                                                                    <i class="fa fa-minus fs-xl"></i>
                                                                </span>
                                                                <span class="collapsed-hidden">
                                                                    <i class="fa fa-plus fs-xl"></i>
                                                                </span>
                                                            </span>
                                        </a>
                                    </div>
                                    <div id="js_demo_accordion-3a" class="collapse"
                                         data-parent="#js_demo_accordion-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <input type="password" class="form-control p-4" name="senha_actual" id="senha_actual" placeholder="Informe a senha actual">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <input type="password" class="form-control p-4" disabled id="senha_nova" name="senha_nova" placeholder="Nova Senha">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input mt-1 chk-alterar-senha" id="checkmeout2">
                                                                    <label class="custom-control-label" for="checkmeout2">Alterar</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-brand-gradient mt-0">
                <span class="btn btn-info btn-sm btn-guardar-credenciais">Salvar alterações</span>
            </div>
        </div>
    </div>
</div>

<!-- Modal para registro de sub -  menus--->
<div class="modal fade" tabindex="-1" id="sub_menu_novo" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <b><i class="fa fa-edit"></i> Cadastrar sub - menu</b>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(site_url('app/sub_menu_store'), array('class' => 'frm_sub_menu'));
                ?>
                <form role="form">
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <div class="input-icon left">
                                <i class="fa fa-list"></i>
                                <?= form_label('Nome', 'nome') ?>
                                <?= form_input('nome', set_value('nome'), array('class' => 'form-control nome_menu', 'placeholder' => 'Digite o sub-menu')) ?>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <div class="input-icon left">
                                <i class="fa fa-list"></i>
                                <?= form_label('Ícone', 'icon') ?>
                                <?= form_input('icon', set_value('icon'), array('class' => 'form-control icon', 'placeholder' => 'Digite o ícone')) ?>
                            </div>
                        </div>
                    </div>
                </form>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancelar</button>
                <button type="button" class="btn btn-info btn-sm sub_menu_store">Salvar</button>
            </div>
        </div>
    </div>
</div>


<!--Adicionar Menu-->
<div class="modal fade" tabindex="-1" id="menu_novo" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <b><i class="fa fa-edit"></i> Nova Funcionalidade</b>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(site_url('menu/store'), array('class' => 'frm_funcionalidade'));
                ?>
                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <div class="input-icon left">
                            <i class="fa fa-list"></i>
                            <?= form_label('Nome', 'nome') ?>
                            <?= form_input('nome', set_value('nome'), array('class' => 'form-control nome_menu cls', 'placeholder' => 'Funcionalidade')) ?>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <div class="input-icon left">
                            <i class="fa fa-list"></i>
                            <?= form_label('Ícone', 'icone') ?>
                            <?= form_input('icone', set_value('icone'), array('class' => 'form-control icone cls', 'placeholder' => 'Ícone')) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm menu_store">Salvar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- Modal para registro de grupo--->
<div class="modal fade" tabindex="-1" id="grupo_novo" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <b><i class="fa fa-edit"></i> Adicionar Grupo</b>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(site_url('app/grupo_store'), array('class' => 'frm_grupo', 'role' => 'form'));
                ?>
                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <div class="input-icon left">
                            <i class="fa fa-list"></i>
                            <?= form_label('Nome', 'nome') ?>
                            <?= form_input('nome', set_value('nome'), array('class' => 'form-control nome_grupo', 'placeholder' => 'Ex: Administrador')) ?>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancelar</button>
                <button type="button" class="btn btn-info btn-sm grupo_store">Salvar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-alert fade" id="retorno-venda" data-backdrop="static" data-keyboard="false" tabindex="-1"
     role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="alert bg-warning-500 alert-dismissible fade show">
                    <div class="d-flex align-items-center">
                        <div class="alert-icon">
                            <i class="fa fa-question text-primary"></i>
                        </div>
                        <div class="flex-1">
                            <span class="h5">Existe já uma venda em curso</span>
                            <br>
                            <span class="fw-700">Desejas cancelar a venda actual e começar uma outra?</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer mt-0">
                <button type="button" class="btn btn-danger btn-outline-light btn-sm" data-dismiss="modal">NÃO</button>
                <button type="button" class="btn btn-success btn-outline-light btn-sm btn-sim-eliminar-venda" value="1">
                    SIM
                </button>
            </div>
        </div>
    </div>
</div>

<!--Retorno do cadastro do producto-->
<div class="modal modal-alert fade" id="retorno-producto" data-backdrop="static" data-keyboard="false" tabindex="-1"
     role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="alert bg-warning-500 alert-dismissible fade show">
                    <div class="d-flex align-items-center">
                        <div class="alert-icon">
                            <i class="fa fa-question text-primary"></i>
                        </div>
                        <div class="flex-1">
                            <span class="h5 sms-retorno-product"></span>
                            <br>
                            <span class="fw-700">Desejas já actualizar o estoque?</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer mt-0">

                <button type="button" class="btn btn-danger btn-outline-light btn-sm" data-dismiss="modal">NÃO</button>
                <button type="button" class="btn btn-success btn-outline-light btn-sm btn-add-estoque" value="">SIM</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal para registro de fornecedores--->
<div class="modal fade" tabindex="-1" id="fornecedor_novo" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <b><i class="fa fa-edit"></i> Adicionar Fornecedor</b>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(site_url('fornecedor/store'), array('class' => 'frm_fornecedor', 'role' => 'form'));
                ?>
                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <div class="input-icon text-white left">
                            <i class="fa fa-list"></i>
                            <?= form_label('Nome', 'nome') ?>
                            <?= form_input('nome', set_value('nome'), array('class' => 'form-control nome cls', 'placeholder' => 'Ex: AngoMed')) ?>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <div class="input-icon text-white left">
                            <i class="fa fa-credit-card"></i>
                            <?= form_label('Nif', 'nif') ?>
                            <?= form_input('nif', set_value('nif'), array('class' => 'form-control nif cls', 'placeholder' => 'Ex: 00192739LA01')) ?>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <div class="input-icon text-white left">
                            <i class="fa fa-phone"></i>
                            <?= form_label('Telefone', 'telefone') ?>
                            <input type="text" name="telefone" class="form-control telefone cls" placeholder="Ex: 923 001 122" data-inputmask="'mask': '(+244) 999 999 999'">
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancelar</button>
                <button type="button" class="btn btn-info btn-sm fornecedor_store">Salvar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal para editar fornecedores--->
<div class="modal fade" tabindex="-1" id="fornecedor_editar" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <b><i class="fa fa-edit"></i> Editar Fornecedor</b>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(site_url('fornecedor/update'), array('class' => 'frm_fornecedor_editar', 'role' => 'form'));
                ?>
                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <div class="input-icon text-white left">
                            <i class="fa fa-list"></i>
                            <?= form_label('Nome', 'nome') ?>
                            <?= form_input('nome', set_value('nome'), array('class' => 'form-control nome-edit cls', 'placeholder' => 'Ex: AngoMed')) ?>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <div class="input-icon text-white left">
                            <i class="fa fa-credit-card"></i>
                            <?= form_label('Nif', 'nif') ?>
                            <?= form_input('nif', set_value('nif'), array('class' => 'form-control nif-edit cls', 'placeholder' => 'Ex: 00192739LA01')) ?>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <div class="input-icon text-white left">
                            <i class="fa fa-phone"></i>
                            <?= form_label('Telefone', 'telefone') ?>
                            <input type="text" name="telefone" class="form-control telefone-edit cls" placeholder="Ex: 923 001 122" data-inputmask="'mask': '(+244) 999 999 999'">
                        </div>
                    </div>
                </div>
                <input type="hidden" value="" class="id_fornecedor" name="id">
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancelar</button>
                <button type="button" class="btn btn-info btn-sm fornecedor_update">Salvar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal para registro de utilizadores do sistema--->
<div class="modal fade" tabindex="-1" id="utilizador_novo" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <b><i class="fa fa-edit"></i> Adicionar Utilizador</b>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(site_url('utilizador/store'), array('class' => 'frm_add_utilizador', 'role' => 'form'));
                ?>
                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <div class="input-icon left text-white">
                            <i class="fa fa-user"></i>
                            <?= form_label('Nome', 'nome') ?>
                            <?= form_input('nome', set_value('nome'), array('class' => 'form-control nome cls rounded-0', 'placeholder' => 'Ex: Joaquina Martins Azevedo')) ?>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <div class="input-icon left text-white">
                            <i class="fa fa-users"></i>
                            <label for="exampleInputEmail1" class="fw-500">Selecione o gupo</label>
                            <select class="form-control rounded-0"
                                    name="grupo"
                                    data-placeholder="Selecione o grupo">
                                <?php foreach ($this->app->getRole() as $item): ?>
                                    <option value="<?= $item->id ?>"><?= $item->nome ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancelar</button>
                <button type="button" class="btn btn-info btn-sm btn-add_utilizador">Salvar</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal para actualizar dados de utilizadores do sistema--->
<div class="modal fade" tabindex="-1" id="utilizador_editar" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <b><i class="fa fa-edit"></i> Editar Utilizador</b>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(site_url('utilizador/upate'), array('class' => 'frm_upate_utilizador', 'role' => 'form'));
                ?>
                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <div class="input-icon left text-white">
                            <i class="fa fa-user"></i>
                            <?= form_label('Nome', 'nome') ?>
                            <?= form_input('nome', set_value('nome'), array('class' => 'form-control nome-user-edit cls rounded-0', 'placeholder' => 'Ex: Joaquina Martins Azevedo')) ?>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <div class="input-icon left text-white">
                            <i class="fa fa-users"></i>
                            <label for="exampleInputEmail1" class="fw-500">Selecione o gupo</label>
                            <select class="form-control rounded-0"
                                    name="grupo"
                                    data-placeholder="Selecione o grupo">
                                <?php foreach ($this->app->getRole() as $item): ?>
                                    <option value="<?= $item->id ?>"><?= $item->nome ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" value="" class="id_utilizador" name="id">
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancelar</button>
                <button type="button" class="btn btn-info btn-sm btn-upate_utilizador">Salvar</button>
            </div>
        </div>
    </div>
</div>


<!--Adicionar Estante-->
<div class="modal fade" tabindex="-1" id="estante_novo" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <b><i class="fa fa-list"></i> Nova Estante</b>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(site_url('estante/store'), array('class' => 'frm_estante', 'role' => 'form'));
                ?>
                <div class="form-group text-white form-md-line-input">
                    <label for="exampleInputEmail1">Categoria</label>
                    <select style="width: 100%" class="form-control default-select2 categoria" name="id_categoria"
                            data-placeholder="Selecione a categoria">
                        <option value="">Selecione a Categoria</option>
                        <?php foreach ($this->categoria->listar1() as $item): ?>
                            <option value="<?= $item->id ?>"><?= $item->nome ?></option>
                        <?php endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group text-white form-md-line-input">
                    <div class="input-icon left">
                        <i class="fa fa-barcode"></i>
                        <?= form_label('Código', 'codigo') ?>
                        <?= form_input('codigo', set_value('codigo'), array('class' => 'form-control codigo', 'placeholder' => 'Código será gerado automáticamente', 'readonly' => 'true')) ?>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm">Salvar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>



<!-- Modal para registro de destinatário--->
<div class="modal fade" tabindex="-1" id="destinatario_novo" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <b><i class="fa fa-edit"></i> Adicionar Destinatário</b>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(site_url('destinatario/store'), array('class' => 'frm_destinatario', 'role' => 'form'));
                ?>
                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <div class="input-icon text-white left">
                            <i class="fa fa-home"></i>
                            <?= form_label('Nome', 'nome') ?>
                            <?= form_input('nome', set_value('nome'), array('class' => 'form-control nome_dest', 'placeholder' => 'Ex: Repartição de Informática')) ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm destinatario_store">Salvar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>


<!-- Modal para edição de destinatário--->
<div class="modal fade" tabindex="-1" id="destinatario_editar" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <b><i class="fa fa-edit"></i> Editar Destinatário</b>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(site_url('destinatario/update'), array('class' => 'frm_destinatario_edit', 'role' => 'form'));
                ?>
                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <div class="input-icon text-white left">
                            <i class="fa fa-list"></i>
                            <?= form_label('Nome', 'nome') ?>
                            <?= form_input('nome', set_value('nome'), array('class' => 'form-control nome_dest', 'placeholder' => 'Ex: Repartição de Informática')) ?>
                            <input type="hidden" name="id_destinatario" class="id_destinatario" value="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm destinatario_update">Alterar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- Modal para edição de número de factura--->
<div class="modal fade" tabindex="-1" id="estoque_editar" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <b><i class="fa fa-edit"></i> Editar número da factura</b>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(site_url('estoque/update_mv_estoque'), array('class' => 'frm_movimento_estoque_edit', 'role' => 'form'));
                ?>
                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <div class="input-icon text-white left">
                            <i class="fa fa-list"></i>
                            <?= form_label('Número da Factura', 'num_factura') ?>
                            <?= form_input('num_factura', set_value('num_factura'), array('class' => 'form-control num_factura', 'placeholder' => 'Ex: 00133MF')) ?>
                            <input type="hidden" name="id_movimento_estoque" class="id_movimento_estoque" value="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm destinatario_update">Alterar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>


<!-- Modal para registro de categoria--->
<div class="modal fade" tabindex="-1" id="categoria_novo" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <b><i class="fa fa-edit"></i> Adicionar Categoria</b>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(site_url('categoria/store'), array('class' => 'frm_categoria', 'role' => 'form'));
                ?>
                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <div class="input-icon text-white left">
                            <i class="fa fa-list"></i>
                            <?= form_label('Nome', 'nome') ?>
                            <?= form_input('nome', set_value('nome'), array('class' => 'form-control nome', 'placeholder' => 'Ex: Comprimido')) ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm categoria_store">Salvar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- Modal para registro de categoria--->
<div class="modal fade" tabindex="-1" id="categoria_editar" data-backdrop="static" data-keyboard="false" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr bg-primary-700 bg-success-gradient">
                <b><i class="fa fa-edit"></i> Editar Categoria</b>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(site_url('categoria/update'), array('class' => 'frm_categoria_update', 'role' => 'form'));
                ?>
                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <div class="input-icon text-white left">
                            <i class="fa fa-list"></i>
                            <?= form_label('Nome', 'nome') ?>
                            <?= form_input('nome', set_value('nome'), array('class' => 'form-control nome', 'placeholder' => 'Ex: Comprimido')) ?>
                            <input type="hidden" name="id_categoria" class="id_categoria" value="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm categoria_update">Salvar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
