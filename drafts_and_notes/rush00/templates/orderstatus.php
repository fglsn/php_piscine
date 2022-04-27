<?php
if (file_exists('../orders.db')) {
	$db = unserialize(file_get_contents('../orders.db'));
	print $_POST['id'] . PHP_EOL;
	print $_POST['status'] . PHP_EOL;
	foreach ($db as &$order) {
		if ($order['id'] == $_POST['id']) {
			$order['status'] = $_POST['status'];
		}
	}
	file_put_contents('../orders.db', serialize($db));
	header('Location: ./admin.php');
}
print "skipped loop" . PHP_EOL;