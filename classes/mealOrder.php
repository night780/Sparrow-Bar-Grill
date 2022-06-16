<?php

/**
 * This class represents an order from a user
 */
class MealOrder
{
    private $_food;
    private $_drinks;
    private $_total;
	private $_memberNum;

    /**
     * Retrieves the food from the order
     * @return mixed
     */
    public function getFood()
    {
        return $this->_food;
    }

    /**
     * Sets the food for the order
     * @param mixed $food
     */
    public function setFood($food): void
    {
        $this->_food = $food;
    }

    /**
     * Retrieves the drinks from the order
     * @return mixed
     */
    public function getDrinks()
    {
        return $this->_drinks;
    }

    /**
     * Gets the drinks for the order
     * @param mixed $drinks
     */
    public function setDrinks($drinks): void
    {
        $this->_drinks = $drinks;
    }

    /**
     * Retrieves the total cost for the order
     * @return mixed
     */
    public function getTotal()
    {
        return $this->_total;
    }

    /**
     * Sets the total cost for the order
     * @param mixed $total
     */
    public function setTotal($total): void
    {
        $this->_total = $total;
    }

	/**
	 * Returns the member number of the meal
	 * @return mixed
	 */
	public function getMemberNum() {
		return $this->_memberNum;
	}

	/**
	 * Sets the member number of the meal
	 * @param mixed $memberNum
	 */
	public function setMemberNum($memberNum): void {
		$this->_memberNum=$memberNum;
	}
}