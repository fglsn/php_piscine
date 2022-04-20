<?php

	require_once "../ex00/Color.class.php";

		class Vertex {
		private $_x = 0;
		private $_y = 0;
		private $_z = 0;
		private $_w = 1.0;
		private $_color = 0;
		static $verbose = false;

		function __construct($coords)
		{
			$this->_x = $coords['x'];
			$this->_y = $coords['y'];
			$this->_z = $coords['z'];
			if (isset($coords['w'])) {
				$this->_w = $coords['w'];
			}
			if (isset($coords['color'])) {
				$this->_color = $coords['color'];
			}
			else {
				$this->_color = new Color(array(
					'red' => 255,
					'green' => 255,
					'blue' => 255
				));
			}
			if (Vertex::$verbose) {
				print($this->__toString() . " constructed\n");
			}
		}

		function __toString()
		{
			if (Vertex::$verbose) {
				$arr = array($this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
				return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )", $arr));
			}
			else
				return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
		}

		static function doc() {
			if (file_exists("./Vertex.doc.txt")) {
				return(file_get_contents("./Vertex.doc.txt"));
			}
			return "";
		}

		function __destruct() {
			if (Vertex::$verbose) {
				print($this->__toString() . " destructed\n");
			}
		}

		function read_x()
		{
			return $this->_x;
		}

		function read_y()
		{
			return $this->_y;
		}

		function read_z()
		{
			return $this->_z;
		}

		function read_w()
		{
			return $this->_w;
		}

		function read_color()
		{
			return $this->_color;
		}
		
		function write_x($x)
		{
			$this->_x = $x;
 		}

		function write_y($y)
		{
		$this->_y = $y;
		}

		function write_z($z)
		{
			$this->_z = $z;
		}

		function write_w($w)
		{
			$this->_w = $w;
		}

		function write_color($color)
		{
			$this->_color = $color;
		}
	}
//Vertex( x: 0.00, y: 0.00, z:0.00, w:1.00, Color( red: 255, green: 255, blue: 255 ) ) constructed
?>