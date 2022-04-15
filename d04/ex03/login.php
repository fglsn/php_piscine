<?php
session_start();
include('auth.php');
if ($_GET['login'] && $_GET['passwd']) {
	$login = $_GET['login'];
	$pwd = $_GET['passwd'];
	if (auth($login, $pwd)) {
		$_SESSION['loggued_on_user'] = $login;
		echo "OK\n";
	}
	else {
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
	}
}
?>