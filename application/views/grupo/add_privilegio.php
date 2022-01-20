<?php $this->load->view('head_foot/m') ?>
<main id="js-page-content" role="main" class="page-content">
	<ol class="breadcrumb breadcrumb-sm breadcrumb-arrow">
		<li>
			<a href="<?= site_url('app/dashboard')?>">
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
				<span class="hidden-md-down text-capitalize"><?= $nome_grupo; ?></span>
			</a>
		</li>
	</ol>
	<div class="subheader">
		<i class="fa fa-calendar-alt"></i> &nbsp;<span class="js-get-date" style="font-weight: bold"></span>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="panel-5" class="panel">
				<div class="panel-hdr">
					<h2>
						Adicionar <span class="fw-300">Privilégios</span>
					</h2>
				</div>
				<div class="panel-container show">
					<div class="panel-content">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab_borders_icons-1" role="tab"><i class="fa fa-times mr-1"></i> Menus Inactivos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab_borders_icons-2" role="tab"><i class="fa fa-check mr-1"></i> Menus Activos</a>
							</li>
						</ul>
						<div class="tab-content border border-top-0 p-3">
							<div class="tab-pane fade show active" id="tab_borders_icons-1" role="tabpanel">
								<div class="row">
									<div class="col-md-12">
										<div class="form-body">
											<div class="row">

												<?php
												foreach($menus as $menu):
													$sub_menu=$sub_menus[$menu->nome];
													if(count($sub_menu)==0)continue;
													?>
													<div class="col-md-3 col-sm-6 mb-1">
														<div class="card border  m-auto m-lg-0">
															<div class="card-header panel-hdr bg-primary-700 bg-success-gradient">
																<i class="<?= $menu->icone?>"></i> &nbsp;<b><?= $menu->nome?></b>
															</div>
															<ul class="ul-sub list-group list-group-flush" action="<?= site_url('app/add_privilegio_store')?>" id_role="<?= $this->uri->segment(3);?>">
																<?php

																foreach ($sub_menu as $sub):
																?>
																<li class="list-group-item text-capitalize">
																	<input type="checkbox" id="checkbox<?= $sub->id_msm?>" id_msm="<?= $sub->id_msm?>" class="md-check checkboxes sub-menus">
																	<label for="checkbox<?= $sub->id_msm?>" class="text-capitalize " style="margin-top: 0">
																	<?= $sub->nome?>
																	</label>
																</li>
																	<?php
																endforeach;?>
															</ul>
														</div>
													</div>
												<?php  endforeach;?>
											</div>
											<div class="panel-footer">
												<div class="form-actions pull-right bg-grey-steel">
													<input type="hidden" name="id_menu" id="id_menu" value="<?= $this->uri->segment(3)?>">
													<button type="reset" class="btn btn-default">Cancelar</button>
													<button type="button" class="btn btn-primary btn-add-prv" style="margin-left: 1px"><span style="text-decoration: underline">S</span>alvar</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="tab_borders_icons-2" role="tabpanel">
								<div class="col-md-12">
									<div class="form-body">
										<div class="row">

											<?php
											foreach($menus as $menu):
												$sub_menu4=$sub_menus4[$menu->nome];
												if(count($sub_menu4)==0)continue;
												?>
												<div class="col-md-3 col-sm-6 mb-1">
													<div class="card border  m-auto m-lg-0">
														<div class="card-header panel-hdr bg-primary-700 bg-success-gradient">
															<i class="<?= $menu->icone?>"></i> &nbsp;<b><?= $menu->nome?></b>
														</div>
														<ul style="list-style: none;" action="<?= site_url('app/delete_privilegio')?>" id_role="<?= $this->uri->segment(3);?>"class="ul-sub1 list-group list-group-flush">
															<?php

															foreach ($sub_menu4 as $sub4):
																?>
																<li class="list-group-item text-capitalize">
																	<input type="checkbox" id="defaultInline1<?= $sub4->id_msm?>" id_msm="<?= $sub4->id_msm?>" class="md-check checkboxes sub-menus1">
																	<label for="checkbox<?= $sub4->id_msm?>" class="text-capitalize" style="margin-top: 0">
																		<?= $sub4->nome?>
																	</label>
																</li>
															<?php
															endforeach;?>
														</ul>
													</div>
												</div>
											<?php  endforeach;?>
										</div>
										<div class="panel-footers">
											<div class="pull-right">
												<input type="hidden" name="id_menu" id="id_menu" value="<?= $this->uri->segment(3)?>">
												<button type="reset" class="btn btn-default">Cancelar</button>
												<button type="button" class="btn btn-primary btn-delet-prv" style="margin-left: 1px"><span style="text-decoration: underline">S</span>alvar</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
