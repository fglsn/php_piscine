<?php
session_start();
function add_category() {
	$id = 0;
	if (file_exists('categories.db')) {
		$db = unserialize(file_get_contents('categories.db'));
		foreach ($db as $category) {
			if ($category['id'] > $id)
				$id = $category['id'];
		}
	}
	$id++;
	$array = array_merge(array('id' => $id), array('name' => $_POST['name']), array('description' => $_POST['description']), array('picture' => $_POST['picture']));
	$db[] = $array;
	file_put_contents('categories.db', serialize($db));
}
function remove_category($id) {
	if (file_exists('categories.db')) {
		$db = unserialize(file_get_contents('categories.db'));
		foreach ($db as &$category) {
			if ($category['id'] == $id) {
				continue;
			}
			$array[] = $category;
		}
	}
	file_put_contents('categories.db', serialize($array));
}

function modify_category($id) {
	if (file_exists('categories.db')) {
		$db = unserialize(file_get_contents('categories.db'));
		foreach ($db as &$category) {
			if ($category['id'] == $id) {
				if (isset($_POST['name']))
					$category['name'] = $_POST['name'];
				if (isset($_POST['description']))
					$category['description'] = $_POST['description'];
				if (isset($_POST['picture']))
					$category['picture'] = $_POST['picture'];
			}
		}
	}
	file_put_contents('categories.db', serialize($db));
}

if ($_SESSION['admin'] == false) {
	header('HTTP/1.0 401 Unauthorized');
	return;
}

if ($_POST['action'] == 'remove') {
	if (!isset($_POST['id'])) {
		echo "Missing category id" . PHP_EOL;
		return;
	}
	remove_category($_POST['id']);
}

if ($_POST['action'] == 'add') {
	if (!isset($_POST['name'])) {
		echo "Missing information" . PHP_EOL;
		return;
	}
	add_category();
}
if ($_POST['action'] == 'modify') {
	if (!isset($_POST['id'])) {
		echo "Missing category id" . PHP_EOL;
		return;
	}
	modify_category($_POST['id']);
}
header("Location: templates/admin.php");
