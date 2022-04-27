<?php

include("./templates/header.php");
if (!isset($_COOKIE['cart']) || !file_exists('products.db'))
		return;
$cart = unserialize(base64_decode($_COOKIE['cart']));
$db = unserialize(file_get_contents('products.db'));

?>

<main>
<h3>Confirm Order:</h3>
<div class="first-section flex-container" id="flex_forms">
	<div class="forms">
		<div class="banner-text flex-container">
			<h3>Your order</h3>
			<form method="POST" action="./place_order.php">
			<?php
				$total = 0;
				foreach($cart as $cart_product) {
					foreach ($db as $product) {
						if ($product['id'] == $cart_product['id']) {
							echo $product['name'] . "\tx" . $cart_product['quantity'];
							echo "\tPrice: " .$product['price'];
							echo "<br>";
							$total += $product['price'] * $cart_product['quantity'];
							echo "<br>";
						}
					}
				}
				echo "Total: " .  $total . "<br>";
				echo "<br>";
			?>
			<label class="form-label">Full name:* </label>
			<input type="text" name="full_name" value="" require>
			<label class="form-label">Delivery address:* </label>
			<input type="text" name="address" value="" require>
			<input type="hidden" id="id" name="total" value="<?php echo $total; ?>">
			<br>
			<button type="submit">Confirm</button>
			</form>

</main>
</body>
</html>