<?php $this->load->view('head_foot/m') ?>
<main id="js-page-content" role="main" class="page-content" style="background: url(<?= site_url('public/gestFarma/wd-logos-farmacia5n.jpg')?>)no-repeat 45%/45% 80% #fff;">
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
			<i class='subheader-icon fa fa-home'></i> Página Inicial
		</h1>
		<b><i class="fa fa-calendar-alt"></i> &nbsp;<span class="js-get-date" style="font-weight: bold"></span></b>
	</div>
	<div class="row align-items-center justify-content-center">
		<?php
		for ($i = 0; $i < count($menus_topo['nome']); $i++):?>
			<div class="col-sm-4">
				<a href="<?= base_url($menus_topo['link'][$i]) ?>">
					<div class="p-3 bg-primary rounded overflow-hidden  rounded-0 position-relative text-white mb-g" style="box-shadow:0 2px 2px 2px rgba(0, 0, 0, 0.2);">
						<div class="text-center">
							<h3 class="display-4 d-block l-h-n m-0 fw-500">
								<span class="mr-5" style="text-shadow: 0.1em 0.1em #333"><?= $menus_topo['nome'][$i] ?></span>
								<small class="m-0 l-h-n"><?= $menus_topo['cor'][$i] ?></small>
							</h3>
						</div>
						<i class="fa <?= $menus_topo['fa'][$i] ?> position-absolute pos-right pos-bottom opacity-15"
						   style="font-size:6rem;color: #0b3251"></i>
					</div>
				</a>
			</div>
		<?php endfor; ?>
	</div>
</main>
<!-- end #content -->
