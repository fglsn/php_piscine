<?php
function auth($login, $passwd) {
	if (!$login || !$passwd)
		return false;
	$file = '../private/passwd';
	$passwd = hash('whirlpool', $passwd);
	$data = unserialize(file_get_contents($file));
	if ($data) {
		foreach ($data as $record) {
			if ($record['login'] === $login &&
				$record['passwd'] === $passwd)
				return true;
		}
	}
	return false;
}
// rm /goinfre/ishakuro/mamp/apache2/htdocs/d04/private/passwd
// curl -d login=toto -d passwd=titi -d submit=OK 'http://localhost:8080/d04/ex01/create.php'
// curl 'http://localhost:8080/d04/ex03/login.php?login=toto&passwd=titi'

// rm /goinfre/ishakuro/mamp/apache2/htdocs/d04/private/passwd
//  curl -d login=toto -d passwd=titi -d submit=OK 'http://localhost:8080/d04/ex01/create.php'
// curl -c cook.txt 'http://localhost:8080/d04/ex03/login.php?login=toto&passwd=titi'
// curl -b cook.txt 'http://localhost:8080/d04/ex03/whoami.php'
?>