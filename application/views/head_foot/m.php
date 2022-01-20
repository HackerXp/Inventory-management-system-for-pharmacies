<aside class="page-sidebar">
	<div class="page-logo">
		<a href="<?= site_url('app/dashboard')?>" class="page-logo-link press-scale-down d-flex align-items-center" data-toggle="modal" data-target="#modal-shortcut">
			<img src="<?= site_url("public/gestFarma/logo1.png")?>" style="height: 28px;width: 28px" alt="SmartAdmin WebApp" aria-roledescription="logo">
			<span class="page-logo-text mr-1 fw-900" style="color: #18a3b8">Gest - Farma</span>
			<i class="fa fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
		</a>
	</div>
	<!-- BEGIN PRIMARY NAVIGATION -->
	<nav id="js-primary-nav" class="primary-nav" role="navigation">
		<div class="nav-filter">
			<div class="position-relative">
				<input type="text" id="nav_filter_input" placeholder="Filtrando Sub - Menus" class="form-control" tabindex="0">
				<a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
					<i class="fa fa-chevron-up"></i>
				</a>
			</div>
		</div>
		<div class="info-card">
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
			<img src="<?= site_url("foto_utilizador/".$foto)?>" class="profile-image rounded-circle foto-utilizador" alt="<?= $user;?>" style="width: 60px;height: 60px">
			<div class="info-card-text text-center">
				<a href="<?= site_url('app/dashboard')?>" class="d-flex align-items-center text-white">
                                    <span class="text-truncate text-truncate-sm d-inline-block">
                                       <?= $user;?>
                                    </span>
				</a>
				<span class="d-inline-block text-truncate text-truncate-sm badge border border-<?= $border;?> text-<?= $border;?>"><?= $grupo;?></span>
			</div>
			<img src="<?= site_url("public/assets/img/card-backgrounds/cover-2-lg.png")?>" class="cover" alt="cover">
			<a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
				<i class="fa fa-angle-down"></i>
			</a>
			<small class="session" id_role="<?= $this->session->userdata('id_role')?>"></small>
		</div>
		<ul id="js-nav-menu" class="nav-menu">
			<li class="nav-title text-center">Menus de Acesso</li>
			<?php
			$vx=array();
			foreach($menus as $menu){
				$sub_menu=$builder_menu[$menu->nome];
				if(count($sub_menu)==0)continue;
				?>

				<li>
					<a href="#" class="text-capitalize" title="<?= $menu->nome?>" data-filter-tags="<?= $menu->nome?>">
						<i class="<?= $menu->icone?>"></i>
						<span class="nav-link-text" data-i18n="nav.application_intel"><?= $menu->nome?></span>
					</a>
					<ul>
						<?php

						$cont=0;
						foreach ($sub_menu as $sub){
							$cont+=1;
							if(in_array($sub->nome,dispensado()))continue;
							if($sub->modal!=1){
								?>
								<li>
									<a href="<?= base_url($sub->controlador.'/'.$sub->accao)?>" title="<?= $sub->nome?>" data-filter-tags="<?= $sub->nome?>">
										<span class="nav-link-text text-capitalize"><i class="<?= $sub->icon?>"></i> &nbsp;<?= $sub->nome?></span>
									</a>
								</li>
								<?php
							} else{
								?>
								<li>
									<a  data-toggle="modal" href="#<?= $sub->controlador.'_'.$sub->accao?>" title="<?= $sub->nome?>" data-filter-tags="<?= $sub->nome?>" class="nav-link">
										<span class="nav-link-text text-capitalize"><i class="<?= $sub->icon?>"></i> &nbsp;<?= $sub->nome?></span>
									</a>
								</li>
								<?php
							}
						}
						?>
					</ul>
				</li>
			<?php }?>
		</ul>
		<div class="filter-message js-filter-message bg-success-600"></div>
	</nav>
	<!-- END PRIMARY NAVIGATION -->
	<!-- NAV FOOTER -->
</aside>
<div class="page-content-wrapper">
	<?php $this->load->view('head_foot/topo')?>
