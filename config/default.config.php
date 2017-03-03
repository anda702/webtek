<?php

class Config {

	private static $Config = [

		'OPTIONS' => [
			// Refuse http connections. Automatically redirect to https with 301 response.
			'FORCE_SSL' => true,
			// Allow other websites to embed your site in an <iframe> tag
			'ALLOW_IFRAME' => false
		],

		'TEXT' => [
			'TITLE' => 'Webtek',
			'COPYRIGHT' => '© 2017 Webtek'
		],

		'META' => [
			'DESCRIPTION' => 'Webtek utvikler flotte maler til dine nettsider!',
			'KEYWORDS' => 'Webtek, utvikling, maler, nettsider, internettsider, html, css, design, webutvikling, web'
		]

	];

	private static function Access($Array, $Key) {
		if ($Key === false) {
			return $Array;
		}
		return $Array[$Key];
	}

	public static function Options($Key = false) {
		return self::Access(self::$Config['OPTIONS'], $Key);
	}

	public static function Text($Key = false) {
		return self::Access(self::$Config['TEXT'], $Key);
	}

	public static function Meta($Key = false) {
		return self::Access(self::$Config['META'], $Key);
	}

	public static function Src() {
		return '../src/';
	}

	public static function Produdcts(){
		return '../products/';
	}

}

?>