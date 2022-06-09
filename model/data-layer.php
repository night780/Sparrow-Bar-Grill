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
		//require_once($_SERVER['DOCUMENT_ROOT'].'/../config.php');
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
//'Chicken Tenders' => '8.00',
//			'Turkey Club' => '8.50',
//			'Fresh Salmon' => '12.00',
//			'Mega Philly Cheese Melt' => '7.00',
//			'1/3lb Cheeseburger' => '6.50',
//			'Crazy Spicy Skillet' => '10.00',
//			'Sirloin Steak & Eggs' => '11.00',
//			'Supreme Skillet' => '13.50',
//			'Smothered Cheese Fries' => '8.25',
//			'Zesty Nachos' => '6.00',
//			'Sweet Tangy Bacon Burger' => '15.00'

	}
/*
 * Temp Fix , separate arrays for prices but formatting is becoming an issue
 * with values and keys. This is printing incorrectly but other ways would
 * not print at all
 */
static function getFoodPrices(): array
{
        return array('8.00'=>1,'8.50'=>2,'12.00'=>3,'7.00'=>4,'6.50'=>5,'10
        .00'=>6,'11
        .00'=>7,'13.50'=>8,'8.25'=>9,'6.00'=>10,
            '15.00'=>11);
}

static function getDrinkPrices(){
    return array('2.00'=>1,'3.00'=>2,'3.50'=>3,'5.00'=>4,'8.00'=>5,'6
    .50'=>6,'8.25'=>7,'6.00'=>8);
}

    /**
     * Get drinks
     * @return string[]
     */
    static function getDrinks() {
        return array("Bud Light","Busch","Sam Adams","Corona",
            "Mojito","Cosmopolitan","Negroni","Whiskey Sour");
//		return array('Bud Light' => '2.50',
//			'Busch' => '2.00',
//			'Sam Adams' => '3.00',
//			'Corona' => '1.50',
//			'Mojito' => '5.50',
//			'Cosmopolitan' => '5.40',
//			'Negroni' => '5.00',
//			'Whiskey Sour' => '6.40'
//		);

	}
}