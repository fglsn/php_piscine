<?php
include("./templates/header.php");
echo '
<main>
<div class="first-section flex-container" id="flex_forms">
	<div class="forms">
		<div class="banner-text flex-container">
			<h3>Change password</h3>
			<form action="modif.php" method="post">
				<p>Login: <input type="text" name="login"></p>
				<p>Old password: <input type="password" name="oldpw"></p>
				<p>New password: <input type="password" name="newpw"></p>
				<p><input type="submit" name="submit" value="OK"></p>
			</form>
		</div>
	</div>
</div>
</main>
</body>

</html>
';
if ($_POST['submit'] != 'OK' || $_POST['login'] == "" || $_POST['oldpw'] == "" || $_POST['newpw'] == "" || $_POST['oldpw'] == $_POST['newpw']) {
	return;
}
$filename = './private/passwd';
$array = unserialize(file_get_contents($filename));
$oldpw = hash("whirlpool", $_POST['oldpw']);
foreach ($array as &$user) {
	if ($user['login'] == $_POST['login'] && $user['passwd'] == hash("whirlpool", $_POST['oldpw'])) {
		$user['passwd'] = hash("whirlpool", $_POST['newpw']);
		file_put_contents($filename, serialize($array));
		echo "OK\n";
		include('logout.php');
		header("Location: ./index.php");
		return;
	}
}
echo "ERROR\n";
?>