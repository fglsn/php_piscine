<?php
	$action = $_GET['action'];
	$name = $_GET['name'];
	$value = $_GET['value'];

	if ($action == 'set') {
		if ($name && $value) {
			setcookie($name, $value);
		}
	}
	else if ($action == 'get' && isset($_COOKIE[$name])) {
		echo $_COOKIE[$name] . "\n";
	}
	else if ($action == 'del' && isset($_COOKIE[$name])) {
		setcookie($name, '', time(), 1);
	}

//curl -c cook.txt 'http://localhost:8080/ex03/cookie_crisp.php?action=set&name=plat&value=choucroute'
//curl -b cook.txt 'http://localhost:8080/ex03/cookie_crisp.php?action=get&name=plat'
//curl -c cook.txt 'http://localhost:8080/ex03/cookie_crisp.php?action=del&name=plat'
//curl -b cook.txt 'http://localhost:8080/ex03/cookie_crisp.php?action=get&name=plat'
?>
