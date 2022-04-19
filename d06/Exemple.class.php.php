<?php
//declaration and usage
class Example {
	function __construct()
	{
		print( 'Constructor called' . PHP_EOL);
		return;
	}

	function __destruct()
	{
		print( 'Destructor called' . PHP_EOL );
		return;
	}
}
	$instance = new Example();

	//php -f Exemple.class.php
?>

