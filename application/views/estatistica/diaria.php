<?php $this->load->view('head_foot/m') ?>
<main id="js-page-content" role="main" class="page-content" pag="diaria">
    <ol class="breadcrumb breadcrumb-sm breadcrumb-arrow">
        <li>
            <a href="<?= site_url('app/dashboard')?>">
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
            <i class='subheader-icon fa fa-bar-chart'></i> Estatística de vendas diárias
        </h1>
        <b><i class="fa fa-calendar-alt"></i> &nbsp;<span class="js-get-date" style="font-weight: bold"></span></b>
    </div>

    <div id="panel-6" class="panel mt-1 rounded-0">
        <div class="panel-hdr">
            <h2>
                <i class="fa fa-bar-chart mr-1"></i> <span>Venda diária</span>
            </h2>
            <a href="<?= site_url('estatistica/diaria/pdf')?>"><span class="btn btn-outline-info btn-xs pl-2 pr-2" title="Extrair PDF"><i class="fa fa-file-pdf"></i></span></a>
        </div>
        <div class="panel-container show">
            <div class="panel-content">
                <div id="venda_diaria" class="ct-chart" style="width:100%; height:300px;"></div>
                <div id="pieChart">
                    <canvas style="width:100%; height:300px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- end #content -->
