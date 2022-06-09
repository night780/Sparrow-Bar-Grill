<?php

/**
 *Member class is when a customer makes a new account
 */
class Member
{
    /**
     * Account ID num
     * @var int|mixed|string
     */
    private int $_ID;
    /**
     * First Name
     * @var string|mixed
     */
    private string $_fname;
    /**
     * Last Name
     * @var string|mixed
     */
    private string $_lname;
    /**
     * BirthDate (we are a bar)
     * @var int|mixed|string
     */
    private int $_birth;
    /**
     * Phone number (to follow up on order status)
     * @var int|mixed|string
     */
    private int $_phone;
    /**
     * Membership Status VIP or NOT
     * @var bool|mixed|string
     */
    private boolean $_status;


    /**
     * Member constructor
     * @param string $ID
     * @param string $fname
     * @param string $lname
     * @param int $birth
     * @param int $phone
     * @param boolean $status
     */
    public function __construct(string $ID = '', string $fname = '',
                                string $lname = '', int $birth = 010101,
                                int    $phone = 2533333333, boolean $status)
    {
        $this->_ID = $ID;
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_birth = $birth;
        $this->_phone = $phone;
        $this->_status = $status;
    }

    /**
     * Gets ID
     * @return mixed
     */
    public function getID()
    {
        return $this->_ID;
    }

    /**
     * Sets ID
     * @param mixed $ID
     */
    public function setID($ID): void
    {
        $this->_ID = $ID;
    }

    /**
     * Gets first name
     * @return mixed
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * Sets first name
     * @param mixed $fname
     */
    public function setFname($fname): void
    {
        $this->_fname = $fname;
    }


    /**
     * Gets last name
     * @return mixed
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * Sets last name
     * @param mixed $lname
     */
    public function setLname($lname): void
    {
        $this->_lname = $lname;
    }

    /**
     * Gets birthday
     * @return mixed
     */
    public function getBirth()
    {
        return $this->_birth;
    }

    /**
     * Sets birthday
     * @param mixed $birth
     */
    public function setBirth($birth): void
    {
        $this->_birth = $birth;
    }

    /**
     * Gets Phone
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * Sets Phone
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->_phone = $phone;
    }

    /**
     * Gets boolean value of VIP acct status
     * @return mixed
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * Sets boolean value of VIP acct status
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->_status = $status;
    }

}
