<?php

session_start();

function add_item($id, $quantity) {
	if (isset($_COOKIE['cart']))
		$basket = unserialize(base64_decode($_COOKIE['cart']));
	else
		$basket = [];
	$item_exists = false;
	foreach ($basket as &$item) {
		if ($item['id'] == $id) {
			$item['quantity'] += $quantity;
			$item_exists = true;
		}
	}
	if (!$item_exists)
		$basket[] = array('id' => $id, 'quantity' => $quantity);
	setcookie("cart", base64_encode(serialize($basket)), time() + (86400 * 30), "/" );
}

function remove_item($id) {
	if (!isset($_COOKIE['cart']))
		return;
	$basket = unserialize(base64_decode($_COOKIE['cart']));
	$newbasket = [];
	foreach ($basket as $item) {
		if ($item['id'] == $id)
			continue;
		$newbasket[] = $item;
	}
	setcookie("cart", base64_encode(serialize($newbasket)), time() + (86400 * 30), "/" );
}

function change_quantity($id, $quantity) {
	if (isset($_COOKIE['cart']))
		$basket = unserialize(base64_decode($_COOKIE['cart']));
	else
		$basket = [];
	foreach ($basket as &$item) {
		if ($item['id'] == $id)
			$item['quantity'] = $quantity;
	}
	setcookie("cart", base64_encode(serialize($basket)), time() + (86400 * 30), "/" );
}

function list_items() {
	if (!isset($_COOKIE['cart']) || !file_exists('products.db'))
		return;
	$basket = unserialize(base64_decode($_COOKIE['cart']));
	$db = unserialize(file_get_contents('products.db'));
	$total = 0;
	foreach ($basket as $item) {
		foreach ($db as $product) {
			if ($product['id'] == $item['id']) {
				echo '
				<div class="basket-item">
				<div>
					<img class="item-img" src="' . $product['picture'] . '" alt="Picture">
				</div>
				<div class="item-content">
					<h4 class="item_name" id="marged">' . $product['name'] . '</h4>
					<form action="cart.php" method="post">
						<label for="quantity">Quantity:</label>
						<input type="number" id="quantity" name="quantity" min="1" max="99" value="' . $item['quantity'] . '">
						<input type="hidden" id="id" name="id" value="' . $item['id'] . '">
						<button name="action" value="change" type="submit">Change quantity</button>
					</form>
					<p class="hide" id="text">' . $product['price'] * $item['quantity'] . '</p>
					<div>
						<form action="cart.php" method="post">
							<input type="hidden" id="id" name="id" value="' . $item['id'] . '">
							<button name="action" value="remove" type="submit">Remove</button>
						</form>
					</div>
				</div>
				</div>';
				$GLOBALS['total'] += $product['price'] * $item['quantity'];
			}
		}
	}
	echo '
		<div id="total-size"
			<div class="total">Total: ' . $GLOBALS['total'] . ' euro(s)</div>
			<div class="checkout-button">
				<form method="POST" action="order.php">
					<input type="submit" value="Checkout">
				</form>
			</div>
		</div>
		';
}

if ($_POST['action'] == 'add' && isset($_POST['id']) && isset($_POST['quantity'])) {
	add_item($_POST['id'], $_POST['quantity']);
	header('Location: cart.php');
}
else if ($_POST['action'] == 'remove' && isset($_POST['id'])) {
	remove_item($_POST['id']);
	header('Location: cart.php');
}
else if ($_POST['action'] == 'change' && isset($_POST['id']) && isset($_POST['quantity'])) {
	change_quantity($_POST['id'], $_POST['quantity']);
	header('Location: cart.php');
}
else {
	include("./templates/header.php");
	echo '
	<main>
	<div class="wrapper">
	<div class="basket-list">
';
	list_items();
}
echo '
	</div>';
