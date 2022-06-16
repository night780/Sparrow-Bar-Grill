<?php
// Require the autoload file
require_once('vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../config.php');

// Create instance of the base class
$f3 = Base::instance();

//Instance of DataLayer and Controller
$dataLayer = new DataLayer();
$con = new Controller($f3);

//Session Starts here
session_start();

/**
 * default page routing
 * @return void
 */
$f3->route('GET /', function () {
    global $con;
    $con->home();
});

/**
 * home page routing
 * @return void
 */
$f3->route('GET /home', function () {
    global $con;
    $con->home();
});

/**
 * VIP page routing
 * @return void
 */
$f3->route('GET|POST /Account', function () use ($dbh, $f3) {
	if (isset($_SESSION['member'])) {
		$sql="SELECT * FROM orders WHERE memberNum =".$_SESSION['member']->getMemberNum();
		$statement=$dbh->prepare($sql);
		$statement->execute();
		$result=$statement->fetchAll();
		$f3->set('result',$result);
	}
	global $con;
	$con->account();
});

/**
 * Checks order status via order status page
 * @return void
 */
$f3->route('GET|POST /status', function () {
    global $con;
    $con->orderStatus();
});

/**
 * Displays the menu
 * @return void
 */
$f3->route('GET|POST /menu', function () {
	global $con;
	$con->menu();
});

/**
 * order page routing
 * @param $f3
 * @return void
 */
$f3->route('GET|POST /Order', function ($f3) {
    global $con;
    $con->order($f3);
});

/**
 * order confirmation page routing
 * @return void
 */
$f3->route('GET|POST /confirmation', function () use ($dbh) {
    //1. define a query
    $sql = "INSERT INTO orders (food, drinks, total, memberNum) 
		VALUES (:food,:drinks,:total, :memberNum)";

    //2. prepare a statement ($dbh is in config.php so cannot see in editor)
    $statement = $dbh->prepare($sql);

    //3. bind parameters
    $food = $_SESSION['order']->getFood();
    $drinks = $_SESSION['order']->getDrinks();
    $total = $_SESSION['order']->getTotal();
	$memberNum = $_SESSION['order']->getMemberNum();

    $statement->bindParam(':food', $food, PDO::PARAM_STR);
    $statement->bindParam(':drinks', $drinks, PDO::PARAM_STR);
    $statement->bindParam(':total', $total, PDO::PARAM_STR);
	$statement->bindParam(':memberNum', $memberNum, PDO::PARAM_STR);

    //4. execute
    $statement->execute();

    global $con;
    $con->confirmation();
});

/**
 * Contact form route
 * @return void
 */
$f3->route('GET|POST /contact', function () {
    global $con;
    $con->contact();
});

/**
 * Sign up form route
 * @return void
 */
$f3->route('GET|POST /Sign-up', function () use ($dbh, $f3) {
	global $con;
    $con->signUp($f3);
});

/**
 * Confirms the sign up
 */
$f3->route('GET|POST /signUpConfirm', function () use ($dbh, $f3) {
	//1. define a query
	$sql = "INSERT INTO members (fname, lname, email, pass, isVIP) 
			VALUES (:fname, :lname, :email, :pass, :isVIP)";

	//2. prepare a statement ($dbh is in config.php so cannot see in editor)
	$statement = $dbh->prepare($sql);

	//3. bind parameters
	$fname = $_SESSION['member']->getFname();
	$lname = $_SESSION['member']->getLname();
	$email = $_SESSION['member']->getEmail();
	$pass = $_SESSION['member']->getPassword();

	if (get_class($_SESSION['member']) == "VIPMember") {
		$isVIP = "1";
	} else {
		$isVIP = "0";
	}

	$statement->bindParam(':fname', $fname, PDO::PARAM_STR);
	$statement->bindParam(':lname', $lname, PDO::PARAM_STR);
	$statement->bindParam(':email', $email, PDO::PARAM_STR);
	$statement->bindParam(':pass', $pass, PDO::PARAM_STR);
	$statement->bindParam(':isVIP', $isVIP, PDO::PARAM_STR);

	$statement->execute();

	$sql = "SELECT * FROM members";
	$statement = $dbh->prepare($sql);
	$statement->execute();
	$result = $statement->fetchAll();

	for ($i = 0; $i < count($result); $i++) {
		if ($_SESSION['member']->getEmail() == $result[$i]['email']) {
			$memberNum = $result[$i]['memberNum'];
			$_SESSION['member']->setMemberNum($memberNum);
		}
	}

	global $con;
	$con->signUpConfirm($f3);
});

/**
 * Sign-in form route
 * @return void
 */
$f3->route('GET|POST /Sign-in', function () use ($dbh, $f3) {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$sql = "SELECT * FROM members";
		$statement = $dbh->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
		$found = false;

		for ($i = 0; $i < count($result); $i++) {
			if ($_POST['email'] == $result[$i]['email']) {
				if ($result[$i]['isVIP'] == 1) {
					$member = new VIPMember(0);
					$member->setFname($result[$i]['fname']);
					$member->setLname($result[$i]['lname']);
					$member->setEmail($result[$i]['email']);
					$member->setMemberNum($result[$i]['memberNum']);
					$_SESSION['member'] = $member;
				} else {
					$member = new RestMember($result[$i]['fname'],
						$result[$i]['lname'], $result[$i]['email'], $result[$i]['password']);
					$member->setMemberNum($result[$i]['memberNum']);
					$_SESSION['member'] = $member;
				}
				$found = true;
			}
		}

		if ($found == false) {
			$f3->set('errors["login"]', 'Please enter valid login information');
		}
		if ($found == true) {
			header('location: home');
		}
	}

    global $con;
    $con->signIn($f3);
});

/**
 * Log-in form route
 * @return void
 */
$f3->route('GET|POST /login', function () {
    global $con;
    $con->logIn();
});

/**
 * Signs out the user
 */
$f3->route('GET|POST /Sign-out', function () {
	session_destroy();
	global $con;
	$con->home();
});

// Run fat free
$f3->run();