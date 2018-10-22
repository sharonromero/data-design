<?php

class Bird {

	private $species;
	private $color;
	private $size;
	private $gender;

	public function setName($value) {
		$this->species = $value;
	}

	public function getName() {
		return $this->species;
	}

	public function setColor($value) {
		$this->color = $value;
	}

	public function getColor() {
		return $this->color;
	}

	public function setSize($value) {
		$this->size = $value;
	}

	public function getSize() {
		return $this->size;
	}

	public function setGender($value) {
		$this->gender = $value;
	}

	public function getGender() {
		return $this->gender;
	}

	public function __construct($newSpecies, $newColor, $newSize, $newGender) {
	}

$bird1 = new Bird;
$bird1->species = "House Finch";
$bird1->color = "Red";
$bird1->size = "Sparrow-sized or smaller";
$bird1->gender = "male";

}

?>