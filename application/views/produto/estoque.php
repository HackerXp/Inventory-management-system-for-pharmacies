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
                        Actualizar estoque para  <span class="text-info ml-1">“ <?= $produto_nome?> ”</span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <form action="<?= site_url("estoque/store") ?>" class="frm_add_estoque_produto" method="POST">
                        <div class="panel-content">
                            <div class="panel-body">
                                <div class="panel-tag rounded-0 fw-900 mb-1">
                                    Dados da estocagem
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="fw-900">Fornecedor</label>
                                            <select required class="form-control select2 fornecedor cls"
                                                    name="id_fornecedor"
                                                    data-placeholder="Escolhe o fornecedor">
                                                <option value=""></option>
                                                <?php foreach ($fornecedores as $item): ?>
                                                    <option value="<?= $item->id ?>"><?= $item->nome ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <?php
                                                $ctrl="";
                                            if ($this->session->userdata('ctrl_data_prod')==1)
                                                $ctrl="disabled";
                                            ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="fw-900">Data de fabrico</label>
                                                    <input required type="text" <?= $ctrl?> id="datepicker-autoClose"
                                                           class="form-control cls data data_fab_prod" name="data_fab_prod"
                                                           placeholder="27-09-2017"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="fw-900">Data de expiração</label>
                                                    <input required id="datepicker-inline"  <?= $ctrl?> type="text" class="form-control data_exp_prod data cls"
                                                           name="data_exp_prod"
                                                           placeholder="27-09-2019"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="fw-900">Nº da factura ( opcional )</label>
                                            <input type="text" class="form-control cls numero_factura"
                                                   name="numero_factura"
                                                   placeholder="100"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="fw-900">Quantidade a Grosso</label>
                                            <input required type="text" class="form-control cls qtde_grosso_es"
                                                   name="qtde_ini_grosso_estq"
                                                   placeholder="100"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="fw-900">Quantidade a retalho</label>
                                            <input type="text" class="form-control cls qtde_retalho_es"
                                                   name="qtde_retalho_es" readonly=""
                                                   placeholder="50"/>
                                        </div>
                                        <input type="hidden" value="<?= $id_producto?>" name="id_producto" class="id_producto">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-md btn-primary pull-right">Salvar</button>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
