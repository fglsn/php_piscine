<?php
session_start();
if ($_SESSION['admin'] == false) {
	header('HTTP/1.0 401 Unauthorized');
	return;
}
?>
<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hive Paint Factory</title>
	<link href="../static/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<div class="nav-content flex-container">
			<div class="logo">
				<img id="logoimg" src="https://img.icons8.com/external-icongeek26-outline-gradient-icongeek26/452/external-sandwich-baking-and-bakery-icongeek26-outline-gradient-icongeek26.png" alt="School logo">
			</div>
			<div class="logo">
				<h1>Hive<span id="light"><a href="../index.php">Paint Factory</span></h1>
			</div>
			<div class="drop">
				<a class="navspan" href="../cart.php">Cart</a>
			</div>
			<div class="drop">
				<a class="navspan" href="./login.html">Login</a>
			</div>
			<div class="drop">
				<a class="navspan" href="./create.html">Sign up</a>
			</div>
		</div>
	</header>

	<main>
		<!-- First section (product forms) -->
		<h3>Prouct management</h3>
		<div class="first-section flex-container" id="flex_forms">
			<div class="forms">
				<div class="banner-text flex-container">
					<h3>Add items</h3>
					<form action="../product_management.php" method="post">
						<label for="categories">Choose categories:* </label>
						<div class="checkbox">
							<input type="checkbox" class="form-control" name="categories[]" value="1">
							<label for="categories">1</label>
							<input type="checkbox" class="form-control" name="categories[]" value="2">
							<label for="categories">2</label>
							<input type="checkbox" class="form-control" name="categories[]" value="3">
							<label for="categories">3</label>
							<input type="checkbox" class="form-control" name="categories[]" value="4">
							<label for="categories">4</label>
							<input type="checkbox" class="form-control" name="categories[]" value="5">
							<label for="categories">5</label>
						</div>
						<label class="form-label">Item name:* </label>
						<input type="text" class="form-control" name="name" required>
						<label class="form-label">Description:* </label>
						<input type="text" name="description" required>
						<label class="form-label">Price:* </label>
						<input type="text" name="price" required>
						<label class="form-label">Image location:* </label>
						<input type="text" name="picture" required>
						<br>
						<input type="submit" name="action" value="add">
					</form>
				</div>
				<div class="banner-text flex-container">
					<h3>Modify item</h3>
					<form action="../product_management.php" method="post">
						<label for="item">Enter item id:* </label>
						<input type="text" class="form-control" name="id" required>
						<label class="form-label">New item name: </label>
						<input type="text" class="form-control" name="name">
						<label class="form-label">New description: </label>
						<input type="text" name="description">
						<label class="form-label">New price: </label>
						<input type="text" name="price">
						<label class="form-label">New image location: </label>
						<input type="text" name="picture_path" required>
						<br>
						<input type="submit" name="action" value="modify">
					</form>
				</div>
				<div class="banner-text flex-container">
					<h3>Delete item</h3>
					<form action="../product_management.php" method="post">
						<label for="item">Enter item id:* </label>
						<input type="text" class="form-control" name="id" required>
						<br><br>
						<input type="submit" class="delete" name="action" value="remove">
					</form>
				</div>
			</div>
		</div>

		<!-- Second section (categories) -->
		<h3>Category management</h3>
		<div class="first-section flex-container" id="flex_forms">
			<div class="forms">
				<div class="banner-text flex-container">
					<h3>Add category</h3>
					<form action="../category_management.php" method="post">
						<label class="form-label">Category name:* </label>
						<input type="text" class="form-control" name="name" required>
						<label class="form-label">Category description:* </label>
						<input type="text" class="form-control" name="description" required>
						<label class="form-label">Image location:* </label>
						<input type="text" class="form-control" name="picture" required>
						<br>
						<input type="submit" name="action" value="add">
					</form>
				</div>
				<div class="banner-text flex-container">
					<h3>Modify category</h3>
					<form action="../category_management.php" method="post">
						<label for="item">Enter category id:* </label>
						<input type="text" class="form-control" name="id" required>
						<label class="form-label">New category name: </label>
						<input type="text" class="form-control" name="name">
						<br>
						<input type="submit" name="action" value="modify">
					</form>
				</div>
				<div class="banner-text flex-container">
					<h3>Delete category</h3>
					<form action="../category_management.php" method="post">
						<label for="item">Enter item id:* </label>
						<input type="text" class="form-control" name="id" required>
						<br><br>
						<input type="submit" class="delete" name="action" value="remove">
					</form>
				</div>
			</div>
		</div>
		<!-- Third section (Orders) -->
		<h3>Order management</h3>
		<div class="first-section flex-container" id="flex_forms">
			<div class="forms">
				<div class="banner-text flex-container">
					<?php
						if (file_exists('../orders.db')) {
							$db = unserialize(file_get_contents('../orders.db'));
							foreach ($db as $order) {
								include("./order_desc.php");
							}
						}
					?>
				</div>
			</div>
		</div>
		<!-- Fourth section (Users) -->
		<h3>User management</h3>
		<div class="first-section flex-container" id="flex_forms">
			<div class="forms">
				<div class="banner-text flex-container">
					<h3>Create new user</h3>
					<form action="../create.php" method="post" class>
                        <p>Username: <input type="text" name="login"></p>
                        <p>Password: <input type="password" name="passwd"></p>
                        <p><input type="submit" name="submit" value="OK"></p>
                    </form>
				</div>
				<div class="banner-text flex-container">
					<h3>Change user password</h3>
					<form action="change_pw.php" method="post">
                        <p>Username: <input type="text" name="login"></p>
                        <p>New password: <input type="password" name="newpw"></p>
                        <p><input type="submit" name="submit" value="OK"></p>
                    </form>
				</div>
				<div class="banner-text flex-container">
					<h3>Delete user</h3>
					<form action="./delete_user.php" method="post">
						<label for="item">Enter username* </label>
						<input type="text" class="form-control" name="login" required>
						<br><br>
						<input type="submit" name="submit" value="Delete">
					</form>
				</div>
			</div>
		</div>
	</main>
</body>

</html>