<style><?php include './static/style.css'; ?></style>
<?php
session_start();
include("./templates/header.php");
echo '
    <main>
        <div class="first-section flex-container" id="flex_forms">
            <div class="forms">
                <div class="banner-text flex-container">
                    <h3>Thank you, your order is confirmed!</h3>
                    <h5>Order will be sent in 1-2 business days.</h5>
                </div>
            </div>
        </div>
    </main>
';
	?>