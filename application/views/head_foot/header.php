<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($this->session->userdata('valida')==true):
?>
<!DOCTYPE html>
<!--
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.0.0
Author: Sunnyat Ahmmed
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="Pt-Br">
<head>
	<meta charset="utf-8">
	<title>
		<?= $titulo?>
	</title>
	<meta name="description" content="Introduction">
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
	<link rel="stylesheet" media="screen, print" href="<?= site_url("public/assets/css/fa-brands.css")?>">
	<link rel="stylesheet" media="screen, print" href="<?= site_url("public/assets/css/formplugins/select2/select2.bundle.css")?>">
	<link rel="stylesheet" media="screen, print" href="<?= site_url("public/assets/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css")?>">
	<link rel="stylesheet" media="screen, print" href="<?= site_url("public/assets/css/datagrid/datatables/datatables.bundle.css")?>">
	<link rel="stylesheet" media="screen, print" href="<?= site_url("public/assets/css/notifications/toastr/toastr.css")?>">
	<link rel="stylesheet" media="screen, print" href="<?= site_url("public/assets/css/theme-demo.css")?>">
	<link rel="stylesheet" media="screen, print" href="<?= site_url("public/assets/css/miscellaneous/fullcalendar/fullcalendar.bundle.css")?>">
	<link rel="stylesheet" href=<?=site_url("public/assets/bootstrap-material-datetimepicker-gh-pages/css/bootstrap-material-datetimepicker.css")?> />
	<link rel="stylesheet" media="screen, print" href="<?= site_url("public/assets/css/page-invoice.css")?>">
	<link rel="stylesheet" media="screen, print" href="<?= site_url("public/wizard/css.css")?>">
	<!-- Place favicon.ico in the root directory -->
	<link rel="stylesheet" media="screen, print" href="<?= site_url("public/assets/css/statistics/chartist/chartist.css")?>">
	<link rel="stylesheet" media="screen, print" href="<?= site_url("public/assets/css/statistics/chartjs/chartjs.css")?>">
	<link rel="stylesheet" media="screen, print" href="<?= site_url("public/assets/css/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.css")?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?= site_url("public/assets/img/favicon/apple-touch-icon.png")?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= site_url("public/assets/img/favicon/favicon-32x32.png")?>">
	<link rel="mask-icon" href="<?= site_url("public/assets/img/favicon/safari-pinned-tab.svg")?>" color="#5bbad5">
	<style type="text/css">
		.label-numero{
			position: relative;
			margin-top: 2px;
			margin-left: -21px;
			width: 20px;
			height: auto;
			/*background: #dddddd;*/
			font-size: 11pt;
			overflow-y: scroll;
			font-weight: bold;
			font-family: "Trebuchet MS";
			z-index: 0;
		}
		#texto-texto{
			padding-left: 42px;
		}
		.label-numero>span{
			display: block;
		}
		.bola{
			width: 5px;
			height: 5px;
			background: #ffffff;
			border-radius: 90px;
			font-size: 3pt;
			margin-left: 2%;
			position: relative;
			top: 4px;
		}
	</style>
</head>
<body class="mod-bg-1 ">
<!-- DOC: script to save and load page settings -->
<script>
	/**
	 *	This script should be placed right after the body tag for fast execution
	 *	Note: the script is written in pure javascript and does not depend on thirdparty library
	 **/
	'use strict';

	var classHolder = document.getElementsByTagName("BODY")[0],
		/**
		 * Load from localstorage
		 **/
		themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
			{},
		themeURL = themeSettings.themeURL || '',
		themeOptions = themeSettings.themeOptions || '';
	/**
	 * Load theme options
	 **/
	if (themeSettings.themeOptions)
	{
		classHolder.className = themeSettings.themeOptions;
		console.log("%c✔ Theme settings loaded", "color: #148f32");
	}
	else
	{
		console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
	}
	if (themeSettings.themeURL && !document.getElementById('mytheme'))
	{
		var cssfile = document.createElement('link');
		cssfile.id = 'mytheme';
		cssfile.rel = 'stylesheet';
		cssfile.href = themeURL;
		document.getElementsByTagName('head')[0].appendChild(cssfile);
	}
	/**
	 * Save to localstorage
	 **/
	var saveSettings = function()
	{
		themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
		{
			return /^(nav|header|mod|display)-/i.test(item);
		}).join(' ');
		if (document.getElementById('mytheme'))
		{
			themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
		};
		localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
	}
	/**
	 * Reset settings
	 **/
	var resetSettings = function()
	{
		localStorage.setItem("themeSettings", "");
	}

</script>
<!-- BEGIN Page Wrapper -->
<div class="page-wrapper">
	<div class="page-inner">

<?php
else:
	redirect(CONFIG_BASE_URL);
endif;
?>
