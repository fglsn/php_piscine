<?php
//hash(), file_get_contents(), file_put_contents()
//serialize(), unserialize(), file_exists(), mkdir()

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
	//check if user already exists
	if (file_exists($path)) {
		$file_content = file_get_contents($path);
		$data = unserialize($file_content);
		if ($data[$login]) {
			echo "ERROR\n";
			exit(1);
		}
	}
	//save data, cannot use array()
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

//curl -d login=toto1 -d passwd=titi1 -d submit=OK 'http://localhost:8080/d04/ex01/create.php'
//more /Users/fglsn/Documents/coding/code-server-basecamp/projects/php/d04/private/passwd
// curl -d login=toto2 -d passwd= -d submit=OK 'http://localhost:8080/d04/ex01/create.php'
//curl -d login=toto2 -d passwd= -d submit=KO 'http://localhost:8080/d04/ex01/create.php'
//curl -d login=bebe -d passwd=titi1 -d submit=OK 'http://localhost:8080/d04/ex01/create.php'
?>