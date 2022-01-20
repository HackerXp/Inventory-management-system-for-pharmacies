<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
<!-- BEGIN Page Footer -->
<footer class="page-footer" role="contentinfo">
	<div class="d-flex align-items-center flex-1 text-muted">
		<span class="hidden-md-down fw-700">&copy; Cygnus-soft Corp, <?= date('Y');?> &nbsp;<a href='<?= site_url("app/dashboard")?>' class='text-primary fw-500' title='Anddy.com' target='_blank'></a></span>
	</div>
	<div>
		<ul class="list-table m-0">
			<li><a href="javascript:;" class="text-secondary fw-700">Acerca</a></li>
			<li class="pl-3"><a href="javascript:;" class="text-secondary fw-700">Licença</a></li>
			<li class="pl-3"><a href="javascript:;" class="text-secondary fw-700">Documentação</a></li>
			<li class="pl-3 fs-xl"><a href="javascript:;" class="text-secondary"><i class="fa fa-question-circle" aria-hidden="true"></i></a></li>
		</ul>
	</div>
</footer>
<!-- END Page Footer -->
<!-- BEGIN Shortcuts -->

<!-- BEGIN Camera -->
<div id="webcamera" class="modal fade" data-backdrop="false">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-title text-capitalize">Fotografia</div>
			</div>

			<div class="modal-body">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8 text-center">
							<div id="camera_utente" class="img-thumbnail"></div>
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
				<div class="modal-footer">
					<form class="text-center">
						<div id="pre_take_buttons">
							<!-- This button is shown before the user takes a snapshot -->
							<button type=button class="btn btn-primary btn-outline" onClick="preview_snapshot()">Capturar</button>
						</div>
						<div id="post_take_buttons" style="display:none">
							<!-- These buttons are shown after a snapshot is taken -->
							<input type=button class="btn btn-default btn-outline" value="Tirar Outra" onClick="cancel_preview()">
							<input type=button class="btn btn-success btn-outline btn_salvar_imagen" value="Salvar" data-dismiss="modal" style="font-weight:bold;">
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- END Camera -->
<!-- modal shortcut -->
<div class="modal fade modal-backdrop-transparent" id="modal-shortcut" tabindex="-1" role="dialog" aria-labelledby="modal-shortcut" aria-hidden="true">
	<div class="modal-dialog modal-dialog-top modal-transparent" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<ul class="app-list w-auto h-auto p-0 text-left">
					<li>
						<a href="<?= site_url('app/dashboard')?>" class="app-list-item text-white border-0 m-0">
							<div class="icon-stack">
								<i class="fa fa-home icon-stack-1x opacity-100 color-white"></i>
							</div>
							<span class="app-list-name">
                                                    Dashboard
                                                </span>
						</a>
					</li>
					<li>
						<a href="page_inbox_general.html" class="app-list-item text-white border-0 m-0">
							<div class="icon-stack">
								<i class="fa fa-envelope icon-stack-1x text-white"></i>
							</div>
							<span class="app-list-name">
                                                    Entrada
                                                </span>
						</a>
					</li>
					<li>
						<a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
							<div class="icon-stack">
								<i class="fa fa-sign-out icon-stack-1x opacity-100 color-white"></i>
							</div>
							<span class="app-list-name">
                                                    Sair
                                                </span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div> <!-- END Shortcuts -->
</div>
</div>
</div>
<!-- END Page Wrapper -->
<!-- BEGIN Quick Menu -->
<nav class="shortcut-menu hidden-sm-down">
	<input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
	<label for="menu_open" class="menu-open-button ">
		<span class="app-shortcut-icon d-block"></span>
	</label>
	<a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
		<i class="fa fa-arrow-up"></i>
	</a>
	<a href="<?= site_url('app/logout')?>" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Logout">
		<i class="fa fa-sign-out"></i>
	</a>
	<a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="Full Screen">
		<i class="fa fa-expand"></i>
	</a>
	<a href="#" class="menu-item btn" data-action="app-print" data-toggle="tooltip" data-placement="left" title="Print page">
		<i class="fa fa-print"></i>
	</a>
