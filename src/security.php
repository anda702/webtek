<?php

function ForceSSL() {
	if (!Config::Options('FORCE_SSL')) {
		return;
	}
	if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off') {
		header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], true, 301);
		exit;
	}
	header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
}

?>