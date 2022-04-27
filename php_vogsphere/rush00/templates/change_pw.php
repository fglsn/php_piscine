<?php
session_start();
if ($_SESSION['admin'] == false) {
	header('HTTP/1.0 401 Unauthorized');
	return;
}
if ($_POST['submit'] != 'OK' || $_POST['login'] == "" || $_POST['newpw'] == "") {
	echo "ERROR\n";
	return;
}
$filename = '../private/passwd';
$array = unserialize(file_get_contents($filename));
foreach ($array as &$user) {
	if ($user['login'] == $_POST['login']) {
		$user['passwd'] = hash("whirlpool", $_POST['passwd']);
	}
}
file_put_contents('../private/passwd', serialize($array));
header("Location: ./admin.php");
?>