<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);


// Require the autoload file
require_once('vendor/autoload.php');

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

// Define a Order route
$f3->route('GET|POST /Order', function() {
    $_SESSION['CT'] = $_POST['CT'];
    $view = new Template();
    echo $view->render('views/Order.html');
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

// Define a Sign-up form route
$f3->route('GET|POST /confirmation', function() {
    var_dump($_SESSION);
    $view = new Template();
    echo $view->render('views/confirmation.html');
});

// Run fat free
$f3->run();