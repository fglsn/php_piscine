<style><?php include './static.css'; ?></style>
<?php
include("./templates/header.php");
echo '
	<main>
	<h2 style="text-align: center;">Welcome to the Hive Paint Factory!</h2>
	<p style="text-align: center;">Interior paint colours, spray paints, automotive paints: all in one place. Simple steps to make your vision come alive.</p>
                    <p style="text-align: center;" id="info-name">Fast delivery to your door</p>
	<div class="wrapper">
';
include('product_list.php');
// include('category_list.php');
echo '
	</div>
</body>
</html>';