<?php

class A {
	public function __construct() {
		print("A class constructed" . PHP_EOL);
		return;
	}
	public function __destruct() {
		print("A class destruct" . PHP_EOL);
		return;
	}

	public function foo() {
		print("A class FOO" . PHP_EOL);
		return;
	}

	public function test() {
		self::foo();
		return;
	}
	
}

class B extends A{
	public function __construct() {
		print("A class constructed" . PHP_EOL);
		return;
	}
	public function __destruct() {
		print("A class destruct" . PHP_EOL);
		return;
	}

	public function foo() {
		print("A class FOO B" . PHP_EOL);
		return;
	}

	public function test() {
		self::foo();
		return;
	}
}

$instanceA = new A();
$instanceb = new B();

$instanceA->foo();
$instanceb->foo();

$instanceA->test();
$instanceb->test();
?>