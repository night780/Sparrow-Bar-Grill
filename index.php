<?php
// Turn on error reporting
//TODO: REMOVE BEFORE SUBMITTING DEBUGGING ONLY
ini_set('display_errors',1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../config.php');

// Create instance of the base class
$f3=Base::instance();

//Sesion Starts here
session_start();

//Instance of DataLayer and Controller
$dataLayer = new DataLayer();
$con = new Controller($f3);


$f3->route(/**
 * default page routing
 * @return void
 */ 'GET /',function() {
	global $con;
	$con->home();
});


$f3->route(/**
 * home page routing
 * @return void
 */ 'GET /home',function() {
	global $con;
	$con->home();
});


$f3->route(/**
 * VIP page routing
 * @return void
 */ 'GET /VIP',function() {
	global $con;
	$con->vip();
});


$f3->route(/**
 * Checks order status via order status page
 * @return void
 */ 'GET /order-status',function() {
	global $con;
	$con->orderStatus();
});


$f3->route(/**
 * order page routing
 * @param $f3
 * @return void
 */ 'GET|POST /Order',function($f3) {

	global $con;
	$con->order();
});

$f3->route(/**
 * order confirmation page routing
 * @return void
 */ 'GET|POST /confirmation',function() use ($dbh) {

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

$f3->route(/**
 * Contact form route
 * @return void
 */ 'GET /contact',function() {
	global $con;
	$con->contact();
});


$f3->route(/**
 * Sign up form route
 * @return void
 */ 'GET /Sign-up',function() {
	global $con;
	$con->signUp();
});


$f3->route(/**
 * Sign-in form route
 * @return void
 */ 'GET /Sign-in',function() {
	global $con;
	$con->signIn();
});

$f3->route(/**
 * Log-in form route
 * @return void
 */ 'GET|POST /login',function() {
	global $con;
	$con->logIn();
});

// Run fat free
$f3->run();