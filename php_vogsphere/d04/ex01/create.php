<?php
if ($_POST['login'] && $_POST['passwd'] 
	 	&& $_POST['submit'] && $_POST['submit'] === "OK") {

	$login = $_POST['login'];
	$passwd = hash('whirlpool', $_POST['passwd']);
	$data = [];

	$path = '../private/passwd';
	$folder = '../private';
	if (!file_exists($folder)) {
		mkdir($folder);
	}
	if ($path) {
		$file_content = file_get_contents($path);
		$data = unserialize($file_content);
		if ($data[$login]) {
			echo "ERROR\n";
			exit(1);
		}
	}
	$data[$login] = [
		'login' => $login,
		'passwd' => $passwd
	];
	$file_content = serialize($data);
	file_put_contents($path, $file_content);
	echo "OK\n";
}
else
	echo "ERROR\n";
?>	