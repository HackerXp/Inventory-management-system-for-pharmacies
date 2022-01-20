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
                        Vendas efectuadas
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table id="dt-basic-example" class="table table-bordered w-100 text-center">
                            <thead class="thead-dark">
                            <tr>
                                <th> # </th>
                                <th> Código</th>
                                <th> Categoria de Produto </th>
                                <th> Data de Criação </th>
                                <th> Opções </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $cont_x=0;
                            foreach ($estantes as $res):
                            $cont_x+=1;
                            ?>
                            <tr>
                                <td> <?= $cont_x?> </td>
                                <td><?= $res->codigo?></td>
                                <td> <?= $res->nome?> </td>
                                <td><?= date("d-m-Y",strtotime($res->data_adicao))?></td>
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
                                            if ($sub->nome != dispensado()[0] && $sub->nome != dispensado()[1] && $sub->nome != dispensado()[3] && $sub->nome != $dispensado) continue;
                                            if ($sub->nome == dispensado()[0])
                                                $class = "btn-info waves-effect waves-themed";
                                            elseif ($sub->nome == dispensado()[3])
                                                $class = "btn-warning waves-effect waves-themed";
                                            elseif ($sub->nome == dispensado()[1])
                                                $class = "btn-danger waves-effect waves-themed";
                                            if ($sub->modal != 1) {
                                                ?>
                                                <a href="<?= site_url($sub->controlador.'/'.$sub->accao.'/' . $res->id) ?>"
                                                   class="btn btn-xs mr-1 <?= $class ?>" title="<?= $sub->nome ?>"><i
                                                        class="<?= $sub->icon ?>"></i></a>
                                                <?php
                                            } else {
                                                ?>
                                                <a data-toggle="modal"
                                                   href="#<?= $sub->controlador . '_' . $sub->accao ?>"
                                                   titulo="Desejas realmente elminar esta estante?"
                                                   cod="<?= $res->id ?>" url="<?= site_url($sub->controlador.'/'.$sub->accao) ?>"
                                                   class="btn-eliminar mr-1 btn btn-xs <?= $class ?>"
                                                   title="<?= $sub->nome ?>"><i class="<?= $sub->icon ?>"></i></a>
                                            <?php }
                                        }
                                        ?>
                                    <?php } ?>
                    </div>
                    </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                    <tfoot class="thead-dark">
                    <tr>
                        <th> # </th>
                        <th> Código</th>
                        <th> Categoria de Produto </th>
                        <th> Data de Criação </th>
                        <th> Opções </th>
                    </tr>
                    </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
