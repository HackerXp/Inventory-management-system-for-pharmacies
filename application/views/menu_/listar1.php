<?php $this->load->view('head_foot/m')?>
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right text-capitalize">
        <li><a href="javascript:;"><?= $this->uri->segment(1)?></a></li>
        <li class="active"><?= $this->uri->segment(2)?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <!-- end page-header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                <div class="panel-heading">
                    <h4 class="panel-title">Listagem de funcionalidades do sistema</h4>
                </div>
                <div class="panel-body">
                            {menu}
                            <div class="col-md-2 col-sm-4">
                                <div class="widget widget-stats bg-blue">
                                    <div class="stats-icon"><i class="fa fa-cogs"></i></div>
                                    <div class="stats-info">
                                        <h4>{nome}</h4>
                                    </div>
                                    <div class="stats-link">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a title="Adicionar Sub-Menu" href="<?= site_url('app/add_sub_menu/{id}')?>" class="btn-icon-only blue">
                                                    <i class="fa fa-cogs text-success"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="javascript:;" title="Editar" class="btn-icon-only yellow">
                                                    <i class="fa fa-edit text-warning"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <a title="Apagar" href="javascript:;" class="btn-icon-only">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {/menu}
                </div>
                <div class="panel-footer">
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end #content -->