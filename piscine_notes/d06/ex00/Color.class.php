<?php
	class Color {
		public $red = 0;
		public $green = 0;
		public $blue = 0;

		static $verbose = false;

		function __construct($color)
		{
			if (isset($color['rgb']))
			{
				$this->red = intval($color['rgb']) >> 16 & 255;
				$this->green = intval($color['rgb']) >> 8 & 255;
				$this->blue = intval($color['rgb']) & 255;
			}
			else {
				$this->red = intval($color['red']);
				$this->green = intval($color['green']);
				$this->blue = intval($color['blue']);
			}
			if (Color::$verbose) {
				print($this->__toString() . " constructed.\n");
			}
		}

		function __toString() {
			return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
		}

		static function doc() {
			if (file_exists("./Color.doc.txt")) {
				return(file_get_contents("./Color.doc.txt"));
			}
			return "";
		}

		function add($rhs) {
			return new Color(array(
				'red' => $this->red + $rhs->red,
				'green' => $this->green + $rhs->green,
				'blue' => $this->blue + $rhs->blue,
			));
		}

		function sub($rhs) {
			return new Color(array(
				'red' => $this->red - $rhs->red,
				'green' => $this->green - $rhs->green,
				'blue' => $this->blue - $rhs->blue,
			));
		}

		function mult($rhs) {
			return new Color(array(
				'red' => $this->red * $rhs,
				'green' => $this->green * $rhs,
				'blue' => $this->blue * $rhs
			));
		}

		function __destruct() {
			if (Color::$verbose) {
				print($this->__toString() . " destructed.\n");
			}
		}

	}
	//Color( red: 255, green:   0, blue:   0 ) constructed.
	//rhs - right hand side
	//https://stackoverflow.com/questions/31033408/rgb-value-to-r-g-b-values-in-php
?>