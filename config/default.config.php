<?php

class Config {

	private static $Config = [
		'DATABASE' => [
			'HOST' => '',
			'NAME' => '',
			'USER' => '',
			'PASS' => ''
		],

		'OPTIONS' => [
			// Refuse http connections. Automatically redirect to https with 301 response.
			'FORCE_SSL' => true,
			// Allow other websites to embed your site in an <iframe> tag
			'ALLOW_IFRAME' => false
		],

		'TEXT' => [
			'TITLE' => '',
			'COPYRIGHT' => '© 2017'
		],

		'META' => [
			'DESCRIPTION' => '',
			'KEYWORDS' => ''
		]

	];

	private static function Access($Array, $Key) {
		if ($Key === false) {
			return $Array;
		}
		return $Array[$Key];
	}

	public static function Database($Key = false) {
		return self::Access(self::$Config['DATABASE'], $Key);
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