<?php
// Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../config.php');

// Create instance of the base class
$f3=Base::instance();

session_start();

$dataLayer = new DataLayer();
$con = new Controller($f3);

// Define a default route
$f3->route('GET /',function() {
	global $con;
	$con->home();
});

// Define a Home route
$f3->route('GET /home',function() {
	global $con;
	$con->home();
});

// Define a VIP route
$f3->route('GET /VIP',function() {
	global $con;
	$con->vip();
});

// Define a Order Status route
$f3->route('GET /order-status',function() {
	global $con;
	$con->orderStatus();
});

// Order -> Confirmation
// Define a Order route
$f3->route('GET|POST /Order',function($f3) {

	global $con;
	$con->order();
});

// Define a Sign-up form route
$f3->route('GET|POST /confirmation',function() use ($dbh) {

    //1. define a query
    $sql = "INSERT INTO orders (food, drinks, total) VALUES (:food,:drinks,:total)";

    //2. prepare a statement ($dbh is in config.php so cannot see in editor)
    $statement = $dbh->prepare($sql);

    //3. bind parameters
    var_dump($_POST);

    $food = $_SESSION['food'];
    $drinks = $_SESSION['drinks'];
    $total = $_SESSION['total'];

    $statement->bindParam(':food', $food, PDO::PARAM_STR);
    $statement->bindParam(':drinks', $drinks, PDO::PARAM_STR);
    $statement->bindParam(':total', $total, PDO::PARAM_STR);

//4. execute
    $statement->execute();

	global $con;
	$con->confirmation();
});

// Define a Contact form route
$f3->route('GET /contact',function() {
	global $con;
	$con->contact();
});

// Define a Contact form route
$f3->route('GET /Sign-up',function() {
	global $con;
	$con->signUp();
});

// Define a Sign-in form route
$f3->route('GET /Sign-in',function() {
	global $con;
	$con->signIn();
});
// Define a Sign-in form route
$f3->route('GET|POST /login',function() {
	global $con;
	$con->logIn();
});

// Run fat free
$f3->run();