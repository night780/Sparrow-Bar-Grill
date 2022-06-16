<?php

/**
 * Controller Class, called from Index controls routing and page logic
 */
class Controller
{
    /**
     * f3 hive var
     * @var
     */
    private $_f3;

    /**
     * f3 default constructor
     * @param $f3
     */
    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    /**
     * home routing
     * @return void
     */
    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

	/**
	 * Displays the menu
	 * @return void
	 */
	function menu() {
		$this->_f3->set('food', DataLayer::getFood());
		$this->_f3->set('drinks', DataLayer::getDrinks());

		$view = new Template();
		echo $view->render('views/menu.html');
	}


    /**
     * vip page routing
     * @return void
     */
    function account()
    {
        $view = new Template();
        echo $view->render('views/account.html');
    }

    /**
     * order page routing
     * @return void
     */
    function order($f3)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$order = new MealOrder();

            // Getting the food seperated by a comma
            $food = "None";
            if (Validation::validFood($food)) {
                if (!empty($_POST['food'])) {
                    $food = implode(", ", $_POST['food']);
                }
				// Calculating to cost for the food
				$totalArray = array();
				$foodArray = explode(',', $food);
				foreach ($foodArray as $foodItem) {
					if ($foodItem[0] == " ") {
						$foodItem = substr($foodItem, 1);
					}
					$totalArray[] = DataLayer::getFoodPrice($foodItem);
				}
            } else {
				//if data is not valid store an error message
				$f3->set('errors["food"]', 'Please enter a valid food');
			}
			$order->setFood($food);

            // Getting the drinks seperated by a comma
            $drinks = "None";
            if (Validation::validDrink($drinks)) {
                if (!empty($_POST['drinks'])) {
                    $drinks = implode(", ", $_POST['drinks']);
                }
				// Calculating to cost for the drinks
				$drinkArray = explode(',', $drinks);
				foreach ($drinkArray as $drinkItem) {
					if ($drinkItem[0] == " ") {
						$drinkItem = substr($drinkItem, 1);
					}
					$totalArray[] = DataLayer::getDrinkPrice($drinkItem);
				}
            } else {
				//if data is not valid store an error message
				$f3->set('errors["drinks"]', 'Please enter a valid drink');
			}
			$order->setDrinks($drinks);

            if (Validation::validDrinkPrice($drinks) or
                Validation::validFoodPrice($food)) {
                // Total cost
                $total = array_sum($totalArray);
                $total = number_format($total, 2, ".", ",");
            } else {
                //if data is not valid store an error message
                $f3->set('errors["price"]', 'Please do not edit the prices');
            }
			$order->setTotal($total);
			$order->setMemberNum($_SESSION['member']->getMemberNum());

			$_SESSION['order'] = $order;

            // This is for the CSS in order. Increments ID (food1,food2,food3...)
            $drinkValue = 0;
            $drinkValue = $drinkValue + 1;
            $_SESSION['drink'] = $_POST[('drink' . $drinkValue)];
            $foodValue = 0;
            $foodValue = $foodValue + 1;
            $_SESSION['foods'] = $_POST[('foods' . $foodValue)];

            if (empty($this->_f3->get('errors'))) {
                header('location: confirmation');
            }
        }

        $this->_f3->set('food', DataLayer::getFood());
        $this->_f3->set('drinks', DataLayer::getDrinks());

        $view = new Template();
        echo $view->render('views/order.html');
    }

    /**
     * order confirmation page routing
     * @return void
     */
    function confirmation()
    {
		if (isset($_SESSION['order']) && get_class($_SESSION['member']) == 'VIPMember') {
			$_SESSION['member']->setRewardsPoints(10);
		}

        $view = new Template();
        echo $view->render('views/confirmation.html');
    }

    /**
     * Contact us page routing
     * @return void
     */
    function contact()
    {
        $view = new Template();
        echo $view->render('views/suggestionContact.html');
    }

    /**
     * Signup page routing
     * @return void
     */
    function signUp($f3)
    {
        if (empty($this->_f3->get('result'))) {
            $f3->set('errors["alreadyMember"]', 'This email address is being used.\nPlease sign in.');
        }

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($this->_f3->get('result'))) {
			// First name
			if (isset($_POST['fname'])) {
				$fname = $_POST['fname'];
			} else {
				//if data is not valid store an error message
				$f3->set('errors["fname"]', 'Please enter a valid first name');
			}
			$this->_f3->set('fname', $fname);

			// Last name
			if (isset($_POST['lname'])) {
				$lname = $_POST['lname'];
			} else {
				//if data is not valid store an error message
				$f3->set('errors["lname"]', 'Please enter a valid last name');
			}
			$this->_f3->set('lname', $lname);

			if(isset($_POST['pass'])){
				$pass = $_POST['pass'];
			}else {
				//if data is not valid store an error message
				$f3->set('errors["pass"]', 'Please enter a valid password');
			}
			$this->_f3->set('pass', $pass);

			if(isset($_POST['email'])){
				$email = $_POST['email'];
			} else {
				//if data is not valid store an error message
				$f3->set('errors["email"]', 'Please enter a valid email');
			}
			$this->_f3->set('email', $email);

            $result = $this->_f3->get('result');
            for ($i = 0; $i < count($result); $i++) {
                if ($result[3] == $email) {
                    $f3->set('errors["alreadyMember"]', 'This email address is being used.\nPlease sign in.');
                }
            }

			if(isset($_POST['isVIP'])){
				$member = new VIPMember('0');
				$member->setFname($fname);
				$member->setLname($lname);
				$member->setEmail($email);
				$member->setPassword($pass);
				$member->setRewardsPoints(0);
				$_SESSION['member'] = $member;
			} else {
				$_SESSION['member'] = new RestMember($fname, $lname, $email, $pass);
			}

			if (empty($this->_f3->get('errors'))) {
				header('location: signUpConfirm');
			}
		}

        $view = new Template();
        echo $view->render('views/signUp.html');
    }

	/**
	 * Confirms the sign up form
	 * @return void
	 */
	function signUpConfirm() {
		$view = new Template();
		echo $view->render('views/signUpConfirm.html');
	}

    /**
     * Sign in Page routing
     * @return void
     */
    function signIn($f3)
    {
        $view = new Template();
        echo $view->render('views/signIn.html');
    }

    /**
     * Login poge routing
     * @return void
     */
    function logIn()
    {
        $view = new Template();
        echo $view->render('views/login.php');
    }
}