
<div bacground="white">
	<p>Order id: <?php echo $order['id'];?></p>
	<p>Cart: <br> <?php
		foreach ($order['cart'] as $product) {
			echo "id: " . $product['id'] . " amount: " . $product['quantity'] . PHP_EOL; } ?></p>
	<p>Client id: <?php echo $order['user_id'];?></p>
	<p>Full name: <?php echo $order['full_name'];?></p>
	<p>Address: <?php echo $order['address'];?></p>
	<p>TOTAL: <?php echo $order['total'];?></p>
	<p>
		<form action="./orderstatus.php" method="post">
		<label for="status">Order status: </label>
  		<select name="status" id="status">
			<option value="created"<?php if ($order['status'] == 'created') echo ' selected';?>>Created</option>
			<option value="confirmed"<?php if ($order['status'] == 'confirmed') echo ' selected';?>>Confirmed</option>
			<option value="paid"<?php if ($order['status'] == 'paid') echo ' selected';?>>Paid</option>
			<option value="shipped"<?php if ($order['status'] == 'shipped') echo ' selected';?>>Shipped</option>
			<option value="canceled"<?php if ($order['status'] == 'canceled') echo ' selected';?>>Canceled</option>
			<option value="returned"<?php if ($order['status'] == 'returned') echo ' selected';?>>Returned</option>
 		</select>
		 <input type="hidden" id="status" name="id" value="<?php echo $order['id'];?>">
		 <input type="submit" value="Change status">
		</form>
	</p>
</div>