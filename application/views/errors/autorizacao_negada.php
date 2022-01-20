<?php $this->load->view('head_foot/m')?>
<main id="js-page-content" role="main" class="page-content" style="background: url(<?= site_url('public/background/11.jpg')?>);">
	<div class="h-alt-hf d-flex flex-column align-items-center justify-content-center text-center">
		<div class="alert alert-danger bg-white pt-4 pr-5 pb-3 pl-5" id="demo-alert">
			<h1 class="fs-xxl fw-700 color-fusion-500 d-flex align-items-center justify-content-center m-0">
				<img class="profile-image-sm rounded-circle bg-danger-700 mr-1 p-1 fa-spin" src="<?= site_url('public/assets/img/logo.png')?>" alt="SmartAdmin WebApp Logo">
				<span class="color-danger-700"> Não encontrou o que procurava?</span>
			</h1>
<!--			<h3 class="fw-500 mb-0 mt-3">-->
<!--				You have experienced a technical error.-->
<!--			</h3>-->
			<p class="container container-sm mb-0 mt-1">
				<?= $auto_negada?>
			</p>
			<div class="mt-4">
				<a href="javascript:history.back(1)" class="btn btn-primary">
					<span class="fw-700">Continuar</span>
				</a>
			</div>
		</div>
	</div>
</main>
<!-- end #content -->
