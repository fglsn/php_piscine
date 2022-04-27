<?php
if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] 
	 	&& $_POST['submit'] && $_POST['submit'] === "OK") {

	$login = $_POST['login'];
	$old = hash('whirlpool', $_POST['oldpw']);
	$new = hash('whirlpool', $_POST['newpw']);

	$path = '../private/passwd';
	$folder = '../private';
	if (!$folder || !$path) {
		echo "ERROR\n";
		exit(1);
	}
	$file_content = file_get_contents($path);
	$data = unserialize($file_content);
	if ($data[$login]) {
		if ($data[$login]['passwd'] === $old) {
			$data[$login] = [
				'login' => $login,
				'passwd' => $new
			];
		}
		else {
			echo "ERROR\n";
			exit(1);
		}
	}
	else {
		echo "ERROR\n";
		exit(1);
	}
	$file_content = serialize($data);
	file_put_contents($path, $file_content);
	echo "OK\n";
}
else
	echo "ERROR\n";
?>