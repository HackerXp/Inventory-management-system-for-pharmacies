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
						Listar <span class="fw-300">Utilizadores</span>
					</h2>
				</div>
				<div class="panel-container show">
					<div class="panel-content">
						<!-- datatable start -->
						<table id="dt-basic-example" class="table text-center table-bordered table-hover table-striped w-100">
							<thead class="thead-dark">
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>User</th>
								<th>Grupo</th>
								<th class="text-center">Opções</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$cont=0;;
								foreach($utilizadores as $utilizador):
										$cont++;
									?>

									<tr>
										<td><img src="<?= site_url('foto_utilizador/'.$utilizador->fotografia)?>" class="profile-image-sm rounded-circle" alt="aa"></td>
										<td><?= $utilizador->nome?></td>
										<td><?= $utilizador->user?></td>
										<td><?= $utilizador->role?></td>
										<td class="text-center">
												<?php
												$class=null;
												foreach($menus as $menu){
													$sub_menu=$builder_menu[$menu->nome];
													if(strtolower($menu->nome)!=strtolower($this->uri->segment(1)))continue;
													?>

													<?php

													foreach ($sub_menu as $sub){
														if($sub->nome!=dispensado()[0] && $sub->nome!=dispensado()[1] && $sub->nome!=dispensado()[7])continue;
														if($sub->nome==dispensado()[0])
															$class="btn-info waves-effect waves-themed";
														elseif($sub->nome==dispensado()[7])
															$class="btn-success btn_ver_detalhe waves-effect waves-themed";
														elseif($sub->nome==dispensado()[1])
															$class="btn-danger waves-effect waves-themed";
														if($sub->modal!=1){
															?>
															<a href="<?= site_url('utilizador/editar/'.$utilizador->id)?>" id_utilizador="<?= $utilizador->id?>" class="btn btn-xs <?= $class?>" title="<?= $sub->nome?>"><i class="<?= $sub->icon?>"></i></a>
															<?php
														}else{?>
															<a data-toggle="modal" href="#<?= $sub->controlador.'_'.$sub->accao?>" id_utilizador="<?= $utilizador->id?>" titulo="Desejas realmente elminar este utilizador?" cod="<?= $utilizador->id?>" url="<?= site_url('utilizador/'.$sub->accao)?>" foto="<?= './anddy/foto_utilizador/'.$utilizador->fotografia;?>" tipo="<?= retornaRole($utilizador->role)?>" class="btn-eliminar btn btn-xs <?= $class?>" title="<?= $sub->nome?>"><i class="<?= $sub->icon?>"></i></a>
														<?php }
													}
													?>
												<?php  }?>
											</div>
										</td>
									</tr>
								<?php endforeach;?>
							</tbody>
							<tfoot class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>User</th>
                                <th>Grupo</th>
                                <th class="text-center">Opções</th>
                            </tr>
							</tfoot>
						</table>
						<!-- datatable end -->
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
