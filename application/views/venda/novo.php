<?php $this->load->view('head_foot/m') ?>
<main id="js-page-content" role="main" class="page-content" pagina="venda_novo">
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
        <div class="col-lg-12 col-xl-6 order-lg-3 order-xl-2">
            <!-- post comment -->
            <div class="card mb-g rounded-0">
                <div class="card-body bg-info-50 pb-0 px-4">
                    <h6><b><i class="fa fa-check"></i> Selecionar o fârmaco</b></h6>
                </div>
                <div class="card-body py-0 px-4 border-faded border-right-0 border-bottom-0 border-left-0">
                    <div class="d-flex flex-column row">
                        <!-- comment -->
                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="fw-500">Leitor de código de barras</label>
                                <input type="text" class="form-control rounded-0 input-codigo-barra" autofocus/>
                            </div>
                        </div>
                        <hr class="m-0 mt-2">
                        <div class="d-flex flex-row w-100 py-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="fw-500">Selecione a Categoria</label>
                                    <select class="form-control select2 rounded-0 catg_prod_venda"
                                            name="id_categoria_prod"
                                            data-placeholder="Selecione a categoria">
                                        <option value=""></option>
                                        <?php foreach ($categorias as $item): ?>
                                            <option value="<?= $item->id ?>"><?= $item->nome ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="fw-500">Selecione o Producto</label>
                                    <select class="form-control select2 rounded-0 default-select2 produto_venda"
                                            name="id_categoria_prod"
                                            data-placeholder="Selecione o producto">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row text-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="fw-500">Quantidade</label>
                                            <input type="number" min="1" value="1" class="form-control rounded-0 qtde_prod" max="100"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="fw-500">Adicionar</label>
                                            <button type="button" class="form-control rounded-0 btn btn-info btn-block btn-add-producto-cart"><i class="fa fa-plus-square"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="m-0 mt-1">
                        <div class="py-0 w-100 mt-0 row ml-0">
                            <div class="col-md-6 fw-500 text-info">Quantidade disponível a grosso: <span class="qtde_grosso text-dark">0</span></div>
                            <div class="col-md-6 fw-500 text-info border-left">Quantidade disponível a retalho: <span class="qtde-retalho text-dark">0</span></div>
                        </div>
                        <hr class="m-0">
                        <div class="py-2 w-100 mt-0">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group ml-2">
                                    <label for="exampleInputEmail1" class="fw-500">Nome do comprador ( opcional )</label>
                                    <input type="text" autocorrect="on" placeholder="Ex: João António Paulo" class="form-control rounded-0 nome_comprador">
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mr-2">
                                        <label for="exampleInputEmail1" class="fw-500">Repartição ( opcional )</label>
                                        <select class="form-control select2 rounded-0 id_reparticao"
                                                name="id_reparticao"
                                                data-placeholder="Selecione a repartição">
                                            <option value=""></option>
                                            <?php foreach ($reparticao as $item): ?>
                                                <option value="<?= $item->id ?>"><?= $item->nome ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="m-0 mb-2">
                        <!-- add comment end -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-6 order-lg-3 order-xl-2">
            <div class="card mb-g rounded-0">
                <div class="card-body pb-0 bg-info-50 px-4">
                    <h6><b><i class="fa fa-shopping-cart"></i> Carrinho</b></h6>
                </div>
                <div class="card-body py-0 px-4 border-faded border-right-0 border-bottom-0 border-left-0">
                    <div class="row div-carrinho">
                        <table class="table table-dark m-1 text-center table-bordered border-white">
                            <thead>
                            <tr>
                                <th> Nome </th>
                                <th> Quantidade</th>
                                <th> Preço Unit.</th>
                                <th> Opções </th>
                            </tr>
                            </thead>
                            <tbody class="tbody-carrinho text-center"></tbody>
                        </table>
                    </div>
                    <hr class="m-0 w-100">
                    <div class="py-3 w-100">
                        <button type="button" class="btn btn-sm btn-primary pull-right btn-finish-venda mb-3">Finalizar Venda</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

