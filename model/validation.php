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
     * verifies valid qty max 15 of one item no negative nums
     * @param $qty
     * @return bool
     */
    static function validQty($qty): bool
    {
        return is_numeric($qty) and $qty <= 15 and $qty >= 0;
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
        foreach ($food as $foods) {
            // If the choice is not in the list of valid choices
            if (!in_array($foods, DataLayer::getFood())) {
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
    static function validFoodPrice($food):bool
     {
         //validates food price
         foreach (DataLayer::getFood() as $foodItem => $price) {
             if ($food == $foodItem) {
                 return true;
             }
             else{
                 return false;
             }
         }
         return true;
     }

    /**
     * verifies valid Drink
     * @param $drink
     * @return bool
     */
    static function validDrink($drink): bool
    {
        if (empty($drink)) {
            return true;
        }
        //validates drink name
        foreach ($drink as $drinks) {
            // If the choice is not in the list of valid choices
            if (!in_array($drinks, DataLayer::getDrinks())) {
                return false;
            }
        }



        return true;
    }
    static function validDrinkPrice($drink):bool
    {
        //validates drink price
        foreach (DataLayer::getDrinks() as $drinkItem => $price) {
            if ($drink == $drinkItem) {
                return true;
            }
            else{
                return false;
            }
        }
        return true;
    }
}