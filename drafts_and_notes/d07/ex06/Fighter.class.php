<?php 

abstract class Fighter {
	private $_unit;

	function __construct($target)
	{
		$this->_unit = $target;
	}

	abstract function fight($target);

	function __toString()
	{
		return $this->_unit;
	}
}

?>