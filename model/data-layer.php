<?php

/**
 *Data layer class, this class holds all things data, like our arrays of
 * food/drink
 */
class DataLayer
{
    /**
     * private DBH, Not sure why this is here
     * dbh is deffined allready in config.php
     *
     * @var int
     */
    private $_dbh;

    /**
     *This construct can likely be remove but not my edit, DB processing is
     * done in controller/index
     */
    function __construct()
	{
		require_once($_SERVER['DOCUMENT_ROOT'].'/../config.php');
		$dbh = 5;
		$this->_dbh = $dbh;
	}

	// ---------- Get order options ----------

    /**
     * Get food
     * @return string[]
     */
    static function getFood() {
		return array("Chicken Tenders","Turkey Club","Fresh Salmon",
			"Mega Philly Cheese Melt","1/3lb Cheeseburger",
			"Crazy Spicy Skillet","Sirloin Steak & Eggs","Supreme Skillet",
			"Smothered Cheese Fries","Zesty Nachos","Sweet Tangy Bacon Burger");
	}


    /**
     * Get drinks
     * @return string[]
     */
    static function getDrinks() {
		return array("Bud Light","Busch","Sam Adams","Corona",
			"Mojito","Cosmopolitan","Negroni","Whiskey Sour");
	}
}