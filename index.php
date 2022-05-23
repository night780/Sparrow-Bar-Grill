<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);


// Require the autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');
// require_once('model/validation.php');

// Create instance of the base class
$f3 = Base::instance();

session_start();

// Define a default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/home.html');
});

// Define a Home route
$f3->route('GET /home', function() {
    $view = new Template();
    echo $view->render('views/home.html');
});

// Define a VIP route
$f3->route('GET /VIP', function() {
    $view = new Template();
    echo $view->render('views/VIP.html');
});

// Define a Order Status route
$f3->route('GET /order-status', function() {
    $view = new Template();
    echo $view->render('views/Status.html');
});

// Order -> Confirmation
// Define a Order route
$f3->route('GET|POST /Order', function($f3) {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$food = "None";
		if (isset($_POST['food'])) {
			if (!empty($_POST['food'])) {
				$food = implode(", ", $_POST['food']);
			}
		}
		$_SESSION['food'] = $food;
		$drinks = "None";



		if (isset($_POST['drinks'])) {
			if (!empty($_POST['drinks'])) {
				$drinks = implode(", ", $_POST['drinks']);

			}
		}

// This is for the CSS in order. Increments ID (food1,food2,food3...)
        $drinkValue =0;
        $drinkValue = $drinkValue +1;
        $_SESSION['drink'] = $_POST[('drink'. $drinkValue.$drinkValue )];

        $foodValue =0;
        $foodValue = $foodValue +1;
        $_SESSION['foods'] = $_POST[('foods'. $drinkValue.$foodValue )];


        $_SESSION['drinks'] = $drinks;
		$_SESSION['CT'] = $_POST['CT'];

		if (empty($f3->get('errors'))) {
			header('location: confirmation');
		}
	}
	$f3->set('food', getFood());
	$f3->set('drinks', getDrinks());

    $view = new Template();
    echo $view->render('views/Order.html');
});

// Define a Sign-up form route
$f3->route('GET|POST /confirmation', function() {
	// var_dump($_SESSION);
	$view = new Template();
	echo $view->render('views/confirmation.html');
	session_destroy();
});

// Define a Contact form route
$f3->route('GET /contact', function() {
    $view = new Template();
    echo $view->render('views/Suggestion-Contact.html');
});

// Define a Contact form route
$f3->route('GET /Sign-up', function() {
    $view = new Template();
    echo $view->render('views/Signup.html');
});

// Define a Sign-in form route
$f3->route('GET /Sign-in', function() {
    $view = new Template();
    echo $view->render('views/SignIn.html');
});
// Define a Sign-in form route
$f3->route('GET|POST /login', function() {
    $view = new Template();
    echo $view->render('views/login.php');
});

// Run fat free
$f3->run();