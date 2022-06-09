<?php
// Turn on error reporting
//TODO: REMOVE BEFORE SUBMITTING DEBUGGING ONLY
ini_set('display_errors',1);
error_reporting(E_ALL);

//Session Starts here
session_start();

// Require the autoload file
require_once('vendor/autoload.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/../config.php');


// Create instance of the base class
$f3=Base::instance();

//Instance of DataLayer and Controller
$dataLayer = new DataLayer();
$con = new Controller($f3);

/**
 * default page routing
 * @return void
 */
$f3->route('GET /',function() {
	global $con;
	$con->home();
});

/**
 * home page routing
 * @return void
 */
$f3->route('GET /home',function() {
	global $con;
	$con->home();
});

/**
 * VIP page routing
 * @return void
 */
$f3->route('GET|POST /VIP',function() {
	global $con;
	$con->vip();
});

/**
 * Checks order status via order status page
 * @return void
 */
$f3->route('GET|POST /status',function() {
	global $con;
	$con->orderStatus();
});

/**
 * order page routing
 * @param $f3
 * @return void
 */
$f3->route('GET|POST /Order',function($f3) {

	global $con;
	$con->order();
});

/**
 * order confirmation page routing
 * @return void
 */
$f3->route('GET|POST /confirmation',function() use ($dbh) {

    //1. define a query
    $sql = "INSERT INTO orders (accountNum, food, drinks, total) VALUES (:accountNum, :food,:drinks,:total)";

    //2. prepare a statement ($dbh is in config.php so cannot see in editor)
    $statement = $dbh->prepare($sql);

    //3. bind parameters
    var_dump($_POST);

	$accountNum = 1234;
    $food = $_SESSION['food'];
    $drinks = $_SESSION['drinks'];
    $total = $_SESSION['total'];

	$statement->bindParam(':accountNum', $accountNum, PDO::PARAM_STR);
    $statement->bindParam(':food', $food, PDO::PARAM_STR);
    $statement->bindParam(':drinks', $drinks, PDO::PARAM_STR);
    $statement->bindParam(':total', $total, PDO::PARAM_STR);

	//4. execute
    $statement->execute();

	global $con;
	$con->confirmation();
});

/**
 * Contact form route
 * @return void
 */
$f3->route('GET|POST /contact',function() {
	global $con;
	$con->contact();
});

/**
 * Sign up form route
 * @return void
 */
$f3->route('GET|POST /Sign-up',function() {
	global $con;
	$con->signUp();
});

/**
 * Sign-in form route
 * @return void
 */
$f3->route('GET|POST /Sign-in',function() {
	global $con;
	$con->signIn();
});

/**
 * Log-in form route
 * @return void
 */
$f3->route('GET|POST /login',function() {
	global $con;
	$con->logIn();
});

// Run fat free
$f3->run();