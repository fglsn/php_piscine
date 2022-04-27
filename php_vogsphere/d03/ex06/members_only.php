<?php
	$usr = $_SERVER['PHP_AUTH_USER'];
	$pwd = $_SERVER['PHP_AUTH_PW'];
	$img = base64_encode(file_get_contents("../img/42.png"));
	if ($usr != "zaz" || $pwd != "Ilovemylittleponey") {
		header('WWW-Authenticate: Basic realm=\'\'Member area\'\'');
		header('HTTP/1.0 401 Unauthorized');
		echo "<html><body>That area is accessible for members only</body></html>\n";
	}
	else {
		echo "<html><body>Hello Zaz<br />" . "\n"
		. "<img src='data:image/png;base64," . $img . "'>\n</body></html>\n";
	}
?>