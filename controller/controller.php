<?php

class Controller
{
	private $_f3;

	function __construct($f3)
	{
		$this->_f3 = $f3;
	}

	function home()
	{
		$view=new Template();
		echo $view->render('views/home.html');
	}

	function vip()
	{
		$view=new Template();
		echo $view->render('views/vip.html');
	}

	function orderStatus()
	{
		$view=new Template();
		echo $view->render('views/status.html');
	}

	function order()
	{
		if ($_SERVER['REQUEST_METHOD']=='POST') {

			$food="None";

			if (isset($_POST['food'])) {
				if (!empty($_POST['food'])) {
					$food=implode(", ",$_POST['food']);
				}
			}
			$_SESSION['food']=$food;

			$drinks="None";

			if (isset($_POST['drinks'])) {
				if (!empty($_POST['drinks'])) {
					$drinks=implode(", ",$_POST['drinks']);
				}
			}

			// This is for the CSS in order. Increments ID (food1,food2,food3...)
			$drinkValue=0;
			$drinkValue=$drinkValue+1;
			$_SESSION['drink']=$_POST[('drink'.$drinkValue.$drinkValue)];

			$foodValue=0;
			$foodValue=$foodValue+1;
			$_SESSION['foods']=$_POST[('foods'.$drinkValue.$foodValue)];


			$_SESSION['drinks']=$drinks;
			$_SESSION['CT']=$_POST['CT'];

			if (empty($this->_f3->get('errors'))) {
				header('location: confirmation');
			}
		}

		$this->_f3->set('food', DataLayer::getFood());
		$this->_f3->set('drinks', DataLayer::getDrinks());

		$view=new Template();
		echo $view->render('views/order.html');
	}

	function confirmation()
	{
		// var_dump($_SESSION);
		$view=new Template();
		echo $view->render('views/confirmation.html');
		session_destroy();
	}

	function contact()
	{
		$view=new Template();
		echo $view->render('views/suggestionContact.html');
	}

	function signUp()
	{
		$view=new Template();
		echo $view->render('views/signUp.html');
	}

	function signIn()
	{
		$view=new Template();
		echo $view->render('views/signIn.html');
	}

	function logIn()
	{
		$view=new Template();
		echo $view->render('views/login.php');
	}
}