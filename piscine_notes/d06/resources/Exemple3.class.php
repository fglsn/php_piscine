<?php
//attributes and methods
class Example {
	public $foo = 0; //attribute
	function __construct()
	{
		print( 'Constructor called' . PHP_EOL);
		print( '$this->foo: ' . $this->foo . PHP_EOL);
		$this->foo = 42;
		print( '$this->foo: ' . $this->foo . PHP_EOL);
		$this->bar();
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
	//php -f Exemple3.class.php
?>

