<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		Gest - Farma | Login
	</title>
	<meta name="description" content="Login">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
	<!-- Call App Mode on ios devices -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Remove Tap Highlight on Windows Phone IE -->
	<meta name="msapplication-tap-highlight" content="no">
	<!-- base css -->
	<link href="<?= site_url("public/assets/font-awesome/css/font-awesome.min.css");?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" media="screen, print" href="<?= site_url("public/assets/css/vendors.bundle.css")?>">
	<link rel="stylesheet" media="screen, print" href="<?= site_url("public/assets/css/app.bundle.css")?>">
	<!-- Place favicon.ico in the root directory -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?= site_url("public/assets/img/favicon/apple-touch-icon.png")?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= site_url("public/assets/img/favicon/favicon-32x32.png")?>">
	<link rel="mask-icon" href="<?= site_url("public/assets/img/favicon/safari-pinned-tab.svg")?>" color="#5bbad5">
	<!-- Optional: page related CSS-->
	<link rel="stylesheet" media="screen, print" href="<?= site_url("public/assets/css/page-login.css")?>">
</head>
<body class="">
<div class="blankpage-form-field">
    <div class="row align-items-center justify-content-center mb-3">
        <img src="<?= site_url("public/gestFarma/logo1.png")?>" style="width:130px;height: 130px" class="profile-image rounded-circle" alt="SmartAdmin WebApp" aria-roledescription="logo">
    </div>
	<div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
		<a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
			<span class="page-logo-text mr-1 fw-900 text-center">Gest - Farma</span>
			<i class="fa fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
		</a>
	</div>
	<div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
		<div class="alert text-center alert-error-display">
			<button class="close" data-close="alert"></button>
			<span class="sms-error"></span>
		</div>
		<form action="<?= site_url('app/acesso')?>" id="form_login">
			<div class="form-group">
				<label class="form-label" for="username">Username</label>
				<input type="text" id="username" name="user" required class="form-control conta" placeholder="insira o teu username">
			</div>
			<div class="form-group">
				<label class="form-label" for="password">Password</label>
				<input type="password" name="senha" id="password" required class="form-control conta" placeholder="insira a tua password">
			</div>
			<button type="submit" class="btn btn-primary float-right"><i class="fa fa-sign-in"></i> Login</button>
		</form>
	</div>
	<div class="blankpage-footer text-center text-white">
		<strong>&copy; Repartição de Informática - USP | <?= date('Y')?></strong>
	</div>
</div>
<video poster="<?= site_url("public/assets/img/backgrounds/clouds.png")?>" id="bgvid" playsinline autoplay muted loop>
	<source src="<?= site_url("public/assets/media/video/cc.webm")?>" type="video/webm">
	<source src="<?= site_url("public/assets/media/video/cc.mp4")?>" type="video/mp4">
</video>
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
<!-- Page related scripts -->
<script src=<?= site_url("public/gest-farma/acesso/login.js");?> type="text/javascript"></script>
</body>
</html>
