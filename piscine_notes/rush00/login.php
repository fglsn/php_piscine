<?php
session_start();
include("./templates/header.php");
echo '
<main>
<div class="first-section flex-container" id="flex_forms">
<div class="forms">
<div class="banner-text flex-container">
<h3>Login here</h3>
<form action="./login.php" method="post">
<p>Username: <input type="text" name="login"></p>
<p>Password: <input type="password" name="passwd"></p>
<p><input type="submit" name="submit" value="OK"></p>
</form>
<p><a href="create.php">Create a new account here</a></p>
<p><a href="modif.php">Modify your password here</a></p>
</div>
</div>
</div>
</main>
</body>

</html>
';
include("auth.php");
if (!auth($_POST["login"], $_POST["passwd"])) {
	$_SESSION["loggued_on_user"] = "";
	return;
}
else {
	$_SESSION["loggued_on_user"] = $_POST["login"];
	$array = unserialize(file_get_contents('./private/passwd'));
	foreach ($array as $user) {
		if ($user['login'] == $_SESSION["loggued_on_user"])
			$_SESSION['admin'] = $user['admin'];
	}
	header("Location: ./index.php");
}

