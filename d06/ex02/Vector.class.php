<?php

	require_once "../ex01/Vertex.class.php";
	require_once "../ex00/Color.class.php";

	class Vector {

		private $_x = 0;
		private $_y = 0;
		private $_z = 0;
		private $_w = 0.0;

		static $verbose = false;

		function __construct($arr)
		{
			if (isset($arr['dest'])) {
				if (isset($arr['orig']) && $arr['orig'] instanceof Vertex) {
					$orig_coords = array('x' => $arr['orig']->read_x(), $arr['orig']->read_y(), $arr['orig']->read_z());
					$orig = new Vertex($orig_coords);
				}
				else {
					$orig = new Vertex(array('x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1.0));
				}
				$this->_x = $arr['dest']->read_x() - $orig->read_x();
				$this->_y = $arr['dest']->read_y() - $orig->read_y(); 
				$this->_z = $arr['dest']->read_z() - $orig->read_z();

			}

			if (Vector::$verbose) {
				print($this->__toString() . " constructed\n");
			}
		}

		function __toString()
		{
			return (sprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
		}

		static function doc() {
			if (file_exists("./Vector.doc.txt")) {
				return(file_get_contents("./Vector.doc.txt"));
			}
			return "";
		}

		function __destruct() {
			if (Vector::$verbose) {
				print($this->__toString() . " destructed\n");
			}
		}

		function magnitude() {
			$x = $this->_x;
			$y = $this->_y;
			$z = $this->_z;
			$mag = (float)sqrt($x * $x + $y * $y + $z * $z);
			if ($mag == 1)
				return ('norm');
			else
				return ($mag);
		}

		function normalize() {
			$mag = $this->mag;
			if ($mag == 1)
				return (clone $mag);
			else {
				 if ($mag > 0) {
					$norm = new Vector(array('dest' => new Vertex(array(
						'x' => $this->_x / $mag,
						'y' => $this->_y / $mag,
						'z' => $this->_z / $mag )
					)));
				}
				else
					return ($mag);
			}
			return($norm);
		}

		function add(Vector $rhs) {
			$sum = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x + $rhs->_x,
				'y' => $this->_y + $rhs->_y,
				'z' => $this->_z + $rhs->_z)
			)));
			return ($sum);
		}

		function sub(Vector $rhs) {
			$diff = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x - $rhs->_x,
				'y' => $this->_y - $rhs->_y,
				'z' => $this->_z - $rhs->_z)
			)));
			return ($diff);
		}

		function opposite() {
			$opp = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x * (-1),
				'y' => $this->_y * (-1),
				'z' => $this->_z * (-1) )
			)));
			return ($opp);
		}

		function scalarProduct($k) {
			$scale = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x * $k,
				'y' => $this->_y * $k,
				'z' => $this->_z * $k )
			)));
			return ($scale);
		}

		function dotProduct(Vector $rhs) {
			$dot = (float)(
				$this->_x * $rhs->_x +
				$this->_y * $rhs->_y +
				$this->_z * $rhs->_z
			);
			return ($dot);
		}

		function cos(Vector $rhs) {
			if ($this->magnitude() == 'norm' || $rhs->magnitude() == 'norm')
				return (0);
			else
			{
				$lens_prod = (float)($this->magnitude() * $rhs->magnitude());
				return ((float)($this->dotProduct($rhs) / $lens_prod));
			}
		}

		public function crossProduct(Vector $rhs)
		{
			return new Vector(array('dest' => new Vertex(array(
				'x' => $this->_y * $rhs->read_z() - $this->_z * $rhs->read_y(),
				'y' => $this->_z * $rhs->read_x() - $this->_x * $rhs->read_z(),
				'z' => $this->_x * $rhs->read_y() - $this->_y * $rhs->read_x()
			))));
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

	}

// magn and norm https://www.khanacademy.org/computing/computer-programming/programming-natural-simulations/programming-vectors/a/vector-magnitude-normalization
// scalar multiplication https://math.semestr.ru/line/scalar.php
// cos The cosine of the angle between two nonzero vectors is equal to the dot product of the vectors divided by the product of their lengths.
//https://www.sciencedirect.com/topics/mathematics/angle-between-two-vector#:~:text=The%20Angle%20between%20Two%20Vectors,-The%20dot%20product&text=cos%20%CE%B8%20%3D%20x%20%E2%8B%85%20y%20x%20y%20.
// copy object https://stackoverflow.com/questions/185934/how-do-i-create-a-copy-of-an-object-in-php
?>