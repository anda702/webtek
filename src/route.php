<?php

class Router {

	private static $Root = '';
	private static $Nodes = [];
	private static $BindRoute = [];

	private static function IsVariable($String) {
		return $String[0] == '{' && $String[strlen($String) - 1] == '}';
	}

	public static function ParseURL() {
		$Base = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
		$URL = substr($_SERVER['REQUEST_URI'], strlen($Base));
		if (strstr($URL, '?')) {
			$URL = substr($URL, 0, strpos($URL, '?'));
		}
		$URL = '/' . trim($URL, '/');
		return $URL;
	}

	public static function Parse() {
		$URL = self::ParseURL();
		self::$Nodes = explode('/', $URL);
		self::$Root = self::$Nodes[1];
		array_shift(self::$Nodes);
		array_shift(self::$Nodes);
	}

	public static function Bind($Path, $Action) {
		$Parts = explode('/', $Path);
		$Current = &self::$BindRoute;
		foreach ($Parts as $Part) {
			if (self::IsVariable($Part)) {
				$Part = '{?}';
			}
			if (!isset($Current[$Part])) {
				$Current[$Part] = [];
			}
			$Current = &$Current[$Part];
		}
		$Current = $Action;
	}

	public static function Execute() {
		self::Parse();
		$Params = array_merge([self::$Root], self::$Nodes);
		$Current = self::$BindRoute;
		$Args = [];
		for ($i = 0; $i < count($Params); $i++) {
			if (is_callable($Current)) {
				break;
			}
			$Keys = array_keys($Current);
			if (!$Keys) {
				return false;
			}
			// First check if there is a matching non-variable
			$Found = false;
			foreach ($Keys as $Key) {
				if (!self::IsVariable($Key) && $Key == $Params[$i]) {
					$Current = &$Current[$Key];
					$Found = true;
					break;
				}
			}
			// If not, just assume it's a variable:
			if (!$Found) {
				if (!isset($Current['{?}'])) {
					return false;
				}
				$Current = &$Current['{?}'];
				$Args[] = $Params[$i];
			}
		}
		if (!$Current || !is_callable($Current)) {
			return false;
		}
		call_user_func_array($Current, $Args);
		return true;
	}

	public static function RouteToString() {
		return self::$Root . ':' . implode('/', self::$Nodes) . (self::$Ajax ? ' (AJAX)' : '');
	}

	public static function Root() {
		return self::$Root;
	}

	public static function Nodes() {
		return self::$Nodes;
	}

	public static function Node($Index) {
		return self::$Nodes[$Index];
	}

}

?>