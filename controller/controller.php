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
     * vip page routing
     * @return void
     */
    function vip()
    {
        $view = new Template();
        echo $view->render('views/vip.html');
    }

    /**
     * Checks order status via order status page
     * @return void
     */
    function orderStatus()
    {
        $view = new Template();
        echo $view->render('views/status.php');
    }

    /**
     * order page routing
     * @return void
     */
    function order($f3)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            // Getting the food seperated by a comma
            $food = "None";
            if (isset($_POST['food'])) {
                if (!empty($_POST['food'])) {
                    $food = implode(", ", $_POST['food']);
                }
            }
            if (Validation::validFood($food)) {
                // Calculating to cost for the food
                $totalArray = array();
                $foodArray = explode(',', $food);
                foreach ($foodArray as $foodItem) {
                    if ($foodItem[0] == " ") {
                        $foodItem = substr($foodItem, 1);
                    }
                    $totalArray[] = DataLayer::getFoodPrice($foodItem);
                }
                // Setting the food session variable
                $_SESSION['food'] = $food;
            }else {
                //if data is not valid store an error message
                $f3->set('errors["food"]', 'Please enter a valid food');
            }

            // Getting the drinks seperated by a comma
            $drinks = "None";
            if (isset($_POST['drinks'])) {
                if (!empty($_POST['drinks'])) {
                    $drinks = implode(", ", $_POST['drinks']);
                }
            }

            if (Validation::validFood($drinks)) {
                // Calculating to cost for the drinks
                $drinkArray = explode(',', $drinks);
                foreach ($drinkArray as $drinkItem) {
                    if ($drinkItem[0] == " ") {
                        $drinkItem = substr($drinkItem, 1);
                    }
                    $totalArray[] = DataLayer::getDrinkPrice($drinkItem);
                    $_SESSION['drinks'] = $drinks;
                }
            }else {
                //if data is not valid store an error message
                $f3->set('errors["drinks"]', 'Please enter a valid drink');
            }

            if (Validation::validDrinkPrice($drinks) or
                Validation::validFoodPrice($food)) {
                // Total cost
                $total = array_sum($totalArray);
                $total = number_format($total, 2, ".", ",");
                $_SESSION['total'] = $total;
            }else {
                //if data is not valid store an error message
                $f3->set('errors["price"]', 'Please do not edit the prices');
            }
            // Setting session variables
            $_SESSION['CT'] = $_POST['CT'];

            // This is for the CSS in order. Increments ID (food1,food2,food3...)
            $drinkValue = 0;
            $drinkValue = $drinkValue + 1;
            $_SESSION['drink'] = $_POST[('drink' . $drinkValue)];
            $foodValue = 0;
            $foodValue = $foodValue + 1;
            $_SESSION['foods'] = $_POST[('foods' . $foodValue)];

            if (empty($this->_f3->get('errors'))) {
                // var_dump($_SESSION);
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
        // var_dump($_SESSION);
        $view = new Template();
        echo $view->render('views/confirmation.html');
        session_destroy();
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
        $_SESSION['pass'] = $_POST['pass'];

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $vip = $_POST['isVIP'];

        if (Validation::validname($fname)) {
            $_SESSION['fname'] = $_POST['fname'];
        }else {
            //if data is not valid store an error message
            $f3->set('errors["fname"]', 'Please enter a valid name');
        }
        if (Validation::validname($lname)) {
            $_SESSION['lname'] = $_POST['lname'];
        }else {
            //if data is not valid store an error message
            $f3->set('errors["lname"]', 'Please enter a valid name');
        }
        if(Validation::validEmail($email)){
            $_SESSION['email'] = $_POST['email'];
        }else {
            //if data is not valid store an error message
            $f3->set('errors["email"]', 'Please enter a valid email');
        }
        if(Validation::validVip($vip)){
            $_SESSION['isVIP'] = $_POST['isVIP'];

        }else {
            //if data is not valid store an error message
            $f3->set('errors["vip"]', 'Not valid VIP status');
        }
        $view = new Template();
        echo $view->render('views/signUp.html');
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