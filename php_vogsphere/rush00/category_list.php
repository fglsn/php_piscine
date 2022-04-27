<?php

function get_category_list($categories) {

	if (file_exists('categories.db')) {
		$db = unserialize(file_get_contents('categories.db'));
		foreach ($db as $category) {
			if (count(array_intersect($category['categories'], $categories))) {
				echo '
				<div class="product-container item">
					<div>
						<img class="item-img" src="' . $category['picture'] . '" alt="Picture">
					</div>
					<div class="item-content">
						<h4 class="item_name" id="marged">' . $category['name'] . '</h4>
						<p class="hide" id="text">' . $category['price'] . '</p>
					</div>
				</div>';
			}
		}
	}
}

function list_all_categories() {

	if (file_exists('categories.db')) {
		$db = unserialize(file_get_contents('categories.db'));
		foreach ($db as $category) {
			echo '
			<div class="info-blocks flex-container">
				<div id="containerimg1">
					<!-- <img class="container-img" id="desktop" src="' . $category['picture'] . '" alt="Interior paint selector"> -->
					<!-- <img class="container-img" id="mobile-img" src="' . $category['picture'] . '" alt="Theme picture"> -->
				</div>
				<div class="container-text flex-container">
					<h4>' . $category['name'] . '</h4>
					<p id="text">' . $category['description'] . '</p>

					<a id="readmore" href="product_list.php?categories=' . $category['id'] . '" >View items</a>
				</div>
			</div>';
		}
	}
}

echo '
	<div class="right flex-container">
		<div class="categories">
			<h2>Categories</h2>
		</div>';
if (isset($_POST['categories'])) {
	get_category_list($_POST['categories']);
}
else
	list_all_categories();
echo '
	</div>';