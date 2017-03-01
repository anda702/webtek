<?php

class Database {

	private static $Connection = false;

	public static function Connect() {
		try {
			$Host = 'host=' . Config::Database('HOST');
			$DBName = 'dbname=' . Config::Database('NAME');
			$Charset = 'charset=utf8';
			$Options = array(
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES => false
			);
			self::$Connection = new PDO("mysql:$Host;$DBName;$Charset", Config::Database('USER'), Config::Database('PASS'), $Options);
		} catch (PDOException $e) {
			self::$Connection = false;
			return false;
		}
		return true;
	}

	public static function Exists() {
		$Name = Config::Database('NAME');
		$Query = self::$Connection->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = $Name");
		if (!$Query) {
			return false;
		}
		return $Query->rowCount() > 0;
	}

	public static function LastRowID($Table) {
		$Statement = self::$Connection->query("SELECT id FROM $Table ORDER BY id DESC LIMIT 1");
		if (!$Statement) {
			return false;
		}
		$Row = $Statement->fetch();
		if (!$Row) {
			return false;
		}
		if (!isset($Row['id'])) {
			return false;
		}
		return $Row['id'];
	}

	public static function GetConnection() {
		return self::$Connection;
	}

}

function SQL() {
	return Database::GetConnection();
}

?>