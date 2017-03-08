<?php

$ACTIVE_PAGE = '';

function SetActivePage($Name) {
	global $ACTIVE_PAGE;
	$Name = strtolower($Name);
	if ($Name == 'home' || $Name == 'contact' || $Name == 'products') {
		$ACTIVE_PAGE = $Name;
	}
}

function PrintActivePage() {
	global $ACTIVE_PAGE;
	if ($ACTIVE_PAGE == '') {
		$ACTIVE_PAGE = 'home';
	}
	include('html/' . $ACTIVE_PAGE . '.html');
}

function PrintLinks($Links, $Separator) {
	$Html = '';
	foreach ($Links as $Link => $Name) {
		$Html .= '<a href="/' . $Link . '">' . $Name . '</a>' . $Separator;
	}
	echo substr($Html, 0, -strlen($Separator));
}

function PrintProductFile($Product, $File) {
	$Path = 'products/' . $Product . '/' . $File;
	if (file_exists($Path)) {
		echo file_get_contents($Path);
	} else {
		echo 'Bad luck. File does not exist.';
	}
}

?>