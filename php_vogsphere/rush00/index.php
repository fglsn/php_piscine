<style><?php include './static.css'; ?></style>
<?php
session_start();
include("./templates/header.php");
echo '
	<main>
	<div class=landing>
		<h2 style="text-align: center; padding-bottom: 1rem;">Welcome to the Hive Paint Factory!</h2>
		<p style="text-align: center; font-style: italic;">Interior paint colours, spray paints, automotive paints: all in one place.</p>
		<p style="text-align: center; font-style: italic;"> Simple steps to make your vision come alive.</p>
		<p style="text-align: center; padding-top: 1rem;" id="info-name">Fast delivery to your door</p>
	</div>
	<div class="wrapper">
';
include('product_list.php');
// include('category_list.php');
echo '
	</div>
</body>
</html>';