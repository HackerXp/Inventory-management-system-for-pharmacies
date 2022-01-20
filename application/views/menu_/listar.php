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
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>
						Listar funcionalidades do <span class="fw-300"><i>Sistema</i></span>
					</h2>
				</div>
				<div class="panel-container show">
					<div class="panel-content">
						<!-- datatable start -->
						<table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
							<thead>
							<tr>
								<th>Nome</th>
								<th>Ícone</th>
								<th>Data de Adição</th>
								<th>Opções</th>
							</tr>
							</thead>
							<tbody
								{menu}
							<tr class="text-center">
								<td>{nome}</td>
								<td><i class="{icone}"></i></td>
								<td>{data_criacao}</td>
								<td>
									<a class="btn btn-xs btn-info waves-effect waves-themed" title="Adicionar Sub-Menu" href="<?= site_url('app/add_sub_menu/{id}')?>"><i class="fa fa-cogs text-white"></i></a>
									<a class="btn btn-xs btn-warning waves-effect waves-themed" title="Editar" href="javascript:;"><i class="fa fa-edit text-white"></i></a>
									<a class="btn btn-xs btn-danger waves-effect waves-themed" title="Eliminar" href="javascript:;"><i class="fa fa-trash text-white"></i></a>
								</td>
							</tr>
							{/menu}
							</tbody>
							<tfoot>
							<tr>
								<th>Nome</th>
								<th>Ícone</th>
								<th>Data de Adição</th>
								<th>Opções</th>
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
