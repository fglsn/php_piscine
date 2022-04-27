<?php
function auth($login, $passwd) {
	if (!$login || !$passwd)
		return false;
	$file = '../private/passwd';
	$passwd = hash('whirlpool', $passwd);
	if ($file) {
		$data = unserialize(file_get_contents($file));
		foreach ($data as $record) {
			if ($record['login'] === $login &&
				$record['passwd'] === $passwd)
				return true;
			return false;
		}
	}
	return false;
}
?>