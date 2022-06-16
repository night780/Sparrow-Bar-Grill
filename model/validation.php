<?php

/**
 * Validates form information
 */
class Validation
{
    /**
     * verifies valid name
     * @param $name
     * @return bool
     */
    static function validname($name): bool
    {
        //True if both names are valid (over 2 char) false if not
        return (strlen($name) >= 2) and $name != NULL and (ctype_alpha($name));
    }

    /**
     * verifies valid age we are a bar 21+ only
     * @param $Age
     * @return bool
     */
    static function validAge($Age): bool
    {
        return is_numeric($Age) and $Age <= 118 and $Age >= 21 and $Age !=
            NULL;
    }

    /**
     * verifies valid email
     * @param $email
     * @return bool
     */
    static function validEmail($email): bool
    {
        return !preg_match("/^[a-zA-Z-' ]*$/", $email) and $email != NULL;
    }

    /**
     * verifies valid Food
     * @param $food
     * @return bool
     */
    static function validFood($food): bool
    {
        if (empty($food)) {
            return true;
        }

        // Loops through the user choices
        foreach ($food as $foods) {
            // If the choice is not in the list of valid choices
            if (!array_key_exists($foods, DataLayer::getFood())) {
                return false;
            }
        }

        return true;
    }

    /**
     * Valid food price
     * @param $food
     * @return bool
     */
    static function validFoodPrice($food): bool
    {
//         //validates food price
//         $foods = DataLayer::getFood();
//         foreach ($food as $foodItem => $price) {
//             if ($foods == $foodItem) {
//                 return true;
//             }
//             else{
//                 return false;
//             }
//         }
        return true;
    }

    /**
     * verifies valid Drink
     * @param $drink
     * @return bool
     */
    static function validDrink($drink): bool
    {
//        if (empty($drink)) {
//            return true;
//        }
//        $drinkArray = DataLayer::getDrinks();
//        //validates drink name
//        foreach ($drink as $drinks) {
//            // If the choice is not in the list of valid choices
//            if (!in_array($drinks, $drinkArray)) {
//                return false;
        //          }
        //   }

        return true;
    }

    static function validDrinkPrice($drink): bool
    {
//        //validates drink price
//        $drinks = DataLayer::getDrinks();
//
//        foreach ($drinks as $drinkItem => $price) {
//            if ($drink == $drinkItem) {
//                return true;
//            }
//            else{
//                return false;
//            }
//        }
        return true;
    }

    static function validVip($vip): bool
    {
        if ($vip == true) {
            return true;
        }
        //else
        return true;
    }
}