<?php
	$action = $_GET['action'];
	$name = $_GET['name'];
	$value = $_GET['value'];

	if ($action === 'set') {
		if ($name && $value) {
			setcookie($name, $value, time() + 3600);
		}
	}
	else if ($action === 'get' && $_COOKIE[$name]) {
		echo $_COOKIE[$name] . "\n";
	}
	else if ($action === 'del' && $_COOKIE[$name]) {
		setcookie($name, $value, time() - 3600);
	}
?>