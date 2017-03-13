<?php

require_once('../config/config.php');
require_once(Config::Src() . 'router.php');
require_once(Config::Src() . 'print.php');

if (Config::Options('FORCE_SSL')) {
	if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off') {
		header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], true, 301);
		exit;
	}
	header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
}

header('Content-Type: text/html; charset=utf-8');
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');

session_start();

Router::Bind('ajax/page/{name}', function($Name) {
	SetActivePage($Name);
	PrintActivePage();
	exit;
});

// Assets of a product page
Router::Bind('products/{product}/{file}', function($Product, $File) {
	PrintProductFile($Product, $File);
	exit;
});

// Index of a product page
Router::Bind('products/{product}', function($Product) {
	PrintProductFile($Product, 'index.html');
	exit;
});

Router::Execute();

?><!doctype html>
<html lang="en" id="top">
	<head>
		<title><?php echo Config::Text('TITLE'); ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php echo Config::Meta('DESCRIPTION'); ?>">
		<meta name="keywords" content="<?php echo Config::Meta('KEYWORDS'); ?>">
		<link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway:300|Lora|Ubuntu" rel="stylesheet">
		<script src="/js/thirdparty/jquery-2.1.4.min.js" type="text/javascript"></script>
		<!--<script src="/js/thirdparty/less.min.js" type="text/javascript"></script>-->
		<script src="/js/main.js" type="text/javascript"></script>
	</head>
	<body>
		<header>
			<?php include('html/header.html'); ?>
		</header>
		<div class="main-wrapper">
			<?php PrintActivePage(); ?>
		</div>
		<footer>
			<?php include('html/footer.html'); ?>
		</footer>
	</body>
</html>