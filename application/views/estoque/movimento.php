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
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Entradas no estoque
                    </h2>
                    <a href="<?= site_url('estoque/movimento/pdf')?>"><span class="btn btn-outline-info btn-xs pl-2 pr-2" title="Extrair PDF"><i class="fa fa-file-pdf"></i></span></a>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table id="dt-basic-example" class="table table-bordered w-100 text-center">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Fornecedor</th>
                                <th>Producto</th>
                                <th>Nº da Factura</th>
                                <th>Grosso</th>
                                <th>Retalho</th>
                                <th>Data Criação</th>
                                <th>Data Fabrico</th>
                                <th>Data Expiração</th>
                                <th>Utilizador</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $cont_x = 0;
                            foreach ($movimentos

                            as $movimento):
                            $cont_x++;
                            ?>
                            <tr>
                                <th scope="row"><?= $cont_x ?></th>
                                <td><?= $movimento->nome ?></td>
                                <td><?= $movimento->produto ?></td>
                                <td><?= $movimento->num_factura ?></td>
                                <td><?= $movimento->qtde_grosso ?></td>
                                <td><?= $movimento->qtde_retalho ?></td>
                                <td><?= date("d-m-Y",strtotime($movimento->data_criacao)) ?></td>
                                <td><?= date("d-m-Y",strtotime($movimento->data_fabrico)) ?></td>
                                <td><?= date("d-m-Y",strtotime($movimento->data_expir)) ?></td>
                                <td><?= nome_utilizador($movimento->user) ?></td>
                                <td class="text-center">
                                    <?php
                                    $class = null;
                                    $dispensado = null;
                                    foreach ($menus as $menu) {
                                        $sub_menu = $builder_menu[$menu->nome];
                                        if (strtolower($menu->nome) != strtolower($this->uri->segment(1))) continue;
                                        ?>

                                        <?php

                                        foreach ($sub_menu as $sub) {
                                            if ($sub->nome != dispensado()[0] && $sub->nome != dispensado()[1] && $sub->nome != dispensado()[8] && $sub->nome != $dispensado) continue;
                                            if ($sub->nome == dispensado()[0])
                                                $class = "btn-info waves-effect waves-themed";
                                            elseif ($sub->nome == dispensado()[8])
                                                $class = "btn-warning waves-effect waves-themed";
                                            elseif ($sub->nome == dispensado()[1])
                                                $class = "btn-danger waves-effect waves-themed";
                                            if ($sub->modal != 1) {
                                                ?>
                                                <a href="<?= site_url('estoque/'.$sub->accao.'/' . $movimento->id) ?>"
                                                   class="btn btn-xs mr-1 <?= $class ?>" title="<?= $sub->nome ?>"><i
                                                            class="<?= $sub->icon ?>"></i></a>
                                                <?php
                                            } else {
                                                ?>
                                                <a data-toggle="modal"
                                                   href="#<?= $sub->controlador . '_' . $sub->accao ?>"
                                                   titulo="Desejas realmente elminar este producto?"
                                                   cod="<?= $movimento->id ?>" url="<?= site_url('estoque/'.$sub->accao) ?>"
                                                   class="btn-eliminar mr-1 btn btn-xs <?= $class ?>"
                                                   title="<?= $sub->nome ?>"><i class="<?= $sub->icon ?>"></i></a>
                                            <?php }
                                        }
                                        ?>
                                    <?php } ?>
                    </div>
                    </td>
                            </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Fornecedor</th>
                        <th>Producto</th>
                        <th>Nº da Factura</th>
                        <th>Grosso</th>
                        <th>Retalho</th>
                        <th>Data Criação</th>
                        <th>Data Fabrico</th>
                        <th>Data Expiração</th>
                        <th>Utilizador</th>
                        <th>Opções</th>
                    </tr>
                    </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
