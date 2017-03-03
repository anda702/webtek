<?php

require_once('../config/config.php');
require_once(Config::Src() . 'route.php');
require_once(Config::Src() . 'print.php');
require_once(Config::Src() . 'security.php');

ForceSSL();

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
<html lang="en">
	<head>
		<title><?php echo Config::Text('TITLE'); ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name="description" content="<?php echo Config::Meta('DESCRIPTION'); ?>">
		<meta name="keywords" content="<?php echo Config::Meta('KEYWORDS'); ?>">
		<link rel="shortcut icon" href="/assets/icon.png">
		<link rel="stylesheet" type="text/less" href="/css/style.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans%7CSource+Sans+Pro:200">
		<script src="/js/thirdparty/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="/js/thirdparty/less.min.js" type="text/javascript"></script>
		<script src="/js/main.js" type="text/javascript"></script>
	</head>
	<body>
		<header>
			<h1><?php echo Config::Text("TITLE"); ?></h1>
		</header>
		<main>
			<?php PrintActivePage(); ?>
		</main>
		<footer>
			<p><?php echo Config::Text('COPYRIGHT'); ?></p>
			<p>
				<?php
				PrintLinks([
					'contact' => 'Contact',
					'privacy' => 'Privacy Policy',
					'about' => 'About'
				], '|');
				?>
			</p>
		</footer>
	</body>
</html>