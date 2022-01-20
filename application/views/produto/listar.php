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
                        Fârmacos
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table id="dt-basic-example" class="table table-bordered w-100 text-center">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Qtde grosso</th>
                                <th>Qtde retalho</th>
                                <th>Estante</th>
                                <th>Data de Fabrico</th>
                                <th>Data de Expiração</th>
                                <th>Tempo</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $cont_x = 0;
                            foreach ($produtos

                            as $produto):
                            $cont_x++;
                            ?>
                            <tr>
                                <th scope="row"><?= $cont_x ?></th>
                                <td><?= $produto->nome ?></td>
                                <td><?= $produto->categoria ?></td>
                                <td><?= $produto->qtde_grosso ?></td>
                                <td><?= $produto->estoque ?></td>
                                <td><?= $produto->estante ?></td>
                                <td><?= date("d-m-Y",strtotime($produto->data_fabrico)) ?></td>
                                <td><?= date("d-m-Y",strtotime($produto->data_expir)) ?></td>
                                <td><?= ctrl_tempo($produto->data_expir,date("Y-m-d"))." dias" ?></td>
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
                                                <a href="<?= site_url('produto/'.$sub->accao.'/' . $produto->id) ?>"
                                                   class="btn btn-xs mr-1 <?= $class ?>" title="<?= $sub->nome ?>"><i
                                                            class="<?= $sub->icon ?>"></i></a>
                                                <?php
                                            } else {
                                                ?>
                                                <a data-toggle="modal"
                                                   href="#<?= $sub->controlador . '_' . $sub->accao ?>"
                                                   titulo="Desejas realmente elminar este producto?"
                                                   cod="<?= $produto->id ?>" url="<?= site_url('produto/delete') ?>"
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
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Qtde grosso</th>
                        <th>Qtde retalho</th>
                        <th>Estante</th>
                        <th>Data de Fabrico</th>
                        <th>Data de Expiração</th>
                        <th>Tempo</th>
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
