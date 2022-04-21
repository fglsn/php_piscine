<?php
class Jaime {
	public function sleepWith($opt) {
		if ($opt instanceof Tyrion) {
			print("Not even if I'm drunk !" . PHP_EOL);
		}
		else if ($opt instanceof Sansa) {
			print("Let's do this." . PHP_EOL);
		}
		else if ($opt instanceof Cersei)
		{
			print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
		}
	}
}
?>