<?php
//attributes and methods
class Example {
	public $foo = 0; //attribute
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


	function bar() { //method
		print('Method bar called' . PHP_EOL);
		return;
	}

}
	$instance = new Example();

	print('$instance->foo:' . $instance->foo . PHP_EOL);
	$instance->foo = 42;
	print('$instance->foo:' . $instance->foo . PHP_EOL);

	$instance->bar();
	//php -f Exemple.class.php
?>

