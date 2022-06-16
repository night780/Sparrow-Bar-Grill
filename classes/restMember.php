<?php

/**
 * This class represents a member
 */
class RestMember
{
    private $_fname;
    private $_lname;
	private $_email;
	private $_password;
	private $_memberNum;

    /**
     * This constructs a member object
     * @param $_fname
     * @param $_lname
     * @param $_email
	 * @param $_password
     */
    public function __construct($_fname, $_lname, $_email, $_password)
    {
        $this->_fname = $_fname;
        $this->_lname = $_lname;
		$this->_email = $_email;
		$this->_password = $_password;
    }

    /**
     * Retrives the first name of the member
     * @return mixed
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * Sets the first name of the member
     * @param mixed $fname
     */
    public function setFname($fname): void
    {
        $this->_fname = $fname;
    }

    /**
     * Retrives the last name of the member
     * @return mixed
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * Sets the last name of the member
     * @param mixed $lname
     */
    public function setLname($lname): void
    {
        $this->_lname = $lname;
    }

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->_email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail($email): void {
		$this->_email=$email;
	}

	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->_password;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword($password): void {
		$this->_password=$password;
	}

	/**
	 * @return mixed
	 */
	public function getMemberNum() {
		return 8;
	}

	/**
	 * @param mixed $memberNum
	 */
	public function setMemberNum($memberNum): void {
		$this->_memberNum=$memberNum;
	}
}