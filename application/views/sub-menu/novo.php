<?php $this->load->view('head_foot/m') ?>
<main id="js-page-content" role="main" class="page-content">
	<ol class="breadcrumb breadcrumb-sm breadcrumb-arrow">
		<li>
			<a href="#">
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
		<li>
			<a href="#">
				<i class="fa fa-angle-right"></i>
				<span class="hidden-md-down text-capitalize"><?= $this->uri->segment(2); ?></span>
			</a>
		</li>
		<li class="active">
			<a href="#">
				<i class="fa fa-circle"></i>
				<span class="hidden-md-down text-capitalize"><?= $this->uri->segment(3); ?></span>
			</a>
		</li>
	</ol>
	<div class="subheader">
		<i class="fa fa-calendar-alt"></i> &nbsp;<span class="js-get-date" style="font-weight: bold"></span>
	</div>
	<div class="row">
		<div class="col-md-12">
			<!-- begin panel -->
<!--			<div id="panel-5" class="panel">-->
<!--			<div class="panel panel-inverse" data-sortable-id="form-stuff-1">-->
				<div class="panel-heading">
					<h4 class="panel-title">Adicionar sub - menu ao menu <span class="text-primary aux-slave" testeVal="{nome_menu}{nome}{/nome_menu}" style="text-decoration: underline">{nome_menu}{nome}{/nome_menu}</span></h4>
<!--				</div>-->
				<div class="panel-body">
					<form role="form" action="<?= site_url('app/add_sub_menu_menu')?>" class="frm-add-sub-menu">
						<div class="form-body">
							<div class="row">
								{submenu}
								<div class="col-md-3 col-sm-6">
									<div class="widget widget-stats bg-purple">
										<div class="stats-info">
											<span class="text-capitalize">
												<div class="icheck-inline radio_{id} pull-right">
													<b>Modal?</b>
													<label>
														<input type="radio" name="radio{id}" value="1"  class="icheck"> <span style="text-decoration: underline;cursor: pointer;">S</span>im </label>
													<label>
														<input type="radio" name="radio{id}" value="0" checked class="icheck"> <span style="text-decoration: underline;cursor: pointer;">N</span>ão </label>
												</div>
												<div class="md-checkbox">
													<input type="checkbox" id="checkbox{id}" cod="{id}" nome="{nome}" class="md-check check-sub-menus">
													<label for="checkbox{id}" class="text-capitalize">
														<span></span>
														<span class="check"></span>
														<span class="box"></span> {nome}
													</label>
												</div>
											</span>
										</div>
										<div class="stats-link">
											<div class="margin-top-5">
												<input type="text" name="control" class="form-control input-sm control{id}" placeholder="controlador" disabled>
											</div>
											<p></p>
											<div class="hiden_{id}"></div>
											<div class="margin-top-10">
												<input type="text" name="accao" class="form-control input-sm accao{id}" placeholder="acção" disabled>
											</div>
										</div>
									</div>
								</div>
								{/submenu}
							</div>
						</div>
						<div class="panel-footer mt-1">
							<div class="form-actions pull-right">
								<input type="hidden" name="id_menu" id="id_menu" value="<?= $this->uri->segment(3)?>">
								<button type="reset" class="btn btn-default">Cancelar</button>
								<button type="submit" class="btn btn-primary"><span style="text-decoration: underline">S</span>alvar</button>
							</div>
						</div>
					</form>
				</div>
<!--			</div>-->
			<!-- end panel -->
		</div>
	</div>
</main>
