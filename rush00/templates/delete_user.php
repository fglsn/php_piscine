<?php
session_start();
if ($_SESSION['admin'] == false) {
	header('HTTP/1.0 401 Unauthorized');
	return;
}
if ($_POST['submit'] != 'Delete' || $_POST['login'] == "") {
	echo "ERROR\n";
	return;
}
$filename = '../private/passwd';
$array = unserialize(file_get_contents($filename));
$newlist = [];
foreach ($array as $user) {
	if ($user['login'] == $_POST['login']) {
		continue;
	}
	$newlist[] = $user;
}
file_put_contents('../private/passwd', serialize($newlist));
header("Location: ./admin.php");
?>