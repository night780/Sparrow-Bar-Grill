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
// Home page rendering
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/home.html');
});

// Run fat free
$f3->run();