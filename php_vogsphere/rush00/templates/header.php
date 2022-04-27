<?php
session_start();

echo
'<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hive Paint Factory</title>
    <link href="./static/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
        <div class="nav-content flex-container">
            <div class="logo">
                <img id="logoimg" src="https://img.icons8.com/external-icongeek26-outline-gradient-icongeek26/452/external-sandwich-baking-and-bakery-icongeek26-outline-gradient-icongeek26.png" alt="School logo">
            </div>
            <div class="logo">
                <h1>Hive<span id="light"><a href="./index.php">Paint Factory</span></h1>
            </div>
            <div class="drop">
                <a class="navspan" href="./cart.php">Cart</a>
            </div>';

		echo '
			<div class="drop">
						<a class="navspan dropdown">Categories</a>
							<div class="dropdown-content">';

		if (file_exists('./categories.db')) {
			$db = unserialize(file_get_contents('./categories.db'));
			foreach ($db as $category) {
				echo '<a href="product_list.php?categories=';
				echo $category['id'] . '">' . $category['name'] . '</a>';
			}
		}

		echo '</div>
				 </div>';

			if ($_SESSION["loggued_on_user"] === "") {
				echo '<div class="drop" style="width: 30%"></div>
						<div class="drop">
							<a class="navspan" href="./login.php">Login</a>
						</div>
						<div class="drop">
							<a class="navspan" href="./create.php">Sign up</a>
						</div>';
			};

// echo '
// 	<div class="drop">
// 				<a class="navspan dropdown">Categories</a>
// 					<div class="dropdown-content">';

// if (file_exists('./categories.db')) {
//     $db = unserialize(file_get_contents('./categories.db'));
//     foreach ($db as $category) {
//         echo '<a href="product_list.php?categories=';
//         echo $category['id'] . '">' . $category['name'] . '</a>';
//     }
// }

if ($_SESSION["loggued_on_user"] !== "") {
	if ($_SESSION["admin"]) {
		echo '
		<div class="drop" style="width: 42%"></div>
		<div class="drop">
				<a class="navspan" href="./templates/admin.php">' . $_SESSION["loggued_on_user"] . '</a>
			</div>
			<div class="drop">
				<a class="navspan" href="./logout.php">Log out</a>
			</div> 
		</div>
	</div>
</div>';
	}
	else {
		echo '
		<div class="drop" style="width: 42%"></div>
		<div class="drop">
		<a class="navspan" href="#">' . $_SESSION["loggued_on_user"] . '</a>
		</div> 			<div class="drop">
		<a class="navspan" href="./logout.php">Log out</a>
	</div> 
	</div>
	</div>
</div>';
	}
};

echo '
	</header>';
?>