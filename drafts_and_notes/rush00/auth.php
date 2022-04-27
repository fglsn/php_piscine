<?php

function auth($login, $passwd) {
	$array = unserialize(file_get_contents('./private/passwd'));
	foreach ($array as $user) {
		if ($user['login'] == $login && $user['passwd'] == hash("whirlpool", $passwd))
			return TRUE;
	}
	return FALSE;
}
?>