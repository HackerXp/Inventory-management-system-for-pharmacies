<?php $this->load->view('head_foot/m')?>
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right text-capitalize">
        <li><a href="<?= site_url('app/dashboard')?>"><?= $this->uri->segment(1)?></a></li>
        <li class="active"><?= $this->uri->segment(2)?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <!-- end page-header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                <div class="panel-heading">
                    <h4 class="panel-title">Listagem de funções</h4>
                </div>
                <div class="panel-body">
                    <table  id="data-table" class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Nome </th>
                            <th> Criador </th>
                            <th> Data de Criação </th>
                            <th> Opções </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $cont_x=0;
                        foreach ($funcoes as $res):
                            $cont_x+=1;
                            ?>
                            <tr>
                                <td> <?= $cont_x?> </td>
                                <td><?= $res->nome?></td>
                                <td> <?= $res->user?> </td>
                                <td><?= $res->data_criacao?></td>
                                <td>
                                    <div class="row">
                                        <?php
                                        $class=null;
                                        foreach($menus as $menu){
                                            $sub_menu=$builder_menu[$menu->nome];
                                            if(strtolower($menu->nome)!="função")continue;
                                            ?>

                                            <?php

                                            foreach ($sub_menu as $sub){
                                                if($sub->nome!=dispensado()[0] && $sub->nome!=dispensado()[1] || $sub->nome==dispensado()[2])continue;
                                                if($sub->nome==dispensado()[0])
                                                    $class="btn-primary";
                                                elseif($sub->nome==dispensado()[1])
                                                    $class="btn-danger";

                                                if($sub->modal!=1){
                                                    ?>
                                                    <div class="col-md-1 m-r-3 m-l-3"><a
                                                            href="<?= $sub->controlador . '/' . $sub->accao?>/{id}"
                                                            class="btn btn-xs <?= $class?>" title="<?= $sub->nome?>"><i
                                                                class="<?= $sub->icon?>"></i></a></div>
                                                    <?php
                                                }else{?>
                                                    <div class="col-md-1 m-r-3 m-l-3"><a href="#<?= $sub->controlador . '_' . $sub->accao?>"
                                                                                         class="btn btn-xs <?= $class?>"
                                                                                         title="<?= $sub->nome?>"><i
                                                                class="<?= $sub->icon?>"></i></a></div>
                                                <?php }
                                            } }?>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end #content -->
<script type="text/javascript">
    window.onload=function () {
        TableManageDefault.init();
    }
</script>
