<?php $this->load->view('head_foot/m') ?>
<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb breadcrumb-sm breadcrumb-arrow">
        <li>
            <a href="<?= site_url('app/dashboard') ?>">
                <i class="fa fa-home"></i>
                <span class="hidden-md-down">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-angle-right"></i>
                <span class="hidden-md-down text-capitalize"><?= $this->uri->segment(1); ?></span>
            </a>
        </li>
        <li class="active">
            <a href="#">
                <i class="fa fa-angle-right"></i>
                <span class="hidden-md-down text-capitalize"><?= $this->uri->segment(2); ?></span>
            </a>
        </li>
    </ol>
    <div class="subheader">
        <i class="fa fa-calendar-alt"></i> &nbsp;<span class="js-get-date" style="font-weight: bold"></span>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-3" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Adicionar Producto
                    </h2>
                </div>
                <div class="panel-container show">
                    <form action="<?= site_url("produto/store") ?>" class="frm_add_produto" method="POST">
                        <div class="panel-content">
                            <div class="panel-body">
                                <div class="panel-tag rounded-0 fw-900 mb-1">
                                    Dados Gerais
                                </div>
                                <div class="row mt-0">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="fw-900">Nome</label>
                                            <input required type="text" class="form-control nome_prod cls" name="nome_prod"
                                                   placeholder="Ex: Paracetamol"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="fw-900">Categoria</label>
                                                    <select required class="form-control select2 catg_prod cls"
                                                            name="id_categoria_prod"
                                                            data-placeholder="Escolhe a categoria">
                                                        <option value=""></option>
                                                        <?php foreach ($categorias as $item): ?>
                                                            <option value="<?= $item->id ?>"><?= $item->nome ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="fw-900">Código</label>
                                                    <input type="text" required class="form-control codigo_prods cls"
                                                           name="codigo_prod"
                                                           placeholder="PARA-001"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="fw-900">Data de fabrico</label>
                                                    <input required type="text" id="datepicker-autoClose"
                                                           class="form-control cls data data_fab_prod" name="data_fab_prod"
                                                           placeholder="27-09-2017"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="fw-900">Data de expiração</label>
                                                    <input required id="datepicker-inline" type="text" class="form-control data_exp_prod data cls"
                                                           name="data_exp_prod"
                                                           placeholder="27-09-2019"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="fw-900">Valor a considerar a grosso</label>
                                            <input required type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control cls qtde_grosso"
                                                   name="qtde_grosso"
                                                   placeholder="1000"/>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="fw-900">Preço</label>
                                            <input type="text" required onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control cls preco"
                                                   name="preco"
                                                   placeholder="1000.00" value=""/>
                                        </div>
                                    </div>
                                    <input type="hidden" class="id_estante" name="id_estante_prod">
                                </div>
                                <div class="row"> </div>
                            </div>
                            <hr>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-md btn-primary pull-right btn-save-prod">Salvar</button>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
