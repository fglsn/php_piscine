<?php
class NightsWatch implements IFighter {
	function recruit($person) {
		if ($person instanceof IFighter) {
			$person->fight();
		}
	}
	function fight() {
	}
}
?>