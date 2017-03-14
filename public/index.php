<?php

require_once('../config/config.php');
require_once(Config::Src() . 'router.php');
require_once(Config::Src() . 'products.php');
require_once(Config::Src() . 'print.php');

if (Config::Options('FORCE_SSL')) {
	if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off') {
		header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], true, 301);
		exit;
	}
	header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
}

function CSPArrayToString($Policies) {
	$Result = '';
	foreach ($Policies as $Key => $Values) {
		$Result .= $Key;
		foreach ($Values as $Value) {
			$Result .= " $Value";
		}
		$Result .= ';';
	}
	return $Result;
}

$CSP_STRING = CSPArrayToString([
	'default-src' => [ 'https:' ],
	'font-src' => [ "'self'", 'https://fonts.gstatic.com', 'https://cdnjs.cloudflare.com' ],
	'img-src' => [ "'self'" ],
	'object-src' => [ "'none'" ],
	'script-src' => [ "'self'", 'https://ajax.googleapis.com', 'https://cdnjs.cloudflare.com' ],
	'style-src' => [ "'self'", 'https://fonts.googleapis.com', 'https://cdnjs.cloudflare.com', "'unsafe-inline'" ]
	// unsafe-inline for style-src because of less.js. This can be avoided when the css is pretranspiled.
]);

header('Content-Type: text/html; charset=utf-8');
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: no-referrer');
header("Content-Security-Policy: $CSP_STRING");

session_start();

Router::Bind('ajax/page/{name}', function($Name) {
	SetActivePage($Name);
	PrintActivePage();
	exit;
});

Router::Bind('ajax/page/view/{product}', function($Product) {
	PrintProductPage($Product);
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

Router::Bind('{page}', function($Page) {
	SetActivePage($Page);
});

Router::Bind('view/{Product}', function($Product) {
	SetActiveProduct($Product);
});

Router::Execute();

?><!doctype html>
<html lang="en">
	<head>
		<title><?php echo Config::Text('TITLE'); ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php echo Config::Meta('DESCRIPTION'); ?>">
		<meta name="keywords" content="<?php echo Config::Meta('KEYWORDS'); ?>">
		<link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/less" href="/css/style.less">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300%7CLora%7CUbuntu">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js" type="text/javascript"></script>
		<script src="/js/main.js" type="text/javascript"></script>
	</head>
	<body>
		<header>
			<?php include('html/header.html'); ?>
		</header>
		<main>
			<?php PrintActivePage(); ?>
		</main>
		<footer>
			<?php include('html/footer.html'); ?>
		</footer>
	</body>
</html>