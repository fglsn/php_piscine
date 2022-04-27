<?php
session_start();
include("./templates/header.php");
echo '
<main>
<div class="first-section flex-container" id="flex_forms">
	<div class="forms">
		<div class="banner-text flex-container">
			<h3>Sign up</h3>
			<form action="./create.php" method="post">
				<p>Username: <input type="text" name="login" value="login"></p>
				<p>Password: <input type="password" name="passwd" value="passwd"></p>
				<p><input type="submit" name="submit" value="OK"></p>
			</form>
		</div>
	</div>
</div>
</main>
</body>

</html>
';
if ($_POST['submit'] != 'OK' || $_POST['login'] == "" || $_POST['passwd'] == "") {
	return;
}
if (!(file_exists("./private/")))
	mkdir("private");
$filename = './private/passwd';
if (file_exists($filename)) {
	$array = unserialize(file_get_contents($filename));
	foreach ($array as $user) {
		if ($user['login'] == $_POST['login']) {
			echo "ERROR\n";
			return;
		}
	}
}
if (!isset($_POST['admin']))
	$_POST['admin'] = false;
if ($_POST['admin'] && !$_SESSION['admin'])
	$_POST['admin'] = false;
$array[] = array('login' => $_POST['login'],
				 'passwd' => hash("whirlpool", $_POST['passwd']),
				 'admin' => $_POST['admin']);
file_put_contents($filename, serialize($array));
if ($_SESSION['admin']) {
	header("Location: ./templates/admin.php");
	return;
}
include('logout.php');
header("Location: ./login.php");
?>
