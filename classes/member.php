<?php

/**
 * This class represents a member
 */
class Member
{
	private $_accountNum;
	private $_fname;
	private $_lname;
	private $_birthdate;

	/**
	 * This constructs a member object
	 * @param $_accountNum
	 * @param $_fname
	 * @param $_lname
	 * @param $_birthdate
	 */
	public function __construct($_accountNum,$_fname,$_lname,$_birthdate) {
		$this->_accountNum=$_accountNum;
		$this->_fname=$_fname;
		$this->_lname=$_lname;
		$this->_birthdate=$_birthdate;
	}

	/**
	 * Retrives the account number of the member
	 * @return mixed
	 */
	public function getAccountNum() {
		return $this->_accountNum;
	}

	/**
	 * Sets the account number of the member
	 * @param mixed $accountNum
	 */
	public function setAccountNum($accountNum): void {
		$this->_accountNum=$accountNum;
	}

	/**
	 * Retrives the first name of the member
	 * @return mixed
	 */
	public function getFname() {
		return $this->_fname;
	}

	/**
	 * Sets the first name of the member
	 * @param mixed $fname
	 */
	public function setFname($fname): void {
		$this->_fname=$fname;
	}

	/**
	 * Retrives the last name of the member
	 * @return mixed
	 */
	public function getLname() {
		return $this->_lname;
	}

	/**
	 * Sets the last name of the member
	 * @param mixed $lname
	 */
	public function setLname($lname): void {
		$this->_lname=$lname;
	}

	/**
	 * Retrives the birthdate of the member
	 * @return mixed
	 */
	public function getBirthdate() {
		return $this->_birthdate;
	}

	/**
	 * Sets the birthdate of the member
	 * @param mixed $birthdate
	 */
	public function setBirthdate($birthdate): void {
		$this->_birthdate=$birthdate;
	}


}