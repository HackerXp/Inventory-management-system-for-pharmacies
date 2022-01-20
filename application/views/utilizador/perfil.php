<?php $this->load->view('head_foot/m') ?>
<main id="js-page-content" role="main" class="page-content chart-data user" cod="dataa"
	  style="background: url('http://localhost/sanas/public/background/11.jpg');" id_cidadao="<?= $this->session->userdata('id')?>">
	<ol class="breadcrumb breadcrumb-sm breadcrumb-arrow text-capitalize">
		<li>
			<a href="<?= site_url('app/dashboard') ?>">
				<i class="fa fa-home"></i>
				<span class="hidden-md-down">SIO</span>
			</a>
		</li>
		<li>
			<a href="#">
				<i class="fa fa-angle-right"></i>
				<span class="hidden-md-down"><?= $this->uri->segment(1); ?></span>
			</a>
		</li>
		<li class="active">
			<a href="#">
				<i class="fa fa-circle"></i>
				<span class="hidden-md-down"><?= $this->uri->segment(2); ?></span>
			</a>
		</li>
	</ol>
	<div class="subheader text-white">
		<h1 class="subheader-title" style="color: #fff">
			<i class='subheader-icon fa fa-user text-white'></i> Meu Perfil
		</h1>
		<b>
			<span class="js-get-date"></span>
		</b>
	</div>
	<div class="row">
		<?php
		$foto="";
		$user="";
		$border="warning";
		$grupo="";
		if (count($this->app->getAll($this->session->userdata('id')))>0)
		{
			$foto=$this->app->getAll($this->session->userdata('id'))[0]->fotografia;
            $grupo=$this->app->getAll($this->session->userdata('id'))[0]->grupo;
			$user=nome_utilizador($this->app->getAll($this->session->userdata('id'))[0]->nome);
			if ($grupo!="Admin")
			    $border="success";

		}
		?>
		<div class="col-lg-6 col-xl-3 order-lg-1 order-xl-1">
			<!-- profile summary -->
			<div class="card mb-g rounded-top">
				<div class="row no-gutters row-grid">
					<div class="col-12">
						<div class="d-flex flex-column align-items-center justify-content-center p-4">
							<img src="<?= site_url("foto_utilizador/" . $foto) ?>" class="rounded-circle shadow-2 img-thumbnail foto-utilizador" alt="" style="width: 121px;height: 121px">
							<h5 class="mb-0 fw-700 text-center mt-3">
								<?= $user; ?>
							</h5>
						</div>
					</div>
					<div class="col-12">
						<div class="text-center py-2">
							<h5 class="mb-0 fw-700">
								<?= $grupo?>
								<small class="text-muted mb-0">Grupo</small>
							</h5>
						</div>
					</div>
					<div class="col-12">
						<div class="p-3 text-center">
							&nbsp;
						</div>
					</div>
				</div>
			</div>
			<!-- photos -->
			<!-- contacts -->
		</div>
		<div class="col-lg-12 col-xl-6 order-lg-3 order-xl-2">
			<!-- post comment -->
            <div id="panel-9" class="panel">
                <div class="panel-hdr">
                    <h2>
                        <i class="fa fa-bar-chart mr-1"></i> <span>Gráfico</span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div id="graficoTotalExpediente" class="ct-chart"></div>
                    </div>
                </div>
            </div>
			<!-- post comment - end -->
			<!-- post picture -->

		</div>
		<div class="col-lg-6 col-xl-3 order-lg-2 order-xl-3">
			<!-- add : -->
			<div class="card mb-2">
				<div class="card-body">
					<a href="#modal-credencias" data-toggle="modal" class="d-flex flex-row align-items-center btn-alterar-credencias">
						<div class='icon-stack display-3 flex-shrink-0'>
							<i class="fa fa-circle icon-stack-3x opacity-100 color-primary-400"></i>
							<i class="fa fa-lock icon-stack-1x opacity-100 color-white"></i>
						</div>
						<div class="ml-3">
							<strong>
								Alterar Credências
							</strong>
							<br>
							Clique aqui para alterar as tuas credênciais de acesso.
						</div>
					</a>
				</div>
			</div>
			<div class="card mb-g">
				<div class="card-body">
					<a href="#modal-camera" data-toggle="modal" class="d-flex flex-row align-items-center">
						<div class='icon-stack display-3 flex-shrink-0'>
							<i class="fa fa-circle icon-stack-3x opacity-100 color-primary-400"></i>
							<i class="fa fa-camera icon-stack-1x opacity-100 color-white"></i>
						</div>
						<div class="ml-3">
							<strong>
								Aletar Foto de Perfil
							</strong>
							<br>
							Clique aqui para alterar a tua foto de perfil.
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</main>
