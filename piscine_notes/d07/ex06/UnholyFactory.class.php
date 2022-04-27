<?php 
class UnholyFactory {
	private $_army = array();

	function absorb($unit) {
		if (!$unit instanceof Fighter) {
			print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
		}
		else
		{
			if (array_key_exists($unit->__toString(), $this->_army)) {
				print("(Factory already absorbed a fighter of type " . $unit->__toString() . ")" . PHP_EOL);
			}
			else {
				$this->_army[$unit->__toString()] = $unit;
				print("(Factory absorbed a fighter of type " . $unit->__toString() . ")" . PHP_EOL);
			}
		}
	}

	function fabricate($rf) {
		if (!array_key_exists($rf, $this->_army)) {
			print("(Factory hasn't absorbed any fighter of type " . $rf . ")" . PHP_EOL);
		}
		else {
			print("(Factory fabricates a fighter of type " . $rf . ")" . PHP_EOL);
			return ($this->_army[$rf]);
		}
	}
}
?>