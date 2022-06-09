<?php


/**
 * This class represents an order from a user
 */
class MealOrder
{
	private $_accountNum;
	private $_orderNum;
	private $_food;
	private $_drinks;
	private $_total;

	/**
	 * @param $_accountNum
	 * @param $_orderNum
	 * @param $_food
	 * @param $_drinks
	 * @param $_total
	 */
	public function __construct($_accountNum,$_orderNum,$_food,$_drinks,$_total) {
		$this->_accountNum=$_accountNum;
		$this->_orderNum=$_orderNum;
		$this->_food=$_food;
		$this->_drinks=$_drinks;
		$this->_total=$_total;
	}

	/**
	 * Retrieves the account number of the order
	 * @return mixed
	 */
	public function getAccountNum() {
		return $this->_accountNum;
	}

	/**
	 * Sets the account number for the order
	 * @param mixed $accountNum
	 */
	public function setAccountNum($accountNum): void {
		$this->_accountNum=$accountNum;
	}

	/**
	 * Retrieves the order number
	 * @return mixed
	 */
	public function getOrderNum() {
		return $this->_orderNum;
	}

	/**
	 * Gets the order number
	 * @param mixed $orderNum
	 */
	public function setOrderNum($orderNum): void {
		$this->_orderNum=$orderNum;
	}

	/**
	 * Retrieves the food from the order
	 * @return mixed
	 */
	public function getFood() {
		return $this->_food;
	}

	/**
	 * Sets the food for the order
	 * @param mixed $food
	 */
	public function setFood($food): void {
		$this->_food=$food;
	}

	/**
	 * Retrieves the drinks from the order
	 * @return mixed
	 */
	public function getDrinks() {
		return $this->_drinks;
	}

	/**
	 * Gets the drinks for the order
	 * @param mixed $drinks
	 */
	public function setDrinks($drinks): void {
		$this->_drinks=$drinks;
	}

	/**
	 * Retrieves the total cost for the order
	 * @return mixed
	 */
	public function getTotal() {
		return $this->_total;
	}

	/**
	 * Sets the total cost for the order
	 * @param mixed $total
	 */
	public function setTotal($total): void {
		$this->_total=$total;
	}
}