</nav>
<!-- END Quick Menu -->
<!-- BEGIN Page Settings -->
<div class="modal fade js-modal-settings modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-right modal-md">
		<div class="modal-content">
			<div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100">
				<h4 class="m-0 text-center color-white">
					Configurações de Layout
					<small class="mb-0 opacity-80">Configurações da interface do usuário</small>
				</h4>
				<button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times"></i></span>
				</button>
			</div>
			<div class="modal-body p-0">
				<div class="settings-panel">
					<div class="mt-4 d-table w-100 px-5">
						<div class="d-table-cell align-middle">
							<h5 class="p-0">
								Layout do sistema
							</h5>
						</div>
					</div>
					<div class="list" id="fh">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="header-function-fixed"></a>
						<span class="onoffswitch-title">Cabeçalho Fixo</span>
						<span class="onoffswitch-title-desc">cabeçalho está em um fixo em todos os momentos</span>
					</div>
					<div class="list" id="nff">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-fixed"></a>
						<span class="onoffswitch-title">Navegação fixa</span>
						<span class="onoffswitch-title-desc">left panel is fixed</span>
					</div>
					<div class="list" id="nfm">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-minify"></a>
						<span class="onoffswitch-title">Minimizar a navegação</span>
						<span class="onoffswitch-title-desc">Skew nav to maximize space</span>
					</div>
					<div class="list" id="nfh">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-hidden"></a>
						<span class="onoffswitch-title">Ocultar navegação</span>
						<span class="onoffswitch-title-desc">roll mouse on edge to reveal</span>
					</div>
					<div class="list" id="nft">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-top"></a>
						<span class="onoffswitch-title">Top de Navegação</span>
						<span class="onoffswitch-title-desc">Relocate left pane to top</span>
					</div>
					<div class="list" id="mmb">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-main-boxed"></a>
						<span class="onoffswitch-title">Layout em caixa</span>
						<span class="onoffswitch-title-desc">Encapsulates to a container</span>
					</div>
					<div class="expanded">
						<ul class="">
							<li>
								<div class="bg-fusion-50" data-action="toggle" data-class="mod-bg-1"></div>
							</li>
							<li>
								<div class="bg-warning-200" data-action="toggle" data-class="mod-bg-2"></div>
							</li>
							<li>
								<div class="bg-primary-200" data-action="toggle" data-class="mod-bg-3"></div>
							</li>
							<li>
								<div class="bg-success-300" data-action="toggle" data-class="mod-bg-4"></div>
							</li>
						</ul>
						<div class="list" id="mbgf">
							<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-fixed-bg"></a>
							<span class="onoffswitch-title">Plano de fundo fixo</span>
						</div>
					</div>
					<div class="mt-4 d-table w-100 px-5">
						<div class="d-table-cell align-middle">
							<h5 class="p-0">
								Menu Móvel
							</h5>
						</div>
					</div>
					<div class="list" id="nmp">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-push"></a>
						<span class="onoffswitch-title">Conteúdo push</span>
						<span class="onoffswitch-title-desc">Content pushed on menu reveal</span>
					</div>
					<div class="list" id="nmno">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-no-overlay"></a>
						<span class="onoffswitch-title">Nenhuma sobreposição</span>
						<span class="onoffswitch-title-desc">Removes mesh on menu reveal</span>
					</div>
					<div class="list" id="sldo">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-slide-out"></a>
						<span class="onoffswitch-title">Fora da tela <sup>(beta)</sup></span>
						<span class="onoffswitch-title-desc">Content overlaps menu</span>
					</div>
					<div class="mt-4 d-table w-100 px-5">
						<div class="d-table-cell align-middle">
							<h5 class="p-0">
								Acessibilidade
							</h5>
						</div>
					</div>
					<div class="list" id="mbf">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-bigger-font"></a>
						<span class="onoffswitch-title">Maior fonte de conteúdo</span>
						<span class="onoffswitch-title-desc">content fonts are bigger for readability</span>
					</div>
					<div class="list" id="mhc">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-high-contrast"></a>
						<span class="onoffswitch-title">Texto de alto contraste (WCAG 2 AA)</span>
						<span class="onoffswitch-title-desc">4.5:1 text contrast ratio</span>
					</div>
					<div class="list" id="mcb">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-color-blind"></a>
						<span class="onoffswitch-title">Daltonismo <sup>(beta)</sup> </span>
						<span class="onoffswitch-title-desc">color vision deficiency</span>
					</div>
					<div class="list" id="mpc">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-pace-custom"></a>
						<span class="onoffswitch-title">Preloader Inside</span>
						<span class="onoffswitch-title-desc">preloader will be inside content</span>
					</div>
					<div class="mt-4 d-table w-100 px-5">
						<div class="d-table-cell align-middle">
							<h5 class="p-0">
								Modificações Globais
							</h5>
						</div>
					</div>
					<div class="list" id="mcbg">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-clean-page-bg"></a>
						<span class="onoffswitch-title">Limpar o fundo da página</span>
						<span class="onoffswitch-title-desc">adds more whitespace</span>
					</div>
					<div class="list" id="mhni">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-nav-icons"></a>
						<span class="onoffswitch-title">Ocultar ícones de navegação</span>
						<span class="onoffswitch-title-desc">invisible navigation icons</span>
					</div>
					<div class="list" id="dan">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-disable-animation"></a>
						<span class="onoffswitch-title">Desativar animação CSS</span>
						<span class="onoffswitch-title-desc">Disables CSS based animations</span>
					</div>
					<div class="list" id="mhic">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-info-card"></a>
						<span class="onoffswitch-title">Esconder cartão de informações</span>
						<span class="onoffswitch-title-desc">Hides info card from left panel</span>
					</div>
					<div class="list" id="mlph">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-lean-subheader"></a>
						<span class="onoffswitch-title">Submarino Lean</span>
						<span class="onoffswitch-title-desc">distinguished page header</span>
					</div>
					<div class="list" id="mnl">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-nav-link"></a>
						<span class="onoffswitch-title">Navegação Hierárquica</span>
						<span class="onoffswitch-title-desc">Clear breakdown of nav links</span>
					</div>
					<div class="list mt-3">
						<span class="onoffswitch-title">Tamanho Global da Fonte<small>(REPOSIÇÕES NO REFRESH)</small> </span>
						<div class="btn-group btn-group-sm btn-group-toggle my-2" data-toggle="buttons">
							<label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-sm" data-target="html">
								<input type="radio" name="changeFrontSize"> SM
							</label>
							<label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text" data-target="html">
								<input type="radio" name="changeFrontSize" checked=""> MD
							</label>
							<label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-lg" data-target="html">
								<input type="radio" name="changeFrontSize"> LG
							</label>
							<label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-xl" data-target="html">
								<input type="radio" name="changeFrontSize"> XL
							</label>
						</div>
						<span class="onoffswitch-title-desc d-block mb-g">Mudança <strong>root</strong> tamanho da fonte para efetuar os valores rem</span>
					</div>
					<hr class="m-0">
					<div class="p-3 d-flex align-items-center justify-content-center bg-faded">
						<a href="#" class="btn btn-outline-danger fw-500 mr-2" data-action="app-reset">Redefinir configurações</a>
						<a href="#" class="btn btn-danger fw-500" data-action="factory-reset">Restauração de fábrica</a>
					</div>
				</div>
				<span id="saving"></span>
			</div>
		</div>
	</div>
