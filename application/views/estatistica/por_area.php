<?php $this->load->view('head_foot/m') ?>
<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb breadcrumb-sm breadcrumb-arrow">
        <li>
            <a href="<?= site_url('app/dashboard') ?>">
                <i class="fa fa-home"></i>
                <span class="hidden-md-down">Gest-Farma</span>
            </a>
        </li>
        <li class="active">
            <a href="#">
                <i class="fa fa-chart-pie"></i>
                <span class="hidden-md-down">Dashboard</span>
            </a>
        </li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fa fa-bar-chart'></i> Estatística de vendas por área
        </h1>
        <b><i class="fa fa-calendar-alt"></i> &nbsp;<span class="js-get-date" style="font-weight: bold"></span></b>
    </div>
    <div class="row">
        <div id="panel-9" class="panel mt-1 rounded-0 col-3">
            <div class="panel-hdr">
                <h2>
                    <i class="fa fa-calendar mr-1"></i> <span>Calendário</span>
                </h2>
            </div>
            <div class="panel-container">
                <div class="col-12 p-3">
                    <input type="text" class="form-control data-busca" id="data-busca" placeholder="Seleciona a data">
                </div>
                <div class="col-12 agrega-res mt-0"></div>
                <div class="col-12 text-right">
                    <div class="p-0">
                        <span class="btn btn-info btn-buscar-por-area"><i class="fa fa-search"></i> Buscar</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="panel-9" class="panel mt-1 rounded-0 col-6">
            <div class="panel-hdr">
                <h2>
                    <i class="fa fa-bar-chart mr-1"></i> <span>Gráfico de Saídas</span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div id="venda_por_area" class="ct-chart" style="width:100%; height:300px;"></div>
                </div>
            </div>
        </div>
        <div id="panel-9" class="panel mt-1 rounded-0 col-3">
            <div class="panel-hdr">
                <h2></h2>
                <span data1="" data2="" class="btn-link-por-data" href="<?= site_url('estatistica/saida_por_area/') ?>">
                    <span class="btn btn-outline-info btn-xs pl-2 pr-2" title="Extrair PDF">
                        <i class="fa fa-file-pdf"></i>
                    </span>
                </span>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div id="porArea">
                        <canvas style="width:100%; height:300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- end #content -->
