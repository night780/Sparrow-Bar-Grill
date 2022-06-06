<?php

class DataLayer
{
	private $_dbh;

	function __construct()
	{
		require_once($_SERVER['DOCUMENT_ROOT'].'/../config.php');
		$dbh = 5;
		$this->_dbh = $dbh;
	}

	// ---------- Get order options ----------
	// Get food
	static function getFood() {
		return array("Chicken Tenders","Turkey Club","Fresh Salmon",
			"Mega Philly Cheese Melt","1/3lb Cheeseburger",
			"Crazy Spicy Skillet","Sirloin Steak & Eggs","Supreme Skillet",
			"Smothered Cheese Fries","Zesty Nachos","Sweet Tangy Bacon Burger");
	}

	// Get drinks
	static function getDrinks() {
		return array("Bud Light","Busch","Sam Adams","Corona",
			"Mojito","Cosmopolitan","Negroni","Whiskey Sour");
	}
}