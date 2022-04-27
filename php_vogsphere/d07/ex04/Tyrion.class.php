<?php
class Tyrion extends Lannister{
	public function sleepWith($opt) {
		if ($opt instanceof Jaime) {
			print("Not even if I'm drunk !" . PHP_EOL);
		}
		else if ($opt instanceof Sansa) {
			print("Let's do this." . PHP_EOL);
		}
		else if ($opt instanceof Cersei)
		{
			print("Not even if I'm drunk !" . PHP_EOL);
		}
	}
}
?>