</div> <!-- END Page Settings -->
<script>
	(function(i, s, o, g, r, a, m)
	{
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function()
		{
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date();
		a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-141754477-1', 'auto');
	ga('send', 'pageview');

</script>
<script src="<?= site_url("public/assets/js/vendors.bundle.js")?>"></script>
<script src="<?= site_url("public/assets/js/app.bundle.js")?>"></script>
<script src="<?= site_url("public/assets/js/formplugins/select2/select2.bundle.js")?>"></script>
<script src="<?= site_url("public/assets/js/datagrid/datatables/datatables.bundle.js")?>"></script>
<script src="<?= site_url("public/assets/js/datagrid/datatables/datatables.export.js")?>"></script>
<script src="<?= site_url("public/assets/js/notifications/toastr/toastr.js")?>"></script>
<script src="<?= site_url("public/assets/js/dependency/moment/moment.js")?>"></script>
<script src="<?= site_url("public/assets/js/miscellaneous/fullcalendar/fullcalendar.bundle.js")?>"></script>

<script src="<?= site_url("public/assets/js/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.js")?>"></script>
<script src="<?= site_url("public/assets/js/formplugins/inputmask/inputmask.bundle.js")?>"></script>

<script type="text/javascript" src=<?=site_url("public/assets/bootstrap-material-datetimepicker-gh-pages/js/moment-with-locales.min.js")?>></script>
<script src=<?=site_url("public/assets/bootstrap-material-datetimepicker-gh-pages/js/bootstrap-material-datetimepicker.js")?> type="text/javascript" ></script>

<script type="text/javascript" src="<?= site_url('public/gest-farma/helper/funcoes.js')?>"></script>
<script type="text/javascript" src="<?= site_url('public/gest-farma/insert/config-table.js')?>"></script>

<script type="text/javascript" src="<?= site_url('public/gest-farma/insert/menu.sub-menu.insert.js')?>"></script>
<script type="text/javascript" src="<?= site_url('public/gest-farma/insert/grupo.insert.js')?>"></script>
<script type="text/javascript" src="<?= site_url('public/gest-farma/insert/funcao.insert.js')?>"></script>
<script type="text/javascript" src="<?= site_url('public/gest-farma/insert/conta.insert.js')?>"></script>
<script src=<?=site_url("public/gest-farma/insert/estoque.insert.js")?>></script>
<script type="text/javascript" src="<?= site_url('public/gest-farma/update/pessoa.js')?>"></script>
<script src=<?=site_url("public/gest-farma/insert/produto.insert.js")?>></script>
<script src=<?=site_url("public/gest-farma/insert/venda.insert.js")?>></script>
<script src=<?=site_url("public/gest-farma/relogio/script.js")?>></script>

<!--Camera--->
<script src="<?=site_url('public/webcam/webcam.js');?>"></script><!-- /Page scripts -->
<script src="<?=site_url('public/webcam/webcam.min.js');?>"></script><!-- /Page scripts -->

<script src="<?= site_url("public/assets/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js")?>"></script>
<script src="<?=site_url('public/webcam.js');?>"></script><!-- /Page scripts -->
<script src="<?= site_url("public/assets/js/statistics/chartist/chartist.js")?>"></script>
<script src="<?= site_url("public/assets/js/statistics/chartjs/chartjs.bundle.js")?>"></script>


<script src=<?=site_url("public/gest-farma/select/venda.select.js")?>></script>
<script src=<?=site_url("public/gest-farma/select/consulta.select.js")?>></script>
<script src=<?=site_url("public/gest-farma/select/estatistica.js")?>></script>

<!--End camera-->
<script type="text/javascript">
	$(this).ready(function () {
		var controls = {
			leftArrow: '<i class="fa fa-angle-left" style="font-size: 1.25rem"></i>',
			rightArrow: '<i class="fa fa-angle-right" style="font-size: 1.25rem"></i>'
		};
		$('.datepicker').datepicker(
			{
				todayHighlight: true,
				orientation: "bottom left",
				templates: controls,
				autoclose:true
			});

		$('body').on('click','.btn-eliminar',function () {
            var url = $(this).attr('url');
            var sep = url.split("/");
            var id = $(this).attr('cod');
            if (sep[5] != "editar") {
            bootbox.confirm(
                {
                    message: "<h4 class='text-danger mt-5 text-center'>" + $(this).attr('titulo') + "</h4>",
                    buttons:
                        {
                            confirm:
                                {
                                    label: 'SIM',
                                    className: 'btn-success btn-xs'

                                },
                            cancel:
                                {
                                    label: 'NÃO',
                                    className: 'btn-danger btn-xs'
                                }
                        },
                    callback: function (result) {
                        if (result) {
                            $.post(url, {id: id}, function (x) {
                                toastr[x[0].alerta](x[0].sms, x[0].titulo);
                                setTimeout(function () {
                                    var url = window.location.href.toString();
                                    window.location = url;
                                }, 710);
                            }, 'json');
                        }
                    }
                });
        }else
            {
                if (sep[4]=="fornecedor") {
                    $.get(URL +sep[4]+'/getById', {id: id}, function (x) {
                        $('.nome-edit').val(x[0].nome);
                        $('.nif-edit').val(x[0].nif);
                        $('.telefone-edit').val(x[0].telefone);
                        $('.id_fornecedor').val(id);
                    }, 'json');
                    $('#fornecedor_editar').modal('show');
                }else if(sep[4]=="utilizador")
                {
                    $.get(URL +sep[4]+'/getById', {id: id}, function (x) {
                        $('.nome-user-edit').val(x[0].nome);
                        $('.id_utilizador').val(id);
                    }, 'json');
                    $('#utilizador_editar').modal('show');
                }else if(sep[4]=="destinatario")
                {
                    $.get(URL +sep[4]+'/getById', {id: id}, function (x) {
                        $('.nome_dest').val(x[0].nome);
                        $('.id_destinatario').val(id);
                    }, 'json');
                    $('#destinatario_editar').modal('show');
                }else if(sep[4]=="estoque")
                {
                    $.get(URL +sep[4]+'/getNum_factura', {id: id}, function (x) {
                        $('.num_factura').val(x[0].num_factura);
                        $('.id_movimento_estoque').val(id);
                    }, 'json');
                }else if(sep[4]=="categoria")
                {
                    $.get(URL +sep[4]+'/getById', {id: id}, function (x) {
                        $('.nome').val(x[0].nome);
                        $('.id_categoria').val(id);
                    }, 'json');
                }
            }
		});

		$('.select2').select2();

		$(".select2-placeholder-multiple").select2(
			{
				placeholder: "Select State"
			});
		$(".js-hide-search").select2(
			{
				minimumResultsForSearch: 1/0
			});
		$(".js-max-length").select2(
			{
				maximumSelectionLength: 2,
				placeholder: "Select maximum 2 items"
			});
		$(".select2-placeholder").select2(
			{
				placeholder: "Select a state",
				allowClear: true
			});



		$(".js-select2-icons").select2(
			{
				minimumResultsForSearch: 1/0,
				//templateResult: icon,
				//templateSelection: icon,
				escapeMarkup: function(elm)
				{
					return elm
				}
			});
	});
</script>
<script language="JavaScript">
	// preload shutter audio clip
	var shutter = new Audio();
	shutter.autoplay = false;
	shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

	function preview_snapshot() {
		// play sound effect
		try { shutter.currentTime = 0; } catch(e) {;} // fails in IE
		shutter.play();

		// freeze camera so user can preview current frame
		Webcam.freeze();

		// swap button sets
		document.getElementById('pre_take_buttons').style.display = 'none';
		document.getElementById('post_take_buttons').style.display = '';
	}
	function preview_snapshot_user() {
		// play sound effect
		try { shutter.currentTime = 0; } catch(e) {;} // fails in IE
		shutter.play();

		// freeze camera so user can preview current frame
		Webcam.freeze();

		// swap button sets
		document.getElementById('pre_take_buttons_user').style.display = 'none';
		document.getElementById('post_take_buttons_user').style.display = '';
	}

	function cancel_preview() {
		// cancel preview freeze and return to live camera view
		Webcam.unfreeze();

		// swap buttons back to first set
		document.getElementById('pre_take_buttons').style.display = '';
		document.getElementById('post_take_buttons').style.display = 'none';
	}
	function cancel_preview_user() {
		// cancel preview freeze and return to live camera view
		Webcam.unfreeze();

		// swap buttons back to first set
		document.getElementById('pre_take_buttons_user').style.display = '';
		document.getElementById('post_take_buttons_user').style.display = 'none';
	}
</script>
</body>
</html>
