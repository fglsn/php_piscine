<?php
//hash(), file_get_contents(), file_put_contents(), serialize(), unserialize()

if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] 
	 	&& $_POST['submit'] && $_POST['submit'] === "OK") {

	$login = $_POST['login'];
	$old = hash('whirlpool', $_POST['oldpw']);
	$new = hash('whirlpool', $_POST['newpw']);

	$path = '../private/passwd';
	$folder = '../private';
	if (!file_exists($folder) || !file_exists($path)) {
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

//rm /Users/fglsn/Documents/coding/code-server-basecamp/projects/php/d04/private/passwd

// curl -d login=x -d passwd=21 -d submit=OK 'http://localhost:8080/d04/ex01/create.php'
// curl -d login=x -d oldpw=21 -d newpw=42 -d submit=OK 'http://localhost:8080/d04/ex02/modif.php'
// curl -d login=x -d oldpw=42 -d newpw=422 -d submit=OK 'http://localhost:8080/d04/ex02/modif.php'
// curl -d login=xx2 -d oldpw=422 -d newpw=4222 -d submit=OK 'http://localhost:8080/d04/ex02/modif.php'

?>