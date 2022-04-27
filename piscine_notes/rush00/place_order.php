<?php

session_start();
if (!isset($_COOKIE['cart']))
		return;
$cart = unserialize(base64_decode($_COOKIE['cart']));
function add_order($user_id, $cart, $full_name, $address, $total) {
	$id = 0;
	if (file_exists('orders.db')) {
		$db = unserialize(file_get_contents('orders.db'));
		foreach ($db as $order) {
			if ($order['id'] > $id)
				$id = $order['id'];
		}
	}
	$id++;
	$array = array(
		'id' => $id,
		'user_id' => $user_id,
		'full_name' => $full_name,
		'address' => $address,
		'total' => $total,
		'cart' => $cart,
		'status' => 'created'
	);
	$db[] = $array;
	file_put_contents('orders.db', serialize($db));
}
// check if user logged in, take user id

if ($_SESSION['loggued_on_user'] == "") {
	header("Location: ./login.php");
	return ;
}
$user_id = $_SESSION['loggued_on_user'];
if (!isset($_POST['address']) || !isset($_POST['full_name'])) {
	header("Location: ./templates/error.html");
	return ;
}
$address = $_POST['address'];
$full_name = $_POST['full_name'];
$total = $_POST['total'];
add_order($user_id, $cart, $full_name, $address, $total);
header("Location: templates/order_success.html");

?>